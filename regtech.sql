-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 14 2018 г., 22:01
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `regtech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usergroup` tinyint(4) NOT NULL DEFAULT '9',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `login`, `password`, `registration_date`, `usergroup`) VALUES
(1, 'mrB4el@hotmail.com', 'mrB4el', '14e1b600b1fd579f47433b88e8d85291', '2018-01-12 09:00:03', 1),
(2, 'mrB4el@outlook.com', 'Oleg', '14e1b600b1fd579f47433b88e8d85291', '2018-01-12 09:05:56', 9),
(3, 'test@test.ru', 'test', 'fb469d7ef430b0baf0cab6c436e70375', '2018-01-14 19:35:06', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `things`
--

DROP TABLE IF EXISTS `things`;
CREATE TABLE IF NOT EXISTS `things` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `brand` text NOT NULL,
  `serialnumber` text,
  `registration_date` timestamp NULL DEFAULT NULL,
  `sold_date` timestamp NULL DEFAULT NULL,
  `guarantee_period` int(11) DEFAULT NULL,
  `description` text,
  `owner` int(11) DEFAULT NULL,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `things`
--

INSERT INTO `things` (`id`, `name`, `brand`, `serialnumber`, `registration_date`, `sold_date`, `guarantee_period`, `description`, `owner`, `photo`) VALUES
(1, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 13:06:00', 1, 'simple test', 1, 'photo1'),
(2, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(3, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', 3, 'photo1'),
(4, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(5, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', 1, 'photo1'),
(6, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(7, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(8, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(9, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(10, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', 1, 'photo1'),
(11, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(12, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(13, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(14, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(15, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(16, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(17, 'test', 'ASUS', '1sa2d3456', NULL, '2018-01-14 11:34:56', 121212, 'simple test', NULL, 'photo1'),
(18, 'test2', 'ASUS', '1sa2d3456', NULL, NULL, 1, 'simple test', NULL, 'photo1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
