<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'position', 
        'social_media_1', 
        'social_media_2', 
        'social_media_3', 
        'social_media_4', 
        'image', // tambahkan semua kolom yang digunakan dalam form
    ];
}
