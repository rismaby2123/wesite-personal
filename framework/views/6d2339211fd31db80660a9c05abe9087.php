<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 40px;
            background-color: #f9f9f9;
        }
        .contact-card {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }
    </style>
</head>
<body>

    <div class="contact-card">
        <h2 class="mb-4 text-center">Kontak Kami</h2>
        <p>Silakan hubungi kami melalui informasi di bawah:</p>

        <ul class="list-unstyled">
            <li><strong>Email:</strong> info@umkmdesa.com</li>
            <li><strong>Telepon:</strong> 085730919130</li>
            <li><strong>Alamat:</strong> Desa Pucangsari, Kecamatan Purwodadi</li>
        </ul>

        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary mt-4">← Kembali ke Dashboard</a>
    </div>

</body>
</html>
<?php /**PATH C:\Users\lenovo\my-umkm-app\resources\views/kontak.blade.php ENDPATH**/ ?>