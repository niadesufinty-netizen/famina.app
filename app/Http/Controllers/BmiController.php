<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Artikel; 

class BmiController extends Controller
{
    public function index()
    {
        $tips = Artikel::where('kategori', 'Tips')->limit(3)->get();
        return view('bmi', compact('tips'));
    }

    public function detail($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel', compact('artikel'));
    }

    public function semuaArtikel(Request $request)
{
    $cari = $request->query('cari');

    if ($cari) {
        // Mencari di Judul, Deskripsi Singkat, DAN Isi Artikel
        $artikels = Artikel::where('judul', 'LIKE', "%{$cari}%")
                            ->orWhere('deskripsi_singkat', 'LIKE', "%{$cari}%")
                            ->orWhere('isi_artikel', 'LIKE', "%{$cari}%")
                            ->orWhere('kategori', 'LIKE', "%{$cari}%")
                            ->get();
    } else {
        $artikels = Artikel::latest()->get();
    }

    return view('daftarartikel', compact('artikels', 'cari'));
}


    public function hitung(Request $request)
    {
        $request->validate([
            'berat' =>  ['required', 'numeric', 'min:1'],
            'tinggi' => ['required', 'numeric', 'min:1'],
            'gender' => ['required'], 
        ]);

        $berat = $request->berat;
        $tinggi = $request->tinggi;
        $gender = $request->gender; 
        $tinggiM = $tinggi / 100;
        
        $skor = round($berat / ($tinggiM ** 2), 1);

        if ($skor < 18.5) {
            $kategori = "Berat badan kurang";
        } elseif ($skor >= 18.5 && $skor < 25) {
            $kategori = "Berat badan ideal";
        } elseif ($skor >= 25 && $skor < 30) {
            $kategori = "Berat badan berlebih";
        } else {
            $kategori = "Obesitas";
        }

        if (session('userId')) {
            Riwayat::create([
                'user_id' => session('userId'),
                'berat_badan' => $berat,
                'tinggi_badan' => $tinggi,
                'jenis_kelamin' => $gender, 
                'skor_bmi' => $skor,
                'status' => $kategori,
            ]);
        }



        session([
            'last_bmi' => $skor,
            'bmi_status' => $kategori
        ]);

        return redirect()->back()->with([
            'skor' => $skor,
            'status' => $kategori
        ])->withInput();
    }
}