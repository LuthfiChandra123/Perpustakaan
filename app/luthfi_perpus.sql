-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2024 pada 09.50
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
-- Database: `luthfi_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `luthfi_admin`
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
-- Dumping data untuk tabel `luthfi_admin`
--

INSERT INTO `luthfi_admin` (`id_user`, `username`, `password`, `fullname`, `level`, `gambar`) VALUES
(1, 'luthfi', 'admin', 'admin', 'Admin', ''),
(2, 'upi', 'upi', 'upi', 'Petugas', ''),
(14, 'chandra', 'chandra', 'chanddra', 'Petugas', 'gambar_admin/sprite-skin-flat.'),
(16, 'luthfi@.com', 'ujang', 'udinaja', 'Petugas', 'gambar_admin/ssamson.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luthfi_anggota`
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
-- Dumping data untuk tabel `luthfi_anggota`
--

INSERT INTO `luthfi_anggota` (`id_anggota`, `email`, `nama`, `username`, `jk`, `kelas`, `ttl`, `alamat`, `gambar`) VALUES
(1, '@ANGi', 'anggot', 'anggot', 'p', 'XII RPL ', '4', '4', '37acf42b-2b3b-4fdb-a8cf-3a6c608c4d98.png'),
(8, '@luthfich', 'luthfi', 'luthfi', 'L', 'XI PPLG B', 'bandung,april,2007', 'GBR1', '641d9600-0a0f-43ab-8d74-fee32cbe5dd3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luthfi_buku`
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
-- Dumping data untuk tabel `luthfi_buku`
--

INSERT INTO `luthfi_buku` (`id_buku`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `isbn`, `kategori`, `jumlah_buku`, `asal`, `tgl_input`, `gambar`, `stok`) VALUES
(5, 'Septhian', 'Poppi Pertiwi', '2020', 'Poppi Pertiwi', '997858', 'Romance', 252, 'Pembelian', '2024/01/30', 'gambar_buku/Cover_Septihan.jpeg', 3),
(6, 'Galaksi', 'poppi Pertiwi', '2018', 'Poppi Pertiwi', '233-55', 'Aksi-Romance', 520, 'Pembelian', '2024/01/30', 'gambar_buku/18ea2ec6-87a6-4af2-ac1f-be6d89dac9c1.jpg', 5),
(14, 'Argantara', 'Luthf', '2020', 'luthfi', '1022', 'romance', 170, 'Pembelian', '2024/02/29', 'gambar_buku/download.jpg', 3),
(17, 'Buku Codinhg', 'Mbah coding', '1999', 'mbah coding', '1011', 'pelajaran', 26, 'Sumbangan', '2024/03/29', '89e4850b-99b0-42bb-bc54-9014ad7cb2e6.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `luthfi_peminjam`
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
-- Dumping data untuk tabel `luthfi_peminjam`
--

INSERT INTO `luthfi_peminjam` (`id_peminjam`, `id_anggota`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `status`) VALUES
(17, 1, 14, '2024-03-08', '2024-03-29', 'sudah'),
(18, 1, 6, '2024-03-07', '2024-03-06', 'sudah'),
(43, 8, 5, '2024-03-08', '2024-03-08', 'sudah'),
(45, 8, 5, '2024-03-01', '2024-03-23', 'sudah'),
(53, 8, 6, '2024-05-11', '2024-05-18', 'sudah'),
(56, 1, 6, '2024-05-17', '2024-05-30', 'sudah'),
(60, 8, 5, '2024-05-09', '2024-05-24', 'sudah'),
(62, 1, 17, '2024-05-16', '2024-05-17', 'sudah'),
(63, 1, 17, '2024-05-17', '2024-05-29', 'sudah'),
(64, 1, 17, '2024-05-18', '2024-05-31', 'sudah'),
(65, 8, 17, '2024-05-17', '2024-05-31', 'sudah'),
(66, 8, 14, '2024-05-11', '2024-05-24', 'sudah'),
(68, 1, 5, '2024-05-16', '2024-05-25', 'sudah'),
(69, 1, 5, '2024-05-10', '2024-05-24', 'sudah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `luthfi_admin`
--
ALTER TABLE `luthfi_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `luthfi_anggota`
--
ALTER TABLE `luthfi_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `luthfi_buku`
--
ALTER TABLE `luthfi_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `luthfi_admin`
--
ALTER TABLE `luthfi_admin`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `luthfi_anggota`
--
ALTER TABLE `luthfi_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `luthfi_buku`
--
ALTER TABLE `luthfi_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `luthfi_peminjam`
--
ALTER TABLE `luthfi_peminjam`
  ADD CONSTRAINT `luthfi_peminjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `luthfi_anggota` (`id_anggota`) ON DELETE CASCADE,
  ADD CONSTRAINT `luthfi_peminjam_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `luthfi_buku` (`id_buku`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
