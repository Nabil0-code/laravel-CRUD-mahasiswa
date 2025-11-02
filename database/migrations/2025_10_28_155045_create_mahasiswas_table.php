<?php

// Import class bawaan Laravel yang dibutuhkan untuk membuat migrasi
use Illuminate\Database\Migrations\Migration;   // Digunakan untuk membuat class migrasi
use Illuminate\Database\Schema\Blueprint;       // Digunakan untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema;          // Digunakan untuk menjalankan perintah skema database

// Return class anonim (tanpa nama) yang mewarisi Migration
// Laravel akan otomatis mengeksekusi file ini saat kamu jalankan `php artisan migrate`
return new class extends Migration
{
    /**
     * Method "up" dijalankan saat migrasi dijalankan (php artisan migrate)
     * Di sini kita mendefinisikan struktur tabel "mahasiswas"
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            // Kolom id sebagai primary key (auto increment)
            $table->id();

            // Kolom nama bertipe string (varchar)
            $table->string('nama');

            // Kolom nim bertipe string dan harus unik (tidak boleh ada duplikat)
            $table->string('nim')->unique();

            // Kolom jurusan bertipe string
            $table->string('jurusan');

            // Kolom timestamps otomatis menambahkan 'created_at' dan 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Method "down" dijalankan saat rollback (php artisan migrate:rollback)
     * Fungsinya untuk menghapus tabel jika migrasi dibatalkan.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas'); // Menghapus tabel 'mahasiswas' jika ada
    }
};
