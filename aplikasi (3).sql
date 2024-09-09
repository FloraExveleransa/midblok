-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2024 pada 07.22
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `timestamp` datetime(6) NOT NULL,
  `deleted` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `activity`
--

INSERT INTO `activity` (`id_activity`, `id_user`, `activity`, `timestamp`, `deleted`) VALUES
(1, 1, 'tes', '2024-09-10 08:10:36.000000', '2024-09-04 13:10:36.000000'),
(2, 1, 'tes2', '2024-09-04 08:14:14.000000', '2024-09-04 08:14:14.000000'),
(3, 1, 'flora buka activity dia sendiri', '2024-09-04 22:11:35.000000', '0000-00-00 00:00:00.000000'),
(4, 1, 'flora buka activity dia sendiri', '2024-09-04 22:40:55.000000', '0000-00-00 00:00:00.000000'),
(5, 1, 'flora buka activity dia sendiri', '2024-09-04 22:41:14.000000', '0000-00-00 00:00:00.000000'),
(6, 1, 'flora buka activity dia sendiri', '2024-09-04 22:41:27.000000', '0000-00-00 00:00:00.000000'),
(7, 1, 'user membuka activity', '2024-09-04 22:44:14.000000', '0000-00-00 00:00:00.000000'),
(8, 1, 'user membuka activity', '2024-09-04 22:44:31.000000', '0000-00-00 00:00:00.000000'),
(9, 1, 'user membuka activity', '2024-09-04 22:52:03.000000', '0000-00-00 00:00:00.000000'),
(10, 1, 'user membuka activity', '2024-09-04 22:54:23.000000', '0000-00-00 00:00:00.000000'),
(11, 1, 'user membuka activity', '2024-09-04 23:55:09.000000', '0000-00-00 00:00:00.000000'),
(12, 1, 'user membuka activity', '2024-09-04 23:55:17.000000', '0000-00-00 00:00:00.000000'),
(13, 1, 'user membuka activity', '2024-09-04 23:58:44.000000', '0000-00-00 00:00:00.000000'),
(14, 1, 'User membuka Dashboard', '2024-09-05 00:15:32.000000', '0000-00-00 00:00:00.000000'),
(15, 1, 'user membuka activity', '2024-09-05 19:51:58.000000', '0000-00-00 00:00:00.000000'),
(16, 1, 'user membuka activity', '2024-09-08 20:12:40.000000', '0000-00-00 00:00:00.000000'),
(17, 1, 'user membuka activity', '2024-09-08 20:12:57.000000', '0000-00-00 00:00:00.000000'),
(18, 1, 'user membuka activity', '2024-09-08 20:25:45.000000', '0000-00-00 00:00:00.000000'),
(19, 1, 'user membuka activity', '2024-09-09 00:00:28.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs_login`
--

CREATE TABLE `hs_login` (
  `id_hs` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `nama_users` varchar(255) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hs_login`
--

INSERT INTO `hs_login` (`id_hs`, `id_user`, `nama_users`, `login_time`, `logout_time`) VALUES
(2, 1, 'admin', '2024-08-12 22:20:56', '2024-08-14 00:11:33'),
(3, 18, 'aria', '2024-08-12 22:37:53', '2024-08-21 05:11:07'),
(4, 1, 'admin', '2024-08-12 22:40:44', '2024-08-14 00:11:33'),
(5, 1, 'admin', '2024-08-12 23:24:44', '2024-08-14 00:11:33'),
(6, 1, 'admin', '2024-08-12 23:39:29', '2024-08-14 00:11:33'),
(7, 1, 'admin', '2024-08-12 23:55:49', '2024-08-14 00:11:33'),
(8, 18, 'aria', '2024-08-12 23:56:04', '2024-08-21 05:11:07'),
(9, 1, 'admin', '2024-08-12 23:57:37', '2024-08-14 00:11:33'),
(10, 14, 'yoga', '2024-08-12 23:58:55', '2024-08-13 00:43:38'),
(11, 18, 'aria', '2024-08-12 23:59:53', '2024-08-21 05:11:07'),
(12, 14, 'yoga', '2024-08-13 00:00:13', '2024-08-13 00:43:38'),
(13, 14, 'yoga', '2024-08-13 00:02:17', '2024-08-13 00:43:38'),
(14, 14, 'yoga', '2024-08-13 00:11:51', '2024-08-13 00:43:38'),
(15, 1, 'admin', '2024-08-13 00:39:30', '2024-08-14 00:11:33'),
(26, 1, 'admin', '2024-08-13 22:52:09', '2024-08-14 00:11:33'),
(27, 20, 'asep', '2024-08-13 22:52:34', '2024-08-13 22:59:34'),
(28, 1, 'admin', '2024-08-13 22:53:19', '2024-08-14 00:11:33'),
(29, 20, 'asep', '2024-08-13 22:55:48', '2024-08-13 22:59:34'),
(30, 20, 'asep', '2024-08-13 22:55:58', '2024-08-13 22:59:34'),
(31, 18, 'aria', '2024-08-13 22:59:42', '2024-08-21 05:11:07'),
(32, 1, 'admin', '2024-08-13 23:41:15', '2024-08-14 00:11:33'),
(33, 18, 'aria', '2024-08-13 23:56:53', '2024-08-21 05:11:07'),
(34, 20, 'asep', '2024-08-13 23:57:16', '0000-00-00 00:00:00'),
(35, 1, 'admin', '2024-08-14 00:05:44', '2024-08-14 00:11:33'),
(36, 1, 'admin', '2024-08-14 00:09:26', '2024-08-14 00:11:33'),
(37, 1, 'admin', '2024-08-14 00:18:10', '0000-00-00 00:00:00'),
(38, 1, 'admin', '2024-08-14 00:20:31', '0000-00-00 00:00:00'),
(39, 1, 'admin', '2024-08-14 02:11:53', '0000-00-00 00:00:00'),
(40, 18, 'aria', '2024-08-14 02:15:47', '2024-08-21 05:11:07'),
(41, 18, 'aria', '2024-08-21 04:19:28', '2024-08-21 05:11:07'),
(42, 18, 'aria', '2024-08-21 05:10:01', '2024-08-21 05:11:07'),
(43, 14, 'yoga', '2024-08-21 05:11:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama`) VALUES
(1, 'admin'),
(2, 'kesiswaan'),
(3, 'kepala sekolah'),
(4, 'yayasan\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mskdata`
--

CREATE TABLE `mskdata` (
  `id_mskdata` int(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `situs_kegiatan` varchar(255) NOT NULL,
  `tempat_kegiatan` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `dana_keluar` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mskdata`
--

INSERT INTO `mskdata` (`id_mskdata`, `kegiatan`, `tanggal_kegiatan`, `situs_kegiatan`, `tempat_kegiatan`, `penyelenggara`, `keterangan`, `jam_mulai`, `jam_selesai`, `dana_keluar`, `proposal`, `created_at`) VALUES
(1, '17 Agustus', '2024-09-04', 'Hari nasional', 'sph', 'pak dedi', 'atribut lengkap', '02:00:00', '05:00:00', '20000', 'cover.pdf', '2024-08-31 12:01:28'),
(2, 'PSB', '2024-09-17', 'kegiatan sekolah', 'sph', 'pak dedi', 'atribut lengkap', '05:00:00', '12:00:00', '30000', 'flora.pdf', '2024-08-29 23:45:58'),
(3, 'Sertijab 2023/2024', '2024-09-11', 'kegiatan sekolah', 'sph', 'pak dedi', 'atribut lengkap', '02:00:00', '03:00:00', '400000', 'flora.pdf', '2024-09-01 23:14:17'),
(4, 'Hari Kartini', '2024-09-04', 'hari nasional', 'sph', 'pak dedi', 'atribut lengkap', '04:00:00', '06:00:00', '200000', 'flora.pdf', '2024-09-18 00:09:32'),
(10, 'flora', '2024-09-03', 'buruk', 'gb', 'lenggara', 'keterangan', '08:47:00', '08:49:00', '90000', '', '0000-00-00 00:00:00'),
(11, 'flora', '2024-09-03', 'buruk', 'gb', 'lenggara', 'keterangan', '08:47:00', '08:49:00', '90000', '', '0000-00-00 00:00:00'),
(16, 'MPLS TA 2023/2024', '2008-08-08', 'MPLS', 'sph', 'pak dedi', 'atribut lengkap', '13:59:00', '16:59:00', '80000', 'dftr isi.pdf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_level` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_level`, `foto`) VALUES
(1, 'user1', '1', 'flora@gmail.com', 1, 'logo.jpg'),
(2, 'user2', '2', 'flora@gmail.com', 2, '8.jpg'),
(3, 'user3', '3', 'tes@gmail.com', 3, '0.jpg'),
(4, 'user4', '4', 'tes2', 4, '7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indeks untuk tabel `hs_login`
--
ALTER TABLE `hs_login`
  ADD PRIMARY KEY (`id_hs`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `mskdata`
--
ALTER TABLE `mskdata`
  ADD PRIMARY KEY (`id_mskdata`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `hs_login`
--
ALTER TABLE `hs_login`
  MODIFY `id_hs` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mskdata`
--
ALTER TABLE `mskdata`
  MODIFY `id_mskdata` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
