-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2016 at 04:33 PM
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
  `requested_amount` int(11) NOT NULL,
  `approved_amount` int(11) DEFAULT NULL,
  `approved_date` bigint(20) DEFAULT NULL,
  `distribution_date` bigint(20) DEFAULT NULL,
  `distribution_method` varchar(20) NOT NULL DEFAULT 'cash',
  `installment_system` varchar(100) NOT NULL DEFAULT 'Monthly',
  `installment_amount` int(11) NOT NULL,
  `cycle_due_date` bigint(20) DEFAULT NULL,
  `tenor` varchar(20) NOT NULL DEFAULT '2 Years',
  `note` text,
  `status` varchar(255) NOT NULL DEFAULT 'Sent to the Department',
  `read` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `user_id`, `requested_amount`, `approved_amount`, `approved_date`, `distribution_date`, `distribution_method`, `installment_system`, `installment_amount`, `cycle_due_date`, `tenor`, `note`, `status`, `read`) VALUES
(1, 3, 100000, 75000, 1459613034, 1455195599, 'Cash', 'Monthly', 10000, 1455195599, '2 Years', 'Bukijuki', 'Approved', 1),
(2, 4, 100000, NULL, 1455195599, 1455195599, 'cash', 'Monthly', 16667, NULL, '6', 'For buying a car.', 'Approved', 0),
(3, 5, 100000, NULL, 1459125965, NULL, 'cash', 'Monthly', 16667, NULL, '6', 'For buying a car.', 'Approved', 0),
(4, 6, 50000, NULL, NULL, NULL, 'cash', 'Monthly', 12500, NULL, '4', 'For personal business.', 'Sent to the Department', 1),
(5, 7, 100000, NULL, NULL, NULL, 'cash', 'Monthly', 16667, NULL, '6', 'for starting business.', 'Sent to the Department', 0),
(6, 8, 10000000, NULL, NULL, NULL, 'cash', 'Monthly', 833333, NULL, '12', 'For buying a BMW Z8 car.', 'Sent to the Department', 0),
(7, 9, 500, 50, 1459613347, NULL, 'cash', 'Monthly', 125, NULL, '4', 'For buying Dairy Milk chocolate.', 'Approved', 1),
(8, 10, 50000, NULL, NULL, NULL, 'cash', 'Monthly', 12500, NULL, '4', 'For Semester Fee.', 'Sent to the Department', 1),
(9, 11, 60000, NULL, NULL, NULL, 'cash', 'Monthly', 10000, NULL, '6', 'For semester fee.', 'Sent to the Department', 0),
(10, 12, 40000, NULL, NULL, NULL, 'cash', 'Monthly', 6667, NULL, '6', 'For buying project instrument.', 'Sent to the Department', 1),
(11, 13, 80000, NULL, NULL, NULL, 'cash', 'Monthly', 6667, NULL, '12', 'for startup a business.', 'Sent to the Department', 0),
(12, 14, 100100, NULL, NULL, NULL, 'cash', 'Monthly', 16683, NULL, '6', 'For medical aid', 'Sent to the Department', 0),
(13, 15, 20000, NULL, NULL, NULL, 'cash', 'Monthly', 3333, NULL, '6', 'Apartment rent', 'Sent to the Department', 0),
(14, 16, 50000, NULL, 1459260745, NULL, 'cash', 'Monthly', 8333, NULL, '6', 'Thesis purpose.', 'Approved', 0),
(17, 17, 500000, NULL, NULL, NULL, 'cash', 'Monthly', 125000, NULL, '4 Months', 'Going to other university to study', 'Sent to the Department', 0),
(18, 18, 1000000, NULL, NULL, NULL, 'cash', 'Monthly', 250000, NULL, '4 Months', 'Going to Canada', 'Paid in full', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `loan_guarantor`
--

INSERT INTO `loan_guarantor` (`id`, `loan_id`, `guarantor_name`, `relation`, `guarantor_contact_no`, `guarantor_address`) VALUES
(1, 1, 'Mohammad Loan Guarantor', '', '123456789', 'Bukijuki'),
(2, 2, 'shamima', 'sister', '019100000000', 'House # 17; Road # 4, kaderabad housing ltd.'),
(3, 3, 'shamima', 'sister', '019100000000', 'House # 17; Road # 4, kaderabad housing ltd.'),
(4, 4, 'Arbab''s guardian', 'father', '02xxxxxxxx1', 'Guardian''s Present Address 1'),
(5, 5, 'Alam''s guardian', 'mother', '02xxxxxxxx2', 'Guardian''s present address 2'),
(6, 6, 'Ishteaque''s guardian', 'father', '02xxxxxxxx3', 'Guardian present address 3'),
(7, 7, 'Fuad''s Guardian', 'brother', '02xxxxxxxx4', 'Guardian''s Present Address 4'),
(8, 8, 'Sujon''s Guardian', 'father', '02xxxxxxxx5', 'Guardian''s Present Address 5'),
(9, 9, 'karim''s guardian', 'sister', '019100000000', 'kustia'),
(10, 10, 'zahirul''s guardian', 'father', '02xxxxxxxx7', 'Barishal'),
(11, 11, 'Tutul''s guardian', 'father', '02xxxxxxxxxxxxxxxx8', 'gazipur'),
(12, 12, 'Shabu''s guardian', 'father', '011000000', '255, Dhanmodi Dhaka-1205'),
(13, 13, 'ali''s guardian', 'father', '012222222', '55 mk road jessore'),
(14, 14, 'Anwer''s guardian', 'father', '123465678', 'New york'),
(17, 17, 'None', 'father', '54654564', 'Buki Juki'),
(18, 18, 'Faisal', 'father', '234543534', 'asdfsadf');

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
  `permanent_address` text,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `user_id`, `firstname`, `lastname`, `national_id`, `student_id`, `student_cgpa`, `present_address`, `permanent_address`, `phone`) VALUES
