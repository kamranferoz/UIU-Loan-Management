-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2016 at 04:21 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loan_managenent`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE IF NOT EXISTS `loan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `approved_date` bigint(20) DEFAULT NULL,
  `distribution_date` bigint(20) DEFAULT NULL,
  `distribution_method` varchar(20) NOT NULL DEFAULT 'cash',
  `installment_system` varchar(100) NOT NULL DEFAULT 'Monthly',
  `installment_amount` int(11) NOT NULL,
  `cycle_due_date` bigint(20) DEFAULT NULL,
  `tenor` varchar(20) NOT NULL DEFAULT '2 Years',
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `user_id`, `amount`, `approved_date`, `distribution_date`, `distribution_method`, `installment_system`, `installment_amount`, `cycle_due_date`, `tenor`, `note`) VALUES
(1, 3, 100000, 1455195599, 1455195599, 'Cash', 'Monthly', 10000, 1455195599, '2 Years', 'Bukijuki'),
(2, 1, 100000, NULL, NULL, 'cash', 'Monthly', 16667, NULL, '6', 'For buying a car.'),
(3, 1, 100000, NULL, NULL, 'cash', 'Monthly', 16667, NULL, '6', 'For buying a car.');

-- --------------------------------------------------------

--
-- Table structure for table `loan_guarantor`
--

CREATE TABLE IF NOT EXISTS `loan_guarantor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `guarantor_name` varchar(255) NOT NULL DEFAULT '',
  `relation` varchar(255) NOT NULL,
  `guarantor_contact_no` varchar(20) NOT NULL DEFAULT '',
  `guarantor_address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loan_guarantor`
--

INSERT INTO `loan_guarantor` (`id`, `loan_id`, `guarantor_name`, `relation`, `guarantor_contact_no`, `guarantor_address`) VALUES
(1, 1, 'Mohammad Loan Guarantor', '', '123456789', 'Bukijuki'),
(2, 1, 'shamima', 'sister', '019100000000', 'House # 17; Road # 4, kaderabad housing ltd.'),
(3, 1, 'shamima', 'sister', '019100000000', 'House # 17; Road # 4, kaderabad housing ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `national_id` varchar(255) NOT NULL DEFAULT '',
  `student_id` varchar(255) NOT NULL,
  `student_cgpa` float NOT NULL,
  `present_address` text,
  `parmanent_address` text,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `user_id`, `firstname`, `lastname`, `national_id`, `student_id`, `student_cgpa`, `present_address`, `parmanent_address`, `phone`) VALUES
(1, 1, 'Mohammad Fuad', 'Ahmed', 'Bukijuki', '', 0, 'Bukijuki', 'Bukijuki', '123456789'),
(2, 1, 'Mohammad', 'Mainuddin', 'ssaf', '011111111', 3.25, 'House # 17; Road # 4, kaderabad housing ltd.', 'Mohammadpur', '01911111111'),
(3, 1, 'Mohammad', 'Mainuddin', 'ssaf', '011111111', 3.25, 'House # 17; Road # 4, kaderabad housing ltd.', 'Mohammadpur', '01911111111');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `adjustment` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `email_verification_status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification_code` varchar(20) DEFAULT '',
  `password_reset_code` varchar(20) DEFAULT '',
  `last_logged_in` bigint(20) DEFAULT NULL,
  `created_time` bigint(20) DEFAULT NULL,
  `modified_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `email_verification_status`, `email_verification_code`, `password_reset_code`, `last_logged_in`, `created_time`, `modified_time`) VALUES
(1, 1, 'Fuad', '202cb962ac59075b964b07152d234b70', 'fuad.robi@gmail.com', 1, '123456', '', 1455195410, 1455195410, 1455195410),
(3, 2, 'Rowshan', '202cb962ac59075b964b07152d234b70', 'rowshan@gmail.com', 1, '', '', 1455721404, 1455721404, 1455721404);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
