<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'categorie_id', 'title', 'description', 'images'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
