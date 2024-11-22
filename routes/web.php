<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Back End
Route::prefix('admin')->middleware(['admin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');

    // About Admin
    Route::get('about', [AboutController::class, 'index'])->name('about-index');
    Route::post('about/store', [AboutController::class, 'store'])->name('about-store');
    Route::put('about/update/{id}', [AboutController::class, 'update'])->name('about-update');
    
    // Service Admin
    Route::get('service', [ServiceController::class, 'index'])->name('serv');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service-create');
    Route::post('service', [ServiceController::class, 'store'])->name('service-store');
    Route::get('service/{service}', [ServiceController::class, 'show'])->name('service-show');
    Route::get('service/{service}/edit', [ServiceController::class, 'edit'])->name('service-edit');
    Route::put('service/{service}', [ServiceController::class, 'update'])->name('service-update');
    Route::delete('service/{service}/delete', [ServiceController::class, 'destroy'])->name('service-delete');
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    // Office Admin
    Route::get('office', [OfficeController::class, 'office'])->name('office');
    Route::post('office/store', [OfficeController::class, 'store'])->name('office-store');
    Route::put('office/update/{id}', [OfficeController::class, 'update'])->name('office-update');

    // Profile Admin
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('profile/edit/{id}', [AdminController::class, 'edit'])->name('profile-edit');
    Route::put('profile/update/{id}', [AdminController::class, 'update'])->name('profile-update');

    // Team Admin
    Route::get('team', [TeamController::class, 'index'])->name('team-index');
    Route::get('team/create', [TeamController::class, 'create'])->name('team-create');
    Route::post('team/store', [TeamController::class, 'store'])->name('team-store');
    Route::get('team/edit/{id}', [TeamController::class, 'edit'])->name('team-edit');
    Route::put('team/update/{id}', [TeamController::class, 'update'])->name('team-update');
    Route::delete('team/delete/{id}', [TeamController::class, 'destroy'])->name('team-delete');

    // News Admin
    Route::get('news', [NewsController::class, 'index'])->name('news-index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news-create');
    Route::post('news/store', [NewsController::class, 'store'])->name('news-store');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('news-edit');
    Route::put('news/update/{id}', [NewsController::class, 'update'])->name('news-update');
    Route::delete('news/delete/{id}', [NewsController::class, 'destroy'])->name('news-delete');
    Route::post('news/upload', [CKEditorController::class, 'uploadNews'])->name('news-upload');

    // Portfolio Admin
    Route::get('portfolios', [PortfolioController::class, 'index'])->name('portfolios-index');
    Route::get('portfolios/create', [PortfolioController::class, 'create'])->name('portfolios-create');
    Route::post('portfolios/store', [PortfolioController::class, 'store'])->name('portfolios-store');
    Route::get('portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolios-edit');
    Route::put('portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios-update');
    Route::delete('portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolios-delete');
    Route::post('portfolios/upload', [CKEditorController::class, 'uploadportfolio'])->name('portfolio-upload');

    Route::get('slider', [SliderController::class, 'index'])->name('slider-index');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider-create');
    Route::post('slider', [SliderController::class, 'store'])->name('slider-store');
    Route::get('slider/{slider}/edit', [SliderController::class, 'edit'])->name('slider-edit');
    Route::post('slider/{slider}', [SliderController::class, 'update'])->name('slider-update');
    Route::delete('slider/{id}/delete', [SliderController::class, 'destroy'])->name('slider-delete');
});

    // Auth Login admin
    Route::post('/login', [AdminController::class, 'authenticated'])->name('authenticated');
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::post('/register', [AdminController::class, 'register_action'])->name('register-action');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Front End
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/news', [HomeController::class, 'news'])->name('news');

    // Front End Details
    Route::get('news/{id}', [HomeController::class, 'detailsNews'])->name('detail-news'); // Route untuk menampilkan detail berita beserta komentar
    Route::get('portfolio/{id}', [HomeController::class, 'detailPortfolio'])->name('detail-portfolio');
    ROute::get('service/{id}', [HomeController::class, 'detailService'])->name('detail-service');

    // Comment simpan
    Route::post('news/{news_id}/comments', [CommentController::class, 'store'])->name('comments-store');
    
    