-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:08 AM
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
-- Database: `wokolndo_headturner_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP DATABASE IF EXISTS `wokolndo_headturner_db`; 
CREATE DATABASE IF NOT EXISTS `wokolndo_headturner_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wokolndo_headturner_db`;


CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `in_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `done_payment`
--

CREATE TABLE `done_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `date_pay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qnty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place_order`
--

CREATE TABLE `place_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `order_id` bigint(11) NOT NULL,
  `qnty` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `shipped` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_order`
--

INSERT INTO `place_order` (`id`, `user_id`, `product_id`, `order_id`, `qnty`, `size`, `total_bill`, `pay_method`, `order_date`, `shipped`) VALUES
(24, 13, 'shark-001', 94306762944, 1, 'xs', 97588, 'gcash', '2023-05-23', 0),
(25, 13, 'shark-004', 94306762944, 3, 'xs', 97588, 'gcash', '2023-05-23', 0),
(26, 13, 'shark-002', 85311713768, 1, 'xs', 12708, 'maya', '2023-05-23', 0),
(27, 13, 'shark-001', 48101687267, 2, 'xs', 94038, 'maya', '2023-05-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `xs_avail` int(11) NOT NULL,
  `sm_avail` int(11) NOT NULL,
  `md_avail` int(11) NOT NULL,
  `lg_avail` int(11) NOT NULL,
  `xlg_avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `image`, `brand`, `name`, `price`, `xs_avail`, `sm_avail`, `md_avail`, `lg_avail`, `xlg_avail`) VALUES
(1, 'shark-001', 'https://i.ibb.co/Zf240Jj/shark-racerpro-gp-martinator.png', 'shark', 'Shark RacerPro GP Martinator', 47000, 23, 11, 13, 14, 10),
(3, 'shark-002', 'https://i.ibb.co/kc4GMs2/shark-skwal2-iker-lecuona-nero-removebg-preview.png', 'shark', 'Shark SKWAL2 Iker Lecuona Nero', 12670, 4, 0, 0, 1, 0),
(5, 'shark-003', 'https://i.ibb.co/0JX2w0V/shark-d-skwal-2-shigan-full-face-helmet.png', 'shark', 'Shark D SKWAL2 Shigan Full Face Helmet', 10000, 5, 5, 0, 2, 1),
(6, 'shark-004', 'https://i.ibb.co/ZTvfv4Y/shark-evo-es-k-rozen-full-face-helmet.png', 'shark', 'Shark EVO es k Rozen Full Face Helmet', 16850, 3, 0, 11, 0, 0),
(7, 'shark-005', 'https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png', 'shark', 'Shark Spartan GT Carbon Full Face Helmet', 23380, 0, 0, 0, 0, 0),
(8, 'shark-006', 'https://i.ibb.co/TYyBBT5/shark-spartan-gt-pro-ritmo-rosso-removebg-preview.png', 'shark', 'Shark Spartan GT Pro Carbon Ritmo Helmet', 22390, 2, 5, 4, 0, 0),
(9, 'shark-007', 'https://i.ibb.co/0KccRZY/shark-spartan-gt-carbon-skin-full-face-helmet.png', 'shark', 'Shark Spartan GT Carbon Skin Full Face Helmet', 10000, 7, 1, 5, 0, 0),
(10, 'shark-008', 'https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png', 'shark', 'Shark Spartan RS Byhron Full Face Helmet', 16350, 6, 5, 0, 0, 7),
(11, 'shark-009', 'https://i.ibb.co/XVMY8qS/shark-spartan-rs-replica-zarco-austin-full-face-helmet.png', 'shark', 'Shark Spartan RS Replica Zarco Austin Full Face Helmet', 47004, 7, 3, 0, 5, 0),
(12, 'shark-010', 'https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png', 'shark', 'Shark Spartan GT Carbon Full Face Helmet', 23380, 5, 0, 2, 0, 0),
(13, 'shark-011', 'https://i.ibb.co/TYyBBT5/shark-spartan-gt-pro-ritmo-rosso-removebg-preview.png', 'shark', 'Shark Spartan GT Pro Carbon Ritmo Helmet', 22390, 2, 1, 0, 0, 0),
(14, 'shark-012', 'https://i.ibb.co/0KccRZY/shark-spartan-gt-carbon-skin-full-face-helmet.png', 'shark', 'Shark Spartan GT Carbon Skin Full Face Helmet', 10000, 0, 5, 0, 7, 3),
(15, 'shark-013', 'https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png', 'shark', 'Shark Spartan RS Byhron Full Face Helmet', 16350, 6, 4, 0, 0, 3),
(16, 'shark-014', 'https://i.ibb.co/XVMY8qS/shark-spartan-rs-replica-zarco-austin-full-face-helmet.png', 'shark', 'Shark Spartan RS Replica Zarco Austin Full Face Helmet', 47004, 7, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `verification` int(11) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fname`, `lname`, `contact`, `address`, `image`, `pass`, `pin`, `verification`, `date_reg`) VALUES
(13, 'bentf24@gmail.com', 'Benedict ', 'Barcebal ', '9324823424', '3232 Guadalupe Nuevo Makit City', 'profile_upload/profile-34210868.jpeg', '$2y$10$7f/UCu6rFuv/toYe.aCGJui8qgHPhEnqiXmNEfTfw2wNmFl7eZCLe', 855027, 1, '2023-05-09 03:25:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_order`
--
ALTER TABLE `place_order`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `place_order`
--
ALTER TABLE `place_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
