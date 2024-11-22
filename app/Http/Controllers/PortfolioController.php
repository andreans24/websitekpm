<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioCategories;
use App\Models\Office;
use Illuminate\Support\Facades\Storage;



class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('project.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = PortfolioCategories::all();
        return view('project.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:portfolio_categories,id',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
        ]);

        $category = PortfolioCategories::find($validated['category_id']);
        $folderName = $category->name;

        $images = [];
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $image = $request->file($imageField);
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Simpan gambar langsung di folder public
                $destinationPath = public_path('images_portfolio/' . $folderName);
                $image->move($destinationPath, $imageName);

                $images[$imageField] = 'images_portfolio/' . $folderName . '/' . $imageName;
            } else {
                $images[$imageField] = null;
            }
        }

        Portfolio::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'client' => $validated['client'],
            'project_date' => $validated['project_date'],
            'image1' => $images['image1'] ?? null,
            'image2' => $images['image2'] ?? null,
            'image3' => $images['image3'] ?? null,
            'image4' => $images['image4'] ?? null,
        ]);
        
        return redirect()->route('portfolios-index')->with('success', 'Portfolio created successfully!');
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = PortfolioCategories::all();
        return view('Project.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:portfolio_categories,id',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
        ]);

        // Update data portfolio
        $portfolio->update($validated);

        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Hapus gambar lama jika ada
                if ($portfolio->$imageField) {
                    $oldImagePath = public_path($portfolio->$imageField);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $image = $request->file($imageField);
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Simpan gambar baru
                $destinationPath = public_path('images_portfolio/' . $folderName);
                $image->move($destinationPath, $imageName);

                $portfolio->$imageField = 'images_portfolio/' . $folderName . '/' . $imageName;
            }
        }

        $portfolio->save();

        return redirect()->route('portfolios-index')->with('success', 'Portfolio updated successfully!');

    }

    public function destroy(Portfolio $portfolio)
    {
        $categoryFolder = strtolower($portfolio->category->name);
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($portfolio->$imageField) {
                $imagePath = public_path($portfolio->$imageField);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $portfolio->delete();
        return redirect()->route('portfolios-index')->with('success', 'Delete Portfolio Successfully!' );
    }


    
}

