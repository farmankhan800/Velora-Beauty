-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2026 at 05:12 PM
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
-- Database: `velora_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `price`, `stock`, `description`, `image`, `created_at`) VALUES
(1, 'Velora Matte Lipstick Set', 'Makeup', 2499.00, 44, 'Premium Velora Matte Lipstick Set featuring six beautiful shades. Long-lasting, smooth texture, highly pigmented, and suitable for daily wear as well as special occasions. Provides rich color payoff with a comfortable matte finish.', '1.jpg', '2026-05-31 20:59:09'),
(2, 'Velora Liquid Foundation', 'Makeup', 3200.00, 29, 'Velora Liquid Foundation offers full coverage with a lightweight feel. It blends effortlessly into the skin, helping to create a smooth and flawless complexion while providing long-lasting wear throughout the day.', 'liquid foundation.png', '2026-05-31 21:04:08'),
(3, 'Velora Vitamin C Serum', 'Skin Care', 2800.00, 24, 'Velora Vitamin C Serum is designed to brighten the skin, reduce the appearance of dark spots, and improve overall skin texture. Its nourishing formula helps achieve a healthy, radiant, and youthful glow.', 'vit c serum.png', '2026-05-31 21:08:46'),
(4, 'Velora Face Wash', 'Skin Care', 1200.00, 40, 'Velora Face Wash gently removes dirt, oil, and impurities while maintaining the skin’s natural moisture balance. It leaves the skin feeling fresh, clean, soft, and revitalized after every wash.', 'face wash.png', '2026-05-31 21:14:39'),
(5, 'Velora Hair Serum', 'Hair Care', 1099.00, 55, 'Velora Hair Serum helps control frizz, add shine, and improve hair manageability. The lightweight formula nourishes the hair, leaving it silky, smooth, and protected from daily environmental stress.', 'hair serum.webp', '2026-05-31 21:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Farman', 'farmankhan37405@gmail.com', '$2y$10$Jcw.FF/cb6pI19jGW7I14u8iON1phm4mA9yn.vjQXyCrM2IScJQ4a', '2026-05-31 20:48:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
