<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;

    // These fields can be mass-assigned
    protected $fillable = [
        'loan_id',
        'detail_id',
        'amount_paid',
        'payment_date',
        'user_id',
        'slug',
    ];

    /**
     * Relationship: Repayment belongs to a Loan
     */
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }
}
