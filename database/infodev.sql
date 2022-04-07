-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 03:09 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infodev`
--

-- --------------------------------------------------------

--
-- Table structure for table `clg_info`
--

CREATE TABLE `clg_info` (
  `lot_no` int(11) NOT NULL,
  `clg_name` varchar(120) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `staff_des` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `no_student` int(11) NOT NULL,
  `amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `finalmark`
--

CREATE TABLE `finalmark` (
  `id` int(11) NOT NULL,
  `lotno` int(11) NOT NULL,
  `event_name` varchar(120) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judge_details`
--

CREATE TABLE `judge_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `id` int(11) NOT NULL,
  `judge_id` int(11) DEFAULT NULL,
  `lot_number` int(11) NOT NULL,
  `Total` float NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register_form`
--

CREATE TABLE `register_form` (
  `id` int(11) NOT NULL,
  `lot_no` int(11) DEFAULT NULL,
  `participant_name` varchar(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clg_info`
--
ALTER TABLE `clg_info`
  ADD PRIMARY KEY (`lot_no`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `finalmark`
--
ALTER TABLE `finalmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judge_details`
--
ALTER TABLE `judge_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judge_id` (`judge_id`);

--
-- Indexes for table `register_form`
--
ALTER TABLE `register_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_no` (`lot_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clg_info`
--
ALTER TABLE `clg_info`
  MODIFY `lot_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalmark`
--
ALTER TABLE `finalmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_form`
--
ALTER TABLE `register_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD CONSTRAINT `marksheet_ibfk_1` FOREIGN KEY (`judge_id`) REFERENCES `judge_details` (`id`);

--
-- Constraints for table `register_form`
--
ALTER TABLE `register_form`
  ADD CONSTRAINT `register_form_ibfk_1` FOREIGN KEY (`lot_no`) REFERENCES `clg_info` (`lot_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
