-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `Edu_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `degree` varchar(40) NOT NULL,
  `university` varchar(40) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL,
  `per` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`Edu_id`, `user_id`, `degree`, `university`, `start_year`, `end_year`, `per`) VALUES
(2, 2, 'Bca', 'SPPU', 2022, 2025, 8.52),
(6, 210, 'B.com', 'SPPU', 2022, 2025, 7.67);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Eid` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(40) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `join_date` int(11) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Eid`, `dob`, `contact`, `dept`, `join_year`, `salary`, `user_id`) VALUES
(0, '2004-02-22', '1234567890', 'Production', 2025, 30000.00, 210);

-- --------------------------------------------------------

--
-- Table structure for table `exprience`
--

CREATE TABLE `exprience` (
  `Exp_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(40) NOT NULL,
  `duration` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exprience`
--

INSERT INTO `exprience` (`Exp_id`, `user_id`, `company_name`, `duration`, `designation`) VALUES
(2, 2, 'wipro', '1', 'web developer'),
(13, 210, 'BS Global pvt. ltd.', '3', 'Production');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Ronak singh', 'ronak2@gmail.com', 'ronaka124', 'Employee'),
(2, 'Ankita singh', 'ankita@gmail.com', 'ankita@123', 'Employee'),
(210, 'radhika rathi', 'radhikarathi21@gmail.com', 'radhikar123', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`Edu_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Eid`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `exprience`
--
ALTER TABLE `exprience`
  ADD PRIMARY KEY (`Exp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `Edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exprience`
--
ALTER TABLE `exprience`
  MODIFY `Exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `exprience`
--
ALTER TABLE `exprience`
  ADD CONSTRAINT `exprience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
