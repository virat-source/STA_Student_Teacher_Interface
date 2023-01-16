-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 12:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sta`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule_info`
--

CREATE TABLE `class_schedule_info` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `subject` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`) VALUES
(1, 'Basic Course', 'As described in CFR'),
(4, 'Advanced Course', 'As described in CFR');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(30) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `id_no`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `address`, `email`, `password`) VALUES
(1, '06232014', 'John', 'C', 'Smith', '+18456-5455-55', 'Male', 'Sample Address', 'jsmith@sample.com', 'admin123'),
(3, '70301612', 'Virat', '', 'Vaid', '123456', 'Male', 'test', 'virat@virat.com', ''),
(6, '007', 'John', 'Benjamin', 'Mcnair', '1234567890', 'Male', 'Test, test City,12345', 'test@test.com', ''),
(8, '001', 'Anthony', '', 'Martinez', '5629723095', 'Male', '', 'anthony.martinez@sourceta.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(10) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `transaction`, `user_id`, `date_added`) VALUES
(26, 'logged out', 1, '2022-12-20 09:49:42'),
(27, 'logged in', 1, '2022-12-20 09:49:43'),
(28, 'printed Rohan Vaid permanent record', 1, '2022-12-20 10:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `hours_logged`
--

CREATE TABLE `hours_logged` (
  `id` int(255) NOT NULL,
  `instructor` varchar(100) NOT NULL,
  `Student` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Hours` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hours_logged`
--

INSERT INTO `hours_logged` (`id`, `instructor`, `Student`, `subject`, `Hours`) VALUES
(0, 'Mcnair, John Benjamin', 'Virat - Vaid 2', 'Outside Pre-trip: Form - A', 8);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `ID` int(255) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `emp_id` int(3) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`ID`, `first_name`, `last_name`, `gender`, `address`, `email`, `emp_id`, `password`) VALUES
(1, 'Virat', 'Vaid', 'Male', 'Test', 'test@test.com', 0, 'admin123'),
(4, 'Cody', 'Barker', 'male', 'test', 'test@test.com', 2, 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `log_tb`
--

CREATE TABLE `log_tb` (
  `id` int(3) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `Instructor` varchar(255) NOT NULL,
  `Student` varchar(255) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject` int(10) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `log_tb`
--

