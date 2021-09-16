
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
--
DROP TABLE IF EXISTS `tbl_entity`;
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

INSERT INTO `tbl_entity` (`id_submit_entity`, `id_wit_ai_acc`, `entity_wit_id`, `entity_name`, `entity_desc`, `status_aktif_entity`, `tgl_entity_last_modified`, `id_user_entity_last_modified`) VALUES
(1, 1, '423018a1-4431-4d6b-b564-5ddbd260e6c4', 'nama_kota_2', 'nama_kota_2', '2', '2020-02-09 20:51:58', 1),
(2, 1, '49f65ebd-d743-4098-b660-9d068f0c5773', 'nama_kota', 'nama_kota', '2', '2020-02-10 09:28:03', 1),
(3, 1, '0752a6c3-6235-4baf-a142-35c36fbd59b5', 'nama-xx', '', '2', '2020-02-10 09:27:57', 1),
(4, 1, '69265caa-36a5-4639-9f80-b53db222db92', 'tahun', '', '1', '2020-02-10 09:28:35', 1),
(5, 1, '6927dbc3-5cc2-4c48-a018-43a45873d68f', 'tahunIni', 'Berbentuk boolean untuk mengetahui apakah ada indikasi menunjukan \"tahun ini\"', '1', '2020-02-10 09:28:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entity_value`
--
DROP TABLE IF EXISTS `tbl_entity_value`;
CREATE TABLE `tbl_entity_value` (
  `id_submit_entity_value` int(11) NOT NULL,
  `id_entity` int(11) DEFAULT NULL,
  `entity_value` varchar(400) DEFAULT NULL,
  `status_aktif_entity_value` varchar(1) DEFAULT NULL,
  `tgl_entity_value_last_modified` datetime DEFAULT NULL,
  `id_user_entity_value_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entity_value`
--

INSERT INTO `tbl_entity_value` (`id_submit_entity_value`, `id_entity`, `entity_value`, `status_aktif_entity_value`, `tgl_entity_value_last_modified`, `id_user_entity_value_last_modified`) VALUES
(1, 1, 'kota_jakarta', '1', '2020-02-09 11:45:00', 1),
(2, 1, 'jakarta', '1', '2020-02-09 11:53:03', NULL),
(3, 2, 'kota_jakarta', '1', '2020-02-09 20:36:27', 1),
(4, 3, 'abc', '1', '2020-02-09 21:06:02', 1),
(5, 2, 'abc', '1', '2020-02-09 21:08:43', 1),
(6, 4, '2020', '1', '2020-02-10 09:28:50', 1),
(7, 4, '2019', '1', '2020-02-10 09:28:51', 1),
(8, 4, '2018', '1', '2020-02-10 09:28:53', 1),
(9, 5, 'tahun ini', '1', '2020-02-10 09:29:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_entity_value_expression`
--
DROP TABLE IF EXISTS `tbl_entity_value_expression`;
CREATE TABLE `tbl_entity_value_expression` (
  `id_submit_entity_value_expression` int(11) NOT NULL,
  `id_entity_value` int(11) DEFAULT NULL,
  `entity_value_expression` varchar(400) DEFAULT NULL,
  `status_aktif_entity_value_expression` varchar(1) DEFAULT NULL,
  `tgl_entity_value_expression_last_modified` datetime DEFAULT NULL,
  `id_user_entity_value_expression_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_entity_value_expression`
--

INSERT INTO `tbl_entity_value_expression` (`id_submit_entity_value_expression`, `id_entity_value`, `entity_value_expression`, `status_aktif_entity_value_expression`, `tgl_entity_value_expression_last_modified`, `id_user_entity_value_expression_last_modified`) VALUES
(1, 1, 'kota metropolitan', '0', '2020-02-09 11:44:22', 1),
(2, 1, ' ibu kota jakarta', '0', '2020-02-09 11:44:22', 1),
(3, 1, 'kota metropolitan', '1', '2020-02-09 11:44:42', 1),
(4, 1, ' ibu kota jakarta', '1', '2020-02-09 11:44:42', 1),
(5, 1, ' ibu kota', '1', '2020-02-09 11:44:42', 1),
(6, 1, 'jakarta', '1', '2020-02-09 11:50:12', NULL),
(7, 3, 'kota metropolitan', '1', '2020-02-09 20:36:27', 1),
(8, 3, ' ibu kota jakarta', '1', '2020-02-09 20:36:27', 1),
(9, 3, ' ibu kota', '1', '2020-02-09 20:36:27', 1),
(10, 1, 'jakarta', '1', '2020-02-09 20:40:25', NULL),
(11, 1, 'jakarta', '1', '2020-02-09 20:44:12', NULL),
(12, 1, 'jakarta', '1', '2020-02-09 20:44:43', NULL),
(13, 3, 'jakarta', '1', '2020-02-09 20:50:50', NULL),
(14, 3, 'jakarta', '1', '2020-02-09 20:52:35', NULL),
(15, 4, '', '1', '2020-02-09 21:06:02', 1),
(16, 5, '', '0', '2020-02-09 21:06:14', 1),
(17, 5, '', '1', '2020-02-09 21:08:43', 1),
(18, 6, '', '1', '2020-02-10 09:28:50', 1),
(19, 7, '', '1', '2020-02-10 09:28:51', 1),
(20, 8, '', '1', '2020-02-10 09:28:53', 1),
(21, 9, 'tahun ini', '1', '2020-02-10 09:29:13', 1),
(22, 9, ' tahun sekarang', '1', '2020-02-10 09:29:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_intent`
--
DROP TABLE IF EXISTS `tbl_intent`;
CREATE TABLE `tbl_intent` (
  `id_submit_intent` int(11) NOT NULL,
  `id_wit_ai_acc` int(11) DEFAULT NULL,
  `intent` varchar(400) DEFAULT NULL,
  `status_aktif_intent` varchar(1) DEFAULT NULL,
  `tgl_intent_last_modified` datetime DEFAULT NULL,
  `id_user_intent_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_intent`
--

INSERT INTO `tbl_intent` (`id_submit_intent`, `id_wit_ai_acc`, `intent`, `status_aktif_intent`, `tgl_intent_last_modified`, `id_user_intent_last_modified`) VALUES
(1, 1, 'getDataToko', '2', '2020-02-10 09:27:35', 1),
(2, 1, 'getJumlahPenjualan', '1', '2020-02-10 09:27:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_samples`
--
DROP TABLE IF EXISTS `tbl_samples`;
CREATE TABLE `tbl_samples` (
  `id_submit_samples` int(11) NOT NULL,
  `id_wit_ai_acc` int(11) NOT NULL,
  `samples` varchar(400) DEFAULT NULL,
  `status_aktif_samples` varchar(1) DEFAULT NULL,
  `id_intent` int(11) DEFAULT NULL,
  `tgl_samples_last_modified` datetime DEFAULT NULL,
  `id_user_samples_last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_samples`
--

INSERT INTO `tbl_samples` (`id_submit_samples`, `id_wit_ai_acc`, `samples`, `status_aktif_samples`, `id_intent`, `tgl_samples_last_modified`, `id_user_samples_last_modified`) VALUES
(1, 1, 'minta daftar toko di kota jakarta', '2', 1, '2020-02-09 20:40:25', 1),
(2, 1, 'jakarta', '2', 1, '2020-02-09 20:44:12', 1),
(3, 1, 'jakarta', '2', 1, '2020-02-09 20:44:43', 1),
(4, 1, 'jakarta', '2', 1, '2020-02-09 20:50:50', 1),
(5, 1, 'minta daftar toko di kota jakarta', '2', 1, '2020-02-09 20:52:34', 1),
(6, 1, 'abc', '2', 1, '2020-02-09 21:09:03', 1),
(7, 1, 'abc', '2', 1, '2020-02-09 21:09:24', 1),
(8, 1, 'abc', '2', 1, '2020-02-09 21:11:00', 1),
(9, 1, 'abc', '2', 1, '2020-02-09 21:11:23', 1),
(10, 1, 'jumlah penjualan tahun ini', '2', 2, '2020-02-10 09:29:37', 1),
(11, 1, 'jumlah penjualan tahun 2019', '2', 2, '2020-02-10 09:29:49', 1),
(12, 1, 'jumlah penjualan tahun 2020', '2', 2, '2020-02-10 09:30:02', 1),
(13, 1, 'jumlah penjualan tahun 2020', '1', 2, '2020-02-10 09:32:36', 1),
(14, 1, 'jumlah penjualan tahun ini', '1', 2, '2020-02-10 09:32:48', 1),
(15, 1, 'jumlah penjualan 2020', '1', 2, '2020-02-10 09:33:57', 1),
(16, 1, 'berapa sih jumlah penjualan tahun ini', '1', 2, '2020-02-10 09:34:11', 1),
(17, 1, 'berapa sih jumlah penjualan di tahun 2019', '1', 2, '2020-02-10 09:34:24', 1),
(18, 1, 'jumlah penjualan tahun 2018', '1', 2, '2020-02-10 09:35:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_samples_entity`
--
DROP TABLE IF EXISTS `tbl_samples_entity`;
CREATE TABLE `tbl_samples_entity` (
  `id_submit_samples_detail` int(11) NOT NULL,
  `id_samples` int(11) DEFAULT NULL,
  `start_index` int(11) DEFAULT NULL,
  `end_index` int(11) DEFAULT NULL,
  `id_entity_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_samples_entity`
--

INSERT INTO `tbl_samples_entity` (`id_submit_samples_detail`, `id_samples`, `start_index`, `end_index`, `id_entity_value`) VALUES
(1, 1, 26, 33, 1),
(2, 2, 0, 7, 1),
(3, 3, 0, 7, 1),
(4, 4, 0, 7, 3),
(5, 5, 26, 33, 3),
(6, 6, 0, 3, 4),
(7, 7, 0, 3, 4),
(8, 8, 0, 3, 4),
(9, 9, 0, 3, 5),
(10, 10, 17, 26, 9),
(11, 11, 23, 27, 7),
(12, 12, 23, 27, 6),
(13, 13, 23, 27, 6),
(14, 14, 17, 26, 9),
(15, 15, 17, 21, 6),
(16, 16, 28, 37, 9),
(17, 17, 37, 41, 7),
(18, 18, 23, 27, 8);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `tbl_wit_ai_acc`
--
DROP TABLE IF EXISTS `tbl_wit_ai_acc`;
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
(1, 'joshuanatan.jn@gmail.com', 'Joshua Natan', '3262201890476278', 'MAKS_FINAL', 'FODRKOARRDH72OT3QSWWKYQN3IU7CEO5', '1', '2020-02-09 11:43:09', 1);

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure for view `detail_entity`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_entity`
--
ALTER TABLE `tbl_entity`
  ADD PRIMARY KEY (`id_submit_entity`);

--
-- Indexes for table `tbl_entity_value`
--
ALTER TABLE `tbl_entity_value`
  ADD PRIMARY KEY (`id_submit_entity_value`);

--
-- Indexes for table `tbl_entity_value_expression`
--
ALTER TABLE `tbl_entity_value_expression`
  ADD PRIMARY KEY (`id_submit_entity_value_expression`);

--
-- Indexes for table `tbl_intent`
--
ALTER TABLE `tbl_intent`
  ADD PRIMARY KEY (`id_submit_intent`);

--
-- Indexes for table `tbl_samples`
--
ALTER TABLE `tbl_samples`
  ADD PRIMARY KEY (`id_submit_samples`);

--
-- Indexes for table `tbl_samples_entity`
--
ALTER TABLE `tbl_samples_entity`
  ADD PRIMARY KEY (`id_submit_samples_detail`);

--
-- Indexes for table `tbl_wit_ai_acc`
--
ALTER TABLE `tbl_wit_ai_acc`
  ADD PRIMARY KEY (`id_submit_wit_ai_acc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_entity`
--
ALTER TABLE `tbl_entity`
  MODIFY `id_submit_entity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_entity_value`
--
ALTER TABLE `tbl_entity_value`
  MODIFY `id_submit_entity_value` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_entity_value_expression`
--
ALTER TABLE `tbl_entity_value_expression`
  MODIFY `id_submit_entity_value_expression` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_intent`
--
ALTER TABLE `tbl_intent`
  MODIFY `id_submit_intent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_samples`
--
ALTER TABLE `tbl_samples`
  MODIFY `id_submit_samples` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_samples_entity`
--
ALTER TABLE `tbl_samples_entity`
  MODIFY `id_submit_samples_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_wit_ai_acc`
--
ALTER TABLE `tbl_wit_ai_acc`
  MODIFY `id_submit_wit_ai_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


CREATE VIEW `detail_entity`  AS  select `tbl_entity`.`id_submit_entity` AS `id_submit_entity`,`tbl_entity`.`entity_wit_id` AS `entity_wit_id`,`tbl_entity`.`entity_name` AS `entity_name`,`tbl_entity`.`entity_desc` AS `entity_desc`,`tbl_entity`.`status_aktif_entity` AS `status_aktif_entity`,`tbl_entity`.`tgl_entity_last_modified` AS `tgl_entity_last_modified`,`tbl_entity`.`id_user_entity_last_modified` AS `id_user_entity_last_modified`,`tbl_entity_value`.`id_entity` AS `id_entity`,`tbl_entity_value`.`id_submit_entity_value` AS `id_submit_entity_value`,`tbl_entity_value`.`status_aktif_entity_value` AS `status_aktif_entity_value`,`tbl_entity_value`.`entity_value` AS `entity_value`,`tbl_entity_value`.`tgl_entity_value_last_modified` AS `tgl_entity_value_last_modified`,`tbl_entity_value`.`id_user_entity_value_last_modified` AS `id_user_entity_value_last_modified`,`tbl_entity_value_expression`.`id_submit_entity_value_expression` AS `id_submit_entity_value_expression`,`tbl_entity_value_expression`.`id_entity_value` AS `id_entity_value`,`tbl_entity_value_expression`.`entity_value_expression` AS `entity_value_expression`,`tbl_entity_value_expression`.`status_aktif_entity_value_expression` AS `status_aktif_entity_value_expression`,`tbl_entity_value_expression`.`tgl_entity_value_expression_last_modified` AS `tgl_entity_value_expression_last_modified`,`tbl_entity_value_expression`.`id_user_entity_value_expression_last_modified` AS `id_user_entity_value_expression_last_modified` from ((`tbl_entity_value_expression` join `tbl_entity_value` on(`tbl_entity_value`.`id_submit_entity_value` = `tbl_entity_value_expression`.`id_entity_value`)) join `tbl_entity` on(`tbl_entity`.`id_submit_entity` = `tbl_entity_value`.`id_entity`)) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_samples`
--


CREATE VIEW `detail_samples`  AS  select `tbl_samples`.`id_submit_samples` AS `id_submit_samples`,`tbl_samples`.`samples` AS `samples`,`tbl_samples`.`status_aktif_samples` AS `status_aktif_samples`,`tbl_samples`.`id_intent` AS `id_intent`,`tbl_samples`.`tgl_samples_last_modified` AS `tgl_samples_last_modified`,`tbl_samples`.`id_user_samples_last_modified` AS `id_user_samples_last_modified`,`tbl_samples`.`id_wit_ai_acc` AS `id_wit_ai_acc`,`tbl_samples_entity`.`id_submit_samples_detail` AS `id_submit_samples_detail`,`tbl_samples_entity`.`id_samples` AS `id_samples`,`tbl_samples_entity`.`start_index` AS `start_index`,`tbl_samples_entity`.`end_index` AS `end_index`,`tbl_samples_entity`.`id_entity_value` AS `id_entity_value`,`tbl_entity_value`.`id_submit_entity_value` AS `id_submit_entity_value`,`tbl_entity_value`.`id_entity` AS `id_entity`,`tbl_entity_value`.`entity_value` AS `entity_value`,`tbl_entity_value`.`status_aktif_entity_value` AS `status_aktif_entity_value`,`tbl_entity_value`.`tgl_entity_value_last_modified` AS `tgl_entity_value_last_modified`,`tbl_entity_value`.`id_user_entity_value_last_modified` AS `id_user_entity_value_last_modified`,`tbl_entity`.`id_submit_entity` AS `id_submit_entity`,`tbl_entity`.`entity_wit_id` AS `entity_wit_id`,`tbl_entity`.`entity_name` AS `entity_name`,`tbl_entity`.`entity_desc` AS `entity_desc`,`tbl_entity`.`status_aktif_entity` AS `status_aktif_entity`,`tbl_entity`.`tgl_entity_last_modified` AS `tgl_entity_last_modified`,`tbl_entity`.`id_user_entity_last_modified` AS `id_user_entity_last_modified`,`tbl_intent`.`id_submit_intent` AS `id_submit_intent`,`tbl_intent`.`intent` AS `intent` from ((((`tbl_samples` join `tbl_intent` on(`tbl_intent`.`id_submit_intent` = `tbl_samples`.`id_intent`)) left join `tbl_samples_entity` on(`tbl_samples_entity`.`id_samples` = `tbl_samples`.`id_submit_samples`)) left join `tbl_entity_value` on(`tbl_entity_value`.`id_submit_entity_value` = `tbl_samples_entity`.`id_entity_value`)) left join `tbl_entity` on(`tbl_entity`.`id_submit_entity` = `tbl_entity_value`.`id_entity`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_samples_list`
--


CREATE VIEW `v_samples_list`  AS  select `tbl_samples`.`id_submit_samples` AS `id_submit_samples`,`tbl_samples`.`id_wit_ai_acc` AS `id_wit_ai_acc`,`tbl_samples`.`samples` AS `samples`,`tbl_samples`.`status_aktif_samples` AS `status_aktif_samples`,`tbl_samples`.`id_intent` AS `id_intent`,`tbl_samples`.`tgl_samples_last_modified` AS `tgl_samples_last_modified`,`tbl_samples`.`id_user_samples_last_modified` AS `id_user_samples_last_modified`,`tbl_intent`.`id_submit_intent` AS `id_submit_intent`,`tbl_intent`.`intent` AS `intent`,`tbl_intent`.`status_aktif_intent` AS `status_aktif_intent`,`tbl_intent`.`id_user_intent_last_modified` AS `id_user_intent_last_modified` from (`tbl_samples` join `tbl_intent` on(`tbl_intent`.`id_submit_intent` = `tbl_samples`.`id_intent`)) ;