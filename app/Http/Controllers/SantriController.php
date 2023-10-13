<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::all();
        return view('santri.index', compact('santris'));
    }

    public function create()
    {
        return view('santri.create');
    }

    public function store(Request $request)
    {
        // Anda bisa menambahkan validasi disini
        $data = $request->all();
        Santri::create($data);
        return redirect()->route('santri.index')->with('success', 'Santri berhasil ditambahkan');
    }

    public function show(Santri $santri)
    {
        return view('santri.show', compact('santri'));
    }

    public function edit(Santri $santri)
    {
        return view('santri.edit', compact('santri'));
    }

    public function update(Request $request, Santri $santri)
    {
        // Dan juga validasi disini
        $data = $request->all();
        $santri->update($data);
        return redirect()->route('santri.index')->with('success', 'Data santri berhasil diupdate');
    }

    public function destroy(Santri $santri)
    {
        $santri->delete();
        return redirect()->route('santri.index')->with('success', 'Data santri berhasil dihapus');
    }
}
