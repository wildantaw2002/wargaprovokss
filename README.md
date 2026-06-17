# Wargaprovokss - PosUMKM

POSUMKM adalah sebuah bisnis sociopreneurship yang berfokus pada pemberdayaan pendidikan dan pertumbuhan UMKM. Kami menghubungkan mahasiswa, dosen, dan pelaku usaha menengah ke bawah untuk menciptakan solusi inovatif yang menjawab tantangan nyata yang dihadapi oleh UMKM.

---

## 🛠 Persyaratan Sistem

Sebelum menjalankan proyek ini, pastikan sistem Anda sudah terinstal:
- **PHP** (minimal versi 8.2+)
- **Composer** (Dependency Manager untuk PHP)
- **Node.js & npm** (Dependency Manager untuk frontend)
- **Git** (Opsional, untuk clone repository)

---

## 🚀 Cara Instalasi & Menjalankan Proyek Secara Lokal

Silakan ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer Anda:

### 1. Clone Repository (Jika Belum)
```bash
git clone <url-repository-ini>
cd wargaprovokss
```

### 2. Install Dependensi PHP (Backend)
Jalankan Composer untuk mengunduh semua paket backend yang dibutuhkan oleh Laravel.
```bash
composer install
```
*(Catatan: Jika Anda menggunakan versi PHP yang lebih baru dan mengalami error versi paket, gunakan perintah `composer install --ignore-platform-reqs`)*.

### 3. Install Dependensi JavaScript (Frontend)
Jalankan npm untuk menginstal dependensi asset frontend dan Vite.
```bash
npm install
```

### 4. Setup File Environment (.env)
Copy file konfigurasi template `.env.example` menjadi `.env`.
```bash
cp .env.example .env
```

### 5. Generate Application Key
Aplikasi Laravel membutuhkan key unik untuk enkripsi sesi dan data lainnya.
```bash
php artisan key:generate
```

### 6. Setup Database SQLite & Migrasi
Proyek ini secara default menggunakan **SQLite** agar mudah dijalankan secara lokal tanpa konfigurasi database tambahan.
Buat file database kosong terlebih dahulu:
```bash
# Untuk pengguna Mac / Linux:
touch database/database.sqlite

# Untuk pengguna Windows (di CMD):
type nul > database\database.sqlite
```

Lalu, jalankan perintah migrasi untuk membuat tabel di dalam database:
```bash
php artisan migrate
```

### 7. (Opsional) Buat Akun Uji Coba
Jika Anda ingin masuk ke aplikasi sebagai akun-akun tertentu untuk keperluan tes, Anda bisa menggunakan Laravel Tinker untuk membuat akun:
```bash
php artisan tinker
```
Lalu masukkan kode ini ke dalamnya:
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::firstOrCreate(['email' => 'superadmin@example.com'], ['name' => 'Super Admin', 'password' => Hash::make('password123'), 'role' => 'superadmin', 'status' => 'active']);
User::firstOrCreate(['email' => 'siswa@example.com'], ['name' => 'Siswa/Mahasiswa', 'password' => Hash::make('password123'), 'role' => 'mahasiswa', 'status' => 'active']);
User::firstOrCreate(['email' => 'umkm@example.com'], ['name' => 'Admin UMKM', 'password' => Hash::make('password123'), 'role' => 'umkm', 'status' => 'active']);
exit;
```
*(Anda dapat login dengan email tersebut dan password: `password123`)*

---

### 8. Jalankan Server Aplikasi
Anda perlu menjalankan 2 server secara bersamaan agar proyek berfungsi dengan sempurna (frontend dan backend berjalan bersamaan).

**Buka Terminal Pertama:** Jalankan server backend PHP.
```bash
php artisan serve
```

**Buka Terminal Kedua:** Jalankan server frontend Vite (untuk me-render CSS dan JS).
```bash
npm run dev
```

---

## 🎉 Selesai!
Buka browser Anda dan kunjungi alamat berikut untuk mulai menggunakan aplikasi:
👉 **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

Untuk login, silakan akses: **[http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)**
