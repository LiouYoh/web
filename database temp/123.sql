-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016 年 06 月 01 日 13:44
-- 伺服器版本: 5.6.15-log
-- PHP 版本： 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `123`
--

-- --------------------------------------------------------

--
-- 資料表結構 `員工`
--

CREATE TABLE IF NOT EXISTS `員工` (
  `員工帳號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `員工密碼` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `員工主管帳號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`員工帳號`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `員工`
--

INSERT INTO `員工` (`員工帳號`, `員工密碼`, `員工主管帳號`) VALUES
('410306259', 'peper40410', '');

-- --------------------------------------------------------

--
-- 資料表結構 `商品`
--

CREATE TABLE IF NOT EXISTS `商品` (
  `商品編號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `商品名稱` text COLLATE utf8_unicode_ci NOT NULL,
  `商品品牌` text COLLATE utf8_unicode_ci NOT NULL,
  `價格` int(20) NOT NULL,
  `數量` int(20) NOT NULL,
  `尺寸` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `管理員工帳號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`商品編號`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `會員`
--

CREATE TABLE IF NOT EXISTS `會員` (
  `會員帳號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `會員密碼` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `會員地址` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`會員帳號`),
  UNIQUE KEY `會員帳號` (`會員帳號`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `會員`
--

INSERT INTO `會員` (`會員帳號`, `會員密碼`, `會員地址`) VALUES
('peper40410', 'p82811681', '台北市中山區中山北路三段40號');

-- --------------------------------------------------------

--
-- 資料表結構 `訂單`
--

CREATE TABLE IF NOT EXISTS `訂單` (
  `訂單編號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `會員帳號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `商品編號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `數量` int(11) NOT NULL,
  `會員地址` text COLLATE utf8_unicode_ci NOT NULL,
  `價格` int(20) NOT NULL,
  `送貨員編號` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`會員帳號`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `送貨員`
--

CREATE TABLE IF NOT EXISTS `送貨員` (
  `送貨員編號` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `聯絡員工帳號` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`送貨員編號`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `送貨員`
--

INSERT INTO `送貨員` (`送貨員編號`, `聯絡員工帳號`) VALUES
('123456789', '410306259');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
