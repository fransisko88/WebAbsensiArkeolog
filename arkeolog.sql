-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 08:06 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arkeolog`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `nip`, `tgl`, `keterangan`) VALUES
(8, 'Fransisko Sihombing', 2147483647, '2021-09-05', 'hadir'),
(9, 'Evi', 2147483647, '2021-09-05', 'hadir'),
(10, 'Evi', 2147483647, '2021-09-05', 'hadir'),
(11, 'Fransisko Sihombing', 2147483647, '2021-09-05', 'hadir'),
(12, 'poltak', 2147483647, '2021-09-05', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(3) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `username`, `password`, `role`) VALUES
('', 'admin88', 'admin88', 'admin88', 'Admin'),
('1', 'Admin', 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nip`, `nama`, `tgl`, `file`) VALUES
(11, 2147483647, 'Fransisko Sihombing', '2021-09-05', '613448aca6196.docx'),
(12, 2147483647, 'Evi', '2021-09-05', '61344bf7187b4.pdf'),
(13, 2147483647, 'Evi', '2021-09-05', '61344d5e073ba.jpeg'),
(14, 2147483647, 'Fransisko Sihombing', '2021-09-05', '61345027e2665.pdf'),
(15, 2147483647, 'poltak', '2021-09-05', '6134514b6788c.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jenkel` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `username`, `jenkel`, `password`, `email`, `no_hp`, `img`) VALUES
(1, 2147483647, 'Fransisko Sihombing', 'fransisko88', 'L', 'fransisko123', 'fransiskosihombing@gmail.com', '081396717660', 'foto_profil.jpg'),
(3, 2147483647, 'Evi', 'evi', 'P', '1234', 'evi@gmail.com', '8136453272', '61344fed2e276.jpeg'),
(4, 2147483647, 'poltak', 'poltak', 'L', '12345', 'poltak@gmail.com', '813927834', '61345139032c4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
