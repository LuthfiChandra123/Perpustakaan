-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 03:29 AM
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
  `level` enum('Petugas','Admin') NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_admin`
--

INSERT INTO `luthfi_admin` (`id_user`, `username`, `password`, `fullname`, `level`, `gambar`) VALUES
(2, 'chand', 'petugas', 'petugas', 'Petugas', 'gambar_admin/ssamson.jpg'),
(17, 'luthfi', 'admin', 'admin', 'Admin', 'gambar_admin/ssamson.jpg');

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
(1, '@ANGi', 'anggot', 'anggot', 'p', 'XII RPL ', '2024-12-11', '4', '37acf42b-2b3b-4fdb-a8cf-3a6c608c4d98.png'),
(8, '@luthfich', 'luthfi', 'luthfi', 'L', 'XI PPLG B', '2008-07-21', 'GBR1', '641d9600-0a0f-43ab-8d74-fee32cbe5dd3.jpg'),
(19, 'us76@gmail.com', 'may', 'admin', 'L', 'XI PPLG B', '2025-02-21', 'e', '92fd4697-bbf3-48e0-93dd-181aa1986f88.jpg'),
(20, 'ragi@gmail.com', 'muhamad ragi', 'ragi', 'L', 'xi mesin a', '2007-06-21', 'gbr 1 blok e4 no2', 'ssamson.jpg'),
(21, 'udin@gmail.comj', 'ahmad udin', 'udin1022', 'L', 'xii dkv b', '2025-02-21', 'gbr 1 blok e4 no2', '54b21d38-348b-4a8a-890f-7eb267d692be.jpg');

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
  `stok` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_buku`
--

INSERT INTO `luthfi_buku` (`id_buku`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `isbn`, `kategori`, `jumlah_buku`, `asal`, `tgl_input`, `gambar`, `stok`) VALUES
(5, 'Septhian', 'Poppi Pertiwi', '2020', 'Poppi Pertiwi', '997858', 'Romance', 252, 'Pembelian', '2024/01/30', 'gambar_buku/Cover_Septihan.jpeg', 1),
(6, 'Galaksi', 'poppi Pertiwi', '2018', 'Poppi Pertiwi', '233-55', 'Aksi-Romance', 520, 'Pembelian', '2024/01/30', 'gambar_buku/e6462ec0-ad5b-48c0-82f8-1998daee4e57.jpg', 1),
(14, 'Argantara', 'ray', '2020', 'rey', '1022', 'romance', 170, 'Pembelian', '2024/02/29', 'gambar_buku/fea0ab63-c12a-4ed1-9223-0022aedde99b.jpg', 0),
(17, 'Buku Codinhg', 'Mbah coding', '1999', 'mbah coding', '1011', 'pelajaran', 26, 'Sumbangan', '2024/03/29', 'gambar_buku/avenger.jpg', 6),
(25, 'Angkasa', 'luthfi', '1999', 'luthfi', '1000022', 'romanis', 120, 'Pembelian', '2024/05/22', 'gambar_buku/18ea2ec6-87a6-4af2-ac1f-be6d89dac9c1.jpg', 0),
(27, 'sesaat', 'unaidi hariadi', '2019', 'andi mualim', '100028', 'novel', 11, 'Pembelian', '2025/02/21', 'ed7d3a96-54af-4cc4-8bb3-af2aa8877b9c.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_peminjam`
--

CREATE TABLE `luthfi_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` enum('belum','sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_peminjam`
--

INSERT INTO `luthfi_peminjam` (`id_peminjam`, `id_user`, `id_anggota`, `tgl_peminjaman`, `tgl_pengembalian`, `status`) VALUES
(1, 2, 8, '2024-05-28', '2024-06-08', 'sudah'),
(2, 2, 19, '2024-05-28', '2024-05-30', 'sudah'),
(3, 2, 8, '2024-05-28', '2024-05-30', 'sudah'),
(4, 2, 8, '2024-05-27', '2024-06-01', 'sudah'),
(64, 17, 21, '2025-02-21', '2025-03-01', 'belum'),
(65, 17, 8, '2025-02-21', '2025-02-22', 'belum'),
(66, 17, 21, '2025-02-21', '2025-03-08', 'belum'),
(67, 17, 19, '2025-02-21', '2025-03-08', 'belum'),
(68, 17, 1, '2025-02-21', '2025-02-22', 'belum'),
(69, 17, 8, '2025-02-21', '2025-03-01', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_peminjam_det`
--

CREATE TABLE `luthfi_peminjam_det` (
  `id_peminjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_peminjam_det`
--

INSERT INTO `luthfi_peminjam_det` (`id_peminjam`, `id_buku`) VALUES
(1, 6),
(1, 17),
(2, 17),
(3, 25),
(4, 14),
(5, 6),
(6, 14),
(7, 6),
(7, 14),
(8, 6),
(8, 6),
(9, 14),
(10, 6),
(10, 17),
(11, 17),
(12, 17),
(13, 17),
(14, 25),
(15, 17),
(16, 17),
(17, 17),
(19, 17),
(20, 17),
(20, 14),
(21, 17),
(22, 17),
(23, 6),
(24, 5),
(25, 14),
(26, 25),
(27, 5),
(28, 14),
(29, 17),
(30, 17),
(31, 14),
(32, 17),
(33, 17),
(34, 25),
(35, 6),
(36, 17),
(37, 17),
(38, 14),
(39, 5),
(40, 25),
(41, 25),
(42, 5),
(43, 5),
(43, 5),
(44, 6),
(45, 6),
(46, 5),
(46, 14),
(47, 6),
(48, 5),
(48, 17),
(48, 17),
(49, 17),
(50, 17),
(51, 17),
(54, 14),
(55, 14),
(56, 5),
(57, 5),
(58, 5),
(58, 25),
(59, 6),
(60, 5),
(60, 14),
(61, 14),
(62, 6),
(62, 6),
(63, 6),
(64, 14),
(65, 6),
(66, 27),
(67, 6),
(68, 6),
(69, 25);

-- --------------------------------------------------------

--
-- Table structure for table `luthfi_temp`
--

CREATE TABLE `luthfi_temp` (
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luthfi_temp`
--

INSERT INTO `luthfi_temp` (`id_anggota`, `id_buku`, `id_user`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES
(8, 6, 0, '2024-05-29', '2024-05-31'),
(8, 6, 0, '2024-05-31', '2024-05-31'),
(8, 6, 0, '2024-05-28', '2024-06-08'),
(8, 6, 0, '2024-05-29', '2024-06-01');

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
  ADD PRIMARY KEY (`id_peminjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `luthfi_admin`
--
ALTER TABLE `luthfi_admin`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `luthfi_anggota`
--
ALTER TABLE `luthfi_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `luthfi_buku`
--
ALTER TABLE `luthfi_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
