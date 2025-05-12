-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 01:23 PM
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
-- Database: `tanrail`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` int(11) NOT NULL,
  `claim` varchar(1000) NOT NULL,
  `submittedBy` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `PManswer` varchar(500) NOT NULL,
  `PCanswer` varchar(500) NOT NULL,
  `GManswer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claim_id`, `claim`, `submittedBy`, `date`, `PManswer`, `PCanswer`, `GManswer`) VALUES
(1, 'Tunashinda njaa hatuna maji ya kunywa', '1', '0000-00-00', 'Tutawapatia Pesa ya kujikimu', 'IMEPITIHSWA', 'SAWA'),
(2, 'Maji hayatoki', '1', '0000-00-00', '', '', 'OK'),
(3, 'Hakuna dawa za famigation', '1', '2025-04-25', '', 'JUU', ''),
(4, 'Tunataka iongezwa kazi nuhshhsg', '1', '2025-04-30', 'POA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `coach_id` int(11) NOT NULL,
  `coach_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`coach_id`, `coach_no`) VALUES
(1, 'BCB-K-2201'),
(2, 'BCB-K-2202'),
(3, 'BCB-K-2203'),
(4, 'BCB-K-2204'),
(5, 'BCB-K-2205'),
(6, 'BCB-K-2206');

-- --------------------------------------------------------

--
-- Table structure for table `dailycleanliness`
--

