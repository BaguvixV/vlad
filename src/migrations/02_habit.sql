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
-- Table structure for table `habit`
--

CREATE TABLE IF NOT EXISTS `habit` (
  `id`          INT AUTO_INCREMENT PRIMARY KEY,
  `created_at`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category`    VARCHAR(80) NOT NULL,
  `status`      ENUM('pending','completed','deleted','') NOT NULL,
  `title`       VARCHAR(80) NOT NULL,
  `description` TEXT,
  `is_active`   TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;


--
-- Values for table `habit`
--

INSERT INTO `habit` (`category`, `status`, `title`, `description`, `is_active`) VALUES
('health', 'pending', 'Morning Jog', 'Jog for 30 minutes every morning to improve cardiovascular health.', 1),
('productivity', 'completed', 'Read a Book', 'Finish reading "Atomic Habits" by James Clear to enhance personal development.', 1),
('hobby', 'deleted', 'Learn Guitar', 'Practice guitar for at least 20 minutes daily to improve skills.', 0),
('work', '', 'Project Meeting', 'Attend the weekly project meeting to discuss progress and next steps.', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
