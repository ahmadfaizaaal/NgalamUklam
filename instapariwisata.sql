-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 12:26 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instapariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `idFoto` int(11) NOT NULL,
  `member` varchar(15) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `link_foto` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`idFoto`, `member`, `caption`, `link_foto`, `tanggal`, `location`) VALUES
(1, 'rizaldesain', 'Lorem ipsum dolor set amet', '1.jpg', '2016-11-29 14:31:22', ''),
(3, 'rizaldesain', 'Gunung yang indah', '3edfaa286b70edcb31f27a9787c91d3a.jpg', '2016-12-04 17:46:54', ''),
(4, 'rizaldesain', 'Pemandangan yang indah', 'fc74f0e2f51a5d45f2379e8c49cdfdc3.jpg', '2016-12-04 17:52:40', 'singapore'),
(5, 'rizaldesain', 'Sore hari yang indah gan', '84ba3b3bacd0fb2cbb9304fa0f101586.jpg', '2016-12-05 00:09:00', 'malang'),
(6, 'rizaldesain', 'Taman yang indah untuk meletakkan sepatu mahals', 'e5c515599e56dbb1e73e145ab0b7738a.jpg', '2016-12-05 00:15:34', 'taman bungkul'),
(7, 'heroremek', 'Kota indah sekali', '81184277b035826baf455c96e93ecb3a.jpg', '2016-12-05 20:05:43', 'Kuala Lumpur'),
(8, 'rizaldesain', 'gunung yang indah sekali', 'f3468839d00152859300dbf331d8df3d.jpg', '2016-12-07 14:15:28', 'malang indah');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idKomentar` int(11) NOT NULL,
  `foto` varchar(7) NOT NULL,
  `member` varchar(15) NOT NULL,
  `isiKomentar` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idKomentar`, `foto`, `member`, `isiKomentar`, `tanggal`) VALUES
(1, '1', 'rizal', 'halo halo halo', '2016-12-01 07:15:24'),
(2, '1', 'aghnipastibisa', 'loha halo', '2016-12-01 17:29:21'),
(7, '5', 'rizaldesain', 'halo', '0000-00-00 00:00:00'),
(8, '5', 'rizaldesain', 'halo lagi', '0000-00-00 00:00:00'),
(9, '5', 'rizaldesain', 'halo gan, sy mau komentar nih', '0000-00-00 00:00:00'),
(10, '5', 'rizaldesain', 'hai', '0000-00-00 00:00:00'),
(11, '6', 'heroremek', 'halo gan', '0000-00-00 00:00:00'),
(12, '5', 'rizaldesain', 'hai umik', '0000-00-00 00:00:00'),
(14, '7', 'rizaldesain', 'tes', '0000-00-00 00:00:00'),
(15, '6', 'rizaldesain', 'tes', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `idLike` int(11) NOT NULL,
  `foto` varchar(7) NOT NULL,
  `member` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`idLike`, `foto`, `member`) VALUES
(2, '1', 'aghnipastibisa'),
(16, '5', 'rizaldesain'),
(17, '3', 'rizaldesain'),
(23, '6', 'heroremek'),
(25, '6', 'rizaldesain'),
(26, '7', 'rizaldesain'),
(27, '8', 'rizaldesain');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama`, `deskripsi`, `foto_profil`) VALUES
('heroremek', '9c170bca8990daab5c6adabd89afb6c8', 'Hero Wijaya', '', 'noprofil.jpg'),
('rizaldesain', '9c170bca8990daab5c6adabd89afb6c8', 'Rizal', 'Just simple person with 2 monitors to code', '6ee7cc66a97d8d6727ac326394ad6bce.jpg'),
('umihp', '9c170bca8990daab5c6adabd89afb6c8', 'umi', 'aaaaa', 'noprofil.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idFoto`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentar`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`idLike`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
