-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2022-05-31 16:54:33
-- 服务器版本： 5.7.17-log
-- PHP Version: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_yinghao`
--

-- --------------------------------------------------------

--
-- 表的结构 `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `code` char(3) CHARACTER SET ascii DEFAULT NULL,
  `t_status` enum('ok','hold') CHARACTER SET ascii NOT NULL DEFAULT 'ok'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `code`, `t_status`) VALUES
(1, 'a', '213', 'ok'),
(2, 'b', '12', 'hold'),
(3, 'c', '46', 'hold'),
(4, 'd', '1', 'ok'),
(5, 'e', '68', 'ok'),
(6, 'f', '73', 'hold'),
(7, 'g', '5', 'ok'),
(8, 'h', '8', 'ok'),
(9, 'i', '56', 'ok'),
(10, 'j', '10', 'hold'),
(11, 'k', '523', 'ok'),
(12, 'l', '79', 'hold'),
(13, 'm', '234', 'ok'),
(14, 'n', '36', 'ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_code` (`code`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
