<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <!-- Menghubungkan file CSS eksternal dari folder public/css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

    <!-- Judul utama halaman -->
    <h1>Data Mahasiswa</h1>

    <!-- Tombol untuk menuju halaman tambah data mahasiswa -->
    <!-- Route 'mahasiswa.create' akan membuka form tambah data -->
    <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-tambah">+ Tambah Data</a>

    <!-- Menampilkan pesan sukses jika ada (misalnya setelah tambah, edit, atau hapus data) -->
    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Tabel untuk menampilkan seluruh data mahasiswa -->
    <table class="table">
        <thead>
            <tr>
                <th>No</th>          <!-- Nomor urut -->
                <th>Nama</th>        <!-- Nama mahasiswa -->
                <th>NIM</th>         <!-- Nomor Induk Mahasiswa -->
                <th>Jurusan</th>     <!-- Jurusan mahasiswa -->
                <th>Aksi</th>        <!-- Kolom tombol Edit dan Hapus -->
            </tr>
        </thead>

        <tbody>
            <!-- Melakukan perulangan untuk menampilkan setiap data mahasiswa -->
            <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <!-- $loop->iteration memberikan nomor urut otomatis -->
                <td><?php echo e($loop->iteration); ?></td>

                <!-- Menampilkan data dari setiap kolom -->
                <td><?php echo e($mhs->nama); ?></td>
                <td><?php echo e($mhs->nim); ?></td>
                <td><?php echo e($mhs->jurusan); ?></td>

                <!-- Tombol aksi (Edit dan Hapus) -->
                <td>
                    <!-- Tombol Edit: membuka form edit untuk data mahasiswa ini -->
                    <a href="<?php echo e(route('mahasiswa.edit', $mhs->id)); ?>" class="btn btn-edit">Edit</a>

                    <!-- Form untuk menghapus data mahasiswa -->
                    <!-- Menggunakan method POST dan spoofing method DELETE -->
                    <form action="<?php echo e(route('mahasiswa.destroy', $mhs->id)); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <!-- Tombol hapus dengan konfirmasi JavaScript -->
                        <button type="submit" class="btn btn-hapus" onclick="return confirm('Yakin hapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</body>
</html>
<?php /**PATH D:\laragon\www\Aplikasi_CRUD\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>