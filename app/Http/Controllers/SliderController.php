<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);
        // Ambil nama file asli
        $originalName = $request->file('image')->getClientOriginalName();

        // Buat nama baru dengan timestamp
        $timestamp = time(); // Atau gunakan uniqid() untuk ID unik
        $fileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $timestamp . '.' . $request->file('image')->getClientOriginalExtension();

        // Simpan gambar dengan nama baru
        $imagePath = $request->file('image')->storeAs('images_slider', $fileName, 'public');

        // Create Slider
        Slider::create([
            'image' => $imagePath,
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
            // Hapus gambar lama dari storage
            Storage::disk('public')->delete($slider->image);

            // Ambil nama file asli
            $originalName = $request->file('image')->getClientOriginalName();
            
            // Buat nama baru dengan timestamp
            $timestamp = time(); // Atau gunakan uniqid() untuk ID unik
            $fileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $timestamp . '.' . $request->file('image')->getClientOriginalExtension();

            // Simpan gambar baru dengan nama yang sudah diubah
            $imagePath = $request->file('image')->storeAs('images_slider', $fileName, 'public');

            // Update field gambar di database
            $slider->image = $imagePath;
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
        
        // Hapus Gambar dari storage
        Storage::disk('public')->delete($slider->image);

        // Hapus slider dari database
        $slider->delete();

        // Redirect ke halaman index slider dengan pesan sukses
        return redirect()->route('slider-index')->with('success', 'Slider Deleted Successfully!');
    }

}
