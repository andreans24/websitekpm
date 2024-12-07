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
use App\Models\PortfolioCategories;
use App\Models\Slider;
use Illuminate\Support\Str;

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

        // Variabel OG Tags
        $pageTitle = "KOPEGMAR | Koperasi Pegawai Maritim Tanjung Priok Jakarta Utara";
        $pageDescription = "KOPEGMAR menyediakan layanan simpan pinjam dan unit usaha untuk pegawai maritim Tanjung Priok.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

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
        return view('project.home.index', compact('services', 'about', 'office', 'teams', 'portfolios', 'categories', 'sliders', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
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

        $pageTitle = "Tentang Kami KOPEGMAR";
        $pageDescription = "Temukan informasi lengkap tentang KOPEGMAR dan visi misi kami disini!.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();


        return view('project.home.about', compact(
            'categories', 'office', 'about', 'recentPosts', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }

    public function contact() 
    {
        $office = Office::first();
        $categories = Categorie::all();

        $pageTitle = "Kontak KOPEGMAR";
        $pageDescription = "Hubungi KOPEGMAR untuk informasi lebih lanjut tentang layanan kami.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.home.contact', compact('office', 'categories', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }

    public function portfolio() 
    {
        $portfolios = Portfolio::all();

        $pageTitle = "Portofolio KOPEGMAR";
        $pageDescription = "Lihat berbagai portofolio yang telah dikerjakan oleh KOPEGMAR.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.home.portfolio', compact('portfolios', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
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

        $pageTitle = "News KOPEGMAR";
        $pageDescription = "Baca berita terkini seputar KOPEGMAR dan dunia maritim di Tanjung Priok.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.home.news', compact(
            'office', 'news', 'categories', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }

    public function detailsNews($id, $title)
    {
        $news = News::findOrFail($id); 
        if (Str::slug($news->title) !== $title) {
            // Redirect ke URL yang benar jika slug title tidak sesuai
            return redirect()->route('detail-news', [
                'id' => $news->id,
                'title' => Str::slug($news->title)
            ]);
        }

        $office = Office::first(); 
        $recentPosts = News::inRandomOrder()->take(5)->get();
        $comments = Comment::where('news_id', $id)->get();
        $commentCount = $news->comments()->count();
        $categories = Categorie::all();

        $pageTitle = $news->title;
        $pageDescription = substr($news->content, 0, 150); // Deskripsi singkat dari berita
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.detailshome.detailnews', compact(
            'news', 'office', 'recentPosts', 'comments', 'commentCount', 'categories', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }

    public function detailPortfolio($id, $categorySlug)
    {
        $category = PortfolioCategories::where('slug', $categorySlug)->firstOrFail();

        $portfolios = Portfolio::where('id', $id)->where('category_id', $category->id)->firstOrFail();

        $office = Office::first();
        $categories = PortfolioCategories::all();
        $categories = Categorie::all();

        $pageTitle = $portfolios->title;
        $pageDescription = "KOPEGMAR - " . $portfolios->title;
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.detailshome.detailportfolio', compact(
            'portfolios', 'office', 'categories', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }

    public function detailService($slug)
    {
        // Cari layanan berdasarkan ID kategori
        $category = Categorie::where('slug', $slug)->first();

        if (!$category || $category->services()->count() === 0) {
            return redirect()->route('error-page'); // Ganti dengan nama route halaman error
        }

        // Ambil layanan pertama yang sesuai kategori
        $services = $category->services()->first();
        $recentPosts = News::inRandomOrder()->take(5)->get();
        $office = Office::first();
        $categories = Categorie::all();

        $pageTitle = $services->title;
        $pageDescription = "Layanan " . $services->title . " KOPEGMAR.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.detailshome.detailservice', compact(
            'services', 'office', 'categories', 'recentPosts', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }

    public function errorPage()
    {
        $recentPosts = News::inRandomOrder()->take(5)->get();
        $categories = Categorie::all();
        $office = Office::first();
        
        $pageTitle = "Halaman Error";
        $pageDescription = "Halaman tidak ditemukan. Kembali ke halaman utama KOPEGMAR.";
        $ogImage = asset('templateWeb/assets/img/favicon2.png');
        $ogUrl = url()->current();

        return view('project.detailshome.errors', compact(
            'categories', 'office', 'categories', 'recentPosts', 'pageTitle', 'pageDescription', 'ogImage', 'ogUrl'));
    }
}
