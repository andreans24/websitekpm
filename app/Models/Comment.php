<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'parent_id', 'name', 'email', 'comment'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function parent()
    {
        return $this->belogsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
