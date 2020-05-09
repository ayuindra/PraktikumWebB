-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2020 pada 13.56
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(128) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `nama_penerbit` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`kode_buku`, `judul_buku`, `penulis`, `tahun_terbit`, `nama_penerbit`, `gambar`) VALUES
('BK01', 'The 7 Habits Of Highly Effective Teens', 'Sean Covey', 1998, 'Free Press', 'buku4.jpg'),
('BK02', 'Masa Muda', 'Leo Tolstoy', 2019, 'BasaBasi', 'masa-muda.jpg'),
('BK03', 'Masa Remaja', 'Leo Tolstoy', 2018, 'BasaBasi', 'buku3.jpg'),
('BK04', 'Masa Kecil', 'Leo Tolstoy', 2017, 'BasaBasi', 'masa-kecil.jpg'),
('BK05', 'Einstein Kehidupan dan Pengaruhnya Bagi Dunia', 'Walter Isaacson', 2012, 'Bentang Buku Indonesia', 'buku1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Claire', 'claire123', '12345', 'Admin'),
(2, 'James Arthur', 'james123', '12345', 'Mahasiswa'),
(3, 'Raffael Albert', 'raffa123', '12345', 'Dosen'),
(4, 'Hammera', 'mera123', '12345', 'Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
