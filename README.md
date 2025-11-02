# CRUD Data Mahasiswa - Laravel 11

Aplikasi sederhana untuk mengelola data mahasiswa menggunakan **Laravel 11**.  
Memiliki tampilan elegan dengan **CSS murni (tanpa Tailwind)** agar mudah dipahami pemula.

---

## Fitur Utama
>Tambah data mahasiswa  
>Edit data mahasiswa  
>Hapus data mahasiswa  
>Validasi dan notifikasi sukses  
>Desain dark mode modern  
>File CSS dan tampilan Blade terpisah

---

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone https://github.com/username/laravel-crud-mahasiswa.git
   cd laravel-crud-mahasiswa
2. Install dependency
    bash
    Copy code
    composer install
    npm install
3. **Buat file .env dan generate key**
    bash
    Copy code
    cp .env.example .env
    php artisan key:generate
4. **Atur koneksi database di file .env**
    makefile
    Copy code
    DB_DATABASE=crud_mahasiswa
    DB_USERNAME=root
    DB_PASSWORD=
5. **Jalankan migrasi**
    bash
    Copy code
    php artisan migrate
6. **Jalankan server**
    bash
    Copy code
    php artisan serve
7. **Akses di browser:**
    http://127.0.0.1:8000