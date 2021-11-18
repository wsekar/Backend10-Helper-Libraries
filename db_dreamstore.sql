-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 07:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dreamstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_album`
--

CREATE TABLE `tb_album` (
  `Id_album` int(25) NOT NULL,
  `nama_album` varchar(100) NOT NULL,
  `tanggal_rilis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_album`
--

INSERT INTO `tb_album` (`Id_album`, `nama_album`, `tanggal_rilis`) VALUES
(1, 'Love & Letter', '2016-04-25'),
(2, 'You Make My Day', '2018-07-16'),
(3, 'You Make My Dawn', '2019-01-21'),
(4, 'Attacca', '2021-10-22'),
(5, 'q', '2021-11-24'),
(6, 'w', '2021-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Album'),
(2, 'Lightstick'),
(3, 'Season Greeting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(64) NOT NULL,
  `nama_asli` varchar(255) NOT NULL,
  `nama_panggung` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sub_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_asli`, `nama_panggung`, `tanggal_lahir`, `sub_unit`) VALUES
(1, 'Choi Seung Cheol', 'S.Coups', '1995-08-08', 'Hip-Hop Team'),
(2, 'Yoon Jeong Han', 'Jeonghan', '1995-10-04', 'Vocal Team'),
(3, 'Joshua Hong', 'Joshua', '1995-12-30', 'Vocal Team'),
(4, 'Wen Junhui', 'Jun', '1996-06-10', 'Performance Team'),
(5, 'Kwon Soonyoung', 'Hoshi', '1996-06-15', 'Performance Team'),
(6, 'Jeon Wonwoo', 'Wonwoo', '1996-07-17', 'Hip-Hop Team'),
(7, 'Lee Jihoon', 'Woozi', '1996-11-22', 'Vocal Team');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi_produk` varchar(50) DEFAULT NULL,
  `harga_produk` varchar(10) DEFAULT NULL,
  `gambar_produk` varchar(50) DEFAULT NULL,
  `kategori_produk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `gambar_produk`, `kategori_produk`) VALUES
(1, 'Attacca', 'Album Attacca', '190000', 'attacca.jpeg', 1),
(2, 'Your Choice', 'Album Your Choice', '315000', 'yourchoice.jpg', 1),
(3, 'Semicolon', 'Album Semicolon', '305000', 'semicolon.jpg', 1),
(4, 'Lightstick Seventeen Ver.1', 'Lightstick Seventeen Ver.1', '690000', 'lsver1.jpg', 2),
(5, 'Lightstick Seventeen Ver.2', 'Lightstick Seventeen Ver.2', '720000', 'lsver2.jpg', 2),
(6, 'Seventeen 2021 Season\'s Greeting', 'Seventeen 2021 Season\'s Greeting', '870000', 'sg2021.jpg', 3),
(7, 'Seventeen 2020 Season\'s Greeting', 'Seventeen 2020 Season\'s Greeting', '930000', 'sg2020.jpg', 3),
(8, 'Seventeen 2019 Season\'s Greeting', 'Seventeen 2019 Season\'s Greeting', '683000', 'sg2019.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
