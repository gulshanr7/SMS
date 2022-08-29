-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 01:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_login`
--

CREATE TABLE `adm_login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_login`
--

INSERT INTO `adm_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `classname`
--

CREATE TABLE `classname` (
  `Id` int(11) NOT NULL,
  `Class_Name` varchar(50) NOT NULL,
  `Class_Image` varchar(200) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classname`
--

INSERT INTO `classname` (`Id`, `Class_Name`, `Class_Image`, `Status`) VALUES
(38, 'BCA II', '250822162735new1.jfif', 1),
(39, 'BCA I', '250822162751class1.jfif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Slider_Id` int(50) NOT NULL,
  `Slider_Image` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Slider_ALT` varchar(200) NOT NULL,
  `Slider_Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Slider_Id`, `Slider_Image`, `Slider_ALT`, `Slider_Status`) VALUES
(2, '290822155007slide23.jpg', '123', 1),
(3, '290822155036slide22.jpg', 'Student Management System', 1),
(4, '290822160828slide23.jpg', 'SLIDER 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Stu_PIC` varchar(200) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Father_Name` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `CellNo` varchar(20) NOT NULL,
  `Adhar_card` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Admission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Name`, `Stu_PIC`, `Class_ID`, `Father_Name`, `DOB`, `CellNo`, `Adhar_card`, `Password`, `Admission_date`) VALUES
(3, 'as', '260822161945slide23.jpg', 38, 'dc', '1989-01-01', '121', '1234', '202cb962ac59075b964b07152d234b70', '2022-08-26 10:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `studentsold`
--

CREATE TABLE `studentsold` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsold`
--

INSERT INTO `studentsold` (`id`, `Name`, `Class`) VALUES
(1, 'Gulshan', 'BCAA'),
(2, 'Gulshan', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_login`
--
ALTER TABLE `adm_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classname`
--
ALTER TABLE `classname`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Slider_Id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Adhar_card` (`Adhar_card`),
  ADD KEY `Class_ID` (`Class_ID`);

--
-- Indexes for table `studentsold`
--
ALTER TABLE `studentsold`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_login`
--
ALTER TABLE `adm_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classname`
--
ALTER TABLE `classname`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Slider_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentsold`
--
ALTER TABLE `studentsold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Class_ID`) REFERENCES `classname` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
