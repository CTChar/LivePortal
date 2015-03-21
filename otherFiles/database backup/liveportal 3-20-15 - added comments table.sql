-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2015 at 07:25 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `liveportal`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `aAndP`
--
CREATE TABLE IF NOT EXISTS `aAndP` (
`accountId` int(11)
,`username` varchar(45)
,`password` varchar(255)
,`email` varchar(100)
,`registerDate` timestamp
,`DOB` date
,`canStream` tinyint(1)
,`Profiles_profileId` int(11)
,`streamKey` varchar(256)
,`profileId` int(11)
,`language` varchar(45)
,`bio` text
,`Accounts_accountId` int(11)
,`phone` varchar(25)
,`country` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE IF NOT EXISTS `Accounts` (
  `accountId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DOB` date NOT NULL,
  `canStream` tinyint(1) NOT NULL,
  `Profiles_profileId` int(11) DEFAULT NULL,
  `streamKey` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`accountId`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_Accounts_Profiles_idx` (`Profiles_profileId`),
  KEY `streamKey` (`streamKey`(255)),
  KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`accountId`, `username`, `password`, `email`, `registerDate`, `DOB`, `canStream`, `Profiles_profileId`, `streamKey`) VALUES
(3, 'test', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'test', '2015-02-05 05:00:00', '2015-02-11', 1, 1, 'sdhsfdghfshjsfjfjfjfsj34556'),
(24, 'sburlington6', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'sburlington6@yahoo.com', '2015-03-18 00:43:30', '2015-03-01', 1, 16, 'Gd6Zuk65KMEr3h5wt3gh'),
(41, '12345678', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'sburlington6@yahoo.co', '2015-03-18 01:10:42', '2015-03-01', 1, 20, 'H1omMU55QKK2gZtqQBS0'),
(42, 'ctchartest', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'erg@aerinpa.com', '2015-03-20 13:31:53', '1992-07-17', 1, 21, 'w9sZOUC3eCfYqeWJYLyn'),
(43, 'dave-sama', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'decdavid@ymail.com', '2015-03-20 14:08:16', '1993-03-22', 1, 22, 'aSMQSMa4dpRqWow4ezGL');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `posterAccountId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `posterAccountId` (`posterAccountId`,`profileId`),
  KEY `profileId` (`profileId`),
  KEY `parentId` (`parentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`commentId`, `posterAccountId`, `profileId`, `comment`, `parentId`) VALUES
(1, 3, 1, 'this is a comment', NULL),
(2, 24, 1, 'this is also a comment', NULL),
(3, 41, 1, 'this is a sub comment', 1),
(4, 43, 1, 'this is also a sub comment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Favorites`
--

CREATE TABLE IF NOT EXISTS `Favorites` (
  `favId` int(11) NOT NULL AUTO_INCREMENT,
  `favoritorAccountId` int(11) NOT NULL,
  `favoritedAccountId` int(11) NOT NULL,
  `favoritedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`favId`,`favoritorAccountId`),
  KEY `favoritorAccountId` (`favoritorAccountId`),
  KEY `favoritedAccountId` (`favoritedAccountId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=113 ;

--
-- Dumping data for table `Favorites`
--

INSERT INTO `Favorites` (`favId`, `favoritorAccountId`, `favoritedAccountId`, `favoritedTime`) VALUES
(45, 42, 43, '2015-03-20 14:12:44'),
(107, 3, 43, '2015-03-20 22:38:25'),
(108, 3, 24, '2015-03-20 22:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Profiles_profileId` int(11) NOT NULL,
  `itemType` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`itemId`),
  UNIQUE KEY `gameId_UNIQUE` (`itemId`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  UNIQUE KEY `itemType_UNIQUE` (`itemType`),
  KEY `fk_Games_Profiles1_idx` (`Profiles_profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Profiles`
--

CREATE TABLE IF NOT EXISTS `Profiles` (
  `profileId` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `Accounts_accountId` int(11) NOT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`profileId`),
  UNIQUE KEY `Accounts_accountId` (`Accounts_accountId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Profiles`
--

INSERT INTO `Profiles` (`profileId`, `language`, `bio`, `Accounts_accountId`, `phone`, `country`) VALUES
(1, 'english', 'This is a BIO!!!!!!!', 3, '(802) 555-5555', 'USA'),
(16, NULL, NULL, 24, NULL, NULL),
(20, NULL, NULL, 41, NULL, NULL),
(21, NULL, NULL, 42, NULL, NULL),
(22, NULL, NULL, 43, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `aAndP`
--
DROP TABLE IF EXISTS `aAndP`;

CREATE ALGORITHM=UNDEFINED DEFINER=`liveportal`@`%` SQL SECURITY DEFINER VIEW `aAndP` AS select `Accounts`.`accountId` AS `accountId`,`Accounts`.`username` AS `username`,`Accounts`.`password` AS `password`,`Accounts`.`email` AS `email`,`Accounts`.`registerDate` AS `registerDate`,`Accounts`.`DOB` AS `DOB`,`Accounts`.`canStream` AS `canStream`,`Accounts`.`Profiles_profileId` AS `Profiles_profileId`,`Accounts`.`streamKey` AS `streamKey`,`Profiles`.`profileId` AS `profileId`,`Profiles`.`language` AS `language`,`Profiles`.`bio` AS `bio`,`Profiles`.`Accounts_accountId` AS `Accounts_accountId`,`Profiles`.`phone` AS `phone`,`Profiles`.`country` AS `country` from (`Accounts` join `Profiles` on((`Profiles`.`profileId` = `Accounts`.`Profiles_profileId`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD CONSTRAINT `fk_Accounts_Profiles` FOREIGN KEY (`Profiles_profileId`) REFERENCES `Profiles` (`profileId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_3` FOREIGN KEY (`parentId`) REFERENCES `Comments` (`commentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`posterAccountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`profileId`) REFERENCES `Profiles` (`profileId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `Favorites_ibfk_1` FOREIGN KEY (`favoritorAccountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Favorites_ibfk_2` FOREIGN KEY (`favoritedAccountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `fk_Games_Profiles1` FOREIGN KEY (`Profiles_profileId`) REFERENCES `Profiles` (`profileId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Profiles`
--
ALTER TABLE `Profiles`
  ADD CONSTRAINT `fk_Profiles_Accounts1` FOREIGN KEY (`Accounts_accountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
