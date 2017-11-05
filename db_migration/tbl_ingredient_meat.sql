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
-- Table structure for table `tbl_ingredient_meat`
--

CREATE TABLE `tbl_ingredient_meat` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredient_meat`
--
--calcoies are per slice
--one slice is about 1 ounce
--there are usually two ounces of meat in a sandwich
INSERT INTO `tbl_ingredient_meat` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'turkey', 22, 'http://cdn-mf0.heartyhosting.com/sites/mensfitness.com/files/styles/gallery_slideshow_image/public/sliced-turkey.jpg'),
(2, 'roast_beef', 35, 'https://images.eatthismuch.com/site_media/img/99969_ldementhon_2d356fa3-a0af-49a3-b7ce-49d5ae8f4a0b.png'),
(3, 'honey_ham', 34, 'https://www.allenbrothers.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/o/cover_ham_2010_1.jpg'),
(4, 'beef_pastrami', 40, 'http://3.bp.blogspot.com/-YoHnTQ0LiSs/VItWHeKxIhI/AAAAAAAAA40/45pSy9RkxbQ/s1600/pastrami%2Bno%2Btomato.jpg'),
(5, 'salami', 41, 'https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX4528651.jpg'),
(6, 'bologna', 69, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Bologna_lunch_meat_style_sausage.JPG/1200px-Bologna_lunch_meat_style_sausage.JPG'),
(7, 'mortadella', 47, 'https://www.edesma.gr/images/site/100/239_ren_2010109_mortadella_fetes_1kg_closeup.jpg'),
(8, 'chicken', 29, 'https://groceries.morrisons.com/productImages/304/304305011_0_640x640.jpg?identifier=36fa3f44c40e31e18b31e1963178a39f'),
(9, 'pepperoni', 26, 'https://images.eatthismuch.com/site_media/img/925_ldementhon_9b85ab48-5cf6-46ea-a887-4059fec23440.png'),
(10, 'chorizo', 23, 'http://vinsullivan.com/image/cache/data/Products/charcuterie/chorizo-sliced-500x500.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ingredient_meat`
--
ALTER TABLE `tbl_ingredient_meat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredient_meat`
--
ALTER TABLE `tbl_ingredient_meat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
