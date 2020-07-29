-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 05:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`username`, `password`, `email`, `fname`, `phone`, `type`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin', '2147483647', 'admin'),
('faraz', 'faraz', 'muhammad.faraz9@yahoo.com', 'muhammad faraz', '0335272211', 'student'),
('laiba', 'laiba', 'laiba@gmail.com', 'laiba mazhar', '8728372837', 'student'),
('pravesh', 'pravesh', 'rawatpravesh0016@gmail.com', 'Pravesh Rawat', '0992642003', 'student'),
('sumit', 'sumit', 'sumitbangar59@gmail.com', 'sumit bangar', '988766363', 'teacher'),
('umer23', 'umer', 'muhammadumer94@yahoo.com', 'muhammad umer', '0335272211', 'teacher'),
('zaiba', 'zaiba', 'zaiba@zenveus.com', 'zaiba ahmed', '0335272211', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Cid` int(100) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `Semester` int(100) NOT NULL,
  `Dept_id` int(100) NOT NULL,
  `Teacher_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Cid`, `CourseName`, `Semester`, `Dept_id`, `Teacher_id`) VALUES
(1, 'Cloud Computing', 2, 1, 1),
(2, 'Graphics Designing', 1, 1, 1),
(3, 'Software Engineering', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Did` int(100) NOT NULL,
  `Dept_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Did`, `Dept_Name`) VALUES
(1, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `markedattendance`
--

CREATE TABLE `markedattendance` (
  `ATID` int(100) NOT NULL,
  `Std_id` int(100) NOT NULL,
  `Course_id` int(100) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `AttDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markedattendance`
--

INSERT INTO `markedattendance` (`ATID`, `Std_id`, `Course_id`, `Status`, `AttDateTime`) VALUES
(8, 1, 3, 'present', '2020-07-26 15:13:56'),
(9, 1, 1, 'present', '2020-07-26 15:15:11'),
(10, 5, 3, 'present', '2020-07-26 15:49:29'),
(11, 1, 1, 'present', '2020-07-27 11:51:05'),
(12, 1, 1, 'absent', '2020-07-27 16:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `st_id` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `st_status` varchar(30) NOT NULL,
  `st_name` varchar(30) NOT NULL,
  `st_dept` varchar(30) NOT NULL,
  `st_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` int(100) NOT NULL,
  `st_name` varchar(20) NOT NULL,
  `st_dept` varchar(20) NOT NULL,
  `st_batch` int(4) NOT NULL,
  `st_sem` int(11) NOT NULL,
  `st_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES
(1, 'Pravesh', 'CSE', 2020, 2, 'rawatpravesh0016@gmail.com'),
(2, 'Nitish Sihmar', 'CSE', 2020, 3, 'sihmar.nitish@gmail.com'),
(3, 'Shivam Singh', 'CSE', 2020, 3, 'shivam@gmail.com'),
(4, 'Tushar Garg', 'CSE', 2020, 3, 'tushar@gmail.com'),
(5, 'faraz', 'CSE', 2018, 2, 'muhammad.faraz9@yahoo.com'),
(7, 'faraz', 'CSE', 2018, 2, 'ansarmuahammadfaraz@gmail.com'),
(8, 'faraz', 'CSE', 2018, 2, 'muhammad.faraz9@yahoo.com'),
(9, 'faraz', 'CSE', 2018, 2, 'muhammad.faraz9@yahoo.com'),
(10, 'laiba', 'CSE', 2018, 7, 'laiba@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tc_id` int(100) NOT NULL,
  `tc_name` varchar(20) NOT NULL,
  `tc_dept` varchar(20) NOT NULL,
  `tc_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tc_id`, `tc_name`, `tc_dept`, `tc_email`) VALUES
(1, 'Sumit Bangar', 'cse', 'sumit@gmail.com'),
(2, 'umer23', 'CSE', 'muhammadumer94@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `markedattendance`
--
ALTER TABLE `markedattendance`
  ADD PRIMARY KEY (`ATID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Did` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `markedattendance`
--
ALTER TABLE `markedattendance`
  MODIFY `ATID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `st_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
