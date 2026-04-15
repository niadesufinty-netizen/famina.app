<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class ArtikelController extends Controller
{
    public function cari(Request $request)
    {
        $query = $request->input('q');

      
        $artikels = DB::table('artikels')
                    ->where('judul', 'LIKE', "%{$query}%")
                    ->get();

        return view('daftarartikel', compact('artikels', 'query'));
    }
}