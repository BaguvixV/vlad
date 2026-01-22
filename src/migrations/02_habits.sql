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
-- Table structure for table `habits`
--

CREATE TABLE IF NOT EXISTS `habits` (
  `habit_id`    INT AUTO_INCREMENT PRIMARY KEY,
  `user_id`     INT NOT NULL,
  `category`    VARCHAR(80) NOT NULL,
  `completion`  TINYINT(1) NOT NULL DEFAULT 0,
  `title`       VARCHAR(80) NOT NULL,
  `description` TEXT,
  `is_active`   TINYINT(1) NOT NULL DEFAULT 1,
  `created_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_latvian_ci;

--
-- Foreign keys
--

ALTER TABLE `habits`
  ADD CONSTRAINT `fk_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users`(`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

--
-- Values for table `habits`
--

INSERT INTO `habits` (`habit_id`, `user_id`, `category`, `completion`, `title`, `description`, `is_active`) VALUES
(1, 1, 'health', 1, 'Morning Jog', 'Jog for 30 minutes every morning to improve cardiovascular health.', 1),
(2, 2, 'productivity', 0, 'Read a Book', 'Finish reading "Atomic Habits" by James Clear to enhance personal development.', 1),
(3, 3, 'hobby', 0, 'Learn Guitar', 'Practice guitar for at least 20 minutes daily to improve skills.', 0),
(4, 4, 'work', 1, 'Project Meeting', 'Attend the weekly project meeting to discuss progress and next steps.', 1);