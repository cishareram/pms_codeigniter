-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2015 at 02:03 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `MyGuests`
--

CREATE TABLE IF NOT EXISTS `MyGuests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pagination`
--

CREATE TABLE IF NOT EXISTS `pagination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `pagination`
--

INSERT INTO `pagination` (`id`, `name`, `city`) VALUES
(1, 'wrewer', 'werw'),
(2, 'werwr', 'werwrw'),
(3, 'rty', 'rtyr'),
(4, 'rety', 'rty'),
(5, 'tyr', 'rtyryr'),
(6, 're', 'retete'),
(7, 'ertetw', 'rtetet'),
(8, 'trttgg', 'dfgdgggsdf'),
(9, 'ert', 'wtreyewyq'),
(10, 'ert', 'ertet'),
(11, 'ertewte', 'qetqert'),
(12, 'eqrteqt', 'erqt'),
(13, 'eqrtqet', 'qert'),
(14, 'qert', 'erteq'),
(15, 'qerteqt', 'eqrt'),
(16, 'ertetq', 'qertqet'),
(17, 'qertqe', 'qertqet'),
(18, 'retyr', 'rety'),
(19, 'retyrty', 'wy'),
(20, 'u65ut', 'ty'),
(21, 'tyryrwy', 'rtr'),
(22, 'rtyr', 'rhfh'),
(23, 'rewytw', 'wrywry'),
(24, 'gfh', 'ngcfgthfj'),
(25, 'wqwrteter', 'yyyryfgyer'),
(26, 'jkhjjj', 'jhghdfhgh');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `title`, `product_image`, `description`, `price`, `created_on`, `updated_on`, `is_enabled`) VALUES
(25, 42, 'ghf', 'download.jpg', 'hnkj', 858, '2015-09-25 15:27:32', '0000-00-00 00:00:00', 1),
(26, 42, 'hhh', 'download.jpg', 'fghf', 6, '2015-10-07 11:08:58', '0000-00-00 00:00:00', 1),
(27, 41, 'trtrt', 'simple_image.png', 'yrty', 654, '2015-09-25 15:32:54', '0000-00-00 00:00:00', 1),
(31, 46, 'fastrack', '', 'watch', 5555, '2015-10-08 05:58:13', '0000-00-00 00:00:00', 1),
(32, 54, 'newadded product', '', 'high quality', 2454, '2015-10-07 13:25:16', '0000-00-00 00:00:00', 1),
(33, 48, 'wae', '', 'sea', 321, '2015-10-08 07:28:44', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `description`, `created_on`, `updated_on`, `is_enabled`) VALUES
(46, 'spinz', 'powder', '2015-10-03 10:30:42', '0000-00-00 00:00:00', 1),
(48, 'bajaj', 'almond', '2015-10-08 05:20:58', '0000-00-00 00:00:00', 1),
(49, 'y', 'rytr', '2015-10-07 13:54:09', '0000-00-00 00:00:00', 1),
(51, 'jhvbvjh', 'ryr', '2015-10-07 06:45:19', '0000-00-00 00:00:00', 1),
(52, 'rtyr', 'rtyr', '2015-10-03 08:02:48', '0000-00-00 00:00:00', 1),
(54, 'rty', 'rty', '2015-10-06 08:42:16', '0000-00-00 00:00:00', 1),
(57, 'aSS', 'AsS', '2015-10-07 07:32:36', '0000-00-00 00:00:00', 1),
(58, 'rajshree', 'production', '2015-10-07 13:31:12', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobileno`) VALUES
(1, 'admin', 'admin', 'admin@cis', '9806625331'),
(2, 'wewr', 'werr', 'wer', 'werwr'),
(3, 'werwr', 'ASDAD', 'werwr', 'RR');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
