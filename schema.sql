--
-- MySQL 5.5.25
-- Thu, 02 Jan 2014 00:56:22 +0000
--

CREATE TABLE `items` (
   `id` int(11) not null auto_increment,
   `summary` varchar(50) not null,
   `body` text,
   `year` int(11) not null,
   `week` int(11) not null,
   `created_by` int(11),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;


CREATE TABLE `quarters` (
   `id` int(11) not null auto_increment,
   `type` text,
   `start_date` date,
   `end_date` date,
   `half_start` date,
   `half_end` date,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;


CREATE TABLE `users` (
   `id` int(11) not null auto_increment,
   `username` varchar(50),
   `email` varchar(70),
   `firstName` varchar(50),
   `lastName` varchar(50),
   `publicName` varchar(50),
   `fireflyID` int(11),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;