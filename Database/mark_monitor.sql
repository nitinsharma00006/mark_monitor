-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 03:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mark_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_meta` text NOT NULL,
  `on_time` time NOT NULL,
  `off_time` time NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_type` enum('form','uploader') NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `device_name`, `customer_id`, `customer_meta`, `on_time`, `off_time`, `status`, `created_type`, `created_by`, `created_at`, `update_at`, `deleted_at`) VALUES
('2', 'Device 1', 1, '', '19:00:00', '07:00:00', 'active', 'form', '', '2021-07-19 12:11:56', '2021-07-19 10:12:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `device_response`
--

CREATE TABLE `device_response` (
  `id` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `current_value` varchar(255) NOT NULL,
  `voltage_status` varchar(255) NOT NULL,
  `power_status` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_response`
--

INSERT INTO `device_response` (`id`, `device_id`, `current_value`, `voltage_status`, `power_status`, `timestamp`) VALUES
(1, '01', '2', '', '', '2021-07-19 07:21:03'),
(2, '01', '2', '5', '1', '2021-07-19 07:21:46'),
(3, '01', '2', '5', '1', '2021-07-19 07:22:43'),
(4, '01', '2', '5', '1', '2021-07-19 07:33:24'),
(5, '200', '2', '5', '1', '2021-07-19 09:19:40'),
(6, '200', '2', '5', '1', '2021-07-19 09:20:58'),
(7, '200', '2', '5', '1', '2021-07-19 09:21:24'),
(8, '200', '2', '5', '1', '2021-07-19 09:21:25'),
(9, '200', '2', '5', '1', '2021-07-19 09:21:26'),
(10, '200', '2', '5', '1', '2021-07-19 09:21:26'),
(11, '200', '2', '5', '1', '2021-07-19 09:21:27'),
(12, '200', '2', '5', '1', '2021-07-19 09:21:27'),
(13, '200', '2', '5', '1', '2021-07-19 10:06:20'),
(14, '200', '2', '5', '1', '2021-07-19 10:06:51'),
(15, '2', '2', '5', '1', '2021-07-19 10:07:17'),
(16, '2', '2', '5', '1', '2021-07-19 10:07:24'),
(17, '2', '2', '5', '1', '2021-07-19 10:08:28'),
(18, '2', '2', '5', '1', '2021-07-19 10:09:00'),
(19, '2', '2', '5', '1', '2021-07-19 10:10:11'),
(20, '2', '2', '5', '1', '2021-07-19 10:11:47'),
(21, '2', '2', '5', '1', '2021-07-19 10:37:44'),
(22, '2', '2', '5', '1', '2021-07-19 10:37:49'),
(23, '2', '2', '5', '1', '2021-07-19 10:37:59'),
(24, '2', '2', '5', '1', '2021-07-19 10:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` enum('admin','customer') NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `zone` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gst` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_type` enum('form','uploader') NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `mobile`, `zone`, `city`, `state`, `pincode`, `address`, `gst`, `status`, `created_by`, `created_type`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@marqmonitor.com', '$2y$10$LMNjTKPDjiLjDGzRBoHmVOsAC.725tAt/Y4b/THUyGvPoLD1ij6Wy', 'admin', '9999999999', '', '', '', '', '', '', 'active', 'admin', 'form', '2021-07-19 13:06:33', '2021-07-19 11:09:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE `user_activity_log` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET latin1 NOT NULL,
  `controller` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `referer` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `month` varchar(200) NOT NULL,
  `ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `browser` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `token` varchar(255) NOT NULL,
  `txn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_edit_log`
--

CREATE TABLE `user_edit_log` (
  `id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `action` varchar(200) NOT NULL,
  `username` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `uniquecode` varchar(150) NOT NULL,
  `old_json` text NOT NULL,
  `new_json` text NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `edited_by_username` varchar(150) NOT NULL,
  `edited_by_uniquecode` varchar(150) NOT NULL,
  `edited_by_role` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_edit_log`
--

INSERT INTO `user_edit_log` (`id`, `txn_id`, `action`, `username`, `name`, `uniquecode`, `old_json`, `new_json`, `transaction_type`, `edited_by_username`, `edited_by_uniquecode`, `edited_by_role`, `timestamp`) VALUES
(1, '', 'User Update', 'ns.teckmovers@gmail.com', 'Nitin', 'test123', '{\"id\":\"22\",\"username\":\"ns.teckmovers@gmail.com\",\"password\":\"e10adc3949ba59abbe56e057f20f883e\",\"role\":\"dpm\",\"uniquecode\":\"test123\",\"name\":\"Nitin\",\"email\":\"ns.teckmovers@gmail.com\",\"mobile\":\"7982057428\",\"alternate_telephone\":\"01125037428\",\"zone\":\"West\",\"state\":\"Goa\",\"city\":\"Margao\",\"pincode\":\"110061\",\"address\":\"ksfksjdfkasjfksjkdfjskfjksdfjks\",\"sales_territory\":\"\",\"base_location\":\"\",\"mapping_details\":\"[]\",\"user_master\":\"yes\",\"status\":\"Approved\",\"date\":\"2021-06-30\",\"created_by\":\"{\\\"username\\\":\\\"shubham\\\",\\\"uniquecode\\\":\\\"U1001\\\",\\\"name\\\":\\\"Shubham\\\"}\",\"transaction_id\":\"\",\"access_from\":\"\",\"token\":\"\",\"device_token\":\"\",\"device_type\":\"\",\"timestamp\":\"2021-06-30 11:32:24\"}', '{\"id\":\"22\",\"username\":\"ns.teckmovers@gmail.com\",\"password\":\"e10adc3949ba59abbe56e057f20f883e\",\"role\":\"dpm\",\"uniquecode\":\"test123\",\"name\":\"Nitin\",\"email\":\"ns.teckmovers@gmail.com\",\"mobile\":\"7982057428\",\"alternate_telephone\":\"01125037428\",\"zone\":\"West\",\"state\":\"Goa\",\"city\":\"Margao\",\"pincode\":\"110061\",\"address\":\"ksfksjdfkasjfksjkdfjskfjksdfjks\",\"sales_territory\":\"\",\"base_location\":\"\",\"mapping_details\":\"[]\",\"user_master\":\"yes\",\"status\":\"Approved\",\"date\":\"2021-06-30\",\"created_by\":\"{\\\"username\\\":\\\"shubham\\\",\\\"uniquecode\\\":\\\"U1001\\\",\\\"name\\\":\\\"Shubham\\\"}\",\"transaction_id\":\"\",\"access_from\":\"\",\"token\":\"\",\"device_token\":\"\",\"device_type\":\"\",\"timestamp\":\"2021-06-30 11:32:24\"}', 'Update', 'shubham', 'U1001', 'admin', '2021-07-02 08:40:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `device_response`
--
ALTER TABLE `device_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_edit_log`
--
ALTER TABLE `user_edit_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device_response`
--
ALTER TABLE `device_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_edit_log`
--
ALTER TABLE `user_edit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
