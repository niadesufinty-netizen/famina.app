<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class BmiController extends Controller
{
    public function hitung(Request $request)
    {
        $request->validate([
            'berat' =>  ['required', 'numeric', 'min:1'],
            'tinggi' => ['required', 'numeric', 'min:1'],

        ]);

        $berat = $request->berat;
        $tinggi = $request->tinggi;

        $tinggiM = $tinggi / 100;
        $bmi = $berat / ($tinggiM ** 2);

        if ($bmi < 18.5) {
            $kategori = "kekurangan berat badan";
            
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $kategori = "Berat Badan ideal";

        } elseif ($bmi >= 25 && $bmi < 30) {
            $kategori = "Berat badan berlebih";
        } else {
            $kategori = "Obesitas";
        }
        return view('bmi', [
            'skor' => round($bmi, 1),
            'status' => $kategori
        ]);
    }
}