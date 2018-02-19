-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 11:15 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test5_kapil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `register_date`) VALUES
(4, 'test', '098f6bcd4621d373cade4e832627b4f6', '2018-02-19 08:24:31'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-02-19 09:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `admin_id`, `name`, `created_at`) VALUES
(2, 1, 'Technology', '2018-02-18 16:29:13'),
(4, 4, 'Misc', '2018-02-19 08:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 2, 'Admin sd', 'kapil.shamlani@gmail.com', '<p>sfcaefe</p>\r\n', '2018-02-19 08:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `content_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `category_id`, `admin_id`, `title`, `slug`, `body`, `content_image`, `created_at`) VALUES
(1, 2, 1, 'Test', 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur magna id velit ultricies, et ultrices dolor feugiat. Vivamus interdum lobortis tristique. Suspendisse potenti. Nulla malesuada ligula ut tellus rutrum, ac posuere dui posuere. Sed vel nibh efficitur, posuere eros id, imperdiet magna. Sed convallis luctus ipsum at aliquet. Integer sit amet odio sit amet velit imperdiet tincidunt. Sed vel iaculis quam, id bibendum ante. Praesent sed diam consectetur, placerat mi non, congue est. Donec commodo urna est, a congue lacus varius ut. Duis nunc nibh, ultrices eu sagittis venenatis, ullamcorper ut diam. Cras egestas lectus lacus, vitae finibus odio tincidunt volutpat. Nulla sem arcu, hendrerit ac enim in, porta fringilla dolor.\r\n\r\nAliquam vulputate ac est ac sodales. Morbi eu aliquet sapien, in convallis justo. Proin pulvinar, velit a semper faucibus, diam metus egestas sapien, ac aliquet ipsum libero vel elit. Vestibulum eget lectus mollis felis pellentesque convallis. Donec ultrices neque ligula, ac maximus enim consectetur vel. Proin eu lacus tincidunt, tincidunt massa ut, interdum odio. Nunc volutpat, nisl sed iaculis ultrices, tellus est euismod mauris, bibendum tincidunt metus dolor et augue. Aliquam dignissim quis mauris ac gravida. Mauris cursus in urna accumsan iaculis. Cras id sem lorem. Nunc molestie pulvinar dictum. Quisque vitae magna eget libero viverra ullamcorper. Nulla facilisi. Donec semper porta velit sed ultricies. Aenean ligula lacus, dapibus ac lorem eget, euismod volutpat velit.', 'lol.PNG', '2018-02-18 16:37:02'),
(4, 2, 4, 'Test 2', 'Test-2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum elit nec justo pulvinar, nec condimentum velit condimentum. Praesent nec semper felis. Ut ut elementum sem, at congue odio. Cras aliquam cursus dictum. Aliquam pellentesque magna neque, vitae aliquet nunc efficitur fermentum. Integer nec odio eget dui imperdiet pharetra. Quisque tempus, ipsum at interdum commodo, est ante porta quam, in facilisis diam enim ac nulla. Duis dignissim ligula eget magna aliquam ultrices id a augue. Sed id ante volutpat, cursus augue vel, ornare est. Donec consequat diam nunc, ut tempus neque sagittis quis. Quisque pulvinar lobortis dui semper lobortis. Maecenas sed dictum felis, ut ullamcorper augue. Phasellus auctor in metus eu pulvinar. Donec et urna elit. Nulla condimentum ut ante ut tincidunt. Maecenas vulputate dapibus tortor, id facilisis lacus commodo ut.</p>\r\n', '329473893_6287b1c3c9_b.jpg', '2018-02-19 08:35:20'),
(5, 4, 4, 'Test 3', 'Test-3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum elit nec justo pulvinar, nec condimentum velit condimentum. Praesent nec semper felis. Ut ut elementum sem, at congue odio. Cras aliquam cursus dictum. Aliquam pellentesque magna neque, vitae aliquet nunc efficitur fermentum. Integer nec odio eget dui imperdiet pharetra. Quisque tempus, ipsum at interdum commodo, est ante porta quam, in facilisis diam enim ac nulla. Duis dignissim ligula eget magna aliquam ultrices id a augue. Sed id ante volutpat, cursus augue vel, ornare est. Donec consequat diam nunc, ut tempus neque sagittis quis. Quisque pulvinar lobortis dui semper lobortis. Maecenas sed dictum felis, ut ullamcorper augue. Phasellus auctor in metus eu pulvinar. Donec et urna elit. Nulla condimentum ut ante ut tincidunt. Maecenas vulputate dapibus tortor, id facilisis lacus commodo ut.</p>\r\n', '3494658782_979f57f5f2_b.jpg', '2018-02-19 08:35:35'),
(6, 4, 4, 'Test 4', 'Test-4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum elit nec justo pulvinar, nec condimentum velit condimentum. Praesent nec semper felis. Ut ut elementum sem, at congue odio. Cras aliquam cursus dictum. Aliquam pellentesque magna neque, vitae aliquet nunc efficitur fermentum. Integer nec odio eget dui imperdiet pharetra. Quisque tempus, ipsum at interdum commodo, est ante porta quam, in facilisis diam enim ac nulla. Duis dignissim ligula eget magna aliquam ultrices id a augue. Sed id ante volutpat, cursus augue vel, ornare est. Donec consequat diam nunc, ut tempus neque sagittis quis. Quisque pulvinar lobortis dui semper lobortis. Maecenas sed dictum felis, ut ullamcorper augue. Phasellus auctor in metus eu pulvinar. Donec et urna elit. Nulla condimentum ut ante ut tincidunt. Maecenas vulputate dapibus tortor, id facilisis lacus commodo ut.</p>\r\n', '3851375809_424b55c0c0_b.jpg', '2018-02-19 08:35:55'),
(7, 4, 4, 'Test 5', 'Test-5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum elit nec justo pulvinar, nec condimentum velit condimentum. Praesent nec semper felis. Ut ut elementum sem, at congue odio. Cras aliquam cursus dictum. Aliquam pellentesque magna neque, vitae aliquet nunc efficitur fermentum. Integer nec odio eget dui imperdiet pharetra. Quisque tempus, ipsum at interdum commodo, est ante porta quam, in facilisis diam enim ac nulla. Duis dignissim ligula eget magna aliquam ultrices id a augue. Sed id ante volutpat, cursus augue vel, ornare est. Donec consequat diam nunc, ut tempus neque sagittis quis. Quisque pulvinar lobortis dui semper lobortis. Maecenas sed dictum felis, ut ullamcorper augue. Phasellus auctor in metus eu pulvinar. Donec et urna elit. Nulla condimentum ut ante ut tincidunt. Maecenas vulputate dapibus tortor, id facilisis lacus commodo ut.</p>\r\n', '4283287850_b5e27c1865_b.jpg', '2018-02-19 08:36:10'),
(8, 2, 4, 'Test 6', 'Test-6', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum elit nec justo pulvinar, nec condimentum velit condimentum. Praesent nec semper felis. Ut ut elementum sem, at congue odio. Cras aliquam cursus dictum. Aliquam pellentesque magna neque, vitae aliquet nunc efficitur fermentum. Integer nec odio eget dui imperdiet pharetra. Quisque tempus, ipsum at interdum commodo, est ante porta quam, in facilisis diam enim ac nulla. Duis dignissim ligula eget magna aliquam ultrices id a augue. Sed id ante volutpat, cursus augue vel, ornare est. Donec consequat diam nunc, ut tempus neque sagittis quis. Quisque pulvinar lobortis dui semper lobortis. Maecenas sed dictum felis, ut ullamcorper augue. Phasellus auctor in metus eu pulvinar. Donec et urna elit. Nulla condimentum ut ante ut tincidunt. Maecenas vulputate dapibus tortor, id facilisis lacus commodo ut.</p>\r\n', '5079756828_1a8676daae_b.jpg', '2018-02-19 08:36:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
