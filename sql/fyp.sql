-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_history`
--

CREATE TABLE `action_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('login','logout','add','delete','update') NOT NULL,
  `information` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES
(1, 1, 'login', 'IP address : 192.168.140.100', '2024-03-20 11:32:18'),
(2, 1, 'login', 'IP address : 192.168.140.100', '2024-03-22 11:32:18'),
(3, 1, 'login', 'UserInfo::get_ip(),UserInfo::get_device(),UserInfo::get_os(),UserInfo::get_browser()', '2024-03-22 16:57:35'),
(4, 1, 'login', '192.168.140.100', '2024-03-22 16:59:38'),
(5, 1, 'login', '192.168.140.100,Computer,Windows 10,Chrome', '2024-03-22 17:00:23'),
(6, 1, 'login', 'IP address : 192.168.140.100,, Device : Computer, OS : Windows 10, Browser : Chrome', '2024-03-22 17:01:33'),
(7, 1, 'login', 'IP address : 192.168.140.100 Device : Computer OS : Windows 10 Browser : Chrome', '2024-03-22 17:02:20'),
(8, 1, 'login', 'IP address : 192.168.140.100 Device : Computer OS : Windows 10 Browser : Chrome', '2024-03-23 00:04:25'),
(9, 1, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:06:49'),
(10, 10, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:07:22'),
(11, 11, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:08:11'),
(12, 1, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:08:58'),
(13, 0, 'login', '1', '0000-00-00 00:00:00'),
(14, 0, 'login', '1', '0000-00-00 00:00:00'),
(15, 1, 'login', 'switch user id : :id to Admin', '0000-00-00 00:00:00'),
(16, 1, 'login', 'switch user id : :id to Admin', '0000-00-00 00:00:00'),
(17, 1, 'login', 'switch user id : :id to Admin', '0000-00-00 00:00:00'),
(18, 1, 'login', 'switch user id : :id to Admin', '0000-00-00 00:00:00'),
(19, 1, 'login', 'switch user id : 1 to Admin', '0000-00-00 00:00:00'),
(20, 1, 'login', 'switch user id : 1 to Admin', '0000-00-00 00:00:00'),
(21, 1, 'login', 'switch user id : 1 to user', '2024-03-23 00:34:02'),
(22, 1, 'login', 'switch user id : 1 to admin', '2024-03-23 00:36:53'),
(23, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:37:50'),
(24, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:40:35'),
(25, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:41:43'),
(26, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:41:45'),
(27, 0, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:41:54'),
(28, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:41:56'),
(29, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:44:10'),
(30, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:44:12'),
(31, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:54:29'),
(32, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:54:36'),
(33, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 00:56:14'),
(34, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 01:23:11'),
(35, 1, 'login', 'switch user id : 10 to user', '2024-03-23 01:36:43'),
(36, 1, 'login', 'switch user id : 10 to admin', '2024-03-23 01:36:44'),
(37, 1, 'login', 'switch user id : 10 to user', '2024-03-23 01:42:57'),
(38, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 02:01:49'),
(39, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 02:01:50'),
(40, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 02:01:55'),
(41, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 02:02:10'),
(42, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 02:03:22'),
(43, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 02:08:44'),
(44, 1, 'login', 'IP address : 127.0.0.1; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 13:25:53'),
(45, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 13:34:28'),
(46, 1, 'login', 'switch user id : 1 to user', '2024-03-23 13:37:16'),
(47, 1, 'login', 'switch user id : 1 to admin', '2024-03-23 13:37:17'),
(48, 1, 'login', 'switch user id : 1 to user', '2024-03-23 13:37:18'),
(49, 1, 'login', 'switch user id : 1 to admin', '2024-03-23 13:37:19'),
(50, 1, 'login', 'switch user id : 1 to user', '2024-03-23 13:37:19'),
(51, 1, 'login', 'switch user id : 1 to admin', '2024-03-23 13:37:20'),
(52, 1, 'login', 'switch user id : 1 to user', '2024-03-23 13:37:20'),
(53, 1, 'login', 'switch user id : 1 to admin', '2024-03-23 13:37:20'),
(54, 0, 'update', 'switch user id : 11 to Disable', '2024-03-23 15:09:41'),
(55, 0, 'update', 'switch user id : 11 to Enable', '2024-03-23 15:09:43'),
(56, 0, 'update', 'switch user id : 11 to Disable', '2024-03-23 15:09:44'),
(57, 1, 'update', 'switch user id : 10 to admin', '2024-03-23 15:10:20'),
(58, 0, 'update', 'switch user id : 10 to Disable', '2024-03-23 15:10:28'),
(59, 1, 'update', 'switch user id : 10 to Enable', '2024-03-23 15:10:55'),
(60, 1, 'update', 'switch user id : 10 to Disable', '2024-03-23 15:10:58'),
(61, 1, 'update', 'switch user id : 10 to Enable', '2024-03-23 15:10:59'),
(62, 1, 'update', 'Switch user id : 1 to Disable', '2024-03-23 15:12:18'),
(63, 1, 'update', 'Switch user id : 1 to Enable', '2024-03-23 15:12:19'),
(64, 1, 'update', 'Switch user id : 1 to user', '2024-03-23 15:12:20'),
(65, 1, 'update', 'Switch user id : 1 to admin', '2024-03-23 15:12:20'),
(66, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 15:12:31'),
(67, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-23 15:12:33'),
(68, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:37:48'),
(69, 1, 'update', 'Switch user id : 1 to user', '2024-03-25 17:39:01'),
(70, 1, 'update', 'Switch user id : 1 to admin', '2024-03-25 17:39:02'),
(71, 11, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:50:55'),
(72, 11, 'logout', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:52:10'),
(73, 1, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:52:23'),
(74, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:52:48'),
(75, 11, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:52:56'),
(76, 11, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:53:32'),
(77, 11, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 17:54:58'),
(78, 11, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 18:09:39'),
(79, 11, 'logout', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 18:12:21'),
(80, 11, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 18:12:41'),
(81, 11, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 21:50:56'),
(82, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 21:51:01'),
(83, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 22:56:21'),
(84, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 22:56:23'),
(85, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 22:56:33'),
(86, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 22:57:12'),
(87, 1, 'update', 'Switch user id : 11 to Enable', '2024-03-25 22:57:29'),
(88, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:09:50'),
(89, 11, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:09:52'),
(90, 11, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:09:59'),
(91, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:10:03'),
(92, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:43:07'),
(93, 11, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:43:09'),
(94, 11, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:43:18'),
(95, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:43:21'),
(96, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:49:22'),
(97, 11, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:49:24'),
(98, 11, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:54:49'),
(99, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-25 23:54:52'),
(100, 1, 'update', 'Change username to ', '2024-03-26 00:07:15'),
(101, 1, 'update', 'Change username to administrator', '2024-03-26 00:07:49'),
(102, 1, 'update', 'Change email to a@a', '2024-03-26 00:12:59'),
(103, 1, 'update', 'Change email to administrator@domain.com', '2024-03-26 00:13:07'),
(104, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:20:10'),
(105, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:34:38'),
(106, 1, 'update', 'Change password to md5(12345678)', '2024-03-26 00:40:13'),
(107, 1, 'update', 'Change password to md5(P@ssw0rd)', '2024-03-26 00:41:19'),
(108, 1, 'update', 'Change password to 161ebd7d45089b3446ee4e0d86dbcf92', '2024-03-26 00:44:44'),
(109, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:44:51'),
(110, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:44:53'),
(111, 1, 'update', 'Changed password', '2024-03-26 00:50:37'),
(112, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:50:49'),
(113, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:50:51'),
(114, 11, 'update', 'Changed password', '2024-03-26 00:52:06'),
(115, 10, 'update', 'Changed password', '2024-03-26 00:52:34'),
(116, 10, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:53:32'),
(117, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:53:34'),
(118, 0, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:56:27'),
(119, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:56:29'),
(120, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 00:59:08'),
(121, 1, 'update', 'Switch user id : 10 to Disable', '2024-03-26 01:02:05'),
(122, 1, 'update', 'Switch user id : 10 to Enable', '2024-03-26 01:02:06'),
(123, 1, 'update', 'Switch user id : 10 to Disable', '2024-03-26 01:02:07'),
(124, 1, 'update', 'Switch user id : 10 to Enable', '2024-03-26 01:02:07'),
(125, 1, 'update', 'Switch user id : 10 to user', '2024-03-26 01:02:08'),
(126, 1, 'update', 'Switch user id : 10 to admin', '2024-03-26 01:02:09'),
(127, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:03:19'),
(128, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:03:21'),
(129, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:03:24'),
(130, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:03:27'),
(131, 11, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:03:44'),
(132, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:07:26'),
(133, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:10:52'),
(134, 0, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 01:13:13'),
(135, 11, 'update', 'Changed password', '2024-03-26 01:18:26'),
(136, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 19:31:17'),
(137, 0, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:04:10'),
(138, 11, 'logout', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:04:58'),
(139, 0, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:05:14'),
(140, 0, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:13:21'),
(141, 1, 'logout', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:30:07'),
(142, 0, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:30:09'),
(143, 11, 'delete', 'Delete action_history id : ', '2024-03-26 20:31:25'),
(144, 11, 'delete', 'Delete action_history id : 20', '2024-03-26 20:38:13'),
(145, 11, 'logout', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-03-26 20:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `malicious_chain`
--

CREATE TABLE `malicious_chain` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('DBD','Encoding','URL redirect','XSS') NOT NULL,
  `code` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `malicious_chain`
--

INSERT INTO `malicious_chain` (`id`, `user_id`, `type`, `code`, `date`) VALUES
(1, 1, 'XSS', '<script>,document.cookie,</script>', '2024-02-05'),
(2, 1, 'URL redirect', 'window.open(', '2024-01-29'),
(3, 1, 'DBD', 'createObjectURL(,click(,createElement(', '2024-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `admin` enum('Y','N') NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `admin`, `status`, `date`) VALUES
(1, 'administrator@domain.com', 'administrator', '$2y$10$2/sNqriY5w8EWuPdqD6OjOP0lXPkOUrZplE8Ose8VRm6HkRZAzPTS', 'Y', 'Enable', '2024-03-20'),
(10, 'admin@domain.com', 'admin', '$2y$10$DsvsUb1YO9ZUtOxzehBjI.Dsxx4hPnpK6XShsTVSJC9cnFKgKd.BG', 'Y', 'Enable', '2024-03-20'),
(11, 'user@domain.com', 'user', '$2y$10$34P6KrJYn18kL9OdIfDCcOEmtLRJYQCf5qSfzylAOAfpMPjIIPmdW', 'N', 'Enable', '2024-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `user_id`, `url`, `datetime`) VALUES
(1, 1, 'https://www.youtube.com/', '2024-03-20 18:22:25'),
(4, 1, 'https://www.google.com/', '2024-03-20 18:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `whitelist`
--

CREATE TABLE `whitelist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whitelist`
--

INSERT INTO `whitelist` (`id`, `user_id`, `url`, `date`) VALUES
(28, 1, 'http://192.168.140.100/phpmyadmin/', '2024-03-20'),
(29, 1, 'https://192.168.140.100/backend_php/malicious_chain.php?id=1', '2024-03-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_history`
--
ALTER TABLE `action_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `malicious_chain`
--
ALTER TABLE `malicious_chain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID` (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_history`
--
ALTER TABLE `action_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `malicious_chain`
--
ALTER TABLE `malicious_chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_history`
--
ALTER TABLE `action_history`
  ADD CONSTRAINT `action_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `malicious_chain`
--
ALTER TABLE `malicious_chain`
  ADD CONSTRAINT `malicious_chain_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `whitelist`
--
ALTER TABLE `whitelist`
  ADD CONSTRAINT `whitelist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
