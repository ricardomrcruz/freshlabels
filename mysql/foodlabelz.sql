-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 01:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodlabels`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(3) NOT NULL,
  `name_category` varchar(240) NOT NULL,
  `img_category` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `img_category`) VALUES
(1, 'Condimentation', './assets/img/condimentation.jpg'),
(2, 'Meat', './assets/img/meat.jpeg'),
(3, 'Bread', './assets/img/bread.jpg'),
(4, 'Sauces', './assets/img/sauces.jpg'),
(5, 'Drinks', './assets/img/drinks.jpg'),
(6, 'Desserts', './assets/img/desserts.jpg'),
(7, 'Others', './assets/img/others.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(3) NOT NULL,
  `id_user` int(3) DEFAULT NULL,
  `name_product` varchar(240) NOT NULL,
  `time_defrost` time NOT NULL,
  `time_limit` time NOT NULL,
  `img_product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_user`, `name_product`, `time_defrost`, `time_limit`, `img_product`) VALUES
(1, NULL, '', '00:00:00', '00:00:00', 'IMG-63e5d8e2abbb58.93134868.jpg'),
(2, NULL, 'fg', '05:00:00', '04:00:00', 'IMG-63e810be75ab91.43379258.jpg'),
(3, NULL, 'sfsdfd', '01:00:00', '01:00:00', 'IMG-63e810e54b2ba7.82728848.jpg'),
(4, NULL, 'tomate sechees', '04:00:00', '02:00:00', 'IMG-63ef1be46eee58.45453361.jpg'),
(5, NULL, 'cookies', '01:00:00', '48:00:00', 'IMG-63f418ea944ce5.49262953.jpg'),
(9, NULL, 'Lettuce', '72:00:00', '01:00:00', 'IMG-63ffe8b83284a7.01330546.jpg'),
(10, NULL, 'Spinach', '72:00:00', '01:00:00', 'IMG-63ffed0d97ca71.49913542.jpg'),
(11, NULL, 'Onions', '168:00:00', '24:00:00', 'IMG-63ffee06aab678.70877151.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `relation_product_category`
--

CREATE TABLE `relation_product_category` (
  `id_relation` int(3) NOT NULL,
  `id_product` int(3) NOT NULL,
  `id_category` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relation_product_category`
--

INSERT INTO `relation_product_category` (`id_relation`, `id_product`, `id_category`) VALUES
(4, 9, 1),
(5, 10, 1),
(6, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `name_user` varchar(20) NOT NULL,
  `name_full` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `pwd` varchar(240) NOT NULL,
  `registration_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `login_att` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `name_full`, `email`, `pwd`, `registration_date`, `status`, `login_att`) VALUES
(1, 'house_admin', 'admnistrator', 'admin@admin.com', '$2y$10$p1FBfDvmqwNhPu9sZ9QxtuMXlNW4EHAo14IMuw0DQF/GKGudwRt3.', '2023-01-27', 1, 0),
(2, 'adminadmin', 'admin', 'quemeocruz@gmail.com', '$2y$10$in27B3o6m/86CPOiqRv2TuUiCbntOtgwwcEobmKP.bdJcFbDe/4qW', '2023-02-01', 2, 0),
(3, 'rickyboy', 'ricky de la horta', 'delahortaservices@hotmail.com', '$2y$10$3KIbAxrjPOGrUc.xjy/4a.m918j7quyw77Bwg7lUMtXLvusFIrarW', '2023-02-01', 1, 0),
(4, 'johncash', 'John Bonham Cash', 'johncash@gmail.com', '$2y$10$tO7.H.Twrr7EFTepBkrtIeuauFHhMPJYzS23SWZs9EvDLGyHDrlri', '2023-03-07', 1, 0),
(5, 'sfdgedrgh', 'fdgfd fggfhgf', 'dgfd@gmail.com', '$2y$10$SdNXU2I6Xl8RVGbToeM9ae.RYGtGTs0FVtZllqZ45uTrfLYIpBj6a', '2023-03-07', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `relation_product_category`
--
ALTER TABLE `relation_product_category`
  ADD PRIMARY KEY (`id_relation`),
  ADD KEY `id_article` (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `name_full` (`name_full`),
  ADD UNIQUE KEY `name_user` (`name_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `relation_product_category`
--
ALTER TABLE `relation_product_category`
  MODIFY `id_relation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `relation_product_category`
--
ALTER TABLE `relation_product_category`
  ADD CONSTRAINT `relation_product_category_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_product_category_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
