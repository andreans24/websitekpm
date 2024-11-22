<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use App\Models\Office;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('project.news.index', compact('news'));
    }

    public function create()
    {
        return view('project.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {
            $imageName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $request->file('images')->move(public_path('news_images'), $imageName);
            $imagePath = 'news_images/' . $imageName;
        } else {
            $imagePath = null;
        }

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('news-index')->with('success', 'News successfully created!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('project.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::FindOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);
        
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }
    
            // Simpan gambar baru
            $imageName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $request->file('images')->move(public_path('news_images'), $imageName);
            $imagePath = 'news_images/' . $imageName;
        } else {
            // Gunakan gambar lama jika tidak ada file baru
            $imagePath = $news->image;
        }

        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('news-index')->with('success', 'News Successfully updated!');
    }
    

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->id) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('news-index')->with('success', 'News Successfully deleted!');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $comments = Comment::where('news_id', $id)->where('parent_id', null)->get(); // Mengambil komentar yang terkait

        return view('project.detailshome.detailnews', compact('news', 'comments'));
    }

    
}
