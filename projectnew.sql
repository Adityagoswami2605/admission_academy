-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 07:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'adityagoswami2605@gmail.com', '1234567890'),
(2, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5ed74d4f465cc', '5ed74d4f5ae33'),
('5ed74d4f991d4', '5ed74d4faea89'),
('5ed74d4fd75b5', '5ed74d4fef9b2'),
('5ed74d5026d12', '5ed74d50319e7'),
('5ed74d50624ba', '5ed74d506a457'),
('5ed74d50a5fc9', '5ed74d50c200b'),
('5ed74d510804a', '5ed74d5116392'),
('5ed74d514656a', '5ed74d514e70e'),
('5ed74d5176c54', '5ed74d517f016'),
('5ed74d51aa457', '5ed74d51b2720'),
('5edb8b1d5186a', '5edb8b1d600f2'),
('5edb8b1d9910e', '5edb8b1da38f8'),
('5edb8b1def3e1', '5edb8b1e05e67'),
('5edb8b1e46f1a', '5edb8b1e5f2ff'),
('5edb8b1e87a24', '5edb8b1e8fbfb');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('aditya@gmail.com', '5ed74cab6505e', 7, 10, 7, 3, '2020-06-06 11:22:55'),
('subhambarai@gmail.com', '5ed74cab6505e', 8, 10, 8, 2, '2020-06-06 12:12:58'),
('subhambarai@gmail.com', '5edb8a8ba0ec2', 5, 5, 5, 0, '2020-06-06 12:41:11'),
('xyz@gmail.com', '5edb8a8ba0ec2', 4, 5, 4, 1, '2020-06-06 17:30:22'),
('xyz@gmail.com', '5edb8a8ba0ec2', 4, 5, 4, 1, '2020-06-06 17:30:22'),
('xyz@gmail.com', '5edb8a8ba0ec2', 4, 5, 4, 1, '2020-06-06 17:30:22'),
('xyz@gmail.com', '5ed74cab6505e', 1, 10, 1, 9, '2020-06-06 17:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5ed74d4f465cc', 'a', '5ed74d4f5ae33'),
('5ed74d4f465cc', 'b', '5ed74d4f5ae3c'),
('5ed74d4f465cc', 'c', '5ed74d4f5ae3f'),
('5ed74d4f465cc', 'd', '5ed74d4f5ae42'),
('5ed74d4f991d4', 'a', '5ed74d4faea7f'),
('5ed74d4f991d4', 'b', '5ed74d4faea89'),
('5ed74d4f991d4', 'c', '5ed74d4faea8f'),
('5ed74d4f991d4', 'd', '5ed74d4faea9c'),
('5ed74d4fd75b5', 'a', '5ed74d4fef9a9'),
('5ed74d4fd75b5', 'b', '5ed74d4fef9b2'),
('5ed74d4fd75b5', 'c', '5ed74d4fef9b3'),
('5ed74d4fd75b5', 'd', '5ed74d4fef9b5'),
('5ed74d5026d12', 'a', '5ed74d50319da'),
('5ed74d5026d12', 'b', '5ed74d50319e4'),
('5ed74d5026d12', 'c', '5ed74d50319e7'),
('5ed74d5026d12', 'd', '5ed74d50319ea'),
('5ed74d50624ba', 'a', '5ed74d506a457'),
('5ed74d50624ba', 'b', '5ed74d506a46c'),
('5ed74d50624ba', 'c', '5ed74d506a473'),
('5ed74d50624ba', 'd', '5ed74d506a477'),
('5ed74d50a5fc9', 'kugu', '5ed74d50c1ff8'),
('5ed74d50a5fc9', 'iu', '5ed74d50c2005'),
('5ed74d50a5fc9', 'jk', '5ed74d50c2009'),
('5ed74d50a5fc9', 'ui', '5ed74d50c200b'),
('5ed74d510804a', 'uigh', '5ed74d5116392'),
('5ed74d510804a', 'hg', '5ed74d51163a1'),
('5ed74d510804a', 'ui', '5ed74d51163a6'),
('5ed74d510804a', 'ui', '5ed74d51163a9'),
('5ed74d514656a', 'uyg', '5ed74d514e701'),
('5ed74d514656a', 'iuu', '5ed74d514e70e'),
('5ed74d514656a', 'yugi', '5ed74d514e713'),
('5ed74d514656a', 'uig', '5ed74d514e717'),
('5ed74d5176c54', 'jgiu', '5ed74d517f005'),
('5ed74d5176c54', 'huygiu', '5ed74d517f00f'),
('5ed74d5176c54', 'iygu', '5ed74d517f016'),
('5ed74d5176c54', 'hyu', '5ed74d517f022'),
('5ed74d51aa457', 'hjgy', '5ed74d51b2720'),
('5ed74d51aa457', 'uygu', '5ed74d51b272b'),
('5ed74d51aa457', 'uyg', '5ed74d51b272d'),
('5ed74d51aa457', 'uyg', '5ed74d51b272f'),
('5edb8b1d5186a', 'a', '5edb8b1d600f2'),
('5edb8b1d5186a', 'b', '5edb8b1d600f6'),
('5edb8b1d5186a', 'c', '5edb8b1d600f7'),
('5edb8b1d5186a', 'd', '5edb8b1d600f8'),
('5edb8b1d9910e', 'a', '5edb8b1da38f8'),
('5edb8b1d9910e', 'b', '5edb8b1da38fd'),
('5edb8b1d9910e', 'c', '5edb8b1da38fe'),
('5edb8b1d9910e', 'd', '5edb8b1da38ff'),
('5edb8b1def3e1', 'a', '5edb8b1e05e67'),
('5edb8b1def3e1', 'b', '5edb8b1e05e72'),
('5edb8b1def3e1', 'c', '5edb8b1e05e77'),
('5edb8b1def3e1', 'd', '5edb8b1e05e7f'),
('5edb8b1e46f1a', 'a', '5edb8b1e5f2ff'),
('5edb8b1e46f1a', 'b', '5edb8b1e5f310'),
('5edb8b1e46f1a', 'c', '5edb8b1e5f313'),
('5edb8b1e46f1a', 'd', '5edb8b1e5f316'),
('5edb8b1e87a24', 'a', '5edb8b1e8fbfb'),
('5edb8b1e87a24', 'b', '5edb8b1e8fc0c'),
('5edb8b1e87a24', 'c', '5edb8b1e8fc12'),
('5edb8b1e87a24', 'd', '5edb8b1e8fc18');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5ed74cab6505e', '5ed74d4f465cc', 'first', 4, 1),
('5ed74cab6505e', '5ed74d4f991d4', 'second', 4, 2),
('5ed74cab6505e', '5ed74d4fd75b5', 'third', 4, 3),
('5ed74cab6505e', '5ed74d5026d12', 'fourth', 4, 4),
('5ed74cab6505e', '5ed74d50624ba', 'fifth', 4, 5),
('5ed74cab6505e', '5ed74d50a5fc9', 'ygoi', 4, 6),
('5ed74cab6505e', '5ed74d510804a', 'uygiug', 4, 7),
('5ed74cab6505e', '5ed74d514656a', 'yi', 4, 8),
('5ed74cab6505e', '5ed74d5176c54', 'hyufiyg', 4, 9),
('5ed74cab6505e', '5ed74d51aa457', 'uy', 4, 10),
('5edb8a8ba0ec2', '5edb8b1d5186a', 'ytfiohisagciushuvhidbdovahduhsdihdghdihdughdsihdsuighdigdauhdugusjfnsugudhgadughadioghdiovhdihgzdioghdiogjdigfiohidogjdioghdiogjhriogdsiogheio', 4, 1),
('5edb8a8ba0ec2', '5edb8b1d9910e', 'gidgpogpogeopg', 4, 2),
('5edb8a8ba0ec2', '5edb8b1def3e1', 'guhfiehtoet35yo3ujy4', 4, 3),
('5edb8a8ba0ec2', '5edb8b1e46f1a', 'iuguiuihgewihwiohw4o', 4, 4),
('5edb8a8ba0ec2', '5edb8b1e87a24', 'guidhioegiorh', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5ed74cab6505e', 'Scholarship Test', 1, 0, 10, 2, '', '', '2020-06-06 07:14:16'),
('5edb8a8ba0ec2', 'Upsc', 1, 0, 5, 1, '', '#upsc', '2020-06-06 12:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('aditya@gmail.com', 16, '2020-06-06 17:41:06'),
('subhambarai@gmail.com', 13, '2020-06-06 12:41:11'),
('sunil@gmail.com', 0, '2020-06-06 16:22:34'),
('xyz@gmail.com', 5, '2020-06-06 17:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`start_time`, `end_time`) VALUES
('18:25:31', '18:26:31'),
('18:30:57', '18:31:57'),
('18:32:18', '18:33:18'),
('18:40:45', '18:41:45'),
('18:42:05', '18:43:05'),
('18:42:09', '18:43:09'),
('18:44:22', '18:45:22'),
('18:47:24', '18:48:24'),
('18:47:32', '18:48:32'),
('18:47:42', '18:48:42'),
('18:47:44', '18:48:44'),
('18:54:20', '18:55:20'),
('18:54:22', '18:55:22'),
('18:57:18', '18:58:18'),
('18:57:20', '18:58:20'),
('18:57:23', '18:58:23'),
('18:57:25', '18:58:25'),
('18:59:13', '19:00:13'),
('18:59:47', '19:00:47'),
('18:59:49', '19:00:49'),
('18:59:51', '19:00:51'),
('18:59:59', '19:00:59'),
('19:00:05', '19:01:05'),
('19:00:06', '19:01:06'),
('19:00:08', '19:01:08'),
('19:00:15', '19:01:15'),
('19:00:17', '19:01:17'),
('19:00:20', '19:01:20'),
('19:01:53', '19:02:53'),
('19:01:54', '19:02:54'),
('19:01:55', '19:02:55'),
('19:01:55', '19:02:55'),
('19:01:56', '19:02:56'),
('19:01:57', '19:02:57'),
('19:01:58', '19:02:58'),
('19:01:59', '19:02:59'),
('19:02:00', '19:03:00'),
('19:02:01', '19:03:01'),
('19:02:02', '19:03:02'),
('19:02:02', '19:03:02'),
('19:02:03', '19:03:03'),
('19:02:04', '19:03:04'),
('19:02:05', '19:03:05'),
('19:02:05', '19:03:05'),
('19:02:05', '19:03:05'),
('19:02:05', '19:03:05'),
('19:02:05', '19:03:05'),
('19:02:05', '19:03:05'),
('19:02:06', '19:03:06'),
('19:02:06', '19:03:06'),
('19:02:06', '19:03:06'),
('19:02:07', '19:03:07'),
('19:02:19', '19:03:19'),
('19:02:21', '19:03:21'),
('19:02:38', '19:03:38'),
('19:04:39', '19:05:39'),
('19:04:42', '19:05:42'),
('19:05:13', '19:06:13'),
('19:13:02', '19:14:02'),
('19:13:03', '19:14:03'),
('19:15:47', '19:16:47'),
('19:15:50', '19:16:50'),
('19:15:53', '19:16:53'),
('19:15:54', '19:16:54'),
('19:15:55', '19:16:55'),
('19:15:55', '19:16:55'),
('19:15:56', '19:16:56'),
('19:15:57', '19:16:57'),
('19:15:58', '19:16:58'),
('19:15:58', '19:16:58'),
('19:15:59', '19:16:59'),
('19:15:59', '19:16:59'),
('19:15:59', '19:16:59'),
('19:16:02', '19:17:02'),
('19:16:04', '19:17:04'),
('19:16:06', '19:17:06'),
('19:17:08', '19:18:08'),
('19:17:10', '19:18:10'),
('19:17:18', '19:18:18'),
('19:17:22', '19:18:22'),
('19:19:16', '19:20:16'),
('19:19:17', '19:20:17'),
('19:19:18', '19:20:18'),
('19:19:18', '19:20:18'),
('19:19:19', '19:20:19'),
('19:19:21', '19:20:21'),
('19:19:24', '19:20:24'),
('19:19:25', '19:20:25'),
('19:19:29', '19:20:29'),
('19:19:31', '19:20:31'),
('19:19:38', '19:20:38'),
('19:19:40', '19:20:40'),
('19:21:48', '19:22:48'),
('19:22:22', '19:23:22'),
('19:25:59', '19:26:59'),
('19:26:21', '19:27:21'),
('19:26:23', '19:27:23'),
('19:26:48', '19:27:48'),
('19:26:50', '19:27:50'),
('19:27:21', '19:28:21'),
('19:27:23', '19:28:23'),
('19:27:26', '19:28:26'),
('19:30:06', '19:31:06'),
('19:30:49', '19:31:49'),
('19:30:51', '19:31:51'),
('19:32:12', '19:33:12'),
('19:32:14', '19:33:14'),
('19:33:55', '19:34:55'),
('19:33:57', '19:34:57'),
('19:35:02', '19:36:02'),
('19:36:50', '19:37:50'),
('19:36:52', '19:37:52'),
('19:40:05', '19:41:05'),
('19:40:07', '19:41:07'),
('19:41:06', '19:42:06'),
('19:42:23', '19:43:23'),
('19:42:31', '19:43:31'),
('19:42:39', '19:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Aditya', 'M', 'chitkara', 'aditya@gmail.com', 7990081782, 'e807f1fcf82d132f9bb018ca6738a19f'),
('Shubham Barai', 'M', 'chitkara', 'subhambarai@gmail.com', 7894561230, 'e807f1fcf82d132f9bb018ca6738a19f'),
('Sunil', 'M', 'chitkara', 'sunil@gmail.com', 7894561230, 'e807f1fcf82d132f9bb018ca6738a19f'),
('Xyz', 'M', 'chitkara', 'xyz@gmail.com', 1234567890, 'e807f1fcf82d132f9bb018ca6738a19f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
