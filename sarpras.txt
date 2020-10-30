-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2018 at 02:10 AM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` int(10) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `jumlah` float NOT NULL,
  `kd_supplier` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `jumlah`, `kd_supplier`) VALUES
(5, 'Pupuk Kandang', 4730, 5),
(6, 'Bibit Sawi', 4785, 4),
(7, 'Pupuk Kompos', 5615, 3),
(8, 'Bibit Cabe', 4775, 4);

-- --------------------------------------------------------

--
-- Table structure for table `barangKeluar`
--

CREATE TABLE `barangKeluar` (
  `kd_keluar` int(11) NOT NULL,
  `kd_pembeli` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `jumlahKeluar` int(11) NOT NULL,
  `tanggalKeluar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangKeluar`
--

INSERT INTO `barangKeluar` (`kd_keluar`, `kd_pembeli`, `kd_brg`, `jumlahKeluar`, `tanggalKeluar`) VALUES
(3, 7, 6, 100, '2018-11-30'),
(4, 9, 7, 150, '2018-11-30'),
(5, 6, 8, 50, '2018-11-28'),
(6, 11, 5, 80, '2018-08-20'),
(7, 10, 6, 50, '2018-11-25'),
(8, 8, 5, 90, '2018-11-29'),
(9, 6, 8, 95, '2018-11-27'),
(10, 9, 7, 65, '2018-11-28'),
(11, 10, 6, 65, '2018-11-28'),
(12, 7, 7, 55, '2018-11-29'),
(13, 8, 8, 80, '2018-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `barangMasuk`
--

CREATE TABLE `barangMasuk` (
  `kd_masuk` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `jumlahMasuk` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangMasuk`
--

INSERT INTO `barangMasuk` (`kd_masuk`, `kd_brg`, `jumlahMasuk`, `tanggal`) VALUES
(6, 6, 1000, '2018-10-31'),
(7, 5, 3000, '2018-11-01'),
(8, 7, 5000, '2018-12-02'),
(9, 8, 5000, '2018-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `kd_pembeli` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `jumlahOrder` int(11) NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_kirim` varchar(30) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `kd_pembeli`, `kd_brg`, `jumlahOrder`, `tgl_pesan`, `tgl_kirim`, `status`) VALUES
(3, 7, 5, 100, '2018-12-01', '2018-12-03', 0),
(4, 9, 6, 200, '2018-11-30', '2018-12-05', 0),
(5, 8, 5, 100, '2018-12-01', '2018-12-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `kd_pembeli` int(10) NOT NULL,
  `nm_pembeli` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`kd_pembeli`, `nm_pembeli`, `alamat`, `telpon`, `email`) VALUES
(6, 'Koperasi Citra Mandiri', 'jl Jalan no 99', '0812345678', 'citramandiri@yahoo.com'),
(7, 'Koperasi Suka Cita', 'jl Tulip no 111 Kediri', '087789876543', 'sukacita@yahoo.com'),
(8, 'KUD Suka Sejahtera', 'jl jalan no 322 Blitar', '0812345612', 'sukasejahtera@gmail.com'),
(9, 'KUD Maju Mundur', 'jl Maju no 222 Madiun', '0341998877', 'majumundur@yahoo.com'),
(10, 'Koperasi Mandiri ', 'jl Setapak no 77 Malang', '08777788877788', 'setapak@gmail.com'),
(11, 'KUD Suka Madu', 'jl Sanan no 98 Malang', '034123456', 'sanan@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `sortir`
--

CREATE TABLE `sortir` (
  `kd_sortir` int(11) NOT NULL,
  `kd_masuk` int(11) NOT NULL,
  `ready` int(11) NOT NULL,
  `reject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sortir`
--

INSERT INTO `sortir` (`kd_sortir`, `kd_masuk`, `ready`, `reject`) VALUES
(6, 6, 1000, 0),
(7, 7, 3000, 0),
(8, 8, 4900, 100),
(9, 9, 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kd_supplier` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nama`, `alamat`, `telpon`, `email`) VALUES
(3, 'PT Supplier Indonesia', 'jl kebenaran no 1', '0812345678', 'supplier@gmail.com'),
(4, 'PT Sejahtera', 'jl Lurus no 3 Pasuruan', '08898765432', 'sejahtera@gmail.com'),
(5, 'CV Citra Abadi', 'jl Mawar no 99 Batu', '0341223333', 'abadi@yahoo.com'),
(6, 'PT Nusantara', 'jl Anggrek no 33 Kediri', '0899877677', 'nusantara@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `barangKeluar`
--
ALTER TABLE `barangKeluar`
  ADD PRIMARY KEY (`kd_keluar`),
  ADD KEY `kd_pembeli` (`kd_pembeli`),
  ADD KEY `kd_brg` (`kd_brg`);

--
-- Indexes for table `barangMasuk`
--
ALTER TABLE `barangMasuk`
  ADD PRIMARY KEY (`kd_masuk`),
  ADD KEY `kd_brg` (`kd_brg`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `kd_pembeli` (`kd_pembeli`),
  ADD KEY `kd_brg` (`kd_brg`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`kd_pembeli`);

--
-- Indexes for table `sortir`
--
ALTER TABLE `sortir`
  ADD PRIMARY KEY (`kd_sortir`),
  ADD KEY `kd_masuk` (`kd_masuk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_brg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barangKeluar`
--
ALTER TABLE `barangKeluar`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `barangMasuk`
--
ALTER TABLE `barangMasuk`
  MODIFY `kd_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `kd_pembeli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sortir`
--
ALTER TABLE `sortir`
  MODIFY `kd_sortir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kd_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barangKeluar`
--
ALTER TABLE `barangKeluar`
  ADD CONSTRAINT `barangKeluar_ibfk_1` FOREIGN KEY (`kd_pembeli`) REFERENCES `pembeli` (`kd_pembeli`),
  ADD CONSTRAINT `barangKeluar_ibfk_2` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`);

--
-- Constraints for table `barangMasuk`
--
ALTER TABLE `barangMasuk`
  ADD CONSTRAINT `barangMasuk_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`kd_pembeli`) REFERENCES `pembeli` (`kd_pembeli`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`);

--
-- Constraints for table `sortir`
--
ALTER TABLE `sortir`
  ADD CONSTRAINT `sortir_ibfk_1` FOREIGN KEY (`kd_masuk`) REFERENCES `barangMasuk` (`kd_masuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
