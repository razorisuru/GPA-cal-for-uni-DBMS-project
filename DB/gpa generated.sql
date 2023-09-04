-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 10:40 AM
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
  `grade_value` float
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
  `s1_marks` float NOT NULL,
  `s2_marks` float NOT NULL,
  `s3_marks` float NOT NULL,
  `s4_marks` float NOT NULL,
  `s5_marks` float NOT NULL,
  `gpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_details`
--

INSERT INTO `st_details` (`id`, `index`, `name`, `s1_marks`, `s2_marks`, `s3_marks`, `s4_marks`, `s5_marks`, `gpa`) VALUES
(1, 'bscwd223501', 'Isuru Bandara', 1, 1, 1, 1, 1, 1),
(2, 'bscwd223502', 'Idunil Bandara', 1, 1, 1, 1, 3, 1),
(3, 'bscwd223503', 'Amindu Sangeeth', 1, 1, 1, 1, 4, 1);

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
(1, 'Maths', 'lorem', 2),
(2, 'DBSM', 'lorem', 2),
(3, 'Web', 'lorem', 3);
(4, 'Ethics', 'lorem', 2);
(5, 'OS', 'lorem', 3);

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
(1, 'bscwd223501', 'Isuru Bandara', 'isurubandara@gmail.com', 'super_admin', 'isuru', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'bscwd223502', 'Idunil Bandara', 'idunilbandara@gmail.com', 'admin', 'idunil', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'bscwd223503', 'Amindu Sangeeth', 'amindusangeeth@gmail.com', 'user', 'ami', '81dc9bdb52d04dc20036dbd8313ed055');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gpa`
--
ALTER TABLE `gpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `st_details`
--
ALTER TABLE `st_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
