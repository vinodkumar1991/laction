-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 10:35 PM
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
-- Database: `laction_customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_type` varchar(8) NOT NULL COMMENT 'Preview, Audition',
  `booking_type` varchar(15) NOT NULL COMMENT 'dummyorder, genuineorder',
  `booking_no` varchar(8) NOT NULL,
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(5) DEFAULT NULL COMMENT 'Male,Female,Other',
  `sub_category_id` smallint(5) UNSIGNED DEFAULT NULL,
  `age` tinyint(2) UNSIGNED DEFAULT NULL,
  `film_type` varchar(10) DEFAULT NULL COMMENT 'personal,featured,short',
  `film_name` varchar(100) DEFAULT NULL,
  `film_censor` varchar(5) DEFAULT NULL,
  `event_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `extra_minutes` time DEFAULT NULL,
  `booking_status` varchar(10) NOT NULL COMMENT 'confirmed,cancelled,closed,extended',
  `created_date` datetime NOT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `category_type`, `booking_type`, `booking_no`, `customer_id`, `fullname`, `email`, `phone`, `gender`, `sub_category_id`, `age`, `film_type`, `film_name`, `film_censor`, `event_date`, `from_time`, `to_time`, `extra_minutes`, `booking_status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'audition', 'genuineorder', 'LP000001', 1, NULL, 'vinod@gmail.com', '9705999270', NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-13', '09:00:00', '12:00:00', '00:00:12', 'closed', '2018-02-12 10:08:24', 1, '2018-02-12 04:50:11', NULL),
(2, 'preview', 'dummyorder', 'LA000002', 1, NULL, 'vinodm@gmail.com', '9502038283', NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-20', '08:00:00', '13:30:00', '00:00:00', 'confirmed', '2018-02-12 10:09:21', 1, '2018-05-19 19:29:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_billing`
--

CREATE TABLE `booking_billing` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_no` varchar(8) NOT NULL,
  `payment_type` varchar(11) DEFAULT NULL COMMENT 'payatstudio,online',
  `payment_method` varchar(10) DEFAULT NULL COMMENT 'netbanking, debitcard, creditcard, paytm',
  `bank_name` varchar(55) DEFAULT NULL,
  `transaction_number` varchar(55) DEFAULT NULL,
  `transaction_status` varchar(100) DEFAULT NULL,
  `total_amount` double(8,2) NOT NULL,
  `base_amount` double(8,2) NOT NULL,
  `extra_minutes_amount` double(6,2) DEFAULT NULL,
  `cgst_percentage` double(4,2) NOT NULL,
  `cgst_amount` double(6,2) NOT NULL,
  `payment_gateway_amount` double(4,2) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_logs`
--

CREATE TABLE `booking_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_type` varchar(7) NOT NULL COMMENT 'Booking, Billing',
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'solved, not sloved, delete',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(8) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `phone`, `password`, `status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'Meda Vinod Kumar', 'vinodkumar@gmail.com', '9705999270', '12345', 'active', '2018-02-12 08:16:29', 1, '2018-02-12 02:47:03', NULL),
(2, 'Meda', 'vinodkumarmeda1991@gmail.com', '9502038283', '123456', 'active', '2018-02-12 08:16:29', 1, '2018-02-12 02:46:29', NULL),
(3, 'Meda Vinod Kumar', 'vinod@outlook.com', '1234567890', '$2y$13$XPWO/DAZpMXamWstv8tDl.vA6B.GUQgSe0Mgy9S50WWRASSSWXhAG', 'active', '2018-05-12 12:23:16', 1, '2018-05-13 18:31:16', 3),
(4, 'Meda Vinod Kumar', 'vinod@outlo1ok.com', '1234567891', '111111', 'active', '2018-05-12 12:24:22', 1, '2018-05-12 10:24:23', NULL),
(5, 'Meda Vishnu Vardhan', '22@ggg.in', '2222222222', '111111', 'active', '2018-05-12 12:29:37', 1, '2018-05-12 10:29:37', NULL),
(6, 'safasf', 'safas@dd.in', '1111111111', '$2y$13$N/mjYFUkVSHXUGD8cHXJce56i/hA0OyzJSmvjg/sFyMhCy83stYpO', 'active', '2018-05-12 12:51:15', 1, '2018-05-12 10:51:17', NULL),
(7, 'let me go', 'sssssssss@dddin.in', '4444444444', '$2y$13$nYS5QFET90S0IMRfjRRfreFbUyyxMoozHUO9rlZU46uAvDh6FN6Oi', 'active', '2018-05-12 12:53:22', 1, '2018-05-12 10:53:23', NULL),
(8, 'Savithri', 'savithri@gmail.com', '9502038284', '$2y$13$SdybFI4T1YrATo/X6oTE8.VBgHkGaq0hL7yneZy7eduq.sNQKQZF.', 'active', '2018-05-12 12:54:16', 1, '2018-05-19 09:37:07', 8),
(9, 'mehabooba', '999@gg.com', '9999999999', '$2y$13$LjxJ974treAXOcX7Y/DM6.6iQxxZG8te2s9FPnbFPPCMqENhLaK/.', 'active', '2018-05-12 19:48:24', 1, '2018-05-12 17:48:25', NULL),
(10, 'jamuna', 'jamuna@gmail.com', '0000000000', '$2y$13$Y1WgX2f9vQpxBlysbijYZew0TTajMP0i0g11ivorfM5eLpdya55N2', 'active', '2018-05-13 20:44:32', 1, '2018-05-13 18:46:09', 10);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `template_code` varchar(5) NOT NULL,
  `from_email` varchar(40) NOT NULL,
  `params` mediumtext NOT NULL,
  `to_email` varchar(40) NOT NULL,
  `cc` varchar(160) DEFAULT NULL,
  `bcc` varchar(160) DEFAULT NULL,
  `status` varchar(9) NOT NULL COMMENT 'Sent , Not Sent',
  `confirmation_token` varchar(55) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'sms', 'transactional', 'NEWUSR', 4, 'active', '', '2017-12-29 17:57:04', 1, '2017-12-29 11:27:04', 0),
