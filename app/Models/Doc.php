<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;


    protected $fillable =[
        'title',
        'image',
        'type',
        'description',
        'user_id',

    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
