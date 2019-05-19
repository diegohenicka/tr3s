-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2019 at 08:04 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7


CREATE DATABASE mesepare_teste;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mesepare_teste`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `mesepare_teste`.`album` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `mesepare_teste`.`dates` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `creator_gender` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `state` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `place` text COLLATE utf8_unicode_ci NOT NULL,
  `date_start` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_end` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hour_start` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hour_end` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `creator_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `date_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `mesepare_teste`.`notifications` (
  `id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  `int_contact` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `mesepare_teste`.`photos` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `mesepare_teste`.`user` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `state` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `mesepare_teste`.`users` (
  `id` int(11) NOT NULL,
  `nick` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `planos` text COLLATE utf8_unicode_ci NOT NULL,
  `today` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `mesepare_teste`.`wallet` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for table `album`
--
ALTER TABLE `mesepare_teste`.`album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `mesepare_teste`.`dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `mesepare_teste`.`notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `mesepare_teste`.`photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `mesepare_teste`.`user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `mesepare_teste`.`users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `mesepare_teste`.`wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `mesepare_teste`.`album`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `mesepare_teste`.`dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `mesepare_teste`.`notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `mesepare_teste`.`photos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `mesepare_teste`.`user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `mesepare_teste`.`users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `mesepare_teste`.`wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
