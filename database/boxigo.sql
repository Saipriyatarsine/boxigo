-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2019 at 07:48 AM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: boxigo
--

-- --------------------------------------------------------

--
-- Table structure for table customers
--

CREATE TABLE customers (
  user_id varchar(120) NOT NULL,
  first_name varchar(120) NOT NULL,
  last_name varchar(120) NOT NULL,
  email varchar(120) NOT NULL,
  phone varchar(120) NOT NULL,
  verification_key varchar(120) NOT NULL,
  is_email_verified varchar(20) NOT NULL DEFAULT 'no',
  is_phone_verified varchar(20) NOT NULL DEFAULT 'no',
  date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table customers
--

INSERT INTO customers (user_id, first_name, last_name, email, phone, verification_key, is_email_verified, is_phone_verified, date_created) VALUES
('B15693', 'Edwin', 'L', 'edwinl182@gmail.com', '9738211850', 'bb77240976f059061dcef262ed22eb8a', 'no', 'no', '2019-08-10 04:55:11'),
('B18034', 'Sam', 'Cladson', 'samgladson20@gmail.com', '1234567890', '4ef2df518a849f30b4c00136a4e06acc', 'no', 'no', '2019-08-10 18:56:34'),
('B58214', 'Sam', 'Cladson', 'samcladson01@gmail.com', '8300656107', 'be2c8909704cc170616a78d4750c019e', 'no', 'no', '2019-08-10 18:51:31'),
('B68172', 'Raghul', 'T', 'raghulrage@gmail.com', '8428616811', '79d87c6616b920cd29a125beb66b32f4', 'no', 'no', '2019-08-11 07:58:39'),
('B72756', 'Ignatious', 'pinto', 'pintoignatious@gmail.com', '9632180650', '1f3b4b719c6eacf7ac36f69761fa6c2a', 'no', 'no', '2019-08-09 15:36:36'),
('B79920', 'sam', 'Cladson', 'samnishanth01@gmail.com', '7397567680', 'a95da3e983d24c8d11eb3a0e45ae1f70', 'no', 'no', '2019-08-10 19:19:09'),
('B96719', 'Sam', 'Cladson', 'samcladson08@gmail.com', '7397567689', '5e95e9ddbb6ba8f4cfe7525fcce9e4f4', 'no', 'no', '2019-08-10 18:49:19');

-- --------------------------------------------------------

--
-- Table structure for table estimate
--

CREATE TABLE estimate (
  estimate_id varchar(121) NOT NULL,
  user_id varchar(121) NOT NULL,
  moving_from varchar(121) NOT NULL,
  moving_to varchar(121) NOT NULL,
  moving_on varchar(121) NOT NULL,
  property_size varchar(121) NOT NULL,
  old_floor_no int(11) NOT NULL,
  new_floor_no int(11) NOT NULL,
  old_elevator_availability varchar(50) NOT NULL,
  new_elevator_availability varchar(50) NOT NULL,
  old_parking_distance int(11) NOT NULL,
  new_parking_distance int(11) NOT NULL,
  items text NOT NULL,
  total_items int(11) NOT NULL,
  service_type varchar(121) NOT NULL,
  notification_sent int(11) NOT NULL DEFAULT '0',
  status int(11) NOT NULL DEFAULT '1',
  date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table service_type
--

CREATE TABLE service_type (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(140) NOT NULL DEFAULT '',
  display_name varchar(140) NOT NULL DEFAULT '',
  service_info text NOT NULL,
  created_date datetime NOT NULL DEFAULT current_timestamp(),
  last_update_date datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
--
-- Dumping data for table service_type
--

INSERT INTO service_type (id, name, display_name, service_info, created_date, last_update_date) VALUES
(1, 'economy', 'Economy', '[\"500+ Shiftings\",\"8+ Years Experience\"]', '2019-08-09 23:00:16', '2019-08-10 07:45:37'),
(2, 'premium', 'Premium', '[\"ISO Certified\",\"1000+ Shiftings\",\"10+ Years Experience\"]', '2019-08-09 23:00:16', '2019-08-10 07:47:06'),
(3, 'elite', 'Elite', '[\"ISO Certified\",\"IBA Approved\",\"1500+ Shiftings\",\"20+ Years Experience\"]', '2019-08-09 23:00:16', '2019-08-10 07:47:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table customers
--
ALTER TABLE customers
  ADD PRIMARY KEY (user_id),
  ADD UNIQUE KEY email (email),
  ADD UNIQUE KEY phone (phone);

--
-- Indexes for table estimate
--
ALTER TABLE estimate
  ADD PRIMARY KEY (estimate_id);

--
-- Indexes for table service_type
--
ALTER TABLE service_type
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY name (name),
  ADD UNIQUE KEY display_name (display_name);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table service_type
--
ALTER TABLE service_type
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;



CREATE TABLE vendor (
  id int(11) NOT NULL AUTO_INCREMENT,
  business_name varchar(245) DEFAULT NULL,
  activation_date datetime DEFAULT NULL,
  contact_address varchar(245) DEFAULT NULL,
  business_contact_no int(11) DEFAULT NULL,
  category varchar(45) DEFAULT NULL,
  merchant_status varchar(45) DEFAULT NULL,
  contract_status varchar(45) DEFAULT NULL,
  name_as_per_gst varchar(245) DEFAULT NULL,
  GSTIN_number varchar(45) DEFAULT NULL,
  registered_address varchar(245) DEFAULT NULL,
  owner_name varchar(45) DEFAULT '',
  owner_email varchar(45) DEFAULT '',
  owner_phone int(45) DEFAULT NULL,
  created_date datetime DEFAULT current_timestamp(),
  last_update_date datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  rate_card_detail int(45) DEFAULT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE vendor_request (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(45) NOT NULL,
  email varchar(245) DEFAULT NULL,
  phone bigint(10) NOT NULL,
  business_name varchar(245) NOT NULL,
  business_contact_no bigint(10) DEFAULT NULL,
  business_website_url varchar(45) DEFAULT NULL,
  verification_key varchar(45) DEFAULT NULL,
  is_phone_verified tinyint(4) DEFAULT NULL,
  legally_authorised tinyint(4) NOT NULL,
  accept_terms_conditions tinyint(4) NOT NULL,
  created_date datetime NOT NULL DEFAULT current_timestamp(),
  last_update_date datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
);

CREATE TABLE rate_card_details (
  id int(11) NOT NULL,
  vendor_id varchar(45) DEFAULT NULL,
  valid_from datetime DEFAULT NULL,
  valid_to datetime DEFAULT NULL,
  type varchar(45) DEFAULT NULL,
  detail varchar(45) DEFAULT NULL,
  created_date datetime DEFAULT NULL,
  last_update_date datetime DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE items (
  id int(11) NOT NULL AUTO_INCREMENT,
  type varchar(45) NOT NULL DEFAULT '',
  category varchar(45) NOT NULL DEFAULT '',
  sub_category varchar(45) DEFAULT NULL,
  items varchar(45) NOT NULL DEFAULT '',
  created_date datetime NOT NULL DEFAULT current_timestamp(),
  last_update_date datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
);

CREATE TABLE property_size_items (
  id int(11) NOT NULL AUTO_INCREMENT,
  move_size varchar(45) NOT NULL DEFAULT '',
  item_id int(11) NOT NULL,
  quantity int(11) DEFAULT NULL,
  created_date datetime NOT NULL DEFAULT current_timestamp(),
  last_update_date datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
);


  CREATE TABLE boxigo_user (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  phone VARCHAR(15) NOT NULL,
  verification_key VARCHAR(45) NOT NULL,
  is_email_verified VARCHAR(45) NOT NULL DEFAULT 'no',
  is_phone_verified VARCHAR(45) NOT NULL DEFAULT 'no',
  created_date DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  last_update_date DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
