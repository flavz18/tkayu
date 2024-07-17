<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Kategori',
            'data_kategori' => Kategori::all(),
         );

            return view('admin.kategori.list', $data);
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success_store', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success_edit', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect('/kategori')->with('success_delete', 'Data Berhasil Dihapus');
    }
}
