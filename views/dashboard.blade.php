<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - UMKM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #5EABD6
            
        }

        .sidebar {
            height: 100vh;
            background-color: #7d9cbdff;
            padding: 30px 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            margin: 20px 0;
            font-weight: bold;
            color: #000;
            text-decoration: none;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            padding: 60px;
        }

        .content h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <div class="logo text-primary mb-4 fs-5"><i class="bi bi-shop"></i> UMKM Pucangsari</div>

            {{-- ✅ Notifikasi sukses --}}
  @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
        {{ session('success') }}
    </div>
  @endif

            <a href="{{ route('dashboard') }}"><i class="bi bi-house-door-fill"></i> Beranda</a>
            <a href="{{ route('produk') }}"><i class="bi bi-box-seam"></i> Produk</a>
            <a href="{{ route('kontak') }}"><i class="bi bi-telephone-fill"></i> Kontak Kami</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              ><i class="bi bi-box-arrow-right"></i> Keluar
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 content text-center">
            <h2>Bangun UMKM Desa Pucangsari Dengan Digitalisasi Pemasaran</h2>
            <p class="mt-3">Meningkatkan jangkauan pasar dan penjualan produk UMKM
                 dengan aplikasi berbasis web yang mudah digunakan.</p>
                 <div style="text-align: center; margin-top: 20px;">
    <img src="{{ asset('images/money.gif') }}" alt="Animasi UMKM" style="max-width: 300px; height: auto;">
</div>

        </div>
    </div>
</div>

</body>
</html>
