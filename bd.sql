-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Жов 17 2022 р., 01:27
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `bd`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Категорія 1 '),
(10, 'Категорія 10'),
(11, 'Категорія 11'),
(12, 'Категорія 12'),
(13, 'Категорія 13'),
(14, 'Категорія 14'),
(2, 'Категорія 2'),
(3, 'Категорія 3'),
(7, 'Категорія 7 '),
(8, 'Категорія 8'),
(9, 'Категорія 9'),
(4, 'Катерогія 4'),
(5, 'Катерогія 5'),
(6, 'Катерогія 6');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `categories`, `quantity`) VALUES
(2, 'Товар 1', 'Опис 1', 1001, 'Катерогія 6', NULL),
(3, 'Товар 3', 'Опис 3', 300, 'Категорія 1', NULL),
(4, 'Товар 2', 'Опис 2 ', 500, 'Катерогія 4', NULL),
(5, 'Товар 4', 'Опис 4', 444, 'Катерогія 5', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `sales`
--

CREATE TABLE `sales` (
  `id_sales` int NOT NULL,
  `id_product` int NOT NULL,
  `date` date NOT NULL,
  `quantity` int NOT NULL,
  `sales_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci,
  `password` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `status`) VALUES
(1, '123', '123', 'Админ Админович', 'admin'),
(2, 'sanya', 'qwerty', 'Саня ', 'product_editor');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories` (`categories`),
  ADD KEY `id` (`id`);

--
-- Індекси таблиці `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_product` (`id_product`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories`) REFERENCES `categories` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
