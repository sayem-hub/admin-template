-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 03:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `activeStatus` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subTitle`, `details`, `image`, `activeStatus`) VALUES
(1, 'Name', 'Surname', 'Abu Sayem', 'sayem.jpg', 0),
(2, 'Abc', 'xyz', 'abcdefg', 'sayem1.jpg', 0),
(3, 'SAFAS', 'ASDFASF', 'ASDFAS', '', 0),
(4, 'gds', 'sadfa', 'sadia', '', 0),
(5, 'sadfsa', 'sdafdffdgdf', 'Nagi Nagin .........', '', 0),
(6, 'Abu Sayem', 'Sayem Amir', 'Abu Sayem Amir 1111', '', 0),
(7, 'New banner', 'new sub title', 'Many brief text', '', 0),
(8, 'Lets write title', 'Hmm this is sub title', 'Ar koto details lekha jai hmm?', '', 0),
(9, 'Le paglu', 'Hahaha', 'Le paglu dance', '', 0),
(10, 'Le paglu', 'Le paglu sub', 'Le paglu details', '1656221683.jpg', 0),
(11, 'Le paglu-1', 'Le paglu sub-2', 'How are you', '1656221789.jpg', 1),
(12, 'Sayem', 'Abu Sayem', 'Abu Sayem Amir', '1656223124.jpg', 1),
(13, 'adfasdf', 'adfafddasdfads', 'asdfffffffffffffffffffffff', '1656223522.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `activeStatus` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `activeStatus`) VALUES
(1, 'Web Design', 1),
(2, 'Web Development', 1),
(3, 'App Development', 1),
(4, 'Software Development', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ourprojects`
--

CREATE TABLE `ourprojects` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `projectLink` text DEFAULT NULL,
  `project_image` varchar(100) NOT NULL,
  `activeStatus` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ourprojects`
--

INSERT INTO `ourprojects` (`id`, `category_id`, `projectName`, `projectLink`, `project_image`, `activeStatus`) VALUES
(1, 2, 'Developing E-Commerce', 'www.e-commerce.com', 'Omuk.jpg', 1),
(2, 2, 'Developing Portfolio ed', 'www.e-portfolio.com ed', 'Ommuk.jpg', 1),
(3, 4, 'Developing Business Soft', 'www.business-soft.com', 'Lalbahar.jpg', 1),
(4, 3, 'sdfasdf', 'adfasfd', '1656245729.jpg', 1),
(5, 1, 'Abu Sayem from project create', 'Sayem from project create', '1656245787.jpg', 1),
(6, 3, ' from project create', 'Sayem from prt create', '1656245824.jpg', 1),
(7, 2, 'hope final edit', 'Hope final too edit', '1656245910.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourprojects`
--
ALTER TABLE `ourprojects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ourprojects`
--
ALTER TABLE `ourprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
