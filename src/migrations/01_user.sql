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
-- Database: `vladCRUD`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id`          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `created_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name`        VARCHAR(80) NOT NULL,
  `surname`     VARCHAR(80) NOT NULL,
  `age`         TINYINT UNSIGNED  NOT NULL CHECK (age <= 99),
  `email`       VARCHAR(120) NOT NULL UNIQUE,
  `password`    VARCHAR(255) NOT NULL,
  `phone`       VARCHAR(20) NOT NULL UNIQUE,
  `bio`         TEXT,
  `is_active`   BOOLEAN NOT NULL DEFAULT TRUE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_latvian_ci;


--
-- Values for table `habit`
--

INSERT INTO `users` (`name`, `surname`, `age`, `email`, `password`, `phone`, `bio`, `is_active`) VALUES
('jesse', 'pinkman', 27, 'pinkman@gmail.com', 'hashed_password_123', '+1234567890', 'Just a regular guy caught up in extraordinary circumstances.', 1),
('john', 'silverhand', 99, 'silverhand@gmail.com', 'silverhand123', '+0987654321', 'A legendary rockerboy with a cybernetic arm and a rebellious spirit.', 1),
('jarvis', 'smith', 45, 'jarvis.smith@example.com', 'smith@gmail.com', '+1122334455', 'An advanced AI assistant designed to help with everyday tasks and provide information.', 0),
('Alice', 'Johnson', 30, 'alice.johnson@example.com', 'hashed_password_123', 123456789, 'Alice is a software developer.', 0);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
