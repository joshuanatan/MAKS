-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 12:17 PM
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
-- Table structure for table `tbl_dataset`
--

CREATE TABLE `tbl_dataset` (
  `id_submit_dataset` int(11) NOT NULL,
  `dataset_name` varchar(200) DEFAULT NULL,
  `dataset_query` text DEFAULT NULL,
  `dataset_notes` varchar(400) DEFAULT NULL,
  `dataset_intent` varchar(400) NOT NULL,
  `id_result_type` varchar(100) DEFAULT NULL,
  `id_db_connection` int(11) DEFAULT NULL,
  `status_aktif_dataset` varchar(1) DEFAULT NULL,
  `tgl_dataset_last_modified` datetime DEFAULT NULL,
  `id_user_dataset_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dataset`
--

INSERT INTO `tbl_dataset` (`id_submit_dataset`, `dataset_name`, `dataset_query`, `dataset_notes`, `dataset_intent`, `id_result_type`, `id_db_connection`, `status_aktif_dataset`, `tgl_dataset_last_modified`, `id_user_dataset_last_modified`) VALUES
(1, 'Total Nominal Penjualan Tahun Ini', 'Select sum(trxamt) as jumlah_penjualan from tbl_sales where year(trxdate)= year(now());', '-', 'get_nominal_transaksi_tahun_ini', '4', 1, '1', '2021-09-18 10:48:19', 0),
(2, 'Perbandingan Penjualan 3 Tahun Terakhir', 'Select sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())) as tahun from tbl_sales where year(trxdate)= year(now()) \r\nunion \r\nSelect sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())-1) as tahun from tbl_sales where year(trxdate)= year(now())-1 \r\nunion \r\nSelect sum(trxamt) as jumlah_penjualan, concat(\"Tahun \",year(now())-2) as tahun from tbl_sales where year(trxdate)= year(now())-2', NULL, '', '1', 1, '2', '2021-09-11 15:06:53', 0),
(3, 'Perbandingan Nominal Penjualan Tiap Kota Tahun Ini', 'Select sum(total_penjualan)  as total_penjualan, store_city from (Select sum(TRXAMT) as total_penjualan,store from tbl_sales where year(trxdate)= year(now()) group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by store_city ', '-', 'get_perbandingan_jumlah_transaksi', '2', 1, '1', '2021-09-18 16:16:39', 0),
(4, 'Perbandingan Total Nominal Penjualan Tiap Distrik Tahun Ini', 'Select sum(total_penjualan) as total_penjualan, district_name from (Select sum(trxamt) as total_penjualan,store from tbl_sales where year(trxdate)= year(now()) group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by district_name', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '1', '2021-09-18 10:45:21', 0),
(5, 'Perbandingan Nominal Penjualan Tiap Bulan', 'Select sum(trxamt) as total_penjualan, concat(\"bulan \",month(trxdate)) as bulan from tbl_sales where year(trxdate)= year(now()) group by month(trxdate)', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '1', '2021-09-18 10:51:27', 0),
(6, '10 Kota Dengan Penghasilan Terbanyak Tahun Ini', 'Select total_penjualan, store_name from (Select sum(TRXAMT) as total_penjualan,store from tbl_sales where year(trxdate)= year(now()) group by store order by total_penjualan limit 10) as a inner join tbl_toko on tbl_toko.store = a.store ', '-', 'get_nominal_transaksi', '2', 1, '1', '2021-09-18 10:52:23', 0),
(7, 'Total Nominal Penjualan Tahun Tertentu', 'Select sum(trxamt) as jumlah_penjualan from tbl_sales where year(trxdate)= \'&tahun1\'', '-', 'get_nominal_transaksi', '4', 1, '1', '2021-09-18 10:54:11', 0),
(8, 'Perbandingan Penjualan Tahun Tertentu dengan Tahun Ini', 'select concat(round(jmlh1/jmlh2*100,2),\"%\") as perbandingan from (\r\nselect (select sum(trxamt) from tbl_sales where year(trxdate)=&tahun1) as jmlh1, (select sum(trxamt) from tbl_sales where year(trxdate)=year(now())) as jmlh2) as a', '-', 'get_perbandingan_nominal_transaksi', '4', 1, '1', '2021-09-18 17:15:59', 0),
(9, 'Perbandingan Nominal Penjualan Setiap Kota Tahun Tertentu', 'Select sum(total_penjualan) as total_penjualan, store_city from (Select sum(trxamt) as total_penjualan,store from tbl_sales where year(trxdate)= &tahun1 group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by store_city', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '1', '2021-09-18 10:56:05', 0),
(10, 'Perbandingan Nominal Penjualan Setiap Distrik Tahun Tertentu', 'Select sum(total_penjualan) as total_penjualan, district_name from (Select sum(trxamt) as total_penjualan,STORE from tbl_sales where year(trxdate)= &tahun1 group by store) as a inner join tbl_toko on tbl_toko.store = a.store group by district_name', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '1', '2021-09-18 10:59:11', 0),
(11, 'Perbandingan Jumlah Penjualan Tiap Bulan di Tahun Tertentu', 'Select count(trxnum) as jumlah_penjualan, concat(\"bulan \",month(trxdate)) as bulan from tbl_sales where year(trxdate)= &tahun1 group by month(trxdate)', '-', 'get_perbandingan_jumlah_transaksi', '1', 1, '1', '2021-09-18 11:21:43', 0),
(12, '10 Toko Dengan Nominal Penjualan Tertinggi Di Tahun Tertentu', 'Select total_penjualan, store_name from (Select sum(trxamt) as total_penjualan,store from tbl_sales where year(trxdate)= &tahun1 group by store order by total_penjualan limit 10) as a inner join tbl_toko on tbl_toko.store = a.store ', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '1', '2021-09-18 11:02:11', 0),
(13, 'Jumlah Toko MDS Saat Ini', 'select count(store) as jumlah_toko from tbl_toko', '-', 'get_jumlah_toko', '4', 1, '1', '2021-09-18 11:00:32', 0),
(14, 'test', 'test', 'test', '291520895637732', '1', 1, '2', '2021-09-18 10:59:26', 0),
(15, 'test', 'test', 'test', '291520895637732', '1', 1, '2', '2021-09-18 10:59:38', 0),
(16, 'test', 'test', 'test', 'testintent3', '1', 1, '2', '2021-09-18 10:59:35', 0),
(17, 'test23', 'test43', 'test23', 'testintent323', '1', 1, '2', '2021-09-18 10:59:31', 0),
(18, 'Perbandingan Nominal Penjualan di 2 Kota Tertentu Bulan dan Tahun Tertentu', 'select sum(trxamt) as nominal_transaksi, store_city from tbl_sales inner join tbl_toko on tbl_toko.store = tbl_sales.store where store_city = \"&kota1\" and year(trxdate) = &tahun1 and case \r\nwhen \"&bulan1\"=\"januari\" then month(trxdate)=1\r\nwhen \"&bulan1\"=\"februari\" then month(trxdate)=2\r\nwhen \"&bulan1\"=\"maret\" then month(trxdate)=3\r\nwhen \"&bulan1\"=\"april\" then month(trxdate)=4\r\nwhen \"&bulan1\"=\"mei\" then month(trxdate)=5\r\nwhen \"&bulan1\"=\"juni\" then month(trxdate)=6\r\nwhen \"&bulan1\"=\"juli\" then month(trxdate)=7\r\nwhen \"&bulan1\"=\"agustus\" then month(trxdate)=8\r\nwhen \"&bulan1\"=\"september\" then month(trxdate)=9\r\nwhen \"&bulan1\"=\"oktober\" then month(trxdate)=10\r\nwhen \"&bulan1\"=\"november\" then month(trxdate)=11\r\nwhen \"&bulan1\"=\"desember\" then month(trxdate)=12 end\r\nunion \r\nselect sum(trxamt), store_city from tbl_sales inner join tbl_toko on tbl_toko.store = tbl_sales.store where store_city = \"&kota2\" and year(trxdate) = &tahun2 and case \r\nwhen \"&bulan2\"=\"januari\" then month(trxdate)=1\r\nwhen \"&bulan2\"=\"februari\" then month(trxdate)=2\r\nwhen \"&bulan2\"=\"maret\" then month(trxdate)=3\r\nwhen \"&bulan2\"=\"april\" then month(trxdate)=4\r\nwhen \"&bulan2\"=\"mei\" then month(trxdate)=5\r\nwhen \"&bulan2\"=\"juni\" then month(trxdate)=6\r\nwhen \"&bulan2\"=\"juli\" then month(trxdate)=7\r\nwhen \"&bulan2\"=\"agustus\" then month(trxdate)=8\r\nwhen \"&bulan2\"=\"september\" then month(trxdate)=9\r\nwhen \"&bulan2\"=\"oktober\" then month(trxdate)=10\r\nwhen \"&bulan2\"=\"november\" then month(trxdate)=11\r\nwhen \"&bulan2\"=\"desember\" then month(trxdate)=12 end;', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '1', '2021-09-18 17:06:32', 0),
(19, 'Perbandingan Nominal Penjualan di 2 Kota Tertentu Bulan dan Tahun Tertentu', 'select sum(trxamt) as nominal_transaksi, store_city from tbl_sales inner join tbl_toko on tbl_toko.store = tbl_sales.store where store_city = \"&kota1\" and year(trxdate) = &tahun1 and month(trxdate) = &bulan1 union select sum(trxamt), store_city from tbl_sales inner join tbl_toko on tbl_toko.store = tbl_sales.store where store_city = \"&kota2\" and year(trxdate) = &tahun2 and month(trxdate) = &bulan2', '-', 'get_perbandingan_nominal_transaksi', '1', 1, '2', '2021-09-18 11:08:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dataset_dbfield_mapping`
--

CREATE TABLE `tbl_dataset_dbfield_mapping` (
  `id_pk_dataset_dbfield_mapping` int(11) NOT NULL,
  `id_fk_dataset` int(11) DEFAULT NULL,
  `db_field` varchar(400) DEFAULT NULL,
  `db_field_alias` varchar(100) DEFAULT NULL,
  `tbl_name` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dataset_dbfield_mapping`
--

INSERT INTO `tbl_dataset_dbfield_mapping` (`id_pk_dataset_dbfield_mapping`, `id_fk_dataset`, `db_field`, `db_field_alias`, `tbl_name`) VALUES
(2, 2, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales'),
(3, 2, 'tahun', 'Tahun', 'tbl_sales'),
(24, 14, NULL, 'test', 'test'),
(25, 14, NULL, 'test', 'test'),
(26, 15, NULL, 'test', 'test'),
(27, 16, 'test', 'test', 'test'),
(30, 17, 'kol1', 'alias1', 'table1'),
(31, 17, 'kol2', 'alias2', 'table2'),
(41, 4, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(42, 4, 'district_name', 'Nama Distrik', 'tbl_toko'),
(45, 1, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales'),
(48, 5, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(49, 5, 'bulan', 'Bulan', 'tbl_sales'),
(50, 6, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(51, 6, 'store_name', 'Nama Toko', 'tbl_toko'),
(53, 7, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales'),
(54, 9, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(55, 9, 'store_city', 'Nama Kota', 'tbl_toko'),
(56, 10, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(57, 10, 'district_name', 'Nama Distrik', 'tbl_toko'),
(58, 13, 'jumlah_toko', 'Jumlah Toko', 'tbl_toko'),
(59, 12, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(60, 12, 'store_name', 'Nama Toko', 'tbl_toko'),
(63, 19, 'nominal_transaksi', 'Nominal Transaksi', 'tbl_sales'),
(64, 19, 'store_city', 'Kota', 'tbl_store'),
(67, 11, 'jumlah_penjualan', 'Jumlah Penjualan', 'tbl_sales'),
(68, 11, 'bulan', 'Bulan Penjualan', 'tbl_sales'),
(77, 3, 'total_penjualan', 'Total Penjualan', 'tbl_sales'),
(78, 3, 'store_city', 'Nama Toko', 'tbl_toko'),
(82, 18, 'nominal_transaksi', 'Nominal Transaksi', 'tbl_sales'),
(83, 18, 'store_city', 'Kota', 'tbl_store'),
(90, 8, 'perbandingan', 'Persentase Selisih', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dataset_entity`
--

CREATE TABLE `tbl_dataset_entity` (
  `id_pk_dataset_entity` int(11) NOT NULL,
  `id_fk_dataset` int(11) DEFAULT NULL,
  `entity_name` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dataset_entity`
--

INSERT INTO `tbl_dataset_entity` (`id_pk_dataset_entity`, `id_fk_dataset`, `entity_name`) VALUES
(1, 14, 'testentity'),
(2, 14, 'testentity'),
(3, 16, 'entity2'),
(4, 16, 'entity3'),
(8, 17, 'testentity123'),
(9, 17, 'entity324'),
(11, 7, 'tahun'),
(12, 9, 'tahun'),
(13, 10, 'tahun'),
(14, 12, 'tahun'),
(21, 19, 'bulan'),
(22, 19, 'bulan'),
(23, 19, 'kota'),
(24, 19, 'kota'),
(25, 19, 'tahun'),
(26, 19, 'tahun'),
(28, 11, 'tahun'),
(60, 18, 'bulan'),
(61, 18, 'bulan'),
(62, 18, 'kota'),
(63, 18, 'kota'),
(64, 18, 'tahun'),
(65, 18, 'tahun'),
(72, 8, 'tahun');

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
(1, 1, 2, '0', '2021-09-18 11:09:00', 0),
(2, 1, 3, '0', '2021-09-18 11:09:00', 0),
(3, 1, 4, '0', '2021-09-12 15:36:00', 0),
(4, 1, 5, '0', '2021-09-18 11:09:00', 0),
(5, 1, 6, '0', '2021-09-18 11:09:00', 0),
(6, 7, 8, '1', '2020-02-10 08:49:00', NULL),
(7, 7, 9, '1', '2020-02-10 09:24:00', NULL),
(8, 7, 10, '1', '2020-02-10 09:24:00', NULL),
(9, 7, 11, '1', '2020-02-10 09:24:00', NULL),
(10, 7, 12, '1', '2020-02-10 09:24:00', NULL),
(11, 1, 13, '0', '2021-09-18 11:09:00', 0),
(12, 1, 14, '0', '2021-09-11 16:34:00', 0),
(13, 1, 15, '0', '2021-09-11 16:34:00', 0),
(14, 1, 16, '0', '2021-09-11 16:34:00', 0),
(15, 1, 14, '0', '2021-09-11 16:35:00', 0),
(16, 1, 15, '0', '2021-09-11 16:35:00', 0),
(17, 1, 16, '0', '2021-09-11 16:35:00', 0),
(18, 1, 14, '0', '2021-09-18 11:09:00', 0),
(19, 1, 16, '0', '2021-09-12 18:29:00', 0),
(20, 3, 16, '0', '2021-09-12 20:46:00', 0),
(21, 3, 17, '0', '2021-09-12 20:46:00', 0),
(22, 3, 4, '1', '2021-09-12 20:46:00', NULL),
(23, 3, 14, '0', '2021-09-12 20:46:00', 0),
(24, 3, 15, '0', '2021-09-12 20:46:00', 0),
(25, 3, 17, '0', '2021-09-12 20:46:00', 0),
(26, 3, 16, '0', '2021-09-18 11:39:00', 0),
(27, 3, 17, '0', '2021-09-18 11:39:00', 0),
(28, 1, 3, '1', '2021-09-18 11:10:00', NULL),
(29, 1, 4, '1', '2021-09-18 11:10:00', NULL),
(30, 1, 6, '1', '2021-09-18 11:10:00', NULL),
(31, 3, 10, '0', '2021-09-18 11:41:00', 0),
(32, 3, 6, '1', '2021-09-18 11:41:00', NULL),
(33, 3, 13, '1', '2021-09-18 11:42:00', NULL),
(34, 4, 3, '1', '2021-09-18 11:42:00', NULL),
(35, 4, 13, '1', '2021-09-18 11:42:00', NULL),
(36, 5, 1, '1', '2021-09-18 11:43:00', NULL),
(37, 5, 3, '1', '2021-09-18 11:43:00', NULL),
(38, 5, 4, '1', '2021-09-18 11:43:00', NULL),
(39, 6, 1, '1', '2021-09-18 11:44:00', NULL),
(40, 6, 3, '1', '2021-09-18 11:44:00', NULL),
(41, 6, 4, '1', '2021-09-18 11:44:00', NULL),
(42, 18, 1, '1', '2021-09-18 11:45:00', NULL),
(43, 18, 3, '1', '2021-09-18 11:45:00', NULL),
(44, 18, 4, '1', '2021-09-18 11:45:00', NULL),
(45, 18, 5, '1', '2021-09-18 11:45:00', NULL),
(46, 18, 6, '1', '2021-09-18 11:45:00', NULL),
(47, 18, 7, '1', '2021-09-18 11:45:00', NULL),
(48, 18, 8, '1', '2021-09-18 11:45:00', NULL),
(49, 18, 9, '1', '2021-09-18 11:45:00', NULL),
(50, 18, 10, '1', '2021-09-18 11:45:00', NULL),
(51, 18, 11, '1', '2021-09-18 11:45:00', NULL),
(52, 18, 12, '1', '2021-09-18 11:45:00', NULL),
(53, 18, 13, '1', '2021-09-18 11:45:00', NULL),
(54, 8, 1, '1', '2021-09-18 11:46:00', NULL),
(55, 8, 9, '1', '2021-09-18 11:46:00', NULL),
(56, 8, 10, '1', '2021-09-18 11:46:00', NULL),
(57, 8, 11, '1', '2021-09-18 11:46:00', NULL),
(58, 8, 12, '1', '2021-09-18 11:46:00', NULL),
(59, 9, 7, '1', '2021-09-18 11:46:00', NULL),
(60, 9, 10, '1', '2021-09-18 11:46:00', NULL),
(61, 9, 12, '1', '2021-09-18 11:46:00', NULL),
(62, 10, 1, '1', '2021-09-18 11:47:00', NULL),
(63, 10, 3, '1', '2021-09-18 11:47:00', NULL),
(64, 10, 11, '1', '2021-09-18 11:47:00', NULL),
(65, 10, 12, '1', '2021-09-18 11:47:00', NULL),
(66, 10, 13, '1', '2021-09-18 11:47:00', NULL),
(67, 11, 4, '1', '2021-09-18 11:47:00', NULL),
(68, 11, 7, '1', '2021-09-18 11:47:00', NULL),
(69, 11, 8, '1', '2021-09-18 11:47:00', NULL),
(70, 11, 13, '1', '2021-09-18 11:47:00', NULL),
(71, 12, 1, '1', '2021-09-18 11:47:00', NULL),
(72, 12, 5, '1', '2021-09-18 11:47:00', NULL),
(73, 12, 6, '1', '2021-09-18 11:47:00', NULL),
(74, 12, 9, '1', '2021-09-18 11:47:00', NULL),
(75, 12, 10, '1', '2021-09-18 11:47:00', NULL);

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
(1, '127.0.0.1', 'root', '78971ee9656de48a64f65f2406db932403042cab5de2ca41da75ea06e3a3fa3367bfde0181d0d35e0e6bc94b1c1fb55955951839be77fef892c6b820e3e3e60fX4cMZxAH6U3Df+MJeAA/f6pqd08rV+1Z4ONL5fJoTV0=', 'maks_dataset', '1', '2021-09-10 21:35:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_type`
--

CREATE TABLE `tbl_result_type` (
  `id_pk_result_type` int(11) NOT NULL,
  `result_type` varchar(400) NOT NULL,
  `status_aktif_result_type` varchar(1) DEFAULT NULL,
  `id_user_result_type_last_modified` int(11) DEFAULT NULL,
  `tgl_result_type_last_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result_type`
--

INSERT INTO `tbl_result_type` (`id_pk_result_type`, `result_type`, `status_aktif_result_type`, `id_user_result_type_last_modified`, `tgl_result_type_last_modified`) VALUES
(1, 'BAR CHART', '1', 0, '2021-09-11 22:01:48'),
(2, 'TABLE', '1', 1, '2020-02-09 20:18:32'),
(3, 'TESTAAAAAAAA', '2', 0, '2021-09-11 22:13:41'),
(4, 'WIDGET', '1', 1, '2020-02-10 09:25:49');

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
(1, 'Joshua NatanW', '61e9c06ea9a85a5088a499df6458d276', 'joshuanatan.jn@gmail.comW', '1', '2021-09-09 23:02:15', 1),
(2, 'John Doe Joseph', '81dc9bdb52d04dc20036dbd8313ed055', 'johndoe@emailx.com', '1', '2020-02-09 20:17:22', 1),
(0, 'test test', 'e10adc3949ba59abbe56e057f20f883e', 'test@email.com', '1', '2021-09-09 23:03:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wit_ai_acc`
--

CREATE TABLE `tbl_wit_ai_acc` (
  `id_submit_wit_ai_acc` int(11) NOT NULL,
  `registered_email` varchar(400) DEFAULT NULL,
  `registered_name` varchar(400) DEFAULT NULL,
  `application_id` varchar(400) DEFAULT NULL,
  `application_name` varchar(400) DEFAULT NULL,
  `server_access_token` varchar(400) DEFAULT NULL,
  `status_aktif_wit_ai_acc` varchar(1) DEFAULT NULL,
  `date_wit_ai_acc_last_modified` datetime DEFAULT NULL,
  `id_user_wit_ai_acc_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wit_ai_acc`
--

INSERT INTO `tbl_wit_ai_acc` (`id_submit_wit_ai_acc`, `registered_email`, `registered_name`, `application_id`, `application_name`, `server_access_token`, `status_aktif_wit_ai_acc`, `date_wit_ai_acc_last_modified`, `id_user_wit_ai_acc_last_modified`) VALUES
(1, 'copameb883@rebation.com / maksmds20271', 'Joshua Natan', '2964504537100638', 'maks', 'AJOGKHTTMRI3HRYKM4CJCQTXM335EWEW', '1', '2021-09-11 13:03:50', 0);

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
  ADD PRIMARY KEY (`id_pk_dataset_dbfield_mapping`);

--
-- Indexes for table `tbl_dataset_entity`
--
ALTER TABLE `tbl_dataset_entity`
  ADD PRIMARY KEY (`id_pk_dataset_entity`);

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
-- Indexes for table `tbl_result_type`
--
ALTER TABLE `tbl_result_type`
  ADD PRIMARY KEY (`id_pk_result_type`);

--
-- Indexes for table `tbl_wit_ai_acc`
--
ALTER TABLE `tbl_wit_ai_acc`
  ADD PRIMARY KEY (`id_submit_wit_ai_acc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dataset`
--
ALTER TABLE `tbl_dataset`
  MODIFY `id_submit_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_dataset_dbfield_mapping`
--
ALTER TABLE `tbl_dataset_dbfield_mapping`
  MODIFY `id_pk_dataset_dbfield_mapping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_dataset_entity`
--
ALTER TABLE `tbl_dataset_entity`
  MODIFY `id_pk_dataset_entity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_dataset_related`
--
ALTER TABLE `tbl_dataset_related`
  MODIFY `id_submit_dataset_related` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_db_connection`
--
ALTER TABLE `tbl_db_connection`
  MODIFY `id_submit_db_connection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_result_type`
--
ALTER TABLE `tbl_result_type`
  MODIFY `id_pk_result_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_wit_ai_acc`
--
ALTER TABLE `tbl_wit_ai_acc`
  MODIFY `id_submit_wit_ai_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
