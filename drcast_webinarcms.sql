-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2026 at 05:05 AM
-- Server version: 10.11.15-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drcast_webinarcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `wc_divisions`
--

CREATE TABLE `wc_divisions` (
  `wc_di_id` int(5) NOT NULL,
  `wc_di_name` varchar(50) NOT NULL,
  `wc_di_code` varchar(30) DEFAULT NULL,
  `wc_di_status` enum('1001','1002') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_divisions`
--

INSERT INTO `wc_divisions` (`wc_di_id`, `wc_di_name`, `wc_di_code`, `wc_di_status`) VALUES
(1, 'ASRA Division', 'ASRA', '1001'),
(2, 'AURA Division', 'AURA', '1001'),
(3, 'COVID 19 Management', 'COVID 19', '1001'),
(4, 'Diaspa Division', 'DIASPA', '1001'),
(5, 'Frenza Division', 'FRENZA', '1001'),
(6, 'Gastro Division', 'GASTRO', '1001'),
(7, 'Generics(Alpha) Division', 'GENERICS ALPHA', '1001'),
(8, 'Genx Division', 'GENX', '1001'),
(9, 'Helion Division', 'HELION', '1001'),
(10, 'HHCL Main Division', 'HHCL MAIN', '1001'),
(11, 'Institutional Business', 'INSTITUTIONAL BUSINESS', '1001'),
(12, 'KRIS Division', 'KRIS', '1001'),
(13, 'Oncology Division', 'ONCOLOGY', '1001'),
(14, 'Specialty Care Division', 'SPECIALITY CARE', '1001'),
(15, 'Synergy Division', 'SYNERGY', '1001'),
(16, 'ULTRA Division', 'ULTRA', '1001'),
(17, 'Volga Division', 'VOLGA', '1001'),
(18, 'HHCL Corporate', 'HHCLC', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_division_organizers`
--

CREATE TABLE `wc_division_organizers` (
  `wc_do_id` int(11) NOT NULL,
  `wc_u_code` varchar(30) DEFAULT NULL,
  `wc_di_code` varchar(30) DEFAULT NULL,
  `wc_do_status` enum('1001','1002') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_division_organizers`
--

INSERT INTO `wc_division_organizers` (`wc_do_id`, `wc_u_code`, `wc_di_code`, `wc_do_status`) VALUES
(1, '1538422683', 'AURA ', '1001'),
(2, '1538422683', 'HHCLC', '1001'),
(5, '1538422683', 'AURA', '1001'),
(6, '1538422683', 'ASRA', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_doctors`
--

CREATE TABLE `wc_doctors` (
  `wc_d_id` int(11) NOT NULL,
  `wc_d_code` varchar(50) DEFAULT NULL,
  `wc_d_code_sap` varchar(50) DEFAULT NULL,
  `wc_d_name` varchar(50) DEFAULT NULL,
  `wc_d_email` varchar(50) NOT NULL,
  `wc_d_contact` varchar(12) NOT NULL,
  `wc_d_hospital` varchar(100) NOT NULL,
  `wc_d_display_photo` varchar(1000) NOT NULL,
  `wc_d_position` varchar(200) DEFAULT NULL,
  `wc_d_education` varchar(200) DEFAULT NULL,
  `wc_d_location` varchar(200) DEFAULT NULL,
  `wc_d_headquaters` varchar(50) NOT NULL,
  `wc_d_status` enum('1001','1002') NOT NULL DEFAULT '1001',
  `wc_d_created_by` varbinary(50) DEFAULT NULL,
  `wc_d_created_on` datetime DEFAULT NULL,
  `wc_d_updated_by` varbinary(50) DEFAULT NULL,
  `wc_d_updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wc_doctors`
--

INSERT INTO `wc_doctors` (`wc_d_id`, `wc_d_code`, `wc_d_code_sap`, `wc_d_name`, `wc_d_email`, `wc_d_contact`, `wc_d_hospital`, `wc_d_display_photo`, `wc_d_position`, `wc_d_education`, `wc_d_location`, `wc_d_headquaters`, `wc_d_status`, `wc_d_created_by`, `wc_d_created_on`, `wc_d_updated_by`, `wc_d_updated_on`) VALUES
(1, '8793946251', 'HYD001', 'Rajesh Palamangalam', 'rajeshpalamangalam@gmail.com', '9705841670', 'Sindhu Hospital', '8793946251_DOCTOR_20250829141644.jpg', 'Head of Dpt', 'MBBS., FRCS, Londal', 'Hydrabad', 'Hydrabad', '1001', 0x4d5341444d494e, '2025-08-29 14:16:44', 0x4d5341444d494e, '2025-10-28 15:37:47'),
(2, '6356972312', 'afafas', 'Testing', 'creativebooks.rajeshp@gmail.com', '09324238437', 'testing', '6356972312_DOCTOR_20251124101707.jpg', 'Testing', 'Testing', 'Testing', 'testing', '1001', 0x4d5341444d494e, '2025-11-24 10:17:07', 0x4d5341444d494e, '2025-12-06 10:10:45'),
(3, '4913956476', 'DEEP001', 'Deepthi', 'gdeepthi001@gmail.com', '9515633629', 'Deepthi Hospital', '4913956476_DOCTOR_20251229155840.jpg', 'ENT Specialist', 'MMBS', 'Hyderabad', 'Deepthi Hospital', '1001', 0x4d5341444d494e, '2025-12-29 15:58:40', 0x4d5341444d494e, '2025-12-29 15:59:40'),
(4, '9168552789', 'test', 'Deepthi gangireddy', 'test@gmail.com', '9876543210', 'test', '9168552789_DOCTOR_20251229175351.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-29 17:53:51', 0x4d5341444d494e, '2025-12-29 17:53:51'),
(5, '9874853231', 'test', 'rajesh', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'deepthi.gangireddy@heterohealthcare.com', '9874853231_DOCTOR_20251229180231.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-29 18:02:31', 0x4d5341444d494e, '2025-12-29 18:02:31'),
(6, '7219546546', 'test', 'rajesh', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'deepthi.gangireddy@heterohealthcare.com', '7219546546_DOCTOR_20251229180458.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-29 18:04:58', 0x4d5341444d494e, '2025-12-29 18:04:58'),
(7, '6975421423', 'test', 'Deepthi final', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'test', '6975421423_DOCTOR_20251229180549.jpg', 'test', 'testtest', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-29 18:05:49', 0x4d5341444d494e, '2025-12-29 18:05:49'),
(8, '6518752192', 'test', 'ram', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'test', '6518752192_DOCTOR_20251229181129.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-29 18:11:29', 0x4d5341444d494e, '2025-12-29 18:11:29'),
(9, '2871524584', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '2871524584_DOCTOR_20251230171057.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-30 17:10:57', 0x4d5341444d494e, '2025-12-30 17:10:57'),
(10, '7163782935', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '7163782935_DOCTOR_20251230171114.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-30 17:11:14', 0x4d5341444d494e, '2025-12-30 17:11:14'),
(11, '1796492327', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '1796492327_DOCTOR_20251230171219.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-30 17:12:19', 0x4d5341444d494e, '2025-12-30 17:12:19'),
(12, '3277663954', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '3277663954_DOCTOR_20251230171957.jpg', 'test', 'test', 'test', 'test', '1001', 0x4d5341444d494e, '2025-12-30 17:19:57', 0x4d5341444d494e, '2025-12-30 17:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `wc_doctors_history`
--

CREATE TABLE `wc_doctors_history` (
  `wc_d_id_history` int(11) NOT NULL,
  `wc_d_id` int(11) NOT NULL,
  `wc_d_code` varchar(50) DEFAULT NULL,
  `wc_d_code_sap` varchar(50) DEFAULT NULL,
  `wc_d_name` varchar(50) DEFAULT NULL,
  `wc_d_email` varchar(50) NOT NULL,
  `wc_d_contact` varchar(12) NOT NULL,
  `wc_d_hospital` varchar(100) NOT NULL,
  `wc_d_display_photo` varchar(1000) NOT NULL,
  `wc_d_position` varchar(200) DEFAULT NULL,
  `wc_d_education` varchar(200) DEFAULT NULL,
  `wc_d_location` varchar(200) DEFAULT NULL,
  `wc_d_headquaters` varchar(50) NOT NULL,
  `wc_d_status` enum('1001','1002') NOT NULL DEFAULT '1001',
  `wc_d_reason` varchar(100) DEFAULT NULL,
  `wc_d_created_by` varchar(50) DEFAULT NULL,
  `wc_d_created_on` datetime DEFAULT NULL,
  `wc_d_updated_by` varchar(50) DEFAULT NULL,
  `wc_d_updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_doctors_history`
--

INSERT INTO `wc_doctors_history` (`wc_d_id_history`, `wc_d_id`, `wc_d_code`, `wc_d_code_sap`, `wc_d_name`, `wc_d_email`, `wc_d_contact`, `wc_d_hospital`, `wc_d_display_photo`, `wc_d_position`, `wc_d_education`, `wc_d_location`, `wc_d_headquaters`, `wc_d_status`, `wc_d_reason`, `wc_d_created_by`, `wc_d_created_on`, `wc_d_updated_by`, `wc_d_updated_on`) VALUES
(1, 1, '8793946251', 'HYD001', 'Rajesh Palamangalam', 'rajeshpalamangalam@gmail.com', '9705841670', 'Sindhu Hospital', '8793946251_DOCTOR_20250829141644.jpg', 'Head of Dpt', 'MBBS., FRCS, Londal', 'Hydrabad', 'Hydrabad', '1001', 'New Entry', 'MSADMIN', '2025-08-29 14:16:44', 'MSADMIN', '2025-08-29 14:16:44'),
(2, 1, '8793946251', 'HYD001', 'Rajesh Palamangalam', 'rajeshpalamangalam@gmail.com', '9705841670', 'Sindhu Hospital', '8793946251_DOCTOR_20250829141644.jpg', 'Head of Dpt', 'MBBS., FRCS, Londal', 'Hydrabad', 'Hydrabad', '1002', 'Status change-Inactive', 'MSADMIN', '2025-08-29 14:16:44', 'MSADMIN', '2025-08-29 14:16:52'),
(3, 1, '8793946251', 'HYD001', 'Rajesh Palamangalam', 'rajeshpalamangalam@gmail.com', '9705841670', 'Sindhu Hospital', '8793946251_DOCTOR_20250829141644.jpg', 'Head of Dpt', 'MBBS., FRCS, Londal', 'Hydrabad', 'Hydrabad', '1001', 'Status change-Active', 'MSADMIN', '2025-08-29 14:16:44', 'MSADMIN', '2025-08-29 14:16:58'),
(4, 1, '8793946251', 'HYD001', 'Rajesh Palamangalam', 'rajeshpalamangalam@gmail.com', '9705841670', 'Sindhu Hospital', '8793946251_DOCTOR_20250829141644.jpg', 'Head of Dpt', 'MBBS., FRCS, Londal', 'Hydrabad', 'Hydrabad', '1002', 'Status change-Inactive', 'MSADMIN', '2025-08-29 14:16:44', 'MSADMIN', '2025-10-28 15:37:44'),
(5, 1, '8793946251', 'HYD001', 'Rajesh Palamangalam', 'rajeshpalamangalam@gmail.com', '9705841670', 'Sindhu Hospital', '8793946251_DOCTOR_20250829141644.jpg', 'Head of Dpt', 'MBBS., FRCS, Londal', 'Hydrabad', 'Hydrabad', '1001', 'Status change-Active', 'MSADMIN', '2025-08-29 14:16:44', 'MSADMIN', '2025-10-28 15:37:47'),
(6, 2, '6356972312', 'afafas', 'Testing', 'creativebooks.rajeshp@gmail.com', '09324238437', 'testing', '6356972312_DOCTOR_20251124101707.jpg', 'Testing', 'Testing', 'Testing', 'testing', '1001', 'New Entry', 'MSADMIN', '2025-11-24 10:17:07', 'MSADMIN', '2025-11-24 10:17:07'),
(7, 2, '6356972312', 'afafas', 'Testing', 'creativebooks.rajeshp@gmail.com', '09324238437', 'testing', '6356972312_DOCTOR_20251124101707.jpg', 'Testing', 'Testing', 'Testing', 'testing', '1002', 'Status change-Inactive', 'MSADMIN', '2025-11-24 10:17:07', 'MSADMIN', '2025-12-06 10:10:37'),
(8, 2, '6356972312', 'afafas', 'Testing', 'creativebooks.rajeshp@gmail.com', '09324238437', 'testing', '6356972312_DOCTOR_20251124101707.jpg', 'Testing', 'Testing', 'Testing', 'testing', '1001', 'Status change-Active', 'MSADMIN', '2025-11-24 10:17:07', 'MSADMIN', '2025-12-06 10:10:40'),
(9, 2, '6356972312', 'afafas', 'Testing', 'creativebooks.rajeshp@gmail.com', '09324238437', 'testing', '6356972312_DOCTOR_20251124101707.jpg', 'Testing', 'Testing', 'Testing', 'testing', '1002', 'Status change-Inactive', 'MSADMIN', '2025-11-24 10:17:07', 'MSADMIN', '2025-12-06 10:10:41'),
(10, 2, '6356972312', 'afafas', 'Testing', 'creativebooks.rajeshp@gmail.com', '09324238437', 'testing', '6356972312_DOCTOR_20251124101707.jpg', 'Testing', 'Testing', 'Testing', 'testing', '1001', 'Status change-Active', 'MSADMIN', '2025-11-24 10:17:07', 'MSADMIN', '2025-12-06 10:10:45'),
(11, 3, '4913956476', 'DEEP001', 'Deepthi', 'gdeepthi001@gmail.com', '9515633629', 'Deepthi Hospital', '4913956476_DOCTOR_20251229155840.jpg', 'ENT Specialist', 'MMBS', 'Hyderabad', 'Deepthi Hospital', '1001', 'New Entry', 'MSADMIN', '2025-12-29 15:58:40', 'MSADMIN', '2025-12-29 15:58:40'),
(12, 3, '4913956476', 'DEEP001', 'Deepthi', 'gdeepthi001@gmail.com', '9515633629', 'Deepthi Hospital', '4913956476_DOCTOR_20251229155840.jpg', 'ENT Specialist', 'MMBS', 'Hyderabad', 'Deepthi Hospital', '1002', 'Status change-Inactive', 'MSADMIN', '2025-12-29 15:58:40', 'MSADMIN', '2025-12-29 15:59:30'),
(13, 3, '4913956476', 'DEEP001', 'Deepthi', 'gdeepthi001@gmail.com', '9515633629', 'Deepthi Hospital', '4913956476_DOCTOR_20251229155840.jpg', 'ENT Specialist', 'MMBS', 'Hyderabad', 'Deepthi Hospital', '1001', 'Status change-Active', 'MSADMIN', '2025-12-29 15:58:40', 'MSADMIN', '2025-12-29 15:59:32'),
(14, 3, '4913956476', 'DEEP001', 'Deepthi', 'gdeepthi001@gmail.com', '9515633629', 'Deepthi Hospital', '4913956476_DOCTOR_20251229155840.jpg', 'ENT Specialist', 'MMBS', 'Hyderabad', 'Deepthi Hospital', '1002', 'Status change-Inactive', 'MSADMIN', '2025-12-29 15:58:40', 'MSADMIN', '2025-12-29 15:59:37'),
(15, 3, '4913956476', 'DEEP001', 'Deepthi', 'gdeepthi001@gmail.com', '9515633629', 'Deepthi Hospital', '4913956476_DOCTOR_20251229155840.jpg', 'ENT Specialist', 'MMBS', 'Hyderabad', 'Deepthi Hospital', '1001', 'Status change-Active', 'MSADMIN', '2025-12-29 15:58:40', 'MSADMIN', '2025-12-29 15:59:40'),
(16, 4, '9168552789', 'test', 'Deepthi gangireddy', 'test@gmail.com', '9876543210', 'test', '9168552789_DOCTOR_20251229175351.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-29 17:53:51', 'MSADMIN', '2025-12-29 17:53:51'),
(17, 5, '9874853231', 'test', 'rajesh', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'deepthi.gangireddy@heterohealthcare.com', '9874853231_DOCTOR_20251229180231.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-29 18:02:31', 'MSADMIN', '2025-12-29 18:02:31'),
(18, 6, '7219546546', 'test', 'rajesh', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'deepthi.gangireddy@heterohealthcare.com', '7219546546_DOCTOR_20251229180458.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-29 18:04:58', 'MSADMIN', '2025-12-29 18:04:58'),
(19, 7, '6975421423', 'test', 'Deepthi final', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'test', '6975421423_DOCTOR_20251229180549.jpg', 'test', 'testtest', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-29 18:05:49', 'MSADMIN', '2025-12-29 18:05:49'),
(20, 8, '6518752192', 'test', 'ram', 'deepthi.gangireddy@heterohealthcare.com', '9876543210', 'test', '6518752192_DOCTOR_20251229181129.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-29 18:11:29', 'MSADMIN', '2025-12-29 18:11:29'),
(21, 9, '2871524584', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '2871524584_DOCTOR_20251230171057.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-30 17:10:57', 'MSADMIN', '2025-12-30 17:10:57'),
(22, 10, '7163782935', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '7163782935_DOCTOR_20251230171114.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-30 17:11:14', 'MSADMIN', '2025-12-30 17:11:14'),
(23, 11, '1796492327', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '1796492327_DOCTOR_20251230171219.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-30 17:12:19', 'MSADMIN', '2025-12-30 17:12:19'),
(24, 12, '3277663954', 'test', 'deepthi', 'test@gmail.com', '9876543210', 'test', '3277663954_DOCTOR_20251230171957.jpg', 'test', 'test', 'test', 'test', '1001', 'New Entry', 'MSADMIN', '2025-12-30 17:19:57', 'MSADMIN', '2025-12-30 17:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `wc_doctor_log`
--

CREATE TABLE `wc_doctor_log` (
  `wc_id` int(11) NOT NULL,
  `wc_doctor_name` varchar(150) NOT NULL,
  `wc_gender` enum('Male','Female','Other') DEFAULT NULL,
  `wc_qualification` varchar(100) NOT NULL,
  `wc_specialization` varchar(150) NOT NULL,
  `wc_medical_reg_no` varchar(50) NOT NULL,
  `wc_experience_years` int(3) DEFAULT NULL,
  `wc_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `wc_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wc_doctor_maping`
--

CREATE TABLE `wc_doctor_maping` (
  `wc_dm_id` int(11) NOT NULL,
  `wc_d_code` varchar(50) DEFAULT NULL,
  `wc_di_code` varchar(50) DEFAULT NULL,
  `wc_dm_status` enum('1001','1002') NOT NULL DEFAULT '1001',
  `wc_dm_created_by` text NOT NULL,
  `wc_dm_created_on` datetime DEFAULT NULL,
  `wc_dm_updated_by` text DEFAULT NULL,
  `wc_dm_updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_doctor_maping`
--

INSERT INTO `wc_doctor_maping` (`wc_dm_id`, `wc_d_code`, `wc_di_code`, `wc_dm_status`, `wc_dm_created_by`, `wc_dm_created_on`, `wc_dm_updated_by`, `wc_dm_updated_on`) VALUES
(1, '8793946251', 'ASRA', '1001', 'MSADMIN', '2025-08-29 14:16:44', 'MSADMIN', '2025-08-29 14:16:44'),
(2, '6356972312', 'HHCL MAIN', '1001', 'MSADMIN', '2025-11-24 10:17:07', 'MSADMIN', '2025-11-24 10:17:07'),
(3, '4913956476', 'ASRA', '1001', 'MSADMIN', '2025-12-29 15:58:40', 'MSADMIN', '2025-12-29 15:58:40'),
(4, '9168552789', 'ASRA', '1001', 'MSADMIN', '2025-12-29 17:53:51', 'MSADMIN', '2025-12-29 17:53:51'),
(5, '9874853231', 'ASRA', '1001', 'MSADMIN', '2025-12-29 18:02:31', 'MSADMIN', '2025-12-29 18:02:31'),
(6, '7219546546', 'ASRA', '1001', 'MSADMIN', '2025-12-29 18:04:58', 'MSADMIN', '2025-12-29 18:04:58'),
(7, '6975421423', 'ASRA', '1001', 'MSADMIN', '2025-12-29 18:05:49', 'MSADMIN', '2025-12-29 18:05:49'),
(8, '6518752192', 'AURA', '1001', 'MSADMIN', '2025-12-29 18:11:29', 'MSADMIN', '2025-12-29 18:11:29'),
(9, '2871524584', 'ASRA', '1001', 'MSADMIN', '2025-12-30 17:10:57', 'MSADMIN', '2025-12-30 17:10:57'),
(10, '7163782935', 'ASRA', '1001', 'MSADMIN', '2025-12-30 17:11:14', 'MSADMIN', '2025-12-30 17:11:14'),
(11, '1796492327', 'ASRA', '1001', 'MSADMIN', '2025-12-30 17:12:19', 'MSADMIN', '2025-12-30 17:12:19'),
(12, '3277663954', 'ASRA', '1001', 'MSADMIN', '2025-12-30 17:19:57', 'MSADMIN', '2025-12-30 17:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `wc_dr_specialities`
--

CREATE TABLE `wc_dr_specialities` (
  `wc_drs_id` int(11) NOT NULL,
  `wc_drs_code` varchar(10) DEFAULT NULL,
  `wc_drs_name` varchar(100) DEFAULT NULL,
  `wc_drs_value` varchar(100) DEFAULT NULL,
  `wc_drs_status` enum('1001','1002') NOT NULL DEFAULT '1001'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_dr_specialities`
--

INSERT INTO `wc_dr_specialities` (`wc_drs_id`, `wc_drs_code`, `wc_drs_name`, `wc_drs_value`, `wc_drs_status`) VALUES
(1, '6732645768', 'General Physician / General Practitioner (GP)', 'General Physician', '1001'),
(2, '6732645769', 'Family Medicine Specialist', 'Family Medicine', '1001'),
(3, '6732645770', 'Internal Medicine Specialist', 'Internal Medicine', '1001'),
(4, '6732645771', 'Preventive Medicine Specialist', 'Preventive Medicine', '1001'),
(5, '6732645772', 'Neurologist', 'Neurology', '1001'),
(6, '6732645773', 'Neurosurgeon', 'Neurosurgery', '1001'),
(7, '6732645774', 'Psychiatrist', 'Psychiatry', '1001'),
(8, '6732645775', 'Psychologist', 'Psychology', '1001'),
(9, '6732645776', 'Neurophysiologist', 'Neurophysiology', '1001'),
(10, '6732645777', 'Neuropsychiatrist', 'Neuropsychiatry', '1001'),
(11, '6732645778', 'Cardiologist', 'Cardiology', '1001'),
(12, '6732645779', 'Interventional Cardiologist', 'Cardiology', '1001'),
(13, '6732645780', 'Cardiothoracic Surgeon', 'Cardiothoracic Surgery', '1001'),
(14, '6732645781', 'Vascular Surgeon', 'Vascular Surgery', '1001'),
(15, '6732645782', 'Pulmonologist (Chest Specialist)', 'Pulmonology', '1001'),
(16, '6732645783', 'Thoracic Surgeon', 'Thoracic Surgery', '1001'),
(17, '6732645784', 'Sleep Medicine Specialist', 'Sleep Medicine', '1001'),
(18, '6732645785', 'Gastroenterologist', 'Gastroenterology', '1001'),
(19, '6732645786', 'Hepatologist (Liver Specialist)', 'Hepatology', '1001'),
(20, '6732645787', 'Colorectal Surgeon', 'Colorectal Surgery', '1001'),
(21, '6732645788', 'Proctologist', 'Proctology', '1001'),
(22, '6732645789', 'Endocrinologist (Hormone Specialist)', 'Endocrinology', '1001'),
(23, '6732645790', 'Diabetologist', 'Diabetology', '1001'),
(24, '6732645791', 'Nutritionist / Dietitian', 'Nutrition', '1001'),
(25, '6732645792', 'Oncologist', 'Oncology', '1001'),
(26, '6732645793', 'Surgical Oncologist', 'Oncology', '1001'),
(27, '6732645794', 'Radiation Oncologist', 'Oncology', '1001'),
(28, '6732645795', 'Hemato-Oncologist', 'Hematology-Oncology', '1001'),
(29, '6732645796', 'Pediatrician', 'Pediatrics', '1001'),
(30, '6732645797', 'Neonatologist', 'Neonatology', '1001'),
(31, '6732645798', 'Pediatric Surgeon', 'Pediatric Surgery', '1001'),
(32, '6732645799', 'Pediatric Cardiologist', 'Pediatric Cardiology', '1001'),
(33, '6732645800', 'Pediatric Neurologist', 'Pediatric Neurology', '1001'),
(34, '6732645801', 'Gynecologist', 'Gynecology', '1001'),
(35, '6732645802', 'Obstetrician (OB/GYN)', 'Obstetrics', '1001'),
(36, '6732645803', 'Reproductive Endocrinologist / Fertility Specialist', 'Reproductive Medicine', '1001'),
(37, '6732645804', 'Maternal-Fetal Medicine Specialist', 'Maternal-Fetal Medicine', '1001'),
(38, '6732645805', 'Urologist', 'Urology', '1001'),
(39, '6732645806', 'Andrologist', 'Andrology', '1001'),
(40, '6732645807', 'Orthopedic Surgeon', 'Orthopedics', '1001'),
(41, '6732645808', 'Rheumatologist', 'Rheumatology', '1001'),
(42, '6732645809', 'Sports Medicine Specialist', 'Sports Medicine', '1001'),
(43, '6732645810', 'Physiotherapist', 'Physiotherapy', '1001'),
(44, '6732645811', 'Ophthalmologist', 'Ophthalmology', '1001'),
(45, '6732645812', 'Optometrist', 'Optometry', '1001'),
(46, '6732645813', 'Retina Specialist', 'Retina', '1001'),
(47, '6732645814', 'Glaucoma Specialist', 'Glaucoma', '1001'),
(48, '6732645815', 'ENT Specialist / Otorhinolaryngologist', 'ENT', '1001'),
(49, '6732645816', 'Audiologist', 'Audiology', '1001'),
(50, '6732645817', 'Dentist', 'Dentistry', '1001'),
(51, '6732645818', 'Orthodontist', 'Orthodontics', '1001'),
(52, '6732645819', 'Periodontist', 'Periodontics', '1001'),
(53, '6732645820', 'Endodontist', 'Endodontics', '1001'),
(54, '6732645821', 'Oral & Maxillofacial Surgeon', 'Oral Surgery', '1001'),
(55, '6732645822', 'Prosthodontist', 'Prosthodontics', '1001'),
(56, '6732645823', 'Dermatologist', 'Dermatology', '1001'),
(57, '6732645824', 'Cosmetologist', 'Cosmetology', '1001'),
(58, '6732645825', 'Trichologist (Hair Specialist)', 'Trichology', '1001'),
(59, '6732645826', 'Immunologist', 'Immunology', '1001'),
(60, '6732645827', 'Infectious Disease Specialist', 'Infectious Diseases', '1001'),
(61, '6732645828', 'Allergist', 'Allergy', '1001'),
(62, '6732645829', 'Nephrologist', 'Nephrology', '1001'),
(63, '6732645830', 'Dialysis Specialist', 'Dialysis', '1001'),
(64, '6732645831', 'Hematologist', 'Hematology', '1001'),
(65, '6732645832', 'Transfusion Medicine Specialist', 'Transfusion Medicine', '1001'),
(66, '6732645833', 'General Surgeon', 'General Surgery', '1001'),
(67, '6732645834', 'Laparoscopic Surgeon', 'Laparoscopic Surgery', '1001'),
(68, '6732645835', 'Plastic & Reconstructive Surgeon', 'Plastic Surgery', '1001'),
(69, '6732645836', 'Bariatric Surgeon', 'Bariatric Surgery', '1001'),
(70, '6732645837', 'Trauma Surgeon', 'Trauma Surgery', '1001'),
(71, '6732645838', 'Physiatrist (Rehabilitation Specialist)', 'Physical Medicine', '1001'),
(72, '6732645839', 'Pain Management Specialist', 'Pain Medicine', '1001'),
(73, '6732645840', 'Occupational Therapist', 'Occupational Therapy', '1001'),
(74, '6732645841', 'Radiologist', 'Radiology', '1001'),
(75, '6732645842', 'Pathologist', 'Pathology', '1001'),
(76, '6732645843', 'Anesthesiologist', 'Anesthesiology', '1001'),
(77, '6732645844', 'Critical Care Specialist / Intensivist', 'Critical Care', '1001'),
(78, '6732645845', 'Emergency Medicine Specialist', 'Emergency Medicine', '1001'),
(79, '6732645846', 'Geriatrician (Elderly Care Specialist)', 'Geriatrics', '1001'),
(80, '6732645847', 'Geneticist', 'Genetics', '1001'),
(81, '6732645848', 'Forensic Medicine Specialist', 'Forensic Medicine', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_email_log`
--

CREATE TABLE `wc_email_log` (
  `wc_log_id` int(11) NOT NULL,
  `wc_e_log_code` varchar(10) DEFAULT NULL,
  `wc_e_to_name` varchar(100) DEFAULT NULL,
  `wc_e_to_email` varchar(100) DEFAULT NULL,
  `wc_e_log_sub` varchar(100) DEFAULT NULL,
  `wc_e_log_body` longtext DEFAULT NULL,
  `wc_e_log_logon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_email_log`
--

INSERT INTO `wc_email_log` (`wc_log_id`, `wc_e_log_code`, `wc_e_to_name`, `wc_e_to_email`, `wc_e_log_sub`, `wc_e_log_body`, `wc_e_log_logon`) VALUES
(1, '7163842294', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear <br>Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-08 14:00:00 - 2025-10-08 15:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-09 15:03:19'),
(2, '9516237913', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear <br>Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-08 14:00:00 - 2025-10-08 15:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-09 15:24:18'),
(3, '7428682353', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear <br>Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-08 14:00:00 - 2025-10-08 15:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-09 15:25:16'),
(4, '5364698732', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-08 14:00:00 - 2025-10-08 15:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Naga Devi - nagadevi@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-09 16:40:09'),
(5, '9256615293', 'Giridhar Akula', 'giridhar.akula@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-10 09:00:00 - 2025-10-10 10:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-10 10:14:26'),
(6, '4739524638', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-10 09:00:00 - 2025-10-10 10:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-10 10:14:26'),
(7, '2652693181', 'Giridhar Akula', 'giridhar.akula@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-01 10:00:00 - 2025-10-01 11:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-10 10:26:29'),
(8, '5819249187', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-10-01 10:00:00 - 2025-10-01 11:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-10-10 10:26:29'),
(9, '3825964191', 'Giridhar Akula', 'giridhar.akula@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-11-22 14:00:00 - 2025-11-22 14:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-11-22 14:47:18'),
(10, '9216749654', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 5979118568', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> Testing Testing</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-11-22 14:00:00 - 2025-11-22 14:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-11-22 14:47:18'),
(11, '8681135297', 'Giridhar Akula', 'giridhar.akula@heterohealthcare.com', 'Request for Webinar Hosting - 1879391854', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> testing webinar testing webinar</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-12-08 10:00:00 - 2025-12-08 11:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-12-08 11:01:41'),
(12, '1464625958', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 1879391854', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> testing webinar testing webinar</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2025-12-08 10:00:00 - 2025-12-08 11:00:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> ASRA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2025-12-08 11:01:41'),
(13, '6722593791', 'Giridhar Akula', 'giridhar.akula@heterohealthcare.com', 'Request for Webinar Hosting - 4824395796', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> test webinar test webinar</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2026-01-02 17:00:00 - 2026-01-02 17:23:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> AURA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2026-01-02 17:47:51'),
(14, '6398489612', 'Thakur Sanjana', 'sanjana.thakur@heterohealthcare.com', 'Request for Webinar Hosting - 4824395796', '<!DOCTYPE html>\n    			<html>\n    			<head lang=\'en\'>\n    			<meta charset=\'utf-8\'>\n    			<meta name=\'viewport\' content=\'width=device-width, initial-width=1.0\'><title></title>\n    			</head>\n    			<body>\n    				<div>\n    				    <p>Dear Thakur Sanjana,<br>We have an upcoming webinar scheduled, and your support is required for hosting and managing the technical aspects. Please find the details below:</p>\n    					<table>\n    						<tr><td><strong>Webinar Title:</strong> test webinar test webinar</td></tr>\n    						<tr><td><strong>Date & Time:</strong> 2026-01-02 17:00:00 - 2026-01-02 17:23:00</td></tr>\n    						<tr><td><strong>Platform:</strong> WebinarPortal</td></tr>\n    						<tr><td><strong>Division:</strong> AURA</td></tr>\n    						<tr><td><strong>Organizer:</strong> Giridhar Akula - giridhar.akula@heterohealthcare.com</td></tr>\n    					</table>\n    					<p><strong>Responsibilities for IT/Technical Support Team:</strong></p>\n    					<ul>\n    					    <li>Manage registrations and ensure smooth access for attendees.</li>\n    					    <li>Provide technical assistance during the live session (audio, video, screen sharing, recording, etc.).</li>\n    					    <li>Ensure backup and recording of the webinar.</li>\n    					    <li>Troubleshoot any connectivity or technical issues.</li>\n    					</ul>\n    					<p>Kindly confirm your availability and readiness for the session. Please let us know if any additional details are required.</p>\n    					<p>Best Regards,<br>DoctorCast - Webinar Support Team</p>\n    			    </div>\n    			</body>\n    			</html>', '2026-01-02 17:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `wc_enrolled_participant_webinar`
--

CREATE TABLE `wc_enrolled_participant_webinar` (
  `wc_epw_id` int(11) NOT NULL,
  `wc_epw_code` varchar(10) DEFAULT NULL,
  `wc_u_code` varchar(10) DEFAULT NULL,
  `wc_w_event_code` varchar(10) DEFAULT NULL,
  `wc_epw_created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_enrolled_participant_webinar`
--

INSERT INTO `wc_enrolled_participant_webinar` (`wc_epw_id`, `wc_epw_code`, `wc_u_code`, `wc_w_event_code`, `wc_epw_created_on`) VALUES
(1, '8416873673', '5363492142', '5979118568', '2025-10-16 15:23:59'),
(2, '6812378621', '5363492142', '5979118568', '2025-10-16 15:35:38'),
(3, '3657398617', '5363492142', '5979118568', '2025-10-16 15:58:06'),
(4, '5153168294', '5363492142', '5979118568', '2025-10-16 16:01:21'),
(5, '9137528134', '5363492142', '5979118568', '2025-10-17 12:27:47'),
(6, '9579186247', '5363492142', '5979118568', '2025-10-21 11:11:26'),
(7, '1529353168', '5363492142', '5979118568', '2025-10-21 11:12:00'),
(9, '6124559361', '5363492142', '5979118568', '2025-10-21 15:22:08'),
(10, '6735489141', '5363492142', '5979118568', '2025-10-21 15:35:58'),
(11, '2365739124', '5363492142', '5979118568', '2025-10-22 10:21:10'),
(12, '1652477849', '5363492142', '5979118568', '2025-10-22 10:22:41'),
(13, '7542831765', '5363492142', '5979118568', '2025-10-22 11:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `wc_enroll_webinar`
--

CREATE TABLE `wc_enroll_webinar` (
  `wc_ew_id` int(11) NOT NULL,
  `wc_ew_code` varchar(10) DEFAULT NULL,
  `wc_u_code` varchar(10) DEFAULT NULL,
  `wc_w_event_code` varchar(10) DEFAULT NULL,
  `wc_ew_created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_enroll_webinar`
--

INSERT INTO `wc_enroll_webinar` (`wc_ew_id`, `wc_ew_code`, `wc_u_code`, `wc_w_event_code`, `wc_ew_created_on`) VALUES
(1, '8642791537', '5363492142', '5979118568', '2025-10-14 12:32:15'),
(3, '5953947412', '5189221363', '5979118568', '2025-10-22 18:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `wc_events`
--

CREATE TABLE `wc_events` (
  `id` int(11) NOT NULL,
  `wc_w_event_type` varchar(50) NOT NULL,
  `wc_w_event_code` varchar(10) DEFAULT NULL,
  `wc_di_code` varchar(50) DEFAULT NULL,
  `wc_w_requester` varchar(50) DEFAULT NULL,
  `wc_w_platform` varchar(50) DEFAULT NULL,
  `wc_w_topic` text DEFAULT NULL,
  `wc_w_subtitle` text DEFAULT NULL,
  `wc_w_description` text DEFAULT NULL,
  `wc_w_datetime_from` datetime DEFAULT NULL,
  `wc_w_datetime_to` datetime DEFAULT NULL,
  `wc_d_code_lead` varchar(50) DEFAULT NULL,
  `wc_d_name_lead` text DEFAULT NULL,
  `wc_d_email_lead` varchar(150) DEFAULT NULL,
  `wc_d_contact_lead` varchar(20) DEFAULT NULL,
  `wc_d_hospital_lead` text DEFAULT NULL,
  `wc_d_position_lead` text DEFAULT NULL,
  `wc_d_education_lead` text DEFAULT NULL,
  `wc_d_location_lead` text DEFAULT NULL,
  `wc_d_headquaters_lead` text DEFAULT NULL,
  `wc_d_code_sap_lead` varchar(50) DEFAULT NULL,
  `wc_d_display_photo_lead` text DEFAULT NULL,
  `wc_d_code_guest` varchar(50) DEFAULT NULL,
  `wc_d_name_guest` text DEFAULT NULL,
  `wc_d_email_guest` varchar(150) DEFAULT NULL,
  `wc_d_contact_guest` varchar(20) DEFAULT NULL,
  `wc_d_hospital_guest` text DEFAULT NULL,
  `wc_d_position_guest` text DEFAULT NULL,
  `wc_d_education_guest` text DEFAULT NULL,
  `wc_d_location_guest` text DEFAULT NULL,
  `wc_d_headquaters_guest` text DEFAULT NULL,
  `wc_d_code_sap_guest` varchar(50) DEFAULT NULL,
  `wc_d_display_photo_guest` text DEFAULT NULL,
  `wc_d_code_moderator_primary` varchar(50) DEFAULT NULL,
  `wc_d_name_primary` text DEFAULT NULL,
  `wc_d_email_primary` varchar(150) DEFAULT NULL,
  `wc_d_contact_primary` varchar(20) DEFAULT NULL,
  `wc_d_hospital_primary` text DEFAULT NULL,
  `wc_d_position_primary` text DEFAULT NULL,
  `wc_d_education_primary` text DEFAULT NULL,
  `wc_d_location_primary` text DEFAULT NULL,
  `wc_d_headquaters_primary` text DEFAULT NULL,
  `wc_d_code_sap_primary` varchar(50) DEFAULT NULL,
  `wc_d_display_photo_primary` text DEFAULT NULL,
  `wc_d_code_moderator_guest` varchar(50) DEFAULT NULL,
  `wc_d_name_secondary` text DEFAULT NULL,
  `wc_d_email_secondary` varchar(150) DEFAULT NULL,
  `wc_d_contact_secondary` varchar(20) DEFAULT NULL,
  `wc_d_hospital_secondary` text DEFAULT NULL,
  `wc_d_position_secondary` text DEFAULT NULL,
  `wc_d_education_secondary` text DEFAULT NULL,
  `wc_d_location_secondary` text DEFAULT NULL,
  `wc_d_headquaters_secondary` text DEFAULT NULL,
  `wc_d_code_sap_secondary` varchar(50) DEFAULT NULL,
  `wc_d_display_photo_secondary` text DEFAULT NULL,
  `wc_s_brand_promote_select` text DEFAULT NULL,
  `wc_w_notes` text DEFAULT NULL,
  `wc_w_invitation_create_check` enum('Already','CreateNew','RequestSent','SentReview','Approved','Reject','Uploaded') DEFAULT NULL,
  `wc_w_invitation` text DEFAULT NULL,
  `wc_w_zoom_details` enum('Pending','Updated','NotRequired') DEFAULT NULL,
  `wc_w_zoom_link` text DEFAULT NULL,
  `wc_w_zoom_id` varchar(20) DEFAULT NULL,
  `wc_w_zoom_passcode` varchar(20) DEFAULT NULL,
  `wc_w_zoom_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_zoom_details_updated_on` datetime DEFAULT NULL,
  `wc_w_youtube_details` enum('Pending','Updated','NotRequired') DEFAULT NULL,
  `wc_w_streaming_link` text DEFAULT NULL,
  `wc_w_youtube_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_youtube_details_updated_on` datetime DEFAULT NULL,
  `wc_w_technician_details` enum('Pending','Updated','NotRequired') DEFAULT NULL,
  `wc_t_technician_code` varchar(10) DEFAULT NULL,
  `wc_t_technician_name` varchar(50) DEFAULT NULL,
  `wc_w_technician_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_technician_details_updated_on` datetime DEFAULT NULL,
  `wc_w_organizer_details` enum('Pending','Updated','NotRequired') DEFAULT NULL,
  `wc_w_organizer_code` varchar(10) DEFAULT NULL,
  `wc_w_organizer_name` varchar(50) DEFAULT NULL,
  `wc_w_organizer_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_organizer_details_updated_on` datetime DEFAULT NULL,
  `wc_w_release_details` enum('Pending','Pending Re-Release','Released') DEFAULT NULL,
  `wc_w_release_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_release_details_updated_on` datetime DEFAULT NULL,
  `wc_w_platform_details` enum('Pending','Created') DEFAULT NULL,
  `wc_w_platform_url` text DEFAULT NULL,
  `wc_w_platform_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_platform_details_updated_on` datetime DEFAULT NULL,
  `wc_w_hosting_details` enum('Pending','Completed') DEFAULT NULL,
  `wc_w_hosting_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_hosting_details_updated_on` datetime DEFAULT NULL,
  `wc_w_video_backup_details` enum('Pending','Updated') DEFAULT NULL,
  `wc_w_video_backup_link` text DEFAULT NULL,
  `wc_w_video_backup_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_video_backup_details_updated_on` datetime DEFAULT NULL,
  `wc_w_thankyou_sms_details` enum('Pending','Triggered','NotRequired') DEFAULT NULL,
  `wc_w_thankyou_sms_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_thankyou_sms_details_updated_on` datetime DEFAULT NULL,
  `wc_w_thankyou_whatsapp_details` enum('Pending','Completed','NotRequired') DEFAULT NULL,
  `wc_w_thankyou_whatsapp_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_thankyou_whatsapp_details_updated_on` datetime DEFAULT NULL,
  `wc_w_thankyou_email_details` enum('Pending','Completed','NotRequired') DEFAULT NULL,
  `wc_w_thankyou_email_details_updated_by` varchar(20) DEFAULT NULL,
  `wc_w_thankyou_email_details_updated_on` datetime DEFAULT NULL,
  `wc_tm_name` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wc_events`
--

INSERT INTO `wc_events` (`id`, `wc_w_event_type`, `wc_w_event_code`, `wc_di_code`, `wc_w_requester`, `wc_w_platform`, `wc_w_topic`, `wc_w_subtitle`, `wc_w_description`, `wc_w_datetime_from`, `wc_w_datetime_to`, `wc_d_code_lead`, `wc_d_name_lead`, `wc_d_email_lead`, `wc_d_contact_lead`, `wc_d_hospital_lead`, `wc_d_position_lead`, `wc_d_education_lead`, `wc_d_location_lead`, `wc_d_headquaters_lead`, `wc_d_code_sap_lead`, `wc_d_display_photo_lead`, `wc_d_code_guest`, `wc_d_name_guest`, `wc_d_email_guest`, `wc_d_contact_guest`, `wc_d_hospital_guest`, `wc_d_position_guest`, `wc_d_education_guest`, `wc_d_location_guest`, `wc_d_headquaters_guest`, `wc_d_code_sap_guest`, `wc_d_display_photo_guest`, `wc_d_code_moderator_primary`, `wc_d_name_primary`, `wc_d_email_primary`, `wc_d_contact_primary`, `wc_d_hospital_primary`, `wc_d_position_primary`, `wc_d_education_primary`, `wc_d_location_primary`, `wc_d_headquaters_primary`, `wc_d_code_sap_primary`, `wc_d_display_photo_primary`, `wc_d_code_moderator_guest`, `wc_d_name_secondary`, `wc_d_email_secondary`, `wc_d_contact_secondary`, `wc_d_hospital_secondary`, `wc_d_position_secondary`, `wc_d_education_secondary`, `wc_d_location_secondary`, `wc_d_headquaters_secondary`, `wc_d_code_sap_secondary`, `wc_d_display_photo_secondary`, `wc_s_brand_promote_select`, `wc_w_notes`, `wc_w_invitation_create_check`, `wc_w_invitation`, `wc_w_zoom_details`, `wc_w_zoom_link`, `wc_w_zoom_id`, `wc_w_zoom_passcode`, `wc_w_zoom_details_updated_by`, `wc_w_zoom_details_updated_on`, `wc_w_youtube_details`, `wc_w_streaming_link`, `wc_w_youtube_details_updated_by`, `wc_w_youtube_details_updated_on`, `wc_w_technician_details`, `wc_t_technician_code`, `wc_t_technician_name`, `wc_w_technician_details_updated_by`, `wc_w_technician_details_updated_on`, `wc_w_organizer_details`, `wc_w_organizer_code`, `wc_w_organizer_name`, `wc_w_organizer_details_updated_by`, `wc_w_organizer_details_updated_on`, `wc_w_release_details`, `wc_w_release_details_updated_by`, `wc_w_release_details_updated_on`, `wc_w_platform_details`, `wc_w_platform_url`, `wc_w_platform_details_updated_by`, `wc_w_platform_details_updated_on`, `wc_w_hosting_details`, `wc_w_hosting_details_updated_by`, `wc_w_hosting_details_updated_on`, `wc_w_video_backup_details`, `wc_w_video_backup_link`, `wc_w_video_backup_details_updated_by`, `wc_w_video_backup_details_updated_on`, `wc_w_thankyou_sms_details`, `wc_w_thankyou_sms_details_updated_by`, `wc_w_thankyou_sms_details_updated_on`, `wc_w_thankyou_whatsapp_details`, `wc_w_thankyou_whatsapp_details_updated_by`, `wc_w_thankyou_whatsapp_details_updated_on`, `wc_w_thankyou_email_details`, `wc_w_thankyou_email_details_updated_by`, `wc_w_thankyou_email_details_updated_on`, `wc_tm_name`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'NewEvent', '4824395796', 'AURA', 'Admin', 'WebinarPortal', 'test webinar', 'test webinar', 'test webinar', '2026-01-02 17:00:00', '2026-01-02 17:23:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Already', '4824395796_invitation_20260102174258.jpg', 'Updated', 'https://www.drcast.in/events', 'https://www.drcast.i', '6543212', 'MSADMIN', '2026-01-02 17:45:51', 'Updated', 'https://www.drcast.in/events', 'MSADMIN', '2026-01-02 17:45:55', 'Updated', '1837462185', 'Thakur Sanjana', 'MSADMIN', '2026-01-02 17:45:59', 'Updated', '1538422683', 'Giridhar Akula', 'MSADMIN', '2026-01-02 17:42:58', 'Released', 'MSADMIN', '2026-01-02 17:47:51', 'Created', 'test-webinar', 'MSADMIN', '2026-01-02 17:47:44', 'Pending', 'MSADMIN', '2026-01-02 17:47:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empire', 'MSADMIN', '2026-01-02 17:42:58', 'MSADMIN', '2026-01-02 17:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `wc_events_settings`
--

CREATE TABLE `wc_events_settings` (
  `wc_ws_id` int(11) NOT NULL,
  `wc_w_event_code` varchar(10) DEFAULT NULL,
  `wc_ws_login_type` enum('Email','Mobile','Username') NOT NULL DEFAULT 'Mobile',
  `wc_ws_login_authentication` enum('True','False') NOT NULL,
  `wc_ws_company` enum('Hetero','Azista','DRCAST') NOT NULL DEFAULT 'DRCAST',
  `wc_ws_notifi_sender` enum('True','False') DEFAULT NULL,
  `wc_ws_sms` enum('True','False') DEFAULT NULL,
  `wc_ws_email` enum('True','False') DEFAULT NULL,
  `wc_ws_whatsapp` enum('True','False') DEFAULT NULL,
  `wc_ws_sms_sender` enum('HeteroSMSGATEWAYHUB','AzistaSMSGATEWAYHUB','HeteroMSG91','AzistaMSG91','DRCAST','Not Required') DEFAULT NULL,
  `wc_ws_email_sender` enum('HeteroSMSGATEWAYHUB','AzistaSMSGATEWAYHUB','DRCASTCommunication','Not Required') DEFAULT NULL,
  `wc_ws_whatsapp_sender` enum('HeteroGupshup','AzistaGupshup','HeteroWati','AzistaWati','HeteroMSG91','AzistaMSG91','DRCASTGupshup','DRCASTWati','Not Required') DEFAULT NULL,
  `wc_ws_re_name` enum('True','False') NOT NULL DEFAULT 'True',
  `wc_ws_re_email` enum('True','False') NOT NULL DEFAULT 'False',
  `wc_ws_re_mobile` enum('True','False') NOT NULL DEFAULT 'True',
  `wc_ws_re_mci` enum('True','False') NOT NULL DEFAULT 'True',
  `wc_ws_re_speciality` enum('True','False') NOT NULL DEFAULT 'True',
  `wc_ws_re_location` enum('True','False') NOT NULL DEFAULT 'False',
  `wc_tm_name` varchar(20) DEFAULT NULL,
  `wc_ws_updated_by` varchar(20) DEFAULT NULL,
  `wc_ws_updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_events_settings`
--

INSERT INTO `wc_events_settings` (`wc_ws_id`, `wc_w_event_code`, `wc_ws_login_type`, `wc_ws_login_authentication`, `wc_ws_company`, `wc_ws_notifi_sender`, `wc_ws_sms`, `wc_ws_email`, `wc_ws_whatsapp`, `wc_ws_sms_sender`, `wc_ws_email_sender`, `wc_ws_whatsapp_sender`, `wc_ws_re_name`, `wc_ws_re_email`, `wc_ws_re_mobile`, `wc_ws_re_mci`, `wc_ws_re_speciality`, `wc_ws_re_location`, `wc_tm_name`, `wc_ws_updated_by`, `wc_ws_updated_on`) VALUES
(1, '1879391854', 'Mobile', 'True', 'Hetero', 'True', 'True', 'True', 'True', 'HeteroSMSGATEWAYHUB', 'HeteroSMSGATEWAYHUB', 'HeteroWati', 'True', '', 'True', 'True', 'True', 'True', 'empire', 'MSADMIN', '2025-12-08 11:01:31'),
(2, '2618532148', 'Mobile', 'True', 'DRCAST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'True', 'False', 'True', 'True', 'True', 'False', NULL, 'MSADMIN', '2025-12-31 14:41:21'),
(3, '5387286641', 'Mobile', 'True', 'DRCAST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'True', 'False', 'True', 'True', 'True', 'False', NULL, 'MSADMIN', '2025-12-31 14:41:39'),
(4, '5132527789', 'Mobile', 'True', 'DRCAST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'True', 'False', 'True', 'True', 'True', 'False', NULL, 'MSADMIN', '2025-12-31 14:43:58'),
(5, '6735712426', 'Mobile', 'True', 'DRCAST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'True', 'False', 'True', 'True', 'True', 'False', NULL, 'MSADMIN', '2026-01-02 14:21:33'),
(6, '4824395796', 'Mobile', 'False', 'Hetero', 'True', 'True', 'True', 'True', 'HeteroSMSGATEWAYHUB', 'HeteroSMSGATEWAYHUB', 'HeteroWati', 'True', '', 'True', 'True', 'True', 'True', 'empire', 'MSADMIN', '2026-01-02 17:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `wc_otp_validation`
--

CREATE TABLE `wc_otp_validation` (
  `wc_otp_id` int(11) NOT NULL,
  `wc_otp_mobile` varchar(10) DEFAULT NULL,
  `wc_otp_value` varchar(10) DEFAULT NULL,
  `wc_otp_starttime` datetime DEFAULT NULL,
  `wc_otp_endtime` datetime DEFAULT NULL,
  `wc_otp_verified_on` enum('1001','1002') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_otp_validation`
--

INSERT INTO `wc_otp_validation` (`wc_otp_id`, `wc_otp_mobile`, `wc_otp_value`, `wc_otp_starttime`, `wc_otp_endtime`, `wc_otp_verified_on`) VALUES
(1, '9705841670', '702076', '2025-10-22 12:46:03', '2025-10-22 12:56:03', '1001'),
(2, '9705841670', '616846', '2025-10-22 12:52:59', '2025-10-22 13:02:59', '1001'),
(3, '9705841670', '275134', '2025-10-22 12:53:42', '2025-10-22 13:03:42', '1001'),
(4, '9705841670', '823753', '2025-10-22 12:54:09', '2025-10-22 13:04:09', '1001'),
(5, '9705841670', '123456', '2025-10-22 12:54:59', '2025-10-22 13:04:59', '1001'),
(6, '9705841670', '123456', '2025-10-22 14:09:48', '2025-10-22 14:19:48', '1001'),
(7, '9705841670', '333753', '2025-10-22 14:10:16', '2025-10-22 14:20:16', '1001'),
(8, '9705841670', NULL, '2025-10-22 14:11:32', '2025-10-22 14:21:32', '1001'),
(9, '9705841670', '123456', '2025-10-22 14:12:26', '2025-10-22 14:22:26', '1001'),
(10, '9705841670', '123456', '2025-10-22 14:13:13', '2025-10-22 14:23:13', '1001'),
(11, '9705841670', '123456', '2025-10-22 14:15:43', '2025-10-22 14:25:43', '1001'),
(12, '9705841670', '123456', '2025-10-22 14:18:56', '2025-10-22 14:28:56', '1001'),
(13, '9705841670', '123456', '2025-10-22 14:34:09', '2025-10-22 20:44:09', '1001'),
(14, '9705841678', '152735', '2025-10-22 17:28:14', '2025-10-22 17:38:14', '1001'),
(15, '9705841670', '123456', '2025-10-22 17:31:56', '2025-10-22 17:41:56', '1001'),
(16, '9705841670', '123456', '2025-10-22 17:32:05', '2025-10-22 17:42:05', '1001'),
(17, '9324238437', '444832', '2025-10-22 18:02:08', '2025-10-22 18:12:08', '1001'),
(18, '9324238437', '591025', '2025-10-22 18:02:21', '2025-10-22 18:12:21', '1001'),
(19, '9324238437', '888907', '2025-10-22 18:03:22', '2025-10-22 18:13:22', '1001'),
(20, '9705841670', '123456', '2025-11-13 11:34:42', '2025-11-13 11:44:42', '1001'),
(21, '9705841670', '123456', '2025-12-04 10:51:54', '2025-12-04 11:01:54', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_participants`
--

CREATE TABLE `wc_participants` (
  `wc_p_id` int(11) NOT NULL,
  `wc_p_name` varchar(50) DEFAULT NULL,
  `wc_p_email` varchar(50) DEFAULT NULL,
  `wc_p_phone_number` int(12) DEFAULT NULL,
  `wc_p_phone_location` varchar(50) DEFAULT NULL,
  `wc_p_status` enum('1001','1002') NOT NULL DEFAULT '1001',
  `wc_p_updated_by` varchar(50) DEFAULT NULL,
  `wc_p_updated_on` datetime DEFAULT NULL,
  `wc_p_created_by` varchar(50) DEFAULT NULL,
  `wc_p_created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_participants`
--

INSERT INTO `wc_participants` (`wc_p_id`, `wc_p_name`, `wc_p_email`, `wc_p_phone_number`, `wc_p_phone_location`, `wc_p_status`, `wc_p_updated_by`, `wc_p_updated_on`, `wc_p_created_by`, `wc_p_created_on`) VALUES
(1, 'Rajesh P', 'testing@gmail.com', 1222222222, 'Hyderbad', '1001', 'RajeshP', '2025-11-24 16:32:52', 'RajeshP', '2025-11-24 16:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `wc_queries`
--

CREATE TABLE `wc_queries` (
  `wc_q_id` int(11) NOT NULL,
  `wc_w_event_code` varchar(10) DEFAULT NULL,
  `wc_di_code` varchar(10) DEFAULT NULL,
  `wc_q_code` varchar(10) DEFAULT NULL,
  `wc_q_query` text DEFAULT NULL,
  `wc_q_posted_on` datetime DEFAULT NULL,
  `wc_q_posted_by` varchar(10) DEFAULT NULL,
  `wc_q_status` enum('Pending','Answered') DEFAULT NULL,
  `wc_q_resolved_on` datetime DEFAULT NULL,
  `wc_q_resolved_by` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_queries`
--

INSERT INTO `wc_queries` (`wc_q_id`, `wc_w_event_code`, `wc_di_code`, `wc_q_code`, `wc_q_query`, `wc_q_posted_on`, `wc_q_posted_by`, `wc_q_status`, `wc_q_resolved_on`, `wc_q_resolved_by`) VALUES
(1, '5979118568', 'ASRA', '4381792854', 'Testing', '2025-10-21 15:29:41', '5363492142', 'Pending', '0000-00-00 00:00:00', ''),
(2, '5979118568', 'ASRA', '5744936173', 'Testing', '2025-10-21 15:30:02', '5363492142', 'Pending', '0000-00-00 00:00:00', ''),
(3, '5979118568', 'ASRA', '1863974227', 'Testing 1', '2025-10-21 15:30:33', '5363492142', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wc_sms_enroll`
--

CREATE TABLE `wc_sms_enroll` (
  `wc_sms_en_id` int(11) NOT NULL,
  `wc_sms_en_code` varchar(10) DEFAULT NULL,
  `wc_sms_en_name` varchar(30) DEFAULT NULL,
  `wc_sms_en_number` varchar(10) DEFAULT NULL,
  `wc_sms_en_template_name` text DEFAULT NULL,
  `wc_sms_en_schedule_date_time` datetime DEFAULT NULL,
  `wc_sms_en_account` varchar(30) DEFAULT NULL,
  `wc_sms_en_source_from` varchar(30) DEFAULT NULL,
  `wc_sms_en_status` enum('Scheduled','Triggered') NOT NULL,
  `wc_sms_en_scheduled_by` varchar(10) DEFAULT NULL,
  `wc_sms_en_scheduled_on` datetime DEFAULT NULL,
  `wc_sms_en_triggered_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_sms_enroll`
--

INSERT INTO `wc_sms_enroll` (`wc_sms_en_id`, `wc_sms_en_code`, `wc_sms_en_name`, `wc_sms_en_number`, `wc_sms_en_template_name`, `wc_sms_en_schedule_date_time`, `wc_sms_en_account`, `wc_sms_en_source_from`, `wc_sms_en_status`, `wc_sms_en_scheduled_by`, `wc_sms_en_scheduled_on`, `wc_sms_en_triggered_on`) VALUES
(1, '6715736394', 'Aravind', '9705841670', 'H-WC-SGH-TY', '2025-10-29 15:39:00', 'Hetero', 'HeteroSMSGATEWAYHUB', 'Triggered', '1837462185', '2025-10-25 17:14:33', '2025-10-29 15:52:02'),
(2, '4135681299', 'Rajesh', '9324238437', 'H-WC-SGH-TY', '2025-10-29 15:39:00', 'Hetero', 'HeteroSMSGATEWAYHUB', 'Triggered', '1837462185', '2025-10-25 17:19:43', '2025-10-29 15:52:02'),
(3, '2864179982', 'Aravind', '9705841670', 'H-WC-SGH-TY', '2025-10-26 15:42:00', 'Hetero', 'HeteroSMSGATEWAYHUB', 'Triggered', '1837462185', '2025-10-25 15:42:03', '2025-10-29 14:15:11'),
(4, '8195767536', 'Rajesh', '9324238437', 'H-WC-SGH-TY', '2025-10-26 15:42:00', 'Hetero', 'HeteroSMSGATEWAYHUB', 'Triggered', '1837462185', '2025-10-25 15:42:03', '2025-10-29 14:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `wc_speciality_maping`
--

CREATE TABLE `wc_speciality_maping` (
  `wc_sm_id` int(11) NOT NULL,
  `wc_drs_code` varchar(10) DEFAULT NULL,
  `wc_di_code` varchar(10) DEFAULT NULL,
  `wc_sm_status` enum('1001','1002') NOT NULL DEFAULT '1001'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_speciality_maping`
--

INSERT INTO `wc_speciality_maping` (`wc_sm_id`, `wc_drs_code`, `wc_di_code`, `wc_sm_status`) VALUES
(1, '6732645768', 'AURA', '1001'),
(2, '6732645769', 'AURA', '1001'),
(3, '6732645770', 'AURA', '1001'),
(4, '6732645771', 'AURA', '1001'),
(5, '6732645772', 'AURA', '1001'),
(6, '6732645773', 'AURA', '1001'),
(7, '6732645774', 'AURA', '1001'),
(8, '6732645775', 'AURA', '1001'),
(9, '6732645776', 'AURA', '1001'),
(10, '6732645777', 'AURA', '1001'),
(11, '6732645778', 'AURA', '1001'),
(12, '6732645779', 'AURA', '1001'),
(13, '6732645780', 'AURA', '1001'),
(14, '6732645781', 'AURA', '1001'),
(15, '6732645782', 'AURA', '1001'),
(16, '6732645783', 'AURA', '1001'),
(17, '6732645784', 'AURA', '1001'),
(18, '6732645785', 'AURA', '1001'),
(19, '6732645786', 'AURA', '1001'),
(20, '6732645787', 'AURA', '1001'),
(21, '6732645788', 'AURA', '1001'),
(22, '6732645789', 'AURA', '1001'),
(23, '6732645790', 'AURA', '1001'),
(24, '6732645791', 'AURA', '1001'),
(25, '6732645792', 'AURA', '1001'),
(26, '6732645793', 'AURA', '1001'),
(27, '6732645794', 'AURA', '1001'),
(28, '6732645795', 'AURA', '1001'),
(29, '6732645796', 'AURA', '1001'),
(30, '6732645797', 'AURA', '1001'),
(31, '6732645798', 'AURA', '1001'),
(32, '6732645799', 'AURA', '1001'),
(33, '6732645800', 'AURA', '1001'),
(34, '6732645801', 'AURA', '1001'),
(35, '6732645802', 'AURA', '1001'),
(36, '6732645803', 'AURA', '1001'),
(37, '6732645804', 'AURA', '1001'),
(38, '6732645805', 'AURA', '1001'),
(39, '6732645806', 'AURA', '1001'),
(40, '6732645807', 'AURA', '1001'),
(41, '6732645808', 'AURA', '1001'),
(42, '6732645809', 'AURA', '1001'),
(43, '6732645810', 'AURA', '1001'),
(44, '6732645811', 'AURA', '1001'),
(45, '6732645812', 'AURA', '1001'),
(46, '6732645813', 'AURA', '1001'),
(47, '6732645814', 'AURA', '1001'),
(48, '6732645815', 'AURA', '1001'),
(49, '6732645816', 'AURA', '1001'),
(50, '6732645817', 'AURA', '1001'),
(51, '6732645818', 'AURA', '1001'),
(52, '6732645819', 'AURA', '1001'),
(53, '6732645820', 'AURA', '1001'),
(54, '6732645821', 'AURA', '1001'),
(55, '6732645822', 'AURA', '1001'),
(56, '6732645823', 'AURA', '1001'),
(57, '6732645824', 'AURA', '1001'),
(58, '6732645825', 'AURA', '1001'),
(59, '6732645826', 'AURA', '1001'),
(60, '6732645827', 'AURA', '1001'),
(61, '6732645828', 'AURA', '1001'),
(62, '6732645829', 'AURA', '1001'),
(63, '6732645830', 'AURA', '1001'),
(64, '6732645831', 'AURA', '1001'),
(65, '6732645832', 'AURA', '1001'),
(66, '6732645833', 'AURA', '1001'),
(67, '6732645834', 'AURA', '1001'),
(68, '6732645835', 'AURA', '1001'),
(69, '6732645836', 'AURA', '1001'),
(70, '6732645837', 'AURA', '1001'),
(71, '6732645838', 'AURA', '1001'),
(72, '6732645839', 'AURA', '1001'),
(73, '6732645840', 'AURA', '1001'),
(74, '6732645841', 'AURA', '1001'),
(75, '6732645842', 'AURA', '1001'),
(76, '6732645843', 'AURA', '1001'),
(77, '6732645844', 'AURA', '1001'),
(78, '6732645845', 'AURA', '1001'),
(79, '6732645846', 'AURA', '1001'),
(80, '6732645847', 'AURA', '1001'),
(81, '6732645848', 'AURA', '1001'),
(82, '6732645768', 'ASRA', '1001'),
(83, '6732645769', 'ASRA', '1001'),
(84, '6732645770', 'ASRA', '1001'),
(85, '6732645771', 'ASRA', '1001'),
(86, '6732645772', 'ASRA', '1001'),
(87, '6732645773', 'ASRA', '1001'),
(88, '6732645774', 'ASRA', '1001'),
(89, '6732645775', 'ASRA', '1001'),
(90, '6732645776', 'ASRA', '1001'),
(91, '6732645777', 'ASRA', '1001'),
(92, '6732645778', 'ASRA', '1001'),
(93, '6732645779', 'ASRA', '1001'),
(94, '6732645780', 'ASRA', '1001'),
(95, '6732645781', 'ASRA', '1001'),
(96, '6732645782', 'ASRA', '1001'),
(97, '6732645783', 'ASRA', '1001'),
(98, '6732645784', 'ASRA', '1001'),
(99, '6732645785', 'ASRA', '1001'),
(100, '6732645786', 'ASRA', '1001'),
(101, '6732645787', 'ASRA', '1001'),
(102, '6732645788', 'ASRA', '1001'),
(103, '6732645789', 'ASRA', '1001'),
(104, '6732645790', 'ASRA', '1001'),
(105, '6732645791', 'ASRA', '1001'),
(106, '6732645792', 'ASRA', '1001'),
(107, '6732645793', 'ASRA', '1001'),
(108, '6732645794', 'ASRA', '1001'),
(109, '6732645795', 'ASRA', '1001'),
(110, '6732645796', 'ASRA', '1001'),
(111, '6732645797', 'ASRA', '1001'),
(112, '6732645798', 'ASRA', '1001'),
(113, '6732645799', 'ASRA', '1001'),
(114, '6732645800', 'ASRA', '1001'),
(115, '6732645801', 'ASRA', '1001'),
(116, '6732645802', 'ASRA', '1001'),
(117, '6732645803', 'ASRA', '1001'),
(118, '6732645804', 'ASRA', '1001'),
(119, '6732645805', 'ASRA', '1001'),
(120, '6732645806', 'ASRA', '1001'),
(121, '6732645807', 'ASRA', '1001'),
(122, '6732645808', 'ASRA', '1001'),
(123, '6732645809', 'ASRA', '1001'),
(124, '6732645810', 'ASRA', '1001'),
(125, '6732645811', 'ASRA', '1001'),
(126, '6732645812', 'ASRA', '1001'),
(127, '6732645813', 'ASRA', '1001'),
(128, '6732645814', 'ASRA', '1001'),
(129, '6732645815', 'ASRA', '1001'),
(130, '6732645816', 'ASRA', '1001'),
(131, '6732645817', 'ASRA', '1001'),
(132, '6732645818', 'ASRA', '1001'),
(133, '6732645819', 'ASRA', '1001'),
(134, '6732645820', 'ASRA', '1001'),
(135, '6732645821', 'ASRA', '1001'),
(136, '6732645822', 'ASRA', '1001'),
(137, '6732645823', 'ASRA', '1001'),
(138, '6732645824', 'ASRA', '1001'),
(139, '6732645825', 'ASRA', '1001'),
(140, '6732645826', 'ASRA', '1001'),
(141, '6732645827', 'ASRA', '1001'),
(142, '6732645828', 'ASRA', '1001'),
(143, '6732645829', 'ASRA', '1001'),
(144, '6732645830', 'ASRA', '1001'),
(145, '6732645831', 'ASRA', '1001'),
(146, '6732645832', 'ASRA', '1001'),
(147, '6732645833', 'ASRA', '1001'),
(148, '6732645834', 'ASRA', '1001'),
(149, '6732645835', 'ASRA', '1001'),
(150, '6732645836', 'ASRA', '1001'),
(151, '6732645837', 'ASRA', '1001'),
(152, '6732645838', 'ASRA', '1001'),
(153, '6732645839', 'ASRA', '1001'),
(154, '6732645840', 'ASRA', '1001'),
(155, '6732645841', 'ASRA', '1001'),
(156, '6732645842', 'ASRA', '1001'),
(157, '6732645843', 'ASRA', '1001'),
(158, '6732645844', 'ASRA', '1001'),
(159, '6732645845', 'ASRA', '1001'),
(160, '6732645846', 'ASRA', '1001'),
(161, '6732645847', 'ASRA', '1001'),
(162, '6732645848', 'ASRA', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_technician_user`
--

CREATE TABLE `wc_technician_user` (
  `wc_du_id` int(11) NOT NULL,
  `wc_u_code` varchar(30) DEFAULT NULL,
  `wc_di_code` varchar(30) DEFAULT NULL,
  `wc_du_status` enum('1001','1002') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_technician_user`
--

INSERT INTO `wc_technician_user` (`wc_du_id`, `wc_u_code`, `wc_di_code`, `wc_du_status`) VALUES
(1, '1837462185', 'AURA ', '1001'),
(2, '1837462185', 'HHCLC', '1001'),
(7, '1837462185', 'COVID 19', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_themes`
--

CREATE TABLE `wc_themes` (
  `wc_tm_id` int(11) NOT NULL,
  `wc_tm_code` varchar(10) NOT NULL,
  `wc_tm_name` varchar(50) NOT NULL,
  `wc_tm_status` enum('1001','1002') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_themes`
--

INSERT INTO `wc_themes` (`wc_tm_id`, `wc_tm_code`, `wc_tm_name`, `wc_tm_status`) VALUES
(1, '2557536814', 'empire', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `wc_users`
--

CREATE TABLE `wc_users` (
  `wc_u_id` int(11) NOT NULL,
  `wc_u_code` varchar(30) DEFAULT NULL,
  `wc_u_type` enum('Admin','Support Team','Employee','Participant','Technician','Organizer') DEFAULT NULL,
  `wc_u_role` enum('Admin','Create','Edit','Update','Delete','Review','Participant') DEFAULT NULL,
  `wc_u_empid` varchar(11) DEFAULT NULL,
  `wc_di_code` varchar(30) DEFAULT NULL,
  `wc_u_display_name` varchar(225) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `wc_u_password_updated_on` datetime DEFAULT NULL,
  `wc_u_avatar` varchar(225) DEFAULT NULL,
  `wc_u_email` varchar(225) DEFAULT NULL,
  `wc_u_email_verified_status` enum('1001','1002') NOT NULL DEFAULT '1002',
  `wc_u_phone` varchar(225) DEFAULT NULL,
  `wc_u_phone_verified_status` enum('1001','1002') NOT NULL DEFAULT '1002',
  `wc_u_status` enum('1001','1002') NOT NULL DEFAULT '1001',
  `wc_updated_by` varchar(50) DEFAULT NULL,
  `wc_updated_on` datetime DEFAULT NULL,
  `wc_created_by` varchar(50) DEFAULT NULL,
  `wc_created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_users`
--

INSERT INTO `wc_users` (`wc_u_id`, `wc_u_code`, `wc_u_type`, `wc_u_role`, `wc_u_empid`, `wc_di_code`, `wc_u_display_name`, `username`, `password`, `wc_u_password_updated_on`, `wc_u_avatar`, `wc_u_email`, `wc_u_email_verified_status`, `wc_u_phone`, `wc_u_phone_verified_status`, `wc_u_status`, `wc_updated_by`, `wc_updated_on`, `wc_created_by`, `wc_created_on`) VALUES
(1, 'MSADMIN', 'Admin', 'Admin', 'ADMIN', 'ADMIN', 'Admin', 'admin', 'welcome', NULL, 'user.png', 'srinivasarao.erukulla@heterohealthcare.com', '1001', '9705841670', '1001', '1001', 'MSADMIN', '2023-11-04 09:00:55', 'MSADMIN', '2023-11-04 09:00:55'),
(2, '1937562287', 'Employee', 'Admin', '13433', 'ASRA', 'Naga Devi', '13433', '13433', NULL, NULL, 'nagadevi@heterohealthcare.com', '1001', '9705841670', '1001', '1001', 'MSADMIN', '2025-08-28 13:19:35', 'MSADMIN', '2025-08-28 13:19:35'),
(3, '1837462185', 'Technician', 'Review', '13420', 'HHCLC', 'Thakur Sanjana', '13420', '13420', NULL, NULL, 'sanjana.thakur@heterohealthcare.com', '1001', '9912985415', '1001', '1001', 'MSADMIN', '2025-08-28 13:19:35', 'MSADMIN', '2025-08-28 13:19:35'),
(4, '1538422683', 'Organizer', 'Review', '13152', 'HHCLC', 'Giridhar Akula', '13152', '13152', NULL, NULL, 'giridhar.akula@heterohealthcare.com', '1001', '7780646923', '1001', '1001', 'MSADMIN', '2025-08-28 13:19:35', 'MSADMIN', '2025-08-28 13:19:35'),
(5, '5363492142', 'Participant', 'Participant', NULL, NULL, 'Aravind', 'Participant', 'Participant', NULL, NULL, NULL, '1002', '9705841670', '1002', '1001', NULL, NULL, 'Participant', '2025-10-14 12:32:15'),
(6, '5189221363', 'Participant', 'Participant', NULL, NULL, 'Rajesh', 'Participant', 'Participant', NULL, NULL, NULL, '1002', '9324238437', '1002', '1001', NULL, NULL, 'Participant', '2025-10-22 18:00:15'),
(7, '8139223741', 'Admin', 'Admin', '12219', 'SYNERGY', 'Rajesh Sadasivaiah Palamangalam', '12219', '12219', '2025-11-24 17:20:25', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:20:25', 'MSADMIN', '2025-11-24 17:20:25'),
(8, '8533672972', 'Employee', 'Admin', '66666', 'SPECIALITY CARE', 'Rajesh Sadasivaiah Palamangalam', '66666', '66666', '2025-11-24 17:21:27', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:21:27', 'MSADMIN', '2025-11-24 17:21:27'),
(9, '1871252363', 'Employee', 'Admin', '66666', 'SPECIALITY CARE', 'Rajesh Sadasivaiah Palamangalam', '66666', '66666', '2025-11-24 17:21:47', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:21:47', 'MSADMIN', '2025-11-24 17:21:47'),
(10, '1499287332', 'Admin', 'Admin', '66664', 'SYNERGY', 'rangaswami', '66664', '66664', '2025-11-24 17:22:08', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:22:08', 'MSADMIN', '2025-11-24 17:22:08'),
(11, '6226459571', 'Employee', 'Admin', '7777777', 'SYNERGY', 'rangaswami', '7777777', '7777777', '2025-11-24 17:23:28', '', 'test@gmail.com', '', '8988888888', '', '1001', 'MSADMIN', '2025-11-24 17:23:28', 'MSADMIN', '2025-11-24 17:23:28'),
(12, '2695453828', 'Support Team', 'Admin', '13159', 'HHCL MAIN', 'Deepthi Gangireddy', '13159', '13159', '2025-12-08 11:57:04', '', 'deepthi.gangireddy@heterohealthcare.com', '', '9876543210', '', '1001', 'MSADMIN', '2025-12-08 11:57:04', 'MSADMIN', '2025-12-08 11:57:04'),
(13, '1654749315', 'Organizer', 'Create', '13158', 'HHCL MAIN', 'Deepthi Gangireddy', '13158', '13158', '2025-12-08 12:00:05', '', 'deepthi.gangireddy@heterohealthcare.com', '', '9876543210', '', '1001', 'MSADMIN', '2025-12-08 12:00:05', 'MSADMIN', '2025-12-08 12:00:05'),
(14, '4837265589', 'Technician', 'Admin', '13159-1', 'AURA', 'Deepthi Gangireddy', '13159-1', '13159-1', '2026-01-02 14:49:36', '', 'deepthi.gangireddy@heterohealthcare.com', '', '9876543210', '', '1001', 'MSADMIN', '2026-01-02 14:49:36', 'MSADMIN', '2026-01-02 14:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `wc_users_history`
--

CREATE TABLE `wc_users_history` (
  `wc_uh_id` int(11) NOT NULL,
  `wc_u_id` int(11) NOT NULL,
  `wc_u_code` varchar(30) DEFAULT NULL,
  `wc_u_type` enum('Admin','Employee','Participant') DEFAULT NULL,
  `wc_u_role` enum('Admin','Create','Edit','Update','Delete','Review') DEFAULT NULL,
  `wc_u_empid` varchar(11) DEFAULT NULL,
  `wc_di_code` varchar(30) DEFAULT NULL,
  `wc_u_display_name` varchar(225) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `wc_u_password_updated_on` datetime DEFAULT NULL,
  `wc_u_avatar` varchar(225) DEFAULT NULL,
  `wc_u_email` varchar(225) DEFAULT NULL,
  `wc_u_email_verified_status` enum('1001','1002') NOT NULL DEFAULT '1002',
  `wc_u_phone` varchar(225) DEFAULT NULL,
  `wc_u_phone_verified_status` enum('1001','1002') NOT NULL DEFAULT '1002',
  `wc_u_status` enum('1001','1002') NOT NULL DEFAULT '1001',
  `wc_updated_by` varchar(50) DEFAULT NULL,
  `wc_updated_on` datetime DEFAULT NULL,
  `wc_created_by` varchar(50) DEFAULT NULL,
  `wc_created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_users_history`
--

INSERT INTO `wc_users_history` (`wc_uh_id`, `wc_u_id`, `wc_u_code`, `wc_u_type`, `wc_u_role`, `wc_u_empid`, `wc_di_code`, `wc_u_display_name`, `username`, `password`, `wc_u_password_updated_on`, `wc_u_avatar`, `wc_u_email`, `wc_u_email_verified_status`, `wc_u_phone`, `wc_u_phone_verified_status`, `wc_u_status`, `wc_updated_by`, `wc_updated_on`, `wc_created_by`, `wc_created_on`) VALUES
(2, 0, '1937562287', 'Employee', 'Admin', '13433', 'ASRA', 'Naga Devi', '13433', '13433', '2025-08-28 13:19:35', 'user.png', 'nagadevi@heterohealthcare.com', '', '9705841670', '', '1001', 'MSADMIN', '2025-08-28 13:19:35', 'MSADMIN', '2025-08-28 13:19:35'),
(7, 0, '8139223741', 'Admin', 'Admin', '12219', 'SYNERGY', 'Rajesh Sadasivaiah Palamangalam', '12219', '12219', '2025-11-24 17:20:25', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:20:25', 'MSADMIN', '2025-11-24 17:20:25'),
(9, 0, '1871252363', 'Employee', 'Admin', '66666', 'SPECIALITY CARE', 'Rajesh Sadasivaiah Palamangalam', '66666', '66666', '2025-11-24 17:21:47', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:21:47', 'MSADMIN', '2025-11-24 17:21:47'),
(10, 0, '1499287332', 'Admin', 'Admin', '66664', 'SYNERGY', 'rangaswami', '66664', '66664', '2025-11-24 17:22:08', '', 'creativebooks.rajeshp@gmail.com', '', '09324238437', '', '1001', 'MSADMIN', '2025-11-24 17:22:08', 'MSADMIN', '2025-11-24 17:22:08'),
(11, 0, '6226459571', 'Admin', 'Admin', '7777777', 'SYNERGY', 'rangaswami', '7777777', '7777777', '2025-11-24 17:23:28', '', 'test@gmail.com', '', '8988888888', '', '1001', 'MSADMIN', '2025-11-24 17:23:28', 'MSADMIN', '2025-11-24 17:23:28'),
(12, 0, '2695453828', '', 'Admin', '13159', 'HHCL MAIN', 'Deepthi Gangireddy', '13159', '13159', '2025-12-08 11:57:04', '', 'deepthi.gangireddy@heterohealthcare.com', '', '9876543210', '', '1001', 'MSADMIN', '2025-12-08 11:57:04', 'MSADMIN', '2025-12-08 11:57:04'),
(13, 0, '1654749315', '', 'Create', '13158', 'HHCL MAIN', 'Deepthi Gangireddy', '13158', '13158', '2025-12-08 12:00:05', '', 'deepthi.gangireddy@heterohealthcare.com', '', '9876543210', '', '1001', 'MSADMIN', '2025-12-08 12:00:05', 'MSADMIN', '2025-12-08 12:00:05'),
(14, 0, '4837265589', '', 'Admin', '13159-1', 'AURA', 'Deepthi Gangireddy', '13159-1', '13159-1', '2026-01-02 14:49:36', '', 'deepthi.gangireddy@heterohealthcare.com', '', '9876543210', '', '1001', 'MSADMIN', '2026-01-02 14:49:36', 'MSADMIN', '2026-01-02 14:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `wc_users_log`
--

CREATE TABLE `wc_users_log` (
  `wc_log_id` int(11) NOT NULL,
  `wc_u_code` varchar(20) DEFAULT NULL,
  `wc_log_user_code` varchar(20) DEFAULT NULL,
  `wc_u_empid` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `wc_u_phone` varchar(20) DEFAULT NULL,
  `wc_di_code` varchar(20) DEFAULT NULL,
  `wc_log_user_ip` varchar(20) DEFAULT NULL,
  `wc_logon` datetime DEFAULT NULL,
  `wc_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wc_users_log`
--

INSERT INTO `wc_users_log` (`wc_log_id`, `wc_u_code`, `wc_log_user_code`, `wc_u_empid`, `username`, `wc_u_phone`, `wc_di_code`, `wc_log_user_ip`, `wc_logon`, `wc_logout`) VALUES
(1, 'MSADMIN', '7182447856', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 15:54:54', NULL),
(2, 'MSADMIN', '3754716142', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:01:47', NULL),
(3, 'MSADMIN', '2129536747', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:02:52', NULL),
(4, 'MSADMIN', '5348518249', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:03:49', NULL),
(5, 'MSADMIN', '6558373224', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:04:11', NULL),
(6, 'MSADMIN', '7284861514', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:19:39', NULL),
(7, 'MSADMIN', '4876671839', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:26:02', '2025-08-26 16:28:37'),
(8, 'MSADMIN', '9364521941', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 16:28:46', NULL),
(9, 'MSADMIN', '1673499234', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-26 19:24:32', NULL),
(10, 'MSADMIN', '2564699371', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-28 12:27:09', '2025-08-28 13:19:42'),
(11, '1937562287', '7721965893', '13433', '13433', '9705841670', 'ASRA', '157.119.108.67', '2025-08-28 13:19:45', NULL),
(12, 'MSADMIN', '9144357821', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-08-29 14:08:11', '2025-08-29 14:44:48'),
(13, '1937562287', '3491167872', '13433', '13433', '9705841670', 'ASRA', '157.119.108.67', '2025-08-29 14:44:52', NULL),
(14, '1937562287', '5273357448', '13433', '13433', '9705841670', 'ASRA', '157.119.108.67', '2025-08-30 15:49:10', NULL),
(15, 'MSADMIN', '5175987163', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.210', '2025-09-04 10:51:15', NULL),
(16, 'MSADMIN', '4282465537', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-09-13 18:16:33', NULL),
(17, '1937562287', '5272399485', '13433', '13433', '9705841670', 'ASRA', '103.161.31.212', '2025-10-07 09:56:54', NULL),
(18, '1937562287', '2514397569', '13433', '13433', '9705841670', 'ASRA', '103.161.31.212', '2025-10-08 11:50:46', NULL),
(19, '1937562287', '2647945823', '13433', '13433', '9705841670', 'ASRA', '103.161.31.212', '2025-10-08 15:02:41', NULL),
(20, '1837462185', '9639182765', '13420', '13420', '9912985415', 'HHCLC', '103.161.31.212', '2025-10-10 09:00:08', NULL),
(21, '1837462185', '8797123366', '13420', '13420', '9912985415', 'HHCLC', '103.161.31.212', '2025-10-10 09:00:14', NULL),
(22, '1837462185', '2839159263', '13420', '13420', '9912985415', 'HHCLC', '103.161.31.212', '2025-10-10 09:02:29', '2025-10-10 09:06:25'),
(23, '1937562287', '1827338529', '13433', '13433', '9705841670', 'ASRA', '103.161.31.212', '2025-10-10 09:06:35', '2025-10-10 09:07:10'),
(24, 'MSADMIN', '8362143491', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-10-10 09:07:19', '2025-10-10 10:28:24'),
(25, 'MSADMIN', '2783742651', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-10-10 10:28:31', '2025-10-10 15:54:35'),
(26, '1937562287', '2796146835', '13433', '13433', '9705841670', 'ASRA', '103.161.31.212', '2025-10-10 15:54:42', '2025-10-10 15:56:36'),
(27, '1538422683', '5126353927', '13152', '13152', '7780646923', 'HHCLC', '103.161.31.212', '2025-10-10 15:56:39', NULL),
(28, '1538422683', '4831365699', '13152', '13152', '7780646923', 'HHCLC', '103.161.31.212', '2025-10-11 12:01:39', '2025-10-11 12:06:21'),
(29, '1937562287', '6925747339', '13433', '13433', '9705841670', 'ASRA', '103.161.31.212', '2025-10-11 12:06:29', '2025-10-11 12:06:45'),
(30, '1538422683', '3289466753', '13152', '13152', '7780646923', 'HHCLC', '103.161.31.212', '2025-10-11 12:06:52', '2025-10-11 12:12:31'),
(31, '1837462185', '9526129146', '13420', '13420', '9912985415', 'HHCLC', '103.161.31.212', '2025-10-11 12:12:38', '2025-10-11 16:13:13'),
(32, 'MSADMIN', '5891784573', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-10-11 16:13:18', '2025-10-11 16:20:17'),
(33, 'MSADMIN', '6874519592', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-10-16 09:18:59', NULL),
(34, '5363492142', '7735452921', 'Participant', 'Participant', '9705841678', 'ASRA', '103.161.31.212', '2025-10-16 15:23:59', '2025-10-16 15:27:15'),
(35, '5363492142', '1361958429', 'Participant', 'Participant', '9705841678', 'ASRA', '103.161.31.212', '2025-10-16 15:35:38', '2025-10-16 15:35:42'),
(36, '5363492142', '6378915187', 'Participant', 'Participant', '9705841678', 'ASRA', '103.161.31.212', '2025-10-16 15:58:06', '2025-10-16 16:01:13'),
(37, '5363492142', '9876318943', 'Participant', 'Participant', '9705841678', 'ASRA', '103.161.31.212', '2025-10-16 16:01:21', NULL),
(38, '5363492142', '6936859285', 'Participant', 'Participant', '9705841678', 'ASRA', '103.161.31.212', '2025-10-17 12:27:47', NULL),
(39, '5363492142', '9351427987', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-21 11:11:26', '2025-10-21 11:11:53'),
(40, '5363492142', '5119673847', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-21 11:12:00', NULL),
(41, '5363492142', '8132165795', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-21 15:22:08', '2025-10-21 15:32:50'),
(42, '5363492142', '8742581326', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-21 15:35:58', '2025-10-21 15:37:02'),
(43, '5363492142', '9274176236', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-22 10:21:10', '2025-10-22 10:21:23'),
(44, '5363492142', '8447995631', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-22 10:22:41', '2025-10-22 10:26:47'),
(45, '5363492142', '2637457385', 'Participant', 'Participant', '9705841678', 'ASRA', '157.119.108.67', '2025-10-22 11:23:59', '2025-10-22 11:24:21'),
(46, '5363492142', '7987545323', 'Participant', 'Participant', '9705841670', 'ASRA', '157.119.108.67', '2025-10-22 17:46:24', '2025-10-22 17:46:30'),
(47, '5189221363', '5283971614', 'Participant', 'Participant', '9324238437', 'ASRA', '157.119.108.67', '2025-10-22 18:03:42', '2025-10-22 18:04:09'),
(48, 'MSADMIN', '5129852767', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-23 09:51:58', NULL),
(49, 'MSADMIN', '1747991358', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-23 15:53:08', NULL),
(50, 'MSADMIN', '8735471963', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-24 14:40:58', NULL),
(51, 'MSADMIN', '2894457335', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-24 18:17:57', NULL),
(52, '1837462185', '4643127751', '13420', '13420', '9912985415', 'HHCLC', '157.119.108.67', '2025-10-25 09:31:23', NULL),
(53, 'MSADMIN', '5671868324', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-28 12:07:33', NULL),
(54, 'MSADMIN', '5134912745', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-28 14:37:40', NULL),
(55, 'MSADMIN', '9286425478', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-31 10:51:47', '2025-10-31 11:15:56'),
(56, 'MSADMIN', '3662535872', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-10-31 18:17:42', '2025-10-31 18:17:47'),
(57, 'MSADMIN', '9564794858', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-01 16:29:05', '2025-11-01 16:29:46'),
(58, 'MSADMIN', '9766125953', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-01 16:45:16', '2025-11-01 16:58:05'),
(59, 'MSADMIN', '3239561484', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 11:23:47', '2025-11-03 11:26:53'),
(60, 'MSADMIN', '2765834511', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 11:27:17', '2025-11-03 14:27:36'),
(61, 'MSADMIN', '8974839256', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 14:32:40', '2025-11-03 14:32:45'),
(62, 'MSADMIN', '1749271839', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 14:36:23', '2025-11-03 14:37:54'),
(63, 'MSADMIN', '1648594827', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 14:38:32', '2025-11-03 14:39:41'),
(64, 'MSADMIN', '2511648363', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 14:39:47', '2025-11-03 14:49:45'),
(65, 'MSADMIN', '2646857893', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 14:42:16', '2025-11-03 14:56:09'),
(66, 'MSADMIN', '8195726425', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-03 14:49:57', '2025-11-03 14:50:07'),
(67, 'MSADMIN', '8962749531', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-04 10:27:26', '2025-11-04 10:28:07'),
(68, 'MSADMIN', '6252889563', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-04 10:28:32', '2025-11-04 11:30:22'),
(69, 'MSADMIN', '3658679825', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-04 11:46:33', '2025-11-04 11:48:44'),
(70, 'MSADMIN', '6455292478', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-04 11:51:50', '2025-11-04 16:35:33'),
(71, 'MSADMIN', '2399551174', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-04 16:38:01', NULL),
(72, 'MSADMIN', '8643985715', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-05 09:05:55', NULL),
(73, 'MSADMIN', '2754953681', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-06 09:31:40', NULL),
(74, 'MSADMIN', '2456987321', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-13 11:22:03', NULL),
(75, 'MSADMIN', '8143469257', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-13 11:36:24', NULL),
(76, 'MSADMIN', '3685592114', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-14 08:42:25', '2025-11-14 08:42:31'),
(77, 'MSADMIN', '6138537272', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-14 08:45:40', '2025-11-14 10:09:40'),
(78, 'MSADMIN', '1721485799', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-17 16:46:25', '2025-11-17 16:52:28'),
(79, 'MSADMIN', '6592341793', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-17 16:57:04', '2025-11-17 16:59:59'),
(80, 'MSADMIN', '7268593872', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-17 17:22:03', '2025-11-17 18:31:08'),
(81, 'MSADMIN', '5857764918', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-17 18:32:34', NULL),
(82, 'MSADMIN', '2429543618', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-22 10:41:21', NULL),
(83, 'MSADMIN', '5284893574', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-24 10:13:21', '2025-11-24 17:27:29'),
(84, 'MSADMIN', '3912834971', 'ADMIN', 'admin', '9705841670', 'ADMIN', '157.119.108.67', '2025-11-24 17:27:32', NULL),
(85, 'MSADMIN', '9832536926', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-28 11:52:30', NULL),
(86, 'MSADMIN', '5671745921', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-11-28 11:53:34', NULL),
(87, 'MSADMIN', '1419526293', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-01 09:25:37', '2025-12-01 09:28:49'),
(88, 'MSADMIN', '6123875931', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-01 10:11:04', NULL),
(89, 'MSADMIN', '7615821449', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-04 10:41:59', NULL),
(90, 'MSADMIN', '8236217917', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-04 16:26:58', '2025-12-04 16:45:50'),
(91, 'MSADMIN', '3965897161', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-04 16:27:36', NULL),
(92, 'MSADMIN', '6214857136', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-05 10:11:09', NULL),
(93, 'MSADMIN', '9779263815', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-05 14:50:33', NULL),
(94, 'MSADMIN', '9826468297', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-05 15:06:47', NULL),
(95, 'MSADMIN', '8572463499', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-05 15:30:15', NULL),
(96, 'MSADMIN', '3294675791', 'ADMIN', 'admin', '9705841670', 'ADMIN', '146.70.102.182', '2025-12-05 17:18:01', NULL),
(97, 'MSADMIN', '6363889494', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-06 09:36:00', NULL),
(98, 'MSADMIN', '5314236279', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-06 16:51:28', NULL),
(99, 'MSADMIN', '3449365162', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-06 16:51:35', NULL),
(100, 'MSADMIN', '7587685929', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 09:51:10', NULL),
(101, 'MSADMIN', '7915742643', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 09:51:47', NULL),
(102, 'MSADMIN', '8563618472', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 10:33:38', NULL),
(103, 'MSADMIN', '2841328569', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 10:41:50', NULL),
(104, 'MSADMIN', '3874126575', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 10:50:21', NULL),
(105, 'MSADMIN', '1499277268', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 15:40:45', '2025-12-08 15:54:51'),
(106, '2695453828', '3319867844', '13159', '13159', '9876543210', 'HHCL MAIN', '103.161.31.212', '2025-12-08 15:54:58', NULL),
(107, 'MSADMIN', '3452699824', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 15:55:47', NULL),
(108, 'MSADMIN', '1483873516', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-08 16:24:58', NULL),
(109, 'MSADMIN', '2445796687', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.212', '2025-12-09 09:16:55', NULL),
(110, 'MSADMIN', '7216195968', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-17 09:59:26', NULL),
(111, 'MSADMIN', '8794661598', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-17 18:03:27', NULL),
(112, 'MSADMIN', '7947165183', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-26 16:49:36', NULL),
(113, 'MSADMIN', '1979685465', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-29 13:40:56', NULL),
(114, 'MSADMIN', '4291556824', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-29 15:44:04', NULL),
(115, 'MSADMIN', '4341226783', 'ADMIN', 'admin', '9705841670', 'ADMIN', '27.59.188.27', '2025-12-29 18:41:40', '2025-12-29 18:44:34'),
(116, 'MSADMIN', '2893274538', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-30 12:38:13', NULL),
(117, 'MSADMIN', '2327166595', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-30 14:59:18', NULL),
(118, 'MSADMIN', '4526825839', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-31 14:40:18', NULL),
(119, 'MSADMIN', '3865924852', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-31 14:40:57', NULL),
(120, 'MSADMIN', '3389891624', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2025-12-31 16:27:10', NULL),
(121, 'MSADMIN', '1725931682', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2026-01-02 14:19:55', NULL),
(122, 'MSADMIN', '4492692551', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2026-01-02 15:12:22', NULL),
(123, 'MSADMIN', '4362579634', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2026-01-02 15:59:27', NULL),
(124, 'MSADMIN', '1616478937', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2026-01-02 16:57:22', NULL),
(125, 'MSADMIN', '2914546837', 'ADMIN', 'admin', '9705841670', 'ADMIN', '103.161.31.211', '2026-01-02 17:20:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wc_divisions`
--
ALTER TABLE `wc_divisions`
  ADD PRIMARY KEY (`wc_di_id`);

--
-- Indexes for table `wc_division_organizers`
--
ALTER TABLE `wc_division_organizers`
  ADD PRIMARY KEY (`wc_do_id`);

--
-- Indexes for table `wc_doctors`
--
ALTER TABLE `wc_doctors`
  ADD PRIMARY KEY (`wc_d_id`);

--
-- Indexes for table `wc_doctors_history`
--
ALTER TABLE `wc_doctors_history`
  ADD PRIMARY KEY (`wc_d_id_history`);

--
-- Indexes for table `wc_doctor_log`
--
ALTER TABLE `wc_doctor_log`
  ADD PRIMARY KEY (`wc_id`);

--
-- Indexes for table `wc_doctor_maping`
--
ALTER TABLE `wc_doctor_maping`
  ADD PRIMARY KEY (`wc_dm_id`);

--
-- Indexes for table `wc_dr_specialities`
--
ALTER TABLE `wc_dr_specialities`
  ADD PRIMARY KEY (`wc_drs_id`);

--
-- Indexes for table `wc_email_log`
--
ALTER TABLE `wc_email_log`
  ADD PRIMARY KEY (`wc_log_id`);

--
-- Indexes for table `wc_enrolled_participant_webinar`
--
ALTER TABLE `wc_enrolled_participant_webinar`
  ADD PRIMARY KEY (`wc_epw_id`);

--
-- Indexes for table `wc_enroll_webinar`
--
ALTER TABLE `wc_enroll_webinar`
  ADD PRIMARY KEY (`wc_ew_id`);

--
-- Indexes for table `wc_events`
--
ALTER TABLE `wc_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wc_events_settings`
--
ALTER TABLE `wc_events_settings`
  ADD PRIMARY KEY (`wc_ws_id`);

--
-- Indexes for table `wc_otp_validation`
--
ALTER TABLE `wc_otp_validation`
  ADD PRIMARY KEY (`wc_otp_id`);

--
-- Indexes for table `wc_participants`
--
ALTER TABLE `wc_participants`
  ADD PRIMARY KEY (`wc_p_id`);

--
-- Indexes for table `wc_queries`
--
ALTER TABLE `wc_queries`
  ADD PRIMARY KEY (`wc_q_id`);

--
-- Indexes for table `wc_sms_enroll`
--
ALTER TABLE `wc_sms_enroll`
  ADD PRIMARY KEY (`wc_sms_en_id`);

--
-- Indexes for table `wc_speciality_maping`
--
ALTER TABLE `wc_speciality_maping`
  ADD PRIMARY KEY (`wc_sm_id`);

--
-- Indexes for table `wc_technician_user`
--
ALTER TABLE `wc_technician_user`
  ADD PRIMARY KEY (`wc_du_id`);

--
-- Indexes for table `wc_themes`
--
ALTER TABLE `wc_themes`
  ADD PRIMARY KEY (`wc_tm_id`);

--
-- Indexes for table `wc_users`
--
ALTER TABLE `wc_users`
  ADD PRIMARY KEY (`wc_u_id`);

--
-- Indexes for table `wc_users_history`
--
ALTER TABLE `wc_users_history`
  ADD PRIMARY KEY (`wc_uh_id`);

--
-- Indexes for table `wc_users_log`
--
ALTER TABLE `wc_users_log`
  ADD PRIMARY KEY (`wc_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wc_divisions`
--
ALTER TABLE `wc_divisions`
  MODIFY `wc_di_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wc_division_organizers`
--
ALTER TABLE `wc_division_organizers`
  MODIFY `wc_do_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wc_doctors`
--
ALTER TABLE `wc_doctors`
  MODIFY `wc_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wc_doctors_history`
--
ALTER TABLE `wc_doctors_history`
  MODIFY `wc_d_id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wc_doctor_log`
--
ALTER TABLE `wc_doctor_log`
  MODIFY `wc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wc_doctor_maping`
--
ALTER TABLE `wc_doctor_maping`
  MODIFY `wc_dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wc_dr_specialities`
--
ALTER TABLE `wc_dr_specialities`
  MODIFY `wc_drs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `wc_email_log`
--
ALTER TABLE `wc_email_log`
  MODIFY `wc_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wc_enrolled_participant_webinar`
--
ALTER TABLE `wc_enrolled_participant_webinar`
  MODIFY `wc_epw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wc_enroll_webinar`
--
ALTER TABLE `wc_enroll_webinar`
  MODIFY `wc_ew_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wc_events`
--
ALTER TABLE `wc_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wc_events_settings`
--
ALTER TABLE `wc_events_settings`
  MODIFY `wc_ws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wc_otp_validation`
--
ALTER TABLE `wc_otp_validation`
  MODIFY `wc_otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wc_participants`
--
ALTER TABLE `wc_participants`
  MODIFY `wc_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wc_queries`
--
ALTER TABLE `wc_queries`
  MODIFY `wc_q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wc_sms_enroll`
--
ALTER TABLE `wc_sms_enroll`
  MODIFY `wc_sms_en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wc_speciality_maping`
--
ALTER TABLE `wc_speciality_maping`
  MODIFY `wc_sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `wc_technician_user`
--
ALTER TABLE `wc_technician_user`
  MODIFY `wc_du_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wc_themes`
--
ALTER TABLE `wc_themes`
  MODIFY `wc_tm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wc_users`
--
ALTER TABLE `wc_users`
  MODIFY `wc_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wc_users_history`
--
ALTER TABLE `wc_users_history`
  MODIFY `wc_uh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wc_users_log`
--
ALTER TABLE `wc_users_log`
  MODIFY `wc_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
