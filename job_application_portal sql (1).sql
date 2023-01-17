-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 07:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_application_portal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Addjob` (IN `Joblistid` INT(10), IN `Company` VARCHAR(20), IN `Job_title` VARCHAR(20), IN `Skills` VARCHAR(20))   BEGIN
INSERT INTO joblist(Joblistid, Company, Job_title, Skills) values (Joblistid, Company, Job_title, Skills);
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `applied_seekers`
--

CREATE TABLE `applied_seekers` (
  `Joblistid` int(10) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Company` varchar(20) NOT NULL,
  `Job_title` varchar(20) NOT NULL,
  `Skills` varchar(10) NOT NULL,
  `Decision` varchar(20) NOT NULL,
  `Rejection` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_seekers`
--

INSERT INTO `applied_seekers` (`Joblistid`, `User_id`, `Company`, `Job_title`, `Skills`, `Decision`, `Rejection`) VALUES
(8, 'andey', 'Capgemini', 'developer', 'python', '', '');

--
-- Triggers `applied_seekers`
--
DELIMITER $$
CREATE TRIGGER `Rejectseeker` AFTER DELETE ON `applied_seekers` FOR EACH ROW BEGIN
INSERT INTO joblist (Joblistid, Company, Job_title, Skills) 
values (OLD.Joblistid, OLD.Company, OLD.Job_title, OLD.Skills);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `job_decision` AFTER DELETE ON `applied_seekers` FOR EACH ROW BEGIN
INSERT INTO jobdecision (Joblistid,User_id,Company, Job_title,Skills,Decision) 
values (OLD.Joblistid, OLD.User_id, OLD.Company, OLD.Job_title, OLD.skills, "accepted");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `edu`
-- (See below for the actual view)
--
CREATE TABLE `edu` (
`User_id` varchar(20)
,`Education` varchar(20)
,`University` varchar(30)
,`Skills` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `jobdecision`
--

CREATE TABLE `jobdecision` (
  `Joblistid` int(11) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Company` varchar(20) NOT NULL,
  `Job_title` varchar(20) NOT NULL,
  `Skills` varchar(20) NOT NULL,
  `Decision` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobdecision`
--

INSERT INTO `jobdecision` (`Joblistid`, `User_id`, `Company`, `Job_title`, `Skills`, `Decision`) VALUES
(10, 'andey', 'Capgemini', 'developer', 'java', 'accepted'),
(7, '', 'Capgemini', 'developer', 'java', 'accepted'),
(10, '', 'Capgemini', 'developer', 'java', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `joblist`
--

CREATE TABLE `joblist` (
  `Joblistid` int(10) NOT NULL,
  `Company` varchar(20) NOT NULL,
  `Job_title` varchar(20) NOT NULL,
  `Skills` varchar(10) NOT NULL,
  `Applied` varchar(20) DEFAULT NULL,
  `User_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joblist`
--

INSERT INTO `joblist` (`Joblistid`, `Company`, `Job_title`, `Skills`, `Applied`, `User_id`) VALUES
(1, 'Capgemini', 'developer', 'java', NULL, NULL),
(2, 'Capgemini', 'front end', 'angular', NULL, NULL),
(3, 'Capgemini', 'tester', 'java', NULL, NULL),
(4, 'Capgemini', 'developer', 'php', NULL, NULL),
(5, 'Capgemini', 'tester', 'python', NULL, NULL),
(6, 'Capgemini', 'developer', 'python', NULL, NULL),
(7, 'Capgemini', 'developer', 'java', NULL, NULL),
(10, 'Capgemini', 'developer', 'java', NULL, NULL);

--
-- Triggers `joblist`
--
DELIMITER $$
CREATE TRIGGER `apply_job` AFTER DELETE ON `joblist` FOR EACH ROW BEGIN
INSERT INTO applied_seekers (Joblistid,User_id,Company, Job_title,Skills) 
values (OLD.Joblistid, OLD.User_id, OLD.Company, OLD.Job_title, OLD.skills);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker_profile`
--

CREATE TABLE `job_seeker_profile` (
  `User_id` varchar(20) NOT NULL,
  `Email_id` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker_profile`
--

INSERT INTO `job_seeker_profile` (`User_id`, `Email_id`, `Password`, `Gender`, `DOB`) VALUES
('andey', 'andey@gmail.com', 'andey', 'female', '1998-07-08'),
('fayaz', 'fayaz@gmail.com', 'fayaz', 'male', '1998-06-05'),
('manasa', 'manasa@gmail.com', 'manasa', 'female', '1998-01-02'),
('ruthvik', 'ruthvik@gmail.com', 'ruthvik', 'male', '1998-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `User_id` varchar(20) NOT NULL,
  `User_type` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`User_id`, `User_type`, `Password`) VALUES
('abhishek', 'Recruiter', 'abhishek'),
('akhil', 'Recruiter', 'akhil'),
('andey', 'job_seeker', 'andey'),
('fayaz', 'job_seeker', 'fayaz'),
('manasa', 'job_seeker', 'manasa'),
('nithya', 'Recruiter', 'nithya'),
('ruthvik', 'job_seeker', 'ruthvik');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_profile`
--

CREATE TABLE `recruiter_profile` (
  `User_id` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruiter_profile`
--

INSERT INTO `recruiter_profile` (`User_id`, `Email`, `DOB`, `Password`) VALUES
('abhishek', 'abhishek@gmail.com', '1996-08-08', 'abhishek'),
('akhil', 'akhil@gmail.com', '1998-01-12', 'akhil'),
('nithya', 'nithya@gmail.com', '1998-05-05', 'nithya');

-- --------------------------------------------------------

--
-- Table structure for table `seeker_education`
--

CREATE TABLE `seeker_education` (
  `User_id` varchar(20) NOT NULL,
  `Education` varchar(20) NOT NULL,
  `University` varchar(30) NOT NULL,
  `Skills` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker_education`
--

INSERT INTO `seeker_education` (`User_id`, `Education`, `University`, `Skills`) VALUES
('andey', 'masters', 'osu', 'php'),
('andey', 'masters', 'osu', 'php'),
('ruthvik', 'masters', 'osu', 'java'),
('fayaz', 'masters', 'osu', 'java'),
('manasa', 'masters', 'osu', 'php');

-- --------------------------------------------------------

--
-- Structure for view `edu`
--
DROP TABLE IF EXISTS `edu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `edu`  AS SELECT `seeker_education`.`User_id` AS `User_id`, `seeker_education`.`Education` AS `Education`, `seeker_education`.`University` AS `University`, `seeker_education`.`Skills` AS `Skills` FROM `seeker_education``seeker_education`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_seeker_profile`
--
ALTER TABLE `job_seeker_profile`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `recruiter_profile`
--
ALTER TABLE `recruiter_profile`
  ADD PRIMARY KEY (`User_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recruiter_profile`
--
ALTER TABLE `recruiter_profile`
  ADD CONSTRAINT `User_id_fk` FOREIGN KEY (`User_id`) REFERENCES `login_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
