<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){
        
        // $alternatif = Alternatif::where('id', $id)->first();

        // return view('editalternatif', [
        //     'alternatif' => $alternatif,
        //     'title' => 'Edit Data alternatif'
        // ]);
        return view('editalternatif')->with([
            'alternatif' => Alternatif::find($id),
        ]);

    }

    public function update(Request $request, $id) {
        $alternatif1      = $request->input('alternatif');
        $harga1 = $request->input('hargalahan');
        $ukuran1 = $request->input('kepadatanPenduduk');
        $merek1 = $request->input('aksebilitas');
        $warna1 = $request->input('keamanaan');
        $jenis1 = $request->input('jenis');
        
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->alternatif    = $alternatif1;
        $alternatif->hargalahan = $hargalahan1;
        $alternatif->kepadatanPenduduk = $kepadatanPenduduk1;
        $alternatif->aksebilitas = $aksebilitas1;
        $alternatif->keamanaan = $keamanaan1;
        $alternatif->jenis = $jenis1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $alternatif1 = $request->input('alternatif');
        $hargalahan1 = $request->input('hargalahan');
        $kepadatanPenduduk1 = $request->input('kepadatanpenduduk');
        $askebilitas1 = $request->input('aksebilitas');
        $keamanaan1 = $request->input('keamanan');
        $jenis1 = $request->input('jenis');
        ;

        $alternatif = new Alternatif;
        $alternatif->alternatif = $alternatif1;
        $alternatif->hargalahan = $hargalahan1;
        $alternatif->kepadatanPenduduk = $kepadatanPenduduk1;
        $alternatif->aksebilitas = $askebilitas1;
        $alternatif->keamanan = $keamanaan1;
        $alternatif->jenis = $jenis1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
