<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat_bmi'; 

    protected $fillable = [
        'user_id', 
        'berat_badan', 
        'tinggi_badan', 
        'skor_bmi', 
        'status',
        'jenis_kelamin',
    ]; 

}
