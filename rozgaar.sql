-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 06:03 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rozgaar`
--

-- --------------------------------------------------------

--
-- Table structure for table `comjobrequest`
--

CREATE TABLE `comjobrequest` (
  `jobtitle` varchar(100) NOT NULL,
  `auser` varchar(100) NOT NULL,
  `accept` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comjobrequest`
--

INSERT INTO `comjobrequest` (`jobtitle`, `auser`, `accept`) VALUES
('test', 'emp', 'yes'),
('test', 'emp', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `companytable`
--

CREATE TABLE `companytable` (
  `Name` varchar(225) NOT NULL,
  `OwnerName` varchar(225) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `City` varchar(225) NOT NULL,
  `State` varchar(225) NOT NULL,
  `Pincode` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Phone` varchar(225) NOT NULL,
  `CRN` varchar(225) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companytable`
--

INSERT INTO `companytable` (`Name`, `OwnerName`, `Address`, `City`, `State`, `Pincode`, `Email`, `Phone`, `CRN`, `Username`, `Password`) VALUES
('TCS', 'Ratan Tata', 'Gandhinagar, gujarat', 'Gandhinagar', 'Gujarat', '382024', 'info@tcs.com', '9999988888', '1122334455', 'tcs', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `Sr. No.` int(225) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Aadhar` varchar(16) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`Sr. No.`, `Name`, `Email`, `Address`, `Phone`, `Aadhar`, `Username`, `Password`) VALUES
(0, 'Hello', 'hello@gmail.com', 'Hello', '9999988888', '1234567890123456', 'emp', 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `individualtable`
--

CREATE TABLE `individualtable` (
  `Sr. No.` int(225) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Aadhar` varchar(16) NOT NULL,
  `Skill` varchar(225) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postjobtable`
--

CREATE TABLE `postjobtable` (
  `Sr. No.` int(225) NOT NULL,
  `Job_Title` varchar(225) NOT NULL,
  `Job_Deadline` varchar(225) NOT NULL,
  `Amount` int(225) NOT NULL,
  `Job_Description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postjobtable`
--

INSERT INTO `postjobtable` (`Sr. No.`, `Job_Title`, `Job_Deadline`, `Amount`, `Job_Description`) VALUES
(1, 'test', '2019-03-26', 10000, 'test test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companytable`
--
ALTER TABLE `companytable`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `postjobtable`
--
ALTER TABLE `postjobtable`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postjobtable`
--
ALTER TABLE `postjobtable`
  MODIFY `Sr. No.` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
