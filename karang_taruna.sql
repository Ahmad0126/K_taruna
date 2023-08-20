-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 10:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karang_taruna`
--
CREATE DATABASE IF NOT EXISTS `karang_taruna` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `karang_taruna`;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jabatan` enum('ketua','sekertaris','bendahara','anggota biasa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `email`, `password`, `no_hp`, `jabatan`) VALUES
(1, 'Ardy Nur S', 'bardyramutu@gmail.com', '$2y$10$6/46KxGbEc2s17t/vUialu5u40XklE1l9MojnBcvj/HrApYpEk5K.', '085496254736', 'ketua'),
(4, 'bagas', 'bgs@smkn2kra.sch.id', '$2y$10$yAKwffjz8wyWfZ8ixKi34.zgJypEULyusv/wrH3z/Ir7u.S4xNJ6u', '087312655472', 'bendahara'),
(5, 'Decco Saputra', 'decco@gmail.com', '$2y$10$i0Y5ZS1rLiGdjNFDl9OsOOLFTJ8jo41fK35PEjVhgG7FS99L6Dqkm', '087351762776', 'sekertaris'),
(7, 'Doni A.', 'ardygg@smkn2kra.sch.id', '', '089462863862', 'anggota biasa'),
(8, 'Andre', '', '', '087567286239', 'anggota biasa'),
(9, 'Rendi', '', '', '087567287835', 'anggota biasa'),
(10, 'Fajar', '', '', '', 'anggota biasa');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `masuk` int(11) DEFAULT NULL,
  `keluar` int(11) DEFAULT NULL,
  `sebab` text NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `id_anggota`, `tanggal`, `masuk`, `keluar`, `sebab`, `saldo`) VALUES
(1, 1, '2023-05-28 00:00:00', 10000, NULL, 'kas', 10000),
(2, 5, '2023-05-28 00:00:00', 10000, NULL, 'kas', 20000),
(3, NULL, '2023-05-29 00:00:00', 1000000, NULL, 'Uang tower cair', 1020000),
(4, NULL, '2023-05-30 00:00:00', NULL, 200000, 'Menjenguk saudara yang sakit', 820000),
(12, NULL, '2023-06-12 09:00:00', NULL, 20000, 'kas keluar', 800000),
(13, NULL, '2023-06-12 09:10:00', 50000, 0, 'Bantuan dari Pak RW', 850000),
(17, 1, '2023-06-12 20:10:00', 10000, NULL, 'kas', 860000),
(18, 4, '2023-06-12 20:11:00', 20000, NULL, 'kas', 880000),
(19, 5, '2023-06-12 20:13:00', 10000, NULL, 'kas', 890000),
(20, NULL, '2023-06-17 00:00:00', NULL, 50000, 'sewa pemotong rambut', 840000),
(21, 7, '2023-06-22 00:00:00', 10000, NULL, 'kas', 850000),
(22, 1, '2022-12-22 13:58:59', 10000, NULL, 'kas', 10000),
(23, NULL, '2022-12-30 13:58:59', NULL, 10000, 'kas keluar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `laporan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `judul`, `laporan`, `tanggal`) VALUES
(1, 'Tes 2023', '1 jsddfhkuawgefoiwhvjnab\r\n2 awjghdqabdcihcbnk\r\n3 jatyqwioerpnv\r\n4 qweujhwlawvka', '2023-06-21'),
(2, 'Tes 2023/02/24/11:21', 'qwertyuiop\r\nhj,nmnllhjhmn\r\n67787ik67il', '2023-06-29'),
(3, 'Tes 2023/02/24/11:22', 'qwertyytuyuuibnmngh', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `log_anggota`
--

CREATE TABLE `log_anggota` (
  `log_id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `aktivitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `log_anggota`
--
ALTER TABLE `log_anggota`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_anggota`
--
ALTER TABLE `log_anggota`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
