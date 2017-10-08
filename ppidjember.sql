-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 10:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppidjember`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `IDARTIKEL` int(10) NOT NULL,
  `IDKATSKPD` int(5) NOT NULL,
  `JUDULARTIKEL` text NOT NULL,
  `LEADARTIKEL` text NOT NULL,
  `ISIBERITA` text NOT NULL,
  `IMG` varchar(255) NOT NULL,
  `USERID` int(5) NOT NULL,
  `DATECREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `IDDOKUMEN` int(10) NOT NULL,
  `IDKATSKPD` int(5) NOT NULL,
  `NAMADOKUMEN` text NOT NULL,
  `RANGKUMANDOKUMEN` text NOT NULL,
  `FILE` varchar(255) NOT NULL,
  `USERID` int(5) NOT NULL,
  `DATECREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_skpd`
--

CREATE TABLE `kategori_skpd` (
  `IDKATSKPD` varchar(10) NOT NULL,
  `NAMEKATSKPD` varchar(100) NOT NULL,
  `DATECREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_skpd`
--

INSERT INTO `kategori_skpd` (`IDKATSKPD`, `NAMEKATSKPD`, `DATECREATE`) VALUES
('K0001', 'SOSIAL', '2017-10-01 01:51:50'),
('K0002', 'KETENAGAKERJAAN', '2017-10-01 01:52:15'),
('K0003', 'PERTANIAN', '2017-10-01 01:52:22'),
('K0004', 'PARIWISATA', '2017-10-01 01:52:34'),
('K0005', 'PERHUBUNGAN', '2017-10-01 01:52:48'),
('K0006', 'PENDIDIKAN', '2017-10-01 01:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `pencarian`
--

CREATE TABLE `pencarian` (
  `IDSEARCH` varchar(10) NOT NULL,
  `IDSKPD` varchar(10) NOT NULL,
  `IDKATSKPD` varchar(10) NOT NULL,
  `NAMEKATSKPD` varchar(100) NOT NULL,
  `DATECREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencarian`
--

INSERT INTO `pencarian` (`IDSEARCH`, `IDSKPD`, `IDKATSKPD`, `NAMEKATSKPD`, `DATECREATE`) VALUES
('0', 'S0001', 'K0001', 'SOSIAL', '2017-10-04 03:45:03'),
('1', 'S0001', 'K0004', 'PARIWISATA', '2017-10-04 03:45:03'),
('0', 'S0002', 'K0002', 'KETENAGAKERJAAN', '2017-10-04 05:53:39'),
('0', 'S0003', 'K0003', 'PERTANIAN', '2017-10-04 06:00:57'),
('1', 'S0003', 'K0005', 'PERHUBUNGAN', '2017-10-04 06:00:57'),
('0', 'S0004', 'K0006', 'PENDIDIKAN', '2017-10-04 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `IDSKPD` varchar(10) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DETAIL` varchar(200) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `ONSEARCH` varchar(255) NOT NULL,
  `STATUS` varchar(15) NOT NULL,
  `DATECREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`IDSKPD`, `NAME`, `DETAIL`, `LOCATION`, `ONSEARCH`, `STATUS`, `DATECREATE`) VALUES
('S0001', 'Dinas Sosial', 'Data Untuk Dinas Sosial', 'Jl. Perjuangan 45', 'SOSIAL, PARIWISATA', 'AKTIF', '2017-10-04 06:14:39'),
('S0002', 'Dinas Ketenagakerjaan', 'Dinas Tenaga Kerja dan Pekerjaan Umum', 'Jl. Sulawesi 45 ', 'KETENAGAKERJAAN', 'TIDAK AKTIF', '2017-10-04 06:15:47'),
('S0003', 'Dinas Pertanian Terpadu', 'Dinas Pertanian Terpadu', 'Jl. Kalimantan 56 Jember', 'PERTANIAN, PERHUBUNGAN', 'AKTIF', '2017-10-04 06:14:44'),
('S0004', 'Dinas Pendidikan', 'Dinas Pendidikan', 'Jl. Kalimantan 56', 'PENDIDIKAN', 'AKTIF', '2017-10-04 06:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERID` int(4) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `FULLNAME` varchar(100) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `LEVEL` varchar(100) NOT NULL,
  `IDSKPD` varchar(100) NOT NULL,
  `DATECREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERID`, `USERNAME`, `FULLNAME`, `USER_EMAIL`, `USER_PASSWORD`, `LEVEL`, `IDSKPD`, `DATECREATE`) VALUES
(1, 'admin', 'Witjatmoko Sulistyo', 'admin@gmail.com', 'YWRtaW4=', 'Super Admin', 'S0001', '2017-10-05 04:41:27'),
(2, 'agung', 'Agung Kurniawan', 'agung41149@gmail.com', 'YWd1bmc=', 'Admin', 'S0001', '2017-10-05 04:36:05'),
(3, 'adi', 'adi', 'adi@gm.com', 'YWRp', 'Pimpinan', 'S0003', '2017-10-05 04:38:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`IDARTIKEL`);

--
-- Indexes for table `kategori_skpd`
--
ALTER TABLE `kategori_skpd`
  ADD PRIMARY KEY (`IDKATSKPD`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`IDSKPD`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USERID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
