-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 6 月 14 日 14:57
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_member`
--

CREATE TABLE IF NOT EXISTS `dat_member` (
`code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `danjo` int(11) NOT NULL,
  `born` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_member`
--

INSERT INTO `dat_member` (`code`, `date`, `password`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`, `danjo`, `born`) VALUES
(1, '2018-06-13 08:57:26', '672e8789aeb63f7dd92d5f4dcc0a641a', '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462', 1, 1980),
(2, '2018-06-13 09:06:23', '1c63129ae9db9c60c3e8aa94d3e00495', '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462', 1, 1980),
(3, '2018-06-13 09:08:42', '1c63129ae9db9c60c3e8aa94d3e00495', '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '1062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462', 1, 1980);

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales`
--

CREATE TABLE IF NOT EXISTS `dat_sales` (
`code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code_member` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_sales`
--

INSERT INTO `dat_sales` (`code`, `date`, `code_member`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`) VALUES
(1, '2018-06-11 11:56:19', 0, '瀧澤', 'shunsuke.takizawa89@shiro-gami.com', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(2, '2018-06-11 11:58:17', 0, '田中太郎', '111111@gmail.com', '123', '0851', '南青山2-27', '080-1222-0098'),
(3, '2018-06-11 12:59:55', 0, '瀧澤', 'shunsuke.takizawa@aprtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(4, '2018-06-11 13:01:12', 0, '瀧澤', 'shunsuke.takizawa@aprtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(5, '2018-06-11 13:45:51', 0, '瀧澤しゅんすけ', 'shunsuke.takizawa89@shiro-gami.com', '107', '0851', '南青山2-27-25ヒューリッ', '0364555462'),
(6, '2018-06-11 13:46:24', 0, '瀧澤しゅんすけ', 'shunsuke.takizawa89@shiro-gami.com', '107', '0851', '南青山2-27-25ヒューリッ', '0364555462'),
(7, '2018-06-11 13:46:28', 0, '瀧澤しゅんすけ', 'shunsuke.takizawa89@shiro-gami.com', '107', '0851', '南青山2-27-25ヒューリッ', '0364555462'),
(8, '2018-06-11 13:47:50', 0, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(9, '2018-06-12 11:31:05', 0, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(10, '2018-06-13 07:26:23', 0, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '1111', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(11, '2018-06-13 08:57:26', 1, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(12, '2018-06-13 09:06:23', 2, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(13, '2018-06-13 09:08:42', 3, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '1062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462'),
(14, '2018-06-13 09:58:35', 1, '瀧澤', 'shunsuke.takizawa@prtimes.co.jp', '107', '0062', '南青山2-27-25ヒューリック南青山ビル3F', '0364555462');

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales_product`
--

CREATE TABLE IF NOT EXISTS `dat_sales_product` (
`code` int(11) NOT NULL,
  `code_sales` int(11) NOT NULL,
  `code_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `dat_sales_product`
--

INSERT INTO `dat_sales_product` (`code`, `code_sales`, `code_product`, `price`, `quantity`) VALUES
(1, 1, 25, 111, 4),
(2, 1, 27, 380, 5),
(3, 2, 25, 111, 1),
(4, 2, 27, 380, 2),
(5, 3, 25, 111, 1),
(6, 3, 27, 380, 2),
(7, 4, 25, 111, 1),
(8, 4, 27, 380, 2),
(9, 5, 25, 111, 6),
(10, 5, 27, 380, 6),
(11, 8, 25, 111, 3),
(12, 9, 25, 111, 5),
(13, 10, 25, 111, 9),
(14, 11, 25, 111, 2),
(15, 11, 27, 380, 1),
(16, 12, 25, 111, 2),
(17, 12, 27, 380, 1),
(18, 13, 25, 111, 2),
(19, 13, 27, 380, 1),
(20, 14, 27, 380, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE IF NOT EXISTS `mst_product` (
`code` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`) VALUES
(25, 'aaa', 111, 'gazou.jpg'),
(27, 'aaa', 380, '01gazou.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE IF NOT EXISTS `mst_staff` (
`code` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(2, 'shunsuke', '2c216b1ba5e33a27eb6d3df7de7f8c36'),
(3, 'shunsuke', '2c216b1ba5e33a27eb6d3df7de7f8c36'),
(4, 'syunnsuke', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'あああああああ１２３', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'shunsuke', '672e8789aeb63f7dd92d5f4dcc0a641a'),
(7, 'たきざわ', '672e8789aeb63f7dd92d5f4dcc0a641a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_member`
--
ALTER TABLE `dat_member`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales`
--
ALTER TABLE `dat_sales`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
 ADD PRIMARY KEY (`code`), ADD KEY `code` (`code`), ADD KEY `code_2` (`code`), ADD KEY `code_3` (`code`), ADD KEY `code_4` (`code`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
 ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_member`
--
ALTER TABLE `dat_member`
MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dat_sales`
--
ALTER TABLE `dat_sales`
MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `mst_product`
--
ALTER TABLE `mst_product`
MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `mst_staff`
--
ALTER TABLE `mst_staff`
MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
