-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 10:34 PM
-- Server version: 8.1.0
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tv_series_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `title`, `channel`, `genre`) VALUES
(1, 'Harry Potter', 'Channel 45', 'Science Fiction'),
(2, 'Why Men Fall in Love', 'Channel 101', 'Romance'),
(3, 'X-men', 'Channel 234', 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_intervals`
--

CREATE TABLE `tv_series_intervals` (
  `id` int NOT NULL,
  `id_tv_series` int DEFAULT NULL,
  `week_day` varchar(20) NOT NULL,
  `show_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tv_series_intervals`
--

INSERT INTO `tv_series_intervals` (`id`, `id_tv_series`, `week_day`, `show_time`) VALUES
(1, 1, 'Monday', '2024-01-07 20:00:00'),
(2, 1, 'Wednesday', '2024-01-08 20:00:00'),
(3, 3, 'Thursday', '2024-01-08 20:00:00'),
(4, 3, 'Friday', '2024-01-12 20:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_series_intervals`
--
ALTER TABLE `tv_series_intervals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tv_series` (`id_tv_series`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tv_series_intervals`
--
ALTER TABLE `tv_series_intervals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tv_series_intervals`
--
ALTER TABLE `tv_series_intervals`
  ADD CONSTRAINT `tv_series_intervals_ibfk_1` FOREIGN KEY (`id_tv_series`) REFERENCES `tv_series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
