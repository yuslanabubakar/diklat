-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 07:49 AM
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
  `hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` varchar(5) NOT NULL,
  `waktu_selesai` varchar(5) NOT NULL,
  `nama_diklat` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `jumlah_jp` int(2) NOT NULL,
  `widyaiswara` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `nama_diklat`, `kegiatan`, `jumlah_jp`, `widyaiswara`) VALUES
(1, 'Monday', '2017-07-31', '08:00', '09:00', 'Diklat 1', 'Kegiatan 1', 1, 'Yuswar Effendy, SE, MM'),
(2, 'Tuesday', '2017-08-01', '09:00', '10:00', 'Diklat 2', 'Kegiatan 2', 1, 'Yuswar Effendy, SE, MM'),
(3, 'Wednesday', '2017-08-02', '10:00', '13:00', 'Diklat 1', 'Kegiatan 1', 3, 'Yuswar Effendy, SE, MM'),
(4, 'Monday', '2017-07-31', '13:00', '16:00', 'Diklat 3', 'Kegiatan 2', 3, 'Yuswar Effendy, SE, MM'),
(5, 'Thursday', '2017-08-10', '08:00', '10:00', 'Diklat 2', 'Kegiatan 3', 2, 'Drs. H. Sobirin, SH, MSi'),
(6, 'Sunday', '2017-07-30', '13:00', '14:00', 'Diklat 1', 'Kegiatan 3', 1, 'Ir. M. Syafril Harahap, MSi'),
(7, 'Tuesday', '2018-01-09', '15:00', '17:00', 'Diklat 3', 'Kegiatan 2', 2, 'Toms Hamonangan, M.Hum');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE IF NOT EXISTS `pengajar` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`nip`, `nama`) VALUES
('195211201976032001', 'Dra. Hj. Deliana Nasution, MAP'),
('195212151980021001', 'Johny Ginting, SH, MAP'),
('195412251984121001', 'Drs. E. E. Boang Manalu, APt, MPd'),
('195502041987031002', 'Drs. Lambok Sinaga, MAP'),
('195707061990032001', 'Yuslina, SH, MAP'),
('195801111985032002', 'Dr. Hj. Dumasari Harahap, SH, M.Si'),
('196008171985031004', 'Drs. H. Agus Sakti Rambe, MPd'),
('196111301985031002', 'Drs. M. Mahfud Hamdi, MAP'),
('196207231983011001', 'Drs. Ikhwan Faizan Nasution, MAP'),
('196210201992032001', 'Nurmayana Siregar, SE, MSi'),
('196212081991032002', 'Ir. Rita Mindayani, MSi'),
('196212121989031007', 'Yuswar Effendy, SE, MM'),
('196304111997071001', 'Drs. H. Sobirin, SH, MSi'),
('196403061992031008', 'Drs. Suriya Jaya, SH, M.Pd'),
('196407221984081001', 'Ir. Syahrizal'),
('196410251985031003', 'Rahman Nasution, S.Sos, M.Si'),
('196501011991031010', 'Dr. Solistis P.O Dachi, SH, M.Hum'),
('196503031993081001', 'Dr. Ir. Hairulsyah, MSi'),
('196608101997022001', 'Dra. Rita Clara, MEd'),
('196610051993031012', 'Ir. M. Syafril Harahap, MSi'),
('197007061998101001', 'Dr. Hironymus Ghodang, SPd, M.Si'),
('197506232006041003', 'Zul Pahmi, M.Pd'),
('197509182008011008', 'Toms Hamonangan, M.Hum');

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
MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
