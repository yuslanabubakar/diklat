-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 05:12 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diklatmedan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(10) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` varchar(5) NOT NULL,
  `waktu_selesai` varchar(5) NOT NULL,
  `nama_diklat` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `jumlah_jp` int(2) NOT NULL,
  `widyaiswara` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `nama_diklat`, `kegiatan`, `jumlah_jp`, `widyaiswara`) VALUES
(3, 'Saturd', '2017-07-29', '08:00', '10:00', 'Diklat Kepemimpinan', 'Pelatihan Kepemimpinan 1', 2, 'Yuswar Efendi, SE., MM'),
(4, 'Saturd', '2017-07-29', '12:15', '13:30', 'Diklat Pelatihan', 'Kegiatan 2', 2, 'Yuswar Efendi, SE., MM'),
(5, 'Saturd', '2017-07-29', '14:00', '16:45', 'Diklat Kepemimpinan', 'Kegiatan 3', 3, 'Yuswar Efendi, SE., MM'),
(6, 'Saturd', '2017-07-29', '10:00', '11:00', 'Diklat Kepemimpinan', 'Kegiatan 4', 1, 'Yuswar Efendi, SE., MM');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE IF NOT EXISTS `pengajar` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
 ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
