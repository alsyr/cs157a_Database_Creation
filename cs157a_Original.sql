-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2015 at 10:59 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs157a`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_name` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `guest_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `location`, `guest_id`) VALUES
('Apple', 'Cupertino', 9),
('Empty', '', 0),
('Facebook', 'Palo Alto', 4),
('Google', 'Mountain View', 2),
('Microsoft', 'San Jose', 10),
('Yahoo', 'Mountain View', 7);

-- --------------------------------------------------------

--
-- Table structure for table `company_member`
--

CREATE TABLE IF NOT EXISTS `company_member` (
  `company_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_member`
--

INSERT INTO `company_member` (`company_name`, `last_name`, `first_name`, `age`, `position`) VALUES
('Apple', 'Blabla', 'Whatever', 19, 'intern'),
('Facebook', 'Allen', 'Joe', 23, 'cashier'),
('Facebook', 'NewEmpty', '', 0, ''),
('Google', 'Smith', 'Carla', 34, 'manager'),
('Microsoft', 'Muchacho', 'Garcia', 67, 'senior director'),
('Microsoft', 'Namrata', 'Celine', 26, 'ceo'),
('Yahoo', 'Doe', 'John', 42, 'president'),
('Yahoo', 'Noidea', 'Jack', 25, 'intern');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `facility_id` int(4) NOT NULL,
  `rate` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `guest_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `rate`, `type`, `guest_id`) VALUES
(1, 124, 'laundry', 4),
(2, 2000, 'parking', 6),
(3, 10, 'pool', 7),
(4, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `family_id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone_number` int(10) NOT NULL,
  `guest_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_id`, `name`, `address`, `phone_number`, `guest_id`) VALUES
(1, 'Smith', 'San Jose', 1234567890, 1),
(2, 'Allen', 'San Francisco', 1087654321, 3),
(3, 'Muchacho', 'Mexico', 1234657890, 5),
(4, 'Wes', 'Texas', 1432567809, 6),
(5, 'Wesley', 'Florida', 1456790234, 8),
(8, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `family_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`last_name`, `first_name`, `age`, `family_id`) VALUES
('Empty', '', 0, 0),
('Whateaver', 'Eric', 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(4) NOT NULL,
  `rate` int(4) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `rate`, `type`) VALUES
(1, 4, 'fish');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `guest_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`) VALUES
(2),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(4) NOT NULL,
  `guest_id` int(4) NOT NULL,
  `food_id` int(4) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `guest_id`, `food_id`, `date`, `time`, `quantity`) VALUES
(53, 4, 0, '0000-00-00', '00:00:00', 0),
(56, 2, 1, '2015-11-11', '06:36:52', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_number` int(10) NOT NULL,
  `amount` int(7) NOT NULL,
  `date` date NOT NULL,
  `method` varchar(10) NOT NULL,
  `guest_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_number`, `amount`, `date`, `method`, `guest_id`) VALUES
(123, 1234, '2015-11-11', 'check', 4),
(765, 0, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_number` int(3) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rate` int(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `guest_id` int(4) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `type`, `rate`, `status`, `guest_id`, `check_in_date`, `check_out_date`) VALUES
(12, 'luxe', 1234, 'free', 2, '2015-11-02', '2015-11-26'),
(123, '', 0, '', 0, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_name`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `company_member`
--
ALTER TABLE `company_member`
  ADD PRIMARY KEY (`company_name`,`last_name`,`first_name`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`),
  ADD KEY `facility_id` (`facility_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `guest_id_2` (`guest_id`);

--
-- Indexes for table `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`last_name`,`first_name`),
  ADD KEY `family_id` (`family_id`),
  ADD KEY `family_id_2` (`family_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_number`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`),
  ADD KEY `guest_id` (`guest_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
