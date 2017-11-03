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

CREATE TABLE `tbl_ingredient_bread` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `calories` int(11) NOT NULL,
  `pictureURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredient_bread`
--

INSERT INTO `tbl_ingredient_bread` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'wheat_bread', 69, 'http://img.allw.mn/content/2013/11/24210219_6761.jpg'),
(2, 'white_bread', 79, 'http://urbanwired.com/health/wp-content/uploads/sites/2/2017/01/e30eb4f2d73f1a3cc3614ba54f17b5e6.jpg'),
(3, 'potato_bread', 85, 'https://cdn2.tmbi.com/TOH/Images/Photos/37/300x300/exps15220_RDS1338202D53A.jpg'),
(4, 'rye_bread', 65, 'https://assets.marthastewart.com/styles/wmax-1500/d18/rye-bread-mblb2009/rye-bread-mblb2009_horiz.jpg?itok=gR0VGBrQ'),
(5, 'gluten_free_bread', 70, 'https://img.aws.livestrongcdn.com/ls-article-image-673/ds-photo/getty/article/19/23/497687954.jpg'),
(6, 'white_wrap', 70, 'http://img.taste.com.au/xzkCGkYB/w643-h428-cfill-q90/taste/2016/11/barbecue-beef-wraps-59449-1.jpeg'),
(7, 'wheat_wrap', 100, 'http://images.media-allrecipes.com/userphotos/960x960/3758666.jpg'),
(8, 'spinach_wrap', 130, 'http://images.appehtite.ca/images/5287_ml%20canned%20flakes%20ham%20cheese%20spinach%20wrap.jpg'),
(9, 'tomato_wrap', 160, 'http://www.missionmenus.com/images/recipes/57/misn_wrap_sundriedtomatobasilpestochickenwrap__medium.jpg'),
(10, 'gluten_free_wrap', 75, 'http://beyondmeat-uploads.s3.amazonaws.com/recipes/buffalo-gluten-free-chicken-wrap/Buffalo-Gluten-Free-Wrap.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
