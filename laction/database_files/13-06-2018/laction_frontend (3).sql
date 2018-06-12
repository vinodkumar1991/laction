-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 10:48 PM
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
-- Database: `laction_frontend`
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
(1, 'audition', 'dummyorder', 'LA768857', 10, 'jamuna', 'jamuna@gmail.com', '0000000000', 'male', 4, 22, NULL, NULL, NULL, '2018-02-26', '18:43:00', '22:43:00', NULL, 'inprogress', '2018-05-26 14:56:37', 10, '2018-05-26 12:56:37', NULL),
(2, 'audition', 'dummyorder', 'LA087778', 10, 'jamuna', 'jamuna@gmail.com', '0000000000', 'male', 4, 22, NULL, NULL, NULL, '2018-05-26', '17:24:00', '17:25:00', NULL, 'inprogress', '2018-05-26 15:10:05', 10, '2018-05-26 13:10:05', NULL),
(3, 'audition', 'dummyorder', 'LA087778', 10, 'jamuna', 'jamuna@gmail.com', '0000000000', 'male', 4, 22, NULL, NULL, NULL, '2018-05-26', '18:24:00', '19:24:00', NULL, 'inprogress', '2018-05-26 15:10:05', 10, '2018-05-26 13:10:05', NULL),
(4, 'audition', 'dummyorder', 'LA354301', 18, 'harsha', 'harsha@gmail.com', '6666666667', 'male', 1, 22, NULL, NULL, NULL, '2018-06-05', '00:09:00', '13:09:00', NULL, 'inprogress', '2018-06-05 07:57:54', 18, '2018-06-05 05:57:54', NULL),
(5, 'preview', 'dummyorder', 'LP', 18, 'harsha', 'hhh@hhh.in', '6666666667', NULL, NULL, NULL, 'featured', 'sdfasfasf', 'none', '2018-06-05', '19:09:00', '22:09:00', NULL, 'inprogress', '2018-06-05 07:59:19', 18, '2018-06-05 05:59:19', NULL);

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

--
-- Dumping data for table `booking_billing`
--

