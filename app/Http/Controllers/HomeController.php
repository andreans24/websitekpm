<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Categorie;
use App\Models\About;
use App\Models\Office;
use App\Models\Team;
use App\Models\News;
use App\Models\Comment;
use App\Models\Portfolio;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all(); 

        $id = request()->get('category_id'); 
        if ($id) {
            $services = Service::where('categorie_id', $id)->get(); 
        } else {
            $services = Service::all();
        }

        $about = About::first();
        $office = Office::first();
        $teams = Team::all();
        $portfolios = Portfolio::with('category')->get();
        $sliders = Slider::all();
        // dd($sliders[0]->title);

        // Array ikon yang akan digunakan
        $icons = [
            'bi bi-briefcase',
            'bi bi-card-checklist',
            'bi bi-bar-chart',
            'bi bi-bookmarks',
            // Tambahkan ikon lainnya sesuai kebutuhan
        ];
        // Gabungkan layanan dengan ikon
        foreach ($services as $index => $service) {
            $service->icon = $icons[$index % count($icons)]; // Mengambil ikon dari array
        }
        return view('project.home.index', compact('services', 'about', 'office', 'teams', 'portfolios', 'categories', 'sliders'));
    }

    public function about() 
    {
        $categories = Categorie::all(); 

        $id = request()->get('category_id'); 
        if ($id) {
            $services = Service::where('categorie_id', $id)->get(); 
        } else {
            $services = Service::all();
        }

        $recentPosts = News::inRandomOrder()->take(5)->get();
        $office = Office::first();
        $about = About::first();

        return view('project.home.about', compact('categories', 'office', 'about', 'recentPosts'));
    }

    public function contact() 
    {
        $office = Office::first();
        $categories = Categorie::all();

        return view('project.home.contact', compact('office', 'categories'));
    }

    public function portfolio() 
    {
        $portfolios = Portfolio::all();
        return view('project.home.portfolio', compact('portfolios'));
    }

    public function news() 
    {
        $categories = Categorie::all(); 

        $id = request()->get('category_id'); 
        if ($id) {
            $services = Service::where('categorie_id', $id)->get(); 
        } else {
            $services = Service::all();
        }

        $news = News::latest()->paginate(6);
        $office = Office::first();
        return view('project.home.news', compact('office', 'news', 'categories'));
    }

    public function detailsNews($id)
    {
        $news = News::findOrFail($id); // Ambil berita berdasarkan ID
        $office = Office::first(); // Ambil data kantor
        $recentPosts = News::inRandomOrder()->take(5)->get(); // Post terbaru
        $comments = Comment::where('news_id', $id)->get(); // Komentar terkait berita
        $commentCount = $news->comments()->count();
        $categories = Categorie::all();

        return view('project.detailshome.detailnews', compact('news', 'office', 'recentPosts', 'comments', 'commentCount', 'categories'));
    }

    public function detailPortfolio($id)
    {
        $portfolios = Portfolio::findOrFail($id);
        $office = Office::first();
        return view('project.detailshome.detailportfolio', compact('portfolios', 'office'));
    }

    public function detailService($id)
    {
        // $services = Service::all();
        $services = Service::find($id);
        $recentPosts = News::inRandomOrder()->take(5)->get();
        $office = Office::first();
        $categories = Categorie::all();

        return view('project.detailshome.detailservice', compact('services', 'office', 'categories', 'recentPosts'));
    }
}
