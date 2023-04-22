-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 05:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  `creation_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `creation_time`, `updated time`) VALUES
(1, 'Shudipto', 'shudiptopodder73@gmail.com', 'ssss', '2023-04-21 08:41:54', '2023-04-21 08:41:54'),
(3, 'SS', 'aaaaaaaa@gmail.com', 'nice', '2023-04-21 08:45:10', '2023-04-21 08:45:10'),
(4, 'Shudip', 'sssss@gmail.com', 'aaaaaa', '2023-04-21 10:11:21', '2023-04-21 10:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(11) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand`, `price`, `stock`, `image`, `Description`) VALUES
(1, '', 0, 0, '', ''),
(3, '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `reset_token`, `reset_token_expiry`) VALUES
(2, 'test', 'test', 'test', NULL, NULL),
(3, 'test2', 'test2', 'test2', NULL, NULL),
(4, 'user', 'shudiptoteertho2000@gmail.com', 'user', 'a19427beee2dc99374d55170bf113997790504aba8621497c14bcc5266a7de6c', '2023-04-21 04:51:49'),
(5, 'Shudipto Podder', 'shudiptopodder73@gmail.com', '1234', '999065d10a79954714ad7b94f6e1e809dda67e52ef6abdbbbb51770f686d7166', '2023-04-21 11:14:14'),
(6, 'SP', 'podder@gmail.com', '1111', NULL, NULL),
(7, 'Pod', 'podd@mail.com', '1234', 'c45c197d34f21d0228a934a3021bf16da686da0815c88b25d920204d0a0a5b9f', '2023-04-21 11:16:56'),
(8, 'bob', 'bob@mail.com', 'tester', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
