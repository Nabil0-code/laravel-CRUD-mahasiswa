<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>

    <!-- Menghubungkan file CSS eksternal dari folder public/css -->
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container">
        <!-- Judul halaman -->
        <h1>Edit Data Mahasiswa</h1>

        <!-- Form untuk mengedit data mahasiswa -->
        <!-- Action mengarah ke route 'mahasiswa.update' dengan parameter ID mahasiswa -->
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">

            <!-- Token keamanan wajib di Laravel -->
            @csrf

            <!-- Mengubah method dari POST menjadi PUT -->
            <!-- Karena Laravel hanya mendukung GET & POST di HTML, method PUT digunakan untuk update data -->
            @method('PUT')

            <!-- Input untuk nama mahasiswa -->
            <div class="form-group">
                <label>Nama</label>
                <!-- Value diisi otomatis dari data mahasiswa yang diambil dari database -->
                <input type="text" name="nama" value="{{ $mahasiswa->nama }}" required>
            </div>

            <!-- Input untuk NIM mahasiswa -->
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="{{ $mahasiswa->nim }}" required>
            </div>

            <!-- Input untuk jurusan mahasiswa -->
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}" required>
            </div>

            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit" class="btn btn-update">Perbarui</button>

            <!-- Tombol kembali ke halaman daftar mahasiswa -->
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-back">Kembali</a>
        </form>
    </div>
</body>
</html>
