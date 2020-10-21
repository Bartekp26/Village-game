-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 07:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VillageGame`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings_costs`
--

CREATE TABLE `buildings_costs` (
  `lvl` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `production` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildings_costs`
--

INSERT INTO `buildings_costs` (`lvl`, `cost`, `production`) VALUES
(1, 0, 10),
(2, 200, 15),
(3, 300, 20),
(4, 400, 25),
(5, 500, 30),
(6, 650, 40),
(7, 800, 50),
(8, 950, 60),
(9, 1100, 70),
(10, 1250, 80),
(11, 1425, 95),
(12, 1600, 110),
(13, 1775, 125),
(14, 1950, 140),
(15, 2125, 155),
(16, 2350, 175),
(17, 2575, 195),
(18, 2800, 215),
(19, 3025, 235),
(20, 3250, 255);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_date`) VALUES
(1, 'Username', '$2y$10$2CTIBN3Dm2nU66qC4YPvnu2TakFrY75KvVlHOFLTqmqd46eQH8PF.', 'user@gmail.com', '2020-09-11 19:46:29');
-- Password is "Qwerty123"

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `stone` int(11) NOT NULL,
  `clay` int(11) NOT NULL,
  `town_hall` int(11) NOT NULL,
  `sawmill` int(11) NOT NULL,
  `stone_mine` int(11) NOT NULL,
  `clay_mine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `owner_id`, `wood`, `stone`, `clay`, `town_hall`, `sawmill`, `stone_mine`, `clay_mine`) VALUES
(1, 1, 500, 500, 500, 2, 5, 7, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
