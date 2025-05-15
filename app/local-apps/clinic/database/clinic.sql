-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `gate_passes`
--

CREATE TABLE `gate_passes` (
  `gpid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `lvl_dept` varchar(100) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `fetcher_name` varchar(100) NOT NULL,
  `relation_to_patient` varchar(100) NOT NULL,
  `remarks` text DEFAULT NULL,
  `prepared_by` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `printed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `name`, `description`, `date_added`) VALUES
(1, 'EFFICASCENT OIL', '', '2025-02-02 22:15:02'),
(2, 'OMEGA PAIN KILLER', '', '2025-02-02 22:15:02'),
(3, 'WOUND CARE', '', '2025-02-02 22:15:02'),
(4, 'BABY OIL', '', '2025-02-02 22:15:02'),
(5, 'BACTIDOL', '', '2025-02-02 22:15:02'),
(6, 'BANDAGING', '', '2025-02-02 22:15:02'),
(7, 'BETADINE GARGLE', '', '2025-02-02 22:15:02'),
(8, 'BIOGESIC', '', '2025-02-02 22:15:02'),
(9, 'BUSCOPAN', '', '2025-02-02 22:15:02'),
(10, 'CARBOCISTEINE', '', '2025-02-02 22:15:02'),
(11, 'CETIRIZINE', '', '2025-02-02 22:15:02'),
(12, 'EYE DROPS', '', '2025-02-02 22:15:02'),
(13, 'FLAMMZINE', '', '2025-02-02 22:15:02'),
(14, 'FLUGARD', '', '2025-02-02 22:15:02'),
(15, 'FLUIMUCIL', '', '2025-02-02 22:15:02'),
(16, 'GASAIDE', '', '2025-02-02 22:15:02'),
(17, 'HEADACHE', '', '2025-02-02 22:15:02'),
(18, 'HOT PACK', '', '2025-02-02 22:15:02'),
(19, 'HYDRITE', '', '2025-02-02 22:15:02'),
(20, 'ICE PACK', '', '2025-02-02 22:15:02'),
(21, 'KREMIL S', '', '2025-02-02 22:15:02'),
(22, 'LAGUNDI', '', '2025-02-02 22:15:02'),
(23, 'LOPERAMIDE', '', '2025-02-02 22:15:02'),
(24, 'MANZANILLA', '', '2025-02-02 22:15:02'),
(25, 'MEFENAMIC ACID', '', '2025-02-02 22:15:02'),
(26, 'NEBULIZATION', '', '2025-02-02 22:15:02'),
(27, 'NEOZEP', '', '2025-02-02 22:15:02'),
(28, 'NSS IRRIGATION', '', '2025-02-02 22:15:02'),
(29, 'PARACETAMOL', '', '2025-02-02 22:15:02'),
(30, 'PEDIAMOX', '', '2025-02-02 22:15:02'),
(31, 'TEMPRA', '', '2025-02-02 22:15:02'),
(32, 'TOPICAL OINTMENT', '', '2025-02-02 22:15:02'),
(33, 'VAPORUB', '', '2025-02-02 22:15:02'),
(34, 'WHITE FLOWER', '', '2025-02-02 22:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_id` int(11) NOT NULL,
  `school_id` varchar(30) DEFAULT NULL,
  `pat_lastname` varchar(50) NOT NULL,
  `pat_firstname` varchar(50) NOT NULL,
  `pat_email` varchar(100) DEFAULT NULL,
  `pat_contact` varchar(20) DEFAULT NULL,
  `pat_gender` enum('Male','Female','Other') NOT NULL,
  `pat_address` text DEFAULT NULL,
  `patient_type` enum('Student','Teacher','Staff','Outsider') NOT NULL,
  `dept_level` varchar(100) DEFAULT NULL,
  `position_section` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_id`, `school_id`, `pat_lastname`, `pat_firstname`, `pat_email`, `pat_contact`, `pat_gender`, `pat_address`, `patient_type`, `dept_level`, `position_section`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2017101', 'Admin', 'Jp', 'patient@hospital.icu', '1231231', 'Male', 'Jp Address', 'Student', 'Grade 12', 'Altair', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, '2019186', 'Espera', 'Francis', 'patient1@hospital.icu', '1231231', 'Male', 'Default Address', 'Staff', 'Admin', 'Student Formation Officer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, '2014065', 'Efenio', 'Charmin', 'patient2@hospital.icu', '1231231', 'Female', 'Default Address', 'Staff', 'Utility', 'Personnel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'HC1226201115161', 'Chan', 'Heinrich', 'patient3@hospital.icu', '1231231', 'Male', 'Default Address', 'Student', 'Grade 5', 'Camelia', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'LDC06132006151047', 'Claveraz', 'Liz', 'patient4@hospital.icu', '1231231', 'Female', 'Default Address', 'Student', 'Grade 12', 'Altair', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hashed_pass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `firstname`, `lastname`, `gender`, `email`, `role`, `status`, `username`, `password`, `hashed_pass`, `created_at`, `created_by`, `deleted_at`) VALUES
(1, 'Jp', 'Frondoza', 'male', 'jp@gmail.com', 'admin', 'active', 'admin', 'admin123', '$2y$10$RAbRC6kEd.LsO3KlKQ69iuRzEWWXX0tl30n6IsGUuhEPdMgvqHv0a', '2025-02-04 12:53:58', '', '2025-02-04 12:59:30'),
(2, 'Jp', 'Guest', 'male', 'guest@gmail.com', 'nurse', 'active', 'nurse', 'admin123', '$2y$10$7JFWEoepCdSEWkECRwXEEeEOZZd6U4wCFLXYZKhp62cepHwXXrUy2', '2025-02-04 12:56:10', '', '2025-02-04 13:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `visitations`
--

CREATE TABLE `visitations` (
  `vid` int(11) NOT NULL,
  `patient_barcode` varchar(255) NOT NULL,
  `pid` varchar(11) NOT NULL,
  `patient_firstname` varchar(100) NOT NULL,
  `patient_lastname` varchar(100) NOT NULL,
  `patient_classification` enum('student','teacher','staff','others') NOT NULL,
  `patient_gender` varchar(20) NOT NULL,
  `patient_grade_dept` varchar(100) NOT NULL,
  `patient_sec_pos` varchar(100) NOT NULL,
  `chief_complaint` int(255) NOT NULL,
  `treatment_remarks` text DEFAULT NULL,
  `medicine` varchar(255) DEFAULT NULL,
  `issue_gp` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-No, 1-Yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitations`
--

INSERT INTO `visitations` (`vid`, `patient_barcode`, `pid`, `patient_firstname`, `patient_lastname`, `patient_classification`, `patient_gender`, `patient_grade_dept`, `patient_sec_pos`, `chief_complaint`, `treatment_remarks`, `medicine`, `issue_gp`, `created_at`, `created_by`) VALUES
(1, '2014065', '3', 'Charmin', 'Efenio', 'staff', '', 'Utility', 'Personnel', 0, 'Cold Compress', '1', 0, '2025-02-22 17:44:56', ''),
(2, '2019186', '2', 'Francis', 'Espera', 'staff', '', 'Admin', 'Student Formation Officer', 0, 'Cold Compress', '4', 0, '2025-02-22 17:47:18', ''),
(3, 'LDC06132006151047', '5', 'Liz', 'Claveraz', 'student', '', 'Grade 12', 'Altair', 0, 'Cold Compress', '9', 0, '2025-02-22 17:49:08', ''),
(4, 'HC1226201115161', '4', 'Heinrich', 'Chan', 'student', '', 'Grade 5', 'Camelia', 0, 'Cold Compress', '7', 0, '2025-02-22 17:49:50', ''),
(5, 'HC1226201115161', '4', 'Heinrich', 'Chan', 'student', '', 'Grade 5', 'Camelia', 0, 'Ice Pack', '2', 0, '2025-02-22 17:55:20', ''),
(6, '2014065', '3', 'Charmin', 'Efenio', 'staff', '', 'Utility', 'Personnel', 0, 'Cold Compress', 'none', 0, '2025-02-22 17:59:30', ''),
(7, '2019186', '2', 'Francis', 'Espera', 'staff', '', 'Admin', 'Student Formation Officer', 0, 'Wear Wig', 'none', 0, '2025-02-22 18:01:19', ''),
(8, '2014065', '3', 'Charmin', 'Efenio', 'staff', '', 'Utility', 'Personnel', 0, 'Cold Compress', '1', 1, '2025-02-23 14:30:42', ''),
(9, '2014065', '3', 'Charmin', 'Efenio', 'staff', '', 'Utility', 'Personnel', 0, 'Ice Pack', 'none', 1, '2025-02-23 14:39:40', ''),
(10, 'LDC06132006151047', '5', 'Liz', 'Claveraz', 'student', '', 'Grade 12', 'Altair', 0, 'Wear Wig', '6', 0, '2025-02-23 14:39:56', ''),
(11, '2019186', '2', 'Francis', 'Espera', 'staff', '', 'Admin', 'Student Formation Officer', 0, 'Ice Pack', 'none', 0, '2025-02-23 14:42:06', ''),
(12, 'HC1226201115161', '4', 'Heinrich', 'Chan', 'student', '', 'Grade 5', 'Camelia', 0, 'Leg Press', 'none', 0, '2025-02-23 15:49:16', ''),
(13, 'HC1226201115161', '4', 'Heinrich', 'Chan', 'student', 'Male', 'Grade 5', 'Camelia', 0, 'Day-off', 'none', 0, '2025-02-23 16:13:00', ''),
(14, '', '', '', '', '', '', '', '', 0, '', '', 0, '2025-02-23 16:16:07', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gate_passes`
--
ALTER TABLE `gate_passes`
  ADD PRIMARY KEY (`gpid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_id`),
  ADD UNIQUE KEY `school_id` (`school_id`),
  ADD UNIQUE KEY `pat_email` (`pat_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `visitations`
--
ALTER TABLE `visitations`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gate_passes`
--
ALTER TABLE `gate_passes`
  MODIFY `gpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitations`
--
ALTER TABLE `visitations`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
