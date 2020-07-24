-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 12:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `gender` varchar(14) NOT NULL,
  `nationalid` text NOT NULL,
  `cv` text NOT NULL,
  `nextofkin` varchar(14) NOT NULL,
  `bvn` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `applicantid` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `name`, `email`, `phone`, `gender`, `nationalid`, `cv`, `nextofkin`, `bvn`, `address`, `city`, `state`, `country`, `applicantid`, `reg_date`) VALUES
(1, 'Oluokun,Kabir,adesina', 'oka@vb.vb', '0810251520', 'Male', 'Oluokun Kabir adesina  (2020-07-24-04-07-00).jpg', 'Oluokun Kabir adesina  (2020-07-24-04-07-00).pdf', '', '34234234242', 'Osogbo', 'Osogbo Oroki', 'osun', 'Nigeria', '7984b0a0e139cabadb5afc7756d473fb34d23819', '2020-07-24 14:21:06'),
(2, 'Oluokun,Kabiru,Adesina', 'kaoluokun@student.lautech.edu.ng', '08130584550', 'Male', 'Oluokun Kabiru Adesina  (2020-07-25-12-07-55).jpg', 'Oluokun Kabiru Adesina  (2020-07-25-12-07-55).pdf', '', '7887786768778', 'Osogbo, Osun State', 'Iseyin', 'Oyo', 'Nigeria', 'b6589fc6ab0dc82cf12099d1c2d40ab994e8410c', '2020-07-24 22:35:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
