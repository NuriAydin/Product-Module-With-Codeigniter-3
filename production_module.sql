-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 25 May 2024, 13:53:30
-- Sunucu sürümü: 5.7.42
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `production_module`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(510) CHARACTER SET utf8 NOT NULL,
  `price` varchar(50) CHARACTER SET utf8 NOT NULL,
  `discount` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `picture`, `name`, `description`, `price`, `discount`) VALUES
(37, 'iScreen_Shoter_-_Google_Chrome_-_2405251236281.png', 'test551', '1tt', '1,55', 2),
(38, 'iScreen_Shoter_-_202405251205177625.png', 'last productt', 'this is the product description, name is last productt', '2.567,91', 2),
(39, 'iScreen_Shoter_-_202405251205177623.png', 'last productv2', 'last productv2last productv2last productv2last productv2', '2,34', 1),
(40, 'iScreen_Shoter_-_202405251205177624.png', 'spinner ', 'spinner spinner spinner spinner spinner ', '1,23', 1),
(41, 'iScreen_Shoter_-_Google_Chrome_-_2405251303041.png', 'demo2', 'demodemo1', '110,00', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `deleted`) VALUES
(1, 'mikro@test.com', '8e147f571b81fadba14e5775c42826a7', '2024-05-23 17:53:01', 0),
(2, 'mikro1@test.com', '$2y$10$8nNCMPRWlcc8XGP7vwzLXuoh.BWmWYvYS/1wNvRg7qWM2MgzShnIe', '2024-05-24 16:12:21', 0),
(3, 'mikro2@test.com', '$2y$10$UyPcWPQV/.BTHAC0lcx.neCewu6HpzspFwfPQhYYETmPCzCgrp2kC', '2024-05-24 16:13:16', 0),
(4, 'mikro3@test.com', '7', '2024-05-24 16:14:02', 0),
(5, 'mikro4@test.com', '10d74a98e37281772b632df1041cc1d3', '2024-05-24 16:15:05', 0),
(6, 'mikro5@test.com', 'e6e1eef693d2d389af9683b9461017ca', '2024-05-24 16:25:03', 0),
(7, 'mikro6@test.com', '02606abc14fe7b6dbfac1780fa58c828', '2024-05-24 18:22:32', 0),
(8, 'mikro7@test.com', '1ff79f8a0d2392e802f40d72416577f4', '2024-05-24 18:42:14', 0),
(9, 'mikro8@test.com', '3d599644e84fe1793a8676f6d4e9e86d', '2024-05-24 18:49:22', 0),
(10, 'mikro81@test.com', '3d599644e84fe1793a8676f6d4e9e86d', '2024-05-24 19:12:03', 0),
(11, 'mikro9@test.com', '0114ec339508bf7b9e3e4e65188a095f', '2024-05-25 07:57:17', 0),
(12, 'test@et.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-05-25 10:18:18', 0),
(13, 'test1@test.com', '5a105e8b9d40e1329780d62ea2265d8a', '2024-05-25 10:31:14', 0),
(14, 'sadasd@dasds.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-25 10:36:13', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
