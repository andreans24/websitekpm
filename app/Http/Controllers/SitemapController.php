<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\About;
use App\Models\News;

class SitemapController extends Controller
{
    public function generateSitemap()
    {
        // Membuat objek sitemap baru
        $sitemap = Sitemap::create();

        // Menambahkan URL secara manual
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'));
        $sitemap->add(Url::create('/about')->setPriority(0.8)->setChangeFrequency('weekly'));
        $sitemap->add(Url::create('/contact')->setPriority(0.8)->setChangeFrequency('monthly'));
        $sitemap->add(Url::create('/portfolio')->setPriority(0.8)->setChangeFrequency('weekly'));
        $sitemap->add(Url::create('/services')->setPriority(0.8)->setChangeFrequency('weekly'));
        $sitemap->add(Url::create('/news')->setPriority(0.8)->setChangeFrequency('weekly'));

        // Menambahkan URL untuk layanan (service) dari database
        $services = Service::all(); // Ambil semua layanan dari database
        foreach ($services as $service) {
            $sitemap->add(Url::create("/service/{$service->slug}")
                ->setPriority(0.7)
                ->setChangeFrequency('monthly')
                ->setLastModificationDate($service->updated_at)
            );
        }

        $portfolios = Portfolio::all(); // Ambil semua portfolio dari database
        foreach ($portfolios as $portfolio) {
            $sitemap->add(Url::create("/portfolio/{$portfolio->id}/{$portfolio->category->slug}")
                ->setPriority(0.7)
                ->setChangeFrequency('monthly')
                ->setLastModificationDate($portfolio->updated_at)
            );
        }

        

        // Simpan file sitemap.xml di public folder
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->json(['message' => 'Sitemap has been generated.']);
    }
}
