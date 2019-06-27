-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 10:42 AM
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
-- Database: `aggregator`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `name`, `email`, `phone`, `password`, `created_date`, `last_update_date`) VALUES
(1, 'jeevan', 'jeevan@gmail.com', '09876543', 'sdfghjk', '2019-06-15 16:39:19', '2019-06-15 16:39:19'),
(2, 'sma', 'samclason@gmail.com', '2345678', 'sdfghjk', '2019-06-15 16:39:19', '2019-06-15 16:39:19'),
(3, 'raghul', 'raghul@gmail.com', '345678', 'dfghjk', '2019-06-15 16:39:19', '2019-06-15 16:39:19'),
(4, 'venkathesh', 'venketash@gmail.com', '3456789', 'dfghjk', '2019-06-15 16:39:19', '2019-06-15 16:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `customer_shifting_info`
--

CREATE TABLE `customer_shifting_info` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `shifting_id` int(11) DEFAULT NULL,
  `mover_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_shifting_info`
--

INSERT INTO `customer_shifting_info` (`id`, `customer_id`, `shifting_id`, `mover_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 3),
(4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `estimate_info`
--

CREATE TABLE `estimate_info` (
  `estimate_id` int(11) NOT NULL,
  `estimate_amount` varchar(45) DEFAULT NULL,
  `estimate_date` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `laste_update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `items` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `shifting_id` int(11) DEFAULT NULL,
  `current_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `items`, `quantity`, `shifting_id`, `current_date`, `last_update_date`) VALUES
(1, 'Centre-table', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(2, 'Computer-table', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(3, 'Sofa-3-seater', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(4, 'sofa-single-seat', '2', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(5, 'cot', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(6, 'matres', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(7, 'fridge', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59'),
(8, 'washing machine', '1', 1, '2019-06-27 13:53:59', '2019-06-27 13:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `movers`
--

CREATE TABLE `movers` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movers`
--

INSERT INTO `movers` (`id`, `type`, `created_date`, `last_update_date`) VALUES
(1, 'packers and movers', '2019-06-15 16:37:32', '2019-06-15 16:37:32'),
(2, 'moving labor ', '2019-06-15 16:37:32', '2019-06-15 16:37:32'),
(3, 'moving labor boxes and supplies', '2019-06-15 16:37:32', '2019-06-15 16:37:32'),
(4, 'truck rental', '2019-06-15 16:37:32', '2019-06-15 16:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `shifting_info`
--

CREATE TABLE `shifting_info` (
  `id` int(11) NOT NULL,
  `city` varchar(405) DEFAULT NULL,
  `moving_from` varchar(200) DEFAULT NULL,
  `moving_to` varchar(450) DEFAULT NULL,
  `move_size` varchar(450) DEFAULT NULL,
  `moving_date` datetime DEFAULT NULL,
  `is_inspection` tinyint(4) DEFAULT '0',
  `shifting_type` varchar(45) DEFAULT NULL,
  `shifting_sub_type` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shifting_info`
--

INSERT INTO `shifting_info` (`id`, `city`, `moving_from`, `moving_to`, `move_size`, `moving_date`, `is_inspection`, `shifting_type`, `shifting_sub_type`, `created_date`, `last_update_date`) VALUES
(1, 'banglore', 'egpura', 'mysore', '1bhk', '2019-04-12 12:40:22', 0, 'home', 'withincity', '2019-06-15 16:23:31', '2019-06-15 16:23:31'),
(2, '', 'egpura', 'mg road', '2bhk', '2019-04-12 12:40:22', 1, 'home', 'betweencity', '2019-06-15 16:25:10', '2019-06-15 16:25:10'),
(3, NULL, 'egpura', 'whiltefield', NULL, '2019-04-12 12:40:22', 0, 'office', NULL, '2019-06-15 16:26:10', '2019-06-15 16:26:10'),
(4, '', 'pvr', 'imax', NULL, '2019-04-12 12:40:22', 0, 'vehicle', 'car', '2019-06-15 16:27:19', '2019-06-15 16:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_info`
--

CREATE TABLE `vendor_info` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `sub_type` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_shifting_info`
--
ALTER TABLE `customer_shifting_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_info`
--
ALTER TABLE `estimate_info`
  ADD PRIMARY KEY (`estimate_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movers`
--
ALTER TABLE `movers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifting_info`
--
ALTER TABLE `shifting_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_info`
--
ALTER TABLE `vendor_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_shifting_info`
--
ALTER TABLE `customer_shifting_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estimate_info`
--
ALTER TABLE `estimate_info`
  MODIFY `estimate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movers`
--
ALTER TABLE `movers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shifting_info`
--
ALTER TABLE `shifting_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_info`
--
ALTER TABLE `vendor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
