<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index()
    {
        $laundries = Laundry::latest()->get();
        return view('laundries.index', compact('laundries'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('laundries.create');
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'berat' => 'required|numeric',
        ]);

        $harga_per_kg = 5000;
        $total = $request->berat * $harga_per_kg;

        Laundry::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'berat' => $request->berat,
            'total_harga' => $total,
            'status' => 'Pending',
        ]);

        return redirect()->route('laundries.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Laundry $laundry)
    {
        return view('laundries.edit', compact('laundry'));
    }

    // Update data
    public function update(Request $request, Laundry $laundry)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'berat' => 'required|numeric',
            'status' => 'required',
        ]);

        $harga_per_kg = 5000;
        $total = $request->berat * $harga_per_kg;

        $laundry->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'berat' => $request->berat,
            'total_harga' => $total,
            'status' => $request->status,
        ]);

        return redirect()->route('laundries.index')->with('success', 'Data berhasil diupdate!');
    }

    // Hapus data
    public function destroy(Laundry $laundry)
    {
        $laundry->delete();
        return redirect()->route('laundries.index')->with('success', 'Data dihapus!');
    }
}