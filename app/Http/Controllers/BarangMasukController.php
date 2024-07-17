<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index(){

        $barangMasuk  = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                        ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
                        ->select('tbl_barang_masuk.*', 'tbl_kategori.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                        ->get();
                        
        $data = array(
            'title'               => 'Data Barang',
            'data_barang_masuk'   => $barangMasuk,
         );

            return view('gudang.barangmasuk.list', $data);
    }

    public function create()
    {
        // Tampil Barang
        $barang  = Barang::join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
        ->select('tbl_barang.*', 'tbl_kategori.nama_kategori')
        ->get();

        $data = array(
            'title'       => 'Create Data Barang Masuk',
            'data_barang' => $barang,
        );

        return view('gudang.barangmasuk.add', $data);
    }

    public function store(Request $request)
    {
        $id_barang = $request->id_barang;

        BarangMasuk::create([
            'id_barang'     => $request->id_barang,
            'tgl_masuk'     => $request->tgl_masuk,
            'qty_masuk'     => $request->qty_masuk,
            'total_masuk'   => $request->total_masuk,
        ]);

        $barang = Barang::find($id_barang);
        $barang->stok += $request->qty_masuk;
        $barang->save();

        return redirect('/barangmasuk')->with('success_store', 'Data Berhasil Disimpan');
    }

}
