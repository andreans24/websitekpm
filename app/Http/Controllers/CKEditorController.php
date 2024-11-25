<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            // Mendapatkan nama file asli dan ekstensi
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            // Buat nama file dengan format: namafile_timestamp.ext
            $date = date('d-m-Y');
            $fileName = $fileName . '_' . $date . '.' . $extension;

            // Menentukan path tujuan di dalam folder public
            $destinationPath = public_path('service_images/media/' . $fileName);

            // Memindahkan file ke folder public
            $request->file('upload')->move(public_path('service_images/media'), $fileName);

            // URL yang dapat diakses oleh browser
            $url = asset('service_images/media/' . $fileName);

            // Kembalikan respons ke CKEditor
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function uploadNews(Request $request)
    {
        if ($request->hasFile('upload')) {

            // Mendapatkan nama file asli dan ekstensi
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            // Buat nama file dengan format: namafile_timestamp.ext
            $date = date('d-m-Y');
            $fileName = $fileName . '_' . $date . '.' . $extension;

            // Menentukan path tujuan di dalam folder public
            $destinationPath = public_path('news_images/content_news/' . $fileName);

            // Memindahkan file ke folder public
            $request->file('upload')->move(public_path('news_images/content_news'), $fileName);

            // URL yang dapat diakses oleh browser
            $url = asset('news_images/content_news/' . $fileName);

            // Kembalikan respons ke CKEditor
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function portfolioCkeditor()
    {
        if ($request->hasFile('upload')) {

            // Mendapatkan nama file asli dan ekstensi
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            // Buat nama file dengan format: namafile_timestamp.ext
            $date = date('d-m-Y');
            $fileName = $fileName . '_' . $date . '.' . $extension;

            // Menentukan path tujuan di dalam folder public
            $destinationPath = public_path('portfolio_images/content_portfolio/' . $fileName);

            // Memindahkan file ke folder public
            $request->file('upload')->move(public_path('portfolio_images/content_portfolio'), $fileName);

            // URL yang dapat diakses oleh browser
            $url = asset('portfolio_images/content_portfolio/' . $fileName);

            // Kembalikan respons ke CKEditor
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    
}
