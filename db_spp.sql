-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 10:06 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(30) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `id_kompetensi_keahlian` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_kompetensi_keahlian`) VALUES
('XIIAN1', 'XII AN 1', 'j6'),
('XIIRPL1', 'XII RPL 1', 'j2'),
('XRPL12', 'X RPL 1', 'j1');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_keahlian`
--

CREATE TABLE `kompetensi_keahlian` (
  `id_kompetensi_keahlian` varchar(11) NOT NULL,
  `nama_kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompetensi_keahlian`
--

INSERT INTO `kompetensi_keahlian` (`id_kompetensi_keahlian`, `nama_kompetensi_keahlian`) VALUES
('j1', 'Teknik Komputer dan Jaringan (TKJ)'),
('j10', 'hrthrh'),
('j11', 'ghrtgtrehetr'),
('j12', 'gewrterwty'),
('j13', 'rewrqwer'),
('j14', 'rwetrewtqre'),
('j15', 'tewtewqyt'),
('j16', 'treytrewyre'),
('j17', 't3t43t3q'),
('j18', 'etert'),
('j19', 'ewqtwqet'),
('j2', 'Rekayasa Perangkat Lunak (RPL)'),
('j20', 'ewtretrewtyre'),
('j21', 'fdsfdsfsd'),
('j22', 'fdwfrewrewrew'),
('j23', 'dfdgsgsfdg'),
('j24', 'dgfdgdsfgsafdsa'),
('j25', 'gfggfsgsfgsgs'),
('j26', 'fwffddsfsdf'),
('j27', 'fdsfsdfsadfsaf'),
('j28', 'fdsfsdfsdaf'),
('j29', 'hjkfhlfhkgkgklgh'),
('j3', 'Multimedia (MM)'),
('j30', 'hfjkghfuyfyjk'),
('j4', 'Pekerja Sosial (Peksos)'),
('j5', 'Desain Komunikasi Visual (DKV)'),
('j6', 'Animasi (AN)'),
('j7', 'htrhyrte'),
('j8', 'gsdfgdg'),
('j9', 'gfgfgrege');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL,
  `photo` varchar(150) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `photo`) VALUES
(21, 'yamin_123', 'd565be87942e1c8f3d8b7bca35ac7c4e839485fd', 'Muhammad Yamin', 'admin', '2x3.jpg'),
(25, 'any_435', '17a3c6b449600b29b116c46196a4a7a295bcf2cd', 'Any Soraya', 'petugas', 'WhatsApp Image 2019-11-08 at 13.43.35.jpeg'),
(26, 'amri_12', '58a4382e6c56191a043e14792c204a820ed8efe0', 'Chairul Amri', 'petugas', 'WhatsApp Image 2020-01-04 at 11.11.57 (3).jpg'),
(27, 'ase12', '82379017a05706e4f8b0ea9a4f000825675b4a65', 'Aseng', 'admin', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(150) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `password`, `photo`) VALUES
('0022436101', '17.10003', 'Muhammmad Yamin', 'XIIRPL1', 'Jalan Kertas Gg Tinju No. 80 Y', '085362637026', 4, '991882ba8114ea16e8ee6fd519d101ea2cfeb700', '3x4.jpg'),
('0022643421', '123123', 'Farhan', 'XIIRPL1', 'Jalan Kertas', '082334241212', 3, '76b6aa5a388456c87bfbf513b5d8e4f3c423badd', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(2, '2003/2004', 30000),
(3, '2004/2005', 35000),
(4, '2007/2008', 60000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_kompetensi_keahlian` (`id_kompetensi_keahlian`);

--
-- Indexes for table `kompetensi_keahlian`
--
ALTER TABLE `kompetensi_keahlian`
  ADD PRIMARY KEY (`id_kompetensi_keahlian`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_kompetensi_keahlian`) REFERENCES `kompetensi_keahlian` (`id_kompetensi_keahlian`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
