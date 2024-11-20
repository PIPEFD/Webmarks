-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 09:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistance`
--

CREATE TABLE `assistance` (
  `cod_assistance` int(11) NOT NULL,
  `date_assistance` datetime NOT NULL,
  `student_user_id_user` varchar(15) NOT NULL,
  `student_user_document_type_cod_document` varchar(3) NOT NULL,
  `matter_has_grade_matter_name_matter` varchar(25) NOT NULL,
  `matter_has_grade_grade_desc_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendant`
--

CREATE TABLE `attendant` (
  `kindship_id_kindship` varchar(5) NOT NULL,
  `user_id_user_attendant` varchar(15) NOT NULL,
  `user_document_type_cod_document` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendant`
--

INSERT INTO `attendant` (`kindship_id_kindship`, `user_id_user_attendant`, `user_document_type_cod_document`) VALUES
('ff', '10223313', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `cod_document` varchar(3) NOT NULL,
  `desc_document` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`cod_document`, `desc_document`) VALUES
('CC', 'CEDULA_CIUDADANIA'),
('CE', 'Cedula_Extranjeria'),
('TI', 'Tarjeta_identidad');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `desc_grade` int(11) NOT NULL,
  `state_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`desc_grade`, `state_grade`) VALUES
(101, 1),
(103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kindship`
--

