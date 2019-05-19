
CREATE DATABASE mesepare_teste;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `mesepare_teste`.`album` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`album`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`album`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

CREATE TABLE `mesepare_teste`.`dates` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `creator_gender` text,
  `gender` text,
  `type` text,
  `state` text,
  `city` text,
  `place` text,
  `date_start` varchar(20),
  `date_end` varchar(20),
  `hour_start` varchar(20),
  `hour_end` varchar(20),
  `creator_desc` text,
  `date_desc` text,
  `contact` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`dates`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

CREATE TABLE `mesepare_teste`.`notifications` (
  `id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  `int_contact` text,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`notifications`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;



CREATE TABLE `mesepare_teste`.`photos` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `name` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`photos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`photos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;


CREATE TABLE `mesepare_teste`.`user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` text  NOT NULL,
  `gender` text NOT NULL,
  `state` text,
  `city` text,
  `descr` text,
  `age` int(3) NOT NULL,
  `contact` text,
  `status` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;



CREATE TABLE `mesepare_teste`.`users` (
  `id` int(11) NOT NULL,
  `nick` text,
  `name` text,
  `email` text,
  `gender` text,
  `code` int(11) NOT NULL,
  `planos` text,
  `today` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;


CREATE TABLE `mesepare_teste`.`wallet` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `date` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `mesepare_teste`.`wallet`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mesepare_teste`.`wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
COMMIT;
