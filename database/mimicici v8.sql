-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 06:42 AM
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
(1, 'upload/black-team-man-icon-on-white-background-vector-13695327.jpg', 'AYAS SNACK', 'Ayas Snack merupakan toko kue yang menjual aneka kue basah.', 'Kelapa Dua, Depok', 'ayasnack@gmail.com', '081289643843', 'ayasnack', '1234');

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
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_produk`, `tanggal_transaksi`, `jumlah_penjualan`, `stock`) VALUES
('PA001', 1, '2018-04-01', 215, 80),
('PA002', 1, '2018-04-02', 222, 60),
('PA003', 1, '2018-04-03', 235, 60),
('PA004', 1, '2018-04-04', 228, 70),
('PA005', 1, '2018-04-05', 210, 60),
('PA006', 1, '2018-04-06', 240, 70),
('PA007', 1, '2018-04-07', 223, 80),
('PA008', 1, '2018-04-08', 254, 80),
('PA009', 1, '2018-04-09', 238, 60),
('PA010', 1, '2018-04-10', 265, 70),
('PB001', 2, '2018-04-01', 215, 100),
('PB002', 2, '2018-04-02', 222, 65),
('PB003', 2, '2018-04-03', 235, 120),
('PB004', 2, '2018-04-04', 228, 100),
('PB005', 2, '2018-04-05', 210, 50),
('PB006', 2, '2018-04-06', 240, 100),
('PB007', 2, '2018-04-07', 223, 120),
('PB008', 2, '2018-04-08', 254, 120),
('PB009', 2, '2018-04-09', 238, 40),
('PB010', 2, '2018-04-10', 265, 100),
('PC001', 3, '2018-04-01', 215, 80),
('PC002', 3, '2018-04-02', 222, 60),
('PC003', 3, '2018-04-03', 235, 120),
('PC004', 3, '2018-04-04', 228, 100),
('PC005', 3, '2018-04-05', 210, 60),
('PC006', 3, '2018-04-06', 240, 100),
('PC007', 3, '2018-04-07', 223, 90),
('PC008', 3, '2018-04-08', 254, 90),
('PC009', 3, '2018-04-09', 238, 70),
('PC010', 3, '2018-04-10', 265, 100),
('PD001', 4, '2018-04-01', 215, 170),
('PD002', 4, '2018-04-02', 222, 100),
('PD003', 4, '2018-04-03', 235, 90),
('PD004', 4, '2018-04-04', 228, 40),
('PD005', 4, '2018-04-05', 210, 70),
('PD006', 4, '2018-04-06', 240, 40),
('PD007', 4, '2018-04-07', 223, 185),
('PD008', 4, '2018-04-08', 254, 180),
('PD009', 4, '2018-04-09', 238, 80),
('PD010', 4, '2018-04-10', 265, 50),
('PE001', 5, '2018-04-01', 215, 170),
('PE002', 5, '2018-04-02', 222, 120),
('PE003', 5, '2018-04-03', 235, 50),
('PE004', 5, '2018-04-04', 228, 60),
('PE005', 5, '2018-04-05', 210, 50),
('PE006', 5, '2018-04-06', 240, 80),
('PE007', 5, '2018-04-07', 223, 200),
('PE008', 5, '2018-04-08', 254, 200),
('PE009', 5, '2018-04-09', 238, 60),
('PE010', 5, '2018-04-10', 265, 100),
('PF001', 6, '2018-04-01', 215, 170),
('PF002', 6, '2018-04-02', 222, 100),
('PF003', 6, '2018-04-03', 235, 120),
('PF004', 6, '2018-04-04', 228, 120),
('PF005', 6, '2018-04-05', 210, 100),
('PF006', 6, '2018-04-06', 240, 100),
('PF007', 6, '2018-04-07', 223, 190),
('PF008', 6, '2018-04-08', 254, 200),
('PF009', 6, '2018-04-09', 238, 100),
('PF010', 6, '2018-04-10', 265, 80),
('PG001', 7, '2018-04-01', 215, 70),
('PG002', 7, '2018-04-02', 222, 70),
('PG003', 7, '2018-04-03', 235, 60),
('PG004', 7, '2018-04-04', 228, 60),
('PG005', 7, '2018-04-05', 210, 60),
('PG006', 7, '2018-04-06', 240, 50),
('PG007', 7, '2018-04-07', 223, 70),
('PG008', 7, '2018-04-08', 254, 70),
('PG009', 7, '2018-04-09', 238, 40),
('PG010', 7, '2018-04-10', 265, 40),
('PH001', 8, '2018-04-01', 215, 80),
('PH002', 8, '2018-04-02', 222, 40),
('PH003', 8, '2018-04-03', 235, 70),
('PH004', 8, '2018-04-04', 228, 60),
('PH005', 8, '2018-04-05', 210, 60),
('PH006', 8, '2018-04-06', 240, 50),
('PH007', 8, '2018-04-07', 223, 80),
('PH008', 8, '2018-04-08', 254, 80),
('PH009', 8, '2018-04-09', 238, 50),
('PH010', 8, '2018-04-10', 265, 60),
('PI001', 9, '2018-04-01', 215, 120),
('PI002', 9, '2018-04-02', 222, 120),
('PI003', 9, '2018-04-03', 235, 120),
('PI004', 9, '2018-04-04', 228, 100),
('PI005', 9, '2018-04-05', 210, 100),
('PI006', 9, '2018-04-06', 240, 80),
('PI007', 9, '2018-04-07', 223, 130),
('PI008', 9, '2018-04-08', 254, 130),
('PI009', 9, '2018-04-09', 238, 100),
('PI010', 9, '2018-04-10', 265, 80),
('PJ001', 10, '2018-04-01', 215, 50),
('PJ002', 10, '2018-04-02', 222, 75),
('PJ003', 10, '2018-04-03', 235, 70),
('PJ004', 10, '2018-04-04', 228, 60),
('PJ005', 10, '2018-04-05', 210, 50),
('PJ006', 10, '2018-04-06', 240, 70),
('PJ007', 10, '2018-04-07', 223, 50),
('PJ008', 10, '2018-04-08', 254, 50),
('PJ009', 10, '2018-04-09', 238, 50),
('PJ010', 10, '2018-04-10', 265, 50),
('PK001', 11, '2018-04-01', 215, 40),
('PK002', 11, '2018-04-02', 222, 50),
('PK003', 11, '2018-04-03', 235, 80),
('PK004', 11, '2018-04-04', 228, 50),
('PK005', 11, '2018-04-05', 210, 40),
('PK006', 11, '2018-04-06', 240, 60),
('PK007', 11, '2018-04-07', 223, 40),
('PK008', 11, '2018-04-08', 254, 40),
('PK009', 11, '2018-04-09', 238, 40),
('PK010', 11, '2018-04-10', 265, 30),
('PL001', 12, '2018-04-01', 215, 180),
('PL002', 12, '2018-04-02', 222, 70),
('PL003', 12, '2018-04-03', 235, 70),
('PL004', 12, '2018-04-04', 228, 100),
('PL005', 12, '2018-04-05', 210, 80),
('PL006', 12, '2018-04-06', 240, 80),
('PL007', 12, '2018-04-07', 223, 180),
('PL008', 12, '2018-04-08', 254, 180),
('PL009', 12, '2018-04-09', 238, 80),
('PL010', 12, '2018-04-10', 265, 40),
('PM001', 13, '2018-04-01', 215, 75),
('PM002', 13, '2018-04-02', 222, 50),
('PM003', 13, '2018-04-03', 235, 80),
('PM004', 13, '2018-04-04', 228, 100),
('PM005', 13, '2018-04-05', 210, 120),
('PM006', 13, '2018-04-06', 240, 90),
('PM007', 13, '2018-04-07', 223, 75),
('PM008', 13, '2018-04-08', 254, 75),
('PM009', 13, '2018-04-09', 238, 50),
('PM010', 13, '2018-04-10', 265, 80),
('PN001', 14, '2018-04-01', 215, 175),
('PN002', 14, '2018-04-02', 222, 65),
('PN003', 14, '2018-04-03', 235, 60),
('PN004', 14, '2018-04-04', 228, 60),
('PN005', 14, '2018-04-05', 210, 80),
('PN006', 14, '2018-04-06', 240, 60),
('PN007', 14, '2018-04-07', 223, 200),
('PN008', 14, '2018-04-08', 254, 200),
('PN009', 14, '2018-04-09', 238, 40),
('PN010', 14, '2018-04-10', 265, 70),
('PO001', 15, '2018-04-01', 215, 30),
('PO002', 15, '2018-04-02', 222, 40),
('PO003', 15, '2018-04-03', 235, 40),
('PO004', 15, '2018-04-04', 228, 50),
('PO005', 15, '2018-04-05', 210, 40),
('PO006', 15, '2018-04-06', 240, 50),
('PO007', 15, '2018-04-07', 223, 30),
('PO008', 15, '2018-04-08', 254, 30),
('PO009', 15, '2018-04-09', 238, 60),
('PO010', 15, '2018-04-10', 265, 40),
('PP001', 16, '2018-04-01', 215, 150),
('PP002', 16, '2018-04-02', 222, 80),
('PP003', 16, '2018-04-03', 235, 100),
('PP004', 16, '2018-04-04', 228, 100),
('PP005', 16, '2018-04-05', 210, 60),
('PP006', 16, '2018-04-06', 240, 30),
('PP007', 16, '2018-04-07', 223, 170),
('PP008', 16, '2018-04-08', 254, 170),
('PP009', 16, '2018-04-09', 238, 80),
('PP010', 16, '2018-04-10', 265, 100),
('PQ001', 17, '2018-04-01', 215, 60),
('PQ002', 17, '2018-04-02', 222, 40),
('PQ003', 17, '2018-04-03', 235, 40),
('PQ004', 17, '2018-04-04', 228, 40),
('PQ005', 17, '2018-04-05', 210, 40),
('PQ006', 17, '2018-04-06', 240, 60),
('PQ007', 17, '2018-04-07', 223, 60),
('PQ008', 17, '2018-04-08', 254, 60),
('PQ009', 17, '2018-04-09', 238, 60),
('PQ010', 17, '2018-04-10', 265, 50),
('PR001', 18, '2018-04-01', 215, 35),
('PR002', 18, '2018-04-02', 222, 60),
('PR003', 18, '2018-04-03', 235, 60),
('PR004', 18, '2018-04-04', 228, 50),
('PR005', 18, '2018-04-05', 210, 50),
('PR006', 18, '2018-04-06', 240, 50),
('PR007', 18, '2018-04-07', 223, 35),
('PR008', 18, '2018-04-08', 254, 35),
('PR009', 18, '2018-04-09', 238, 40),
('PR010', 18, '2018-04-10', 265, 40),
('PS001', 19, '2018-04-01', 215, 40),
('PS002', 19, '2018-04-02', 222, 50),
('PS003', 19, '2018-04-03', 235, 40),
('PS004', 19, '2018-04-04', 228, 60),
('PS005', 19, '2018-04-05', 210, 30),
('PS006', 19, '2018-04-06', 240, 40),
('PS007', 19, '2018-04-07', 223, 40),
('PS008', 19, '2018-04-08', 254, 40),
('PS009', 19, '2018-04-09', 238, 40),
('PS010', 19, '2018-04-10', 265, 30),
('PT001', 20, '2018-04-01', 215, 50),
('PT002', 20, '2018-04-02', 222, 40),
('PT003', 20, '2018-04-03', 235, 40),
('PT004', 20, '2018-04-04', 228, 70),
('PT005', 20, '2018-04-05', 210, 40),
('PT006', 20, '2018-04-06', 240, 50),
('PT007', 20, '2018-04-07', 223, 50),
('PT008', 20, '2018-04-08', 254, 50),
('PT009', 20, '2018-04-09', 238, 50),
('PT010', 20, '2018-04-10', 265, 50);

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
