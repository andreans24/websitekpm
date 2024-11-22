<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function authenticated(Request $request)
    {
        // Code lama
        // if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])){
            
        //     return Redirect()->route('dashboard');
        // } else {
        //     // dd('login gagal');
        //     return back()->withErrors(['loginError' => 'Gagal login periksa kembali Name & Password anda!']);
        // }

        $admin = Admin::where('name', $request->name)->first();

        if ($admin && $admin->id != 1) {
            return back()->withErrors(['loginError' => 'Tidak sembarang masuk !!']);
        }

        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])) {
            return Redirect()->route('dashboard');
        } else {
            return back()->withErrors(['loginError' => 'Gagal login periksa kembali Name & Password anda!!']);
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'unitkerja' => 'required',
            'password' => 'required',
        ]);
        $admin = new Admin([
            'name' => $request->name,
            'email' => $request->email,
            'unitkerja' => $request->unitkerja,
            'password' => Hash::make($request->password),
        ]);
        $admin->save();
        return Redirect()->route('login')->with('success', 'Register Success. Please Login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function profile()
    {
        // $profile = Auth::guard('admin')->user();
        $profile = Admin::first(); //Ambil data pertama saja yang bisa login
        // dd($profile);
        if(!$profile) {
            return redirect()->route('profile')->with('error', 'profile not found');
        }
        return view('project.profile.profile', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'unitkerja' => 'required|string|max:255',
            'password' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $admin = Admin::findOrFail($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->unitkerja = $request->unitkerja;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
            dd($admin->password);
        }

        if ($request->hasFile('image')) {
            if ($admin->image && file_exists(public_path('images/'.$admin->image))) {
                unlink(public_path('images/'.$admin->image));
            }
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $admin->image = $imageName;
        }

        $admin->save();

        return redirect()->route('profile')->with('success', 'profile updated successfully!');
    }

}
