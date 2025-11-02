<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| File ini berfungsi untuk mendefinisikan semua rute (URL) yang digunakan
| oleh aplikasi web Laravel kamu.
| 
| Setiap rute akan mengarahkan permintaan (request) dari pengguna
| ke controller atau view tertentu.
|
*/

/*
|--------------------------------------------------------------------------
| Rute Utama (Halaman Awal)
|--------------------------------------------------------------------------
| Saat pengguna mengakses URL utama ("/"), secara otomatis diarahkan
| ke halaman data mahasiswa ("/mahasiswa").
| Fungsi redirect() digunakan agar halaman utama langsung menuju ke
| fitur utama aplikasi, yaitu daftar mahasiswa.
*/
Route::get('/', function () {
    return redirect('/mahasiswa');
});

/*
|--------------------------------------------------------------------------
| Rute Resource (CRUD Mahasiswa)
|--------------------------------------------------------------------------
| Route::resource() secara otomatis membuat 7 rute penting:
|   1. GET    /mahasiswa            -> index()     : menampilkan semua data
|   2. GET    /mahasiswa/create     -> create()    : form tambah data
|   3. POST   /mahasiswa            -> store()     : menyimpan data baru
|   4. GET    /mahasiswa/{id}       -> show()      : (opsional, detail data)
|   5. GET    /mahasiswa/{id}/edit  -> edit()      : form edit data
|   6. PUT    /mahasiswa/{id}       -> update()    : memperbarui data
|   7. DELETE /mahasiswa/{id}       -> destroy()   : menghapus data
|
| Semua method di atas diambil dari class MahasiswaController.
*/
Route::resource('mahasiswa', MahasiswaController::class);
