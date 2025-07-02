<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HauraCerita;
use App\Models\HauraKategori;
use App\Models\HauraDaerah;

class HauraCeritaController extends Controller
{
    public function index()
    {
        $ceritas = HauraCerita::with('kategori', 'daerah')->latest()->get();
        return view('cerita.index', compact('ceritas'));
    }

    public function create()
    {
        $kategoris = HauraKategori::all();
        $daerahs = HauraDaerah::all();
        return view('cerita.create', compact('kategoris', 'daerahs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'isi_cerita' => 'required',
            'nilai_moral' => 'nullable',
            'id_kategori' => 'required',
            'id_daerah' => 'required',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['gambar'] = 'uploads/'.$filename;
        }

        HauraCerita::create($data);
        return redirect()->route('cerita.index')->with('success', 'Cerita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cerita = HauraCerita::findOrFail($id);
        $kategoris = HauraKategori::all();
        $daerahs = HauraDaerah::all();
        return view('cerita.edit', compact('cerita', 'kategoris', 'daerahs'));
    }

    public function update(Request $request, $id)
    {
        $cerita = HauraCerita::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required',
            'isi_cerita' => 'required',
            'nilai_moral' => 'nullable',
            'id_kategori' => 'required',
            'id_daerah' => 'required',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['gambar'] = 'uploads/'.$filename;
        }

        $cerita->update($data);
        return redirect()->route('cerita.index')->with('success', 'Cerita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cerita = HauraCerita::findOrFail($id);
        $cerita->delete();
        return back()->with('success', 'Cerita berhasil dihapus');
    }
}
