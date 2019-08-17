-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: moe-mysql-app: 3306
-- Generation Time: Aug 17, 2019 at 07:48 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'New menu'),
(2, 'Menu 2');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '#',
  `parent` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(5) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `name`, `link`, `parent`, `position`) VALUES
(1, 0, 'Home', '#', 0, 0),
(2, 0, 'About', '#', 0, 0),
(3, 0, 'Sample post', '#', 0, 0),
(4, 0, 'Contact', '#', 0, 0),
(7, 1, 'Item 1', '/link', 0, 1),
(8, 2, 'Item 1d', '#', 0, 0),
(9, 2, 'sdf', '#', 0, 3),
(10, 2, 'New item', '#', 0, 2),
(11, 1, 'Item 2', '/other link', 0, 0),
(12, 2, 'New iieee', '#', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `date`) VALUES
(1, 'aaaad', '<p>test update</p>', '2019-04-20 15:21:42'),
(2, 'Second Page', '<p>Some content</p><ul><li>asdf</li><li>adf</li></ul><ol><li>asdf</li><li>adf​</li></ol>', '2019-04-20 15:22:29'),
(3, 'dfFirst Paged', '<p><strong data-verified=\"redactor\" data-redactor-tag=\"strong\">sdf​This is the bold</strong></p>', '2019-04-20 15:26:57'),
(4, 'dfdf', '<p>df​df</p>', '2019-04-20 21:56:47'),
(5, 'some', '<p>some new​</p>', '2019-04-20 21:58:16'),
(6, 'first', '<p>first​</p>', '2019-04-20 21:58:48'),
(7, 'dockertt', '<p>docker content​</p>', '2019-04-20 22:04:28'),
(8, 'd', '<p>d​</p>', '2019-04-20 22:10:19'),
(9, 'Newaaaaddddsdf', '<p><strong data-redactor-tag=\"strong\"></strong></p><h1>?new pagedd\nd\nd\nf\nd\nf</h1><p>\n</p>', '2019-04-21 10:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `plugin`
--

CREATE TABLE `plugin` (
  `id` int(11) NOT NULL,
  `directory` varchar(255) NOT NULL,
  `is_active` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plugin`
--

INSERT INTO `plugin` (`id`, `directory`, `is_active`) VALUES
(3, 'ExamplePlugin', '0'),
(4, 'LiveTest', '0');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `key_field` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `section` varchar(155) NOT NULL DEFAULT 'general'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `key_field`, `value`, `section`) VALUES
(1, 'Name site', 'name_site', 'Invest Eleven', 'general'),
(2, 'Description', 'description', 'Site about private investments', 'general'),
(3, 'Admin email', 'admin_email', 'admin@admin.com', 'general'),
(4, 'Language', 'language', 'english', 'general'),
(5, 'Active theme', 'active_theme', 'new', 'theme');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('admin','moderator','user','') NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `hash`, `date_reg`) VALUES
(1, 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'admin', '2be70e1edcd4f8c46a298f7d6dd44a4a', '2019-04-16 18:16:33'),
(2, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:25'),
(3, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:25'),
(4, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:26'),
(5, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:26'),
(6, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:27'),
(7, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:27'),
(8, 'adminNew@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-04-20 14:28:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugin`
--
ALTER TABLE `plugin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `key` (`key_field`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plugin`
--
ALTER TABLE `plugin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
