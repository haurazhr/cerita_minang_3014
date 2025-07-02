<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HauraKategoriController extends Controller
{
    public function index()
    {
        $kategoris = HauraKategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required']);
        HauraKategori::create(['nama_kategori' => $request->nama_kategori]);
        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = HauraKategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = HauraKategori::findOrFail($id);
        $request->validate(['nama_kategori' => 'required']);
        $kategori->update(['nama_kategori' => $request->nama_kategori]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = HauraKategori::findOrFail($id);
        $kategori->delete();
        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
