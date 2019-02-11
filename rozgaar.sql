-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 03:44 AM
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
(1, 'Hello', 'Hello', 'Hello', 'Hello', 'Gujarat', '382024', 'abc@gmail.com', '9999988888', '9999988888', 'HELLO', 'HELLO');

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
(7, 'hello', 'abc@gmail.com', 'asdfgh123456', '1234567890', '1234567890123874', 'ritul', 'hello'),
(8, 'Ritul Chavda', 'ritulchavda.rsc@gmail.com', 'Gandhinagar', '9714710162', '9999888877776666', 'ritul', 'ritul');

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

--
-- Dumping data for table `individualtable`
--

INSERT INTO `individualtable` (`Sr. No.`, `Name`, `Email`, `Phone`, `Aadhar`, `Skill`, `Username`, `Password`) VALUES
(1, 'ritul', 'abc@gmail.com', '9714710162', '1234567890123456', 'PHP and HTML', 'hello', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companytable`
--
ALTER TABLE `companytable`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- Indexes for table `individualtable`
--
ALTER TABLE `individualtable`
  ADD PRIMARY KEY (`Sr. No.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companytable`
--
ALTER TABLE `companytable`
  MODIFY `Sr. No.` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `Sr. No.` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `individualtable`
--
ALTER TABLE `individualtable`
  MODIFY `Sr. No.` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