INSERT INTO `log_tb` (`id`, `dt`, `Instructor`, `Student`, `subject_name`, `subject`, `Remarks`, `grade`) VALUES
(2067, '2022-12-27 11:37:43', 'Mcnair, John Benjamin', 'Virat  Vaid', 'Air Brake Test', 1, 'He did ok', 'passed'),
(2068, '2022-12-27 15:07:34', 'Mcnair, John Benjamin', '1', 'Air Brake Test', 1, 'He failed', 'failed'),
(2069, '2022-12-27 15:37:37', 'Mcnair, John Benjamin', 'Virat  Vaid', 'Air Brake Test', 1, 'he did ok', 'passed'),
(2070, '2022-12-27 16:04:59', 'Mcnair, John Benjamin', 'John C Smith', 'Air Brake Check', 1, 'He passed', 'passed'),
(2072, '2022-12-27 16:35:27', 'Mcnair, John Benjamin', 'Virat  Vaid', 'Cab', 2, 'He did well', 'passed'),
(2073, '2022-12-27 16:48:11', 'Mcnair, John Benjamin', 'Virat  Vaid', 'FORM A - Front of Vehicle', 1, 'he failed', 'failed'),
(2074, '2022-12-27 16:59:00', 'Mcnair, John Benjamin', 'Cody  Barker', 'Engine Compartment', 1, 'He did well', 'passed'),
(2075, '2022-12-27 17:42:06', 'Mcnair, John Benjamin', 'John C Smith', 'Brake Tests', 1, 'He did well', 'passed'),
(2076, '2022-12-28 09:42:19', 'Mcnair, John Benjamin', 'John C Smith', 'Front Axle', 1, 'He needs to brush up on this subject', 'passed'),
(2077, '2022-12-28 09:43:27', 'Mcnair, John Benjamin', 'John C Smith', 'Front Axle', 1, 'He needs to do better', 'failed'),
(2078, '2022-12-28 09:53:50', 'Mcnair, John Benjamin', 'John  Doe', 'Form B: Fuel Area, Side, and Under', 1, 'He needs to brush up', 'failed'),
(2079, '2022-12-28 10:00:19', 'Mcnair, John Benjamin', 'John C Smith', 'Form B: Under Vehicle (Inspect from the side)', 1, 'He did ok', 'failed'),
(2080, '2022-12-28 10:56:50', 'Mcnair, John Benjamin', 'Cody  Barker', 'Cab', 1, 'He kicked ass', 'passed'),
(2081, '2022-12-28 12:19:30', 'Mcnair, John Benjamin', 'John C Smith', 'Air Brake Test', 1, 'ASWEDW', 'failed'),
(2082, '2022-12-29 17:10:56', 'Mcnair, John Benjamin', 'John C Smith', 'Cab', 1, 'He did well', 'passed'),
(2083, '2022-12-29 17:18:32', 'Mcnair, John Benjamin', 'John C Smith', 'Form B: Fuel Area Side and Under', 1, 'Pass', 'passed'),
(2084, '2022-12-29 17:18:44', 'Mcnair, John Benjamin', 'John C Smith', 'Form B: Fuel Area Side and Under', 1, 'Pass', 'passed'),
(2085, '2023-01-02 09:39:56', 'Martinez, Anthony ', 'Cody  Barker', 'Air Brake Check', 1, 'Students ', 'failed'),
(2086, '2023-01-02 14:21:04', 'Mcnair, John Benjamin', 'Cody  Barker', 'Brake Tests', 1, 'Student did well until air brake ', 'failed'),
(2087, '2023-01-02 14:27:28', 'Mcnair, John Benjamin', 'John C Smith', 'Cab', 1, 'Bad guy', 'failed'),
(2088, '2023-01-03 14:50:24', 'Martinez, Anthony ', 'Virat  Vaid', 'Cab', 1, 'H5gb', 'failed'),
(2089, '2023-01-03 15:02:21', 'Martinez, Anthony ', 'John C Smith', 'Form B: Fuel Area, Side, and Under', 1, 'Need to specify more on fuel tank ', 'passed'),
(2090, '2023-01-03 15:05:46', 'Martinez, Anthony ', 'Virat  Vaid', 'Form B: Fuel Area, Side, and Under', 1, 'Test', 'failed'),
(2091, '2023-01-05 11:26:36', 'Mcnair, John Benjamin', 'Virat  Vaid', 'Inside Inspection', 1, 'He did ok, needs more work on air brakes', 'passed'),
(2092, '2023-01-05 13:21:11', 'Mcnair, John Benjamin', 'Virat  Vaid', 'Outside Pre-trip: Form - A', 2, 'He did ok, needs to brush up on some subjects', 'passed');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `schedule_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= class, 2= meeting,3=others',
  `description` text NOT NULL,
  `location` text NOT NULL,
  `is_repeating` tinyint(1) NOT NULL DEFAULT 1,
  `repeating_data` text NOT NULL,
  `schedule_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `faculty_id`, `title`, `schedule_type`, `description`, `location`, `is_repeating`, `repeating_data`, `schedule_date`, `time_from`, `time_to`, `date_created`) VALUES
