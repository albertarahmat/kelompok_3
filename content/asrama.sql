-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jun 2014 pada 11.53
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

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
-- Struktur dari tabel `asrama`
--

CREATE TABLE IF NOT EXISTS `asrama` (
  `idAsrama` varchar(12) NOT NULL DEFAULT '',
  `namaAsrama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAsrama`),
  KEY `idAsrama` (`idAsrama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asrama`
--

INSERT INTO `asrama` (`idAsrama`, `namaAsrama`) VALUES
('01', 'Menpera'),
('02', 'RPX'),
('03', 'Asrama Hijau'),
('04', 'Roesma'),
('05', 'Asrama Orange');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` varchar(12) NOT NULL DEFAULT '',
  `namaBrg` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `namaBrg`, `stok`) VALUES
('BTL2', 'BANTAL', 20),
('EMB1', 'EMBER BESAR', 3),
('EMB2', 'EMBER MENENGAH', 14),
('GY', 'GAYUNG', 19),
('KSR1', 'KASUR KAPAS', 2),
('KSR2', 'KASUR BUSA', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detaildis`
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
-- Dumping data untuk tabel `detaildis`
--

INSERT INTO `detaildis` (`idDetD`, `idDis`, `id`, `jumlah`) VALUES
('d0109062014122936', 'd01', 'EMB1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpinjam`
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
-- Dumping data untuk tabel `detailpinjam`
--

INSERT INTO `detailpinjam` (`idDetP`, `idPinjam`, `id`, `jumlah`) VALUES
('111096100309062014115359', '1110961003', 'EMB2', 1),
('111096100309062014122552', '1110961003', 'EMB1', 3),
('111096201610062014111212', '1110962016', 'EMB1', 3),
('111096203009062014115539', '1110962030', 'GY', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
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
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`idDis`, `idKamar`, `idTek`, `tgl`) VALUES
('d01', '1ARPX', 't02', '2014-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
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
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idKamar`, `idAsrama`, `namaKamar`) VALUES
('1AH', '03', '1A HIJAU'),
('1ARPX', '02', '1A RPX'),
('1M', '01', '01'),
('2AH', '03', '2A HIJAU'),
('2ARPX', '02', '2A RPX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
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
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`idPinjam`, `idTek`, `nama`, `tgl`) VALUES
('1110961003', 't05', 'NISA SURYANI', '2014-06-09'),
('1110962016', 't02', 'RESTI', '2014-06-10'),
('1110962030', 't05', 'ALBERTA RAHMAD RAMADAN', '2014-06-10'),
('p022', 't04', 'albert', '2014-06-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE IF NOT EXISTS `teknisi` (
  `idTek` varchar(12) NOT NULL DEFAULT '',
  `namaTek` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTek`),
  KEY `Id` (`idTek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`idTek`, `namaTek`, `status`) VALUES
('t01', 'Atun ', 'Customer Service'),
('t02', 'Icul', 'Gudangers'),
('t04', 'Cimui', 'Pembina Asrama'),
('t05', 'RESTI', 'PEMBINA ASRAMA');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detaildis`
--
ALTER TABLE `detaildis`
  ADD CONSTRAINT `detaildis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detaildis_ibfk_2` FOREIGN KEY (`idDis`) REFERENCES `distribusi` (`idDis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailpinjam`
--
ALTER TABLE `detailpinjam`
  ADD CONSTRAINT `detailpinjam_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpinjam_ibfk_2` FOREIGN KEY (`idPinjam`) REFERENCES `pinjam` (`idPinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `distribusi_ibfk_1` FOREIGN KEY (`idTek`) REFERENCES `teknisi` (`idTek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distribusi_ibfk_2` FOREIGN KEY (`idKamar`) REFERENCES `kamar` (`idKamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`idAsrama`) REFERENCES `asrama` (`idAsrama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`idTek`) REFERENCES `teknisi` (`idTek`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
