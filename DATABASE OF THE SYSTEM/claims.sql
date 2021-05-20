-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2020 at 06:46 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `claims`
--

-- Table structure for table `assessment`

DROP TABLE IF EXISTS `assessment`;
CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `policy_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `summary` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`

INSERT INTO `assessment` (`id`, `names`, `degree`, `phone`, `location`, `policy_no`, `date`, `summary`, `description`, `filename`) VALUES
(1, 'peter munene', 'the whole windsreen was destroyed', 754174103, 'ongata rongai', '0674HJG', '2019-11-14', 'The windsreen needs to be replaced, we can offer the garage or the money, in order for the owner to fix', 'police abstract', 'policeabstract.pdf');

-- Table structure for table `assessor`

DROP TABLE IF EXISTS `assessor`;
CREATE TABLE IF NOT EXISTS `assessor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `policy_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `summary` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table `assessor`

INSERT INTO `assessor` (`id`, `names`, `degree`, `phone`, `location`, `policy_no`, `date`, `summary`) VALUES
(1, 'peter munene', 'the windsreen was destroyed', 754174103, 'Kajiado-Ongata ', '002P', '2020-01-10', 'peter was trying to overtake a lorry when a SUV from behind hit him really hard'),
(2, 'peter munene', 'the windsreen was destroyed', 754174103, 'Kajiado-Ongata ', '002P', '2020-01-10', 'peter was trying to overtake a lorry when a SUV from behind hit him really hard'),
(3, 'peter munene', 'the windsreen was destroyed', 754174103, 'Kajiado-Ongata', '002P', '2020-01-10', 'peter was trying to overtake a lorry when a SUV from behind hit him really hard'),
(4, 'peter munene', 'the windsreen was destroyed', 754174103, 'Kajiado-Ongata', '003P', '2020-01-10', 'peter was trying to overtake a lorry when a SUV from behind hit him really hard'),
(5, 'Ivy Nyawira', 'the whole hood of the car was badly affected destroying all the major parts of the engine  making the car immobile', 754174103, 'Langata Nairobi', '097DFG', '2020-01-22', 'the car needs to be replaced. i suggest that we collect the remains of the car and replace it'),
(6, 'Eshter Birgen', 'the windsreen was destroyed', 754174103, 'Kajiado-Ongata', '004P', '2020-01-10', 'the car needs to be replaced. i suggest that we collect the remains of the car and replace it'),
(7, 'Ivy Nyawira', 'the windsreen was destroyed', 792118604, 'Langata Nairobi', '097DFG', '2020-01-13', 'peter was trying to overtake a lorry when a SUV from behind hit him really hard');

-- Table structure for table `cases`

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `policy_no` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table `cases`

INSERT INTO `cases` (`id`, `names`, `email`, `phone`, `address`, `policy_no`, `date`, `description`) VALUES
(1, 'peter munene', 'petermunene@gmail.com', 754174103, 'Ongata Rongai', '002P', '2019-12-05', 'was a great fire we even had time for some drinks'),
(2, 'peter munene', 'petermunene@gmail.com', 754174103, 'Ongata Rongai', '002P', '2019-12-01', 'my side mirror was stolen'),
(3, 'Eshter Birgen', 'enatasha@gmail.com', 798, 'Kitengela,  23 Wst.', '001P', '2019-12-09', 'feels like'),
(4, 'Gibson kimani', 'gibsonkimani@gmail.com', 792118604, 'Ngong', '003P', '2019-12-06', 'a gas leaked'),
(5, 'Gibson kimani', 'gibsonkimani@gmail.com', 792118604, 'Ngong', '003P', '2019-12-06', 'a gas leaked'),
(6, 'Gibson kimani', 'gibsonkimani@gmail.com', 792118604, 'Ngong', '003P', '2019-12-05', 'a gas leaked'),
(7, 'Ivy Nyawira', 'ivynyawira@gmail.com', 758, 'Kerugoya', '004P', '2019-12-03', 'the flood swept allof our neighborhood'),
(8, 'peter munene', 'enatasha@gmail.com', 754174103, 'Kitengela,  23 Wst.', '002P', '2019-12-02', 'motor theft'),
(9, 'Gibson kimani', 'peterclaim@manager', 754174103, 'Ongata Rongai', '002P', '2019-12-19', ''),
(10, 'Gibson kimani', 'peterclaim@manager', 754174103, 'Ongata Rongai', '002P', '2019-12-19', ''),
(11, 'peter munene', 'petermunene@gmail.com', 754174103, 'Kitengela,  23 Wst.', '002P', '2019-12-17', 'accident'),
(12, 'peter munene', 'petermunene@gmail.com', 754174103, 'Kitengela,  23 Wst.', '002P', '2019-12-18', 'health medical'),
(13, 'Ivy Nyawira', 'test@gmail.com', 754174103, 'Kitengela,  23 Wst.', '002P', '2019-12-16', 'i was eating my way up the river');

-- Table structure for table `claims`

DROP TABLE IF EXISTS `claims`;
CREATE TABLE IF NOT EXISTS `claims` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `policy_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='claims table';

-- Dumping data for table `claims`

INSERT INTO `claims` (`id`, `names`, `email`, `phone`, `address`, `policy_no`, `date`, `description`) VALUES
(1, 'Eshter Birgen', 'enatasha@gmail.com', 798, 'Kitengela,  23 Wst.', '001P', '2019-11-14', 'was a great fire we even had time for some drinks'),
(2, 'Eshter Birgen', 'enatasha@gmail.com', 798, 'Kitengela,  23 Wst.', '001P', '2019-11-14', 'was a great fire we even had time for some drinks'),
(3, 'Eshter Birgen', 'enatasha@gmail.com', 798, 'Kitengela,  23 Wst.', '001P', '2019-11-14', 'was a great fire we even had time for some drinks'),
(4, 'Eshter Birgen', 'enatasha@gmail.com', 798, 'Kitengela,  23 Wst.', '001P', '2019-11-14', 'was a great fire we even had time for some drinks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(46) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'peter', '$2y$10$q/5rqg3.EJCdmUEHTNdjJeEOEie5jHp3B5vO6xFa4KDV5zwRmVfo6'),
(2, 'gibson', '$2y$10$uCkQ1UTG03C5veIfKS15zubgydlPl5P3SzJDweGgm.NbhZ705RiR.'),
(3, 'esther', '$2y$10$LvWOFJf8vfDGILa7ZFISfezUOPnyjMgSat9.cs/W2hdeJG4wdFWoa'),
(4, 'ivy', '$2y$10$JF6guu25EwjIbNIzM0EWi.EOA5QZeTL/hfqbe4VhlMMKslIwqaTOO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