CREATE TABLE `dailycleanliness` (
  `Dailysupervision_id` int(11) NOT NULL,
  `supervisionRef` varchar(100) NOT NULL,
  `Station` varchar(200) NOT NULL,
  `Train_No` varchar(200) NOT NULL,
  `Coach_No` varchar(200) NOT NULL,
  `Hand_Wash` varchar(100) NOT NULL,
  `Tissue` varchar(100) NOT NULL,
  `WindowCleaning` varchar(100) NOT NULL,
  `FloorCleaning` varchar(100) NOT NULL,
  `SeatCleaning` varchar(100) NOT NULL,
  `TableCleaning` varchar(100) NOT NULL,
  `Detergents` varchar(100) NOT NULL,
  `GlassCleaning` varchar(100) NOT NULL,
  `DoorCleaning` varchar(100) NOT NULL,
  `Diaphragm` varchar(100) NOT NULL,
  `CarrierCleaning` varchar(100) NOT NULL,
  `ACpoles` varchar(100) NOT NULL,
  `SanitaryBinProvision` varchar(100) NOT NULL,
  `BinEmpties` varchar(100) NOT NULL,
  `BinCleaned` varchar(100) NOT NULL,
  `BagsProvision` varchar(100) NOT NULL,
  `ExteriorCleaning` varchar(100) NOT NULL,
  `Decantation` varchar(100) NOT NULL,
  `FlashingDecanted` varchar(100) NOT NULL,
  `TankExteriorCleaning` varchar(100) NOT NULL,
  `WateronArivalP` varchar(100) NOT NULL,
  `WateronArrivalT` varchar(100) NOT NULL,
  `WateronDepartureP` varchar(100) NOT NULL,
  `WateronDepartureT` varchar(100) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `approvalPM` varchar(100) NOT NULL,
  `ApprovalPC` varchar(100) NOT NULL,
  `Supervisor` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateFilter` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailycleanliness`
--

INSERT INTO `dailycleanliness` (`Dailysupervision_id`, `supervisionRef`, `Station`, `Train_No`, `Coach_No`, `Hand_Wash`, `Tissue`, `WindowCleaning`, `FloorCleaning`, `SeatCleaning`, `TableCleaning`, `Detergents`, `GlassCleaning`, `DoorCleaning`, `Diaphragm`, `CarrierCleaning`, `ACpoles`, `SanitaryBinProvision`, `BinEmpties`, `BinCleaned`, `BagsProvision`, `ExteriorCleaning`, `Decantation`, `FlashingDecanted`, `TankExteriorCleaning`, `WateronArivalP`, `WateronArrivalT`, `WateronDepartureP`, `WateronDepartureT`, `Comment`, `photo`, `approvalPM`, `ApprovalPC`, `Supervisor`, `Date`, `dateFilter`) VALUES
(1, '1004266268', 'Dar es salaam', 'E6800-02', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '', '', '', '', '', '', '1', '1', '1', '2025-05-01 15:10:10', '0000-00-00'),
(2, '1004266268', 'Dar es salaam', 'E6800-02', 'BCB-K-2202', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '', '', '', '', '', '', '1', '1', '1', '2025-05-01 15:10:10', '0000-00-00'),
(3, '1004266268', 'Dar es salaam', 'E6800-02', 'BCB-K-2203', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '230', '230', '230', '230', '', '', '1', '1', '1', '2025-05-01 15:10:10', '0000-00-00'),
(4, '710723784', 'Dar es salaam', 'E6800-03', 'BCB-K-2201', 'Not Provided', 'Provided', 'Not Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '260', '290', '200', '390', 'OK', '', '1', '1', '1', '2025-05-01 15:22:56', '0000-00-00'),
(5, '841643073', 'Dar es salaam', 'E6800-01', 'BCB-K-2201', 'Provided', 'Not Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '250', '240', '250', '250', 'ok', '', '1', '1', '1', '2025-05-01 15:23:10', '0000-00-00'),
(6, '2076358012', 'Dodoma', 'E6800-02', 'BCB-K-2201', 'Provided', 'Not Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Not Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Not Cleaned', 'Provided', 'Not Cleaned', 'Decanted', 'Flashed', 'Cleaned', '150', '140', '1000', '1000', 'ok', 'API FETCH TO JSON.JPG', '1', '1', '1', '2025-05-01 15:22:34', '0000-00-00'),
(7, '2076358012', 'Dodoma', 'E6800-02', 'BCB-K-2202', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Not Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '500', '400', '1000', '1000', '', '', '1', '1', '1', '2025-05-01 15:22:34', '0000-00-00'),
(8, '457118671', 'Dar es salaam', 'E6800-01', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '100', '200', '300', '500', '', '', '1', '0', '1', '2025-05-09 11:41:19', '0000-00-00'),
(9, '1218199094', 'Igandu', 'E6800-01', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '600', '600', '1000', '1000', '', '', '1', '0', '1', '2025-05-12 05:52:09', '0000-00-00'),
(10, '1425259747', 'Dodoma', 'E6800-01', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '100', '100', '600', '600', '', '', '1', '0', '1', '2025-05-12 05:52:14', '2025-05-11'),
(11, '718973024', 'Kilosa', 'E6800-01', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '100', '100', '600', '600', '', '', '0', '0', '1', '2025-05-12 05:52:50', '2025-05-12'),
(12, '718973024', 'Kilosa', 'E6800-01', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '200', '200', '600', '600', '', '', '0', '0', '1', '2025-05-12 05:53:08', '2025-05-12'),
(13, '718973024', 'Kilosa', 'E6800-01', 'BCB-K-2203', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '100', '100', '200', '200', '', '', '0', '0', '1', '2025-05-12 05:54:37', '2025-05-12'),
(14, '1671235590', 'Igandu', 'E6800-02', 'BCB-K-2201', 'Provided', 'Provided', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Applied', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Cleaned', 'Provided', 'Emptied', 'Cleaned', 'Provided', 'Cleaned', 'Decanted', 'Flashed', 'Cleaned', '100', '100', '700', '700', '', '', '0', '0', '1', '2025-05-12 05:58:30', '2025-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `fumigation`
--

CREATE TABLE `fumigation` (
  `fumigation_id` int(11) NOT NULL,
  `supervisionRef` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `train_no` varchar(100) NOT NULL,
  `coach_no` varchar(100) NOT NULL,
  `fumigation` varchar(100) NOT NULL,
  `pesticides` varchar(100) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `approvalPM` varchar(100) NOT NULL,
  `approvalPC` varchar(100) NOT NULL,
  `Supervisor` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateFilter` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fumigation`
--

INSERT INTO `fumigation` (`fumigation_id`, `supervisionRef`, `station`, `train_no`, `coach_no`, `fumigation`, `pesticides`, `comment`, `photo`, `approvalPM`, `approvalPC`, `Supervisor`, `date`, `dateFilter`) VALUES
(1, '2079327033', 'Dodoma', 'E6800-02', 'BCB-K-2201', 'Cleaned', 'Not Applied', '', '', '1', '1', '1', '2025-05-01 15:22:28', '0000-00-00'),
(2, '2079327033', 'Dodoma', 'E6800-02', 'BCB-K-2202', 'Cleaned', 'Applied', '', '', '1', '1', '1', '2025-05-01 15:22:28', '0000-00-00'),
(3, '727569236', 'Dodoma', 'E6800-01', 'BCB-K-2201', 'Fumigation Done', 'Applied', '', '', '0', '0', '1', '2025-05-11 18:29:29', '2025-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `interiorcleaning`
--

CREATE TABLE `interiorcleaning` (
  `cleaning_id` int(11) NOT NULL,
  `supervisionRef` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `train_no` varchar(100) NOT NULL,
  `coach_no` varchar(100) NOT NULL,
  `cleanlinessStatus` varchar(100) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `approvalPM` varchar(100) NOT NULL,
  `approvalPC` varchar(100) NOT NULL,
  `Supervisor` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateFilter` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interiorcleaning`
--

INSERT INTO `interiorcleaning` (`cleaning_id`, `supervisionRef`, `station`, `train_no`, `coach_no`, `cleanlinessStatus`, `comment`, `photo`, `approvalPM`, `approvalPC`, `Supervisor`, `date`, `dateFilter`) VALUES
(1, '1673295784', 'Dar es salaam', 'E6800-01', 'BCB-K-2201', 'Not Cleaned', 'ok', '', '1', '1', '1', '2025-05-01 15:16:23', '0000-00-00'),
(2, '1673295784', 'Dar es salaam', 'E6800-01', 'BCB-K-2202', 'Not Cleaned', '', '', '1', '1', '1', '2025-05-01 15:16:23', '0000-00-00'),
(3, '1673295784', 'Dar es salaam', 'E6800-01', 'BCB-K-2203', 'Cleaned', '', '', '1', '1', '1', '2025-05-01 15:16:23', '0000-00-00'),
(4, '1673295784', 'Dar es salaam', 'E6800-01', 'BCB-K-2204', 'Not Cleaned', '', '', '1', '1', '1', '2025-05-01 15:16:23', '0000-00-00'),
(5, '1673295784', 'Dar es salaam', 'E6800-01', 'BCB-K-2201', 'Not Cleaned', 'ok', '', '1', '1', '1', '2025-05-01 15:16:23', '0000-00-00'),
(6, '2067160290', 'Dar es salaam', 'E6800-01', 'BCB-K-2201', 'Cleaned', '', '', '0', '0', '1', '2025-05-11 16:37:12', '0000-00-00'),
(7, '1704259132', 'Igandu', 'E6800-03', 'BCB-K-2201', 'Cleaned', '', '', '1', '0', '1', '2025-05-12 05:52:19', '0000-00-00'),
(8, '474372912', 'Kilosa', 'E6800-03', 'BCB-K-2201', 'Cleaned', '', '', '0', '0', '1', '2025-05-11 17:58:43', '2025-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `mainactivities`
--

CREATE TABLE `mainactivities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mainactivities`
--

INSERT INTO `mainactivities` (`activity_id`, `activity_name`) VALUES
(1, 'Daily Cleanliness Activities'),
(2, 'Vacuum Cleaning and Train Interior Floor Washing'),
(3, 'Fumigation of Coaches');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_name`) VALUES
(1, 'Dar es salaam'),
(2, 'Pugu'),
(3, 'Ruvu'),
(4, 'Soga'),
(5, 'Ngerengere'),
(6, 'Morogoro'),
(7, 'Msata'),
(8, 'Kilosa'),
(9, 'Gulwe'),
(10, 'Igandu'),
(11, 'Dodoma'),
(12, 'Kidete');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `supervisor_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `jobTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`supervisor_id`, `fname`, `lname`, `sname`, `gender`, `dob`, `email`, `contact`, `username`, `password`, `station`, `jobTitle`) VALUES
(1, 'YUSUPH', 'ZACHARIA', 'SHITENGE', 'Male', '1996-04-23', 'yusuph.shitenge@tanrail.co.tz', '0756176442', 'yusuph.shitenge@tanrail.co.tz', '660e2e09d9311ea1d8c99d29a343cf53', 'Dar es Salaam', 'Admin'),
(2, 'MASOUD', 'SHITENGE', 'RAMADHANI', 'Male', '2008-02-09', 'masoud@tanrail.co.tz', '0756176442', 'masoud@tanrail.co.tz', '660e2e09d9311ea1d8c99d29a343cf53', 'Dar es salaam', 'Supervisor'),
(3, 'MARIAM', 'SALUM', 'RAMADHANI', 'Female', '2013-02-07', 'rama@tanrail.co.tz', '0756176225', 'rama@tanrail.co.tz', '660e2e09d9311ea1d8c99d29a343cf53', 'Morogoro', 'PM'),
(4, 'KULWA', 'RASHID', 'KULWA', 'Male', '2025-05-01', 'kulwa@tanrail.co.tz', '0671661771', 'kulwa@tanrail.co.tz', '660e2e09d9311ea1d8c99d29a343cf53', 'Kilosa', 'PC'),
(6, 'DOCTOR', 'MAGENGE', 'DOCTOR', 'Male', '2025-05-02', 'doctor@tanrail.co.tz', '071761771771', 'doctor@tanrail.co.tz', '660e2e09d9311ea1d8c99d29a343cf53', 'Dar es salaam', 'GM');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_id` int(11) NOT NULL,
  `train_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `train_no`) VALUES
(1, 'E6800-01'),
(2, 'E6800-02'),
(3, 'E6800-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`coach_id`);

--
-- Indexes for table `dailycleanliness`
--
ALTER TABLE `dailycleanliness`
  ADD PRIMARY KEY (`Dailysupervision_id`);

--
-- Indexes for table `fumigation`
--
ALTER TABLE `fumigation`
  ADD PRIMARY KEY (`fumigation_id`);

--
-- Indexes for table `interiorcleaning`
--
ALTER TABLE `interiorcleaning`
  ADD PRIMARY KEY (`cleaning_id`);

--
-- Indexes for table `mainactivities`
--
ALTER TABLE `mainactivities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dailycleanliness`
--
ALTER TABLE `dailycleanliness`
  MODIFY `Dailysupervision_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fumigation`
--
ALTER TABLE `fumigation`
  MODIFY `fumigation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interiorcleaning`
--
ALTER TABLE `interiorcleaning`
  MODIFY `cleaning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mainactivities`
--
ALTER TABLE `mainactivities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
