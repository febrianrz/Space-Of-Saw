-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 07:12 PM
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
  `telepon` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `gambar_admin`, `nama`, `deskripsi`, `alamat`, `email`, `telepon`, `username`, `password`) VALUES
(1, 'upload/', 'AYAS SNACK', 'Ayas Snack merupakan toko kue yang menjual aneka kue basah.', 'Kelapa Dua, Depok', 'ayasnack@gmail.com', '081289643843', 'ayasnack', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(2) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga_produk` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`) VALUES
(1, 'Risol Mayo', 2000),
(2, 'Lontong', 1000),
(3, 'Kue Sus', 2000),
(4, 'Bakwan Jagung', 1500),
(5, 'Onde-onde', 15000),
(6, 'Lemper', 10000),
(7, 'Pastel', 3000),
(8, 'Dadar Gulung', 3500),
(9, 'Kue Lumpur', 1500),
(10, 'Martabak Telur', 1500),
(11, 'Putu Ayu', 2000),
(12, 'Bolu Kukus', 2000),
(13, 'Tahu Isi', 2000),
(14, 'Risol', 1500),
(15, 'Kue Pepe', 2000),
(16, 'Kue Pukis', 1000),
(17, 'Kue Bugis', 1500),
(18, 'Klepon', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(4) NOT NULL,
  `id_produk` int(2) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_penjualan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_produk`, `tanggal_transaksi`, `jumlah_penjualan`) VALUES
('pa01', 1, '2018-04-01', 70),
('pa02', 1, '2018-04-02', 50),
('pa03', 1, '2018-04-03', 90),
('pb01', 2, '2018-04-01', 60),
('pb02', 2, '2018-04-02', 40),
('pb03', 2, '2018-04-03', 80),
('pc01', 3, '2018-04-01', 70),
('pc02', 3, '2018-04-02', 70),
('pc03', 3, '2018-04-03', 70),
('pd01', 4, '2018-04-01', 60),
('pd02', 4, '2018-04-02', 60),
('pd03', 4, '2018-04-03', 60),
('pe01', 5, '2018-04-01', 70),
('pe02', 5, '2018-04-02', 70),
('pe03', 5, '2018-04-03', 70),
('pf01', 6, '2018-04-01', 80),
('pf02', 6, '2018-04-02', 80),
('pf03', 6, '2018-04-03', 80),
('pg01', 7, '2018-04-01', 90),
('pg02', 7, '2018-04-02', 90),
('pg03', 7, '2018-04-03', 90),
('ph01', 8, '2018-04-01', 50),
('ph02', 8, '2018-04-02', 50),
('ph03', 8, '2018-04-03', 50),
('pi01', 9, '2018-04-01', 70),
('pi02', 9, '2018-04-02', 70),
('pi03', 9, '2018-04-03', 70),
('pj01', 10, '2018-04-01', 75),
('pj02', 10, '2018-04-02', 75),
('pj03', 10, '2018-04-03', 75),
('pk01', 11, '2018-04-01', 70),
('pk02', 11, '2018-04-02', 70),
('pk03', 11, '2018-04-03', 70),
('pl01', 12, '2018-04-01', 85),
('pl02', 12, '2018-04-02', 85),
('pl03', 12, '2018-04-03', 85),
('pm01', 13, '2018-04-01', 70),
('pm02', 13, '2018-04-02', 70),
('pm03', 13, '2018-04-03', 70),
('pn01', 14, '2018-04-01', 60),
('pn02', 14, '2018-04-02', 60),
('pn03', 14, '2018-04-03', 60),
('po01', 15, '2018-04-01', 50),
('po02', 15, '2018-04-02', 50),
('po03', 15, '2018-04-03', 50),
('pp01', 16, '2018-04-01', 40),
('pp02', 16, '2018-04-02', 40),
('pp03', 16, '2018-04-03', 40),
('pq01', 17, '2018-04-01', 90),
('pq02', 17, '2018-04-02', 90),
('pq03', 17, '2018-04-03', 90),
('pr01', 18, '2018-04-01', 95),
('pr02', 18, '2018-04-02', 95),
('pr03', 18, '2018-04-03', 95);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkproduk_transaksi` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fkproduk_transaksi` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
