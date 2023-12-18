-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 01:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expertsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `device_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_perangkat` varchar(56) NOT NULL,
  `jenis` varchar(56) NOT NULL,
  `processor` varchar(45) NOT NULL,
  `jenis_ram` varchar(45) NOT NULL,
  `jenis_penyimpanan` varchar(30) NOT NULL,
  `sistem_operasi` varchar(30) NOT NULL,
  `status_garansi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`device_id`, `user_id`, `nama_perangkat`, `jenis`, `processor`, `jenis_ram`, `jenis_penyimpanan`, `sistem_operasi`, `status_garansi`) VALUES
(1, 1, 'Lenovo Ideapad Gaming 3i', 'Laptop', 'Intel Core i5', 'DDR4', 'SSD', 'Windows 11', 'Ya'),
(3, 1, 'Lenovo 310s', 'Laptop', 'Intel Core i5', 'DDR4', 'HDD', 'Windows 10', 'Tidak'),
(4, 8, 'ASUS TUF Gaming', 'Laptop', 'Intel Core i5', 'DDR4', 'SSD', 'Windows 11', 'Ya'),
(5, 9, 'HP Pavilion 470', 'Laptop', 'AMD Ryzen ', 'DDR4', 'SSD', 'Windows 11', 'Tidak'),
(6, 10, 'Lenovo Ideapad Slim 3i', 'Laptop', 'Intel Core i5', 'DDR4', 'HDD', 'Windows 10', 'Tidak'),
(7, 10, 'PC Utama', 'Komputer', 'AMD Ryzen 3400', 'DDR4', 'SSD', 'Windows 11', 'Ya'),
(8, 11, 'PC Kantor 1', 'Komputer', 'Intel Core i5', 'DDR4', 'HDD', 'Windows 10', 'Tidak'),
(9, 11, 'Acer Aspire One', 'Laptop', 'Intel Dual Core', 'DDR3', 'HDD', 'Windows 10', 'Ya'),
(10, 12, 'Lenovo Thinkpad X1', 'Laptop', 'Intel Core i7 12000U', 'DDR4', 'SSD', 'Windows 11', 'Ya'),
(11, 12, 'PC Lab No.207', 'Komputer', 'Intel Core i5', 'DDR4', 'HDD', 'Windows 10', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `diagnosa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`diagnosa_id`, `user_id`, `device_id`, `tgl_diagnosa`) VALUES
(1, 1, 3, '2023-12-01'),
(2, 1, 1, '2023-12-01'),
(3, 8, 4, '2023-12-02'),
(4, 9, 5, '2023-12-02'),
(5, 11, 8, '2023-12-05'),
(6, 11, 9, '2023-12-05'),
(7, 12, 10, '2023-12-05'),
(8, 12, 11, '2023-12-05'),
(9, 12, 11, '2023-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `symp_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`symp_id`, `keterangan`, `pertanyaan`) VALUES
(1, 'Stuck saat Power On atau Bootloop', 'Apakah Laptop/Komputer Stuck saat Power On atau Bootloop ?'),
(2, 'Lampu Indikator Charger Mati/Tidak Menyala', 'Apakah Lampu Indikator Charger tidak menyala ?'),
(3, 'Aplikasi/Software Sering Crash/Berhenti', 'Apakah Aplikasi/Software Sering Crash/Berhenti ?'),
(4, 'Bunyi Beep Panjang/Pendek ketika perangkat dihidupkan', 'Apakah terdapat Bunyi Beep Panjang/Pendek ketika perangkat dihidupkan ?'),
(5, 'Beberapa tombol keyboard tidak berfungsi', 'Apakah Beberapa tombol keyboard tidak berfungsi?'),
(6, 'Pointer tidak dapat digerakkan', 'Apakah Pointer tidak dapat digerakkan ?'),
(7, 'Port USB tidak dapat membaca file', 'Apakah Port USB tidak dapat membaca file/input ?'),
(8, 'Layar mati tapi perangkat hidup/power on', 'Apakah Layar mati saat perangkat hidup/power on ?'),
(9, 'Perangkat mengalami Freeze System', 'Apakah Perangkat mengalami Freeze System ?'),
(10, 'File corrupt/rusak saat dibuka', 'Apakah File corrupt/rusak saat dibuka ?'),
(11, 'Proses tunggu Aplikasi sangat lama', 'Apakah Proses tunggu/Loading Aplikasi sangat lama ?'),
(12, 'Peragnkat tiba tiba restart dengan sendirinya', 'Apakah Peragnkat tiba tiba restart dengan sendirinya ?'),
(13, 'Perangkat sering mengalami Blue Screen', 'Apakah Perangkat sering mengalami Blue Screen?'),
(14, 'Persentase Baterai tidak bertambah ketika dicharge', 'Apakah Persentase Baterai tidak bertambah ketika dicharge ?'),
(15, 'File terhapus/hilang/hidden dengan sendirinya', 'Apakah File terhapus/hilang/hidden dengan sendirinya ?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `diagnosa_id` int(11) NOT NULL,
  `symp_id` int(11) NOT NULL,
  `jawaban` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `diagnosa_id`, `symp_id`, `jawaban`) VALUES
(1, 1, 1, '0'),
(2, 1, 2, '1'),
(3, 1, 3, '0'),
(4, 1, 4, '0'),
(5, 1, 5, '0'),
(6, 1, 6, '0'),
(7, 1, 7, '1'),
(8, 1, 8, '0'),
(9, 1, 9, '0'),
(10, 1, 10, '0'),
(11, 1, 11, '0'),
(12, 1, 12, '0'),
(13, 1, 13, '0'),
(14, 1, 14, '1'),
(15, 1, 15, '0'),
(16, 2, 1, '0'),
(17, 2, 2, '0'),
(18, 2, 3, '1'),
(19, 2, 4, '0'),
(20, 2, 5, '1'),
(21, 2, 6, '1'),
(22, 2, 7, '1'),
(23, 2, 8, '0'),
(24, 2, 9, '1'),
(25, 2, 10, '1'),
(26, 2, 11, '1'),
(27, 2, 12, '1'),
(28, 2, 13, '1'),
(29, 2, 14, '0'),
(30, 2, 15, '1'),
(31, 3, 1, '0'),
(32, 3, 2, '0'),
(33, 3, 3, '1'),
(34, 3, 4, '0'),
(35, 3, 5, '0'),
(36, 3, 6, '0'),
(37, 3, 7, '1'),
(38, 3, 8, '0'),
(39, 3, 9, '1'),
(40, 3, 10, '1'),
(41, 3, 11, '1'),
(42, 3, 12, '0'),
(43, 3, 13, '0'),
(44, 3, 14, '0'),
(45, 3, 15, '1'),
(46, 4, 1, '0'),
(47, 4, 2, '1'),
(48, 4, 3, '0'),
(49, 4, 4, '1'),
(50, 4, 5, '0'),
(51, 4, 6, '0'),
(52, 4, 7, '0'),
(53, 4, 8, '0'),
(54, 4, 9, '1'),
(55, 4, 10, '0'),
(56, 4, 11, '0'),
(57, 4, 12, '1'),
(58, 4, 13, '0'),
(59, 4, 14, '1'),
(60, 4, 15, '0'),
(61, 5, 1, '0'),
(62, 5, 2, '0'),
(63, 5, 3, '1'),
(64, 5, 4, '0'),
(65, 5, 5, '0'),
(66, 5, 6, '0'),
(67, 5, 7, '1'),
(68, 5, 8, '0'),
(69, 5, 9, '1'),
(70, 5, 10, '1'),
(71, 5, 11, '1'),
(72, 5, 12, '1'),
(73, 5, 13, '1'),
(74, 5, 14, '0'),
(75, 5, 15, '1'),
(76, 6, 1, '0'),
(77, 6, 2, '1'),
(78, 6, 3, '0'),
(79, 6, 4, '1'),
(80, 6, 5, '0'),
(81, 6, 6, '0'),
(82, 6, 7, '0'),
(83, 6, 8, '0'),
(84, 6, 9, '0'),
(85, 6, 10, '0'),
(86, 6, 11, '0'),
(87, 6, 12, '0'),
(88, 6, 13, '0'),
(89, 6, 14, '1'),
(90, 6, 15, '0'),
(91, 7, 1, '1'),
(92, 7, 2, '1'),
(93, 7, 3, '0'),
(94, 7, 4, '0'),
(95, 7, 5, '0'),
(96, 7, 6, '0'),
(97, 7, 7, '0'),
(98, 7, 8, '0'),
(99, 7, 9, '0'),
(100, 7, 10, '0'),
(101, 7, 11, '0'),
(102, 7, 12, '1'),
(103, 7, 13, '0'),
(104, 7, 14, '1'),
(105, 7, 15, '0'),
(106, 8, 1, '1'),
(107, 8, 2, '0'),
(108, 8, 3, '1'),
(109, 8, 4, '0'),
(110, 8, 5, '1'),
(111, 8, 6, '1'),
(112, 8, 7, '1'),
(113, 8, 8, '0'),
(114, 8, 9, '1'),
(115, 8, 10, '0'),
(116, 8, 11, '1'),
(117, 8, 12, '1'),
(118, 8, 13, '1'),
(119, 8, 14, '0'),
(120, 8, 15, '0'),
(121, 9, 1, '0'),
(122, 9, 2, '0'),
(123, 9, 3, '1'),
(124, 9, 4, '0'),
(125, 9, 5, '0'),
(126, 9, 6, '0'),
(127, 9, 7, '1'),
(128, 9, 8, '0'),
(129, 9, 9, '1'),
(130, 9, 10, '1'),
(131, 9, 11, '1'),
(132, 9, 12, '0'),
(133, 9, 13, '1'),
(134, 9, 14, '0'),
(135, 9, 15, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerusakan`
--

CREATE TABLE `tb_kerusakan` (
  `fault_id` int(11) NOT NULL,
  `nama_kerusakan` varchar(56) NOT NULL,
  `jenis` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kerusakan`
--

INSERT INTO `tb_kerusakan` (`fault_id`, `nama_kerusakan`, `jenis`) VALUES
(1, 'Malware atau Virus', 'Software'),
(2, 'Kerusakan Baterai/Power', 'Hardware'),
(3, 'Kerusakan Peripheral dan Port', 'Hardware'),
(4, 'Kerusakan Sistem Operasi', 'Software'),
(5, 'Kerusakan Harddisk/SSD', 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `rules_id` int(11) NOT NULL,
  `fault_id` int(11) DEFAULT NULL,
  `symp_id` int(11) DEFAULT NULL,
  `bobot_persentase` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`rules_id`, `fault_id`, `symp_id`, `bobot_persentase`) VALUES
(1, 1, 1, 0.02),
(2, 2, 1, 0.05),
(3, 3, 1, 0.1),
(4, 4, 1, 0.15),
(5, 5, 1, 0.15),
(6, 1, 2, 0.05),
(7, 2, 2, 0.25),
(8, 3, 2, 0.03),
(9, 4, 2, 0.05),
(10, 5, 2, 0.05),
(11, 1, 3, 0.25),
(12, 2, 3, 0.08),
(13, 3, 3, 0.05),
(14, 4, 3, 0.25),
(15, 5, 3, 0.11),
(16, 1, 4, 0.05),
(17, 2, 4, 0.1),
(18, 3, 4, 0.2),
(19, 4, 4, 0.08),
(20, 5, 4, 0.03),
(21, 1, 5, 0.05),
(22, 2, 5, 0.02),
(23, 3, 5, 0.4),
(24, 4, 5, 0.1),
(25, 5, 5, 0.02),
(26, 1, 6, 0.02),
(27, 2, 6, 0.05),
(28, 3, 6, 0.35),
(29, 4, 6, 0.12),
(30, 5, 6, 0.02),
(31, 1, 7, 0.12),
(32, 2, 7, 0.04),
(33, 3, 7, 0.12),
(34, 4, 7, 0.05),
(35, 5, 7, 0.03),
(36, 1, 8, 0.03),
(37, 2, 8, 0.06),
(38, 3, 8, 0.01),
(39, 4, 8, 0.01),
(40, 5, 8, 0.03),
(41, 1, 9, 0.18),
(42, 2, 9, 0.07),
(43, 3, 9, 0.03),
(44, 4, 9, 0.1),
(45, 5, 9, 0.07),
(46, 1, 10, 0.13),
(47, 2, 10, 0.03),
(48, 3, 10, 0.01),
(49, 4, 10, 0.15),
(50, 5, 10, 0.11),
(51, 1, 11, 0.22),
(52, 2, 11, 0.02),
(53, 3, 11, 0.01),
(54, 4, 11, 0.05),
(55, 5, 11, 0.02),
(56, 1, 12, 0.02),
(57, 2, 12, 0.03),
(58, 3, 12, 0.01),
(59, 4, 12, 0.05),
(60, 5, 12, 0.02),
(61, 1, 13, 0.17),
(62, 2, 13, 0.06),
(63, 3, 13, 0.02),
(64, 4, 13, 0.1),
(65, 5, 13, 0.1),
(66, 1, 14, 0.01),
(67, 2, 14, 0.45),
(68, 3, 14, 0.01),
(69, 4, 14, 0.01),
(70, 5, 14, 0.02),
(71, 1, 15, 0.11),
(72, 2, 15, 0.04),
(73, 3, 15, 0.06),
(74, 4, 15, 0.05),
(75, 5, 15, 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(56) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(1, 'Roi', 'roi', '123', 2),
(5, 'Admin Sistem', 'admin', '12345', 1),
(7, 'Roi Tua', 'roi2', '123', 2),
(8, 'Christian Roi', 'christian123', '12345', 2),
(9, 'Christian Roi Tua Sinaga', 'akunroi', '12345', 2),
(10, 'Mister X', 'user123', '12345', 2),
(11, 'Diego', 'diego123', '12345', 2),
(12, 'John Doe', 'userjohn', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`diagnosa_id`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`symp_id`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  ADD PRIMARY KEY (`fault_id`);

--
-- Indexes for table `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD PRIMARY KEY (`rules_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  MODIFY `diagnosa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `symp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  MODIFY `fault_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `rules_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD CONSTRAINT `tb_device_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
