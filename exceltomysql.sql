-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2018 at 03:24 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exceltomysql`
--
CREATE DATABASE `exceltomysql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `exceltomysql`;

-- --------------------------------------------------------

--
-- Table structure for table `tab`
--

CREATE TABLE IF NOT EXISTS `tab` (
  `col1` text NOT NULL,
  `col2` text NOT NULL,
  `col3` text NOT NULL,
  `col4` text NOT NULL,
  `col5` text NOT NULL,
  `col6` text NOT NULL,
  `col7` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab`
--

