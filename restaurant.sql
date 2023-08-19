-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 06:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `id` int(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Coca Colaa', '1.90', 'Classic Coca-Cola flavor', 'coca-cola.jpg'),
(2, 'Pepsi', '1.99', 'Refreshing Pepsi taste', 'pepsi.jpg'),
(3, 'Sprite', '1.99', 'Lemon-lime flavor', 'sprite.jpg'),
(4, 'Cappuccino', '2.29', 'A classic espresso drink with frothed milk', 'cappuccino.jpg'),
(5, 'Chai Latte', '2.29', 'A spiced tea latte with a touch of sweetness', 'chai_latte.jpg'),
(6, 'Fanta', '1.99', 'Orange-flavored soda', 'fanta.jpg'),
(7, 'Lipton Iced Tea', '2.49', 'Classic iced tea flavor', 'lipton_iced_tea.jpg'),
(8, 'Mocha Frappuccino', '2.49', 'A blended coffee drink with chocolate and whipped cream', 'mocha_frappuccino.jpg'),
(9, 'Arizona Iced Tea', '2.99', 'Variety of flavors', 'arizona_iced_tea.jpg'),
(10, 'Pumpkin Spice Latte', '2.99', 'A fall favorite with warm spices and pumpkin flavor', 'pumpkin_spice_latte.jpg'),
(11, 'Gatorade', '2.49', 'Sports drink for hydration', 'gatorade.jpg'),
(12, 'Powerade', '2.49', 'Sports drink with electrolytes', 'powerade.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favorites_products`
--

CREATE TABLE `favorites_products` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Spaghetti Bolognese', '12.95', 'Classic Italian pasta dish with meaty tomato sauce', 'spaghetti_bolognese1.jpg'),
(2, 'Chicken Curry', '9.99', 'Tender chicken in a creamy curry sauce', 'chicken_curry.jpg'),
(3, 'Steak Frites', '16.99', 'Grilled steak served with crispy fries', 'steak_frites.jpg'),
(4, 'Fish and Chips', '8.99', 'Crispy battered fish with thick-cut chips', 'fish_and_chips.jpg'),
(5, 'Caesar Salad', '7.99', 'Fresh romaine lettuce, croutons, and creamy Caesar dressing', 'caesar_salad.jpg'),
(6, 'Beef Burger', '10.99', 'Juicy beef patty with lettuce, tomato, and cheese', 'beef_burger.jpg'),
(7, 'Margherita Pizza', '11.99', 'Classic pizza with tomato sauce, mozzarella, and basil', 'margherita_pizza.jpg'),
(8, 'Fettuccine Alfredo', '13.99', 'Creamy pasta with Parmesan cheese and garlic', 'fettuccine_alfredo.jpg'),
(9, 'Beef Stew', '12.99', 'Slow-cooked beef with root vegetables in a rich broth', 'beef_stew.jpg'),
(10, 'Pad Thai', '11.99', 'Thai stir-fried noodles with peanuts, vegetables, and shrimp', 'pad_thai.jpg'),
(11, 'Taco Salad', '8.99', 'Crunchy salad with seasoned ground beef, tomatoes, and avocado', 'taco_salad.jpg'),
(12, 'Veggie Burger', '9.99', 'Plant-based patty with lettuce, tomato, and avocado', 'veggie_burger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `bdate` date NOT NULL,
  `birth_place` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `religion` varchar(128) NOT NULL,
  `blood_type` varchar(128) NOT NULL,
  `citizenship` varchar(128) NOT NULL,
  `role_id` int(255) NOT NULL,
  `is_active` int(255) NOT NULL,
  `date_created` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `bdate`, `birth_place`, `gender`, `religion`, `blood_type`, `citizenship`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Marco Antonio Senni Koten', 'marco@gmail.com', 'profile.jpg', '$2y$10$HiCvq7Bmrc/IztGRk51LjOt4wUjPm9ZK2E2gbh50qBExprJTMKb6u', '2003-11-03', 'Bogor', 'Male', 'Katholik', 'AB', 'Indonesia', 1, 1, 0),
(2, 'Antonio Born', 'born@gmail.com', 'profile.jpg', '$2y$10$IR8vIrPgttPAqoPhVJhEae71nZ9X3CkBeZwUfHIySJ8HszNtLwaaO', '2003-11-03', 'Bogor', 'Male', 'Katholik', 'AB', 'Indonesia', 2, 1, 0),
(3, 'Rendy Panca Indra', 'rendy@gmail.com', 'default.jpg', '$2y$10$kCEIw6/dWX.AthmD/dWC6eWcLywHQEQc53aVM0GiGPB/5Y0Ws6me.', '2022-12-01', 'Depok', 'Male', 'Muslim', 'O', 'Indonesia', 2, 1, 0),
(4, 'Marco Antonio', 'antonio@gmail.com', 'profile.jpg', '$2y$10$8xFMYZmv0rqXg.6Z3nHEOu2ajai8/lGVDjd0oJ8oczBzngKw6hMNS', '2003-11-03', 'Bogor', 'Male', 'Catholic', 'AB', 'Indonesia', 2, 1, 1671285151),
(5, 'Bossman', 'bossman@gmail.com', 'default.jpg', '$2y$10$L6dYu8VktEjMDbNoAVyPEuoV4Hx10Fgn51Edih7x1fvPecTlQszqq', '2022-12-18', 'Depok', 'Male', 'Muslim', 'AB', 'Indonesia', 2, 1, 1671355669);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(8, 1, 2),
(11, 2, 4),
(12, 2, 3),
(13, 2, 5),
(18, 1, 3),
(19, 1, 4),
(20, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Product');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Food', 'product/food', 'fas fa-fw fa-hamburger', 1),
(5, 3, 'Drink', 'product/drink', 'fas fa-fw fa-coffee', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(8, 3, 'Favorites', 'product/favorites', 'fas fa-fw fa-star', 1),
(9, 1, 'Manage Drink', 'admin/drink', 'fas fa-fw fa-coffee', 1),
(10, 1, 'Manage Food', 'admin/food', 'fas fa-fw fa-hamburger', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites_products`
--
ALTER TABLE `favorites_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `favorites_products`
--
ALTER TABLE `favorites_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
