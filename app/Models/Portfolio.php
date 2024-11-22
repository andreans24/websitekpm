<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    Protected $fillable = [
        'title', 
        'description', 
        'category_id', 
        'client', 
        'project_date', 
        'image1', 
        'image2', 
        'image3', 
        'image4'
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCategories::class, 'category_id');
    }
}
