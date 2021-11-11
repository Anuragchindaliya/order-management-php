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
-- Table structure for table `order_card`
--

CREATE TABLE `order_card` (
  `id` int(11) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_card`
--

INSERT INTO `order_card` (`id`, `card_name`, `card_no`, `mob`, `remark`, `timestamp`) VALUES
(1, 'Regaliya', '8595346468', '9812995325', 'new ', '2021-11-10 10:05:00'),
(2, 'Money back', '8595346468', '9812995325', 'new ', '2021-11-10 10:05:09'),
(3, 'Easy EMI', '99999999', '9812995325', 'new ', '2021-11-10 10:04:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_card`
--
ALTER TABLE `order_card`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_card`
--
ALTER TABLE `order_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
