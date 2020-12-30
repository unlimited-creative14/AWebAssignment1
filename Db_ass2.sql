-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 07:23 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ass2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Email` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `Fname`, `Lname`, `address`, `Phone`, `Email`) VALUES
(1, NULL, NULL, '', '', ''),
(2, NULL, NULL, '', '', ''),
(3, NULL, NULL, '', '', ''),
(4, NULL, NULL, '', '', ''),
(376, 'Nguyễn Hữu', 'Kiệt', 'KTX Khu A', '0399822690', 'huukiethk2804@gmail.com'),
(7311, 'Lamborgini', 'Nguyen ', 'Huu Kiet', '0123456789', 'huukiethk2804@gmail.com'),
(8014, 'Nguyen ', 'Huu ', 'Kiet', '0123456789', 'Kiet.nguyenbk2804@hcmut.edu.vn'),
(6605240, NULL, NULL, '', '', ''),
(477464557, NULL, NULL, '', '', ''),
(533970266, NULL, NULL, '', '', ''),
(594477219, NULL, NULL, '', '', ''),
(781868515, NULL, NULL, '', '', ''),
(1013211327, NULL, NULL, '', '', ''),
(1621614655, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `contactID` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `lastaccess_time` date DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `pass`, `contactID`, `birthday`, `create_time`, `lastaccess_time`, `avatar`, `role`) VALUES
('HuuKiet', 'Kiet1234', 7311, NULL, NULL, NULL, NULL, 'user'),
('huukiethk2804', 'Kiet1234', 376, NULL, NULL, NULL, NULL, 'user'),
('khanh', 'quockhanh1', 1, NULL, NULL, NULL, NULL, 'user'),
('khanh1', 'khanh123', 4, NULL, NULL, NULL, NULL, 'user'),
('khanh123', 'Khanh123', 477464557, NULL, NULL, NULL, NULL, 'user'),
('khanh1e2', 'Khanh123', 6605240, NULL, NULL, NULL, NULL, 'user'),
('khanh@gmail.com', 'quockhanh', 3, NULL, NULL, NULL, NULL, 'user'),
('Yassuo', 'Kiet1234', 8014, NULL, NULL, NULL, NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `time_now` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`time_now`) VALUES
('2020-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `testcontroller`
--

CREATE TABLE `testcontroller` (
  `username` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testcontroller`
--

INSERT INTO `testcontroller` (`username`, `pwd`) VALUES
('abc', '123'),
('khanh', 'abc'),
('khanh', 'abc'),
('khanh', 'abc'),
('khanh', 'abc'),
('khanh', 'abc'),
('khanh', 'abc'),
('', 'dasdasd'),
('', '123'),
('', '1234'),
('khanh.ngoakatekhanh@hcmut.edu.vn', '123'),
('admin', '123'),
('admin', '123'),
('khanh123', '123'),
('dasdasdsadas', 'da'),
('dasdasdsadas', 'da'),
('dasdasdsadas', 'da'),
('1112', 'ddd'),
('dasdasda', 'dasdsada'),
('dasdasda', 'dasdsada');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `conntact_id` int(11) NOT NULL,
  `user_name` char(20) DEFAULT NULL,
  `pass` char(20) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `last_access` date DEFAULT NULL,
  `avatar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `contactID` (`contactID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`conntact_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`contactID`) REFERENCES `contact` (`contactID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
