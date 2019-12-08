-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 07:36 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `userId` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `name`, `address`, `userId`, `email`, `phone`, `password`) VALUES
(0, 'Guest', 'Guest', 'Guest', 'Guest', 'Guest', 'Guest'),
(1, 'Himanshu Pahwa', '52, Porchlight road', 'him9', 'himanshupahwa.hp@gmail.com', '6478390720', '123'),
(2, 'helen', 'clark', 'sff', 'lkadssl@gmail.com', '1213', '1321'),
(4, 'Himanshu Pahwa', '52', 'kelen65', 'himanshupahwa.hp@gmail.com', '6478390720', '1234'),
(5, 'Bhanvi Duggal', 'Brampton Gateway Terminal, Brampton, ON, Canada', 'bhanvi95', 'bhanviduggal@gmail.com', '6478390720', '1234'),
(6, 'Rohit', '5 Harbord Street, Toronto, ON, Canada', 'rohit95', 'rohit@gmail.com', '878768768', '1234'),
(7, 'marcos', 'Lambton College, Yorkland Boulevard, North York, ON, Canada', 'marcos18', 'abc@example.com', '23432423442', '001');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `product_id` varchar(5) DEFAULT NULL,
  `quantity` varchar(5) DEFAULT NULL,
  `total_price` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderId`, `name`, `price`, `customer_id`, `product_id`, `quantity`, `total_price`) VALUES
(45, 'Coach slim easton black', '165.90', 7, '9', '1', '165.90'),
(46, 'Coach slim easton black', '165.90', 7, '3', '1', '165.90'),
(47, 'Frayed denim shorts', '15.90', 0, '10', '1', '15.90'),
(48, 'Denim jacket blue', '92.50', 0, '2', '1', '92.50'),
(49, 'Coach slim easton black', '165.90', 0, '3', '1', '165.90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
