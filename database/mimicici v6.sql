-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 01:47 PM
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
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id_prediksi` int(4) NOT NULL,
  `x` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `y` int(4) NOT NULL,
  `hasil_prediksi` int(7) NOT NULL,
  `error` int(5) NOT NULL,
  `error_rel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prediksi`
--

INSERT INTO `prediksi` (`id_prediksi`, `x`, `tanggal`, `y`, `hasil_prediksi`, `error`, `error_rel`) VALUES
(11, 1, '2018-04-01', 70, 65, 5, 0),
(12, 2, '2018-04-02', 57, 68, 11, 0),
(13, 3, '2018-04-03', 76, 71, 5, 0),
(14, 1, '2018-04-01', 70, 65, 5, 0),
(15, 2, '2018-04-02', 57, 68, 11, 0),
(16, 3, '2018-04-03', 76, 71, 5, 0),
(17, 1, '2018-04-01', 70, 65, 5, 0),
(18, 2, '2018-04-02', 57, 68, 11, 0),
(19, 3, '2018-04-03', 76, 71, 5, 0),
(20, 1, '2018-04-01', 70, 65, 5, 0),
(21, 2, '2018-04-02', 57, 68, 11, 0),
(22, 3, '2018-04-03', 76, 71, 5, 0);

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
(1, 'Nagasari', 2000),
(2, 'Sosis Solo', 1000),
(3, 'Risol Mayonaise', 2000),
(4, 'Kue Lumpur', 1500),
(5, 'Bolu Warna', 15000),
(6, 'Bolu Gula Merah', 10000),
(7, 'Bika Ambon', 3000),
(8, 'Kue Sus', 3500),
(9, 'Kue Pepe', 1500),
(10, 'Lapis Beras', 1500),
(11, 'Roti Goreng', 2000),
(12, 'Pastel', 2000),
(13, 'Putu Ayu', 2000),
(14, 'Lemper Bakar', 1500),
(15, 'Cucur', 2000),
(16, 'Pie Susu', 1000),
(17, 'Fla Coklat', 1500),
(18, 'Roll Good', 2000),
(19, 'Dadar Gulung', 1500),
(20, 'Roti Gulung', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(5) NOT NULL,
  `id_produk` int(2) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_penjualan` int(4) NOT NULL,
  `stock` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_produk`, `tanggal_transaksi`, `jumlah_penjualan`, `stock`) VALUES
('PA001', 1, '2018-04-01', 215, '80'),
('PA002', 1, '2018-04-02', 222, '60'),
('PA003', 1, '2018-04-03', 235, '80'),
('PA004', 1, '2018-04-04', 228, '80'),
('PA005', 1, '2018-04-05', 210, '100'),
('PA006', 1, '2018-04-06', 240, '100'),
('PA007', 1, '2018-04-07', 223, '323'),
('PA008', 1, '2018-04-08', 254, '423'),
('PA009', 1, '2018-04-09', 238, '422'),
('PA010', 1, '2018-04-10', 265, '312'),
('PB001', 2, '2018-04-01', 223, '80'),
('PB002', 2, '2018-04-02', 228, '100'),
('PB003', 2, '2018-04-03', 190, '13'),
('PB004', 2, '2018-04-04', 215, '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id_prediksi`);

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
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id_prediksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