(2, 'email', 'transactional', 'NEWUSR', NULL, 'active', '', '2018-01-02 15:37:31', 1, '2018-01-02 09:07:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `template_code` varchar(5) NOT NULL,
  `mobile_number` varchar(55) NOT NULL,
  `params` varchar(500) NOT NULL,
  `status` varchar(9) NOT NULL COMMENT 'Sent, Not Sent',
  `confirmation_token` varchar(55) DEFAULT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `customer_id`, `template_code`, `mobile_number`, `params`, `status`, `confirmation_token`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`) VALUES
(1, 3, 'FGPWD', '1234567890', '{\"token\":\"040676\"}', 'notsend', NULL, 1, '2018-05-13 19:28:33', '2018-05-13 17:28:33', NULL),
(2, 3, 'FGPWD', '1234567890', '{\"token\":\"142764\"}', 'notsend', NULL, 1, '2018-05-13 19:36:10', '2018-05-13 17:36:10', NULL),
(3, 3, 'FGPWD', '1234567890', '{\"token\":\"384712\"}', 'notsend', NULL, 1, '2018-05-13 19:38:08', '2018-05-13 17:38:08', NULL),
(4, 3, 'FGPWD', '1234567890', '{\"token\":\"658868\"}', 'notsend', NULL, 1, '2018-05-13 19:39:28', '2018-05-13 17:39:28', NULL),
(5, 3, 'FGPWD', '1234567890', '{\"token\":\"776713\"}', 'notsend', NULL, 1, '2018-05-13 19:40:45', '2018-05-13 17:40:45', NULL),
(6, 3, 'FGPWD', '1234567890', '{\"token\":\"786120\"}', 'notsend', NULL, 1, '2018-05-13 19:41:05', '2018-05-13 17:41:05', NULL),
(7, 3, 'FGPWD', '1234567890', '{\"token\":\"836351\"}', 'notsend', NULL, 1, '2018-05-13 19:42:18', '2018-05-13 17:42:18', NULL),
(8, 3, 'FGPWD', '1234567890', '{\"token\":\"002276\"}', 'notsend', NULL, 1, '2018-05-13 19:44:00', '2018-05-13 17:44:00', NULL),
(9, 3, 'FGPWD', '1234567890', '{\"token\":\"185231\"}', 'notsend', NULL, 1, '2018-05-13 19:44:42', '2018-05-13 17:44:42', NULL),
(10, 3, 'FGPWD', '1234567890', '{\"token\":\"508372\"}', 'notsend', NULL, 1, '2018-05-13 19:44:58', '2018-05-13 17:44:58', NULL),
(11, 3, 'FGPWD', '1234567890', '{\"token\":\"705828\"}', 'notsend', NULL, 1, '2018-05-13 19:45:46', '2018-05-13 17:45:46', NULL),
(12, 3, 'FGPWD', '1234567890', '{\"token\":\"350683\"}', 'notsend', NULL, 1, '2018-05-13 19:46:08', '2018-05-13 17:46:08', NULL),
(13, 3, 'FGPWD', '1234567890', '{\"token\":\"512332\"}', 'notsend', NULL, 1, '2018-05-13 19:48:13', '2018-05-13 17:48:13', NULL),
(14, 3, 'FGPWD', '1234567890', '{\"token\":\"546806\"}', 'notsend', NULL, 1, '2018-05-13 19:48:39', '2018-05-13 17:48:39', NULL),
(15, 3, 'FGPWD', '1234567890', '{\"token\":\"054467\"}', 'notsend', NULL, 1, '2018-05-13 19:49:26', '2018-05-13 17:49:26', NULL),
(16, 3, 'FGPWD', '1234567890', '{\"token\":\"023378\"}', 'notsend', NULL, 1, '2018-05-13 20:01:18', '2018-05-13 18:01:18', NULL),
(17, 3, 'FGPWD', '1234567890', '{\"token\":\"354677\"}', 'notsend', NULL, 1, '2018-05-13 20:05:16', '2018-05-13 18:05:16', NULL),
(18, 3, 'FGPWD', '1234567890', '{\"token\":\"480843\"}', 'notsend', NULL, 1, '2018-05-13 20:24:11', '2018-05-13 18:24:11', NULL),
(19, 3, 'FGPWD', '1234567890', '{\"token\":\"822228\"}', 'notsend', NULL, 1, '2018-05-13 20:29:48', '2018-05-13 18:29:48', NULL),
(20, 8, 'FGPWD', '9502038284', '{\"token\":\"305163\"}', 'notsend', NULL, 1, '2018-05-13 20:41:10', '2018-05-13 18:41:10', NULL),
(21, 8, 'FGPWD', '9502038284', '{\"token\":\"453733\"}', 'notsend', NULL, 1, '2018-05-13 20:42:22', '2018-05-13 18:42:22', NULL),
(22, 10, 'FGPWD', '0000000000', '{\"token\":\"506777\"}', 'notsend', NULL, 1, '2018-05-13 20:45:30', '2018-05-13 18:45:30', NULL),
(23, 8, 'FGPWD', '9502038284', '{\"token\":\"205050\"}', 'notsend', NULL, 1, '2018-05-19 11:36:37', '2018-05-19 09:36:37', NULL);

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
(1, 'sms', NULL, 1, 'NEWRE', 'User Registration', '{{otp}} is your verification code.', 'Hi Hello Please check it.', 'active', '', '2018-01-02 17:11:45', 1, '2018-01-02 10:41:45', 0),
(2, 'sms', 'info@lactionstudio.com', 1, 'NEWRG', 'User Registration', '<div><p>abc</p></div>', 'Hi Hello Please check it.', 'active', '', '2018-01-02 17:13:19', 1, '2018-01-02 10:43:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `category_type` varchar(15) NOT NULL COMMENT 'forgotpassword, loginotp',
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `token` varchar(6) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Used to store to one time usage token for different scenarios';

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `category_type`, `customer_id`, `token`, `created_date`) VALUES
(1, 'forgotpassword', 3, '040676', '2018-05-13 19:28:33'),
(2, 'forgotpassword', 3, '142764', '2018-05-13 19:36:10'),
(3, 'forgotpassword', 3, '384712', '2018-05-13 19:38:08'),
(4, 'forgotpassword', 3, '658868', '2018-05-13 19:39:27'),
(5, 'forgotpassword', 3, '776713', '2018-05-13 19:40:45'),
(6, 'forgotpassword', 3, '786120', '2018-05-13 19:41:04'),
(7, 'forgotpassword', 3, '836351', '2018-05-13 19:42:18'),
(8, 'forgotpassword', 3, '002276', '2018-05-13 19:44:00'),
(9, 'forgotpassword', 3, '185231', '2018-05-13 19:44:42'),
(10, 'forgotpassword', 3, '508372', '2018-05-13 19:44:58'),
(11, 'forgotpassword', 3, '705828', '2018-05-13 19:45:45'),
(12, 'forgotpassword', 3, '350683', '2018-05-13 19:46:08'),
(13, 'forgotpassword', 3, '512332', '2018-05-13 19:48:13'),
(14, 'forgotpassword', 3, '546806', '2018-05-13 19:48:38'),
(15, 'forgotpassword', 3, '054467', '2018-05-13 19:49:26'),
(16, 'forgotpassword', 3, '023378', '2018-05-13 20:01:18'),
(17, 'forgotpassword', 3, '354677', '2018-05-13 20:05:16'),
(18, 'forgotpassword', 3, '480843', '2018-05-13 20:24:11'),
(19, 'forgotpassword', 3, '822228', '2018-05-13 20:29:48'),
(20, 'forgotpassword', 8, '305163', '2018-05-13 20:41:10'),
(21, 'forgotpassword', 8, '453733', '2018-05-13 20:42:21'),
(22, 'forgotpassword', 10, '506777', '2018-05-13 20:45:30'),
(23, 'forgotpassword', 8, '205050', '2018-05-19 11:36:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_billing`
--
ALTER TABLE `booking_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_logs`
--
ALTER TABLE `booking_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senderids`
--
ALTER TABLE `senderids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_billing`
--
ALTER TABLE `booking_billing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_logs`
--
ALTER TABLE `booking_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `senderids`
--
ALTER TABLE `senderids`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
