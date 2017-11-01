-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 08:21 PM
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
-- Table structure for table `tbl_ingredient_bread`
--

CREATE TABLE `tbl_ingredient_bread` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_ingredient_meat` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_ingredient_cheese` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_ingredient_vegetable` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_ingredient_sauce` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tbl_ingredient_meat`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tbl_ingredient_cheese`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tbl_ingredient_vegetable`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `tbl_ingredient_sauce`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tbl_ingredient_meat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tbl_ingredient_cheese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tbl_ingredient_vegetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tbl_ingredient_sauce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
