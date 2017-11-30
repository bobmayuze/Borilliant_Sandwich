-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 10:36 PM
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
-- Dumping data for table `tbl_ingredient_cheese`
--

INSERT INTO `tbl_ingredient_cheese` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'swiss', 106, 'https://boygeniusreport.files.wordpress.com/2015/05/swiss_cheese.jpg?quality=98&strip=all'),
(2, 'provolone', 96, 'http://www.murrayscheese.com/site/images/items/20019700000.0.jpg?resizeid=3&resizeh=600&resizew=600'),
(3, 'american', 104, 'http://thumbs.ifood.tv/files/images/editor/images/American%20Cheese.jpg'),
(4, 'cheddar', 113, 'http://www.holypine.com/wp-content/uploads/2015/10/Cheddar-Cheese-600x600.jpg');

--
-- Indexes for dumped tables
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredient_cheese`
--
ALTER TABLE `tbl_ingredient_cheese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
