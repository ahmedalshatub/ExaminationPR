-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 10:07 PM
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
  `Answer` text CHARACTER SET latin1 NOT NULL,
  `ExamID` int(11) NOT NULL,
  `AnswerDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `answerstable`
--

INSERT INTO `answerstable` (`StID`, `QestionID`, `Answer`, `ExamID`, `AnswerDateTime`) VALUES
(6, 21, 'True', 10, '2019-04-21 17:51:08'),
(6, 22, '132132', 10, '2019-04-21 17:51:08'),
(6, 23, 'jpg,gif,', 10, '2019-04-21 17:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `dgreestable`
--

CREATE TABLE `dgreestable` (
  `DgreeID` int(11) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `StID` int(11) NOT NULL,
  `Dgree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dgreestable`
--

INSERT INTO `dgreestable` (`DgreeID`, `ExamID`, `StID`, `Dgree`) VALUES
(2, 10, 6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `examtable`
--

CREATE TABLE `examtable` (
  `ExamID` int(11) NOT NULL,
  `ExamTitle` text CHARACTER SET latin1 NOT NULL,
  `MetalID` int(11) NOT NULL,
  `ExamDate` date NOT NULL,
  `ExamTime` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `examtable`
--

INSERT INTO `examtable` (`ExamID`, `ExamTitle`, `MetalID`, `ExamDate`, `ExamTime`) VALUES
(10, 'Ø§Ù„Ø´Ù‡Ø± Ø§Ù„Ø§ÙˆÙ„', 5, '2019-04-13', '00:00');

-- --------------------------------------------------------

--
-- Table structure for table `metaltable`
--

CREATE TABLE `metaltable` (
  `MetalID` int(11) NOT NULL,
  `MetalName` text CHARACTER SET latin1 NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `metaltable`
--

INSERT INTO `metaltable` (`MetalID`, `MetalName`, `TeacherID`, `Level`) VALUES
(5, 'Ø¶ØºØ·', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `objectiontable`
--

CREATE TABLE `objectiontable` (
  `ObjectionID` int(11) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `StID` int(11) NOT NULL,
  `objectionTitle` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `questionchoice`
--

CREATE TABLE `questionchoice` (
  `ChID` int(11) NOT NULL,
  `ChoiceTitle` text CHARACTER SET latin1 NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `questionchoice`
--

INSERT INTO `questionchoice` (`ChID`, `ChoiceTitle`, `QuestionID`) VALUES
(45, 'jpg', 23),
(46, 'png', 23),
(47, 'gif', 23),
(48, 'pmb', 23);

-- --------------------------------------------------------

--
-- Table structure for table `questionstable`
--

CREATE TABLE `questionstable` (
  `QuestionID` int(11) NOT NULL,
  `QuestionTittle` text CHARACTER SET latin1 NOT NULL,
  `QuestionType` text CHARACTER SET latin1 NOT NULL,
  `ExamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `questionstable`
--

INSERT INTO `questionstable` (`QuestionID`, `QuestionTittle`, `QuestionType`, `ExamID`) VALUES
(21, 'Ù‡Ù„ ØªØ¹ØªØ¨Ø± Ø§Ù„ pmb ÙˆØ³ÙŠÙ„Ø© Ø¶ØºØ·', 'TF', 10),
(22, 'Ø¹Ø±Ù Ø§Ù„Ø¶ØºØ·', 'Te', 10),
(23, 'Ù…Ø§ Ù‡ÙŠ ØµÙŠØº Ø§Ù„Ø¶ØºØ·', 'Mu', 10);

-- --------------------------------------------------------

--
-- Table structure for table `studentstable`
--

CREATE TABLE `studentstable` (
  `StID` int(11) NOT NULL,
  `StName` text CHARACTER SET latin1 NOT NULL,
  `StPassword` text CHARACTER SET latin1 NOT NULL,
  `StLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `studentstable`
--

INSERT INTO `studentstable` (`StID`, `StName`, `StPassword`, `StLevel`) VALUES
(6, 'Ù…ØµØ·ÙÙ‰ Ø³Ù„ÙŠÙ…', '84983', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacherstable`
--

CREATE TABLE `teacherstable` (
  `TeacherID` int(11) NOT NULL,
  `TeacherName` text CHARACTER SET latin1 NOT NULL,
  `TeacherPassword` text CHARACTER SET latin1 NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `teacherstable`
--

INSERT INTO `teacherstable` (`TeacherID`, `TeacherName`, `TeacherPassword`, `Level`) VALUES
(1, 'ali majid', '1234', 0),
(10, 'ahmed', '318', 1),
(11, 'a', 'b', 0);

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
-- Indexes for table `dgreestable`
--
ALTER TABLE `dgreestable`
  ADD PRIMARY KEY (`DgreeID`),
  ADD KEY `StID` (`StID`),
  ADD KEY `ExamID` (`ExamID`);

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
-- Indexes for table `objectiontable`
--
ALTER TABLE `objectiontable`
  ADD PRIMARY KEY (`ObjectionID`),
  ADD KEY `ExamID` (`ExamID`),
  ADD KEY `StID` (`StID`);

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
-- AUTO_INCREMENT for table `dgreestable`
--
ALTER TABLE `dgreestable`
  MODIFY `DgreeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examtable`
--
ALTER TABLE `examtable`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `metaltable`
--
ALTER TABLE `metaltable`
  MODIFY `MetalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `objectiontable`
--
ALTER TABLE `objectiontable`
  MODIFY `ObjectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questionchoice`
--
ALTER TABLE `questionchoice`
  MODIFY `ChID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `questionstable`
--
ALTER TABLE `questionstable`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `studentstable`
--
ALTER TABLE `studentstable`
  MODIFY `StID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacherstable`
--
ALTER TABLE `teacherstable`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answerstable`
--
ALTER TABLE `answerstable`
  ADD CONSTRAINT `answerstable_ibfk_1` FOREIGN KEY (`StID`) REFERENCES `studentstable` (`StID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answerstable_ibfk_2` FOREIGN KEY (`ExamID`) REFERENCES `examtable` (`ExamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answerstable_ibfk_3` FOREIGN KEY (`QestionID`) REFERENCES `questionstable` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dgreestable`
--
ALTER TABLE `dgreestable`
  ADD CONSTRAINT `dgreestable_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `examtable` (`ExamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dgreestable_ibfk_2` FOREIGN KEY (`StID`) REFERENCES `studentstable` (`StID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examtable`
--
ALTER TABLE `examtable`
  ADD CONSTRAINT `examtable_ibfk_1` FOREIGN KEY (`MetalID`) REFERENCES `metaltable` (`MetalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `metaltable`
--
ALTER TABLE `metaltable`
  ADD CONSTRAINT `metaltable_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teacherstable` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `objectiontable`
--
ALTER TABLE `objectiontable`
  ADD CONSTRAINT `objectiontable_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `examtable` (`ExamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objectiontable_ibfk_2` FOREIGN KEY (`StID`) REFERENCES `studentstable` (`StID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questionchoice`
--
ALTER TABLE `questionchoice`
  ADD CONSTRAINT `questionchoice_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `questionstable` (`QuestionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questionstable`
--
ALTER TABLE `questionstable`
  ADD CONSTRAINT `questionstable_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `examtable` (`ExamID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