(1, 1, 'Mohammad Fuad', 'Ahmed', 'Bukijuki', '', 0, 'Bukijuki', 'Bukijuki', '01912453679'),
(2, 3, 'Rowshan Ahmed', 'Batool', 'ssaf', '011111111', 3.25, 'House # 17; Road # 4, kaderabad housing ltd.', 'Mohammadpur', '01911111111'),
(3, 4, 'Arbab', 'Khan', 'bukijuki 1', '011000001', 3.85, 'Address 1', 'Permanent Address 1', '01xxxxxxxx1'),
(4, 5, 'Mohaiminul', 'Alam', 'bukijuki 2', '011000002', 3.5, 'Address 1', 'Permanent Address 2', '01xxxxxxxx2'),
(5, 6, 'Ishteaque', 'Alam', 'bukijuki 3', '011000003', 3.73, 'Address 3', 'Permanent address 3', '01xxxxxxxx3'),
(6, 7, 'Fuad Ahmed', 'Robi', 'bukijuki 4', '011000004', 3.8, 'Address 4', 'Mohammadpur', '01xxxxxxxx4'),
(7, 8, 'Sujon', 'Ahmed', 'bukijuki 5', '011000005', 2.6, 'Dhanmondi', 'Dhanmondi', '01xxxxxxxx5'),
(8, 9, 'Karim', 'Uddin', 'bukijuki 6', '011000006', 3.2, 'Mirpur 1', 'Mirpur', '01xxxxxxxxx6'),
(9, 10, 'Zahirul', 'Islam', 'bukijuki 7', '011000007', 3.6, 'japan Garden City', 'Barishal', '01xxxxxxxx7'),
(10, 11, 'Tutul', 'ahmed', 'bukijuki 8', '011000008', 2.9, 'arambag', 'jessor', '01xxxxxxxxxxxxxxxx8'),
(11, 12, 'Habibur Rahman', 'Shabu', 'bukijuki 10', '.011000010', 3.8, 'Dhanmondi', 'Student''s Permanent Address', '01aaaaaaaaaa10'),
(12, 13, 'Mohammad', 'ali', '123456789', '011000011', 3.88, '255 MK road Dhaka', '55, mk road jessore', '0110000000'),
(13, 14, 'Mohammad', 'Anwer', '012345678', '011000012', 2.33, '55 Mohammadpur, Dhaka', '23 jhonsonstreet New york', '0110000256'),
(14, 15, 'Shomrat', 'Ahmed', 'bukijuki 12', '01ssssssssssss1', 2.5, 'Green Road', 'jamalpur', '01xxxxxxxxxx13'),
(16, 16, 'Fahimdfgh', 'Ahmeddf', 'bukijuki 14dg', '011000014', 3, 'Malibagdfg', 'pabnadfg', '01xxxxxxxxx14'),
(17, 17, 'Mohammad Faisal', 'Ahmed', '1321346546546', '1234567890111', 4, 'Dhaka', 'Bhola', '82937892374'),
(18, 18, 'Rowshan', 'Ahmed', 'sf234234', '22342342', 4, 'asfasdf', 'asdfsdf', '234234');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `type`, `date`, `loan_id`, `adjustment`) VALUES
(1, 100000, 'Debit', 1455195677, 2, 0),
(2, 10000, 'Credit', 1455195677, 2, 0),
(3, 1000, 'Credit', 1455195677, 2, 0),
(4, 20000, 'Credit', 1455195677, 2, 0),
(5, 5000, 'Credit', 0, 2, 0),
(6, 3000, 'Credit', 0, 2, 0),
(7, 3000, 'Credit', 0, 2, 0),
(8, 5000, 'Credit', 1647388800, 2, 0),
(9, 50000, 'Credit', 1016236800, 1, 0),
(10, 75000, 'Debit', 1016236800, 1, 0),
(11, 1000000, 'Debit', 984700800, 18, 0),
(12, 1000000, 'Credit', 1678924800, 18, 0),
(13, 100, 'Credit', 1678924800, 18, 0),
(14, 1000, 'Credit', 1459123200, 18, 0),
(15, 1000000, 'Debit', 1459123200, 3, 0),
(16, 50, 'Debit', 1459613347, 7, 0),
(17, 10, 'Credit', 1459555200, 7, 0);

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
  `last_logged_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_time` bigint(20) DEFAULT NULL,
  `modified_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `email_verification_status`, `email_verification_code`, `password_reset_code`, `last_logged_in`, `created_time`, `modified_time`) VALUES
(1, 1, 'Fuad', '81dc9bdb52d04dc20036dbd8313ed055', 'fuad.robi@gmail.com', 1, '123456', '', '0000-00-00 00:00:00', 1455195410, 1455195410),
(3, 2, 'Rowshan', '202cb962ac59075b964b07152d234b70', 'rowshan@gmail.com', 1, '', '', '0000-00-00 00:00:00', 1455195410, 1455721404),
(4, 2, '1459078748', 'f0ed1aa54b1f3316d7b56fe8bfd7e38d', 'arbab.khan@gmail.com', 0, '', '', '2016-03-27 11:39:08', 1455195410, 1455195410),
(5, 2, '1459078971', '2d404085a36747d68644fbd8f139f5b0', 'alam.moh@gmail.com', 0, '', '', '2016-03-27 11:42:51', 1455195410, NULL),
(6, 2, '1459079368', '25d8293e988cbad160c8a867fe5b41c8', 'ishteaque.alam@gmail.com', 0, '', '', '2016-03-27 11:49:28', 1455195410, NULL),
(7, 2, '1459079635', 'aa90dad7c4bbf8507e2f5028b85b4d8a', 'fuad.robi@gmail.com', 0, '', '', '2016-03-27 11:53:55', 1455195410, NULL),
(8, 2, '1459079804', 'e366789d95cc716270ce3d73b367abbb', 'ami.sujon@mail.com', 0, '', '', '2016-03-27 11:56:44', 1455195410, NULL),
(9, 2, '1459079953', '3724b39f3ee9728c5b1fba8be24cc083', 'uddin.ka@mail.com', 0, '', '', '2016-03-27 11:59:13', 1455195410, NULL),
(10, 2, '1459080202', 'ad0a992681e375ba77d402c3734a6150', 'zahirulislam@mail.com', 0, '', '', '2016-03-27 12:03:22', 1455195410, NULL),
(11, 2, '1459080489', 'c96861db4f827e7c75415b5b7cb7d0d2', 'tutul.a@mail.com', 0, '', '', '2016-03-27 12:08:09', 1455195410, NULL),
(12, 2, '1459080841', 'b5b9b575de14f3ff09c21ae4ef8b2657', 'shaburemail@mail.com', 0, '', '', '2016-03-27 12:14:01', 1455195410, NULL),
(13, 2, '1459081040', '66b4a61cbae514cd772d2de4a40d512e', 'ali44@gmail.com', 0, '', '', '2016-03-27 12:17:20', 1455195410, NULL),
(14, 2, '1459081215', 'ba9c2ef04952d7fec558985350ad967c', 'anwer22@gmail.com', 0, '', '', '2016-03-27 12:20:15', 1455195410, NULL),
(15, 2, '1459083430', '834c6eb1e335f9d5f0745168617c4690', 'Shomrat@mail.com', 0, '', '', '2016-03-27 12:57:10', 1455195410, NULL),
(16, 2, '1459084030', '9384501e778664e05c94135fb35558f8', 'fahim.star@mail.com', 0, '', '', '2016-03-27 13:07:10', 1455195410, NULL),
(17, 2, '1459123057', '1d147181391a78468caa30a67b848861', 'faisal@gmail.com', 0, '', '', '2016-03-27 23:57:37', 1455195410, NULL),
(18, 2, '1459123298', '85644d83be4d5e7d723a9338e2a9d2fb', 'rowshan@gmail.com', 0, '', '', '2016-03-28 00:01:38', 1455195410, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
