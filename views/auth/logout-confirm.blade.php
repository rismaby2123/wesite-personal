@extends('layouts.app') {{-- Gunakan layout utama jika ada --}}

@section('content')
<div class="d-flex" style="min-height: 100vh">
    <!-- Sidebar -->
    <div class="bg-light p-3" style="width: 250px;">
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="/beranda" class="nav-link fw-bold">Beranda</a></li>
            <li class="nav-item mb-2"><a href="/produk" class="nav-link fw-bold">Produk</a></li>
            <li class="nav-item mb-2"><a href="/kontak" class="nav-link fw-bold">kontak</a></li>
            <li class="nav-item mb-2"><a href="/produk-detail" class="nav-link fw-bold">Detail Produk</a></li>
        </ul>

        <div class="mt-auto p-3">
            <a href="{{ route('logout.confirm') }}" class="nav-link text-danger fw-bold">
                <span>→</span> Keluar
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-fill d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h3 class="fw-bold mb-3">Keluar</h3>
            <p class="mb-4">Anda Yakin Ingin Keluar</p>

            <div class="d-flex justify-content-center gap-3">
                <a href="/beranda" class="btn btn-secondary">Batal</a>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
