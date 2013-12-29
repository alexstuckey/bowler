--
-- MySQL 5.5.25
-- Sat, 21 Dec 2013 20:21:39 +0000
--

CREATE TABLE `items` (
   `id` int(11) not null auto_increment,
   `summary` varchar(50) not null,
   `body` text,
   `year` int(11) not null,
   `week` int(11) not null,
   `created_by` int(11),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `quarters` (
   `id` int(11) not null auto_increment,
   `type` text,
   `start_date` date,
   `end_date` date,
   `half_start` date,
   `half_end` date,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;
