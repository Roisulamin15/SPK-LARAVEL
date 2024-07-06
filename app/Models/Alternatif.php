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
        'alternatif', 'hargalahan', 'kepadatanpenduduk', 'aksebilitas', 'keamanan', 'jenis',
    ];
    public $timestamps = FALSE;
    
}