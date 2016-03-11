-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2016 at 07:22 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsample`
--
CREATE DATABASE IF NOT EXISTS `dbsample` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbsample`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`loginId`),
  UNIQUE KEY `loginId` (`loginId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginId`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin'),
(2, 'raj', 'raj');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(120) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `admission_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_roll_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MasterCourseId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_category_id` int(11) DEFAULT NULL,
  `address_line1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immediate_contact_id` int(11) DEFAULT NULL,
  `is_sms_enabled` tinyint(1) DEFAULT '1',
  `photo_file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_data` longblob,
  `status_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `has_paid_fees` tinyint(1) DEFAULT '0',
  `photo_file_size` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_students_on_admission_no` (`admission_no`(10)),
  KEY `index_students_on_first_name_and_middle_name_and_last_name` (`first_name`(10),`middle_name`(10),`last_name`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uid`, `parent_id`, `admission_no`, `class_roll_no`, `admission_date`, `first_name`, `middle_name`, `last_name`, `MasterCourseId`, `CourseId`, `batch_id`, `date_of_birth`, `gender`, `blood_group`, `birth_place`, `nationality_id`, `language`, `religion`, `student_category_id`, `address_line1`, `address_line2`, `city`, `state`, `pin_code`, `country_id`, `phone1`, `phone2`, `email`, `immediate_contact_id`, `is_sms_enabled`, `photo_file_name`, `photo_content_type`, `photo_data`, `status_description`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `has_paid_fees`, `photo_file_size`, `user_id`) VALUES
(1, 1, 6, '2222', '22222', '0022-02-22', 'Rakesh', 'Ramesh', 'Suresh', 2, 3, 3, '0003-03-31', 'male', 'a+', 'pune', 2, 'hindi', 'hindu', 3, 'sss', 'sss', 'ss', 'ss', '3433', 3, '3', '333', '3sdf', 333, 1, 'fd', 'sdf', NULL, 'sdf', 0, 1, '0001-11-11 00:00:00', '0111-11-11 00:00:00', 1, 1, 1),
(2, 1, 4, '2222', '5', '0022-02-22', 'Fharuk', 'Ahmad', 'Shaikh', 1, 3, 1, '0003-03-31', 'male', 'a+', 'pune', 2, 'hindi', 'hindu', 3, 'sss', 'sss', 'ss', 'ss', '3433', 3, '3', '333', '3sdf', 333, 1, 'fd', 'sdf', NULL, 'sdf', 1, 1, '0001-11-11 00:00:00', '0111-11-11 00:00:00', 1, 1, 1),
(3, 1, 2, '2222', '22222', '0022-02-22', 'Kumar', 'Narayan', 'Bhumpaga', 1, 1, 3, '0003-03-31', 'male', 'a+', 'pune', 2, 'hindi', 'hindu', 3, 'sss', 'sss', 'ss', 'ss', '3433', 3, '3', '333', '3sdf', 333, 1, 'fd', 'sdf', NULL, 'sdf', 0, 1, '0001-11-11 00:00:00', '0111-11-11 00:00:00', 1, 1, 1),
(4, 1, 4, '2222', '22222', '0022-02-22', 'Swati', 'Ramesh', 'Dongil', 2, 4, 3, '0003-03-31', 'male', 'a+', 'pune', 2, 'hindi', 'hindu', 3, 'sss', 'sss', 'ss', 'ss', '3433', 3, '3', '333', '3sdf', 333, 1, 'fd', 'sdf', NULL, 'sdf', 1, 1, '0000-00-00 00:00:00', '0111-11-11 00:00:00', 1, 1, 1),
(5, 1, 3, '2222', '8', '0022-02-22', 'cxvbfd', 'vcbcvht', 'two', 3, 2, 1, '0003-03-31', 'male', 'a+', 'pune', 2, 'hindi', 'hindu', 3, 'sss', 'sss', 'ss', 'ss', '3433', 3, '3', '333', '3sdf', 333, 1, 'fd', 'sdf', NULL, 'sdf', 0, 1, '0001-11-11 00:00:00', '0111-11-11 00:00:00', 1, 1, 1),
(7, 2, 4, '4', '4', '2015-12-03', 'typing', NULL, NULL, 1, 1, 2, '2015-12-11', 'male', 'a+', 'solapur', 3, 'marathi', 'hindu', 2, 'eee', 'eee', 'dfdf', 'd', '44', 344, '435454', '34646', 'sedde@gmail.com', 444, 1, 'dg', 'dfg', NULL, '5t5egreg', 1, 0, '2015-12-16 00:00:00', '2015-12-17 00:00:00', 0, 4444, 2),
(8, 1, 1, '2222', '22222', '0022-02-22', 'twodd', 'two', 'twoddsv', 3, 4, 3, '0003-03-31', 'male', 'a+', 'pune', 2, 'hindi', 'hindu', 3, 'sss', 'sss', 'ss', 'ss', '3433', 3, '3', '333', '3sdf', 333, 1, 'fd', 'sdf', NULL, 'sdf', 0, 1, '0001-11-11 00:00:00', '0111-11-11 00:00:00', 1, 1, 1),
(9, 3, 3, '5', '5', '2015-12-02', 'ddddf', 'dd', 'dfgfg', 2, 2, 2, '2015-12-03', 'female', 'dfg', 'fdg', 34, '4dfgfd', 'dfg', 34, 'dfg', 'dfg', 'dfg', 'dfg', '34543', 4, 'dfgd', 'dfgd', 'ar', 45345435, 1, 'rfte', 'derg', NULL, 'dfg', 1, 0, '2015-12-10 00:00:00', '2015-12-15 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `no_exams` tinyint(1) DEFAULT '0',
  `max_weekly_classes` int(11) DEFAULT NULL,
  `elective_group_id` int(11) DEFAULT NULL,
  `PracticalClasses` int(11) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_subjects_on_batch_id_and_elective_group_id_and_is_deleted` (`batch_id`,`elective_group_id`,`is_deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `batch_id`, `no_exams`, `max_weekly_classes`, `elective_group_id`, `PracticalClasses`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'C Programming', 'C', 3, 0, 6, 0, 0, 0, '2015-11-24 00:00:00', NULL),
(2, 'SP', 'Subj1', 2, 0, 2, 0, 324, 0, '2015-12-02 00:00:00', NULL),
(3, 'Cpp', 'C++', 3, 0, 5, 0, 0, 0, '2015-12-04 00:00:00', NULL),
(4, 'Mech', 'ME', 3, 0, 5, 0, 3, 0, '2015-12-02 00:00:00', NULL),
(5, 'CPP', 'cppp', 2, 0, 4, 0, 2, 0, '2015-12-02 00:00:00', NULL),
(7, 'GS', 'sdf', 2, 0, 43, 0, 4, 0, '2015-12-03 00:00:00', NULL),
(8, 'NK', '4', 1, 0, 4, 0, 3, 0, '2015-12-03 00:00:00', NULL),
(9, 'PK', '4', 3, 0, 34, 0, 3, 0, '2015-12-03 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblassessments`
--

CREATE TABLE IF NOT EXISTS `tblassessments` (
  `assessmentId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assessmentName` varchar(200) NOT NULL,
  `Overallpercentage` int(11) NOT NULL,
  PRIMARY KEY (`assessmentId`),
  UNIQUE KEY `assessmentId` (`assessmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblassessments`
--

INSERT INTO `tblassessments` (`assessmentId`, `assessmentName`, `Overallpercentage`) VALUES
(1, 'Final Exam', 50),
(2, 'Test', 15),
(3, 'Quizzes', 5),
(4, 'Assignments', 10),
(5, 'Project', 20),
(6, 'Special', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcalculatescore`
--

CREATE TABLE IF NOT EXISTS `tblcalculatescore` (
  `calculatescoreId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assessmentId` int(11) NOT NULL,
  `Co1` int(11) DEFAULT NULL,
  `Co2` int(11) DEFAULT NULL,
  `Co3` int(11) DEFAULT NULL,
  `Co4` int(11) DEFAULT NULL,
  `Co5` int(11) DEFAULT NULL,
  `Co6` int(11) DEFAULT NULL,
  `Co7` int(11) DEFAULT NULL,
  PRIMARY KEY (`calculatescoreId`),
  UNIQUE KEY `calculatescoreId` (`calculatescoreId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcalculatescore`
--

INSERT INTO `tblcalculatescore` (`calculatescoreId`, `assessmentId`, `Co1`, `Co2`, `Co3`, `Co4`, `Co5`, `Co6`, `Co7`) VALUES
(1, 1, NULL, 20, 40, 40, NULL, NULL, NULL),
(2, 2, 30, 30, 40, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomatrix`
--

CREATE TABLE IF NOT EXISTS `tblcomatrix` (
  `assessmentsId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Co1` int(11) DEFAULT NULL,
  `Co2` int(11) DEFAULT NULL,
  `Co3` int(11) DEFAULT NULL,
  `Co4` int(11) DEFAULT NULL,
  `Co5` int(11) DEFAULT NULL,
  `Co6` int(11) DEFAULT NULL,
  `Co7` int(11) DEFAULT NULL,
  `Co8` int(11) DEFAULT NULL,
  `Co9` int(11) DEFAULT NULL,
  `Co10` int(11) DEFAULT NULL,
  PRIMARY KEY (`assessmentsId`),
  UNIQUE KEY `assessmentsId` (`assessmentsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblcomatrix`
--

INSERT INTO `tblcomatrix` (`assessmentsId`, `Co1`, `Co2`, `Co3`, `Co4`, `Co5`, `Co6`, `Co7`, `Co8`, `Co9`, `Co10`) VALUES
(1, NULL, 20, 40, 40, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 30, 30, 40, NULL, NULL, NULL, 20, NULL, 50, NULL),
(3, 30, NULL, 20, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 50, 10, NULL, 30, NULL, NULL, 20, NULL, 70),
(6, 30, NULL, 20, NULL, NULL, 20, NULL, NULL, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcoscore`
--

CREATE TABLE IF NOT EXISTS `tblcoscore` (
  `coscoreId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `Co1` int(11) DEFAULT NULL,
  `Co2` int(11) DEFAULT NULL,
  `Co3` int(11) DEFAULT NULL,
  `Co4` int(11) DEFAULT NULL,
  `Co5` int(11) DEFAULT NULL,
  `Co6` int(11) DEFAULT NULL,
  `Co7` int(11) DEFAULT NULL,
  PRIMARY KEY (`coscoreId`),
  UNIQUE KEY `coscoreId` (`coscoreId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblcoscore`
--

INSERT INTO `tblcoscore` (`coscoreId`, `studentId`, `subjectId`, `Co1`, `Co2`, `Co3`, `Co4`, `Co5`, `Co6`, `Co7`) VALUES
(3, 1, 1, 30, NULL, 50, NULL, NULL, 70, 80),
(4, 2, 1, 30, NULL, 50, 33, NULL, 70, 80),
(5, 5, 3, 10, 30, 0, 50, 0, 60, 70),
(6, 5, 5, 10, 30, 0, 50, 0, 60, 70),
(7, 4, 2, 20, 60, 0, 40, 0, 60, 10),
(8, 3, 2, 40, 0, 50, 50, 0, 0, 40),
(9, 5, 1, 60, 40, 0, 0, 20, 10, 10),
(10, 1, 2, 45, 0, 0, 56, 0, 0, 45),
(11, 1, 3, 20, 20, 20, 20, 20, 20, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