INSERT INTO `booking_billing` (`id`, `booking_no`, `payment_type`, `payment_method`, `bank_name`, `transaction_number`, `transaction_status`, `total_amount`, `base_amount`, `extra_minutes_amount`, `cgst_percentage`, `cgst_amount`, `payment_gateway_amount`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'LA768857', 'none', NULL, NULL, NULL, NULL, 103.50, 90.00, NULL, 15.00, 13.50, NULL, '2018-05-26 14:56:37', 10, '2018-05-26 12:56:37', NULL),
(2, 'LA087778', 'none', NULL, NULL, NULL, NULL, 346150.00, 301000.00, NULL, 15.00, 9999.99, NULL, '2018-05-26 15:10:05', 10, '2018-05-26 13:10:05', NULL),
(3, 'LA354301', 'none', NULL, NULL, NULL, NULL, 230.00, 200.00, NULL, 15.00, 30.00, NULL, '2018-06-05 07:57:54', 18, '2018-06-05 05:57:54', NULL),
(4, 'LP', 'none', NULL, NULL, NULL, NULL, 529.00, 460.00, NULL, 15.00, 69.00, NULL, '2018-06-05 07:59:19', 18, '2018-06-05 05:59:20', NULL);

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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'active, inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `status`) VALUES
(1, 'hyderabad', 'active'),
(2, 'chennai', 'active'),
(3, 'bangalore', 'active');

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

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fullname`, `email`, `phone`, `description`, `status`, `created_date`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'Meda Vinod Kumar', 'vinod@gmail.com', '1111111111', 'who are you?', 'not solv', '2018-06-03 19:41:37', '2018-06-03 17:41:37', NULL),
(2, 'NTR', 'ntr@ntr.com', '0000000000', '000000000000000000000000000000000000000  0000000000000 111111111111111111111111111111111111111111111', 'not solv', '2018-06-03 19:43:58', '2018-06-03 17:43:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` tinyint(3) UNSIGNED DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `city` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` mediumint(8) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` mediumint(8) UNSIGNED DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL COMMENT 'male, female',
  `languages` varchar(100) DEFAULT NULL,
  `height` double(5,3) DEFAULT NULL,
  `biography` mediumtext,
  `fb_link` varchar(225) DEFAULT NULL,
  `google_plus_link` varchar(225) DEFAULT NULL,
  `instagram_link` varchar(225) DEFAULT NULL,
  `linkedin_link` varchar(225) DEFAULT NULL,
  `twitter_link` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `category_id`, `fullname`, `email`, `phone`, `password`, `age`, `image`, `city`, `status`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`, `gender`, `languages`, `height`, `biography`, `fb_link`, `google_plus_link`, `instagram_link`, `linkedin_link`, `twitter_link`) VALUES
(1, NULL, 'Meda Vinod Kumar', 'vinodkumar@gmail.com', '9705999270', '12345', NULL, NULL, NULL, 'active', '2018-02-12 08:16:29', 1, '2018-02-12 02:47:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'Meda', 'vinodkumarmeda1991@gmail.com', '9502038283', '123456', NULL, NULL, NULL, 'active', '2018-02-12 08:16:29', 1, '2018-02-12 02:46:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'Meda Vinod Kumar', 'vinod@outlook.com', '1234567890', '$2y$13$XPWO/DAZpMXamWstv8tDl.vA6B.GUQgSe0Mgy9S50WWRASSSWXhAG', NULL, NULL, NULL, 'active', '2018-05-12 12:23:16', 1, '2018-05-13 18:31:16', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Meda Vinod Kumar', 'vinod@outlo1ok.com', '1234567891', '111111', NULL, NULL, NULL, 'active', '2018-05-12 12:24:22', 1, '2018-05-12 10:24:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 'Meda Vishnu Vardhan', '22@ggg.in', '2222222222', '111111', NULL, NULL, NULL, 'active', '2018-05-12 12:29:37', 1, '2018-05-12 10:29:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 'safasf', 'safas@dd.in', '1111111111', '$2y$13$SbGZ1D0iyLHLSsNQeS1De.WaPdpduIq9PIGBooM28wE7itUSMnDey', 25, NULL, 1, 'active', '2018-05-12 12:51:15', 1, '2018-06-07 13:04:28', 6, 'female', NULL, 5.900, 'Biography Is Here', NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'let me go', 'sssssssss@dddin.in', '4444444444', '$2y$13$nYS5QFET90S0IMRfjRRfreFbUyyxMoozHUO9rlZU46uAvDh6FN6Oi', NULL, NULL, NULL, 'active', '2018-05-12 12:53:22', 1, '2018-05-12 10:53:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 'Savithri', 'savithri@gmail.com', '9502038284', '$2y$13$SdybFI4T1YrATo/X6oTE8.VBgHkGaq0hL7yneZy7eduq.sNQKQZF.', NULL, NULL, NULL, 'active', '2018-05-12 12:54:16', 1, '2018-05-19 09:37:07', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 'mehabooba', '999@gg.com', '9999999999', '$2y$13$LjxJ974treAXOcX7Y/DM6.6iQxxZG8te2s9FPnbFPPCMqENhLaK/.', NULL, NULL, NULL, 'active', '2018-05-12 19:48:24', 1, '2018-05-12 17:48:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 3, 'jamuna', 'jamuna@gmail.com', '0000000000', '$2y$13$LnWqlVJPD9i20qYvVppAXOV2qJwjmkrP6DxE1C8K19g8WAr5lUM8u', 233, NULL, 1, 'active', '2018-05-13 20:44:32', 1, '2018-06-08 17:33:39', 10, 'female', 'null', 5.678, 'sample description', 'https://www.google.com/', '', '', 'https://www.google.com/l', 'https://www.google.com/ssfv'),
(12, NULL, 'sudheer', '', '6666666666', '6666666666666666666666666', NULL, NULL, NULL, 'active', '2018-05-28 21:00:32', 1, '2018-05-28 19:00:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 'mmmmmm', '', '8888888888', '$2y$13$PNnwHYcVAAKsxNrf1JNT6.3sYzVWQOErj7PjRX6SnxhALzwb/6J02', NULL, NULL, NULL, 'active', '2018-05-28 21:03:16', 1, '2018-05-28 19:07:56', 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 'dhoni', 'dhoni@dhoni.com', '1234567899', '$2y$13$9fWRmfSxtstVK42X3pUbAuWDJ4vsTeehWPx2MufRMi7U.bLRcISQW', NULL, NULL, NULL, 'active', '2018-05-28 21:13:42', 1, '2018-05-28 19:13:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 'ccccccccc', 'ccc@cc.in', '5555555555', '$2y$13$CrTtnw44h606FCn4q2G/euY549z6fhHXvfnD9FSuMTCol1AOecZaW', NULL, NULL, NULL, 'active', '2018-05-28 21:14:55', 1, '2018-05-28 19:14:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 'vvvvv', '', '3434343434', '$2y$13$Ap0PH9C7FPfYzTFDztRAUevhMYvAhcc6PFdQNN1ohkTtMu7Y6WGZS', NULL, NULL, NULL, 'active', '2018-05-31 03:20:06', 1, '2018-05-31 01:20:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 'reddy', '', '9000000009', '$2y$13$lyaAa5yzpkCldgdjqEyMUOduASvHIwkwa85GxBlQlSJYEPAsLAovi', NULL, NULL, NULL, 'active', '2018-06-03 14:29:39', 1, '2018-06-03 12:29:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 'harsha', '', '6666666667', '$2y$13$7OM5Uw./qzko62cRhDtKV.kp7UXcMfYLGypugXCzwAc1dEHN48uFC', NULL, NULL, NULL, 'active', '2018-06-05 07:38:33', 1, '2018-06-05 05:38:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `customer_id` mediumint(8) UNSIGNED DEFAULT NULL,
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
(1, 0, 'NEWRE', '1284503859', '{\"token\":\"615103\"}', 'notsend', NULL, 1, '2018-06-12 22:13:12', '2018-06-12 20:13:12', NULL),
(2, 0, 'NEWRE', '0000000000', '{\"token\":\"181837\"}', 'notsend', NULL, 1, '2018-06-12 22:20:03', '2018-06-12 20:20:03', NULL);

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
  `customer_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `token` varchar(6) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Used to store to one time usage token for different scenarios';

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `category_type`, `customer_id`, `phone`, `token`, `created_date`) VALUES
(1, 'registration', NULL, '1284503859', '615103', '2018-06-12 22:13:12'),
(2, 'registration', NULL, '0000000000', '181837', '2018-06-12 22:20:03');

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_billing`
--
ALTER TABLE `booking_billing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_logs`
--
ALTER TABLE `booking_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
