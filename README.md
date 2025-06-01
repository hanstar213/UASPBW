Sistem Informasi Panti Asuhan "RUMOH ANEUK"

A. Proses Instalasi dan Konfigurasi Laravel

1. Kebutuhan Sistem:
   - Composer
   - MySQL

2. Langkah-langkah Instalasi:
   ```bash
   git clone [repository]
   cd UASPBW-main
   composer install
   npm install
   cp .env.example .env
   php artisan key:generate
````

3. Konfigurasi Database:

   Buka file `.env` dan sesuaikan konfigurasi berikut:

     DB_DATABASE=rumohaneuk
     DB_USERNAME=root
     DB_PASSWORD=

4. Import Database:

   Import file `rumohaneuk.sql` ke MySQL menggunakan phpMyAdmin atau command line:

     mysql -u root -p rumohaneuk < rumohaneuk.sql

5. Menjalankan Server:

   ```bash
   php artisan serve
   ```

B. Penjelasan Aplikasi Web

Aplikasi web ini adalah sistem informasi untuk panti asuhan "RUMOH ANEUK", yang memiliki dua jenis pengguna:

User (Pengunjung) dapat mengakses:

  * Halaman Beranda
  * Form Donasi
  * Tentang Kami
  * Form Pelaporan Anak Yatim/Piatu/Terlantar

Admin dapat mengakses:

  * Login Admin
  * Dashboard
  * Data Donasi
  * Data Pelaporan

Semua form yang diisi user akan masuk ke database dan ditampilkan dalam bentuk tabel untuk admin.

C. Penjelasan Tugas dan Kode Masing-Masing Anggota

1. \[Muhammad Fanzal Rivaldi]

Tugas:

  * Membuat tampilan halaman user (Beranda, Donasi, Tentang Kami, Pelaporan)
  * Membuat halaman admin (Dashboard, Data Donasi, Data Pelaporan)

File yang Dikerjakan:

  * `resources/views/beranda.blade.php`
  * `resources/views/donasi.blade.php`
  * `resources/views/tentangkami.blade.php`
  * `resources/views/pelaporan.blade.php`
  * `resources/views/admin/dashboard.blade.php`
  * `resources/views/admin/data-donasi.blade.php`
  * `resources/views/admin/data-pelaporan.blade.php`

2. \[Muhammad Hanif]

Tugas:

  * Membuat login admin
  * Menangani routing dan controller untuk form
  * Mengelola database dan migrasi

File yang Dikerjakan:

  * `routes/web.php`
  * `app/Http/Controllers/DonasiController.php`
  * `app/Http/Controllers/PelaporanController.php`
  * `resources/views/admin/login.blade.php`
  * `database/migrations/...`
  * `rumohaneuk.sql`
