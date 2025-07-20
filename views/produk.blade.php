<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            height: 100%;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .search-form {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Produk UMKM Desa Pucangsari</h2>

    <!-- ✅ Alert Sukses -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- ✅ Tombol Tambah Produk -->
    @auth
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('produk.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Produk
            </a>
        </div>
    @endauth

    <!-- ✅ Form Pencarian -->
    <form action="{{ route('produk') }}" method="GET" class="search-form d-flex justify-content-end">
        <input type="text" name="search" class="form-control w-25 me-2" placeholder="Cari produk..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Telusuri
        </button>
    </form>

    <!-- ✅ Daftar Produk -->
    @if($produk->isEmpty())
        <div class="alert alert-info">Belum ada produk yang tersedia.</div>
    @else
        <div class="row">
            @foreach($produk as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->keterangan }}</p>
                            <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('produk.show', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-info-circle"></i> Detail
                            </a>
                            <div class="d-flex gap-2 mt-2">
                                <!-- Tombol Hapus -->
                                <form action="{{ route('produk.hapus', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="/dashboard" class="btn btn-secondary mt-4">← Kembali ke Dashboard</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
