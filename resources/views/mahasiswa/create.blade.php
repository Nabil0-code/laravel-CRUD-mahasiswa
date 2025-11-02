<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>

    <!-- Menghubungkan file CSS eksternal yang ada di folder public/css/form.css -->
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container">
        <!-- Judul halaman -->
        <h1>Tambah Data Mahasiswa</h1>

        <!-- Form untuk menambahkan data baru -->
        <!-- Aksi form diarahkan ke route 'mahasiswa.store' -->
        <!-- Method POST digunakan untuk mengirim data ke server -->
        <form action="{{ route('mahasiswa.store') }}" method="POST">

            <!-- Token CSRF wajib ditambahkan agar form aman dari serangan cross-site request forgery -->
            @csrf

            <!-- Input untuk nama mahasiswa -->
            <div class="form-group">
                <label>Nama</label>
                <!-- 'required' berarti input wajib diisi -->
                <input type="text" name="nama" required>
            </div>

            <!-- Input untuk NIM mahasiswa -->
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" required>
            </div>

            <!-- Input untuk jurusan mahasiswa -->
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" required>
            </div>

            <!-- Tombol simpan untuk mengirim form -->
            <button type="submit" class="btn btn-save">Simpan</button>

            <!-- Tombol kembali menuju halaman daftar mahasiswa -->
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>
