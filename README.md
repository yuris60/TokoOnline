<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/backend/image/logo_ubsi.png" width="200" alt="Laravel Logo"></a></p>
<p align="center" style="background-color: #000"><a href="https://laravel.com" target="_blank"><img src="public/backend/image/logo_text.png" width="300" alt="Laravel Logo"></a></p>


## Pengenalan Project

Project ini merupakan project Laravel pada mata kuliah Web Programming II di Universitas Bina Sarana Informatika yang bertemakan tentang Toko Online.

## Relasi Tabel
<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/backend/image/relasi.jpg" width="600" alt="Laravel Logo"></a></p>

## Cara Install
1. Cloning repository ini melalui terminal.
```
git clone https://github.com/yuris60/TokoOnline.git
```
2. Tunggu hingga selesai cloning, lalu inisiasi dependensi composer.
```
composer install
```
3. Duplikat file `.env.example` menjadi `.env` dan konfigurasikan koneksi database menjadi seperti ini
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_tokoonline
DB_USERNAME=root
DB_PASSWORD=
```
4. Generate key aplikasi pada env melalui terminal
```
php artisan key:generate
```
5. Migrasikan tabel beserta seeder melalui terminal
```
php artisan migrate:fresh --seed
```

## Screenshot
<table width="100%">
<tr>
<td><h3 align="center">Login</h3><img src="public/backend/image/ss_login.png"></td>
<td><h3 align="center">Home</h3><img src="public/backend/image/ss_home.png"></td>
</tr>
<tr>
<td><h3 align="center">User</h3><img src="public/backend/image/ss_user.png"></td>
<td><h3 align="center">Kategori</h3><img src="public/backend/image/ss_kategori.png"></td>
</tr>
<tr>
<td><h3 align="center">Produk</h3><img src="public/backend/image/ss_produk.png"></td>
<td><h3 align="center">Tambah Foto Produk</h3><img src="public/backend/image/ss_tambah_gambar_produk.png"></td>
</tr>
</table>

## Licensi

Project ini mengacu pada modul praktik dari mata kuliah Web Programming II Universitas Bina Sarana Informatika (UBSI). Project ini bersifat open-source untuk edukasi.
<blockquote>Kuliah...? BSI AJA !!</blockquote>
