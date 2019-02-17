-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 11:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
-- Table structure for table `companytable`
--

CREATE TABLE `companytable` (
  `Sr. No.` int(225) NOT NULL,
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

INSERT INTO `companytable` (`Sr. No.`, `Name`, `OwnerName`, `Address`, `City`, `State`, `Pincode`, `Email`, `Phone`, `CRN`, `Username`, `Password`) VALUES
(0, 'abc', 'abc', 'abc', 'abc', 'Dadra and Nagar Haveli', '382014', 'ritulchavda@yahoo.com', '9999988888', '9999988888', 'ritul', 'ritul');

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
(1, 'ritul', 'ritul', 10, 'ritul');

--
-- Indexes for dumped tables
--

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
