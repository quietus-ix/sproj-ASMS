-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 04:55 PM
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
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_emailaddress` varchar(50) NOT NULL,
  `c_message` varchar(1000) NOT NULL,
  `c_dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `c_name`, `c_emailaddress`, `c_message`, `c_dateAdded`) VALUES
(0, 'mary angel malba', 'angelmalba@gmail.com', 'i want my assistance now', '2023-11-09 11:30:06');

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

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notif_id`, `notif_type`, `notif_ref`, `notif_new`, `notif_time`, `notif_date`) VALUES
(1, 1, 2, 0, '19:13:53', '2023-12-08'),
(2, 2, 86, 0, '19:13:53', '2023-12-08'),
(3, 1, 88, 1, '16:36:00', '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `sched_id` int(11) NOT NULL,
  `sched_time` time NOT NULL
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

--
-- Dumping data for table `tbl_scholar_application`
--

INSERT INTO `tbl_scholar_application` (`scholar_id`, `scholar_course`, `scholar_family`, `scholar_ln`, `scholar_fn`, `scholar_mn`, `scholar_ext`, `scholar_brgy`, `scholar_muni`, `scholar_civStatus`, `scholar_citizenship`, `scholar_dob`, `scholar_age`, `scholar_gender`, `scholar_email`, `scholar_num`, `scholar_status`, `scholar_dateOfReq`, `scholar_reqBy`, `scholar_schedule`, `scholar_note`) VALUES
(2, 3, 21, 'Malba', 'Mary Angel', 'Maque', '', 'Brgy. Bigo', 'Kabankalan', 'single', 'Filipino', '2016-11-06', '4', 'female', 'awd@a', 'aa', 'rejected', '2023-11-01', 22, '2023-12-04 03:02:00', 'aaa'),
(86, 3, 23, 'aa', 'aa', 'aaa', '', 'aaa', 'aa', 'single', 'aaa', '2023-12-12', '2', 'male', 'awd@w', '22', 'verified', '2023-12-07', 24, '2023-12-12 03:00:00', 'gago ka'),
(88, 1, 25, 'www', 'ww', 'ww', '', 'ww', 'ww', 'single', 'ww', '2023-12-07', '2', 'male', 'ww@w', 'ww', 'pending', '2023-12-08', 23, NULL, NULL);

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

--
-- Dumping data for table `tbl_scholar_family`
--

INSERT INTO `tbl_scholar_family` (`sfam_id`, `sfam_f_name`, `sfam_f_age`, `sfam_f_address`, `sfam_f_occupation`, `sfam_f_eduAttainment`, `sfam_f_mobileNum`, `sfam_m_name`, `sfam_m_age`, `sfam_m_address`, `sfam_m_occupation`, `sfam_m_eduAttainment`, `sfam_m_mobileNum`, `sfam_totalSalary`, `sfam_numSiblings`) VALUES
(20, 'wad', '3', 'awdaw', 'eee', 'elementary', '22', 'awd', '3', 'awd', 'aa', 'college', 'awd', 'P11 000 - P30 000', '3'),
(21, 'wad', '1', 'awdaw', 'w', 'high school', '3213', 'awd', '2', 'awd', 'w', 'college', 'awd', 'P11 000 - P30 000', '3'),
(22, 'awddd', '2', 'aaa', 'a', 'college', '222', 'awd', '2', 'aaa', 'a', 'college', '222', 'P11 000 - P30 000', '3'),
(23, 'a', '2', 'a', '2aa', 'elementary', '22', 'a', '2', 'a', 'a', 'elementary', '22', 'above P50 000', '3'),
(24, 'ww', '2', 'ww', 'ww', 'elementary', 'ww', 'ww', '2', 'ww', 'ww', 'elementary', 'ww', 'P11 000 - P30 000', '3'),
(25, 'ww', '2', 'ww', 'ww', 'elementary', 'ww', 'ww', '2', 'ww', 'ww', 'elementary', 'ww', 'P11 000 - P30 000', '22');

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
(1, '1', 'Admin', 'admin', '', '$2y$10$jgUzMr.EaMCPxXmX7OvTzOGWL548wCxLgCg69mtn8HGgSraxNwtU2', '2023-12-04'),
(22, '2', 'Maria Juana', 'user', 'user@user.com', '$2y$10$jgUzMr.EaMCPxXmX7OvTzOGWL548wCxLgCg69mtn8HGgSraxNwtU2', '2023-12-03'),
(23, '2', 'Totoy Bibo', 'user2', 'user2@user.com', '$2y$10$V0OXDPiumK1EWX0Gi8GxCOHJi.pYd1DX2tVt0kEfk0NtF4hIVmiOm', '2023-12-04'),
(24, '2', 'Aeron Gab', 'aeron', 'a@aa', '$2y$10$dfb8tVZzRSCPkp1nHhXRIeLlSxanAD29afaafnT4QT/0Usq6w/cam', '2023-12-07');

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
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

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
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`sched_id`);

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
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_scholar_application`
--
ALTER TABLE `tbl_scholar_application`
  MODIFY `scholar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_scholar_family`
--
ALTER TABLE `tbl_scholar_family`
  MODIFY `sfam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
