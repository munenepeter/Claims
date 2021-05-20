SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00"
;
-- Database: `claims`
CREATE DATABASE IF NOT EXISTS `claims`;

-- Table structure for table `assessment`
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
-- Table structure for table `assessor`

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
-- Table structure for table `cases`

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
-- Table structure for table `claims`

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
-- Table structure for table `users`

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(46) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


