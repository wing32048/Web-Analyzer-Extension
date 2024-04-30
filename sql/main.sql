-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 04:18 PM
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
CREATE DATABASE IF NOT EXISTS `fyp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fyp`;

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
(353, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 00:35:30'),
(354, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 00:35:32'),
(355, 1, 'update', 'Switch user id : 10 to Disable', '2024-04-12 00:35:47'),
(356, 1, 'update', 'Switch user id : 11 to Disable', '2024-04-12 00:35:50'),
(357, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 00:35:59'),
(358, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 00:38:05'),
(359, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 00:49:41'),
(360, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 00:50:49'),
(361, 16, 'add', 'malicious_chain type:URL redirect code:adsasd ', '2024-04-12 00:57:32'),
(362, 16, 'delete', 'Delete malicious_chain id : 41', '2024-04-12 00:57:36'),
(363, 1, 'delete', 'Delete action_history id : 33', '2024-04-12 00:58:04'),
(364, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 18:54:30'),
(365, 16, 'delete', 'Delete action_history id : 41', '2024-04-12 18:59:41'),
(366, 16, 'add', 'http://192.168.140.100/malware%20website/stored_xss.php to action_list', '2024-04-12 18:59:48'),
(367, 16, 'logout', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 19:02:26'),
(368, 1, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 19:02:32'),
(369, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 19:08:49'),
(370, 16, 'logout', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 19:10:07'),
(371, 1, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 19:10:11'),
(372, 1, 'logout', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-12 19:17:43'),
(373, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-13 23:33:58'),
(374, 1, 'add', 'malicious_chain type:URL redirect code:javascript:,window.open( ', '2024-04-13 23:36:50'),
(375, 1, 'add', 'malicious_chain type:DBD code:javascript:,createObjectURL(,click(,createElement( ', '2024-04-13 23:37:12'),
(376, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-13 23:38:01'),
(377, 1, 'update', 'Switch user id : 11 to Enable', '2024-04-13 23:40:01'),
(378, 1, 'update', 'Switch user id : 11 to Disable', '2024-04-13 23:40:02'),
(379, 1, 'update', 'Switch user id : 11 to Enable', '2024-04-13 23:40:06'),
(380, 1, 'update', 'Switch user id : 11 to Disable', '2024-04-13 23:40:07'),
(381, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 00:29:14'),
(382, 16, 'logout', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 00:31:57'),
(383, 1, 'add', 'https://192.168.140.100/malware%20website/dbd_base64.html to action_list', '2024-04-14 01:28:19'),
(384, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 01:28:24'),
(385, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 01:28:46'),
(386, 1, 'delete', 'Delete action_history id : 44', '2024-04-14 01:29:42'),
(387, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to whitelist', '2024-04-14 01:31:39'),
(388, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 01:36:20'),
(389, 1, 'delete', 'Delete whitelist id : 61', '2024-04-14 01:36:30'),
(390, 1, 'delete', 'Delete action_history id : 45', '2024-04-14 01:36:44'),
(391, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 01:37:46'),
(392, 1, 'delete', 'Delete action_history id : 46', '2024-04-14 01:37:58'),
(393, 1, 'delete', 'Delete whitelist id : 28', '2024-04-14 01:38:23'),
(394, 1, 'delete', 'Delete action_history id : 43', '2024-04-14 01:39:30'),
(395, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 01:42:48'),
(396, 1, 'delete', 'Delete action_history id : 47', '2024-04-14 01:43:06'),
(397, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 01:43:36'),
(398, 1, 'delete', 'Delete action_history id : 48', '2024-04-14 01:49:30'),
(399, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 01:49:53'),
(400, 1, 'delete', 'Delete action_history id : 49', '2024-04-14 01:51:17'),
(401, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 01:54:22'),
(402, 1, 'delete', 'Delete action_history id : 50', '2024-04-14 01:54:27'),
(403, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 01:56:08'),
(404, 1, 'delete', 'Delete action_history id : 51', '2024-04-14 01:56:20'),
(405, 1, 'delete', 'Delete whitelist id : 62', '2024-04-14 01:58:01'),
(406, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 01:59:28'),
(407, 1, 'delete', 'Delete action_history id : 52', '2024-04-14 01:59:52'),
(408, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:01:45'),
(409, 1, 'delete', 'Delete action_history id : 53', '2024-04-14 02:01:50'),
(410, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:04:12'),
(411, 1, 'delete', 'Delete whitelist id : 54', '2024-04-14 02:05:03'),
(412, 1, 'delete', 'Delete action_history id : 54', '2024-04-14 02:05:29'),
(413, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:06:46'),
(414, 1, 'delete', 'Delete whitelist id : 55', '2024-04-14 02:06:50'),
(415, 1, 'delete', 'Delete action_history id : 55', '2024-04-14 02:07:33'),
(416, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to whitelist', '2024-04-14 02:11:24'),
(417, 1, 'delete', 'Delete whitelist id : 63', '2024-04-14 02:11:30'),
(418, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:12:36'),
(419, 1, 'delete', 'Delete action_history id : 56', '2024-04-14 02:12:41'),
(420, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:14:03'),
(421, 1, 'delete', 'Delete action_history id : 57', '2024-04-14 02:14:07'),
(422, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:14:19'),
(423, 1, 'delete', 'Delete action_history id : 58', '2024-04-14 02:14:46'),
(424, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:15:45'),
(425, 1, 'delete', 'Delete action_history id : 59', '2024-04-14 02:15:50'),
(426, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to whitelist', '2024-04-14 02:16:29'),
(427, 1, 'delete', 'Delete whitelist id : 64', '2024-04-14 02:16:45'),
(428, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:17:44'),
(429, 1, 'delete', 'Delete action_history id : 60', '2024-04-14 02:17:50'),
(430, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:18:49'),
(431, 1, 'delete', 'Delete action_history id : 61', '2024-04-14 02:18:53'),
(432, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:21:13'),
(433, 1, 'delete', 'Delete action_history id : 62', '2024-04-14 02:21:17'),
(434, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:21:47'),
(435, 1, 'add', 'https://192.168.140.100/malware%20website/ to whitelist', '2024-04-14 02:22:02'),
(436, 1, 'add', 'https://192.168.140.100/action_histroy.php?user_id=1 to action_list', '2024-04-14 02:22:17'),
(437, 1, 'add', 'https://192.168.140.100/self_action_history.php to action_list', '2024-04-14 02:22:17'),
(438, 1, 'add', 'https://192.168.140.100/whitelist.php?user_id=1 to action_list', '2024-04-14 02:22:17'),
(439, 1, 'add', 'https://192.168.140.100/self_whitelist_history.php to action_list', '2024-04-14 02:22:17'),
(440, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:24:11'),
(441, 1, 'delete', 'Delete action_history id : 68', '2024-04-14 02:26:47'),
(442, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:27:58'),
(443, 1, 'delete', 'Delete action_history id : 69', '2024-04-14 02:28:04'),
(444, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:31:17'),
(445, 1, 'delete', 'Delete action_history id : 70', '2024-04-14 02:31:25'),
(446, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 02:32:56'),
(447, 1, 'delete', 'Delete action_history id : 71', '2024-04-14 02:33:02'),
(448, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:06:08'),
(449, 1, 'delete', 'Delete action_history id : 72', '2024-04-14 03:06:19'),
(450, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:08:41'),
(451, 1, 'delete', 'Delete action_history id : 73', '2024-04-14 03:09:37'),
(452, 1, 'add', 'https://192.168.140.100/malware%20website/test.html to action_list', '2024-04-14 03:11:10'),
(453, 1, 'delete', 'Delete action_history id : 74', '2024-04-14 03:11:15'),
(454, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:11:44'),
(455, 1, 'add', 'https://192.168.140.100/malware%20website/stored_xss.php to action_list', '2024-04-14 03:17:22'),
(456, 1, 'delete', 'Delete action_history id : 76', '2024-04-14 03:18:40'),
(457, 1, 'delete', 'Delete action_history id : 75', '2024-04-14 03:18:46'),
(458, 1, 'add', 'https://192.168.140.100/malware%20website/stored_xss.php to action_list', '2024-04-14 03:18:53'),
(459, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:18:57'),
(460, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:18:59'),
(461, 1, 'add', 'https://192.168.140.100/malware%20website/cookie.php to action_list', '2024-04-14 03:19:03'),
(462, 1, 'delete', 'Delete action_history id : 77', '2024-04-14 03:20:12'),
(463, 1, 'delete', 'Delete action_history id : 78', '2024-04-14 03:20:13'),
(464, 1, 'delete', 'Delete action_history id : 79', '2024-04-14 03:20:13'),
(465, 1, 'delete', 'Delete action_history id : 80', '2024-04-14 03:20:14'),
(466, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:21:26'),
(467, 1, 'delete', 'Delete action_history id : 81', '2024-04-14 03:21:31'),
(468, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:21:36'),
(469, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:22:37'),
(470, 1, 'delete', 'Delete action_history id : 83', '2024-04-14 03:22:41'),
(471, 1, 'delete', 'Delete action_history id : 82', '2024-04-14 03:22:42'),
(472, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:23:48'),
(473, 1, 'delete', 'Delete action_history id : 84', '2024-04-14 03:23:52'),
(474, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:24:24'),
(475, 1, 'delete', 'Delete action_history id : 85', '2024-04-14 03:24:27'),
(476, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:24:39'),
(477, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:24:46'),
(478, 1, 'delete', 'Delete action_history id : 86', '2024-04-14 03:25:03'),
(479, 1, 'delete', 'Delete action_history id : 87', '2024-04-14 03:25:04'),
(480, 1, 'add', 'https://192.168.140.100/malware%20website/test.html to action_list', '2024-04-14 03:25:39'),
(481, 1, 'delete', 'Delete action_history id : 88', '2024-04-14 03:25:50'),
(482, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:27:16'),
(483, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 03:28:05'),
(484, 1, 'delete', 'Delete action_history id : 90', '2024-04-14 03:28:11'),
(485, 1, 'delete', 'Delete action_history id : 89', '2024-04-14 03:28:12'),
(486, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to whitelist', '2024-04-14 03:28:45'),
(487, 1, 'add', 'https://192.168.140.100/malware%20website/test.html to action_list', '2024-04-14 03:29:43'),
(488, 1, 'add', 'https://192.168.140.100/action_histroy.php?user_id=1 to action_list', '2024-04-14 03:30:05'),
(489, 1, 'add', 'https://192.168.140.100/self_action_history.php to action_list', '2024-04-14 03:30:08'),
(490, 1, 'add', 'https://192.168.140.100/self_whitelist_history.php to action_list', '2024-04-14 03:30:08'),
(491, 1, 'add', 'https://192.168.140.100/action_histroy.php?user_id= to action_list', '2024-04-14 03:30:09'),
(492, 1, 'add', 'https://192.168.140.100/whitelist.php?user_id=1 to action_list', '2024-04-14 03:30:09'),
(493, 1, 'add', 'https://192.168.140.100/action_histroy.php?user_id=1 to action_list', '2024-04-14 03:30:22'),
(494, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:31:28'),
(495, 1, 'add', 'https://192.168.140.100/malware%20website/stored_xss.php to action_list', '2024-04-14 03:31:33'),
(496, 1, 'add', 'https://192.168.140.100/malware%20website/cookie.php to action_list', '2024-04-14 03:31:36'),
(497, 1, 'add', 'https://192.168.140.100/malware%20website/reflected_xss.php to whitelist', '2024-04-14 03:32:16'),
(498, 1, 'delete', 'Delete action_history id : 98', '2024-04-14 03:33:23'),
(499, 1, 'delete', 'Delete action_history id : 99', '2024-04-14 03:33:24'),
(500, 1, 'delete', 'Delete action_history id : 100', '2024-04-14 03:33:25'),
(501, 1, 'add', 'https://192.168.140.100/malware%20website/stored_xss.php to action_list', '2024-04-14 03:34:51'),
(502, 1, 'add', 'https://192.168.140.100/malware%20website/dbd_base64.html to action_list', '2024-04-14 03:35:16'),
(503, 1, 'add', 'https://192.168.140.100/malware%20website/dbd.html to action_list', '2024-04-14 03:35:20'),
(504, 1, 'add', 'https://192.168.140.100/malicious/reflected_xss.php?myInput=%3Cscript%3Ealert%28document.cookie%29%3C%2Fscript%3E to action_list', '2024-04-14 03:35:41'),
(505, 1, 'delete', 'Delete action_history id : 101', '2024-04-14 03:36:39'),
(506, 1, 'delete', 'Delete action_history id : 102', '2024-04-14 03:36:40'),
(507, 1, 'delete', 'Delete action_history id : 103', '2024-04-14 03:36:40'),
(508, 1, 'delete', 'Delete action_history id : 104', '2024-04-14 03:36:40'),
(509, 1, 'add', 'https://192.168.140.100/malicious/reflected_xss.php?myInput=%3Cscript%3Ealert%28document.cookie%29%3C%2Fscript%3E to action_list', '2024-04-14 03:36:47'),
(510, 1, 'add', 'https://192.168.140.100/malware%20website/dbd.html to action_list', '2024-04-14 03:36:53'),
(511, 1, 'add', 'https://192.168.140.100/malware%20website/dbd_base64.html to action_list', '2024-04-14 03:36:55'),
(512, 1, 'add', 'https://192.168.140.100/malware%20website/stored_xss.php to action_list', '2024-04-14 03:37:16'),
(513, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 03:37:24'),
(514, 1, 'delete', 'Delete action_history id : 105', '2024-04-14 03:37:53'),
(515, 1, 'delete', 'Delete action_history id : 106', '2024-04-14 03:38:00'),
(516, 1, 'delete', 'Delete action_history id : 107', '2024-04-14 03:38:01'),
(517, 1, 'delete', 'Delete action_history id : 108', '2024-04-14 03:38:01'),
(518, 1, 'delete', 'Delete action_history id : 109', '2024-04-14 03:38:01'),
(519, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:41:35'),
(520, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:45:20'),
(521, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:45:50'),
(522, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:45:55'),
(523, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:46:11'),
(524, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:46:21'),
(525, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:46:29'),
(526, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:46:46'),
(527, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:46:56'),
(528, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:47:02'),
(529, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:47:08'),
(530, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:47:13'),
(531, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 10:47:56'),
(532, 1, 'login', 'IP address : 192.168.140.200; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 11:11:15'),
(533, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to whitelist', '2024-04-14 11:11:44'),
(534, 1, 'delete', 'Delete whitelist id : 68', '2024-04-14 11:12:13'),
(535, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:14:49'),
(536, 1, 'delete', 'Delete action_history id : 110', '2024-04-14 11:16:01'),
(537, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:18:06'),
(538, 1, 'delete', 'Delete action_history id : 111', '2024-04-14 11:18:14'),
(539, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:19:32'),
(540, 1, 'delete', 'Delete action_history id : 112', '2024-04-14 11:19:40'),
(541, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:22:41'),
(542, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:22:59'),
(543, 1, 'delete', 'Delete action_history id : 114', '2024-04-14 11:23:11'),
(544, 1, 'delete', 'Delete action_history id : 113', '2024-04-14 11:23:16'),
(545, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:23:26'),
(546, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 11:24:29'),
(547, 1, 'delete', 'Delete whitelist id : 66', '2024-04-14 11:24:35'),
(548, 1, 'add', 'https://192.168.140.100/malware%20website/url_re.html to action_list', '2024-04-14 11:25:46'),
(549, 1, 'delete', 'Delete action_history id : 116', '2024-04-14 11:26:00'),
(550, 1, 'delete', 'Delete action_history id : 115', '2024-04-14 11:26:01'),
(551, 1, 'add', 'https://192.168.140.100/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:26:13'),
(552, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:26:27'),
(553, 1, 'delete', 'Delete action_history id : 118', '2024-04-14 11:26:41'),
(554, 1, 'delete', 'Delete action_history id : 117', '2024-04-14 11:26:42'),
(555, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:26:51'),
(556, 1, 'add', 'https://192.168.140.200/malware%20website/dbd.html to action_list', '2024-04-14 11:26:55'),
(557, 1, 'add', 'https://192.168.140.200/malware%20website/dbd_base64.html to action_list', '2024-04-14 11:26:59'),
(558, 1, 'add', 'https://192.168.140.100/malicious/reflected_xss.php?myInput=%3Cscript%3Ealert%28document.cookie%29%3C%2Fscript%3E to action_list', '2024-04-14 11:27:10'),
(559, 1, 'add', 'https://192.168.140.200/malware%20website/stored_xss.php to action_list', '2024-04-14 11:27:18'),
(560, 1, 'delete', 'Delete action_history id : 119', '2024-04-14 11:28:15'),
(561, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:32:02'),
(562, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:35:53'),
(563, 1, 'delete', 'Delete action_history id : 125', '2024-04-14 11:35:59'),
(564, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:36:20'),
(565, 1, 'delete', 'Delete action_history id : 124', '2024-04-14 11:36:24'),
(566, 1, 'delete', 'Delete action_history id : 126', '2024-04-14 11:36:25'),
(567, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:37:23'),
(568, 1, 'delete', 'Delete action_history id : 127', '2024-04-14 11:37:34'),
(569, 1, 'add', 'https://192.168.140.200/malware%20website/url_re.html to action_list', '2024-04-14 11:38:21'),
(570, 1, 'delete', 'Delete action_history id : 128', '2024-04-14 11:38:27'),
(571, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:38:36'),
(572, 1, 'delete', 'Delete action_history id : 120', '2024-04-14 11:39:05'),
(573, 1, 'delete', 'Delete action_history id : 121', '2024-04-14 11:39:05'),
(574, 1, 'delete', 'Delete action_history id : 122', '2024-04-14 11:39:06'),
(575, 1, 'delete', 'Delete action_history id : 123', '2024-04-14 11:39:06'),
(576, 1, 'delete', 'Delete action_history id : 129', '2024-04-14 11:39:07'),
(577, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 11:39:27'),
(578, 1, 'add', 'https://192.168.140.200/malware%20website/stored_xss.php to action_list', '2024-04-14 11:39:37'),
(579, 1, 'add', 'https://192.168.140.100/malicious/reflected_xss.php?myInput=%3Cscript%3Ealert%28document.cookie%29%3C%2Fscript%3E to action_list', '2024-04-14 11:39:43'),
(580, 1, 'add', 'https://192.168.140.200/malware%20website/dbd_base64.html to action_list', '2024-04-14 11:39:50'),
(581, 1, 'add', 'https://192.168.140.200/malware%20website/dbd.html to action_list', '2024-04-14 11:39:52'),
(582, 1, 'delete', 'Delete action_history id : 130', '2024-04-14 11:40:00'),
(583, 1, 'delete', 'Delete action_history id : 131', '2024-04-14 11:40:01'),
(584, 1, 'delete', 'Delete action_history id : 132', '2024-04-14 11:40:01'),
(585, 1, 'delete', 'Delete action_history id : 133', '2024-04-14 11:40:01'),
(586, 1, 'delete', 'Delete action_history id : 134', '2024-04-14 11:40:02'),
(587, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 15:51:15'),
(588, 1, 'add', 'https://www.youtube.com/ to action_list', '2024-04-14 15:51:39'),
(589, 1, 'delete', 'Delete action_history id : 135', '2024-04-14 15:52:00'),
(590, 1, 'add', 'https://www.youtube.com/ to action_list', '2024-04-14 15:52:15'),
(591, 1, 'delete', 'Delete action_history id : 136', '2024-04-14 15:52:22'),
(592, 1, 'add', 'https://www.youtube.com/ to action_list', '2024-04-14 15:52:22'),
(593, 1, 'delete', 'Delete action_history id : 137', '2024-04-14 15:52:31'),
(594, 1, 'add', 'https://www.youtube.com/ to action_list', '2024-04-14 15:53:24'),
(595, 1, 'delete', 'Delete action_history id : 138', '2024-04-14 15:53:37'),
(596, 1, 'add', 'https://www.youtube.com/ to action_list', '2024-04-14 15:53:54'),
(597, 1, 'delete', 'Delete action_history id : 139', '2024-04-14 15:53:57'),
(598, 1, 'add', 'https://www.youtube.com/ to action_list', '2024-04-14 15:54:21'),
(599, 1, 'delete', 'Delete action_history id : 140', '2024-04-14 15:54:25'),
(600, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 15:56:44'),
(601, 1, 'delete', 'Delete whitelist id : 67', '2024-04-14 15:57:16'),
(602, 1, 'delete', 'Delete action_history id : 141', '2024-04-14 15:57:25'),
(603, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 15:57:57'),
(604, 1, 'add', 'https://192.168.140.200/malware%20website/url_re_base64.html to action_list', '2024-04-14 15:59:19'),
(605, 1, 'delete', 'Delete action_history id : 142', '2024-04-14 16:00:59'),
(606, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 16:02:42'),
(607, 16, 'add', 'http://192.168.140.200/url_re_base64.html to action_list', '2024-04-14 16:02:56'),
(608, 16, 'add', 'http://192.168.140.200/stored_xss.php to action_list', '2024-04-14 16:03:51'),
(609, 16, 'add', 'https://192.168.140.200/reflected_xss.php?myInput=%3Cscript%3Ealert%28document.cookie%29%3C%2Fscript%3E to action_list', '2024-04-14 16:04:34'),
(610, 16, 'add', 'http://192.168.140.200/dbd_base64.html to action_list', '2024-04-14 16:04:43'),
(611, 16, 'add', 'http://192.168.140.200/dbd.html to action_list', '2024-04-14 16:04:45'),
(612, 16, 'delete', 'Delete action_history id : 143', '2024-04-14 16:05:16'),
(613, 16, 'delete', 'Delete action_history id : 144', '2024-04-14 16:05:17'),
(614, 16, 'delete', 'Delete action_history id : 145', '2024-04-14 16:05:17'),
(615, 16, 'delete', 'Delete action_history id : 146', '2024-04-14 16:05:18'),
(616, 16, 'delete', 'Delete action_history id : 147', '2024-04-14 16:05:19'),
(617, 16, 'add', 'http://192.168.140.200/dom_xss.html to whitelist', '2024-04-14 22:57:03'),
(618, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-14 22:57:32'),
(619, 16, 'delete', 'Delete whitelist id : 69', '2024-04-14 22:58:12'),
(620, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-15 03:20:27'),
(621, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-15 03:22:39'),
(622, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-15 03:25:39'),
(623, 1, 'add', 'https://192.168.140.200/stored_xss.php to whitelist', '2024-04-15 03:36:03'),
(624, 1, 'login', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-16 16:22:46'),
(625, 1, 'logout', 'IP address : 192.168.140.100; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-16 16:31:32'),
(626, 1, 'add', 'https://192.168.140.200/dom_xss.html?%27%20onerror=%27alert(document.cookie) to whitelist', '2024-04-17 17:56:52'),
(627, 1, 'login', 'IP address : 192.168.140.200; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-17 17:57:40'),
(628, 1, 'add', 'https://192.168.140.200/dom_xss.html?myInput=%3Cscript%3E%3Cimg+src%3Dx+onerror%3Dalert%28document.cookie%29%3E%3C%2Fscript%3E to action_list', '2024-04-17 18:24:08'),
(629, 1, 'delete', 'Delete action_history id : 148', '2024-04-17 18:24:25'),
(630, 1, 'add', 'https://192.168.140.200/dom_xss.html?myInput=%3Cscript%3E%3Cimg+src%3Dx+onerror%3Dalert%28document.cookie%29%3E%3C%2Fscript%3E to whitelist', '2024-04-17 18:24:37'),
(631, 1, 'add', 'https://192.168.140.200/dom_xss.html?myInput=%3Cimg+src%3Dx+onerror%3Dalert%28document.cookie%29%3E to whitelist', '2024-04-17 18:26:37'),
(632, 1, 'add', 'https://192.168.140.200/url_re_base64.html to action_list', '2024-04-17 18:26:54'),
(633, 1, 'add', 'https://192.168.140.200/dbd.html to action_list', '2024-04-17 18:28:15'),
(634, 1, 'add', 'https://192.168.140.200/dbd_base64.html to action_list', '2024-04-17 18:28:19'),
(635, 1, 'login', 'IP address : 192.168.140.200; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-17 18:29:24'),
(636, 1, 'add', 'malicious_chain type:XSS code:<script>,alert(document.cookie),</script> ', '2024-04-17 18:29:38'),
(637, 1, 'delete', 'Delete whitelist id : 70', '2024-04-17 18:30:36'),
(638, 1, 'delete', 'Delete whitelist id : 71', '2024-04-17 18:30:44'),
(639, 1, 'delete', 'Delete whitelist id : 72', '2024-04-17 18:30:45'),
(640, 1, 'delete', 'Delete whitelist id : 73', '2024-04-17 18:30:46'),
(641, 1, 'add', 'https://192.168.140.200/stored_xss.php to action_list', '2024-04-17 18:30:58'),
(642, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-17 18:46:15'),
(643, 1, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-17 23:05:35'),
(644, 1, 'add', 'http://192.168.140.200/url_re_base64.html to action_list', '2024-04-17 23:05:42'),
(645, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-23 19:46:51'),
(646, 16, 'add', 'malicious_chain type:XSS code:document.cookie ', '2024-04-23 19:52:49'),
(647, 16, 'login', 'IP address : 192.168.140.133; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-23 22:03:16'),
(648, 16, 'delete', 'Delete malicious_chain id : 45', '2024-04-23 22:03:34'),
(649, 16, 'add', 'malicious_chain type:XSS code:document.cookie ', '2024-04-23 22:03:52'),
(650, 16, 'add', 'http://192.168.140.200/stored_xss.php to action_list', '2024-04-23 22:04:37'),
(651, 1, 'login', 'IP address : 192.168.140.134; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-23 22:41:53'),
(652, 1, 'delete', 'Delete malicious_chain id : 7', '2024-04-23 22:46:14'),
(653, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:16:54'),
(654, 1, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:17:04'),
(655, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:17:36'),
(656, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:17:39'),
(657, 1, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:18:07'),
(658, 16, 'add', 'http://192.168.140.200/url_re_base64.html to whitelist', '2024-04-24 10:22:32'),
(659, 16, 'delete', 'Delete action_history id : 154', '2024-04-24 10:22:56'),
(660, 16, 'delete', 'Delete whitelist id : 74', '2024-04-24 10:23:00'),
(661, 16, 'update', 'Change username to luca', '2024-04-24 10:24:41'),
(662, 16, 'update', 'Change username to lucas', '2024-04-24 10:24:44'),
(663, 16, 'update', 'Change email to luca@domain.com', '2024-04-24 10:24:57'),
(664, 16, 'update', 'Change email to lucas@domain.com', '2024-04-24 10:25:04'),
(665, 16, 'update', 'Changed password', '2024-04-24 10:25:42'),
(666, 16, 'update', 'Changed password', '2024-04-24 10:25:58'),
(667, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:26:07'),
(668, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:26:13'),
(669, 16, 'update', 'Changed password', '2024-04-24 10:26:25'),
(670, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:35:01'),
(671, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 10:35:03'),
(672, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 12:59:46'),
(673, 1, 'login', 'IP address : 192.168.140.128; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 13:14:45'),
(674, 16, 'add', 'http://192.168.140.200/dbd.html to whitelist', '2024-04-24 15:22:10'),
(675, 16, 'add', 'http://192.168.140.200/dbd_base64.html to whitelist', '2024-04-24 15:22:20'),
(676, 16, 'delete', 'Delete whitelist id : 75', '2024-04-24 15:23:55'),
(677, 16, 'delete', 'Delete whitelist id : 76', '2024-04-24 15:23:55'),
(678, 16, 'add', 'http://192.168.140.200/dbd.html to action_list', '2024-04-24 15:24:00'),
(679, 16, 'delete', 'Delete action_history id : 155', '2024-04-24 15:24:06'),
(680, 1, 'delete', 'Delete action_history id : 149', '2024-04-24 15:25:07'),
(681, 1, 'delete', 'Delete action_history id : 150', '2024-04-24 15:25:07'),
(682, 1, 'delete', 'Delete action_history id : 151', '2024-04-24 15:25:07'),
(683, 1, 'delete', 'Delete action_history id : 152', '2024-04-24 15:25:07'),
(684, 1, 'delete', 'Delete action_history id : 153', '2024-04-24 15:25:08'),
(685, 1, 'update', 'Switch user id : 15 to Disable', '2024-04-24 15:31:18'),
(686, 1, 'update', 'Switch user id : 15 to Enable', '2024-04-24 15:32:06'),
(687, 17, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:32:39'),
(688, 1, 'update', 'Switch user id : 17 to Disable', '2024-04-24 15:32:46'),
(689, 17, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:32:49'),
(690, 1, 'update', 'Switch user id : 17 to Enable', '2024-04-24 15:33:05'),
(691, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:56:59'),
(692, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:57:08'),
(693, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:57:10'),
(694, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:57:23'),
(695, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 15:57:26'),
(696, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 17:19:02'),
(697, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 17:19:54'),
(698, 16, 'add', 'https://sourceforge.net/ to whitelist', '2024-04-24 17:21:50'),
(699, 16, 'add', 'http://192.168.140.200/dbd_base64.html to whitelist', '2024-04-24 17:22:43'),
(700, 16, 'add', 'http://192.168.140.200/url_re_base64.html to whitelist', '2024-04-24 17:27:52'),
(701, 1, 'add', 'malicious_chain type:XSS code:document.cookie ', '2024-04-24 17:29:05'),
(702, 1, 'delete', 'Delete malicious_chain id : 18', '2024-04-24 17:29:32'),
(703, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 17:31:34'),
(704, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 17:32:16'),
(705, 16, 'add', 'https://github.com/wing32048/Web-Analyzer-Extension/blob/main/js/main.js to whitelist', '2024-04-24 17:32:21'),
(706, 16, 'logout', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 17:33:29'),
(707, 16, 'login', 'IP address : 192.168.140.129; Device : Computer; OS : Windows 10; Browser : Chrome', '2024-04-24 17:34:41');

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
(2, 1, 'URL redirect', 'window.open(', '2024-01-29'),
(3, 1, 'DBD', 'createObjectURL(,click(,createElement(', '2024-01-29'),
(6, 1, 'XSS', 'document.URL', '2024-04-11'),
(8, 1, 'XSS', 'document.URLUnencoded', '2024-04-11'),
(9, 1, 'XSS', 'document.baseURI', '2024-04-11'),
(11, 1, 'XSS', 'window.name', '2024-04-11'),
(12, 1, 'XSS', 'history.pushState', '2024-04-11'),
(13, 1, 'XSS', 'localStorage', '2024-04-11'),
(14, 1, 'XSS', 'sessionStorage', '2024-04-11'),
(15, 1, 'XSS', 'IndexedDB(mozIndexedDB)', '2024-04-11'),
(16, 1, 'XSS', 'IndexedDB(webkitIndexedDB)', '2024-04-11'),
(17, 1, 'XSS', 'IndexedDB(msIndexedDB)', '2024-04-11'),
(19, 1, 'XSS', 'document.referrer', '2024-04-11'),
(20, 1, 'XSS', 'history.replaceState', '2024-04-11'),
(47, 1, 'XSS', 'document.cookie', '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` enum('Y','N') NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `admin`, `status`, `date`) VALUES
(1, 'administrator@domain.com', 'administrator', '$2y$10$2/sNqriY5w8EWuPdqD6OjOP0lXPkOUrZplE8Ose8VRm6HkRZAzPTS', 'Y', 'Enable', '2024-03-20'),
(10, 'admin@domain.com', 'admin', '$2y$10$DsvsUb1YO9ZUtOxzehBjI.Dsxx4hPnpK6XShsTVSJC9cnFKgKd.BG', 'Y', 'Disable', '2024-03-20'),
(11, 'user@domain.com', 'user', '$2y$10$34P6KrJYn18kL9OdIfDCcOEmtLRJYQCf5qSfzylAOAfpMPjIIPmdW', 'N', 'Disable', '2024-03-20'),
(15, 'john@domain.com', 'john', '$2y$10$kF3GlbgnZw2I0Keg9QHfdO8ktCnWi1FWmB/4EaM0KqLUaGgpYm0l6', 'N', 'Enable', '2024-03-28'),
(16, 'lucas@domain.com', 'lucas', '$2y$10$sJFakKXn3uZkpnAgfkLy0.o9hOBi8V1han7MKUDRUUX./gZ/95jme', 'N', 'Enable', '2024-04-11'),
(17, 'ivan@domain.com', 'ivan', '$2y$10$bn8nYhhdHABGOxY8xGAXE.F8n5p1QbJmmLNGCIJq5i2wpl7OzapSi', 'N', 'Enable', '2024-04-24');

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
(77, 16, 'https://sourceforge.net/', '2024-04-24'),
(78, 16, 'http://192.168.140.200/dbd_base64.html', '2024-04-24'),
(79, 16, 'http://192.168.140.200/url_re_base64.html', '2024-04-24'),
(80, 16, 'https://github.com/wing32048/Web-Analyzer-Extension/blob/main/js/main.js', '2024-04-24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT for table `malicious_chain`
--
ALTER TABLE `malicious_chain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_history`
--
ALTER TABLE `action_history`
  ADD CONSTRAINT `action_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `malicious_chain`
--
ALTER TABLE `malicious_chain`
  ADD CONSTRAINT `malicious_chain_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `whitelist`
--
ALTER TABLE `whitelist`
  ADD CONSTRAINT `whitelist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"fyp\",\"table\":\"log\"},{\"db\":\"fyp\",\"table\":\"malicious_chain\"},{\"db\":\"fyp\",\"table\":\"whitelist\"},{\"db\":\"fyp\",\"table\":\"action_history\"},{\"db\":\"xss\",\"table\":\"stroed_xss\"},{\"db\":\"fyp\",\"table\":\"user\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-04-30 14:17:47', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
