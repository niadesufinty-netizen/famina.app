<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('Daftar');
    }
    public  function register(Request $request) {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8'],
        'foto_profil' => ['nullable', 'image', 'mines:jpeg,png,jpg', 'max:2048'],
        ]);

        $path = null;
        if ($request->hasFile('foto_profil')) {
            $path = $request->File('foto_profil')->store('foto_profil', 'public');
        }

        user::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->passwors,
            'foto_profil' =>$path,
        ]);
        return redirect('/selamatdatang')->with('success', 'Akun berhasil dibuat');
    }
}
