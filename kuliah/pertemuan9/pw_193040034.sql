-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2020 at 06:04 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_193040034`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nrp` char(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Wijdan Muhammad R', '193040034', '193040034.wijdan@mail.unpas.ac.id', 'Teknik Informatika', '193040034.jpg'),
(2, 'Agung Gumelar', '193040008', '193040008.agung@mail.unpas.ac.id', 'Teknik Informatika', '193040008.jpg'),
(3, 'Yusril Ismail Azi', '193040024', '193040008.yusril@mail.unpas.ac.id', 'Teknik Informatika', '193040024.jpg'),
(4, 'Alwi Ramadhan ', '193040009', '193040009.alwi@mail.unpas.ac.id', 'Teknik Informatika', '193040009.jpg'),
(5, 'M Rizky Fauzan', '193040014', '193040034.rizky@mail.unpas.ac.id', 'Teknik Informatika', '193040014.jpg'),
(6, 'M. Fauzan Kamal', '193040031', '193040031.fauzan@mail.unpas.ac.id', 'Teknik Informatika', '193040031.jpg'),
(7, 'Antasafariq Fikriansyah', '193040030', '193040031.antasafariq@mail.unpas.ac.id', 'Teknik Informatika', '193040030.jpg'),
(8, 'Daffa Akhdan Fadhilah', '193040036', '193040036.daffa@mail.unpas.ac.id', 'Teknik Informatika', '193040036.jpg'),
(9, 'Aryogi Aziz', '193040023', '193040023.arogi@mail.unpas.ac.id', 'Teknik Informatika', '193040023.jpg'),
(10, 'Yanida Nur Nabila Widya Sastra', '193040022', '193040022.yanida@mail.unpas.ac.id', 'Teknik Informatika', '193040022.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
