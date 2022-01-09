-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 05:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_motor`
--

CREATE TABLE `data_motor` (
  `id_motor` int(4) NOT NULL,
  `nama_motor` varchar(64) NOT NULL,
  `harga_motor` varchar(64) NOT NULL,
  `merek_motor` varchar(64) NOT NULL,
  `ukuran_motor` varchar(64) NOT NULL,
  `model_motor` varchar(64) NOT NULL,
  `garansi` varchar(64) NOT NULL,
  `harga_angka` varchar(64) NOT NULL,
  `merek_angka` varchar(64) NOT NULL,
  `ukuran_angka` varchar(64) NOT NULL,
  `model_angka` varchar(64) NOT NULL,
  `garansi_angka` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_motor`
--

INSERT INTO `data_motor` (`id_motor`, `nama_motor`, `harga_motor`, `merek_motor`, `ukuran_motor`, `model_motor`, `garansi`, `harga_angka`, `merek_angka`, `ukuran_angka`, `model_angka`, `garansi_angka`) VALUES
(1, 'Beat', '15000000\r\n', 'Honda', 'Sedang', 'Matic', '8', '8', '8', '7', '9', '7'),
(2, 'Scopy', '20000000', 'Honda', 'Kecil', 'Matic', '8', '8', '7', '7', '9', '7'),
(3, 'CBR150', '25000000', 'Honda', 'Besar', 'Sport', '6 ', '9', '9', '7', '8', '8'),
(4, 'Vixion', '25000000', 'Yamaha', 'Besar', 'Sport', '7', '8', '8', '7', '9', '8'),
(5, 'astrea', '3600000', 'Honda', 'Kecil', 'Bebek', '13', '7', '7', '8', '7', '7'),
(6, 'NMax', '30000000', 'Yamaha', 'Besar', 'Matic', '3', '9', '8', '9', '9', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_motor`
--
ALTER TABLE `data_motor`
  ADD PRIMARY KEY (`id_motor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
