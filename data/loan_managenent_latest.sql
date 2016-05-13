-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 13, 2016 at 07:35 PM
-- Server version: 5.5.42
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_managenent`
--
CREATE DATABASE IF NOT EXISTS `loan_managenent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loan_managenent`;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `requested_amount` int(11) NOT NULL,
  `approved_amount` int(11) DEFAULT NULL,
  `remaining_amount` int(11) NOT NULL,
  `approved_date` bigint(20) DEFAULT NULL,
  `tenor` varchar(200) NOT NULL DEFAULT 'Not Approved Yet',
  `note` text,
  `status` varchar(255) NOT NULL DEFAULT 'Sent to the Department',
  `read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_guarantor`
--

CREATE TABLE `loan_guarantor` (
  `id` int(11) unsigned NOT NULL,
  `loan_id` int(11) NOT NULL,
  `guarantor_name` varchar(255) NOT NULL DEFAULT '',
  `relation` varchar(255) NOT NULL,
  `guarantor_contact_no` varchar(20) NOT NULL DEFAULT '',
  `guarantor_address` text
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `national_id` varchar(255) NOT NULL DEFAULT '',
  `student_id` varchar(255) NOT NULL,
  `student_cgpa` float NOT NULL,
  `completed_credits` int(11) NOT NULL,
  `last_semester` varchar(255) NOT NULL,
  `taken_credits` int(11) NOT NULL,
  `next_semester` varchar(255) NOT NULL,
  `previous_semester_gpa` float NOT NULL,
  `present_address` text,
  `permanent_address` text,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `user_id`, `firstname`, `lastname`, `national_id`, `student_id`, `student_cgpa`, `completed_credits`, `last_semester`, `taken_credits`, `next_semester`, `previous_semester_gpa`, `present_address`, `permanent_address`, `phone`) VALUES
(1, 1, 'Mohammad Fuad', 'Ahmed', '', '', 0, 0, '', 0, '', 0, '', '', '1111111');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `permission` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `permission`) VALUES
(1, 'Super Admin', 1),
(2, 'Student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `adjustment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `email_verification_status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification_code` varchar(20) DEFAULT '',
  `password_reset_code` varchar(20) DEFAULT '',
  `last_logged_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_time` bigint(20) DEFAULT NULL,
  `modified_time` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `email_verification_status`, `email_verification_code`, `password_reset_code`, `last_logged_in`, `created_time`, `modified_time`) VALUES
(1, 1, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'fuad.robi@gmail.com', 1, '123456', '', '0000-00-00 00:00:00', 1455195410, 1455195410);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_guarantor`
--
ALTER TABLE `loan_guarantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `loan_guarantor`
--
ALTER TABLE `loan_guarantor`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
