-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 02:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luthfi_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_admin`
--

CREATE TABLE `luthfi_admin` (
  `id_user` int(2) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_admin`
--

INSERT INTO `luthfi_admin` (`id_user`, `username`, `password`, `fullname`, `level`, `gambar`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', ''),
(2, 'upi', 'upi', 'upi', 'petugas', ''),
(3, 'p', 'p', 'p', '', ''),
(4, '4', '4', '4', 'anggota', ''),
(13, 'p', 'p', 'p', 'admin', 'gambar_admin/1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_anggota`
--

CREATE TABLE `luthfi_anggota` (
  `id_anggota` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `gambar` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_anggota`
--

INSERT INTO `luthfi_anggota` (`id_anggota`, `email`, `nama`, `username`, `jk`, `kelas`, `ttl`, `alamat`, `gambar`) VALUES
(1, '@ANGi', 'anggot', 'anggot', 'p', 'XII RPL ', '4', '4', '37acf42b-2b3b-4fdb-a8cf-3a6c608c4d98.png'),
(8, '@luthfich', 'luthfi', 'luthfi', 'L', 'XI PPLG B', 'bandung,april,2007', 'GBR1', '641d9600-0a0f-43ab-8d74-fee32cbe5dd3.jpg'),
(9, '@qey', 'key', 'key', 'P', 'XI DKV', 'bandung,november,2007', 'Padalrang', '92fd4697-bbf3-48e0-93dd-181aa1986f88.jpg'),
(17, '@luthfi_ganteng', 'sel', 'sel', 'L', 'sell', '111', '1022222', 'Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_buku`
--

CREATE TABLE `luthfi_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah_buku` int(2) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tgl_input` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `Stok` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_buku`
--

INSERT INTO `luthfi_buku` (`id_buku`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `isbn`, `kategori`, `jumlah_buku`, `asal`, `tgl_input`, `gambar`, `Stok`) VALUES
(5, 'Septhian', 'Poppi Pertiwi', '2020', 'Poppi Pertiwi', '997858', 'Romance', 252, 'Pembelian', '2024/01/30', 'gambar_buku/Cover_Septihan.jpeg', 20),
(6, 'Galaksi', 'poppi Pertiwi', '2018', 'Poppi Pertiwi', '233-55', 'Aksi-Romance', 520, 'Pembelian', '2024/01/30', 'gambar_buku/18ea2ec6-87a6-4af2-ac1f-be6d89dac9c1.jpg', 17),
(14, 'Argantara', 'Luthf', '2020', 'luthfi', '1022', 'romance', 12, 'Pembelian', '2024/02/29', 'gambar_buku/avenger.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_peminjam`
--

CREATE TABLE `luthfi_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` enum('belum','sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_peminjam`
--

INSERT INTO `luthfi_peminjam` (`id_peminjam`, `id_anggota`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `status`) VALUES
(6, 9, 14, '2024-02-29', '2024-02-29', 'sudah'),
(17, 1, 14, '2024-03-08', '2024-03-29', 'belum'),
(18, 1, 6, '2024-03-07', '2024-03-06', 'belum'),
(19, 17, 5, '2024-03-06', '2024-03-06', 'belum'),
(21, 9, 5, '2024-03-01', '2024-03-09', 'belum'),
(22, 8, 5, '2024-03-23', '2024-03-15', 'belum'),
(26, 17, 5, '2024-03-10', '2024-03-16', 'belum'),
(27, 17, 5, '2024-03-10', '2024-03-16', 'belum'),
(34, 8, 6, '2024-03-01', '2024-03-01', 'belum'),
(35, 9, 14, '2024-03-27', '2024-03-15', 'belum'),
(38, 1, 5, '2024-03-08', '2024-03-08', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `luthfi_admin`
--
ALTER TABLE `luthfi_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `luthfi_anggota`
--
ALTER TABLE `luthfi_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `luthfi_buku`
--
ALTER TABLE `luthfi_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `luthfi_admin`
--
ALTER TABLE `luthfi_admin`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `luthfi_anggota`
--
ALTER TABLE `luthfi_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `luthfi_buku`
--
ALTER TABLE `luthfi_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  ADD CONSTRAINT `luthfi_peminjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `luthfi_anggota` (`id_anggota`),
  ADD CONSTRAINT `luthfi_peminjam_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `luthfi_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
