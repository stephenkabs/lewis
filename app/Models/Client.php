<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name',
        'client_address',
        'phone',
        'status',
        'email',
        'client_tpin',
        'employee_no',
        'nrc',
        'slug',
        'user_id',
    ];

    /**
     * Get the user that owns the client.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    /**
     * Scope a query to search clients by name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|null  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByName($query, $name)
    {
        if ($name) {
            return $query->where('client_name', 'like', '%' . $name . '%');
        }

        return $query;
    }
}
