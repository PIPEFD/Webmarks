-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2018 a las 01:08:14
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webmarks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistance`
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
-- Estructura de tabla para la tabla `attendant`
--

CREATE TABLE `attendant` (
  `kindship_id_kindship` varchar(5) NOT NULL,
  `user_id_user_attendant` varchar(15) NOT NULL,
  `user_document_type_cod_document` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attendant`
--

INSERT INTO `attendant` (`kindship_id_kindship`, `user_id_user_attendant`, `user_document_type_cod_document`) VALUES
('B', '10223312', 'CC'),
('F', '10223316', 'CC'),
('G', '10223347', 'CC'),
('M', '10223348', 'CC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_type`
--

CREATE TABLE `document_type` (
  `cod_document` varchar(3) NOT NULL,
  `desc_document` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `document_type`
--

INSERT INTO `document_type` (`cod_document`, `desc_document`) VALUES
('CC', 'Cedula_Ciudadania'),
('CE', 'Cedula_Extranjeria'),
('TI', 'Tarjeta_identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grade`
--

CREATE TABLE `grade` (
  `desc_grade` int(11) NOT NULL,
  `state_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grade`
--

INSERT INTO `grade` (`desc_grade`, `state_grade`) VALUES
(102, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kindship`
--

CREATE TABLE `kindship` (
  `id_kindship` varchar(5) NOT NULL,
  `desc_kindship` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kindship`
--

INSERT INTO `kindship` (`id_kindship`, `desc_kindship`) VALUES
('B', 'brother'),
('F', 'Father'),
('G', 'grand'),
('M', 'Mother');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matter`
--

CREATE TABLE `matter` (
  `name_matter` varchar(25) NOT NULL,
  `state_matter` int(11) NOT NULL,
  `teacher_user_id_user` varchar(15) NOT NULL,
  `teacher_user_document_type_cod_document` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matter`
--

INSERT INTO `matter` (`name_matter`, `state_matter`, `teacher_user_id_user`, `teacher_user_document_type_cod_document`) VALUES
('science', 1, '10223312', 'CC'),
('spanish', 1, '10223312', 'CC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matter_has_grade`
--

CREATE TABLE `matter_has_grade` (
  `matter_name_matter` varchar(25) NOT NULL,
  `grade_desc_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `cod_role` varchar(5) NOT NULL,
  `desc_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_question`
--

CREATE TABLE `security_question` (
  `num_question` int(11) NOT NULL,
  `question` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `security_question`
--

INSERT INTO `security_question` (`num_question`, `question`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
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
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `user_id_user_teacher` varchar(15) NOT NULL,
  `user_document_type_cod_document_teacher` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`user_id_user_teacher`, `user_document_type_cod_document_teacher`) VALUES
('10223312', 'CC'),
('10223313', 'TI'),
('10223314', 'CC'),
('10223315', 'CE'),
('10223316', 'CC'),
('10223317', 'CE'),
('10223318', 'CC'),
('10223347', 'CC'),
('10223348', 'CC'),
('10223349', 'TI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
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
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `second_name`, `first_last_name`, `second_last_name`, `address`, `phone`, `e_mail`, `document_type_cod_document_user`, `security_question_num_question`, `answer`) VALUES
('10223312', 'jose', NULL, 'isaacs', NULL, '', 0, '', 'CC', 1, ''),
('10223313', 'ana', NULL, 'munar', NULL, '', 0, '', 'TI', 1, ''),
('10223314', 'lory', NULL, 'galan', NULL, '', 0, '', 'CC', 1, ''),
('10223315', 'zara', NULL, 'benavides', NULL, '', 0, '', 'CE', 1, ''),
('10223316', 'sebastian', NULL, 'gomez', NULL, '', 0, '', 'CC', 1, ''),
('10223317', 'laura', NULL, 'lombada', NULL, '', 0, '', 'CE', 1, ''),
('10223318', 'jorge', NULL, 'ricaurte', NULL, '', 0, '', 'CC', 1, ''),
('10223347', 'pedro', NULL, 'galan', NULL, '', 0, '', 'CC', 1, ''),
('10223348', 'manuel', NULL, 'cuba', NULL, '', 0, '', 'CC', 1, ''),
('10223349', 'carl', NULL, 'mena', NULL, '', 0, '', 'TI', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_role`
--

CREATE TABLE `user_has_role` (
  `user_id_user_role` varchar(15) NOT NULL,
  `user_document_type_cod_document_user_has_role` varchar(3) NOT NULL,
  `role_cod_role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`cod_assistance`),
  ADD KEY `assistance_student` (`student_user_id_user`,`student_user_document_type_cod_document`),
  ADD KEY `assistance_matter_has_grade` (`matter_has_grade_matter_name_matter`,`matter_has_grade_grade_desc_grade`);

--
-- Indices de la tabla `attendant`
--
ALTER TABLE `attendant`
  ADD PRIMARY KEY (`user_id_user_attendant`,`user_document_type_cod_document`),
  ADD KEY `attendant_kindship` (`kindship_id_kindship`);

--
-- Indices de la tabla `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`cod_document`);

--
-- Indices de la tabla `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`desc_grade`);

--
-- Indices de la tabla `kindship`
--
ALTER TABLE `kindship`
  ADD PRIMARY KEY (`id_kindship`);

--
-- Indices de la tabla `matter`
--
ALTER TABLE `matter`
  ADD PRIMARY KEY (`name_matter`),
  ADD KEY `matter_teacher` (`teacher_user_id_user`,`teacher_user_document_type_cod_document`);

--
-- Indices de la tabla `matter_has_grade`
--
ALTER TABLE `matter_has_grade`
  ADD PRIMARY KEY (`matter_name_matter`,`grade_desc_grade`),
  ADD KEY `matter_has_grade_grade` (`grade_desc_grade`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`cod_role`);

--
-- Indices de la tabla `security_question`
--
ALTER TABLE `security_question`
  ADD PRIMARY KEY (`num_question`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id_user_student`,`user_document_type_cod_document_student`),
  ADD KEY `student_attendant` (`attendant_user_id_user`,`attendant_user_document_type_cod_document`),
  ADD KEY `student_grade` (`grade_desc_grade_student`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`user_id_user_teacher`,`user_document_type_cod_document_teacher`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`document_type_cod_document_user`),
  ADD KEY `user_document_type` (`document_type_cod_document_user`),
  ADD KEY `user_security_question` (`security_question_num_question`);

--
-- Indices de la tabla `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD PRIMARY KEY (`user_id_user_role`,`user_document_type_cod_document_user_has_role`,`role_cod_role`),
  ADD KEY `user_has_role_role` (`role_cod_role`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD CONSTRAINT `assistance_matter_has_grade` FOREIGN KEY (`matter_has_grade_matter_name_matter`,`matter_has_grade_grade_desc_grade`) REFERENCES `matter_has_grade` (`matter_name_matter`, `grade_desc_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistance_student` FOREIGN KEY (`student_user_id_user`,`student_user_document_type_cod_document`) REFERENCES `student` (`user_id_user_student`, `user_document_type_cod_document_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `attendant`
--
ALTER TABLE `attendant`
  ADD CONSTRAINT `attendant_kindship` FOREIGN KEY (`kindship_id_kindship`) REFERENCES `kindship` (`id_kindship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendant_user` FOREIGN KEY (`user_id_user_attendant`,`user_document_type_cod_document`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matter`
--
ALTER TABLE `matter`
  ADD CONSTRAINT `matter_teacher` FOREIGN KEY (`teacher_user_id_user`,`teacher_user_document_type_cod_document`) REFERENCES `teacher` (`user_id_user_teacher`, `user_document_type_cod_document_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matter_has_grade`
--
ALTER TABLE `matter_has_grade`
  ADD CONSTRAINT `matter_has_grade_grade` FOREIGN KEY (`grade_desc_grade`) REFERENCES `grade` (`desc_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matter_has_grade_matter` FOREIGN KEY (`matter_name_matter`) REFERENCES `matter` (`name_matter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_attendant` FOREIGN KEY (`attendant_user_id_user`,`attendant_user_document_type_cod_document`) REFERENCES `attendant` (`user_id_user_attendant`, `user_document_type_cod_document`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_grade` FOREIGN KEY (`grade_desc_grade_student`) REFERENCES `grade` (`desc_grade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_user` FOREIGN KEY (`user_id_user_student`,`user_document_type_cod_document_student`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_user` FOREIGN KEY (`user_id_user_teacher`,`user_document_type_cod_document_teacher`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_document_type` FOREIGN KEY (`document_type_cod_document_user`) REFERENCES `document_type` (`cod_document`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_security_question` FOREIGN KEY (`security_question_num_question`) REFERENCES `security_question` (`num_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_has_role`
--
ALTER TABLE `user_has_role`
  ADD CONSTRAINT `user_has_role_role` FOREIGN KEY (`role_cod_role`) REFERENCES `role` (`cod_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_role_user` FOREIGN KEY (`user_id_user_role`,`user_document_type_cod_document_user_has_role`) REFERENCES `user` (`id_user`, `document_type_cod_document_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
