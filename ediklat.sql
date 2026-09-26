-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2026 pada 07.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ediklat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_biaya_diklat`
--

CREATE TABLE `data_biaya_diklat` (
  `id` int(11) NOT NULL,
  `diklat_id` int(11) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `tarif` varchar(100) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `orang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_biaya_diklat`
--

INSERT INTO `data_biaya_diklat` (`id`, `diklat_id`, `tgl_input`, `tarif`, `satuan`, `lama`, `orang`, `qty`, `nominal`, `subtotal`) VALUES
(27, 13, '2026-01-31', '121212', '7', 21, 31, 12, 111111, 1333332),
(116, 22, '2026-02-02', 'magang aaaaaa', NULL, NULL, 5, 36, 20000, 3600000),
(137, 27, '2026-02-06', 'Adm PKL', NULL, NULL, 2, 45, 14000, 1260000),
(138, 27, '2026-02-06', 'magang aaaaaa', NULL, NULL, 3, 30, 10000, 900000),
(142, 28, '2026-02-06', 'magang a', NULL, NULL, 2, 30, 20000, 1200000),
(145, 40, '2026-02-07', 'Adm PKL', NULL, NULL, 2, 60, 20000, 2400000),
(148, 59, '2026-02-09', 'pelatihan', NULL, NULL, 1, 20, 14000, 280000),
(150, 58, '2026-02-09', 'Adm PKL', NULL, NULL, 1, 30, 14000, 420000),
(152, 64, '2026-02-18', 'Adm PKL', NULL, NULL, 1, 45, 14000, 630000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diklat`
--

