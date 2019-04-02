-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 05:08 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `examtable`
--

CREATE TABLE `examtable` (
  `ExamID` int(11) NOT NULL,
  `ExamTitle` text NOT NULL,
  `MetalID` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `ExamTime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examtable`
--

INSERT INTO `examtable` (`ExamID`, `ExamTitle`, `MetalID`, `ExamDate`, `ExamTime`) VALUES
(5, 'First exam', 1, '2019-03-20', '12:30');

-- --------------------------------------------------------

--
-- Table structure for table `metaltable`
--

CREATE TABLE `metaltable` (
  `MetalID` int(11) NOT NULL,
  `MetalName` text NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metaltable`
--

INSERT INTO `metaltable` (`MetalID`, `MetalName`, `TeacherID`, `Level`) VALUES
(1, 'c++', 1, 1),
(2, 'java', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `questionchoice`
--

CREATE TABLE `questionchoice` (
  `ChID` int(11) NOT NULL,
  `ChoiceTitle` text NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionchoice`
--

INSERT INTO `questionchoice` (`ChID`, `ChoiceTitle`, `QuestionID`) VALUES
(17, '1', 6),
(18, '2', 6),
(19, '3', 6),
(20, '4', 6),
(21, 'ali', 7),
(22, 'ahmed', 7),
(23, 'ahmed ali', 7),
(24, 'ali ahmed', 7),
(25, '|Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ…', 8),
(26, 'Ø´Ù„ÙˆÙ†ÙƒÙ…', 8),
(27, 'ÙˆØ¹Ù„ÙŠÙƒÙ… Ø§Ù„Ø³Ù„Ø§Ù…', 8),
(28, 'Ø«ÙŠÙ…Ù„Ø§', 8);

-- --------------------------------------------------------

--
-- Table structure for table `questionstable`
--

CREATE TABLE `questionstable` (
  `QuestionID` int(11) NOT NULL,
  `QuestionTittle` text NOT NULL,
  `QuestionType` text NOT NULL,
  `ExamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionstable`
--

INSERT INTO `questionstable` (`QuestionID`, `QuestionTittle`, `QuestionType`, `ExamID`) VALUES
(4, '5', 'Ù‡Ø°Ø§ Ø²Ø§ÙŠØ¯', 0),
(5, '5', 'Ø§ÙƒØªØ¨ Ø§ÙŠ Ø´ÙŠ ØªØ¹Ø±ÙÙ‡ Ø¹Ù† Ø§Ù„c++', 0),
(6, '5', 'chois any thing', 0),
(7, '5', 'name', 0),
(8, '5', 'hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stdgreetable`
--

CREATE TABLE `stdgreetable` (
  `StID` int(11) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `TheDgree` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentstable`
--

CREATE TABLE `studentstable` (
  `StID` int(11) NOT NULL,
  `StName` text NOT NULL,
  `StPassword` text NOT NULL,
  `StLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentstable`
--

INSERT INTO `studentstable` (`StID`, `StName`, `StPassword`, `StLevel`) VALUES
(2, 'ahmed1', '1234', 2),
(3, 'ali', '899', 2),
(4, 'hhh', 'aaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacherstable`
--

CREATE TABLE `teacherstable` (
  `TeacherID` int(11) NOT NULL,
  `TeacherName` text NOT NULL,
  `TeacherPassword` text NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherstable`
--

INSERT INTO `teacherstable` (`TeacherID`, `TeacherName`, `TeacherPassword`, `Level`) VALUES
(1, 'Ahmed', 'Hamada', 0),
(3, 'Ali', 'hh', 0),
(4, 'mo', '132', 0),
(7, 'ccc', '222', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examtable`
--
ALTER TABLE `examtable`
  ADD PRIMARY KEY (`ExamID`);

--
-- Indexes for table `metaltable`
--
ALTER TABLE `metaltable`
  ADD PRIMARY KEY (`MetalID`);

--
-- Indexes for table `questionchoice`
--
ALTER TABLE `questionchoice`
  ADD PRIMARY KEY (`ChID`);

--
-- Indexes for table `questionstable`
--
ALTER TABLE `questionstable`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `studentstable`
--
ALTER TABLE `studentstable`
  ADD PRIMARY KEY (`StID`);

--
-- Indexes for table `teacherstable`
--
ALTER TABLE `teacherstable`
  ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examtable`
--
ALTER TABLE `examtable`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `metaltable`
--
ALTER TABLE `metaltable`
  MODIFY `MetalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questionchoice`
--
ALTER TABLE `questionchoice`
  MODIFY `ChID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `questionstable`
--
ALTER TABLE `questionstable`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentstable`
--
ALTER TABLE `studentstable`
  MODIFY `StID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacherstable`
--
ALTER TABLE `teacherstable`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
