-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 12:09 PM
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
-- Database: `bvm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addexp`
--

CREATE TABLE `addexp` (
  `jid` int(11) NOT NULL,
  `tjob` varchar(250) NOT NULL,
  `company` text NOT NULL,
  `start` date NOT NULL,
  `endate` date NOT NULL,
  `totexp` text DEFAULT NULL,
  `aid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addexp`
--

INSERT INTO `addexp` (`jid`, `tjob`, `company`, `start`, `endate`, `totexp`, `aid`) VALUES
(1, 'Trainer', 'ITC(Moger)', '2005-12-31', '2007-04-30', '2 year', 2),
(2, 'Trainer', 'ITC(Moger)', '2005-12-31', '2007-04-30', '2 year', 3),
(3, 'Proferssor', 'C.P Patel College', '2009-02-02', '2010-02-06', '1 year', 4),
(4, 'Proferssor', 'C.P Patel College', '2009-07-31', '2010-08-31', '1 year', 5),
(5, 'Proferssor', 'C.P Patel College', '2009-07-31', '2010-08-31', '1 year', 6),
(6, 'Proferssor', 'C.P Patel College', '2009-07-31', '2010-08-31', '1 year', 7),
(7, 'Proferssor', 'C.P Patel College', '2009-07-31', '2010-08-31', '1 year', 8),
(8, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 9),
(9, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 10),
(10, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 11),
(11, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 12),
(12, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 13),
(13, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 14),
(14, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 15),
(15, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 16),
(16, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 17),
(17, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 18),
(18, 'Proferssor', 'V.P Science College', '2000-12-31', '2002-11-29', '1234', 19),
(19, 'Web Developer', 'Navratna Infotech', '2018-12-31', '2019-10-30', '1 year', 20),
(20, 'Web Developer', 'Navratna Infotech', '2018-12-31', '2019-12-31', '1 year', 21),
(21, 'Web Developer', 'Navratna Infotech', '2017-11-29', '2018-10-29', '1 year', 22),
(22, 'Web Developer', 'Navratna Infotech', '2017-11-29', '2018-10-29', '1 year', 23),
(23, 'Web Developer', 'Navratna Infotech', '2017-11-29', '2018-10-29', '1 year', 24),
(24, 'Web Developer', 'Navratna Infotech', '2017-11-29', '2018-10-29', '1 year', 25),
(25, 'Proferssor', 'V.P Science College', '2009-12-31', '2010-11-27', '1 year', 26),
(26, 'Proferssor', 'V.P Science College', '2009-12-31', '2010-11-27', '1 year', 27),
(27, 'Proferssor', 'V.P Science College', '2009-12-31', '2010-11-27', '1 year', 28),
(28, 'Assistant Professor', 'BVM', '2001-11-12', '2020-05-29', '19', 38),
(29, 'Assit.Prof', 'MBIT', '2018-11-12', '2019-11-10', '1', 109);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `no_at` int(10) NOT NULL,
  `fat` varchar(30) NOT NULL,
  `sat` varchar(30) DEFAULT NULL,
  `tat` varchar(30) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  `book_edi` varchar(30) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `bp` varchar(10) NOT NULL,
  `yp` varchar(6) NOT NULL,
  `pn` varchar(30) DEFAULT NULL,
  `pw` varchar(30) DEFAULT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Books',
  `docc` varchar(250) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `a_y`, `e_y`, `book_title`, `no_at`, `fat`, `sat`, `tat`, `area`, `book_edi`, `isbn`, `bp`, `yp`, `pn`, `pw`, `aid`, `typeofwork`, `docc`, `created_at`) VALUES
