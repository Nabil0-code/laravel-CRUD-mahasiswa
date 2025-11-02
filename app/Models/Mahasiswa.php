<?php

namespace App\Models; // Menentukan namespace model ini agar dikenali oleh Laravel

use Illuminate\Database\Eloquent\Factories\HasFactory; // Trait untuk membuat data dummy menggunakan factory
use Illuminate\Database\Eloquent\Model; // Kelas dasar untuk semua model di Laravel

class Mahasiswa extends Model
{
    use HasFactory; // Mengaktifkan fitur factory agar bisa digunakan saat seeding atau testing

    // ==============================
    // MENENTUKAN KOLOM YANG BOLEH DIISI SECARA MASS-ASSIGNMENT
    // ==============================
    // Laravel secara default melindungi semua kolom dari "mass assignment" 
    // (contohnya: Mahasiswa::create($request->all());)
    // Jadi, kita harus menentukan kolom mana saja yang boleh diisi otomatis.
    protected $fillable = [
        'nama',     // Nama mahasiswa
        'nim',      // Nomor Induk Mahasiswa
        'jurusan',  // Jurusan atau program studi mahasiswa
    ];
}
