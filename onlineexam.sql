-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 12:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twlp_onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPassword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPassword`) VALUES
(1, 'farhan', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT 0,
  `option` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`id`, `quesNo`, `rightAns`, `option`) VALUES
(1, 1, 1, 'File'),
(2, 1, 0, 'Cookie'),
(3, 1, 0, 'Database'),
(4, 1, 0, 'Memory'),
(5, 2, 0, 'A database connection'),
(6, 2, 0, 'A template engine'),
(7, 2, 0, 'A database query builder'),
(8, 2, 1, 'An ORM (Object Relational Mapping)'),
(9, 3, 0, 'bbb'),
(10, 3, 1, 'vvv'),
(11, 3, 0, 'ccc'),
(12, 3, 0, 'zzz'),
(13, 4, 1, 'To store environment variables'),
(14, 4, 0, 'To store database configurations'),
(15, 4, 0, 'To store application routes'),
(16, 4, 0, 'To store user authentication information');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `quesNo`, `question`) VALUES
(1, 1, 'What is the default session driver in Laravel?'),
(2, 2, 'What is Eloquent in Laravel?'),
(6, 3, 'AAAA'),
(9, 4, 'What is the purpose of the \".env\" file in Laravel?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Md. Fahidur Rahim', 'fahidurrahim', '01701062839', 'fahidur@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Ah Rabbahi', 'rabbani', '01795175372', 'rabbani@gmail.com', '5bda62e71cd63f3f5fc2c76f9a37894f', 1),
(3, 'Nadim AL Raqib', 'nadim', '01836987416', 'nadim@gmail.com', '6301cfb4cdfe115c5a9e9cfb8b237fac', 0),
(7, 'adfad', 'asdad', '45545447', 'ffasdm@gmail.com', '0ec53c34ceb021b4c7907d31db2ff752', 0),
(8, 'adfad', 'asdad', '45545447', 'test@gmail.com', '0ec53c34ceb021b4c7907d31db2ff752', 0),
(9, 'asdasd', 'asdasd', 'asdad', 'asyyy@gmail.com', 'cead3f77f6cda6ec00f57d76c9a6879f', 0),
(10, 'asdasd', 'asdasd', 'sadad', 'qqq@gmail.com', 'cead3f77f6cda6ec00f57d76c9a6879f', 0),
(11, 'asdad', 'adad', '5441', 'ttt@gmail.com', '9b24679ee2abc8ca012ca4b07223739f', 0),
(12, 'rtrty', 'hjhb', '016757178', 'fghoo@gmail.com', '0abdcadd7d21fe3c700c7f1a8baaabdd', 0),
(13, 'rtrty', 'hjhb', '01675717', 'fgho@gmail.com', '0abdcadd7d21fe3c700c7f1a8baaabdd', 0),
(14, 'rtrty', 'hjhb', '01675717', 'fgh@gmail.com', '0abdcadd7d21fe3c700c7f1a8baaabdd', 0),
(15, 'rtrty', 'hjhb', '01675717825', 'fg@gmail.com', '0abdcadd7d21fe3c700c7f1a8baaabdd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
