-- phpMyAdmin SQL Dump
-- version 4.2.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-07-02 22:55:52
-- 服务器版本： 5.5.28
-- PHP Version: 5.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `city_cn`
--

DROP TABLE IF EXISTS `city_cn`;
CREATE TABLE IF NOT EXISTS `city_cn` (
  `city_code` varchar(6) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `prov_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `city_cn`
--

INSERT INTO `city_cn` (`city_code`, `city_name`, `prov_code`) VALUES
('321200', '镇江市', '320000'),
('321300', '扬州市', '320000');

-- --------------------------------------------------------

--
-- 表的结构 `commodity`
--

DROP TABLE IF EXISTS `commodity`;
CREATE TABLE IF NOT EXISTS `commodity` (
  `com_id` varchar(66) NOT NULL,
  `com_name` varchar(30) NOT NULL,
  `com_price` int(10) DEFAULT '0',
  `memo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `district_cn`
--

DROP TABLE IF EXISTS `district_cn`;
CREATE TABLE IF NOT EXISTS `district_cn` (
  `district_code` varchar(6) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `city_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `province_cn`
--

DROP TABLE IF EXISTS `province_cn`;
CREATE TABLE IF NOT EXISTS `province_cn` (
  `prov_code` varchar(6) NOT NULL,
  `prov_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `province_cn`
--

INSERT INTO `province_cn` (`prov_code`, `prov_name`) VALUES
('110000', '北京市'),
('120000', '天津市'),
('130000', '河北省'),
('140000', '山西省'),
('150000', '内蒙古自治区'),
('210000', '辽宁省'),
('220000', '吉林省'),
('230000', '黑龙江省'),
('310000', '上海市'),
('320000', '江苏省'),
('330000', '浙江省');

-- --------------------------------------------------------

--
-- 表的结构 `road_cn`
--

DROP TABLE IF EXISTS `road_cn`;
CREATE TABLE IF NOT EXISTS `road_cn` (
  `road_code` varchar(6) NOT NULL,
  `road_name` varchar(20) NOT NULL,
  `district_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL COMMENT '?û?????',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '?û???',
  `password` char(50) NOT NULL DEFAULT '' COMMENT '?û?????',
  `email` varchar(50) NOT NULL DEFAULT '',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '?û??ֻ?????',
  `create_time` int(13) NOT NULL DEFAULT '0' COMMENT '?˺Ŵ???ʱ??',
  `mobile_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '?ֻ??Ƿ?ͨ????֤',
  `email_state` tinyint(1) NOT NULL DEFAULT '0',
  `active_code` char(40) NOT NULL DEFAULT '' COMMENT '??????',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '?û?״̬',
  `is_lock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '?Ƿ?????'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`, `create_time`, `mobile_state`, `email_state`, `active_code`, `status`, `is_lock`) VALUES
(1, 'luang', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'luangng@163.com', '', 1427165602, 0, 0, '', 1, 0),
(2, 'hank', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hank@163.com', '', 1427165735, 0, 0, '', 0, 0),
(4, 'leon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'asdfcds', '', 1427167588, 0, 0, '', 0, 0),
(5, 'wadwvdsva', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dsvdsvasdv', '', 1427167808, 0, 0, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_cn`
--
ALTER TABLE `city_cn`
 ADD PRIMARY KEY (`city_code`);

--
-- Indexes for table `commodity`
--
ALTER TABLE `commodity`
 ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `district_cn`
--
ALTER TABLE `district_cn`
 ADD PRIMARY KEY (`district_code`);

--
-- Indexes for table `province_cn`
--
ALTER TABLE `province_cn`
 ADD PRIMARY KEY (`prov_code`);

--
-- Indexes for table `road_cn`
--
ALTER TABLE `road_cn`
 ADD PRIMARY KEY (`road_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`), ADD KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '?û?????',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
