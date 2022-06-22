-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2022 pada 09.34
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_gejala`
--

CREATE TABLE `tb_m_gejala` (
  `id` int(11) NOT NULL,
  `Kode_Gejala` varchar(5) NOT NULL,
  `Nama_Gejala` varchar(255) NOT NULL,
  `Bobot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_m_gejala`
--

INSERT INTO `tb_m_gejala` (`id`, `Kode_Gejala`, `Nama_Gejala`, `Bobot`) VALUES
(1, 'G001', 'Daun Menguning', '0.8'),
(3, 'G002', 'Daun Segar', '0.6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_informasi`
--

CREATE TABLE `tb_m_informasi` (
  `id` int(11) NOT NULL,
  `perawatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_penyakit`
--

CREATE TABLE `tb_m_penyakit` (
  `id` int(11) NOT NULL,
  `Kode_Penyakit` varchar(5) NOT NULL,
  `Nama_Penyakit` varchar(255) NOT NULL,
  `Solusi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_perawatan`
--

CREATE TABLE `tb_m_perawatan` (
  `id` int(11) NOT NULL,
  `perawatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_m_gejala`
--
ALTER TABLE `tb_m_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_m_informasi`
--
ALTER TABLE `tb_m_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_m_penyakit`
--
ALTER TABLE `tb_m_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_m_perawatan`
--
ALTER TABLE `tb_m_perawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_m_gejala`
--
ALTER TABLE `tb_m_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_m_informasi`
--
ALTER TABLE `tb_m_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_m_penyakit`
--
ALTER TABLE `tb_m_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_m_perawatan`
--
ALTER TABLE `tb_m_perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
