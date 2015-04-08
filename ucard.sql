-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 06:24 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ucard`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `postcard_uid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `comment_content` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postcard_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `discount_code_uid` varchar(20) NOT NULL,
  `postcard_uid` varchar(20) NOT NULL,
  `initial_time` datetime NOT NULL,
  `ending_time` datetime NOT NULL,
  `discount_code_number` int(11) NOT NULL,
  `discount_percentage` int(11) NOT NULL,
  PRIMARY KEY (`discount_code_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `friend_uid` varchar(20) NOT NULL,
  `postcard_friend_uid` varchar(20) NOT NULL,
  `linking_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `friend_state` int(11) NOT NULL,
  PRIMARY KEY (`friend_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postcard`
--

CREATE TABLE IF NOT EXISTS `postcard` (
  `postcard_uid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `stamp_uid` varchar(10) NOT NULL,
  `discount_code_uid` varchar(20) NOT NULL,
  `postcard_head` varchar(45) NOT NULL,
  `postcard_back` varchar(45) NOT NULL,
  `postcard_greeting` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `receiver_house_number` varchar(40) CHARACTER SET utf8 NOT NULL,
  `receiver_street` varchar(100) CHARACTER SET utf8 NOT NULL,
  `receiver_city` varchar(40) CHARACTER SET utf8 NOT NULL,
  `receiver_county` varchar(40) CHARACTER SET utf8 NOT NULL,
  `receiver_postcode` varchar(20) NOT NULL,
  `receiver_country` varchar(35) CHARACTER SET utf8 NOT NULL,
  `postcard_making_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postcard_location` varchar(20) CHARACTER SET utf8 NOT NULL,
  `postcard_quotation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `postcard_confirm_code` varchar(35) NOT NULL,
  PRIMARY KEY (`postcard_uid`),
  KEY `fk_userinfo_postcard` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE IF NOT EXISTS `receiver` (
  `postcard_uid` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `receiving_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postcard_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `record_uid` varchar(20) NOT NULL,
  `swift_number` varchar(30) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `uuid` varchar(20) NOT NULL,
  `postcard_uid` varchar(20) NOT NULL,
  `record_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_state` tinyint(4) NOT NULL,
  `sharing_state` int(11) NOT NULL DEFAULT '1',
  `total_price` int(11) NOT NULL,
  `sending_state` int(11) NOT NULL DEFAULT '0',
  `original_country` varchar(35) NOT NULL,
  `destination_country` varchar(35) NOT NULL,
  PRIMARY KEY (`record_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stamp`
--

CREATE TABLE IF NOT EXISTS `stamp` (
  `stamp_uid` varchar(10) NOT NULL,
  `postcard_uid` varchar(20) NOT NULL,
  `stamp_price` int(11) NOT NULL,
  `stamp_icon` varchar(30) NOT NULL,
  `stamp_number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stamp_uid`),
  KEY `fk_postcard_stamp` (`postcard_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `postcard_uid` varchar(20) NOT NULL,
  `like_number` int(11) NOT NULL DEFAULT '0',
  `sharing_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sharing_number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`postcard_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `uuid` varchar(20) NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL DEFAULT '1990-01-01',
  `sex` tinyint(1) NOT NULL,
  `user_nickname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ucoin` int(11) NOT NULL,
  `house_number` varchar(40) CHARACTER SET utf8 NOT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `county` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `country` varchar(35) CHARACTER SET utf8 NOT NULL,
  `user_icon` varchar(45) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `register_type` varchar(20) NOT NULL,
  `third_party_uid` varchar(100) NOT NULL,
  PRIMARY KEY (`uuid`),
  UNIQUE KEY `user_nickname` (`user_nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_postcard_comment` FOREIGN KEY (`postcard_uid`) REFERENCES `postcard` (`postcard_uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postcard`
--
ALTER TABLE `postcard`
  ADD CONSTRAINT `fk_userinfo_postcard` FOREIGN KEY (`uuid`) REFERENCES `userinfo` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `fk_postcard_receiver` FOREIGN KEY (`postcard_uid`) REFERENCES `postcard` (`postcard_uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stamp`
--
ALTER TABLE `stamp`
  ADD CONSTRAINT `fk_postcard_stamp` FOREIGN KEY (`postcard_uid`) REFERENCES `postcard` (`postcard_uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `fk_postcard_story` FOREIGN KEY (`postcard_uid`) REFERENCES `postcard` (`postcard_uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
