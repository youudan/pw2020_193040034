-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 03:39 PM
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
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(120) NOT NULL,
  `author` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `author`, `penerbit`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Semua Bisa Menjadi Programmer Laravel Basic', 'YUNIAR SUPARDI & SULAEMAN', 'Elex Media Komputindo', 'assets/img/cover/cover-1.jpg', '2020-04-09 17:51:46', NULL),
(2, 'Tip Dan Trik Program Database Python', 'YUNIAR SUPARDI DAN YOGI SYARIEF, S.T., M.KOM.', 'Elex Media Komputindo', 'assets/img/cover/cover-2.jpg', '2020-04-09 17:51:50', NULL),
(3, 'Step by Step MS SQL Server', 'Gregorius Agung P', 'Elex Media Komputindo', 'assets/img/cover/cover-3.jpg', '2020-04-09 17:52:04', NULL),
(4, 'Database Design All in One: Theory, Practice, and Case Study', 'Indrajani, S.kom., Mm.', 'Elex Media Komputindo', 'assets/img/cover/cover-4.jpg', '2020-04-09 17:52:06', NULL),
(5, 'Book Of Spss: Pengolahan & Analisis Data', 'Romie Priyastama', 'Start Up', 'assets/img/cover/cover-5.jpg', '2020-04-09 17:52:07', NULL),
(6, 'Juliet of The Boarding School 01', 'Yosuke Kaneda', 'm&c', 'assets/img/cover/cover-6.jpg', '2020-04-09 17:52:08', NULL),
(7, 'Can\\\'t Not Love 01', 'Yuu Yoshinaga', 'm&c', 'assets/img/cover/cover-7.jpg', '2020-04-09 17:52:09', NULL),
(8, 'Garden of Grimoire 01', 'Haru Sakurana\'', 'm&c', 'assets/img/cover/cover-8.jpg', '2020-04-09 17:52:10', NULL),
(9, 'Obat Malas Dosis Tinggi', 'Khalifa Bisma Sanjaya', 'Elex Media Komputindo', 'assets/img/cover/cover-9.jpg', '2020-04-09 17:52:11', NULL),
(10, 'CR: Dark Wild Night', 'Christina Lauren', 'Elex Media Komputindo', 'assets/img/cover/cover-10.jpg', '2020-04-09 17:52:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku_kategori`
--

CREATE TABLE `buku_kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `buku_id` int(11) UNSIGNED DEFAULT NULL,
  `kategori_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku_kategori`
--

INSERT INTO `buku_kategori` (`id`, `buku_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-04-09 17:52:15', NULL),
(2, 2, 1, '2020-04-09 17:52:15', NULL),
(3, 3, 2, '2020-04-09 17:52:16', NULL),
(4, 4, 2, '2020-04-09 17:52:17', NULL),
(5, 5, 3, '2020-04-09 17:52:18', NULL),
(6, 6, 4, '2020-04-09 17:52:20', NULL),
(7, 7, 4, '2020-04-09 17:52:21', NULL),
(8, 8, 4, '2020-04-09 17:52:21', NULL),
(9, 9, 6, '2020-04-09 17:52:22', NULL),
(10, 10, 5, '2020-04-09 17:52:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman', '2020-04-09 17:52:25', NULL),
(2, 'Manajemen Database', '2020-04-09 17:52:26', NULL),
(3, 'Komputer & Teknologi', '2020-04-09 17:52:27', NULL),
(4, 'Komik', '2020-04-09 17:52:28', NULL),
(5, 'Novel', '2020-04-09 17:52:29', NULL),
(6, 'Spiritualitas', '2020-04-09 17:52:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD CONSTRAINT `buku_kategori_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_kategori_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
