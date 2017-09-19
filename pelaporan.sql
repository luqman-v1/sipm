-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 05:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelaporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `pict` text NOT NULL,
  `locLat` double NOT NULL,
  `locLng` double NOT NULL,
  `id_category` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `nama`, `alamat`, `deskripsi`, `pict`, `locLat`, `locLng`, `id_category`, `updated_at`, `created_at`) VALUES
(7, 'joko', 'sleman', 'di ringroad utara', '82226.jpg', -7.760625144980513, 110.40798310796936, 24, '2016-08-14 19:27:23', '2016-08-14 19:27:23'),
(8, 'agus', 'sendowo blok f135', 'di mlati pinggir kali', '96183.jpg', -7.7328359101012865, 110.33512248623038, 19, '2016-08-14 19:28:59', '2016-08-14 19:28:59'),
(9, 'arif', 'jl kaliurang km5', 'terjadi dekat warung makan', '53233.jpg', -7.716488160449044, 110.33714504760746, 20, '2016-08-14 19:30:26', '2016-08-14 19:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `img` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `img`, `updated_at`, `created_at`) VALUES
(9, 'Pelanggaran', '72935.jpg', '2016-07-23 08:36:53', '2016-07-23 08:36:53'),
(10, 'Lampu Jalan Rusak', '12155.jpg', '2016-07-23 08:38:32', '2016-07-23 08:38:32'),
(11, 'Sampah', '51529.jpg', '2016-07-23 08:39:32', '2016-07-23 08:39:32'),
(12, 'Jalan Rusak', '66918.jpg', '2016-07-23 08:40:28', '2016-07-23 08:40:28'),
(13, 'Fasilitas Umum', '54041.jpg', '2016-07-23 08:41:19', '2016-07-23 08:41:19'),
(14, 'Parkir Liar', '24742.jpg', '2016-07-23 08:42:38', '2016-07-23 08:42:38'),
(15, 'Pengemis', '29009.jpeg', '2016-07-23 08:44:38', '2016-07-23 08:44:38'),
(16, 'Kaki Lima Liar', '98282.jpg', '2016-07-23 08:45:33', '2016-07-23 08:45:33'),
(17, 'Kriminal', '58821.jpg', '2016-07-23 08:46:11', '2016-07-23 08:46:11'),
(18, 'Banjir', '61710.jpg', '2016-07-23 08:46:36', '2016-07-23 08:46:36'),
(19, 'Pohon Tumbang', '19666.jpg', '2016-07-23 08:48:09', '2016-07-23 08:48:09'),
(20, 'Kebakaran', '85511.jpg', '2016-07-23 08:48:49', '2016-07-23 08:48:49'),
(21, 'Pajak Abnormal', '94531.jpg', '2016-07-23 08:49:35', '2016-07-23 08:49:35'),
(22, 'Pelanggaran Izin Bangunan', '26283.jpg', '2016-07-23 08:50:06', '2016-07-23 08:50:06'),
(23, 'Potensi Teroris', '30289.jpg', '2016-07-23 08:50:38', '2016-07-23 08:50:38'),
(24, 'Kemacetan', '50065.jpg', '2016-07-25 20:35:30', '2016-07-25 20:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', '$2y$10$Vw/BSbWlubSMP6BxsfkuRe10/AzyBnxctNjOHW2XS1tFIfxuFfJLy', '2016-12-15 01:50:29', '2016-06-16 03:10:23', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
