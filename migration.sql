-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 08:57 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gredients`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_combos`
--

CREATE TABLE `tbl_combos` (
  `id` int(11) NOT NULL,
  `creater_id` int(11) NOT NULL DEFAULT '999999',
  `bread_id` int(11) NOT NULL,
  `bread_qty` int(11) NOT NULL,
  `meat_id` int(11) NOT NULL,
  `meat_qty` int(11) NOT NULL,
  `cheese_id` int(11) NOT NULL,
  `cheese_qty` int(11) NOT NULL,
  `vegetable_id` int(11) NOT NULL,
  `vegetable_qty` int(11) NOT NULL,
  `sauce_id` int(11) NOT NULL,
  `sauce_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient_bread`
--

CREATE TABLE `tbl_ingredient_bread` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient_cheese`
--

CREATE TABLE `tbl_ingredient_cheese` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient_meat`
--

CREATE TABLE `tbl_ingredient_meat` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient_sauce`
--

CREATE TABLE `tbl_ingredient_sauce` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient_vegetable`
--

CREATE TABLE `tbl_ingredient_vegetable` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `nickname` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nickname`) VALUES
(1, 'admin', '123456', NULL),
(2, 'admin2', '123456', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_combos`
--
ALTER TABLE `tbl_combos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creater_id` (`creater_id`),
  ADD KEY `bread_id` (`bread_id`),
  ADD KEY `meat_id` (`meat_id`),
  ADD KEY `cheese_id` (`cheese_id`),
  ADD KEY `vegetable_id` (`vegetable_id`),
  ADD KEY `sauce_id` (`sauce_id`);


--
-- Indexes for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredient_cheese`
--
ALTER TABLE `tbl_ingredient_cheese`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredient_meat`
--
ALTER TABLE `tbl_ingredient_meat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredient_sauce`
--
ALTER TABLE `tbl_ingredient_sauce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredient_vegetable`
--
ALTER TABLE `tbl_ingredient_vegetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_combos`
--
ALTER TABLE `tbl_combos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ingredient_cheese`
--
ALTER TABLE `tbl_ingredient_cheese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ingredient_meat`
--
ALTER TABLE `tbl_ingredient_meat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ingredient_sauce`
--
ALTER TABLE `tbl_ingredient_sauce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ingredient_vegetable`
--
ALTER TABLE `tbl_ingredient_vegetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_combos`
--
ALTER TABLE `tbl_combos`
  ADD CONSTRAINT `tbl_combos_ibfk_1` FOREIGN KEY (`creater_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_combos_ibfk_2` FOREIGN KEY (`bread_id`) REFERENCES `tbl_ingredient_bread` (`id`),
  ADD CONSTRAINT `tbl_combos_ibfk_3` FOREIGN KEY (`meat_id`) REFERENCES `tbl_ingredient_meat` (`id`),
  ADD CONSTRAINT `tbl_combos_ibfk_4` FOREIGN KEY (`cheese_id`) REFERENCES `tbl_ingredient_cheese` (`id`),
  ADD CONSTRAINT `tbl_combos_ibfk_5` FOREIGN KEY (`vegetable_id`) REFERENCES `tbl_ingredient_vegetable` (`id`),
  ADD CONSTRAINT `tbl_combos_ibfk_6` FOREIGN KEY (`sauce_id`) REFERENCES `tbl_ingredient_sauce` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
