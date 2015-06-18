-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.5.41-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Versie:              9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Databasestructuur van horsey wordt geschreven
DROP DATABASE IF EXISTS `horsey`;
CREATE DATABASE IF NOT EXISTS `horsey` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `horsey`;


-- Structuur van  tabel horsey.Error wordt geschreven
DROP TABLE IF EXISTS `Error`;
CREATE TABLE IF NOT EXISTS `Error` (
  `error_id` int(11) NOT NULL AUTO_INCREMENT,
  `error_call` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `error_description` text COLLATE utf8_bin,
  `error_link` text COLLATE utf8_bin,
  PRIMARY KEY (`error_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.Error: 5 rows
/*!40000 ALTER TABLE `Error` DISABLE KEYS */;
INSERT INTO `Error` (`error_id`, `error_call`, `error_description`, `error_link`) VALUES
	(1, 'LE1001', 'Dit account is nog niet gevalideerd.', 'validate/renew'),
	(2, 'LE1002', 'Log in is niet succesvol. Probeer het opnieuw.', NULL),
	(3, 'VLC13003', 'Validatie niet uitgevoerd in de database.', NULL),
	(4, 'VLC13001', 'Onbekende verificatienummer.', NULL),
	(5, 'VLC13002', 'Dubbele verificatienummer.', NULL);
/*!40000 ALTER TABLE `Error` ENABLE KEYS */;


-- Structuur van  tabel horsey.Login wordt geschreven
DROP TABLE IF EXISTS `Login`;
CREATE TABLE IF NOT EXISTS `Login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_name` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `login_password` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `login_usertype` enum('user','owner','admin') COLLATE utf8_bin NOT NULL DEFAULT 'user',
  `login_status` enum('first','active','blocked','inactive') COLLATE utf8_bin NOT NULL DEFAULT 'first',
  `login_firstlog` int(1) DEFAULT '1',
  `login_verified` int(1) DEFAULT '0',
  `login_verification` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.Login: 4 rows
/*!40000 ALTER TABLE `Login` DISABLE KEYS */;
INSERT INTO `Login` (`login_id`, `login_name`, `login_password`, `login_usertype`, `login_status`, `login_firstlog`, `login_verified`, `login_verification`) VALUES
	(1, 'Dennis', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'owner', 'active', 1, 1, '0'),
	(2, 'User', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'user', 'blocked', 1, 1, '0'),
	(9, 'Fake', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'user', 'inactive', 1, 1, '0'),
	(8, 'fake3', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'admin', 'active', 1, 1, '0');
/*!40000 ALTER TABLE `Login` ENABLE KEYS */;


-- Structuur van  tabel horsey.Login_renew wordt geschreven
DROP TABLE IF EXISTS `Login_renew`;
CREATE TABLE IF NOT EXISTS `Login_renew` (
  `login_renew_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_renew_date` date NOT NULL,
  `login_renew_time` time NOT NULL,
  `Login_login_id` int(11) NOT NULL,
  PRIMARY KEY (`login_renew_id`),
  KEY `fk_Login_renew_Login1_idx` (`Login_login_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.Login_renew: 0 rows
/*!40000 ALTER TABLE `Login_renew` DISABLE KEYS */;
/*!40000 ALTER TABLE `Login_renew` ENABLE KEYS */;


-- Structuur van  tabel horsey.User wordt geschreven
DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_lastname` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_adress` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_postcode` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_city` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_state` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_country` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_telephone` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_email` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `user_creation_date` date DEFAULT NULL,
  `user_creation_time` time DEFAULT NULL,
  `Login_login_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Login_login_id_UNIQUE` (`Login_login_id`),
  KEY `fk_User_Login_idx` (`Login_login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.User: 4 rows
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`user_id`, `user_firstname`, `user_lastname`, `user_adress`, `user_postcode`, `user_city`, `user_state`, `user_country`, `user_telephone`, `user_email`, `user_creation_date`, `user_creation_time`, `Login_login_id`) VALUES
	(1, 'Dennis', 'Kuijpers', 'Zomaar', 'Zomaar24', 'Neverland', NULL, 'Netherlands', '06-98765432', 'zomaar@gmail.com', '2015-05-28', '16:58:21', 1),
	(2, 'Fakefirst 2', 'Fakelast 2', 'Fakeadres 2', 'post 2', 'Fakecity 2', '', 'Netherlands', '06-87654321', 'fake2@hotmail.com', '2015-05-28', '16:58:23', 2),
	(7, 'Fakefirst 1', 'Fakelast 1', 'Fake 1', 'post 1', 'Fakecity 1', '', 'Nederland', '06-12345678', 'Fake1@gmail.com', '2015-05-28', '16:58:26', 9),
	(6, 'Fake 3', 'Fakelast 3', 'Fakeadres 3', 'post 3', 'Fakecity 3', '', 'Netherlands', '06-23456789', 'fake3@gmail.com', '2015-05-28', '16:58:27', 8);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;


-- Structuur van  tabel horsey.User_status wordt geschreven
DROP TABLE IF EXISTS `User_status`;
CREATE TABLE IF NOT EXISTS `User_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status_previous` enum('first','active','blocked','inactive') COLLATE utf8_bin NOT NULL,
  `user_status_new` enum('first','active','blocked','inactive') COLLATE utf8_bin NOT NULL,
  `user_status_reason` text COLLATE utf8_bin NOT NULL,
  `user_status_who` int(11) NOT NULL,
  `user_status_date` date NOT NULL,
  `user_status_time` time DEFAULT NULL,
  `Login_login_id` int(11) NOT NULL,
  PRIMARY KEY (`user_status_id`),
  KEY `fk_User_status_Login1_idx` (`Login_login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.User_status: 14 rows
/*!40000 ALTER TABLE `User_status` DISABLE KEYS */;
INSERT INTO `User_status` (`user_status_id`, `user_status_previous`, `user_status_new`, `user_status_reason`, `user_status_who`, `user_status_date`, `user_status_time`, `Login_login_id`) VALUES
	(1, 'blocked', 'active', 'Dit is een test van blocked naar active', 1, '2015-05-03', '19:09:09', 9),
	(2, 'blocked', 'active', 'Dit is een test van blocked naar active', 1, '2015-05-03', '19:09:58', 9),
	(3, 'blocked', 'active', 'Dit is een test van blocked naar active', 1, '2015-05-03', '19:10:42', 9),
	(4, 'blocked', 'active', 'Dit is een test van blocked naar active met wijziging op de correcte manier', 1, '2015-05-03', '19:17:57', 9),
	(5, 'active', 'blocked', 'Dit is een test van active naar blocked', 1, '2015-05-03', '19:18:19', 9),
	(6, 'active', 'blocked', 'Zomaar een test', 1, '2015-05-03', '19:22:24', 2),
	(7, 'blocked', 'active', 'test van blocked naar active', 1, '2015-05-03', '19:27:28', 9),
	(8, 'blocked', 'inactive', 'Test van blocked naar inactive', 1, '2015-05-03', '19:27:41', 2),
	(9, 'inactive', 'active', 'Admin needs to be active', 1, '2015-05-03', '19:27:58', 8),
	(10, 'inactive', 'active', 'Status change door admin van inactive naar active', 8, '2015-05-03', '19:28:42', 2),
	(11, 'active', 'inactive', 'Status change door admin van active naar inactive', 8, '2015-05-03', '19:28:58', 9),
	(12, 'active', 'blocked', 'active to blocked by owner', 1, '2015-05-03', '23:12:04', 2),
	(13, 'inactive', 'active', 'inactive to active by owner.\r\nOp deze manier kunnen we ook gelijk de reason checken.\r\n\r\nZou nu op meerdere lijnen moeten komen te staan.', 1, '2015-05-03', '23:13:19', 9),
	(14, 'active', 'inactive', 'inactive test status\r\n\r\nIk heb de boel aangepast.\r\n\r\nHierom deze test.', 1, '2015-05-24', '18:06:22', 9);
/*!40000 ALTER TABLE `User_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
