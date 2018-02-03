-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 09:01 PM
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
-- Database: `whtnxt`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `category` varchar(10) NOT NULL COMMENT 'board, university',
  `name` varchar(75) NOT NULL,
  `certificate` varchar(5) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `state_name`, `category`, `name`, `certificate`, `status`, `sync`, `created_date`, `last_modified_date`) VALUES
(1, 'Andhra Pradhesh', 'board ', 'Andhra Pradhesh Board Of Intermediate Education', 'BIE', 'active', 'false', '2017-12-07 20:17:36', '2018-01-20 16:17:54'),
(2, 'Telangana', 'board ', 'Telangana State Board Of Intermediate Education', 'BIE', 'active', 'false', '2017-12-07 20:17:36', '2018-01-20 16:17:58'),
(3, 'Tamilanadu', 'board ', 'Tamil Nadu Higher Secondary Examination Board', 'HSCC', 'active', 'false', '2017-12-07 20:17:36', '2018-01-20 16:18:02'),
(4, 'Kerala', 'board', 'Kerala Higher Secondary Examination Board', 'HSLC', 'active', 'false', '2017-12-07 20:17:36', '2018-01-20 16:19:40'),
(5, 'Karnataka', 'board', 'Pre-University Examination Board', 'PUC', 'active', 'false', '2017-12-07 20:17:36', '2018-01-20 16:18:11'),
(6, 'Andhra Pradhesh', 'board', 'Intermediate Board', 'IB', 'active', 'false', '2018-01-20 18:15:12', '2018-01-20 17:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(6) UNSIGNED NOT NULL,
  `stream_id` smallint(4) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `short_name` varchar(7) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `stream_id`, `name`, `short_name`, `status`, `sync`, `created_date`, `last_modified_date`) VALUES
