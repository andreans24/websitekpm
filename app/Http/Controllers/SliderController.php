<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('project.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('project.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('images_slider'), $fileName);
        }

        // Create Slider
        Slider::create([
            'image' => 'images_slider/' . $fileName,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('slider-index')->with('success', 'Slider Create Successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('project.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $slider = Slider::findOrFail($id);

        // Jika ada gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari direktori `public`
            if (File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('images_slider'), $fileName);

            // Update path gambar
            $slider->image = 'images_slider/' . $fileName;
        }

        // Update data slider
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();

        return redirect()->route('slider-index')->with('success', 'Slider Update Successfully!');
    }

    public function destroy($id)
    {
        // Temukan slider berdasarkan ID yang diberikan
        $slider = Slider::findOrFail($id);
        
        if (File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }

        // Hapus slider dari database
        $slider->delete();

        // Redirect ke halaman index slider dengan pesan sukses
        return redirect()->route('slider-index')->with('success', 'Slider Deleted Successfully!');
    }

}
