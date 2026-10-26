-- =============================================
-- BinWise - Database Setup
-- Jalankan file ini di phpMyAdmin atau MySQL CLI
-- =============================================

CREATE DATABASE IF NOT EXISTS binewise CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE binewise;

-- Tabel users (warga & admin)
CREATE TABLE IF NOT EXISTS users (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nama      VARCHAR(100) NOT NULL,
    email     VARCHAR(100) NOT NULL UNIQUE,
    nomorhp   VARCHAR(20),
    alamat    TEXT,
    password  VARCHAR(255) NOT NULL,
    role      ENUM('warga', 'admin') DEFAULT 'warga',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel laporan sampah
CREATE TABLE IF NOT EXISTS laporan (
    id_laporan     INT AUTO_INCREMENT PRIMARY KEY,
    id_user        INT NOT NULL,
    jenis_laporan  ENUM('Fasilitas','Pengangkutan','Pengaduan Lingkungan','Penumpukan') NOT NULL,
    deskripsi      TEXT NOT NULL,
    alamat         TEXT NOT NULL,
    foto           VARCHAR(255) DEFAULT '',
    status         ENUM('menunggu','diproses','selesai') DEFAULT 'menunggu',
    tanggal_laporan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Akun admin default
-- Username: Administrator
-- Password: admin123
INSERT INTO users (nama, email, nomorhp, alamat, password, role) VALUES
('Administrator', 'admin@binewise.com', '08100000000', 'Kantor BinWise',
 '$2y$10$TKh8H1.PfunOaFyFNBaGpeXpFBB8E70YMLD1PsZV3TdWtLG3GUJKK', 'admin')
ON DUPLICATE KEY UPDATE id = id;

-- Catatan password hash di atas adalah bcrypt dari "admin123"
-- Untuk membuat hash baru: password_hash('passwordbaru', PASSWORD_DEFAULT)
