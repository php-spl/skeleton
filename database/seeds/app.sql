-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Vært: localhost
-- Genereringstid: 24. 03 2021 kl. 14:18:51
-- Serverversion: 8.0.18
-- PHP-version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-app`
--

--
-- Data dump for tabellen `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`) VALUES
(1, 'Test', 'This is a test', '2021-03-24 12:51:38'),
(2, 'Test 2', 'This is a test 2', '2021-03-24 12:51:42');

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`) VALUES
(1, 'john', '$2y$10$s6DUqPwDNmzUKGtVCKidjOTvYqX2StBV5zezBzY4Yk16ZcSpkH7Xe', '2021-03-19 22:36:14'),
(2, 'john', '$2y$10$v70Z/y5wCNsS7wagGDry7Os9iWGlgPUVfRLY73EavBv1zSWWU7unu', '2021-03-19 22:40:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
