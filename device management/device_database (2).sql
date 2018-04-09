-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 01:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `device_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `os_type` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `os_version` varchar(45) DEFAULT NULL,
  `ram` varchar(45) DEFAULT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `bit` varchar(45) DEFAULT NULL,
  `screen_resolution` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `uuid` varchar(45) DEFAULT NULL,
  `assigned_to` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `name`, `os_type`, `type`, `os_version`, `ram`, `cpu`, `bit`, `screen_resolution`, `grade`, `uuid`, `assigned_to`) VALUES
(1, '?', 'IOS', 'iPad Pro', '11.1', '4 GB', 'Hexa-core 2.39 GHz', '64', '2224 x 1668', 'High', '193ea81981bbc3ea8535688ea1c8b5f6eaa4514e', ''),
(2, 'Akuma', 'Android', 'Samsung Tab A', '5.0.2', '2 GB', 'Quad-Core 1.2GHz', '?', '768 x 1024 (132ppi)', 'Low', 'None', 'Amol'),
(3, 'Balrog', 'Android', 'Galaxy S7 Edge', '6.0.1', '4 GB', 'Octa-Core 4x2.3 GHz & 4x1.6 GHz', '?', '1440 x 2560 (534ppi)', 'High', 'None', 'Sonam'),
(4, 'Barret', 'IOS', 'iPhone 4', '7.1.2', '500MB', 'Single-Core 1GHz', '32', '640 x 960 (330ppi)', 'Obsolete', '40b7c83097b9a803b38b193f97124f21682653a4', 'Amol'),
(5, 'Basch', 'IOS', 'iPhone 5', '10.0.1', '1GB', 'Dual-Core 1.3GHz', '32', '640 x 1136 (326ppi)', 'Low', '086deb3ff832fe09fc492d835f8f539d853a70d5', 'sonam'),
(6, 'Bison', 'Android', 'Galaxy S5', '4.4.2', '2 GB', 'Quad-Core 2.5GHz', '?', '1080 x 1920 (432ppi)', 'Medium', 'None', ''),
(7, 'Blanka', 'Android', 'Nexus 7', '5.0.2', '1 GB', 'Quad-Core 1.2GHz', '?', '800 x 1280 (216ppi)', 'Low', 'None', ''),
(8, 'Cid', 'IOS', 'iPhone 6+', '11.2', '1 GB DDR3', 'Dual-Core 1.4GHz', '64', '1080 x 1920 (401ppi)', 'Medium', '9cda2720c72ff3e26e82e49ea796c8a4f9246f8e', 'amol'),
(9, 'Dr Robotnik', 'IOS', 'iPad 4', '10.1', '1GB', 'Dual-Core 1.4GHz', '32', '1536 x 2048 (264ppi)', 'Medium', '3e751193bdbf92b35a440f225318b5498de96c9e', ''),
(10, 'E-Honda', 'Android', 'Galaxy Tab 1', '4.0.4', '1 GB', 'Dual-Core 1GHz', '?', '800 x 1280 (149ppi)', 'Low', 'None', ''),
(11, 'Espio', 'IOS', 'iPad Mini 2 (retina)', '11.2', '1GB', 'Dual-Core 1.3GHz', '64', '1536 x 2048 (324 ppi)', 'Low', '7ecfbae1544a8d56ccdacd6dc27ed9038196b2f5', ''),
(12, 'Fox McCloud', 'IOS', 'iPad Air (retina)', '10.3.2', '1 GB DDR3', 'Dual-Core 1.3GHz', '64', '1536 x 2048 (264ppi)', 'Medium', '7c7a369fd078c67f1cc123685ad887d3e32a6552', ''),
(13, 'Fran', 'IOS', 'iPhone 6S', '11.2.2', '2 GB DDR 4', 'Dual-Core 1.85 GHz', '64', '1334 × 750 (326 ppi)', 'High', '49c2e825d69a758ff9379dd1ba0b9c24913f645e', ''),
(14, 'Glados', 'Android', 'LG G Pad', '4.4.2', '2 GB', 'Quad-Core 1.7GHz', '?', '1200 x 1920 (273ppi)', 'Medium', 'None', ''),
(15, 'Gordon Freeman', 'IOS', 'iPod 5', '9.3.5', '500MB', 'Dual-Core 1GHz', '32', '640 x 1136 (326ppi)', 'Obsolete', '8df683d2213df8bffdb6f8157e38c8b41809fb69', ''),
(16, 'Guile', 'Android', 'HTC One mini 2', '4.4.2', '1 GB', 'Quad-Core 1.2GHz', '?', '720 x 1280 (326ppi)', 'Low', 'None', ''),
(17, 'Guy Brush', 'IOS', 'iPod 5', '9', '500MB', 'Dual-Core 1GHz', '32', '640 x 1136 (326ppi)', 'Obsolete', '', ''),
(18, 'Iggy', 'IOS', 'iPod 5', '8.4.1', '500MB', 'Dual-Core 1GHz', '32', '640 x 1136 (326ppi)', 'Obsolete', 'ba9ff54ef1d18b27feb179271c49f90a6d813531', ''),
(19, 'John Marston', 'IOS', 'iPod 5', '8.3.0', '500MB', 'Dual-Core 1GHz', '32', '640 x 1136 (326ppi)', 'Obsolete', '53ddbab0034331cab54858dd980906cbb457367f', ''),
(20, 'Karen', 'IOS', 'iPhone 5s', '11.1.1', '1GB', 'Dual-Core 1.3GHz', '64', '640 x 1136 (326ppi)', 'Low', '11c7581c85ca118915b345a2da4fb558bce0cdb7', ''),
(21, 'Ken', 'Android', 'Nexus 10', '4.4.4', '2 GB', 'Dual-Core 1.7GHz', '?', '1600 x 2560 (299ppi)', 'Low', 'None', ''),
(22, 'King', 'Android', 'Kindle Fire HD', '?', '1 GB', 'Dual-Core 1.5GHz', '?', '1200 x 1920 (254ppi)', 'Low', 'None', ''),
(23, 'Knuckles', 'IOS', 'iPad Mini 2 (retina)', '10 Beta 2', '1GB', 'Dual-Core 1.3GHz', '64', '1536 x 2048 (324 ppi)', 'Low', '82b93d029411bbede53c16523c7f6c58054e526b', ''),
(24, 'Kratos', 'IOS', 'iPad Air 2', '9.3.4', '2 GB', 'Octa-core 1.5 GHz', '64', '2048 x 1536 (264ppi)', 'High', '0b7886a9d846ea7cd50f80c1eefbeba3ead44b21', ''),
(25, 'Lara Croft', 'IOS', 'iPhone 7+', '10.3.2', '3 GB', 'Quad-core 2.34 GHz', '64', '1920 x 1080 (401ppi)', 'High', 'f65ca802c90c9f80669fb4f18d8aa422da594875', 'Sonam'),
(26, 'Lemmy', 'IOS', 'iPod 5', '9.0.2', '500MB', 'Dual-Core 1GHz', '32', '640 x 1136 (326ppi)', 'Obsolete', 'd4b31d4fef7b969148b9493b32cd53ffa280bf3a', ''),
(27, 'Max Payne', 'IOS', 'iPad mini 4', '10.1', '2 GB', 'Quad-core 1.5 GHz', '64', '2048 x 1536 (326ppi)', 'High', '03d9afd06672d3db910b3330f88d68290119022a', ''),
(28, 'Mr Bones', 'IOS', 'iPhone 7', '10.3.3', '2 GB', 'Quad-core 2.34 GHz', '64', '750 x 1334 (326ppi)', 'High', '702c1adf30db79fd37da10e5866eb63157ef7356', ''),
(29, 'Mr Pricklepants', 'IOS', 'iPhone 7+', '11.1.2', '3 GB', 'Quad-core 2.34 GHz', '64', '1920 x 1080 (401ppi)', 'High', '788e06f1bf0c9da090d5c51ad15034e699f793ce', ''),
(30, 'Mr X', 'IOS', 'iPhone x', '11.1.2', '3 GB', 'Hexa-core 2.39 GHz', '64', '2436 x 1125 (458ppi)', 'High', '903e2d8c7291d8d3d386a3a0886f21d969704b54', ''),
(31, 'Q Bert', 'Android', 'Amazon Fire HD 7', '4.5.5', '1 GB', 'Dual-Core 1.5GHz', '?', '800 x 1280 (216ppi)', 'Low', 'None', ''),
(32, 'Roach', 'Android', 'Nexus 9', '7 Preview', '2 GB', 'Dual-Core 2.3GHz', '?', '1536 x 2048 (281ppi)', 'Medium', 'None', ''),
(33, 'Seifer', 'IOS', 'iPhone 8', '11.0.3', '2 GB', 'Hexa-core 2.39 GHz', '64', '750 x 1334 (326ppi)', 'High', '', ''),
(34, 'Silver', 'IOS', 'iPad Mini', '9.2', '500MB', 'Dual-Core 1GHz', '32', '768 x 1024 (163 ppi)', 'Obsolete', 'e73f9b4cb93e83f718622016e31d90c06692d782', ''),
(35, 'Slippy Toad', 'IOS', 'iPod 6', '10.3', '1GB', 'Dual-Core 1.4GHz', '64', '750 x 1334 (326 ppi)', 'Low', 'cdc1507bc464102fb7321e72273b58d3bee8a6c5', ''),
(36, 'Sonic', 'IOS', 'iPad 2', '8.4.1', '500MB', 'Dual-Core 1GHz', '32', '768 x 1024 (132ppi)', 'Obsolete', '6745ece4fd066224e05129278e7eb75c562fea28', ''),
(37, 'Squall', 'IOS', 'iPhone 6', '10.3.2', '1 GB DDR3', 'Dual-Core 1.4GHz', '64', '750 x 1334 (326ppi)', 'Medium', 'a3eb076b6f1d46fa40c3661ed928592df544b945', ''),
(38, 'Toad', 'IOS', 'iPod 5', '8.1.1', '500MB', 'Dual-Core 1GHz', '32', '640 x 1136 (326ppi)', 'Obsolete', '0395cc76b2f123d2debb5db2d26a8e4b44d44218', ''),
(39, 'Vector', 'IOS', 'iPad Mini', '8.4', '500MB', 'Dual-Core 1GHz', '32', '768 x 1024 (163 ppi)', 'Obsolete', 'fc4fde35ea28101e8a11f9a706c3fc4eff4537cf', ''),
(40, 'Vincent', 'IOS', 'iPhone 4s', '8.4.0', '500MB', 'Dual-Core 1GHz', '32', '640 x 960 (326ppi)', 'Obsolete', '369fcdf892d01f490215c4d9e0f2570d707c2f8a', ''),
(41, 'Wheatley', 'Android', 'LG G3', '5.0.0', '3 GB', 'Quad-Core 2.5GHz', '?', '1440 x 2560 (538ppi)', 'Medium', 'None', ''),
(42, 'Zangief', 'Android', 'Galaxy Tab 4', '5.0.2', '1.5 GB', 'Quad-Core 1.2GHz', '?', '800 x 1280 (216ppi)', 'Low', 'None', ''),
(43, 'Gun Jack', 'Windows', 'W8 Surface', '?', '2 GB', 'Quad-Core 1.3GHz', NULL, '768 x 1366 (148ppi)', 'Low - Mid', NULL, ''),
(44, 'Kuma', 'Windows', 'W8 Nokia ', '8.1', '500 MB', 'Dual-Core 1GHz', NULL, '480 x 800 (233ppi)', 'Low', NULL, 'Sonam'),
(45, 'Batman', 'VR', 'Vive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amol'),
(46, 'Link', 'Windows', 'Dell Laptop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lelemia'),
(47, 'Princess Zelda', 'Windows', 'Dell E 6400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(48, 'Pac Man', 'Windows', 'Chromebook', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(49, 'Superman', 'VR', 'Vive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(50, '-', 'VR', 'Rift', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `device_assigned`
--

CREATE TABLE `device_assigned` (
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `devices_id` int(11) NOT NULL,
  `user_id` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device_assigned`
--

INSERT INTO `device_assigned` (`date`, `devices_id`, `user_id`) VALUES
('2018-04-08 22:55:00', 1, 4),
('2018-04-08 22:59:41', 2, 25),
('2018-04-08 23:12:15', 3, 2),
('2018-04-08 23:34:23', 1, 2),
('2018-04-09 10:41:48', 2, 44),
('2018-04-09 10:42:16', 1, 45),
('2018-04-09 10:43:59', 3, 46);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(45) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`) VALUES
(1, 'Amol'),
(2, 'Sonam'),
(3, 'lelemia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
