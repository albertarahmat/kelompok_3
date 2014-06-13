-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2014 at 11:03 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE IF NOT EXISTS `asrama` (
  `idAsrama` varchar(12) NOT NULL DEFAULT '',
  `namaAsrama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAsrama`),
  KEY `idAsrama` (`idAsrama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`idAsrama`, `namaAsrama`) VALUES
('01', 'Menpera'),
('02', 'RPX'),
('03', 'Asrama Hijau'),
('04', 'Roesma'),
('05', 'Asrama Orange'),
('06', 'M. Syaf');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` varchar(12) NOT NULL DEFAULT '',
  `namaBrg` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `namaBrg`, `stok`) VALUES
('b01', 'Laptop', 17),
('b02', 'Charger ', 30),
('b03', 'Mouse', 48),
('b04', 'Kursi', 78),
('b05', 'Meja', 40),
('b06', 'Lemari', 2),
('b07', 'Kasur Kapas', 105),
('b08', 'Bantal', 188),
('b09', 'Alas Kasur', 97),
('b10', 'Jam Dinding', 52);

-- --------------------------------------------------------

--
-- Table structure for table `detaildis`
--

CREATE TABLE IF NOT EXISTS `detaildis` (
  `idDetD` varchar(50) NOT NULL,
  `idDis` varchar(12) NOT NULL,
  `id` varchar(12) NOT NULL,
  `jumlah` int(6) DEFAULT NULL,
  PRIMARY KEY (`idDetD`),
  KEY `idDis` (`idDis`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detaildis`
--

INSERT INTO `detaildis` (`idDetD`, `idDis`, `id`, `jumlah`) VALUES
('d0106062014023452', 'd01', 'b02', 1),
('d0107062014041409', 'd01', 'b03', 6),
('d0107062014041421', 'd01', 'b08', 5),
('d0107062014050900', 'd01', 'b04', 4),
('d0107062014050959', 'd01', 'b06', 6),
('d0107062014051006', 'd01', 'b08', 1),
('d0107062014054836', 'd01', 'b08', 1),
('d0107062014054902', 'd01', 'b08', 1),
('d0107062014054905', 'd01', 'b08', 1),
('d0207062014041501', 'd02', 'b07', 5),
('d0207062014041506', 'd02', 'b05', 2),
('d0207062014041509', 'd02', 'b07', 6),
('d0207062014041519', 'd02', 'b09', 4),
('d0207062014042740', 'd02', 'b09', 4),
('d0207062014042745', 'd02', 'b10', 1),
('d0307062014055116', 'd03', 'b08', 5),
('d0307062014055130', 'd03', 'b07', 6),
('d0307062014055143', 'd03', 'b10', 2),
('d0307062014055308', 'd03', 'b03', 4),
('d0307062014055333', 'd03', 'b03', 4),
('d0307062014055533', 'd03', 'b03', 4),
('d0307062014055600', 'd03', 'b02', 2),
('d0307062014055656', 'd03', 'b07', 4),
('d0307062014055707', 'd03', 'b04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detailpinjam`
--

CREATE TABLE IF NOT EXISTS `detailpinjam` (
  `idDetP` varchar(50) NOT NULL,
  `idPinjam` varchar(12) NOT NULL,
  `id` varchar(12) NOT NULL,
  `jumlah` int(6) NOT NULL,
  PRIMARY KEY (`idDetP`),
  KEY `idPinjam` (`idPinjam`,`id`),
  KEY `idPinjam_2` (`idPinjam`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailpinjam`
--

INSERT INTO `detailpinjam` (`idDetP`, `idPinjam`, `id`, `jumlah`) VALUES
('p02080620141', 'p02', 'b01', 1),
('p0208062014105448', 'p02', 'b07', 6),
('p0208062014105454', 'p02', 'b10', 8);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE IF NOT EXISTS `distribusi` (
  `idDis` varchar(12) NOT NULL DEFAULT '',
  `idKamar` varchar(12) NOT NULL DEFAULT '',
  `idTek` varchar(12) NOT NULL DEFAULT '',
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`idDis`),
  KEY `idKamar` (`idKamar`,`idTek`),
  KEY `idTek` (`idTek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`idDis`, `idKamar`, `idTek`, `tgl`) VALUES
('d01', 'k10', 't05', '2014-06-06'),
('d02', 'k08', 't03', '2014-06-08'),
('d03', 'k05', 't03', '2014-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `idKamar` varchar(12) NOT NULL DEFAULT '',
  `idAsrama` varchar(12) DEFAULT NULL,
  `namaKamar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idKamar`),
  KEY `idAsrama` (`idAsrama`),
  KEY `idAsrama_2` (`idAsrama`),
  KEY `idKamar` (`idKamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`idKamar`, `idAsrama`, `namaKamar`) VALUES
('k01', '01', 'Bersih Bersih'),
('k02', '02', 'Jingga'),
('k03', '03', 'Kutu'),
('k04', '02', 'Ladies'),
('k05', '06', 'Flala'),
('k06', '05', 'Lelaki Jantan'),
('k07', '01', 'Homina'),
('k08', '04', 'Muamalah'),
('k09', '06', 'Geng Asrama'),
('k10', '05', 'Korea');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `idPinjam` varchar(12) NOT NULL,
  `idTek` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`idPinjam`),
  KEY `idTek` (`idTek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`idPinjam`, `idTek`, `nama`, `tgl`) VALUES
('p02', 't05', 'ayamjg', '2014-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE IF NOT EXISTS `teknisi` (
  `idTek` varchar(12) NOT NULL DEFAULT '',
  `namaTek` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTek`),
  KEY `Id` (`idTek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`idTek`, `namaTek`, `status`) VALUES
('t01', 'Atun ', 'Customer Service'),
('t02', 'Icul', 'Gudangers'),
('t03', 'Ujang', 'Supir Ambulans'),
('t04', 'Cimui', 'Pembina Asrama'),
('t05', 'Supik', 'Tukang Cuci');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detaildis`
--
ALTER TABLE `detaildis`
  ADD CONSTRAINT `detaildis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detaildis_ibfk_2` FOREIGN KEY (`idDis`) REFERENCES `distribusi` (`idDis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailpinjam`
--
ALTER TABLE `detailpinjam`
  ADD CONSTRAINT `detailpinjam_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpinjam_ibfk_2` FOREIGN KEY (`idPinjam`) REFERENCES `pinjam` (`idPinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `distribusi_ibfk_1` FOREIGN KEY (`idTek`) REFERENCES `teknisi` (`idTek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distribusi_ibfk_2` FOREIGN KEY (`idKamar`) REFERENCES `kamar` (`idKamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`idAsrama`) REFERENCES `asrama` (`idAsrama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`idTek`) REFERENCES `teknisi` (`idTek`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
