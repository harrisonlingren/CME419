-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2016 at 08:02 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hlingren`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `rank` int(11) NOT NULL,
  `song` varchar(50) NOT NULL,
  `artist` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`rank`, `song`, `artist`) VALUES
(1, 'Closer', 'The Chainsmokers'),
(2, 'Heathens', 'twenty one pilots'),
(3, 'Starboy', 'The Weeknd'),
(4, 'Cold Water', 'Major Lazer'),
(5, 'Let Me Love You', 'DJ Snake'),
(6, 'Treat You Better', 'Shawn Mendes'),
(7, 'Cheap Thrills', 'Sia'),
(8, 'Broccoli', 'D.R.A.M.'),
(9, 'Dont Let Me Down', 'The Chainsmokers'),
(10, 'This is What You Came For', 'Calvin Harris'),
(11, 'We Dont Talk Anymore', 'Charlie Puth'),
(12, 'Ride', 'twenty one pilots'),
(13, 'I Hate U I Love U', 'gnash'),
(14, 'One Dance', 'Drake'),
(15, 'Gold', 'Kiiara'),
(16, 'Send My Love (To Your New Lover)', 'Adele'),
(17, 'Needed Me', 'Rihanna'),
(18, 'Too Good', 'Drake'),
(19, 'Side to Side', 'Ariana Grande'),
(20, 'Cant Stop The Feeling!', 'Justin Timberlake'),
(21, 'Luv', 'Tory Lanez'),
(22, 'Sucker For Pain', 'Lil Wayne'),
(23, 'Into You', 'Ariana Grande'),
(24, 'Starving', 'Hailee Steinfeld'),
(25, 'Hymn for the Weekend', 'Coldplay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`rank`);
