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
-- Table structure for table `tbl_ingredient_vegetable`
--

CREATE TABLE `tbl_ingredient_vegetable` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredient_vegetable`
--

INSERT INTO `tbl_ingredient_vegetable` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'lettuce', 4, 'https://www.markon.com/sites/default/files/styles/large/public/pi_photos/Green_Leaf_Lettuce_Hero.jpg'),
(2, 'tomato', 4, 'http://growyourowngroceries.org/wp-content/uploads/2015/07/bigstock-Red-sliced-tomato-90434192-300x171.jpg'),
(3, 'onion', 5, 'http://www.pngmart.com/files/1/Onion-Slice-PNG-Transparent-Image.png'),
(4, 'red_sweet_pepper', 3, 'https://upload.wikimedia.org/wikipedia/commons/d/da/Red_capsicum_and_cross_section.jpg'),
(5, 'black_olives', 4, 'https://img.aws.livestrongcdn.com/ls-article-image-400/cme/cme_public_images/www_livestrong_com/photos.demandstudios.com/getty/article/235/241/179216296_XS.jpg'),
(6, 'avocado', 234, 'https://www.organicfacts.net/wp-content/uploads/avocado.jpg'),
(7, 'cucumber_slice', 8, 'https://img.leafcdn.tv/640/clsd/getty/2d9244f4550b4ce9868bfe7f1942128b'),
(8, 'parsley', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQww3IAltAa-wMOqj6H6w9dSB2eyj6TFZVV2PkOft2zOmuZyJZT'),
(9, 'brocoli', 31, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkmgfbl6WvUpe1YQfPNfmWreEIomJ1_Tv_OwhaWqVz1FO8RTNFAQ'),
(10,'spinach', 7, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF7opg_2Beh_C_qLpUtxyZZcbwdAWQzv6LYFkeIXX2VtiRfpgGhA');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ingredient_vegetable`
--
ALTER TABLE `tbl_ingredient_vegetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredient_vegetable`
--
ALTER TABLE `tbl_ingredient_vegetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
