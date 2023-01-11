-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 11:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sectokens`
--

-- --------------------------------------------------------

--
-- Table structure for table `datalist`
--

CREATE TABLE `datalist` (
  `id` int(11) NOT NULL,
  `studname` varchar(255) NOT NULL,
  `studdept` varchar(255) NOT NULL,
  `studper` int(200) NOT NULL,
  `studres` varchar(255) NOT NULL,
  `m1` int(255) NOT NULL,
  `m2` int(255) NOT NULL,
  `avg` int(255) NOT NULL,
  `modby` varchar(255) NOT NULL,
  `modtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datalist`
--

INSERT INTO `datalist` (`id`, `studname`, `studdept`, `studper`, `studres`, `m1`, `m2`, `avg`, `modby`, `modtime`) VALUES
(1, 'Karthik', 'ECE', 45, 'Passed', 43, 47, 45, 'Admin', '2023-01-09 18:43:28'),
(2, 'Raja', 'ECE', 89, 'Passed', 90, 88, 89, 'Admin', '2023-01-09 18:43:28'),
(3, 'Saran', 'ECE', 66, 'Passed', 60, 72, 66, 'Admin', '2023-01-09 18:43:28'),
(4, 'Venkatesh', 'CSE', 77, 'Passed', 72, 82, 77, 'Admin', '2023-01-09 18:43:28'),
(5, 'PothiRaj', 'ECE', 45, 'Just Pass', 30, 60, 45, 'Admin', '2023-01-09 18:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `usermail`, `password`, `role`) VALUES
(1, 'ECE Staff', 'ece@gmail.com', 'ece', 'ECE'),
(2, 'Admin', 'admin@gmail.com', 'admin', 'admin'),
(3, 'CSE Staff', 'cse@gmail.com', 'cse', 'CSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datalist`
--
ALTER TABLE `datalist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datalist`
--
ALTER TABLE `datalist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
