-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-21 09:49:27
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enroll_test`
--

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `type` tinyint(3) NOT NULL,
  `is_active` tinyint(3) NOT NULL,
  `dateline` int(10) NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `login_require` tinyint(3) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `submitnum` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `see_able` tinyint(1) DEFAULT NULL,
  `vote_rule` varchar(15) DEFAULT NULL,
  `register_allow_times` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `project_each_action`
--

CREATE TABLE `project_each_action` (
  `id` int(11) UNSIGNED NOT NULL,
  `pid` mediumint(8) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `dateline` int(10) NOT NULL,
  `action` text NOT NULL,
  `action_day` int(8) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `project_fields`
--

CREATE TABLE `project_fields` (
  `pid` mediumint(8) UNSIGNED NOT NULL,
  `options` text NOT NULL,
  `options_count` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`, `phone_number`, `email`) VALUES
(1, 'aaa', 'bbb', '123', '123@qq.com'),
(2, 'aaaa', 'aaaaaa', '13813849166', '138138456@qq.com'),
(3, 'bbbb', 'aaaaaaa', '13813849166', '123456789@qq.com'),
(4, 'aaaaa', 'aaaaaaa', '13813849166', '123456789@qq.com'),
(5, 'aaaaaa', '123451', '13812345678', 'aaa@qq.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `project_each_action`
--
ALTER TABLE `project_each_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_fields`
--
ALTER TABLE `project_fields`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- 使用表AUTO_INCREMENT `project_each_action`
--
ALTER TABLE `project_each_action`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `project_fields`
--
ALTER TABLE `project_fields`
  MODIFY `pid` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- 使用表AUTO_INCREMENT `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
