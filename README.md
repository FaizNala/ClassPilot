# 📘 ClassPilot - Sistem Manajemen Siswa

**ClassPilot** adalah sistem manajemen siswa berbasis web yang dirancang untuk membantu sekolah dalam mengelola data siswa, guru, orang tua, nilai, jadwal, presensi, dan pengumuman secara terpusat dan efisien. Dibangun menggunakan Laravel 12 dan Laravel Breeze sebagai starter kit autentikasi, sistem ini mendukung multi-role user dengan antarmuka yang sederhana dan aman.

---

## 📌 Ringkasan Sistem

Sistem ini mendukung 4 jenis pengguna:

- **Admin** – Mengelola seluruh data master dan pengumuman.
- **Guru** – Melihat jadwal, mengisi nilai & presensi, menerima pengumuman.
- **Siswa** – Melihat nilai, presensi, jadwal, dan pengumuman.
- **Orang Tua** – Melihat nilai & presensi anak.

---

## ✅ Kebutuhan Fungsional

| Fitur                     | Deskripsi                                                                 | Aktor                      |
|--------------------------|--------------------------------------------------------------------------|----------------------------|
| Autentikasi User         | Login dan register menggunakan Laravel Breeze                            | Semua pengguna             |
| Manajemen User           | CRUD data user dan pengaturan role                                       | Admin                      |
| Manajemen Kelas          | Tambah, ubah, hapus kelas dan lihat siswa per kelas                      | Admin                      |
| Manajemen Guru           | CRUD data guru, penugasan mengajar                                       | Admin                      |
| Manajemen Siswa          | CRUD data siswa dan relasi ke kelas, orang tua                           | Admin                      |
| Manajemen Orang Tua      | CRUD data orang tua                                                      | Admin                      |
| Manajemen Mata Pelajaran | CRUD mapel                                                               | Admin                      |
| Manajemen Jadwal         | Atur jadwal per kelas dan guru                                           | Admin                      |
| Input Nilai              | Guru mengisi nilai siswa berdasarkan mapel dan semester                  | Guru                       |
| Input Presensi           | Guru mengisi presensi harian berdasarkan jadwal                          | Guru                       |
| Lihat Nilai              | Lihat nilai siswa per semester dan tahun ajaran                          | Siswa, Orang Tua           |
| Lihat Presensi           | Lihat kehadiran siswa                                                    | Siswa, Orang Tua           |
| Lihat Jadwal             | Melihat jadwal kelas atau guru                                           | Siswa, Guru                |
| Manajemen Pengumuman     | Admin membuat pengumuman dan menentukan penerima                         | Admin                      |
| Terima Pengumuman        | Pengguna membaca pengumuman yang ditujukan ke mereka                     | Siswa, Guru                |

---

## ⚙️ Kebutuhan Non-Fungsional

| Kebutuhan                   | Deskripsi |
|----------------------------|-----------|
| Ketersediaan Sistem        | Sistem harus tersedia 24/7 kecuali saat maintenance. |
| Keamanan                   | Menggunakan autentikasi Laravel Breeze, hashing password, dan otorisasi per role. |
| Skalabilitas               | Struktur database mendukung penambahan pengguna dan data baru tanpa perubahan besar. |
| Kemudahan Penggunaan       | Antarmuka responsif dan intuitif untuk pengguna. |
| Backup & Restore Data      | Dukungan backup database secara rutin. |

---

## 🧰 Teknologi yang Digunakan

- **Backend**: Laravel 12
- **Starter Kit**: Laravel Breeze
- **Database**: MySQL
- **Frontend**: Blade, Bootstrap, Stisla
- **Tools Pendukung**: Draw.io (untuk ERD), Laravel Migrations, GitHub

---

## 🗃️ Struktur Tabel dan Relasi

### 📄 Tabel: `users`
| Kolom     | Tipe Data    | Keterangan                |
|-----------|--------------|---------------------------|
| id        | BIGINT (PK)  | Primary Key               |
| name      | VARCHAR      | Nama lengkap user         |
| email     | VARCHAR      | Email unik                |
| password  | VARCHAR      | Hash password             |
| role      | ENUM         | admin, guru, siswa, orangtua |

---

### 📄 Tabel: `admin`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| user_id   | BIGINT (FK)  | Relasi ke `users.id`               |

---

### 📄 Tabel: `guru`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| user_id   | BIGINT (FK)  | Relasi ke `users.id`               |
| nip       | VARCHAR      | Nomor Induk Pegawai                |

---

### 📄 Tabel: `siswa`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| user_id   | BIGINT (FK)  | Relasi ke `users.id`               |
| nis       | VARCHAR      | Nomor Induk Siswa                  |
| orangtua_id | BIGINT (FK)| Relasi ke `orangtua.id`            |

---

### 📄 Tabel: `orangtua`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| user_id   | BIGINT (FK)  | Relasi ke `users.id`               |
| no_hp     | VARCHAR      | Nomor HP                           |

---

### 📄 Tabel: `kelas`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| nama_kelas| VARCHAR      | Nama kelas                         |

---

### 📄 Tabel: `tahun_ajaran`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| tahun     | VARCHAR      | Contoh: 2023/2024                  |

