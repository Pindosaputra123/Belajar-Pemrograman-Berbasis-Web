
-- Buat Database
CREATE DATABASE IF NOT EXISTS kuliah;
USE kuliah;

-- Tabel Mahasiswa
CREATE TABLE mahasiswa (
    npm CHAR(13) PRIMARY KEY,
    nama VARCHAR(50),
    jurusan ENUM('Teknik Informatika', 'Sistem Operasi'),
    alamat TEXT
);

-- Tabel Matakuliah
CREATE TABLE matakuliah (
    kodemk CHAR(6) PRIMARY KEY,
    nama VARCHAR(50),
    jumlah_sks INT(3)
);

-- Tabel KRS
CREATE TABLE krs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_npm CHAR(13),
    matakuliah_kodemk CHAR(6),
    FOREIGN KEY (mahasiswa_npm) REFERENCES mahasiswa(npm),
    FOREIGN KEY (matakuliah_kodemk) REFERENCES matakuliah(kodemk)
);

-- Data Mahasiswa
INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES
('MHS001', 'Siska Putri', 'Teknik Informatika', 'Bandung'),
('MHS002', 'Ujang Aziz', 'Sistem Operasi', 'Jakarta'),
('MHS003', 'Veronica Setyano', 'Teknik Informatika', 'Jogja'),
('MHS004', 'Rizka Nurmala Putri', 'Teknik Informatika', 'Malang'),
('MHS005', 'Eren Putra', 'Teknik Informatika', 'Surabaya'),
('MHS006', 'Putra Abdul Rachman', 'Sistem Operasi', 'Depok'),
('MHS007', 'Rahmat Andriyadi', 'Teknik Informatika', 'Bogor'),
('MHS008', 'Ayu Puspitasari', 'Teknik Informatika', 'Bali'),
('MHS009', 'Putri Ayuni', 'Teknik Informatika', 'Semarang'),
('MHS010', 'Andri Muhammad', 'Sistem Operasi', 'Palembang');

-- Data Matakuliah
INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Berbasis Web', 3),
('MK003', 'Algoritma dan Struktur Data', 3),
('MK004', 'Kajian Jurnal Informatika', 2);

-- Data KRS
INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES 
('MHS001', 'MK001'),
('MHS002', 'MK002'),
('MHS003', 'MK001'),
('MHS004', 'MK003'),
('MHS005', 'MK004'),
('MHS006', 'MK001'),
('MHS007', 'MK001'),
('MHS008', 'MK002'),
('MHS009', 'MK002'),
('MHS010', 'MK003');
