<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;     // Import model Mahasiswa agar bisa digunakan di controller ini
use Illuminate\Http\Request;  // Import class Request untuk menangani data dari form

class MahasiswaController extends Controller
{
    // 1. METHOD UNTUK MENAMPILKAN SEMUA DATA
    public function index() {
        // Ambil semua data mahasiswa dari database
        $mahasiswa = Mahasiswa::all();

        // Kirim data ke view 'mahasiswa.index'
        // compact('mahasiswa') = membuat array ['mahasiswa' => $mahasiswa]
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // 2. METHOD UNTUK MENAMPILKAN FORM TAMBAH DATA
    public function create() {
        // Tampilkan halaman form tambah mahasiswa
        return view('mahasiswa.create');
    }

    // 3. METHOD UNTUK MENYIMPAN DATA BARU KE DATABASE
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validated = $request->validate([
            'nama' => 'required',           // nama wajib diisi
            'nim' => 'required|numeric',    // nim wajib diisi dan harus berupa angka
            'jurusan' => 'required',        // jurusan wajib diisi
        ]);

        // Jika lolos validasi, simpan data baru ke tabel 'mahasiswas'
        Mahasiswa::create($validated);

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // 4. METHOD UNTUK MENAMPILKAN FORM EDIT DATA
    public function edit($id)
    {
        // Cari data mahasiswa berdasarkan ID
        // Jika tidak ditemukan, otomatis akan menampilkan error 404
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Kirim data mahasiswa ke halaman edit
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // 5. METHOD UNTUK MENGUPDATE DATA DI DATABASE
    public function update(Request $request, $id)
    {
        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Validasi data baru yang dikirim dari form edit
        $request->validate([
            'nama' => 'required',  // nama wajib diisi
            // nim harus unik di tabel mahasiswas, kecuali untuk ID yang sedang diedit
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'jurusan' => 'required',
        ]);

        // Update data mahasiswa di database dengan data baru
        $mahasiswa->update($request->all());

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui!');
    }

    // 6. METHOD UNTUK MENGHAPUS DATA
    public function destroy($id) {
        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus data dari database
        $mahasiswa->delete();

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus!');
    }
}
