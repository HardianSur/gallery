
# Aplikasi Gallery

Aplikasi Galeri adalah aplikasi berbasis web yang dibuat untuk Ujian Komprehensif(Ujikom). Aplikasi ini memungkinkan pengguna untuk melakukan upload,like, dan comment pada postingan.

## Persyaratan

Sebelum memulai, pastikan Anda memiliki:

-   **PHP** (Disarankan versi terbaru)

-   **Composer**

-   **Node.js** dan **NPM**

-   **XAMPP** (atau server lokal dengan PHP dan MySQL)

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal aplikasi:

-   Clone repositori ini ke komputer Anda:

```bash
git clone https://github.com/HardianSur/gallery.git
```

-   Masuk ke direktori proyek:

```bash
cd aplikasi_kasir
```

-   Buka file php.ini pada XAMPP dan aktifkan ekstensi berikut dengan menghapus tanda titik koma ( ; ) :

```bash
extension=gd
extension=zip
```

-   buat file **.env**, lalu isi file tersebut sama dengan file **.env.example**

-   Buka Xampp lalu klik admin pada menu mysql setelah itu buat database dengan nama sesuai di **.env**

```bash
DB_DATABASE=gallery
```

-   Install dependencies dengan Composer dan NPM:

```bash
composer install
npm install
```

-   Migrasi database dan seeding data:

```bash
php artisan migrate --seed
```

- Jika memiliki file database anda dapat melewati langkah **Migrasi dan Seeding**, langsung saja import database tersebut

-   Buat symbolic link untuk storage:

```bash
php artisan storage:link
```

-   Jalankan Vite untuk membangun asset frontend:

```bash
npm run dev
```

-   Jalankan server Laravel:

```bash
php artisan serve
```

-   Jalankan queue:

```bash
php artisan queue:work
```

-   Jalankan Laravel Reverb:

```bash
php artisan serve
```
## Login

Gunakan kredensial berikut untuk masuk ke aplikasi:

- User 1 :
-**Email** : anthony@example.com

-**Username** : ElGasing

-**Password** : password

- User 2 :
-**Email** : okarun@example.com

-**Username** : okarun

-**Password** : password

- User 3
-   **Email** : admin@hgallery.com

-   **Username** : admin

-   **Password** : admin123

Setelah berhasil login, Anda akan diarahkan ke halaman utama aplikasi gallery.

## Fitur Utama

-   Manajemen Album: Menambah, mengedit, dan menghapus album yang tersedia di pribadi.

-   Transaksi photo: Melakukan Like dan comment pada photo.

-   Laporan: Menampilkan laporan like dan comment per album.

-   Mode Tamu: Pengguna mengakses aplikasi tanpa melakukan login.

-   Login Sistem: Pengguna dapat login untuk mengakses fitur yang lebih lengkap.

## Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan ujian komprehensif (Ujikom).

