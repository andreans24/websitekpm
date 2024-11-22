<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('project.team.index', compact('teams'));
    }

    public function create()
    {
        return view('project.team.create');
    }

    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'social_media_1' => 'nullable|url',
            'social_media_2' => 'nullable|url',
            'social_media_3' => 'nullable|url',
            'social_media_4' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('team_images/', $imageName, 'public');
        }

        // Simpan data ke database
        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'social_media_1' => $request->social_media_1,
            'social_media_2' => $request->social_media_2,
            'social_media_3' => $request->social_media_3,
            'social_media_4' => $request->social_media_4,
            'image' => $imagePath, // Simpan path gambar
        ]);

        return redirect()->route('team-index')->with('success', 'Team berhasil di simpan');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('project.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'social_media_1' => 'nullable|url',
            'social_media_2' => 'nullable|url',
            'social_media_3' => 'nullable|url',
            'social_media_4' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $team = Team::findOrFail($id);

        $team->name = $request->input('name');
        $team->position = $request->input('position');
        $team->social_media_1 = $request->input('social_media_1');
        $team->social_media_2 = $request->input('social_media_2');
        $team->social_media_3 = $request->input('social_media_3');
        $team->social_media_4 = $request->input('social_media_4');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            
            // Simpan gambar baru
            $imageName = time(). '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('team_images', $imageName, 'public');
            $team->image = $imagePath; // Update image path
        }

        $team->save();

        return redirect()->route('team-index')->with('success', 'Team berhasil di updated');
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team->image) {
            Storage::disk('public')->delete($team->image); // Hapus gambar dari folder public
        }
        $team->delete();

        return redirect()->route('team-index')->with('success', 'Team berhasil di delete');
    }
}
