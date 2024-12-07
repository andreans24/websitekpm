<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories', // Nama kategori
        'slug',       // Slug kategori
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}