CREATE TABLE `kindship` (
  `id_kindship` varchar(5) NOT NULL,
  `desc_kindship` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kindship`
--

INSERT INTO `kindship` (`id_kindship`, `desc_kindship`) VALUES
('ff', 'Father'),
('G', 'grand'),
('M', 'Mother'),
('p', 'loco');

-- --------------------------------------------------------

--
-- Table structure for table `matter`
--

CREATE TABLE `matter` (
  `name_matter` varchar(25) NOT NULL,
  `state_matter` int(11) NOT NULL,
  `teacher_user_id_user` varchar(15) NOT NULL,
  `teacher_user_document_type_cod_document` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matter`
--

INSERT INTO `matter` (`name_matter`, `state_matter`, `teacher_user_id_user`, `teacher_user_document_type_cod_document`) VALUES
('English11', 1, '10223317', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `matter_has_grade`
--

CREATE TABLE `matter_has_grade` (
  `matter_name_matter` varchar(25) NOT NULL,
  `grade_desc_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `cod_role` varchar(5) NOT NULL,
  `desc_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `security_question`
--

CREATE TABLE `security_question` (
  `num_question` int(11) NOT NULL,
  `question` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_question`
--

INSERT INTO `security_question` (`num_question`, `question`) VALUES
(1, 'a'),
(2, 'baa'),
(3, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id_user_student` varchar(15) NOT NULL,
  `user_document_type_cod_document_student` varchar(3) NOT NULL,
  `attendant_user_id_user` varchar(15) NOT NULL,
  `attendant_user_document_type_cod_document` varchar(3) NOT NULL,
  `grade_desc_grade_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id_user_teacher` varchar(15) NOT NULL,
  `user_document_type_cod_document_teacher` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id_user_teacher`, `user_document_type_cod_document_teacher`) VALUES
('10223317', 'CE'),
('10223349', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `first_last_name` varchar(20) NOT NULL,
  `second_last_name` varchar(20) DEFAULT NULL,
  `address` varchar(45) NOT NULL,
  `phone` int(15) NOT NULL,
  `e_mail` varchar(45) NOT NULL,
  `document_type_cod_document_user` varchar(3) NOT NULL,
  `security_question_num_question` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `second_name`, `first_last_name`, `second_last_name`, `address`, `phone`, `e_mail`, `document_type_cod_document_user`, `security_question_num_question`, `answer`, `password`) VALUES
('10223222', 'prueba', '', 'prueba', '', 'aaa', 123, '', 'CC', 1, '1', 'hey'),
('10223313', 'ana', NULL, 'munar', NULL, '', 0, '', 'TI', 1, '', NULL),
('10223315', 'zara', NULL, 'benavides', NULL, '', 0, '', 'CE', 1, '', NULL),
('10223317', 'laura', NULL, 'lombada', NULL, '', 0, '', 'CE', 1, '', NULL),
('10223349', 'carl', NULL, 'mena', NULL, '', 0, '', 'TI', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_role`
--

CREATE TABLE `user_has_role` (
  `user_id_user_role` varchar(15) NOT NULL,
  `user_document_type_cod_document_user_has_role` varchar(3) NOT NULL,
  `role_cod_role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`cod_assistance`),
  ADD KEY `assistance_student` (`student_user_id_user`,`student_user_document_type_cod_document`),
  ADD KEY `assistance_matter_has_grade` (`matter_has_grade_matter_name_matter`,`matter_has_grade_grade_desc_grade`);

--
-- Indexes for table `attendant`
--
ALTER TABLE `attendant`
  ADD PRIMARY KEY (`user_id_user_attendant`,`user_document_type_cod_document`),
  ADD KEY `attendant_kindship` (`kindship_id_kindship`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`cod_document`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`desc_grade`);

--
-- Indexes for table `kindship`
--
ALTER TABLE `kindship`
  ADD PRIMARY KEY (`id_kindship`);

--
-- Indexes for table `matter`
--
ALTER TABLE `matter`
  ADD PRIMARY KEY (`name_matter`),
  ADD KEY `matter_teacher` (`teacher_user_id_user`,`teacher_user_document_type_cod_document`);

--
-- Indexes for table `matter_has_grade`
--
ALTER TABLE `matter_has_grade`
  ADD PRIMARY KEY (`matter_name_matter`,`grade_desc_grade`),
  ADD KEY `matter_has_grade_grade` (`grade_desc_grade`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`cod_role`);

--
-- Indexes for table `security_question`
--
ALTER TABLE `security_question`
  ADD PRIMARY KEY (`num_question`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id_user_student`,`user_document_type_cod_document_student`),
  ADD KEY `student_attendant` (`attendant_user_id_user`,`attendant_user_document_type_cod_document`),
  ADD KEY `student_grade` (`grade_desc_grade_student`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id_user_teacher`,`user_document_type_cod_document_teacher`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`document_type_cod_document_user`),
  ADD KEY `user_document_type` (`document_type_cod_document_user`),
  ADD KEY `user_security_question` (`security_question_num_question`);

--
-- Indexes for table `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD PRIMARY KEY (`user_id_user_role`,`user_document_type_cod_document_user_has_role`,`role_cod_role`),
  ADD KEY `user_has_role_role` (`role_cod_role`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assistance`
--
ALTER TABLE `assistance`
  ADD CONSTRAINT `assistance_matter_has_grade` FOREIGN KEY (`matter_has_grade_matter_name_matter`,`matter_has_grade_grade_desc_grade`) REFERENCES `matter_has_grade` (`matter_name_matter`, `grade_desc_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistance_student` FOREIGN KEY (`student_user_id_user`,`student_user_document_type_cod_document`) REFERENCES `student` (`user_id_user_student`, `user_document_type_cod_document_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendant`
--
ALTER TABLE `attendant`
  ADD CONSTRAINT `attendant_kindship` FOREIGN KEY (`kindship_id_kindship`) REFERENCES `kindship` (`id_kindship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendant_user` FOREIGN KEY (`user_id_user_attendant`,`user_document_type_cod_document`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matter`
--
ALTER TABLE `matter`
  ADD CONSTRAINT `matter_teacher` FOREIGN KEY (`teacher_user_id_user`,`teacher_user_document_type_cod_document`) REFERENCES `teacher` (`user_id_user_teacher`, `user_document_type_cod_document_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matter_has_grade`
--
ALTER TABLE `matter_has_grade`
  ADD CONSTRAINT `matter_has_grade_grade` FOREIGN KEY (`grade_desc_grade`) REFERENCES `grade` (`desc_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matter_has_grade_matter` FOREIGN KEY (`matter_name_matter`) REFERENCES `matter` (`name_matter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_attendant` FOREIGN KEY (`attendant_user_id_user`,`attendant_user_document_type_cod_document`) REFERENCES `attendant` (`user_id_user_attendant`, `user_document_type_cod_document`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_grade` FOREIGN KEY (`grade_desc_grade_student`) REFERENCES `grade` (`desc_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_user` FOREIGN KEY (`user_id_user_student`,`user_document_type_cod_document_student`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_user` FOREIGN KEY (`user_id_user_teacher`,`user_document_type_cod_document_teacher`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_document_type` FOREIGN KEY (`document_type_cod_document_user`) REFERENCES `document_type` (`cod_document`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_security_question` FOREIGN KEY (`security_question_num_question`) REFERENCES `security_question` (`num_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD CONSTRAINT `user_has_role_role` FOREIGN KEY (`role_cod_role`) REFERENCES `role` (`cod_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_role_user` FOREIGN KEY (`user_id_user_role`,`user_document_type_cod_document_user_has_role`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
