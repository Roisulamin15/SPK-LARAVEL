<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $fillable = [
        'nama', 'harga_lahan', 'kepadatan_penduduk', 'aksebilitas', 'keamanan', 'jenis',
    ];
    public $timestamps = FALSE;
    
}