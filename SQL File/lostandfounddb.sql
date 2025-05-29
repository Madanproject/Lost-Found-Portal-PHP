-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 07:11 PM
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
-- Database: `lostandfounddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7898799720, 'tester1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-02-02 06:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblclaim`
--

CREATE TABLE `tblclaim` (
  `ID` int(5) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `ProductID` int(5) DEFAULT NULL,
  `ItemIdentification` mediumtext DEFAULT NULL,
  `ItemDescription` mediumtext DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `Dateofclaim` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclaim`
--

INSERT INTO `tblclaim` (`ID`, `UserID`, `ProductID`, `ItemIdentification`, `ItemDescription`, `Status`, `Dateofclaim`) VALUES
(1, 11, 1, 'Black Color leather wallet.', 'NA', 'Claim Request', '2024-08-01 14:14:00'),
(2, 13, 6, 'Laptop Serial No: HGHFHF324234324', 'NA', 'Claimed', '2024-08-06 17:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblclaimhistory`
--

CREATE TABLE `tblclaimhistory` (
  `id` int(11) NOT NULL,
  `claimId` int(11) DEFAULT NULL,
  `claimRemark` mediumtext DEFAULT NULL,
  `claimStatus` varchar(250) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclaimhistory`
--

INSERT INTO `tblclaimhistory` (`id`, `claimId`, `claimRemark`, `claimStatus`, `postingDate`) VALUES
(1, 2, 'Talk with claimer', 'Inprocess', '2024-08-06 17:21:46'),
(2, 2, 'Laptop handover ', 'Claimed', '2024-08-06 17:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblfounditem`
--

CREATE TABLE `tblfounditem` (
  `ID` int(5) NOT NULL,
  `Userid` int(5) DEFAULT NULL,
  `ItemType` varchar(250) DEFAULT NULL,
  `ItemName` varchar(250) DEFAULT NULL,
  `ItemDescriptions` mediumtext DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Area` varchar(250) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `dateoffound` varchar(255) DEFAULT NULL,
  `KeptAddress` mediumtext DEFAULT NULL,
  `KeptCity` varchar(255) DEFAULT NULL,
  `KeptState` varchar(255) DEFAULT NULL,
  `CPMobilenumber` bigint(11) DEFAULT NULL,
  `PostDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfounditem`
--

INSERT INTO `tblfounditem` (`ID`, `Userid`, `ItemType`, `ItemName`, `ItemDescriptions`, `Image1`, `Image2`, `Area`, `City`, `State`, `dateoffound`, `KeptAddress`, `KeptCity`, `KeptState`, `CPMobilenumber`, `PostDate`, `Status`, `UpdationDate`) VALUES
(1, 10, 'Wallet', 'Wallet (Brand Cisco)', 'Black leather wallet', NULL, NULL, 'Megna Road', 'Ghaziabad', 'UP', '10-01-2025', 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 8454728979, '2024-06-11 07:29:46', 'Claim Request', '2024-06-14 03:30:57'),
(4, 11, 'Insulin Kit', 'Insulin Kit Novorapid', 'Insulin kit of novorapid found', '8755ec2236c7975c65d591dd5711088a.jpg', 'cf0e849af5ea42fce54bf13b0d9de7c3.jpg', 'Mayur Vihar Metro station', 'Delhi', 'Delhi', '10-06-2024', 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 7987897987, '2024-06-11 13:26:48', NULL, '2024-06-14 03:30:57'),
(5, 11, 'ID Card', 'School ID Card', 'I found school identity card of school name daffodil public school ', '4454dbb5f2038c13ec0bba10224f964b1718347923.jpg', '4454dbb5f2038c13ec0bba10224f964b1718347923.jpg', 'Guari kunj apartment', 'Ghaziabad', 'UP', '14-06-2024', 'O-908, GHU, Block-7', 'Ghaziabad', 'UP', 7987899979, '2024-06-14 06:52:03', NULL, '2024-06-14 06:52:03'),
(6, 12, 'Laptop', 'Microsoft Laptopm', 'Microsoft Laptop black color', '8597e1ded49260a24ad221b098dbf9c81722964795.jpg', '8597e1ded49260a24ad221b098dbf9c81722964795.jpg', 'AbC road', 'Ghaziabad', 'UP', '05-08-2024', 'H no 123 Abc Aparmtnent', 'Ghaziabad', 'UP', 4152635241, '2024-08-06 17:19:55', 'Claimed', '2024-08-06 17:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '                We are pleased to introduce ourselves as Spiderfocus, a professional placement services organization. We are a prominent Recruitment Firm offering out of the box Campus recruitment solutions to Institutes and colleges. With a vision to explore and harness the talents of young leaders, we have come up with a concept of Campus recruitment and promotion of institutes and colleges looking to place their fresh candidates.<div><br></div>', NULL, NULL, '2024-02-05 07:30:56'),
(2, 'contactus', 'Contact Us', '                        Test Address<div>New Delhi India</div>', 'info@gmail.com', 8988858695, '2024-08-03 05:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `UserRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `UserRegdate`) VALUES
(1, 'Rahul Saxena', 'rahul@gmail.com', 8989898989, '202cb962ac59075b964b07152d234b70', '2024-02-08 06:08:37'),
(2, 'Farha Akthar', 'farha@gmail.com', 2525252525, '202cb962ac59075b964b07152d234b70', '2024-02-08 06:08:37'),
(3, 'Akash Jain', 'jain@gmail.com', 6544646544, '202cb962ac59075b964b07152d234b70', '2024-02-08 06:08:37'),
(4, 'Ginni Mishra', 'ginni@gmail.com', 3636363663, '202cb962ac59075b964b07152d234b70', '2024-02-08 06:08:37'),
(5, 'Anuj kumar', 'ak@gmail.com', 6174512546, 'f925916e2754e5e03f75dd58a5733251', '2024-02-08 06:08:37'),
(6, 'ABC', 'abctest@gmail.com', 123458900, 'f925916e2754e5e03f75dd58a5733251', '2024-02-08 06:08:37'),
(7, 'John Deo', 'johnde12@gmail.com', 1425632145, 'f925916e2754e5e03f75dd58a5733251', '2024-02-17 17:23:30'),
(8, 'Test Sample', 'test@gmail.com', 7979798798, '202cb962ac59075b964b07152d234b70', '2024-02-18 12:37:06'),
(9, 'Ram Kumar', 'ram@gmail.com', 5567891236, '202cb962ac59075b964b07152d234b70', '2024-06-11 03:31:25'),
(10, 'Rakesh Sharma', 'rakesh@gmail.com', 7894561236, '202cb962ac59075b964b07152d234b70', '2024-06-11 06:52:37'),
(11, 'Karan Singh', 'karan@gmail.com', 4789796547, '202cb962ac59075b964b07152d234b70', '2024-06-14 04:31:27'),
(12, 'Test user', 'tetsuer@t.com', 3211231230, 'f925916e2754e5e03f75dd58a5733251', '2024-08-06 17:18:16'),
(13, 'Amit', 'amit@test.com', 4141526362, 'f925916e2754e5e03f75dd58a5733251', '2024-08-06 17:20:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclaim`
--
ALTER TABLE `tblclaim`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclaimhistory`
--
ALTER TABLE `tblclaimhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfounditem`
--
ALTER TABLE `tblfounditem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uid` (`Userid`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclaim`
--
ALTER TABLE `tblclaim`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblclaimhistory`
--
ALTER TABLE `tblclaimhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfounditem`
--
ALTER TABLE `tblfounditem`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
