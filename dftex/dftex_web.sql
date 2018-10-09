-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 02:17 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dftex_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `web_tbl_meta`
--

CREATE TABLE IF NOT EXISTS `web_tbl_meta` (
  `meta_id` int(11) NOT NULL,
  `field_name` varchar(512) NOT NULL,
  `field_value` varchar(512) NOT NULL,
  `field_value_description` varchar(512) DEFAULT NULL,
  `created_by` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_tbl_meta`
--

INSERT INTO `web_tbl_meta` (`meta_id`, `field_name`, `field_value`, `field_value_description`, `created_by`, `created_at`) VALUES
(16, 'certificate', 'repository/certificate/images/1491129322_oeko.jpg', 'OEKO^TEX_We are now OEKO-TEX certified! we constantly seek to improve the quality and safety of our products. The OEKO-TEX certification is an acknowledged, worldwide testing and certification system which guarantees that no harmful substances of any kind have been used in the production at any level. All in all, this means that an OEKO-TEX certified product from DF TEX is a safe choice. ', ' kagoji', '2017-04-02 10:35:22'),
(27, 'certificate', 'repository/certificate/images/1491129312_sedex.jpg', 'SED^EX_we compleatly follow the sedex rules and regulation.we are 100% compliance factory.', ' kagoji', '2017-04-02 10:35:12'),
(46, 'gallery', 'repository/gallery/images/1491129035_gallery-1.png', 'NULL', ' kagoji', '2017-04-02 10:30:35'),
(47, 'gallery', 'repository/gallery/images/1491129040_gallery-5.png', 'NULL', ' kagoji', '2017-04-02 10:30:40'),
(48, 'gallery', 'repository/gallery/images/1491129043_gallery-3.png', 'NULL', ' kagoji', '2017-04-02 10:30:43'),
(49, 'gallery', 'repository/gallery/images/1491129047_gallery-2.png', 'NULL', ' kagoji', '2017-04-02 10:30:47'),
(50, 'gallery', 'repository/gallery/images/1491129050_gallery-4.png', 'NULL', ' kagoji', '2017-04-02 10:30:50'),
(51, 'gallery', 'repository/gallery/images/1491129055_gallery-6.png', 'NULL', ' kagoji', '2017-04-02 10:30:55'),
(52, 'gallery', 'repository/gallery/images/1491129060_gallery-7.png', 'NULL', ' kagoji', '2017-04-02 10:31:00'),
(53, 'gallery', 'repository/gallery/images/1491129064_gallery-9.png', 'NULL', ' kagoji', '2017-04-02 10:31:04'),
(54, 'gallery', 'repository/gallery/images/1491129083_gallery-14.png', 'NULL', ' kagoji', '2017-04-02 10:31:23'),
(55, 'gallery', 'repository/gallery/images/1491129093_gallery-18.png', 'NULL', ' kagoji', '2017-04-02 10:31:33'),
(56, 'gallery', 'repository/gallery/images/1491129099_gallery-10.png', 'NULL', ' kagoji', '2017-04-02 10:31:39'),
(57, 'client', 'repository/client/images/1491129140_clients_1.jpg', 'NULL', ' kagoji', '2017-04-02 10:32:20'),
(58, 'client', 'repository/client/images/1491129144_clients_2.jpg', 'NULL', ' kagoji', '2017-04-02 10:32:24'),
(59, 'client', 'repository/client/images/1491129147_clients_3.jpg', 'NULL', ' kagoji', '2017-04-02 10:32:27'),
(60, 'client', 'repository/client/images/1491129150_clients_4.jpg', 'NULL', ' kagoji', '2017-04-02 10:32:30'),
(61, 'client', 'repository/client/images/1491129153_clients_5.jpg', 'NULL', ' kagoji', '2017-04-02 10:32:33'),
(62, 'client', 'repository/client/images/1491129158_clients_6.jpg', 'NULL', ' kagoji', '2017-04-02 10:32:38'),
(64, 'about_slider', 'repository/about_slider/images/1491284918_1491129257_about_6.jpg', 'NULL', ' kagoji', '2017-04-04 05:48:38'),
(65, 'about_slider', 'repository/about_slider/images/1491284907_1491129254_about_5.jpg', 'NULL', ' kagoji', '2017-04-04 05:48:27'),
(66, 'about_slider', 'repository/about_slider/images/1491284900_1491129251_about_4.jpg', 'NULL', ' kagoji', '2017-04-04 05:48:20'),
(67, 'about_slider', 'repository/about_slider/images/1491284894_1491129248_about_3.jpg', 'NULL', ' kagoji', '2017-04-04 05:48:14'),
(68, 'about_slider', 'repository/about_slider/images/1491284886_1491129245_about_2.jpg', 'NULL', ' kagoji', '2017-04-04 05:48:06'),
(69, 'home_slider', 'repository/home_slider/images/1491130084_people_slider.jpg', 'NULL', ' kagoji', '2017-04-02 10:48:04'),
(70, 'home_slider', 'repository/home_slider/images/1491129445_machine_2_slider.jpg', 'NULL', ' kagoji', '2017-04-02 10:37:25'),
(71, 'home_slider', 'repository/home_slider/images/1491129448_machine_slider.jpg', 'NULL', ' kagoji', '2017-04-02 10:37:28'),
(72, 'home_slider', 'repository/home_slider/images/1491129673_zipper_slider.jpg', 'NULL', ' kagoji', '2017-04-02 10:41:13'),
(74, 'home_slider', 'repository/home_slider/images/1491129754_sizelabel_slider.jpg', 'NULL', ' kagoji', '2017-04-02 10:42:34'),
(75, 'home_slider', 'repository/home_slider/images/1491130090_hand_tag_slider.jpg', 'NULL', ' kagoji', '2017-04-02 10:48:10'),
(79, 'profile_file', 'repository/profile_file/1491154557_profile.pdf', NULL, ' kagoji', '2017-04-02 17:35:57'),
(81, 'gallery', 'repository/gallery/images/1491197311_gallery-17.png', 'NULL', ' kagoji', '2017-04-03 05:28:31'),
(82, 'gallery', 'repository/gallery/images/1491197317_gallery-18.png', 'NULL', ' kagoji', '2017-04-03 05:28:37'),
(83, 'gallery', 'repository/gallery/images/1491197322_gallery-16.png', 'NULL', ' kagoji', '2017-04-03 05:28:42'),
(84, 'gallery', 'repository/gallery/images/1491197330_gallery-14.png', 'NULL', ' kagoji', '2017-04-03 05:28:50'),
(85, 'gallery', 'repository/gallery/images/1491197361_gallery-13.png', 'NULL', ' kagoji', '2017-04-03 05:29:21'),
(86, 'gallery', 'repository/gallery/images/1491197535_gallery-15.png', 'NULL', ' kagoji', '2017-04-03 05:32:15'),
(87, 'about_slider', 'repository/about_slider/images/1491284880_1491129241_about_1.jpg', 'NULL', ' kagoji', '2017-04-04 05:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `web_tbl_post`
--

CREATE TABLE IF NOT EXISTS `web_tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_type_name` varchar(512) NOT NULL,
  `post_name_slug` varchar(512) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `created_by` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_tbl_post`
--

INSERT INTO `web_tbl_post` (`post_id`, `post_type_name`, `post_name_slug`, `description`, `created_by`, `created_at`) VALUES
(1, 'Gallery', 'gallery', NULL, ' kagoji', '2017-03-30 09:19:45'),
(3, 'Client', 'client', '', ' kagoji', '2017-04-04 05:14:21'),
(4, 'Certificate', 'certificate', NULL, ' kagoji', '2017-03-30 04:45:09'),
(9, 'Home Slider', 'home_slider', NULL, ' kagoji', '2017-04-01 07:13:36'),
(13, 'About Slider', 'about_slider', 'DF TEX is a newly oriented industry for manufacturing of woven label. We ensure the best quality. A well setup people from finance, marketing areas have been appointed for smooth operation of this company. We provides a complete ministration from concept to production, through its own design and precision mold tooling department, to help our customers to be one step ahead in the market. DF TEX started its journey from July 2017. ', ' kagoji', '2017-04-04 05:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `web_tbl_products`
--

CREATE TABLE IF NOT EXISTS `web_tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(512) NOT NULL,
  `product_name_slug` varchar(512) DEFAULT NULL,
  `product_details` varchar(512) DEFAULT NULL,
  `created_by` varchar(512) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_tbl_products`
--

INSERT INTO `web_tbl_products` (`product_id`, `product_name`, `product_name_slug`, `product_details`, `created_by`, `created_at`) VALUES
(1, 'Button', 'button', 'Its usually a piece of solid material having holes or a shank through which secures two pieces of fabric together', ' kagoji', '2017-04-02 04:28:17'),
(2, 'Hand Tag', 'hand_tag', 'A hang tag is a small cardboard or plastic label that hangs from an item of clothing and gives information', ' kagoji', '2017-04-03 04:32:03'),
(3, 'Jaquare Elastic', 'jaquare_elastic', 'The offered woven jacquard elastic is a textile material, which is produced by weaving the yarn.', ' kagoji', '2017-04-03 04:32:43'),
(4, 'Twill Tape', 'twill_tape', 'Twill tape is a sewing tool that can be used for many purposes.How can it help you? Letâ€™s explore it a little bit!', ' kagoji', '2017-04-03 04:32:47'),
(5, 'Wovel Label', 'wovel_label', 'Woven label are manufactured in full matched color with a non-woven or woven backing and overlooked edges.', ' kagoji', '2017-04-03 04:32:51'),
(6, 'Zipper', 'zipper', 'A zipper or zip is fastening device. It is a commonly used device for binding the edges of an opening of fabric', ' kagoji', '2017-04-03 04:32:40'),
(10, 'Polly', 'polly', 'Polly', ' kagoji', '2017-04-03 06:00:03'),
(11, 'Size Label', 'size_label', 'Size Label', ' kagoji', '2017-04-03 05:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `web_tbl_products_image`
--

CREATE TABLE IF NOT EXISTS `web_tbl_products_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image_url` varchar(512) NOT NULL,
  `created_by` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_tbl_products_image`
--

INSERT INTO `web_tbl_products_image` (`product_image_id`, `product_id`, `product_image_url`, `created_by`, `created_at`) VALUES
(1, 3, 'repository/product_image/jaquare_elastic/1491200360_jacquard-big-1.png', ' kagoji', '2017-04-03 06:22:25'),
(2, 3, 'repository/product_image/jaquare_elastic/1491200444_jacquard-big-2.png', ' kagoji', '2017-04-03 06:22:31'),
(3, 3, 'repository/product_image/jaquare_elastic/1491200460_jacquard-big-4.png', ' kagoji', '2017-04-03 06:22:33'),
(4, 3, 'repository/product_image/jaquare_elastic/1491194204_jacquard-1.png', ' kagoji', '2017-04-03 06:16:22'),
(5, 3, 'repository/product_image/jaquare_elastic/1491194210_jacquard-2.png', ' kagoji', '2017-04-03 06:16:28'),
(6, 3, 'repository/product_image/jaquare_elastic/1491194215_jacquard-3.png', ' kagoji', '2017-04-03 06:16:31'),
(7, 1, 'repository/product_image/button/1491194647_button-3.jpg', ' kagoji', '2017-04-03 06:16:57'),
(8, 1, 'repository/product_image/button/1491194638_button-2.png', ' kagoji', '2017-04-03 06:17:07'),
(9, 1, 'repository/product_image/button/1491194625_button-1.png', ' kagoji', '2017-04-03 06:17:01'),
(11, 4, 'repository/product_image/twill_tape/1491194223_twill-1.png', ' kagoji', '2017-04-03 04:37:03'),
(12, 4, 'repository/product_image/twill_tape/1491194229_twill-2.png', ' kagoji', '2017-04-03 04:37:09'),
(13, 4, 'repository/product_image/twill_tape/1491194234_twill-3.png', ' kagoji', '2017-04-03 04:37:14'),
(14, 2, 'repository/product_image/hand_tag/1491194166_hand-2.png', ' kagoji', '2017-04-03 06:22:10'),
(15, 2, 'repository/product_image/hand_tag/1491194171_hand-3.png', ' kagoji', '2017-04-03 06:22:14'),
(16, 2, 'repository/product_image/hand_tag/1491194176_hand-4.png', ' kagoji', '2017-04-03 06:22:17'),
(17, 5, 'repository/product_image/wovel_label/1491194299_woven-1.png', ' kagoji', '2017-04-03 04:38:19'),
(18, 5, 'repository/product_image/wovel_label/1491194310_woven-2.png', ' kagoji', '2017-04-03 04:38:30'),
(19, 5, 'repository/product_image/wovel_label/1491194317_woven-3.png', ' kagoji', '2017-04-03 04:38:37'),
(20, 6, 'repository/product_image/zipper/1491194331_zipper-1.jpg', ' kagoji', '2017-04-03 04:38:51'),
(21, 6, 'repository/product_image/zipper/1491194340_zipper-2.png', ' kagoji', '2017-04-03 04:39:01'),
(22, 6, 'repository/product_image/zipper/1491195840_zipper-3.png', ' kagoji', '2017-04-03 05:04:00'),
(23, 11, 'repository/product_image/size_label/1491198077_sizelabel-big-1.png', ' kagoji', '2017-04-03 05:41:17'),
(24, 11, 'repository/product_image/size_label/1491198083_sizelabel-big-2.png', ' kagoji', '2017-04-03 05:41:23'),
(25, 11, 'repository/product_image/size_label/1491198122_sizelabel-big-3.png', ' kagoji', '2017-04-03 05:42:02'),
(26, 10, 'repository/product_image/polly/1491198142_polly-big-1.png', ' kagoji', '2017-04-03 05:42:22'),
(27, 10, 'repository/product_image/polly/1491198149_polly-big-2.png', ' kagoji', '2017-04-03 05:42:29'),
(28, 10, 'repository/product_image/polly/1491198154_polly-big-3.png', ' kagoji', '2017-04-03 05:42:34'),
(29, 2, 'repository/product_image/hand_tag/1491194160_hand-2.png', ' kagoji', '2017-04-03 06:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `web_tbl_social_link`
--

CREATE TABLE IF NOT EXISTS `web_tbl_social_link` (
  `social_link_id` int(11) NOT NULL,
  `social_site_name` varchar(512) NOT NULL,
  `social_site_url` varchar(512) NOT NULL,
  `social_site_icon_class` varchar(512) DEFAULT NULL,
  `created_by` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_tbl_social_link`
--

INSERT INTO `web_tbl_social_link` (`social_link_id`, `social_site_name`, `social_site_url`, `social_site_icon_class`, `created_by`, `created_at`) VALUES
(1, 'Facebook', 'http://www.facebook.com', 'icon-facebook', ' kagoji', '2017-04-02 08:46:18'),
(3, 'Twitter', 'https://twitter.com', 'icon-twitter', ' kagoji', '2017-04-02 08:44:34'),
(4, 'Instagram', 'https://www.instagram.com', 'icon-instagram', ' kagoji', '2017-04-02 08:45:27'),
(5, 'Linkedin', 'https://www.linkedin.com', 'icon-linkedin', ' kagoji', '2017-04-02 08:49:23'),
(6, 'Google Plus', 'https://plus.google.com/', 'icon-googleplus', ' kagoji', '2017-04-02 08:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE IF NOT EXISTS `web_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`user_id`, `fullname`, `username`, `user_type`, `status`, `password`, `login_at`, `created_at`) VALUES
(1, 'Kagoji Faysal', 'kagoji', 'admin', '1', '81dc9bdb52d04dc20036dbd8313ed055', '2017-04-04 12:06:52', '2016-12-02 23:54:56'),
(2, 'Tarik Islam', 'tarik', 'admin', '1', '81dc9bdb52d04dc20036dbd8313ed055', '2017-04-04 12:06:52', '2016-12-02 23:54:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `web_tbl_meta`
--
ALTER TABLE `web_tbl_meta`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `web_tbl_post`
--
ALTER TABLE `web_tbl_post`
  ADD PRIMARY KEY (`post_id`), ADD UNIQUE KEY `post_type_name` (`post_type_name`), ADD UNIQUE KEY `post_type_name_2` (`post_type_name`);

--
-- Indexes for table `web_tbl_products`
--
ALTER TABLE `web_tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `web_tbl_products_image`
--
ALTER TABLE `web_tbl_products_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `web_tbl_social_link`
--
ALTER TABLE `web_tbl_social_link`
  ADD PRIMARY KEY (`social_link_id`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `web_tbl_meta`
--
ALTER TABLE `web_tbl_meta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `web_tbl_post`
--
ALTER TABLE `web_tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `web_tbl_products`
--
ALTER TABLE `web_tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `web_tbl_products_image`
--
ALTER TABLE `web_tbl_products_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `web_tbl_social_link`
--
ALTER TABLE `web_tbl_social_link`
  MODIFY `social_link_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
