-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 04:47 PM
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
-- Database: `desa`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `getPenduduk` ()   BEGIN
	SELECT tb_penduduk.nik, tb_penduduk.nama_lengkap FROM tb_penduduk;
END$$

CREATE DEFINER=`` PROCEDURE `getPendudukByNIK` (IN `InputNIK` VARCHAR(100))   BEGIN
	SELECT tb_penduduk.nik, tb_penduduk.nama_lengkap FROM tb_penduduk WHERE tb_penduduk.nik = InputNIK;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dusun`
--

CREATE TABLE `tb_dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `nama_kadus` varchar(35) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dusun`
--

INSERT INTO `tb_dusun` (`id_dusun`, `nama_dusun`, `nama_kadus`, `foto`) VALUES
(1, 'Dusun I Sidomulyo A ', 'CHAIRUL ANWAR', 'kadus15.png'),
(2, 'Dusun II Sidomulyo A', 'SUMANTO', 'kadus2.png'),
(3, 'Dusun III Sidomulyo C', 'TERKELIN SITEPU', 'kadus3.png'),
(4, 'Dusun IV Sememe Batu', 'M. ALIGES GINTING', 'kadus4.png'),
(5, 'Dusun V Sidomulyo B', 'PRIANTO', 'kadus5.png'),
(6, 'Dusun VI Sidomulyo B', 'GUSTI JUANDA', 'kadus6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id`, `nama`, `jenis`) VALUES
(1, 'Pelajar/Mahasiswa', 'Pelajar/Mahasiswa'),
(2, 'Guru', 'Tenaga Pengajar'),
(3, 'PNS', 'Aparatur/Pejabat Negara'),
(5, 'Buruh', 'Wiraswasta'),
(6, 'Belum Bekerja', 'Belum/Tidak Bekerja'),
(7, 'Mengurus Rumah Tangga', 'Mengurus Rumah Tangga'),
(8, 'Kepolisian RI', 'Aparatur/Pejabat Negara'),
(9, 'TNI', 'Aparatur/Pejabat Negara'),
(10, 'Dokter', 'Tenaga Kesehatan'),
(11, 'Dosen', 'Tenaga Pengajar'),
(12, 'Perawat', 'Tenaga Kesehatan'),
(13, 'Petani', 'Pertanian/Peternakan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `pendidikan_akhir` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `gol_darah` varchar(4) NOT NULL,
  `status_perkawinan` varchar(30) NOT NULL,
  `status_dalam_keluarga` varchar(66) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `status_hidup` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id`, `nik`, `no_kk`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan_akhir`, `pekerjaan`, `gol_darah`, `status_perkawinan`, `status_dalam_keluarga`, `kewarganegaraan`, `status_hidup`, `nama_ayah`, `nama_ibu`, `dusun`, `alamat`, `foto`, `isDeleted`) VALUES
(1, '1207072712010001', '1207070104110013', 'CHRISTIAN ROI TUA SINAGA', 'Laki-laki', 'Medan', '2001-12-27', 'Katolik', 'SMA/SMK/Sederajat', 'Pelajar/Mahasiswa', 'A', 'Belum Kawin', 'Anak', 'WNI (Warga Negara Indonesia)', 'Hidup', 'OSTEL SINAGA', 'DUMARIA AFRIDA MANIK', 'Dusun IV Sememe Batu', 'Dsn IV Sememe Batu Perum Taman Deli Kencana Blok F No.51', 'Pas_foto1.jpg', 0),
(3, '1207073009880199', '1207079102883918', 'MURSID', 'Laki-laki', 'Banyumas', '1980-09-30', 'Islam', 'D3', 'PNS', 'AB', 'Kawin', 'Kepala Keluarga', 'WNI (Warga Negara Indonesia)', 'Hidup', 'SUJIMAN', 'MULYANI', 'Dusun I Sidomulyo A ', 'Jln. Utama, No.19 Delitua', 'kades1.jpg', 0),
(4, '1207070908999990', '1207079102883918', 'SURYANA', 'Perempuan', 'Delitua', '1999-09-08', 'Islam', 'D3', 'PNS', 'AB', 'Kawin', 'Istri', 'WNI (Warga Negara Indonesia)', 'Hidup', 'SUKARNI', 'SAIDAH', 'Dusun I Sidomulyo A ', 'Pasar 1, No.30, Delitua', 'kades4.jpg', 0),
(5, '1207070505700970', '1207070104110013', 'O SINAGA', 'Laki-laki', 'Tapanuli Utara', '1970-05-05', 'Katolik', 'SMA/SMK/Sederajat', 'TNI', 'O', 'Kawin', 'Kepala Keluarga', 'WNI (Warga Negara Indonesia)', 'Hidup', 'P SINAGA', 'R SAGALA', 'Dusun IV Sememe Batu', 'Dsn IV Sememe Batu Perum Taman Deli Kencana Blok F No.51', 'Foto_Bintal_4x6_2.jpg', 0),
(6, '1207076004740003', '1207070104110013', 'DUMARIA AFRIDA MANIK', 'Perempuan', 'P. Siantar', '1974-04-20', 'Katolik', 'D3', 'Buruh', 'AB', 'Kawin', 'Istri', 'WNI (Warga Negara Indonesia)', 'Hidup', 'H MANIK', 'P MANIHURUK', 'Dusun IV Sememe Batu', 'Dsn IV Sememe Batu Perum Taman Deli Kencana Blok F No.51', 'pexels-tuấn-kiệt-jr-1382731.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id`, `nama`, `nohp`, `jenis`, `tgl_kirim`, `isi`) VALUES
(12, 'Roi', '0895712280106', 'Permohonan Surat Pembuatan KTP', '2022-12-18', 'Saya ingin mencetak surat permohonan dengan nik 1207072712010001,'),
(13, 'Rasyid', '081345787654', 'Permohonan Surat Pindah', '2023-03-03', 'Buk saya mou pindah ke Jl, S.parman stabat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(56) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `role`, `nama`) VALUES
(1, 'admin', '123', 1, 'Christian Ro Tua Sinaga'),
(2, 'roi', '123', 2, 'Roi Tua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dusun`
--
ALTER TABLE `tb_dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dusun`
--
ALTER TABLE `tb_dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
