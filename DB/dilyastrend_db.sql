-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2023 at 04:40 PM
-- Server version: 5.7.36
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dilyastrend_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

DROP TABLE IF EXISTS `accesslevel`;
CREATE TABLE IF NOT EXISTS `accesslevel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AccessLevel` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`ID`, `AccessLevel`) VALUES
(1, 'Admin'),
(2, 'Admin'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `activestatus`
--

DROP TABLE IF EXISTS `activestatus`;
CREATE TABLE IF NOT EXISTS `activestatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ActiveStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activestatus`
--

INSERT INTO `activestatus` (`ID`, `ActiveStatus`) VALUES
(1, 'Not Active'),
(2, 'Active'),
(3, 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `Fname` varchar(55) DEFAULT NULL,
  `Showz` int(11) NOT NULL DEFAULT '2',
  `Sname` varchar(25) DEFAULT NULL,
  `Bio` varchar(500) DEFAULT NULL,
  `Role` varchar(35) DEFAULT NULL,
  `Uname` varchar(25) DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL DEFAULT '3',
  `ActiveStatus` int(11) NOT NULL DEFAULT '2',
  `Pword` varchar(255) DEFAULT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Gender` varchar(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `IPAddr` varchar(25) DEFAULT NULL,
  `Addr` varchar(55) DEFAULT NULL,
  `Country` varchar(55) DEFAULT NULL,
  `AddedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `UID`, `Fname`, `Showz`, `Sname`, `Bio`, `Role`, `Uname`, `AccessLevel`, `ActiveStatus`, `Pword`, `Email`, `Phone`, `Gender`, `Photo`, `IPAddr`, `Addr`, `Country`, `AddedOn`) VALUES
(1, 1, 'Samson', 1, 'Nwachukwu', 'I am who I am as in today', 'Web Developer', 'cnsair', 1, 2, 'cef43ec0f3965c27370b78a19fd12893', 'samsondestined@gmail.com', '07033229178', 'Male', 'f210ab5636a194f3998a25762a2c4152.jpg', '::1', '21, alafia street Ilo-Awela Ogun State', NULL, '2019-09-24 12:10:59'),
(6, 8, 'Thunder', 2, 'Thunder', NULL, NULL, 'thunder', 1, 2, '54f6e3ee0aaef5ca8edb459223abb81a', 'thunder@gmail.com', NULL, '', '', NULL, NULL, NULL, '2020-08-30 20:54:59'),
(3, 2, 'Fortune', 2, 'Aladum', 'I can be very playful', 'FrontEnd Engineer', 'fortune', 1, 2, '0393e68d68fa9da0e1ee5aaa5d908566', 'skyfort@gmail.com', '09000000000', 'Male', 'fa89a0e8b2535702e22e37a5a0ceef79.jpg', '::1', '', NULL, '2019-09-24 12:10:59'),
(4, 3, 'Dilyas', 2, 'Trend', '', '', 'dilyas', 1, 2, '0393e68d68fa9da0e1ee5aaa5d908566', 'dilyas@gmail.com', '08087637824', 'Male', 'a0a436f0885456361cb7a918a54ca402.png', '::1', '', NULL, '2019-09-24 12:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UploadedBy` int(11) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `ExpiryDate` varchar(42) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `CompanyName` varchar(100) DEFAULT NULL,
  `CompanyWebsite` varchar(100) DEFAULT NULL,
  `CompanyAddress` varchar(100) DEFAULT NULL,
  `CompanyPhone` varchar(25) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT '2',
  `AddedOn` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  `CompanyEmail` varchar(100) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`ID`, `UploadedBy`, `Photo`, `ExpiryDate`, `Type`, `CompanyName`, `CompanyWebsite`, `CompanyAddress`, `CompanyPhone`, `Active`, `AddedOn`, `DateUpdated`, `CompanyEmail`, `Description`) VALUES
(1, 3, 'c22b041e3a886b5220fa731dea80071f.png', '10/08/2020 12:00 AM - 10/08/2020 11:59 PM', 2, 'CNS Computers Inc.', 'cnscomputers.com.ng', '26A, Jerry Iriabe Street, Lekki Phase 1', '+2347033229178', 1, '2020-02-10 14:57:19', NULL, 'info@cnscomputers.com.ng', 'An IT company'),
(2, 3, '598dea81162adf518832b8e5784e8c28.png', '2020-02-10 00:00:00', 2, 'Test', 'test@g.cc', 'Ago-Oko St.', '+2347033229178', 2, '2020-02-10 15:02:56', NULL, 'Test@ggg.cc', 'test'),
(6, 3, 'c5b964ed4008f6a867c3974af20bbbfe.png', '2020-02-29 00:00:00', 3, 'Shaba International', 'ShabaInternational.com', 'Shaba International', '+2347033229178', 1, '2020-02-10 16:57:24', NULL, 'ShabaInternational@gmail.com', 'Shaba International'),
(7, 3, '12df12cc0250ea806019d7b922973337.png', '10/14/2020 12:00 AM - 11/14/2020 11:00 PM', 2, 'Shaba International', 'ShabaInternational.com', 'Shaba International', '+2347033229178', 1, '2020-02-10 17:00:07', NULL, 'ShabaInternational@gmail.com', 'Shaba International'),
(9, 1, '3a4c47b4fe7f3b9f96b13a6ebbcf90bb.jpg', '10/08/2020 06:00 AM - 11/08/2020 11:00 PM', 2, 'Simpacany', 'Simpacany.com', 'Simpacany Simpacany', '090212141241242', 1, '2020-10-08 09:24:41', NULL, 'Simpacany@gmail.com', 'Simpacany Simpacany Simpacany Simpacany Simpacany');

-- --------------------------------------------------------

--
-- Table structure for table `advert_type`
--

DROP TABLE IF EXISTS `advert_type`;
CREATE TABLE IF NOT EXISTS `advert_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert_type`
--

INSERT INTO `advert_type` (`ID`, `Type`) VALUES
(1, 'Top Banner'),
(2, 'Portrait'),
(3, 'Foot Banner'),
(4, 'In Line');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Album` varchar(40) NOT NULL,
  `UID` int(11) NOT NULL,
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `Album`, `UID`, `AddedOn`) VALUES
(12, 'August Event', 1, '2020-08-24 17:40:29'),
(13, 'October', 1, '2020-10-29 08:04:17'),
(14, 'Fashion', 1, '2020-11-18 14:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
CREATE TABLE IF NOT EXISTS `apply` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Apply` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`ID`, `Apply`) VALUES
(1, 'No Reaction'),
(2, 'Accepted'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

DROP TABLE IF EXISTS `audittrail`;
CREATE TABLE IF NOT EXISTS `audittrail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Task` int(11) NOT NULL,
  `Description` text NOT NULL,
  `IPAddress` varchar(20) NOT NULL,
  `AuditDate` date NOT NULL,
  `AuditTime` time NOT NULL,
  `ActionBy` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

DROP TABLE IF EXISTS `audit_log`;
CREATE TABLE IF NOT EXISTS `audit_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Identifier` int(11) NOT NULL,
  `Task` varchar(255) DEFAULT NULL,
  `UserID` int(11) NOT NULL DEFAULT '0',
  `FullName` varchar(100) NOT NULL,
  `IPAddr` varchar(20) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1035 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`ID`, `Identifier`, `Task`, `UserID`, `FullName`, `IPAddr`, `DateCreated`, `DateModified`) VALUES
