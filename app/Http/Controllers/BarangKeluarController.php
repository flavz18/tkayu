<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index(){

        $barangKeluar  = BarangKeluar::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
                        ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
                        ->select('tbl_barang_keluar.*', 'tbl_kategori.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                        ->get();
                        
        $data = array(
            'title'               => 'Data Barang',
            'data_barang_keluar'   => $barangKeluar,
         );

            return view('gudang.barangkeluar.list', $data);
    }

    public function create()
    {
        // Tampil Barang
        $barang  = Barang::join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
        ->select('tbl_barang.*', 'tbl_kategori.nama_kategori')
        ->get();

        $data = array(
            'title'       => 'Create Data Barang Keluar',
            'data_barang' => $barang,
        );

        return view('gudang.barangkeluar.add', $data);
    }

    public function store(Request $request)
    {
        $id_barang = $request->id_barang;

        BarangKeluar::create([
            'id_barang'      => $request->id_barang,
            'tgl_keluar'     => $request->tgl_keluar,
            'qty_keluar'     => $request->qty_keluar,
            'total_keluar'   => $request->total_keluar,
        ]);

        $barang = Barang::find($id_barang);
        $barang->stok -= $request->qty_keluar;
        $barang->save();

        return redirect('/barangkeluar')->with('success', 'Data Berhasil Disimpan');
    }

}
