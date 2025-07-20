<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard UMKM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">
  <div class="flex min-h-screen">

    <?php
        $hideSidebar = request()->routeIs('produk.create');
    ?>

    <!-- Sidebar -->
    <?php if(!$hideSidebar): ?>
    <aside class="w-64 bg-gray-200 p-6 flex flex-col justify-between">
      <div>
        
  <?php if(!Request::is('produk/*')): ?> 
    <!-- Menu ditampilkan kecuali di halaman detail -->

        <ul class="space-y-6">
          <li><a href="/dashboard" class="font-bold text-sm hover:text-blue-600">Beranda</a></li>
          <li><a href="/products" class="font-bold text-sm hover:text-blue-600">Produk</a></li>
          <li><a href="/products/detail" class="font-bold text-sm hover:text-blue-600">Detail Produk</a></li>
     
        </ul>
      </div>
      <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="flex items-center text-sm font-bold mt-8 hover:text-red-500">
        <a href="<?php echo e(route('logout.confirm')); ?>" class="text-decoration-none">
            <span class="me-2">→</span> Keluar
        </a>  
          <?php endif; ?>     
        </button>
      </form>
    </aside>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="flex-1 p-12">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
  </div>
</body>
</html>
<?php /**PATH C:\Users\lenovo\my-umkm-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>