(1, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2021-04-25 18:46:35', '2021-04-25 19:46:35'),
(2, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2021-04-25 18:48:36', '2021-04-25 19:48:36'),
(3, 2, '/dilyastrend/admin/pages/dashboard?dil=view-product&pro=9&tit=6', 1, 'Samson Nwachukwu', '::1', '2021-04-25 18:48:39', '2021-04-25 19:48:39'),
(4, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-25 18:52:30', '2021-04-25 19:52:30'),
(5, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-25 18:52:33', '2021-04-25 19:52:33'),
(6, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-25 18:53:00', '2021-04-25 19:53:00'),
(7, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-25 18:53:09', '2021-04-25 19:53:09'),
(8, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-25 18:53:23', '2021-04-25 19:53:23'),
(9, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-25 18:53:38', '2021-04-25 19:53:38'),
(10, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-25 20:33:44', '2021-04-25 21:33:44'),
(11, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-25 20:33:56', '2021-04-25 21:33:56'),
(12, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-25 20:34:52', '2021-04-25 21:34:52'),
(13, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-25 20:34:54', '2021-04-25 21:34:54'),
(14, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-25 20:35:04', '2021-04-25 21:35:04'),
(15, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-25 20:35:08', '2021-04-25 21:35:08'),
(16, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-25 20:49:49', '2021-04-25 21:49:49'),
(17, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-26 09:23:07', '2021-04-26 10:23:07'),
(18, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-26 12:40:39', '2021-04-26 13:40:39'),
(19, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-26 12:40:40', '2021-04-26 13:40:40'),
(20, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 12:40:47', '2021-04-26 13:40:47'),
(21, 1, '/dilyastrend/product-select?xps=3', 0, ' ', '::1', '2021-04-26 12:40:59', '2021-04-26 13:40:59'),
(22, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 12:41:05', '2021-04-26 13:41:05'),
(23, 1, '/dilyastrend/product-select?xps=3', 0, ' ', '::1', '2021-04-26 12:41:10', '2021-04-26 13:41:10'),
(24, 1, '/dilyastrend/product-info?xpro=3&eid=1', 0, ' ', '::1', '2021-04-26 12:41:12', '2021-04-26 13:41:12'),
(25, 1, '/dilyastrend/product-info?xpro=3&eid=1', 0, ' ', '::1', '2021-04-26 12:42:32', '2021-04-26 13:42:32'),
(26, 1, '/dilyastrend/product-info?xpro=3&eid=1', 0, ' ', '::1', '2021-04-26 12:42:40', '2021-04-26 13:42:40'),
(27, 1, '/dilyastrend/product-info?xpro=3&eid=1', 0, ' ', '::1', '2021-04-26 12:42:44', '2021-04-26 13:42:44'),
(28, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 12:42:57', '2021-04-26 13:42:57'),
(29, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-26 12:42:59', '2021-04-26 13:42:59'),
(30, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 12:43:01', '2021-04-26 13:43:01'),
(31, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 12:43:08', '2021-04-26 13:43:08'),
(32, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 12:44:02', '2021-04-26 13:44:02'),
(33, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 12:44:58', '2021-04-26 13:44:58'),
(34, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 12:45:11', '2021-04-26 13:45:11'),
(35, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-26 12:45:12', '2021-04-26 13:45:12'),
(36, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 12:45:14', '2021-04-26 13:45:14'),
(37, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 12:46:46', '2021-04-26 13:46:46'),
(38, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 12:46:55', '2021-04-26 13:46:55'),
(39, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 12:47:01', '2021-04-26 13:47:01'),
(40, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 12:47:03', '2021-04-26 13:47:03'),
(41, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 12:48:14', '2021-04-26 13:48:14'),
(42, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 12:53:37', '2021-04-26 13:53:37'),
(43, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 12:53:48', '2021-04-26 13:53:48'),
(44, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-26 12:53:51', '2021-04-26 13:53:51'),
(45, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 12:53:53', '2021-04-26 13:53:53'),
(46, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:00:18', '2021-04-26 14:00:18'),
(47, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:00:33', '2021-04-26 14:00:33'),
(48, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:00:38', '2021-04-26 14:00:38'),
(49, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:00:59', '2021-04-26 14:00:59'),
(50, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:02:35', '2021-04-26 14:02:35'),
(51, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:03:02', '2021-04-26 14:03:02'),
(52, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:03:34', '2021-04-26 14:03:34'),
(53, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:04:02', '2021-04-26 14:04:02'),
(54, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:04:27', '2021-04-26 14:04:27'),
(55, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:04:45', '2021-04-26 14:04:45'),
(56, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-26 13:04:57', '2021-04-26 14:04:57'),
(57, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 13:05:31', '2021-04-26 14:05:31'),
(58, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:06:05', '2021-04-26 14:06:05'),
(59, 1, '/dilyastrend/product-select?xps=1', 0, ' ', '::1', '2021-04-26 13:06:07', '2021-04-26 14:06:06'),
(60, 1, '/dilyastrend/product-info?xpro=1&eid=1', 0, ' ', '::1', '2021-04-26 13:06:11', '2021-04-26 14:06:11'),
(61, 1, '/dilyastrend/product-info?xpro=1&eid=1', 0, ' ', '::1', '2021-04-26 13:09:01', '2021-04-26 14:09:01'),
(62, 1, '/dilyastrend/product-info?xpro=1&eid=1', 0, ' ', '::1', '2021-04-26 13:09:09', '2021-04-26 14:09:09'),
(63, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:09:18', '2021-04-26 14:09:18'),
(64, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:10:46', '2021-04-26 14:10:46'),
(65, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-26 13:10:50', '2021-04-26 14:10:50'),
(66, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 13:10:52', '2021-04-26 14:10:52'),
(67, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-26 13:10:56', '2021-04-26 14:10:56'),
(68, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:10:57', '2021-04-26 14:10:57'),
(69, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-26 13:11:00', '2021-04-26 14:11:00'),
(70, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-26 13:11:05', '2021-04-26 14:11:05'),
(71, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-26 13:11:17', '2021-04-26 14:11:17'),
(72, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:11:18', '2021-04-26 14:11:18'),
(73, 1, '/dilyastrend/product-info?xpro=1&eid=1', 0, ' ', '::1', '2021-04-26 13:11:19', '2021-04-26 14:11:19'),
(74, 1, '/dilyastrend/product-select?xps=1', 0, ' ', '::1', '2021-04-26 13:11:21', '2021-04-26 14:11:21'),
(75, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:11:22', '2021-04-26 14:11:22'),
(76, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:11:34', '2021-04-26 14:11:34'),
(77, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2021-04-26 13:11:57', '2021-04-26 14:11:57'),
(78, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:12:20', '2021-04-26 14:12:20'),
(79, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:14:22', '2021-04-26 14:14:22'),
(80, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:16:39', '2021-04-26 14:16:39'),
(81, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:17:03', '2021-04-26 14:17:03'),
(82, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:28:21', '2021-04-26 14:28:21'),
(83, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:35:02', '2021-04-26 14:35:02'),
(84, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:35:25', '2021-04-26 14:35:25'),
(85, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:35:51', '2021-04-26 14:35:51'),
(86, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:36:36', '2021-04-26 14:36:36'),
(87, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:36:39', '2021-04-26 14:36:39'),
(88, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:36:44', '2021-04-26 14:36:44'),
(89, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:36:55', '2021-04-26 14:36:55'),
(90, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:40:49', '2021-04-26 14:40:49'),
(91, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:41:52', '2021-04-26 14:41:52'),
(92, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:42:06', '2021-04-26 14:42:06'),
(93, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:42:09', '2021-04-26 14:42:09'),
(94, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:48:13', '2021-04-26 14:48:13'),
(95, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:48:20', '2021-04-26 14:48:20'),
(96, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:48:28', '2021-04-26 14:48:28'),
(97, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2021-04-26 13:49:11', '2021-04-26 14:49:11'),
(98, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:49:29', '2021-04-26 14:49:29'),
(99, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:52:12', '2021-04-26 14:52:12'),
(100, 1, '/dilyastrend/register', 0, ' ', '::1', '2021-04-26 13:52:15', '2021-04-26 14:52:15'),
(101, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2021-04-26 13:52:19', '2021-04-26 14:52:19'),
(102, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2021-04-26 13:53:42', '2021-04-26 14:53:42'),
(103, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2021-04-26 13:55:07', '2021-04-26 14:55:07'),
(104, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:55:14', '2021-04-26 14:55:14'),
(105, 1, '/dilyastrend/sresult?s=fashion', 0, ' ', '::1', '2021-04-26 13:55:36', '2021-04-26 14:55:36'),
(106, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:56:01', '2021-04-26 14:56:01'),
(107, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 13:57:49', '2021-04-26 14:57:49'),
(108, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2021-04-26 13:58:03', '2021-04-26 14:58:03'),
(109, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:58:17', '2021-04-26 14:58:17'),
(110, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-26 13:58:20', '2021-04-26 14:58:20'),
(111, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 13:58:25', '2021-04-26 14:58:25'),
(112, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-26 13:58:28', '2021-04-26 14:58:28'),
(113, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 13:58:32', '2021-04-26 14:58:32'),
(114, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 14:20:19', '2021-04-26 15:20:19'),
(115, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 14:20:37', '2021-04-26 15:20:37'),
(116, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 14:21:09', '2021-04-26 15:21:09'),
(117, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-26 18:53:14', '2021-04-26 19:53:14'),
(118, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-26 18:53:16', '2021-04-26 19:53:16'),
(119, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 18:53:22', '2021-04-26 19:53:22'),
(120, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 18:53:27', '2021-04-26 19:53:27'),
(121, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 18:53:43', '2021-04-26 19:53:43'),
(122, 1, '/dilyastrend/blog', 0, ' ', '::1', '2021-04-26 18:53:46', '2021-04-26 19:53:46'),
(123, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2021-04-26 18:54:01', '2021-04-26 19:54:01'),
(124, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 18:54:04', '2021-04-26 19:54:04'),
(125, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-26 18:54:18', '2021-04-26 19:54:18'),
(126, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 18:54:19', '2021-04-26 19:54:19'),
(127, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-26 18:55:54', '2021-04-26 19:55:54'),
(128, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 19:27:34', '2021-04-26 20:27:34'),
(129, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 19:27:43', '2021-04-26 20:27:43'),
(130, 2, '/dilyastrend/product-services', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-04-26 19:28:28', '2021-04-26 20:28:28'),
(131, 1, '/dilyastrend/blog', 0, ' ', '::1', '2021-04-26 20:22:32', '2021-04-26 21:22:32'),
(132, 1, '/dilyastrend/blog', 0, ' ', '::1', '2021-04-26 20:26:12', '2021-04-26 21:26:12'),
(133, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2021-04-26 20:26:25', '2021-04-26 21:26:25'),
(134, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2021-04-26 20:26:45', '2021-04-26 21:26:45'),
(135, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 20:27:25', '2021-04-26 21:27:25'),
(136, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 20:28:41', '2021-04-26 21:28:41'),
(137, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 20:28:45', '2021-04-26 21:28:45'),
(138, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 20:29:01', '2021-04-26 21:29:01'),
(139, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 21:45:21', '2021-04-26 22:45:21'),
(140, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 21:45:27', '2021-04-26 22:45:27'),
(141, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 21:46:50', '2021-04-26 22:46:50'),
(142, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 21:50:07', '2021-04-26 22:50:07'),
(143, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 21:53:14', '2021-04-26 22:53:14'),
(144, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 21:53:20', '2021-04-26 22:53:20'),
(145, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 21:53:22', '2021-04-26 22:53:22'),
(146, 1, '/dilyastrend/blog', 0, ' ', '::1', '2021-04-26 21:53:24', '2021-04-26 22:53:24'),
(147, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 21:53:32', '2021-04-26 22:53:32'),
(148, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 21:53:43', '2021-04-26 22:53:43'),
(149, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 22:14:03', '2021-04-26 23:14:03'),
(150, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 22:16:51', '2021-04-26 23:16:51'),
(151, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2021-04-26 22:16:59', '2021-04-26 23:16:59'),
(152, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2021-04-26 22:17:08', '2021-04-26 23:17:08'),
(153, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2021-04-26 22:41:31', '2021-04-26 23:41:31'),
(154, 1, '/dilyastrend/blog', 0, ' ', '::1', '2021-04-26 22:41:32', '2021-04-26 23:41:32'),
(155, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 22:41:37', '2021-04-26 23:41:37'),
(156, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 22:42:14', '2021-04-26 23:42:14'),
(157, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2021-04-26 22:48:09', '2021-04-26 23:48:09'),
(158, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-26 22:48:13', '2021-04-26 23:48:13'),
(159, 1, '/dilyastrend/blog', 0, ' ', '::1', '2021-04-26 22:48:14', '2021-04-26 23:48:14'),
(160, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2021-04-26 22:48:23', '2021-04-26 23:48:23'),
(161, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2021-04-26 22:48:26', '2021-04-26 23:48:26'),
(162, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2021-04-26 22:55:43', '2021-04-26 23:55:43'),
(163, 1, '/dilyastrend/', 0, ' ', '127.0.0.1', '2021-04-26 23:00:39', '2021-04-27 00:00:39'),
(164, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '127.0.0.1', '2021-04-26 23:01:06', '2021-04-27 00:01:06'),
(165, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-26 23:01:59', '2021-04-27 00:01:59'),
(166, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2021-04-26 23:03:16', '2021-04-27 00:03:16'),
(167, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-27 12:50:37', '2021-04-27 13:50:37'),
(168, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-27 12:50:39', '2021-04-27 13:50:39'),
(169, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:52:35', '2021-04-27 13:52:35'),
(170, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-27 12:52:50', '2021-04-27 13:52:50'),
(171, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:52:55', '2021-04-27 13:52:55'),
(172, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:54:27', '2021-04-27 13:54:27'),
(173, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:54:46', '2021-04-27 13:54:46'),
(174, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:55:04', '2021-04-27 13:55:04'),
(175, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:55:30', '2021-04-27 13:55:30'),
(176, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:55:39', '2021-04-27 13:55:39'),
(177, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:55:51', '2021-04-27 13:55:51'),
(178, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:56:03', '2021-04-27 13:56:03'),
(179, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:56:10', '2021-04-27 13:56:10'),
(180, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:56:24', '2021-04-27 13:56:24'),
(181, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:57:10', '2021-04-27 13:57:10'),
(182, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-27 12:57:17', '2021-04-27 13:57:17'),
(183, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 10:15:56', '2021-04-28 11:15:56'),
(184, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-28 10:53:31', '2021-04-28 11:53:31'),
(185, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-28 10:55:41', '2021-04-28 11:55:41'),
(186, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 11:32:28', '2021-04-28 12:32:28'),
(187, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-28 11:32:34', '2021-04-28 12:32:34'),
(188, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:32:36', '2021-04-28 12:32:36'),
(189, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:32:37', '2021-04-28 12:32:37'),
(190, 2, '/dilyastrend/admin/pages/dashboard?dil=my-product', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:32:44', '2021-04-28 12:32:44'),
(191, 2, '/dilyastrend/admin/pages/dashboard?dil=my-product', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:34:44', '2021-04-28 12:34:44'),
(192, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:34:47', '2021-04-28 12:34:47'),
(193, 2, '/dilyastrend/admin/pages/dashboard?dil=view-product&pro=1&tit=8', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:34:51', '2021-04-28 12:34:51'),
(194, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-28 11:35:24', '2021-04-28 12:35:24'),
(195, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 11:35:26', '2021-04-28 12:35:26'),
(196, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 11:35:28', '2021-04-28 12:35:28'),
(197, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 11:35:30', '2021-04-28 12:35:30'),
(198, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 11:35:45', '2021-04-28 12:35:45'),
(199, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 11:35:46', '2021-04-28 12:35:46'),
(200, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 11:36:56', '2021-04-28 12:36:56'),
(201, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-28 11:42:29', '2021-04-28 12:42:29'),
(202, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:42:31', '2021-04-28 12:42:31'),
(203, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:42:31', '2021-04-28 12:42:31'),
(204, 2, '/dilyastrend/admin/pages/dashboard?dil=my-product', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:42:37', '2021-04-28 12:42:37'),
(205, 2, '/dilyastrend/admin/pages/dashboard?dil=product-title&aid=8', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:42:50', '2021-04-28 12:42:50'),
(206, 2, '/dilyastrend/admin/pages/dashboard?dil=my-product', 1, 'Samson Nwachukwu', '::1', '2021-04-28 11:43:06', '2021-04-28 12:43:06'),
(207, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-28 11:55:49', '2021-04-28 12:55:49'),
(208, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 11:55:51', '2021-04-28 12:55:51'),
(209, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 11:55:57', '2021-04-28 12:55:57'),
(210, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 11:56:48', '2021-04-28 12:56:48'),
(211, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 11:57:12', '2021-04-28 12:57:12'),
(212, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 11:57:47', '2021-04-28 12:57:47'),
(213, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 11:57:58', '2021-04-28 12:57:58'),
(214, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 11:58:13', '2021-04-28 12:58:13'),
(215, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 11:59:00', '2021-04-28 12:59:00'),
(216, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:06:45', '2021-04-28 16:06:45'),
(217, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:06:48', '2021-04-28 16:06:48'),
(218, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:06:59', '2021-04-28 16:06:59'),
(219, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:00', '2021-04-28 16:07:00'),
(220, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:01', '2021-04-28 16:07:01'),
(221, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:02', '2021-04-28 16:07:02'),
(222, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:03', '2021-04-28 16:07:03'),
(223, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:04', '2021-04-28 16:07:04'),
(224, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:05', '2021-04-28 16:07:05'),
(225, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:06', '2021-04-28 16:07:06'),
(226, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:07:33', '2021-04-28 16:07:33'),
(227, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 15:08:52', '2021-04-28 16:08:52'),
(228, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 15:09:20', '2021-04-28 16:09:20'),
(229, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 15:10:04', '2021-04-28 16:10:04'),
(230, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 15:10:46', '2021-04-28 16:10:46'),
(231, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:10:51', '2021-04-28 16:10:51'),
(232, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-28 15:34:17', '2021-04-28 16:34:17'),
(233, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 15:34:21', '2021-04-28 16:34:21'),
(234, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 15:34:24', '2021-04-28 16:34:24'),
(235, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:34:27', '2021-04-28 16:34:27'),
(236, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 15:35:00', '2021-04-28 16:35:00'),
(237, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 15:35:03', '2021-04-28 16:35:03'),
(238, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:35:05', '2021-04-28 16:35:05'),
(239, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-28 15:46:22', '2021-04-28 16:46:22'),
(240, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-28 15:46:24', '2021-04-28 16:46:24'),
(241, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-28 15:46:26', '2021-04-28 16:46:26'),
(242, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:46:29', '2021-04-28 16:46:29'),
(243, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:47:53', '2021-04-28 16:47:53'),
(244, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:48:09', '2021-04-28 16:48:09'),
(245, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:48:28', '2021-04-28 16:48:28'),
(246, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-28 15:54:43', '2021-04-28 16:54:43'),
(247, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 07:51:54', '2021-04-29 08:51:54'),
(248, 1, '/dilyastrend/product-select?xps=4', 0, ' ', '::1', '2021-04-29 07:51:58', '2021-04-29 08:51:58'),
(249, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-29 07:52:06', '2021-04-29 08:52:06'),
(250, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-29 07:53:25', '2021-04-29 08:53:25'),
(251, 1, '/dilyastrend/product-info?xpro=4&eid=1', 0, ' ', '::1', '2021-04-29 08:42:03', '2021-04-29 09:42:03'),
(252, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 08:42:04', '2021-04-29 09:42:04'),
(253, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 08:42:06', '2021-04-29 09:42:06'),
(254, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-29 09:42:10', '2021-04-29 10:42:10'),
(255, 1, '/dilyastrend/', 0, ' ', '::1', '2021-04-29 09:42:12', '2021-04-29 10:42:12'),
(256, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 09:42:30', '2021-04-29 10:42:30'),
(257, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-29 09:42:34', '2021-04-29 10:42:34'),
(258, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:42:36', '2021-04-29 10:42:36'),
(259, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:43:37', '2021-04-29 10:43:37'),
(260, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:44:01', '2021-04-29 10:44:01'),
(261, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:44:35', '2021-04-29 10:44:35'),
(262, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:46:17', '2021-04-29 10:46:17'),
(263, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:47:14', '2021-04-29 10:47:14'),
(264, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 09:47:25', '2021-04-29 10:47:25'),
(265, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-29 10:37:53', '2021-04-29 11:37:53'),
(266, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 10:37:55', '2021-04-29 11:37:55'),
(267, 1, '/dilyastrend/product-select?xps=1', 0, ' ', '::1', '2021-04-29 10:38:01', '2021-04-29 11:38:01'),
(268, 1, '/dilyastrend/product-info?xpro=1&eid=1', 0, ' ', '::1', '2021-04-29 10:38:03', '2021-04-29 11:38:03'),
(269, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 10:38:20', '2021-04-29 11:38:20'),
(270, 1, '/dilyastrend/product-select?xps=6', 0, ' ', '::1', '2021-04-29 10:38:26', '2021-04-29 11:38:26'),
(271, 1, '/dilyastrend/product-info?xpro=6&eid=9', 0, ' ', '::1', '2021-04-29 10:38:28', '2021-04-29 11:38:28'),
(272, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 10:39:08', '2021-04-29 11:39:08'),
(273, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 10:39:54', '2021-04-29 11:39:54'),
(274, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 10:40:34', '2021-04-29 11:40:34'),
(275, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:40:41', '2021-04-29 11:40:41'),
(276, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-29 10:41:31', '2021-04-29 11:41:31'),
(277, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:41:34', '2021-04-29 11:41:34'),
(278, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:42:06', '2021-04-29 11:42:06'),
(279, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:43:12', '2021-04-29 11:43:12'),
(280, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:43:29', '2021-04-29 11:43:29'),
(281, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:43:43', '2021-04-29 11:43:43'),
(282, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:43:56', '2021-04-29 11:43:56'),
(283, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:44:15', '2021-04-29 11:44:15'),
(284, 1, '/dilyastrend/workers-niche?wid=2', 0, ' ', '::1', '2021-04-29 10:44:27', '2021-04-29 11:44:27'),
(285, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 10:48:11', '2021-04-29 11:48:11'),
(286, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 10:56:38', '2021-04-29 11:56:38'),
(287, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:02:25', '2021-04-29 12:02:25'),
(288, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:03:03', '2021-04-29 12:03:03'),
(289, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:03:13', '2021-04-29 12:03:13'),
(290, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:06:01', '2021-04-29 12:06:01'),
(291, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:06:59', '2021-04-29 12:06:59'),
(292, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:07:36', '2021-04-29 12:07:36'),
(293, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:07:37', '2021-04-29 12:07:37'),
(294, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:08:47', '2021-04-29 12:08:47'),
(295, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 11:08:54', '2021-04-29 12:08:54'),
(296, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:09:01', '2021-04-29 12:09:01'),
(297, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:09:21', '2021-04-29 12:09:21'),
(298, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:09:33', '2021-04-29 12:09:33'),
(299, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:09:41', '2021-04-29 12:09:41'),
(300, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:10:08', '2021-04-29 12:10:08'),
(301, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:18:01', '2021-04-29 12:18:01'),
(302, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:18:27', '2021-04-29 12:18:27'),
(303, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:19:32', '2021-04-29 12:19:32'),
(304, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:19:43', '2021-04-29 12:19:43'),
(305, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-29 11:20:47', '2021-04-29 12:20:47'),
(306, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 11:20:49', '2021-04-29 12:20:49'),
(307, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 11:21:11', '2021-04-29 12:21:11'),
(308, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 11:21:29', '2021-04-29 12:21:29'),
(309, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 11:21:35', '2021-04-29 12:21:35'),
(310, 1, '/dilyastrend/product-info?xpro=8&eid=1', 0, ' ', '::1', '2021-04-29 11:22:20', '2021-04-29 12:22:20'),
(311, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-04-29 11:22:49', '2021-04-29 12:22:49'),
(312, 1, '/dilyastrend/product-select?xps=8', 0, ' ', '::1', '2021-04-29 11:22:55', '2021-04-29 12:22:55'),
(313, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:26:29', '2021-04-29 12:26:29'),
(314, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:32:07', '2021-04-29 12:32:07'),
(315, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:32:24', '2021-04-29 12:32:24'),
(316, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 11:32:32', '2021-04-29 12:32:32'),
(317, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-29 11:40:32', '2021-04-29 12:40:32'),
(318, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2021-04-29 11:40:34', '2021-04-29 12:40:34'),
(319, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2021-04-29 11:40:34', '2021-04-29 12:40:34'),
(320, 2, '/dilyastrend/admin/pages/dashboard?dil=my-product', 1, 'Samson Nwachukwu', '::1', '2021-04-29 11:40:42', '2021-04-29 12:40:42'),
(321, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-04-29 12:40:23', '2021-04-29 13:40:23'),
(322, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-04-29 12:40:25', '2021-04-29 13:40:25'),
(323, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '127.0.0.1', '2021-04-29 15:26:01', '2021-04-29 16:26:01'),
(324, 2, '/dilyastrend/', 11, ' ', '127.0.0.1', '2021-05-01 12:20:35', '2021-05-01 13:20:35'),
(325, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-05-01 12:20:41', '2021-05-01 13:20:41'),
(326, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-05-01 12:20:45', '2021-05-01 13:20:45'),
(327, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:20:52', '2021-05-01 13:20:52'),
(328, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:20:52', '2021-05-01 13:20:52'),
(329, 2, '/dilyastrend/admin/pages/dashboard?dil=job', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:20:59', '2021-05-01 13:20:59'),
(330, 2, '/dilyastrend/admin/pages/dashboard?dil=job', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:21:10', '2021-05-01 13:21:10'),
(331, 2, '/dilyastrend/admin/pages/dashboard?dil=job', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:21:18', '2021-05-01 13:21:18'),
(332, 2, '/dilyastrend/admin/pages/dashboard?dil=post-job', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:21:38', '2021-05-01 13:21:38'),
(333, 2, '/dilyastrend/admin/pages/dashboard?dil=job-detail&id=4', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:22:07', '2021-05-01 13:22:07'),
(334, 2, '/dilyastrend/admin/pages/dashboard?dil=post-job', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-05-01 12:22:21', '2021-05-01 13:22:21'),
(335, 1, '/dilyastrend/', 0, ' ', '::1', '2021-05-05 20:52:09', '2021-05-05 21:52:09'),
(336, 1, '/dilyastrend/', 0, ' ', '::1', '2021-05-05 20:52:10', '2021-05-05 21:52:10'),
(337, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-05-05 20:53:26', '2021-05-05 21:53:26'),
(338, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-05-05 20:54:30', '2021-05-05 21:54:30'),
(339, 1, '/dilyastrend/index', 0, ' ', '::1', '2021-05-05 20:54:34', '2021-05-05 21:54:34'),
(340, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-05-05 20:54:37', '2021-05-05 21:54:37'),
(341, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2021-05-05 20:54:41', '2021-05-05 21:54:41'),
(342, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2021-05-05 20:54:43', '2021-05-05 21:54:43'),
(343, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2021-05-05 20:54:58', '2021-05-05 21:54:58'),
(344, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2021-05-05 20:57:01', '2021-05-05 21:57:01'),
(345, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 20:57:20', '2021-05-05 21:57:20'),
(346, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 20:57:22', '2021-05-05 21:57:22'),
(347, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:02:01', '2021-05-05 22:02:01'),
(348, 2, '/dilyastrend/admin/pages/dashboard?dil=account-settings', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:02:25', '2021-05-05 22:02:25'),
(349, 2, '/dilyastrend/admin/pages/dashboard?dil=account-settings', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:03:20', '2021-05-05 22:03:20'),
(350, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:13:37', '2021-05-05 22:13:37'),
(351, 2, '/dilyastrend/admin/pages/dashboard?dil=post-job', 11, ' ', '127.0.0.1', '2021-05-05 21:15:47', '2021-05-05 22:15:47'),
(352, 2, '/dilyastrend/confirm-account', 11, ' ', '127.0.0.1', '2021-05-05 21:15:47', '2021-05-05 22:15:47'),
(353, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-05-05 21:15:54', '2021-05-05 22:15:54'),
(354, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-05-05 21:16:05', '2021-05-05 22:16:05'),
(355, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-05-05 21:16:21', '2021-05-05 22:16:21'),
(356, 2, '/dilyastrend/signin', 6, 'Soma Agaricha', '127.0.0.1', '2021-05-05 21:16:39', '2021-05-05 22:16:39'),
(357, 2, '/dilyastrend/members/pages/dashboard?dil=home', 6, 'Soma Agaricha', '127.0.0.1', '2021-05-05 21:16:41', '2021-05-05 22:16:41'),
(358, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:17:11', '2021-05-05 22:17:11'),
(359, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:17:12', '2021-05-05 22:17:12'),
(360, 2, '/dilyastrend/members/pages/dashboard?dil=account-settings', 6, 'Soma Agaricha', '127.0.0.1', '2021-05-05 21:17:42', '2021-05-05 22:17:42'),
(361, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 6, 'Soma Agaricha', '127.0.0.1', '2021-05-05 21:17:54', '2021-05-05 22:17:54'),
(362, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 6, 'Soma Agaricha', '127.0.0.1', '2021-05-05 21:18:02', '2021-05-05 22:18:02'),
(363, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:18:07', '2021-05-05 22:18:07'),
(364, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:18:10', '2021-05-05 22:18:10'),
(365, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:26', '2021-05-05 22:19:26'),
(366, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:29', '2021-05-05 22:19:29'),
(367, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:32', '2021-05-05 22:19:32'),
(368, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=10', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:34', '2021-05-05 22:19:34'),
(369, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:36', '2021-05-05 22:19:36'),
(370, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=4', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:38', '2021-05-05 22:19:38'),
(371, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:40', '2021-05-05 22:19:40'),
(372, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=5', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:42', '2021-05-05 22:19:42'),
(373, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:43', '2021-05-05 22:19:43'),
(374, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=13', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:46', '2021-05-05 22:19:46'),
(375, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:47', '2021-05-05 22:19:47'),
(376, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:19:49', '2021-05-05 22:19:49'),
(377, 2, '/dilyastrend/admin/pages/dashboard?dil=job', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:00', '2021-05-05 22:20:00'),
(378, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:04', '2021-05-05 22:20:04'),
(379, 2, '/dilyastrend/admin/pages/dashboard?dil=view-product&pro=1&tit=8', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:07', '2021-05-05 22:20:07'),
(380, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:25', '2021-05-05 22:20:25'),
(381, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=10', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:29', '2021-05-05 22:20:29'),
(382, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:31', '2021-05-05 22:20:31'),
(383, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:32', '2021-05-05 22:20:32'),
(384, 2, '/dilyastrend/admin/pages/dashboard?dil=view-profile&pro=9', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:20:35', '2021-05-05 22:20:35'),
(385, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-05-05 21:21:30', '2021-05-05 22:21:30'),
(386, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-05-05 21:21:37', '2021-05-05 22:21:37'),
(387, 2, '/dilyastrend/signin', 9, 'pasuma Jigawa', '::1', '2021-05-05 21:21:45', '2021-05-05 22:21:45'),
(388, 2, '/dilyastrend/members/pages/dashboard?dil=home', 9, 'pasuma Jigawa', '::1', '2021-05-05 21:21:45', '2021-05-05 22:21:45'),
(389, 1, '/dilyastrend/signin', 0, ' ', '127.0.0.1', '2021-05-05 21:22:24', '2021-05-05 22:22:24'),
(390, 2, '/dilyastrend/signin', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:22:31', '2021-05-05 22:22:31'),
(391, 2, '/dilyastrend/members/pages/dashboard?dil=home', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:22:31', '2021-05-05 22:22:31'),
(392, 1, '/dilyastrend/signin', 0, ' ', '::1', '2021-05-05 21:22:42', '2021-05-05 22:22:42'),
(393, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:22:45', '2021-05-05 22:22:45'),
(394, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:22:45', '2021-05-05 22:22:45'),
(395, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:22:49', '2021-05-05 22:22:49'),
(396, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:22:52', '2021-05-05 22:22:52'),
(397, 2, '/dilyastrend/members/pages/dashboard?dil=niche', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:23:08', '2021-05-05 22:23:08'),
(398, 2, '/dilyastrend/members/pages/dashboard?dil=professionals&wid=2', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:23:10', '2021-05-05 22:23:10'),
(399, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:24:41', '2021-05-05 22:24:41'),
(400, 2, '/dilyastrend/admin/pages/dashboard?dil=account-settings', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:25:15', '2021-05-05 22:25:15'),
(401, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:25:48', '2021-05-05 22:25:48'),
(402, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:27:03', '2021-05-05 22:27:03'),
(403, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:33:41', '2021-05-05 22:33:41'),
(404, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:33:55', '2021-05-05 22:33:55'),
(405, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:38:51', '2021-05-05 22:38:51'),
(406, 2, '/dilyastrend/members/pages/dashboard?dil=account-settings', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:39:01', '2021-05-05 22:39:01'),
(407, 2, '/dilyastrend/members/pages/dashboard?dil=account-settings', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:46:09', '2021-05-05 22:46:09'),
(408, 2, '/dilyastrend/members/pages/dashboard?dil=account-settings', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:46:39', '2021-05-05 22:46:39'),
(409, 2, '/dilyastrend/members/pages/dashboard?dil=account-settings', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:46:51', '2021-05-05 22:46:51'),
(410, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:49:20', '2021-05-05 22:49:20'),
(411, 2, '/dilyastrend/admin/pages/dashboard?dil=account-settings', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:49:26', '2021-05-05 22:49:26'),
(412, 2, '/dilyastrend/admin/pages/dashboard?dil=account-settings', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:49:39', '2021-05-05 22:49:39'),
(413, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:49:50', '2021-05-05 22:49:50'),
(414, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 21:49:57', '2021-05-05 22:49:57'),
(415, 2, '/dilyastrend/admin/pages/dashboard?dil=profile', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:59:47', '2021-05-05 22:59:47'),
(416, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:59:54', '2021-05-05 22:59:54'),
(417, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 21:59:55', '2021-05-05 22:59:55'),
(418, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:00:31', '2021-05-05 23:00:31'),
(419, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:01:46', '2021-05-05 23:01:46'),
(420, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:02:23', '2021-05-05 23:02:23'),
(421, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:02:55', '2021-05-05 23:02:55'),
(422, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:03:07', '2021-05-05 23:03:07'),
(423, 2, '/dilyastrend/admin/pages/dashboard?dil=view-profile&pro=9', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:03:26', '2021-05-05 23:03:26'),
(424, 2, '/dilyastrend/admin/pages/dashboard?dil=view-profile&pro=9', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:05:28', '2021-05-05 23:05:28'),
(425, 2, '/dilyastrend/admin/pages/dashboard?dil=view-profile&pro=9', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:08:44', '2021-05-05 23:08:44'),
(426, 2, '/dilyastrend/admin/pages/dashboard?dil=niche', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:08:59', '2021-05-05 23:08:59'),
(427, 2, '/dilyastrend/admin/pages/dashboard?dil=professionals&wid=2', 1, 'Samson Nwachukwu', '::1', '2021-05-05 22:09:01', '2021-05-05 23:09:01'),
(428, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 22:11:52', '2021-05-05 23:11:52'),
(429, 2, '/dilyastrend/members/pages/dashboard?dil=profile', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 22:11:56', '2021-05-05 23:11:56'),
(430, 2, '/dilyastrend/members/pages/dashboard?dil=niche', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 22:12:08', '2021-05-05 23:12:08'),
(431, 2, '/dilyastrend/members/pages/dashboard?dil=professionals&wid=2', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 22:12:09', '2021-05-05 23:12:09'),
(432, 2, '/dilyastrend/members/pages/dashboard?dil=view-profile&pro=1', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 22:12:22', '2021-05-05 23:12:22'),
(433, 2, '/dilyastrend/members/pages/dashboard?dil=view-profile&pro=1', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-05 22:14:44', '2021-05-05 23:14:44'),
(434, 2, '/dilyastrend/members/pages/dashboard?dil=view-profile&pro=1', 9, 'pasuma Jigawa', '127.0.0.1', '2021-05-14 17:05:26', '2021-05-14 18:05:26'),
(435, 1, '/dilyastrend/members/pages/dashboard?dil=view-profile&pro=1', 0, 'NULL', '127.0.0.1', '2021-06-07 17:59:42', '2021-06-07 18:59:42'),
(436, 1, '/dilyastrend/confirm-account', 0, ' ', '127.0.0.1', '2021-06-07 17:59:44', '2021-06-07 18:59:44'),
(437, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-06-07 19:04:11', '2021-06-07 20:04:11'),
(438, 2, '/dilyastrend/signin', 11, ' ', '127.0.0.1', '2021-06-07 19:04:15', '2021-06-07 20:04:15'),
(439, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-07 19:04:28', '2021-06-07 20:04:28'),
(440, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-07 19:04:30', '2021-06-07 20:04:30'),
(441, 2, '/dilyastrend/admin/pages/dashboard?dil=worker-slide', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-07 19:04:45', '2021-06-07 20:04:45'),
(442, 2, '/dilyastrend/admin/pages/dashboard?dil=edit-worker-slide&id=11', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-08 13:06:04', '2021-06-08 14:06:04'),
(443, 2, '/dilyastrend/admin/pages/dashboard?dil=edit-worker-slide&id=11', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-12 14:20:28', '2021-06-12 15:20:28'),
(444, 2, '/dilyastrend/admin/pages/dashboard?dil=gallery', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-12 14:20:35', '2021-06-12 15:20:35'),
(445, 2, '/dilyastrend/admin/pages/dashboard?dil=gallery', 1, 'Samson Nwachukwu', '127.0.0.1', '2021-06-20 12:30:37', '2021-06-20 13:30:37'),
(446, 1, '/dilyastrend/', 0, ' ', '::1', '2021-07-13 15:27:46', '2021-07-13 16:27:46'),
(447, 2, '/dilyastrend/', 11, ' ', '127.0.0.1', '2021-07-13 15:30:10', '2021-07-13 16:30:10'),
(448, 1, '/dilyastrend/', 0, ' ', '127.0.0.1', '2021-07-13 15:31:46', '2021-07-13 16:31:46'),
(449, 2, '/dilyastrend/admin/pages/dashboard?dil=gallery', 11, ' ', '127.0.0.1', '2021-07-13 16:13:14', '2021-07-13 17:13:14'),
(450, 2, '/dilyastrend/confirm-account', 11, ' ', '127.0.0.1', '2021-07-13 16:13:15', '2021-07-13 17:13:15'),
(451, 1, '/dilyastrend/', 0, ' ', '::1', '2021-07-21 14:00:42', '2021-07-21 15:00:42');
INSERT INTO `audit_log` (`ID`, `Identifier`, `Task`, `UserID`, `FullName`, `IPAddr`, `DateCreated`, `DateModified`) VALUES
(452, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2021-07-21 14:00:52', '2021-07-21 15:00:52'),
(453, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2021-07-21 15:46:33', '2021-07-21 16:46:33'),
(454, 2, '/dilyastrend/gallery', 1, 'Samson Nwachukwu', '::1', '2021-07-22 10:38:24', '2021-07-22 11:38:24'),
(455, 2, '/dilyastrend/blog', 1, 'Samson Nwachukwu', '::1', '2021-07-22 10:38:28', '2021-07-22 11:38:28'),
(456, 1, '/dilyastrend/confirm-account', 0, ' ', '127.0.0.1', '2021-07-23 20:53:38', '2021-07-23 21:53:38'),
(457, 1, '/dilyastrend/', 0, ' ', '127.0.0.1', '2021-07-23 20:53:41', '2021-07-23 21:53:41'),
(458, 1, '/dilyastrend/confirm-account', 0, ' ', '::1', '2021-08-07 10:43:18', '2021-08-07 11:43:18'),
(459, 1, '/dilyastrend/', 0, ' ', '::1', '2021-08-24 13:30:45', '2021-08-24 14:30:45'),
(460, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2021-08-24 13:45:28', '2021-08-24 14:45:28'),
(461, 1, '/dilyastrend/', 0, ' ', '::1', '2022-09-02 15:14:56', '2022-09-02 16:14:56'),
(462, 1, '/dilyastrend/', 0, ' ', '::1', '2022-09-02 15:35:28', '2022-09-02 16:35:28'),
(463, 1, '/dilyastrend/product-services?dil=product-info&bat=1650498856&tit=28', 0, ' ', '::1', '2022-09-02 15:35:52', '2022-09-02 16:35:52'),
(464, 1, '/dilyastrend/product-services?dil=product-info&bat=1650498856&tit=28', 0, ' ', '::1', '2022-09-02 15:35:56', '2022-09-02 16:35:56'),
(465, 1, '/dilyastrend/product-services?dil=cart', 0, ' ', '::1', '2022-09-02 15:35:56', '2022-09-02 16:35:56'),
(466, 1, '/dilyastrend/product-services?dil=cart', 0, ' ', '::1', '2022-09-02 15:36:06', '2022-09-02 16:36:06'),
(467, 1, '/dilyastrend/product-services?dil=placeorder', 0, ' ', '::1', '2022-09-02 15:36:08', '2022-09-02 16:36:08'),
(468, 1, '/dilyastrend/blog', 0, ' ', '::1', '2022-09-02 15:36:20', '2022-09-02 16:36:20'),
(469, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2022-09-02 15:36:33', '2022-09-02 16:36:33'),
(470, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2022-09-02 15:36:51', '2022-09-02 16:36:51'),
(471, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-02 15:37:01', '2022-09-02 16:37:01'),
(472, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-02 15:37:05', '2022-09-02 16:37:05'),
(473, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:13', '2022-09-02 16:37:13'),
(474, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:14', '2022-09-02 16:37:14'),
(475, 2, '/dilyastrend/admin/pages/dashboard?dil=cart', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:21', '2022-09-02 16:37:21'),
(476, 2, '/dilyastrend/admin/pages/dashboard?dil=cart', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:31', '2022-09-02 16:37:31'),
(477, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-02 15:37:36', '2022-09-02 16:37:36'),
(478, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2022-09-02 15:37:38', '2022-09-02 16:37:38'),
(479, 1, '/dilyastrend/product-services?dil=product-info&bat=1656252025&tit=61', 0, ' ', '::1', '2022-09-02 15:37:40', '2022-09-02 16:37:40'),
(480, 1, '/dilyastrend/product-services?dil=product-info&bat=1656252025&tit=61', 0, ' ', '::1', '2022-09-02 15:37:43', '2022-09-02 16:37:43'),
(481, 1, '/dilyastrend/product-services?dil=cart', 0, ' ', '::1', '2022-09-02 15:37:43', '2022-09-02 16:37:43'),
(482, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-02 15:37:45', '2022-09-02 16:37:45'),
(483, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:47', '2022-09-02 16:37:47'),
(484, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:47', '2022-09-02 16:37:47'),
(485, 2, '/dilyastrend/admin/pages/dashboard?dil=cart', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:37:52', '2022-09-02 16:37:52'),
(486, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2022-09-02 15:38:02', '2022-09-02 16:38:02'),
(487, 1, '/dilyastrend/', 0, ' ', '::1', '2022-09-06 21:19:24', '2022-09-06 22:19:24'),
(488, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-06 21:19:29', '2022-09-06 22:19:29'),
(489, 1, '/dilyastrend/register', 0, ' ', '::1', '2022-09-06 21:19:39', '2022-09-06 22:19:39'),
(490, 1, '/dilyastrend/', 0, ' ', '::1', '2022-09-22 20:24:57', '2022-09-22 21:24:57'),
(491, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-22 20:25:09', '2022-09-22 21:25:09'),
(492, 1, '/dilyastrend/blog', 0, ' ', '::1', '2022-09-22 20:25:10', '2022-09-22 21:25:10'),
(493, 1, '/dilyastrend/index', 0, ' ', '::1', '2022-09-22 20:25:18', '2022-09-22 21:25:18'),
(494, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-09-22 20:43:24', '2022-09-22 21:43:24'),
(495, 1, '/dilyastrend/blog', 0, ' ', '::1', '2022-09-22 20:43:26', '2022-09-22 21:43:26'),
(496, 1, '/dilyastrend/blog?one=category&amp=1', 0, ' ', '::1', '2022-09-22 21:42:24', '2022-09-22 22:42:24'),
(497, 1, '/dilyastrend/blog?one=category&amp=3', 0, ' ', '::1', '2022-09-22 21:42:27', '2022-09-22 22:42:27'),
(498, 1, '/dilyastrend/blog', 0, ' ', '::1', '2022-09-23 12:37:33', '2022-09-23 13:37:33'),
(499, 1, '/dilyastrend/blog?page=2', 0, ' ', '::1', '2022-09-23 12:37:42', '2022-09-23 13:37:42'),
(500, 1, '/dilyastrend/blog?one=story&amp=16', 0, ' ', '::1', '2022-09-23 15:16:37', '2022-09-23 16:16:37'),
(501, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2022-09-23 15:47:57', '2022-09-23 16:47:57'),
(502, 1, '/dilyastrend/blog', 0, ' ', '::1', '2022-09-23 15:48:12', '2022-09-23 16:48:12'),
(503, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2022-09-23 15:48:17', '2022-09-23 16:48:17'),
(504, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2022-09-23 15:48:31', '2022-09-23 16:48:31'),
(505, 1, '/dilyastrend/', 0, ' ', '::1', '2022-09-27 21:29:08', '2022-09-27 22:29:08'),
(506, 1, '/dilyastrend/', 0, ' ', '::1', '2022-10-02 19:59:25', '2022-10-02 20:59:25'),
(507, 1, '/dilyastrend/', 0, ' ', '::1', '2022-10-05 11:03:41', '2022-10-05 12:03:41'),
(508, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-10-05 11:03:43', '2022-10-05 12:03:43'),
(509, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2022-10-05 11:03:45', '2022-10-05 12:03:45'),
(510, 1, '/dilyastrend/signin', 0, ' ', '::1', '2022-10-05 11:03:50', '2022-10-05 12:03:50'),
(511, 2, '/dilyastrend/', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:46:42', '2022-10-08 15:46:42'),
(512, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:46:46', '2022-10-08 15:46:46'),
(513, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:46:48', '2022-10-08 15:46:48'),
(514, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:46:49', '2022-10-08 15:46:49'),
(515, 2, '/dilyastrend/admin/pages/dashboard?dil=placed-order', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:46:58', '2022-10-08 15:46:58'),
(516, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:47:28', '2022-10-08 15:47:28'),
(517, 2, '/dilyastrend/admin/pages/dashboard?dil=view-product&bat=1650498856&tit=28', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:47:35', '2022-10-08 15:47:35'),
(518, 2, '/dilyastrend/admin/pages/dashboard?dil=cart', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:47:39', '2022-10-08 15:47:39'),
(519, 2, '/dilyastrend/admin/pages/dashboard?dil=view-product&bat=1650498856&tit=28', 1, 'Samson Nwachukwu', '::1', '2022-10-08 14:47:49', '2022-10-08 15:47:49'),
(520, 2, '/dilyastrend/', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:34', '2022-10-16 23:12:34'),
(521, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:38', '2022-10-16 23:12:38'),
(522, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:39', '2022-10-16 23:12:39'),
(523, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:39', '2022-10-16 23:12:39'),
(524, 2, '/dilyastrend/admin/pages/dashboard?dil=product', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:43', '2022-10-16 23:12:43'),
(525, 2, '/dilyastrend/admin/pages/dashboard?dil=view-product&bat=1656252025&tit=61', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:47', '2022-10-16 23:12:47'),
(526, 2, '/dilyastrend/admin/pages/dashboard?dil=cart', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:49', '2022-10-16 23:12:49'),
(527, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:12:53', '2022-10-16 23:12:53'),
(528, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:20:48', '2022-10-16 23:20:48'),
(529, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:20:51', '2022-10-16 23:20:51'),
(530, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:20:53', '2022-10-16 23:20:53'),
(531, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:20:54', '2022-10-16 23:20:54'),
(532, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:20:56', '2022-10-16 23:20:56'),
(533, 2, '/dilyastrend/admin/pages/dashboard?dil=placeorder', 1, 'Samson Nwachukwu', '::1', '2022-10-16 22:21:05', '2022-10-16 23:21:05'),
(534, 1, '/dilyastrend/', 0, ' ', '::1', '2023-07-11 15:45:42', '2023-07-11 16:45:42'),
(535, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-07-11 15:46:01', '2023-07-11 16:46:01'),
(536, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-07-11 15:46:04', '2023-07-11 16:46:04'),
(537, 1, '/dilyastrend/product-services', 0, ' ', '::1', '2023-07-11 15:46:10', '2023-07-11 16:46:10'),
(538, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-07-11 15:46:23', '2023-07-11 16:46:23'),
(539, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-07-11 15:47:04', '2023-07-11 16:47:04'),
(540, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-07-11 15:47:29', '2023-07-11 16:47:29'),
(541, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-07-11 15:48:32', '2023-07-11 16:48:32'),
(542, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-07-11 15:50:19', '2023-07-11 16:50:19'),
(543, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-07-11 15:50:27', '2023-07-11 16:50:27'),
(544, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-07-11 15:50:31', '2023-07-11 16:50:31'),
(545, 1, '/dilyastrend/', 0, ' ', '::1', '2023-07-18 11:53:18', '2023-07-18 12:53:18'),
(546, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-07-18 11:53:33', '2023-07-18 12:53:33'),
(547, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 12:15:53', '2023-09-21 13:15:53'),
(548, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 12:20:27', '2023-09-21 13:20:27'),
(549, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 12:26:00', '2023-09-21 13:26:00'),
(550, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 12:26:12', '2023-09-21 13:26:12'),
(551, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 12:27:31', '2023-09-21 13:27:31'),
(552, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:05:57', '2023-09-21 14:05:57'),
(553, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:06:27', '2023-09-21 14:06:27'),
(554, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:06:55', '2023-09-21 14:06:55'),
(555, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:07:05', '2023-09-21 14:07:05'),
(556, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:07:14', '2023-09-21 14:07:14'),
(557, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:07:25', '2023-09-21 14:07:25'),
(558, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-21 13:11:26', '2023-09-21 14:11:26'),
(559, 2, '/dilyastrend/', 1, 'Samson Nwachukwu', '::1', '2023-09-21 13:11:35', '2023-09-21 14:11:35'),
(560, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-09-21 13:11:35', '2023-09-21 14:11:35'),
(561, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-09-21 13:13:30', '2023-09-21 14:13:30'),
(562, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-09-21 13:35:23', '2023-09-21 14:35:23'),
(563, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-09-21 13:35:42', '2023-09-21 14:35:42'),
(564, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-09-21 13:38:19', '2023-09-21 14:38:19'),
(565, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-09-23 10:42:23', '2023-09-23 11:42:23'),
(566, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-26 09:49:21', '2023-09-26 10:49:21'),
(567, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-26 11:00:28', '2023-09-26 12:00:28'),
(568, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 11:00:38', '2023-09-26 12:00:38'),
(569, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:00:44', '2023-09-26 12:00:44'),
(570, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 11:00:46', '2023-09-26 12:00:46'),
(571, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:00:48', '2023-09-26 12:00:48'),
(572, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:04:27', '2023-09-26 12:04:27'),
(573, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:06:35', '2023-09-26 12:06:35'),
(574, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:06:45', '2023-09-26 12:06:45'),
(575, 1, '/dilyastrend/index', 0, ' ', '::1', '2023-09-26 11:07:01', '2023-09-26 12:07:01'),
(576, 1, '/dilyastrend/index', 0, ' ', '::1', '2023-09-26 11:07:20', '2023-09-26 12:07:20'),
(577, 1, '/dilyastrend/index', 0, ' ', '::1', '2023-09-26 11:07:40', '2023-09-26 12:07:40'),
(578, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:08:06', '2023-09-26 12:08:06'),
(579, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:08:12', '2023-09-26 12:08:12'),
(580, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:10:34', '2023-09-26 12:10:34'),
(581, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 11:31:23', '2023-09-26 12:31:23'),
(582, 1, '/dilyastrend/index', 0, ' ', '::1', '2023-09-26 11:31:29', '2023-09-26 12:31:29'),
(583, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:31:52', '2023-09-26 12:31:52'),
(584, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-09-26 11:31:55', '2023-09-26 12:31:55'),
(585, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 11:32:00', '2023-09-26 12:32:00'),
(586, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:35:00', '2023-09-26 12:35:00'),
(587, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:35:13', '2023-09-26 12:35:13'),
(588, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:35:18', '2023-09-26 12:35:18'),
(589, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:35:41', '2023-09-26 12:35:41'),
(590, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:36:10', '2023-09-26 12:36:10'),
(591, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 11:36:38', '2023-09-26 12:36:38'),
(592, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 11:37:25', '2023-09-26 12:37:25'),
(593, 1, '/dilyastrend/index', 0, ' ', '::1', '2023-09-26 11:37:32', '2023-09-26 12:37:32'),
(594, 1, '/dilyastrend/index', 0, ' ', '::1', '2023-09-26 11:42:31', '2023-09-26 12:42:31'),
(595, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:42:33', '2023-09-26 12:42:33'),
(596, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 11:42:38', '2023-09-26 12:42:38'),
(597, 1, '/dilyastrend/product-services?dil=cart', 0, ' ', '::1', '2023-09-26 11:43:31', '2023-09-26 12:43:31'),
(598, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 11:43:41', '2023-09-26 12:43:41'),
(599, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 11:45:33', '2023-09-26 12:45:33'),
(600, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:45:38', '2023-09-26 12:45:38'),
(601, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:46:14', '2023-09-26 12:46:14'),
(602, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:46:48', '2023-09-26 12:46:48'),
(603, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:47:03', '2023-09-26 12:47:03'),
(604, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:47:23', '2023-09-26 12:47:23'),
(605, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 11:49:01', '2023-09-26 12:49:01'),
(606, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 11:49:10', '2023-09-26 12:49:10'),
(607, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 11:49:25', '2023-09-26 12:49:25'),
(608, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 11:49:43', '2023-09-26 12:49:43'),
(609, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:49:45', '2023-09-26 12:49:45'),
(610, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 11:50:02', '2023-09-26 12:50:02'),
(611, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 11:50:22', '2023-09-26 12:50:22'),
(612, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 11:50:57', '2023-09-26 12:50:57'),
(613, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:51:11', '2023-09-26 12:51:11'),
(614, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:52:05', '2023-09-26 12:52:05'),
(615, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:52:11', '2023-09-26 12:52:11'),
(616, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:52:18', '2023-09-26 12:52:18'),
(617, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:52:50', '2023-09-26 12:52:50'),
(618, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:53:17', '2023-09-26 12:53:17'),
(619, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:53:32', '2023-09-26 12:53:32'),
(620, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:53:45', '2023-09-26 12:53:45'),
(621, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:55:34', '2023-09-26 12:55:34'),
(622, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:55:55', '2023-09-26 12:55:55'),
(623, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:56:32', '2023-09-26 12:56:32'),
(624, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 11:56:51', '2023-09-26 12:56:51'),
(625, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:23:18', '2023-09-26 13:23:18'),
(626, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:23:23', '2023-09-26 13:23:23'),
(627, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:23:35', '2023-09-26 13:23:35'),
(628, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:24:06', '2023-09-26 13:24:06'),
(629, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:24:34', '2023-09-26 13:24:34'),
(630, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:24:46', '2023-09-26 13:24:46'),
(631, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:25:03', '2023-09-26 13:25:03'),
(632, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 12:28:02', '2023-09-26 13:28:02'),
(633, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 12:28:11', '2023-09-26 13:28:11'),
(634, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 12:28:37', '2023-09-26 13:28:37'),
(635, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 12:28:56', '2023-09-26 13:28:56'),
(636, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 12:30:23', '2023-09-26 13:30:23'),
(637, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-09-26 12:30:26', '2023-09-26 13:30:26'),
(638, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:30:32', '2023-09-26 13:30:32'),
(639, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:31:48', '2023-09-26 13:31:48'),
(640, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-09-26 12:31:59', '2023-09-26 13:31:59'),
(641, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-09-26 12:32:58', '2023-09-26 13:32:58'),
(642, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 12:33:05', '2023-09-26 13:33:05'),
(643, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 12:33:42', '2023-09-26 13:33:42'),
(644, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-09-26 12:33:50', '2023-09-26 13:33:50'),
(645, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 12:33:56', '2023-09-26 13:33:56'),
(646, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 12:34:03', '2023-09-26 13:34:03'),
(647, 1, '/dilyastrend/product-services?dil=cart', 0, ' ', '::1', '2023-09-26 12:34:18', '2023-09-26 13:34:18'),
(648, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:34:24', '2023-09-26 13:34:24'),
(649, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:34:26', '2023-09-26 13:34:26'),
(650, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:34:34', '2023-09-26 13:34:34'),
(651, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:35:16', '2023-09-26 13:35:16'),
(652, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:35:30', '2023-09-26 13:35:30'),
(653, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 12:35:50', '2023-09-26 13:35:50'),
(654, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 12:35:55', '2023-09-26 13:35:55'),
(655, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 12:37:11', '2023-09-26 13:37:11'),
(656, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:38:25', '2023-09-26 13:38:25'),
(657, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:38:51', '2023-09-26 13:38:51'),
(658, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:40:06', '2023-09-26 13:40:06'),
(659, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:40:12', '2023-09-26 13:40:12'),
(660, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:40:30', '2023-09-26 13:40:30'),
(661, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:41:26', '2023-09-26 13:41:26'),
(662, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:42:06', '2023-09-26 13:42:06'),
(663, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:42:31', '2023-09-26 13:42:31'),
(664, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:42:46', '2023-09-26 13:42:46'),
(665, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:45:07', '2023-09-26 13:45:07'),
(666, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:46:02', '2023-09-26 13:46:02'),
(667, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:46:09', '2023-09-26 13:46:09'),
(668, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:46:46', '2023-09-26 13:46:46'),
(669, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:46:58', '2023-09-26 13:46:58'),
(670, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:47:13', '2023-09-26 13:47:13'),
(671, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:47:57', '2023-09-26 13:47:57'),
(672, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:48:08', '2023-09-26 13:48:08'),
(673, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:50:10', '2023-09-26 13:50:10'),
(674, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:50:18', '2023-09-26 13:50:18'),
(675, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:50:38', '2023-09-26 13:50:38'),
(676, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:51:11', '2023-09-26 13:51:11'),
(677, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:51:44', '2023-09-26 13:51:44'),
(678, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:52:06', '2023-09-26 13:52:06'),
(679, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:52:19', '2023-09-26 13:52:19'),
(680, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:52:44', '2023-09-26 13:52:44'),
(681, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:53:05', '2023-09-26 13:53:05'),
(682, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:54:51', '2023-09-26 13:54:51'),
(683, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:54:57', '2023-09-26 13:54:57'),
(684, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:55:00', '2023-09-26 13:55:00'),
(685, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:55:15', '2023-09-26 13:55:15'),
(686, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:55:44', '2023-09-26 13:55:44'),
(687, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:56:00', '2023-09-26 13:56:00'),
(688, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:57:24', '2023-09-26 13:57:24'),
(689, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:58:07', '2023-09-26 13:58:07'),
(690, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:58:29', '2023-09-26 13:58:29'),
(691, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-26 12:58:35', '2023-09-26 13:58:35'),
(692, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-09-26 12:58:45', '2023-09-26 13:58:45'),
(693, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-26 12:58:48', '2023-09-26 13:58:48'),
(694, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-26 12:58:51', '2023-09-26 13:58:51'),
(695, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-26 12:58:57', '2023-09-26 13:58:57'),
(696, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 12:59:00', '2023-09-26 13:59:00'),
(697, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-09-26 15:17:25', '2023-09-26 16:17:25'),
(698, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-09-27 14:34:51', '2023-09-27 15:34:51'),
(699, 1, '/dilyastrend/gallery', 0, ' ', '::1', '2023-09-27 14:35:01', '2023-09-27 15:35:01'),
(700, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-09-27 14:35:06', '2023-09-27 15:35:06'),
(701, 1, '/dilyastrend/', 0, ' ', '::1', '2023-09-30 19:37:42', '2023-09-30 20:37:42'),
(702, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-30 19:37:59', '2023-09-30 20:37:59'),
(703, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-30 19:40:09', '2023-09-30 20:40:09'),
(704, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-30 19:41:15', '2023-09-30 20:41:15'),
(705, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-09-30 19:50:59', '2023-09-30 20:50:59'),
(706, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 19:29:49', '2023-10-01 20:29:49'),
(707, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-10-01 20:13:16', '2023-10-01 21:13:16'),
(708, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 20:14:23', '2023-10-01 21:14:23'),
(709, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 21:12:30', '2023-10-01 22:12:30'),
(710, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 23:04:32', '2023-10-02 00:04:32'),
(711, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 23:05:15', '2023-10-02 00:05:15'),
(712, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 23:06:11', '2023-10-02 00:06:11'),
(713, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-01 23:06:19', '2023-10-02 00:06:19'),
(714, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-03 13:04:08', '2023-10-03 14:04:08'),
(715, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-04 12:27:26', '2023-10-04 13:27:26'),
(716, 1, '/dilyastrend/terms-and-conditions', 0, ' ', '::1', '2023-10-05 13:34:32', '2023-10-05 14:34:32'),
(717, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:07:30', '2023-10-24 15:07:30'),
(718, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:08:12', '2023-10-24 15:08:12'),
(719, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:08:25', '2023-10-24 15:08:25'),
(720, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:08:43', '2023-10-24 15:08:43'),
(721, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:09:42', '2023-10-24 15:09:42'),
(722, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:13:05', '2023-10-24 15:13:05'),
(723, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:13:12', '2023-10-24 15:13:12'),
(724, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:13:23', '2023-10-24 15:13:23'),
(725, 1, '/dilyastrend/', 0, ' ', '::1', '2023-10-24 14:13:30', '2023-10-24 15:13:30'),
(726, 2, '/dilyastrend/', 1, 'Samson Nwachukwu', '::1', '2023-10-24 14:13:38', '2023-10-24 15:13:38'),
(727, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-10-24 14:13:38', '2023-10-24 15:13:38'),
(728, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-10-24 14:16:31', '2023-10-24 15:16:31'),
(729, 2, '/dilyastrend/admin/pages/dashboard?dil=cart', 1, 'Samson Nwachukwu', '::1', '2023-10-24 14:17:08', '2023-10-24 15:17:08'),
(730, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-10-24 14:17:15', '2023-10-24 15:17:15'),
(731, 2, '/dilyastrend/signin', 6, 'Soma Agaricha', '::1', '2023-10-24 14:17:38', '2023-10-24 15:17:38'),
(732, 2, '/dilyastrend/members/pages/dashboard?dil=home', 6, 'Soma Agaricha', '::1', '2023-10-24 14:17:38', '2023-10-24 15:17:38'),
(733, 2, '/dilyastrend/members/pages/dashboard?dil=home', 6, 'Soma Agaricha', '::1', '2023-10-24 14:18:11', '2023-10-24 15:18:11'),
(734, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-08 19:12:12', '2023-11-08 20:12:12'),
(735, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-08 19:12:22', '2023-11-08 20:12:22'),
(736, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-08 19:17:15', '2023-11-08 20:17:15'),
(737, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-08 19:17:21', '2023-11-08 20:17:21'),
(738, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-08 19:18:44', '2023-11-08 20:18:44'),
(739, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-08 19:19:09', '2023-11-08 20:19:09'),
(740, 1, '/dilyastrend/signin.php', 0, ' ', '::1', '2023-11-08 20:16:13', '2023-11-08 21:16:13'),
(741, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:16:24', '2023-11-08 21:16:24'),
(742, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:22:20', '2023-11-08 21:22:20'),
(743, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:24:22', '2023-11-08 21:24:22'),
(744, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:26:00', '2023-11-08 21:26:00'),
(745, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:26:27', '2023-11-08 21:26:27'),
(746, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:29:38', '2023-11-08 21:29:38'),
(747, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:33:42', '2023-11-08 21:33:42'),
(748, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:34:19', '2023-11-08 21:34:19'),
(749, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:35:21', '2023-11-08 21:35:21'),
(750, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:36:01', '2023-11-08 21:36:01'),
(751, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:36:37', '2023-11-08 21:36:37'),
(752, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:43:53', '2023-11-08 21:43:53'),
(753, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:52:04', '2023-11-08 21:52:04'),
(754, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-08 20:52:33', '2023-11-08 21:52:33'),
(755, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 21:43:48', '2023-11-09 22:43:48'),
(756, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 21:52:29', '2023-11-09 22:52:29'),
(757, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 21:54:37', '2023-11-09 22:54:37'),
(758, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 21:57:27', '2023-11-09 22:57:27'),
(759, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 21:58:04', '2023-11-09 22:58:04'),
(760, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 21:58:28', '2023-11-09 22:58:28'),
(761, 1, '/dilyastrend/product-services?dil=cart', 0, ' ', '::1', '2023-11-09 22:11:01', '2023-11-09 23:11:01'),
(762, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-09 22:11:11', '2023-11-09 23:11:11'),
(763, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-09 22:11:18', '2023-11-09 23:11:18'),
(764, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 22:11:26', '2023-11-09 23:11:26'),
(765, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-09 22:35:11', '2023-11-09 23:35:11'),
(766, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-09 22:35:14', '2023-11-09 23:35:14'),
(767, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-09 22:40:24', '2023-11-09 23:40:24'),
(768, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-09 22:42:04', '2023-11-09 23:42:04'),
(769, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-09 22:43:09', '2023-11-09 23:43:09'),
(770, 1, '/dilyastrend/signin-grey', 0, ' ', '::1', '2023-11-10 12:25:13', '2023-11-10 13:25:13'),
(771, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-10 12:25:20', '2023-11-10 13:25:20'),
(772, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:16:13', '2023-11-13 08:16:13'),
(773, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:16:50', '2023-11-13 08:16:50'),
(774, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:17:23', '2023-11-13 08:17:23'),
(775, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:17:34', '2023-11-13 08:17:34'),
(776, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:18:09', '2023-11-13 08:18:09'),
(777, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:22:20', '2023-11-13 08:22:20'),
(778, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:22:44', '2023-11-13 08:22:44'),
(779, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:25:05', '2023-11-13 08:25:05'),
(780, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:26:28', '2023-11-13 08:26:28'),
(781, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:26:59', '2023-11-13 08:26:59'),
(782, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:27:42', '2023-11-13 08:27:42'),
(783, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:27:58', '2023-11-13 08:27:58'),
(784, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:28:16', '2023-11-13 08:28:16'),
(785, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:28:36', '2023-11-13 08:28:36'),
(786, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:30:39', '2023-11-13 08:30:39'),
(787, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:38:57', '2023-11-13 08:38:57'),
(788, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:43:53', '2023-11-13 08:43:53'),
(789, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-13 07:44:02', '2023-11-13 08:44:02'),
(790, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:44:06', '2023-11-13 08:44:06'),
(791, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-13 07:44:09', '2023-11-13 08:44:09'),
(792, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:44:17', '2023-11-13 08:44:17'),
(793, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-13 07:44:27', '2023-11-13 08:44:27'),
(794, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:44:34', '2023-11-13 08:44:34'),
(795, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:51:11', '2023-11-13 08:51:11'),
(796, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:53:53', '2023-11-13 08:53:53'),
(797, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:54:19', '2023-11-13 08:54:19'),
(798, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:55:25', '2023-11-13 08:55:25'),
(799, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-13 07:55:36', '2023-11-13 08:55:36'),
(800, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:55:41', '2023-11-13 08:55:41'),
(801, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:59:38', '2023-11-13 08:59:38'),
(802, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:59:41', '2023-11-13 08:59:41'),
(803, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:59:55', '2023-11-13 08:59:55'),
(804, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 07:59:57', '2023-11-13 08:59:57'),
(805, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 08:00:15', '2023-11-13 09:00:15'),
(806, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 08:00:18', '2023-11-13 09:00:18'),
(807, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 08:01:06', '2023-11-13 09:01:06'),
(808, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:13:57', '2023-11-13 20:13:57'),
(809, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:14:14', '2023-11-13 20:14:14'),
(810, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-13 19:14:27', '2023-11-13 20:14:27'),
(811, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-13 19:15:16', '2023-11-13 20:15:16'),
(812, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:15:27', '2023-11-13 20:15:27'),
(813, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:16:25', '2023-11-13 20:16:25'),
(814, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:18:19', '2023-11-13 20:18:19'),
(815, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:18:45', '2023-11-13 20:18:45'),
(816, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:19:16', '2023-11-13 20:19:16'),
(817, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:19:30', '2023-11-13 20:19:30'),
(818, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:19:39', '2023-11-13 20:19:39'),
(819, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:20:16', '2023-11-13 20:20:16'),
(820, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:20:44', '2023-11-13 20:20:44'),
(821, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-13 19:21:37', '2023-11-13 20:21:37'),
(822, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-13 19:21:40', '2023-11-13 20:21:40'),
(823, 1, '/dilyastrend/signin-grey.php', 0, ' ', '::1', '2023-11-13 19:22:53', '2023-11-13 20:22:53'),
(824, 1, '/dilyastrend/terms-and-conditions-grey.php', 0, ' ', '::1', '2023-11-13 19:34:31', '2023-11-13 20:34:31'),
(825, 1, '/dilyastrend/terms-and-conditions-grey.php', 0, ' ', '::1', '2023-11-13 19:36:07', '2023-11-13 20:36:07'),
(826, 1, '/dilyastrend/about-us', 0, ' ', '::1', '2023-11-13 19:37:44', '2023-11-13 20:37:44'),
(827, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-13 19:42:40', '2023-11-13 20:42:40'),
(828, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-11-13 19:45:35', '2023-11-13 20:45:35'),
(829, 1, '/dilyastrend/contact-us-grey.php', 0, ' ', '::1', '2023-11-13 20:12:09', '2023-11-13 21:12:09'),
(830, 1, '/dilyastrend/contact-us-grey.php', 0, ' ', '::1', '2023-11-13 20:27:02', '2023-11-13 21:27:02'),
(831, 1, '/dilyastrend/contact-us-grey.php', 0, ' ', '::1', '2023-11-13 20:27:16', '2023-11-13 21:27:16'),
(832, 1, '/dilyastrend/contact-us-grey.php', 0, ' ', '::1', '2023-11-13 20:28:29', '2023-11-13 21:28:29'),
(833, 1, '/dilyastrend/blog-grey.php', 0, ' ', '::1', '2023-11-13 20:36:32', '2023-11-13 21:36:32'),
(834, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-11-14 16:02:59', '2023-11-14 17:02:59'),
(835, 1, '/dilyastrend/register-grey', 0, ' ', '::1', '2023-11-14 19:09:52', '2023-11-14 20:09:52'),
(836, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-15 19:36:28', '2023-11-15 20:36:28'),
(837, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-15 19:42:38', '2023-11-15 20:42:38'),
(838, 1, '/dilyastrend/signin.php', 0, ' ', '::1', '2023-11-15 19:42:41', '2023-11-15 20:42:41'),
(839, 1, '/dilyastrend/signin.php', 0, ' ', '::1', '2023-11-15 19:43:30', '2023-11-15 20:43:30'),
(840, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-15 19:43:58', '2023-11-15 20:43:58'),
(841, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-15 19:44:04', '2023-11-15 20:44:04'),
(842, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-15 19:45:42', '2023-11-15 20:45:42'),
(843, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-15 19:46:10', '2023-11-15 20:46:10'),
(844, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-15 19:48:07', '2023-11-15 20:48:07'),
(845, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-15 20:06:00', '2023-11-15 21:06:00'),
(846, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:06:05', '2023-11-15 21:06:05'),
(847, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-15 20:06:14', '2023-11-15 21:06:14'),
(848, 1, '/dilyastrend/blog-grey.php', 0, ' ', '::1', '2023-11-15 20:06:22', '2023-11-15 21:06:22'),
(849, 1, '/dilyastrend/blog?page=2', 0, ' ', '::1', '2023-11-15 20:16:09', '2023-11-15 21:16:09'),
(850, 1, '/dilyastrend/blog-grey.php', 0, ' ', '::1', '2023-11-15 20:16:13', '2023-11-15 21:16:13'),
(851, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-11-15 20:20:58', '2023-11-15 21:20:58'),
(852, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-11-15 20:21:51', '2023-11-15 21:21:51'),
(853, 1, '/dilyastrend/blog.php', 0, ' ', '::1', '2023-11-15 20:23:13', '2023-11-15 21:23:13'),
(854, 1, '/dilyastrend/blog?page=2', 0, ' ', '::1', '2023-11-15 20:23:17', '2023-11-15 21:23:17'),
(855, 1, '/dilyastrend/blog?page=3', 0, ' ', '::1', '2023-11-15 20:23:25', '2023-11-15 21:23:25'),
(856, 1, '/dilyastrend/blog?page=2', 0, ' ', '::1', '2023-11-15 20:23:27', '2023-11-15 21:23:27'),
(857, 1, '/dilyastrend/blog?page=1', 0, ' ', '::1', '2023-11-15 20:23:32', '2023-11-15 21:23:32'),
(858, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:24:25', '2023-11-15 21:24:25'),
(859, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:28:07', '2023-11-15 21:28:07'),
(860, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:28:24', '2023-11-15 21:28:24'),
(861, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:28:53', '2023-11-15 21:28:53'),
(862, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:29:05', '2023-11-15 21:29:05'),
(863, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:29:22', '2023-11-15 21:29:22'),
(864, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:29:50', '2023-11-15 21:29:50'),
(865, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:29:59', '2023-11-15 21:29:59'),
(866, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:30:16', '2023-11-15 21:30:16'),
(867, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:30:31', '2023-11-15 21:30:31'),
(868, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:30:52', '2023-11-15 21:30:52'),
(869, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:31:05', '2023-11-15 21:31:05'),
(870, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:31:27', '2023-11-15 21:31:27'),
(871, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:31:46', '2023-11-15 21:31:46'),
(872, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:32:34', '2023-11-15 21:32:34'),
(873, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 20:33:34', '2023-11-15 21:33:34'),
(874, 1, '/dilyastrend/blog?page=2', 0, ' ', '::1', '2023-11-15 20:33:47', '2023-11-15 21:33:47'),
(875, 1, '/dilyastrend/blog?page=3', 0, ' ', '::1', '2023-11-15 20:33:54', '2023-11-15 21:33:54'),
(876, 1, '/dilyastrend/blog?page=2', 0, ' ', '::1', '2023-11-15 20:33:56', '2023-11-15 21:33:56'),
(877, 1, '/dilyastrend/blog?page=1', 0, ' ', '::1', '2023-11-15 20:34:01', '2023-11-15 21:34:01'),
(878, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-15 20:43:45', '2023-11-15 21:43:45'),
(879, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:43:49', '2023-11-15 21:43:49'),
(880, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-15 20:43:56', '2023-11-15 21:43:56'),
(881, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-15 20:45:29', '2023-11-15 21:45:29'),
(882, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:45:53', '2023-11-15 21:45:53'),
(883, 1, '/dilyastrend/blog?one=category&amp=6', 0, ' ', '::1', '2023-11-15 20:45:56', '2023-11-15 21:45:56'),
(884, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:46:03', '2023-11-15 21:46:03'),
(885, 1, '/dilyastrend/blog?one=category&amp=2', 0, ' ', '::1', '2023-11-15 20:46:06', '2023-11-15 21:46:06'),
(886, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:46:21', '2023-11-15 21:46:21'),
(887, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-15 20:56:07', '2023-11-15 21:56:07'),
(888, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:56:11', '2023-11-15 21:56:11'),
(889, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:56:35', '2023-11-15 21:56:35'),
(890, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-15 20:59:36', '2023-11-15 21:59:36'),
(891, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-15 21:01:20', '2023-11-15 22:01:20'),
(892, 1, '/dilyastrend/blog?one=category&amp=6', 0, ' ', '::1', '2023-11-15 21:01:31', '2023-11-15 22:01:31'),
(893, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-16 19:18:12', '2023-11-16 20:18:12'),
(894, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:18:23', '2023-11-16 20:18:23'),
(895, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:20:24', '2023-11-16 20:20:24'),
(896, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:21:32', '2023-11-16 20:21:32'),
(897, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:21:43', '2023-11-16 20:21:43'),
(898, 1, '/dilyastrend/blog?one=category&amp=6', 0, ' ', '::1', '2023-11-16 19:21:47', '2023-11-16 20:21:47'),
(899, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:21:51', '2023-11-16 20:21:51'),
(900, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:21:53', '2023-11-16 20:21:53'),
(901, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:21:58', '2023-11-16 20:21:58'),
(902, 1, '/dilyastrend/blog?one=category&amp=2', 0, ' ', '::1', '2023-11-16 19:22:07', '2023-11-16 20:22:07'),
(903, 1, '/dilyastrend/blog?one=category&amp=2', 0, ' ', '::1', '2023-11-16 19:25:30', '2023-11-16 20:25:30'),
(904, 1, '/dilyastrend/blog?one=category&amp=2', 0, ' ', '::1', '2023-11-16 19:27:40', '2023-11-16 20:27:40'),
(905, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:28:04', '2023-11-16 20:28:04'),
(906, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:28:12', '2023-11-16 20:28:12'),
(907, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:28:31', '2023-11-16 20:28:31'),
(908, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:29:04', '2023-11-16 20:29:04'),
(909, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:29:12', '2023-11-16 20:29:12'),
(910, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:29:44', '2023-11-16 20:29:44'),
(911, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:30:04', '2023-11-16 20:30:04'),
(912, 1, '/dilyastrend/blog?one=category&amp=6', 0, ' ', '::1', '2023-11-16 19:30:31', '2023-11-16 20:30:31'),
(913, 1, '/dilyastrend/blog?one=category&amp=6', 0, ' ', '::1', '2023-11-16 19:31:02', '2023-11-16 20:31:02'),
(914, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:31:09', '2023-11-16 20:31:09'),
(915, 1, '/dilyastrend/blog?one=category&amp=2', 0, ' ', '::1', '2023-11-16 19:31:12', '2023-11-16 20:31:12'),
(916, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:31:15', '2023-11-16 20:31:15'),
(917, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 19:31:21', '2023-11-16 20:31:21'),
(918, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:32:03', '2023-11-16 20:32:03'),
(919, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 19:33:40', '2023-11-16 20:33:40'),
(920, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:33:45', '2023-11-16 20:33:45'),
(921, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:45:42', '2023-11-16 20:45:42'),
(922, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 19:45:46', '2023-11-16 20:45:46'),
(923, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-16 19:57:12', '2023-11-16 20:57:12'),
(924, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:57:17', '2023-11-16 20:57:17'),
(925, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2023-11-16 19:57:22', '2023-11-16 20:57:22'),
(926, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2023-11-16 19:58:05', '2023-11-16 20:58:05'),
(927, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 19:58:19', '2023-11-16 20:58:19'),
(928, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 19:58:24', '2023-11-16 20:58:24'),
(929, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:00:05', '2023-11-16 21:00:05'),
(930, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:00:58', '2023-11-16 21:00:58'),
(931, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:01:08', '2023-11-16 21:01:08'),
(932, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:01:54', '2023-11-16 21:01:54'),
(933, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:02:29', '2023-11-16 21:02:29'),
(934, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:02:47', '2023-11-16 21:02:47'),
(935, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:04:50', '2023-11-16 21:04:50'),
(936, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:06:40', '2023-11-16 21:06:40'),
(937, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:28:54', '2023-11-16 21:28:54'),
(938, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:30:59', '2023-11-16 21:30:59'),
(939, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:31:31', '2023-11-16 21:31:31'),
(940, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:31:42', '2023-11-16 21:31:42'),
(941, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:32:01', '2023-11-16 21:32:01'),
(942, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:32:15', '2023-11-16 21:32:15'),
(943, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:32:33', '2023-11-16 21:32:33'),
(944, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:32:42', '2023-11-16 21:32:42'),
(945, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:33:02', '2023-11-16 21:33:02'),
(946, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:33:25', '2023-11-16 21:33:25'),
(947, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-16 20:47:13', '2023-11-16 21:47:13'),
(948, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-16 20:47:52', '2023-11-16 21:47:52'),
(949, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-16 20:48:06', '2023-11-16 21:48:06'),
(950, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-16 20:48:22', '2023-11-16 21:48:22'),
(951, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 20:49:13', '2023-11-16 21:49:13'),
(952, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:49:20', '2023-11-16 21:49:20'),
(953, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:51:38', '2023-11-16 21:51:38');
INSERT INTO `audit_log` (`ID`, `Identifier`, `Task`, `UserID`, `FullName`, `IPAddr`, `DateCreated`, `DateModified`) VALUES
(954, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:51:51', '2023-11-16 21:51:51'),
(955, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:52:00', '2023-11-16 21:52:00'),
(956, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:52:21', '2023-11-16 21:52:21'),
(957, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:52:38', '2023-11-16 21:52:38'),
(958, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-16 20:52:58', '2023-11-16 21:52:58'),
(959, 1, '/dilyastrend/contact-us', 0, ' ', '::1', '2023-11-16 20:55:33', '2023-11-16 21:55:33'),
(960, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-16 20:55:40', '2023-11-16 21:55:40'),
(961, 1, '/dilyastrend/blog?one=category&amp=5', 0, ' ', '::1', '2023-11-16 20:55:47', '2023-11-16 21:55:47'),
(962, 1, '/dilyastrend/blog?one=story&amp=21', 0, ' ', '::1', '2023-11-16 20:55:51', '2023-11-16 21:55:51'),
(963, 1, '/dilyastrend/blog?one=story&amp=21', 0, ' ', '::1', '2023-11-16 20:56:54', '2023-11-16 21:56:54'),
(964, 1, '/dilyastrend/blog?one=story&amp=21', 0, ' ', '::1', '2023-11-16 20:57:17', '2023-11-16 21:57:17'),
(965, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-19 16:19:51', '2023-11-19 17:19:51'),
(966, 1, '/dilyastrend/Blog', 0, ' ', '::1', '2023-11-19 16:19:54', '2023-11-19 17:19:54'),
(967, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:20:00', '2023-11-19 17:20:00'),
(968, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:25:07', '2023-11-19 17:25:07'),
(969, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:25:51', '2023-11-19 17:25:51'),
(970, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:31:51', '2023-11-19 17:31:51'),
(971, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:32:31', '2023-11-19 17:32:31'),
(972, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:32:43', '2023-11-19 17:32:43'),
(973, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2023-11-19 16:32:52', '2023-11-19 17:32:52'),
(974, 1, '/dilyastrend/blog?one=story&amp=2', 0, ' ', '::1', '2023-11-19 16:33:29', '2023-11-19 17:33:29'),
(975, 1, '/dilyastrend/blog?one=story&amp=2', 0, ' ', '::1', '2023-11-19 16:34:29', '2023-11-19 17:34:29'),
(976, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2023-11-19 16:35:45', '2023-11-19 17:35:45'),
(977, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2023-11-19 16:36:09', '2023-11-19 17:36:09'),
(978, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2023-11-19 16:36:12', '2023-11-19 17:36:12'),
(979, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2023-11-19 16:36:52', '2023-11-19 17:36:52'),
(980, 1, '/dilyastrend/blog?one=story&amp=1', 0, ' ', '::1', '2023-11-19 16:36:56', '2023-11-19 17:36:56'),
(981, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-19 16:37:01', '2023-11-19 17:37:01'),
(982, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-19 16:42:29', '2023-11-19 17:42:29'),
(983, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:42:33', '2023-11-19 17:42:33'),
(984, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:45:11', '2023-11-19 17:45:11'),
(985, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:46:31', '2023-11-19 17:46:31'),
(986, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:46:35', '2023-11-19 17:46:35'),
(987, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:46:43', '2023-11-19 17:46:43'),
(988, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:46:51', '2023-11-19 17:46:51'),
(989, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:46:58', '2023-11-19 17:46:58'),
(990, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2023-11-19 16:46:59', '2023-11-19 17:46:59'),
(991, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:47:01', '2023-11-19 17:47:01'),
(992, 1, '/dilyastrend/blog?one=story&amp=18', 0, ' ', '::1', '2023-11-19 16:47:06', '2023-11-19 17:47:06'),
(993, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:47:08', '2023-11-19 17:47:08'),
(994, 1, '/dilyastrend/blog?one=story&amp=21', 0, ' ', '::1', '2023-11-19 16:47:10', '2023-11-19 17:47:10'),
(995, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:47:11', '2023-11-19 17:47:11'),
(996, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2023-11-19 16:47:15', '2023-11-19 17:47:15'),
(997, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2023-11-19 16:48:56', '2023-11-19 17:48:56'),
(998, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:49:00', '2023-11-19 17:49:00'),
(999, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:49:05', '2023-11-19 17:49:05'),
(1000, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:49:39', '2023-11-19 17:49:39'),
(1001, 1, '/dilyastrend/blog?one=story&amp=23', 0, ' ', '::1', '2023-11-19 16:49:48', '2023-11-19 17:49:48'),
(1002, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:49:55', '2023-11-19 17:49:55'),
(1003, 1, '/dilyastrend/blog?one=story&amp=24', 0, ' ', '::1', '2023-11-19 16:49:57', '2023-11-19 17:49:57'),
(1004, 1, '/dilyastrend/blog', 0, ' ', '::1', '2023-11-19 16:50:00', '2023-11-19 17:50:00'),
(1005, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2023-11-19 16:50:03', '2023-11-19 17:50:03'),
(1006, 1, '/dilyastrend/blog?one=story&amp=26', 0, ' ', '::1', '2023-11-20 20:18:48', '2023-11-20 21:18:48'),
(1007, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:17:38', '2023-11-20 23:17:38'),
(1008, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:18:15', '2023-11-20 23:18:15'),
(1009, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:18:59', '2023-11-20 23:18:59'),
(1010, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:30:35', '2023-11-20 23:30:35'),
(1011, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:30:38', '2023-11-20 23:30:38'),
(1012, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:36:17', '2023-11-20 23:36:17'),
(1013, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:36:20', '2023-11-20 23:36:20'),
(1014, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:37:32', '2023-11-20 23:37:32'),
(1015, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:37:42', '2023-11-20 23:37:42'),
(1016, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:38:07', '2023-11-20 23:38:07'),
(1017, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:38:28', '2023-11-20 23:38:28'),
(1018, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:38:31', '2023-11-20 23:38:31'),
(1019, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-20 22:38:33', '2023-11-20 23:38:33'),
(1020, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-20 22:39:23', '2023-11-20 23:39:23'),
(1021, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-20 22:41:02', '2023-11-20 23:41:02'),
(1022, 1, '/dilyastrend/register', 0, ' ', '::1', '2023-11-20 22:41:32', '2023-11-20 23:41:32'),
(1023, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-21 20:32:27', '2023-11-21 21:32:27'),
(1024, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-21 20:32:33', '2023-11-21 21:32:33'),
(1025, 1, '/dilyastrend/forgot-password', 0, ' ', '::1', '2023-11-21 20:32:42', '2023-11-21 21:32:42'),
(1026, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-23 12:55:07', '2023-11-23 13:55:07'),
(1027, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-23 12:55:17', '2023-11-23 13:55:17'),
(1028, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-23 12:55:38', '2023-11-23 13:55:38'),
(1029, 2, '/dilyastrend/signin', 1, 'Samson Nwachukwu', '::1', '2023-11-23 12:55:47', '2023-11-23 13:55:47'),
(1030, 2, '/dilyastrend/admin/pages/dashboard?dil=home', 1, 'Samson Nwachukwu', '::1', '2023-11-23 12:55:47', '2023-11-23 13:55:47'),
(1031, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-23 12:56:01', '2023-11-23 13:56:01'),
(1032, 1, '/dilyastrend/signin', 0, ' ', '::1', '2023-11-26 16:13:42', '2023-11-26 17:13:42'),
(1033, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-26 16:22:54', '2023-11-26 17:22:54'),
(1034, 1, '/dilyastrend/', 0, ' ', '::1', '2023-11-26 16:22:55', '2023-11-26 17:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `audit_tasks`
--

DROP TABLE IF EXISTS `audit_tasks`;
CREATE TABLE IF NOT EXISTS `audit_tasks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskName` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit_tasks`
--

INSERT INTO `audit_tasks` (`ID`, `TaskName`) VALUES
(1, 'Log In'),
(2, 'Log Out'),
(3, 'Insert'),
(4, 'Update'),
(5, 'Delete'),
(6, 'View');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `Fname` varchar(55) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Message` text,
  `Title` varchar(255) DEFAULT NULL,
  `OgTitle` varchar(500) DEFAULT NULL,
  `Target` int(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `VidAud` varchar(255) DEFAULT NULL,
  `PhotoVid` varchar(255) DEFAULT NULL,
  `VidPic` varchar(255) DEFAULT NULL,
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AccessLevel` int(11) DEFAULT NULL,
  `IPAddr` varchar(46) DEFAULT NULL,
  `IsRead` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`ID`, `UID`, `Fname`, `Category`, `Message`, `Title`, `OgTitle`, `Target`, `Photo`, `VidAud`, `PhotoVid`, `VidPic`, `AddedOn`, `AccessLevel`, `IPAddr`, `IsRead`) VALUES
(1, 1, 'Samson', 3, '<p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><b><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Davido and Popcan</span></b></p><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Donâ€™t forget to change the fileâ€™s path if you downloaded summernote in a different folders.</p><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">You can however, and a lot of developers do these days, is include the stylesheetâ€™s within the&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 12.6px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">head</code>&nbsp;are of your page, and include the Javascript at the bottom of your page, but before the closing&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 12.6px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">body</code>&nbsp;tag.</p><blockquote style=\"border-left-color: rgb(248, 100, 102); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><h5 id=\"fontawesome-dependancy\" style=\"font-family: inherit; color: inherit; margin-top: 10px; margin-bottom: 10px; font-size: 14px;\">Fontawesome dependancy</h5><p style=\"margin-bottom: 0px; font-size: 14px; color: rgb(104, 116, 127);\">After v0.8.0, You donâ€™t have to include fontawesome for displaying Summernoteâ€™s icons. But You can still use fontawesome for your custom icons. For more details, please visit&nbsp;<a href=\"https://summernote.org/deep-dive/#custom-button\" style=\"text-decoration: none;\">custom buttons</a>&nbsp;section.</p></blockquote><h3 id=\"embed\" style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(66, 81, 95); margin-bottom: 8px; font-size: 18px; padding-top: 96px; margin-top: -80px !important;\">Embed</h3><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Summernote can be used with or without a&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 12.6px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">form</code>.</p><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">To use without a&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 12.6px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">form</code>, we suggest using a&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 12.6px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">div</code>&nbsp;in the&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 12.6px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">body</code>; this element will then be used where you want the Summernote editor to be rendered within your page.</p><figure class=\"highlight\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><pre style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; padding: 28px 24px; margin-bottom: 10px; line-height: 1.42857; color: rgb(104, 116, 127); word-break: break-all; overflow-wrap: break-word; background-color: rgb(250, 251, 253); border: 1px solid rgb(234, 236, 240); border-radius: 4px;\"><code class=\"language-html\" data-lang=\"html\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; color: inherit; white-space: pre-wrap;\"><span class=\"nt\" style=\"color: rgb(6, 40, 115); font-weight: bold;\">&lt;div</span> <span class=\"na\" style=\"color: rgb(64, 112, 160);\">id=</span><span class=\"s\" style=\"color: rgb(64, 112, 160);\">\"summernote\"</span><span class=\"nt\" style=\"color: rgb(6, 40, 115); font-weight: bold;\">&gt;</span>Hello Summernote<span class=\"nt\" style=\"color: rgb(6, 40, 115); font-weight: bold;\">&lt;/div&gt;</span></code></pre></figure><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">To use within a&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospac', 'Risky! Yes your body risky', 'a3da82f08aa6ed503f98e5315a9b8ba6', NULL, '38f74892c8044f24b5ee2be864ccf3db.jpg', NULL, NULL, NULL, '2019-11-20 22:37:04', 1, '::1', 0),
(2, 1, 'Samson', 2, '                                                                                                                                                                                                                                                                                                                    <h2 id=\"air-mode\" style=\"font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(66,=\"\" 81,=\"\" 95);=\"\" margin-bottom:=\"\" 30px;=\"\" font-size:=\"\" 26px;=\"\" padding-top:=\"\" 130px;=\"\" margin-top:=\"\" -80px=\"\" !important;\"=\"\"><b><span style=\"font-family: \" comic=\"\" sans=\"\" ms\";\"=\"\">Air-mode</span></b></h2><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;\"=\"\">Air-mode give an interface without the Toolbar. To reveal popover Toolbar, select a text where you want to modify. Simply turn on&nbsp;<code class=\"highlighter-rouge\" style=\"font-family: Menlo, Monaco, Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 12.6px;=\"\" padding:=\"\" 2px=\"\" 4px;=\"\" color:=\"\" rgb(199,=\"\" 37,=\"\" 78);=\"\" background-color:=\"\" rgb(249,=\"\" 242,=\"\" 244);=\"\" border-radius:=\"\" 4px;\"=\"\">airMode</code>&nbsp;and just focus on text.</p><figure class=\"highlight\" style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><pre style=\"font-family: Menlo, Monaco, Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 14px;=\"\" padding:=\"\" 28px=\"\" 24px;=\"\" margin-bottom:=\"\" 10px;=\"\" line-height:=\"\" 1.42857;=\"\" color:=\"\" rgb(104,=\"\" 116,=\"\" 127);=\"\" word-break:=\"\" break-all;=\"\" overflow-wrap:=\"\" break-word;=\"\" background-color:=\"\" rgb(250,=\"\" 251,=\"\" 253);=\"\" border:=\"\" 1px=\"\" solid=\"\" rgb(234,=\"\" 236,=\"\" 240);=\"\" border-radius:=\"\" 4px;\"=\"\"><code class=\"language-javascript\" data-lang=\"javascript\" style=\"font-family: Menlo, Monaco, Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" color:=\"\" inherit;=\"\" white-space:=\"\" pre-wrap;\"=\"\"><span class=\"nx\">$</span><span class=\"p\">(</span><span class=\"dl\">\'</span><span class=\"s1\" style=\"color: rgb(64, 112, 160);\">.summernote</span><span class=\"dl\">\'</span><span class=\"p\">).</span><span class=\"nx\">summernote</span><span class=\"p\">({</span>\r\n  <span class=\"na\" style=\"color: rgb(64, 112, 160);\">airMode</span><span class=\"p\">:</span> <span class=\"kc\" style=\"color: rgb(0, 112, 32); font-weight: bold;\">true</span>\r\n<span class=\"p\">});</span></code></pre></figure><h3 id=\"example\" style=\"font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(66,=\"\" 81,=\"\" 95);=\"\" margin-bottom:=\"\" 8px;=\"\" font-size:=\"\" 18px;=\"\" padding-top:=\"\" 96px;=\"\" margin-top:=\"\" -80px=\"\" !important;\"=\"\">Example</h3><div class=\"note-editor\" style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><div class=\"note-editing-area\"><div class=\"note-handle\"></div><div class=\"note-editable\" role=\"textbox\" aria-multiline=\"true\" spellcheck=\"true\"><p style=\"font-size: 14px; color: rgb(104, 116, 127);\">This is an Air-mode editable area.</p><ul style=\"margin-bottom: 10px;\"><li style=\"color: rgb(104, 116, 127);\">Select a text to reveal the toolbar.</li><li style=\"color: rgb(104, 116, 127);\">Edit rich document on-the-fly, so elastic!</li></ul><p style=\"font-size: 14px; color: rgb(104, 116, 127);\">End of air-mode area</p></div><output class=\"note-status-output\" aria-live=\"polite\" style=\"padding-top: 7px; line-height: 1.42857; color: rgb(85, 85, 85);\"></output></div></div><h2 id=\"themes-with-bootswatch\" style=\"font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" rgb(66,=\"\" 81,=\"\" 95);=\"\" margin-bottom:=\"\" 30px;=\"\" font-size:=\"\" 26px;=\"\" padding-top:=\"\" 130px;=\"\" margin-top:=\"\" -80px=\"\" !important;\"=\"\">Themes with bootswatch</h2><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;\"=\"\">Styles change according to Bootstraps Theme. The editor below editor uses the Bootswatch Themes based on Bootstrap 3, you can also do the same with Bootstrap 4:&nbsp;<a href=\"https://bootswatch.com/\" target=\"_blank\" style=\"text-decoration: none;\">Bootswatch</a></p><p style=\"font-size: 14px; color: rgb(104, 116, 127); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;\"=\"\"><img style=\"width: 320px;\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAFAAUADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQ', 'Joel Matip say - Virgil van Dijk is the Greatest football defender', '6e45e86fb28c387461ca8aef20345e9a', NULL, 'a6eb276d9d8dd4d32e34c5f440647ebc.jpg', NULL, NULL, NULL, '2019-11-21 00:06:29', 1, '::1', 0),
(16, 1, 'Samson', 7, '                                            <p>Jesus is the greatest whether people believe it or not!</p>                                        ', 'Jesus believed to be who they say He is?', 'c463a0c0074f2743f73233bc64421ed5', NULL, '5ce6fb5a9e2e6b6fbe00729183e5c97f.gif', NULL, NULL, NULL, '2019-11-21 18:18:13', 1, '::1', 0),
(17, 1, 'Samson', 5, '                                                                                                                                                                                                <p>Thank you southampton football club and even now</p><p style=\"text-align: center; \"><img style=\"width: 50%;\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAAQABAAD/7QB8UGhvdG9zaG9wIDMuMAA4QklNBAQAAAAAAF8cAigAWkZCTUQyMzAwMDk2YjAxMDAwMGNiMWUwMDAwNzUyYzAwMDAxMTNmMDAwMGJlYWEwMDAwYWZjNTAwMDAyYWYxMDAwMGNhMTMwMTAwM2QyYTAxMDA1OTYxMDEwMAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wgARCAKAAoADACIAAREBAhEB/8QAHQAAAQQDAQEAAAAAAAAAAAAAAAQFBgcBAgMICf/EABsBAQACAwEBAAAAAAAAAAAAAAABAwIEBQYH/9oADAMAAAEQAhAAAACLqkijzPsN++nazvva6O9L9RX1bgnDbHsZUOPJtTVy0ROWxLPzwDxea+anE4pxSmVm7nvhsswpTZ63XksXsmQetMqWgddhpy8coNQpTJJHHJJbRu/dJL2PJRfL72z13yvpvCIsRarkvlfe8u3OwNnThefT51uH5W5S2K8rs6ubbKNjTn7OpkPR5sYrOeQavPXvynuVFhSFNKcehWdcek6St1KvQqk3m/V4A1OiZMEpmEasD0/i2tPMGTa04VF5Gw56bfzWpeB61wkcYkPR5KqZRZ33ebT3fh28b9Nd39lmm5sIcSLns6TRxkfOcYqvVu+OcWi1m19VnFInLInhznZRwZ7t9zUsj/hYrjT43YY2NCpFGtbdSN/Xl1fPKVCeR4S38H/XPUZ+qhUMmztDolQnDHMfmF9u1pXJ4vJ+t5dofG1ZZrJ4/IY9OOibqm8/69TedEWHuc/0GRtkusbaNk0Xx1+KxHtxfRz5wrrfv+TkkSzy5PeUTuvF25zfXevn5n26LupZAzZ6vHpxPNe059ekp3eZGMejq66PIQ2pBprlmoaea/KKvaJ9Eb+a1sbyy87r6uLV1o2pEMeez5pp68uvi/qjlKIWsv6cy1iOLKpuqginKuTLoPsiZwnLZWbInLIpnxFHDXv2+dwk8cX87tIbRqiW6FaiGurZu6vbj149nRU8+yzjdFnzM0OWrH+MoVShat2doQraYbzMIfl8SRaUrp+Sb/DnZCDf4skjeOWru8NA8t74VJS7UvWn3aLdbhK0Zvo9Pnl0uXW6FC9vWPLe53k09GVFqbsY5Z54FGyXpt87qmW42+cjz05cb06yawm4vUeFtTq2qautBVFXPOxyZosgqdk+V6pYLNPil68eN6PBqcj0XXdPnf5CftxV830Weri7XdWL8pI1Rc35c9IluFuEoxfwxqaonLInteWe+zJtlEh6RPbGZi3NyTGXtXF9pSRkTcrK1bm18LZfuzJjPVe0CTjEpwIyAAyPluvPbBdGPLCuGzn043a6ac+12tpsr17PmUvNw1wtQG+nB9YPbJ6N2KZBq8Rzu+ecG56SZVMkmQKIzouA+ovMvF73GbQ6x+hw+rVEc9fzkxgNvVLze9zcWvbQ6T5J4Jp1OCs6t2+da/RLrfqduOmun0tuedeN6bXG2aNvQ6ZsoSOTat1+jNJHEJDu58Iy4R6rdeurN3ixXhHgdWzqjxqYmGS9GEWzJsWbMZJLrMRwkeIR0kHOYYyRaxLDs8kwyavwhhHvRDNl7wllHtPOKCRJnre5lyRVXW3R8cn16cuF29Xxqvjp8XG8n857mpa1O37OZeREVs1Ty+t19WeZPSeGyldWFT0uQ7asrsyWRuUxnG1rrOVsOrt1w8MvXXymqFAr7nlUzJun43pQDjelOvJXdr8dlqnY02nR6zMMWyxHqb+caq9nTw4v8w7Xm63VWc43UebFKZd5P6A6PiWWbd0NYbAhuG03dFSuu9rH/M4R/m/oIraOm+uO1OHhkeenxNkabtNaSaQpVOLNN4Yor2oXdVI2bXupZvX0o2eHG9UrhVurXBs4Wa7ghTSJlBJnWkqq3IMtT9qe09tic6nzfloHB9Aq9Y+RpP2/N35GKaTdXg2u+0XmcJVCFCPjeh29PeX7q1OrOJDW8r7Xn4/HkrTbyJgthCmvouEMtfz7zuxxMvXK7PSwuGe75uttLMrenNsNteL6ZR3kDz6z5/H5G54x2NFTk462/VcRsGAcfv8AJ+YZVfpWVYETnPY5GvXrnG/xasRqfMetl8urt93MlsQcWOrbXqmffG2QdI7tlW/NqXhFaPGJvF0HxZnHYmtsWjGYmKl1QmcYgnstayqzjaKia6rT2I6xlWHNBblezVuLtidupX+liosbYMXc2Z69SKZXDMNxz26b9X59x5qnS/lR3uoRcvurMoOm3zVeqUws11Ub6fUSde/Ocb7T0POrsUqK0Ou9w4ZY0ErTU67izBxvQLpPEVPpPFTuWPGNiuO1J6Aoa3TRo7QrPj+gmbrX6rreetfEdncbWvZyasL64hExietmkfGPty+5bljUPbnZ4U7349MdzxesRrfM+rf39rlG5Mfjcvi1exxV9XOM2UcUxoie2+K4+vQbV7dnulO67mva8PixFl3xGvtprsiMMGKt2ys1oZ69hLKxES58rbETdEXr7OeE4iKbFW1YSaDE4WtVHbtv811lHJl6Xh56ohzfdz4/ytivVUeM48f9HOnNXt85ZdiWN+k8hNKpeptGVFJVrdw/RAKtTo6ZfVff8jFOcrjmh1tVKFdt869Y5Bpru6dzUYjhiMI+3Dj97fqjNHqPMhqJp7vC9NuXmiW5LQiT26KKtTTSL8D06+1aYkltV8c6kS31V4pTK+T2nd8an/ZsZmWWRzG3moT9sbNOS7Mwm5OfOMI8uQ2SQZJedP27DSTVHGcW2l3OJiusjWRMQxKXbLCAk0a4zj5KMwixNMZYw/R864Wx4k+04R1ya3XpcrMzruU9TwcZs5uiN/NmVfSmLzWl0118p7/ooR9r9O+odGrc73moHYulcRnC25Sm4ve3lMXkm3oSphtVw39CJ1xf/nfKtk3118t7Zds3q+35fpom0p2VHHrpy+7yFa7e5dYxCyoNdi3rkediueWh56luM+hY3xlunvVbxlUX5nVzpz1wz5r0CpnNJXA5BuVKYg4R7DYXKWfpXdINmDOdcgSNXOMW2YQ+WY5p2G0ass2XLRTtjY39uuDbnjujhzXtyRR1EN6pMujJL3y0RkvUs5GThz5p4y3fW513udu0ayHv/NHBZCk1mlvw3RaXR17uks0+nAuVvxLb0Ih2489PoLeXDFdumFJRtJ1yXN+rKZjVjx2/NOMX6otfb5Y3feF6lSyTeadHlV1DfUnl7n9rm6NVh36NnOEp26nOoHzzfVBcvpNG6za2tEq6axMttugJ/lFp19P4pVswZE3sNdthK0q/ndN7kCSX7lUSjNjwvGxqUrV+FzDl/wCU4s6SRNeMR+0KveGVkVTLYTndKeDF1xtftGhNMShG0JYmQpmgjORc2EQudo0RlMYcEZGcdcLtNTsazWDOdtKLdKX+bVaJ856ucBo9R29YeSLm9d4C1YPAeOGzXyVUm5nSw78Jrvcxnypk23oVdwumoK7GwsuzPO+2oeTyOJ7mk+qIms6nCdVqmeY5pfNV/wBFTQ1yWOZ4PqPRM/pO6+1xPOdOW9UfO6ipT3ear2kmau6qAOkiLansRPeddDQa6KhtrstWj7ea9TI5DX/e7KVx9DxjN1UMWYyfuTNtEOXDjshJbVSuGWF30W9Ru2yed68xjlNFtf8AYmjRG9oynfKEE4zRtjpjnZEEyhkBinb689tUgCNtenMx00eOj5LPTrx7nkGMkMe4PrVMginXa56vKXTb5/ROHnvYSj1F5C9Y+m8etMle/rCn3xSxtSjGfjjk67M3ecXvMWM0q3iQj0LfPgGURNxx30ZSXF7ZKa3Nfabo0qZ93nSySxKYzEmdWpXbikZHaD7WoulNHTHOqwaXvarZlbvpv5j1Wc4zN4GycdVMhsqZHmULtvQj6CSxa3Xh9l1o/wCh1Li8/wAijluU+SxjjjMpWQ/SYly6FcUL36JYwtlWsa45Y8Ngo3jvy1MZAAA68uho7Suyu54iqulrouhyKbjfo5TodXzVi8qt5HeYe2nLX2A677nO0vCkeO5zvU8ipCIb+pccS8v5nP0+eYcHp/Pl8LEk9DdOXv2bVvNuyxd+TXptUT3154EtnKHlNcHlPm9R8bG183+fJp1D5np7zuh7smGKuLOTd1udVDu18Jq9GxV10ZR3fTp5j1QHXLPDv1mt9CB90ZOnx3hhdV+1p1w12vG6boNOYdLON6Cf0ZZ1Y24y3qiTRk4oU2Mcli5A4ZYMqpL3rt77cUuWLTnHWjdzyAAACc51tV3IPKna8xclT3SX6lCMnpuIZY0dJZlaZVt5xfETIKXfLtqnzwONrdTzMOmaRl0+tOvIdxU7q9PvhP3iI9YtZSWu+1IbKoFExTMXUW0T6YVlKNPcn75EbQtxhwtT7GtbnjW1JBdX56fmF9twf5ZEJJVuvjG5p+J1o+3u8V9P5qHJTjrPQTxFpTjnCd9OnmPVbPSOc31LFe1cdrhbpoO87Gv6AmdRSWvYnlfKonRZWwHB9Jkw', 'The true tech in Software now', '0e09c938486a3d0b5e764153c38eef44', NULL, '294224fce2925fa823d6826fc748475f.jpg', NULL, NULL, NULL, '2019-11-21 18:26:11', 1, '::1', 0),
(18, 1, 'Samson', 8, '                                                                                        <p>Testing now</p>                                                                                ', 'Testing another gif', '8118d58b34cbc53910c6d7077ee5c738', NULL, '372e0f4c0ca01d8e69520d21c218e2f9.jpg', NULL, NULL, NULL, '2019-11-21 18:29:51', 1, '::1', 0),
(21, 1, 'Samson', 5, '                                                                                                                                                                                                                            <p>where is my crypto</p>                                                                                                                                                                                                        ', 'The true tech in Software new now', '910d9f2a86e09134fd64c1881e942a40', NULL, '177433b77e23c45b521025bf0deb6464.jpeg', NULL, NULL, NULL, '2020-02-03 13:21:50', 1, '::1', 0),
(22, 1, 'Samson', 5, '<p>Facebook is the best social media ever</p>', 'Facebook App', 'bb9a78f1f7e2c4d0fa5fa37a5ca1f19f', NULL, '527f3b23e03cd145440dec5e084000e7.png', NULL, NULL, NULL, '2020-08-12 21:44:45', 1, '::1', 0),
(23, 1, 'Samson', 5, '<h2 style=\"padding: 0px; margin-right: 0px; margin-bottom: 8px; margin-left: 0px; outline: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 1.34em; color: rgb(74, 74, 74);\"><span style=\"padding: 0px; margin: 0px; outline: 0px; font-weight: 700;\">How do you use&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">have&nbsp;</em>and&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">has</em>&nbsp;with other verbs?<em style=\"padding: 0px; margin: 0px; outline: 0px;\"><br style=\"padding: 0px; margin: 0px; outline: 0px;\"></em></span></h2><h3 style=\"padding: 0px; margin-right: 0px; margin-bottom: 6px; margin-left: 0px; outline: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 1.24em; color: rgb(74, 74, 74);\"><span style=\"padding: 0px; margin: 0px; outline: 0px; font-weight: 700;\">Indicating possibility</span></h3><p style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.67em; margin-left: 0px; outline: 0px; color: rgb(74, 74, 74); font-family: Arial, Helvetica, sans-serif; font-size: 18px;\">Now that you’ve mastered the basics of&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">have&nbsp;</em>and<em style=\"padding: 0px; margin: 0px; outline: 0px;\">&nbsp;has</em>, it’s time to talk about how to use them in combination with other verbs. For every sentence that simply indicates possession (<em style=\"padding: 0px; margin: 0px; outline: 0px;\">I have a cat</em>), there’s going to be another that uses&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">to have&nbsp;</i>in a more&nbsp;complex way. For example, if you say&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">I have to groom the cat</em>,&nbsp;that’s definitely more complicated of an issue … in more ways than one!</p><p style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.67em; margin-left: 0px; outline: 0px; color: rgb(74, 74, 74); font-family: Arial, Helvetica, sans-serif; font-size: 18px;\">One way&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">have</em>&nbsp;and&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">has</em>&nbsp;combine with other verbs is to describe what could happen (but hasn’t yet):</p><ul style=\"padding: 0px; margin: -1.67em 0px 1.67em 32px; outline: 0px; color: rgb(74, 74, 74); font-family: Arial, Helvetica, sans-serif; font-size: 18px;\"><li style=\"padding: 0px; margin: 0px; outline: 0px;\">You&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">have</em>&nbsp;to call me tonight.</li><li style=\"padding: 0px; margin: 0px; outline: 0px;\">He<em style=\"padding: 0px; margin: 0px; outline: 0px;\">&nbsp;has</em>&nbsp;to do his homework before dinner.</li></ul><p style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.67em; margin-left: 0px; outline: 0px; color: rgb(74, 74, 74); font-family: Arial, Helvetica, sans-serif; font-size: 18px;\">These actions have not occurred yet. As before,&nbsp;<em style=\"padding: 0px; margin: 0px; outline: 0px;\">have</em>&nbsp;is used with the pronouns&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">I</i>,&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">you</i>,&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">we</i>, and&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">they</i>, while&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">has</i>&nbsp;is used with&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">he</i>,&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">she</i>, and&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">it</i>.</p><h3 style=\"padding: 0px; margin-right: 0px; margin-bottom: 6px; margin-left: 0px; outline: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 1.24em; color: rgb(74, 74, 74);\"><span style=\"padding: 0px; margin: 0px; outline: 0px; font-weight: 700;\">Indicating completed action</span></h3><p style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.67em; margin-left: 0px; outline: 0px; color: rgb(74, 74, 74); font-family: Arial, Helvetica, sans-serif; font-size: 18px;\"><i style=\"padding: 0px; margin: 0px; outline: 0px;\">Have</i>&nbsp;or&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">has</i>&nbsp;can be used to communicate that the action of a verb was completed prior to the present. To do that,&nbsp;<a href=\"https://www.dictionary.com/e/what-are-the-basic-verb-tenses/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"padding: 0px; margin: 0px; outline: 0px; cursor: pointer; color: rgb(9, 189, 255); text-decoration-line: underline;\">you will create what’s called the present perfect tense</a>, which involves more complex time relationships, and&nbsp;combines a verb with&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">has</i>,&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">have</i>, or&nbsp;<i style=\"padding: 0px; margin: 0px; outline: 0px;\">had</i>:</p><ul style=\"padding: 0px; margin: -1.67em 0px 1.67em 32px; outline: 0px; color: rgb(74, 74, 74); font-family: Arial, Helvetica, sans-serif; font-size: 18px;\"><l', 'Moses Bliss', 'cf2e3bb75f4c0970b575df5a4d7d6ba5', NULL, '246eadb4d101a412a61693670fbd9243.jpg', NULL, NULL, NULL, '2020-09-22 12:22:43', 1, '::1', 0),
(24, 1, 'Samson', 6, '                              <p><span style=\"color: rgb(36, 39, 41); font-family: Arial, \"Helvetica Neue\", Helvetica, sans-serif; font-size: 13px;\">@Finesse: My answer failed to enumerate </span><i style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, \"Helvetica Neue\", Helvetica, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; color: rgb(36, 39, 41);\">all</i><span style=\"color: rgb(36, 39, 41); font-family: Arial, \"Helvetica Neue\", Helvetica, sans-serif; font-size: 13px;\"> of the differences between InnoDB and MyISAM. But yes, InnoDB behavior with AUTO_INCREMENT is a difference, and one that we have to account for if we are going to use AUTO_INCREMENT, and if we are dependent on some behavior that isn\'t supported. This difference could be considered a disadvantage; perhaps some would consider it a \"big disadvantage\". Note that the initialization of AUTO_INCREMENT values has been modified in MySQL 8.0</span><br></p>                          ', 'Fashion and its effects on the Community at large', '385304433a40d8498af455ea5b21e8bd', NULL, 'fe166209ee109f91ef7bcbe07b1ff4c0.jpg', NULL, NULL, NULL, '2020-11-18 14:03:25', 1, '::1', 0),
(26, 1, 'Samson', 2, '<p class=\"MsoNormal\"><!--[if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"_x0000_i1029\" type=\"#_x0000_t75\" style=\'width:206.25pt;\r\n height:137.25pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/CNSCOM~1/AppData/Local/Temp/msohtmlclip1/01/clip_image001.jpg\"\r\n  o:title=\"\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"f\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><o:p></o:p></p><p class=\"MsoNormal\"><b><span style=\"color:#BF0000\">No matter how much you tout\r\nthe greatness of your product or service, that alone won’t guarantee success.\r\nIn the consumer marketplace, you must also establish a unique, memorable,\r\ntrustworthy profile by capturing consumers’ attention and building a long-lasting\r\nrelationship with them. </span></b>The key to accomplishing this is brand\r\nadvertising.</p><p class=\"MsoNormal\"><img style=\"width: 50%;\" src=\"../../files/images/blog/photo1.jpeg\"><br></p><p class=\"MsoNormal\">It’s important for your business to engage its customers.\r\nAdvert/ promotion is a tool to keep the conversation going.</p><p class=\"MsoNormal\">Engaging customers is different from pushing your offers.\r\nEngaging involves furnishing your customers with relevant information about\r\nyour products and your business as well. It’s all about creating fresh content.<o:p></o:p></p><p class=\"MsoNormal\">Tell your customers what they don’t know. Let it be\r\ninteresting and worth their time.<o:p></o:p></p><p class=\"MsoNormal\"><!--[if gte vml 1]><v:shape\r\n id=\"_x0000_i1028\" type=\"#_x0000_t75\" style=\'width:234pt;height:155.25pt;\r\n visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/CNSCOM~1/AppData/Local/Temp/msohtmlclip1/01/clip_image002.jpg\"\r\n  o:title=\"\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"f\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><o:p></o:p></p><p class=\"MsoNormal\"><b><span style=\"color:#02A5E3\">&nbsp;</span></b><img style=\"width: 50%; float: right;\" src=\"../../files/images/blog/photo2.jpeg\" class=\"note-float-right\"></p><p class=\"MsoNormal\"><b><span style=\"color:#02A5E3\">DILYASTREND </span></b>is one\r\nof the best platforms where you can engage your customers. Some organizations\r\nuse short videos and other humor-laden tricks to engage their customer base but\r\nwe are making it easy by cutting the cust of expenses and getting high market\r\nvalue in return<!--[if gte vml 1]><v:shape id=\"_x0000_i1027\"\r\n type=\"#_x0000_t75\" style=\'width:194.25pt;height:145.5pt;visibility:visible;\r\n mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/CNSCOM~1/AppData/Local/Temp/msohtmlclip1/01/clip_image004.jpg\"\r\n  o:title=\"\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"f\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><o:p></o:p></p><p class=\"MsoNormal\"><b><span style=\"color:#BF0000\">2. Advertising Helps to Build\r\nand Maintain the your small business reputation.<o:p></o:p></span></b></p><p class=\"MsoNormal\">The growth and life span of your business is positively\r\ncorrelated to your business’s reputation. Hence, it’s fair to say your\r\nreputation determines your brand equity.<!--[if gte vml 1]><v:shape\r\n id=\"_x0000_i1026\" type=\"#_x0000_t75\" style=\'width:234pt;height:132pt;\r\n visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/CNSCOM~1/AppData/Local/Temp/msohtmlclip1/01/clip_image005.jpg\"\r\n  o:title=\"\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"f\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><span style=\"background:yellow;\r\nmso-highlight:yellow\"><o:p></o:p></span></p><p class=\"MsoNormal\">A majority of marketing activities are geared towards\r\nbuilding the brand equity of your craft.<o:p></o:p></p><p class=\"MsoNormal\">Your business’s reputation is built when it effectively\r\nmeets the expectations of its customers. Such a business is considered a\r\nresponsible member of the community. The customers become proud to be\r\nassociated with your products and services.</p><p class=\"MsoNormal\"><!--[if gte vml 1]><v:shape\r\n id=\"Image1\" o:spid=\"_x0000_i1025\" type=\"#_x0000_t75\" style=\'width:234pt;\r\n height:140.25pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/CNSCOM~1/AppData/Local/Temp/msohtmlclip1/01/clip_image007.jpg\"\r\n  o:title=\"\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"f\"/>\r\n</v:shape><![endif]--></p><p class=\"MsoNormal\"><!--[if gte vml 1]><v:shape\r\n id=\"Image1\" o:spid=\"_x0000_i1025\" type=\"#_x0000_t75\" style=\'width:234pt;\r\n height:140.25pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/CNSCOM~1/AppData/Local/Temp/msohtmlclip1/01/clip_image007.jpg\"\r\n  o:title=\"\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"f\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><o:p></o:p></p><p class=\"MsoNormal\"><img style=\"width: 275px;\" src=\"../../files/images/blog/photo1 (1).jpeg\"><br></p><p class=\"MsoNormal\">Marketers use effective communication, branding, PR and CSR\r\nstrategies to ensure that a business’s reputation is maintained.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', 'SMEs', 'fd27ce8a0da6d38a62d59b9088f36d3a', NULL, '6faa948f5d6487eaf09d1317d447ffe9.jpg', NULL, NULL, NULL, '2021-01-11 10:20:49', 1, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_com`
--

DROP TABLE IF EXISTS `blog_com`;
CREATE TABLE IF NOT EXISTS `blog_com` (
  `ComID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `BlogID` int(11) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL,
  `Message` varchar(1000) DEFAULT NULL,
  `AddedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `IPAddr` varchar(15) DEFAULT NULL,
  `Role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ComID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_com`
--

INSERT INTO `blog_com` (`ComID`, `UID`, `BlogID`, `AccessLevel`, `Message`, `AddedOn`, `CreatedBy`, `IPAddr`, `Role`) VALUES
(1, 1, 1, 1, 'She is really risky! This is seriuos!', '2019-11-21 13:47:39', 'Samson', '::1', NULL),
(2, 1, 2, 1, 'European champions..', '2019-11-21 14:55:33', 'Samson', '::1', NULL),
(3, 0, 2, 0, 'We are the greatest! YNWA!!', '2019-11-22 14:03:23', 'Anonymous', '::1', NULL),
(4, 0, 2, 0, 'We are the greatest! YNWA!!', '2019-11-22 14:04:45', 'Anonymous', '::1', NULL),
(5, 0, 2, 0, 'We are the greatest! YNWA!!', '2019-11-22 14:06:17', 'Anonymous', '::1', NULL),
(7, 6, 18, 3, 'This is a GIF!', '2019-11-22 21:49:21', 'Soma', '::1', NULL),
(8, 0, 18, 0, 'This is testing anonymous', '2019-11-23 11:34:42', 'Anonymous', '::1', NULL),
(9, 0, 18, 0, 'I though so!', '2019-11-23 12:29:07', 'Anonymous', '::1', NULL),
(10, 0, 18, 0, 'I though so!', '2019-11-23 12:29:42', 'Anonymous', '::1', NULL),
(11, 0, 18, 0, 'I though so!', '2019-11-23 12:30:35', 'Anonymous', '::1', NULL),
(12, 0, 18, 0, 'I though so!', '2019-11-23 12:31:58', 'Anonymous', '::1', NULL),
(13, 0, 16, 0, 'Really? Very interesting ', '2020-08-25 11:26:56', 'Anonymous', '::1', NULL),
(14, 0, 23, 0, 'oh yea', '2020-10-30 21:49:03', 'Anonymous', '::1', NULL),
(15, 0, 23, 0, 'lets go there', '2020-11-09 16:22:24', 'Anonymous', '::1', NULL),
(17, 9, 23, 3, 'This is what I\'m talking about', '2020-11-13 11:02:53', 'pasuma', '::1', NULL),
(18, 1, 24, 1, 'This is good', '2020-11-18 15:03:57', 'Samson', '::1', NULL),
(19, 0, 23, 0, 'This is great', '2023-11-16 21:52:58', 'Sam', '::1', NULL),
(20, 0, 21, 0, 'For God and for Youth!', '2023-11-16 21:57:17', 'Sam Tonero', '::1', NULL),
(21, 0, 2, 0, 'The guy don dey fuck up now', '2023-11-19 17:34:29', 'Sam Tonero', '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `Batch` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `UID`, `Batch`, `Qty`, `Price`, `Total`, `AddedOn`) VALUES
(19, 1, 1650498856, 1, 109999.99, 109999.99, '2022-10-08 15:47:39'),
(18, 3, 1656337460, 7, 8700, 60900, '2022-06-28 18:05:12'),
(20, 1, 1656252025, 1, 11200, 11200, '2022-10-16 23:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Category`) VALUES
(1, 'Education'),
(2, 'News'),
(3, 'Music'),
(4, 'Event'),
(5, 'Technology'),
(6, 'Entertainment'),
(7, 'Brainstorm'),
(8, 'Movies'),
(9, 'Information'),
(10, 'Important');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ISOName` char(2) NOT NULL,
  `Country` varchar(80) NOT NULL,
  `Nickname` varchar(80) NOT NULL,
  `ISO3` char(3) DEFAULT NULL,
  `NumberCode` smallint(6) DEFAULT NULL,
  `PhoneCode` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `ISOName`, `Country`, `Nickname`, `ISO3`, `NumberCode`, `PhoneCode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) DEFAULT NULL,
  `Album` int(11) DEFAULT NULL,
  `AddedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) DEFAULT NULL,
  `IPAddr` varchar(15) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `Photo`, `Album`, `AddedOn`, `CreatedBy`, `IPAddr`, `AccessLevel`) VALUES
(10, '72465194_2067326350034132_7509772474948338889_n.jpg', 12, '2020-09-22 16:08:59', 1, '::1', 1),
(11, '14624708_588157901383402_1386891226740948992_n.jpg', 12, '2020-09-23 08:05:53', 1, '::1', 1),
(13, 'CNScomputers-Logo3png.png', 13, '2020-10-29 08:04:40', 1, '::1', 1),
(14, 'Fashion fashion.jpg', 14, '2020-11-18 14:17:22', 1, '::1', 1),
(15, 'f02120431c7cd2f88b92b036f4c1dd17.jpg', 14, '2021-01-10 18:36:32', 1, '::1', 1),
(16, 'fe166209ee109f91ef7bcbe07b1ff4c0.jpg', 14, '2021-01-10 18:36:32', 1, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_log`
--

DROP TABLE IF EXISTS `general_log`;
CREATE TABLE IF NOT EXISTS `general_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Identifier` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `IPAddr` varchar(20) NOT NULL,
  `Visit` int(11) NOT NULL DEFAULT '0',
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_log`
--

INSERT INTO `general_log` (`ID`, `Identifier`, `UserID`, `FullName`, `IPAddr`, `Visit`, `DateCreated`) VALUES
(1, 2, 1, 'Samson Nwachukwu', '::1', 2483, '2020-08-24 10:06:09'),
(2, 1, 0, ' ', '::1', 2491, '2020-08-24 14:39:14'),
(3, 2, 6, 'Soma Agaricha', '::1', 52, '2020-08-25 17:04:04'),
(4, 2, 4, 'kelechi ', '::1', 6, '2020-08-25 20:28:33'),
(5, 2, 8, 'Thunder ', '::1', 5, '2020-08-30 21:52:31'),
(6, 2, 2, 'Fortune Aladum', '::1', 127, '2020-09-17 00:24:45'),
(7, 2, 3, 'Dilyas Trend', '::1', 34, '2020-09-17 00:26:02'),
(8, 2, 9, 'pasuma Jigawa', '::1', 349, '2020-11-11 11:17:21'),
(9, 1, 0, ' ', '127.0.0.1', 52, '2021-02-20 17:15:45'),
(10, 2, 1, 'Samson Nwachukwu', '127.0.0.1', 35, '2021-02-20 17:18:30'),
(11, 2, 11, ' ', '::1', 2, '2021-04-05 10:41:54'),
(12, 2, 13, ' ', '::1', 20, '2021-04-22 10:50:38'),
(13, 2, 11, ' ', '127.0.0.1', 16, '2021-04-24 22:23:05'),
(14, 2, 6, 'Soma Agaricha', '127.0.0.1', 5, '2021-05-05 22:16:39'),
(15, 2, 9, 'pasuma Jigawa', '127.0.0.1', 18, '2021-05-05 22:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SiteName` varchar(255) NOT NULL,
  `HomepageTitle` varchar(255) NOT NULL,
  `HomepageURL` varchar(255) NOT NULL,
  `Favicon` varchar(255) NOT NULL,
  `Logo` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Keywords` text NOT NULL,
  `OfficialEmail` varchar(255) NOT NULL,
  `OfficialWebsite` varchar(255) NOT NULL,
  `DashboardBackground` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`ID`, `SiteName`, `HomepageTitle`, `HomepageURL`, `Favicon`, `Logo`, `Description`, `Keywords`, `OfficialEmail`, `OfficialWebsite`, `DashboardBackground`) VALUES
(1, 'DilyasTrend', 'Your Dream', '', 'images/icons/BASUFWF-logo1.png', 'images/icons/BASUFWF-logo2.png', 'Platfrom for Artisans, professionals etc.', 'girls, women, poverty alleviation, youth empowerment, nigeria, food, shelter, profession, fashion', 'info@onesound.com.ng', 'www.dilyastrend.com', 'Black and Pink');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
CREATE TABLE IF NOT EXISTS `guest` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ticket` varchar(42) DEFAULT NULL,
  `IPAddr` varchar(15) DEFAULT NULL,
  `Fname` varchar(40) DEFAULT NULL,
  `Lname` varchar(40) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Message` varchar(500) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `IsRead` int(11) NOT NULL DEFAULT '0',
  `Addr` varchar(300) DEFAULT NULL,
  `AddedOn` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`ID`, `Ticket`, `IPAddr`, `Fname`, `Lname`, `Email`, `Message`, `Phone`, `IsRead`, `Addr`, `AddedOn`) VALUES
(2, 'f32a97390abb58dc789ecfb99ef664d4', '::1', 'CNS', 'Chisom', 'cns.aircraft@gmail.com', 'This is just a test.....', '07033229178', 0, NULL, '2019-10-12 03:01:43'),
(4, '411da68f378eda6ae9e1d4d6a3e4ec87', '::1', 'Samson', NULL, 'Now@dil.com', 'This is a test', '0930923409', 0, NULL, '2020-10-30 22:29:17'),
(5, 'd41d8cd98f00b204e9800998ecf8427e', '::1', 'Copper', NULL, 'copper@gmail.com', 'Test nowwwwwwwwwwwwww', '09088234233', 0, NULL, '2020-10-30 22:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Sample` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL,
  `Experience` int(11) NOT NULL,
  `Pay` int(11) NOT NULL,
  `Apply` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`ID`, `UID`, `Title`, `Description`, `Sample`, `Duration`, `Type`, `Experience`, `Pay`, `Apply`, `AddedOn`) VALUES
(2, 1, 'Facebook App', '<p>Build a responsive facebook app</p>', '394dda895ffd8bc427449206690d6cc7.jpeg', '10/01/2020 12:00 AM - 12/01/2020 11:00 PM', 3, 3, 150000, '', '0000-00-00 00:00:00'),
(4, 1, 'Web Developer', '<p>Build a Full Ecommerce website</p><p class=\"q-text qu-display--block\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; color: rgb(40, 40, 41); font-family: -apple-system, sytem-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; direction: ltr; overflow-wrap: anywhere;\"><span style=\"background: none;\">I prefer 08:34 because it removes any potential doubt about what writer meant.</span></p><p class=\"q-text qu-display--block\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; color: rgb(40, 40, 41); font-family: -apple-system, sytem-ui, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; direction: ltr; overflow-wrap: anywhere;\"><span style=\"background: none;\">8:34 might mean either 08:34 or 20:34 and requires the reader to remember they are reading in th', 'd6d19e9df1a8772d869afd7dbd6c7313.png', '10/18/2020 12:00 AM - 10/31/2020 11:00 PM', 2, 5, 50000, '', '2020-10-06 13:28:21'),
(5, 2, 'Front End Developer', '<p>Just come and we\'ll talk<br></p>', '', '10/22/2020 12:00 AM - 10/29/2020 11:00 PM', 4, 2, 30000, '', '2020-10-06 15:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_attach`
--

DROP TABLE IF EXISTS `job_attach`;
CREATE TABLE IF NOT EXISTS `job_attach` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `FID` int(11) NOT NULL,
  `Apply` int(11) NOT NULL DEFAULT '1',
  `AttachID` int(11) NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_attach`
--

INSERT INTO `job_attach` (`ID`, `JID`, `PID`, `FID`, `Apply`, `AttachID`, `AddedOn`) VALUES
(1, 4, 1, 2, 2, 39068, '2020-10-06 17:01:03'),
(6, 5, 2, 9, 1, 63949, '2020-11-13 11:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

DROP TABLE IF EXISTS `job_type`;
CREATE TABLE IF NOT EXISTS `job_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`ID`, `Type`) VALUES
(1, 'Permanent'),
(2, 'Temporary'),
(3, 'One Off'),
(4, 'Contract'),
(5, 'Complicated'),
(6, 'Not sure');

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

DROP TABLE IF EXISTS `local_govt`;
CREATE TABLE IF NOT EXISTS `local_govt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StateID` int(11) NOT NULL,
  `LocalGov` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `state_id` (`StateID`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf32 COMMENT='Local governments in Nigeria.';

--
-- Dumping data for table `local_govt`
--

INSERT INTO `local_govt` (`ID`, `StateID`, `LocalGov`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala Ngwa North'),
(7, 1, 'Isiala Ngwa South'),
(8, 1, 'Isuikwuato'),
(9, 1, 'Obi Ngwa'),
(10, 1, 'Ohafia'),
(11, 1, 'Osisioma'),
(12, 1, 'Ugwunagbo'),
(13, 1, 'Ukwa East'),
(14, 1, 'Ukwa West'),
(15, 1, 'Umuahia North'),
(16, 1, 'Umuahia South'),
(17, 1, 'Umu Nneochi'),
(18, 2, 'Demsa'),
(19, 2, 'Fufure'),
(20, 2, 'Ganye'),
(21, 2, 'Gayuk'),
(22, 2, 'Gombi'),
(23, 2, 'Grie'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Larmurde'),
(27, 2, 'Madagali'),
(28, 2, 'Maiha'),
(29, 2, 'Mayo Belwa'),
(30, 2, 'Michika'),
(31, 2, 'Mubi North'),
(32, 2, 'Mubi South'),
(33, 2, 'Numan'),
(34, 2, 'Shelleng'),
(35, 2, 'Song'),
(36, 2, 'Toungo'),
(37, 2, 'Yola North'),
(38, 2, 'Yola South'),
(39, 3, 'Abak'),
(40, 3, 'Eastern Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Esit Eket'),
(43, 3, 'Essien Udim'),
(44, 3, 'Etim Ekpo'),
(45, 3, 'Etinan'),
(46, 3, 'Ibeno'),
(47, 3, 'Ibesikpo Asutan'),
(48, 3, 'Ibiono-Ibom'),
(49, 3, 'Ika'),
(50, 3, 'Ikono'),
(51, 3, 'Ikot Abasi'),
(52, 3, 'Ikot Ekpene'),
(53, 3, 'Ini'),
(54, 3, 'Itu'),
(55, 3, 'Mbo'),
(56, 3, 'Mkpat-Enin'),
(57, 3, 'Nsit-Atai'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oruk Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanafun'),
(67, 3, 'Uruan'),
(68, 3, 'Urue-Offong/Oruko'),
(69, 3, 'Uyo'),
(70, 4, 'Aguata'),
(71, 4, 'Anambra East'),
(72, 4, 'Anambra West'),
(73, 4, 'Anaocha'),
(74, 4, 'Awka North'),
(75, 4, 'Awka South'),
(76, 4, 'Ayamelum'),
(77, 4, 'Dunukofia'),
(78, 4, 'Ekwusigo'),
(79, 4, 'Idemili North'),
(80, 4, 'Idemili South'),
(81, 4, 'Ihiala'),
(82, 4, 'Njikoka'),
(83, 4, 'Nnewi North'),
(84, 4, 'Nnewi South'),
(85, 4, 'Ogbaru'),
(86, 4, 'Onitsha North'),
(87, 4, 'Onitsha South'),
(88, 4, 'Orumba North'),
(89, 4, 'Orumba South'),
(90, 4, 'Oyi'),
(91, 5, 'Alkaleri'),
(92, 5, 'Bauchi'),
(93, 5, 'Bogoro'),
(94, 5, 'Damban'),
(95, 5, 'Darazo'),
(96, 5, 'Dass'),
(97, 5, 'Gamawa'),
(98, 5, 'Ganjuwa'),
(99, 5, 'Giade'),
(100, 5, 'Itas/Gadau'),
(101, 5, 'Jama\'are'),
(102, 5, 'Katagum'),
(103, 5, 'Kirfi'),
(104, 5, 'Misau'),
(105, 5, 'Ningi'),
(106, 5, 'Shira'),
(107, 5, 'Tafawa Balewa'),
(108, 5, 'Toro'),
(109, 5, 'Warji'),
(110, 5, 'Zaki'),
(111, 6, 'Brass'),
(112, 6, 'Ekeremor'),
(113, 6, 'Kolokuma/Opokuma'),
(114, 6, 'Nembe'),
(115, 6, 'Ogbia'),
(116, 6, 'Sagbama'),
(117, 6, 'Southern Ijaw'),
(118, 6, 'Yenagoa'),
(119, 7, 'Agatu'),
(120, 7, 'Apa'),
(121, 7, 'Ado'),
(122, 7, 'Buruku'),
(123, 7, 'Gboko'),
(124, 7, 'Guma'),
(125, 7, 'Gwer East'),
(126, 7, 'Gwer West'),
(127, 7, 'Katsina-Ala'),
(128, 7, 'Konshisha'),
(129, 7, 'Kwande'),
(130, 7, 'Logo'),
(131, 7, 'Makurdi'),
(132, 7, 'Obi'),
(133, 7, 'Ogbadibo'),
(134, 7, 'Ohimini'),
(135, 7, 'Oju'),
(136, 7, 'Okpokwu'),
(137, 7, 'Oturkpo'),
(138, 7, 'Tarka'),
(139, 7, 'Ukum'),
(140, 7, 'Ushongo'),
(141, 7, 'Vandeikya'),
(142, 8, 'Abadam'),
(143, 8, 'Askira/Uba'),
(144, 8, 'Bama'),
(145, 8, 'Bayo'),
(146, 8, 'Biu'),
(147, 8, 'Chibok'),
(148, 8, 'Damboa'),
(149, 8, 'Dikwa'),
(150, 8, 'Gubio'),
(151, 8, 'Guzamala'),
(152, 8, 'Gwoza'),
(153, 8, 'Hawul'),
(154, 8, 'Jere'),
(155, 8, 'Kaga'),
(156, 8, 'Kala/Balge'),
(157, 8, 'Konduga'),
(158, 8, 'Kukawa'),
(159, 8, 'Kwaya Kusar'),
(160, 8, 'Mafa'),
(161, 8, 'Magumeri'),
(162, 8, 'Maiduguri'),
(163, 8, 'Marte'),
(164, 8, 'Mobbar'),
(165, 8, 'Monguno'),
(166, 8, 'Ngala'),
(167, 8, 'Nganzai'),
(168, 8, 'Shani'),
(169, 9, 'Abi'),
(170, 9, 'Akamkpa'),
(171, 9, 'Akpabuyo'),
(172, 9, 'Bakassi'),
(173, 9, 'Bekwarra'),
(174, 9, 'Biase'),
(175, 9, 'Boki'),
(176, 9, 'Calabar Municipal'),
(177, 9, 'Calabar South'),
(178, 9, 'Etung'),
(179, 9, 'Ikom'),
(180, 9, 'Obanliku'),
(181, 9, 'Obubra'),
(182, 9, 'Obudu'),
(183, 9, 'Odukpani'),
(184, 9, 'Ogoja'),
(185, 9, 'Yakuur'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele, Delta'),
(204, 10, 'Udu'),
(205, 10, 'Ughelli North'),
(206, 10, 'Ughelli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri North'),
(210, 10, 'Warri South'),
(211, 10, 'Warri South West'),
(212, 11, 'Abakaliki'),
(213, 11, 'Afikpo North'),
(214, 11, 'Afikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'Ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaozara'),
(223, 11, 'Ohaukwu'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko-Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North-East'),
(229, 12, 'Esan South-East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako Central'),
(232, 12, 'Etsako East'),
(233, 12, 'Etsako West'),
(234, 12, 'Igueben'),
(235, 12, 'Ikpoba Okha'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Oredo'),
(238, 12, 'Ovia North-East'),
(239, 12, 'Ovia South-West'),
(240, 12, 'Owan East'),
(241, 12, 'Owan West'),
(242, 12, 'Uhunmwonde'),
(243, 13, 'Ado Ekiti'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti East'),
(246, 13, 'Ekiti South-West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Gbonyin'),
(250, 13, 'Ido Osi'),
(251, 13, 'Ijero'),
(252, 13, 'Ikere'),
(253, 13, 'Ikole'),
(254, 13, 'Ilejemeje'),
(255, 13, 'Irepodun/Ifelodun'),
(256, 13, 'Ise/Orun'),
(257, 13, 'Moba'),
(258, 13, 'Oye'),
(259, 14, 'Aninri'),
(260, 14, 'Awgu'),
(261, 14, 'Enugu East'),
(262, 14, 'Enugu North'),
(263, 14, 'Enugu South'),
(264, 14, 'Ezeagu'),
(265, 14, 'Igbo Etiti'),
(266, 14, 'Igbo Eze North'),
(267, 14, 'Igbo Eze South'),
(268, 14, 'Isi Uzo'),
(269, 14, 'Nkanu East'),
(270, 14, 'Nkanu West'),
(271, 14, 'Nsukka'),
(272, 14, 'Oji River'),
(273, 14, 'Udenu'),
(274, 14, 'Udi'),
(275, 14, 'Uzo Uwani'),
(276, 15, 'Abaji'),
(277, 15, 'Bwari'),
(278, 15, 'Gwagwalada'),
(279, 15, 'Kuje'),
(280, 15, 'Kwali'),
(281, 15, 'Municipal Area Council'),
(282, 16, 'Akko'),
(283, 16, 'Balanga'),
(284, 16, 'Billiri'),
(285, 16, 'Dukku'),
(286, 16, 'Funakaye'),
(287, 16, 'Gombe'),
(288, 16, 'Kaltungo'),
(289, 16, 'Kwami'),
(290, 16, 'Nafada'),
(291, 16, 'Shongom'),
(292, 16, 'Yamaltu/Deba'),
(293, 17, 'Aboh Mbaise'),
(294, 17, 'Ahiazu Mbaise'),
(295, 17, 'Ehime Mbano'),
(296, 17, 'Ezinihitte'),
(297, 17, 'Ideato North'),
(298, 17, 'Ideato South'),
(299, 17, 'Ihitte/Uboma'),
(300, 17, 'Ikeduru'),
(301, 17, 'Isiala Mbano'),
(302, 17, 'Isu'),
(303, 17, 'Mbaitoli'),
(304, 17, 'Ngor Okpala'),
(305, 17, 'Njaba'),
(306, 17, 'Nkwerre'),
(307, 17, 'Nwangele'),
(308, 17, 'Obowo'),
(309, 17, 'Oguta'),
(310, 17, 'Ohaji/Egbema'),
(311, 17, 'Okigwe'),
(312, 17, 'Orlu'),
(313, 17, 'Orsu'),
(314, 17, 'Oru East'),
(315, 17, 'Oru West'),
(316, 17, 'Owerri Municipal'),
(317, 17, 'Owerri North'),
(318, 17, 'Owerri West'),
(319, 17, 'Unuimo'),
(320, 18, 'Auyo'),
(321, 18, 'Babura'),
(322, 18, 'Biriniwa'),
(323, 18, 'Birnin Kudu'),
(324, 18, 'Buji'),
(325, 18, 'Dutse'),
(326, 18, 'Gagarawa'),
(327, 18, 'Garki'),
(328, 18, 'Gumel'),
(329, 18, 'Guri'),
(330, 18, 'Gwaram'),
(331, 18, 'Gwiwa'),
(332, 18, 'Hadejia'),
(333, 18, 'Jahun'),
(334, 18, 'Kafin Hausa'),
(335, 18, 'Kazaure'),
(336, 18, 'Kiri Kasama'),
(337, 18, 'Kiyawa'),
(338, 18, 'Kaugama'),
(339, 18, 'Maigatari'),
(340, 18, 'Malam Madori'),
(341, 18, 'Miga'),
(342, 18, 'Ringim'),
(343, 18, 'Roni'),
(344, 18, 'Sule Tankarkar'),
(345, 18, 'Taura'),
(346, 18, 'Yankwashi'),
(347, 19, 'Birnin Gwari'),
(348, 19, 'Chikun'),
(349, 19, 'Giwa'),
(350, 19, 'Igabi'),
(351, 19, 'Ikara'),
(352, 19, 'Jaba'),
(353, 19, 'Jema\'a'),
(354, 19, 'Kachia'),
(355, 19, 'Kaduna North'),
(356, 19, 'Kaduna South'),
(357, 19, 'Kagarko'),
(358, 19, 'Kajuru'),
(359, 19, 'Kaura'),
(360, 19, 'Kauru'),
(361, 19, 'Kubau'),
(362, 19, 'Kudan'),
(363, 19, 'Lere'),
(364, 19, 'Makarfi'),
(365, 19, 'Sabon Gari'),
(366, 19, 'Sanga'),
(367, 19, 'Soba'),
(368, 19, 'Zangon Kataf'),
(369, 19, 'Zaria'),
(370, 20, 'Ajingi'),
(371, 20, 'Albasu'),
(372, 20, 'Bagwai'),
(373, 20, 'Bebeji'),
(374, 20, 'Bichi'),
(375, 20, 'Bunkure'),
(376, 20, 'Dala'),
(377, 20, 'Dambatta'),
(378, 20, 'Dawakin Kudu'),
(379, 20, 'Dawakin Tofa'),
(380, 20, 'Doguwa'),
(381, 20, 'Fagge'),
(382, 20, 'Gabasawa'),
(383, 20, 'Garko'),
(384, 20, 'Garun Mallam'),
(385, 20, 'Gaya'),
(386, 20, 'Gezawa'),
(387, 20, 'Gwale'),
(388, 20, 'Gwarzo'),
(389, 20, 'Kabo'),
(390, 20, 'Kano Municipal'),
(391, 20, 'Karaye'),
(392, 20, 'Kibiya'),
(393, 20, 'Kiru'),
(394, 20, 'Kumbotso'),
(395, 20, 'Kunchi'),
(396, 20, 'Kura'),
(397, 20, 'Madobi'),
(398, 20, 'Makoda'),
(399, 20, 'Minjibir'),
(400, 20, 'Nasarawa'),
(401, 20, 'Rano'),
(402, 20, 'Rimin Gado'),
(403, 20, 'Rogo'),
(404, 20, 'Shanono'),
(405, 20, 'Sumaila'),
(406, 20, 'Takai'),
(407, 20, 'Tarauni'),
(408, 20, 'Tofa'),
(409, 20, 'Tsanyawa'),
(410, 20, 'Tudun Wada'),
(411, 20, 'Ungogo'),
(412, 20, 'Warawa'),
(413, 20, 'Wudil'),
(414, 21, 'Bakori'),
(415, 21, 'Batagarawa'),
(416, 21, 'Batsari'),
(417, 21, 'Baure'),
(418, 21, 'Bindawa'),
(419, 21, 'Charanchi'),
(420, 21, 'Dandume'),
(421, 21, 'Danja'),
(422, 21, 'Dan Musa'),
(423, 21, 'Daura'),
(424, 21, 'Dutsi'),
(425, 21, 'Dutsin Ma'),
(426, 21, 'Faskari'),
(427, 21, 'Funtua'),
(428, 21, 'Ingawa'),
(429, 21, 'Jibia'),
(430, 21, 'Kafur'),
(431, 21, 'Kaita'),
(432, 21, 'Kankara'),
(433, 21, 'Kankia'),
(434, 21, 'Katsina'),
(435, 21, 'Kurfi'),
(436, 21, 'Kusada'),
(437, 21, 'Mai\'Adua'),
(438, 21, 'Malumfashi'),
(439, 21, 'Mani'),
(440, 21, 'Mashi'),
(441, 21, 'Matazu'),
(442, 21, 'Musawa'),
(443, 21, 'Rimi'),
(444, 21, 'Sabuwa'),
(445, 21, 'Safana'),
(446, 21, 'Sandamu'),
(447, 21, 'Zango'),
(448, 22, 'Aleiro'),
(449, 22, 'Arewa Dandi'),
(450, 22, 'Argungu'),
(451, 22, 'Augie'),
(452, 22, 'Bagudo'),
(453, 22, 'Birnin Kebbi'),
(454, 22, 'Bunza'),
(455, 22, 'Dandi'),
(456, 22, 'Fakai'),
(457, 22, 'Gwandu'),
(458, 22, 'Jega'),
(459, 22, 'Kalgo'),
(460, 22, 'Koko/Besse'),
(461, 22, 'Maiyama'),
(462, 22, 'Ngaski'),
(463, 22, 'Sakaba'),
(464, 22, 'Shanga'),
(465, 22, 'Suru'),
(466, 22, 'Wasagu/Danko'),
(467, 22, 'Yauri'),
(468, 22, 'Zuru'),
(469, 23, 'Adavi'),
(470, 23, 'Ajaokuta'),
(471, 23, 'Ankpa'),
(472, 23, 'Bassa'),
(473, 23, 'Dekina'),
(474, 23, 'Ibaji'),
(475, 23, 'Idah'),
(476, 23, 'Igalamela Odolu'),
(477, 23, 'Ijumu'),
(478, 23, 'Kabba/Bunu'),
(479, 23, 'Kogi'),
(480, 23, 'Lokoja'),
(481, 23, 'Mopa Muro'),
(482, 23, 'Ofu'),
(483, 23, 'Ogori/Magongo'),
(484, 23, 'Okehi'),
(485, 23, 'Okene'),
(486, 23, 'Olamaboro'),
(487, 23, 'Omala'),
(488, 23, 'Yagba East'),
(489, 23, 'Yagba West'),
(490, 24, 'Asa'),
(491, 24, 'Baruten'),
(492, 24, 'Edu'),
(493, 24, 'Ekiti, Kwara State'),
(494, 24, 'Ifelodun'),
(495, 24, 'Ilorin East'),
(496, 24, 'Ilorin South'),
(497, 24, 'Ilorin West'),
(498, 24, 'Irepodun'),
(499, 24, 'Isin'),
(500, 24, 'Kaiama'),
(501, 24, 'Moro'),
(502, 24, 'Offa'),
(503, 24, 'Oke Ero'),
(504, 24, 'Oyun'),
(505, 24, 'Pategi'),
(506, 25, 'Agege'),
(507, 25, 'Ajeromi-Ifelodun'),
(508, 25, 'Alimosho'),
(509, 25, 'Amuwo-Odofin'),
(510, 25, 'Apapa'),
(511, 25, 'Badagry'),
(512, 25, 'Epe'),
(513, 25, 'Eti Osa'),
(514, 25, 'Ibeju-Lekki'),
(515, 25, 'Ifako-Ijaiye'),
(516, 25, 'Ikeja'),
(517, 25, 'Ikorodu'),
(518, 25, 'Kosofe'),
(519, 25, 'Lagos Island'),
(520, 25, 'Lagos Mainland'),
(521, 25, 'Mushin'),
(522, 25, 'Ojo'),
(523, 25, 'Oshodi-Isolo'),
(524, 25, 'Shomolu'),
(525, 25, 'Surulere, Lagos State'),
(526, 26, 'Akwanga'),
(527, 26, 'Awe'),
(528, 26, 'Doma'),
(529, 26, 'Karu'),
(530, 26, 'Keana'),
(531, 26, 'Keffi'),
(532, 26, 'Kokona'),
(533, 26, 'Lafia'),
(534, 26, 'Nasarawa'),
(535, 26, 'Nasarawa Egon'),
(536, 26, 'Obi'),
(537, 26, 'Toto'),
(538, 26, 'Wamba'),
(539, 27, 'Agaie'),
(540, 27, 'Agwara'),
(541, 27, 'Bida'),
(542, 27, 'Borgu'),
(543, 27, 'Bosso'),
(544, 27, 'Chanchaga'),
(545, 27, 'Edati'),
(546, 27, 'Gbako'),
(547, 27, 'Gurara'),
(548, 27, 'Katcha'),
(549, 27, 'Kontagora'),
(550, 27, 'Lapai'),
(551, 27, 'Lavun'),
(552, 27, 'Magama'),
(553, 27, 'Mariga'),
(554, 27, 'Mashegu'),
(555, 27, 'Mokwa'),
(556, 27, 'Moya'),
(557, 27, 'Paikoro'),
(558, 27, 'Rafi'),
(559, 27, 'Rijau'),
(560, 27, 'Shiroro'),
(561, 27, 'Suleja'),
(562, 27, 'Tafa'),
(563, 27, 'Wushishi'),
(564, 28, 'Abeokuta North'),
(565, 28, 'Abeokuta South'),
(566, 28, 'Ado-Odo/Ota'),
(567, 28, 'Egbado North'),
(568, 28, 'Egbado South'),
(569, 28, 'Ewekoro'),
(570, 28, 'Ifo'),
(571, 28, 'Ijebu East'),
(572, 28, 'Ijebu North'),
(573, 28, 'Ijebu North East'),
(574, 28, 'Ijebu Ode'),
(575, 28, 'Ikenne'),
(576, 28, 'Imeko Afon'),
(577, 28, 'Ipokia'),
(578, 28, 'Obafemi Owode'),
(579, 28, 'Odeda'),
(580, 28, 'Odogbolu'),
(581, 28, 'Ogun Waterside'),
(582, 28, 'Remo North'),
(583, 28, 'Shagamu'),
(584, 29, 'Akoko North-East'),
(585, 29, 'Akoko North-West'),
(586, 29, 'Akoko South-West'),
(587, 29, 'Akoko South-East'),
(588, 29, 'Akure North'),
(589, 29, 'Akure South'),
(590, 29, 'Ese Odo'),
(591, 29, 'Idanre'),
(592, 29, 'Ifedore'),
(593, 29, 'Ilaje'),
(594, 29, 'Ile Oluji/Okeigbo'),
(595, 29, 'Irele'),
(596, 29, 'Odigbo'),
(597, 29, 'Okitipupa'),
(598, 29, 'Ondo East'),
(599, 29, 'Ondo West'),
(600, 29, 'Ose'),
(601, 29, 'Owo'),
(602, 30, 'Atakunmosa East'),
(603, 30, 'Atakunmosa West'),
(604, 30, 'Aiyedaade'),
(605, 30, 'Aiyedire'),
(606, 30, 'Boluwaduro'),
(607, 30, 'Boripe'),
(608, 30, 'Ede North'),
(609, 30, 'Ede South'),
(610, 30, 'Ife Central'),
(611, 30, 'Ife East'),
(612, 30, 'Ife North'),
(613, 30, 'Ife South'),
(614, 30, 'Egbedore'),
(615, 30, 'Ejigbo'),
(616, 30, 'Ifedayo'),
(617, 30, 'Ifelodun'),
(618, 30, 'Ila'),
(619, 30, 'Ilesa East'),
(620, 30, 'Ilesa West'),
(621, 30, 'Irepodun'),
(622, 30, 'Irewole'),
(623, 30, 'Isokan'),
(624, 30, 'Iwo'),
(625, 30, 'Obokun'),
(626, 30, 'Odo Otin'),
(627, 30, 'Ola Oluwa'),
(628, 30, 'Olorunda'),
(629, 30, 'Oriade'),
(630, 30, 'Orolu'),
(631, 30, 'Osogbo'),
(632, 31, 'Afijio'),
(633, 31, 'Akinyele'),
(634, 31, 'Atiba'),
(635, 31, 'Atisbo'),
(636, 31, 'Egbeda'),
(637, 31, 'Ibadan North'),
(638, 31, 'Ibadan North-East'),
(639, 31, 'Ibadan North-West'),
(640, 31, 'Ibadan South-East'),
(641, 31, 'Ibadan South-West'),
(642, 31, 'Ibarapa Central'),
(643, 31, 'Ibarapa East'),
(644, 31, 'Ibarapa North'),
(645, 31, 'Ido'),
(646, 31, 'Irepo'),
(647, 31, 'Iseyin'),
(648, 31, 'Itesiwaju'),
(649, 31, 'Iwajowa'),
(650, 31, 'Kajola'),
(651, 31, 'Lagelu'),
(652, 31, 'Ogbomosho North'),
(653, 31, 'Ogbomosho South'),
(654, 31, 'Ogo Oluwa'),
(655, 31, 'Olorunsogo'),
(656, 31, 'Oluyole'),
(657, 31, 'Ona Ara'),
(658, 31, 'Orelope'),
(659, 31, 'Ori Ire'),
(660, 31, 'Oyo'),
(661, 31, 'Oyo East'),
(662, 31, 'Saki East'),
(663, 31, 'Saki West'),
(664, 31, 'Surulere, Oyo State'),
(665, 32, 'Bokkos'),
(666, 32, 'Barkin Ladi'),
(667, 32, 'Bassa'),
(668, 32, 'Jos East'),
(669, 32, 'Jos North'),
(670, 32, 'Jos South'),
(671, 32, 'Kanam'),
(672, 32, 'Kanke'),
(673, 32, 'Langtang South'),
(674, 32, 'Langtang North'),
(675, 32, 'Mangu'),
(676, 32, 'Mikang'),
(677, 32, 'Pankshin'),
(678, 32, 'Qua\'an Pan'),
(679, 32, 'Riyom'),
(680, 32, 'Shendam'),
(681, 32, 'Wase'),
(682, 33, 'Abua/Odual'),
(683, 33, 'Ahoada East'),
(684, 33, 'Ahoada West'),
(685, 33, 'Akuku-Toru'),
(686, 33, 'Andoni'),
(687, 33, 'Asari-Toru'),
(688, 33, 'Bonny'),
(689, 33, 'Degema'),
(690, 33, 'Eleme'),
(691, 33, 'Emuoha'),
(692, 33, 'Etche'),
(693, 33, 'Gokana'),
(694, 33, 'Ikwerre'),
(695, 33, 'Khana'),
(696, 33, 'Obio/Akpor'),
(697, 33, 'Ogba/Egbema/Ndoni'),
(698, 33, 'Ogu/Bolo'),
(699, 33, 'Okrika'),
(700, 33, 'Omuma'),
(701, 33, 'Opobo/Nkoro'),
(702, 33, 'Oyigbo'),
(703, 33, 'Port Harcourt'),
(704, 33, 'Tai'),
(705, 34, 'Binji'),
(706, 34, 'Bodinga'),
(707, 34, 'Dange Shuni'),
(708, 34, 'Gada'),
(709, 34, 'Goronyo'),
(710, 34, 'Gudu'),
(711, 34, 'Gwadabawa'),
(712, 34, 'Illela'),
(713, 34, 'Isa'),
(714, 34, 'Kebbe'),
(715, 34, 'Kware'),
(716, 34, 'Rabah'),
(717, 34, 'Sabon Birni'),
(718, 34, 'Shagari'),
(719, 34, 'Silame'),
(720, 34, 'Sokoto North'),
(721, 34, 'Sokoto South'),
(722, 34, 'Tambuwal'),
(723, 34, 'Tangaza'),
(724, 34, 'Tureta'),
(725, 34, 'Wamako'),
(726, 34, 'Wurno'),
(727, 34, 'Yabo'),
(728, 35, 'Ardo Kola'),
(729, 35, 'Bali'),
(730, 35, 'Donga'),
(731, 35, 'Gashaka'),
(732, 35, 'Gassol'),
(733, 35, 'Ibi'),
(734, 35, 'Jalingo'),
(735, 35, 'Karim Lamido'),
(736, 35, 'Kumi'),
(737, 35, 'Lau'),
(738, 35, 'Sardauna'),
(739, 35, 'Takum'),
(740, 35, 'Ussa'),
(741, 35, 'Wukari'),
(742, 35, 'Yorro'),
(743, 35, 'Zing'),
(744, 36, 'Bade'),
(745, 36, 'Bursari'),
(746, 36, 'Damaturu'),
(747, 36, 'Fika'),
(748, 36, 'Fune'),
(749, 36, 'Geidam'),
(750, 36, 'Gujba'),
(751, 36, 'Gulani'),
(752, 36, 'Jakusko'),
(753, 36, 'Karasuwa'),
(754, 36, 'Machina'),
(755, 36, 'Nangere'),
(756, 36, 'Nguru'),
(757, 36, 'Potiskum'),
(758, 36, 'Tarmuwa'),
(759, 36, 'Yunusari'),
(760, 36, 'Yusufari'),
(761, 37, 'Anka'),
(762, 37, 'Bakura'),
(763, 37, 'Birnin Magaji/Kiyaw'),
(764, 37, 'Bukkuyum'),
(765, 37, 'Bungudu'),
(766, 37, 'Gummi'),
(767, 37, 'Gusau'),
(768, 37, 'Kaura Namoda'),
(769, 37, 'Maradun'),
(770, 37, 'Maru'),
(771, 37, 'Shinkafi'),
(772, 37, 'Talata Mafara'),
(773, 37, 'Chafe'),
(774, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `Fname` varchar(55) DEFAULT NULL,
  `Sname` varchar(25) DEFAULT NULL,
  `Uname` varchar(25) DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL DEFAULT '3',
  `ActiveStatus` int(11) NOT NULL DEFAULT '2',
  `Pword` varchar(255) DEFAULT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Gender` varchar(11) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `IPAddr` varchar(25) DEFAULT NULL,
  `Addr` varchar(55) DEFAULT NULL,
  `Country` varchar(55) DEFAULT NULL,
  `AddedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `UID`, `Fname`, `Sname`, `Uname`, `AccessLevel`, `ActiveStatus`, `Pword`, `Email`, `Phone`, `Gender`, `Photo`, `IPAddr`, `Addr`, `Country`, `AddedOn`) VALUES
(1, 6, 'Soma', 'Agaricha', 'soma', 3, 2, 'a980f71acfa7628ce7a55afb175e864d', 'soma@gmail.com', '09044773827', 'Male', 'f7a2d066e024891eeffd696cca6376ec.jpg', '::1', 'plateu jos emoji estate', NULL, '2019-10-09 18:02:16'),
(2, 7, 'party', NULL, 'party', 3, 2, '0145c35363fbb80115217af5cc9d8812', 'party@gmail.com', NULL, NULL, NULL, '::1', NULL, NULL, '2019-11-11 22:07:44'),
(4, 9, 'pasuma', 'Jigawa', 'pasuma', 3, 2, 'a333a05d05b05bb8ac090f83c62a1028', 'pasuma@gmail.com', '090887766543', 'Female', '36dc84c1db916e0e27f814e505cbf60f.jpg', '::1', '12, Production street', NULL, '2020-11-11 10:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `message_picture`
--

DROP TABLE IF EXISTS `message_picture`;
CREATE TABLE IF NOT EXISTS `message_picture` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` varchar(255) DEFAULT NULL,
  `Album` int(11) DEFAULT NULL,
  `AddedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) DEFAULT NULL,
  `IPAddr` varchar(15) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_picture`
--

INSERT INTO `message_picture` (`ID`, `Photo`, `Album`, `AddedOn`, `CreatedBy`, `IPAddr`, `AccessLevel`) VALUES
(3, 'photo1 (1).jpeg', 1, '2021-01-11 10:13:39', 1, '::1', 1),
(4, 'photo1.jpeg', 1, '2021-01-11 10:13:39', 1, '::1', 1),
(5, 'photo2.jpeg', 1, '2021-01-11 10:13:39', 1, '::1', 1),
(6, 'photo3.jpeg', 1, '2021-01-11 10:13:39', 1, '::1', 1),
(7, 'photo4.jpeg', 1, '2021-01-11 10:13:39', 1, '::1', 1),
(14, 'mae.png', 1, '2021-02-09 12:02:59', 1, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(11) NOT NULL,
  `UID` int(11) DEFAULT NULL,
  `Batch` int(11) DEFAULT NULL,
  `PayeeName` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PurPlace` int(11) DEFAULT NULL,
  `TransactionID` varchar(40) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Qty` int(11) NOT NULL,
  `SubTotal` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `OrderNo` int(11) DEFAULT NULL,
  `IPAddress` varchar(25) DEFAULT NULL,
  `TellerID` varchar(100) DEFAULT 'Waiting for teller..',
  `RefID` varchar(255) DEFAULT NULL,
  `PaymentStatus` int(11) DEFAULT '2',
  `AddedOn` datetime DEFAULT NULL,
  `Bank` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `UID`, `Batch`, `PayeeName`, `Email`, `PurPlace`, `TransactionID`, `Price`, `Qty`, `SubTotal`, `Total`, `OrderNo`, `IPAddress`, `TellerID`, `RefID`, `PaymentStatus`, `AddedOn`, `Bank`) VALUES
(22, 1, 1655806753, 'Samson Nwachukwu', 'samsondestined@gmail.com', 2, '165693284762c2c9ef35fe65.16260977', 109999.99, 1, 109999.99, 134000.23, 567722, NULL, 'Waiting for teller..', NULL, 2, '2022-07-04 12:07:27', NULL),
(23, 0, 1656252025, 'oluwafemi olawale', 'test@gmail.com', 1, '16615127106308ac061aff07.00886962', 11200, 1, 11200, 11200, 446186, '105.112.166.45', 'Waiting for teller..', NULL, 2, '2022-08-26 12:18:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentstatus`
--

DROP TABLE IF EXISTS `paymentstatus`;
CREATE TABLE IF NOT EXISTS `paymentstatus` (
  `ID` int(11) NOT NULL,
  `PaymentStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentstatus`
--

INSERT INTO `paymentstatus` (`ID`, `PaymentStatus`) VALUES
(1, 'Failed'),
(2, 'Pending'),
(3, 'Confirmed'),
(4, 'Complete'),
(5, 'Partially'),
(6, 'Freezed');

-- --------------------------------------------------------

--
-- Table structure for table `placed_order`
--

DROP TABLE IF EXISTS `placed_order`;
CREATE TABLE IF NOT EXISTS `placed_order` (
  `ID` int(11) NOT NULL,
  `UID` int(11) DEFAULT NULL,
  `Batch` int(11) DEFAULT NULL,
  `PayeeName` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `TransactionID` varchar(40) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Qty` int(11) NOT NULL,
  `SubTotal` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `OrderNo` int(11) DEFAULT NULL,
  `RefID` varchar(255) DEFAULT NULL,
  `Tracking` int(11) NOT NULL DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placed_order`
--

INSERT INTO `placed_order` (`ID`, `UID`, `Batch`, `PayeeName`, `Email`, `TransactionID`, `Price`, `Qty`, `SubTotal`, `Total`, `OrderNo`, `RefID`, `Tracking`, `AddedOn`) VALUES
(1, 1, 1650660486, 'Samson Nwachukwu', 'samsondestined@gmail.com', '16521068456279265d249589.48935926', 2099, 2, 4198, 4198, 953677, '927941116', 5, '2022-05-09 15:34:54'),
(2, 1, 1650660486, 'Samson Nwachukwu', 'samsondestined@gmail.com', '16521068456279265d249589.48935926', 2099, 2, 4198, 4198, 953677, '927941116', 5, '2022-05-09 15:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL,
  `Product` varchar(255) DEFAULT NULL,
  `ProductTitle` int(11) DEFAULT NULL,
  `Description` varchar(500) NOT NULL,
  `PriceFrom` int(11) DEFAULT NULL,
  `PriceTo` int(11) DEFAULT NULL,
  `Batch` int(11) DEFAULT NULL,
  `Price` double NOT NULL DEFAULT '0',
  `RRP` double NOT NULL DEFAULT '0',
  `AddedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `IPAddr` varchar(15) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Product`, `ProductTitle`, `Description`, `PriceFrom`, `PriceTo`, `Batch`, `Price`, `RRP`, `AddedOn`, `CreatedBy`, `IPAddr`, `AccessLevel`) VALUES
(1, 'kisspng-dell-latitude-laptop-intel-core-i5-latitude-e6420-5b30a4ddde9a01.7060448515299145899118.jpg', 28, 'Used DELL Latitude E6440 computers for the best price. Spec: 750HDD, 12GB RAM, 2GB dedicated video memory, keyboard backlight. Still very neat', NULL, NULL, 1650498856, 109999.99, 150000, '2022-04-21 00:54:16', 1, '105.112.37.104', 1),
(168, 'IMG-20220624-WA0073.jpg', 61, 'High quality juggers for unisex, made with high quality polyester materials, very best price you can ever get anywhere.', NULL, NULL, 1656252025, 11200, 13000, '2022-06-26 15:00:25', 86, '105.112.59.36', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_title`
--

DROP TABLE IF EXISTS `product_title`;
CREATE TABLE IF NOT EXISTS `product_title` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product` varchar(50) NOT NULL,
  `UID` int(11) NOT NULL,
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_title`
--

INSERT INTO `product_title` (`ID`, `Product`, `UID`, `AddedOn`) VALUES
(1, 'Batteries', 1, '2021-01-13 22:33:29'),
(4, 'Computers', 1, '2021-01-15 07:40:55'),
(3, 'Creams and Cosmetics', 1, '2021-01-13 22:42:25'),
(6, 'Food Seasoning', 9, '2021-01-16 02:25:55'),
(8, 'Fruits', 1, '2021-04-25 16:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL DEFAULT '3',
  `Education` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Skills` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Experience` int(11) DEFAULT NULL,
  `Hobby` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Certification` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Referee` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Resume` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Niche` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `UID`, `AccessLevel`, `Education`, `Address1`, `Skills`, `Experience`, `Hobby`, `Address2`, `Email`, `Phone`, `Certification`, `Language`, `Referee`, `Resume`, `Niche`, `AddedOn`) VALUES
(1, 1, 1, 'Yaba College of Technology, Yaba\r\nUsed a sub lecturer in programming classes\r\n\r\nNational open university', 'Alafia Street Ota Ogun State, Nigeria', 'PHP, JavaScript, Node.js', 4, 'Music, Movie, Video Games, Chess', 'Iperu-Remo', 'samsondestined@gmail.com', '090887766543', 'IBM, Cousera International', 'Igbo, Yourba', 'Myself and CNScomputers', 'e14b628a4268ea08f21107b152c2be3a.pdf', '2,13,3,10', '2020-09-18 16:04:01'),
(2, 2, 1, 'YabaTech  College of Technology', 'Igbabirin steet', 'HTML5, CSS3', 2, 'Music, cartoons, games', 'Abule Egba', 'skyfort@gmail.com', '090887766543', 'Google cert', 'Igbo, English', 'CNS and Samson', 'a796bdbe453aa5d74a30d23e4681e33d.docx', '11,2', '2020-09-18 21:10:03'),
(3, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'dilyas@gmail.com', NULL, NULL, NULL, NULL, NULL, '12,2', '2020-09-18 21:10:03'),
(4, 9, 3, 'University of Nnamdi Azikiwe', '23, Adamawa street Jalingo', 'Hand writing and Note making', 3, 'Music, Ludo Games', '', 'pasuma@gmail.com', '090345346463', 'International Language Structure', 'English, Igbo, Yourba', 'CNScomputers', 'b8c028e7d5c28bc3a1b8be07e6c297bd.doc', '2,12,11,3', '2020-11-11 10:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `Fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL,
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`ID`, `UID`, `Fname`, `Photo`, `Title`, `AccessLevel`, `AddedOn`) VALUES
(10, 1, 'Samson', 'f493fb07d05ca720ec3ea66b73ff3bb3.jpg', 'Finding Sustainability', 1, '2020-10-29 09:36:07'),
(8, 1, 'Samson', '668ee48ef1d5224e66bde48d3ce1673e.png', 'COVID-19 call for all innovations', 1, '2020-10-29 09:31:23'),
(11, 1, 'Samson', '9edb491a5429f8410b66d486e31d9fbc.png', 'Professions and skills', 1, '2020-10-29 09:40:12'),
(12, 1, 'Samson', '182f26cc9e05b26d1104a6f0e89cf6f2.jpg', 'On Engineering Duties ', 1, '2020-10-29 09:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `ID` int(10) NOT NULL,
  `State` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`ID`, `State`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `story_album`
--

DROP TABLE IF EXISTS `story_album`;
CREATE TABLE IF NOT EXISTS `story_album` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Album` varchar(40) NOT NULL,
  `UID` int(11) NOT NULL,
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_album`
--

INSERT INTO `story_album` (`ID`, `Album`, `UID`, `AddedOn`) VALUES
(1, 'SMEs', 1, '2021-01-11 09:52:02'),
(2, 'SMEs.jpeg', 1, '2021-01-11 22:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

DROP TABLE IF EXISTS `sub_admin`;
CREATE TABLE IF NOT EXISTS `sub_admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) DEFAULT NULL,
  `Fname` varchar(55) DEFAULT NULL,
  `Sname` varchar(25) DEFAULT NULL,
  `Uname` varchar(25) DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL DEFAULT '3',
  `ActiveStatus` int(11) NOT NULL DEFAULT '2',
  `Pword` varchar(255) DEFAULT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Gender` varchar(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `IPAddr` varchar(25) DEFAULT NULL,
  `Addr` varchar(55) DEFAULT NULL,
  `Country` varchar(55) DEFAULT NULL,
  `AddedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VariableChar` varchar(3000) NOT NULL,
  `AccessLevel` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

DROP TABLE IF EXISTS `tracking`;
CREATE TABLE IF NOT EXISTS `tracking` (
  `ID` int(11) NOT NULL,
  `Status` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`ID`, `Status`) VALUES
(1, 'Order Placed'),
(2, 'Order In Progress'),
(3, 'Shipped'),
(4, 'Out For Delivery'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AccessLevel` int(11) NOT NULL DEFAULT '3',
  `ActiveStatus` int(11) NOT NULL DEFAULT '2',
  `IPAddr` varchar(25) DEFAULT NULL,
  `Fname` varchar(55) DEFAULT NULL,
  `Sname` varchar(55) DEFAULT NULL,
  `Uname` varchar(25) DEFAULT NULL,
  `Pword` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Role` varchar(20) NOT NULL,
  `Bio` varchar(100) NOT NULL,
  `Photo` varchar(55) DEFAULT NULL,
  `Gender` varchar(11) DEFAULT NULL,
  `Country` varchar(25) DEFAULT NULL,
  `State` varchar(25) DEFAULT NULL,
  `LocalGov` varchar(55) DEFAULT NULL,
  `AddedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Phone` varchar(25) DEFAULT NULL,
  `Addr` varchar(255) DEFAULT NULL,
  `AllowUser` varchar(255) DEFAULT NULL,
  `ActivationCode` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `AccessLevel`, `ActiveStatus`, `IPAddr`, `Fname`, `Sname`, `Uname`, `Pword`, `Email`, `Role`, `Bio`, `Photo`, `Gender`, `Country`, `State`, `LocalGov`, `AddedOn`, `Phone`, `Addr`, `AllowUser`, `ActivationCode`) VALUES
(1, 1, 2, '::1', 'Samson', 'Nwachukwu', 'cnsair', 'cef43ec0f3965c27370b78a19fd12893', 'samsondestined@gmail.com', 'Web Developer', 'I am who I am as in today', 'f210ab5636a194f3998a25762a2c4152.jpg', 'Male', 'NIGERIA', '28', '121', '2019-09-24 12:10:59', '07033229178', '21, alafia street Ilo-Awela Ogun State. Nigeria', '0b28a5799a32c687dad2c5183718ceac', 'yHJEPhHFMEcpEnrsm8sMnzQvps9CQhV1hnwAirSVH5kwpZNgkl7SEzH2ElK0r8'),
(2, 1, 2, '::1', 'Fortune', 'Aladum', 'fortune', '4579b2cffd1c1a590050ce8d69c94084', 'skyfort@gmail.com', 'FrontEnd Engineer', 'I can be very playful', 'fa89a0e8b2535702e22e37a5a0ceef79.jpg', 'Male', 'NIGERIA', '1', '1', '2019-09-24 22:14:21', '09000000000', 'Aligbirin', '0b28a5799a32c687dad2c5183718ceac', NULL),
(3, 1, 2, '::1', 'Dilyas', 'Trend', 'dilyas', '4579b2cffd1c1a590050ce8d69c94084', 'dilyas@gmail.com', '', '', 'a0a436f0885456361cb7a918a54ca402.png', 'Male', 'NIGERIA', '28', '366', '2019-09-27 18:53:45', '08087637824', 'Please fill me', '0b28a5799a32c687dad2c5183718ceac', NULL),
(4, 3, 2, NULL, 'kelechi', NULL, 'kelechi', 'b4abe0d8965af0a13a3273e303be22a7', 'kelechi@gmail.com', '', '', NULL, NULL, NULL, NULL, '', '2019-10-09 17:42:35', NULL, NULL, '70c487fad98592054ec31fce2558b959', NULL),
(6, 3, 2, '::1', 'Soma', 'Agaricha', 'soma', 'cef43ec0f3965c27370b78a19fd12893', 'soma@gmail.com', '', '', NULL, 'Male', 'NIGERIA', '15', '623', '2019-10-09 18:02:16', '09044773827', 'plateu jos emoji estate', 'c2c95219d974d1f3ebb86301d57a73ff', NULL),
(8, 1, 2, '::1', 'Thunder', NULL, 'thunder', '54f6e3ee0aaef5ca8edb459223abb81a', 'thunder@gmail.com', '', '', NULL, NULL, NULL, NULL, NULL, '2020-08-30 20:51:50', NULL, NULL, '0b28a5799a32c687dad2c5183718ceac', NULL),
(9, 3, 2, '127.0.0.1', 'pasuma', 'Jigawa', 'pasuma', 'a333a05d05b05bb8ac090f83c62a1028', 'pasuma@gmail.com', 'Banker', 'I am who I am ASAP and now-now', '36dc84c1db916e0e27f814e505cbf60f.jpg', 'Female', 'LESOTHO', NULL, NULL, '2020-11-11 10:15:30', '090887766543', '12, Production street', 'c2c95219d974d1f3ebb86301d57a73ff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_identifier`
--

DROP TABLE IF EXISTS `user_identifier`;
CREATE TABLE IF NOT EXISTS `user_identifier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Identifier` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_identifier`
--

INSERT INTO `user_identifier` (`ID`, `Identifier`) VALUES
(1, 'Guest'),
(2, 'Registered User'),
(3, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `worker_slide`
--

DROP TABLE IF EXISTS `worker_slide`;
CREATE TABLE IF NOT EXISTS `worker_slide` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `Fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AccessLevel` int(11) NOT NULL,
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `worker_slide`
--

INSERT INTO `worker_slide` (`ID`, `UID`, `Fname`, `Photo`, `Title`, `AccessLevel`, `AddedOn`) VALUES
(2, 1, 'Samson', 'e7087338858938339eda654f1394d3d8.jpg', 'All on Dilyas Trend', 1, '2020-10-30 20:28:42'),
(3, 1, 'Samson', '9d36b2651af9b098aeb0394d78fb2b67.jpg', 'Open Source Software - Linux', 1, '2020-10-30 20:40:19'),
(4, 1, 'Samson', '808737643681797bfca4f59fff72a300.jpg', 'Food worker ', 1, '2020-10-30 20:45:45'),
(5, 1, 'Samson', '55d9de9c3d54cbaa29d1abf59f529415.png', 'Kitchen and Food vendors', 1, '2020-10-30 20:46:16'),
(10, 1, 'Samson', 'eb3764ce75b68f3f5a092624642c1973.jpg', 'Tailors', 1, '2020-11-05 15:00:37'),
(11, 1, 'Samson', 'f0beeed79c2faedcfb18ea274fe2f686.jpg', 'Fashion Designers', 1, '2020-11-05 15:02:01'),
(12, 1, 'Samson', '1bd4015085b88a28a22fa8244f2e229b.jpg', 'Farm shop and vertinary', 1, '2020-11-05 15:35:13'),
(13, 1, 'Samson', '1a4726af28b0d78ab71b9e17510867fc.jpg', 'Auto Shop and Spare Parts', 1, '2020-11-09 19:58:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog` ADD FULLTEXT KEY `Fname` (`Fname`,`Message`,`Title`,`Photo`);
ALTER TABLE `blog` ADD FULLTEXT KEY `Message` (`Message`,`Title`,`Fname`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery` ADD FULLTEXT KEY `Photo` (`Photo`);

--
-- Indexes for table `message_picture`
--
ALTER TABLE `message_picture` ADD FULLTEXT KEY `Photo` (`Photo`);

--
-- Indexes for table `product`
--
ALTER TABLE `product` ADD FULLTEXT KEY `Photo` (`Product`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD CONSTRAINT `FK` FOREIGN KEY (`StateID`) REFERENCES `states` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
