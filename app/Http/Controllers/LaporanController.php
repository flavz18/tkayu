<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\Response;

class LaporanController extends Controller
{
    public function barangMasuk(Request $request)
    {
        $barangMasuk  = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
        ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
        ->select('tbl_barang_masuk.*', 'tbl_kategori.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
        ->get();

        $data = array(
            'title'               => 'Data Barang',
            'data_barang_masuk'   => $barangMasuk,
         );
        
        return view('admin.laporan.barangmasuk.list', $data);
        
    }

    public function filterMasuk(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $barangMasuk  = BarangMasuk::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
                    ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
                    ->where('tbl_barang_masuk.tgl_masuk', $tanggal)
                    ->select('tbl_barang_masuk.*', 'tbl_kategori.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                    ->get();

        $data = array(
            'title'             => "Data Barang",
            'data_barang_masuk' => $barangMasuk,
            'tanggal'           => $tanggal,
        );
        // Return filter data ke halaman view
        return view('admin.laporan.barangmasuk.list', $data);
    }

    public function exportMasuk(Request $request)
    {
        $data_barang_masuk = BarangMasuk::select('tbl_barang_masuk.id', 'tgl_masuk', 'nama_barang', 'nama_kategori', 'qty_masuk', 'harga', 'total_masuk')
        ->join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_masuk.id_barang')
        ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
        ->get();

        $total_masuk = $data_barang_masuk->sum('total_masuk');

        $headers = array(
            'No',
            'Tanggal',
            'Barang',
            'Kategori',
            'Qty',
            'Harga Beli',
            'Total'
        );

        $callback = function() use ($data_barang_masuk, $headers, $total_masuk) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);

            $no = 1;
            foreach ($data_barang_masuk as $row) {
                fputcsv($file, array(
                    $no,
                    $row->tgl_masuk,
                    $row->nama_barang,
                    $row->nama_kategori,
                    $row->qty_masuk . ' Pcs',
                    'Rp. ' . number_format($row->harga),
                    'Rp. ' . number_format($row->total_masuk)
                ));
                $no++;
            }

            fputcsv($file, array(
                '',
                '',
                '',
                '',
                '',
                'Total Keseluruhan',
                'Rp. ' . number_format($total_masuk)
            ));

            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="barang_masuk.csv"'
        ]);
    }

    public function barangKeluar(Request $request)
    {
        $barangKeluar  = BarangKeluar::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
                        ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
                        ->select('tbl_barang_keluar.*', 'tbl_kategori.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                        ->get();
                        
        $data = array(
            'title'               => 'Data Barang',
            'data_barang_keluar'   => $barangKeluar,
         );

        $barangKeluar = BarangKeluar::all();
        return view('admin.laporan.barangkeluar.list', $data);
    }

    public function filterKeluar(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $barangKeluar  = BarangKeluar::join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
                    ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
                    ->where('tbl_barang_keluar.tgl_keluar', $tanggal)
                    ->select('tbl_barang_keluar.*', 'tbl_kategori.nama_kategori', 'tbl_barang.nama_barang', 'tbl_barang.harga')
                    ->get();

        $data = array(
            'title'             => "Data Barang",
            'data_barang_keluar' => $barangKeluar,
            'tanggal'           => $tanggal,
        );
        // Return filter data ke halaman view
        return view('admin.laporan.barangkeluar.list', $data);
    }

    public function exportKeluar(Request $request)
    {
        $data_barang_keluar = BarangKeluar::select('tbl_barang_keluar.id', 'tgl_keluar', 'nama_barang', 'nama_kategori', 'qty_keluar', 'harga_jual', 'total_keluar')
        ->join('tbl_barang', 'tbl_barang.id', '=', 'tbl_barang_keluar.id_barang')
        ->join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_barang.id_kategori')
        ->get();

        $total_keluar = $data_barang_keluar->sum('total_keluar');

        $headers = array(
            'No',
            'Tanggal',
            'Barang',
            'Kategori',
            'Qty',
            'Harga Jual',
            'Total'
        );

        $callback = function() use ($data_barang_keluar, $headers, $total_keluar) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);

            $no = 1;
            foreach ($data_barang_keluar as $row) {
                fputcsv($file, array(
                    $no,
                    $row->tgl_keluar,
                    $row->nama_barang,
                    $row->nama_kategori,
                    $row->qty_keluar . ' Pcs',
                    'Rp. ' . number_format($row->harga_jual),
                    'Rp. ' . number_format($row->total_keluar)
                ));
                $no++;
            }

            fputcsv($file, array(
                '',
                '',
                '',
                '',
                '',
                'Total Keseluruhan',
                'Rp. ' . number_format($total_keluar)
            ));

            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="barang_keluar.csv"'
        ]);
    }
}
