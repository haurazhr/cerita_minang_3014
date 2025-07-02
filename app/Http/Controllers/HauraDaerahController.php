<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HauraDaerahController extends Controller
{
    public function index()
    {
        $daerahs = HauraDaerah::all();
        return view('daerah.index', compact('daerahs'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama_daerah' => 'required']);
        HauraDaerah::create(['nama_daerah' => $request->nama_daerah]);
        return back()->with('success', 'Daerah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $daerah = HauraDaerah::findOrFail($id);
        return view('daerah.edit', compact('daerah'));
    }

    public function update(Request $request, $id)
    {
        $daerah = HauraDaerah::findOrFail($id);
        $request->validate(['nama_daerah' => 'required']);
        $daerah->update(['nama_daerah' => $request->nama_daerah]);
        return redirect()->route('daerah.index')->with('success', 'Daerah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $daerah = HauraDaerah::findOrFail($id);
        $daerah->delete();
        return back()->with('success', 'Daerah berhasil dihapus');
    }
}

