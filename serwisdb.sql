-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 02:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serwisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(255) NOT NULL,
  `email` char(255) NOT NULL,
  `status` char(255) NOT NULL,
  `description` text NOT NULL,
  `servicename` char(255) NOT NULL,
  `cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `email`, `status`, `description`, `servicename`, `cost`) VALUES
(1, 'mkarolewski@gmail.com', 'Pending', 'Order for web hosting service', 'Web Hosting', 100),
(2, 'test@gmail.com', 'Completed', 'Order for domain registration', 'Domain Registration', 15),
(3, 'test2@gmail.com', 'In Progress', 'Order for email service', 'Email Service', 50),
(4, 'test3@gmail.com', 'Cancelled', 'Order for VPN service', 'VPN Service', 30),
(5, 'mkarolewski@gmail.com', 'Completed', 'Order for cloud storage', 'Cloud Storage', 200),
(6, 'test@gmail.com', 'Pending', 'Order for website builder', 'Website Builder', 75),
(7, 'test2@gmail.com', 'Completed', 'Order for SEO services', 'SEO Services', 150),
(8, 'test3@gmail.com', 'In Progress', 'Order for social media management', 'Social Media Management', 250),
(9, 'mkarolewski@gmail.com', 'Pending', 'Order for IT support', 'IT Support', 120),
(10, 'test@gmail.com', 'Completed', 'Order for cybersecurity service', 'Cybersecurity Service', 300),
(11, 'test2@gmail.com', 'Pending', 'Order for web design', 'Web Design', 200),
(12, 'test3@gmail.com', 'Cancelled', 'Order for app development', 'App Development', 500),
(13, 'mkarolewski@gmail.com', 'Completed', 'Order for cloud computing', 'Cloud Computing', 350),
(14, 'test@gmail.com', 'Pending', 'Order for data analysis', 'Data Analysis', 400),
(15, 'test2@gmail.com', 'Completed', 'Order for machine learning service', 'Machine Learning', 450),
(16, 'test3@gmail.com', 'In Progress', 'Order for network security', 'Network Security', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(65) NOT NULL,
  `surname` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `name`, `surname`, `password`) VALUES
(17, 'test@gmail.com', 'qqwe', 'qqwe', '123'),
(18, 'mkarolewski@gmail.com', 'Maetusz', 'Karolewski', 'pndurohzvnl@jpdlo.frp'),
(19, 'test2@gmail.com', 'asd', 'asd', '123tzhdvg'),
(20, 'test3@gmail.com', 'name', 'name', '123tzhdvg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
