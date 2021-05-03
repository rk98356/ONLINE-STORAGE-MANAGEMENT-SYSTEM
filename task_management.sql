-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 02:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `s_no` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `percentage_cgpa` double NOT NULL,
  `college_school` varchar(255) NOT NULL,
  `university_board` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `registration_date` datetime NOT NULL,
  `batch_no` int(11) NOT NULL,
  `time_slot` varchar(20) NOT NULL,
  `internship_type` tinyint(2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`s_no`, `user_id`, `email`, `password`, `desig`, `name`, `father_name`, `dob`, `qualification`, `percentage_cgpa`, `college_school`, `university_board`, `aadhar`, `address`, `mobile_no`, `registration_date`, `batch_no`, `time_slot`, `internship_type`, `status`) VALUES
(1, 'TECH821', 'sanyukta217@gmail.com', '32ef3650d2d8ccd3855807a8e83cbbc7', 'Admin', 'Sanyukta', 'Santosh Kumar', '1994-07-21', 'MCA', 89, 'PWC', 'Patna University', '123456789098', 'Patna', '9472482439', '2019-07-02 07:40:00', 0, '', 0, 1),
(2, 'TECH502', 'ravi.vikashtech@gmail.com', '63dd3e154ca6d948fc380fa576343ba6', 'Intern-02', 'Ravi Raushan Kumar', '', '0000-00-00', '', 0, '', '', '', '', '', '2019-07-02 11:19:15', 0, '', 0, 1),
(3, 'TECH227', 'hussainsyedintez@gmail.com', '8aaa25aabfc6d05fca30523b1602c322', 'Intern-01', 'Syed Hussain', 'Ejaz Hussain', '2000-11-21', '12th', 98, 'P', 'Patna University', '456789097654', 'Patna', '8210126527', '2019-07-11 15:10:07', 0, '', 0, 1),
(4, 'TECH768', 'saifali4785@gmail.com', '8a9feb01e536010a2f8da9cb7d85b25f', 'Intern-01', 'saif', 'md mukhtar quraishi', '1999-05-13', 'BCA 2', 7, 'ST PAULS', 'PU', '46567895220', 'alam ganj', '9905843735', '2019-07-23 16:39:21', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `worksheet`
--

CREATE TABLE `worksheet` (
  `s_no` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date_of_insertion` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worksheet`
--

INSERT INTO `worksheet` (`s_no`, `user_id`, `date_of_insertion`, `title`, `description`) VALUES
(1, 'ravi.vikashtech@gmail.com', '2019-07-02', 'TMS', 'Complete the project.'),
(2, 'ravi.vikashtech@gmail.com', '2019-07-11', 'nkjdsjlmnkvfdljl', 'hcdsihkjhikdhclsdj'),
(3, 'ravi.vikashtech@gmail.com', '2019-07-25', 'gytdhj', 'rdfuygkh'),
(4, 'ravi.vikashtech@gmail.com', '2019-08-08', 'Intern Project', 'Help out all interns in documentation.\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `worksheet`
--
ALTER TABLE `worksheet`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `worksheet`
--
ALTER TABLE `worksheet`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
