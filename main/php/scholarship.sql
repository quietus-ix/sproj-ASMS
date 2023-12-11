-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2023 at 03:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `ad_lname` varchar(50) NOT NULL,
  `ad_fname` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_address` varchar(50) NOT NULL,
  `ad_mobileNum` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `ad_lname`, `ad_fname`, `ad_email`, `ad_address`, `ad_mobileNum`) VALUES
(7, 'Malba', 'Angel', 'angel@gmail.com', 'Bacolod City', '09155279882'),
(8, 'Flores', 'Renee Marie', 'renee@gmail.com', 'Murcia', '09155279882'),
(9, 'palanog', 'renlyngrace', 'palanogrenlyngrace@gmail.com', 'brgy zone 1 pulupandan', '09158453238');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_yearlevel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_yearlevel`) VALUES
(1, 'BS in Information Technology', '1'),
(2, 'BS in Information Technology', '2'),
(3, 'BS in Information Technology', '3'),
(4, 'BS in Information Technology', '4'),
(6, 'BS in Information System', '1'),
(7, 'BS in Information System', '2'),
(8, 'BS in Information System', '3'),
(9, 'BS in Information System', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notif_id` int(11) NOT NULL,
  `notif_type` int(11) NOT NULL,
  `notif_ref` int(11) NOT NULL,
  `notif_new` tinyint(1) NOT NULL,
  `notif_time` time NOT NULL,
  `notif_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholar_application`
--

CREATE TABLE `tbl_scholar_application` (
  `scholar_id` int(11) NOT NULL,
  `scholar_course` int(11) NOT NULL,
  `scholar_family` int(11) NOT NULL,
  `scholar_ln` varchar(128) NOT NULL,
  `scholar_fn` varchar(128) NOT NULL,
  `scholar_mn` varchar(128) NOT NULL,
  `scholar_ext` varchar(5) DEFAULT NULL,
  `scholar_brgy` varchar(255) NOT NULL,
  `scholar_muni` varchar(128) NOT NULL,
  `scholar_civStatus` varchar(50) NOT NULL,
  `scholar_citizenship` varchar(50) NOT NULL,
  `scholar_dob` date NOT NULL,
  `scholar_age` varchar(2) NOT NULL,
  `scholar_gender` varchar(10) NOT NULL,
  `scholar_email` varchar(64) NOT NULL,
  `scholar_num` varchar(15) NOT NULL,
  `scholar_status` varchar(11) NOT NULL,
  `scholar_dateOfReq` date NOT NULL,
  `scholar_reqBy` int(11) NOT NULL,
  `scholar_schedule` datetime DEFAULT NULL,
  `scholar_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scholar_family`
--

CREATE TABLE `tbl_scholar_family` (
  `sfam_id` int(11) NOT NULL,
  `sfam_f_name` varchar(50) NOT NULL,
  `sfam_f_age` varchar(3) NOT NULL,
  `sfam_f_address` varchar(50) NOT NULL,
  `sfam_f_occupation` varchar(50) NOT NULL,
  `sfam_f_eduAttainment` varchar(50) NOT NULL,
  `sfam_f_mobileNum` varchar(11) NOT NULL,
  `sfam_m_name` varchar(50) NOT NULL,
  `sfam_m_age` varchar(11) NOT NULL,
  `sfam_m_address` varchar(50) NOT NULL,
  `sfam_m_occupation` varchar(50) NOT NULL,
  `sfam_m_eduAttainment` varchar(64) NOT NULL,
  `sfam_m_mobileNum` varchar(16) NOT NULL,
  `sfam_totalSalary` varchar(32) NOT NULL,
  `sfam_numSiblings` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(16) NOT NULL,
  `user_fullname` varchar(128) NOT NULL,
  `user_username` varchar(64) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_creationDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_type`, `user_fullname`, `user_username`, `user_email`, `user_password`, `user_creationDate`) VALUES
(1, '1', 'Admin', 'admin', '', '$2y$10$jgUzMr.EaMCPxXmX7OvTzOGWL548wCxLgCg69mtn8HGgSraxNwtU2', '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`usr_id`, `usr_name`) VALUES
(1, 'admin'),
(2, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `tbl_scholar_application`
--
ALTER TABLE `tbl_scholar_application`
  ADD PRIMARY KEY (`scholar_id`),
  ADD KEY `fk_scholar_fam` (`scholar_family`),
  ADD KEY `fk_scholar_course` (`scholar_course`),
  ADD KEY `fk_scholar_formOwner` (`scholar_reqBy`);

--
-- Indexes for table `tbl_scholar_family`
--
ALTER TABLE `tbl_scholar_family`
  ADD PRIMARY KEY (`sfam_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_scholar_application`
--
ALTER TABLE `tbl_scholar_application`
  MODIFY `scholar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_scholar_family`
--
ALTER TABLE `tbl_scholar_family`
  MODIFY `sfam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_scholar_application`
--
ALTER TABLE `tbl_scholar_application`
  ADD CONSTRAINT `fk_scholar_course` FOREIGN KEY (`scholar_course`) REFERENCES `tbl_course` (`course_id`),
  ADD CONSTRAINT `fk_scholar_fam` FOREIGN KEY (`scholar_family`) REFERENCES `tbl_scholar_family` (`sfam_id`),
  ADD CONSTRAINT `fk_scholar_formOwner` FOREIGN KEY (`scholar_reqBy`) REFERENCES `tbl_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
