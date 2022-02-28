-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 07:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantox_technology`
--

-- --------------------------------------------------------

--
-- Table structure for table `csm`
--

CREATE TABLE `csm` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `grade_1` int(11) NOT NULL,
  `grade_2` int(11) NOT NULL,
  `grade_3` int(11) NOT NULL,
  `grade_4` int(11) NOT NULL,
  `school_board` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csm`
--

INSERT INTO `csm` (`id`, `name`, `grade_1`, `grade_2`, `grade_3`, `grade_4`, `school_board`) VALUES
(1, 'Michael Johnson', 6, 8, 7, 5, 'csm'),
(2, 'Christine Mudle', 8, 7, 7, 8, 'csm'),
(3, 'Nick Bell', 5, 4, 6, 4, 'csm'),
(4, 'Peter Navas', 8, 9, 8, 9, 'csm'),
(5, 'Nicole Truman', 8, 7, 7, 9, 'csm');

-- --------------------------------------------------------

--
-- Table structure for table `csmb`
--

CREATE TABLE `csmb` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `grade_1` int(11) NOT NULL,
  `grade_2` int(11) NOT NULL,
  `grade_3` int(11) NOT NULL,
  `grade_4` int(11) NOT NULL,
  `school_board` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csmb`
--

INSERT INTO `csmb` (`id`, `name`, `grade_1`, `grade_2`, `grade_3`, `grade_4`, `school_board`) VALUES
(1, 'Jack Cage', 4, 7, 7, 5, 'csmb'),
(2, 'Brad Mc\'Neal', 8, 7, 7, 8, 'csmb'),
(3, 'Jill Robbins', 5, 4, 6, 4, 'csmb'),
(4, 'Anna Lent', 8, 8, 8, 9, 'csmb'),
(5, 'Susanne Hunt', 8, 7, 7, 9, 'csmb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csm`
--
ALTER TABLE `csm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csmb`
--
ALTER TABLE `csmb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csm`
--
ALTER TABLE `csm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `csmb`
--
ALTER TABLE `csmb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
