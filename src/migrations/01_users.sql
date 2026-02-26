-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Jan 05, 2026 at 08:19 PM
-- Server version: 8.4.7
-- PHP Version: 8.2.27


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



--
-- Database: `ieradums_lv`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id`     INT AUTO_INCREMENT PRIMARY KEY,
  `name`        VARCHAR(80) NOT NULL,
  `surname`     VARCHAR(80) NOT NULL,
  `age`         TINYINT UNSIGNED  NOT NULL CHECK (age <= 99),
  `email`       VARCHAR(120) NOT NULL UNIQUE,
  `password`    VARCHAR(255) NOT NULL,
  `phone`       VARCHAR(20) NOT NULL UNIQUE,
  `bio`         TEXT,
  `is_active`   BOOLEAN NOT NULL DEFAULT TRUE,
  `created_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_latvian_ci;


--
-- Values for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `age`, `email`, `password`, `phone`, `bio`, `is_active`) VALUES
(1, 'jesse', 'pinkman', 27, 'pinkman@gmail.com', '$2y$12$/I0tGnYTfPrW8x5fOFPhR.wLhkDc4xQFmsKa7bwY75MTT4xoyAp/W', '+1234567890', 'Just a regular guy caught up in extraordinary circumstances.', 1),
(2, 'john', 'silverhand', 99, 'silverhand@gmail.com', '$2y$12$S2uR.SX0JplYfR/3UayE3uynXWvITtkc2tvnNqQ0MkrPpZmPB2ZL2', '+0987654321', 'A legendary rockerboy with a cybernetic arm and a rebellious spirit.', 1),
(3, 'jarvis', 'smith', 45, 'jarvis.smith@example.com', '$2y$12$8G13WKmd7GAt5NtsorImLO2KDWo6oVsF1hEN.UiDQox9C4Z1LKVl6', '+1122334455', 'An advanced AI assistant designed to help with everyday tasks and provide information.', 0),
(4, 'Alice', 'Johnson', 30, 'alice.johnson@example.com', '$2y$12$ZUCqOvA77003m.D.U61x6.jZvHvNyyx4DLgRoP9M3HjyMUjIY6zly', 123456789, 'Alice is a software developer.', 0);
