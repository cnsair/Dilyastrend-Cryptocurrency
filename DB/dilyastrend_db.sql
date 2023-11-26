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
