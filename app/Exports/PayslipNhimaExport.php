<?php

namespace App\Exports;

use App\Models\Payslip;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PayslipNhimaExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, WithEvents
{
    public function collection()
    {
        // Export only authenticated user's payslips — modify if needed
        return Payslip::where('user_id', Auth::id())->get();
    }

    public function map($payslip): array
    {
        $totalAdvance = $payslip->salary->worker->advance
            ? $payslip->salary->worker->advance->sum('amount')
            : 0;

        $netPay = $payslip->salary->net_pay - $totalAdvance;

        $contribution = $payslip->salary->nhima / 2;

        $gross = $payslip->salary->basic_salary + $payslip->salary->other_allowance + $payslip->salary->other_allowance_two +
            $payslip->salary->transport_allowance + $payslip->salary->housing_allowance;

        return [
            $payslip->salary->worker->name,
            (string) $payslip->salary->worker->nhima_no,
            $payslip->salary->worker->designation,
            $payslip->salary->net_pay,
            $contribution,
            $contribution,
            $payslip->salary->nhima,
        ];
    }

    public function headings(): array
    {
        return [
            "NAME",
            "NHIMA No",
            "JOB DESCRIPTION",
            "MONTH PAY",
            "NHIMA EMPLOYEE CONTRIBUTION ",
            "NHIMA EMPLOYER CONTRIBUTION ",
            "TOTAL"
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER, // NHIMA No
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                foreach (range('A', 'G') as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }

                $event->sheet->getDelegate()->getStyle('A1:L1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}
