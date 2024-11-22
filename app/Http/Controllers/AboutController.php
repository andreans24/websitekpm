<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('project.about.index', compact('about'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // New controller
        $request->validate([
            'aboutMe' => 'required',
            'visiMisi' => 'required',
        ]);

        About::create([
            'about_me' => $request->aboutMe,
            'visi_misi' => $request->visiMisi,
        ]);

        return redirect()->route('about-index')->with('success', 'Successfully About created!');
    }

    public function form()
    {
        $about = About::findOrFail($id); // Ambil data berdasarkan ID
        return view('about.form', compact('about')); // Kirim data ke view
    }

    public function update(Request $request, $id)
    {

        // code baru
        $request->validate([
            'aboutMe' => 'required',
            'visiMisi' => 'required',
        ]);

        // Update data existing
        $about = About::findOrFail($id);
        $about->update([
            'about_me' => $request->aboutMe,
            'visi_misi' => $request->visiMisi,
        ]);

        return redirect()->route('about-index')->with('success', 'Data berhasil diperbarui');
    }
}
