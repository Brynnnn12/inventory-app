<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Sistem Inventory

Sistem manajemen inventory modern yang dibangun dengan Laravel 12, dilengkapi dengan kontrol akses berbasis peran dan antarmuka yang responsif. Sistem inventory kami menyediakan solusi lengkap untuk melacak produk, mengelola stok, memproses penjualan, dan menghasilkan laporan dengan antarmuka pengguna yang indah dan intuitif.

Sistem ini mencakup:

- **[Autentikasi Pengguna](https://laravel.com/docs/authentication)** - Login dan registrasi yang aman menggunakan Laravel Breeze
- **[Manajemen Peran & Izin](https://spatie.be/docs/laravel-permission)** - Kontrol akses canggih menggunakan Spatie Laravel-Permission
- **[Manajemen Inventory](https://laravel.com/docs/eloquent)** - Pelacakan produk, kategori, supplier, dan level stok
- **[Sistem Pemesanan](https://laravel.com/docs/validation)** - Membuat dan mengelola pemesanan dengan alur kerja persetujuan
- **[Pemrosesan Penjualan](https://laravel.com/docs/billing)** - Proses penjualan dan pembuatan faktur
- **[Dashboard Laporan](https://laravel.com/docs/blade)** - Menghasilkan laporan tentang status inventory, penjualan, dan pembelian
- **[Antarmuka Responsif](https://tailwindcss.com/)** - Ramah perangkat mobile

## Teknologi yang Digunakan

Sistem inventory kami menggunakan teknologi terkini untuk memberikan pengalaman pengembangan dan penggunaan yang optimal:

- **Laravel 12** - Framework PHP terbaru dengan fitur-fitur canggih
- **Laravel Breeze** - Sistem autentikasi yang ringan dan mudah dikustomisasi
- **Spatie Laravel-Permission** - Manajemen peran dan izin yang fleksibel
- **Tailwind CSS** - Framework CSS utilitas-pertama untuk desain yang cepat dan responsif
- **Alpine.js** - Framework JavaScript ringan untuk interaktivitas antarmuka
- **MySQL/PostgreSQL** - Database yang handal dan terukur

## Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- MySQL atau PostgreSQL

## Instalasi

1. Clone repositori:
   ```bash
   git clone https://github.com/Brynnnn12/inventory-app.git
   cd inventory-app
   ```

2. Instal dependensi PHP:
   ```bash
   composer install
   ```

3. Instal dependensi NPM:
   ```bash
   npm install
   ```

4. Salin file lingkungan contoh dan generate kunci aplikasi:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Konfigurasi database di file `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inventory_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Jalankan migrasi database dan seed data awal:
   ```bash
   php artisan migrate --seed
   ```

7. Build asset:
   ```bash
   npm run build
   ```

8. Jalankan server pengembangan:
   ```bash
   php artisan serve
   ```

9. Kunjungi `http://localhost:8000` di browser Anda.

## Kredensial Default

Setelah melakukan seeding database, Anda dapat login dengan kredensial default berikut:

- **Admin**
  - Email: admin@gmail.com
  - Password: admin123

- **User**
  - Email: staff@example.com
  - Password: password

## Peran Pengguna

Sistem ini menyertakan tiga peran yang telah ditentukan dengan izin yang berbeda:

- **Admin**: Akses penuh ke semua fitur
- **User**: Akses terbatas untuk melihat Mengelola barang masuk dan barang keluar


## Ucapan Terima Kasih

- [Laravel](https://laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)
- [Spatie Laravel-Permission](https://spatie.be/docs/laravel-permission)
 
