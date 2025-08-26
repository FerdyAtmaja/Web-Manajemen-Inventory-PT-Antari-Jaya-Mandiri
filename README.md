# Sistem Manajemen Inventory PT Antari Jaya Mandiri

Sistem informasi berbasis web untuk mengelola inventory barang konstruksi PT Antari Jaya Mandiri.

## Tentang Perusahaan

PT Antari Jaya Mandiri adalah perusahaan yang bergerak di bidang penyediaan barang-barang untuk proyek konstruksi. Perusahaan ini fokus pada penyediaan mesin dan peralatan yang dibutuhkan dalam proyek-proyek konstruksi.

## Fitur Utama

- ✅ Manajemen stok barang konstruksi
- ✅ Tracking inventory real-time
- ✅ Laporan stok dan transaksi
- ✅ Manajemen supplier dan customer
- ✅ Dashboard analitik

## Teknologi

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Server**: Apache (XAMPP)

## Instalasi

1. Clone repository ini:
   ```bash
   git clone [repository-url]
   ```

2. Pindahkan folder ke direktori XAMPP:
   ```bash
   cp -r Web-Manajemen-Inventory-PT-Antari-Jaya-Mandiri c:/xampp/htdocs/
   ```

3. Jalankan XAMPP dan aktifkan Apache & MySQL

4. Import database:
   - Buka phpMyAdmin
   - Buat database baru
   - Import file SQL yang tersedia

5. Konfigurasi koneksi database di file config

6. Akses aplikasi melalui browser:
   ```
   http://localhost/Web-Manajemen-Inventory-PT-Antari-Jaya-Mandiri
   ```

## Struktur Folder

```
Web-Manajemen-Inventory-PT-Antari-Jaya-Mandiri/
├── assets/          # CSS, JS, images
├── config/          # Konfigurasi database
├── includes/        # File include PHP
├── modules/         # Modul aplikasi
├── database/        # File SQL
└── index.php        # Halaman utama
```