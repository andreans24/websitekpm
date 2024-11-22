<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategories extends Model
{
    use HasFactory;

    protected $table = 'portfolio_categories';

    protected $fillable = ['name', 'slug'];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'category_id');
    }


}
