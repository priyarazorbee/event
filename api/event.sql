-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 01:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(120) NOT NULL,
  `username` text NOT NULL,
  `details` varchar(111) NOT NULL,
  `phone` int(255) NOT NULL,
  `event_id` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `username`, `details`, `phone`, `event_id`) VALUES
(1, 'dfds', 'dsds', 333333333, 0),
(2, 'priya', 'dsds', 12211211, 4),
(3, 'priyarr', 'tyt', 122323, 4);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(120) NOT NULL,
  `action` int(120) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `image` varchar(120) NOT NULL,
  `floor` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `description`, `action`, `start`, `end`, `image`, `floor`) VALUES
(1, 'juy', 'uiuiuiu', 2, '2020-08-01', '2020-08-05', 'api/upload/11.png', 'api/floor_upload/'),
(4, 'hjhj', 'hjhj', 1, '0000-00-00', '0000-00-00', 'api/upload/1.jpg', ''),
(5, '', '', 0, '0000-00-00', '0000-00-00', '', ''),
(6, '', '', 0, '0000-00-00', '0000-00-00', '', ''),
(7, '', '', 0, '0000-00-00', '0000-00-00', '', ''),
(8, 'hello', 'ghgh', 1, '2020-08-03', '2020-08-06', 'api/upload/11.png', 'api/floor_upload/'),
(9, '', '', 0, '0000-00-00', '0000-00-00', 'upload/Desert.jpg', ''),
(10, '', '', 0, '0000-00-00', '0000-00-00', 'upload/Chrysanthemum.jpg', ''),
(11, '', '', 0, '0000-00-00', '0000-00-00', 'upload/Chrysanthemum.jpg', ''),
(12, 'test', 'test', 0, '0000-00-00', '0000-00-00', '1.jpg', ''),
(13, 'new', 'test', 0, '0000-00-00', '0000-00-00', '2.jpg', ''),
(14, 'new', '2323', 0, '0000-00-00', '0000-00-00', 'Desert.jpg', ''),
(15, 'test', 'test', 0, '0000-00-00', '0000-00-00', 'Lighthouse.jpg', ''),
(16, 'test', 'test', 0, '0000-00-00', '0000-00-00', 'Lighthouse.jpg', ''),
(17, 'test2', 'test2', 1, '0000-00-00', '0000-00-00', 'Tulips.jpg', ''),
(18, 'new2', 'test3', 1, '0000-00-00', '0000-00-00', 'Jellyfish.jpg', ''),
(19, 'new2', 'test5', 2, '0000-00-00', '0000-00-00', 'Jellyfish.jpg', ''),
(20, 'test2', '2323', 2, '0000-00-00', '0000-00-00', 'Tulips.jpg', ''),
(21, 'test2', '2323', 1, '0000-00-00', '0000-00-00', 'Penguins.jpg', ''),
(22, 'new55', '2323uy', 1, '0000-00-00', '0000-00-00', 'Hydrangeas.jpg', ''),
(23, '12', 'r4', 1, '0000-00-00', '0000-00-00', 'Tulips.jpg', ''),
(24, 'hello', 'hello', 1, '0000-00-00', '0000-00-00', 'Chrysanthemum.jpg', ''),
(25, 'new5522', '2323gy', 1, '0000-00-00', '0000-00-00', 'Penguins.jpg', ''),
(27, 'new5543', 'test2343', 1, '0000-00-00', '0000-00-00', 'api/upload/Penguins.jpg', ''),
(28, 'news', 'newsss', 2, '0000-00-00', '0000-00-00', 'api/upload/images.jpg', ''),
(29, 'test', 'test', 1, '0000-00-00', '0000-00-00', 'api/upload/1.jpg', ''),
(30, 'new', 'test', 1, '0000-00-00', '0000-00-00', 'api/upload/11.png', ''),
(31, 'new', 'test', 1, '0000-00-00', '0000-00-00', 'api/upload/11.png', ''),
(32, 'hello', 'hello', 1, '0000-00-00', '0000-00-00', 'api/upload/11.png', ''),
(33, 'new', 'test', 1, '0000-00-00', '0000-00-00', 'api/upload/images.jpg', ''),
(34, 'test', '2323', 1, '2020-07-30', '2020-07-31', 'api/upload/11.png', ''),
(35, 'test', '2323', 1, '2020-07-30', '2020-07-31', 'api/upload/11.png', ''),
(36, 'test', 'test1', 1, '2020-07-29', '2020-07-30', 'api/upload/11.png', 'api/floor_upload/images.jpg'),
(37, 'newser', 'test', 1, '2020-07-30', '2020-07-31', 'api/upload/1.jpg', 'api/floor_upload/images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(120) NOT NULL,
  `fname` varchar(111) DEFAULT NULL,
  `lname` varchar(111) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`) VALUES
(1, NULL, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'test33@razorbee.com'),
(2, NULL, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'test33@razorbee.com'),
(3, NULL, NULL, 'test43@razorbee.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(4, 'test', NULL, 'test34@razorbee.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
