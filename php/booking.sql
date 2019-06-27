-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 07:45 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `radio` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`radio`, `email`, `password`) VALUES
('HOME', 'a@a.aasdasdasd', 'asd'),
('HOME', 'a@a.a', 'kjasbhdhk'),
('home', 'jeevan@as.asd', 'asd'),
('home', 'jeevan@as.asdasd', 'asdas'),
('HOME', 'saM@AS.ASD', 'ASDAS'),
('HOME', 'jeevan@as.asd', 'ASD'),
('HOME', 'jeevan@as.asd', 'lahqk'),
('HOME', 'raghulrage@gmail.com', 'jkkgaisug');

-- --------------------------------------------------------

--
-- Table structure for table `jsondata`
--

CREATE TABLE `jsondata` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jsondata`
--

INSERT INTO `jsondata` (`id`, `Name`, `email`, `phone`) VALUES
(1, 'pinto', 'pinto@gmail.com', '9791710271'),
(2, 'jeevan', 'jeevan@gmail.com', '9791710271'),
(3, 'jeevan', 'jeevan@gmail.com', '9791710271'),
(4, 'venki', 'venki@gmail.com', '9791710271'),
(5, 'sam', 'sam@gmail.com', '9791710271'),
(6, '', '', ''),
(7, 'sahtgtredfgfdsm', 'sam@gmail.com', '9791710271'),
(8, 'sahtgtredfgfdsm', 'sam@gmail.com', '9791710271');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `radio` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`radio`, `email`, `password`) VALUES
('office', 'a@a.a', 'askjdbgkj'),
('OFFICE', 'OFFICE@OFFICE.COM', 'ASDAS'),
('OFFICE', 'jeeeva@hgsauyg.ausyfuy', 'hjasgjhg');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`) VALUES
(1, 'jeevan');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `email` varchar(100) NOT NULL,
  `psd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`email`, `psd`) VALUES
('asrtyuio@xfg.fghj', 'asd'),
('ajksgvdb', 'jkalbsjk'),
('jeevanjeenu007@gmail.com', 'asd'),
('agsjdg', 'kjagkjsd'),
('asdig', 'asd'),
('asda', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `radio` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`radio`, `email`, `password`) VALUES
('vehicle', 'a@a.a', 'akjsgdk'),
('vehicle', 'raghulrage@gmail.com', 'dhanta'),
('VEHICLE', 'jeevan@as.asdasd', 'asdas'),
('VEHICLE', 'raja@raja.com', 'asdt8tg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jsondata`
--
ALTER TABLE `jsondata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jsondata`
--
ALTER TABLE `jsondata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
