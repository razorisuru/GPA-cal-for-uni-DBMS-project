-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 03:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpa`
--

CREATE TABLE `gpa` (
  `id` int(11) NOT NULL,
  `marks` varchar(100) NOT NULL,
  `grade_points` varchar(255) NOT NULL,
  `grade_value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gpa`
--

INSERT INTO `gpa` (`id`, `marks`, `grade_points`, `grade_value`) VALUES
(1, '100-80', 'A', 4),
(2, '70-79', 'A-', 3.7),
(3, '69-65', 'B+', 3.3),
(4, '64-60', 'B', 3),
(5, '59-55', 'B-', 2.7),
(6, '54-50', 'C+', 2.3),
(7, '49-45', 'C', 2),
(8, '44-40', 'C-', 1.7),
(9, '39-35', 'D+', 1.3),
(10, '34-30', 'D', 1),
(11, '29-00', 'F', 0);

-- --------------------------------------------------------

--
-- Table structure for table `st_details`
--

CREATE TABLE `st_details` (
  `id` int(9) NOT NULL,
  `index` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `s1_marks` varchar(10) NOT NULL,
  `s2_marks` varchar(10) NOT NULL,
  `s3_marks` varchar(10) NOT NULL,
  `s4_marks` varchar(10) NOT NULL,
  `s5_marks` varchar(10) NOT NULL,
  `gpa` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_details`
--

INSERT INTO `st_details` (`id`, `index`, `name`, `s1_marks`, `s2_marks`, `s3_marks`, `s4_marks`, `s5_marks`, `gpa`) VALUES
(56, 'bsc01', 'Sumanapala', 'A', 'B+', 'A', 'B-', 'A', 3.57),
(57, 'bsc02', 'Isuri Samaranayaka', 'A', 'A-', 'A', 'A-', 'B+', 3.73);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_details` varchar(255) DEFAULT NULL,
  `s_credit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`s_id`, `s_name`, `s_details`, `s_credit`) VALUES
(1, 'Maths', 'IT 239 - MATHEMATICS FOR COMPUTING II [F]', 2),
(2, 'DBMS', 'IT 236 - DATABASE MANAGEMENT SYSTEMS II [F]', 3),
(3, 'OS', 'IT 244 - OPERATING SYSTEMS CONCEPTS [F]', 2),
(4, 'Ethics', 'IT 238 - ETHICAL &amp; LEAGAL ASPECTS IN IT [F]', 2),
(5, 'English', 'IT 138 - ENGLISH &amp; COMMUNICATION 2 [F]', 2),
(6, 'Networking', 'IT 322 - Networking &amp; Subnetting [F]', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(9) NOT NULL,
  `index` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `index`, `name`, `email`, `role`, `username`, `password`) VALUES
(1, 'lec001', 'Isuru Bandara', 'isurubandara318@gmail.com', 'super_admin', 'isuru', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'lec002', 'Idunil Bandara', 'idunilbandara@gmail.com', 'admin', 'idu', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'bsc003', 'Amindu Sangeeth', 'amindusangeeth@gmail.com', 'user', 'ami', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'lec004', 'g', 'g@gmail.com', 'super_admin', 'g', 'b2f5ff47436671b6e533d8dc3614845d'),
(5, 'bsc', 'dddd', 'dddd@gg.com', '', 'ii', '7e98b8a17c0aad30ba64d47b74e2a6c1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gpa`
--
ALTER TABLE `gpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_details`
--
ALTER TABLE `st_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`index`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`index`,`email`,`username`),
  ADD UNIQUE KEY `email` (`email`,`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gpa`
--
ALTER TABLE `gpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `st_details`
--
ALTER TABLE `st_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
