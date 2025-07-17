<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'words',
        'image',
        'description',
        'status',
        'icon',
        'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
