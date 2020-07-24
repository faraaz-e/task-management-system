-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 09:20 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enddate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `user_id`, `pname`, `created_at`, `file_path`, `type`, `status`, `submitted_at`, `enddate`) VALUES
(184, 'task 1', 'Enddate: 4 Dec\r\nPosition : DUE\r\nStatus : PENDING ', 1, 'ubed', '2019-12-05 15:13:05', NULL, 'Accounts', 'Complete', '2019-12-05 12:58:03', '2019-12-05 23:59:59'),
(185, 'task 2', 'Enddate: 4 Dec\r\nPosition : DUE\r\nStatus : IN-PROGRESS ', 1, 'ubed', '2019-12-04 13:36:06', NULL, 'Return File', 'Complete', '2019-12-05 07:12:08', '2019-12-04 23:59:59'),
(186, 'task 3', 'Enddate: 4 Dec\r\nPosition : ON-TIME\r\nStatus : COMPLETE \r\nSubmitted : 4 Dec', 1, 'ubed', '2019-12-04 13:36:51', NULL, 'GST', 'Complete', '2019-12-04 08:09:23', '2019-12-04 23:59:59'),
(188, 'task 5', 'Enddate: 5 Dec Position : on-time Status : IN-PROGRESS', 1, 'arbaad', '2019-12-06 12:38:09', NULL, 'Construction', 'Complete', '2019-12-09 12:38:55', '2019-12-07 23:59:59'),
(189, 'task 6', '-', 1, 'arbaad', '2019-12-05 15:22:39', NULL, 'General (Other)', NULL, '2019-12-06 10:12:54', '2019-12-07 23:59:59'),
(192, 'testing new theme', 'check', 1, 'ubed', '2019-12-06 17:55:23', NULL, 'IT', NULL, '2019-12-06 12:26:03', '2019-12-06 23:59:59'),
(193, 'Sheesha', 'qwertyuiop', 1, 'ubed', '2019-12-09 18:13:24', NULL, 'Cafe', NULL, '2019-12-09 12:44:19', '2019-12-10 23:59:59'),
(194, 'tax', '-', 1, 'arbaad', '2019-12-09 18:17:20', NULL, 'Accountancy', 'In-Progress', '2019-12-09 12:48:12', '2019-12-14 23:59:59'),
(195, 'test', 'qwerty', 1, 'ubed', '2019-12-10 10:58:29', NULL, 'General Trading', 'Complete', '2019-12-10 05:29:30', '2019-12-11 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `pswrd` varchar(255) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pswrd`, `fname`, `lname`) VALUES
(1, 'test', '1234', 'testing', 'project'),
(2, 'admin', '1234', 'testing', 'project');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
