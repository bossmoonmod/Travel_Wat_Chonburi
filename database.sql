USE chonburi_temples;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2026 at 08:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chonburi_temples`
--

-- --------------------------------------------------------

--
-- Table structure for table `temples`
--

CREATE TABLE `temples` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `map_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `temples`
--

INSERT INTO `temples` (`id`, `name`, `image`, `address`, `description`, `map_link`) VALUES
(1, 'วัดแสนสุขสุทธิวราราม', 'assets/img/วัดแสนสุขสุทธิวราราม.jpg', 'ต.แสนสุข อ.เมือง จ.ชลบุรี', 'มหาเจดีย์ทรายวัดแสนสุข สวยงามงดงาม อลังการ หนึ่งเดียวในชลบุรี', 'map.php?id=1'),
(2, 'วัดญาณสังวราราม วรมหาวิหาร', 'assets/img/วัดญาณสังวราราม วรมหาวิหาร.jpg', 'ต.ห้วยใหญ่ อ.บางละมุง จ.ชลบุรี', 'พระอารามหลวงชั้นเอก บรรยากาศเงียบสงบ ร่มรื่น มีสถาปัตยกรรมหลากหลาย', 'map.php?id=2'),
(3, 'วัดพระใหญ่ (Big Buddha)', 'assets/img/วัดพระใหญ่.jpg', 'เขาพระตำหนัก พัทยา จ.ชลบุรี', 'ประดิษฐานพระพุทธรูปองค์ใหญ่บนยอดเขา จุดชมวิวเมืองพัทยามุมสูง', 'map.php?id=3'),
(4, 'วิหารเทพสถิตพระกิติเฉลิม (ศาลเจ้าหน่าจา)', 'assets/img/วิหารเทพสถิตพระกิติเฉลิม.jpg', 'ต.อ่างศิลา อ.เมือง จ.ชลบุรี', 'สถาปัตยกรรมจีนอันวิจิตรตระการตา สถานที่ศักดิ์สิทธิ์ที่ผู้คนนิยมมากราบไหว้', 'map.php?id=4'),
(5, 'วัดหลวงพี่แซม', 'assets/img/วัดหลวงพี่แซม พนัสนิคม.jpg', 'อ.พนัสนิคม จ.ชลบุรี', 'โดดเด่นด้วยถ้ำลอดมหาจักรพรรดิ์ และพญานาคราชสวยงาม', 'map.php?id=5'),
(6, 'วัดบุญญาวาส', 'assets/img/วัดบุญญาวาส.jpg', 'อ.บ่อทอง จ.ชลบุรี', 'วัดป่าที่เงียบสงบ เหมาะแก่การปฏิบัติธรรม ท่ามกลางธรรมชาติ', 'map.php?id=6'),
(7, 'วัดหนองจับเต่า', 'assets/img/วัดหนองจับเต่า.jpg', 'ต.นาจอมเทียน อ.สัตหีบ จ.ชลบุรี', 'โบสถ์สีขาวสวยงาม และพญานาคราชปู่พญาเต่าเรือน', 'map.php?id=7'),
(8, 'วัดห้วยใหญ่', 'assets/img/วัดห้วยใหญ่.JPG', 'ต.ห้วยใหญ่ อ.บางละมุง จ.ชลบุรี', 'วัดเก่าแก่ศักดิ์สิทธิ์ มีพิธีสะเดาะเคราะห์นอนโลงต่อชะตา', 'map.php?id=8'),
(9, 'สำนักสงฆ์เขาพระครู', 'assets/img/สำนักสงฆ์เขาพระครู.jpg', 'อ.ศรีราชา จ.ชลบุรี', 'สถานปฏิบัติธรรมบนยอดเขา ชมวิวเมืองศรีราชาแบบพาโนรามา สวยงามเงียบสงบ', 'map.php?id=9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temples`
--
ALTER TABLE `temples`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temples`
--
ALTER TABLE `temples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
