-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Jun 2013 um 16:12
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `schlosslauf1`
--

DROP DATABASE IF EXISTS `schlosslauf1`;
CREATE DATABASE `schlosslauf1`;
USE `schlosslauf1`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE `login` (
  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `groups` (
	`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `countrys` (
	`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` varchar (50)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `languages` (
	`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `inscription` (
	`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`lastname` varchar(50) NOT NULL,
	`firstname` varchar(50) NOT NULL,
	`street` varchar(100) NOT NULL,
	`place` varchar(100) NOT NULL,
	`postcode` varchar(10) NOT NULL,
	`email` varchar(200) NOT NULL,
	`group_fk` int NOT NULL,
	`country_fk` int NOT NULL,
	`language_fk` int NOT NULL,
	FOREIGN KEY (group_fk) REFERENCES groups(ID),
	FOREIGN KEY (country_fk) REFERENCES countrys(ID),
	FOREIGN KEY (language_fk) REFERENCES languages(ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('test', '$2y$10$iQdhXS3CXR0obleLbxHWWOQnPjTpg53qXOwj162Vo14O3XQGmlN1.');

INSERT INTO `groups` (`name`) VALUES ("A");
INSERT INTO `groups` (`name`) VALUES ("B");
INSERT INTO `groups` (`name`) VALUES ("C");

INSERT INTO `countrys` (`name`) VALUES ("Schweiz");
INSERT INTO `countrys` (`name`) VALUES ("Deutschland");
INSERT INTO `countrys` (`name`) VALUES ("Frankreich");
INSERT INTO `countrys` (`name`) VALUES ("Italien");

INSERT INTO `languages` (`name`) VALUES ("Deutsch");
INSERT INTO `languages` (`name`) VALUES ("Französisch");
INSERT INTO `languages` (`name`) VALUES ("Italienisch");
INSERT INTO `languages` (`name`) VALUES ("Englisch");

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
