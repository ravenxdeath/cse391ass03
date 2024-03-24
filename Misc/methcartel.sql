-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 04:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `methcartel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Username`, `PasswordHash`, `Email`, `Phone`) VALUES
(1, 'admin', 'admin', '$2y$10$hShZYuHoDWNqamg2ElaBWeprfomGwlrKhxAZR/ZlmvPgfWfMJ/6wW', 'tahmidendless@gmail.com', '+8801773714424'),
(2, 'admin13', 'root', '$2y$10$a3dIsRQSI7Bwmo85Sq2a/ufjoIZ6bQZ1FTMVXzEp9hijIx4HHPzLe', 'root@gmail.com', '(505) 555-1258 ');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `MechanicID` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `AppointmentType` varchar(50) DEFAULT NULL,
  `AppointmentStatus` varchar(50) DEFAULT NULL,
  `ServiceRequested` text DEFAULT NULL,
  `PartsNeeded` text DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `CarID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `ClientID`, `MechanicID`, `AdminID`, `AppointmentDate`, `AppointmentTime`, `AppointmentType`, `AppointmentStatus`, `ServiceRequested`, `PartsNeeded`, `Notes`, `CarID`) VALUES
(1, 7, 1, NULL, '2024-02-26', '18:00:00', NULL, NULL, '                    \n                    crystal blue', NULL, NULL, NULL),
(2, 7, 2, NULL, '2024-02-29', '11:11:00', NULL, NULL, 'need new packets', NULL, NULL, NULL),
(3, 7, 2, NULL, '2024-02-29', '11:11:00', NULL, NULL, 'need new packets', NULL, NULL, NULL),
(4, 7, 3, NULL, '2024-02-29', '10:30:00', NULL, NULL, 'tight! tight', NULL, NULL, NULL),
(5, 7, 3, NULL, '2024-02-28', '09:35:00', NULL, 'Scheduled', 'xp', NULL, NULL, 3),
(6, 7, 2, NULL, '2024-03-01', '10:00:00', NULL, NULL, 'wanna work for mr. fring', NULL, NULL, 3),
(7, 4, 1, NULL, '2024-02-28', '17:37:00', NULL, NULL, 'jesse', NULL, NULL, 4),
(8, 7, 1, NULL, '2024-03-03', '10:00:00', NULL, 'In Progress', 'fix it', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CarID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `MechanicID` int(11) DEFAULT NULL,
  `CarColor` varchar(50) DEFAULT NULL,
  `CarLicenseNumber` varchar(50) DEFAULT NULL,
  `CarEngineNumber` varchar(50) DEFAULT NULL,
  `CarModel` varchar(100) DEFAULT NULL,
  `YearOfManufacture` int(11) DEFAULT NULL,
  `AdditionalDetails` text DEFAULT NULL,
  `MaintenanceHistory` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarID`, `ClientID`, `MechanicID`, `CarColor`, `CarLicenseNumber`, `CarEngineNumber`, `CarModel`, `YearOfManufacture`, `AdditionalDetails`, `MaintenanceHistory`) VALUES
(3, 7, NULL, 'purple', '11', '12312515', NULL, NULL, NULL, NULL),
(4, 4, NULL, 'black', '13', '1111', NULL, NULL, NULL, NULL),
(5, 4, NULL, 'black', '13', '1111', NULL, NULL, NULL, NULL),
(6, 7, NULL, 'black', '11', '11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PasswordHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `Name`, `Username`, `Phone`, `Email`, `PasswordHash`) VALUES
(4, 'Jane Margolis', 'Jane123', '123-456-7890', 'jane@example.com', '$2y$10$JWQmuyDAD4KQ/PszqJX9ZOhmdvUIUJ0pUfdcBQJWk5YeFidyx./t.'),
(5, 'Hank Schrader', 'Hank123', '456-789-0123', NULL, '$2y$10$iQp0SfwDujphJvgS8lxJB.jqwPwyx6kbUp./PBxFO76ylKX6dupde'),
(6, 'Skyler White', 'Skyler123', '789-012-3456', 'skyler@example.com', '$2y$10$/zOqrNEwXE3baal0Pj0zWevRjWcijFQf7XAHH4UGFaKKSdCWVf.XO'),
(7, 'Tahmid', 'raven', '+8801773714424', 'tahmidendless@gmail.com', '$2y$10$A49OlgzSuF1ivZ8GfHGnRumqPQcK6MOV.w86GCpVGAhs2LCaLH5N2');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `MechanicID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL,
  `DailyCarCapacity` int(11) DEFAULT NULL,
  `AverageRating` decimal(3,2) DEFAULT NULL,
  `TotalRatings` int(11) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`MechanicID`, `Username`, `Name`, `PasswordHash`, `Specialization`, `DailyCarCapacity`, `AverageRating`, `TotalRatings`, `Phone`) VALUES
(1, 'heisenberg', 'Walter White', '$2y$10$mwy8rGDvIE5sjktILBT48uSROdhYxv.Mg9iZ9qAyfYyzJsw8Fgq6a', 'senior', 13, NULL, NULL, '(505) 117-8987'),
(2, 'pinkman', 'Jesse Pinkman', '$2y$10$mNGv1kkGFItM5vcfU3.vfeOhJSaIFR1tmKaYCDkv.6z77Ro8zFOPK', 'junior', 6, NULL, NULL, '(505) 148-3369'),
(3, 'tuco', 'Tuco', '$2y$10$jVceRxB9IWew7PBH0hKjNO5oFyOIC6nbGFDQv57HyZlH4hxdSg31e', 'junior', 6, NULL, NULL, '111111111111'),
(4, NULL, 'Augustus Raven', NULL, 'junior', 3, NULL, NULL, NULL),
(5, NULL, 'Marcus Aurelius', NULL, 'senior', 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `MechanicID` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `Rating` decimal(3,2) DEFAULT NULL,
  `Review` text DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `MechanicID`, `ClientID`, `Rating`, `Review`, `Date`) VALUES
(1, 1, 7, 5.00, 'Tight', '2024-03-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `MechanicID` (`MechanicID`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `CarID` (`CarID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `MechanicID` (`MechanicID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`),
  ADD UNIQUE KEY `UC_Client_Email` (`Email`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`MechanicID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `MechanicID` (`MechanicID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `CarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `MechanicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`MechanicID`) REFERENCES `mechanic` (`MechanicID`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`CarID`) REFERENCES `car` (`CarID`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`MechanicID`) REFERENCES `mechanic` (`MechanicID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`MechanicID`) REFERENCES `mechanic` (`MechanicID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
