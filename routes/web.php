<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BmiController;
use App\Models\Riwayat;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
});

Route::get('/selamatdatang', function () {
    return view('selamatdatang');
})->name('selamatdatang');

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);

Route::get('/daftar', [AuthController::class, 'showRegisterForm']);
Route::post('/daftar', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/bmi', [BmiController::class, 'index']);
Route::post('/hitung-bmi', [BmiController::class, 'hitung']);

Route::get('/artikel/{id}', function ($id) {
    $artikel = DB::table('artikel')->where('id', $id)->first();
    
    if (!$artikel) {
        abort(404);
    }

    return view('artikel', ['artikel' => $artikel]);
});

Route::get('/profil', function () {
    if (!session('userId')) {
        return redirect('/login');
    }

    $riwayat = Riwayat::where('user_id', session('userId'))
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

    return view('profil', compact('riwayat'));
});

Route::get('/riwayat', function () {
    if (!session('userId')) {
        return redirect('/login');
    }

    $riwayat = Riwayat::where('user_id', session('userId'))
                ->orderBy('created_at', 'desc')
                ->get();

    return view('riwayat', compact('riwayat'));
});

Route::post('/update-profil', [AuthController::class, 'updateProfile']);

Route::get('/daftarartikel', function () {
    $artikels = DB::table('artikel')->get(); 
    return view('daftarartikel', ['artikels' => $artikels]);
});

Route::get('/cari', function (Request $request) {
    $query = $request->q;
    $artikels = DB::table('artikel')
                ->where('judul', 'LIKE', "%$query%")
                ->get();

    return view('daftarartikel', ['artikels' => $artikels, 'keyword' => $query]);
});

Route::get('/info', function () {
    return view('info');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::delete('/hapus-riwayat/{id}', [AuthController::class, 'destroyRiwayat'])->middleware('auth');
Route::delete('/hapus-akun', [AuthController::class, 'destroyAccount'])->middleware('auth');