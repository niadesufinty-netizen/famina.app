<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    /**
     * Mengalihkan user ke halaman pemilihan akun Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Menangani data yang dikirim balik oleh Google setelah pilih akun.
     */
    public function handleGoogleCallback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cari user di database berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika user belum terdaftar, buat akun baru otomatis
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(Str::random(24)), // Password acak karena login lewat Google
                    // 'foto_profil' => $googleUser->getAvatar(), // Opsional: simpan foto profil Google
                ]);
            }

            // Login-kan user ke sistem Laravel
            Auth::login($user);

            // PAKSA REDIRECT KE HALAMAN UTAMA (HOME)
            // Ganti '/' menjadi rute home kamu, misal '/bmi' atau '/index'
            return redirect('/')->with('success', 'Selamat datang, ' . $user->name . '!');

        } catch (\Exception $e) {
            // Jika ada error (misal user cancel login), balikkan ke login dengan pesan error
            return redirect('/login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}