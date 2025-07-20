<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Produk UMKM Desa Pucangsari</h2>

        @if($produk->isEmpty())
            <div class="alert alert-info">Belum ada produk yang tersedia.</div>
        @else
            <div class="row">
                @foreach($produk as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('produk.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Detail Produk</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="/dashboard" class="btn btn-secondary mt-4">Kembali ke Dashboard</a>
    </div>
</body>
</html>