(4, 2014, 2015, 'xcv', 1, 'asc', '', '', 'sdf', '4th', 'rf456', '400', '2014', 'ghtt', 'www.google.com', 8, 'Books', 'CS-GATE-2019-A (gate2016.info).pdf', '2020-05-23 09:12:38.657917'),
(5, 2010, 2011, 'PHP Programing', 2, 'DGP', 'PAP', '', 'Web', '2nd', 'ISBN225', '4000', '2011', 'Rupal', 'www.rupal.co.in', 8, 'Books', 'gupta2016.pdf', '2020-06-02 04:21:14.289588'),
(6, 2017, 2018, 'Android', 2, 'scszc', 'scszc', 'scszc', 'IT', '2', '433e', '560', '2018', 'awf', 'sdfas', 8, 'Books', 'GATE 2019.pdf', '2020-06-27 06:47:03.267886'),
(7, 2012, 2013, 'vvv', 1, 'vv', 'vvxv', 'czxv', 'cxvzx', 'xvxzv', 'zczv ', '800', '2013', 'xvzxv ', 'xvxzv x', 8, 'Books', '0Consolidated_TT_2019-20_2.pdf', '2020-06-27 06:59:42.117018');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `conid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `date` date NOT NULL,
  `nod` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decr` varchar(300) NOT NULL,
  `type` varchar(100) NOT NULL,
  `attend_as` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `cu_name` varchar(200) DEFAULT NULL,
  `dp_name` varchar(100) DEFAULT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Conference',
  `photos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`conid`, `a_y`, `e_y`, `date`, `nod`, `name`, `decr`, `type`, `attend_as`, `role`, `cu_name`, `dp_name`, `aid`, `typeofwork`, `photos`, `created_at`) VALUES
(8, 2017, 2018, '2017-11-12', 2, '    dsfaesgwegwre', '     asfasegeryerthrtjr     ', 'National', 'Participant', 'Participant', 'BVM', 'IT', 8, 'Conference', '0DSC_0002.JPG', '2020-05-18 06:26:02'),
(9, 2017, 2018, '2017-11-12', 3, '  ABC', '   ABC   ', 'National', 'Participant', 'Member', 'GCET', 'IT', 8, 'Conference', '0DSC_0002.JPG|1DSC_0003.JPG|2DSC_0006.JPG', '2020-05-21 13:39:53'),
(10, 2016, 2017, '2016-06-07', 1, '        Effecence of mining', '        Mining        ', 'National', 'Participant', 'Participant', 'Nalini', 'Arts', 8, 'Conference', '0DSC_0050.JPG', '2020-05-31 06:16:59'),
(11, 2012, 2013, '2012-05-04', 3, ' Women', ' Women ', 'International', 'Conducted', 'Member', 'BVM', 'Civil', 8, 'Conference', '0DSC_0033.JPG|1DSC_0034.JPG|2DSC_0035.JPG', '2020-05-31 08:10:44'),
(12, 2014, 2015, '2014-11-11', 2, 'ooooo', 'ooooooo', 'National', 'Participant', 'Convener', 'BVM', 'IT', 8, 'Conference', '0DSC_0109.JPG', '2020-06-01 04:58:02'),
(13, 2014, 2015, '2014-11-12', 2, 'HTML', 'HHHHHHHH', 'National', 'Conducted', 'Coordinator', 'ADIT', 'IT', 39, 'Conference', '0WhatsApp Image 2020-06-03 at 12.27.06 PM.jpeg', '2020-06-03 08:38:07'),
(14, 2016, 2017, '2016-02-11', 2, 'cccc', 'ccccc', 'International', 'Conducted', 'Convener', 'BVM', 'CE', 8, 'Conference', '0DSC_0124.JPG', '2020-06-27 06:22:01'),
(15, 2018, 2019, '2018-05-05', 1, 'sssss', 'sssss', 'National', 'Participant', 'Participant', 'ADIT', 'IT', 8, 'Conference', '0DSC_0139.JPG', '2020-06-27 06:22:48'),
(16, 2019, 2020, '2019-11-17', 3, 'vvvvv', 'vvvvv', 'International', 'Conducted', 'Co-Coordinator', 'MBIT', 'IT', 8, 'Conference', '0DSC_0390.JPG', '2020-06-27 06:23:49'),
(17, 2019, 2020, '2019-02-12', 2, 'nnnn', 'nnnn', 'International', 'Participant', 'Member', 'MBIT', 'CE', 8, 'Conference', '0DSC_0009.JPG', '2020-06-27 06:24:37'),
(18, 2012, 2013, '2012-11-11', 1, 'abc', 'abc', 'National', 'Conducted', 'Participant', 'BJVM', 'Commerece', 8, 'Conference', '0DSC_0130.JPG', '2020-06-27 06:25:54'),
(19, 2013, 2014, '2013-12-14', 3, 'fggff', 'fgfgff', 'National', 'Participant', 'Participant', 'GCET', 'IT', 8, 'Conference', '0DSC_0429.JPG', '2020-06-27 06:27:00'),
(20, 2011, 2012, '2011-05-04', 1, '  abc', '  cvcvcv  ', 'International', 'Participant', 'Participant', 'Parul', 'CE', 8, 'Conference', '0DSC_0066.JPG', '2020-06-27 06:30:53'),
(21, 2014, 2015, '2014-09-08', 2, 'bbnnm', 'bvbnm', 'International', 'Participant', 'Participant', 'dfgh', 'sdsfs', 8, 'Conference', '0DSC_0066.JPG', '2020-06-27 06:32:07'),
(23, 2018, 2019, '2018-02-11', 1, '   hhhhhhhhhhhhhhh', '   hhhhhhhhhhhhhh   ', 'National', 'Participant', 'Participant', 'GCET', 'CE', 8, 'Conference', '0DSC_0066.JPG', '2020-07-22 15:25:02'),
(24, 2011, 2012, '2011-02-11', 3, 'ACD', 'ACD', 'International', 'Participant', 'Participant', 'BJVM', 'Commerece', 8, 'Conference', '0_DSC0127.jpg', '2020-07-22 16:04:56'),
(25, 2020, 2021, '0000-00-00', 2, 'DGP', 'DGP', 'International', 'Participant', 'Member', 'ISTAR', 'CE', 8, 'Conference', '0_DSC0127.jpg', '2020-07-25 06:53:46'),
(26, 2020, 2021, '0000-00-00', 2, 'PAP', 'DGP-PAP', 'International', 'Participant', 'Member', 'ISTAR', 'CE', 8, 'Conference', '0_DSC0127.jpg', '2020-07-25 13:28:59'),
(27, 2020, 2021, '2020-05-14', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'National', 'Participant', 'Participant', 'ACC', 'IT', 8, 'Conference', '0_DSC0127.jpg', '2020-07-26 05:33:44'),
(32, 2017, 2018, '2017-11-12', 2, 'fefsdf', 'dfdsfds', 'National', 'Participant', 'Participant', 'bvm', 'it', 8, 'Conference', '0_DSC0127.jpg', '2020-07-29 05:36:08'),
(34, 2017, 2018, '2017-11-12', 2, ' fff ggg hhh', ' fff ggg hhh ', 'National', 'Conducted', 'Coordinator', 'SEMCOM', 'Commerce', 8, 'Conference', '0_DSC0127.jpg', '2020-08-04 06:34:50'),
(35, 2019, 2020, '2019-11-12', 2, 'kkjjhh', 'hjbkjbjkb', 'National', 'Participant', '', 'ADIT', 'IT', 8, 'Conference', '0_DSC0127.jpg', '2020-12-18 10:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` int(10) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `department`) VALUES
(1, 'Civil Engineering'),
(2, 'Structural Engineering'),
(3, 'Computer Engineering'),
(4, 'Electronics Engineering'),
(5, 'Electrical Engineering'),
(6, 'Mechanical Engineering'),
(7, 'Production Engineering'),
(8, 'Electronics & Communication Engineering'),
(9, 'Information Technology Engineering'),
(10, 'Mathematics Department');

