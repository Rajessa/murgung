-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2025 pada 15.19
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_murgung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$9SVR50PB22Pdsvikyi3Vu.ramvKLC5hT9VjRDdS0uqsGI9O7xse5.'),
(2, 'admin1', '$2y$10$Lw1k0pr6rHpXUCCdDFK0P.fvj4OdjH0DZC7DmAiuNzCqcFotkLfIe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `aktivitas` text DEFAULT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `admin_id`, `aktivitas`, `waktu`) VALUES
(2, 1, 'Login', '2025-05-09 10:02:56'),
(3, 1, 'Logout', '2025-05-09 10:03:41'),
(4, 1, 'Login', '2025-05-09 10:03:51'),
(5, 1, 'Tambah project: tegar', '2025-05-09 10:58:07'),
(6, 1, 'Edit project ID: 1', '2025-05-09 10:58:36'),
(7, 1, 'Edit project ID: 1', '2025-05-09 10:58:51'),
(8, 1, 'Edit project ID: 1', '2025-05-09 11:00:39'),
(9, 1, 'Edit project ID: 1', '2025-05-09 11:02:19'),
(10, 1, 'Hapus project ID: 1', '2025-05-09 11:23:07'),
(11, 1, 'Tambah project: tegar', '2025-05-09 11:23:32'),
(12, 1, 'Edit project ID: 2', '2025-05-09 13:23:18'),
(13, 1, 'Tambah proyek: tegar', '2025-05-09 13:49:07'),
(14, 1, 'Hapus project ID: 3', '2025-05-09 13:54:36'),
(15, 1, 'Hapus project ID: 2', '2025-05-09 13:54:38'),
(16, 1, 'Tambah proyek: tegar', '2025-05-09 13:55:26'),
(17, 1, 'Tambah proyek: tegar', '2025-05-09 14:08:17'),
(18, 1, 'Tambah proyek: tegar', '2025-05-09 14:12:16'),
(19, 1, 'Tambah proyek: tegar', '2025-05-09 14:21:07'),
(20, 1, 'Tambah proyek: tegar', '2025-05-09 14:39:23'),
(21, 1, 'Tambah proyek: tegar 1', '2025-05-09 14:44:38'),
(22, 1, 'Login', '2025-05-14 20:10:53'),
(23, 1, 'Login', '2025-05-16 09:15:15'),
(24, 1, 'Tambah proyek: tegar', '2025-05-16 09:35:01'),
(25, 1, 'Hapus project ID: 6', '2025-05-16 09:56:33'),
(26, 1, 'Hapus project ID: 4', '2025-05-16 09:56:35'),
(27, 1, 'Hapus project ID: 7', '2025-05-16 09:56:38'),
(28, 1, 'Hapus project ID: 5', '2025-05-16 09:56:39'),
(29, 1, 'Hapus project ID: 9', '2025-05-16 09:56:44'),
(30, 1, 'Tambah proyek: tegar lagi', '2025-05-16 10:12:33'),
(31, 1, 'Tambah proyek: tegar 1', '2025-05-16 10:20:31'),
(32, 1, 'Tambah proyek: tegar 1', '2025-05-16 11:19:21'),
(33, 1, 'Login', '2025-05-19 19:48:30'),
(34, 1, 'Tambah proyek: pt mencari cinta sejati sehidup semati', '2025-05-19 19:51:03'),
(35, 1, 'Hapus project ID: 12', '2025-05-19 21:02:06'),
(36, 1, 'Hapus project ID: 14', '2025-05-19 21:02:09'),
(37, 1, 'Hapus project ID: 10', '2025-05-19 21:02:11'),
(38, 1, 'Hapus project ID: 8', '2025-05-19 21:02:13'),
(39, 1, 'Hapus project ID: 13', '2025-05-19 21:02:15'),
(40, 1, 'Hapus project ID: 11', '2025-05-19 21:02:17'),
(41, 1, 'Tambah proyek: tegar', '2025-05-19 21:27:26'),
(42, 1, 'Edit project ID: 15', '2025-05-19 21:27:43'),
(43, 1, 'Login', '2025-05-20 19:41:10'),
(44, 1, 'Logout', '2025-05-20 19:47:10'),
(45, 2, 'Login', '2025-05-20 19:47:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`) VALUES
(44, 15, '682b3fced5e37-rs2.jpg'),
(45, 15, '682b3fced6915-rs3.jpg'),
(46, 15, '682b3fced7479-rs4.jpg'),
(47, 15, '682b3fced7f45-rs5.jpg'),
(48, 15, '682b3fced8a50-rs6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_data`
--

CREATE TABLE `t_data` (
  `id` int(11) NOT NULL,
  `nama_proyek` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nama_klien` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(80) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dimulai_proyek` date DEFAULT NULL,
  `tanggal_selesai_proyek` date DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_data`
--

INSERT INTO `t_data` (`id`, `nama_proyek`, `image`, `nama_klien`, `nama_perusahaan`, `deskripsi`, `tanggal_dimulai_proyek`, `tanggal_selesai_proyek`, `kategori`) VALUES
(15, 'Project RS Pendidikan Makassar', '682b3fced4ee9-rs1.jpg', 'tegar', 'RS Makassar', '-', '2025-03-06', '2025-05-19', 'gedung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indeks untuk tabel `t_data`
--
ALTER TABLE `t_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `t_data`
--
ALTER TABLE `t_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Ketidakleluasaan untuk tabel `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `t_data` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
