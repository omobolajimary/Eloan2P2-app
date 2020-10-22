-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 05:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_loan_p2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `borrowers_table`
--

CREATE TABLE `borrowers_table` (
  `order_id` int(5) NOT NULL,
  `amount_borrowed` int(7) NOT NULL,
  `borrowed_date` date NOT NULL,
  `return_date` date NOT NULL,
  `user_id` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creditors_table`
--

CREATE TABLE `creditors_table` (
  `creditor_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_history`
--

CREATE TABLE `loan_history` (
  `order_id` int(4) NOT NULL,
  `user_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `creditor_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `date_borrowed` date NOT NULL,
  `return_date` date NOT NULL,
  `amount` int(7) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `borrowers_table`
--
ALTER TABLE `borrowers_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `creditors_table`
--
ALTER TABLE `creditors_table`
  ADD PRIMARY KEY (`creditor_id`);

--
-- Indexes for table `loan_history`
--
ALTER TABLE `loan_history`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `creditor_id` (`creditor_id`),
  ADD KEY `loan_history_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowers_table`
--
ALTER TABLE `borrowers_table`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `creditors_table`
--
ALTER TABLE `creditors_table`
  MODIFY `creditor_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowers_table`
--
ALTER TABLE `borrowers_table`
  ADD CONSTRAINT `borrowers_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `loan_history`
--
ALTER TABLE `loan_history`
  ADD CONSTRAINT `loan_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
