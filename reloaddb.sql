-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2016 at 05:29 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reloaddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tkategori`
--

CREATE TABLE `tkategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkategori`
--

INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`) VALUES
(115, 'Processor'),
(116, 'mainboard'),
(117, 'gagang pacul'),
(118, 'hardisk'),
(119, 'lcd'),
(120, 'casing'),
(121, 'keyboard'),
(122, 'mouse'),
(123, 'speaker'),
(124, 'memory ram'),
(125, 'mouse pad'),
(126, 'kabel kabel'),
(127, 'korsih');

-- --------------------------------------------------------

--
-- Table structure for table `tlevel`
--

CREATE TABLE `tlevel` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlevel`
--

INSERT INTO `tlevel` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `tsupplier`
--

CREATE TABLE `tsupplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsupplier`
--

INSERT INTO `tsupplier` (`id_supplier`, `nama_supplier`, `telp`, `alamat`) VALUES
(1, 'Galant', '085322483856', 'Rajagaluh'),
(2, 'Erkom', '085698753687', 'Rajagaluh'),
(5, 'Alfanet', '087665873344', 'Majalengka'),
(6, 'megakomp', '085236985454', 'Bandung'),
(7, 'megacell', '052365218975', 'Bandung'),
(8, 'Mangga Cell', '023365489875', 'Majalengka');

-- --------------------------------------------------------

--
-- Table structure for table `tusers`
--

CREATE TABLE `tusers` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `last_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tusers`
--

INSERT INTO `tusers` (`id_user`, `username`, `nama_lengkap`, `password`, `telp`, `alamat`, `level`, `last_on`) VALUES
(13, 'skumdum', 'Yogi Gilang Ramadhan', 'b749cb6819718b723cfd0770e7164b06', '-', 'Rajagaluh', 'admin', '0000-00-00 00:00:00'),
(14, 'wkz_broth', 'Aji', 'b749cb6819718b723cfd0770e7164b06', '-', 'Rajagaluh', 'kasir', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tkategori`
--
ALTER TABLE `tkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tlevel`
--
ALTER TABLE `tlevel`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tsupplier`
--
ALTER TABLE `tsupplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tusers`
--
ALTER TABLE `tusers`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tkategori`
--
ALTER TABLE `tkategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `tsupplier`
--
ALTER TABLE `tsupplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tusers`
--
ALTER TABLE `tusers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
