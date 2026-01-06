<p align="center">
  <img src="public/images/logo.svg" alt="TripMe Logo" width="250">
</p>

<h1 align="center">TripMe - West Java Tourism Platform</h1>

<p align="center">
  <b>Sistem Informasi Geografis (SIG) untuk Wisata Jawa Barat</b>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/Leaflet-1.9.4-199900?style=for-the-badge&logo=leaflet&logoColor=white" alt="Leaflet">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

---

## 📖 Tentang TripMe

**TripMe** adalah platform wisata berbasis web yang mengintegrasikan **Sistem Informasi Geografis (SIG)** untuk memudahkan wisatawan menemukan dan merencanakan kunjungan ke destinasi wisata di **Jawa Barat**. Aplikasi ini menyediakan peta interaktif, sistem reservasi tiket, dan manajemen destinasi yang komprehensif.

---

## 🗺️ Fitur Sistem Informasi Geografis (SIG)

<table>
  <tr>
    <td width="50%">
      <h3>📍 Peta Interaktif dengan Leaflet</h3>
      <ul>
        <li>Tampilan peta OpenStreetMap yang responsif</li>
        <li>Marker destinasi dengan warna berdasarkan kategori</li>
        <li>Popup informasi lengkap saat klik marker</li>
        <li>Zoom dan navigasi yang smooth</li>
      </ul>
    </td>
    <td width="50%">
      <h3>🧭 Navigasi & Routing</h3>
      <ul>
        <li><b>Get Directions</b> dari lokasi pengguna ke destinasi</li>
        <li>Integrasi Leaflet Routing Machine</li>
        <li>Kalkulasi jarak dan estimasi waktu tempuh</li>
        <li>Rute ditampilkan langsung di peta</li>
      </ul>
    </td>
  </tr>
  <tr>
    <td width="50%">
      <h3>🔍 Pencarian & Filter</h3>
      <ul>
        <li>Search bar untuk mencari destinasi</li>
        <li>Filter berdasarkan kategori (beach, mountain, waterfall, dll)</li>
        <li>Hasil pencarian langsung tampil di peta</li>
        <li>Quick navigation ke lokasi yang dipilih</li>
      </ul>
    </td>
    <td width="50%">
      <h3>📊 Geolocation & Boundaries</h3>
      <ul>
        <li>GPS user location untuk navigasi</li>
        <li>Validasi koordinat dalam wilayah Jawa Barat</li>
        <li>Batas koordinat: Lat (-7.8 s/d -5.5), Lng (106 s/d 108.9)</li>
        <li>Geocoding terintegrasi dengan Google Maps</li>
      </ul>
    </td>
  </tr>
</table>

### Kategori Destinasi dengan Color-Coded Markers

| Kategori | Warna | Kategori | Warna |
|----------|-------|----------|-------|
| 🏖️ Beach | Biru | 🏔️ Mountain | Hijau |
| 💧 Waterfall | Ungu | 🌊 Lake | Cyan |
| 🏛️ Museum | Pink | 🌲 Forest | Emerald |
| 🦁 Zoo | Orange | 🏯 Temple | Merah |

---

## ✨ Fitur Utama Lainnya

### 👤 Untuk Pengunjung (Guest)
- 🔎 Jelajahi destinasi wisata dengan peta interaktif
- 📖 Lihat detail destinasi (foto, deskripsi, harga, kapasitas)
- 🎫 Reservasi tiket secara online
- 📧 Integrasi Google Maps untuk navigasi

### 👥 Untuk Pengguna Terdaftar (User)
- 📋 Dashboard pribadi
- 🎟️ Kelola reservasi tiket
- 💳 Pembayaran online (Midtrans integration)
- 📅 Kalender jadwal kunjungan
- 🎫 Download e-ticket
- ⭐ Berikan review destinasi

### 🛡️ Untuk Administrator
- 📊 Dashboard statistik pengunjung
- 🗺️ CRUD destinasi dengan koordinat GPS
- 👥 Manajemen pengguna
- ✅ Konfirmasi/tolak reservasi pengunjung
- 📝 Moderasi review (publish/draft)
- 🚗 Kelola informasi travel

---

## 🛠️ Teknologi yang Digunakan

| Layer | Teknologi |
|-------|-----------|
| **Backend** | Laravel 11 (PHP 8.2+) |
| **Frontend** | Blade Template, TailwindCSS, Alpine.js |
| **Database** | MySQL 8.0 |
| **Peta/SIG** | Leaflet.js + OpenStreetMap |
| **Routing** | Leaflet Routing Machine |
| **Payment** | Midtrans Payment Gateway |
| **Auth** | Laravel Breeze |

---

## 🚀 Instalasi

### Prasyarat
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- MySQL 8.0

### Langkah Instalasi

```bash
# Clone repository
git clone https://github.com/[username]/tripme.git
cd tripme

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di .env
# DB_DATABASE=tripme
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Jalankan migrasi dan seeder
php artisan migrate --seed

# Build assets
npm run build

# Jalankan server
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

---

## 📁 Struktur Direktori Utama

```
tripme/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Controller admin (Destination, User, Visitor, dll)
│   │   ├── Guest/          # Controller publik (Home, Map, About)
│   │   └── User/           # Controller user (Reservation, Ticket, Calendar)
│   └── Models/             # Eloquent Models
├── resources/views/
│   ├── admin/              # Views admin dashboard
│   ├── guest/              # Views halaman publik
│   │   └── map/            # Halaman peta SIG
│   └── user/               # Views user dashboard
└── public/
    └── images/             # Logo dan assets gambar
```

---

## 📊 Model Data

| Model | Deskripsi |
|-------|-----------|
| `User` | Data pengguna (admin/user) |
| `Destination` | Destinasi wisata dengan koordinat GPS |
| `Reservation` | Data reservasi tiket |
| `Review` | Review dari pengguna |
| `Travel` | Informasi travel/transportasi |

---