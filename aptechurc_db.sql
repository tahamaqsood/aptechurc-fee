-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 10:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptechurc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `level` varchar(150) NOT NULL,
  `total_amount` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`, `level`, `total_amount`, `date_created`) VALUES
(1, 'BCA', 'First year of BCA', '1', 6200, '2022-05-09 22:47:56'),
(2, 'Second year of BCA', 'This area for description', '2', 66600, '2022-05-16 17:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `course_id`, `description`, `amount`) VALUES
(1, 1, 'Tution Fee', 5000),
(2, 1, 'Uniform Fee', 1200),
(3, 2, 'Uniform Fee', 5000),
(4, 2, 'Tuition Fee', 56000),
(5, 2, 'Maintaince Fee', 600),
(6, 2, 'Security Deposit', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `ef_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FULL_NAME` varchar(50) NOT NULL,
  `FEE_HEAD` varchar(50) NOT NULL,
  `PAYMENT_MODE` varchar(50) NOT NULL,
  `AMOUNT_IN_WORDS` varchar(50) NOT NULL,
  `Month_Of_Payment` varchar(50) NOT NULL,
  `CHEQUE_NO` varchar(50) NOT NULL,
  `TIMINGS` varchar(50) NOT NULL,
  `INPUTTER` varchar(50) NOT NULL,
  `Receipt_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ef_id`, `amount`, `remarks`, `date_created`, `FULL_NAME`, `FEE_HEAD`, `PAYMENT_MODE`, `AMOUNT_IN_WORDS`, `Month_Of_Payment`, `CHEQUE_NO`, `TIMINGS`, `INPUTTER`, `Receipt_no`) VALUES
(1, 1, 6000, 'paid', '2022-08-20 13:34:50', 'Rameez Ali Baig', 'WEB DESIGNING', 'Cash', 'Six Thousand Only', 'January', '-', '3:00 TO 5:00 (MWF)', 'Taha Maqsood', 1),
(2, 2, 4800, 'paid', '2022-08-20 13:35:09', 'Tayyaba Noor', 'PHP MYSQL', 'Cash', 'Four Thousand & Eight Hundred Only', 'February', '-', '11:00 TO 1:00 (TTS)', 'Taha Maqsood', 2),
(3, 7, 6000, 'paid', '2022-09-20 13:37:07', 'Babar Azam', 'HARWARE PROFESSIONAL', 'Cash', 'Six Thousand', 'March', '-', '7:00 TO 9:00 (MWF)', 'Taha Maqsood', 3),
(4, 7, 6000, 'paid', '2022-08-20 13:38:38', 'Babar Azam', 'HARWARE PROFESSIONAL', 'Cash', 'Six Thousand', 'February', '-', '7:00 TO 9:00 (MWF)', 'Taha Maqsood', 4),
(5, 5, 4800, 'paid', '2022-08-20 13:56:30', 'Haider', 'HARWARE PROFESSIONAL', 'Cheque', 'Four Thousand & Eight Hundred Only', 'November', '-', '7:00 TO 9:00 (MWF)', 'Taha Maqsood', 5),
(6, 11, 4800, 'Paid', '2022-08-20 17:59:32', 'Taha Maqsood', 'ACCP REGISTRATION', 'Cash', ' Four Thousand Eight Hundred ', 'May', '-', '11:00 TO 1:00 (TTS)', 'Taha Maqsood', 6),
(7, 11, 4800, 'Paid', '2022-08-20 18:35:11', 'Taha Maqsood', 'ACCP REGISTRATION', 'Cash', ' Four Thousand Eight Hundred ', 'March', '-', '11:00 TO 1:00 (TTS)', 'Taha Maqsood', 7),
(8, 1, 6000, 'Paid', '2022-08-20 18:40:51', 'Rameez Ali Baig', 'WEB DESIGNING', 'Cash', 'Six Thousand Only', 'July', '-', '3:00 TO 5:00 (MWF)', 'Taha Maqsood', 8),
(9, 11, 4800, 'Paid', '2022-08-20 18:43:53', 'Taha Maqsood', 'ACCP REGISTRATION', 'Cash', ' Four Thousand Eight Hundred ', 'April', '-', '11:00 TO 1:00 (TTS)', 'Taha Maqsood', 9),
(10, 9, 6000, 'fee', '2022-08-20 21:04:12', 'fatima', 'MICROSOFT.NET', 'Cash', 'Six thousand', 'October', '-', '9:00 TO 11:00 (MWF)', 'Taha Maqsood', 10),
(11, 11, 4800, 'Tution fees', '2022-08-21 00:43:24', 'Taha Maqsood', 'ACCP REGISTRATION', 'Cash', ' Four Thousand Eight Hundred ', 'August', '-', '11:00 TO 1:00 (TTS)', 'Taha Maqsood', 11);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(30) NOT NULL,
  `id_no` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `timings` varchar(200) NOT NULL,
  `course` varchar(50) NOT NULL,
  `admission_fee` bigint(20) NOT NULL,
  `monthly_fee` bigint(20) NOT NULL,
  `amount_in_words` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `id_no`, `name`, `father_name`, `contact`, `address`, `email`, `timings`, `course`, `admission_fee`, `monthly_fee`, `amount_in_words`, `date_created`) VALUES
(1, 1, 'Rameez Ali Baig', 'Ali Baig', '9090909090', 'North Nazimabad, Karachi', 'rameez@gmail.com', '3:00 TO 5:00 (MWF)', 'WEB DESIGNING', 16000, 6000, 'Six Thousand Only', '2022-05-09 22:47:02'),
(2, 2, 'Tayyaba Noor', '-', '8090809090', 'Plot No.8, Galaxy Heights, behind Metro Mall, Shivaji Nagar, Pune', 'tayyaba@gmail.com', '11:00 TO 1:00 (TTS)', 'PHP MYSQL', 13000, 4800, 'Four Thousand & Eight Hundred Only', '2022-05-16 17:11:16'),
(3, 3, 'Shahzaib Khan', 'Saleem Khan', '654987152', 'Basera Towers, Block 17 , Gulistan - E - Johar', 'sk@gmail.com', '11:00 TO 1:00 (MWF)', 'C++', 14000, 5000, 'Five Thousand Only', '2022-06-26 15:33:18'),
(4, 4, 'Umer Hameed', 'Abdul Hameed', '15665785', 'Safari Sunlay Cottage House R-33, Near Safoora Chorangi\r\nSafari Sunlay Cottages', 'umeradsolution@gmail.com', '7:00 TO 9:00 (MWF)', 'AMAZON', 14000, 5500, 'Five Thousand & Five Hundred Only', '2022-06-26 15:35:08'),
(6, 6, 'Usama Rajpoot', 'Sadiq Rajpoot', '123645', 'Gd Road, Lahore', 'usama@gmail.com', '11:00 TO 1:00 (MWF)', 'PYTHON', 12000, 6000, 'Six Thousand Only', '2022-08-12 19:51:59'),
(7, 7, 'Babar Azam', 'Azam Khan', '6589551', 'DHA Phase 7, Karachi       ', 'babar@gmail.com', '7:00 TO 9:00 (MWF)', 'HARWARE PROFESSIONAL', 20000, 6000, 'Six Thousand', '2022-08-12 20:28:24'),
(8, 8, 'Taha', 'Maqsood Ali', '03052236744', 'House 51, Block i, Cantt bazar, Malir Cantt, Karachi.', 'ttaha8507@gmail.com', '11:00 TO 1:00 (TTS)', 'ACCP REGISTRATION', 8000, 4800, '', '2022-08-15 21:43:37'),
(9, 5, 'Haider', 'Bajwa', '03002115689', 'house 81, block e, cantt bazar, malir cantt, karachi', 'haiderbajwa@gmail.com', '7:00 TO 9:00 (MWF)', 'HARWARE PROFESSIONAL', 6000, 4800, 'Four Thousand & Eight Hundred Only', '2022-08-15 21:46:53'),
(11, 9, 'fatima', 'ahemed', '1211221121', 'waffwa', 'fatima123@gmail.com', '9:00 TO 11:00 (MWF)', 'MICROSOFT.NET', 10000, 6000, 'Six thousand', '2022-08-20 12:38:11'),
(12, 10, 'Sahil Khan', 'Khan', '7893265', 'Gulshan, Karachi', 'sahil@gmail.com', '7:00 TO 9:00 (MWF)', 'C#', 20000, 5000, ' Five Thousand', '2022-08-20 13:17:13'),
(13, 11, 'Taha Maqsood', 'Maqsood Ali', '+92 3052236744', 'House 51, Block-i, Cantt bazar. Malir cantt karachi.', 'ttaha8507@gmail.com', '11:00 TO 1:00 (TTS)', 'ACCP REGISTRATION', 10000, 4800, ' Four Thousand Eight Hundred ', '2022-08-20 17:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_ef_list`
--

