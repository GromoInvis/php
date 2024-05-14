-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 14 2024 р., 10:21
-- Версія сервера: 10.4.32-MariaDB
-- Версія PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `бібліотека`
--

-- --------------------------------------------------------

--
-- Структура таблиці `відомі українські письменники`
--

CREATE TABLE `відомі українські письменники` (
  `Ім'я` varchar(30) NOT NULL,
  `Прізвище` varchar(30) NOT NULL,
  `Назва книги` varchar(50) NOT NULL,
  `Кількість сторінок` bigint(255) NOT NULL,
  `Дата народження` date NOT NULL,
  `Дата написання` date DEFAULT NULL,
  `Жанр` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `відомі українські письменники`
--

INSERT INTO `відомі українські письменники` (`Ім'я`, `Прізвище`, `Назва книги`, `Кількість сторінок`, `Дата народження`, `Дата написання`, `Жанр`) VALUES
('Тарас', 'Шевченко', 'Кобзар', 720, '1814-03-09', '1839-05-19', 'Поезія'),
('Тарас', 'Шевченко', 'Кобзар', 720, '1814-03-09', '1839-05-19', 'Поезія'),
('Іван', 'Франко', 'Маніпулянтка', 319, '1856-08-27', '1906-05-28', 'Фікшн'),
('Іван', 'Франко', 'Захар Беркут', 312, '1856-08-27', '1883-09-01', 'Фікшн'),
('Леся', 'Українка', 'Contra spem spero!', 1, '1871-02-25', '1893-03-12', 'Поезія');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
