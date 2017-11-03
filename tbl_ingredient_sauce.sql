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
-- Table structure for table `tbl_ingredient_bread`
--

CREATE TABLE `tbl_ingredient_sauce` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredient_bread`
--

INSERT INTO `tbl_ingredient_sauce` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'ranch_dressing', 73, 'https://www.jaysbakingmecrazy.com/wp-content/uploads/2016/01/paleo_ranch2.jpg'),
(2, 'caesar_dressing"', 78, 'https://target.scene7.com/is/image/Target/12946485?wid=520&hei=520&fmt=pjpeg'),
(3, 'blue_cheese_dressing', 70, 'https://i5.walmartimages.com/asr/def10768-4e00-4f82-80f7-3fcdf1e163ab_1.8b796cba97178720ccbfa038715ca0d5.jpeg'),
(4, 'thousand_island_dressing', 58, 'http://food.fnr.sndimg.com/content/dam/images/food/fullset/2013/10/7/0/FNK_Thousand-Island-Dressing_s4x3.jpg.rend.hgtvcom.616.462.suffix/1383814622263.jpeg'),
(5, 'italian_dressing', 130, 'https://upload.wikimedia.org/wikipedia/commons/d/d4/Italian_dressing.jpg'),
(6, 'buffalo_and_bbq_sauce', 40, 'https://www.fire-eaters-bbq.net/Bilder/Artikel/Saucentest0309.JPG'),
(7, 'bbq_sauce', 25, 'https://target.scene7.com/is/image/Target/16759960?wid=520&hei=520&fmt=pjpeg'),
(8, 'mayonnaise', 90, 'http://www.inspiredtaste.net/wp-content/uploads/2015/12/Homemade-Mayonnaise-Recipe-8-1200.jpg'),
(9, 'honey_mustard', 31, 'https://target.scene7.com/is/image/Target/14776132?wid=520&hei=520&fmt=pjpeg'),
(10,'dijon_mustard', 5, 'http://chefsbest.com/wp-content/uploads/2015/11/Maille-Dijon-Mustard-FRONT.jpg');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_sauce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_sauce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
