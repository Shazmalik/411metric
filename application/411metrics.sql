-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
CREATE DATABASE `411metrics`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `created_at`, `updated_at`) VALUES
(1,	'Lamonts',	'McCulloughs',	'lcarrolls@vonrueden.com',	'2020-05-04 18:10:59',	'2020-05-04 18:10:59'),
(2,	'Daphney',	'Nader',	'tkuvalis@tillman.com',	'2020-05-04 18:12:16',	'2020-05-04 18:12:16'),
(3,	'Jon',	'tillman',	'tillman@gmail.com',	'2020-05-04 18:12:16',	'2020-05-04 18:12:16');

CREATE TABLE user_login (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_login` ( `username`, `password` ) VALUES
(	'411metric',	'411metric'),

-- 2020-05-04 18:14:09