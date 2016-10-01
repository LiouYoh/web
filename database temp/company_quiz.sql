-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016 年 04 月 11 日 11:12
-- 伺服器版本: 5.6.15-log
-- PHP 版本： 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `company_quiz`
--

-- --------------------------------------------------------

--
-- 資料表結構 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Dname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Dnumber` int(11) NOT NULL,
  `Mgr_ssn` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Mgr_start_date` date DEFAULT NULL,
  PRIMARY KEY (`Dnumber`),
  UNIQUE KEY `Dname` (`Dname`),
  KEY `Mgr_ssn` (`Mgr_ssn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `department`
--

INSERT INTO `department` (`Dname`, `Dnumber`, `Mgr_ssn`, `Mgr_start_date`) VALUES
('Research', 5, '333445555', '1988-05-22'),
('Administration', 4, '987654321', '1995-01-01'),
('Headquarters', 1, '888665555', '1981-06-19');

-- --------------------------------------------------------

--
-- 資料表結構 `dependent`
--

CREATE TABLE IF NOT EXISTS `dependent` (
  `Essn` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Dependent_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Sex` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `relationship` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Essn`,`Dependent_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `dependent`
--

INSERT INTO `dependent` (`Essn`, `Dependent_name`, `Sex`, `Bdate`, `relationship`) VALUES
('333445555', 'Alice', 'F', '1986-04-05', 'Daughter'),
('333445555', 'Theodore', 'M', '1983-10-25', 'Son'),
('333445555', 'Joy', 'F', '1958-05-03', 'Spouse'),
('987654321', 'Abner', 'M', '1942-02-28', 'Spouse'),
('123456789', 'Michael', 'M', '1988-01-04', 'Son'),
('123456789', 'Alice', 'F', '1988-12-30', 'Daughter'),
('123456789', 'Elizabeth', 'F', '1967-05-05', 'Spouse');

-- --------------------------------------------------------

--
-- 資料表結構 `dept_locations`
--

CREATE TABLE IF NOT EXISTS `dept_locations` (
  `Dnumber` int(11) NOT NULL,
  `Dlocation` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Dnumber`,`Dlocation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `dept_locations`
--

INSERT INTO `dept_locations` (`Dnumber`, `Dlocation`) VALUES
(1, 'Houston'),
(2, 'Bellaire'),
(2, 'Houston'),
(2, 'Sugarland'),
(4, 'Stafford');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Fname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Minit` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Ssn` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Bdate` date DEFAULT NULL,
  `Address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sex` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Super_ssn` char(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dno` int(11) NOT NULL,
  PRIMARY KEY (`Ssn`),
  KEY `Super_ssn` (`Super_ssn`),
  KEY `Dno` (`Dno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `employee`
--

INSERT INTO `employee` (`Fname`, `Minit`, `Lname`, `Ssn`, `Bdate`, `Address`, `Sex`, `Salary`, `Super_ssn`, `Dno`) VALUES
('John', 'B', 'Smith', '123456789', '1965-01-09', '731 Fondren, Houstin, TX', 'M', '30000.00', '333445555', 5),
('Franklin', 'T', 'Wong', '333445555', '1955-12-08', '638 Voss, Houstin, TX', 'M', '40000.00', '888665555', 5),
('Alicia', 'J', 'Zelaya', '999887777', '1968-01-19', '3321 Castle, Spring, TX', 'F', '25000.00', '987654321', 4),
('Jennifer', 'S', 'Wallace', '987654321', '1941-06-20', '291 Berry, Bellaire, TX', 'F', '43000.00', '888665555', 4),
('Ramesh', 'K', 'Narayan', '666884444', '1962-09-15', '975 Fire Oak, Humble, TX', 'M', '38000.00', '333445555', 5),
('Joyce', 'A', 'English', '453453453', '1972-07-31', '5631 Rice, Houston, TX', 'F', '25000.00', '333445555', 5),
('Ahmad', 'V', 'Jabbar', '987987987', '1969-03-29', '980 Dallas, Houston, TX', 'M', '25000.00', '987654321', 4),
('James', 'E', 'Borg', '888665555', '1937-11-10', '450 Stone, Houston, TX', 'M', '55000.00', NULL, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Pname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Pnumber` int(11) NOT NULL,
  `Plocation` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dnum` int(11) NOT NULL,
  PRIMARY KEY (`Pnumber`),
  UNIQUE KEY `Pname` (`Pname`),
  KEY `Dnum` (`Dnum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `project`
--

INSERT INTO `project` (`Pname`, `Pnumber`, `Plocation`, `Dnum`) VALUES
('ProductX', 1, 'Bellaire', 5),
('ProductY', 2, 'Sugarland', 5),
('ProductZ', 3, 'Houston', 5),
('Computerization', 10, 'Stafford', 4),
('Reorganization', 20, 'Houston', 1),
('Newbenefits', 30, 'Stafford', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `works_on`
--

CREATE TABLE IF NOT EXISTS `works_on` (
  `Essn` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `Pno` int(11) NOT NULL,
  `Hours` decimal(3,1) NOT NULL,
  PRIMARY KEY (`Essn`,`Pno`),
  KEY `Pno` (`Pno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `works_on`
--

INSERT INTO `works_on` (`Essn`, `Pno`, `Hours`) VALUES
('123456789', 1, '32.5'),
('123456789', 2, '7.5'),
('666884444', 3, '40.0'),
('453453453', 1, '20.0'),
('453453453', 2, '20.0'),
('333445555', 2, '10.0'),
('333445555', 3, '10.0'),
('333445555', 10, '10.0'),
('333445555', 20, '10.0'),
('999887777', 30, '30.0'),
('999887777', 10, '10.0'),
('987987987', 10, '35.0'),
('987987987', 30, '5.0'),
('987654321', 30, '20.0'),
('987654321', 20, '15.0'),
('888665555', 20, '0.0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