(11, 0, 'Class A Training ', 1, 'Hourly Class A training ', 'Corona ', 0, '', '2023-01-02', '07:00:00', '08:00:00', '2023-01-02 12:42:30'),
(12, 0, 'Class A Training ', 1, 'Hourly Class A training ', 'Corona ', 0, '', '2023-01-02', '08:00:00', '09:00:00', '2023-01-02 12:43:20'),
(13, 0, 'Class A Training ', 1, 'Hourly Class A training ', 'Corona ', 0, '', '2023-01-02', '09:00:00', '10:00:00', '2023-01-02 12:44:10'),
(14, 0, 'Class A Training ', 1, 'Hourly Class A training ', 'Corona', 0, '', '2023-01-02', '09:00:00', '10:00:00', '2023-01-02 13:01:07'),
(15, 6, 'Class A Training', 2, 'test', 'test', 0, '', '2023-01-03', '09:00:00', '11:00:00', '2023-01-02 13:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` int(11) NOT NULL,
  `schedule` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `instructor` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `training_type` varchar(100) NOT NULL,
  `grade` int(10) NOT NULL,
  `hours` int(2) NOT NULL,
  `final` varchar(10) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `schedule`, `name`, `instructor`, `subject`, `training_type`, `grade`, `hours`, `final`, `time`) VALUES
(65, 11, 'Virat  Vaid', 'Mcnair, John Benjamin', 'In-cab Pre-trip', 'Behind the Wheel - Range', 8, 1, 'passed', '2023-01-02 20:45:12.000000'),
(66, 12, 'John C Smith', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 8, 1, 'passed', '2023-01-04 02:16:46.000000'),
(67, 12, 'Virat  Vaid', 'Mcnair, John Benjamin', 'Railroad (RR)-Highway Grade Crossing', 'Behind the Wheel - Public Roads', 8, 1, 'passed', '2023-01-04 06:47:04.000000'),
(68, 13, 'John C Smith', 'Mcnair, John Benjamin', 'Straight Line Backing', 'Behind the Wheel - Range', 7, 1, 'failed', '2023-01-02 20:53:19.000000'),
(69, 13, 'Virat  Vaid', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 9, 1, 'passed', '2023-01-02 20:53:54.000000'),
(70, 13, 'Virat  Vaid', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 9, 1, 'passed', '2023-01-02 20:55:44.000000'),
(71, 13, 'Cody  Barker', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 9, 1, 'passed', '2023-01-02 20:56:18.000000'),
(72, 13, 'John  Doe', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 9, 1, 'passed', '2023-01-02 20:57:56.000000'),
(73, 12, 'John C Smith', 'Martinez, Anthony ', 'Railroad (RR)-Highway Grade Crossing', 'Behind the Wheel - Public Roads', 9, 1, 'passed', '2023-01-02 21:54:59.000000'),
(74, 11, 'John C Smith', 'Mcnair, John Benjamin', 'Hazard Perception', 'Behind the Wheel - Public Roads', 7, 1, 'failed', '2023-01-02 22:13:28.000000'),
(75, 11, 'Virat  Vaid', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 9, 1, 'passed', '2023-01-02 22:16:56.000000'),
(76, 11, 'John C Smith', 'Mcnair, John Benjamin', 'Hours of Service (HOS) Requirements', 'Behind the Wheel - Public Roads', 8, 1, 'passed', '2023-01-02 22:17:20.000000'),
(77, 11, 'John C Smith', 'Mcnair, John Benjamin', 'Hours of Service (HOS) Requirements', 'Behind the Wheel - Public Roads', 8, 1, 'passed', '2023-01-02 22:17:21.000000'),
(78, 11, 'John C Smith', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 7, 1, 'failed', '2023-01-02 22:28:43.000000'),
(79, 15, 'Virat  Vaid', 'Mcnair, John Benjamin', 'Speed and Space Management', 'Behind the Wheel - Range', 10, 1, 'passed', '2023-01-06 03:18:51.000000'),
(80, 12, 'John C Smith', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 7, 1, 'failed', '2023-01-03 19:35:47.000000'),
(81, 12, 'John C Smith', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 7, 1, 'failed', '2023-01-03 19:35:50.000000'),
(82, 12, 'John C Smith', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 8, 1, 'passed', '2023-01-03 19:35:54.000000'),
(83, 12, 'John C Smith', 'Mcnair, John Benjamin', 'Inside Inspection', 'Behind the Wheel - Range', 9, 1, 'passed', '2023-01-03 19:35:58.000000'),
(84, 12, 'Virat  Vaid', 'Martinez, Anthony ', 'Straight Line Backing', 'Behind the Wheel - Range', 7, 1, 'failed', '2023-01-03 22:46:50.000000'),
(85, 12, 'Virat  Vaid', 'Martinez, Anthony ', 'Alley Dock Backing (45/90 Degree)', 'Behind the Wheel - Range', 8, 1, 'passed', '2023-01-03 22:47:37.000000'),
(86, 12, 'Cody  Barker', 'Mcnair, John Benjamin', 'Railroad (RR)-Highway Grade Crossing', 'Behind the Wheel - Public Roads', 2, 1, 'failed', '2023-01-05 18:30:19.000000'),
(87, 11, 'John C Smith', 'Mcnair, John Benjamin', 'Straight Line Backing', 'Behind the Wheel - Range', 10, 1, 'passed', '2023-01-05 19:45:59.000000');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `STUDENT_ID` int(50) NOT NULL,
  `LRN_NO` varchar(15) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `MIDDLENAME` varchar(30) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PROGRAM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`STUDENT_ID`, `LRN_NO`, `LASTNAME`, `FIRSTNAME`, `MIDDLENAME`, `GENDER`, `PROGRAM`) VALUES