(1, 1, 'Computer Science And Engineering', 'CSE', 'active', 'false', '2018-01-16 21:02:25', '2018-01-16 15:32:25'),
(2, 2, 'CIVIL Engineering', 'CIVIL', 'active', 'false', '2018-01-16 21:02:25', '2018-01-16 15:32:25'),
(3, 2, 'Information Technology', 'IT', 'active', 'false', '2018-01-16 21:28:27', '2018-01-16 15:58:27'),
(4, 2, 'Electrical And Electronics Engineering', 'EEE', 'active', 'false', '2018-01-16 21:28:27', '2018-01-16 15:58:27'),
(5, 2, 'Electrical And Communication Engineering', 'ECE', 'active', 'false', '2018-01-16 21:28:27', '2018-01-16 15:58:27'),
(6, 1, 'Computer Science And Engineerings', 'CSE', 'active', '', '0000-00-00 00:00:00', '2018-01-17 07:21:47'),
(8, 2, 'CIVIL Engineerings', 'CIVIL', 'active', 'false', '2018-01-17 08:26:06', '2018-01-17 07:26:06'),
(9, 6, 'vind', 'vnd', 'active', 'false', '2018-01-17 14:53:38', '2018-01-17 13:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `category_type` varchar(8) NOT NULL COMMENT 'State, District, Mandal, City, Village',
  `state_name` varchar(30) NOT NULL,
  `district_name` varchar(55) DEFAULT NULL,
  `city_name` varchar(55) DEFAULT NULL,
  `mandal_name` varchar(55) DEFAULT NULL,
  `village_name` varchar(55) DEFAULT NULL,
  `latitude` double(15,11) DEFAULT NULL,
  `longitude` double(15,11) DEFAULT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='It containts States, Districts, Cities, Mandals and Villages Data';

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `category_type`, `state_name`, `district_name`, `city_name`, `mandal_name`, `village_name`, `latitude`, `longitude`, `status`, `sync`, `created_date`, `last_modified_date`) VALUES
(1, 'state', 'Andhra Pradhesh', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'false', '2018-01-20 21:46:01', '2018-01-20 16:16:01'),
(2, 'state', 'Telangana', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'false', '2018-01-20 21:46:01', '2018-01-20 16:16:01'),
(3, 'state', 'Tamilanadu', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'false', '2018-01-20 21:46:01', '2018-01-20 16:16:01'),
(4, 'state', 'Kerala', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'false', '2018-01-20 21:46:01', '2018-01-20 16:16:01'),
(5, 'state', 'Karnataka', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'false', '2018-01-20 21:46:01', '2018-01-20 16:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `next_route`
--

CREATE TABLE `next_route` (
  `id` int(6) UNSIGNED NOT NULL,
  `parent_stream` smallint(4) NOT NULL,
  `child_stream` smallint(4) NOT NULL,
  `is_suggested` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sync` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `next_route`
--

INSERT INTO `next_route` (`id`, `parent_stream`, `child_stream`, `is_suggested`, `status`, `sync`, `created_date`, `last_modified_date`) VALUES
(1, 5, 6, 1, 1, 2, '2017-12-10 19:27:40', '2017-12-10 18:27:40'),
(2, 5, 1, 2, 1, 2, '2017-12-10 19:27:40', '2017-12-10 18:27:40'),
(3, 1, 8, 1, 1, 2, '2017-12-10 19:27:40', '2017-12-10 18:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Here we are going to store permissions';

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
  `id` smallint(4) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL,
  `permission` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `created_date` datetime NOT NULL,
  `created_by` smallint(5) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here we are going to store role wise permissions';

-- --------------------------------------------------------

--
-- Table structure for table `seminary`
--

CREATE TABLE `seminary` (
  `id` int(6) UNSIGNED NOT NULL,
  `location_id` mediumint(8) UNSIGNED NOT NULL,
  `location_name` varchar(55) NOT NULL,
  `category` varchar(10) NOT NULL COMMENT 'college, university',
  `education_type` varchar(20) DEFAULT NULL COMMENT 'Regular, Distance, Regular & Distance',
  `delivery_type` varchar(20) NOT NULL,
  `board_id` smallint(4) NOT NULL,
  `name` varchar(75) NOT NULL,
  `short_name` varchar(8) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `landline` varchar(13) DEFAULT NULL,
  `location` varchar(150) NOT NULL,
  `latitude` double(15,11) NOT NULL,
  `longitude` double(15,11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `created_by` smallint(5) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminary`
--

INSERT INTO `seminary` (`id`, `location_id`, `location_name`, `category`, `education_type`, `delivery_type`, `board_id`, `name`, `short_name`, `email`, `landline`, `location`, `latitude`, `longitude`, `address`, `status`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`) VALUES
(1, 1, '', 'college', 'Regular', 'co-education', 1, 'Sri Sai Ram Jr College', NULL, NULL, NULL, '', 0.00000000000, 0.00000000000, 'Cuddapah Ho, Kadapa - 516001, Near Rtc Bus Stand', '1', 0, '0000-00-00 00:00:00', '2018-01-21 14:16:47', NULL),
(2, 1, '', 'college', 'Regular & Distance', 'co-education', 1, 'Narayana Junior College', NULL, NULL, NULL, '', 0.00000000000, 0.00000000000, '7-714-18, Hari Towers, Nagarajpet, Kadapa, Andhra Pradesh 516001', '1', 0, '0000-00-00 00:00:00', '2018-01-21 14:16:53', NULL),
(3, 2, '', 'college', 'Regular', 'women education', 1, 'Sarada Junior College', NULL, NULL, NULL, '', 0.00000000000, 0.00000000000, '5, Gitashram Rd, Sri Ram Nagar, Venkateswara Pet, Proddatur, Andhra Pradesh 516360', '1', 0, '0000-00-00 00:00:00', '2018-01-21 14:16:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seminary_streams`
--

CREATE TABLE `seminary_streams` (
  `id` int(8) UNSIGNED NOT NULL,
  `seminary_id` int(6) UNSIGNED NOT NULL,
  `stream_id` smallint(4) UNSIGNED NOT NULL,
  `group_name` varchar(85) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_by` smallint(5) UNSIGNED NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminary_streams`
--

INSERT INTO `seminary_streams` (`id`, `seminary_id`, `stream_id`, `group_name`, `status`, `sync`, `created_by`, `created_date`, `last_modified_date`, `last_modified_by`) VALUES
(1, 1, 9, '9', '1', '2', 0, '2017-12-10 23:20:28', '2017-12-10 22:20:28', NULL),
(2, 1, 9, '10', '1', '2', 0, '2017-12-10 23:20:28', '2017-12-10 22:20:28', NULL),
(3, 1, 9, '11', '1', '2', 0, '2017-12-10 23:20:28', '2017-12-10 22:20:28', NULL),
(4, 3, 9, '9', '1', '2', 0, '2017-12-10 23:20:28', '2017-12-10 22:20:28', NULL),
(5, 3, 9, '10', '1', '2', 0, '2017-12-10 23:20:28', '2017-12-10 22:20:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` smallint(4) UNSIGNED NOT NULL,
  `category` varchar(40) NOT NULL,
  `name` varchar(75) NOT NULL COMMENT 'Like Bachelor Of Enineering,Bachelor Of Technology',
  `short_name` varchar(7) NOT NULL,
  `years` tinyint(1) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `category`, `name`, `short_name`, `years`, `status`, `sync`, `created_date`, `last_modified_date`) VALUES
(1, 'Under Graduation', 'Bachelor Of Engineering', 'BE', 4, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(2, 'Under Graduation', 'Bachelor Of Technology', 'BTECH', 4, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(3, 'Under Graduation', 'Bachelor In Computer Application', 'BCA', 3, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(4, 'Under Graduation', 'Bachelor Of Business Administration', 'BBA', 3, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(5, 'Under Graduation', 'Bachelor Of Commerce', 'BCOM', 3, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(6, 'Post Graduation', 'Master Of Computer Applications', 'MCA', 2, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(7, 'Post Graduation', 'Master Of Business Administration', 'MBA', 2, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(8, 'Post Graduation', 'Master Of Engineering', 'ME', 2, '1', '2', '2017-12-08 19:15:42', '2017-12-08 18:15:42'),
(9, 'Secondary Education', 'Intermediate Education', 'INTER', 2, '1', '1', '2017-12-11 03:21:28', '2017-12-10 21:51:28'),
(10, 'Under Graduation', 'Bachelor Of Engineeringsss', 'BE', 2, 'active', '', '0000-00-00 00:00:00', '2018-01-16 18:39:12'),
(11, 'Under Graduation', 'Bachelor Of Engineerings', 'BE', 3, 'active', '', '0000-00-00 00:00:00', '2018-01-16 18:41:41'),
(12, 'Under Graduation', 'Bachelor Of Engineeringssss', 'BE', 2, 'active', '', '0000-00-00 00:00:00', '2018-01-16 18:44:06'),
(13, 'Under Graduation', 'Bachelor Of Engineeringv', 'BE', 6, 'active', '', '0000-00-00 00:00:00', '2018-01-16 18:46:01'),
(14, 'Under Graduation', 'Bachelor Of Engineeringa', 'BE', 1, 'active', '', '0000-00-00 00:00:00', '2018-01-16 18:48:56'),
(15, 'Under Graduation', 'Bachelor Of Engineeringp', 'BE', 2, 'active', '', '0000-00-00 00:00:00', '2018-01-16 18:51:10'),
(16, 'Under Graduation', 'House Education', 'BEH', 2, 'active', '', '0000-00-00 00:00:00', '2018-01-16 19:00:49'),
(17, 'Under Graduation', 'Bachelor Of Sciy', 'BSY', 2, 'active', '', '0000-00-00 00:00:00', '2018-01-16 19:06:57'),
(18, 'Under Graduation', 'Abc Stream name', 'ASN', 2, 'active', 'false', '2018-01-17 08:30:57', '2018-01-17 07:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `role_id` tinyint(2) UNSIGNED NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(8) NOT NULL COMMENT 'Active, Inactive',
  `sync` varchar(5) NOT NULL COMMENT 'True, False',
  `created_date` datetime NOT NULL,
  `created_by` smallint(5) UNSIGNED NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `role_id`, `role_name`, `password`, `email`, `phone`, `image`, `status`, `sync`, `created_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'Venkat', 1, 'superadmin', '$2y$13$yU126rrVw82vFrcB5q6O2O9m.Tbxuq3/Q1Nvi2wDk7O5Hw2GknfNi', 'venkat@whtnxt.com', '1234567890', NULL, 'active', 'false', '2018-01-17 08:19:00', 1, '2018-01-17 16:16:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_route`
--
ALTER TABLE `next_route`
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
-- Indexes for table `seminary`
--
ALTER TABLE `seminary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminary_streams`
--
ALTER TABLE `seminary_streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
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
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `next_route`
--
ALTER TABLE `next_route`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seminary`
--
ALTER TABLE `seminary`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seminary_streams`
--
ALTER TABLE `seminary_streams`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
