-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 05:53 AM
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
-- Table structure for table `doc_type`
--

CREATE TABLE `doc_type` (
  `tdoc` varchar(5) NOT NULL,
  `desc_tdoc` varchar(45) DEFAULT NULL,
  `tdoc_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`tdoc`, `desc_tdoc`, `tdoc_status`) VALUES
('CC', 'Cedula_Ciudadania', 1),
('CE', 'Cedula_Extranjeria', 1),
('TI', 'Tarjeta_identidad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `fk_tdoc_prt` varchar(5) NOT NULL,
  `id_us_prt` bigint(20) NOT NULL,
  `fk_parentship` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`fk_tdoc_prt`, `id_us_prt`, `fk_parentship`) VALUES
('CC', 1234, 'hermano'),
('CC', 2222, 'madre'),
('CC', 12345, 'padre');

-- --------------------------------------------------------

--
-- Table structure for table `parentship`
--

CREATE TABLE `parentship` (
  `id_parentship` varchar(30) NOT NULL,
  `parentship_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentship`
--

INSERT INTO `parentship` (`id_parentship`, `parentship_status`) VALUES
('hermano', 0),
('madre', 1),
('padre', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fk_tdoc` varchar(5) NOT NULL,
  `id_us` bigint(20) NOT NULL,
  `nombre_us` varchar(45) DEFAULT NULL,
  `apellido_us` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fk_tdoc`, `id_us`, `nombre_us`, `apellido_us`, `direccion`) VALUES
('CC', 1234, 'Jose', 'Antonio', 'Calle12'),
('CE', 2222, 'Pedro', 'Anastasio', 'Trasnversal1'),
('CC', 12345, 'Marco', 'Aurelio', 'Carrera1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`tdoc`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id_us_prt`,`fk_tdoc_prt`),
  ADD KEY `llave2` (`fk_tdoc_prt`),
  ADD KEY `llave4` (`fk_parentship`);

--
-- Indexes for table `parentship`
--
ALTER TABLE `parentship`
  ADD PRIMARY KEY (`id_parentship`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_us`,`fk_tdoc`),
  ADD KEY `llave1` (`fk_tdoc`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `llave2` FOREIGN KEY (`fk_tdoc_prt`) REFERENCES `user` (`fk_tdoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `llave3` FOREIGN KEY (`id_us_prt`) REFERENCES `user` (`id_us`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `llave4` FOREIGN KEY (`fk_parentship`) REFERENCES `parentship` (`id_parentship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `llave1` FOREIGN KEY (`fk_tdoc`) REFERENCES `doc_type` (`tdoc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
