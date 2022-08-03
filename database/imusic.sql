-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 10:19 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Code` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `ct_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ID`, `Name`, `Description`, `Code`, `Image`, `Price`, `ct_ID`) VALUES
(1, 'Good days', 'song by Salena', 9, 'img/Find-The-Best-DJ-Equipment-700x400.jpg', 11.9, 2),
(3, 'Earphone', 'earphones by JBL', 97, 'img/SDL508205537_5.jpg', 10, 1),
(4, 'I have a dream', 'New famous song', 977, 'img/methode_times_prod_web_bin_d12b3eb0-10ec-11e8-aa39-e7299ff3a5e8.jpg', 32.55, 2),
(5, 'steel my girl', 'by One Direction', 963, 'img/upstate-concert-hall.jpg', 14.99, 2),
(6, 'Headphones', 'Headphones with very good quality', 90, 'img/PrdBHwM2cGbHychF7CinNF.jpg', 99.99, 1),
(2, 'Guitar', 'official guitar', 88, 'img/196197_6100412_updates.jpg', 150.99, 1),
(7, 'Everything i love', 'by Peter Erskine', 87, 'img/rockmusic.jpg', 15.6, 3),
(8, 'All alone', 'by Mal Waldron', 86, 'img/upstate-concert-hall.jpg', 16.2, 3),
(9, 'Windows', 'by Chick Corea', 85, 'img/Jazz.jpg', 5.6, 3),
(10, 'Salena Album', 'Whole new Salena Album', 70, 'img/cool_salena_gomez_hd-wallpaper.jpg', 50, 4),
(11, 'One Direction songs', 'All new One Direction songs', 79, 'img/one-direction-28v.jpg', 99, 4),
(12, 'Piano', 'Brand new paino', 78, 'img/images (1).jpg', 250.2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `ct_ID` int(11) NOT NULL,
  `ct_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`ct_ID`, `ct_Name`) VALUES
(1, 'Accessories'),
(2, 'POP'),
(3, 'Jaz'),
(4, 'New item');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE `tbl_logins` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logins`
--

INSERT INTO `tbl_logins` (`id`, `email`, `password`, `first_name`) VALUES
(1, 'abc@abc.com', '123456', ''),
(2, 'navi@nav.com', '123456', ''),
(3, 'navisher@gmail.com', 'naveen', ''),
(4, 'Ander@and.com', '123456', ''),
(5, 'partrick@pat.com', '123456', ''),
(6, 'Guest@gue.com', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `ad_ID` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`ad_ID`, `ad_name`, `email`, `password`) VALUES
(1, 'Naveen', 'naveen@9.com', '12345678'),
(2, 'John', 'john@cena.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`ad_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `ad_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
