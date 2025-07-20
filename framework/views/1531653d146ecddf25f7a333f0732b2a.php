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
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- ✅ Tombol Tambah Produk -->
    <?php if(auth()->guard()->check()): ?>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Produk
            </a>
        </div>
    <?php endif; ?>

    <!-- ✅ Form Pencarian -->
    <form action="<?php echo e(route('produk')); ?>" method="GET" class="search-form d-flex justify-content-end">
        <input type="text" name="search" class="form-control w-25 me-2" placeholder="Cari produk..." value="<?php echo e(request('search')); ?>">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Telusuri
        </button>
    </form>

    <!-- ✅ Daftar Produk -->
    <?php if($produk->isEmpty()): ?>
        <div class="alert alert-info">Belum ada produk yang tersedia.</div>
    <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if($item->gambar): ?>
                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="card-img-top" alt="<?php echo e($item->nama); ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No image">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($item->nama); ?></h5>
                            <p class="card-text"><?php echo e($item->keterangan); ?></p>
                            <p class="card-text"><strong>Harga:</strong> Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?></p>
                            <a href="<?php echo e(route('produk.show', $item->id)); ?>" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-info-circle"></i> Detail
                            </a>
                            <div class="d-flex gap-2 mt-2">
                                <!-- Tombol Hapus -->
                                <form action="<?php echo e(route('produk.hapus', $item->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <a href="/dashboard" class="btn btn-secondary mt-4">← Kembali ke Dashboard</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\lenovo\my-umkm-app\resources\views/produk.blade.php ENDPATH**/ ?>