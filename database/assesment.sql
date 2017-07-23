-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 05:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assesment`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `title`, `content`, `image`) VALUES
(24, 'nipu', 'sdf', '                                                     dfs                                                 ', '7752291768-542673-cars-lamborghini-aventador-lamborghini-reventon.jpg'),
(28, 'Nipu', 'asdasd', '                                                     sdasda                                                                                                                                  ', '456187237138-desktop-wallpaper-workplace-classic-landscape.jpg'),
(30, 'Azharul', 'Php developer', 'I am so interested to about new technology', '212573333516-cool-background-wallpaper-backgrounds.jpg'),
(31, 'Nadim ', 'Web devs', 'Now days web developer can make their life so esy', '62540186447-lamborghini-reventon-3d-max.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
