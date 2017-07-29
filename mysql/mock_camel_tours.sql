-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 06:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mock_camel_tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `node_id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(10) UNSIGNED NOT NULL,
  `node_name` varchar(100) NOT NULL,
  `node_location` varchar(100) NOT NULL,
  `node_lat` float(7,4) DEFAULT NULL,
  `node_long` float(7,4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`node_id`, `tour_id`, `node_name`, `node_location`, `node_lat`, `node_long`) VALUES
(214, 44, 'Node 1 Cute Dogs', 'Node Location 1', 41.3787, -72.1046);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `essay` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `name`, `email`, `password`, `essay`) VALUES
(21, 'Admin', 'something@conncoll.edu', 'dac869742d7eddf492b0ebe1d1bb4af0', 'Something'),
(1, 'Request', 'request@cameltours.org', 'dac869742d7eddf492b0ebe1d1bb4af0', 'Request Example');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `seq_num` int(11) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `media_size` int(11) NOT NULL,
  `media_uri` varchar(100) NOT NULL,
  `thumb_uri` varchar(100) NOT NULL,
  `caption` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `node_id`, `seq_num`, `media_name`, `media_size`, `media_uri`, `thumb_uri`, `caption`) VALUES
(1585, 214, 1, '597cafeb819ba.jpg', 38962, 'ct/u1/t44/n214/media/597cafeb819ba.jpg', 'ct/u1/t44/n214/media/thumbs/597cafeb819ba.jpg', NULL),
(1586, 214, 2, '597caffa020a0.jpg', 20692, 'ct/u1/t44/n214/media/597caffa020a0.jpg', 'ct/u1/t44/n214/media/thumbs/597caffa020a0.jpg', NULL),
(1587, 214, 0, '597cb52149b3c.mp3', 137344, 'ct/u1/t44/n214/media/597cb52149b3c.mp3', 'media/img/mp3thumb.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tour_name` varchar(100) NOT NULL,
  `tour_location` varchar(100) NOT NULL,
  `tour_lat` float(7,4) DEFAULT NULL,
  `tour_long` float(7,4) DEFAULT NULL,
  `total_files` int(11) NOT NULL,
  `tour_public` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `user_id`, `tour_name`, `tour_location`, `tour_lat`, `tour_long`, `total_files`, `tour_public`) VALUES
(44, 1, 'Tour 1', '270 Mohegan Avenue, New London, CT', 41.3787, -72.1046, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` set('admin','user') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `role`) VALUES
(2, 'Admin', 'admin', 'something@gmail.com', 'dac869742d7eddf492b0ebe1d1bb4af0', 'admin'),
(1, 'User', 'user', 'somethingelse@gmail.com', 'dac869742d7eddf492b0ebe1d1bb4af0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1588;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