-- --------------------------------------------------------

--
-- Table structure for table `ind_visit`
--

CREATE TABLE `ind_visit` (
  `id` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `industry_name` varchar(100) NOT NULL,
  `ind_city` varchar(100) NOT NULL,
  `ind_state` varchar(100) NOT NULL,
  `sem` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `decr` varchar(300) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Industrial Visit',
  `photos` varchar(255) NOT NULL,
  `aid` int(10) NOT NULL,
  `noofstud` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ind_visit`
--

INSERT INTO `ind_visit` (`id`, `a_y`, `e_y`, `industry_name`, `ind_city`, `ind_state`, `sem`, `date`, `decr`, `typeofwork`, `photos`, `aid`, `noofstud`, `created_at`) VALUES
(1, 2000, 2001, 'Santram Infotech ', 'Anand', 'Gujarat', '5', '2018-12-30', 'srdtfjgjh', 'Industrial Visit', '0', 3, 20, '2020-05-01 03:48:04'),
(2, 2010, 2011, 'Santram Infotech ', 'Anand', 'Gujarat', '6', '2018-12-30', 'srdtfjgjh', 'Industrial Visit', '81365985_2877092815636709_8017545271124688896_o_2877092805636710.jpg', 3, 20, '2020-05-01 03:48:04'),
(4, 2015, 2016, 'Santram Infotech ', 'Nadiad', 'Gujarat', '4', '2019-12-29', 'FGVBHJNMK,', 'Industrial Visit', '80479004_2877092642303393_1728100922136985600_o_2877092632303394.jpg', 8, 20, '2020-05-01 04:01:37'),
(5, 2017, 2018, 'Collabera', 'Anand', 'Gujarat', '3', '2017-11-12', 'ddfdf', 'Industrial Visit', '0IMG_0690.JPG', 8, 30, '2020-05-18 05:51:32'),
(6, 2019, 2020, 'TCS', 'Pune', 'MH', '2', '2020-02-01', 'Industry', 'Industrial Visit', '0_DSC0127.jpg', 8, 100, '2020-06-02 04:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paperid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `no_at` int(5) NOT NULL,
  `fat` varchar(30) NOT NULL,
  `sat` varchar(30) DEFAULT NULL,
  `tat` varchar(30) DEFAULT NULL,
  `ffat` varchar(30) DEFAULT NULL,
  `cj_name` varchar(50) NOT NULL,
  `paper_type` varchar(30) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `doi` varchar(30) DEFAULT NULL,
  `v_i` varchar(30) DEFAULT NULL,
  `mp` varchar(10) NOT NULL,
  `yp` varchar(10) NOT NULL,
  `impact` varchar(10) NOT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Paper',
  `pdf` varchar(255) DEFAULT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paperid`, `a_y`, `e_y`, `title`, `no_at`, `fat`, `sat`, `tat`, `ffat`, `cj_name`, `paper_type`, `isbn`, `doi`, `v_i`, `mp`, `yp`, `impact`, `aid`, `typeofwork`, `pdf`, `date`) VALUES
(1, 2010, 2011, '', 0, '', NULL, NULL, NULL, '', '', '', '', NULL, '', '', '', 3, 'Paper', 'demo2.pdf', '2020-05-01 03:57:28.366881'),
(5, 2013, 2014, 'Image', 1, 'I N', '', '', '', 'gggg', 'Paper Published', 'isp1123', '234', '1', 'March', '2018', '3', 8, 'Paper', '0apis-php-en.PDF', '2020-05-04 11:51:37.046410'),
(6, 2017, 2018, 'Image', 1, 'Dharmesh', 'fvdv', 'g', 'f', 'gsvdsv', 'Paper Published', '5667', 'efd', 'gfdgfdgggg', '', '2017', '4', 8, 'Paper', 'Hemal_Shah.pdf', '2020-05-26 11:49:22.218109'),
(10, 2020, 2021, 'Android', 1, 'wee', 'qww', 'www', 'eee', 'ddd', 'Paper Published', 'dd', 'swedw', 'wdwe', '', '2020', '3', 8, 'Paper', 'GATE 2019.pdf', '2020-07-26 16:25:29.930900');

-- --------------------------------------------------------

--
-- Table structure for table `patent`
--

