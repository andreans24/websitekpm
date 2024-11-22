<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    public function office()
    {
        $office = Office::first();
        return view('project.office.office', compact('office'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'notlp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        Office::create([
            'alamat' => $request->alamat,
            'notlp' => $request->notlp,
            'email' => $request->email,
        ]);

        return redirect()->route('office')->with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'alamat' => 'required|string|max:255',
            'notlp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $office = Office::findOrFail($id);
        $office->update([
            'alamat' => $request->alamat,
            'notlp' => $request->notlp,
            'email' => $request->email,
        ]);

        return redirect()->route('office')->with('success', 'Updated Successfully!');
    }
}
