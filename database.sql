-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.5.41-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Versie:              9.1.0.4898
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Databasestructuur van horsey wordt geschreven
CREATE DATABASE IF NOT EXISTS `horsey` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `horsey`;


-- Structuur van  tabel horsey.Error wordt geschreven
CREATE TABLE IF NOT EXISTS `Error` (
  `error_id` int(11) NOT NULL AUTO_INCREMENT,
  `error_call` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `error_description` text COLLATE utf8_bin,
  `error_link` text COLLATE utf8_bin,
  PRIMARY KEY (`error_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.Error: ~5 rows (ongeveer)
/*!40000 ALTER TABLE `Error` DISABLE KEYS */;
INSERT INTO `Error` (`error_id`, `error_call`, `error_description`, `error_link`) VALUES
	(1, 'LE1001', 'Dit account is nog niet gevalideerd.', 'validate/renew'),
	(2, 'LE1002', 'Log in is niet succesvol. Probeer het opnieuw.', NULL),
	(3, 'VLC13003', 'Validatie niet uitgevoerd in de database.', NULL),
	(4, 'VLC13001', 'Onbekende verificatienummer.', NULL),
	(5, 'VLC13002', 'Dubbele verificatienummer.', NULL);
/*!40000 ALTER TABLE `Error` ENABLE KEYS */;


-- Structuur van  tabel horsey.Login wordt geschreven
CREATE TABLE IF NOT EXISTS `Login` (
  `login_id` int(11) NOT NULL,
  `login_name` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `login_password` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `login_usertype` enum('user','owner','admin') COLLATE utf8_bin NOT NULL DEFAULT 'user',
  `login_firstlog` int(1) DEFAULT '1',
  `login_verification` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.Login: 3 rows
/*!40000 ALTER TABLE `Login` DISABLE KEYS */;
INSERT INTO `Login` (`login_id`, `login_name`, `login_password`, `login_usertype`, `login_firstlog`, `login_verification`) VALUES
	(1, 'beheer', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'owner', 1, '0'),
	(2, 'admin', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'admin', 1, '0'),
	(3, 'denniske', '4b677e345357a0015de0601c75b1b5451e9be6a4c8e8409d06885f7241044ab8', 'user', 1, '0');
/*!40000 ALTER TABLE `Login` ENABLE KEYS */;


-- Structuur van  tabel horsey.User wordt geschreven
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
  `Login_login_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Login_login_id_UNIQUE` (`Login_login_id`),
  KEY `fk_User_Login_idx` (`Login_login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel horsey.User: 3 rows
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`user_id`, `user_firstname`, `user_lastname`, `user_adress`, `user_postcode`, `user_city`, `user_state`, `user_country`, `user_telephone`, `user_email`, `Login_login_id`) VALUES
	(1, 'Fakefirst 1', 'Fakelast 1', 'Fakeadres 1', 'post 1', 'Fakecity 1', NULL, 'Netherlands', '06-12345678', 'fake1@gmail.com', 1),
	(2, 'Fakefirst 2', 'Fakelast 2', 'Fakeadres 2', 'post 2', 'Fakecity 2', '', 'Netherlands', '06-87654321', 'fake2@hotmail.com', 2),
	(3, 'Fakefirst 3', 'Fakelast 3', 'Fakeadres 3', 'post 3', 'Fakecity 3', '', 'Netherlands', '06-23456789', 'fake3@gmail.com', 3);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
