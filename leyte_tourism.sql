-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2026 at 10:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leyte_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$91Mk/h2q6tImxbo1DUyvLuDMra6p8zMpqlznIlzJG5MEQYmOYgEv.');

-- --------------------------------------------------------

--
-- Table structure for table `delicacies`
--

CREATE TABLE `delicacies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delicacies`
--

INSERT INTO `delicacies` (`id`, `name`, `description`, `location`, `is_featured`, `image_name`, `created_at`, `updated_at`, `ingredients`, `instructions`) VALUES
(1, 'Binagol', 'Binagol is a local delicacy in the Philippines known for its refined taste. It is widely enjoyed by the people of all ages.', 'Leyte', 1, '69c3854f525d81774421327.jpg', '2026-03-25 13:59:26', '2026-03-25 14:48:47', '- Ingredient 1\r\n- Ingredient 2\r\n- Ingredient 3', 'Instruction 1\r\nInstruction2\r\nInstruction 3'),
(2, 'Bukayo', 'Food made from coconut.', 'Tacloban City', 0, '69c3893912e4d1774422329.jpg', '2026-03-25 15:05:29', '2026-03-25 15:05:29', '- Coconut\r\n- Giant nut', '- Why did no one provide instructions in the files.'),
(3, 'Suman', 'Suman loloco', 'Leyte', 0, '69c3895f467c51774422367.webp', '2026-03-25 15:06:07', '2026-03-25 15:06:07', 'Suman loloco', 'Suman loloco'),
(4, 'Budbud', 'A suman counterpart.', 'Leyte', 0, '69c38f780e6f61774423928.jpg', '2026-03-25 15:32:08', '2026-03-25 15:32:08', 'Sticky Rice\r\nWater', 'Crush the rice until it feels sticky.\r\nPut some water.\r\nKnead it.'),
(5, 'Roscas', 'Leyte biscuit', 'Leyte', 0, '69c38fa3406481774423971.jpg', '2026-03-25 15:32:51', '2026-03-25 15:32:51', 'Bread\r\nHarina', 'Knead the bread');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `description`, `location`, `is_featured`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'Limasawa Island', 'Island close to beautiful coral reefs that houses a plethera of sea life.', 'Limasawa', 1, '69c38111ecc101774420241.jpg', '2026-03-25 13:26:51', '2026-03-25 14:30:41'),
(3, 'Canigao Island', 'A lone island that features wonderful beaches, and clear waters.', 'Canigao', 1, '69c380d39b11a1774420179.jpg', '2026-03-25 14:01:45', '2026-03-25 14:29:39'),
(4, 'Alto Peak', 'A towering mountain peak located in Ormoc City, Barangay Milagro. Home to dense forests, and beautiful sceneries, this serves as an achievement for climbers and hikers around the province.', 'Ormoc City', 1, '69c38098aa42c1774420120.jpg', '2026-03-25 14:01:52', '2026-03-25 14:28:40'),
(5, 'Cuatro Islas', 'A weirdly shaped island that also has good beaches.', 'Ormoc City', 0, '69c388001f65e1774422016.jpg', '2026-03-25 15:00:16', '2026-03-25 15:00:16'),
(6, 'San Juanico Bridge', 'Longest bridge in the Philippines.', 'Tacloban City', 0, NULL, '2026-03-25 15:00:58', '2026-03-25 15:00:58'),
(7, 'MacArthur Landing Memorial Park', 'The historic place where MacArthur landed.', 'Tacloban City', 0, '69c38868c21281774422120.jpg', '2026-03-25 15:02:00', '2026-03-25 15:02:00'),
(8, 'Twin Island', 'Twin Island...', 'Ormoc City', 0, '69c388b1bc5c41774422193.jpg', '2026-03-25 15:03:13', '2026-03-25 15:03:13'),
(9, 'Masaba Falls', 'Sabaan', 'Tacloban City', 0, '69c388d5406f21774422229.jpg', '2026-03-25 15:03:49', '2026-03-25 15:03:49'),
(10, 'St. Nino Church', 'St. Nino Church is a church', 'Ormoc City', 0, '69c38ea52b2321774423717.jpg', '2026-03-25 15:28:37', '2026-03-25 15:28:37'),
(11, 'Sky Cafe', 'Sky Cafe in Baybay city that floats in the sky frfr', 'Baybay City', 0, '69c38ebee0e391774423742.jpg', '2026-03-25 15:29:02', '2026-03-25 15:29:02'),
(12, 'Mahagnao Volcano Natural Park', 'Mahagnao Volcano Natural Park will blow up soon', 'Baybay City', 0, '69c38ee2273af1774423778.jpg', '2026-03-25 15:29:38', '2026-03-25 15:29:38'),
(13, 'Kalanggaman Island', 'A submerging island depending on the tide.', 'Baybay City', 1, '69c397707f26c1774425968.jpeg', '2026-03-25 15:30:26', '2026-03-25 16:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `history` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`id`, `name`, `location`, `description`, `history`, `image_name`, `is_featured`) VALUES
(1, 'Buyogan Festival', 'Tacloban City', 'Buyogan festival originates from Tacloban Leyte and celebrates bee honey harvest.', 'Buyogan festival originates from Tacloban Leyte and celebrates bee honey harvest.', '69c38cc2b53711774423234.jpg', 1),
(2, 'Lubi-Lubi Festival', 'Leyte', 'Celebrates coconuts.', 'Celebrates coconuts.', '69c38cf759adf1774423287.webp', 1),
(3, 'Magsanga Festival', 'Leyte', 'festival for sanga', 'festival for sanga', '69c38d176cf1d1774423319.jpg', 1),
(4, 'Pintados Kasadyaan Festival', 'Tacloban City', 'Pintados Kasadyaan Festival', 'Pintados Kasadyaan Festival', '69c38e7865bd21774423672.jpg', 0),
(5, 'update', 'F1', 'Short Description', 'A', '69c396037734a1774425603.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(3, 'kjsdhf jklasljkdsahfjik', 'hfjkdsfjwdfe', '2026-03-25 13:07:19', '2026-03-25 13:07:19'),
(4, 'asdfasdf', 'asdfasdf', '2026-03-25 13:43:15', '2026-03-25 13:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `delicacies`
--
ALTER TABLE `delicacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delicacies`
--
ALTER TABLE `delicacies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