CREATE TABLE `data_diklat` (
  `id` int(11) NOT NULL,
  `no_diklat` varchar(50) NOT NULL,
  `instansi_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `ketua` varchar(100) DEFAULT NULL,
  `no_telp` int(20) DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `jumlah_minggu` int(11) DEFAULT NULL,
  `status_diklat` varchar(50) DEFAULT NULL,
  `status_bayar` varchar(50) DEFAULT NULL,
  `total_biaya` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_diklat`
--

INSERT INTO `data_diklat` (`id`, `no_diklat`, `instansi_id`, `fakultas_id`, `kegiatan_id`, `ketua`, `no_telp`, `ruangan`, `keterangan`, `tgl_mulai`, `tgl_akhir`, `jumlah_minggu`, `status_diklat`, `status_bayar`, `total_biaya`) VALUES
(58, 'D260209125544', 1, 1, 6, 'Budi Santoso', 858588, 'AR F', 'iya', '2026-02-09', '2026-02-09', NULL, 'aktif', 'lunas', 420000),
(59, 'D260209125620', 8, 1, 6, 'aya', 58484, 'BBB', 'ya', '2026-02-09', '2026-02-09', NULL, 'belum', 'lunas', 280000),
(60, 'D260210081827', 1, 1, 6, 'Budi Santoso', 2147483647, 'RR', 'dsdasdas', '2026-02-10', '2026-02-10', NULL, 'aktif', 'belum', 0),
(61, 'D260210082501', 1, 1, 6, 'Budi Santoso', 1234567, 'RR', 'sddada', '2026-02-10', '2026-02-10', NULL, 'belum', 'belum', 0),
(62, 'D260210083310', 8, 2, 6, 'Budi Santoso', 2147483647, 'AR F', 'ssss', '2026-02-10', '2026-02-10', NULL, 'aktif', 'belum', 0),
(63, 'D260210083343', 1, 1, 6, 'devy leli nur hidayah', 2147483647, 'BBB', 'sddsd', '2026-02-10', '2026-02-10', NULL, 'selesai', 'belum', 0),
(64, 'D260211024228', 9, 1, 6, 'Budi Santoso', 2147483647, 'AR FA', 'coba', '2026-02-11', '2026-02-11', NULL, 'aktif', 'lunas', 630000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fakultas`
--

CREATE TABLE `data_fakultas` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_fakultas`
--

INSERT INTO `data_fakultas` (`id`, `kode`, `nama`, `aktif`) VALUES
(1, 'FK01111', 'Fakultas Kedokteran', 1),
(2, 'FK02', 'Fakultas Keperawatan', 1),
(3, 'FK03', 'Fakultas Farmasi', 1),
(5, '111', 'cobaaaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_instansi`
--

CREATE TABLE `data_instansi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` enum('internal','eksternal') NOT NULL,
  `jenis_instansi_id` int(11) NOT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_instansi`
--

INSERT INTO `data_instansi` (`id`, `kode`, `nama`, `tipe`, `jenis_instansi_id`, `aktif`) VALUES
(1, 'DI01', 'RSU PKU', 'internal', 6, 1),
(2, 'DI02', 'RS Swasta Delanggu', 'internal', 7, 1),
(7, 'DI03', 'RS PKU Muhammadiyah', 'eksternal', 6, 1),
(8, 'DI04', 'Poltekkes Kemenkes Surakarta', 'eksternal', 7, 0),
(9, 'TT-04', 'saya coba', 'internal', 6, 1),
(10, 'aaa', 'cobaaaa', 'internal', 1, 0),
(11, 'aaa', 'cobaaaa', 'internal', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelatihan`
--

CREATE TABLE `data_pelatihan` (
  `id` int(11) NOT NULL,
  `jenis` enum('internal','eksternal') NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `peserta` text DEFAULT NULL,
  `jumlah` int(11) DEFAULT 0,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `jam_hari` varchar(50) DEFAULT NULL,
  `biaya` decimal(15,2) DEFAULT 0.00,
  `sumber_anggaran` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peserta_diklat`
--

CREATE TABLE `data_peserta_diklat` (
  `id` int(11) NOT NULL,
  `diklat_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_peserta_diklat`
--

INSERT INTO `data_peserta_diklat` (`id`, `diklat_id`, `nama`, `nik`, `jk`, `no_telp`) VALUES
(272, 59, 'budi', '21111', 'Laki-laki', '321654'),
(274, 58, 'sasa', '11140', 'Perempuan', '085'),
(275, 60, 'sasa', '12121', 'Perempuan', '1121'),
(279, 64, 'basukisssss', '3310', 'Laki-laki', '2155');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ruangan`
--

CREATE TABLE `data_ruangan` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_ruangan`
--

INSERT INTO `data_ruangan` (`id`, `kode`, `nama`, `aktif`) VALUES
(1, 'R010', 'bbba', 1),
(2, 'R-0011', 'IGD', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tempat_tidur`
--

CREATE TABLE `data_tempat_tidur` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_tempat_tidur`
--

INSERT INTO `data_tempat_tidur` (`id`, `kode`, `nama`, `aktif`) VALUES
(1, 'TT-04', 'Tempat Tidur IGD 01', 1),
(2, 'TT-03', 'cobaaaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat`
--

CREATE TABLE `diklat` (
  `id` int(11) NOT NULL,
  `no_diklat` varchar(30) DEFAULT NULL,
  `institusi` varchar(150) DEFAULT NULL,
  `fakultas` varchar(150) DEFAULT NULL,
  `kegiatan` varchar(150) DEFAULT NULL,
  `peserta` int(11) DEFAULT NULL,
  `ketua` varchar(100) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `jumlah_minggu` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status_diklat` enum('SELESAI','BELUM') DEFAULT 'BELUM',
  `created_at` datetime DEFAULT current_timestamp(),
  `instansi_id` int(11) DEFAULT NULL,
  `fakultas_id` int(11) DEFAULT NULL,
  `kegiatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `diklat`
--

INSERT INTO `diklat` (`id`, `no_diklat`, `institusi`, `fakultas`, `kegiatan`, `peserta`, `ketua`, `tgl_mulai`, `tgl_akhir`, `jumlah_minggu`, `biaya`, `status_diklat`, `created_at`, `instansi_id`, `fakultas_id`, `kegiatan_id`) VALUES
(1, '23121100001', 'Universitas Muhammadiyah Purwokerto', 'S1 Keperawatan', 'Praktik Klinik', 5, 'Tia Amanda', '2023-12-11', '2023-12-16', 1, 232500, 'SELESAI', '2026-01-24 10:00:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat_biaya`
--

CREATE TABLE `diklat_biaya` (
  `id` int(11) NOT NULL,
  `diklat_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tarif` varchar(100) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `orang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_instansi`
--

CREATE TABLE `jenis_instansi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_instansi`
--

INSERT INTO `jenis_instansi` (`id`, `kode`, `nama`, `aktif`) VALUES
(1, 'JI01', 'Pemerintah', 1),
(2, 'JI02', 'Swasta', 1),
(3, 'JI03', 'Yayasan', 1),
(5, '1', 'Poltekkes Kemenkes Surakarta', 1),
(6, '01', 'internal', 1),
(7, '02', 'eksternal', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kode`, `nama`, `aktif`) VALUES
(6, 'KG01', 'Pelatihan Dasar', 1),
(7, 'KG02', 'Pelatihan Lanjutan', 1),
(8, 'KG03', 'Praktik Klinik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` int(11) NOT NULL,
  `jenis` enum('internal','eksternal') NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `peserta` text DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT 0,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `jam_hari` varchar(50) DEFAULT NULL,
  `biaya` decimal(15,2) DEFAULT 0.00,
  `sumber_anggaran` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `jenis`, `kegiatan`, `peserta`, `jabatan`, `jumlah`, `penyelenggara`, `tempat`, `waktu`, `jam_hari`, `biaya`, `sumber_anggaran`, `keterangan`, `aktif`) VALUES
(1, 'internal', 'Pelatihan PPI', 'Perawat ICU', NULL, 25, 'RS Sehat', 'Aula RS', '2025-01-10', '8 Jam', 0.00, 'Internal', 'Wajib', 1),
(2, 'internal', 'Pelatihan K3', 'Tenaga Medis', NULL, 30, 'RS Sehat', 'Ruang Diklat', '2025-02-15', '6 Jam', 0.00, 'Internal', '-', 1),
(10, 'eksternal', 'Pelatihan Manajemen Mutu RS', 'Perawat IGD', 'Perawat', 10, 'Kemenkes RI', 'Hotel Santika', '2024-03-12', '8 Jam / Hari', 2500000.00, 'APBD', NULL, 1),
(11, 'eksternal', 'Workshop Keselamatan Pasien', 'Dokter Umum', 'Dokter', 8, 'IDI Jawa Tengah', 'RSUD Asahri', '2024-04-05', '6 Jam / Hari', 1800000.00, 'BLUD', NULL, 1),
(12, 'eksternal', 'Pelatihan PPI Rumah Sakit', 'Perawat & Bidan', 'Tenaga Kesehatan', 15, 'Dinkes Provinsi', 'Gedung Diklat', '2024-05-20', '2 Hari', 3200000.00, 'APBN', NULL, 1),
(13, 'eksternal', 'Seminar Akreditasi RS', 'Manajemen RS', 'Struktural', 6, 'KARS', 'Hotel Horison', '2024-06-15', '1 Hari', 4500000.00, 'BLUD', NULL, 1),
(14, 'eksternal', 'Pelatihan SIMRS', 'Staf IT', 'IT Support', 5, 'Vendor SIMRS', 'Kantor Vendor', '2024-07-10', '3 Hari', 5000000.00, 'Kerjasama', NULL, 1),
(15, 'eksternal', 'Workshop ACLS', 'magang', 'mg', 3, 'Kemenkes', 'Hotel Santika', '2131-11-22', '1 Hari', 1212122.00, 'APBN', NULL, 1),
(17, 'internal', 'Workshop ACLS', 'magang', NULL, 7, 'RS Sehat', 'aula', '2026-02-04', 'jam 8', 371000.00, 'APBD', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) DEFAULT 'user',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`, `foto`) VALUES
(1, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$cbzD3ijkFe2NtsgVB00TCO2QypBz1DC4pbbxFbOgMSTAFGqhfncge', '2026-02-18 11:18:14', 'user', NULL),
(2, 'admin', 'rizalsetyawam13@gmail.com', '$2y$10$CJ/sln2kxceW0rQYjgdkL.99g.pt5MPDAshnEMTmo8P9EXeKYxXCu', '2026-02-18 11:23:10', 'admin', NULL),
(5, 'anda', 'admin12@gmail.com', '$2y$10$ekmdEjlZ0jYW5ks1AOHz.uLlAcxsANlDtCtfsKKC05BxuPpamFZO6', '2026-02-23 10:45:27', 'admin', NULL),
(12, 'rizal', '', '$2y$10$6cshRScJh9RIK9Q/6usZ6elSWGdQcEltdg1Se4SpKgdKGMMWLliUa', '2026-02-27 06:36:36', 'admin', NULL),
(13, 'say', 'saya@gmail.com', '$2y$10$yQ0K.Cfgt6pQ4j3SpAITPOtUevUi410TD0ge3vNEl01xXxeGb.2XC', '2026-02-28 06:27:44', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_biaya_diklat`
--
ALTER TABLE `data_biaya_diklat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_diklat`
--
ALTER TABLE `data_diklat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `data_diklat_ibfk_3` (`kegiatan_id`),
  ADD KEY `fk_diklat_instansi` (`instansi_id`);

--
-- Indeks untuk tabel `data_fakultas`
--
ALTER TABLE `data_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_instansi`
--
ALTER TABLE `data_instansi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_instansi_id` (`jenis_instansi_id`);

--
-- Indeks untuk tabel `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_peserta_diklat`
--
ALTER TABLE `data_peserta_diklat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peserta_diklat` (`diklat_id`);

--
-- Indeks untuk tabel `data_ruangan`
--
ALTER TABLE `data_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tempat_tidur`
--
ALTER TABLE `data_tempat_tidur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diklat`
--
ALTER TABLE `diklat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diklat_biaya`
--
ALTER TABLE `diklat_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_instansi`
--
ALTER TABLE `jenis_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_biaya_diklat`
--
ALTER TABLE `data_biaya_diklat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `data_diklat`
--
ALTER TABLE `data_diklat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `data_fakultas`
--
ALTER TABLE `data_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_instansi`
--
ALTER TABLE `data_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_peserta_diklat`
--
ALTER TABLE `data_peserta_diklat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT untuk tabel `data_ruangan`
--
ALTER TABLE `data_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_tempat_tidur`
--
ALTER TABLE `data_tempat_tidur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `diklat`
--
ALTER TABLE `diklat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `diklat_biaya`
--
ALTER TABLE `diklat_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_instansi`
--
ALTER TABLE `jenis_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_diklat`
--
ALTER TABLE `data_diklat`
  ADD CONSTRAINT `data_diklat_ibfk_1` FOREIGN KEY (`instansi_id`) REFERENCES `data_instansi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_diklat_ibfk_2` FOREIGN KEY (`fakultas_id`) REFERENCES `data_fakultas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_diklat_ibfk_3` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_diklat_instansi` FOREIGN KEY (`instansi_id`) REFERENCES `data_instansi` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_instansi`
--
ALTER TABLE `data_instansi`
  ADD CONSTRAINT `data_instansi_ibfk_1` FOREIGN KEY (`jenis_instansi_id`) REFERENCES `jenis_instansi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_peserta_diklat`
--
ALTER TABLE `data_peserta_diklat`
  ADD CONSTRAINT `fk_peserta_diklat` FOREIGN KEY (`diklat_id`) REFERENCES `data_diklat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
