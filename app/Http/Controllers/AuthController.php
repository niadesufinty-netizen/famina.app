<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat; // Pastikan tulisannya sama persis dengan nama file model kamu

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('Daftar');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
            'foto_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $path = null;
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_profil' => $path,
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        session([
            'userId' => $user->id,
            'userName' => $user->name,
            'userFoto' => $user->foto_profil,
            'userBio' => $user->bio,
        ]);

        return redirect('/selamatdatang')->with('userName', $request->name);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $userCheck = User::where('email', $request->email)->first();

        if (!$userCheck) {
            return back()->with('error_login', 'Waduh, kamu belum punya akun nih... Daftar dulu yuk!');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            session([
                'userId' => $user->id,
                'userName' => $user->name,
                'userFoto' => $user->foto_profil,
                'userBio' => $user->bio,
            ]);

            return redirect()->intended('/selamatdatang');
        }

        return back()->with('error_login', 'Password kamu salah, coba diingat-ingat lagi ya!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        session()->forget(['userId', 'userName', 'userFoto', 'userBio']);

        return redirect('/');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:500'],
            'foto_profil' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $user = Auth::user();

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->foto_profil = $path;
        }

        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->save();

        session([
            'userName' => $user->name,
            'userFoto' => $user->foto_profil,
            'userBio' => $user->bio,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
    

// FUNGSI HAPUS RIWAYAT
    public function destroyRiwayat($id)
    {
        // Pastikan nama model sesuai: Riwayat atau RiwayatBmi? 
        // Kalau di file model namanya RiwayatBmi.php, pakai RiwayatBmi
        $riwayat = \App\Models\Riwayat::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($riwayat) {
            $riwayat->delete();
            return back(); // Langsung balik ke halaman profil
        }

        return back()->with('error', 'Data gagal dihapus');
    }

    // FUNGSI HAPUS AKUN (VERSI GABUNGAN & BERSIH)
    public function destroyAccount(Request $request)
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return back();
        }

        // 1. Hapus foto profil dari storage biar gak jadi sampah
        if ($user->foto_profil) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($user->foto_profil);
        }

        // 2. Hapus data user dari database
        $user->delete();

        // 3. Logout dan bersihkan session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Hapus data session manual (opsional tapi bagus)
        session()->forget(['userId', 'userName', 'userFoto', 'userBio']);

        // 4. Balik ke landing page
        return redirect('/')->with('success', 'Akun kamu telah dihapus permanen.');
    }
}