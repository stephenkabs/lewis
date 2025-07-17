<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Define the table if not following the default naming convention
    protected $table = 'loans';

    // Define the attributes that are mass assignable
    protected $fillable = [


        'user_id',
        'investment_id',
        'client_id',
        'amount',
        'name',
        'interest_rate',
        'term',
        'file',
        'start_date',
        'due_date',
        'status',
        'total_repayable',
        'amount_paid',
    ];

    // Optionally define the casts for attributes that require specific formatting
    protected $casts = [
        'start_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'total_repayable' => 'decimal:2',
        'amount_paid' => 'decimal:2',
    ];

    public function repayments()
{
    return $this->hasMany(Repayment::class);
}

// public function investment()
// {
//     return $this->belongsTo(Investment::class);
// }






    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Calculate the total amount remaining to be paid
    public function remainingAmount()
    {
        return $this->total_repayable - $this->amount_paid;
    }

    // Calculate the monthly repayment amount
    public function monthlyRepayment()
    {
        $monthlyRate = $this->interest_rate / 100 / 12;
        $loanAmount = $this->amount;
        $numPayments = $this->term;

        $monthlyPayment = $loanAmount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$numPayments));

        return round($monthlyPayment, 2);
    }

    // Check if the loan is overdue based on the current date
    public function isOverdue()
    {
        return $this->due_date < now() && $this->remainingAmount() > 0;
    }
}
