-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 01:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_finalproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyattendancetb`
--

CREATE TABLE `dailyattendancetb` (
  `id` int(11) NOT NULL,
  `fld_eid` int(11) NOT NULL,
  `fld_status` varchar(200) NOT NULL,
  `fld_name` varchar(200) NOT NULL,
  `fld_isPresent` tinyint(1) DEFAULT NULL,
  `fld_isAbsent` tinyint(1) DEFAULT NULL,
  `fld_date` date NOT NULL,
  `fld_timein` time DEFAULT NULL,
  `fld_isLate` tinyint(1) DEFAULT NULL,
  `fld_minutesLate` float DEFAULT NULL,
  `fld_timeout` time DEFAULT NULL,
  `fld_isUndertime` tinyint(1) DEFAULT NULL,
  `fld_minutesUndertime` float DEFAULT NULL,
  `fld_isOvertime` tinyint(1) DEFAULT NULL,
  `fld_minutesOvertime` float DEFAULT NULL,
  `fld_hoursworked` float(11,2) DEFAULT NULL,
  `fld_schedstart` time DEFAULT NULL,
  `fld_schedend` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailyattendancetb`
--

INSERT INTO `dailyattendancetb` (`id`, `fld_eid`, `fld_status`, `fld_name`, `fld_isPresent`, `fld_isAbsent`, `fld_date`, `fld_timein`, `fld_isLate`, `fld_minutesLate`, `fld_timeout`, `fld_isUndertime`, `fld_minutesUndertime`, `fld_isOvertime`, `fld_minutesOvertime`, `fld_hoursworked`, `fld_schedstart`, `fld_schedend`) VALUES
(1, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-01', '08:05:00', 0, 0, '17:08:00', 0, 0, 0, 0, 9.05, '08:00:00', '17:00:00'),
(2, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-02', '08:15:00', 1, 5, '17:10:00', 0, 0, 0, 0, 8.91, '08:00:00', '17:00:00'),
(3, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-03', '08:30:00', 1, 20, '18:10:00', 0, 0, 1, 70, 9.66, '08:00:00', '17:00:00'),
(4, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-04', '08:18:00', 1, 8, '16:40:00', 1, 20, 0, 0, 8.36, '08:00:00', '17:00:00'),
(7, 145, 'Full Time', 'Coronado, Gabriel Reyes', 0, 1, '2023-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08:00:00', '17:00:00'),
(8, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-06', '08:03:00', 0, 0, '17:30:00', 0, 0, 1, 20, 9.45, '08:00:00', '17:00:00'),
(9, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-08', '08:00:00', 0, 0, '17:50:00', 0, 0, 1, 40, 9.83, '08:00:00', '17:00:00'),
(10, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-09', '08:03:00', 0, 0, '17:05:00', 0, 0, 0, 0, 9.03, '08:00:00', '17:00:00'),
(11, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-10', '08:50:00', 1, 30, '16:00:00', 1, 60, 0, 0, 7.16, '08:00:00', '17:00:00'),
(12, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-11', '08:50:00', 1, 30, '18:00:00', 0, 0, 1, 50, 9.16, '08:00:00', '17:00:00'),
(13, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-12', '08:30:00', 1, 20, '18:00:00', 0, 0, 1, 55, 9.16, '08:00:00', '17:00:00'),
(14, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-13', '08:30:00', 1, 20, '17:00:00', 0, 0, 0, 0, 8.50, '08:00:00', '17:00:00'),
(15, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-14', '08:00:00', 0, 0, '17:00:00', 0, 0, 0, 0, 8.00, '08:00:00', '17:00:00'),
(16, 145, 'Full Time', 'Coronado, Gabriel Reyes', 0, 1, '2023-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08:00:00', '17:00:00'),
(18, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13:00:00', '17:00:00'),
(20, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-02', '13:30:00', 1, 20, '17:00:00', 0, 0, 0, 0, 3.50, '13:00:00', '17:00:00'),
(21, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-03', '13:00:00', 0, 0, '17:00:00', 0, 0, 0, 0, 4.00, '13:00:00', '17:00:00'),
(23, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-04', '13:00:00', 0, 0, '16:40:00', 1, 20, 0, 0, 3.66, '13:00:00', '17:00:00'),
(24, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-05', '13:10:00', 0, 0, '17:50:00', 0, 0, 1, 40, 4.66, '13:00:00', '17:00:00'),
(25, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-06', '13:00:00', 0, 0, '16:00:00', 1, 60, 0, 0, 3.00, '13:00:00', '17:00:00'),
(27, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-09', '13:00:00', 0, 0, '16:50:00', 0, 0, 0, 0, 3.90, '13:00:00', '17:00:00'),
(28, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2023-05-07', '13:00:00', 0, 0, '17:10:00', 0, 0, 0, 0, 4.00, '13:00:00', '17:00:00'),
(29, 123, 'Part Time', 'De Leon, Triceane Marie Deveza', 1, 0, '2023-05-18', '10:34:53', 0, 0, '10:56:53', 1, 363, 0, 0, 0.37, '13:00:00', '17:00:00'),
(30, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-18', '07:50:10', 0, 0, '13:25:42', 1, 214, 0, 0, 5.59, '08:00:00', '17:00:00'),
(31, 155, 'Part Time', 'Aragon, Babylyn ', 1, 0, '2023-05-18', '10:36:27', 0, 0, '13:23:16', 1, 396, 0, 0, 2.78, '14:00:00', '20:00:00'),
(34, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 1, 0, '2023-05-18', '10:37:48', 0, 0, '10:43:11', 1, 376, 0, 0, 0.09, '13:00:00', '17:00:00'),
(36, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 1, 0, '2023-05-01', '13:00:00', 0, 0, '17:10:00', 0, 0, 0, 0, 4.00, '13:00:00', '17:00:00'),
(37, 123, 'Part Time', 'De Leon, Triceane Marie Deveza', 1, 0, '2023-05-19', '11:59:21', 0, 0, '19:16:27', 0, 0, 1, 136, 5.01, '13:00:00', '17:00:00'),
(38, 125, 'Full Time', 'Solis, Jake Enriquez', 1, 0, '2023-05-19', '11:59:13', 1, 229, '19:16:24', 0, 0, 1, 16, 7.01, '08:00:00', '19:00:00'),
(39, 145, 'Full Time', 'Coronado, Gabriel Reyes', 1, 0, '2023-05-19', '11:56:44', 1, 226, '19:20:03', 0, 0, 1, 140, 5.05, '08:00:00', '17:00:00'),
(40, 155, 'Part Time', 'Aragon, Babylyn ', 1, 0, '2023-05-19', '12:00:56', 0, 0, '19:16:30', 1, 43, 0, 0, 7.26, '14:00:00', '20:00:00'),
(41, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 1, 0, '2023-05-19', '12:00:59', 0, 0, '19:16:35', 0, 0, 1, 136, 4.98, '13:00:00', '17:00:00'),
(42, 123, 'Part Time', 'De Leon, Triceane Marie Deveza', 0, 1, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13:00:00', '17:00:00'),
(43, 125, 'Full Time', 'Solis, Jake Enriquez', 0, 1, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08:00:00', '19:00:00'),
(44, 145, 'Full Time', 'Coronado, Gabriel Reyes', 0, 1, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08:00:00', '17:00:00'),
(45, 155, 'Part Time', 'Aragon, Babylyn ', 0, 1, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14:00:00', '20:00:00'),
(46, 222, 'Part Time', 'Fababaer, Kyle Ocampo', 0, 1, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employeepaytb`
--

CREATE TABLE `employeepaytb` (
  `fld_eid` int(11) NOT NULL,
  `fld_name` varchar(200) NOT NULL,
  `fld_status` varchar(200) DEFAULT NULL,
  `fld_basicsalary` float(11,2) DEFAULT NULL,
  `fld_SSS` float(11,2) DEFAULT NULL,
  `fld_pagibig` float(11,2) DEFAULT NULL,
  `fld_philhealth` float(11,2) DEFAULT NULL,
  `fld_hourlyrate` float(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeepaytb`
--

INSERT INTO `employeepaytb` (`fld_eid`, `fld_name`, `fld_status`, `fld_basicsalary`, `fld_SSS`, `fld_pagibig`, `fld_philhealth`, `fld_hourlyrate`) VALUES
(123, 'De Leon, Triceane Marie Deveza', 'Part Time', NULL, NULL, NULL, NULL, 450.00),
(125, 'Solis, Jake Enriquez', 'Full Time', 10000.00, 1000.00, 2000.00, 500.00, NULL),
(145, 'Coronado, Gabriel Reyes', 'Full Time', 50000.00, 3000.00, 200.00, 600.00, NULL),
(155, 'Aragon, Babylyn ', 'Part Time', NULL, NULL, NULL, NULL, 450.00),
(222, 'Fababaer, Kyle Ocampo', 'Part Time', NULL, NULL, NULL, NULL, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `employeetb`
--

CREATE TABLE `employeetb` (
  `fld_eid` int(11) NOT NULL,
  `fld_lname` varchar(200) DEFAULT NULL,
  `fld_fname` varchar(200) DEFAULT NULL,
  `fld_mname` varchar(200) DEFAULT NULL,
  `fld_addr` varchar(200) DEFAULT NULL,
  `fld_num` varchar(200) DEFAULT NULL,
  `fld_email` varchar(200) DEFAULT NULL,
  `fld_status` varchar(200) DEFAULT NULL,
  `fld_schedstart` time DEFAULT NULL,
  `fld_schedend` time DEFAULT NULL,
  `fld_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeetb`
--

INSERT INTO `employeetb` (`fld_eid`, `fld_lname`, `fld_fname`, `fld_mname`, `fld_addr`, `fld_num`, `fld_email`, `fld_status`, `fld_schedstart`, `fld_schedend`, `fld_name`) VALUES
(123, 'De Leon', 'Triceane Marie', 'Deveza', 'Padre Garcia, Batangas', '09865764574', 'trice@gmail.com', 'Part Time', '13:00:00', '17:00:00', 'De Leon, Triceane Marie Deveza'),
(125, 'Solis', 'Jake', 'Enriquez', 'Mataasnakahoy, Batangas', '09887654321', 'jakjak@gmail.com', 'Full Time', '08:00:00', '19:00:00', 'Solis, Jake Enriquez'),
(145, 'Coronado', 'Gabriel', 'Reyes', 'Lipa, Batangas', '09752654195', 'gab@gmail.com', 'Full Time', '08:00:00', '17:00:00', 'Coronado, Gabriel Reyes'),
(155, 'Aragon', 'Babylyn', '', 'Padre Garcia, Batangas', '09887654324', 'babylyn@gmail.com', 'Part Time', '14:00:00', '20:00:00', 'Aragon, Babylyn '),
(222, 'Fababaer', 'Kyle', 'Ocampo', 'Lipa, Batangas', '09112345476', 'itskyle@gmail.com', 'Part Time', '13:00:00', '17:00:00', 'Fababaer, Kyle Ocampo');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `id` int(11) NOT NULL,
  `fld_username` varchar(200) DEFAULT NULL,
  `fld_password` varchar(200) DEFAULT NULL,
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`id`, `fld_username`, `fld_password`, `date_updated`) VALUES
(1, 'admingale', '987654321', '2023-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `payrolltb`
--

CREATE TABLE `payrolltb` (
  `id` int(11) NOT NULL,
  `fld_eid` int(11) NOT NULL,
  `fld_name` varchar(200) DEFAULT NULL,
  `fld_status` varchar(200) DEFAULT NULL,
  `fld_payrollstart` date DEFAULT NULL,
  `fld_payrollend` date DEFAULT NULL,
  `fld_noofpresent` int(11) DEFAULT NULL,
  `fld_noofabsent` int(11) DEFAULT NULL,
  `fld_nooflate` int(11) DEFAULT NULL,
  `fld_noofundertime` int(11) DEFAULT NULL,
  `fld_noofovertime` int(11) DEFAULT NULL,
  `fld_basicsalary` float(11,2) DEFAULT NULL,
  `fld_overtimepay` float(11,2) DEFAULT NULL,
  `fld_bonuspay` float(11,2) DEFAULT NULL,
  `fld_grosspay` float(11,2) DEFAULT NULL,
  `fld_sss` float(11,2) DEFAULT NULL,
  `fld_pagibig` float(11,2) DEFAULT NULL,
  `fld_philhealth` float(11,2) DEFAULT NULL,
  `fld_deductionabsent` float(11,2) DEFAULT NULL,
  `fld_deductionlate` float(11,2) DEFAULT NULL,
  `fld_deductionundertime` float(11,2) DEFAULT NULL,
  `fld_totaldeductions` float(11,2) DEFAULT NULL,
  `fld_netpay` float(11,2) DEFAULT NULL,
  `fld_totalhoursworked` float(11,2) DEFAULT NULL,
  `fld_hourlyrate` float(11,2) DEFAULT NULL,
  `fld_totalsalaryPT` float(11,2) DEFAULT NULL,
  `fld_holidaypay` float(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payrolltb`
--

INSERT INTO `payrolltb` (`id`, `fld_eid`, `fld_name`, `fld_status`, `fld_payrollstart`, `fld_payrollend`, `fld_noofpresent`, `fld_noofabsent`, `fld_nooflate`, `fld_noofundertime`, `fld_noofovertime`, `fld_basicsalary`, `fld_overtimepay`, `fld_bonuspay`, `fld_grosspay`, `fld_sss`, `fld_pagibig`, `fld_philhealth`, `fld_deductionabsent`, `fld_deductionlate`, `fld_deductionundertime`, `fld_totaldeductions`, `fld_netpay`, `fld_totalhoursworked`, `fld_hourlyrate`, `fld_totalsalaryPT`, `fld_holidaypay`) VALUES
(6, 145, 'Coronado, Gabriel Reyes', 'Full Time', '2023-05-01', '2023-05-18', 13, 2, 133, 294, 235, 50000.00, 940.00, 0.00, 57606.67, 3000.00, 200.00, 600.00, 6666.67, 266.00, 588.00, 11320.67, 46286.00, 111.86, NULL, NULL, 6666.67),
(8, 222, 'Fababaer, Kyle Ocampo', 'Part Time', '2023-05-01', '2023-05-18', 2, 8, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30.81, 500.00, 19405.00, 4000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailyattendancetb`
--
ALTER TABLE `dailyattendancetb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeepaytb`
--
ALTER TABLE `employeepaytb`
  ADD PRIMARY KEY (`fld_eid`);

--
-- Indexes for table `employeetb`
--
ALTER TABLE `employeetb`
  ADD PRIMARY KEY (`fld_eid`);

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolltb`
--
ALTER TABLE `payrolltb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dailyattendancetb`
--
ALTER TABLE `dailyattendancetb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `logintb`
--
ALTER TABLE `logintb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payrolltb`
--
ALTER TABLE `payrolltb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
