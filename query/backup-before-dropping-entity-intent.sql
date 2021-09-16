-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 03:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entity`
--

CREATE TABLE `tbl_entity` (
  `id_submit_entity` int(11) NOT NULL,
  `id_wit_ai_acc` int(11) NOT NULL,
  `entity_wit_id` varchar(400) DEFAULT NULL,
  `entity_name` varchar(300) DEFAULT NULL,
  `entity_desc` varchar(400) DEFAULT NULL,
  `entity` varchar(400) DEFAULT NULL,
  `entity_category` varchar(100) DEFAULT NULL COMMENT 'INTENT/ENTITY',
  `status_aktif_entity` varchar(1) DEFAULT '0' COMMENT '0 = belum naik ke wit, 1 suda naik',
  `tgl_entity_last_modified` datetime DEFAULT NULL,
  `id_user_entity_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entity`
--

INSERT INTO `tbl_entity` (`id_submit_entity`, `id_wit_ai_acc`, `entity_wit_id`, `entity_name`, `entity_desc`, `entity`, `entity_category`, `status_aktif_entity`, `tgl_entity_last_modified`, `id_user_entity_last_modified`) VALUES
(1, 1, '423018a1-4431-4d6b-b564-5ddbd260e6c4', 'nama_kota_2', 'nama_kota_2', NULL, NULL, '2', '2020-02-09 20:51:58', 1),
(2, 1, '49f65ebd-d743-4098-b660-9d068f0c5773', 'nama_kota', 'nama_kota', NULL, NULL, '2', '2020-02-10 09:28:03', 1),
(3, 1, '0752a6c3-6235-4baf-a142-35c36fbd59b5', 'nama-xx', '', NULL, NULL, '2', '2020-02-10 09:27:57', 1),
(4, 1, '69265caa-36a5-4639-9f80-b53db222db92', 'tahun', '', NULL, NULL, '1', '2020-02-10 09:28:35', 1),
(5, 1, '6927dbc3-5cc2-4c48-a018-43a45873d68f', 'tahunIni', 'Berbentuk boolean untuk mengetahui apakah ada indikasi menunjukan \"tahun ini\"', NULL, NULL, '1', '2020-02-10 09:28:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_entity`
--
ALTER TABLE `tbl_entity`
  ADD PRIMARY KEY (`id_submit_entity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_entity`
--
ALTER TABLE `tbl_entity`
  MODIFY `id_submit_entity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
