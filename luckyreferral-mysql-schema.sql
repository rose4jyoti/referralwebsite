-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2014 at 08:41 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `softoasi_referral`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`) VALUES
(5, 'dfgdfgdf', 'dfgsdfg'),
(4, 'sdfsdfsd', 'safsdf'),
(6, 'sdgsdgfd', 'dfgdfgfdgdf\nfghfghfghfgh'),
(9, 'jai maa Durga', 'om namah shivay !');

-- --------------------------------------------------------

--
-- Table structure for table `listcontacts`
--

CREATE TABLE IF NOT EXISTS `listcontacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `sent_status` int(11) DEFAULT '0',
  `register_status` int(11) DEFAULT '0',
  `referrer_id` varchar(1000) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referralprogdetails`
--

CREATE TABLE IF NOT EXISTS `referralprogdetails` (
  `referralProgDetailsID` int(11) NOT NULL AUTO_INCREMENT,
  `languageID` int(11) NOT NULL,
  `referralProgID` int(11) NOT NULL,
  `referralProgTitle` varchar(255) NOT NULL,
  `referralProgDescription` varchar(255) NOT NULL,
  `referralProgTCs` text NOT NULL,
  `referralProgHighlights` text NOT NULL,
  `dealMetaTitle` text NOT NULL,
  `dealMetaDescription` text NOT NULL,
  `referralProgSocShareReward` int(11) DEFAULT NULL,
  PRIMARY KEY (`referralProgDetailsID`),
  KEY `indexDealID` (`referralProgID`),
  KEY `dealIDLngIndex` (`languageID`,`referralProgID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `referralprogdetails`
--

