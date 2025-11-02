<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <!-- Menghubungkan file CSS eksternal dari folder public/css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Judul utama halaman -->
    <h1>Data Mahasiswa</h1>

    <!-- Tombol untuk menuju halaman tambah data mahasiswa -->
    <!-- Route 'mahasiswa.create' akan membuka form tambah data -->
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-tambah">+ Tambah Data</a>

    <!-- Menampilkan pesan sukses jika ada (misalnya setelah tambah, edit, atau hapus data) -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

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
            @foreach($mahasiswa as $mhs)
            <tr>
                <!-- $loop->iteration memberikan nomor urut otomatis -->
                <td>{{ $loop->iteration }}</td>

                <!-- Menampilkan data dari setiap kolom -->
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->jurusan }}</td>

                <!-- Tombol aksi (Edit dan Hapus) -->
                <td>
                    <!-- Tombol Edit: membuka form edit untuk data mahasiswa ini -->
                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-edit">Edit</a>

                    <!-- Form untuk menghapus data mahasiswa -->
                    <!-- Menggunakan method POST dan spoofing method DELETE -->
                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')

                        <!-- Tombol hapus dengan konfirmasi JavaScript -->
                        <button type="submit" class="btn btn-hapus" onclick="return confirm('Yakin hapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
