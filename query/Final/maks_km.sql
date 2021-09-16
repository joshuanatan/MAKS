drop database maks_temp_km;
create database maks_temp_km;
use maks_temp_km;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tbl_dataset` (
  `id_submit_dataset` int(11) NOT NULL,
  `dataset_key` varchar(50) DEFAULT NULL,
  `dataset_name` varchar(200) DEFAULT NULL,
  `dataset_query` text DEFAULT NULL,
  `entity_combination_notes` varchar(400) DEFAULT NULL,
  `id_entity_combination` int(11) DEFAULT NULL,
  `id_db_connection` int(11) DEFAULT NULL,
  `status_aktif_dataset` varchar(1) DEFAULT NULL,
  `tgl_dataset_last_modified` datetime DEFAULT NULL,
  `id_user_dataset_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dataset`
--

INSERT INTO `tbl_dataset` (`id_submit_dataset`, `dataset_key`, `dataset_name`, `dataset_query`, `entity_combination_notes`, `id_entity_combination`, `id_db_connection`, `status_aktif_dataset`, `tgl_dataset_last_modified`, `id_user_dataset_last_modified`) VALUES
(1, 'JumlahPenjualanTahunIni', 'Jumlah Penjualan Tahun Ini', 'Select sum(trxamt) as jumlah_penjualan from tbl_sales where year(trxdate)= year(now());', NULL, 1, 1, '1', '2020-02-10 08:00:22', 1),
(2, 'PerbandinganPenjualan3TahunTerakhir', 'Perbandingan Penjualan 3 Tahun Terakhir', 'Select sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())) as tahun from tbl_sales where year(trxdate)= year(now()) \r\nunion \r\nSelect sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())-1) as tahun from tbl_sales where year(trxdate)= year(now())-1 \r\nunion \r\nSelect sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())-2) as tahun from tbl_sales where year(trxdate)= year(now())-2', NULL, 2, 1, '1', '2020-02-10 10:17:22', 1),
(3, 'PerbandinganPenjualanTiapKotaTahunIni', 'Perbandingan Penjualan Tiap Kota Tahun Ini', 'Select sum(total_penjualan)  as total_penjualan, store_city from (Select sum(TRXAMT) as total_penjualan,store from tbl_sales where year(trxdate)= year(now()) group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by store_city ', NULL, 3, 1, '1', '2020-02-10 10:23:39', 1),
(4, 'PerbandinganPenjualanTiapDistrikTahunIni', 'Perbandingan Penjualan Tiap Distrik Tahun Ini', 'Select sum(total_penjualan) as total_penjualan, district_name from (Select sum(trxamt) as total_penjualan,store from tbl_sales where year(trxdate)= year(now()) group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by district_name', NULL, 4, 1, '1', '2020-02-10 09:05:48', 1),
(5, 'PerbandinganPenjualanTiapBulan', 'Perbandingan Penjualan Tiap Bulan', 'Select sum(trxamt) as total_penjualan, concat(\"bulan \",month(trxdate)) as bulan from tbl_sales where year(trxdate)= year(now()) group by month(trxdate)', NULL, 5, 1, '1', '2020-02-10 08:15:50', 1),
(6, '10KotaDenganPenghasilanTerbanyakTahunIni', '10 Kota Dengan Penghasilan Terbanyak Tahun Ini', 'Select total_penjualan, store_name from (Select sum(TRXAMT) as total_penjualan,store from tbl_sales where year(trxdate)= year(now()) group by store order by total_penjualan limit 10) as a inner join tbl_toko on tbl_toko.store = a.store ', NULL, 6, 1, '1', '2020-02-10 08:34:58', 1),
(7, 'TotalPenjualanTahunTertentu', 'Total Penjualan Tahun Sesuai Permintaan', 'Select sum(trxamt) as jumlah_penjualan from tbl_sales where year(trxdate)= \'&tahun1\'', NULL, 7, 1, '1', '2020-02-10 08:44:18', 1),
(8, 'PerbandinganPenjualanTahunTertentuDenganTahunIni', 'Perbandingan Penjualan Tahun Sesuai Permintaan dengan Tahun Ini', 'Select sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",\"&tahun1\") as tahun,\'terbanding\' as status_perbandingan from tbl_sales where year(trxdate)= &tahun1\r\nunion \r\nSelect sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())) as tahun, \'pembanding\' as status_perbandingan from tbl_sales where year(trxdate)= year(now())', NULL, 8, 1, '1', '2020-02-10 10:18:38', 1),
(9, 'PerbandinganPenjualanSetiapKotaTahunTertentu', 'Perbandingan Penjualan Setiap Kota Tahun Sesuai Permintaan', 'Select sum(total_penjualan) as total_penjualan, store_city from (Select sum(trxamt) as total_penjualan,store from tbl_sales where year(trxdate)= 2019 group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by store_city', NULL, 9, 1, '1', '2020-02-10 09:50:40', 1),
(10, 'PerbandinganPenjualanSetiapDistrikTahunTertentu', 'Perbandingan Penjualan Setiap Distrik Tahun Sesuai Permintaan', 'Select sum(total_penjualan) as total_penjualan, district_name from (Select sum(trxamt) as total_penjualan,STORE from tbl_sales where year(trxdate)= 2019 group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by district_name', NULL, 10, 1, '1', '2020-02-10 09:52:14', 1),
(11, 'PerbandinganPenjualanTiapBulandiTahunTertentu', 'Perbandingan Penjualan Tiap Bulan di Tahun Sesuai Permintaan', 'Select sum(trxamt) as jumlah_penjualan, concat(\"bulan \",month(trxdate)) as bulan from tbl_sales where year(trxdate)= &tahun1 group by month(trxdate)', NULL, 11, 1, '1', '2020-02-10 09:14:34', 1),
(12, '10TokoPalingBanyakMenghasilkanDiTahunTertentu', '10 Toko Paling Banyak Menghasilkan Di Tahun Sesuai Permintaan', 'Select total_penjualan, store_name from (Select sum(trxamt) as total_penjualan,store from tbl_sales where year(trxdate)= &tahun1 group by store order by total_penjualan limit 10) as a inner join tbl_toko on tbl_toko.store = a.store ', NULL, 12, 1, '1', '2020-02-10 09:21:49', 1),
(13, 'JumlahTokoMDSSaatIni', 'Jumlah Toko MDS Saat Ini', 'select count(store) as jumlah_toko from tbl_toko', NULL, 13, 1, '1', '2020-02-10 10:31:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dataset_dbfield_mapping`
--

