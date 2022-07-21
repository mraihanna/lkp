-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 02:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kegiatan`
--

CREATE TABLE `data_kegiatan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verifikator_id` int(1) NOT NULL,
  `satuan_kerja_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `tanggal_dimulai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jumlah_satuan` int(11) NOT NULL,
  `tempat_kegiatan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `dok_pendukung` varchar(255) NOT NULL,
  `is_verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_satuan_kerja`
--

CREATE TABLE `data_satuan_kerja` (
  `id` int(11) NOT NULL,
  `satuan_kerja` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_satuan_kerja`
--

INSERT INTO `data_satuan_kerja` (`id`, `satuan_kerja`) VALUES
(1, 'Berkas'),
(2, 'Buah'),
(3, 'Buku'),
(4, 'Kelompok'),
(5, 'Orang'),
(6, 'Paket'),
(7, 'Set'),
(8, 'Surat'),
(9, 'Catatan'),
(10, 'Box');

-- --------------------------------------------------------

--
-- Table structure for table `data_target`
--

CREATE TABLE `data_target` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail_kegiatan` varchar(128) NOT NULL,
  `dateline` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tlp` varchar(30) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `perusahaan`, `logo`, `alamat`, `tlp`, `owner_id`) VALUES
(1, 'PT Siamang Tunggal', '2019-04-22-ts3_thumbs-4ab.png', 'Jl. Angin Ribut No. 9', '089504824037', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `unit_kerja_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `atasan_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `email`, `image`, `password`, `role_id`, `unit_kerja_id`, `jabatan_id`, `atasan_id`, `is_active`, `date_created`) VALUES
(1, 1193020, 'Muhammad Raihan Nur Azmii', '1193020@std.poltekpos.ac.id', 'icon2.png', '$2y$10$DT8ySYoF6/RbGxS6C1rVVuDgFwUi2u7PVneeR6rnJVOf5AqCIk.WO', 1, 0, 0, 0, 1, 1642817134),
(2, 1193030, 'Dadang Nur Zaman', 'dadang@gmail.com', '733611.jpg', '$2y$10$Ky9Ufqpd4QXMNYoTnnGk4eptBMee0gZjWG6HIfj4.iyTvPoaqUHMq', 2, 1, 1, 0, 1, 1642817134),
(3, 1193040, 'Didik Hidayat Saputra', 'didik@gmail.com', 'default.png', '$2y$10$Ky9Ufqpd4QXMNYoTnnGk4eptBMee0gZjWG6HIfj4.iyTvPoaqUHMq', 3, 1, 2, 2, 1, 1642817134),
(4, 1192020, 'Iphone Andoroid Linux', 'mraihanna.18@gmail.com', 'default.png', '$2y$10$cz2myJaZ1hL5kXSoa0D7JOSNde81E.RNlmrtDmBaWwXdQ1n8rY5CC', 3, 1, 2, 2, 1, 1658110985),
(5, 119310239, 'dadanggggg', 'dadangasd@gmail.com', 'default.png', '$2y$10$/996tzTz448xX6xGqFKktOGYLkjvcMDUpk3befD07Fn2ixAZlOohG', 2, 1, 1, 0, 1, 1658111784),
(6, 2193020, 'Azumi Tamvan', 'azumi@gmail.com', 'default.png', '$2y$10$WNwpThOFcxm0cn9Mwelh0.ONA2KxzEoKFATEkiDoLXRUtdHiFPRh6', 2, 3, 6, 0, 1, 1658111871),
(7, 123123, 'satu dua tiga', 'a@gmail.com', 'default.png', '$2y$10$KPTv/QCFIOc.BvdCkYOf9eTzaa8OEB8jn40ktVhpHVpukZl.xqxiO', 3, 3, 7, 6, 1, 1658112028),
(8, 123, 'Azmii', 'mraihanna1278@gmail.com', 'default.png', '$2y$10$rv/8ASY7l.JhA0oa05.h3.OmRPBYiZ7KqHSim3WxOABjDjlFIUpn6', 3, 1, 2, 5, 1, 1658132406);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 3, 2),
(7, 1, 4),
(8, 1, 9),
(9, 3, 9),
(10, 2, 9),
(11, 1, 10),
(15, 2, 2),
(17, 1, 17),
(18, 1, 19),
(19, 1, 20),
(20, 2, 21),
(21, 2, 3),
(22, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kinerja` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_jabatan`
--

CREATE TABLE `user_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_jabatan`
--

INSERT INTO `user_jabatan` (`id`, `jabatan`) VALUES
(1, 'Supervisor Operator'),
(2, 'Operator'),
(6, 'Supervisor Teknisi'),
(7, 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`, `urutan`, `is_active`) VALUES
(1, 'Report', 'icon-paper', 8, 1),
(2, 'User', 'icon-head', 14, 1),
(3, 'Subordinate', 'mdi mdi-newspaper', 10, 1),
(4, 'Menu', 'mdi mdi-menu', 3, 1),
(9, 'Dashboard', 'icon-grid', 1, 1),
(10, 'Role', 'mdi mdi-account-convert', 5, 1),
(17, 'Employee', 'mdi mdi-account-card-details', 11, 1),
(19, 'Activity', 'mdi mdi-database', 12, 1),
(20, 'Company', 'mdi mdi-information', 13, 1),
(21, 'Target', 'mdi mdi-playlist-plus', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Atasan'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `urutan` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `urutan`, `is_active`) VALUES
(1, 1, 'Daily Report', 'report', 1, 1),
(2, 1, 'History Report', 'report/history', 2, 1),
(4, 2, 'My Profile', 'user', 1, 1),
(5, 2, 'Edit Profile', 'user/edit', 2, 1),
(6, 2, 'Change Password', 'user/changepassword', 3, 1),
(7, 3, 'Subordinate Report', 'errors/maintenance', 1, 1),
(8, 4, 'Menu ', 'menu', 1, 1),
(9, 4, 'Sub Menu', 'menu/submenu', 2, 1),
(10, 9, 'Home', 'dashboard', 1, 1),
(12, 10, 'Access Role', 'role', 1, 1),
(13, 17, 'Register Employee', 'employee/register', 3, 1),
(23, 17, 'Data Employee', 'employee/dataemployee', 4, 1),
(24, 17, 'Data Jabatan', 'employee/jabatan', 2, 1),
(25, 17, 'Unit Kerja', 'employee/unitkerja', 1, 1),
(26, 19, 'Satuan Kerja', 'activity/satuanKerja', 1, 1),
(27, 20, 'Settings', 'company/settings', 1, 1),
(28, 21, 'Job List', 'target/list', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_unit_kerja`
--

CREATE TABLE `user_unit_kerja` (
  `id` int(11) NOT NULL,
  `unit_kerja` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_unit_kerja`
--

INSERT INTO `user_unit_kerja` (`id`, `unit_kerja`) VALUES
(1, 'Operator'),
(3, 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_satuan_kerja`
--
ALTER TABLE `data_satuan_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_target`
--
ALTER TABLE `data_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_unit_kerja`
--
ALTER TABLE `user_unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kegiatan`
--
ALTER TABLE `data_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_satuan_kerja`
--
ALTER TABLE `data_satuan_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_target`
--
ALTER TABLE `data_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_unit_kerja`
--
ALTER TABLE `user_unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
