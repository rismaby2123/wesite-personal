 

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="row g-0">
            <?php if($produk->gambar): ?>
                <div class="col-md-5">
                    <img src="<?php echo e(asset('storage/' . $produk->gambar)); ?>" class="img-fluid rounded-start" alt="<?php echo e($produk->nama); ?>">
                </div>
            <?php endif; ?>
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title mb-3"><?php echo e($produk->nama); ?></h3>
                    <h5 class="text-success">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></h5>
                    <p class="card-text mt-3"><strong>Keterangan:</strong><br><?php echo e($produk->keterangan ?? 'Tidak ada keterangan.'); ?></p>

                   
                    <?php if($produk->whatsapp): ?>
                    <p><strong>whatsApp:</strong> <?php echo e($produk->whatsapp); ?><br>
                        <a href="https://wa.me/<?php echo e($produk->whatsapp); ?>" target="_blank" class="btn btn-success btn-sm">
                            Chat UMKM
                        </a>
                    </p>
                    <?php endif; ?>

                    <?php if($produk->kategori): ?>
                    <span class="badge bg-primary"><?php echo e($produk->kategori); ?></span>
                    <?php endif; ?>

                    <div class="mt-4">
                        <a href="<?php echo e(route('produk')); ?>" class="btn btn-secondary">← Kembali ke Daftar Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\my-umkm-app\resources\views/produk/show.blade.php ENDPATH**/ ?>