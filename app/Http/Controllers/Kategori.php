<?php

namespace App\Http\Controllers;

use App\Models\KategoriModels;
use Illuminate\Http\Request;

class Kategori extends Controller
{
    public function proses_data_kategori(Request $request){
        try {
            $validated = $request->validate([
                'nama_kategori' => 'required',
            ]);

            KategoriModels::create($validated);

            return redirect()->back()->with('sukses', 'Data kategori berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data kategori');
        }
    }

    public function read_data_kategori(){
            $kategori = KategoriModels::all();
            return view('admin.datakategori', compact('kategori'));
    }

    public function edit_data_kategori($id){
        $kategori = KategoriModels::findOrFail($id);
        return view('admin.editkategori', compact('kategori'));
    }

    public function update_data_kategori(Request $request, $id){
        try {
            $validated = $request->validate([
                'nama_kategori' => 'required',
            ]);

            $kategori = KategoriModels::findOrFail($id);
            $kategori->update($validated);

            return redirect()->route('data.kategori')->with('sukses', 'Data kategori berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data kategori');
        }
    }
}
