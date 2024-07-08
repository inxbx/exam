-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 02:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zooadventures`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_id`, `check_in`, `check_out`) VALUES
(6, 2, 4, '2024-02-15', '2024-02-21'),
(7, 5, 4, '2024-04-03', '2024-04-17'),
(8, 2, 5, '2024-02-14', '2024-02-27'),
(9, 1, 5, '2024-08-28', '2024-09-04'),
(10, 3, 5, '2024-04-20', '2024-04-23'),
(11, 6, 5, '2024-05-02', '2024-05-04'),
(12, 6, 1, '2024-04-21', '2024-04-22'),
(13, 6, 5, '2024-05-12', '2024-05-14'),
(14, 6, 4, '2024-06-01', '2024-06-03'),
(15, 6, 4, '2024-03-13', '2024-03-15'),
(17, 12, 2, '2024-04-19', '2024-04-20'),
(18, 6, 4, '2024-05-05', '2024-05-07'),
(19, 6, 1, '2024-05-03', '2024-05-06'),
(20, 6, 4, '2024-06-14', '2024-06-16'),
(21, 6, 5, '2034-01-01', '2034-01-02'),
(22, 6, 5, '2045-01-01', '2045-01-02'),
(23, 6, 5, '2046-01-01', '2046-01-02'),
(24, 6, 5, '2047-01-01', '2047-01-02'),
(25, 13, 1, '2050-01-01', '2050-01-01'),
(26, 13, 1, '2051-01-01', '2051-01-03'),
(27, 13, 1, '2052-01-01', '2052-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_num`, `room_type`) VALUES
(1, 101, 'Family'),
(2, 102, 'Family'),
(3, 103, 'Single'),
(4, 104, 'Single'),
(5, 105, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `num_visitors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `date`, `num_visitors`) VALUES
(6, 6, '2024-04-30', 2),
(7, 6, '2024-05-03', 3),
(8, 6, '2024-04-15', 4),
(9, 6, '2024-04-04', 5),
(10, 6, '2024-04-25', 5),
(11, 6, '2024-05-05', 2),
(13, 12, '2024-04-19', 1),
(14, 6, '2024-05-04', 3),
(15, 6, '2024-05-04', 3),
(16, 6, '2024-05-11', 4),
(17, 6, '2024-05-10', 3),
(18, 13, '2024-04-24', 1),
(19, 13, '2024-04-24', 1),
(20, 13, '2024-04-24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `points`) VALUES
(1, 'jdicken0@last.fm', '$2a$04$TJ.KJXtxE.ZecqL2nrq66.Lttksbw2EwYCKyQHy6Lk2HuWlEcu6Oi', 32),
(2, 'mmerner1@youku.com', '$2a$04$Ne.NZfg0qgdIaas38PpVNucMv/YMv.TVEhZ0R.ytH/n1jyXOViFc.', 83),
(3, 'cmarvell2@php.net', '$2a$04$xibkLRIgWzvW91VGJsv/PO7Of1jctjou5hjiTImIaOjLLp0w0V8Dm', 92),
(4, 'jkerwin3@barnesandnoble.com', '$2a$04$yG14CofVomei/Sdo/3qpRuRX.FXDNDMcpr/2H66bjJczvruxvilm2', 11),
(5, 'njeffree4@infoseek.co.jp', '$2a$04$xnTeW807Zex4SuhvPIhcf.N8/zrCfC5aLhnMyiuCEptx2muvilVie', 16),
(6, 'test@test.com', '$2y$10$XwIpS4Ek3Dg7/RRd20Wpm.X0//l88wJuK3YyEHd355F1kvqp0DYsm', 700),
(8, 'email@test.com', '$2y$10$QVgaQcIw3i7ZcbQ7Qi8zMO9NQSYKC6E2VYYNIg.tut4z2V0quttY6', 0),
(9, 'test2@test.com', '$2y$10$6KNea8PzfqhANckQQnei1OaADXOvR1KJAHi02dDrjXQdTzQLWQh22', 0),
(12, 'view@test.com', '$2y$10$2sRpx0T3juttA1uW3zZQAOZCOlNz3X7kVPvbYG6C9B1nczlXniQgq', 0),
(13, 'points@test.com', '$2y$10$0hBDLPHJXYxdo9dWfpbbI.Jaxi5ahm5dhY5VlW/aI0m8EUYFQN7RS', 900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
