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

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $date = now()->format('d-m-Y'); // Format tanggal
            $fileName = $originalName . '_' . $date . '.' . $extension;

            // Simpan langsung ke folder public/service_images
            $destinationPath = public_path('service_images');
            $file->move($destinationPath, $fileName);

            // Simpan path gambar ke database
            $validated['images'] = 'service_images/' . $fileName;
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
            // Hapus gambar lama
            if ($service->images && file_exists(public_path($service->images))) {
                unlink(public_path($service->images));
            }

            $file = $request->file('images');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $date = now()->format('d-m-Y'); // Format tanggal
            $fileName = $originalName . '_' . $date . '.' . $extension;

            // Simpan langsung ke folder public/service_images
            $destinationPath = public_path('service_images');
            $file->move($destinationPath, $fileName);

            // Simpan path gambar baru ke database
            $validated['images'] = 'service_images/' . $fileName;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $validated['images'] = $service->images;
        }

        $service->update($validated);
        return redirect()->route('serv')->with('success', 'Service Updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->images && file_exists(public_path($service->images))) {
            unlink(public_path($service->images));
        }

        $service->delete();
        return redirect()->route('serv')->with('success', 'Service deleted successfully.');
    }

}