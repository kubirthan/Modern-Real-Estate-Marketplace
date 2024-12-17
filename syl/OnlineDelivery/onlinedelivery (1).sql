-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinedelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `sender_address` varchar(50) NOT NULL,
  `receiver_address` varchar(50) NOT NULL,
  `delivery_status` varchar(100) NOT NULL,
  `items` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic_number` varchar(25) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `name`, `mobile_number`, `reference`, `sender_address`, `receiver_address`, `delivery_status`, `items`, `email`, `nic_number`, `amount`, `description`) VALUES
(0, 'Vanathi', 710102512, 10, 'Madu', 'Vankoor', 'loop', 'phones', 'vanu@gmail.com', '10102V', 45000, 'Two'),
(100, 'Thanaledsumy Visvanathan', 767061829, 0, 'jaffna', 'Vavunija', 'hasjda', 'gg', 'thanamvisva99@gmail.com', '102455V', 200, 'sdds'),
(101, 'Deni', 778849804, 2, 'jaffna', 'Vavunija', 'qd', 'onetow', 'thana@gmail.com', '8854215V', 150, 'hgfds'),
(102, 'Rathika', 777257964, 3, 'mankulam', 'jaffna', 'kkk', 'books', 'rathi@gmail.com', '257964V', 3000, 'uuwtt'),
(103, 'Dila', 778849804, 5, 'colombo', 'kandy', 'nothing', 'pens', 'dila@gmail.com', '2000V', 250, 'super'),
(104, 'Sowmija', 112345678, 6, 'Kandy', 'Colomb0', 'two', 'pencils', 'sow@gmail.com', '121212V', 400, 'Thank you'),
(106, 'Nirusa', 775148520, 15, 'hatton', 'Nuwareliya', 'nothing', 'books', 'niru@gmail.com', '1414125V', 500, 'Good'),
(107, 'Dishani', 772513425, 20, 'Colombo', 'Jaffna', '1 week', 'Watch', 'disha@gmail.com', '4452545582V', 15000, 'Well'),
(108, 'Kubirthan', 74521856, 1, 'Kilinochi', 'Vavunija', 'Moth', 'Bag', 'kubi@gmail.com', '975824581V', 2000, 'Thankyou!'),
(109, 'Thuvaraka', 78542157, 7, 'Mannar', 'Town', 'Three days', 'Shoo', 'thuva@gmail.com', '98542518V', 1500, 'Thank You'),
(110, 'Amirtha', 745213215, 6, 'Colombo', 'Vavunija', 'ThreeDays', 'Table', 'amir@gmail.com', '965215482V', 10000, 'Thank You!');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `em_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`em_id`, `username`, `password`) VALUES
(0, 'Thana', '123'),
(1, 'Dilax', '1010'),
(2, 'Deni', '0000'),
(3, 'Vanathi', '1212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`em_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