INSERT INTO `referralprogdetails` (`referralProgDetailsID`, `languageID`, `referralProgID`, `referralProgTitle`, `referralProgDescription`, `referralProgTCs`, `referralProgHighlights`, `dealMetaTitle`, `dealMetaDescription`, `referralProgSocShareReward`) VALUES
(106, 0, 116, '', '', '', '', '', '', 0),
(107, 0, 116, '', '', '', '', '', '', 0),
(118, 0, 122, 'Test campaign 2', 'Test campaign 2 description', '', '', '', '', 0),
(100, 0, 112, 'My first compaign', 'Test compaign', '', '', '', '', 0),
(96, 0, 107, '1500$ de crédits pour voyager ou vous voulez!', '1500$ de crédits pour voyager ou vous voulez!', '', '', '', '', 0),
(97, 0, 108, 'This is test compaign by Jyoti', 'This is test compaign by Jyoti', '', '', '', '', 0),
(121, 0, 124, 'test referral 24 feb', 'test referral 24 feb description', '', '', '', '', 0),
(104, 0, 116, 'dfgfdg', 'vcbcv', '', '', '', '', 0),
(101, 0, 113, '1500$ de crédits pour voyager ou vous voulez!', '1500$ de crédits pour voyager ou vous voulez!', '', '', '', '', 0),
(108, 0, 116, '', '', '', '', '', '', 0),
(109, 0, 116, 'test', '', '', '', '', '', 0),
(110, 0, 117, 'sdf', '', '', '', '', '', 0),
(114, 0, 120, '', '', '', '', '', '', 0),
(112, 0, 118, '', '', '', '', '', '', 0),
(116, 0, 121, '', '', '', '', '', '', 0),
(124, 0, 127, 'test on 3 march', 'description test on 3 march..', '', '', '', '', 0),
(128, 0, 130, 'testing on 5 march', '...........', '', '', '', '', 0),
(135, 0, 140, 'title test', 'description test', '', '', '', '', 0),
(139, 0, 144, 'Win 2000$ for the trip of your dream!', 'Win 2000$ for the trip of your dream where ever you want to go!', '', '', '', '', 0),
(140, 0, 146, 'fdgdfg', 'dfgdfgdfgfd', '', '', '', '', 0),
(141, 0, 147, 'Win a 3000$ SAQ gift card !', 'Share with your friends for a chance to win a 3000$ SAQ gift card !', 'http://www.deallife.com/Reglements-Concours-Carte-Visa-100.html', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referralprogs`
--

CREATE TABLE IF NOT EXISTS `referralprogs` (
  `refProgID` int(20) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `refProgTypeID` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `minReferralRequired` int(11) DEFAULT NULL,
  `maxReferralLimit` int(11) NOT NULL,
  `rewardFrequence` enum('once','every time') NOT NULL,
  `actionRewarded` enum('enter this campaign on','convert on','visit') NOT NULL COMMENT 'Action required for ther referrer to get his rewards',
  `rewardsPerAction` int(11) NOT NULL COMMENT 'Rewards the referrer gets per action completed by the referres',
  `entryEmailNotification` enum('yes','no') NOT NULL,
  `replyEmail` varchar(100) NOT NULL,
  `refProgStatus` enum('Active','Inactive','Cancelled','Deleted') NOT NULL,
  `refProgInstantRewardActivated` enum('yes','no') NOT NULL,
  `refProgCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `refProgUniqueKeyID` varchar(100) NOT NULL,
  `no_impressions` int(11) NOT NULL DEFAULT '0',
  `no_clicks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`refProgID`),
  KEY `indexCustomerID` (`customerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `referralprogs`
--

INSERT INTO `referralprogs` (`refProgID`, `customerID`, `refProgTypeID`, `startTime`, `endTime`, `minReferralRequired`, `maxReferralLimit`, `rewardFrequence`, `actionRewarded`, `rewardsPerAction`, `entryEmailNotification`, `replyEmail`, `refProgStatus`, `refProgInstantRewardActivated`, `refProgCreatedDate`, `refProgUniqueKeyID`, `no_impressions`, `no_clicks`) VALUES
(95, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(87, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(86, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(88, 38, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(90, 37, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(92, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(93, 38, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '0000-00-00 00:00:00', '', 0, 0),
(124, 38, 1, '2014-02-19 00:00:00', '2014-02-21 00:00:00', 10, 0, 'once', 'visit', 0, 'yes', '', 'Active', 'yes', '2014-03-29 07:45:23', '', 40, 51),
(108, 41, 1, '2014-01-17 00:00:00', '2014-02-08 00:00:00', 10, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-26 05:00:41', '', 319, 49),
(112, 41, 1, '2014-02-14 00:00:00', '2014-02-15 00:00:00', 20, 0, 'once', 'visit', 0, 'yes', '', 'Active', 'yes', '2014-03-07 11:11:02', '', 1, 0),
(110, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-19 11:58:19', '', 2, 0),
(111, 41, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-07 11:10:59', '', 1, 0),
(115, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-07 11:11:12', '', 1, 0),
(119, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-02-22 06:37:55', '', 0, 0),
(127, 38, 1, '2014-03-12 00:00:00', '2014-03-27 00:00:00', 11, 0, 'once', 'visit', 0, 'yes', '', 'Active', 'yes', '2014-03-13 12:02:17', '', 1, 1),
(133, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-07 04:13:36', '', 0, 0),
(140, 38, 1, '2014-03-16 00:00:00', '2014-03-29 00:00:00', 10, 0, 'once', 'visit', 0, 'yes', '', 'Active', 'yes', '2014-03-13 11:12:19', '', 32, 32),
(135, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-07 04:32:18', '', 0, 0),
(138, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-10 06:25:16', '', 3, 0),
(144, 37, 1, '2014-03-10 00:00:00', '2014-05-31 00:00:00', 10, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-30 21:31:43', '', 21, 3),
(145, 38, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-03-11 03:12:40', '', 0, 0),
(146, 38, 1, '2014-03-17 00:00:00', '2014-03-21 00:00:00', 10, 0, 'once', 'visit', 0, 'yes', '', 'Active', 'yes', '2014-03-31 05:44:51', '', 8, 2),
(147, 37, 1, '2014-03-28 10:00:00', '2014-06-30 13:00:00', 10, 0, 'once', 'enter this campaign on', 0, 'yes', '', 'Active', 'yes', '2014-06-23 20:22:47', '536aea27dbcdd', 436, 302);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(16, 1),
(30, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rpusers`
--

CREATE TABLE IF NOT EXISTS `rpusers` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userParticipantCode` varchar(255) DEFAULT NULL,
  `userFirstName` varchar(100) NOT NULL,
  `userLastName` varchar(100) NOT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `userRegistredDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userLastAccessed` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `userAdress1` varchar(255) DEFAULT NULL,
  `userAdress2` varchar(255) DEFAULT NULL,
  `userCity` varchar(100) DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `userZip` varchar(20) DEFAULT NULL,
  `userReferralID` varchar(100) DEFAULT NULL,
  `userReferralPURL` varchar(100) DEFAULT NULL,
  `userProfilePicture` varchar(100) DEFAULT NULL,
  `userDOB` varchar(100) DEFAULT NULL,
  `userGender` enum('Male','Female') DEFAULT NULL,
  `userLoginType` enum('Site','Facebook') DEFAULT NULL,
  `userStatus` enum('Active','Inactive','Deleted','Locked') NOT NULL,
  `userLockedDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `userInvalidAccessCount` int(11) DEFAULT '0',
  `userDefaultLanguage` mediumint(10) DEFAULT NULL,
  `refereeEmail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=280 ;

--
-- Dumping data for table `rpusers`
--

INSERT INTO `rpusers` (`userID`, `userName`, `userEmail`, `userParticipantCode`, `userFirstName`, `userLastName`, `userPhone`, `userRegistredDate`, `userLastAccessed`, `userAdress1`, `userAdress2`, `userCity`, `countryID`, `stateID`, `userZip`, `userReferralID`, `userReferralPURL`, `userProfilePicture`, `userDOB`, `userGender`, `userLoginType`, `userStatus`, `userLockedDate`, `userInvalidAccessCount`, `userDefaultLanguage`, `refereeEmail`) VALUES
(14, 'rajan', 'rajan @gmail.com', '', 'rajan', 'kumar', '956004884', '2013-10-01 04:41:16', '0000-00-00 00:00:00', 'mohali, india', 'bangalore, india', 'bangalore', 151, 0, '', '97', '', NULL, '', 'Male', 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(204, 'vikash keshri', 'iamkeshri@gmail.com', '', '', '', '', '2014-03-25 10:07:54', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '108', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(205, 'vikash keshri', 'iamkeshri@gmail.com', '', '', '', '', '2014-03-27 03:50:53', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '146', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(203, 'vikash keshri', 'iamkeshri@gmail.com', '', '', '', '', '2014-03-25 10:05:28', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '124', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(31, '', 'rajanrajrock@yahoo.com', '', '', '', '', '2014-02-12 13:13:02', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '107', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(32, '', 'rajanrajrock@yahoo.in', '', '', '', '', '2014-02-12 13:13:35', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '107', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(68, '', 'rajanraj55555@gmail.com', '', '', '', '', '2014-03-05 10:49:24', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '128', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(200, 'abhineet baranwal', 'abhineetsot@gmail.com', '', '', '', '', '2014-03-20 11:48:17', '0000-00-00 00:00:00', '', '', '', 0, 0, '', '108', '', NULL, '', NULL, 'Site', 'Active', '0000-00-00 00:00:00', 0, 0, ''),
(278, '', 'luc.chateauvert@yahoo.ca', NULL, '', '', NULL, '2014-05-22 04:41:28', '2014-05-22 04:41:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '0000-00-00 00:00:00', 0, NULL, 'luc.chateauvert75@gmail.com'),
(279, ' ', 'luke.greencastle@aol.com', '', '', '', NULL, '2014-05-24 19:14:51', '2014-05-24 19:14:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '283685380b76b7212c', NULL, NULL, '', NULL, 'Active', '0000-00-00 00:00:00', 0, NULL, ''),
(275, 'Luc Châteauvert', 'l_chateauv@hotmail.com', '', 'Luc', 'Châteauvert', NULL, '2014-05-22 04:38:04', '2014-05-22 04:38:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13014537d46ec71217', NULL, NULL, '', NULL, 'Active', '0000-00-00 00:00:00', 0, NULL, ''),
(277, 'Luc Chateauvert', 'luc.chateauvert75@gmail.com', '', 'Luc', 'Chateauvert', NULL, '2014-05-22 04:41:28', '2014-05-22 04:41:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11332537d47b8f27aa', NULL, NULL, 'Male', NULL, 'Active', '0000-00-00 00:00:00', 0, NULL, '2391537d476b137cb'),
(276, 'Luc', 'luc.chateauvert@yahoo.ca', '', '', '', NULL, '2014-05-22 04:40:11', '2014-05-22 04:40:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2391537d476b137cb', NULL, NULL, '', NULL, 'Active', '0000-00-00 00:00:00', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `rp_admin_users`
--

CREATE TABLE IF NOT EXISTS `rp_admin_users` (
  `adminUserID` int(11) NOT NULL AUTO_INCREMENT,
  `adminUserFirstName` varchar(100) NOT NULL,
  `adminUserLastName` varchar(100) NOT NULL,
  `adminUserEmail` varchar(100) NOT NULL,
  `adminUserLoginName` varchar(50) NOT NULL,
  `adminUserLoginPass` varchar(50) NOT NULL,
  `adminUserStatus` enum('Active','Inactive','Blocked','Deleted') NOT NULL,
  `adminUserAccessCount` int(11) NOT NULL,
  `adminUserInvalidAccessCount` int(11) NOT NULL,
  `adminUserLockedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adminUserCreatedDate` datetime NOT NULL,
  `adminUserLastAccessDate` datetime NOT NULL,
  `userTypeID` int(11) NOT NULL,
  PRIMARY KEY (`adminUserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rp_admin_users`
--

INSERT INTO `rp_admin_users` (`adminUserID`, `adminUserFirstName`, `adminUserLastName`, `adminUserEmail`, `adminUserLoginName`, `adminUserLoginPass`, `adminUserStatus`, `adminUserAccessCount`, `adminUserInvalidAccessCount`, `adminUserLockedDate`, `adminUserCreatedDate`, `adminUserLastAccessDate`, `userTypeID`) VALUES
(4, 'Vikash', 'keshri', '', '', '', 'Active', 0, 0, '2013-09-12 20:43:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rp_admin_user_type`
--

CREATE TABLE IF NOT EXISTS `rp_admin_user_type` (
  `userTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `userTypeName` varchar(255) DEFAULT NULL,
  `userTypeStatus` enum('Active','Inactive','Deleted') DEFAULT 'Active',
  `adminMode` enum('Administrator','CustomerAdmin') NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`userTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_currencies`
--

CREATE TABLE IF NOT EXISTS `rp_currencies` (
  `currencyID` int(11) NOT NULL AUTO_INCREMENT,
  `currencyName` varchar(50) NOT NULL,
  `currencyCode` varchar(4) NOT NULL,
  `currencySymbolLeft` varchar(5) NOT NULL,
  `currencySymbolRight` varchar(5) NOT NULL,
  `currencyDecimalPlaces` int(1) NOT NULL DEFAULT '2',
  `currencyValue` decimal(20,5) NOT NULL,
  `currencyDefault` enum('Yes','No') NOT NULL,
  `currencyType` enum('Standard','Custom') NOT NULL,
  `currencyActive` enum('Yes','No') NOT NULL,
  `currencyStatus` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`currencyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_customers`
--

CREATE TABLE IF NOT EXISTS `rp_customers` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `customerEmail` varchar(100) NOT NULL,
  `customerPassword` varchar(50) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerKey` varchar(100) NOT NULL,
  `customerAddress1` varchar(100) NOT NULL,
  `customerAddress2` varchar(100) NOT NULL,
  `customerCity` varchar(100) NOT NULL,
  `customerStateProvID` int(11) NOT NULL,
  `customerCountryID` int(11) NOT NULL,
  `customerCFirstName` varchar(50) NOT NULL,
  `customerCLastName` varchar(50) NOT NULL,
  `customerPhone` varchar(20) NOT NULL,
  `customerZip` varchar(10) NOT NULL,
  `customerWebsite` varchar(450) NOT NULL,
  `customerStatus` enum('Active','Inactive','Deleted','Locked') NOT NULL DEFAULT 'Active',
  `customerAddedDate` datetime NOT NULL,
  `customerUpdateDate` datetime NOT NULL,
  `customerDefaultLanguageID` int(12) NOT NULL DEFAULT '1',
  `loginLockedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loginInvalidAccessCount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customerID`),
  KEY `indexBusinessStateID` (`customerStateProvID`),
  KEY `indexBusinessCountryID` (`customerCountryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_customer_countries`
--

CREATE TABLE IF NOT EXISTS `rp_customer_countries` (
  `countryID` int(11) NOT NULL AUTO_INCREMENT,
  `countryAvailable` enum('Yes','No') NOT NULL,
  `countryIsoA2` char(2) NOT NULL,
  `countryIsoA3` char(3) NOT NULL,
  `countryIsoNumber` varchar(4) NOT NULL,
  `countryPriority` int(11) NOT NULL DEFAULT '256',
  `addressFormatID` int(11) NOT NULL,
  PRIMARY KEY (`countryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=272 ;

--
-- Dumping data for table `rp_customer_countries`
--

INSERT INTO `rp_customer_countries` (`countryID`, `countryAvailable`, `countryIsoA2`, `countryIsoA3`, `countryIsoNumber`, `countryPriority`, `addressFormatID`) VALUES
(1, 'No', 'AF', 'AFG', '004', 256, 1),
(2, 'No', 'AL', 'ALB', '008', 256, 1),
(3, 'No', 'DZ', 'DZA', '012', 256, 1),
(4, 'No', 'AS', 'ASM', '016', 256, 1),
(5, 'No', 'AD', 'AND', '020', 256, 1),
(6, 'No', 'AO', 'AGO', '', 4, 1),
(7, 'No', 'AI', 'AIA', '660', 5, 1),
(8, 'No', 'Aq', 'ATa', '011', 6, 2),
(9, 'No', 'AG', 'ATG', '028', 7, 1),
(10, 'No', 'AR', 'ARG', '032', 8, 1),
(11, 'No', 'AM', 'ARM', '051', 256, 1),
(12, 'No', 'KL', 'WHM', '', 9, 2),
(13, 'No', 'AU', 'AUS', '125', 10, 3),
(14, 'No', 'AT', 'AUT', '040', 11, 1),
(15, 'No', 'AZ', 'AZE', '031', 12, 1),
(16, 'No', 'BS', 'BHS', '044', 256, 1),
(17, 'No', 'BH', 'BHR', '048', 13, 1),
(18, 'No', 'BD', 'BGD', '050', 14, 4),
(19, 'No', 'BB', 'BRB', '052', 15, 1),
(20, 'No', 'BY', 'BLR', '112', 16, 1),
(21, 'No', 'BE', 'BEL', '056', 17, 1),
(22, 'No', 'BZ', 'BLZ', '084', 256, 1),
(23, 'No', 'BJ', 'BEN', '204', 256, 1),
(24, 'No', 'BM', 'BMU', '060', 256, 1),
(25, 'No', 'BT', 'BTN', '064', 256, 1),
(26, 'No', 'BO', 'BOL', '068', 256, 1),
(27, 'No', 'BA', 'BIH', '070', 256, 1),
(28, 'No', 'BW', 'BWA', '072', 256, 1),
(29, 'No', 'BV', 'BVT', '074', 256, 1),
(30, 'No', 'BR', 'BRA', '076', 256, 1),
(31, 'No', 'IO', 'IOT', '086', 256, 1),
(32, 'No', 'BN', 'BRN', '096', 256, 1),
(33, 'No', 'BG', 'BGR', '100', 256, 1),
(34, 'No', 'BF', 'BFA', '854', 256, 1),
(35, 'No', 'BI', 'BDI', '108', 256, 1),
(36, 'No', 'KH', 'KHM', '116', 256, 1),
(37, 'No', 'CM', 'CMR', '120', 256, 1),
(38, 'Yes', 'CA', 'CAN', '124', 1, 1),
(39, 'No', 'CV', 'CPV', '132', 256, 1),
(40, 'No', 'KY', 'CYM', '136', 256, 1),
(41, 'No', 'CF', 'CAF', '140', 256, 1),
(42, 'No', 'TD', 'TCD', '148', 256, 1),
(43, 'No', 'CL', 'CHL', '152', 256, 1),
(44, 'No', 'CN', 'CHN', '156', 256, 1),
(45, 'No', 'CX', 'CXR', '162', 256, 1),
(46, 'No', 'CC', 'CCK', '166', 256, 1),
(47, 'No', 'CO', 'COL', '170', 256, 1),
(48, 'No', 'KM', 'COM', '174', 256, 1),
(49, 'No', 'CG', 'COG', '178', 256, 1),
(50, 'No', 'CK', 'COK', '184', 256, 1),
(51, 'No', 'CR', 'CRI', '188', 256, 1),
(52, 'No', 'CI', 'CIV', '384', 18, 1),
(53, 'No', 'HR', 'HRV', '191', 19, 1),
(54, 'No', 'CU', 'CUB', '192', 20, 1),
(55, 'No', 'CY', 'CYP', '196', 256, 1),
(56, 'No', 'CZ', 'CZE', '203', 256, 1),
(57, 'No', 'DK', 'DNK', '208', 256, 1),
(58, 'No', 'DJ', 'DJI', '262', 256, 1),
(59, 'No', 'DM', 'DMA', '212', 256, 1),
(60, 'No', 'DO', 'DOM', '214', 256, 1),
(61, 'No', 'TL', 'TLS', '626', 256, 1),
(62, 'No', 'EC', 'ECU', '218', 256, 1),
(63, 'No', 'EG', 'EGY', '818', 256, 1),
(64, 'No', 'SV', 'SLV', '222', 256, 1),
(65, 'No', 'GQ', 'GNQ', '226', 256, 1),
(66, 'No', 'ER', 'ERI', '232', 256, 1),
(67, 'No', 'EE', 'EST', '233', 256, 1),
(68, 'No', 'ET', 'ETH', '231', 256, 1),
(69, 'No', 'FK', 'FLK', '238', 256, 1),
(70, 'No', 'FO', 'FRO', '234', 256, 1),
(71, 'No', 'FJ', 'FJI', '242', 256, 1),
(72, 'No', 'FI', 'FIN', '246', 256, 1),
(73, 'No', 'FR', 'FRA', '250', 256, 1),
(74, 'No', 'FX', 'FXX', '249', 256, 1),
(75, 'No', 'GF', 'GUF', '254', 256, 1),
(76, 'No', 'PF', 'PYF', '258', 256, 1),
(77, 'No', 'TF', 'ATF', '260', 256, 1),
(78, 'No', 'GA', 'GAB', '266', 256, 1),
(79, 'No', 'GM', 'GMB', '270', 256, 1),
(80, 'No', 'GE', 'GEO', '268', 256, 1),
(81, 'No', 'DE', 'DEU', '276', 256, 1),
(82, 'No', 'GH', 'GHA', '288', 256, 1),
(83, 'No', 'GI', 'GIB', '292', 256, 1),
(84, 'No', 'GR', 'GRC', '300', 256, 1),
(85, 'No', 'GL', 'GRL', '304', 256, 1),
(86, 'No', 'GD', 'GRD', '308', 256, 1),
(87, 'No', 'GP', 'GLP', '312', 256, 1),
(88, 'No', 'GU', 'GUM', '316', 256, 1),
(89, 'No', 'GT', 'GTM', '320', 256, 1),
(90, 'No', 'GN', 'GIN', '324', 256, 1),
(91, 'No', 'GW', 'GNB', '624', 256, 1),
(92, 'No', 'GY', 'GUY', '328', 256, 1),
(93, 'No', 'HT', 'HTI', '332', 256, 1),
(94, 'No', 'HM', 'HMD', '334', 256, 1),
(95, 'No', 'HN', 'HND', '340', 256, 1),
(96, 'No', 'HK', 'HKG', '344', 256, 1),
(97, 'No', 'HU', 'HUN', '348', 256, 1),
(98, 'No', 'IS', 'ISL', '352', 256, 1),
(99, 'No', 'IN', 'IND', '356', 256, 4),
(100, 'No', 'ID', 'IDN', '360', 256, 1),
(101, 'No', 'IR', 'IRN', '364', 256, 1),
(102, 'No', 'IQ', 'IRQ', '368', 256, 1),
(103, 'No', 'IE', 'IRL', '372', 256, 1),
(104, 'No', 'IL', 'ISR', '376', 256, 1),
(105, 'No', 'IT', 'ITA', '380', 256, 1),
(106, 'No', 'JM', 'JAM', '388', 256, 1),
(107, 'No', 'JP', 'JPN', '392', 256, 1),
(108, 'No', 'JO', 'JOR', '400', 256, 1),
(109, 'No', 'KZ', 'KAZ', '398', 256, 1),
(110, 'No', 'KE', 'KEN', '404', 256, 1),
(111, 'No', 'KI', 'KIR', '296', 256, 1),
(112, 'No', 'KP', 'PRK', '', 21, 1),
(113, 'No', 'KR', 'KOR', '410', 256, 1),
(114, 'No', 'KW', 'KWT', '414', 256, 1),
(115, 'No', 'KG', 'KGZ', '417', 256, 1),
(116, 'No', 'LA', 'LAO', '418', 256, 1),
(117, 'No', 'LV', 'LVA', '428', 256, 1),
(118, 'No', 'LB', 'LBN', '422', 256, 1),
(119, 'No', 'LS', 'LSO', '426', 256, 1),
(120, 'No', 'LR', 'LBR', '430', 256, 1),
(121, 'No', 'LY', 'LBY', '434', 256, 1),
(122, 'No', 'LI', 'LIE', '438', 256, 1),
(123, 'No', 'LT', 'LTU', '440', 256, 1),
(124, 'No', 'LU', 'LUX', '442', 256, 1),
(125, 'No', 'MO', 'MAC', '446', 256, 1),
(126, 'No', 'MK', 'MKD', '807', 256, 1),
(127, 'No', 'MG', 'MDG', '450', 256, 1),
(128, 'No', 'MW', 'MWI', '454', 256, 1),
(129, 'No', 'MY', 'MYS', '458', 256, 1),
(130, 'No', 'MV', 'MDV', '462', 256, 2),
(131, 'No', 'ML', 'MLI', '466', 256, 1),
(132, 'No', 'MT', 'MLT', '', 256, 1),
(133, 'No', 'MH', 'MHL', '584', 256, 1),
(134, 'No', 'MQ', 'MTQ', '474', 256, 1),
(135, 'No', 'MR', 'MRT', '478', 256, 1),
(136, 'No', 'MU', 'MUS', '480', 256, 1),
(137, 'No', 'YT', 'MYT', '175', 256, 1),
(138, 'No', 'MX', 'MEX', '484', 256, 1),
(139, 'No', 'FM', 'FSM', '583', 256, 1),
(140, 'No', 'MD', 'MDA', '498', 256, 1),
(141, 'No', 'MC', 'MCO', '492', 256, 1),
(142, 'No', 'MN', 'MNG', '496', 256, 1),
(143, 'No', 'MS', 'MSR', '500', 256, 1),
(144, 'No', 'MA', 'MAR', '504', 256, 1),
(145, 'No', 'MZ', 'MOZ', '508', 256, 1),
(146, 'No', 'MM', 'MMR', '104', 256, 1),
(147, 'No', 'NA', 'NAM', '516', 256, 1),
(148, 'No', 'NR', 'NRU', '520', 256, 1),
(149, 'No', 'NP', 'NPL', '524', 256, 1),
(150, 'No', 'NL', 'NLD', '', 256, 2),
(151, 'No', 'AN', 'ANT', '530', 256, 1),
(152, 'No', 'NC', 'NCL', '540', 256, 1),
(153, 'No', 'NZ', 'NZL', '554', 22, 1),
(154, 'No', 'NI', 'NIC', '558', 256, 1),
(155, 'No', 'NE', 'NER', '562', 256, 1),
(156, 'No', 'NG', 'NGA', '566', 256, 1),
(157, 'No', 'NU', 'NIU', '570', 256, 1),
(158, 'No', 'NF', 'NFK', '574', 256, 1),
(159, 'No', 'MP', 'MNP', '580', 256, 1),
(160, 'No', 'NO', 'NOR', '578', 256, 1),
(161, 'No', 'OM', 'OMN', '512', 256, 1),
(162, 'No', 'PK', 'PAK', '586', 256, 1),
(163, 'No', 'PW', 'PLW', '585', 256, 1),
(164, 'No', 'PA', 'PAN', '591', 256, 1),
(165, 'No', 'PG', 'PNG', '598', 256, 1),
(166, 'No', 'PY', 'PRY', '600', 256, 1),
(167, 'No', 'PE', 'PER', '604', 256, 1),
(168, 'No', 'PH', 'PHL', '608', 256, 1),
(169, 'No', 'PN', 'PCN', '612', 256, 1),
(170, 'No', 'PL', 'POL', '616', 256, 1),
(171, 'No', 'PT', 'PRT', '620', 256, 1),
(172, 'No', 'PR', 'PRI', '630', 256, 1),
(173, 'No', 'QA', 'QAT', '634', 256, 1),
(174, 'No', 'RE', 'REU', '638', 256, 1),
(175, 'No', 'RO', 'ROU', '642', 256, 1),
(176, 'No', 'RU', 'RUS', '643', 256, 1),
(177, 'No', 'RW', 'RWA', '646', 256, 1),
(178, 'No', 'KN', 'KNA', '659', 256, 1),
(179, 'No', 'LC', 'LCA', '662', 256, 1),
(180, 'No', 'VC', 'VCT', '670', 256, 1),
(181, 'No', 'WS', 'WSM', '882', 256, 1),
(182, 'No', 'SM', 'SMR', '674', 256, 1),
(183, 'No', 'ST', 'STP', '678', 256, 1),
(184, 'No', 'SA', 'SAU', '682', 256, 1),
(185, 'No', 'SN', 'SEN', '686', 256, 1),
(186, 'No', 'SC', 'SYC', '690', 256, 1),
(187, 'No', 'SL', 'SLE', '694', 256, 1),
(188, 'No', 'SG', 'SGP', '702', 256, 1),
(189, 'No', 'SK', 'SVK', '703', 256, 1),
(190, 'No', 'SI', 'SVN', '705', 256, 1),
(191, 'No', 'SB', 'SLB', '090', 256, 1),
(192, 'No', 'SO', 'SOM', '706', 256, 1),
(193, 'No', 'ZA', 'ZAF', '710', 256, 1),
(195, 'No', 'ES', 'ESP', '724', 256, 1),
(196, 'No', 'LK', 'LKA', '144', 256, 1),
(197, 'No', 'SH', 'SHN', '654', 256, 1),
(198, 'No', 'PM', 'SPM', '666', 256, 1),
(199, 'No', 'SD', 'SDN', '736', 256, 1),
(200, 'No', 'SR', 'SUR', '740', 256, 1),
(201, 'No', 'SJ', 'SJM', '744', 256, 1),
(202, 'No', 'SZ', 'SWZ', '748', 256, 1),
(203, 'No', 'SE', 'SWE', '752', 256, 1),
(204, 'No', 'CH', 'CHE', '756', 256, 1),
(205, 'No', 'SY', 'SYR', '760', 256, 1),
(206, 'No', 'TW', 'TWN', '158', 256, 1),
(207, 'No', 'TJ', 'TJK', '762', 256, 1),
(208, 'No', 'TZ', 'TZA', '834', 256, 1),
(209, 'No', 'TH', 'THA', '764', 256, 1),
(210, 'No', 'TG', 'TGO', '768', 256, 1),
(211, 'No', 'TK', 'TKL', '772', 256, 1),
(212, 'No', 'TO', 'TON', '776', 256, 1),
(213, 'No', 'TT', 'TTO', '780', 256, 1),
(214, 'No', 'TN', 'TUN', '788', 256, 1),
(215, 'No', 'TR', 'TUR', '792', 256, 1),
(216, 'No', 'TM', 'TKM', '795', 256, 1),
(217, 'No', 'TC', 'TCA', '796', 256, 1),
(218, 'No', 'TV', 'TUV', '798', 256, 1),
(219, 'No', 'UG', 'UGA', '800', 256, 1),
(220, 'No', 'UA', 'UKR', '804', 256, 1),
(221, 'No', 'AE', 'ARE', '784', 256, 1),
(222, 'Yes', 'GB', 'GBR', '826', 3, 1),
(223, 'Yes', 'US', 'USA', '840', 2, 2),
(224, 'No', 'UM', 'UMI', '581', 256, 1),
(225, 'No', 'UY', 'URY', '858', 256, 1),
(226, 'No', 'UZ', 'UZB', '860', 256, 1),
(227, 'No', 'VU', 'VUT', '548', 256, 1),
(228, 'No', 'VA', 'VAT', '336', 256, 1),
(229, 'No', 'VE', 'VEN', '862', 256, 1),
(230, 'No', 'VN', 'VNM', '704', 256, 1),
(231, 'No', 'VR', '', '', 256, 1),
(232, 'No', 'VI', 'VIR', '850', 256, 1),
(233, 'No', 'WF', 'WLF', '876', 256, 1),
(234, 'No', 'EH', 'ESH', '', 256, 1),
(235, 'No', 'YE', 'YEM', '887', 256, 1),
(236, 'No', 'YU', 'YUG', '891', 256, 2),
(237, 'No', 'CD', 'COD', '180', 23, 1),
(238, 'No', 'ZM', 'ZMB', '894', 24, 1),
(239, 'No', 'ZW', 'ZWE', '716', 25, 3),
(240, 'No', 'AP', '', '', 256, 1),
(241, 'No', 'BC', '', '', 256, 1),
(242, 'No', 'BL', '', '', 256, 1),
(243, 'No', 'CE', '', '', 26, 1),
(244, 'No', 'NN', '', '', 27, 1),
(245, 'No', 'CB', '', '', 28, 1),
(246, 'No', 'EN', '', '', 29, 1),
(247, 'No', 'ME', '', '', 30, 1),
(248, 'No', 'PO', '', '', 31, 1),
(249, 'No', 'RT', '', '', 32, 1),
(250, 'No', 'SS', '', '', 33, 1),
(251, 'No', 'SP', '', '', 34, 1),
(252, 'No', 'SF', '', '', 35, 1),
(253, 'No', 'NT', '', '', 36, 1),
(254, 'No', 'SW', '', '', 37, 1),
(255, 'No', 'SX', '', '', 38, 1),
(256, 'No', 'EU', '', '', 256, 1),
(257, 'No', 'UV', '', '', 39, 1),
(258, 'No', 'MB', '', '', 40, 1),
(259, 'No', 'TB', '', '', 41, 1),
(260, 'No', 'VL', '', '', 42, 1),
(261, 'No', 'TA', '', '', 43, 1),
(262, 'No', 'TI', '', '', 44, 1),
(263, 'No', 'TU', '', '', 45, 1),
(265, 'No', 'WK', '', '', 46, 1),
(266, 'No', 'WL', '', '', 47, 1),
(267, 'No', 'YA', '', '', 48, 1),
(268, 'No', 'ZR', '', '123', 256, 1),
(270, 'No', 'PS', 'PSE', '275', 49, 1),
(271, 'No', 'GS', 'SGS', '239', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rp_customer_country_details`
--

CREATE TABLE IF NOT EXISTS `rp_customer_country_details` (
  `countryDetailsID` int(11) NOT NULL AUTO_INCREMENT,
  `countryID` int(11) NOT NULL,
  `languageID` int(11) NOT NULL DEFAULT '1',
  `countryName` varchar(100) NOT NULL,
  PRIMARY KEY (`countryDetailsID`),
  UNIQUE KEY `countryIDLngIndex` (`countryID`,`languageID`),
  KEY `indexCountryID` (`countryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_customer_payment_transactions`
--

CREATE TABLE IF NOT EXISTS `rp_customer_payment_transactions` (
  `paymentTransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `transactionID` text,
  `customerID` int(11) NOT NULL DEFAULT '0',
  `completedDate` datetime NOT NULL,
  `extra` text,
  `paymentType` varchar(100) DEFAULT NULL,
  `paymentGateway` varchar(100) DEFAULT NULL,
  `paymentResponse` text,
  `orderSubTotal` decimal(20,5) DEFAULT '0.00000',
  `orderTotal` decimal(20,5) DEFAULT '0.00000',
  `taxAmount` decimal(20,5) DEFAULT '0.00000',
  PRIMARY KEY (`paymentTransactionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_customer_states`
--

CREATE TABLE IF NOT EXISTS `rp_customer_states` (
  `stateID` int(11) NOT NULL AUTO_INCREMENT,
  `countryID` int(11) NOT NULL,
  `stateShortName` varchar(10) NOT NULL,
  `stateStatus` enum('Active','Inactive','Delete') NOT NULL,
  PRIMARY KEY (`stateID`),
  KEY `indexCountryID` (`countryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_customer_state_details`
--

CREATE TABLE IF NOT EXISTS `rp_customer_state_details` (
  `stateDetailsID` int(11) NOT NULL AUTO_INCREMENT,
  `stateID` int(11) NOT NULL,
  `stateName` varchar(100) NOT NULL,
  `languageID` int(11) NOT NULL,
  PRIMARY KEY (`stateDetailsID`),
  UNIQUE KEY `stateIDLngIndex` (`stateID`,`languageID`),
  KEY `indexStateID` (`stateID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_customer_widget_details`
--

CREATE TABLE IF NOT EXISTS `rp_customer_widget_details` (
  `CustomerWidgetDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `widgetName` varchar(100) NOT NULL,
  `widgetType` enum('Iframe','Flash','JS') NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `languageID` int(11) NOT NULL DEFAULT '0',
  `customerWidgetContentType` enum('Text_Only','Image_Only','Image_with_Text') NOT NULL,
  `widgetColors` text NOT NULL,
  `customerWidgetCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `widgetStatus` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`CustomerWidgetDetailID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_email_templates`
--

CREATE TABLE IF NOT EXISTS `rp_email_templates` (
  `emailTempID` int(11) NOT NULL AUTO_INCREMENT,
  `refProgID` int(20) NOT NULL,
  `emailFromName` varchar(200) NOT NULL,
  `emailFromEmail` varchar(200) NOT NULL,
  `emailTemplateName` varchar(255) NOT NULL,
  `emailSendToKey` varchar(100) NOT NULL,
  `emailKey` varchar(255) NOT NULL,
  `editable` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `defaultLayout` enum('Yes','No') DEFAULT 'Yes',
  `emailSortOrder` int(11) NOT NULL DEFAULT '256',
  PRIMARY KEY (`emailTempID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `rp_email_templates`
--

INSERT INTO `rp_email_templates` (`emailTempID`, `refProgID`, `emailFromName`, `emailFromEmail`, `emailTemplateName`, `emailSendToKey`, `emailKey`, `editable`, `defaultLayout`, `emailSortOrder`) VALUES
(43, 82, 'asdfsdfdsf', 'sdfdf', '', '', '', 'Yes', 'Yes', 256),
(44, 82, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(45, 86, 'fgdgdf', 'fddfg', '', '', '', 'Yes', 'Yes', 256),
(46, 86, '', 'dfgfg', '', '', '', 'Yes', 'Yes', 256),
(47, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(48, 86, 'Pramod Kumar', 'keshripramod@gmail.com', '', '', '', 'Yes', 'Yes', 256),
(49, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(50, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(51, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(52, 86, 'Jyoti', 'rose4jyoti@gmail.com', '', '', '', 'Yes', 'Yes', 256),
(53, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(54, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(55, 86, 'Jyoti', 'rose4jyoti@gmail.com', '', '', '', 'Yes', 'Yes', 256),
(56, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(57, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(58, 86, 'test', 'test@gmail.com', '', '', '', 'Yes', 'Yes', 256),
(64, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(65, 86, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(76, 140, 'fromname', 'replyemail', '', '', '', 'Yes', 'Yes', 256),
(80, 144, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256),
(81, 146, 'vikash', '', '', '', '', 'Yes', 'Yes', 256),
(84, 147, 'Deal Life', 'info@deallife.com', '', '', '', 'Yes', 'Yes', 256);

-- --------------------------------------------------------

--
-- Table structure for table `rp_email_template_details`
--

CREATE TABLE IF NOT EXISTS `rp_email_template_details` (
  `emailTempDetID` int(11) NOT NULL AUTO_INCREMENT,
  `emailTempID` int(11) NOT NULL,
  `languageID` int(11) NOT NULL,
  `emailSubject` varchar(255) NOT NULL,
  `emailHtml` text NOT NULL,
  `emailText` text,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emailTempDetID`),
  KEY `emailTempID` (`emailTempID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `rp_email_template_details`
--

INSERT INTO `rp_email_template_details` (`emailTempDetID`, `emailTempID`, `languageID`, `emailSubject`, `emailHtml`, `emailText`, `type`) VALUES
(40, 43, 0, 'sfdsfsddsf', '<p>fdgfdgdfgfd</p>\n', NULL, NULL),
(41, 44, 0, 'Confirmation email', '<p>Enter..</p>\n', NULL, NULL),
(42, 45, 0, 'Confirmation email', '<p>Enter..</p>\n', NULL, NULL),
(44, 45, 0, 'test subject', '<p>Enter..</p>\n', NULL, NULL),
(47, 47, 0, 'Confirmation email', '<p>Bravo Enter..</p>\n', NULL, NULL),
(48, 48, 0, 'Test Compaign 16th Jan', '<p>Test compaign</p>\n', NULL, NULL),
(49, 49, 0, 'Congratulations!', '<p>Enter..</p>\n', NULL, NULL),
(50, 50, 0, 'Congratulations', '<p>Enter..</p>\n', NULL, NULL),
(52, 52, 0, 'Please Participate in Copmpaign', '<p>This is test compaingn notification</p>\n', NULL, NULL),
(54, 54, 0, 'bla bla bla', '<p>Enter..</p>\n', NULL, NULL),
(55, 55, 0, 'Please Participate in Copmpaign', '<p>Please Participate in Copmpaign</p>\n', NULL, NULL),
(56, 56, 0, 'bla bla bla', '<p>Enter..</p>\n', NULL, NULL),
(57, 57, 0, 'Confirmation email', '<p>Enter..</p>\n', NULL, NULL),
(58, 58, 0, 'test subject', '<p>Enter..</p>\n', NULL, NULL),
(63, 63, 0, '', '<p>Enter..</p>\n', NULL, NULL),
(64, 64, 0, 'Confirmation email', '<p>Bravo!</p>\n', NULL, NULL),
(65, 65, 0, 'Confirmation email', '<p>Enter..</p>\n', NULL, NULL),
(66, 66, 0, '', '<p>Enter..</p>\n', NULL, NULL),
(69, 69, 0, 'jhkjhk', '<p>Enter..</p>\n', NULL, NULL),
(70, 70, 0, '', '<p>Enter..cbvbcvbvcb</p>\n', NULL, NULL),
(71, 71, 0, 'hjh', '<p>ghjhj</p>\n', NULL, NULL),
(72, 72, 0, '', '<p>Enter..</p>\n', NULL, NULL),
(73, 73, 0, 'dfgfdg', '<p>dfgdfg</p>\n', NULL, NULL),
(76, 76, 0, 'subject1', '<p>Notification1</p>\n', NULL, NULL),
(77, 78, 0, 'suject1', '<p>d1</p>\n', NULL, NULL),
(78, 78, 0, 'suject2', '<p>d2</p>\n', NULL, NULL),
(79, 78, 0, 'subject3', '<p>s3</p>\n', NULL, NULL),
(80, 78, 0, 'suject4', '<p>s4</p>\n', NULL, NULL),
(121, 84, 0, 'Confirmation email', '<p>Enter..</p>\n', NULL, 'Campaign_entry'),
(122, 84, 0, 'Reward email', '<p>Enter..</p>\n', NULL, 'Reward_notification'),
(123, 84, 0, 'Je viens de m''inscrire a ce concours et j''ai besoin d''aide pour gagner!', '<p>Je viens de m''inscrire a ce concours et j''ai besoin d''aide pour gagner!\n\nVoici le lien pour participer: [personal_link].\n\nMerci,\n\nLuc</p>', NULL, 'Campaign_referral'),
(124, 84, 0, 'Oublies pas de t''inscrire toi aussi!', '<p>Je viens de m''inscrire a ce concours et j''ai besoin d''aide pour gagner!\n\nVoici le lien pour participer: [personal_link].\n\nMerci,\n\nLuc</p>', NULL, 'Reminder_email');

-- --------------------------------------------------------

--
-- Table structure for table `rp_email_template_sectons`
--

CREATE TABLE IF NOT EXISTS `rp_email_template_sectons` (
  `emailTempSecID` int(11) NOT NULL AUTO_INCREMENT,
  `sectionName` varchar(127) NOT NULL,
  `sectionUniqueString` varchar(127) NOT NULL,
  `languageID` int(11) NOT NULL,
  `sectionContent` text NOT NULL,
  `sectionStatus` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`emailTempSecID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_instant_rewards`
--

CREATE TABLE IF NOT EXISTS `rp_instant_rewards` (
  `instantRewardID` bigint(20) NOT NULL AUTO_INCREMENT,
  `refProgID` int(11) NOT NULL,
  `instantRewardTypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `instantRewardCode` varchar(250) NOT NULL,
  `iRewardCreateDate` datetime NOT NULL,
  `iRewardExpiryDate` datetime NOT NULL,
  `status_updated_by` enum('User','Customer','Admin') NOT NULL,
  `status_updated_date` datetime NOT NULL,
  `iRewardStatus` enum('Active','Inactive','Cancelled','Used') NOT NULL,
  `mailSendStatus` enum('Sent','Not') NOT NULL,
  `instantRewardData` blob NOT NULL,
  `linkedUserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`instantRewardID`),
  KEY `indexOrderID` (`instantRewardTypeID`),
  KEY `indexUserID` (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_instant_rewards_codes`
--

CREATE TABLE IF NOT EXISTS `rp_instant_rewards_codes` (
  `instantRewardCodeID` int(11) NOT NULL AUTO_INCREMENT,
  `instantRewardID` int(11) NOT NULL,
  `instantRewardCode` varchar(255) NOT NULL,
  `instantRewardCodeCreateDate` datetime NOT NULL,
  `instantRewardCodeStatus` enum('New','Used','Delete') NOT NULL DEFAULT 'New',
  `instantRewardStatusUpdateDate` datetime NOT NULL,
  PRIMARY KEY (`instantRewardCodeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_instant_rewards_type`
--

CREATE TABLE IF NOT EXISTS `rp_instant_rewards_type` (
  `instantRewardTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `languageID` int(11) NOT NULL,
  `instantRewardTypeName` varchar(255) NOT NULL,
  `instantRewardTypeDescription` text NOT NULL,
  PRIMARY KEY (`instantRewardTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_languages`
--

CREATE TABLE IF NOT EXISTS `rp_languages` (
  `languageID` int(11) NOT NULL AUTO_INCREMENT,
  `languageName` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `languageCode` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LanguageLCIDstring` varchar(5) NOT NULL,
  `languageLocale` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `languageImage` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `languageSortOrder` int(3) NOT NULL,
  `languageStatus` enum('Active','Inactive','Delete') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Active',
  `languageDefault` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'No',
  PRIMARY KEY (`languageID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_mail_queue_contents`
--

CREATE TABLE IF NOT EXISTS `rp_mail_queue_contents` (
  `mailQueueID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `referrerID` int(11) NOT NULL,
  `mailSubject` varchar(255) NOT NULL,
  `mailFromName` varchar(255) NOT NULL,
  `mailFromEmail` varchar(255) NOT NULL,
  `mailContent` text NOT NULL,
  `totalEmailCount` mediumint(9) NOT NULL,
  `totalRemainingCount` mediumint(9) NOT NULL,
  `mailType` varchar(255) NOT NULL,
  `mailScheduledTime` datetime NOT NULL,
  `mailQueueStatus` enum('Queued','Sent','Deleted') NOT NULL,
  PRIMARY KEY (`mailQueueID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_mail_queue_emails`
--

CREATE TABLE IF NOT EXISTS `rp_mail_queue_emails` (
  `queuedEmailsID` int(11) NOT NULL AUTO_INCREMENT,
  `emailAddress` varchar(255) NOT NULL,
  `mailQueueID` mediumint(9) NOT NULL,
  PRIMARY KEY (`queuedEmailsID`),
  KEY `idxMailQueueID` (`mailQueueID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_payment_accepted_cc`
--

CREATE TABLE IF NOT EXISTS `rp_payment_accepted_cc` (
  `cardTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `cardTypeCode` varchar(50) NOT NULL,
  `cardType` varchar(100) NOT NULL,
  `enableCVV2` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`cardTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rp_referralprog_images`
--

CREATE TABLE IF NOT EXISTS `rp_referralprog_images` (
  `referralProgImageID` int(11) NOT NULL AUTO_INCREMENT,
  `referralProgID` int(11) NOT NULL,
  `languageID` int(11) NOT NULL,
  `referralProgImage` varchar(255) NOT NULL,
  `referralProgImageOrder` int(11) NOT NULL,
  `referralProgImageStatus` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`referralProgImageID`),
  KEY `indexDealID` (`referralProgID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `rp_referralprog_images`
--

INSERT INTO `rp_referralprog_images` (`referralProgImageID`, `referralProgID`, `languageID`, `referralProgImage`, `referralProgImageOrder`, `referralProgImageStatus`) VALUES
(223, 124, 0, 'yovwf72ydyn6hfdtu1gq.jpg', 2, 'Active'),
(222, 124, 0, 'kzmtmrhtbcw8jb75gfan.jpg', 1, 'Active'),
(232, 124, 0, '4ryydbevjgmmfau0far6.jpg', 2, 'Active'),
(161, 108, 0, 'sh5kluyvgnbfheyssxkr.jpg', 2, 'Active'),
(162, 108, 0, 'rt7lhlbkzl5ohfp3bdmo.jpg', 3, 'Active'),
(163, 108, 0, 'nsmhwiz4t1d8bsaw7vas.jpg', 1, 'Active'),
(164, 108, 0, '2vgdhkxfor0ujpokygtw.jpg', 2, 'Active'),
(165, 108, 0, 'rvhvedmqmxc7owzfxblr.jpg', 3, 'Active'),
(174, 124, 0, '8z205pfqxtt4zgcu3sfm.jpg', 1, 'Active'),
(175, 124, 0, 'b0ee3szl6njgqg3gkexd.jpg', 2, 'Active'),
(224, 124, 0, '4bcqing1co2gkwjyusjo.jpg', 3, 'Active'),
(227, 140, 0, '0ohechnrbkb0ebzgxwvg.jpg', 1, 'Active'),
(225, 124, 0, 'fnsyyw26mfy1nuxaxmcr.jpg', 1, 'Active'),
(194, 127, 0, '7ef2dc6r81bube2orfx8.jpg', 1, 'Active'),
(193, 127, 0, 'haeugbacmwyonakqm3nm.jpg', 1, 'Active'),
(192, 127, 0, 'ugkiuk0vp2a8znaosgv6.jpg', 1, 'Active'),
(191, 127, 0, 'pvftl5x544nobeclfstw.jpg', 2, 'Active'),
(190, 127, 0, 'snzcd8zvolmlm4te2ndr.jpg', 1, 'Active'),
(233, 146, 0, 'inogn1c2nyebdikiiz5x.jpg', 1, 'Active'),
(234, 146, 0, 'f089p2qreevbn2bs5xka.jpg', 2, 'Active'),
(235, 147, 0, 'pa8ufldoio3irxhnqhmk.jpg', 1, 'Active'),
(236, 147, 0, 'y3iytkcfhpelefodufpw.jpg', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rp_users_referrals`
--

CREATE TABLE IF NOT EXISTS `rp_users_referrals` (
  `referralID` bigint(20) NOT NULL AUTO_INCREMENT,
  `referredByUserID` int(11) NOT NULL,
  `referredName` varchar(100) DEFAULT NULL,
  `referredEmail` varchar(100) NOT NULL,
  `referredAccountUsed` varchar(11) DEFAULT NULL COMMENT 'Which accoutn was used (Hotmail, Facebook, Gmail, ...)',
  `referralStatus` enum('Pending','Registered','Deleted','Locked') NOT NULL,
  `referredOnDate` timestamp NULL DEFAULT NULL,
  `LastActDate` datetime NOT NULL,
  `sent_status` varchar(11) DEFAULT '0',
  `campaign_id` varchar(21) DEFAULT NULL,
  PRIMARY KEY (`referralID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `rp_users_referrals`
--

INSERT INTO `rp_users_referrals` (`referralID`, `referredByUserID`, `referredName`, `referredEmail`, `referredAccountUsed`, `referralStatus`, `referredOnDate`, `LastActDate`, `sent_status`, `campaign_id`) VALUES
(1, 275, 'luc.chateauvert@sidel.com', 'luc.chateauvert@sidel.com', NULL, 'Pending', '2014-05-22 04:39:24', '0000-00-00 00:00:00', '0', '147'),
(2, 275, '5147043898@txt.bell.ca', '5147043898@txt.bell.ca', NULL, 'Pending', '2014-05-22 04:39:25', '0000-00-00 00:00:00', '0', '147'),
(3, 275, 'satrndbg.robot@sidel.com', 'satrndbg.robot@sidel.com', NULL, 'Pending', '2014-05-22 04:39:26', '0000-00-00 00:00:00', '0', '147'),
(4, 275, 'j.olszewska@mz.gov.pl', 'j.olszewska@mz.gov.pl', NULL, 'Pending', '2014-05-22 04:39:28', '0000-00-00 00:00:00', '0', '147'),
(5, 275, 'Luc Chateauvert', 'lchateauvert@ra.rockwell.com', NULL, 'Pending', '2014-05-22 04:39:29', '0000-00-00 00:00:00', '0', '147'),
(6, 275, 'martin.chateauvert@infoteck.qc.ca', 'martin.chateauvert@infoteck.qc.ca', NULL, 'Pending', '2014-05-22 04:39:31', '0000-00-00 00:00:00', '0', '147'),
(7, 276, 'gaiaana@hotmail.com', 'gaiaana@hotmail.com', NULL, 'Pending', '2014-05-22 04:40:19', '0000-00-00 00:00:00', '0', '147'),
(8, 276, 'luc.chateauvert@hotmail.com', 'luc.chateauvert@hotmail.com', NULL, 'Pending', '2014-05-22 04:40:20', '0000-00-00 00:00:00', '0', '147'),
(9, 276, 'Luc Chateauvert', 'luc.chateauvert75@gmail.com', NULL, 'Registered', NULL, '0000-00-00 00:00:00', '0', '147'),
(10, 277, 'l chateauv', 'l_chateauv@hotmail.com', NULL, 'Pending', '2014-05-22 04:41:49', '0000-00-00 00:00:00', '0', '147'),
(11, 277, 'Etienne Pilon', 'etienne@hete.ca', NULL, 'Pending', '2014-05-22 04:41:50', '0000-00-00 00:00:00', '0', '147'),
(12, 275, 'Alexis Guevara', 'aguevaramel@yahoo.com', NULL, 'Pending', '2014-06-08 00:19:42', '0000-00-00 00:00:00', '0', '147'),
(13, 275, 'Etienne Pilon', 'etienne@hete.ca', NULL, 'Pending', '2014-06-08 00:19:43', '0000-00-00 00:00:00', '0', '147'),
(14, 275, 'Fred Lecavalier', 'flecavalier@hotmail.com', NULL, 'Pending', '2014-06-08 00:19:45', '0000-00-00 00:00:00', '0', '147'),
(15, 275, 'Josée St-Onge', 'jostonge123@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(16, 275, 'Caroline Picard', 'caroline.picard@eurekalighting.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(17, 275, 'Karyn Valencia', 'valenciavalenciagk@gmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(18, 275, 'Ronald Estrade', 'restrade@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(19, 275, 'Maxime Chateauvert', 'max.chateauvert@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(20, 275, 'Etienne Pilon', 'etienne@hete.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(21, 275, 'tine_richard@hotmail.com', 'tine_richard@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(22, 275, 'tonys Valencia Menjivar', 'valencia11650@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(23, 275, 'Gusybea .', 'gusybea@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(24, 275, 'Beatriz Mendiondo', 'beatriz707@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(25, 275, 'hchateauvert@hotmail.com', 'hchateauvert@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(26, 275, 'Tania Leon Soto', 'tanialsoto@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(27, 275, 'sbourque@sodet.com', 'sbourque@sodet.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(28, 275, 'Raynald Potvin', 'fugitif19@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(29, 275, 'Joel Laliberte', 'joel_laliberte@videotron.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(30, 275, 'Guy Cote', 'gc_ragmsmtl@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(31, 275, 'Benoit Pinsonneault', 'pin_ben@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(32, 275, 'David Hymers', 'djhymers@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(33, 275, 'registraire.info@hec.ca', 'registraire.info@hec.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(34, 275, 'ysoccio@gmail.com', 'ysoccio@gmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(35, 275, 'Sylvain Fréchette', 'sylvainfrechette72@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(36, 275, 'fredmdu@yahoo.fr', 'fredmdu@yahoo.fr', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(37, 275, 'guylaine.richard@hotmail.com', 'guylaine.richard@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(38, 275, 'richardc@yahoo-inc.com', 'richardc@yahoo-inc.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(39, 275, 'frederic.mondou@sidel.com', 'frederic.mondou@sidel.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(40, 275, 'Chateauvert', 'hchateauvert@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(41, 275, 'Martin Senechal', 'senechal_martin@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(42, 275, 'Julie B', 'bronzee007@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(43, 275, 'Christian Boucher', 'christian_boucher@videotron.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(44, 275, 'Grady Karyn Valencia', 'cielo_grady@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(45, 275, 'hamelfj@gmail.com', 'hamelfj@gmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(46, 275, 'Javier Rodriguez', 'jrodriguez@synergx.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(47, 275, 'Fred M', 'fredmdu@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(48, 275, 'dye marcoux', 'dyemarcoux@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(49, 275, 'Michelle Lepage', 'spamichelle@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(50, 275, 'Kate Leadbeater', 'kateleadbeater@globalive.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(51, 275, 'The Phong', 'nguyenthe_phong@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(52, 275, 'Olivier', 'op_ragmsmtl@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(53, 275, 'jessy.milette@gmail.com', 'jessy.milette@gmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(54, 275, 'Martin Châteauvert', 'chateauve@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(55, 275, 'Alain Cholette', 'alain.cholette@sidel.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(56, 275, 'Mi Audet', 'nota_minima@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(57, 275, 'Emmanuel Jolly', 'manu_eit@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(58, 275, 'Alain Cholette', 'acholette@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(59, 275, 'christian.boucher@sidel.com', 'christian.boucher@sidel.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(60, 275, 'line.fiset@cegeptr.qc.ca', 'line.fiset@cegeptr.qc.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(61, 275, 'dany denoncourt', 'danydenoncourt@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(62, 275, 'ruthl@videotron.ca', 'ruthl@videotron.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(63, 275, 'Helene Richard', 'hrichard1946@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(64, 275, 'christina.azzie@sisystems.com', 'christina.azzie@sisystems.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(65, 275, 'Eric Genest', 'draggoon008@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(66, 275, 'luc.chateauvert@sarix.ca', 'luc.chateauvert@sarix.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(67, 275, 'Raynald Potvin', 'raynald_potvin_2006@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(68, 275, 'stedurand@hotmail.com', 'stedurand@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(69, 275, 'stephane', 'stephane_therrien@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(70, 275, 'Stephan sd. Durand', 'sdurand@devalcombustion.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(71, 275, 'valenciavalenciagk@yahoo.es', 'valenciavalenciagk@yahoo.es', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(72, 275, 'Stephane Therrien', 'stherrien@draxis.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(73, 275, 'jeansebastiencloutier@radio-canada.ca', 'jeansebastiencloutier@radio-canada.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(74, 275, 'Simon St-Pierre', 'simonst_pierre@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(75, 275, 'Sebastien Boulay', 'seboulay@videotron.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(76, 275, 'd.martel@entrepriseslcd.com', 'd.martel@entrepriseslcd.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(77, 275, 'Melanie Boulianne', 'melbou@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(78, 275, 'gratton.alain@ic.gc.ca', 'gratton.alain@ic.gc.ca', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(79, 275, 'monique.mcclemens@ca.crl.com', 'monique.mcclemens@ca.crl.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(80, 275, 'janick.marion@pfizer.com', 'janick.marion@pfizer.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(81, 275, 'thephong.nguyen@sidel.com', 'thephong.nguyen@sidel.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(82, 275, 'Jeremy Porcher', 'porcherjeremy@yahoo.fr', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(83, 275, 'Debbie Mongrain', 'marmott_trd@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(84, 275, 'Phil Richard', 'pil13rt3@hotmail.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(85, 275, 'habacon@excelpro.net', 'habacon@excelpro.net', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147'),
(86, 275, 'Isabelle Nelson', 'inelson@labanquedepersonnel.com', NULL, 'Pending', '2014-06-08 00:20:05', '0000-00-00 00:00:00', '0', '147');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE IF NOT EXISTS `sociallinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `facebook`, `twitter`, `linkedin`, `created`, `modified`) VALUES
(4, 'http://codecanyon.net/user/WeCreateUK', 'http://codecanyon.net/user/WeCreateUK', 'http://codecanyon.net/user/WeCreateUK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE IF NOT EXISTS `supports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `user_id`, `title`, `message`, `created`, `modified`) VALUES
(1, 38, 'fdgtfdgtfdg', 'gdgdg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 38, 'fgfdgfdg', 'gdfg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 38, 'check ', 'this is a tesring message.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 38, 'gfrbdf', 'dfbdfbd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 38, 'test', 'this is a final message for testing .', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `customerName` varchar(127) NOT NULL,
  `customerKey` varchar(127) NOT NULL,
  `customerAddress1` varchar(127) NOT NULL,
  `customerAddress2` varchar(127) NOT NULL,
  `customerCity` varchar(127) NOT NULL,
  `customerStateProvID` varchar(127) NOT NULL,
  `customerCountryID` varchar(127) NOT NULL,
  `customerCFirstName` varchar(127) NOT NULL,
  `customerCLastName` varchar(127) NOT NULL,
  `customerPhone` varchar(127) NOT NULL,
  `customerZip` varchar(127) NOT NULL,
  `customerWebsite` varchar(127) NOT NULL,
  `customerAddedDate` varchar(127) NOT NULL,
  `customerStatus` varchar(127) NOT NULL,
  `customerDefaultLanguageID` varchar(127) NOT NULL,
  `customerUpdateDate` varchar(127) NOT NULL,
  `loginLockedDate` varchar(127) NOT NULL,
  `loginInvalidAccessCount` varchar(127) NOT NULL,
  `userParticipantCode` varchar(127) NOT NULL,
  `userFirstName` varchar(127) NOT NULL,
  `userLastName` varchar(127) NOT NULL,
  `userPhone` varchar(127) NOT NULL,
  `userRegistredDate` varchar(127) NOT NULL,
  `userLastAccessed` varchar(127) NOT NULL,
  `userAdress1` varchar(127) NOT NULL,
  `userAdress2` varchar(127) NOT NULL,
  `userCity` varchar(127) NOT NULL,
  `countryID` varchar(127) NOT NULL,
  `stateID` varchar(127) NOT NULL,
  `userZip` varchar(127) NOT NULL,
  `userReferralPURL` varchar(127) NOT NULL,
  `userProfilePicture` varchar(127) NOT NULL,
  `userReferralID` varchar(127) NOT NULL,
  `userDOB` varchar(127) NOT NULL,
  `userInvalidAccessCount` varchar(127) NOT NULL,
  `userDefaultLanguage` varchar(127) NOT NULL,
  `userLockedDate` varchar(127) NOT NULL,
  `userStatus` varchar(127) NOT NULL,
  `userGender` varchar(127) NOT NULL,
  `userLoginType` varchar(127) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `modified` date DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `customerName`, `customerKey`, `customerAddress1`, `customerAddress2`, `customerCity`, `customerStateProvID`, `customerCountryID`, `customerCFirstName`, `customerCLastName`, `customerPhone`, `customerZip`, `customerWebsite`, `customerAddedDate`, `customerStatus`, `customerDefaultLanguageID`, `customerUpdateDate`, `loginLockedDate`, `loginInvalidAccessCount`, `userParticipantCode`, `userFirstName`, `userLastName`, `userPhone`, `userRegistredDate`, `userLastAccessed`, `userAdress1`, `userAdress2`, `userCity`, `countryID`, `stateID`, `userZip`, `userReferralPURL`, `userProfilePicture`, `userReferralID`, `userDOB`, `userInvalidAccessCount`, `userDefaultLanguage`, `userLockedDate`, `userStatus`, `userGender`, `userLoginType`, `logins`, `modified`, `role`, `created`, `last_login`) VALUES
(16, 'chateauv', 'f19e16fcb7e3df4b4eef2fb7a12e02e895ff0d9427b6c09b7266b4733dc72652', 'l_chateauv@hotmail.com', 'Referral Prog', '', '1234, Street', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, NULL, NULL, NULL, 1379602699),
(30, 'vikashkeshri31', 'b040fc06fec791f62d6e48794c98e923e4172a5e2ada47557bc142bc73e7d917', '', '', '', '', '', '', '', '', 'vikash', 'kumar', '', '', 'www.website.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, NULL, 1383223442),
(36, 'vikash@gmail.com', 'f3d85a2745f938a6ce2e25738a642c3ea4361a2ffeec3d1ad482ad7c35bb57a7', '', '', '', '', '', '', '', '', 'fdsgdfdf', 'fdbdf', '', '', 'fdhgdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, NULL, NULL, NULL, 1383310276),
(37, 'l_chateauv@hotmail.com', 'f3d85a2745f938a6ce2e25738a642c3ea4361a2ffeec3d1ad482ad7c35bb57a7', '', 'Deal Life', '', 'street name', '', 'City', 'QC', 'Canada', 'Luc', 'Greencastle', '', '', 'www.deallife.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 134, NULL, NULL, NULL, 1403555519),
(38, 'developer@gmail.com', 'f3d85a2745f938a6ce2e25738a642c3ea4361a2ffeec3d1ad482ad7c35bb57a7', '', 'jyoti', '', 'mohali 70', 'dfvfd', 'fdvf', 'vfdvdf', 'vdf', 'rajan', 'kumar', 'fgsnvjfdf', '', 'www.tour2bhopal.in', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 240, NULL, '', NULL, 1396244355),
(39, 'pk2209@gmail.com', 'f3d85a2745f938a6ce2e25738a642c3ea4361a2ffeec3d1ad482ad7c35bb57a7', '', '', '', '', '', '', '', '', 'pramod', 'kr', '', '', 'www.softoasistech.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, NULL, 1384344421),
(40, 'admin@gmail.com', 'f3d85a2745f938a6ce2e25738a642c3ea4361a2ffeec3d1ad482ad7c35bb57a7', '', '', '', '', '', '', '', '', 'admin', 'admin', '', '', 'www', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, NULL, 'admin', NULL, 1389079731),
(41, 'rose4jyoti@gmail.com', 'f3d85a2745f938a6ce2e25738a642c3ea4361a2ffeec3d1ad482ad7c35bb57a7', '', '', '', '', '', '', '', '', 'jyoti', 'kr', '', '', 'www.softoasistech.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 13, NULL, NULL, NULL, 1392122310);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