(1, '12345648', 'Smith', 'John', 'C', 'MALE', '1'),
(2, '12345', 'Vaid', 'Virat', '', 'MALE', '1'),
(8, '', 'Barker', 'Cody', '', 'MALE', '1'),
(18, '', 'Doe', 'John', '', 'Male', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(30) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fmcsa_code` varchar(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type`, `fmcsa_code`, `category`, `description`) VALUES
(1, 'Inside Inspection', 'Inspection', 'A2.1', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.'),
(2, 'Outside Pre-trip: Form - A', 'Inspection', 'A2.1', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.'),
(3, 'Outside Pre-trip: Form - B', 'Inspection', 'A2.1', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.'),
(4, 'Outside Pre-trip: Form - C', 'Inspection', 'A2.1', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.'),
(5, 'Outside Pre-trip: Coupling', 'Inspection', 'A2.1', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.'),
(6, 'In-cab Pre-trip', 'Inspection', 'A2.1', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in conducting pre-trip and post-trip inspections as specified in §§ 392.7 and 396.11, including appropriate inspection locations. Instruction must also be provided on enroute vehicle inspections.'),
(7, 'Straight Line Backing', 'Skill', 'A2.2', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in proper techniques for performing various straight line backing maneuvers to appropriate criteria/acceptable tolerances.'),
(8, 'Alley Dock Backing (45/90 Degree)', 'Skill', 'A2.3', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in proper techniques for performing 45/90 degree alley dock maneuvers to appropriate criteria/acceptable tolerances.'),
(9, 'Off-Set Backing', 'Skill', 'A2.4', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in proper techniques for performing off-set right and left backing maneuvers to appropriate criteria/acceptable tolerances.'),
(10, 'Parallel Parking Blind Side', 'Drive Training', 'A3.3', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in proper techniques for performing parallel parking blind side positions/maneuvers to appropriate criteria/acceptable tolerances.'),
(11, 'Parallel Parking Sight Side', 'Skill', 'A2.6', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in proper techniques for performing sight side parallel parking maneuvers to appropriate criteria/acceptable tolerances.'),
(12, 'Coupling and Uncoupling ', 'Lab', 'A2.7', 'Behind the Wheel - Range', 'Driver-trainees must demonstrate proficiency in proper techniques for coupling, inspecting, and uncoupling combination vehicle units, as applicable.'),
(13, 'Vehicle Controls (Turns)', 'Drive Training', 'A3.1', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in proper techniques for initiating vehicle movement, executing left and right turns, changing lanes, navigating curves at speed, entry and exit on the interstate or controlled access highway, and stopping the vehicle in a controlled manner.'),
(14, 'Shifting/Transmission', 'Drive Training', 'A3.2', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in proper techniques for performing safe and fuel-efficient shifting.'),
(15, 'Communications/Signaling', 'Skill', 'A3.3', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in proper techniques for signaling intentions and effectively communicating with other drivers.'),
(16, 'Visual Search', 'Drive Training', 'A3.4', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in proper techniques for visually searching the road for potential hazards and critical objects.'),
(17, 'Speed and Space Management', 'Drive Training', 'A3.5', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in proper habits and techniques for adjusting and maintaining vehicle speed, taking into consideration various factors such as traffic and road conditions.'),
(18, 'Safe Driver Behavior', 'Drive Training', 'A3.6', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate proficiency in safe driver behavior during their operation of the CMV.'),
(19, 'Hours of Service (HOS) Requirements', 'Lab', 'A3.7', 'Behind the Wheel - Public Roads', 'Time sheet and Driver Logs.'),
(20, 'Hazard Perception', 'Drive Training', 'A3.8', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate their ability to recognize potential hazards in the driving environment in time to reduce the severity of the hazard and neutralize possible emergency situations. Driver-trainees must demonstrate the ability to identify road conditions and other road users that are a potential threat to the safety of the combination vehicle and suggest appropriate adjustments.'),
(21, 'Railroad (RR)-Highway Grade Crossing', 'Drive Training', 'A3.9', 'Behind the Wheel - Public Roads', 'Driver-trainees must demonstrate the ability to recognize potential dangers and to demonstrate appropriate safety procedures when RR-highway grade crossings are reasonably available.'),
(22, 'Night Operation', 'Drive Training', 'A3.10', 'Behind the Wheel - Public Roads', 'Driver-trainees must be familiar with how to operate a CMV safely at night. Training providers must teach driver-trainees that night driving presents specific circumstances that require heightened attention on the part of the driver. Driver-trainees must be taught special requirements for night vision, communications, speed, space management, and proper use of lights.'),
(23, 'Extreme Driving Conditions', 'Drive Training', 'A3.11', 'Behind the Wheel - Public Roads', 'Driver-trainees must be familiar with the special risks created by, and the heightened precautions required by, driving CMVs under extreme driving conditions, such as heavy rain, high wind, high heat, fog, snow, ice, steep grades, and sharp curves. Driver-trainees must demonstrate their ability to recognize the changes in basic driving habits needed to deal with the specific challenges presented by these extreme driving conditions.'),
(24, 'Skid Control/Recovery, Jackknifing, and Other Emergencies', 'Drive Training', 'A3.12', 'Behind the Wheel - Public Roads', 'Driver-trainees must know the causes of skidding and jackknifing and techniques for avoiding and recovering from them. Driver-trainees must know how to maintain directional control and bring the CMV to a stop in the shortest possible distance while operating over a slippery surface. Driver-trainees must be familiar with proper techniques for responding to CMV emergencies, such as evasive steering, emergency braking, and off-road recovery. They must also know how to prevent or respond to brake failures, tire blowouts, hydroplaning, and rollovers.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_schedule_info`
--
ALTER TABLE `class_schedule_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `hours_logged`
--
ALTER TABLE `hours_logged`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log_tb`
--
ALTER TABLE `log_tb`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule` (`schedule`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_schedule_info`
--
ALTER TABLE `class_schedule_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_tb`
--
ALTER TABLE `log_tb`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2093;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `STUDENT_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_tb`
--
ALTER TABLE `log_tb`
  ADD CONSTRAINT `log_tb_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_ibfk_1` FOREIGN KEY (`schedule`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
