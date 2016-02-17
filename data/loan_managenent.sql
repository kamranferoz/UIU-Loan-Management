-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2016 at 05:31 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `approved_date` bigint(20) NOT NULL,
  `distribution_date` bigint(20) NOT NULL,
  `distribution_method` varchar(20) NOT NULL DEFAULT '',
  `installment_system` varchar(100) NOT NULL DEFAULT 'Monthly',
  `installment_amount` int(11) NOT NULL,
  `cycle_due_date` bigint(20) NOT NULL,
  `tenor` varchar(20) NOT NULL DEFAULT '2 Years',
  `note` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `user_id`, `amount`, `approved_date`, `distribution_date`, `distribution_method`, `installment_system`, `installment_amount`, `cycle_due_date`, `tenor`, `note`) VALUES
(1, 3, 100000, 1455195599, 1455195599, 'Cash', 'Monthly', 10000, 1455195599, '2 Years', 'Bukijuki');

-- --------------------------------------------------------

--
-- Table structure for table `loan_guarantor`
--

CREATE TABLE `loan_guarantor` (
  `id` int(11) unsigned NOT NULL,
  `loan_id` int(11) NOT NULL,
  `guarantor_name` varchar(255) NOT NULL DEFAULT '',
  `guarantor_contact_no` varchar(20) NOT NULL DEFAULT '',
  `guarantor_address` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_guarantor`
--

INSERT INTO `loan_guarantor` (`id`, `loan_id`, `guarantor_name`, `guarantor_contact_no`, `guarantor_address`) VALUES
(1, 1, 'Mohammad Loan Guarantor', '123456789', 'Bukijuki');

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
  `present_address` text,
  `parmanent_address` text,
  `fathername` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `user_id`, `firstname`, `lastname`, `national_id`, `present_address`, `parmanent_address`, `fathername`, `phone`) VALUES
(1, 1, 'Mohammad Fuad', 'Ahmed', 'Bukijuki', 'Bukijuki', 'Bukijuki', 'Mohammad Kamal Hossain', '123456789');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `type`, `date`, `loan_id`, `adjustment`) VALUES
(1, 100000, 'Debit', 1455195677, 1, 0),
(2, 10000, 'Credit', 1455195677, 1, 0),
(3, 1000, 'Credit', 1455195677, 1, 0),
(4, 20000, 'Credit', 1455195677, 1, 0);

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
  `email_verification_code` varchar(20) NOT NULL DEFAULT '',
  `password_reset_code` varchar(20) NOT NULL DEFAULT '',
  `last_logged_in` bigint(20) NOT NULL,
  `created_time` bigint(20) NOT NULL,
  `modified_time` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `email_verification_status`, `email_verification_code`, `password_reset_code`, `last_logged_in`, `created_time`, `modified_time`) VALUES
(1, 1, 'Fuad', '202cb962ac59075b964b07152d234b70', 'fuad.robi@gmail.com', 1, '123456', '', 1455195410, 1455195410, 1455195410),
(3, 2, 'Rowshan', '202cb962ac59075b964b07152d234b70', 'rowshan@gmail.com', 1, '', '', 1455721404, 1455721404, 1455721404);

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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_guarantor`
--
ALTER TABLE `loan_guarantor`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
