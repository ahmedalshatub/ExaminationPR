-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 12:03 AM
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
-- Table structure for table `answerstable`
--

CREATE TABLE `answerstable` (
  `StID` int(11) NOT NULL,
  `QestionID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `ExamID` int(11) NOT NULL,
  `AnswerDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerstable`
--

INSERT INTO `answerstable` (`StID`, `QestionID`, `Answer`, `ExamID`, `AnswerDateTime`) VALUES
(2, 12, 'True', 7, '2019-04-11 18:49:18'),
(2, 13, '1234', 7, '2019-04-11 18:49:18'),
(2, 14, '14,', 7, '2019-04-11 18:49:18'),
(4, 12, 'True', 7, '2019-04-11 21:20:58'),
(4, 13, 'ahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateefahmed lateef', 7, '2019-04-11 21:20:58'),
(4, 14, '12,13,14,15,', 7, '2019-04-11 21:20:58');

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
(6, 'Hello', 1, '2019-04-07', '23:02'),
(7, 'aaa', 1, '2019-04-11', '12:03');

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
(2, 'java', 1, 3),
(3, 'c#', 1, 2);

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
(28, 'Ø«ÙŠÙ…Ù„Ø§', 8),
(29, '1', 11),
(30, '2', 11),
(31, '3', 11),
(32, '4', 11),
(33, '12', 14),
(34, '13', 14),
(35, '14', 14),
(36, '15', 14);

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
(9, 'Is True', 'TF', 6),
(10, 'Whats Type', 'Te', 6),
(11, 'a', 'Mu', 6),
(12, 'Ù‡Ø°Ø§ Ø²Ø§ÙŠØ¯', 'TF', 7),
(13, 'Ø§ÙƒØªØ¨ Ø§ÙŠ Ø´ÙŠ ØªØ¹Ø±ÙÙ‡ Ø¹Ù† Ø§Ù„c++', 'Te', 7),
(14, 'chois any thing', 'Mu', 7);

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
(2, 'ahmed1', '1234', 1),
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
-- Indexes for table `answerstable`
--
ALTER TABLE `answerstable`
  ADD KEY `StID` (`StID`),
  ADD KEY `ExamID` (`ExamID`),
  ADD KEY `QestionID` (`QestionID`);

--
-- Indexes for table `examtable`
--
ALTER TABLE `examtable`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `ExamID` (`ExamID`),
  ADD KEY `MetalID` (`MetalID`);

--
-- Indexes for table `metaltable`
--
ALTER TABLE `metaltable`
  ADD PRIMARY KEY (`MetalID`),
  ADD KEY `TeacherID` (`TeacherID`),
  ADD KEY `MetalID` (`MetalID`);

--
-- Indexes for table `questionchoice`
--
ALTER TABLE `questionchoice`
  ADD PRIMARY KEY (`ChID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `questionstable`
--
ALTER TABLE `questionstable`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `ExamID` (`ExamID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `studentstable`
--
ALTER TABLE `studentstable`
  ADD PRIMARY KEY (`StID`),
  ADD KEY `StID` (`StID`);

--
-- Indexes for table `teacherstable`
--
ALTER TABLE `teacherstable`
  ADD PRIMARY KEY (`TeacherID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examtable`
--
ALTER TABLE `examtable`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metaltable`
--
ALTER TABLE `metaltable`
  MODIFY `MetalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questionchoice`
--
ALTER TABLE `questionchoice`
  MODIFY `ChID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questionstable`
--
ALTER TABLE `questionstable`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `studentstable`
--
ALTER TABLE `studentstable`
  MODIFY `StID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacherstable`
--
ALTER TABLE `teacherstable`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
