<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;

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
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('team_images'), $imageName);
            $imagePath = 'team_images/' . $imageName;
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
            if ($team->image) {
                $oldImagePath = public_path($team->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('team_images'), $imageName);
            $team->image = 'team_images/' . $imageName;
        }

        $team->save();

        return redirect()->route('team-index')->with('success', 'Team berhasil di updated');
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team->image) {
            $imagePath = public_path($team->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $team->delete();

        return redirect()->route('team-index')->with('success', 'Team berhasil di delete');
    }
}
