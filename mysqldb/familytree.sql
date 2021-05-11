-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 05:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familytree`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addMember` (IN `in_fullname` VARCHAR(255), IN `in_gender` VARCHAR(255), IN `in_age` INT(11))  NO SQL
BEGIN

INSERT INTO members(fullname, gender, age)
VALUES (in_fullname, in_gender, in_age);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteMemberByID` (IN `in_id` INT(11))  NO SQL
BEGIN

DELETE FROM members WHERE id=in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMemberByID` (IN `in_id` INT(11))  NO SQL
BEGIN

SELECT * FROM members WHERE id=in_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMembers` ()  NO SQL
BEGIN

SELECT * FROM members;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMember` (IN `in_id` INT(11), IN `in_fullname` VARCHAR(255), IN `in_gender` VARCHAR(255), IN `in_age` INT(11))  NO SQL
BEGIN

UPDATE `members`
SET `fullname`=in_fullname,`gender`=in_gender,`age`=in_age WHERE id=in_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
