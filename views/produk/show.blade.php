@extends('layouts.app') {{-- Pastikan file ini extend layout utama --}}

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="row g-0">
            @if($produk->gambar)
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded-start" alt="{{ $produk->nama }}">
                </div>
            @endif
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title mb-3">{{ $produk->nama }}</h3>
                    <h5 class="text-success">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h5>
                    <p class="card-text mt-3"><strong>Keterangan:</strong><br>{{ $produk->keterangan ?? 'Tidak ada keterangan.' }}</p>

                   
                    @if($produk->whatsapp)
                    <p><strong>whatsApp:</strong> {{ $produk->whatsapp }}<br>
                        <a href="https://wa.me/{{ $produk->whatsapp }}" target="_blank" class="btn btn-success btn-sm">
                            Chat UMKM
                        </a>
                    </p>
                    @endif

                    @if($produk->kategori)
                    <span class="badge bg-primary">{{ $produk->kategori }}</span>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('produk') }}" class="btn btn-secondary">← Kembali ke Daftar Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
