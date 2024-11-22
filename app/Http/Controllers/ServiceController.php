<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Categorie;
use App\Models\Office;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('categorie')->get();
        return view('project.service.index', compact('services'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('project.service.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'images' => 'required|image',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        if($request->hasFile('images')) {
            $originalName = pathinfo($request->file('images')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();

            $date = date('d-m-Y');
            $fileName = $originalName . '_' . $date . '.' . $extension;

            $imagePath = $request->file('images')->storeAs('service_images', $fileName, 'public');
            $validated['images'] = $imagePath;
        }

        Service::create($validated);
        return redirect()->route('serv')->with('success', 'Service created successfully');
    }


    // public function show(Service $service)
    //     {
    //         return view('project.service.show', compact('service'));
    //     }

    public function edit(Service $service)
    {
        $categories = Categorie::all();
        return view('project.service.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'images' => 'nullable|image',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Cek apakah ada file gambar baru
        if ($request->hasFile('images')) {
            // Hapus file gambar lama dari storage
            if ($service->images) {
                Storage::disk('public')->delete($service->images);
            }
            // Simpan gambar baru dengan nama original dan tanggal
            $originalName = pathinfo($request->file('images')->getClientOriginalName(), PATHINFO_FILENAME);
            $date = now()->format('d-m-Y'); // Menggunakan format tanggal
            $extension = $request->file('images')->getClientOriginalExtension();
            
            // Simpan file gambar yang baru tanpa menambahkan angka
            $fileName = $originalName . '_' . $date . '.' . $extension;

            // Simpan gambar baru
            $imagePath = $request->file('images')->storeAs('service_images', $fileName, 'public');
            $validated['images'] = $imagePath;
        } else {
            // Jika tidak ada file gambar baru, tetap gunakan gambar yang ada
            $validated['images'] = $service->images;
        }

        $service->update($validated);
        return redirect()->route('serv')->with('success', 'Service Updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->images) {
            Storage::disk('public')->delete($service->images);
        }

        $service->delete();
        return redirect()->route('serv')->with('success', 'Service deleted successfully.');
    }

}