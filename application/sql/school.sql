-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2020 at 05:14 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `nama_ekstrakurikuler` varchar(255) NOT NULL,
  `kode_ekstrakurikuler` varchar(120) NOT NULL,
  `pembimbing` varchar(255) NOT NULL,
  `jadwal` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_ekstrakurikuler`, `kode_ekstrakurikuler`, `pembimbing`, `jadwal`) VALUES
(2, 'Ikatan Para Perempuan Nahdlatul Ulama', 'IPPNU', 'Bapak Abdul Majid', 'Setiap Senin Pukul 08.00 - 10.00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'WKS4', 'WKS4'),
(4, 'WKS3', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `url`, `icon`) VALUES
(1, 'Home', '', '<i class=\"material-icons nav__icon\">home</i>'),
(2, 'Profil Kesiswaan', 'kesiswaan', '<i class=\"material-icons nav__icon\">person</i>'),
(5, 'Login', 'login', '<i class=\"material-icons nav__icon\">sign-in</i>'),
(6, 'Organisasi', 'organisasi', '<i class=\"material-icons nav__icon\">users</i>'),
(7, 'Struktur Organisasi', 'strukturOrganisasi', '<i class=\"material-icons nav__icon\">users</i>');

-- --------------------------------------------------------

--
-- Table structure for table `profil_kesiswaan`
--

CREATE TABLE `profil_kesiswaan` (
  `id` int(11) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_kesiswaan`
--

INSERT INTO `profil_kesiswaan` (`id`, `judul`, `url`, `keterangan`, `gambar`) VALUES
(1, 'Profil Kesiswaann', 'kesiswaan', '                                                                        <p>                                                                                                                                                                                                                                                                                                                                                                                                                                                Ini adalah profil kesiswaan smk manusa ajb.</p><ol><li>p</li><li>p</li><li>p</li><li>p</li><li>p</li><li>p</li><li>p</li></ol><p><br></p><table class=\"table table-bordered\"><tbody><tr><td>dasdasdads</td><td>sadasdasdsa</td></tr></tbody></table><p><br></p>                                                            ', '');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `judul`, `url`, `keterangan`, `gambar`) VALUES
(1, 'Struktur Organisasi', 'strukturOrganisasi', 'lorem', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$ANMk6nxXtwdstNFV99z87.TPbe/D99V8QfZusSv/3hIjwuy8jWpC.', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1604299074, 1, 'Admin', 'istrator', NULL, NULL),
(2, '::1', NULL, '$2y$10$7Na0wjW1nwNleszq2mUAXe1QrTSkjKgmdJX7WXDY2G3rrLeptWEre', 'githubakun686@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1603256409, 1603576528, 1, 'RIZAL', 'RAHMAN', '', ''),
(3, '::1', NULL, '$2y$10$GZmsBoLH9fgq9Y5c35pXmOj8BPvWDMzrYl6MyXXEF.wuXrNRfL4bu', 'p@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1603258118, NULL, 1, 'p', 'p', NULL, NULL),
(4, '::1', NULL, '$2y$10$C5U30XqYXnrB.SOEANA5S.ASCzcz4GRd2yxLZyNT86HQMW5pdhtRS', 'githubakun696@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1603449323, NULL, 1, 'RIZAL', 'RAHMAN', NULL, NULL),
(5, '::1', NULL, '$2y$10$DOW0x.Ek7AdDJ89Avxkp4ezaZShB9YCZd0QjUdWp7vxVVGE2UcpQ6', 'githubakun676@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1603449440, NULL, 1, 'RIZAL', 'RAHMAN', NULL, NULL),
(6, '127.0.0.1', NULL, '$2y$10$LbR8DDkQGPMZqNnsAyYTzeFpoIZn4RBtQD17uNyBUcid5l1n5TORu', 'githubakun6861111@gmail.com', '7fe4b84ed1276325f7c1', '$2y$10$n7JXnmnqKbjrWUygejhjXuy3FX4qLsgAVP1fMVOWwGtjjfEWo0sae', NULL, NULL, NULL, NULL, NULL, 1603673245, NULL, 0, 'RIZAL', 'RAHMAN', NULL, NULL),
(7, '127.0.0.1', NULL, '$2y$10$yMnYlgjbv.dytulyBnQEYelzc2Q0XSboWgO4UsIakVos14jO38Md2', 'githubakun686@gmail.comasa', 'f01f1d807d5fc96c1cdc', '$2y$10$nsWR8iEcDLB4ZDj3Vh82G.peOkRipiiKuzGTgmAByMtLNcZ1I0B1i', NULL, NULL, NULL, NULL, NULL, 1603673674, NULL, 0, 'RIZAL', 'RAHMAN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(10, 1, 1),
(11, 1, 2),
(12, 1, 3),
(4, 2, 2),
(5, 2, 3),
(9, 3, 2),
(13, 4, 2),
(14, 5, 2),
(15, 6, 2),
(17, 7, 2),
(18, 7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_kesiswaan`
--
ALTER TABLE `profil_kesiswaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profil_kesiswaan`
--
ALTER TABLE `profil_kesiswaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
