-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 11:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id_Book` int(11) NOT NULL,
  `Name_Book` varchar(100) NOT NULL,
  `Author_Book` varchar(100) NOT NULL,
  `Picture` varchar(150) NOT NULL,
  `qty_Book` int(11) NOT NULL,
  `Publisher` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_Book`, `Name_Book`, `Author_Book`, `Picture`, `qty_Book`, `Publisher`) VALUES
(11, 'ใช้ความคิดเอาชนะโชคชะตา : Mindset', 'Carol S. Dweck (แครอล เอส ดเว็ค), Ph.D.', 'image/11.jpg', 10, 'วีเลิร์น, สนพ.'),
(12, 'GRIT : The Power of Passion and Perseverance', 'Angela Duckworth', 'image/12.jpg', 20, 'วีเลิร์น, สนพ.'),
(13, 'รักเป็นไม่เห็นน้ำตา', 'เฌอมาณย์ รัตนพงศ์ตระกูล', 'image/13.jpg', 5, 'BIG IDEA'),
(14, 'Theory of US เหตุนี้จึงมีเรา', 'นพ. ปีย์ เชษฐ์โชติศักดิ์', 'image/14.jpg', 3, 'บันลือ พับลิเคชั่นส์, บจก.'),
(15, 'เท่าที่รัก', 'ทรงวุฒิ อุ่นวิจิตร (บอร์นเก้าสาม)', 'image/15.jpg', 50, 'กนกบรรณสาร'),
(16, 'เพลงกระบี่ สีจิ้นผิง', 'People', 'image/16.jpg', 10, 'เชนจ์พลัส, สนพ.'),
(17, 'ขอฉันลืมเธอ (ได้ก่อน)', 'บาร์จเฉยๆ', 'image/17.jpg', 10, 'BOOKS RIDER'),
(18, 'Money 101 : เริ่มต้นนับหนึ่งสู่ชีวิตการเงินอุดมสุข', 'จักรพงษ์ เมษพันธุ์', 'image/18.jpg', 10, 'ซีเอ็ดยูเคชั่น, บมจ.');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id_Librarian` int(11) NOT NULL,
  `Name_Librarian` varchar(30) NOT NULL,
  `Lastname_Librarian` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `is_Login` tinyint(1) NOT NULL,
  `Last_Event` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id_Librarian`, `Name_Librarian`, `Lastname_Librarian`, `Username`, `Password`, `is_Login`, `Last_Event`) VALUES
(1, 'สมทวย', 'ไม่กินสลิ่ม', 'nopparut', '123456', 1, '2020-02-27 17:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id_Borrow` int(11) NOT NULL,
  `id_Member` int(11) NOT NULL,
  `id_Book` int(11) NOT NULL,
  `id_Librarian` int(11) NOT NULL,
  `Borrow_Date` date NOT NULL,
  `Return_Date` date NOT NULL,
  `isReturn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id_Borrow`, `id_Member`, `id_Book`, `id_Librarian`, `Borrow_Date`, `Return_Date`, `isReturn`) VALUES
(1, 5, 12, 1, '2020-02-27', '2020-03-03', 0),
(2, 5, 12, 1, '2020-02-26', '2020-03-03', 0),
(3, 5, 12, 1, '2019-10-09', '2020-03-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_Member` int(11) NOT NULL,
  `Name_Member` varchar(50) NOT NULL,
  `Lastname_Member` varchar(50) NOT NULL,
  `Addr_Member` varchar(150) NOT NULL,
  `Tel_Member` varchar(20) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `is_Login` tinyint(1) NOT NULL DEFAULT 0,
  `Last_Event` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_Member`, `Name_Member`, `Lastname_Member`, `Addr_Member`, `Tel_Member`, `Username`, `Password`, `is_Login`, `Last_Event`) VALUES
(5, 'นพรุจ', 'พุ่มพฤกษ์', '1/5 กทม', '0954700222', 'nopparut1', '123456789', 0, '2020-02-19 18:00:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_Book`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id_Librarian`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id_Borrow`),
  ADD KEY `FK_Member` (`id_Member`),
  ADD KEY `FK_Book` (`id_Book`),
  ADD KEY `FK_librarian` (`id_Librarian`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_Member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id_Book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id_Librarian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id_Borrow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_Member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `FK_Book` FOREIGN KEY (`id_Book`) REFERENCES `book` (`id_Book`),
  ADD CONSTRAINT `FK_Member` FOREIGN KEY (`id_Member`) REFERENCES `member` (`id_Member`),
  ADD CONSTRAINT `FK_librarian` FOREIGN KEY (`id_Librarian`) REFERENCES `librarian` (`id_Librarian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
