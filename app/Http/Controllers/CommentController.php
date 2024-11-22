<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $news_id)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'comment' => 'required|string',
        'parent_id' => 'nullable|exists:comments,id' // Validasi untuk komentar balasan
    ]);

        Comment::create([
            'news_id' => $news_id, // ID berita yang di-comment
            'parent_id' => $request->input('parent_id', null), // ID komentar balasan jika ada
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment, // Isi komentar
        ]);

        return redirect()->route('detail-news', $news_id)->with('success', 'Successfully Posted!');
    }
}
