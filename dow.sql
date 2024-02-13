-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 11:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dow`
--

-- --------------------------------------------------------

--
-- Table structure for table `bags`
--

CREATE TABLE `bags` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`productId`, `name`, `price`, `image`) VALUES
(1, 'men chest bags', '3999', 'chestbag.webp'),
(2, 'Laptop bags ', '6999', 'laptopbag.jpg'),
(3, 'suitcases new brand', '13999', 'suitcase.jpg'),
(4, 'Handbags for womens', '5999', 'handbag.webp'),
(5, 'Men\'s lather wallet', '499', 'wallet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clothfashion`
--

CREATE TABLE `clothfashion` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothfashion`
--

INSERT INTO `clothfashion` (`productId`, `name`, `price`, `image`) VALUES
(1, 'men shirts new brand', '40000', 'shit.png'),
(2, 'Sport shoes unisex', '7000', 'menshoe.webp'),
(3, 'women trousers new brand', '5000', 'wtrou.webp'),
(4, 'Hoods for kids unisex', '900', 'kidhood.webp'),
(5, 'women dress special', '10000', 'dress.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`productId`, `name`, `price`, `image`) VALUES
(1, 'Lenovo thinkpad laptop X221i', '50000', 'laptop.jpg'),
(2, 'Smart Camera with high resolution power', '100000', 'camera.jpg'),
(3, 'Laptop charger original one', '3000', 'laptopcharger.jpg'),
(4, 'wooofer the original ', '12000', 'woofer.png'),
(5, 'Infinix phone smart6 new model ', '20000', 'infinix.webp');

-- --------------------------------------------------------

--
-- Table structure for table `fooddelivery`
--

CREATE TABLE `fooddelivery` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fooddelivery`
--

INSERT INTO `fooddelivery` (`productId`, `name`, `price`, `image`) VALUES
(1, 'Nyama choma special', '999', 'nyama.jpg'),
(2, 'Pizza order now', '4000', 'food-2.png'),
(3, 'Delicoius chicken ', '2999', 'chicken.jpg'),
(4, 'Eggs', '340', 'egg.webp'),
(5, 'Fried chips', '599', 'food-6.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `grand_total` varchar(1000) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`productId`, `name`, `price`, `quantity`, `grand_total`, `userId`) VALUES
(1, 'Lenovo thinkpad laptop X221i', '50000', '1', '50000', 1),
(2, 'Smart Camera with high resolution power', '100000', '1', '150000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userLocation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userEmail`, `userLocation`, `password`) VALUES
(1, 'clinton@gmail.com', 'nairobi', '$2y$10$E3mUaOpaC6tUfiy74rdxwOAseq8g./hQzd37TlT1A6tcSr7rlEuny');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bags`
--
ALTER TABLE `bags`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `clothfashion`
--
ALTER TABLE `clothfashion`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `fooddelivery`
--
ALTER TABLE `fooddelivery`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bags`
--
ALTER TABLE `bags`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clothfashion`
--
ALTER TABLE `clothfashion`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fooddelivery`
--
ALTER TABLE `fooddelivery`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
