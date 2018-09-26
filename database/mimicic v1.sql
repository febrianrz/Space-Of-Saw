-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 11:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mimicici`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(1) NOT NULL,
  `gambar_admin` varchar(100) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` int(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `gambar_admin`, `nama`, `deskripsi`, `alamat`, `email`, `telepon`, `username`, `password`) VALUES
(1, 'upload/Tulus_1_(1).JPG', 'MIMICICI BOJONG', 'mimicici merupakan toko kue yang menjual aneka kue basah.', 'Bojonggede', 'ayoe@gmail.com', 888999000, 'ayoe', 'yoeman');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(5) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga_produk` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`) VALUES
('P001', 'jola', 30000),
('P002', 'kue sosis', 25000),
('P003', 'kue basah', 35000),
('P004', 'bakwan', 40000),
('P005', 'Gorengan', 15000),
('P006', 'Risol Ayam', 10000),
('P007', 'Roti Unyil', 3000),
('P008', 'doDol', 3500),
('P009', 'Soto', 6000),
('P010', 'grgr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kode_transaksi` int(10) NOT NULL,
  `produk_beli` varchar(30) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_transaksi`, `kode_transaksi`, `produk_beli`, `jumlah`) VALUES
(1, '2018-06-04', 1, 'RU, KS, ST, LU', 4),
(2, '2018-06-13', 2, 'UI, CE, KE, LE', 4),
(3, '2018-06-28', 3, 'CE, KE', 2),
(4, '2018-06-13', 4, 'RE, LE, SE', 3),
(5, '2018-06-14', 5, 'CE', 1),
(7, '2018-06-28', 6, 'KU', 1),
(8, '2009-03-12', 4, 'CE, LU, BE, DU', 4),
(9, '0000-00-00', 5, 'SJ, MU, YE, RE', 0),
(10, '2012-03-09', 50, 'CE, LU, BE, DU', 4),
(11, '2012-03-09', 60, 'SJ, MU, YE, RE', 0),
(12, '2012-03-09', 50, 'CE, LU, BE, DU', 4),
(13, '2012-03-09', 60, 'SJ, MU, YE, RE', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
