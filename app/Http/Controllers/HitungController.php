<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function hitung(Request $request)
    {
        $kriteria = Kriteria::sum('bobot');
    
        if ($kriteria == 0) {
            // Handle case where total bobot is zero
            return redirect()->back()->with('error', 'Total bobot kriteria adalah nol.');
        }
    
        $bobot1 = 0.3 / $kriteria;
        $bobot2 = 0.2 / $kriteria;
        $bobot3 = 0.2 / $kriteria;
        $bobot4 = 0.1 / $kriteria;
        $bobot5 = 0.2 / $kriteria;
    
        $widget1 = ['kriteria' => $bobot1];
        $widget2 = ['kriteria' => $bobot2];
        $widget3 = ['kriteria' => $bobot3];
        $widget4 = ['kriteria' => $bobot4];
        $widget5 = ['kriteria' => $bobot5];
    
        $data = Alternatif::orderBy('alternatif', 'asc')->get();
    
        $minC1 = Alternatif::min('hargalahan');
        $maxC1 = Alternatif::max('hargalahan');
        $minC2 = Alternatif::min('kepadatanpenduduk');
        $maxC2 = Alternatif::max('kepadatanpenduduk');
        $minC3 = Alternatif::min('aksebilitas');
        $maxC3 = Alternatif::max('aksebilitas');
        $minC4 = Alternatif::min('keamanan');
        $maxC4 = Alternatif::max('keamanan');
        $minC5 = Alternatif::min('jenis');
        $maxC5 = Alternatif::max('jenis');
    
        // Handle division by zero
        $hasil = $maxC1 != 0 ? $minC1 / $maxC1 : 0;
        $hasil1 = ['alternatif' => $hasil];
    
        return view('hitung', compact('hasil1', 'data', 'widget1', 'widget2', 'widget3', 'widget4', 'widget5', 'minC1', 'maxC1', 'minC2', 'maxC2', 'minC3', 'maxC3', 'minC4', 'maxC4', 'minC5', 'maxC5'));
    }
    
    public function rekomendasi()
    {
        // Implementasi fungsi rekomendasi
    }
}
