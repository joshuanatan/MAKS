-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 04:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maks_rb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_type`
--

CREATE TABLE `tbl_result_type` (
  `result_type` varchar(400) NOT NULL,
  `status_aktif_result_type` varchar(1) DEFAULT NULL,
  `id_user_result_type_last_modified` int(11) DEFAULT NULL,
  `tgl_result_type_last_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result_type`
--

INSERT INTO `tbl_result_type` (`result_type`, `status_aktif_result_type`, `id_user_result_type_last_modified`, `tgl_result_type_last_modified`) VALUES
('BAR CHART', '1', 1, '2020-02-09 20:18:01'),
('TABLE', '1', 1, '2020-02-09 20:18:32'),
('WIDGET', '1', 1, '2020-02-10 09:25:49');

--
-- Triggers `tbl_result_type`
--
DELIMITER $$
CREATE TRIGGER `after_update_result_type` AFTER UPDATE ON `tbl_result_type` FOR EACH ROW begin
update tbl_result_type_mapping set result_type = new.result_type where result_type = old.result_type;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_type_mapping`
--

CREATE TABLE `tbl_result_type_mapping` (
  `id_submit_result_type_mapping` int(11) NOT NULL,
  `mapping_key` varchar(400) DEFAULT NULL,
  `result_type` varchar(400) DEFAULT NULL,
  `status_aktif_result_type_mapping` varchar(1) DEFAULT NULL,
  `tgl_result_type_mapping_last_modified` datetime DEFAULT NULL,
  `id_user_result_type_mapping_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result_type_mapping`
--

INSERT INTO `tbl_result_type_mapping` (`id_submit_result_type_mapping`, `mapping_key`, `result_type`, `status_aktif_result_type_mapping`, `tgl_result_type_mapping_last_modified`, `id_user_result_type_mapping_last_modified`) VALUES
(1, 'daftarToko', 'TABLE', '1', '2020-02-09 20:19:09', 1),
(2, 'JumlahPenjualanTahunIni', 'WIDGET', '1', '2020-02-10 09:25:31', 0),
(3, 'PerbandinganPenjualan3TahunTerakhir', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(4, 'PerbandinganPenjualanTiapKotaTahunIni', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(5, 'PerbandinganPenjualanTiapDistrikTahunIni', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(6, 'PerbandinganPenjualanTiapBulan', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(7, '10KotaDenganPenghasilanTerbanyakTahunIni', 'TABLE', '1', '2020-02-10 09:25:31', 0),
(8, 'TotalPenjualanTahunTertentu', 'WIDGET', '1', '2020-02-10 09:25:31', 0),
(9, 'PerbandinganPenjualanTahunTertentuDenganTahunIni', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(10, 'PerbandinganPenjualanSetiapKotaTahunTertentu', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(11, 'PerbandinganPenjualanSetiapDistrikTahunTertentu', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(12, 'PerbandinganPenjualanTiapBulandiTahunTertentu', 'BAR CHART', '1', '2020-02-10 09:25:31', 0),
(13, '10TokoPalingBanyakMenghasilkanDiTahunTertentu', 'TABLE', '1', '2020-02-10 09:25:31', 0),
(14, 'JumlahTokoMDSSaatIni', 'WIDGET', '1', '2020-02-10 10:32:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id_submit_token` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `nama_client` varchar(300) DEFAULT NULL,
  `status_aktif_token` varchar(1) DEFAULT NULL,
  `tgl_token_last_modified` datetime DEFAULT NULL,
  `id_user_token_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`id_submit_token`, `token`, `nama_client`, `status_aktif_token`, `tgl_token_last_modified`, `id_user_token_last_modified`) VALUES
(1, '0b8a2c05c17b11aece024b574d59acda', 'MAKS APPLICATION', '1', '2020-02-09 20:17:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_submit_user` int(11) NOT NULL,
  `nama_user` varchar(200) DEFAULT NULL,
  `password_user` varchar(300) DEFAULT NULL,
  `email_user` varchar(200) DEFAULT NULL,
  `status_aktif_user` varchar(1) DEFAULT NULL,
  `tgl_user_last_modified` datetime DEFAULT NULL,
  `id_user_user_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_submit_user`, `nama_user`, `password_user`, `email_user`, `status_aktif_user`, `tgl_user_last_modified`, `id_user_user_last_modified`) VALUES
(1, 'Joshua Natan', 'e10adc3949ba59abbe56e057f20f883e', 'joshuanatan.jn@gmail.com', '1', '2019-11-12 12:50:40', 0),
(2, 'John Doe Joseph', '81dc9bdb52d04dc20036dbd8313ed055', 'johndoe@emailx.com', '1', '2020-02-09 20:17:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_result_type`
--
ALTER TABLE `tbl_result_type`
  ADD PRIMARY KEY (`result_type`);

--
-- Indexes for table `tbl_result_type_mapping`
--
ALTER TABLE `tbl_result_type_mapping`
  ADD PRIMARY KEY (`id_submit_result_type_mapping`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id_submit_token`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_submit_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_result_type_mapping`
--
ALTER TABLE `tbl_result_type_mapping`
  MODIFY `id_submit_result_type_mapping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id_submit_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_submit_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
