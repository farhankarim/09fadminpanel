-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 02:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daraz`
--

-- --------------------------------------------------------

--
-- Table structure for table `abc`
--

CREATE TABLE `abc` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abc`
--

INSERT INTO `abc` (`id`, `name`, `product_id`) VALUES
(1, 'Nokia 3310', 3),
(2, 'Nokia 1112', 3),
(3, 'Samsung 111', 13),
(4, 'Samsung 1112', 13);

-- --------------------------------------------------------

--
-- Table structure for table `myset`
--

CREATE TABLE `myset` (
  `col` set('a','b','c','d') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `RELEASE_YEAR` year(4) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `AVAILABILITY` set('cod','online transaction','on order','') NOT NULL,
  `STOCK` int(11) DEFAULT 0,
  `DATE_ADDED` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `brand`, `price`, `weight`, `image_path`, `id`, `RELEASE_YEAR`, `STATUS`, `AVAILABILITY`, `STOCK`, `DATE_ADDED`) VALUES
(3, 'F51', 'samsung', 45000, 3, '', 111, NULL, NULL, '', 0, '2021-01-20 13:19:05'),
(15, 'realme 5s', 'samsung', 415000, 13, '', NULL, NULL, NULL, '', 0, '2021-02-12 12:13:48'),
(18, 'realme 5', 'oppo', 5555, 2, '', NULL, NULL, NULL, '', 0, '2021-02-24 12:25:03'),
(20, 'a11', 'samsung', 45000, 5, 'motu-patlu2.jpg', NULL, NULL, NULL, '', 0, '2021-02-24 13:00:13'),
(21, 's8', 'samsung', 45000, 3, 'Capture.JPG', NULL, NULL, NULL, '', 0, '2021-02-24 13:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `pass`) VALUES
(4, 'farhan', 'farhan@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'ahmed', 'ahmed@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, 'farhanssss', 'sadsad@gmdsadsadail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'farhan', 'farhan123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(15, 'farhan', 'farhan12334@gmail.com', '202cb962ac59075b964b07152d234b70'),
(17, 'farhan', '', ''),
(18, 'farhan', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abc`
--
ALTER TABLE `abc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abc`
--
ALTER TABLE `abc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
