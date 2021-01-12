-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 01:40 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mga`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ipaddress` varchar(250) COLLATE utf8_bin NOT NULL,
  `request_time` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0000-00-00 00:00:00',
  `method` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'phone or email',
  `status` int(11) NOT NULL COMMENT '0 = failed, 1 = mail sent, 2 = sucess'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='password will recover using sms only through verified phone number.' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`id`, `userId`, `ipaddress`, `request_time`, `method`, `status`) VALUES
(1, 9, '103.222.23.37', '2019-10-23 04:23:28', 'Phone', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_field` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa fa-asterisk',
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`id`, `user_id`, `module`, `module_field`, `description`, `activity_date_time`, `icon`, `deleted`) VALUES
(1, 3, 'Drug Generic', 'User Drug Generic', 'User Added Drug Generic', '2019-09-10 20:10:16', 'fa fa-check-circle', 0),
(3, 3, 'Drug Company', 'User Drug Company', 'User Added Drug Company', '2019-09-10 20:26:41', 'fa fa-cube', 0),
(4, 3, 'Drug Company', 'User Drug Company', 'User Delete Drug Company', '2019-09-10 20:34:02', 'fa fa-cube', 0),
(5, 3, 'User Profile', 'User Profile Information', 'User Profile Updated Successfully', '2019-09-11 15:23:27', 'fa fa-user', 0),
(6, 3, 'User Profile', 'User Profile Information', 'User Profile Updated Successfully', '2019-09-11 15:24:39', 'fa fa-user', 0),
(7, 3, 'User Profile', 'User Profile Information', 'User Profile Updated Successfully', '2019-09-11 16:14:29', 'fa fa-user', 0),
(8, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:40:50', 'fa fa-file', 0),
(9, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:46:58', 'fa fa-file', 0),
(10, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:56:47', 'fa fa-file', 0),
(11, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:56:52', 'fa fa-file', 0),
(12, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:58:02', 'fa fa-file', 0),
(13, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:01:19', 'fa fa-file', 0),
(14, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:08:18', 'fa fa-file', 0),
(15, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:08:22', 'fa fa-file', 0),
(16, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:09:30', 'fa fa-file', 0),
(17, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:13:52', 'fa fa-file', 0),
(18, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:13:57', 'fa fa-file', 0),
(19, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:42:36', 'fa fa-file', 0),
(20, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:42:40', 'fa fa-file', 0),
(21, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:42:43', 'fa fa-file', 0),
(22, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:29:56', 'fa fa-file', 0),
(23, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:01', 'fa fa-file', 1),
(24, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:04', 'fa fa-file', 1),
(25, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:08', 'fa fa-file', 1),
(26, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:13', 'fa fa-file', 1),
(27, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-14 16:10:57', 'fa fa-file', 1),
(28, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-14 16:11:01', 'fa fa-file', 1),
(29, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-14 16:12:30', 'fa fa-file', 1),
(30, 1, 'login', 'login successful', '::1', '2020-02-02 01:09:42', 'fa fa-unlock-alt', 0),
(31, 2, 'login', 'login successful', '::1', '2020-02-02 01:10:10', 'fa fa-unlock-alt', 0),
(32, 3, 'login', 'login successful', '103.222.23.37', '2020-02-05 14:42:53', 'fa fa-unlock-alt', 0),
(33, 3, 'login', 'login successful', '103.218.26.73', '2020-02-05 16:01:16', 'fa fa-unlock-alt', 0),
(34, 3, 'login', 'login successful', '27.131.12.205', '2020-02-06 05:52:42', 'fa fa-unlock-alt', 0),
(35, 3, 'login', 'login successful', '27.131.12.205', '2020-02-06 06:09:42', 'fa fa-unlock-alt', 0),
(36, 3, 'login', 'login successful', '27.131.12.205', '2020-02-10 05:49:26', 'fa fa-unlock-alt', 0),
(37, 3, 'login', 'login successful', '27.131.12.205', '2020-02-11 06:55:59', 'fa fa-unlock-alt', 0),
(38, 3, 'login', 'login successful', '103.222.23.37', '2020-02-11 08:43:07', 'fa fa-unlock-alt', 0),
(39, 2, 'login', 'login successful', '103.222.23.37', '2020-02-11 08:46:50', 'fa fa-unlock-alt', 0),
(40, 2, 'login', 'login successful', '::1', '2020-02-11 07:34:56', 'fa fa-unlock-alt', 0),
(41, 2, 'profile', 'profile Update', 'User Update Profile Info', '2020-02-11 12:35:15', 'fa fa-user', 0),
(42, 2, 'profile', 'profile Update', 'User Update Profile Info', '2020-02-11 12:35:25', 'fa fa-user', 0),
(43, 1, 'login', 'login successful', '::1', '2020-02-11 23:18:29', 'fa fa-unlock-alt', 0),
(44, 2, 'login', 'login successful', '::1', '2020-02-12 01:45:21', 'fa fa-unlock-alt', 0),
(45, 2, 'image', 'User image', 'User Add New Image', '2020-02-12 06:53:24', 'fa fa-picture-o', 0),
(46, 2, 'image', 'User image', 'User Update Image', '2020-02-12 06:55:00', 'fa fa-picture-o', 0),
(47, 2, 'image', 'User image', 'User Update Image', '2020-02-12 09:10:31', 'fa fa-picture-o', 0),
(48, 2, 'image', 'User image', 'User Add New Image', '2020-02-12 09:25:29', 'fa fa-picture-o', 0),
(49, 1, 'login', 'login successful', '::1', '2020-02-12 23:11:49', 'fa fa-unlock-alt', 0),
(50, 2, 'login', 'login successful', '::1', '2020-02-12 23:21:30', 'fa fa-unlock-alt', 0),
(51, 2, 'image', 'User image', 'User Add New Image', '2020-02-13 04:22:51', 'fa fa-picture-o', 0),
(52, 2, 'image', 'User image', 'User Update Image', '2020-02-13 04:31:13', 'fa fa-picture-o', 0),
(53, 2, 'favourite', 'User favourite', 'User favourite Picture Updated', '2020-02-13 04:31:53', 'fa fa-heart', 0),
(54, 2, 'wishlist', 'User wishlist', 'User Wishlist Added', '2020-02-13 04:32:06', 'fa fa-heart', 0),
(55, 2, 'wishlist', 'User wishlist', 'User Wishlist Updated', '2020-02-13 04:32:11', 'fa fa-heart', 0),
(56, 1, 'login', 'login successful', '103.222.23.37', '2020-02-15 19:22:49', 'fa fa-unlock-alt', 0),
(57, 3, 'login', 'login successful', '103.120.202.98', '2020-02-15 19:28:23', 'fa fa-unlock-alt', 0),
(58, 3, 'login', 'login successful', '27.131.12.205', '2020-02-16 06:12:52', 'fa fa-unlock-alt', 0),
(59, 1, 'login', 'login successful', '103.222.23.37', '2020-02-16 11:04:47', 'fa fa-unlock-alt', 0),
(60, 2, 'login', 'login successful', '103.222.23.37', '2020-02-16 11:28:09', 'fa fa-unlock-alt', 0),
(61, 3, 'login', 'login successful', '103.218.26.73', '2020-02-22 17:18:17', 'fa fa-unlock-alt', 0),
(62, 3, 'login', 'login successful', '27.131.12.205', '2020-03-01 05:54:16', 'fa fa-unlock-alt', 0),
(63, 1, 'login', 'login successful', '103.76.46.99', '2020-03-10 10:19:12', 'fa fa-unlock-alt', 0),
(64, 1, 'login', 'login successful', '103.76.46.104', '2020-03-10 12:28:27', 'fa fa-unlock-alt', 0),
(65, 1, 'login', 'login successful', '103.76.46.99', '2020-03-10 12:48:27', 'fa fa-unlock-alt', 0),
(66, 1, 'login', 'login successful', '103.76.46.99', '2020-03-11 05:21:28', 'fa fa-unlock-alt', 0),
(67, 1, 'login', 'login successful', '103.76.46.99', '2020-03-11 05:26:34', 'fa fa-unlock-alt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_airmail_service_registration`
--

CREATE TABLE `tbl_airmail_service_registration` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_station_id` int(11) NOT NULL,
  `train_or_flight_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `received_from` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `drop_to` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `received_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0000-00-00',
  `unit_rate` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_bill` double NOT NULL DEFAULT 0,
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_airmail_service_registration`
--

INSERT INTO `tbl_airmail_service_registration` (`id`, `invoice_number`, `client_id`, `service_type_id`, `service_station_id`, `train_or_flight_no`, `received_from`, `drop_to`, `product_details`, `delivery_details`, `received_date`, `unit_rate`, `quantity`, `total_bill`, `remark`, `insert_time`, `insert_by`) VALUES
(8, '20201024111117', 5, 16, 7, '32544356', 'dhaka', 'ctg', 'product details', 'delivery details \r\n ', '2020-10-27', 0, 1, 400, 'remark', '2020-10-24 11:11', 1),
(9, '20201024111234', 1, 17, 16, '22222', 'sly', 'bogura', 'Product Details new', 'Delivery Details new', '2020-10-29', 0, 1, 650, 'Remark  new', '2020-10-24 11:12', 1),
(10, '20201024110535', 4, 16, 5, '12121212', 'ctg', 'dha', 'demo product details', 'demo delivery details', '2020-10-30', 0, 1, 600, 'demo remark', '2020-10-24 12:22', 1),
(11, '20201024122417', 3, 17, 14, '32544356', 'sly', 'cumilla', 'rewrewr', 'dfghdfg', '2020-10-30', 0, 1, 678, 'dsrtgrtgf', '2020-10-24 12:24', 1),
(15, '20201028125314', 10, 16, 5, '32544356', 'dhaka', 'cumilla', 'qwqwqw', 'qwqwqw', '2020-10-30', 400, 3, 1200, 'qwqwqw', '2020-10-28 12:53', 5),
(16, '20201028125659', 1, 16, 11, '32544356', 'dhaka', 'cumilla', 'nai', 'nai', '2020-10-30', 160, 2, 320, 'nai', '2020-10-28 12:56', 5),
(19, '20201029174850', 3, 17, 13, '12121212', 'ctg', 'cumilla', 'jguyt', 'truytu', '2020-10-30', 200, 1, 200, 'trutru', '2020-10-29 17:48', 5),
(20, '20201029175303', 1, 16, 1, '22222', 'ctg', 'dha', 'bkhj', 'gjkghj', '2020-10-30', 400, 1, 400, 'jgghj', '2020-10-29 17:53', 5),
(21, '20201101110415', 3, 16, 1, '32544356', 'dhaka', 'cumilla', 'bncmhjg', 'fghh', '2020-11-12', 400, 1, 400, 'hjfjghjg', '2020-11-01 11:04', 5),
(22, '20201101163940', 1, 16, 1, '32544356', 'dhaka', 'cumilla', 'ghjkghj', 'hgjgh', '2020-11-10', 400, 2, 800, 'hj', '2020-11-01 16:39', 1),
(23, '20201101175217', 1, 17, 13, '12121212', 'ctg', 'dha', 'hdfshsh', 'sdhgh', '2020-11-10', 200, 2, 400, 'hgf', '2020-11-01 17:52', 1),
(24, '20201101181543', 3, 16, 1, '12121212', 'dhaka', 'dha', 'gfhfg', 'fghfgh', '2020-11-10', 400, 1, 400, 'fghfgh', '2020-11-01 18:15', 1),
(25, '20201101183950', 3, 17, 13, '22222', 'sly', 'cumilla', 'hgjgj', 'gjkg', '2020-11-04', 200, 1, 200, 'jfkjk', '2020-11-01 18:39', 1),
(26, '20201102140819', 3, 17, 15, '12121212', 'ctg', 'cumilla', 'dhh', 'thyth', '2020-11-10', 500, 1, 500, 'httted', '2020-11-02 14:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_airmail_service_stations`
--

CREATE TABLE `tbl_airmail_service_stations` (
  `id` int(11) NOT NULL,
  `airmail_service_type_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_airmail_service_stations`
--

INSERT INTO `tbl_airmail_service_stations` (`id`, `airmail_service_type_id`, `name`, `priority`, `insert_time`, `insert_by`) VALUES
(1, 16, 'Hazrat Shahjalal International Airport, Dhaka.', 1, '2020-10-04 12:48', 1),
(5, 16, 'Shah Amanat International Airport, Chattogram.', 1, '2020-10-14 18:08', 1),
(7, 16, 'Osmani International Airport, Sylhet.', 1, '2020-10-14 18:25', 1),
(8, 16, ' Saidpur Airport', 1, '2020-10-14 18:26', 1),
(9, 16, 'Shah Makhdum Airport, Rajshahi.', 1, '2020-10-14 18:27', 1),
(10, 16, ' Jessore Airport', 1, '2020-10-14 18:27', 1),
(11, 16, ' Cox\'s Bazar Airport', 1, '2020-10-14 18:28', 1),
(12, 16, ' Barisal Airport', 1, '2020-10-14 18:29', 1),
(13, 17, ' Bir Muktijoddha Sirajul Islam Railway Station', 1, '2020-10-14 18:31', 1),
(14, 17, 'Dinajpur Railway Station', 1, '2020-10-14 18:33', 1),
(15, 17, 'Rangpur Railway Station', 1, '2020-10-14 18:34', 1),
(16, 17, 'Bogura Railway Station', 1, '2020-10-14 18:34', 1),
(17, 17, 'Rashore Railway Station', 1, '2020-10-14 18:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_airmail_service_type`
--

CREATE TABLE `tbl_airmail_service_type` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_airmail_service_type`
--

INSERT INTO `tbl_airmail_service_type` (`id`, `name`, `priority`, `insert_by`, `insert_time`) VALUES
(16, 'Airport', 1, 1, '2020-10-14 14:47'),
(17, 'Railway Station', 1, 1, '2020-10-14 14:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_number` text COLLATE utf8_unicode_ci NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `name`, `phone_number`, `email`, `passport_number`, `insert_time`) VALUES
(1, 'Taslimul Islam', '01303073674', 'taslimulvai4001@gmail.com', '111111111111111', '2020-10-04 15:35'),
(3, 'Rokon Ahmed', '01846951141', 'roky4001@gmail.com', '546456345233445', '2020-10-04 15:44'),
(4, 'Istiaq Ahmed', '01712065871', 'Istiaq@gmail.com', '111111875', '2020-10-14 18:06'),
(5, 'Atikur Rahman', '01465456342', 'atik@gmail.com', '546456345233445', '2020-10-14 18:36'),
(7, 'Rauhanuzzaman Roky', '01709372481', 'rzroky@gmail.com', '011654654', '2020-10-27 17:52'),
(8, 'a', '01700000000', 'roky4001@gmail.com', '546456345233445', '2020-10-27 18:53'),
(9, 'Newaz', '01845496852', 'newaz@gmail.com', '45496852', '2020-10-28 12:04'),
(10, 'arafah', '01934567890', 'arafah@gmail.com', '867887yjyu', '2020-10-28 12:53'),
(11, 'rabbi', '01756238458', 'rabbi@gmail.com', '4545455', '2020-10-29 17:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_common_pages`
--

CREATE TABLE `tbl_common_pages` (
  `id` int(11) NOT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = yes',
  `priority` int(11) NOT NULL COMMENT 'max will top.',
  `parent_page_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `attatched` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_common_pages`
--

INSERT INTO `tbl_common_pages` (`id`, `is_menu`, `priority`, `parent_page_id`, `name`, `title`, `body`, `attatched`) VALUES
(5, 1, 11, 0, 'about', 'আমাদের সম্পর্কে', '<p>শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য।</p>\r\n', 'assets/pageSettings/_20190722142046.png'),
(35, 1, 20, 5, 'history', 'History', '<p>শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য।</p>\r\n', ''),
(36, 1, 10, 5, 'mission', 'Mission', '<p>শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য। শিক্ষকদের বহুল প্রতিক্ষিত শিক্ষক বাতায়নে কন্টেন্ট আপলোড করা আগামী জানুয়ারি&#39;২০১৯ ইং থেকে শুরু হতে যাচ্ছে। তাই এখন থেকেই নিজেকে পুরোপুরি তৈরি/প্রস্তুত করে নিন। সময় চলে এসেছে নিজেকে আরও বেশি শানিত করার। তাহলে কাজ শুরু করে দিন আপনার যোগ্যতা/দক্ষতা প্রমাণিত করার জন্য।</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divission`
--

CREATE TABLE `tbl_divission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_divission`
--

INSERT INTO `tbl_divission` (`id`, `name`) VALUES
(1, 'ঢাকা'),
(2, 'রাজশাহী'),
(3, 'চট্টগ্রাম'),
(4, 'সিলেট'),
(5, 'খুলনা'),
(6, 'বরিশাল'),
(7, 'রংপুর'),
(8, 'ময়মনসিংহ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `gallery_category_id` int(11) NOT NULL,
  `path` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` text NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'vidoe, photo',
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'max will top',
  `insert_time` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `gallery_category_id`, `path`, `title`, `type`, `priority`, `insert_time`, `insert_by`) VALUES
(38, 19, 'assets/galleryPhoto/music_20201003122225.jpg', 'MUSIC CONCERT', 'Photo', 1, '2020-10-03 12:22', 1),
(39, 20, 'assets/galleryPhoto/birthday_20201003122520.jpg', 'BIRTHDAY PARTY', 'Photo', 1, '2020-10-03 12:25', 1),
(40, 21, 'assets/galleryPhoto/management_20201003122713.jpg', 'MANAGEMENT CONFERENCES', 'Photo', 1, '2020-10-03 12:27', 1),
(41, 22, 'assets/galleryPhoto/wedding_20201003122923.jpg', 'WEEDING PARTY', 'Photo', 1, '2020-10-03 12:29', 1),
(42, 23, 'assets/galleryPhoto/table_20201003123200.jpg', 'MANAGEMENT CONFERENCES', 'Photo', 1, '2020-10-03 12:32', 1),
(43, 23, 'assets/galleryPhoto/chair_20201003123235.jpg', 'PHOTOGRAPHY', 'Photo', 2, '2020-10-03 12:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_category`
--

CREATE TABLE `tbl_gallery_category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'max will top',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_gallery_category`
--

INSERT INTO `tbl_gallery_category` (`id`, `name`, `priority`, `last_update`, `update_by`) VALUES
(19, 'Gate decoration', 5, '2020-10-03 06:13:56', 1),
(20, 'Room decoration', 4, '2020-10-03 06:14:48', 1),
(21, 'Table', 3, '2020-10-03 06:15:33', 1),
(22, 'Conferece room', 2, '2020-10-03 06:15:58', 1),
(23, 'Table and chair', 1, '2020-10-03 06:16:28', 1),
(25, 'a', 0, '2020-10-14 06:52:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general`
--

CREATE TABLE `tbl_general` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_general`
--

INSERT INTO `tbl_general` (`id`, `name`, `value`) VALUES
(50, 'contact_number', '+8801722158130, +8801709372480'),
(51, 'website', 'http://psc-eclass.com'),
(52, 'address', '12/6 Solumilah Road, Mohammadpr, Dhaka - 1207, Bangladesh'),
(53, 'contact_mail', 'info@hrsoftbd.com'),
(59, 'slider_bottom_title', 'GET 15% OFF ON ANY OTHER SERVICES...'),
(60, 'body_title', 'GET 15% OFF ON ANY OTHER SERVICES...');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `total_bill` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL,
  `payable_amount` double NOT NULL DEFAULT 0,
  `remarks` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent_id` int(11) NOT NULL DEFAULT 0,
  `approve_status` tinyint(1) NOT NULL DEFAULT 0,
  `approved_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `client_id`, `invoice_number`, `invoice_date`, `total_bill`, `discount`, `payable_amount`, `remarks`, `agent_id`, `approve_status`, `approved_by`, `insert_time`) VALUES
(7, 1, '20201024104723', '0000-00-00', 400, 0, 400, '0', 0, 1, 1, '0000-00-00 00:00'),
(8, 3, '20201024104904', '0000-00-00', 0, 0, 0, '0', 0, 1, 1, '0000-00-00 00:00'),
(9, 4, '20201024110349', '0000-00-00', 600, 0, 600, '0', 0, 1, 1, '0000-00-00 00:00'),
(10, 5, '20201024110445', '0000-00-00', 400, 0, 400, '0', 0, 0, 1, '0000-00-00 00:00'),
(11, 4, '20201024110515', '0000-00-00', 400, 0, 400, '0', 0, 1, 1, '0000-00-00 00:00'),
(12, 1, '20201024110535', '0000-00-00', 400, 0, 400, '0', 0, 0, 1, '0000-00-00 00:00'),
(13, 5, '20201024111117', '0000-00-00', 400, 0, 400, '0', 0, 1, 1, '0000-00-00 00:00'),
(14, 1, '20201024111234', '0000-00-00', 650, 0, 650, '0', 0, 0, 1, '0000-00-00 00:00'),
(15, 4, '20201024121600', '0000-00-00', 560, 0, 560, '0', 0, 1, 1, '0000-00-00 00:00'),
(16, 5, '20201024121634', '0000-00-00', 0, 0, 0, '0', 0, 1, 1, '0000-00-00 00:00'),
(17, 3, '20201024121739', '0000-00-00', 600, 0, 600, '0', 0, 1, 1, '0000-00-00 00:00'),
(18, 4, '20201024121803', '0000-00-00', 400, 0, 400, '0', 0, 0, 1, '0000-00-00 00:00'),
(19, 5, '20201024122014', '0000-00-00', 678, 0, 678, '0', 0, 1, 1, '0000-00-00 00:00'),
(20, 4, '20201024122047', '0000-00-00', 890, 0, 890, '0', 0, 1, 1, '0000-00-00 00:00'),
(21, 4, '20201024122219', '0000-00-00', 600, 0, 600, '0', 0, 1, 1, '0000-00-00 00:00'),
(22, 3, '20201024122417', '0000-00-00', 678, 0, 678, '0', 0, 1, 1, '0000-00-00 00:00'),
(24, 1, '20201026154058', '2020-10-26', 400, 0, 400, '0', 0, 1, 5, '2020-10-26 15:40'),
(25, 1, '20201026161744', '2020-10-26', 500, 0, 500, '0', 0, 1, 5, '2020-10-26 16:17'),
(26, 1, '20201026170348', '2020-10-26', 233, 0, 233, '0', 0, 0, 5, '2020-10-26 17:03'),
(27, 3, '20201026172804', '2020-10-26', 678, 0, 678, '0', 0, 0, 5, '2020-10-26 17:28'),
(28, 3, '20201027101429', '2020-10-27', 400, 0, 400, '0', 0, 1, 5, '2020-10-27 10:14'),
(35, 3, '20201027185119', '2020-10-27', 500, 0, 500, '0', 5, 0, 0, '2020-10-27 18:51'),
(36, 8, '20201027185350', '2020-10-27', 2000, 0, 2000, '0', 5, 1, 5, '2020-10-27 18:53'),
(37, 3, '20201028115541', '2020-10-28', 400, 0, 400, '0', 5, 0, 0, '2020-10-28 11:55'),
(38, 3, '20201028115933', '2020-10-28', 400, 0, 400, '0', 5, 0, 0, '2020-10-28 11:59'),
(39, 9, '20201028120452', '2020-10-28', 678, 0, 678, '0', 5, 1, 5, '2020-10-28 12:04'),
(40, 3, '20201028120741', '2020-10-28', 5424, 0, 5424, '0', 5, 1, 5, '2020-10-28 12:07'),
(41, 10, '20201028125314', '2020-10-28', 1200, 0, 1200, '0', 5, 1, 5, '2020-10-28 12:53'),
(42, 1, '20201028125659', '2020-10-28', 320, 0, 320, '0', 5, 1, 5, '2020-10-28 12:56'),
(45, 3, '20201029174850', '2020-10-29', 2038, 100, 1938, '0', 5, 1, 5, '2020-10-29 17:48'),
(46, 1, '20201029175303', '2020-10-29', 1700, 100, 1600, '0', 5, 0, 0, '2020-10-29 17:53'),
(47, 3, '20201101110415', '2020-11-01', 400, 0, 400, '0', 5, 0, 0, '2020-11-01 11:04'),
(48, 1, '20201101115806', '2020-11-01', 400, 0, 400, '0', 5, 0, 0, '2020-11-01 11:58'),
(49, 1, '20201101120018', '2020-11-01', 600, 0, 600, '0', 5, 0, 0, '2020-11-01 12:00'),
(50, 1, '20201101122213', '2020-11-01', 400, 0, 400, '0', 5, 0, 0, '2020-11-01 12:22'),
(51, 1, '20201101123020', '2020-11-01', 560, 0, 560, '0', 5, 0, 0, '2020-11-01 12:30'),
(52, 1, '20201101163940', '2020-11-01', 800, 0, 800, '0', 1, 1, 0, '2020-11-01 16:39'),
(53, 3, '20201101170205', '2020-11-01', 400, 0, 400, '0', 1, 1, 0, '2020-11-01 17:02'),
(54, 1, '20201101171724', '2020-11-01', 1600, 0, 1600, '0', 1, 0, 0, '2020-11-01 17:17'),
(55, 3, '20201101172620', '2020-11-01', 678, 0, 678, '0', 1, 1, 0, '2020-11-01 17:26'),
(56, 1, '20201101175217', '2020-11-01', 2800, 100, 2700, '0', 1, 0, 0, '2020-11-01 17:52'),
(57, 3, '20201101181543', '2020-11-01', 400, 0, 400, '0', 4, 0, 0, '2020-11-01 18:15'),
(58, 1, '20201101182027', '2020-11-01', 1200, 0, 1200, '0', 4, 0, 0, '2020-11-01 18:20'),
(59, 3, '20201101182348', '2020-11-01', 1200, 0, 1200, '0', 4, 0, 0, '2020-11-01 18:23'),
(60, 3, '20201101182716', '2020-11-01', 400, 0, 400, '0', 4, 0, 0, '2020-11-01 18:27'),
(61, 3, '20201101183950', '2020-11-01', 1778, 100, 1678, '0', 0, 1, 1, '2020-11-01 18:39'),
(62, 1, '20201102140433', '2020-11-02', 500, 0, 500, '0', 0, 0, 0, '2020-11-02 14:04'),
(63, 3, '20201102140819', '2020-11-02', 500, 0, 500, '0', 5, 0, 0, '2020-11-02 14:08'),
(64, 1, '20201102141124', '2020-11-02', 34, 0, 34, '0', 4, 0, 0, '2020-11-02 14:11'),
(65, 3, '20201102141249', '2020-11-02', 678, 0, 678, '0', 0, 0, 0, '2020-11-02 14:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lounge_service_registration`
--

CREATE TABLE `tbl_lounge_service_registration` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_station_id` int(11) NOT NULL,
  `train_or_flight_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `service_start_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00:00',
  `reserved_hour` int(11) NOT NULL DEFAULT 0,
  `journey_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `landing_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00:00',
  `unit_rate` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_bill` double NOT NULL DEFAULT 0,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lounge_service_registration`
--

INSERT INTO `tbl_lounge_service_registration` (`id`, `invoice_number`, `client_id`, `service_type_id`, `service_station_id`, `train_or_flight_no`, `service_start_time`, `reserved_hour`, `journey_date`, `landing_time`, `unit_rate`, `quantity`, `total_bill`, `insert_time`, `insert_by`) VALUES
(13, '20201024111117', 4, 2, 6, '22222', '11:15', 8100, '2020-10-27', '13:00', 0, 1, 600, '2020-10-24 11:03', 1),
(14, '20201024110445', 5, 4, 7, '978977', '13:00', 1800, '2020-10-30', '16:00', 0, 1, 400, '2020-10-24 11:04', 1),
(15, '20201024121739', 3, 2, 6, '22222', '12:15', 6300, '2020-10-22', '12:15', 0, 1, 600, '2020-10-24 12:17', 1),
(16, '20201024110535', 4, 4, 7, '978977', '12:15', 14400, '2020-10-27', '12:15', 0, 1, 400, '2020-10-24 12:18', 1),
(19, '20201027185119', 3, 1, 5, '978977', '18:45', 3600, '2020-10-28', '18:45', 500, 1, 500, '2020-10-27 18:51', 5),
(20, '20201027185350', 8, 4, 7, '111111', '18:45', 9000, '2020-10-28', '18:45', 400, 5, 2000, '2020-10-27 18:53', 5),
(23, '20201029174850', 3, 2, 6, '12121212', '17:45', 4500, '2020-10-22', '17:45', 600, 1, 600, '2020-10-29 17:48', 5),
(24, '20201029175303', 1, 1, 5, '22222', '17:45', 4500, '2020-10-15', '17:45', 500, 1, 500, '2020-10-29 17:53', 5),
(25, '20201101120018', 1, 2, 6, '45454545', '11:45', 4500, '2020-11-26', '13:45', 600, 1, 600, '2020-11-01 12:00', 5),
(26, '20201101170205', 3, 4, 7, '111111', '17:00', 900, '2020-11-18', '17:00', 400, 1, 400, '2020-11-01 17:02', 1),
(27, '20201101175217', 1, 4, 7, '12121212', '17:45', 900, '2020-11-06', '17:45', 400, 2, 800, '2020-11-01 17:52', 1),
(28, '20201101182027', 1, 2, 6, '111111', '18:15', 4500, '2020-11-04', '18:15', 600, 2, 1200, '2020-11-01 18:20', 1),
(29, '20201101183950', 3, 1, 5, '22222', '18:30', 8100, '2020-11-06', '18:30', 500, 1, 500, '2020-11-01 18:39', 1),
(30, '20201102140433', 1, 1, 5, '978977', '14:00', 1800, '2020-11-18', '14:00', 500, 1, 500, '2020-11-02 14:04', 2),
(31, '20201102143452', 3, 2, 6, '22222', '14:15', 4500, '2020-11-11', '14:15', 600, 1, 600, '2020-11-02 14:34', 5),
(32, '20201102143457', 3, 2, 6, '22222', '14:15', 4500, '2020-11-11', '14:15', 600, 1, 600, '2020-11-02 14:34', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lounge_service_stations`
--

CREATE TABLE `tbl_lounge_service_stations` (
  `id` int(11) NOT NULL,
  `lounge_service_type_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `unit_rate` double NOT NULL DEFAULT 0,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lounge_service_stations`
--

INSERT INTO `tbl_lounge_service_stations` (`id`, `lounge_service_type_id`, `name`, `priority`, `unit_rate`, `insert_time`, `insert_by`) VALUES
(5, 1, 'Hazrat Shahjalal International Airport, Dhaka.', 1, 500, '2020-10-24 11:01', 1),
(6, 2, 'Dinajpur Railway Station', 2, 600, '2020-10-24 11:02', 1),
(7, 4, 'Saidpur', 3, 400, '2020-10-24 11:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lounge_type`
--

CREATE TABLE `tbl_lounge_type` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_lounge_type`
--

INSERT INTO `tbl_lounge_type` (`id`, `name`, `priority`, `insert_by`, `insert_time`) VALUES
(1, 'Airport', 1, 1, '2020-10-06 11:12'),
(2, 'Railway Station', 1, 1, '2020-10-06 13:10'),
(4, 'Landport', 1, 1, '2020-10-14 16:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail_send_setting`
--

CREATE TABLE `tbl_mail_send_setting` (
  `id` int(11) NOT NULL,
  `setting_name` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mail_send_setting`
--

INSERT INTO `tbl_mail_send_setting` (`id`, `setting_name`, `value`) VALUES
(1, 'protocol', 'smtp'),
(2, 'smtp_host', 'ssl://dallas117.mysitehosted.com'),
(3, 'smtp_port', '465'),
(4, 'smtp_user', 'asdasdasd.com'),
(5, 'smtp_pass', 'asdasd'),
(6, 'mailtype', 'text'),
(7, 'charset', 'iso-8859-1'),
(8, 'wordwrap', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_services`
--

CREATE TABLE `tbl_main_services` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `url_name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_main_services`
--

INSERT INTO `tbl_main_services` (`id`, `name`, `url_name`, `priority`, `insert_time`, `insert_by`) VALUES
(1, 'a', 'a', 1, '2020-10-05 12:56', 1),
(3, 'oyon', 'admin', 1, '2020-10-05 13:02', 1),
(4, 'qw', 'a', 1, '2020-10-13 15:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mga_service_registration`
--

CREATE TABLE `tbl_mga_service_registration` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_station_id` int(11) NOT NULL,
  `train_or_flight_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00:00',
  `journey_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `landing_time` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00:00',
  `unit_rate` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_bill` double NOT NULL DEFAULT 0,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mga_service_registration`
--

INSERT INTO `tbl_mga_service_registration` (`id`, `invoice_number`, `client_id`, `service_type_id`, `service_station_id`, `train_or_flight_no`, `start_time`, `journey_date`, `landing_time`, `unit_rate`, `quantity`, `total_bill`, `insert_time`, `insert_by`) VALUES
(13, '20201024104723', 1, 16, 1, '12121212', '11:00', '2020-10-25', '13:00', 0, 1, 400, '2020-10-24 10:47', 1),
(14, '20201024104904', 3, 17, 14, '12121212', '11:30', '2020-10-27', '13:00', 0, 1, 0, '2020-10-24 10:49', 1),
(15, '20201024111117', 4, 16, 7, '22222', '12:15', '2020-10-29', '12:15', 0, 1, 560, '2020-10-24 12:16', 1),
(16, '20201024121634', 5, 17, 14, '12121212', '11:15', '2020-10-30', '13:15', 0, 1, 0, '2020-10-24 12:16', 1),
(19, '20201027114429', 4, 16, 1, '111111', '11:30', '2020-10-28', '11:30', 0, 1, 400, '2020-10-27 11:44', 5),
(24, '20201029174850', 3, 16, 7, '12121212', '17:45', '2020-10-22', '17:45', 560, 1, 560, '2020-10-29 17:48', 5),
(25, '20201029175303', 1, 16, 1, '22222', '17:45', '2020-10-15', '17:45', 400, 1, 400, '2020-10-29 17:53', 5),
(26, '20201101123020', 1, 16, 7, '12121212', '12:15', '2020-11-19', '18:15', 560, 1, 560, '2020-11-01 12:30', 5),
(27, '20201101171724', 1, 16, 1, '12121212', '17:15', '2020-11-17', '17:15', 400, 4, 1600, '2020-11-01 17:17', 1),
(28, '20201101175217', 1, 16, 1, '12121212', '17:45', '2020-11-06', '17:45', 400, 2, 800, '2020-11-01 17:52', 1),
(29, '20201101182716', 3, 16, 1, '12121212', '18:15', '2020-11-11', '18:15', 400, 1, 400, '2020-11-01 18:27', 1),
(30, '20201101183950', 3, 16, 1, '22222', '18:30', '2020-11-06', '18:30', 400, 1, 400, '2020-11-01 18:39', 1),
(31, '20201102141124', 1, 17, 13, '12121212', '14:00', '2020-11-11', '14:00', 34, 1, 34, '2020-11-02 14:11', 2),
(32, '20201102143452', 3, 16, 1, '22222', '14:15', '2020-11-11', '14:15', 400, 1, 400, '2020-11-02 14:34', 5),
(33, '20201102143457', 3, 16, 1, '22222', '14:15', '2020-11-11', '14:15', 400, 1, 400, '2020-11-02 14:34', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mga_service_stations`
--

CREATE TABLE `tbl_mga_service_stations` (
  `id` int(11) NOT NULL,
  `mga_service_type_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `unit_rate` double NOT NULL DEFAULT 0,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mga_service_stations`
--

INSERT INTO `tbl_mga_service_stations` (`id`, `mga_service_type_id`, `name`, `priority`, `unit_rate`, `insert_time`, `insert_by`) VALUES
(1, 16, 'Hazrat Shahjalal International Airport, Dhaka.', 1, 400, '2020-10-04 12:48', 1),
(5, 16, 'Shah Amanat International Airport, Chattogram.', 1, 233, '2020-10-14 18:08', 1),
(7, 16, 'Osmani International Airport, Sylhet.', 1, 560, '2020-10-14 18:25', 1),
(8, 16, ' Saidpur Airport', 1, 780, '2020-10-14 18:26', 1),
(9, 16, 'Shah Makhdum Airport, Rajshahi.', 1, 0, '2020-10-14 18:27', 1),
(10, 16, ' Jessore Airport', 1, 0, '2020-10-14 18:27', 1),
(11, 16, ' Cox\'s Bazar Airport', 1, 0, '2020-10-14 18:28', 1),
(12, 16, ' Barisal Airport', 1, 0, '2020-10-14 18:29', 1),
(13, 17, ' Bir Muktijoddha Sirajul Islam Railway Station', 1, 0, '2020-10-14 18:31', 1),
(14, 17, 'Dinajpur Railway Station', 1, 0, '2020-10-14 18:33', 1),
(15, 17, 'Rangpur Railway Station', 1, 0, '2020-10-14 18:34', 1),
(16, 17, 'Bogura Railway Station', 1, 0, '2020-10-14 18:34', 1),
(17, 17, 'Rashore Railway Station', 1, 0, '2020-10-14 18:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mga_service_type`
--

CREATE TABLE `tbl_mga_service_type` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mga_service_type`
--

INSERT INTO `tbl_mga_service_type` (`id`, `name`, `priority`, `insert_by`, `insert_time`) VALUES
(16, 'Airport', 1, 1, '2020-10-14 14:47'),
(17, 'Railway Station', 1, 1, '2020-10-14 14:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE `tbl_partner` (
  `id` int(11) NOT NULL,
  `partner_name` text COLLATE utf8_unicode_ci NOT NULL,
  `partner_logo` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will top',
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `agent_id` int(11) NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `payment_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `approved_by` int(11) NOT NULL,
  `approved_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shuttle_service_registration`
--

CREATE TABLE `tbl_shuttle_service_registration` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_station_id` int(11) NOT NULL,
  `start_from` text COLLATE utf8_unicode_ci NOT NULL,
  `end_to` text COLLATE utf8_unicode_ci NOT NULL,
  `airlines_id` int(11) NOT NULL DEFAULT 0,
  `travel_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `unit_rate` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_bill` double NOT NULL DEFAULT 0,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_shuttle_service_registration`
--

INSERT INTO `tbl_shuttle_service_registration` (`id`, `invoice_number`, `client_id`, `service_type_id`, `service_station_id`, `start_from`, `end_to`, `airlines_id`, `travel_date`, `unit_rate`, `quantity`, `total_bill`, `insert_time`, `insert_by`) VALUES
(7, '20201024104723', 4, 1, 1, '11:00 ', '11:15 ', 1, '2020-10-28', 0, 1, 400, '2020-10-24 11:05', 1),
(8, '20201024110535', 1, 3, 2, '11:00 ', '06:00 ', 1, '2020-10-28', 0, 1, 400, '2020-10-24 11:05', 1),
(9, '20201024111117', 5, 3, 2, '12:15 ', '12:15 ', 1, '2020-10-28', 0, 1, 678, '2020-10-24 12:20', 1),
(10, '20201024122047', 4, 1, 3, '09:15 ', '12:15 ', 1, '2020-10-28', 0, 1, 890, '2020-10-24 12:20', 1),
(13, '20201028115933', 3, 1, 1, '11:45 ', '11:45 ', 1, '2020-10-30', 400, 2, 400, '2020-10-28 11:59', 5),
(14, '20201028120452', 9, 3, 2, '13:00 ', '14:00 ', 1, '2020-10-31', 678, 5, 678, '2020-10-28 12:04', 5),
(15, '20201028120741', 3, 3, 2, '14:00 ', '17:00 ', 1, '2020-10-30', 678, 8, 5424, '2020-10-28 12:07', 5),
(18, '20201029174850', 3, 3, 2, '17:45 ', '17:45 ', 1, '2020-10-29', 678, 1, 678, '2020-10-29 17:48', 5),
(19, '20201029175303', 1, 1, 1, '17:45 ', '17:45 ', 1, '2020-10-30', 400, 1, 400, '2020-10-29 17:53', 5),
(20, '20201101122213', 1, 1, 1, '12:15 ', '14:15 ', 1, '2020-11-25', 400, 1, 400, '2020-11-01 12:22', 5),
(21, '20201101172620', 3, 3, 2, '17:15 ', '17:15 ', 1, '2020-11-20', 678, 1, 678, '2020-11-01 17:26', 1),
(22, '20201101175217', 1, 1, 1, '17:45 ', '17:45 ', 1, '2020-11-11', 400, 2, 800, '2020-11-01 17:52', 1),
(23, '20201101182348', 3, 1, 1, '18:15 ', '18:15 ', 1, '2020-11-13', 400, 3, 1200, '2020-11-01 18:23', 1),
(24, '20201101183950', 3, 3, 2, '18:30 ', '18:30 ', 1, '2020-11-11', 678, 1, 678, '2020-11-01 18:39', 1),
(25, '20201102141249', 3, 3, 2, '14:00 ', '14:00 ', 1, '2020-11-11', 678, 1, 678, '2020-11-02 14:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shuttle_service_stations`
--

CREATE TABLE `tbl_shuttle_service_stations` (
  `id` int(11) NOT NULL,
  `shuttle_service_type_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT 'smaller will first',
  `unit_rate` double NOT NULL DEFAULT 0,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_shuttle_service_stations`
--

INSERT INTO `tbl_shuttle_service_stations` (`id`, `shuttle_service_type_id`, `name`, `file`, `priority`, `unit_rate`, `insert_time`, `insert_by`) VALUES
(1, 1, 'Hazrat Shahjalal International Airport, Dhaka.', '', 1, 400, '2020-10-07 15:19', 1),
(2, 3, 'Saidpur', '', 1, 678, '2020-10-07 15:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shuttle_type`
--

CREATE TABLE `tbl_shuttle_type` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) DEFAULT 1 COMMENT 'smaller will first',
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_shuttle_type`
--

INSERT INTO `tbl_shuttle_type` (`id`, `name`, `priority`, `insert_by`, `insert_time`) VALUES
(1, 'Airport', 1, 1, '2020-10-07 14:35'),
(3, 'Landport', 1, 1, '2020-10-07 15:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_bin DEFAULT NULL COMMENT 'size 1240x380',
  `priority` int(11) NOT NULL COMMENT 'max upper',
  `insert_by` int(11) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `subtitle` text COLLATE utf8_bin DEFAULT NULL,
  `title` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `photo`, `priority`, `insert_by`, `insert_time`, `subtitle`, `title`) VALUES
(14, 'assets/sliderPhoto/music_20201004120726.jpg', 1, 1, '2020-10-03 08:08:35', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'welcome to Sulaiman Supplies'),
(15, 'assets/sliderPhoto/wedding_20201004120710.jpg', 2, 1, '2020-10-03 08:09:06', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'welcome to Sulaiman Supplies'),
(16, 'assets/sliderPhoto/slider_20201004120718.jpg', 10, 1, '2020-10-03 11:46:44', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'oooooooooooooo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_send_list`
--

CREATE TABLE `tbl_sms_send_list` (
  `id` int(11) NOT NULL,
  `send_date_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `receiver_numbers` text COLLATE utf8_unicode_ci NOT NULL,
  `insert_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_send_list`
--

INSERT INTO `tbl_sms_send_list` (`id`, `send_date_time`, `message`, `receiver_numbers`, `insert_by`) VALUES
(3, '2020-09-20 14:06:32', 'sdfsdfsdf dsf dsf', '017225855,98435,68,64,54,6549,87,8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_send_setting`
--

CREATE TABLE `tbl_sms_send_setting` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_send_setting`
--

INSERT INTO `tbl_sms_send_setting` (`id`, `username`, `password`, `last_update`) VALUES
(1, 'sdfsd', 'sdfsdf', '2020-09-20 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upozilla`
--

CREATE TABLE `tbl_upozilla` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `zilla_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_upozilla`
--

INSERT INTO `tbl_upozilla` (`id`, `division_id`, `zilla_id`, `name`) VALUES
(1, 1, 1, 'সাভার'),
(2, 1, 1, 'ধামরাই'),
(3, 1, 1, 'কেরাণীগঞ্জ'),
(4, 1, 1, 'নবাবগঞ্জ'),
(5, 1, 1, 'দোহার'),
(6, 1, 1, 'তেজগাঁও উন্নয়ন সার্কেল'),
(7, 1, 2, 'কালীগঞ্জ'),
(8, 1, 2, 'কালিয়াকৈর'),
(9, 1, 2, 'কাপাসিয়া'),
(10, 1, 2, 'গাজীপুর সদর'),
(11, 1, 2, 'শ্রীপুর'),
(12, 1, 3, 'বাসাইল'),
(13, 1, 3, 'ভুয়াপুর'),
(14, 1, 3, 'ঘাটাইল'),
(15, 1, 3, 'দেলদুয়ার'),
(16, 1, 3, 'গোপালপুর'),
(17, 1, 3, 'মধুপুর'),
(18, 1, 3, 'মির্জাপুর'),
(19, 1, 3, 'নাগরপুর'),
(20, 1, 3, 'সখিপুর'),
(21, 1, 3, 'টাঙ্গাইল সদর'),
(22, 1, 3, 'কালিহাতী'),
(23, 1, 3, 'ধনবাড়ি'),
(24, 1, 4, 'আড়াইহাজার'),
(25, 1, 4, 'বন্দর'),
(26, 1, 4, 'নারায়ণগঞ্জ সদর'),
(27, 1, 4, 'রূপগঞ্জ'),
(28, 1, 4, 'সোনারগাঁ'),
(29, 1, 5, 'ইটনা'),
(30, 1, 5, 'কটিয়াদি'),
(31, 1, 5, 'ভৈরব'),
(32, 1, 5, 'হোসেনপুর'),
(33, 1, 5, 'তাড়াইল'),
(34, 1, 5, 'পাকুন্দিয়া'),
(35, 1, 5, 'কুলিয়ারচর'),
(36, 1, 5, 'কিশোরগঞ্জ সদর'),
(37, 1, 5, 'করিমগঞ্জ'),
(38, 1, 5, 'বাজিতপুর'),
(39, 1, 5, 'অষ্টগ্রাম'),
(40, 1, 5, 'মিঠামইন'),
(41, 1, 5, 'নিকলী'),
(42, 1, 6, 'বেলাবো'),
(43, 1, 6, 'মনোহরদী'),
(44, 1, 6, 'নরসিংদী সদর'),
(45, 1, 6, 'পলাশ'),
(46, 1, 6, 'রায়পুরা'),
(47, 1, 6, 'শিবপুর'),
(48, 1, 7, 'রাজবাড়ী সদর'),
(49, 1, 7, 'গোয়ালন্দ'),
(50, 1, 7, 'পাংশা'),
(51, 1, 7, 'বালিয়াকান্দি'),
(52, 1, 7, 'কালুখালী'),
(53, 1, 8, 'ফরিদপুর সদর'),
(54, 1, 8, 'আলফাডাঙ্গা'),
(55, 1, 8, 'বোয়ালমারী'),
(56, 1, 8, 'সদরপুর'),
(57, 1, 8, 'নগরকান্দা'),
(58, 1, 8, 'ভাঙ্গা'),
(59, 1, 8, 'চরভদ্রাসন'),
(60, 1, 8, 'মধুখালী'),
(61, 1, 8, 'সালথা'),
(62, 1, 9, 'মাদারীপুর সদর'),
(63, 1, 9, 'শিবচর'),
(64, 1, 9, 'কালকিনি'),
(65, 1, 9, 'রাজৈর'),
(66, 1, 10, 'গোপালগঞ্জ সদর'),
(67, 1, 10, 'কাশিয়ানী'),
(68, 1, 10, 'টুংগীপাড়া'),
(69, 1, 10, 'কোটালীপাড়া'),
(70, 1, 10, 'মুকসুদপুর'),
(71, 1, 11, 'মুন্সিগঞ্জ সদর'),
(72, 1, 11, 'শ্রীনগর'),
(73, 1, 11, 'সিরাজদিখান'),
(74, 1, 11, 'লৌহজং '),
(75, 1, 11, 'গজারিয়া'),
(76, 1, 11, 'টংগিবাড়ী'),
(77, 1, 12, 'হরিরামপুর'),
(78, 1, 12, 'সাটুরিয়া'),
(79, 1, 12, 'মানিকগঞ্জ সদর'),
(80, 1, 12, 'ঘিওর'),
(81, 1, 12, 'শিবালয়'),
(82, 1, 12, 'দৌলতপুর'),
(83, 1, 12, 'সিংগাইর'),
(84, 1, 13, 'শরিয়তপুর সদর'),
(85, 1, 13, 'নড়িয়া'),
(86, 1, 13, 'জাজিরা'),
(87, 1, 13, 'গোসাইরহাট'),
(88, 1, 13, 'ভেদরগঞ্জ'),
(89, 1, 13, 'ডামুড্যা'),
(90, 2, 14, 'পবা'),
(91, 2, 14, 'দুর্গাপুর'),
(92, 2, 14, 'মোহনপুর'),
(93, 2, 14, 'চারঘাট'),
(94, 2, 14, 'পুঠিয়া'),
(95, 2, 14, 'বাঘা'),
(96, 2, 14, 'গোদাগাড়ী'),
(97, 2, 14, 'তানোর'),
(98, 2, 14, 'বাঘমারা'),
(99, 2, 15, 'বেলকুচি'),
(100, 2, 15, 'চৌহালি'),
(101, 2, 15, 'কামারখন্দ'),
(102, 2, 15, 'কাজীপুর'),
(103, 2, 15, 'রায়গঞ্জ'),
(104, 2, 15, 'শাহজাদপুর'),
(105, 2, 15, 'সিরাজগঞ্জ সদর'),
(106, 2, 15, 'তাড়াশ'),
(107, 2, 15, 'উল্লাপাড়া'),
(108, 2, 16, 'সুজানগর'),
(109, 2, 16, 'ঈশ্বরদী'),
(110, 2, 16, 'ভাঙ্গুরা'),
(111, 2, 16, 'পাবনা সদর'),
(112, 2, 16, 'বেড়া'),
(113, 2, 16, 'আটঘরিয়া'),
(114, 2, 16, 'চাটমোহর'),
(115, 2, 16, 'সাঁথিয়া'),
(116, 2, 16, 'ফরিদপুর'),
(117, 2, 17, 'কাহালু'),
(118, 2, 17, 'বগুড়া সদর'),
(119, 2, 17, 'সারিয়াকান্দি'),
(120, 2, 17, 'শাজাহানপুর'),
(121, 2, 17, 'দুপচাঁচিয়া'),
(122, 2, 17, 'আদমদিঘি'),
(123, 2, 17, 'নন্দিগ্রাম'),
(124, 2, 17, 'সোনাতলা'),
(125, 2, 17, 'ধুনট'),
(126, 2, 17, 'গাবতলী'),
(127, 2, 17, 'শেরপুর'),
(128, 2, 17, 'শিবগঞ্জ'),
(129, 2, 18, 'চাঁপাইনবাবগঞ্জ সদর'),
(130, 2, 18, 'গোমস্তাপুর'),
(131, 2, 18, 'নাচোল'),
(132, 2, 18, 'ভোলাহাট'),
(133, 2, 18, 'শিবগঞ্জ'),
(134, 2, 19, 'আক্কেলপুর'),
(135, 2, 19, 'কালাই'),
(136, 2, 19, 'ক্ষেতলাল'),
(137, 2, 19, 'পাঁচবিবি'),
(138, 2, 19, 'জয়পুরহাট সদর'),
(139, 2, 20, 'মহাদেবপুর'),
(140, 2, 20, 'বদলগাছী'),
(141, 2, 20, 'পত্নিতলা'),
(142, 2, 20, 'ধামইরহাট'),
(143, 2, 20, 'নিয়ামতপুর'),
(144, 2, 20, 'মান্দা'),
(145, 2, 20, 'আত্রাই'),
(146, 2, 20, 'রাণীনগর'),
(147, 2, 20, 'নওগাঁ সদর'),
(148, 2, 20, 'সাপাহার'),
(149, 2, 20, 'পোরশা'),
(150, 2, 21, 'নাটোর সদর'),
(151, 2, 21, 'সিংড়া'),
(152, 2, 21, 'বড়াইগ্রাম'),
(153, 2, 21, 'বাগাতিপাড়া'),
(154, 2, 21, 'গুরুদাসপুর'),
(155, 2, 21, 'লালপুর'),
(156, 2, 21, 'নলডাঙ্গা'),
(157, 3, 22, 'রাঙ্গুনিয়া'),
(158, 3, 22, 'সীতাকুণ্ড'),
(159, 3, 22, 'মীরসরাই'),
(160, 3, 22, 'পটিয়া'),
(161, 3, 22, 'সন্দ্বীপ'),
(162, 3, 22, 'বাঁশখালী'),
(163, 3, 22, 'বোয়ালখালী'),
(164, 3, 22, 'আনোয়ারা'),
(165, 3, 22, 'সাতকানিয়া'),
(166, 3, 22, 'লোহাগাড়া'),
(167, 3, 22, 'হাটহাজারী'),
(168, 3, 22, 'ফটিকছড়ি'),
(169, 3, 22, 'রাঊজান'),
(170, 3, 22, 'চন্দনাইশ'),
(171, 3, 23, 'দেবিদ্বার'),
(172, 3, 23, 'বরুড়া'),
(173, 3, 23, 'ব্রাহ্মণপাড়া'),
(174, 3, 23, 'চান্দিনা'),
(175, 3, 23, 'চৌদ্দগ্রাম'),
(176, 3, 23, 'দাউদকান্দি'),
(177, 3, 23, 'হোমনা'),
(178, 3, 23, 'লাকসাম'),
(179, 3, 23, 'মুরাদনগর'),
(180, 3, 23, 'নাঙ্গলকোট'),
(181, 3, 23, 'কুমিল্লা সদর'),
(182, 3, 23, 'মেঘনা'),
(183, 3, 23, 'মনোহরগঞ্জ'),
(184, 3, 23, 'সদর দক্ষিণ'),
(185, 3, 23, 'তিতাস'),
(186, 3, 23, 'বুড়িচং'),
(187, 3, 24, 'ছাগলনাইয়া'),
(188, 3, 24, 'ফেনী সদর'),
(189, 3, 24, 'সোনাগাজী'),
(190, 3, 24, 'ফুলগাজী'),
(191, 3, 24, 'পরশুরাম'),
(192, 3, 24, 'দাগনভুঞা'),
(193, 3, 25, 'ব্রাহ্মণবাড়িয়া সদর'),
(194, 3, 25, 'কসবা'),
(195, 3, 25, 'নাসিরনগর'),
(196, 3, 25, 'সরাইল'),
(197, 3, 25, 'আশুগঞ্জ'),
(198, 3, 25, 'আখাউরা'),
(199, 3, 25, 'নবীনগর'),
(200, 3, 25, 'বাঞ্ছারামপুর'),
(201, 3, 25, 'বিজয়নগর'),
(202, 3, 26, 'রাঙ্গামাটি সদর'),
(203, 3, 26, 'কাপ্তাই'),
(204, 3, 26, 'কাউখালী'),
(205, 3, 26, 'বাঘাইছড়ি'),
(206, 3, 26, 'বরকল'),
(207, 3, 26, 'লংগদু'),
(208, 3, 26, 'রাজস্থলী'),
(209, 3, 26, 'বিলাইছড়ি'),
(210, 3, 26, 'জুরাছড়ি'),
(211, 3, 26, 'নানিয়ারচর'),
(212, 3, 27, 'হাইমচর'),
(213, 3, 27, 'কচুয়া'),
(214, 3, 27, 'শহরাস্তি'),
(215, 3, 27, 'চাঁদপুর সদর'),
(216, 3, 27, 'মতলব উত্তর'),
(217, 3, 27, 'ফরিদ্গঞ্জ'),
(218, 3, 27, 'মতলব দক্ষিণ'),
(219, 3, 27, 'হাজীগঞ্জ'),
(220, 3, 28, 'নোয়াখালী সদর'),
(221, 3, 28, 'কোম্পানীগঞ্জ'),
(222, 3, 28, 'বেগমগঞ্জ'),
(223, 3, 28, 'হাতিয়া'),
(224, 3, 28, 'সুবর্ণচর'),
(225, 3, 28, 'কবিরহাট'),
(226, 3, 28, 'সেনবাগ'),
(227, 3, 28, 'চাটখিল'),
(228, 3, 28, 'সোনাইমুড়ী'),
(229, 3, 29, 'লক্ষ্মীপুর সদর'),
(230, 3, 29, 'কমলনগর'),
(231, 3, 29, 'রায়পুর'),
(232, 3, 29, 'রামগতি'),
(233, 3, 29, 'রামগঞ্জ'),
(234, 3, 30, 'কক্সবাজার সদর'),
(235, 3, 30, 'চকরিয়া'),
(236, 3, 30, 'কুতুবদিয়া'),
(237, 3, 30, 'উখিয়া'),
(238, 3, 30, 'মহেশখালী'),
(239, 3, 30, 'পেকুয়া'),
(240, 3, 30, 'রামু'),
(241, 3, 30, 'টেকনাফ'),
(242, 3, 31, 'খাগড়াছড়ি সদর'),
(243, 3, 31, 'দিঘীনালা'),
(244, 3, 31, 'পানছড়ি'),
(245, 3, 31, 'লক্ষীছড়ি'),
(246, 3, 31, 'মহালছড়ি'),
(247, 3, 31, 'মানিকছড়ি'),
(248, 3, 31, 'রামগড়'),
(249, 3, 31, 'মাটিরাঙ্গা'),
(250, 3, 31, 'গুইমারা'),
(251, 3, 32, 'বান্দরবান সদর'),
(252, 3, 32, 'আলীকদম'),
(253, 3, 32, 'নাইক্ষ্যংছড়ি'),
(254, 3, 32, 'রোয়াংছড়ি'),
(255, 3, 32, 'লামা'),
(256, 3, 32, 'রুমা'),
(257, 3, 32, 'থানচি'),
(258, 4, 33, 'বালাগঞ্জ'),
(259, 4, 33, 'বিয়ানীবাজার'),
(260, 4, 33, 'বিশ্বনাথ'),
(261, 4, 33, 'কোম্পানীগঞ্জ'),
(262, 4, 33, 'ফেঞ্চুগঞ্জ'),
(263, 4, 33, 'গোলাপগঞ্জ'),
(264, 4, 33, 'গোয়াইনঘাট'),
(265, 4, 33, 'জৈন্তাপুর'),
(266, 4, 33, 'কানাইঘাট'),
(267, 4, 33, 'সিলেট সদর'),
(268, 4, 33, 'জকিগঞ্জ'),
(269, 4, 33, 'দক্ষিণ সুরমা'),
(270, 4, 33, 'ওসমানী নগর'),
(271, 4, 34, 'বড়লেখা'),
(272, 4, 34, 'কমলগঞ্জ'),
(273, 4, 34, 'কুলাউরা'),
(274, 4, 34, 'মৌলভীবাজার সদর '),
(275, 4, 34, 'রাজনগর'),
(276, 4, 34, 'শ্রীমঙ্গল'),
(277, 4, 34, 'জুড়ী'),
(278, 4, 35, 'নবীগঞ্জ'),
(279, 4, 35, 'বাহুবল'),
(280, 4, 35, 'আজমিরীগঞ্জ'),
(281, 4, 35, 'বানিয়াচং'),
(282, 4, 35, 'লাখাই'),
(283, 4, 35, 'চুনারুঘাট'),
(284, 4, 35, 'হবিগঞ্জ সদর'),
(285, 4, 35, 'মাধবপুর'),
(286, 4, 36, 'সুনামগঞ্জ সদর'),
(287, 4, 36, 'দক্ষিণ সুনামগঞ্জ'),
(288, 4, 36, 'বিশ্বম্ভরপুর'),
(289, 4, 36, 'ছাতক'),
(290, 4, 36, 'জগন্নাথপুর'),
(291, 4, 36, 'তাহিরপুর'),
(292, 4, 36, 'ধর্মপাশা'),
(293, 4, 36, 'জামালগঞ্জ'),
(294, 4, 36, 'শাল্লা'),
(295, 4, 36, 'দিরাই'),
(296, 4, 36, 'দোয়ারাবাজার'),
(297, 5, 37, 'পাইকগাছা'),
(298, 5, 37, 'ফুলতলা'),
(299, 5, 37, 'দিঘলিয়া'),
(300, 5, 37, 'রূপসা'),
(301, 5, 37, 'তেরখাদা'),
(302, 5, 37, 'ডুমুরিয়া'),
(303, 5, 37, 'বটিয়াঘাটা'),
(304, 5, 37, 'দাকোপ'),
(305, 5, 37, 'কয়রা'),
(306, 5, 38, 'মণিরামপুর'),
(307, 5, 38, 'অভয়নগর'),
(308, 5, 38, 'বাঘারপাড়া'),
(309, 5, 38, 'চৌগাছা'),
(310, 5, 38, 'ঝিকরগাছা'),
(311, 5, 38, 'কেশবপুর'),
(312, 5, 38, 'যশোর সদর'),
(313, 5, 38, 'শার্শা'),
(314, 5, 39, 'আশাশুনি'),
(315, 5, 39, 'দেবহাটা'),
(316, 5, 39, 'কলারোয়া'),
(317, 5, 39, 'সাতক্ষীরা সদর'),
(318, 5, 39, 'শ্যামনগর'),
(319, 5, 39, 'তালা'),
(320, 5, 39, 'কালিগঞ্জ'),
(321, 5, 40, 'মুজিবনগর'),
(322, 5, 40, 'মেহেরপুর সদর'),
(323, 5, 40, 'গাংনী'),
(324, 5, 41, 'নড়াইল সদর'),
(325, 5, 41, 'লোহাগড়া'),
(326, 5, 41, 'কালিয়া'),
(327, 5, 42, 'চুয়াডাঙ্গা সদর'),
(328, 5, 42, 'আলমডাঙ্গা'),
(329, 5, 42, 'দামুড়হুদা'),
(330, 5, 42, 'জীবননগর'),
(331, 5, 43, 'শালিখা'),
(332, 5, 43, 'শ্রীপুর'),
(333, 5, 43, 'মাগুরা সদর'),
(334, 5, 43, 'মহম্মদপুর'),
(335, 5, 44, 'ফকিরহাট'),
(336, 5, 44, 'বাগেরহাট সদর'),
(337, 5, 44, 'মোল্লাহাট'),
(338, 5, 44, 'শরণখোলা'),
(339, 5, 44, 'রামপাল'),
(340, 5, 44, 'মোড়েলগঞ্জ'),
(341, 5, 44, 'কচুয়া'),
(342, 5, 44, 'মোংলা'),
(343, 5, 44, 'চিতলমারী'),
(344, 5, 45, 'ঝিনাইদহ সদর'),
(345, 5, 45, 'শৈলকুপা'),
(346, 5, 45, 'হরিণাকুণ্ডু '),
(347, 5, 45, 'কালীগঞ্জ'),
(348, 5, 45, 'কোটচাঁদপুর'),
(349, 5, 45, 'মহেশপুর'),
(350, 5, 46, 'কুষ্টিয়া সদর'),
(351, 5, 46, 'কুমারখালী'),
(352, 5, 46, 'খোকসা'),
(353, 5, 46, 'মিরপুর'),
(354, 5, 46, 'দৌলতপুর'),
(355, 5, 46, 'ভেড়ামারা'),
(356, 6, 47, 'বরিশাল সদর'),
(357, 6, 47, 'বাকেরগঞ্জ'),
(358, 6, 47, 'বাবুগঞ্জ'),
(359, 6, 47, 'উজিরপুর'),
(360, 6, 47, 'বানারীপাড়া'),
(361, 6, 47, 'গৌরনদী'),
(362, 6, 47, 'আগৈলঝাড়া'),
(363, 6, 47, 'মেহেন্দিগঞ্জ'),
(364, 6, 47, 'মুলাদী'),
(365, 6, 47, 'হিজলা'),
(366, 6, 48, 'ঝালকাঠি সদর'),
(367, 6, 48, 'কাঠালিয়া'),
(368, 6, 48, 'নলছিটি'),
(369, 6, 48, 'রাজাপুর'),
(370, 6, 49, 'বাউফল'),
(371, 6, 49, 'পটুয়াখালী সদর'),
(372, 6, 49, 'দুমকি'),
(373, 6, 49, 'দশমিনা'),
(374, 6, 49, 'কলাপাড়া'),
(375, 6, 49, 'মির্জাগঞ্জ'),
(376, 6, 49, 'গলাচিপা'),
(377, 6, 49, 'রাঙ্গাবালী'),
(378, 6, 50, 'পিরোজপুর সদর'),
(379, 6, 50, 'নাজিরপুর'),
(380, 6, 50, 'কাউখালী'),
(381, 6, 50, 'জিয়ানগর'),
(382, 6, 50, 'ভান্ডারিয়া'),
(383, 6, 50, 'মঠবাড়ীয়া'),
(384, 6, 50, 'নেছারাবাদ'),
(385, 6, 51, 'ভোলা সদর'),
(386, 6, 51, 'বোরহানউদ্দিন'),
(387, 6, 51, 'চরফ্যাশন'),
(388, 6, 51, 'দৌলতখান'),
(389, 6, 51, 'মনপুরা'),
(390, 6, 51, 'তজুমদ্দিন'),
(391, 6, 51, 'লালমোহন'),
(392, 6, 52, 'আমতলী'),
(393, 6, 52, 'বরগুনা সদর'),
(394, 6, 52, 'বেতাগী'),
(395, 6, 52, 'বামনা'),
(396, 6, 52, 'পাথরঘাটা'),
(397, 6, 52, 'তালতলি'),
(398, 7, 53, 'রংপুর সদর'),
(399, 7, 53, 'গঙ্গাচড়া'),
(400, 7, 53, 'তারাগঞ্জ'),
(401, 7, 53, 'বদরগঞ্জ'),
(402, 7, 53, 'মিঠাপুকুর'),
(403, 7, 53, 'কাউনিয়া'),
(404, 7, 53, 'পীরগঞ্জ'),
(405, 7, 53, 'পীরগাছা'),
(406, 7, 54, 'লালমনিরহাট সদর'),
(407, 7, 54, 'আদিতমারী'),
(408, 7, 54, 'কালীগঞ্জ'),
(409, 7, 54, 'হাতীবান্ধা'),
(410, 7, 54, 'পাটগ্রাম'),
(411, 7, 55, 'পঞ্চগড় সদর'),
(412, 7, 55, 'দেবীগঞ্জ'),
(413, 7, 55, 'বোদা'),
(414, 7, 55, 'আটোয়ারী'),
(415, 7, 55, 'তেতুলিয়া'),
(416, 7, 56, 'কুড়িগ্রাম সদর'),
(417, 7, 56, 'নাগেশ্বরী'),
(418, 7, 56, 'ভুরুঙ্গামারী'),
(419, 7, 56, 'ফুলবাড়ী'),
(420, 7, 56, 'রাজারহাট'),
(421, 7, 56, 'উলিপুর'),
(422, 7, 56, 'চিলমারী'),
(423, 7, 56, 'রৌমারী'),
(424, 7, 56, 'চর রাজিবপুর'),
(425, 7, 57, 'নবাবগঞ্জ'),
(426, 7, 57, 'বীরগঞ্জ'),
(427, 7, 57, 'ঘোড়াঘাট'),
(428, 7, 57, 'বিরামপুর'),
(429, 7, 57, 'পার্বতীপুর'),
(430, 7, 57, 'বোচাগঞ্জ'),
(431, 7, 57, 'কাহারোল'),
(432, 7, 57, 'ফুলবাড়ী'),
(433, 7, 57, 'দিনাজপুর সদর'),
(434, 7, 57, 'হাকিমপুর'),
(435, 7, 57, 'খানসামা'),
(436, 7, 57, 'বিরল'),
(437, 7, 57, 'চিরিরবন্দর'),
(438, 7, 58, 'ঠাকুরগাঁও সদর'),
(439, 7, 58, 'পীরগঞ্জ'),
(440, 7, 58, 'রাণীশংকৈল'),
(441, 7, 58, 'হরিপুর'),
(442, 7, 58, 'বালিয়াডাঙ্গী'),
(443, 7, 59, 'সাদুল্লাপুর'),
(444, 7, 59, 'গাইবান্ধা সদর'),
(445, 7, 59, 'পলাশবাড়ী'),
(446, 7, 59, 'সাঘাটা'),
(447, 7, 59, 'গোবিন্দগঞ্জ'),
(448, 7, 59, 'সুন্দরগঞ্জ'),
(449, 7, 59, 'ফুলছড়ি'),
(450, 7, 60, 'সৈয়দপুর'),
(451, 7, 60, 'ডোমার'),
(452, 7, 60, 'ডিমলা'),
(453, 7, 60, 'জলঢাকা'),
(454, 7, 60, 'কিশোরগঞ্জ'),
(455, 7, 60, 'নীলফামারী সদর'),
(456, 8, 61, 'ফুলবাড়ীয়া '),
(457, 8, 61, 'ত্রিশাল'),
(458, 8, 61, 'ভালুকা'),
(459, 8, 61, 'মুক্তাগাছা'),
(460, 8, 61, 'ময়মনসিংহ সদর'),
(461, 8, 61, 'ধোবাউরা'),
(462, 8, 61, 'ফুলপুর'),
(463, 8, 61, 'হালুয়াঘাট'),
(464, 8, 61, 'গৌরীপুর'),
(465, 8, 61, 'গফরগাঁও'),
(466, 8, 61, 'ঈশ্বরগঞ্জ'),
(467, 8, 61, 'নান্দাইল'),
(468, 8, 61, 'তারাকান্দা'),
(469, 8, 62, 'জামালপুর সদর'),
(470, 8, 62, 'মেলান্দহ'),
(471, 8, 62, 'ইসলামপুর'),
(472, 8, 62, 'দেওয়ানগঞ্জ'),
(473, 8, 62, 'সরিষাবাড়ী'),
(474, 8, 62, 'মাদারগঞ্জ'),
(475, 8, 62, 'বকশীগঞ্জ'),
(476, 8, 63, 'বারহাট্টা'),
(477, 8, 63, 'দুর্গাপুর'),
(478, 8, 63, 'কেন্দুয়া'),
(479, 8, 63, 'আটপাড়া'),
(480, 8, 63, 'মদন'),
(481, 8, 63, 'খালিয়াজুরী'),
(482, 8, 63, 'কলমাকান্দা'),
(483, 8, 63, 'মোহনগঞ্জ'),
(484, 8, 63, 'পূর্বধলা'),
(485, 8, 63, 'নেত্রকোনা সদর'),
(486, 8, 64, 'শেরপুর সদর'),
(487, 8, 64, 'নালিতাবাড়ী'),
(488, 8, 64, 'শ্রীবরদী'),
(489, 8, 64, 'নকলা'),
(490, 8, 64, 'ঝিনাইগাতী'),
(491, 1, 1, 'ঢাকা মহানগর');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zilla`
--

CREATE TABLE `tbl_zilla` (
  `id` int(11) NOT NULL,
  `divission_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_zilla`
--

INSERT INTO `tbl_zilla` (`id`, `divission_id`, `name`) VALUES
(1, 1, 'ঢাকা'),
(2, 1, 'গাজীপুর'),
(3, 1, 'টাঙ্গাইল'),
(4, 1, 'নারায়ণগঞ্জ'),
(5, 1, 'কিশোরগঞ্জ'),
(6, 1, 'নরসিংদী'),
(7, 1, 'রাজবাড়ী'),
(8, 1, 'ফরিদপুর'),
(9, 1, 'মাদারীপুর'),
(10, 1, 'গোপালগঞ্জ'),
(11, 1, 'মুন্সিগঞ্জ'),
(12, 1, 'মানিকগঞ্জ'),
(13, 1, 'শরীয়তপুর'),
(14, 2, 'রাজশাহী'),
(15, 2, 'সিরাজগঞ্জ'),
(16, 2, 'পাবনা'),
(17, 2, 'বগুড়া'),
(18, 2, 'চাঁপাইনবাবগঞ্জ'),
(19, 2, 'জয়পুরহাট'),
(20, 2, 'নওগাঁ'),
(21, 2, 'নাটোর'),
(22, 3, 'চট্টগ্রাম'),
(23, 3, 'কুমিল্লা'),
(24, 3, 'ফেনী'),
(25, 3, 'ব্রাহ্মণবাড়িয়া'),
(26, 3, 'রাঙ্গামাটি'),
(27, 3, 'চাঁদপুর'),
(28, 3, 'নোয়াখালী'),
(29, 3, 'লক্ষ্মীপুর'),
(30, 3, 'কক্সবাজার'),
(31, 3, 'খাগড়াছড়ি'),
(32, 3, 'বান্দরবান'),
(33, 4, 'সিলেট'),
(34, 4, 'মৌলভীবাজার'),
(35, 4, 'হবিগঞ্জ'),
(36, 4, 'সুনামগঞ্জ'),
(37, 5, 'খুলনা'),
(38, 5, 'যশোর'),
(39, 5, 'সাতক্ষীরা'),
(40, 5, 'মেহেরপুর'),
(41, 5, 'নড়াইল'),
(42, 5, 'চুয়াডাঙ্গা'),
(43, 5, 'মাগুড়া'),
(44, 5, 'বাগেরহাট'),
(45, 5, 'ঝিনাইদহ'),
(46, 5, 'কুষ্টিয়া'),
(47, 6, 'বরিশাল'),
(48, 6, 'ঝালকাঠি'),
(49, 6, 'পটুয়াখালী'),
(50, 6, 'পিরোজপুর'),
(51, 6, 'ভোলা'),
(52, 6, 'বরগুনা'),
(53, 7, 'রংপুর'),
(54, 7, 'লালমনিরহাট'),
(55, 7, 'পঞ্চগড়'),
(56, 7, 'কুড়িগ্রাম'),
(57, 7, 'দিনাজপুর'),
(58, 7, 'ঠাকুরগাঁও'),
(59, 7, 'গাইবান্ধা'),
(60, 7, 'নীলফামারী'),
(61, 8, 'ময়মনসিংহ'),
(62, 8, 'জামালপুর'),
(63, 8, 'নেত্রকোনা'),
(64, 8, 'শেরপুর'),
(65, 1, 'ঢাকা উত্তর সিটি কর্পোরেশন'),
(66, 1, 'ঢাকা দক্ষিণ সিটি কর্পোরেশন'),
(67, 6, 'বরিশাল সিটি কর্পোরেশন'),
(68, 3, 'চট্টগ্রাম সিটি কর্পোরেশন'),
(69, 3, 'কুমিল্লা সিটি কর্পোরেশন'),
(70, 1, 'গাজিপুর সিটি কর্পোরেশন'),
(71, 1, 'নারায়ণগঞ্জ সিটি কর্পোরেশন'),
(72, 5, 'খুলনা সিটি কর্পোরেশন'),
(73, 8, 'ময়মনসিংহ সিটি কর্পোরেশন'),
(74, 2, 'রাজশাহী সিটি কর্পোরেশন'),
(75, 7, 'রংপুর সিটি কর্পোরেশন'),
(76, 4, 'সিলেট সিটি কর্পোরেশন');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `priority` int(11) NOT NULL COMMENT 'max top, min low',
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `priority`, `photo`, `description`, `insert_by`, `insert_time`) VALUES
(8, 'cc', 'Founder', 0, '', 'uhioyi', 1, '2020-10-13 08:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `address` int(11) NOT NULL COMMENT 'thana id',
  `roadHouse` text NOT NULL,
  `phone` text NOT NULL,
  `userType` text NOT NULL,
  `photo` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 for active user, 0 for not active user',
  `emailVerified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 for verify, 0 for not verify',
  `mobileVerified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 for verify, 0 for not verify'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `address`, `roadHouse`, `phone`, `userType`, `photo`, `status`, `emailVerified`, `mobileVerified`) VALUES
(1, 'Md.', 'Rayhanuzzaman', 'roky', 'info@hrsoftbd.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 9, 'shail chow', '01700000089', 'admin', 'assets/userPhoto/ProfilePicDemo_20201025100650.png', 1, 1, 1),
(2, 'Teacher ', 'Teacher', 'teacher', 'teacher@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 90, 'Joypurhat', '01788888888', 'user', 'assets/userPhoto/ProfilePicDemo_20201102103423.png', 1, 0, 0),
(4, 'q', 'r', 'qr', 'qr@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 9, 'shail chow', '01700000089', 'agent', 'assets/userPhoto/images_20201024181034.jpg', 1, 0, 0),
(5, 'oyon', 'islam', 'oyon', 'oyoni4001@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 172, 'shail chow', '01846951143', 'agent', 'assets/userPhoto/ProfilePicDemo_20201026102551.png', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='types of user, each type has single controller';

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `value`, `name`) VALUES
(1, 'user', 'User'),
(2, 'agent', 'Agent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_airmail_service_registration`
--
ALTER TABLE `tbl_airmail_service_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `tbl_airmail_service_stations`
--
ALTER TABLE `tbl_airmail_service_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_airmail_service_type`
--
ALTER TABLE `tbl_airmail_service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `tbl_common_pages`
--
ALTER TABLE `tbl_common_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_divission`
--
ALTER TABLE `tbl_divission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_general`
--
ALTER TABLE `tbl_general`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `tbl_lounge_service_registration`
--
ALTER TABLE `tbl_lounge_service_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `tbl_lounge_service_stations`
--
ALTER TABLE `tbl_lounge_service_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lounge_type`
--
ALTER TABLE `tbl_lounge_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mail_send_setting`
--
ALTER TABLE `tbl_mail_send_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_main_services`
--
ALTER TABLE `tbl_main_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mga_service_registration`
--
ALTER TABLE `tbl_mga_service_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `tbl_mga_service_stations`
--
ALTER TABLE `tbl_mga_service_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mga_service_type`
--
ALTER TABLE `tbl_mga_service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shuttle_service_registration`
--
ALTER TABLE `tbl_shuttle_service_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `tbl_shuttle_service_stations`
--
ALTER TABLE `tbl_shuttle_service_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shuttle_type`
--
ALTER TABLE `tbl_shuttle_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_send_list`
--
ALTER TABLE `tbl_sms_send_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_send_setting`
--
ALTER TABLE `tbl_sms_send_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upozilla`
--
ALTER TABLE `tbl_upozilla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_zilla`
--
ALTER TABLE `tbl_zilla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_airmail_service_registration`
--
ALTER TABLE `tbl_airmail_service_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_airmail_service_stations`
--
ALTER TABLE `tbl_airmail_service_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_airmail_service_type`
--
ALTER TABLE `tbl_airmail_service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_common_pages`
--
ALTER TABLE `tbl_common_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_divission`
--
ALTER TABLE `tbl_divission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_general`
--
ALTER TABLE `tbl_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_lounge_service_registration`
--
ALTER TABLE `tbl_lounge_service_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_lounge_service_stations`
--
ALTER TABLE `tbl_lounge_service_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_lounge_type`
--
ALTER TABLE `tbl_lounge_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mail_send_setting`
--
ALTER TABLE `tbl_mail_send_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_main_services`
--
ALTER TABLE `tbl_main_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mga_service_registration`
--
ALTER TABLE `tbl_mga_service_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_mga_service_stations`
--
ALTER TABLE `tbl_mga_service_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_mga_service_type`
--
ALTER TABLE `tbl_mga_service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_partner`
--
ALTER TABLE `tbl_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shuttle_service_registration`
--
ALTER TABLE `tbl_shuttle_service_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_shuttle_service_stations`
--
ALTER TABLE `tbl_shuttle_service_stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shuttle_type`
--
ALTER TABLE `tbl_shuttle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_sms_send_list`
--
ALTER TABLE `tbl_sms_send_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sms_send_setting`
--
ALTER TABLE `tbl_sms_send_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_upozilla`
--
ALTER TABLE `tbl_upozilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `tbl_zilla`
--
ALTER TABLE `tbl_zilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
