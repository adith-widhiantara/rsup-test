# 📦 Aplikasi Web Manajemen Data - RSUP Surabaya

Aplikasi ini dibuat sebagai bagian dari *Technical Test Full Stack Developer* RSUP Surabaya. Dibangun menggunakan **Laravel**, aplikasi ini mencakup sistem autentikasi, pengelolaan role, fitur CRUD, REST API, hingga pengolahan data dengan pagination, pencarian, dan upload file.

---

## 🧩 Fitur Aplikasi

### 🔐 Autentikasi & Role-Based Access Control (RBAC)
- Login menggunakan **session** dengan validasi **Google reCAPTCHA**.
- Tiga jenis role:
  - **Admin**: Akses penuh (mengelola semua data & pengguna).
  - **Editor**: Hanya dapat menambah dan mengedit data.
  - **User**: Hanya dapat melihat data.

### ✍️ Manajemen Data (CRUD)
- Entitas yang dikelola: **Artikel**
- Fitur:
  - Tambah artikel
  - Edit artikel
  - Lihat detail artikel
  - Hapus artikel (khusus Admin)

### 📑 Validasi Form
- **Frontend**: Validasi menggunakan JavaScript (panjang karakter, format email, dll).
- **Backend**: Validasi Laravel (rules: required, min/max, file type, dsb).

### 📚 Pagination & Pencarian
- Tampilkan daftar data menggunakan pagination (otomatis Laravel).
- Fitur pencarian berdasarkan judul artikel.

### ⚡ AJAX Delete
- Hapus artikel dilakukan secara dinamis dengan **AJAX fetch()**, tanpa reload halaman.

### 📎 Upload File
- Mendukung upload **file PDF dan gambar (JPG, PNG)**.
- Validasi ukuran dan tipe file dilakukan di sisi backend.

---

## 🔌 REST API

API tersedia untuk akses data artikel dengan metode standar:

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET    | `/api/data` | Ambil semua data |
| POST   | `/api/data` | Tambah data baru |
| PUT    | `/api/data/{id}` | Update data berdasarkan ID |
| DELETE | `/api/data/{id}` | Hapus data berdasarkan ID |

> Semua endpoint API dilindungi dengan token autentikasi menggunakan **Laravel Sanctum**.

---

## 🛠️ Teknologi yang Digunakan

- **Laravel** (Backend & Frontend)
- **MySQL** (Database)
- **JavaScript Vanilla** (Validasi & AJAX)
- **HTML & CSS Custom** (Tanpa framework CSS)
- **Google reCAPTCHA** (Proteksi login)
- **Laravel Sanctum** (Autentikasi API)

---

## 🚀 Cara Menjalankan Proyek

1. **Clone repo:**
   ```bash
   git clone https://github.com/username/rsup-surabaya-test.git
   cd rsup-surabaya-test
   ```

2. **Install dependency:**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Copy file `.env` dan atur konfigurasi database:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi dan seed data awal:**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan server lokal:**
   ```bash
   php artisan serve
   ```

---

## 🖼️ Screenshot Antarmuka



---

## 📌 Catatan

- Role bisa diubah langsung melalui database (`users.role`).
- File yang diunggah akan tersimpan di `storage/app/public/uploads`.
- Semua endpoint REST API mengembalikan **JSON response** sesuai standar.

---

## 👨‍💻 Author

- Nama: Aditya S Widhiantara
- Email: adityaswidhiantara
- GitHub: [github.com/adith-widhiantara](https://github.com/adith-widhiantara)

---
