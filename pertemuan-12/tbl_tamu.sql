-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2025 at 09:47 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cemail` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `cpesan` text COLLATE utf8mb4_bin,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(1, 'Natan Jawir', 'vlummyjawa@gmail.com', 'halo aku orang jawa asli cuy', '2025-12-16 16:28:27'),
(2, 'Afat', 'Apat@gmail.com', 'anjay keren sekali', '2025-12-16 16:28:27'),
(3, 'Badak berenang', 'badaksukarenang@gmail.com', 'Gilak gua jago berenang cuy anjay', '2025-12-16 16:28:27'),
(4, 'Marie Antoniette', 'Thedictator@gmail.com', 'Let them eat cake', '2025-12-16 16:28:27'),
(5, 'ad', 'Apat@gmail.com', 'ada', '2025-12-16 16:28:27'),
(6, 'ada', 'aaduhai@gmail.com', 'aaaaaaaaaa', '2025-12-16 16:28:27'),
(7, 'Afat', 'a@gmail.com', 'adadadadadad', '2025-12-16 16:33:45'),
(8, 'Afat', 'Apat@gmail.com', 'aajjasjsaas', '2025-12-16 16:34:35'),
(9, 'Adfasdasda', 'Apat@gmail.com', 'asdasdasdsa', '2025-12-16 16:36:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