CREATE TABLE `tbl_dataset_dbfield_mapping` (
  `id_submit_dataset_dbfield_mapping` int(11) NOT NULL,
  `id_dataset` int(11) DEFAULT NULL,
  `db_field` varchar(400) DEFAULT NULL,
  `db_field_alias` varchar(100) DEFAULT NULL,
  `tbl_name` varchar(400) DEFAULT NULL,
  `status_aktif_dataset_dbfield_mapping` varchar(1) DEFAULT NULL,
  `tgl_dataset_dbfield_mapping_last_modified` datetime DEFAULT NULL,
  `id_user_dataset_dbfield_mapping_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dataset_dbfield_mapping`
--

INSERT INTO `tbl_dataset_dbfield_mapping` (`id_submit_dataset_dbfield_mapping`, `id_dataset`, `db_field`, `db_field_alias`, `tbl_name`, `status_aktif_dataset_dbfield_mapping`, `tgl_dataset_dbfield_mapping_last_modified`, `id_user_dataset_dbfield_mapping_last_modified`) VALUES
(1, 1, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales', '1', '2020-02-10 07:44:22', 1),
(2, 2, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales', '1', '2020-02-10 08:07:28', 1),
(3, 2, 'tahun', 'Tahun', 'tbl_sales', '1', '2020-02-10 08:07:28', 1),
(4, 3, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 08:10:49', 1),
(5, 3, 'store_city', 'Nama Toko', 'tbl_toko', '1', '2020-02-10 10:23:39', 1),
(6, 4, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 08:12:20', 1),
(7, 4, 'district_name', 'Nama Distrik', 'tbl_toko', '1', '2020-02-10 08:12:21', 1),
(8, 5, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 08:15:50', 1),
(9, 5, 'bulan', 'Bulan', 'tbl_sales', '1', '2020-02-10 08:15:51', 1),
(10, 6, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 08:34:58', 1),
(11, 6, 'store_name', 'Nama Toko', 'tbl_toko', '1', '2020-02-10 08:34:59', 1),
(12, 7, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales', '1', '2020-02-10 08:44:18', 1),
(13, 8, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales', '1', '2020-02-10 08:49:14', 1),
(14, 8, 'tahun', 'Tahun Penjualan', 'tbl_sales', '1', '2020-02-10 08:49:14', 1),
(15, 9, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 08:54:16', 1),
(16, 9, 'store_city', 'Nama Kota', 'tbl_toko', '1', '2020-02-10 08:54:16', 1),
(17, 10, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 09:02:06', 1),
(18, 10, 'district_name', 'Nama Distrik', 'tbl_toko', '1', '2020-02-10 09:52:14', 1),
(19, 11, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales', '1', '2020-02-10 09:14:34', 1),
(20, 11, 'bulan', 'Bulan Penjualan', 'tbl_sales', '1', '2020-02-10 09:14:34', 1),
(21, 12, 'total_penjualan', 'Total Penjualan', 'tbl_sales', '1', '2020-02-10 09:21:49', 1),
(22, 12, 'store_name', 'Nama Toko', 'tbl_toko', '1', '2020-02-10 09:21:49', 1),
(23, 13, 'jumlah_toko', 'Jumlah Toko', 'tbl_toko', '1', '2020-02-10 10:31:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dataset_related`
--

CREATE TABLE `tbl_dataset_related` (
  `id_submit_dataset_related` int(11) NOT NULL,
  `id_dataset` int(11) DEFAULT NULL,
  `id_dataset_related` int(11) DEFAULT NULL,
  `status_aktif_dataset_related` varchar(1) DEFAULT NULL,
  `tgl_dataset_related_last_modified` datetime DEFAULT NULL,
  `id_user_dataset_related_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dataset_related`
--

INSERT INTO `tbl_dataset_related` (`id_submit_dataset_related`, `id_dataset`, `id_dataset_related`, `status_aktif_dataset_related`, `tgl_dataset_related_last_modified`, `id_user_dataset_related_last_modified`) VALUES
(1, 1, 2, '1', '2020-02-10 08:38:00', NULL),
(2, 1, 3, '1', '2020-02-10 08:38:00', NULL),
(3, 1, 4, '1', '2020-02-10 08:38:00', NULL),
(4, 1, 5, '1', '2020-02-10 08:38:00', NULL),
(5, 1, 6, '1', '2020-02-10 08:38:00', NULL),
(6, 7, 8, '1', '2020-02-10 08:49:00', NULL),
(7, 7, 9, '1', '2020-02-10 09:24:00', NULL),
(8, 7, 10, '1', '2020-02-10 09:24:00', NULL),
(9, 7, 11, '1', '2020-02-10 09:24:00', NULL),
(10, 7, 12, '1', '2020-02-10 09:24:00', NULL),
(11, 1, 13, '1', '2020-02-10 10:32:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_db_connection`
--

CREATE TABLE `tbl_db_connection` (
  `id_submit_db_connection` int(11) NOT NULL,
  `db_hostname` varchar(400) DEFAULT NULL,
  `db_username` varchar(400) DEFAULT NULL,
  `db_password` varchar(1000) DEFAULT NULL,
  `db_name` varchar(100) DEFAULT NULL,
  `status_aktif_db_connection` varchar(1) DEFAULT NULL,
  `tgl_db_connection_last_modified` datetime DEFAULT NULL,
  `id_user_db_connection_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_db_connection`
--

INSERT INTO `tbl_db_connection` (`id_submit_db_connection`, `db_hostname`, `db_username`, `db_password`, `db_name`, `status_aktif_db_connection`, `tgl_db_connection_last_modified`, `id_user_db_connection_last_modified`) VALUES
(1, '127.0.0.1', 'root', '1be6e8ea1de4e138d76d317b660abbce0ea23120f37705ccf10774a35bab26f608b3e7304c20e6aa40605d5a51b3db777a0e2c95d37f8982e6fd26154cc4cea1JhY8XiqOHDXR2P6j12MC7kvqQj7QloMuGVs6LEvc56k=', 'maks_dataset', '1', '2020-02-10 07:34:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entity`
--

CREATE TABLE `tbl_entity` (
  `id_submit_entity` int(11) NOT NULL,
  `entity` varchar(400) DEFAULT NULL,
  `entity_category` varchar(100) DEFAULT NULL COMMENT 'INTENT/ENTITY',
  `status_aktif_entity` varchar(1) DEFAULT NULL,
  `tgl_entity_last_modified` datetime DEFAULT NULL,
  `id_user_entity_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entity`
--

INSERT INTO `tbl_entity` (`id_submit_entity`, `entity`, `entity_category`, `status_aktif_entity`, `tgl_entity_last_modified`, `id_user_entity_last_modified`) VALUES
(1, 'Supporting Dataset', 'INTENT', '1', '2020-02-10 07:34:35', 1),
(2, 'tahun', 'ENTITY', '1', '2020-02-10 07:34:35', 1),
(3, 'tahunIni', 'ENTITY', '1', '2020-02-10 07:44:37', 1),
(4, 'getJumlahPenjualan', 'INTENT', '1', '2020-02-10 07:44:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entity_combination`
--

CREATE TABLE `tbl_entity_combination` (
  `id_submit_entity_combination` int(11) NOT NULL,
  `status_aktif_entity_combination` varchar(1) DEFAULT NULL,
  `tgl_entity_combination_last_modified` datetime DEFAULT NULL,
  `id_user_entity_combination_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entity_combination`
--

INSERT INTO `tbl_entity_combination` (`id_submit_entity_combination`, `status_aktif_entity_combination`, `tgl_entity_combination_last_modified`, `id_user_entity_combination_last_modified`) VALUES
(1, '1', '2020-02-10 07:44:00', 1),
(2, '1', '2020-02-10 08:07:00', 1),
(3, '1', '2020-02-10 08:10:00', 1),
(4, '1', '2020-02-10 08:12:00', 1),
(5, '1', '2020-02-10 08:15:00', 1),
(6, '1', '2020-02-10 08:34:00', 1),
(7, '1', '2020-02-10 08:44:00', 1),
(8, '1', '2020-02-10 08:49:00', 1),
(9, '1', '2020-02-10 08:54:00', 1),
(10, '1', '2020-02-10 09:02:00', 1),
(11, '1', '2020-02-10 09:14:00', 1),
(12, '1', '2020-02-10 09:21:00', 1),
(13, '1', '2020-02-10 10:31:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entity_combination_list`
--

CREATE TABLE `tbl_entity_combination_list` (
  `id_submit_entity_combination_list` int(11) NOT NULL,
  `id_entity` int(11) DEFAULT NULL,
  `id_entity_combination` int(11) DEFAULT NULL,
  `status_aktif_entity_combination_list` varchar(1) DEFAULT NULL,
  `tgl_entity_combination_list_last_modified` datetime DEFAULT NULL,
  `id_user_entity_combination_list_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entity_combination_list`
--

INSERT INTO `tbl_entity_combination_list` (`id_submit_entity_combination_list`, `id_entity`, `id_entity_combination`, `status_aktif_entity_combination_list`, `tgl_entity_combination_list_last_modified`, `id_user_entity_combination_list_last_modified`) VALUES
(10, 3, 1, '1', '2020-02-10 07:54:41', 1),
(11, 4, 1, '1', '2020-02-10 07:57:11', 1),
(12, 1, 2, '1', '2020-02-10 08:07:28', 1),
(13, 1, 3, '1', '2020-02-10 08:10:49', 1),
(14, 1, 4, '1', '2020-02-10 08:12:20', 1),
(15, 1, 5, '1', '2020-02-10 08:15:50', 1),
(16, 1, 6, '1', '2020-02-10 08:34:58', 1),
(17, 4, 7, '1', '2020-02-10 08:44:18', 1),
(18, 2, 7, '1', '2020-02-10 08:44:18', 1),
(19, 1, 8, '1', '2020-02-10 08:49:14', 1),
(20, 2, 8, '1', '2020-02-10 08:49:14', 1),
(21, 1, 9, '1', '2020-02-10 08:54:16', 1),
(22, 2, 9, '1', '2020-02-10 08:54:16', 1),
(23, 1, 10, '1', '2020-02-10 09:02:05', 1),
(24, 2, 10, '1', '2020-02-10 09:02:05', 1),
(25, 1, 11, '1', '2020-02-10 09:14:33', 1),
(26, 2, 11, '1', '2020-02-10 09:14:34', 1),
(27, 1, 12, '1', '2020-02-10 09:21:49', 1),
(28, 2, 12, '1', '2020-02-10 09:21:49', 1),
(29, 1, 13, '1', '2020-02-10 10:31:51', 1);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  ADD PRIMARY KEY (`id_submit_dataset`);

--
-- Indexes for table `tbl_dataset_dbfield_mapping`
--
ALTER TABLE `tbl_dataset_dbfield_mapping`
  ADD PRIMARY KEY (`id_submit_dataset_dbfield_mapping`);

--
-- Indexes for table `tbl_dataset_related`
--
ALTER TABLE `tbl_dataset_related`
  ADD PRIMARY KEY (`id_submit_dataset_related`);

--
-- Indexes for table `tbl_db_connection`
--
ALTER TABLE `tbl_db_connection`
  ADD PRIMARY KEY (`id_submit_db_connection`);

--
-- Indexes for table `tbl_entity`
--
ALTER TABLE `tbl_entity`
  ADD PRIMARY KEY (`id_submit_entity`);

--
-- Indexes for table `tbl_entity_combination`
--
ALTER TABLE `tbl_entity_combination`
  ADD PRIMARY KEY (`id_submit_entity_combination`);

--
-- Indexes for table `tbl_entity_combination_list`
--
ALTER TABLE `tbl_entity_combination_list`
  ADD PRIMARY KEY (`id_submit_entity_combination_list`);

-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  MODIFY `id_submit_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_dataset_dbfield_mapping`
--
ALTER TABLE `tbl_dataset_dbfield_mapping`
  MODIFY `id_submit_dataset_dbfield_mapping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_dataset_related`
--
ALTER TABLE `tbl_dataset_related`
  MODIFY `id_submit_dataset_related` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_db_connection`
--
ALTER TABLE `tbl_db_connection`
  MODIFY `id_submit_db_connection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_entity`
--
ALTER TABLE `tbl_entity`
  MODIFY `id_submit_entity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_entity_combination`
--
ALTER TABLE `tbl_entity_combination`
  MODIFY `id_submit_entity_combination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_entity_combination_list`
--
ALTER TABLE `tbl_entity_combination_list`
  MODIFY `id_submit_entity_combination_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;


-- --------------------------------------------------------

CREATE VIEW `v_detail_dataset`  AS  select `tbl_dataset`.`id_submit_dataset` AS `id_submit_dataset`,`tbl_dataset`.`dataset_name` AS `dataset_name`,`tbl_dataset`.`dataset_query` AS `dataset_query`,`tbl_dataset`.`id_db_connection` AS `id_db_connection`,`tbl_dataset`.`status_aktif_dataset` AS `status_aktif_dataset`,`tbl_dataset`.`tgl_dataset_last_modified` AS `tgl_dataset_last_modified`,`tbl_dataset`.`id_user_dataset_last_modified` AS `id_user_dataset_last_modified`,`tbl_db_connection`.`id_submit_db_connection` AS `id_submit_db_connection`,`tbl_db_connection`.`db_hostname` AS `db_hostname`,`tbl_db_connection`.`db_username` AS `db_username`,`tbl_db_connection`.`db_password` AS `db_password`,`tbl_db_connection`.`db_name` AS `db_name`,`tbl_db_connection`.`status_aktif_db_connection` AS `status_aktif_db_connection`,`tbl_db_connection`.`tgl_db_connection_last_modified` AS `tgl_db_connection_last_modified`,`tbl_db_connection`.`id_user_db_connection_last_modified` AS `id_user_db_connection_last_modified` from (`tbl_dataset` join `tbl_db_connection` on(`tbl_db_connection`.`id_submit_db_connection` = `tbl_dataset`.`id_db_connection`)) ;


CREATE VIEW `v_detail_entity_mapping`  AS  select `tbl_entity_combination_list`.`id_submit_entity_combination_list` AS `id_submit_entity_combination_list`,`tbl_entity_combination_list`.`id_entity` AS `id_entity`,`tbl_entity_combination_list`.`id_entity_combination` AS `id_entity_combination`,`tbl_entity_combination_list`.`tgl_entity_combination_list_last_modified` AS `tgl_entity_combination_list_last_modified`,`tbl_entity`.`id_submit_entity` AS `id_submit_entity`,`tbl_entity`.`entity` AS `entity`,`tbl_entity`.`entity_category` AS `entity_category` from (`tbl_entity_combination_list` join `tbl_entity` on(`tbl_entity`.`id_submit_entity` = `tbl_entity_combination_list`.`id_entity`)) where `tbl_entity`.`status_aktif_entity` = 1 and `tbl_entity_combination_list`.`status_aktif_entity_combination_list` = 1 ;


CREATE VIEW `v_entity_dataset_mapping`  AS  select `tbl_entity_combination`.`id_submit_entity_combination` AS `id_submit_entity_combination`,`tbl_entity_combination_list`.`id_entity` AS `id_entity`,`tbl_entity`.`entity` AS `entity`,`tbl_entity`.`entity_category` AS `entity_category`,`tbl_entity_combination_list`.`id_entity_combination` AS `id_entity_combination`,`tbl_dataset`.`dataset_key` AS `dataset_key`,`tbl_dataset`.`dataset_name` AS `dataset_name`,`tbl_dataset`.`dataset_query` AS `dataset_query`,`tbl_dataset`.`id_db_connection` AS `id_db_connection`,`tbl_entity_combination_list`.`status_aktif_entity_combination_list` AS `status_aktif_entity_combination_list`,`tbl_entity`.`status_aktif_entity` AS `status_aktif_entity`,`tbl_dataset`.`status_aktif_dataset` AS `status_aktif_dataset`,`tbl_entity_combination`.`status_aktif_entity_combination` AS `status_aktif_entity_combination`,`tbl_entity_combination_list`.`id_submit_entity_combination_list` AS `id_submit_entity_combination_list`,`tbl_entity_combination_list`.`tgl_entity_combination_list_last_modified` AS `tgl_entity_combination_list_last_modified`,`tbl_entity_combination_list`.`id_user_entity_combination_list_last_modified` AS `id_user_entity_combination_list_last_modified`,`tbl_entity`.`id_submit_entity` AS `id_submit_entity`,`tbl_entity`.`tgl_entity_last_modified` AS `tgl_entity_last_modified`,`tbl_entity`.`id_user_entity_last_modified` AS `id_user_entity_last_modified`,`tbl_entity_combination`.`tgl_entity_combination_last_modified` AS `tgl_entity_combination_last_modified`,`tbl_entity_combination`.`id_user_entity_combination_last_modified` AS `id_user_entity_combination_last_modified`,`tbl_dataset`.`id_submit_dataset` AS `id_submit_dataset`,`tbl_dataset`.`tgl_dataset_last_modified` AS `tgl_dataset_last_modified`,`tbl_dataset`.`id_user_dataset_last_modified` AS `id_user_dataset_last_modified` from (((`tbl_dataset` join `tbl_entity_combination` on(`tbl_entity_combination`.`id_submit_entity_combination` = `tbl_dataset`.`id_entity_combination`)) left join `tbl_entity_combination_list` on(`tbl_entity_combination_list`.`id_entity_combination` = `tbl_entity_combination`.`id_submit_entity_combination`)) left join `tbl_entity` on(`tbl_entity`.`id_submit_entity` = `tbl_entity_combination_list`.`id_entity`)) ;

CREATE VIEW `v_endpoint_intent_dataset_mapping`  AS  select `v_entity_dataset_mapping`.`id_submit_entity_combination` AS `id_submit_entity_combination`,`v_entity_dataset_mapping`.`id_submit_dataset` AS `id_submit_dataset`,group_concat(`v_entity_dataset_mapping`.`entity` order by `v_entity_dataset_mapping`.`entity` ASC separator ',') AS `entity`,group_concat(`v_entity_dataset_mapping`.`entity_category` order by `v_entity_dataset_mapping`.`entity` ASC separator ',') AS `entity_category`,`v_entity_dataset_mapping`.`dataset_key` AS `dataset_key`,`v_entity_dataset_mapping`.`dataset_name` AS `dataset_name`,`v_entity_dataset_mapping`.`dataset_query` AS `dataset_query`,`v_entity_dataset_mapping`.`id_db_connection` AS `id_db_connection`,`tbl_db_connection`.`db_hostname` AS `db_hostname`,`v_entity_dataset_mapping`.`status_aktif_dataset` AS `status_aktif_dataset`,`v_entity_dataset_mapping`.`tgl_dataset_last_modified` AS `tgl_dataset_last_modified`,`tbl_db_connection`.`db_name` AS `db_name` from (`v_entity_dataset_mapping` join `tbl_db_connection` on(`tbl_db_connection`.`id_submit_db_connection` = `v_entity_dataset_mapping`.`id_db_connection`)) where `v_entity_dataset_mapping`.`status_aktif_entity_combination_list` = 1 and `v_entity_dataset_mapping`.`status_aktif_entity` = 1 group by `v_entity_dataset_mapping`.`id_submit_entity_combination` ;



CREATE VIEW `v_related_dataset`  AS  select `tbl_dataset_related`.`id_submit_dataset_related` AS `id_submit_dataset_related`,`tbl_dataset_related`.`id_dataset` AS `id_dataset`,`tbl_dataset_related`.`id_dataset_related` AS `id_dataset_related`,`tbl_dataset`.`id_submit_dataset` AS `id_submit_dataset`,`tbl_dataset`.`dataset_key` AS `dataset_key`,`tbl_dataset`.`dataset_name` AS `dataset_name`,`tbl_dataset`.`dataset_query` AS `dataset_query`,`tbl_dataset`.`id_entity_combination` AS `id_entity_combination`,`tbl_dataset`.`id_db_connection` AS `id_db_connection`,`tbl_dataset_related`.`status_aktif_dataset_related` AS `status_aktif_dataset_related`,`tbl_dataset_related`.`tgl_dataset_related_last_modified` AS `tgl_dataset_related_last_modified`,`tbl_dataset_related`.`id_user_dataset_related_last_modified` AS `id_user_dataset_related_last_modified`,`tbl_dataset`.`status_aktif_dataset` AS `status_aktif_dataset`,`tbl_dataset`.`tgl_dataset_last_modified` AS `tgl_dataset_last_modified`,`tbl_dataset`.`id_user_dataset_last_modified` AS `id_user_dataset_last_modified` from (`tbl_dataset_related` join `tbl_dataset` on(`tbl_dataset`.`id_submit_dataset` = `tbl_dataset_related`.`id_dataset_related`)) ;