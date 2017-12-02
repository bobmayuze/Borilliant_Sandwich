-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2017 at 09:44 PM
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
  `meat_id` varchar(80) NOT NULL,
  `meat_qty` varchar(80) NOT NULL,
  `cheese_id` varchar(80) NOT NULL,
  `cheese_qty` varchar(80) NOT NULL,
  `vegetable_id` varchar(80) NOT NULL,
  `vegetable_qty` varchar(80) NOT NULL,
  `sauce_id` varchar(80) NOT NULL,
  `sauce_qty` varchar(80) NOT NULL
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

--
-- Dumping data for table `tbl_ingredient_cheese`
--

INSERT INTO `tbl_ingredient_cheese` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'swiss', 106, 'https://boygeniusreport.files.wordpress.com/2015/05/swiss_cheese.jpg?quality=98&strip=all'),
(2, 'provolone', 96, 'http://www.murrayscheese.com/site/images/items/20019700000.0.jpg?resizeid=3&resizeh=600&resizew=600'),
(3, 'american', 104, 'http://thumbs.ifood.tv/files/images/editor/images/American%20Cheese.jpg'),
(4, 'cheddar', 113, 'http://www.holypine.com/wp-content/uploads/2015/10/Cheddar-Cheese-600x600.jpg');

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

INSERT INTO `tbl_ingredient_meat` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'turkey', 22, 'http://cdn-mf0.heartyhosting.com/sites/mensfitness.com/files/styles/gallery_slideshow_image/public/sliced-turkey.jpg'),
(2, 'roast_beef', 35, 'https://images.eatthismuch.com/site_media/img/99969_ldementhon_2d356fa3-a0af-49a3-b7ce-49d5ae8f4a0b.png'),
(3, 'honey_ham', 34, 'http://food.fnr.sndimg.com/content/dam/images/food/fullset/2015/8/14/0/WU1104H_Honey-Glazed-Ham_s4x3.jpg.rend.hgtvcom.616.462.suffix/1439583024885.jpeg'),
(4, 'beef_pastrami', 40, 'http://3.bp.blogspot.com/-YoHnTQ0LiSs/VItWHeKxIhI/AAAAAAAAA40/45pSy9RkxbQ/s1600/pastrami%2Bno%2Btomato.jpg'),
(5, 'salami', 41, 'https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX4528651.jpg'),
(6, 'bologna', 69, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Bologna_lunch_meat_style_sausage.JPG/1200px-Bologna_lunch_meat_style_sausage.JPG'),
(7, 'mortadella', 47, 'https://www.edesma.gr/images/site/100/239_ren_2010109_mortadella_fetes_1kg_closeup.jpg'),
(8, 'chicken', 29, 'https://groceries.morrisons.com/productImages/304/304305011_0_640x640.jpg?identifier=36fa3f44c40e31e18b31e1963178a39f'),
(9, 'pepperoni', 26, 'https://images.eatthismuch.com/site_media/img/925_ldementhon_9b85ab48-5cf6-46ea-a887-4059fec23440.png'),
(10, 'chorizo', 23, 'http://vinsullivan.com/image/cache/data/Products/charcuterie/chorizo-sliced-500x500.jpg');

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

--
-- Dumping data for table `tbl_ingredient_sauce`
--

INSERT INTO `tbl_ingredient_sauce` (`id`, `name`, `calories`, `pictureURL`) VALUES
(1, 'ranch_dressing', 73, 'https://www.jaysbakingmecrazy.com/wp-content/uploads/2016/01/paleo_ranch2.jpg'),
(2, 'caesar_dressing', 78, 'https://target.scene7.com/is/image/Target/12946485?wid=520&hei=520&fmt=pjpeg'),
(3, 'blue_cheese_dressing', 70, 'https://i5.walmartimages.com/asr/def10768-4e00-4f82-80f7-3fcdf1e163ab_1.8b796cba97178720ccbfa038715ca0d5.jpeg'),
(4, 'thousand_island_dressing', 58, 'http://food.fnr.sndimg.com/content/dam/images/food/fullset/2013/10/7/0/FNK_Thousand-Island-Dressing_s4x3.jpg.rend.hgtvcom.616.462.suffix/1383814622263.jpeg'),
(5, 'italian_dressing', 130, 'https://upload.wikimedia.org/wikipedia/commons/d/d4/Italian_dressing.jpg'),
(6, 'buffalo_and_bbq_sauce', 40, 'https://www.fire-eaters-bbq.net/Bilder/Artikel/Saucentest0309.JPG'),
(7, 'bbq_sauce', 25, 'https://target.scene7.com/is/image/Target/16759960?wid=520&hei=520&fmt=pjpeg'),
(8, 'mayonnaise', 90, 'http://www.inspiredtaste.net/wp-content/uploads/2015/12/Homemade-Mayonnaise-Recipe-8-1200.jpg'),
(9, 'honey_mustard', 31, 'https://target.scene7.com/is/image/Target/14776132?wid=520&hei=520&fmt=pjpeg'),
(10, 'dijon_mustard', 5, 'http://chefsbest.com/wp-content/uploads/2015/11/Maille-Dijon-Mustard-FRONT.jpg');

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
(3, 'onion', 5, 'https://media.istockphoto.com/photos/sliced-red-onion-picture-id514436947?k=6&m=514436947&s=612x612&w=0&h=SQojzCECCI06GDd-HMMDb1WCrgmhnWMaJydfsbALJJk='),
(4, 'red_sweet_pepper', 3, 'https://upload.wikimedia.org/wikipedia/commons/d/da/Red_capsicum_and_cross_section.jpg'),
(5, 'black_olives', 4, 'https://img.aws.livestrongcdn.com/ls-article-image-400/cme/cme_public_images/www_livestrong_com/photos.demandstudios.com/getty/article/235/241/179216296_XS.jpg'),
(6, 'avocado', 234, 'https://www.organicfacts.net/wp-content/uploads/avocado.jpg'),
(7, 'cucumber_slice', 8, 'https://img.leafcdn.tv/640/clsd/getty/2d9244f4550b4ce9868bfe7f1942128b'),
(8, 'parsley', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQww3IAltAa-wMOqj6H6w9dSB2eyj6TFZVV2PkOft2zOmuZyJZT'),
(9, 'brocoli', 31, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkmgfbl6WvUpe1YQfPNfmWreEIomJ1_Tv_OwhaWqVz1FO8RTNFAQ'),
(10, 'spinach', 7, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSF7opg_2Beh_C_qLpUtxyZZcbwdAWQzv6LYFkeIXX2VtiRfpgGhA');

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
(2, 'admin2', '123456', NULL),
(3, 'yzue@123.com', '123456', NULL),
(4, 'ac@1.com', '123445', NULL),
(5, 'yuze@123.com', 'e10adc3949ba59abbe56e057f20f883e', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ingredient_bread`
--
ALTER TABLE `tbl_ingredient_bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_ingredient_cheese`
--
ALTER TABLE `tbl_ingredient_cheese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_ingredient_meat`
--
ALTER TABLE `tbl_ingredient_meat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_ingredient_sauce`
--
ALTER TABLE `tbl_ingredient_sauce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_ingredient_vegetable`
--
ALTER TABLE `tbl_ingredient_vegetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_combos`
--
ALTER TABLE `tbl_combos`
  ADD CONSTRAINT `tbl_combos_ibfk_1` FOREIGN KEY (`creater_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_combos_ibfk_2` FOREIGN KEY (`bread_id`) REFERENCES `tbl_ingredient_bread` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
