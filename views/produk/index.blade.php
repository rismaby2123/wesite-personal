@extends('layouts.app')

@section('content')

@extends('layouts.app')

{{-- Tambahkan style di sini --}}
<style>
.grid-produk {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}
.grid-produk .card {
    flex: 1 0 200px;
    max-width: 250px;
    height: 100%;
}
.card img {
    height: x;
    object-fit: cover;
}
</style>


<div class="max-w-4xl mx-auto mt-10">

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container my-5">
        <h2 class="text-center mb-4">🛍️ Daftar Produk UMKM Desa Pucangsari</h2>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('produk.create') }}" class="btn btn-success">➕ Tambah Produk</a>
            <form action="{{ route('produk.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">🔍 Telusuri</button>
            </form>
        </div>

       <div class="grid-produk">
    @foreach ($produk as $item)
        <div class="card shadow-sm">
            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top">
            <div class="card-body text-center">
                <h6 class="card-title">{{ $item->nama }}</h6>
                <p class="card-text text-muted" style="font-size: 14px;">
                    {{ Str::limit($item->keterangan, 50) }}
                </p>
                <p class="fw-bold text-primary">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
            </div>
            <div class="card-footer text-center bg-white border-0">
                <a href="{{ route('produk.show', $item->id) }}" class="btn btn-outline-primary btn-sm">🔍 Detail</a>
                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">🗑 Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
