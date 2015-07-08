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
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acct_no` varchar(66) NOT NULL,
  `acct_name` varchar(30) NOT NULL,
  `password` varchar(66) NOT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `create_time` int(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0:inactive,1:active,2:lock,4:deleted',
  `role_type` varchar(10) NOT NULL DEFAULT '' COMMENT '',
  `id_card_num` varchar(30) 
  `memo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`acct_no`),
  UNIQUE KEY `acct_name` (`acct_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `id_card_num` varchar(30) NUll COMMENT 'id card num',
  `realname` varchar(50) NOT NULL COMMENT 'user\'s realname',
  `gender` int(1) NOT NULL DEFAULT '0' COMMENT '1:male, 0; female',
  `age` int(2) NOT NULL DEFAULT '18' COMMENT 'age',
  `birth` int(15) NULL COMMENT 'birthday',
  `addr` varchar() NULL COMMENT 'address',
  `education` varchar(10) NUll COMMENT 'education',
  `graduate_school` varchar(10) NULL COMMENT 'advanced graduate degree' 
  `nationality` varchar(8) NULL COMMENT 'nationality(get it by reg ip)',
  `prov_code` varchar(8) NULL COMMENT 'province belong to(get prov by reg ip)',
  `city_code` varchar(8) COMMENT 'city code(get city code by reg ip)',
  `post_code` varchar(10) COMMENT 'post code num',
  PRIMARY KEY (`id_card_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `rid` varchar() NOT NULL,
  `realname` varchar(50) NOT NULL COMMENT 'user\'s realname',
  `authority`,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`acct_no`, `acct_name`, `password`, `cellphone`, `email`, `create_time`, `status`, `role_type`, `memo`) VALUES
('a23306dab4c710a331d8758f6394ea1fad34b19d', 'luangng', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'luangng916@gmail.com', 1436340766, 1, NULL, NULL);

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
