-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2019 pada 05.49
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afif-login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama_alternatif` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama_alternatif`) VALUES
(2, 'Daerah A'),
(3, 'Daerah B'),
(4, 'Daerah C'),
(5, 'Daerah D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` int(11) NOT NULL,
  `poin1` int(11) NOT NULL,
  `poin2` int(11) NOT NULL,
  `poin3` int(11) NOT NULL,
  `poin4` int(11) NOT NULL,
  `poin5` int(11) NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `sifat`) VALUES
(9, 'Harga Tanah', 4, 1, 2, 3, 4, 5, 'Benefit'),
(10, 'UMR', 5, 1, 2, 3, 4, 5, 'Benefit'),
(11, 'Pajak', 5, 1, 2, 3, 4, 5, 'Benefit'),
(12, 'Suplay Air', 3, 1, 2, 3, 4, 5, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(6, 3, 9, 1),
(7, 3, 10, 2),
(8, 3, 11, 3),
(9, 3, 12, 4),
(26, 2, 9, 5),
(27, 2, 10, 4),
(28, 2, 11, 3),
(29, 2, 12, 2),
(30, 4, 9, 1),
(31, 4, 10, 2),
(32, 4, 11, 3),
(33, 4, 12, 4),
(34, 5, 9, 1),
(35, 5, 10, 2),
(36, 5, 11, 3),
(37, 5, 12, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id` int(11) NOT NULL,
  `nama_alternatif` varchar(35) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Administrator', 'arifintajul4@gmail.com', 'default.jpg', '$2y$10$nXnrqGQTjpvg58OtOB/N.evYQjVlz7KIW37oUSQSQ2EgNMD0Dgrzq', 1, 1, 1552120289),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
