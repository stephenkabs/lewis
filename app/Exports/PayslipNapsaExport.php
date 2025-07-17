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

class PayslipNapsaExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, WithEvents
{
    public function collection()
    {
        // You may update this logic if you only want certain users/data
        return Payslip::where('user_id', Auth::id())->get();
    }

     public function map($payslip): array
    {
        $totalAdvance = $payslip->salary->worker->advance
            ? $payslip->salary->worker->advance->sum('amount')
            : 0;

        $netPay = $payslip->salary->net_pay - $totalAdvance;

        $contribution = $payslip->salary->napsa / 2;

        $gross = $payslip->salary->basic_salary + $payslip->salary->other_allowance + $payslip->salary->other_allowance_two +
            $payslip->salary->transport_allowance + $payslip->salary->housing_allowance;

        return [
            $payslip->salary->worker->name,
            (string) $payslip->salary->worker->napsa_no,
            $payslip->salary->worker->designation,
            $payslip->salary->net_pay,
            $contribution,
            $contribution,
            $payslip->salary->napsa,
        ];
    }

       public function headings(): array
    {
        return [
            "NAME",
            "SOCIAL SECURITY NUMBER",
            "JOB DESCRIPTION",
            "MONTH PAY",
            "NAPSA EMPLOYEE CONTRIBUTION ",
            "NAPSA EMPLOYER CONTRIBUTION  ",
            "TOTAL"
        ];
    }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Auto-size all columns
                foreach (range('A', 'G') as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }

                // Style the header row
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
