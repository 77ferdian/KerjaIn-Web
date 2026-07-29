# KerjaIn-Web

Profesional web application untuk platform pekerjaan (KerjaIn) dibangun dengan Laravel.

## Ringkasan
KerjaIn-Web adalah frontend/backend aplikasi web untuk mencari dan mengelola lowongan pekerjaan, melamar pekerjaan, dan mengelola profil pengguna. Proyek ini menggunakan Laravel sebagai kerangka kerja utama, Blade untuk templating, serta JavaScript dan CSS untuk interaksi dan styling.

## Fitur Utama
- Autentikasi pengguna (registrasi, login, reset kata sandi)
- Manajemen profil pengguna
- Pencarian dan pemfilteran lowongan kerja
- Melamar pekerjaan melalui UI
- Panel admin untuk mengelola lowongan dan pengguna

## Teknologi
- Bahasa: PHP
- Framework: Laravel
- Templating: Blade
- Frontend: HTML, CSS, JavaScript
- Database: MySQL / MariaDB (direkomendasikan)

## Persyaratan
- PHP 8.0+
- Composer
- Node.js & npm atau yarn (untuk asset)
- MySQL atau MariaDB

## Instalasi (Lokal)
1. Clone repository:

   git clone https://github.com/77ferdian/KerjaIn-Web.git
   cd KerjaIn-Web

2. Install dependensi PHP:

   composer install

3. Install dependensi frontend:

   npm install
   # atau
   yarn install

4. Copy file environment dan sesuaikan:

   cp .env.example .env
   php artisan key:generate

5. Konfigurasi database di file `.env` (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

6. Jalankan migrasi dan seeder (jika ada):

   php artisan migrate --seed

7. Bangun asset frontend (opsional untuk development):

   npm run dev
   # atau
   yarn dev

8. Jalankan server development:

   php artisan serve

Akses pada: http://127.0.0.1:8000

## Pengujian
Jalankan test (jika tersedia):

   php artisan test

## Struktur Proyek (Singkat)
- app/ - kode aplikasi (models, controllers, policies)
- resources/views/ - file Blade templates
- routes/ - definisi rute aplikasi
- database/ - migrasi dan seeders
- public/ - asset publik (CSS, JS, gambar)

## Kontribusi
Terima kasih atas minat Anda berkontribusi. Silakan ikuti langkah berikut:
1. Fork repository ini.
2. Buat branch fitur: `git checkout -b feat/nama-fitur`.
3. Commit perubahan: `git commit -m "deskripsi singkat"`.
4. Push ke branch Anda dan buat Pull Request.

Mohon sertakan deskripsi perubahan dan langkah untuk mereproduksi/menjalankan fitur.

## Lisensi
Proyek ini dilisensikan di bawah lisensi MIT. Lihat file LICENSE untuk detail.

## Kontak
Jika ada pertanyaan atau ingin berdiskusi, hubungi pemilik repository: https://github.com/77ferdian
