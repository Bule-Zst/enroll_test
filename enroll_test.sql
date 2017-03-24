-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-24 08:00:42
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

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `type`, `is_active`, `dateline`, `start_time`, `end_time`, `title`, `login_require`, `admin`, `uid`, `username`, `del`, `submitnum`, `see_able`, `vote_rule`, `register_allow_times`) VALUES
(217, 1, 1, 1490179438, 1488297600, 1490544000, '???', 0, '', 1, 'test', 1, 1, 1, 'none', 0),
(218, 1, 1, 1490193158, 1488297600, 1488124800, '11111', 1, '', 1, 'test', 1, 1, 1, 'uid', 0),
(219, 1, 1, 1490269986, 1488297600, 1490889600, '12333', 0, '', 1, 'wjbsyc', 1, 2, 1, 'none', 0),
(220, 2, 1, 1490270904, 1488297600, 1490889600, '11111', 0, '', 1, 'wjbsyc', 0, 4, NULL, NULL, 0),
(221, 1, 1, 1490275192, 1488297600, 1490889600, '123', 1, '', 1, 'wjbsyc', 1, 1, 1, 'uid', 0),
(222, 1, 1, 1490283701, 1488297600, 1490889600, '234', 1, '', 1, 'admin', 1, 2, 1, 'uid', 0),
(223, 2, 1, 1490287374, 1488297600, 1490889600, '3213123', 1, '', 1, 'admin', 0, 4, NULL, NULL, 0),
(224, 1, 1, 1490329217, 1488297600, 1490889600, '21421', 1, '', 1, 'admin', 0, 2, 0, 'uid', 0),
(225, 1, 1, 1490330568, 1488297600, 1490889600, '投票', 1, '', 1, 'admin', 0, 2, 1, 'none', 0),
(226, 1, 1, 1490337509, 1489075200, 1490284800, 'aa', 1, '', 1, 'admin', 1, 1, 1, 'uid', 0);

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

--
-- 转存表中的数据 `project_each_action`
--

INSERT INTO `project_each_action` (`id`, `pid`, `ip`, `uid`, `dateline`, `action`, `action_day`, `username`) VALUES
(35, 220, '0.0.0.0', 1, 1490270941, '["11111"]', 20170323, 'wjbsyc'),
(36, 219, '0.0.0.0', 1, 1490273680, '["123"]', 20170323, 'wjbsyc'),
(37, 220, '0.0.0.0', 1, 1490283009, '["11111"]', 20170323, 'atest'),
(38, 223, '0.0.0.0', 1, 1490289318, '["2414241"]', 20170324, 'atest'),
(39, 224, '0.0.0.0', 1, 1490290332, '["11111"]', 20170324, 'atest'),
(40, 222, '0.0.0.0', 1, 1490292596, '["243"]', 20170324, 'atest'),
(41, 220, '0.0.0.0', 1, 1490293126, '["11111"]', 20170324, 'atest'),
(42, 223, '0.0.0.0', 1, 1490293207, '["2414241"]', 20170324, '1234554321'),
(43, 225, '0.0.0.0', 1, 1490330581, '["1"]', 20170324, 'atest'),
(44, 223, '127.0.0.1', 1, 1490337038, '["2414241"]', 20170324, 'aaaaaaa');

-- --------------------------------------------------------

--
-- 表的结构 `project_fields`
--

