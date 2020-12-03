-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 09:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fc_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `fc_admin`
--

CREATE TABLE `fc_admin` (
  `id` int(16) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `permission` varchar(32) NOT NULL DEFAULT 'moderator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fc_info`
--

CREATE TABLE `fc_info` (
  `web_name` varchar(256) NOT NULL,
  `Logo_Src` varchar(512) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fc_permissions`
--

CREATE TABLE `fc_permissions` (
  `permission_group` varchar(256) NOT NULL,
  `permission` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fc_settings`
--

CREATE TABLE `fc_settings` (
  `name` varchar(256) NOT NULL,
  `state` varchar(6) NOT NULL DEFAULT 'TRUE',
  `additional_value` varchar(256) DEFAULT NULL,
  `perm_to_change` varchar(256) NOT NULL DEFAULT 'ROOT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fc_settings`
--

INSERT INTO `fc_settings` (`name`, `state`, `additional_value`, `perm_to_change`) VALUES
('ONLINE_MODE', 'TRUE', NULL, 'ROOT'),
('WHITELIST', 'FALSE', NULL, 'ADMIN'),
('ENABLE_PLUGINS', 'TRUE', NULL, 'ROOT'),
('ALLOW_TP_PACKAGE', 'TRUE', NULL, 'ROOT'),
('LIMIT_NUM_ADMIN_ACCOUNTS', 'FALSE', NULL, 'ROOT'),
('LIMIT_NUM_ROOT_ACCOUNTS', 'FALSE', NULL, 'ROOT'),
('LIMIT_NUM_MOD_ACCOUNTS', 'FALSE', NULL, 'ROOT'),
('ENABLE_LOGS', 'TRUE', 'LOGGING_LVL=3', 'ADMIN'),
('REQ_VISITOR_LOGIN', 'FALSE', NULL, 'ROOT');

-- --------------------------------------------------------

--
-- Table structure for table `fc_themes`
--

CREATE TABLE `fc_themes` (
  `theme` varchar(256) NOT NULL,
  `themeVersion` varchar(32) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fc_themes`
--

INSERT INTO `fc_themes` (`theme`, `themeVersion`, `status`) VALUES
('Feather Nature', '0.1', 'TRUE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fc_admin`
--
ALTER TABLE `fc_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fc_admin`
--
ALTER TABLE `fc_admin`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
