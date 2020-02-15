-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 01:09 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_id`, `password`) VALUES
(1, 'admin', 'dd4b21e9ef71e1291183a46b913ae6f2'),
(2, 'admin', 'dd4b21e9ef71e1291183a46b913ae6f2');

-- --------------------------------------------------------

--
-- Table structure for table `addmission`
--

CREATE TABLE `addmission` (
  `id` int(11) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mem_type` varchar(40) NOT NULL,
  `mem_dur` varchar(30) NOT NULL,
  `fees` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `tax` int(5) NOT NULL,
  `total_fee` varchar(10) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `due` varchar(10) NOT NULL,
  `paid_on` varchar(30) NOT NULL,
  `pay_rec` varchar(20) NOT NULL,
  `mem_exp` varchar(20) NOT NULL,
  `days_rem` varchar(10) NOT NULL,
  `mobile_land` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addmission`
--

INSERT INTO `addmission` (`id`, `branch`, `join_date`, `name`, `gender`, `mem_type`, `mem_dur`, `fees`, `discount`, `tax`, `total_fee`, `paid`, `due`, `paid_on`, `pay_rec`, `mem_exp`, `days_rem`, `mobile_land`) VALUES
(101, 'Array', 'Array', 'Array', 'Male', 'Individual', '12 Months', '8000', '1000', 0, '8050', '7000', '1050', '27-JUL-2016', '12345678', '27-JUL-2017', '364', '9876543210'),
(102, 'Array', 'Array', 'Array', 'Male', 'Individual', '6 Months', '4500', '500', 0, '4600', '4200', '400', '27-JUL-2016', '14234245', '10-JAN-2017', '180', '778328738'),
(103, 'Mohan Colony', '01-AUG-2016', 'Deepak Panchal', 'Male', 'Individual', '12 Months', '8000', '1000', 0, '8050', '8000', '50', '01-AUG-2016', '848482028', '01-AUG-2017', '364', '754749202'),
(105, 'Mumbai Branch', '11-AUG-2016', 'Ramesh Singh', 'Male', 'Couple', '6 Months', '4500', '500', 0, '4600', '4200', '400', '05-AUG-2016', '88482028489', '19-JAN-2017', '180', '834820901'),
(106, 'Delhi Branch', '02-AUG-2016', 'Sachin Sharma', 'Male', 'Off Peak', '12 Months', '4500', '0', 0, '5175', '5175', '0', '02-AUG-2016', '798798798', '02-AUG-2017', '364', '8789687578'),
(107, 'Delhi Branch', '17-AUG-2016', 'Rakesh Bhai', 'Male', 'Double', '2 Years', '10000', '500', 0, '10925', '10925', '0', '13-JUL-2016', '773883749', '16-AUG-2018', '650', '746848920'),
(108, 'Mumbai Branch', '26-AUG-2016', 'Himani Joshi', 'Female', 'Couple', '2 Years', '10000', '500', 0, '10925', '10000', '925', '16-AUG-2016', '7678687969', '22-AUG-2018', '650', '746848920');

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `userid`, `password`, `email`, `dob`) VALUES
(1, 'admin', 'ac2d583a17e047dec8024402a338c6e8', 'cooljigneshpanchal@gmail.com', '14-12-1989');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `address`, `contact_num`) VALUES
(7, 'Mohan Colony', 'Mohan colony chouraha, main road.', '94829430210'),
(8, 'Mumbai Branch', 'Mumbai thane', '884982040'),
(9, 'Delhi Branch', 'Dehhi station road', '884982-0498');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `date`, `time`, `name`, `email`, `message`, `status`) VALUES
(12, '07-09-16', '03:44:42pm', 'Jignesh Panchal', 'cooljigneshpanchal@gmail.com', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `date`, `time`, `status`) VALUES
(1, 'jignesh', 'cooljigneshpanchal@gmail.com', 'kjhoiho', '27-06-16', '12:13:53am', 0),
(2, 'jignesh', 'technicstravels@yahoo.com', 'jpoj', '27-06-16', '12:14:23am', 1),
(3, 'jignesh', 'cooljigneshpanchal@gmail.com', 'lkkjpo', '28-06-16', '11:40:15pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gym_title`
--

CREATE TABLE `gym_title` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_title`
--

INSERT INTO `gym_title` (`id`, `title`) VALUES
(6, 'Fitness Center');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `mem_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `mem_type`) VALUES
(1, 'Individual'),
(2, 'Couple'),
(3, 'Off Peak'),
(4, 'Double');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_value` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_value`) VALUES
(24, '15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addmission`
--
ALTER TABLE `addmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_title`
--
ALTER TABLE `gym_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `addmission`
--
ALTER TABLE `addmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gym_title`
--
ALTER TABLE `gym_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
