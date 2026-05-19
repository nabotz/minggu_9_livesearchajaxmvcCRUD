-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2026 pada 00.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jurusan`) VALUES
(1, '23001', 'Budi Santoso', 'Teknik Informatika'),
(2, '23002', 'Dewi Anggraini', 'Sistem Informasi'),
(3, '23003', 'Adi Wijaya', 'Teknik Komputer'),
(4, '23004', 'Putri Lestari', 'Manajemen'),
(5, '23005', 'Rizky Hidayat', 'Sistem Informasi'),
(6, '23001', 'Budi Santoso', 'Teknik Informatika'),
(7, '23002', 'Dewi Anggraini', 'Sistem Informasi'),
(8, '23003', 'Adi Wijaya', 'Teknik Komputer'),
(9, '23004', 'Putri Lestari', 'Manajemen'),
(10, '23005', 'Rizky Hidayat', 'Sistem Informasi'),
(11, '23001', 'Budi Santoso', 'Teknik Informatika'),
(12, '23002', 'Dewi Anggraini', 'Sistem Informasi'),
(13, '23003', 'Adi Wijaya', 'Teknik Komputer'),
(14, '23004', 'Putri Lestari', 'Manajemen'),
(15, '23005', 'Rizky Hidayat', 'Sistem Informasi'),
(16, '23001', 'Budi Santoso', 'Teknik Informatika'),
(17, '23002', 'Dewi Anggraini', 'Sistem Informasi'),
(18, '23003', 'Adi Wijaya', 'Teknik Komputer'),
(19, '23004', 'Putri Lestari', 'Manajemen'),
(20, '23005', 'Rizky Hidayat', 'Sistem Informasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
