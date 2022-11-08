-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2022 at 06:46 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbankdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation_sites`
--

DROP TABLE IF EXISTS `donation_sites`;
CREATE TABLE IF NOT EXISTS `donation_sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` varchar(100) NOT NULL,
  `donation_site_name` varchar(200) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_sites`
--

INSERT INTO `donation_sites` (`site_id`, `hospital_id`, `donation_site_name`) VALUES
(1, '1', 'Ntumpa Primary School'),
(2, '1', 'Chifwani Primary School'),
(3, '1', 'Kapata Primary School'),
(4, '1', 'Misanfu Secondary School'),
(5, '1', 'Kayambi Primary School'),
(17, '2', 'Mpongwe'),
(16, '2', 'Kalyalya'),
(8, '1', 'Kasama Primary School'),
(9, '1', 'Kasenda Primary School'),
(22, '1', 'Kalyalya Primary School'),
(13, '1', 'Ntumpa Village'),
(14, '1', 'Milambe Village'),
(15, '1', 'Mulanshi Village');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `serial_number` int(11) NOT NULL AUTO_INCREMENT,
  `sample_id` varchar(50) NOT NULL,
  `donor_fname` varchar(200) NOT NULL,
  `donor_mname` varchar(100) NOT NULL,
  `donor_lname` varchar(100) NOT NULL,
  `hiv` varchar(10) NOT NULL,
  `hbv` varchar(10) NOT NULL,
  `hcv` varchar(10) NOT NULL,
  `syphilis` varchar(10) NOT NULL,
  `blood_group` varchar(11) NOT NULL,
  `comment` text NOT NULL,
  `date_of_donation` varchar(50) NOT NULL,
  `date_of_next_donation` varchar(50) NOT NULL,
  `site_id` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL,
  `province_id` varchar(100) NOT NULL,
  `district_id` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_number`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`serial_number`, `sample_id`, `donor_fname`, `donor_mname`, `donor_lname`, `hiv`, `hbv`, `hcv`, `syphilis`, `blood_group`, `comment`, `date_of_donation`, `date_of_next_donation`, `site_id`, `hospital_id`, `province_id`, `district_id`, `added_on`, `updated_at`, `deleted_at`) VALUES
(3, '60227943', 'Malauni', 'Bwalya', 'Mulenga', '2', '0', '22', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(4, '609894', 'Chisanga', '', 'Bwalya', '0', '0', '0', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(5, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(6, '60227946', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(7, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(8, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(10, '60227990', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '23/09/2022', '23/12/2022', '2', '1', '1', '3', '2022-09-23 12:17:20', '2022-09-23 12:17:20', '2022-09-23 12:17:20'),
(11, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(12, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(13, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(14, '609894', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(15, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(16, '60227946', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(17, '60227945', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(18, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(19, '60227943', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(20, '609894', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(21, '60227990', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(22, '60227946', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(23, '60227945', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(24, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(25, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '30/08/2022', '30/11/2022', '4', '1', '1', '3', '2022-09-24 13:29:27', '2022-09-24 13:29:27', '2022-09-24 13:29:27'),
(28, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(29, '609894', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(30, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(31, '60227946', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(32, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(33, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(34, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(35, '609894', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(36, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(37, '60227946', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(38, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(39, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(40, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '14/09/2022', '14/11/2022', '1', '1', '1', '3', '2022-09-24 13:31:32', '2022-09-24 13:31:32', '2022-09-24 13:31:32'),
(41, '60227950', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(42, '60227945', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(43, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(44, '609894', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(45, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(46, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(47, '60227946', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(48, '60227945', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(49, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(50, '60227990', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(51, '60227945', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(52, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(53, '60227943', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(54, '60227990', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(55, '60227946', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '07/09/2022', '20/07/2022', '2', '1', '1', '3', '2022-09-24 13:40:53', '2022-09-24 13:40:53', '2022-09-24 13:40:53'),
(56, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '3/11/2022', '1', '1', '1', '3', '2022-09-25 19:25:06', '2022-09-25 19:25:06', '2022-09-25 19:25:06'),
(57, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '3/11/2022', '1', '1', '1', '3', '2022-09-25 19:25:06', '2022-09-25 19:25:06', '2022-09-25 19:25:06'),
(58, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '3/11/2022', '1', '1', '1', '3', '2022-09-25 19:25:06', '2022-09-25 19:25:06', '2022-09-25 19:25:06'),
(59, '60227990', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '3/11/2022', '1', '1', '1', '3', '2022-09-25 19:25:06', '2022-09-25 19:25:06', '2022-09-25 19:25:06'),
(60, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/11/2022', '15', '1', '1', '3', '2022-09-25 19:27:28', '2022-09-25 19:27:28', '2022-09-25 19:27:28'),
(61, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/11/2022', '15', '1', '1', '3', '2022-09-25 19:27:28', '2022-09-25 19:27:28', '2022-09-25 19:27:28'),
(62, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/11/2022', '15', '1', '1', '3', '2022-09-25 19:27:28', '2022-09-25 19:27:28', '2022-09-25 19:27:28'),
(63, '60227946', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/11/2022', '15', '1', '1', '3', '2022-09-25 19:27:28', '2022-09-25 19:27:28', '2022-09-25 19:27:28'),
(64, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '15', '1', '1', '3', '2022-09-25 19:29:26', '2022-09-25 19:29:26', '2022-09-25 19:29:26'),
(65, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '15', '1', '1', '3', '2022-09-25 19:29:26', '2022-09-25 19:29:26', '2022-09-25 19:29:26'),
(66, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '15', '1', '1', '3', '2022-09-25 19:29:26', '2022-09-25 19:29:26', '2022-09-25 19:29:26'),
(67, '60227946', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '15', '1', '1', '3', '2022-09-25 19:29:26', '2022-09-25 19:29:26', '2022-09-25 19:29:26'),
(68, '60227945', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '9', '1', '1', '3', '2022-09-25 19:30:43', '2022-09-25 19:30:43', '2022-09-25 19:30:43'),
(69, '60227950', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '9', '1', '1', '3', '2022-09-25 19:30:43', '2022-09-25 19:30:43', '2022-09-25 19:30:43'),
(70, '60227943', 'Chisanga', 'Bwalya', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '9', '1', '1', '3', '2022-09-25 19:30:43', '2022-09-25 19:30:43', '2022-09-25 19:30:43'),
(71, '60227946', 'Chisanga', '', 'Innocent', '0', '0', '0', '0', '0', '', '22/09/2022', '15/12/2022', '9', '1', '1', '3', '2022-09-25 19:30:43', '2022-09-25 19:30:43', '2022-09-25 19:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) NOT NULL,
  `data_range` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `data_range`, `site`, `added_on`) VALUES
(2, '1650548157_41b81df08a6318c86459.pdf', '2020-2022', 'Ntumpa', '2022-04-21 13:35:57'),
(3, '1650548229_8d5f0a8e119cbd9218e1.pdf', '2020-2022', 'Ntumpa', '2022-04-21 13:37:09'),
(4, '1650548317_1415b01dba1a08f225d6.pdf', '2020-2022', 'Kasakula', '2022-04-21 13:38:37'),
(5, '1650549010_d69fc84bf5e0035bdb81.png', '2020-2022', 'Misanfu', '2022-04-21 13:50:10'),
(6, '1650550150_60d292118575f2125277.pdf', '2020-2023', 'Mungwi Tech Sec School', '2022-04-21 14:09:10'),
(7, '1659548523_3caab231572852c55bbf.pdf', '2020-2022', 'Kasakula', '2022-08-03 17:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `hospital_id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(200) NOT NULL,
  `district_id` varchar(200) NOT NULL,
  `province_id` varchar(200) NOT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `district_id`, `province_id`) VALUES
(1, 'Kasama General Hospital', '3', '1'),
(2, 'Mbala General Hospital', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `hospital_id` varchar(200) NOT NULL,
  `district_id` varchar(200) NOT NULL,
  `province_id` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `email`, `phone`, `fname`, `lname`, `username`, `password`, `user_role`, `hospital_id`, `district_id`, `province_id`) VALUES
(1, 'lnnocentchisanga3@gmail.com', '0966367116', 'Innocent', 'Chisanga', 'vector', '202cb962ac59075b964b07152d234b70', 'admin', '1', '3', '1'),
(3, 'zikani@gmail.com', '0979023093', 'Zikani ', 'Kaira', 'zikani', '202cb962ac59075b964b07152d234b70', 'donor_data_clerk', '1', '3', '1'),
(5, '123@gmail.com', '0908989785', 'Chisanga', 'Innocent', 'Vector40', '202cb962ac59075b964b07152d234b70', 'admin', '2', '3', '1'),
(11, 'fosterchikopela44@gmail.com', '0966367117', 'Foster', 'Chikopela', 'Foster', '202cb962ac59075b964b07152d234b70', 'donor_section', '1', '3', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
