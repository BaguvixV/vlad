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

INSERT INTO `habits` (`user_id`, `category`, `completion`, `title`, `description`, `is_active`) VALUES
-- ======================
-- USER 1
-- ======================
(1, 'health', 1, 'Morning Jog', 'Jog for 30 minutes every morning to improve cardiovascular health.', 1),
(1, 'health', 0, 'Drink 2L Water', 'Stay hydrated by drinking at least 2 liters of water daily.', 1),
(1, 'productivity', 0, 'Plan the Day', 'Write down top 3 priorities every morning.', 1),
(1, 'mindset', 1, 'Meditate', 'Meditate for 10 minutes to improve focus.', 1),
(1, 'learning', 0, 'Read 10 Pages', 'Read at least 10 pages of a self-development book.', 1),

-- ======================
-- USER 2
-- ======================
(2, 'productivity', 0, 'Read Atomic Habits', 'Finish reading "Atomic Habits" by James Clear.', 1),
(2, 'health', 1, 'Gym Workout', 'Strength training session 3 times per week.', 1),
(2, 'finance', 0, 'Track Expenses', 'Log daily expenses in budgeting app.', 1),
(2, 'learning', 0, 'Learn PHP', 'Study PHP OOP concepts for 30 minutes.', 1),
(2, 'mindset', 1, 'Gratitude Journal', 'Write 3 things you are grateful for.', 1),

-- ======================
-- USER 3
-- ======================
(3, 'hobby', 0, 'Learn Guitar', 'Practice guitar for at least 20 minutes daily.', 1),
(3, 'health', 1, 'Evening Walk', 'Walk 20 minutes after dinner.', 1),
(3, 'learning', 0, 'Watch Tutorials', 'Watch one development tutorial daily.', 1),
(3, 'productivity', 0, 'Inbox Zero', 'Clear email inbox before end of day.', 1),
(3, 'mindset', 1, 'Affirmations', 'Repeat positive affirmations every morning.', 1),

-- ======================
-- USER 4
-- ======================
(4, 'work', 1, 'Project Meeting', 'Attend weekly project meeting.', 1),
(4, 'health', 0, 'Stretching', 'Stretch for 15 minutes in the morning.', 1),
(4, 'learning', 0, 'Read Tech Articles', 'Read one tech article per day.', 1),
(4, 'finance', 1, 'Review Budget', 'Review monthly budget every Sunday.', 1),
(4, 'productivity', 0, 'Task Review', 'Review tasks at end of day.', 1);