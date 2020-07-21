-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 11:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship_project5`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billno`) VALUES
(1017);

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `checkid` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `quant` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`checkid`, `billno`, `prodid`, `quant`) VALUES
(11, 1001, 1, 2),
(12, 1001, 2, 4),
(13, 1001, 3, 3),
(14, 1002, 1, 2),
(15, 1002, 2, 2),
(16, 1002, 4, 4),
(17, 1003, 1, 2),
(18, 1003, 2, 2),
(19, 1004, 1, 2),
(20, 1004, 2, 3),
(22, 1004, 3, 3),
(23, 1005, 1, 1),
(24, 1007, 1, 1),
(25, 1007, 2, 2),
(26, 1007, 3, 3),
(28, 1008, 1, 1),
(29, 1009, 1, 1),
(30, 1011, 1, 1),
(31, 1011, 2, 2),
(33, 1012, 1, 2),
(34, 1012, 2, 2),
(36, 1013, 1, 2),
(37, 1013, 2, 2),
(38, 1014, 2, 2),
(39, 1014, 1, 3),
(40, 1014, 3, 5),
(41, 1015, 1, 2),
(43, 1015, 3, 3),
(44, 1015, 4, 1),
(45, 1016, 1, 1),
(46, 1016, 2, 2),
(47, 1016, 4, 4),
(49, 1016, 3, 2),
(50, 1016, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`adminid`, `adminname`, `password`) VALUES
(1, 'admin1', 'admin1'),
(3, 'admin2', 'admin2'),
(5, 'admin7', 'admin7'),
(6, 'admin6', 'admin6'),
(7, 'admin33', 'admin33');

-- --------------------------------------------------------

--
-- Table structure for table `loginemp`
--

CREATE TABLE `loginemp` (
  `empid` int(11) NOT NULL,
  `empname` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginemp`
--

INSERT INTO `loginemp` (`empid`, `empname`, `password`) VALUES
(2, 'emp1', 'emp1'),
(3, 'emp2', 'emp2'),
(4, 'emp3', 'emp3'),
(5, 'emp7', 'emp7'),
(6, 'emp33', 'emp33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodid` int(11) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodid`, `prodname`, `price`, `stock`, `discount`) VALUES
(1, 'prod1', 111, 98, 1),
(2, 'product 2', 200, 196, 4),
(3, 'prod3', 300, 96, 1),
(4, 'prod10', 20, 92, 2),
(7, 'prod5', 100, 100, 7),
(8, 'product 17', 170, 100, 2),
(9, 'product 33', 330, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `transid` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `tot` float NOT NULL,
  `custpay` float NOT NULL,
  `custrefund` float NOT NULL,
  `date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`transid`, `billno`, `tot`, `custpay`, `custrefund`, `date`) VALUES
(16, 1013, 682.271, 683, 0.7286, '2020/06/10'),
(17, 1014, 2484.5, 2485, 0.5029, '2020/06/10'),
(18, 1015, 1277.33, 1280, 2.6706, '2020/06/14'),
(19, 1016, 1399.55, 1400, 0.452, '2020/06/14');

-- --------------------------------------------------------

--
-- Table structure for table `vat_tbl`
--

CREATE TABLE `vat_tbl` (
  `id` int(11) NOT NULL,
  `vat_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vat_tbl`
--

INSERT INTO `vat_tbl` (`id`, `vat_amount`) VALUES
(1, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`checkid`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `loginemp`
--
ALTER TABLE `loginemp`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`transid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `checkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loginemp`
--
ALTER TABLE `loginemp`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
