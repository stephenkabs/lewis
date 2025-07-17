<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    use HasFactory;

    // protected $table = 'service';

    protected $fillable = [
        'name',
        'words',
        'image',
        'description',
        'status',
        'user_id',
        'category_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
