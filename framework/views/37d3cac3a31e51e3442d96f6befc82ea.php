 

<?php $__env->startSection('content'); ?>
<script>
  function previewGambar() {
      const input = document.getElementById('gambar');
      const preview = document.getElementById('preview');
      const file = input.files[0];

      if (file) {
          const reader = new FileReader();

          reader.onload = function (e) {
              preview.src = e.target.result;
              preview.style.display = 'block';
          }

          reader.readAsDataURL(file);
      }
  }
</script>
<script>
  function isiKeterangan() {
      const nama = document.getElementById('nama').value;
      const keterangan = document.getElementById('keterangan');

      if (nama.length > 0) {
          keterangan.value = `Produk ${nama} adalah produk berkualitas dari UMKM kami.`;
      } else {
          keterangan.value = '';
      }
  }
</script>


<div class="container mt-5">
    <h2 class="mb-4">Tambah Produk</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" id="nama" class="form-control" oninput="isiKeterangan()">
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
        </div>


        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>    
        
        <div class="mb-3">
            <label for="whatsapp" class="form-label">whatsApp</label>
            <input type="text" name="whatsapp" class="form-control">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewGambar()">
        </div>
         <div class="mb-3">
            <img id="preview" src="#" alt="Preview Gambar" style="display: none; max-height: 200px;" class="img-thumbnail">
        </div>

       

        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\my-umkm-app\resources\views/produk/create.blade.php ENDPATH**/ ?>