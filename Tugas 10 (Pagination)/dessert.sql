-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2020 pada 16.20
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dessert`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_dessert`
--

CREATE TABLE `menu_dessert` (
  `id` int(11) NOT NULL,
  `nama_dessert` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_dessert`
--

INSERT INTO `menu_dessert` (`id`, `nama_dessert`, `image`) VALUES
(1, 'Fluffy Pancake', 'pancake.jpg'),
(2, 'Strawberry Gelato', 'gelato.jpg'),
(3, 'Christmast Sponge', 'bolu.jpeg'),
(4, 'Cheese Cake', 'kuekeju.jpg'),
(5, 'Lemon Cake', 'kuelemon.jpg'),
(6, 'Tarta de Santiago', 'tarta.jpg'),
(7, 'Strawberry Mochi', 'mochi.jpg'),
(8, 'Banofee Pie', 'banofee.jpg'),
(9, 'Cannoli', 'canoli.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu_dessert`
--
ALTER TABLE `menu_dessert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu_dessert`
--
ALTER TABLE `menu_dessert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
