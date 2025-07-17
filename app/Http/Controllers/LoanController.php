<?php

namespace App\Http\Controllers;

use App\Models\Background;
use App\Models\Client;
use App\Models\Investment;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('permission:view loan',['only'=> ['index','show']]);
    //    $this->middleware('permission:create loan',['only'=> ['create','store']]);
    //    $this->middleware('permission:edit loan',['only'=> ['update','edit']]);
    //    $this->middleware('permission:delete loan',['only'=> ['destroy']]);

    // }
    public function index()
    {
        // Fetch all loans with related user data (optional)
        $loans = Loan::with('user','client')->get();
        $background = Background::all();
        return view('loans.index', compact('loans','background')); // Pass data to the view
    }

    /**
     * Show the form for creating a new loan.
     */public function create()
{
    $clients = Client::all();

    // Fetch all investments grouped by client_id
    // $investments = Investment::all()->groupBy('client_id');

    // // Structure the investments for use in JavaScript
    // $clientInvestments = [];
    // foreach ($investments as $clientId => $investmentGroup) {
    //     $clientInvestments[$clientId] = $investmentGroup->map(function ($investment) {
    //         return [
    //             'id' => $investment->id,
    //             'invested_amount' => $investment->invested_amount,
    //         ];
    //     });
    // }

    // $investment = Investment::orderByDesc('invested_amount')->first() ?? new Investment();

    return view('loans.create', compact('clients'));
}


    /**
     * Store a newly created loan in storage.
     */


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            // 'investment_id' => 'required|exists:investments,id',
            'amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'term' => 'required|integer|min:1',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);


        // Handle document upload
        $documents = null;
        if ($file = $request->file('file')) {
            $destinationPath = 'documents_loans';
            $documents = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $documents);
        }

        // Generate a slug
        $slug = Str::slug($request->amount . '-' . uniqid(), '-');

        // Deduct loan amount from investment
        // $investment->invested_amount -= $request->amount;
        // $investment->save();

        // Create a new loan record
        Loan::create([
            'user_id' => Auth::id(),
            'client_id' => $request->client_id,
            // 'investment_id' => $request->investment_id,
            'amount' => $request->amount,
            'interest_rate' => $request->interest_rate,
            'term' => $request->term,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'total_repayable' => $this->calculateTotalRepayable($request->amount, $request->interest_rate, $request->term),
            'slug' => $slug,
            'file' => $documents,
        ]);

        return redirect()->route('loans.index')->with('success', 'Loan created successfully');
    }

    /**
     * Display the specified loan.
     */
    public function show(Loan $loan)
    {
        return response()->json([
            'name' => $loan->name,
            'amount' => $loan->amount,
            'interest_rate' => $loan->interest_rate,
            'term' => $loan->term,
            'start_date' => $loan->start_date->format('Y-m-d'),
            'due_date' => $loan->due_date->format('Y-m-d'),
            'status' => ucfirst($loan->status),
            'file' => $loan->file,
        ]);
    }


    /**
     * Show the form for editing the specified loan.
     */
    public function edit(Loan $loan)
    {
        // Fetch all users for loan editing
        $users = User::where('user_id', Auth::id());
        $clients = Client::all();
        return view('loans.edit', compact('loan', 'users','clients'));
    }

    /**
     * Update the specified loan in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        // if ($request->has('status')) {
        //     $request->validate([
        //         'status' => 'required|string|in:pending,approved,rejected',
        //     ]);

        //     $loan->update(['status' => $request->status]);

        //     return redirect()->route('loans.index')->with('success', 'Loan status updated successfully.');
        // }

        // Handle full loan update (if this is another scenario).
           // Validate the request
           $request->validate([
            // 'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'id_number' => 'required|string|max:255',
            // 'number' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'term' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:start_date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->has('status')) {
            $request->validate([
                'status' => 'required|string|in:pending,approved,rejected',
            ]);

            $loan->update(['status' => $request->status]);

        // Update loan details
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads/loans', 'public');
            $loan->file = $filePath;
        }

        $loan->update($request->except('file'));

        return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
    }

}

public function updateStatus(Request $request, Loan $loan)
{
    $request->validate([
        'status' => 'required|string|in:pending,approved,rejected,closed', // Added 'paid' status
    ]);

    $loan->update(['status' => $request->status]);

    return redirect()->route('loans.index')->with('success', 'Loan status updated successfully.');
}





    /**
     * Remove the specified loan from storage.
     */
    public function destroy(Loan $loan)
    {
        // Check if the loan has an associated file
        if ($loan->file) {
            $filePath = public_path('documents_loans/' . $loan->file);

            // Delete the file if it exists
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete the loan record
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Loan and associated document deleted successfully');
    }


    /**
     * Helper function to calculate total repayable amount.
     */
    private function calculateTotalRepayable($amount, $interest_rate, $term)
    {
        // Simple interest calculation, you can change this to more complex logic
        $totalRepayable = $amount + ($amount * $interest_rate / 100);
        return round($totalRepayable, 2);
    }
}