CREATE TABLE `patent` (
  `pid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `patent_no` varchar(200) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `decr` varchar(300) DEFAULT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Patent',
  `docc` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patent`
--

INSERT INTO `patent` (`pid`, `a_y`, `e_y`, `name`, `date`, `patent_no`, `agent`, `decr`, `aid`, `typeofwork`, `docc`, `created_at`) VALUES
(2, 2014, 2015, 'ABC', '2014-05-10', 'DST-12345', 'BVM', '    M', 8, 'Patent', 'Wk2.1.DES.pdf', '2020-05-29 08:44:11'),
(3, 2018, 2019, 'vvvvvvvvvv', '2019-10-11', 'Indic-12345', 'vvvvvvvvvvvvvvv', ' v', 8, 'Patent', 'Survey_Privacy.pdf', '2020-06-02 09:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `reserch_proj`
--

CREATE TABLE `reserch_proj` (
  `projectid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `aid` int(10) NOT NULL,
  `agency_name` varchar(200) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `sanction_letter_no` varchar(100) NOT NULL,
  `decr` varchar(300) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Research Project',
  `upload` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserch_proj`
--

INSERT INTO `reserch_proj` (`projectid`, `a_y`, `e_y`, `project_name`, `startdate`, `enddate`, `role`, `aid`, `agency_name`, `amount`, `sanction_letter_no`, `decr`, `typeofwork`, `upload`, `created_at`) VALUES
(1, 2010, 2011, 'Pukaar (The NGO)', '2019-11-03', '2019-11-29', '', 3, '', '', '', 'ASRHDJFMH', 'Research Project', '0beginning_php_and_mysql_from_novice_to_professional_4th_edition.pdf', '2020-05-01 03:55:43'),
(2, 2012, 2013, 'Basics of Ayurveda', '2019-12-31', '2020-12-31', '', 3, '', '', '', 'AETAWRYETJFHG', 'Research Project', '0Project Details.pdf', '2020-05-01 03:56:33'),
(5, 2017, 2018, 'Android Application', '2017-10-11', '2018-02-15', 'Coordinator', 8, 'GUJCOST', '50,000', 'GUJCOST-123456', ' Android App', 'Research Project', '0Malware_IOT.pdf', '2020-05-28 05:24:49'),
(6, 2019, 2020, 'React', '2019-05-04', '2020-02-01', 'Convener', 8, 'DST', '50,000', 'DST-1456', '  React123', 'Research Project', 'gupta2016.pdf', '2020-06-02 06:16:25'),
(7, 2019, 2020, 'Android AAA', '2019-11-12', '2020-11-12', 'Convener', 8, 'dwd', '50000', 'sds', ' fffc', 'Research Project', 'Project Details.pdf', '2020-07-26 16:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `semid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `date` date NOT NULL,
  `total_hours` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decr` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `audience` varchar(20) NOT NULL,
  `cu_name` varchar(100) DEFAULT NULL,
  `dp_name` varchar(100) DEFAULT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Seminar',
  `photos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`semid`, `a_y`, `e_y`, `date`, `total_hours`, `name`, `decr`, `type`, `role`, `audience`, `cu_name`, `dp_name`, `aid`, `typeofwork`, `photos`, `created_at`) VALUES
(11, 2000, 2001, '2019-12-31', '', 'Basics of Ayurveda', 'Online library', 'STTP', '', '', NULL, NULL, 52, 'Seminar', '0DSC_0023.JPG', '2020-05-04 12:33:13'),
(13, 2018, 2019, '2018-10-11', '05:30', 'xyz', 'xyz', 'Webinar', 'Participated', 'Boths', 'ADIT', 'CE', 8, 'Seminar', '0DSC_0024.JPG', '2020-05-21 13:37:36'),
(14, 2017, 2018, '2017-11-12', '1:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 'Symposium', 'Speaker', 'Faculties', 'MBIT', 'IT', 8, 'Seminar', '0DSC_0120.JPG', '2020-05-21 13:50:51'),
(15, 2018, 2019, '2020-05-05', '20', 'jhgfd', 'uytrdfxcvb', 'dfgvhb', 'rfghb', '200', 'tfghb', NULL, 8, 'Seminar', '0IMG_0690.JPG', '2020-05-30 05:39:08'),
(16, 2014, 2015, '2012-08-10', '4:00', 'French Language', 'French ', 'Seminar', 'Organized', 'Students', 'MBIT', 'CE', 8, 'Seminar', '0DSC_0120.JPG', '2020-05-31 09:33:48'),
(19, 2019, 2020, '2019-12-11', '1:00', 'fgh', 'bbbb', 'Seminar', 'Participated', 'Boths', 'bbb', 'bbbb', 8, 'Seminar', '0_DSC0127.JPG', '2020-07-26 16:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `sttp_fdp`
--

CREATE TABLE `sttp_fdp` (
  `sttpid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `nod` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decr` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `role` varchar(100) NOT NULL,
  `cu_name` varchar(100) DEFAULT NULL,
  `dp_name` varchar(100) DEFAULT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'STTP_FDP',
  `photos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sttp_fdp`
--

INSERT INTO `sttp_fdp` (`sttpid`, `a_y`, `e_y`, `sdate`, `edate`, `nod`, `name`, `decr`, `type`, `mode`, `role`, `cu_name`, `dp_name`, `aid`, `typeofwork`, `photos`, `created_at`) VALUES
(11, 2000, 2001, '2019-12-31', '0000-00-00', 0, 'Basics of Ayurveda', 'Online library', 'STTP', '', '', NULL, NULL, 3, 'STTP_FDP', '0_DSC0127.JPG', '2020-05-04 12:33:13'),
(14, 2017, 2018, '2017-11-12', '2017-11-12', 1, 'xxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx', 'Select here', 'Select here', 'Select here', 'MBIT', 'IT', 8, 'STTP_FDP', '0DSC_0023.JPG', '2020-05-21 13:50:51'),
(15, 2017, 2018, '2017-12-12', '2017-12-15', 3, 'cvb', 'cvb', 'STTP', 'Organized', 'Students', 'BVM', 'CE', 8, 'STTP_FDP', '0DSC_0077.JPG', '2020-05-22 07:02:09'),
(17, 2019, 2020, '2019-05-04', '2019-05-06', 2, 'ZZZZZ', 'ZZZZZ', 'STTP', 'Participated', 'Participated', 'BJVM', 'Commerece', 8, 'STTP_FDP', '0DSC_0023.JPG', '2020-05-22 10:55:19'),
(18, 2012, 2013, '2012-02-10', '2012-02-12', 2, 'Android', 'App', 'STTP', 'Organized', 'Convener', 'BVM', 'CE', 8, 'STTP_FDP', '0DSC_0077.JPG', '2020-06-01 10:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `did` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `Name`, `did`) VALUES
(1, 'C Programing', 3),
(2, 'Basics of  PHP', 3),
(3, 'Web Design  with Python', 3),
(4, 'HTML', 3),
(6, 'Basics Of React Native', 3),
(7, 'Basics of Structure  ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `tid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `work_type` varchar(50) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `agency_name` varchar(200) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `sanction_letter_no` varchar(100) NOT NULL,
  `decr` varchar(300) NOT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Testing Consulting ',
  `upload` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`tid`, `a_y`, `e_y`, `work_type`, `project_name`, `startdate`, `enddate`, `role`, `agency_name`, `amount`, `sanction_letter_no`, `decr`, `aid`, `typeofwork`, `upload`, `created_at`) VALUES
(6, 2014, 2015, 'Testing', 'Express Way', '2014-11-12', '2014-12-31', 'Coordinator', 'Govt Gujarat', '5,00,000', 'GST-12345', '     ABCDEFG', 8, 'Testing Consulting', '0beginning_php_and_mysql_from_novice_to_professional_4th_edition.pdf', '2020-05-29 10:28:34'),
(7, 2015, 2016, 'Consultancy', 'Web Work', '2019-05-11', '2019-12-12', 'Select here', 'AGT', '5,000', 'DJT-123', ' Hiwwwwwwwwwwww', 8, 'Testing Consulting', 'Hemal_Shah.pdf', '2020-06-02 07:56:15'),
(8, 2019, 2020, 'Select here', 'Andriod  ddd ', '2018-04-11', '2019-08-12', 'Select here', 'dd', '50000', 'dfdfd', ' fvvd', 8, 'Testing Consulting ', 'CS-GATE-2019-A (gate2016.info).pdf', '2020-07-26 16:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `aid` int(20) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `mno` bigint(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `city` varchar(250) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `addr` text DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL,
  `did` int(10) NOT NULL,
  `desig` varchar(250) NOT NULL,
  `doj` date DEFAULT NULL,
  `schlspec` varchar(250) DEFAULT NULL,
  `school` text DEFAULT NULL,
  `yschool` year(4) DEFAULT NULL,
  `rschool` float DEFAULT NULL,
  `hspec` text DEFAULT NULL,
  `hschool` text DEFAULT NULL,
  `hyear` year(4) DEFAULT NULL,
  `hresult` float DEFAULT NULL,
  `dspec` text DEFAULT NULL,
  `sdiploma` text DEFAULT NULL,
  `ydiploma` year(4) DEFAULT NULL,
  `rdiploma` float NOT NULL,
  `degreespec` text NOT NULL,
  `degree` text NOT NULL,
  `ydegree` year(4) NOT NULL,
  `rdegree` float NOT NULL,
  `pgspec` text NOT NULL,
  `pg` text NOT NULL,
  `ypg` year(4) NOT NULL,
  `rpg` float NOT NULL,
  `otherspec` text NOT NULL,
  `sothers` varchar(500) NOT NULL,
  `yothers` year(4) NOT NULL,
  `rothers` float NOT NULL,
  `profile` varchar(250) NOT NULL,
  `resume` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `cpass` varchar(250) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`aid`, `uname`, `mno`, `gender`, `email`, `city`, `bday`, `addr`, `zip`, `user_type`, `did`, `desig`, `doj`, `schlspec`, `school`, `yschool`, `rschool`, `hspec`, `hschool`, `hyear`, `hresult`, `dspec`, `sdiploma`, `ydiploma`, `rdiploma`, `degreespec`, `degree`, `ydegree`, `rdegree`, `pgspec`, `pg`, `ypg`, `rpg`, `otherspec`, `sothers`, `yothers`, `rothers`, `profile`, `resume`, `pass`, `cpass`, `created_at`) VALUES
(3, 'Dharmesh Patel', 9898486941, 'Male', 'dgpatel206@gmail.com', 'Anand', '1985-06-20', 'Anand', 388120, 'Admin', 9, 'Assistant Professor', '2019-11-18', '10th', 'GSEB', 2000, 71.2, 'Science', '12th', 2002, 51.26, 'IT', 'BBIT', 2005, 6.65, 'BE', 'S P Uni', 2009, 4.29, 'ME', 'GTU', 2013, 8.12, '', 'sothers', 0000, 0, '5eb8ebb1144281.22786139.jpg', '5eb8ebb114d6c7.24209313.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-30 12:15:35.532319'),
(4, 'Dr.Indrajit N. Patel', 9898034464, 'Male', 'inpatel34@gmail.com', 'Anand', '1987-12-31', 'V.V.Nagar', 388120, 'Principal', 2, 'Principal', '2013-07-01', '10th', 'GSEB', 2001, 60.23, 'GSHEB', '12th', 2003, 67.02, '', '', 0000, 0, 'BCA', 'S P Uni', 2006, 6.23, 'MCA', 'CHARUSAT', 2008, 6.69, '', 'sothers', 0000, 0, '', '', 'ec6a6536ca304edf844d1d248a4f08dc', 'ec6a6536ca304edf844d1d248a4f08dc', '2020-04-30 13:08:23.047795'),
(8, 'Rahul Patel', 9601856238, 'Male', 'rahul@gmail.com', 'Matar', '1993-11-28', 'matar', 388540, 'Faculty', 3, 'Professor', '2010-12-31', '10th', 'GSEB', 2001, 60.23, 'GSHEB', '12th', 2003, 67.02, '', '', 0000, 0, 'BCA', 'S P Uni', 2006, 6.23, 'MCA', 'CHARUSAT', 2008, 6.69, '', 'sothers', 0000, 0, '5f3b83763c6c87.16670754.jpg', '', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-30 13:31:26.411182'),
(19, 'Mehul Patel ', 6354978795, 'Select here', 'mehul@gmail.com', 'Borsad', '1975-12-31', 'borsad', 380009, 'Select UserType', 1, 'Head Of Department', '2002-12-31', '10th', 'GSEB', 1992, 60.23, 'GSHEB', '12th', 1994, 67.02, '', '', 0000, 0, 'BCA', 'S P Uni', 1997, 6.23, 'MCA', 'CHARUSAT', 1999, 6.69, '', 'sothers', 0000, 0, '', '', 'ec6a6536ca304edf844d1d248a4f08dc', 'ec6a6536ca304edf844d1d248a4f08dc', '2020-04-30 15:47:08.634898'),
(20, 'Chirag Patel', 6354978795, 'Male', 'Chirag@gmail.com', 'Anklav', '2007-11-29', 'anklav', 380009, 'HOD', 2, 'Head Of Department', '2014-12-31', '10th', 'GSEB', 2008, 60.23, 'GSHEB', '12th', 2010, 67.02, '', '', 0000, 0, 'BCA', 'S P Uni', 2013, 6.23, 'MCA', 'CHARUSAT', 2015, 6.69, '', 'sothers', 0000, 0, '5eab0db2cf4a06.70518825.jpg', '5eab0db2d67ba7.07255901.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-30 17:41:06.880094'),
(25, 'Sakshi Tanna', 6354978795, 'Female', 'sakshi@gmail.com', 'Petlad', '2003-12-30', 'petlad', 380009, 'HOD', 3, 'Head Of Department', '2018-12-31', '10th', 'GSEB', 2008, 60.23, 'GSHEB', '12th', 2010, 67.02, '', '', 0000, 0, 'BCA', 'S P Uni', 2013, 6.23, 'MCA', 'CHARUSAT', 2015, 6.69, '', 'sothers', 0000, 0, '5eab17e78d8a05.29208170.jpg', '5eab17e78e1947.63485404.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-30 18:24:39.583343'),
(28, 'Mr.Atul Patel', 7845123265, 'Male', 'Atul@gmail.com', 'Matar', '1989-12-30', 'nhbj', 388540, 'Principal', 3, 'Principal', '2011-12-28', '', '10th', 2002, 60.23, 'GSHEB', '12th', 2004, 67.02, '', '', 0000, 0, 'BCA', 'S P Uni', 2007, 6.23, 'MCA', 'CHARUSAT', 2009, 6.69, '', 'sothers', 0000, 0, 'dgp.jpg', '5eab27956b95f4.46194500.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-30 19:31:33.498396'),
(38, 'Megha Dharmesh Patel', 9724845179, 'Female', 'mdpatel97@gmail.com', 'Anand', '1989-07-07', 'Anand', 388001, 'Faculty', 7, 'Assistant Professor', '2001-11-12', 'dcdv', 'cvxcv cx', 1992, 80, 'cvcv ', 'dfdsvd', 1994, 89, '', '', 0000, 0, 'dsdc', 'vdvd', 1998, 90, 'vcvc', 'cxvc', 2000, 89, '', 'sothers', 0000, 0, '5ed135735c1e23.98224204.jpg', '5ed1357369fc87.25494281.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-29 16:16:51.438022'),
(39, 'gautam sharma', 986531478, 'Male', 'gautam@gmail.com', 'Anand', '2000-05-23', 'anand', 986532, 'Faculty', 4, 'Faculty', '2020-05-30', '10th', 'gebs', 2018, 66.25, 'srhfj', '12th', 2058, 85.23, 's', '', 0000, 0, 'sDGhds', 'ADShfdn', 2015, 56.23, 'sddhfnf', 'gsfd', 2058, 66.25, '', 'sothers', 0000, 0, '5ed1e4325e6fc8.45751352.jpg', '5ed1e432651c87.76227816.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 04:42:26.417534'),
(52, 'hiren patel', 986531478, 'Male', 'hirenpatel@gmail.com', 'Anand', '2000-05-23', 'anand', 986532, 'Faculty', 2, 'Faculty', '2020-05-30', '10th', 'gebs', 2018, 66.25, 'srhfj', '12th', 2058, 85.23, 's', '', 0000, 0, 'sDGhds', 'ADShfdn', 2015, 56.23, 'sddhfnf', 'gsfd', 2058, 66.25, '', 'sothers', 0000, 0, '5ed1e83b663432.42139206.jpg', '5ed1e83b76b9b7.60449791.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 04:59:39.489947'),
(54, 'dgpatel', 9865321478, 'Male', 'dgpatel@gmail.com', 'anand', '2020-05-28', 'aegshjfgj', 323164, 'Faculty', 1, 'faculty', '2020-12-31', '10th', 'egtjrbn', 0000, 5120, 'fgvbhn ', '12th', 0000, 45120, '', '', 0000, 0, 'rdfghb', 'rftghbjn', 0000, 84512, '', '', 0000, 0, '', '', 0000, 0, '5ed21b7d6ef344.92885320.jpg', '5ed21b7d75e435.04487141.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 08:38:21.485742'),
(55, 'dgpatel', 9865321478, 'Male', 'dg@gmail.com', 'anand', '2020-05-28', 'aegshjfgj', 323164, 'Faculty', 1, 'faculty', '2020-12-31', '10th', 'egtjrbn', 0000, 5120, 'fgvbhn ', '12th', 0000, 45120, '', '', 0000, 0, 'rdfghb', 'rftghbjn', 0000, 84512, '', '', 0000, 0, '', '', 0000, 0, '5ed21bc8dae312.62427606.jpg', '5ed21bc8e0d2e8.95338617.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 08:39:36.923597'),
(57, 'dgsharma', 9865321478, 'Male', 'dgsharma@gmail.com', 'anand', '2020-12-31', 'jhgf', 326598, 'Faculty', 2, 'faculty', '2019-12-31', '10th', 'kjhg', 0000, 56230, 'ghbn ', 'yghbn ', 0000, 5120, '', '', 0000, 0, 'uhjn', 'yghbn', 0000, 451, 'ghbn ', 'hbn', 0000, 84512, '', '', 0000, 0, '5ed21d4bb710d8.28074597.jpg', '5ed21d4bbd3bb4.55382210.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 08:46:03.779098'),
(62, 'keyur patel', 6598321478, 'Male', 'keyurpatel@gmail.com', 'anand', '2020-12-31', 'jhgf', 326598, 'Faculty', 3, 'faculty', '2020-12-31', 'iujhgf', 'jhgfc', 0000, 56120, 'jkhgf', 'uygf', 0000, 5623, 'jhgv', 'kjhbgv', 0000, 4512, 'jhg', 'kjnbhvg', 0000, 562, 'jhbgv', 'jhgf', 2041, 52, '', '', 0000, 0, '5ed2254d351886.49552712.jpg', '5ed2254d373803.82364363.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 09:20:13.230816'),
(86, 'dharmesh', 986531147, 'Male', 'dgpatel206@gmail.com', 'sdgfhfmhg', '2020-05-11', 'aegsrhdgfhmg', 654, 'Faculty', 5, 'aegsdfhgn', '2020-05-15', 'fghjn', 'hjk', 0000, 632, 'ghbjnkm', 'hjkm', 0000, 56230, '', '', 0000, 0, 'ghjnmk,', 'gyhujkm,', 0000, 9652, 'uhjikol,', '9lkjn', 0000, 9652, '', '', 0000, 0, '5ed240e27100a8.65893280.jpg', '5ed240e2744cd9.61651818.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 11:17:54.490241'),
(89, 'Dhaval Patel', 989874651, 'Male', 'dhaval.patel@gmail.com', 'Anand', '1989-12-12', 'Anand', 388001, 'Faculty', 6, 'Assistant Professor', '2019-12-12', 'GSEB', 'GSEB', 2000, 75, 'GSEB', 'Science', 2002, 65, '', '', 0000, 0, 'BE', 'SP', 2007, 56, '', '', 0000, 0, '', '', 0000, 0, '5ed2536fa79ef9.43982939.jpg', '5ed2536fb50d96.39085119.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 12:37:03.745555'),
(90, 'Ankita Patel', 99999999, 'Female', 'agpatel@gmail.com', 'Nadiad', '1989-11-12', 'Nadiad', 388001, 'HOD', 6, 'Assistant Professor', '2015-10-10', 'GSEB', 'GSEB', 2000, 87, 'GSEB', 'Science', 2002, 89, '', '', 0000, 0, 'BE', 'SP', 2006, 78, '', '', 0000, 0, '', '', 0000, 0, '5ed25492238c17.27527993.jpg', '5ed254922c3269.30020400.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 12:41:54.184026'),
(92, 'arpita aptel', 898844444, 'Female', 'ag1@gmail.com', 'Baroda', '1989-11-12', 'Baroda', 388145, 'Faculty', 8, 'Assistant Professor', '2014-11-11', 'GSEB', 'GSEB', 2000, 87, 'GSEB', 'Science', 2002, 87, '', '', 0000, 0, 'BE', 'SP', 2006, 78, '', '', 0000, 0, '', '', 0000, 0, '5ed257835f4b27.93656162.jpg', '5ed257836bb8b9.87682857.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-30 12:54:27.468152'),
(101, 'Girishbhai Patel', 9898485212, 'Male', 'girishpatel@gmail.com', 'Nadiad', '1989-08-03', 'Nadiad', 388414, 'HOD', 10, 'Assistant Professor', '2007-11-12', 'dcdscd', 'dcds', 1999, 58, 'cdcd', 'cdc', 2001, 89, '', '', 0000, 0, 'dcdscd', 'ddsc', 2005, 78, '', '', 0000, 0, '', '', 0000, 0, '5ed33110e2a4c8.46728578.jpg', '5ed33110e7c536.58042192.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-31 04:22:40.954535'),
(102, 'jyotika', 87888888, 'Female', 'jjp@gmail.com', 'bhalej', '1963-01-31', 'ddd', 388001, 'Principal', 1, 'Professor', '1982-01-11', 'dvsdv', 'vdsvd', 1976, 85, 'dvvds', 'dvdsv ', 1978, 52, '', '', 0000, 0, 'vsc v', 'dvdsv ', 1982, 82, '', '', 0000, 0, '', '', 0000, 0, '5ed33223e54937.68195999.jpg', '5ed33223ebf8d1.83495438.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-31 04:27:15.969831'),
(106, 'girishbhai ghandhi', 9865311778, 'Male', 'girishgandhi@gmail.com', 'ashas', '2020-05-27', 'AEsyhjrtf', 653298, 'Principal', 1, 'principal', '2020-05-14', 'fgvbh', 'fgvbhj', 0000, 0, 'dfcgvbh', 'fcgvbhj', 0000, 54120, 'ftghbjn', 'fgvhbj', 0000, 84512, 'ftghbj', 'ftghbnm', 2007, 41, '5412', 'gthbn', 0000, 4512, 'ftghb', 'tfghb', 0000, 84512, '5ed33450c82625.69777005.jpg', '5ed33450ca2b97.15448354.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-31 04:36:32.842367'),
(107, 'girishbhai vyas', 9865311778, 'Male', 'girishgandhirty@gmail.com', 'ashas', '2020-05-27', 'AEsyhjrtf', 653298, 'Faculty', 1, 'Faculty', '2020-05-14', 'fgvbh', 'fgvbhj', 0000, 0, 'dfcgvbh', 'fcgvbhj', 0000, 54120, 'ftghbjn', 'fgvhbj', 0000, 84512, 'ftghbj', 'ftghbnm', 2007, 41, '5412', 'gthbn', 0000, 4512, 'ftghb', 'tfghb', 0000, 84512, '5ed336f6592564.89849245.jpg', '5ed336f65f7b97.06523582.pdf', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-05-31 04:47:50.394010'),
(108, 'Anjali Patel', 9898478941, 'Female', 'ajpatel@gmail.com', 'V V Nagar', '1985-07-07', 'V V Nagar', 388120, 'HOD', 3, 'Professor', '2006-11-12', 'ddfdf', 'dfdfd', 1999, 85, 'ffd', 'fdbfd', 2001, 87, '', '', 0000, 0, 'vfvfd', 'fdv', 2005, 88, '', '', 0000, 0, '', 'sothers', 0000, 0, '', '', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2020-06-02 15:27:30.375764'),
(109, 'Hardik Patel', 9824511456, 'Male', 'hdpatel@gmail.com', 'Anand', '1995-11-12', 'Anand', 388001, 'Faculty', 6, 'Assistant Professor', '2019-11-12', 'SSC', 'GHSEB', 2002, 10, 'GHSEB', 'HSC', 2004, 70, '', '', 0000, 0, 'IT', 'SPU', 2008, 8, 'IT', 'GTU', 2010, 8, 'Networks', 'SPU', 2016, 7, '', '', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '2020-09-22 10:35:34.537225');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshopid` int(10) NOT NULL,
  `a_y` year(4) NOT NULL,
  `e_y` year(4) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `nod` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decr` varchar(300) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `role` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `cu_name` varchar(100) DEFAULT NULL,
  `dp_name` varchar(100) DEFAULT NULL,
  `aid` int(10) NOT NULL,
  `typeofwork` varchar(50) NOT NULL DEFAULT 'Workshop',
  `photos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshopid`, `a_y`, `e_y`, `sdate`, `edate`, `nod`, `name`, `decr`, `mode`, `role`, `user`, `cu_name`, `dp_name`, `aid`, `typeofwork`, `photos`, `created_at`) VALUES
(18, 2018, 2019, '2018-10-11', '2018-10-12', 2, 'ZZZAAAA', 'ZZAA', 'Participated', 'Participated', 'Faculties', 'BVM', 'EC', 8, 'Workshop', '0WhatsApp Image 2020-05-11 at 4.44.02 PM.jpeg', '2020-05-22 11:34:37'),
(19, 2019, 2020, '2019-10-05', '2019-10-06', 2, 'IOT', 'Total 20 students', 'Organized', 'Convener', 'Students', 'BVM', 'CE', 8, 'Workshop', '0WhatsApp Image 2020-05-11 at 4.44.02 PM.JPEG', '2020-05-29 09:58:09'),
(20, 2016, 2017, '2016-10-15', '2017-10-20', 5, 'hhhhhhhhhhhhhhh', 'hhh', 'Participated', 'Participated', 'Faculties', 'ADIT', 'Civil', 8, 'Workshop', '0DSC_0012.JPG', '2020-06-01 10:53:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addexp`
--
ALTER TABLE `addexp`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`conid`),
  ADD KEY `faculty` (`aid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `ind_visit`
--
ALTER TABLE `ind_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facul` (`aid`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paperid`),
  ADD KEY `fac_rec` (`aid`);

--
-- Indexes for table `patent`
--
ALTER TABLE `patent`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `facul_rec` (`aid`);

--
-- Indexes for table `reserch_proj`
--
ALTER TABLE `reserch_proj`
  ADD PRIMARY KEY (`projectid`) USING BTREE,
  ADD KEY `faculty_rec` (`aid`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`semid`),
  ADD KEY `fac_relation` (`aid`);

--
-- Indexes for table `sttp_fdp`
--
ALTER TABLE `sttp_fdp`
  ADD PRIMARY KEY (`sttpid`),
  ADD KEY `fac_relation` (`aid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`tid`) USING BTREE,
  ADD KEY `faculty_rec` (`aid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `dept_rec` (`did`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshopid`),
  ADD KEY `fac_relation` (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addexp`
--
ALTER TABLE `addexp`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `conid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ind_visit`
--
ALTER TABLE `ind_visit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `paperid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patent`
--
ALTER TABLE `patent`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reserch_proj`
--
ALTER TABLE `reserch_proj`
  MODIFY `projectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `semid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sttp_fdp`
--
ALTER TABLE `sttp_fdp`
  MODIFY `sttpid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `aid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `workshopid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `aid` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `faculty` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `ind_visit`
--
ALTER TABLE `ind_visit`
  ADD CONSTRAINT `facul` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `fac_rec` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `patent`
--
ALTER TABLE `patent`
  ADD CONSTRAINT `facul_rec` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `reserch_proj`
--
ALTER TABLE `reserch_proj`
  ADD CONSTRAINT `faculty_rec` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `seminars`
--
ALTER TABLE `seminars`
  ADD CONSTRAINT `fac_relation` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `did` FOREIGN KEY (`did`) REFERENCES `department` (`did`);

--
-- Constraints for table `testing`
--
ALTER TABLE `testing`
  ADD CONSTRAINT `fid` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `dept_rec` FOREIGN KEY (`did`) REFERENCES `department` (`did`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `faculty_relation` FOREIGN KEY (`aid`) REFERENCES `user` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
