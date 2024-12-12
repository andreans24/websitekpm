<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }

    protected static function booted()
    {
        static::creating(function ($news) {
            // Membuat slug dari title sebelum artikel disimpan
            $news->slug = Str::slug($news->title); 
        });
    }
}
