-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2015 at 04:21 PM
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
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`accountId`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_Accounts_Profiles_idx` (`Profiles_profileId`),
  KEY `streamKey` (`streamKey`(255)),
  KEY `email_2` (`email`),
  KEY `q1` (`q1`),
  KEY `q2` (`q2`),
  KEY `q3` (`q3`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`accountId`, `username`, `password`, `email`, `registerDate`, `DOB`, `canStream`, `Profiles_profileId`, `streamKey`, `q1`, `q2`, `q3`, `deleted`) VALUES
(3, 'test', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'test', '2015-02-05 05:00:00', '2015-02-11', 1, 1, 'sdhsfdghfshjsfjfjfjfsj34556', NULL, NULL, NULL, 0),
(24, 'sburlington6', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'sburlington6@yahoo.com', '2015-03-18 00:43:30', '2015-03-01', 1, 16, 'Gd6Zuk65KMEr3h5wt3gh', NULL, NULL, NULL, 0),
(41, '12345678', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'sburlington6@yahoo.co', '2015-03-18 01:10:42', '2015-03-01', 1, 20, 'H1omMU55QKK2gZtqQBS0', NULL, NULL, NULL, 0),
(42, 'ctchartest', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'erg@aerinpa.com', '2015-03-20 13:31:53', '1992-07-17', 1, 21, 'w9sZOUC3eCfYqeWJYLyn', NULL, NULL, NULL, 0),
(43, 'dave-sama', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'decdavid@ymail.com', '2015-03-20 14:08:16', '1993-03-22', 1, 22, 'aSMQSMa4dpRqWow4ezGL', NULL, NULL, NULL, 0),
(48, 'testdfgh6rt', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'dsfhgdsshf@shsdhf.sfsdfietgrf', '2015-04-13 23:36:03', '2015-04-15', 1, 23, '39UorqByDLSK28obx619', NULL, NULL, NULL, 0),
(49, 'testsfhfjf', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'dfjdjfgjfdjgfjhdfgjd@dsf.sadf', '2015-04-19 01:56:03', '2015-04-08', 1, 24, 'o3j60BAJKqz4ceExtfE8', NULL, NULL, NULL, 0),
(50, 'testadthsdtfghjfgg', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'zdfahdgs@dfj.gcdk', '2015-04-19 01:57:52', '2015-04-14', 1, 25, 'bbWjnfk4GabQaakDrY8R', NULL, NULL, NULL, 0),
(51, 'testadthsdtfghjfgggf', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'zdfahdgs@dfj.gcdkf', '2015-04-19 01:59:58', '2015-04-14', 1, 26, 'zDcPE1k2sGTyOBu65efW', NULL, NULL, NULL, 0),
(52, 'testadthsdtfghjfgggff', '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq', 'zdfahdgs@dfj.gcdkff', '2015-04-19 02:00:32', '2015-04-14', 1, 27, '57RDAkeLoe1w7AAmQyKg', NULL, NULL, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=223 ;

--
-- Dumping data for table `Favorites`
--

INSERT INTO `Favorites` (`favId`, `favoritorAccountId`, `favoritedAccountId`, `favoritedTime`) VALUES
(45, 42, 43, '2015-03-20 14:12:44'),
(120, 41, 3, '2015-04-01 04:52:06'),
(176, 3, 49, '2015-04-24 19:15:33'),
(177, 3, 52, '2015-04-24 19:15:33'),
(178, 3, 48, '2015-04-24 19:15:34'),
(211, 3, 24, '2015-04-26 01:14:32'),
(212, 3, 42, '2015-04-26 01:14:51'),
(213, 3, 51, '2015-04-26 01:14:55'),
(220, 3, 43, '2015-04-26 01:44:06'),
(222, 3, 41, '2015-04-28 20:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `sentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `fromDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `toDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `archived` tinyint(4) NOT NULL DEFAULT '0',
  `messageRead` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`messageId`),
  KEY `toId` (`toId`),
  KEY `fromId` (`fromId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`messageId`, `sentTime`, `fromId`, `toId`, `subject`, `message`, `fromDeleted`, `toDeleted`, `archived`, `messageRead`) VALUES
(7, '2015-03-21 01:41:59', 41, 3, 'test', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 0, 0, 0, 0),
(8, '2015-03-21 01:42:13', 24, 3, 'test', 'test', 0, 0, 0, 0),
(9, '2015-03-25 01:09:43', 3, 41, 'test modals', 'yes modals are tested', 0, 0, 0, 0),
(10, '2015-03-25 01:10:22', 3, 42, 'testing', 'this is a message', 0, 0, 0, 0),
(31, '2015-03-30 23:34:59', 41, 3, 'test tet', 'sdradhfjmfjnmfgjjmkuhuhjikguiyhk', 0, 0, 0, 0),
(33, '2015-03-30 23:35:08', 41, 3, 'test tet', 'sdradhfjmfjnmfgjjmkuhuhjikguiyhk', 0, 0, 0, 0),
(35, '2015-03-30 23:35:22', 41, 3, 'test tet', 'sdradhfjmfjnmfgjjmkuhuhjikguiyhk', 0, 0, 0, 0),
(36, '2015-03-31 04:25:05', 3, 3, 'djhljhlhjljl', 'hjklhhlhjlhjlhjlhlhjl', 0, 0, 0, 0),
(37, '2015-03-31 04:26:02', 3, 3, 'djhljhlhjljl', 'hjklhhlhjlhjlhjlhlhjl', 0, 0, 0, 0),
(38, '2015-03-31 04:30:02', 3, 3, 'dhdhyh', 'fgfh', 0, 0, 0, 0),
(39, '2015-03-31 04:30:07', 3, 3, 'dhdhyh', 'fgfh', 0, 0, 0, 0),
(41, '2015-03-31 04:30:09', 3, 3, 'dhdhyh', 'fgfh', 0, 0, 0, 0),
(42, '2015-03-31 04:30:47', 3, 3, 'dhdhyh', 'fgfh', 0, 0, 0, 0),
(43, '2015-03-31 04:30:52', 3, 3, 'dhdhyh', 'fgfh', 0, 0, 0, 0),
(47, '2015-03-31 04:34:01', 3, 3, 'fhfddh', 'hfdhdfhd', 0, 0, 0, 0),
(48, '2015-03-31 04:34:18', 3, 3, 'dfgh', 'dfghdfh', 0, 0, 0, 0),
(49, '2015-04-28 19:57:03', 3, 3, 'testing messages', 'this is a test and only a test', 0, 0, 0, 0),
(50, '2015-04-28 20:17:52', 3, 3, 'Test redirects', 'this is a test ', 0, 0, 0, 0),
(51, '2015-04-28 20:19:05', 3, 3, 'Still testing redircts', 'hello there', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Profile_views`
--

CREATE TABLE IF NOT EXISTS `Profile_views` (
  `viewId` int(11) NOT NULL AUTO_INCREMENT,
  `profileId` int(11) NOT NULL,
  `viewerId` int(11) DEFAULT NULL,
  `ipAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`viewId`),
  UNIQUE KEY `unique_view_viewer` (`profileId`,`viewerId`),
  UNIQUE KEY `unique_view_all` (`profileId`,`viewerId`,`ipAddress`),
  KEY `profileId` (`profileId`),
  KEY `viewerId` (`viewerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `Profile_views`
--

INSERT INTO `Profile_views` (`viewId`, `profileId`, `viewerId`, `ipAddress`) VALUES
(1, 1, 3, '1.1.1.1'),
(59, 1, 24, '127.0.0.1'),
(74, 16, 3, '127.0.0.1'),
(118, 16, 24, '127.0.0.1'),
(77, 20, 3, '127.0.0.1'),
(10, 21, 3, '127.0.0.1'),
(15, 21, 24, '127.0.0.1'),
(65, 22, 3, '127.0.0.1'),
(60, 22, 24, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `Profiles`
--

CREATE TABLE IF NOT EXISTS `Profiles` (
  `profileId` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `Accounts_accountId` int(11) NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`profileId`),
  UNIQUE KEY `Accounts_accountId` (`Accounts_accountId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Profiles`
--

INSERT INTO `Profiles` (`profileId`, `language`, `bio`, `Accounts_accountId`, `country`, `url`) VALUES
(1, 'english', 'This is a where a bio would go... if I had one.', 3, 'USA!', 'http://www.google.com'),
(16, 'english', 'bios are cool!', 24, 'USA', 'test.com'),
(20, NULL, NULL, 41, NULL, NULL),
(21, NULL, NULL, 42, NULL, NULL),
(22, NULL, NULL, 43, NULL, NULL),
(23, NULL, NULL, 48, NULL, NULL),
(24, NULL, NULL, 49, NULL, NULL),
(25, NULL, NULL, 50, NULL, NULL),
(26, NULL, NULL, 51, NULL, NULL),
(27, NULL, NULL, 52, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Security_questions`
--

CREATE TABLE IF NOT EXISTS `Security_questions` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Security_questions`
--

INSERT INTO `Security_questions` (`qId`, `question`) VALUES
(1, 'What was the last name of your third grade teacher?'),
(2, 'What was the name of the boy/girl you had your second kiss with?'),
(3, 'Where were you when you had your first alcoholic drink (or cigarette)?'),
(4, 'What was the name of your second pet?'),
(5, 'Where were you when you had your first kiss?'),
(6, 'When you were young, what did you want to be when you grew up?'),
(7, 'Where were you when you first heard about 9/11?'),
(8, 'Where were you New Year''s 2000?'),
(9, 'What''s your youngest Sibling''s middle name?'),
(10, 'Who was your childhood hero?'),
(11, 'What is your Favorite Flavor of Ice Cream?'),
(12, 'What was the name of your Great Great Grandfather''s best friend?'),
(13, 'How much wood could a woodchuck chuck if a woodchuck could chuck wood?'),
(14, 'What is the average air speed velocity of a laden Swallow?'),
(15, 'How many miles per gallon does your car get?'),
(16, 'Train A, traveling 70 miles per hour (mph), leaves Westford heading toward Eastford, 260 miles away. At the same time Train B, traveling 60 mph, leaves Eastford heading toward Westford. When do the two trains meet?'),
(17, 'What is your least favorite color?'),
(18, 'A Software Engineer, IT manager, Chemist, and Dog Sitter walk into a bar. What is the name of the bar?'),
(19, 'What is your favorite drink?'),
(20, 'Math or Meth? If both, why?');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD CONSTRAINT `Accounts_ibfk_1` FOREIGN KEY (`q1`) REFERENCES `Security_questions` (`qId`),
  ADD CONSTRAINT `Accounts_ibfk_2` FOREIGN KEY (`q2`) REFERENCES `Security_questions` (`qId`),
  ADD CONSTRAINT `Accounts_ibfk_3` FOREIGN KEY (`q3`) REFERENCES `Security_questions` (`qId`),
  ADD CONSTRAINT `fk_Accounts_Profiles` FOREIGN KEY (`Profiles_profileId`) REFERENCES `Profiles` (`profileId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`posterAccountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`profileId`) REFERENCES `Profiles` (`profileId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comments_ibfk_3` FOREIGN KEY (`parentId`) REFERENCES `Comments` (`commentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Favorites`
--
ALTER TABLE `Favorites`
  ADD CONSTRAINT `Favorites_ibfk_1` FOREIGN KEY (`favoritorAccountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Favorites_ibfk_2` FOREIGN KEY (`favoritedAccountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`fromId`) REFERENCES `Accounts` (`accountId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`toId`) REFERENCES `Accounts` (`accountId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Profile_views`
--
ALTER TABLE `Profile_views`
  ADD CONSTRAINT `Profile_views_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profiles` (`profileId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Profile_views_ibfk_2` FOREIGN KEY (`viewerId`) REFERENCES `Accounts` (`accountId`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Profiles`
--
ALTER TABLE `Profiles`
  ADD CONSTRAINT `fk_Profiles_Accounts1` FOREIGN KEY (`Accounts_accountId`) REFERENCES `Accounts` (`accountId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
