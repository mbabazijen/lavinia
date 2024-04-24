-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2024 at 07:30 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainess_ass_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `marks_id` int NOT NULL AUTO_INCREMENT,
  `trainee_id` int NOT NULL,
  `trade_id` int NOT NULL,
  `module_id` int NOT NULL,
  `user_id` int NOT NULL,
  `formative_ass` float NOT NULL,
  `summative_ass` float NOT NULL,
  `comprehensive_ass` float NOT NULL,
  `total_marks_100` float NOT NULL,
  PRIMARY KEY (`marks_id`),
  KEY `trainee_id` (`trainee_id`),
  KEY `trade_id` (`trade_id`),
  KEY `module_id` (`module_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int NOT NULL AUTO_INCREMENT,
  `modname` varchar(50) NOT NULL,
  `madcredits` varchar(50) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

DROP TABLE IF EXISTS `trade`;
CREATE TABLE IF NOT EXISTS `trade` (
  `trade_id` int NOT NULL AUTO_INCREMENT,
  `trade_name` varchar(50) NOT NULL,
  PRIMARY KEY (`trade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

DROP TABLE IF EXISTS `trainee`;
CREATE TABLE IF NOT EXISTS `trainee` (
  `trainee_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `trade_id` int NOT NULL,
  PRIMARY KEY (`trainee_id`),
  KEY `trade_id` (`trade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `UserName`, `Password`) VALUES
(1, 'jean', '123'),
(2, 'claude', '123'),
(3, 'ishimweeva', '2024');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
