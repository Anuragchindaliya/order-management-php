-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2021 at 03:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vgi`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `serial_no` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `delivered_qty` int(11) NOT NULL DEFAULT 0,
  `cancel_qty` int(11) NOT NULL DEFAULT 0,
  `error_qty` int(11) DEFAULT 0,
  `price` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL,
  `delivered_date` date DEFAULT NULL,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `item_name`, `serial_no`, `qty`, `delivered_qty`, `cancel_qty`, `error_qty`, `price`, `account_id`, `card_id`, `platform`, `status`, `timestamp`, `date`, `delivered_date`, `remark`) VALUES
(1, 'oppo', 'opps36473', 100, 90, 10, 0, 500000, 4, 1, '1', 1, '2021-11-10 14:30:49', '2021-11-10', '2021-11-10', 'mst'),
(2, 'vivo', '', 45, 2, 21, 0, 500000, 3, 1, '1', 1, '2021-11-10 14:28:50', '2021-11-10', '2021-11-10', 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
