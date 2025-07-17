<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;
use App\Models\Quotation;
use App\Models\Setting;
use App\Models\Repayment;
use Carbon\Carbon;
use App\Models\Program;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        // $user = Auth::id();
        $id = Auth::user()->id;
        $user = User::find($id);
        // $visitors = Visitor::where('last_visit_at', '>=', now()->subMinutes(30))->get();
        $generalSettings = Setting::where('status', 'Published')->get();
        $displaySettings = Setting::where('status', 'Published')->get();
        $programs = Program::all();

        $today = Carbon::today();

        $workers = Worker::with(['attendances' => function ($query) use ($today) {
            $query->whereDate('created_at', $today);
        }])->where('user_id', $id)->get();

        // Absent workers: those with NO attendance today
        $absentWorkers = $workers->filter(function ($worker) {
            return $worker->attendances->isEmpty();
        });


        $today = Carbon::today();

        $monthlyLoans = Loan::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw("SUM(amount) as total")
        )
            ->where('status', 'approved')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $monthlyRepayments = Repayment::select(
            DB::raw("DATE_FORMAT(payment_date, '%Y-%m') as month"),
            DB::raw("SUM(amount_paid) as total")
        )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        // Total amount paid today
        $totalPaidToday = Repayment::whereDate('payment_date', $today)->sum('amount_paid');

        // Count of unique users (clients) who paid today
        $usersPaidToday = Repayment::whereDate('payment_date', $today)
            ->join('loans', 'repayments.loan_id', '=', 'loans.id')
            ->distinct('loans.client_id')
            ->count('loans.client_id');

        $totalLoanToday = Loan::whereDate('created_at', $today)->sum('amount');
        $allLoan = Loan::where('status', 'approved')->sum('amount');

$approvedClients = Client::where('user_id', $id)->where('status', 'approved')->count();

$blacklistedClients = Client::where('user_id', $id)->where('status', 'blacklisted')->count();

$unapprovedClients = Client::where('user_id', $id)->where('status', 'unapproved')->count();



        return view('dashboard.index', compact('user', 'generalSettings', 'displaySettings', 'programs', 'workers', 'absentWorkers', 'totalPaidToday', 'usersPaidToday', 'totalLoanToday', 'allLoan', 'monthlyLoans', 'monthlyRepayments',
            'approvedClients', 'blacklistedClients', 'unapprovedClients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user

        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates the CSRF token

        return redirect('/login'); // Redirect to the login page
    }
}