CREATE TABLE `project_fields` (
  `pid` mediumint(8) UNSIGNED NOT NULL,
  `options` text NOT NULL,
  `options_count` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `project_fields`
--

INSERT INTO `project_fields` (`pid`, `options`, `options_count`) VALUES
(217, '[{"type":"radio","title":"666","range":"1","options":["666"],"results":[0]}]', 1),
(218, '[{"type":"radio","title":"111","range":"1","options":["111"],"results":[0]}]', 1),
(219, '[{"type":"radio","title":"123","range":"1","options":["123"],"results":[1]}]', 1),
(220, '[{"type":"radio","title":"11111","range":"1","options":["11111"],"results":[3]}]', 1),
(221, '[{"type":"radio","title":"44","range":"1","options":["55"],"results":[0]}]', 1),
(222, '[{"type":"radio","title":"234","range":"1","options":["243"],"results":[1]}]', 1),
(223, '[{"type":"radio","title":"2113124","range":"1","options":["2414241"],"results":[3]}]', 1),
(224, '[{"type":"radio","title":"1111","range":"1","options":["11111"],"results":[0]}]', 1),
(225, '[{"type":"radio","title":"\\uff1f","range":"1","options":["1","2","3"],"results":[1,0,0]}]', 1),
(226, '[{"type":"radio","title":"aaa","range":"1","options":["111"],"results":[0]}]', 1);

-- --------------------------------------------------------

--
-- 表的结构 `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `power` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`, `phone_number`, `email`, `power`) VALUES
(1, 'aaa', 'bbb', '123', '123@qq.com', NULL),
(2, 'aaaa', 'aaaaaa', '13813849166', '138138456@qq.com', NULL),
(3, 'bbbb', 'aaaaaaa', '13813849166', '123456789@qq.com', NULL),
(4, 'aaaaa', 'aaaaaaa', '13813849166', '123456789@qq.com', NULL),
(5, 'aaaaaa', '123451', '13812345678', 'aaa@qq.com', NULL),
(6, 'wjbsyc', 'wjbs19950104', '13311111111', '1111@111.com', NULL),
(7, '1111', '123456789', '13333333333', '133@33.com', NULL),
(8, 'homura', '101672c79b019d1e5db3208fba00b2', '13333333333', '111@111.com', NULL),
(9, 'akemi', '101672c79b019d1e5db3208fba00b2a8', '13333333333', '111@111.com', NULL),
(10, 'atest', '4b7d967a9b5b1f416d00c74cad290b69d50d7ccc1a8ab6f956163fbb53cab005', '13333333333', '122@11.cc', NULL),
(11, 'admin', 'd5008eef5d4e4f28e3e3f5fdef58a1e794719af17bfafd7c56630c7efb209944', '13333333333', '111@111.cc', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(12, 'laravel', '029de6fb08d212a8bbea01b5dfe6b764531e80d83d12b5211b0e2c74bc20066d', '13888888888', '111@111.com', NULL),
(13, 'fuckyou', 'b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860', '13333333333', '111@111.cc', NULL),
(14, 'assssss', 'b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860', '13333333333', '111@111.cc', NULL),
(15, 'acccccc', 'b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860', '13333333333', '111@111.cc', NULL),
(16, 'aqqqqqqq', '9162849a927a398cd3cd8f6c392c31ba4f177eb5c5ee751ef7ebe148ce3d294b', '13333333333', '11@11.cc', NULL),
(17, '12311', '1350b748120f2b06d8867d267dfa77b29f741aed9c8351f9591754ad6c44440c', '13333333333', '11@11.cc', NULL),
(18, 'axxxxx', 'd8ca858bbc656bc2110d7996508cc89226483b3ea8de816f557f827f4b526f50', '13333333333', '11@11.cc', NULL),
(19, 'addsadad', 'e8099d5e7e4763651b17932d9b82bb609039b2dbc450bb28e4e4b271844b122f', '13333333333', '11@11.cc', NULL),
(20, 'whatthefuck', 'b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860', '13333333333', '11@11.cc', NULL),
(21, 'whatth', 'b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860', '13333333333', '11@11.cc', NULL),
(22, '1234554321', 'e8099d5e7e4763651b17932d9b82bb609039b2dbc450bb28e4e4b271844b122f', '13333333333', '11@11.cc', NULL),
(23, 'aaaaaaa', 'd08767bda069a5de92422bcc7b3099d8ebc0a7d3750b09886cb686e5addf9664', '13812345678', '123@qq.com', NULL),
(24, 'bbbbbbb', '1e1e3638340bb0e806f8c20d8be8238b1b9bad159c5c11a4992bc58270bcfc40', '13812345678', '123@qq.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- 使用表AUTO_INCREMENT `project_each_action`
--
ALTER TABLE `project_each_action`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- 使用表AUTO_INCREMENT `project_fields`
--
ALTER TABLE `project_fields`
  MODIFY `pid` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- 使用表AUTO_INCREMENT `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
