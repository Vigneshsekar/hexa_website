-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 10:28 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hexa`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `trans_id` varchar(20) NOT NULL,
  `trans_type` int(11) NOT NULL,
  `f_phone_no` varchar(10) NOT NULL,
  `acc_bal_rem` int(11) NOT NULL,
  `ven_id` varchar(4) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL,
  `phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`trans_id`, `trans_type`, `f_phone_no`, `acc_bal_rem`, `ven_id`, `date`, `time`, `amount`, `phone_no`) VALUES
('1001000002', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:13:16', 50, 2147483647),
('1001000003', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:40:59', 50, 2147483647),
('1001000004', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:44:07', 50, 2147483647),
('1001000005', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:46:06', 50, 2147483647),
('1001000006', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:46:19', 50, 2147483647),
('1001000007', 1, '9810431939', 150, '1001', '2016-04-18', '08:48:15', 50, 2147483647),
('1001000008', 1, '9810431939', 100, '1001', '2016-04-23', '08:51:29', 50, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `trans_no_store`
--

CREATE TABLE `trans_no_store` (
  `1001` varchar(10) NOT NULL,
  `1002` varchar(10) NOT NULL,
  `1003` varchar(10) NOT NULL,
  `1004` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_no_store`
--

INSERT INTO `trans_no_store` (`1001`, `1002`, `1003`, `1004`) VALUES
('0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_new` int(11) NOT NULL,
  `u_level` int(11) NOT NULL,
  `acc_bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phone_no`, `email`, `password`, `is_new`, `u_level`, `acc_bal`) VALUES
('Sriram', '7023065645', 's@gmail.com', 'password', 1, 1, 300),
('karthik', '7790844803', 'kr@kr.com', 'password', 1, 1, 500),
('Sriram', '9810431937', 'sr@sr2.com', 'password', 1, 1, 0),
('Sam', '9810431938', 'sr@sr.com', 'password', 1, 1, 100),
('Arvind', '9810431939', 'sr@sr1.com', 'password', 1, 1, 1050);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `trans_id` (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`phone_no`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
