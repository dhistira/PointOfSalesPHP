-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2019 at 07:42 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posrpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(32) NOT NULL,
  `detail_item` varchar(144) NOT NULL,
  `harga_item` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_item`, `detail_item`, `harga_item`) VALUES
(2, 'pop ice', 'mantap', 10000),
(3, 'Jeruk Anget', 'mantap angetnya', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tanggal_transaksi` varchar(144) NOT NULL,
  `id_kasir` int(144) NOT NULL,
  `id_item` varchar(144) NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_transaksi`, `id_kasir`, `id_item`, `total`) VALUES
(1, '2019-06-26 19:07:35', 3, '2', 20000),
(2, '2019-06-26 19:13:01', 3, '2', 30000),
(3, '2019-06-26 19:41:28', 3, '2,3,3,3,3,2,2,2,2,3,2,3,3,2,2', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(144) NOT NULL AUTO_INCREMENT,
  `tipe` int(3) NOT NULL COMMENT '1 admin, 2 kasir',
  `fullname` varchar(144) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `tipe`, `fullname`, `username`, `password`, `date_created`) VALUES
(1, 1, 'Yudhistira Bayu', 'bayu', '46f94c8de14fb36680850768ff1b7f2a', '2019-06-18'),
(3, 2, 'Waladun Azami Zalvalana', 'waladun', '46f94c8de14fb36680850768ff1b7f2a', '2019-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(144) NOT NULL,
  `date_login` varchar(144) NOT NULL,
  `date_logout` varchar(144) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `id_user`, `date_login`, `date_logout`) VALUES
(14, 3, '2019-06-26 07:17:21', NULL),
(13, 3, '2019-06-26 07:17:04', NULL),
(12, 3, '2019-06-26 07:16:24', NULL),
(11, 3, '2019-06-26 07:15:50', NULL),
(15, 3, '2019-06-26 07:18:07', ''),
(16, 3, '2019-06-26 07:19:00', NULL),
(17, 3, '2019-06-26 07:19:33', NULL),
(18, 3, '2019-06-26 07:40:43', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
