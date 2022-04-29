-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 30. 00:17
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `shoes_db`
--
CREATE DATABASE IF NOT EXISTS `shoes_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `shoes_db`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `cim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefonszam` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `megjegyzes` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `date`, `cim`, `telefonszam`, `megjegyzes`) VALUES
(55, 13, 19990, '2022-04-29', 'a', 'a', 'a'),
(56, 13, 17490, '2022-04-29', 'a', 'a', 'a'),
(57, 13, 39480, '2022-04-29', 'a', 'a', 'a'),
(58, 13, 17490, '2022-04-29', 'a', 'a', 'a'),
(59, 10, 17490, '2022-04-29', 'a', 'a', 'a'),
(60, 10, 17490, '2022-04-29', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(61, 55, 7, 1),
(62, 56, 8, 1),
(63, 57, 8, 1),
(64, 57, 9, 1),
(65, 58, 8, 1),
(66, 59, 8, 1),
(67, 60, 8, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `price`, `brand`) VALUES
(14, 'Nike Spring', 'W', 14990, 'Nike'),
(13, 'PUMA Anzarun', 'W', 22990, 'PUMA'),
(12, 'FILA Exit', 'W', 16990, 'FILA'),
(11, 'adidas Response', 'W', 24990, 'adidas'),
(7, 'adidas Fluidspeed', 'M', 19990, 'adidas'),
(8, 'FILA Max', 'M', 17490, 'FILA'),
(9, 'Nike Revolution', 'M', 21990, 'Nike'),
(10, 'Puma Racer', 'M', 16990, 'Puma'),
(15, 'adidas RUN', 'G', 12400, 'adidas'),
(16, 'FILA Star', 'G', 9900, 'FILA'),
(17, 'PUMA Shine', 'G', 12390, 'PUMA'),
(18, 'Nike Sneaker', 'G', 17900, 'Nike'),
(23, 'PUMA Musket', 'B', 15900, 'PUMA'),
(24, 'Nike Court', 'B', 11690, 'Nike'),
(25, 'adidas Racer', 'B', 18900, 'adidas'),
(26, 'FILA Rogue', 'B', 12990, 'FILA');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `cim` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefonszam` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `cim`, `telefonszam`) VALUES
(16, 'f', 'f', '$2y$10$97dtrgQfO5BhmhJXykSAEeLFre3HL3mTZ9SS.2G4kAtHuQprVTc4G', 'customer', '', ''),
(10, 'a', 'a', '$2y$10$yBo.VrtN6gKAy3AezXvGZ.0n.aGAKGvo.bUYzOmtw4NwYEhAx56xK', 'customer', 'a', 'a'),
(13, 'admin', 'admin@gmail.com', '$2y$10$hW.HbkM7SsfXXggDpYQ1M.n9prI7M9X5H7Uxf8E54LRloil5qQKy2', 'admin', 'a', 'a'),
(17, '', '', '$2y$10$7ZxTmmsP8zS9S32G141VeO8fcMJXEhQQDQsCqxSJjxz1G3PNQFL.a', 'customer', '', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`product_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
