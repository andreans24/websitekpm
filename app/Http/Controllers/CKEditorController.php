<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            // Buat nama file dengan format: namafile_timestamp.ext
            $date = date('d-m-Y');
            $fileName = $fileName . '_' . $date . '.' . $extension;


            // Simpan file ke storage (di bawah 'public/service_images/media')
            $path = $request->file('upload')->storeAs('service_images/media', $fileName, 'public');

            // Hasilkan URL yang dapat diakses oleh browser
            $url = Storage::url($path);

            // Kembalikan respons ke CKEditor
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function uploadNews(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            // Buat nama file dengan format: namafile_timestamp.ext
            $date = date('d-m-Y');
            $fileName = $fileName . '_' . $date . '.' . $extension;


            // Simpan file ke storage (di bawah 'public/service_images/media')
            $path = $request->file('upload')->storeAs('news_images/content_news', $fileName, 'public');

            // Hasilkan URL yang dapat diakses oleh browser
            $url = Storage::url($path);

            // Kembalikan respons ke CKEditor
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function portfolioCkeditor()
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            // Buat nama file dengan format: namafile_timestamp.ext
            $date = date('d-m-Y');
            $fileName = $fileName . '_' . $date . '.' . $extension;


            // Simpan file ke storage (di bawah 'public/service_images/media')
            $path = $request->file('upload')->storeAs('portfolio_images/content_portfolio', $fileName, 'public');

            // Hasilkan URL yang dapat diakses oleh browser
            $url = Storage::url($path);

            // Kembalikan respons ke CKEditor
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    
}