---

### 📄 Tabel: `semester`
| Kolom         | Tipe Data    | Keterangan                      |
|---------------|--------------|---------------------------------|
| id            | BIGINT (PK)  | Primary Key                     |
| nama_semester | VARCHAR      | Contoh: Ganjil / Genap          |

---

### 📄 Tabel: `kelas_siswa`
| Kolom           | Tipe Data    | Keterangan                             |
|-----------------|--------------|----------------------------------------|
| id              | BIGINT (PK)  | Primary Key                            |
| siswa_id        | BIGINT (FK)  | Relasi ke `siswa.id`                   |
| kelas_id        | BIGINT (FK)  | Relasi ke `kelas.id`                   |
| tahun_ajaran_id | BIGINT (FK)  | Relasi ke `tahun_ajaran.id`            |

---

### 📄 Tabel: `mapel`
| Kolom      | Tipe Data    | Keterangan                         |
|------------|--------------|------------------------------------|
| id         | BIGINT (PK)  | Primary Key                        |
| nama_mapel | VARCHAR      | Nama mata pelajaran                |

---

### 📄 Tabel: `guru_mapel`
| Kolom     | Tipe Data    | Keterangan                         |
|-----------|--------------|------------------------------------|
| id        | BIGINT (PK)  | Primary Key                        |
| guru_id   | BIGINT (FK)  | Relasi ke `guru.id`                |
| mapel_id  | BIGINT (FK)  | Relasi ke `mapel.id`               |

---

### 📄 Tabel: `jadwal`
| Kolom       | Tipe Data    | Keterangan                             |
|-------------|--------------|----------------------------------------|
| id          | BIGINT (PK)  | Primary Key                            |
| kelas_id    | BIGINT (FK)  | Relasi ke `kelas.id`                   |
| guru_id     | BIGINT (FK)  | Relasi ke `guru.id`                    |
| mapel_id    | BIGINT (FK)  | Relasi ke `mapel.id`                   |
| hari        | VARCHAR      | Hari mengajar                          |
| jam_mulai   | TIME         | Jam mulai                              |
| jam_selesai | TIME         | Jam selesai                            |

---

### 📄 Tabel: `nilai`
| Kolom           | Tipe Data    | Keterangan                             |
|-----------------|--------------|----------------------------------------|
| id              | BIGINT (PK)  | Primary Key                            |
| siswa_id        | BIGINT (FK)  | Relasi ke `siswa.id`                   |
| mapel_id        | BIGINT (FK)  | Relasi ke `mapel.id`                   |
| guru_id         | BIGINT (FK)  | Relasi ke `guru.id`                    |
| tahun_ajaran_id | BIGINT (FK)  | Relasi ke `tahun_ajaran.id`            |
| semester_id     | BIGINT (FK)  | Relasi ke `semester.id`                |
| tugas           | INTEGER      | Nilai tugas                            |
| uts             | INTEGER      | Nilai UTS                              |
| uas             | INTEGER      | Nilai UAS                              |

---

### 📄 Tabel: `presensi`
| Kolom           | Tipe Data    | Keterangan                             |
|-----------------|--------------|----------------------------------------|
| id              | BIGINT (PK)  | Primary Key                            |
| jadwal_id       | BIGINT (FK)  | Relasi ke `jadwal.id`                  |
| siswa_id        | BIGINT (FK)  | Relasi ke `siswa.id`                   |
| semester_id     | BIGINT (FK)  | Relasi ke `semester.id`                |
| tahun_ajaran_id | BIGINT (FK)  | Relasi ke `tahun_ajaran.id`            |
| tanggal         | DATE         | Tanggal kehadiran                      |
| status          | ENUM         | hadir, sakit, izin, alpha              |

---

### 📄 Tabel: `pengumuman`
| Kolom       | Tipe Data    | Keterangan                             |
|-------------|--------------|----------------------------------------|
| id          | BIGINT (PK)  | Primary Key                            |
| judul       | VARCHAR      | Judul pengumuman                       |
| isi         | TEXT         | Isi pengumuman                         |
| dibuat_oleh | BIGINT (FK)  | Relasi ke `users.id` (admin/guru)     |
| tanggal     | DATE         | Tanggal dibuat                         |

---

### 📄 Tabel: `pengumuman_user`
| Kolom       | Tipe Data    | Keterangan                             |
|-------------|--------------|----------------------------------------|
| id          | BIGINT (PK)  | Primary Key                            |
| pengumuman_id| BIGINT (FK) | Relasi ke `pengumuman.id`              |
| user_id     | BIGINT (FK)  | Relasi ke `users.id`                   |
| read_at     | DATE         | Tanggal dibaca 

---

## 🧩 Diagram Relasi (ERD)
> Tersedia pada folder `/design/ERD_ClassPilot.png`

---

## 🧪 Status Pengembangan
- ✅ Database Design
- ✅ Laravel Breeze Auth
- 🚧 Backend Implementation
- 🚧 Frontend Layout
- 📦 Coming Soon: API Endpoints

---

## 📄 Lisensi
Proyek ini menggunakan lisensi MIT.

---

