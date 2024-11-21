-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 11:03 AM
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
-- Database: `waste_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_tbl`
--

CREATE TABLE `account_tbl` (
  `accountID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `BirthDay` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Account_Type` int(20) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_tbl`
--

INSERT INTO `account_tbl` (`accountID`, `Name`, `Email`, `Password`, `BirthDay`, `Gender`, `Address`, `Account_Type`, `Photo`) VALUES
(2, 'John Doe', 'user@gmail.com', 'user', '2024-11-28', 'Male', 'Quezon City', 3, '6739921b818c4.png'),
(3, 'staff', 'staff@gmail.com', 'staff', '2024-11-17', 'Male', 'Quezon City', 2, '67399f9308183.png'),
(4, 'admin', 'admin@gmail.com', 'admin', '2024-11-17', 'Male', 'admin', 1, '6739bfbb01f11.png');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_tbl`
--

CREATE TABLE `announcement_tbl` (
  `announcementID` int(11) NOT NULL,
  `Announcement` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_tbl`
--

INSERT INTO `announcement_tbl` (`announcementID`, `Announcement`, `Description`) VALUES
(7, 'adada', 'dadaa');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_tbl`
--

CREATE TABLE `complaint_tbl` (
  `complaintID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_tbl`
--

INSERT INTO `complaint_tbl` (`complaintID`, `accountID`, `Description`, `Address`, `Status`) VALUES
(10, 2, 'wdad', 'adadad', NULL),
(11, 2, 'dadada', 'dadadada', 'Resolve');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines_tbl`
--

CREATE TABLE `guidelines_tbl` (
  `guidelinesID` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guidelines_tbl`
--

INSERT INTO `guidelines_tbl` (`guidelinesID`, `Description`) VALUES
(1, 'Separate wet and dry waste at the source.\r\n'),
(2, 'Use different bins for different types of waste.\r\n'),
(3, 'Do not mix hazardous waste with regular waste.\r\n'),
(4, 'Compost organic waste whenever possible.\r\n'),
(5, 'Recycle materials like paper, plastic, and glass.\r\n'),
(6, 'Dispose of electronic waste at designated centers.\r\n'),
(7, 'Follow local regulations for waste disposal.\r\n'),
(8, 'Educate others about the importance of waste segregation.\r\n'),
(9, 'Reduce the use of single-use plastics.\r\n'),
(10, 'Use reusable bags and containers.\r\n'),
(11, 'Properly label waste bins.\r\n'),
(12, 'Ensure waste bins are covered to prevent pests.\r\n'),
(13, 'Regularly clean waste bins to avoid odors.\r\n'),
(14, 'Report any non-compliance to local authorities.\r\n'),
(15, 'Participate in community clean-up drives.');

-- --------------------------------------------------------

--
-- Table structure for table `report_tbl`
--

CREATE TABLE `report_tbl` (
  `reportID` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_tbl`
--

INSERT INTO `report_tbl` (`reportID`, `Description`, `Location`, `Photo`, `accountID`) VALUES
(7, 'hello world', 'hello world', 'compliance_673eee50c3f133.28120262.jpg', 2),
(8, 'report 2 report 2', 'report 2', 'compliance_673ef36fde61a6.54500137.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_tbl`
--

CREATE TABLE `schedule_tbl` (
  `scheduleID` int(11) NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Waste` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_tbl`
--

INSERT INTO `schedule_tbl` (`scheduleID`, `Day`, `Time`, `Waste`) VALUES
(1, 'Monday', '6:00 AM - 8:00 AM', 'Non - Biodegrable'),
(2, 'Tuesday', '6:00 AM - 8:00 AM', 'Non - Biodegradable'),
(3, 'Wednesday', '6:00 AM - 8:00 AM', 'Biodegradable'),
(4, 'Thursday', '6:00 AM - 8:00 AM', 'Non - Biodegradable'),
(5, 'Friday', '6:00 AM - 8:00 AM', 'Biodegradable'),
(6, 'Saturday', '6:00 AM - 8:00 AM', 'Non - Biodegradable'),
(7, 'Sunday', '6:00 AM - 8:00 AM', 'Special Waste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbl`
--
ALTER TABLE `account_tbl`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `complaint_tbl`
--
ALTER TABLE `complaint_tbl`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `guidelines_tbl`
--
ALTER TABLE `guidelines_tbl`
  ADD PRIMARY KEY (`guidelinesID`);

--
-- Indexes for table `report_tbl`
--
ALTER TABLE `report_tbl`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `schedule_tbl`
--
ALTER TABLE `schedule_tbl`
  ADD PRIMARY KEY (`scheduleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbl`
--
ALTER TABLE `account_tbl`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint_tbl`
--
ALTER TABLE `complaint_tbl`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `guidelines_tbl`
--
ALTER TABLE `guidelines_tbl`
  MODIFY `guidelinesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `report_tbl`
--
ALTER TABLE `report_tbl`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule_tbl`
--
ALTER TABLE `schedule_tbl`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
