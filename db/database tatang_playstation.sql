-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 05:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatang_playstation`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `total_payment` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_pelanggan`, `id_barang`, `quantity`, `tgl_pengembalian`, `total_payment`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2024-12-21', 10000, 1, '2024-12-15 20:25:21', '2024-12-21 10:46:39'),
(2, 2, 2, 1, '2024-12-21', 12010, 1, '2024-12-15 20:26:27', '2024-12-21 10:48:24'),
(3, 4, 3, 2, '2024-12-21', 2000000, 0, '2024-12-21 10:04:19', '2024-12-21 10:04:19'),
(4, 4, 3, 5, '2024-12-21', 5000000, 0, '2024-12-21 10:38:40', '2024-12-21 10:39:19'),
(6, 2, 2, 5, '2024-12-25', 100000, 0, '2024-12-21 10:44:53', '2024-12-21 10:44:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
