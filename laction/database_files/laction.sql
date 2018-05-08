-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 09:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laction`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'action', 'active'),
(2, 'production', 'active'),
(3, 'art', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` tinyint(3) UNSIGNED NOT NULL,
  `template_code` varchar(5) NOT NULL,
  `from_email` varchar(40) NOT NULL,
  `params` mediumtext NOT NULL,
  `to_email` varchar(40) NOT NULL,
  `cc` varchar(160) DEFAULT NULL,
  `bcc` varchar(160) DEFAULT NULL,
  `status` varchar(9) NOT NULL COMMENT 'Sent , Not Sent',
  `confirmation_token` varchar(55) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here we are going to store permissions';

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `status`) VALUES
(1, 'slots', 'active'),
(2, 'reports', 'active'),
(3, 'users', 'active'),
(4, 'notifications', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here we are going to store roles';

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'superadmin', 'active'),
(2, 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL,
  `permission` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here we are going to store role wise permissions';

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role`, `permission`, `status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(12, 'superadmin', 'notifications', 'active', '2018-01-25 20:21:11', 1, '2018-02-07 19:36:46', NULL),
(13, 'superadmin', 'reports', 'active', '2018-01-25 20:21:11', 1, '2018-02-07 19:36:45', NULL),
(14, 'superadmin', 'slots', 'active', '2018-01-25 20:21:11', 1, '2018-01-25 19:21:11', NULL),
(15, 'superadmin', 'users', 'active', '2018-01-25 20:21:11', 1, '2018-02-07 19:36:43', NULL),
(16, 'admin', 'users', 'active', '2018-01-25 20:22:10', 1, '2018-02-07 19:25:00', NULL),
(17, 'admin', 'slots', 'inactive', '2018-01-25 20:22:10', 1, '2018-02-07 19:33:13', NULL),
(18, 'admin', 'notifications', 'active', '2018-02-07 20:19:07', 1, '2018-02-07 19:33:02', 1),
(19, 'admin', 'reports', 'active', '2018-02-07 20:33:06', 1, '2018-02-07 19:33:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `senderids`
--

CREATE TABLE `senderids` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `message_type` varchar(5) NOT NULL COMMENT 'Sms, Email',
  `category_type` varchar(13) NOT NULL COMMENT 'Transactional, Promotional',
  `subject` varchar(140) NOT NULL,
  `route` tinyint(2) DEFAULT NULL COMMENT 'message sending route numbers like 4 and 1 in MSG91',
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here we are going to store only subjects of email or sms';

--
-- Dumping data for table `senderids`
--

INSERT INTO `senderids` (`id`, `message_type`, `category_type`, `subject`, `route`, `status`, `sync`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'sms', 'transactional', 'LASFGP', 4, 'active', 'false', '2018-02-10 20:03:28', 1, '2018-02-10 19:03:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` mediumint(6) UNSIGNED NOT NULL,
  `category_type` varchar(8) NOT NULL COMMENT 'Preview, Audition',
  `event_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains both dubbing and audition slots.';

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `category_type`, `event_date`, `from_time`, `to_time`, `amount`, `status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'audition', '2018-02-25', '20:08:00', '23:08:00', 200.00, 'active', '2018-02-24 13:59:35', 1, '2018-03-03 14:38:23', 1),
(2, 'audition', '2018-02-25', '20:08:00', '21:08:00', 300.00, 'inactive', '2018-02-24 13:59:35', 1, '2018-03-03 14:38:23', 1),
(3, 'audition', '2018-02-25', '20:08:00', '22:08:00', 1200.00, 'active', '2018-02-24 14:03:00', 1, '2018-03-03 14:38:23', 1),
(4, 'preview', '2018-02-25', '20:29:00', '22:29:00', 890.00, 'active', '2018-02-24 14:03:00', 1, '2018-02-24 13:03:00', 1),
(5, 'audition', '2018-02-26', '18:43:00', '22:43:00', 90.00, 'active', '2018-02-24 14:14:04', 1, '2018-02-24 13:14:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slot_extra_hours`
--

CREATE TABLE `slot_extra_hours` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `category_type` varchar(8) NOT NULL COMMENT 'Preview, Audition',
  `minutes` time NOT NULL COMMENT 'For 15 Minutes, For 30 Minutes, For 45 Minutes, For 60 Minutes (Maximum Should be 60 Minutes Only)',
  `amount` double(6,2) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `effective_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` tinyint(3) UNSIGNED NOT NULL,
  `template_code` varchar(5) NOT NULL,
  `mobile_number` varchar(55) NOT NULL,
  `params` varchar(500) NOT NULL,
  `status` varchar(9) NOT NULL COMMENT 'Sent, Not Sent',
  `confirmation_token` varchar(55) DEFAULT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `user_id`, `template_code`, `mobile_number`, `params`, `status`, `confirmation_token`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`) VALUES
(1, 1, 'FGPWD', '9502038283', '{\"token\":\"604725\"}', 'sent', '38626c61796e393530393337', 1, '2018-02-11 10:54:10', '2018-02-11 19:55:16', NULL),
(2, 1, 'FGPWD', '9705999270', '{\"token\":\"221762\"}', 'sent', '38626c617774313730363637', 1, '2018-02-11 11:05:35', '2018-02-11 19:53:21', NULL),
(3, 1, 'FGPWD', '9705999270', '{\"token\":\"063332\"}', 'sent', '38626c617774373236363333', 1, '2018-02-11 11:11:48', '2018-02-11 19:53:22', NULL),
(4, 1, 'FGPWD', '9705999270', '{\"token\":\"743778\"}', 'sent', '38626c617774343636303834', 1, '2018-02-11 11:12:26', '2018-02-11 19:53:22', NULL),
(5, 1, 'FGPWD', '9705999270', '{\"token\":\"337181\"}', 'sent', '38626c617775313932363133', 1, '2018-02-11 11:42:09', '2018-02-11 19:53:22', NULL),
(6, 1, 'FGPWD', '9705999270', '{\"token\":\"136231\"}', 'sent', '38626c617775303336343838', 1, '2018-02-11 11:43:48', '2018-02-11 19:53:23', NULL),
(7, 1, 'FGPWD', '9705999270', '{\"token\":\"884244\"}', 'sent', '38626c617775343235393031', 1, '2018-02-11 11:50:02', '2018-02-11 19:53:23', NULL),
(8, 1, 'FGPWD', '9705999270', '{\"token\":\"183202\"}', 'sent', '38626c617776393130373739', 1, '2018-02-11 11:59:31', '2018-02-11 19:53:23', NULL),
(9, 1, 'FGPWD', '9705999270', '{\"token\":\"115142\"}', 'sent', '38626c617776333832363832', 1, '2018-02-11 13:05:23', '2018-02-11 19:53:24', NULL),
(10, 1, 'FGPWD', '9705999270', '{\"token\":\"600525\"}', 'sent', '38626c617776383433383130', 1, '2018-02-11 13:06:37', '2018-02-11 19:53:24', NULL),
(11, 1, 'FGPWD', '9705999270', '{\"token\":\"802077\"}', 'sent', '38626c617777383337363930', 1, '2018-02-11 13:09:00', '2018-02-11 19:53:24', NULL),
(12, 1, 'FGPWD', '9705999270', '{\"token\":\"113120\"}', 'sent', '38626c617777373737383930', 1, '2018-02-11 13:11:04', '2018-02-11 19:53:25', NULL),
(13, 1, 'FGPWD', '9705999270', '{\"token\":\"843461\"}', 'sent', '38626c617778383839323136', 1, '2018-02-11 13:11:22', '2018-02-11 19:53:25', NULL),
(14, 1, 'FGPWD', '9705999270', '{\"token\":\"847678\"}', 'sent', '38626c617778363938303738', 1, '2018-02-11 13:12:15', '2018-02-11 19:53:26', NULL),
(15, 1, 'FGPWD', '9705999270', '{\"token\":\"105342\"}', 'sent', '38626c617778323735313337', 1, '2018-02-11 13:12:49', '2018-02-11 19:53:26', NULL),
(16, 1, 'FGPWD', '9705999270', '{\"token\":\"856824\"}', 'sent', '38626c617779383630383336', 1, '2018-02-11 13:13:20', '2018-02-11 19:53:26', NULL),
(17, 1, 'FGPWD', '9705999270', '{\"token\":\"310556\"}', 'sent', '38626c617779393935363330', 1, '2018-02-11 13:14:45', '2018-02-11 19:53:27', NULL),
(18, 1, 'FGPWD', '9705999270', '{\"token\":\"665343\"}', 'sent', '38626c617779313732393736', 1, '2018-02-11 13:15:45', '2018-02-11 19:53:27', NULL),
(19, 1, 'FGPWD', '9705999270', '{\"token\":\"513384\"}', 'sent', '38626c61777a333639343738', 1, '2018-02-11 13:16:15', '2018-02-11 19:53:27', NULL),
(20, 1, 'FGPWD', '9705999270', '{\"token\":\"462450\"}', 'sent', '38626c61777a373137313635', 1, '2018-02-11 13:18:55', '2018-02-11 19:53:28', NULL),
(21, 1, 'FGPWD', '9705999270', '{\"token\":\"586215\"}', 'sent', '38626c61777a353838343532', 1, '2018-02-11 13:20:52', '2018-02-11 19:53:28', NULL),
(22, 1, 'FGPWD', '9705999270', '{\"token\":\"147085\"}', 'sent', '38626c617741303336303431', 1, '2018-02-11 13:21:29', '2018-02-11 19:53:28', NULL),
(23, 1, 'FGPWD', '9705999270', '{\"token\":\"030741\"}', 'sent', '38626c617741353530383039', 1, '2018-02-11 13:25:44', '2018-02-11 19:53:29', NULL),
(24, 1, 'FGPWD', '9705999270', '{\"token\":\"624011\"}', 'sent', '38626c617741333332323530', 1, '2018-02-11 18:22:28', '2018-02-11 19:53:29', NULL),
(25, 1, 'FGPWD', '9705999270', '{\"token\":\"618346\"}', 'sent', '38626c617742313739313137', 1, '2018-02-11 18:26:37', '2018-02-11 19:53:29', NULL),
(26, 1, 'FGPWD', '9705999270', '{\"token\":\"637014\"}', 'notsend', NULL, 1, '2018-02-11 21:02:30', '2018-02-11 20:02:30', NULL),
(27, 1, 'FGPWD', '9705999270', '{\"token\":\"421418\"}', 'notsend', NULL, 1, '2018-02-15 19:53:40', '2018-02-15 18:53:40', NULL),
(28, 1, 'FGPWD', '9705999270', '{\"token\":\"158445\"}', 'notsend', NULL, 1, '2018-02-15 20:02:10', '2018-02-15 19:02:10', NULL),
(29, 1, 'FGPWD', '9705999270', '{\"token\":\"058387\"}', 'notsend', NULL, 1, '2018-02-24 10:54:27', '2018-02-24 09:54:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_name`, `name`, `status`) VALUES
(1, 'art', 'rubbers', 'active'),
(2, 'art', 'painter', 'active'),
(3, 'production', 'producer', 'active'),
(4, 'production', 'assistant producer', 'active'),
(5, 'production', 'rubber', 'inactive'),
(6, 'action', 'action sub', 'active'),
(7, 'action', 'rubber', 'active'),
(8, 'production', 'rubberdd', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `message_type` varchar(5) NOT NULL COMMENT 'Sms, Email',
  `from_email` varchar(40) DEFAULT NULL,
  `senderid_id` tinyint(3) NOT NULL,
  `code` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT 'Customer Registration, Forgot Password and etc..',
  `template` mediumtext NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here we are going to store body of the message';

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `message_type`, `from_email`, `senderid_id`, `code`, `name`, `template`, `description`, `status`, `sync`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'sms', NULL, 1, 'FGPWD', 'Forgot Password', '{{token}} is your code for forgot password', 'Forgot password template.', 'active', 'false', '2018-02-10 20:04:32', 1, '2018-02-11 09:24:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `category_type` varchar(15) NOT NULL,
  `user_id` tinyint(3) UNSIGNED NOT NULL,
  `token` varchar(6) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `category_type`, `user_id`, `token`, `created_date`) VALUES
(1, 'forgotpassword', 1, '624011', '2018-02-11 18:22:28'),
(2, 'forgotpassword', 1, '618346', '2018-02-11 18:26:36'),
(3, 'forgotpassword', 1, '637014', '2018-02-11 21:02:30'),
(4, 'forgotpassword', 1, '421418', '2018-02-15 19:53:40'),
(5, 'forgotpassword', 1, '158445', '2018-02-15 20:02:10'),
(6, 'forgotpassword', 1, '058387', '2018-02-24 10:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `file_type` varchar(5) NOT NULL COMMENT 'image, video',
  `file_link` varchar(225) DEFAULT NULL,
  `publish_date` datetime NOT NULL,
  `status` varchar(9) NOT NULL COMMENT 'publish, unpublish',
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_type`, `file_link`, `publish_date`, `status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(2, 'video', 'https://www.youtube.com/watch?v=cZXrYAF_sh8&list=RDMMcZXrYAF_sh8', '2018-01-04 09:25:00', 'active', '2018-01-04 16:59:25', 1, '2018-01-04 15:59:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `role_id` tinyint(2) UNSIGNED NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `created_date` datetime NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `role_id`, `role_name`, `password`, `email`, `phone`, `image`, `status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'Laction Studios', 1, 'superadmin', '$2y$13$tPAMIYOwfcr3CUmNgiQP4.2wUEg2uzCXPuDRBP6lgIyslU3wrkxsu', 'superadmin@lactionstudio.com', '9705999270', NULL, 'active', '2018-01-18 15:39:36', 1, '2018-02-24 09:55:44', NULL),
(2, 'Meda Vinod Kumar', 2, 'admin', '$2y$13$b/ggHTWiEX.XRGUXQMMuhOAISxMkF00f5QCftYzx.fVQHS6tqpIPu', '', '1234567893', NULL, 'active', '2018-02-03 19:23:52', 1, '2018-02-10 13:33:18', 1),
(3, 'Raviteja', 2, 'admin', '$2y$13$rxqsdOYidjEJd7mymMNQb.twcQjqK1z1zgbWC2WJG2GwacaBwWEFa', 'raviteja@ctel.in', '1234567899', NULL, 'active', '2018-02-03 19:29:25', 1, '2018-02-03 18:30:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senderids`
--
ALTER TABLE `senderids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot_extra_hours`
--
ALTER TABLE `slot_extra_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `senderids`
--
ALTER TABLE `senderids`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slot_extra_hours`
--
ALTER TABLE `slot_extra_hours`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
