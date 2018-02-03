-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 01:53 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
(12, 'superadmin', 'notifications', 'active', '2018-01-25 20:21:11', 1, '2018-01-25 19:21:11', NULL),
(13, 'superadmin', 'reports', 'active', '2018-01-25 20:21:11', 1, '2018-01-25 19:21:11', NULL),
(14, 'superadmin', 'slots', 'active', '2018-01-25 20:21:11', 1, '2018-01-25 19:21:11', NULL),
(15, 'superadmin', 'users', 'active', '2018-01-25 20:21:11', 1, '2018-01-25 19:21:11', NULL),
(16, 'admin', 'slots', 'active', '2018-01-25 20:22:10', 1, '2018-01-25 19:22:10', NULL),
(17, 'admin', 'users', 'active', '2018-01-25 20:22:10', 1, '2018-01-25 19:22:10', NULL);

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
(1, 'sms', 'transactional', 'NEWREG', 4, 'active', 'false', '2018-01-26 12:16:36', 1, '2018-01-26 11:16:37', NULL),
(2, 'email', 'transactional', 'New Customer Process', NULL, 'active', 'false', '2018-01-26 12:16:55', 1, '2018-01-26 11:30:46', 1),
(3, 'sms', 'promotional', 'NEWREG', 1, 'active', 'false', '2018-01-26 12:17:12', 1, '2018-01-26 11:17:12', NULL);

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
(41, 'audition', '2003-01-18', '10:25:00', '11:00:00', 200.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(42, 'audition', '2003-01-18', '12:45:00', '13:30:00', 300.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(43, 'audition', '2003-01-18', '14:00:00', '15:45:00', 400.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(44, 'audition', '2003-01-18', '06:30:00', '09:30:00', 500.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(45, 'audition', '2004-01-18', '14:00:00', '15:45:00', 400.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(46, 'audition', '2004-01-18', '06:30:00', '09:30:00', 500.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(47, 'audition', '2005-01-18', '14:00:00', '15:45:00', 400.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(48, 'audition', '2005-01-18', '06:30:00', '09:30:00', 500.00, 'inactive', '2018-01-03 20:57:44', 1, '2018-01-03 19:58:48', 0),
(49, 'dubbing', '2003-01-18', '10:25:00', '11:00:00', 20.00, 'active', '2018-01-03 20:58:27', 1, '2018-01-03 19:58:27', 0),
(50, 'dubbing', '2003-01-18', '12:45:00', '13:30:00', 29.00, 'active', '2018-01-03 20:58:27', 1, '2018-01-03 19:58:27', 0),
(51, 'dubbing', '2003-01-18', '14:00:00', '15:45:00', 40.00, 'active', '2018-01-03 20:58:27', 1, '2018-01-03 19:58:27', 0),
(52, 'dubbing', '2003-01-18', '06:30:00', '09:30:00', 100.00, 'active', '2018-01-03 20:58:27', 1, '2018-01-03 19:58:27', 0),
(53, 'audition', '2003-01-18', '10:25:00', '11:00:00', 200.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(54, 'audition', '2003-01-18', '12:45:00', '13:30:00', 300.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(55, 'audition', '2003-01-18', '14:00:00', '15:45:00', 400.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(56, 'audition', '2003-01-18', '06:30:00', '09:30:00', 500.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(57, 'audition', '2004-01-18', '14:00:00', '15:45:00', 400.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(58, 'audition', '2004-01-18', '06:30:00', '09:30:00', 500.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(59, 'audition', '2005-01-18', '14:00:00', '15:45:00', 400.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0),
(60, 'audition', '2005-01-18', '06:30:00', '09:30:00', 500.00, 'active', '2018-01-03 20:58:48', 1, '2018-01-03 19:58:48', 0);

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
(1, 'sms', NULL, 1, 'NEWRE', 'User Registration', '{{otp}} is your verification code.', 'Hi Hello Please check it.', 'active', '', '2018-01-02 17:11:45', 1, '2018-01-02 16:11:45', 0),
(2, 'sms', 'info@lactionstudio.com', 1, 'NEWRG', 'User Registration', '<div><p>abc</p></div>', 'Hi Hello Please check it.', 'active', '', '2018-01-02 17:13:19', 1, '2018-01-02 16:13:19', 0);

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
(1, 'forgotpassword', 1, '507333', '2018-01-04 20:23:11'),
(2, 'forgotpassword', 1, '505322', '2018-01-04 20:24:43'),
(3, 'forgotpassword', 1, '786322', '2018-01-04 20:24:52');

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
(1, 'Laction Studios', 1, 'superadmin', '$2y$13$rxqsdOYidjEJd7mymMNQb.twcQjqK1z1zgbWC2WJG2GwacaBwWEFa', 'superadmin@lactionstudio.com', '1234567890', NULL, 'active', '2018-01-18 15:39:36', 1, '2018-01-18 10:58:58', NULL);

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
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `senderids`
--
ALTER TABLE `senderids`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `slot_extra_hours`
--
ALTER TABLE `slot_extra_hours`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
