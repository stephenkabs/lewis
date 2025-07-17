<?php

namespace App\Http\Controllers;

use App\Models\Repayment;
use App\Models\Loan;
use App\Models\Detail;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // If not already imported
use Illuminate\Support\Str;

class RepaymentController extends Controller
{
    /**
     * Display a listing of the repayments.
     */
    public function index()
    {
        $repayments = Repayment::whereHas('loan', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('loan')->latest()->paginate(10);

        $today = Carbon::today();

        // Total amount paid today
        $totalPaidToday = Repayment::whereDate('payment_date', $today)->sum('amount_paid');

        // Count of unique users (clients) who paid today
        $usersPaidToday = Repayment::whereDate('payment_date', $today)
            ->join('loans', 'repayments.loan_id', '=', 'loans.id')
            ->distinct('loans.client_id')
            ->count('loans.client_id');

        return view('repayments.index', compact('repayments', 'totalPaidToday', 'usersPaidToday'));
    }
    /**
     * Show the form for creating a new repayment.
     */
    public function create()
    {
        $loans = Loan::all(); // For selecting the loan to attach repayment to
        $detail = Detail::all(); // For selecting the loan to attach repayment to
        return view('repayments.create', compact('loans', 'detail'));
    }

    /**
     * Store a newly created repayment in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_paid' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
        ]);

        // Generate slug
        $slug = Str::slug('repayment-' . $request->loan_id . '-' . now()->timestamp);

        Repayment::create([
            'loan_id' => $request->loan_id,
            'detail_id' => $request->detail_id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'slug' => $slug,
            'user_id' => Auth::id(), // Set the logged-in user's ID
        ]);

        return redirect()->route('repayments.index')->with('success', 'Repayment recorded successfully.');
    }

    /**
     * Display the specified repayment.
     */
    public function show(Repayment $repayment)
    {
        return view('repayments.show', compact('repayment'));
    }

    /**
     * Show the form for editing the specified repayment.
     */
    public function edit(Repayment $repayment)
    {
        $loans = Loan::all();
        $detail = Detail::all(); // For selecting the loan to attach repayment to
        return view('repayments.edit', compact('repayment', 'loans', 'detail'));
    }

    /**
     * Update the specified repayment in storage.
     */
    public function update(Request $request, Repayment $repayment)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount_paid' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
        ]);

        // Regenerate slug
        $slug = Str::slug('repayment-' . $request->loan_id . '-' . now()->timestamp);

        $repayment->update([
            'loan_id' => $request->loan_id,
            'detail_id' => $request->detail_id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'slug' => $slug,
            'user_id' => Auth::id(), // Track the user who updated it
        ]);

        return redirect()->route('repayments.index')->with('success', 'Repayment updated successfully.');
    }

    /**
     * Remove the specified repayment from storage.
     */
    public function destroy(Repayment $repayment)
    {
        $repayment->delete();
        return redirect()->route('repayments.index')->with('success', 'Repayment deleted successfully.');
    }


    public function exportToPDF($slug)
    {
        $repayment = Repayment::with('detail', 'loan')->where('slug', $slug)->firstOrFail();
        $pdf = Pdf::loadView('pdf.repayment', compact('repayment'));
        return $pdf->download($repayment->loan->client->client_name . '.pdf');
    }
}