CREATE TABLE `student_ef_list` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `ef_no` varchar(200) NOT NULL,
  `course_id` int(30) NOT NULL,
  `total_fee` float NOT NULL,
  `AMOUNT_IN_WORDS` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_ef_list`
--

INSERT INTO `student_ef_list` (`id`, `student_id`, `ef_no`, `course_id`, `total_fee`, `AMOUNT_IN_WORDS`, `date_created`) VALUES
(1, 1, '1', 1, 6000, 'Six Thousand Only', '2022-05-09 22:48:20'),
(2, 2, '2', 2, 4800, 'Four Thousand & Eight Hundred Only', '2022-05-16 17:13:25'),
(3, 3, '3', 2, 5000, 'Five Thousand Only', '2022-07-25 16:15:50'),
(4, 4, '4', 1, 5500, 'Five Thousand & Five Hundred Only', '2022-07-25 16:15:50'),
(5, 5, '5', 1, 6200, '', '2022-08-10 21:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Taha Maqsood', 'tahamaqsood@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1),
(2, 'Usman Hameed', 'usman@123', 'fa6ccb3b3e3f8685bd560c45df178411', 1),
(4, 'Asghar Ali', 'asghar123', '518ed29525738cebdac49c49e60ea9d3', 2),
(5, 'Sadia', 'sadia', '518ed29525738cebdac49c49e60ea9d3', 2),
(6, 'Luqman', 'luqman', '9033e0e305f247c0c3c80d0c7848c8b3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Receipt_no` (`Receipt_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_no` (`id_no`);

--
-- Indexes for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
