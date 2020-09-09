-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 01:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptitech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(200) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(101, 'Quants');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(200) NOT NULL,
  `topic_id` int(200) NOT NULL,
  `question` varchar(300) NOT NULL,
  `optionA` varchar(300) NOT NULL,
  `optionB` varchar(300) NOT NULL,
  `optionC` varchar(300) NOT NULL,
  `optionD` varchar(300) NOT NULL,
  `answer` varchar(300) NOT NULL,
  `solution_name` varchar(200) NOT NULL,
  `solution_type` varchar(200) NOT NULL,
  `solution` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `topic_id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer`, `solution_name`, `solution_type`, `solution`) VALUES
(1, 1, 'W.H.O.', 'We hate ovals', 'World Health Org', 'World haters orgy', 'Win hate oppa', 'optionB', 'Simple', 'Simple', ''),
(1, 2, 'Who are u', 'no one', 'one no', 'noe on', 'noo en', 'optionA', 'Nothing', 'pdf', ''),
(2, 1, 'Wat is distance', 'speed/time', 'time/speed', 'speed*time', 'speed+time', 'optionC', 'OK', 'OK', ''),
(2, 2, '25=', '20+5', '10+16', '10+17', '23+3', 'optionA', 'sum', 'dpf', '');

--
-- Triggers `question`
--
DELIMITER $$
CREATE TRIGGER `count_down` AFTER DELETE ON `question` FOR EACH ROW UPDATE topic SET no_of_questions=no_of_questions-1 WHERE topic_id=OLD.topic_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `count_up` AFTER INSERT ON `question` FOR EACH ROW UPDATE topic SET no_of_questions=no_of_questions+1 WHERE topic_id=NEW.topic_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `student_usn` varchar(50) NOT NULL,
  `topic_id` int(200) NOT NULL,
  `total_marks` int(100) NOT NULL,
  `time_taken` time NOT NULL,
  `exam_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`student_usn`, `topic_id`, `total_marks`, `time_taken`, `exam_date`) VALUES
('4CB17CS022', 1, 1, '00:00:07', '2020-07-25 12:08:08'),
('4CB17CS022', 2, 1, '00:10:14', '2020-07-24 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `email`, `department`, `mobile_number`, `password`) VALUES
('1', 'Deepak ', 'ddbhat99@gmail.com', 'CSE', 876284032, 'Deepak@123'),
('4CB17CS022', 'Deepak D Bhat', 'ddb99@gmail.com', 'CSE', 8762840326, '$2y$10$AvyMMs3aBmPKy3kRoUvJaOHhBz4nB3ZXSOv6OAdosjpNzj3o0fpym'),
('4CB17CS035', 'Disha D Bhat', 'd@g.com', 'CSE', 7625025859, '$2y$10$baN9okw21xnSsxcIRtUrl.7wFiJK6it2zqLSR//BqIsg2P4jVe7sG'),
('4CB17CS057', 'Nireeksha Pk', 'nireekshapk17@gmail.com', 'CSE', 7829276325, '$2y$10$WMiNn6sg2b/LrwwNqNkcqe.opVRpqdd1v6XBa/SzDKAwTEvX6OT6.');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(200) NOT NULL,
  `cat_id` int(200) NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `max_time` int(100) NOT NULL,
  `intro_name` varchar(200) NOT NULL,
  `intro_type` varchar(200) NOT NULL,
  `introduction` blob NOT NULL,
  `no_of_questions` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `cat_id`, `topic_name`, `max_time`, `intro_name`, `intro_type`, `introduction`, `no_of_questions`) VALUES
(1, 101, 'Time Speed and Distance', 10, 'Google maadi', 'pdf', '', 12),
(2, 101, 'Ages', 10, 'Simple', 'You can solve', '', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`,`topic_id`) USING BTREE,
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`student_usn`,`topic_id`),
  ADD KEY `fk_topic` (`topic_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `fk_usn` FOREIGN KEY (`student_usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
