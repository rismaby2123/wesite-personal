<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{

    public function hapus($id)
{
    $produk = Produk::findOrFail($id);

    // Hapus gambar jika ada
    if ($produk->gambar) {
        \Storage::disk('public')->delete($produk->gambar);
    }

    $produk->delete();

    return redirect()->route('produk')->with('success', 'Produk berhasil dihapus.');
}


    // Menampilkan daftar produk (dengan pencarian)
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search') && $request->search !== null) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $produk = $query->get();

        return view('produk', compact('produk'));
    }

    // Menampilkan detail produk berdasarkan ID
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk')); // pastikan view-nya adalah show.blade.php
    }

    // Menampilkan form tambah produk (jika digunakan)
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan produk baru (jika digunakan)
   public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'keterangan' => 'nullable|string',
        'whatsapp' => 'nullable|string',        
    ]);

    // Upload gambar jika ada
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('gambar_produk', 'public');
    }

    

    // Simpan ke database
    Produk::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'keterangan' => $request->keterangan,
        'whatsapp' => $request->whatsapp,
        'gambar' => $gambarPath,
    ]);

    return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
}
}