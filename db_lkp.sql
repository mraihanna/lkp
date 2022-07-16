-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 11:01 PM
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
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 1193020, 'Muhammad Raihan Nur Azmii', '1193020@std.poltekpos.ac.id', 'icon2.png', '$2y$10$hQyDCTGy5MNmDarYIgkMJ.tr9OufIYPtKoDiLhN1A8xmTkKDW2dYG', 1, 1, 1642817134),
(2, 1193030, 'Dadang Nur Zaman', 'dadang@gmail.com', '733611.jpg', '$2y$10$Ky9Ufqpd4QXMNYoTnnGk4eptBMee0gZjWG6HIfj4.iyTvPoaqUHMq', 4, 1, 1642817134),
(3, 1193040, 'Didik Hidayat Saputra', 'didik@gmail.com', 'default.png', '$2y$10$Ky9Ufqpd4QXMNYoTnnGk4eptBMee0gZjWG6HIfj4.iyTvPoaqUHMq', 3, 1, 1642817134);

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
(2, 4, 1),
(3, 4, 2),
(4, 3, 1),
(6, 3, 3),
(7, 1, 4),
(8, 1, 9),
(9, 4, 9),
(10, 3, 9),
(11, 1, 10),
(14, 4, 3),
(15, 3, 2),
(17, 1, 17);

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
(2, 'Operator');

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
(2, 'User', 'icon-head', 10, 1),
(3, 'Subordinate', 'mdi mdi-newspaper', 4, 1),
(4, 'Menu', 'mdi mdi-menu', 3, 1),
(9, 'Dashboard', 'icon-grid', 1, 1),
(10, 'Role', 'mdi mdi-account-convert', 5, 1),
(17, 'Employee', 'mdi mdi-account-card-details', 11, 1);

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
(3, 'Atasan'),
(4, 'Pegawai');

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
(2, 1, 'History Report', 'errors/maintenance', 2, 1),
(4, 2, 'My Profile', 'user', 1, 1),
(5, 2, 'Edit Profile', 'user/edit', 2, 1),
(6, 2, 'Change Password', 'user/changepassword', 3, 1),
(7, 3, 'Subordinate Report', 'errors/maintenance', 1, 1),
(8, 4, 'Menu ', 'menu', 1, 1),
(9, 4, 'Sub Menu', 'menu/submenu', 2, 1),
(10, 9, 'Home', 'dashboard', 1, 1),
(12, 10, 'Access Role', 'role', 1, 1),
(13, 17, 'Register Employee', 'role/register', 3, 1),
(23, 17, 'Data Employee', 'errors/maintenance', 4, 1),
(24, 17, 'Data Jabatan', 'employee/jabatan', 2, 1),
(25, 17, 'Unit Kerja', 'employee/unitkerja', 1, 1);

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
(2, 'Teknisi');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_unit_kerja`
--
ALTER TABLE `user_unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
