<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use App\Models\Office;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $imagePath = $request->file('images')->storeAs('news_images', $imageName, 'public');
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

        // Cari data yang akan di-update
        $news = News::findOrFail($id);

        // Cek apakah ada file image yang di-upload
        if ($request->hasFile('images')) {
            // Hapus gambar lama jika ada dan gambar baru di-upload
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->file('images')->getClientOriginalExtension();
            $imagePath = $request->file('images')->storeAs('news_images', $imageName, 'public');
        } else {
            // Jika tidak ada file gambar baru, tetap gunakan gambar lama
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
