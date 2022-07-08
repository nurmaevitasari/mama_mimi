-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 11:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32093228_db_mama_mimi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_keranjang_belanja`
--

CREATE TABLE `tabel_keranjang_belanja` (
  `id_barang` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  `published` int(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `karyawan_id`, `username`, `password`, `nickname`, `last_login`) VALUES
(1, 1, 'ivana2001', '0937afa17f4dc08f3c0e5dc908158370ce64df86', 'Ivana Yunitasari', '2022-06-18 17:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `no_tlp` varchar(100) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `no_tlp`, `nama_customer`, `email`, `alamat`, `date_created`) VALUES
(1, '087886554052', 'Nurma Evitasari', 'evitasarinurma@gmail.com', 'Perumahan Puri Pamulang', '2022-06-18 21:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_user`
--

CREATE TABLE `tbl_customer_user` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_produk`
--

CREATE TABLE `tbl_kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `user_created` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori_produk`
--

INSERT INTO `tbl_kategori_produk` (`id`, `kategori`, `user_created`, `date_created`) VALUES
(1, 'Wanita', 0, '0000-00-00 00:00:00'),
(2, 'Pria', 0, '0000-00-00 00:00:00'),
(3, 'Anak', 0, '0000-00-00 00:00:00'),
(4, 'Makeup', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(10) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` decimal(18,2) NOT NULL,
  `diskon_persen` int(50) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `kode_produk`, `nama_produk`, `satuan`, `harga`, `diskon_persen`, `kategori_produk`, `date_created`) VALUES
(1, 'WNT-01', 'Mini Shirt Dress with Tier Details', 'Pcs', '190000.00', 0, '1', '2022-06-19 16:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk_photo`
--

CREATE TABLE `tbl_produk_photo` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `urutan` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk_photo`
--

INSERT INTO `tbl_produk_photo` (`id`, `produk_id`, `filename`, `urutan`, `date_created`) VALUES
(5, 1, 'colorbox-1270-0051243-1.jpg', 1, '2022-06-19 16:57:23'),
(6, 1, 'baner-right-image-01.jpg', 2, '2022-06-19 22:28:15'),
(7, 1, 'baner-right-image-02.jpg', 3, '2022-06-19 22:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` char(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan_barang` varchar(15) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stock_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_user`
--
ALTER TABLE `tbl_customer_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk_photo`
--
ALTER TABLE `tbl_produk_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_user`
--
ALTER TABLE `tbl_customer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_produk_photo`
--
ALTER TABLE `tbl_produk_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
