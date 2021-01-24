-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 02:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Kebab'),
(3, 'Burger'),
(4, 'MInuman');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `pesanan` text NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `nama`, `alamat`, `no_hp`, `pesanan`, `total`) VALUES
(11, 'abu sofyan', 'depok', '021823868176', '          [{\"product\":\"Burger\",\"qty\":3,\"sub-total\":60000},{\"product\":\"Burger 2\",\"qty\":1,\"sub-total\":45000}]      ', '105000'),
(37, 'alif', 'depok', '081266669098', '          [{\"product\":\"Burger 3\",\"qty\":1,\"sub-total\":50000},{\"product\":\"Kebab\",\"qty\":1,\"sub-total\":35000},{\"product\":\"Fanta\",\"qty\":1,\"sub-total\":5000}]      ', '90000'),
(38, 'arden', 'depok', '08122334433', '          [{\"product\":\"Burger 3\",\"qty\":1,\"sub-total\":50000},{\"product\":\"Burger 8\",\"qty\":1,\"sub-total\":45000}]      ', '95000'),
(39, 'Alif', 'Jalan pamaan no.23 (kosan Ipenk)\r\nTugu kelapa dua\r\ncimanggis, Depok\r\n16451', '081266669098', '          [{\"product\":\"Burger\",\"qty\":1,\"sub-total\":20000}]      ', '20000'),
(40, 'arden', 'depok', '081112223355', '          [{\"product\":\"Burger\",\"qty\":1,\"sub-total\":20000},{\"product\":\"Burger 7\",\"qty\":1,\"sub-total\":65000},{\"product\":\"Fanta\",\"qty\":1,\"sub-total\":5000}]      ', '90000'),
(41, 'ALIF', 'DEPOK', '021132256', '          [{\"product\":\"Burger Chicken\",\"qty\":1,\"sub-total\":45000}]      ', '45000'),
(42, 'Danilo Fernandes', 'Jalan Pamaan No. 23 Depok', '081245682332', '          [{\"product\":\"Burger 4\",\"qty\":1,\"sub-total\":65000},{\"product\":\"Kebab\",\"qty\":1,\"sub-total\":35000},{\"product\":\"Fanta\",\"qty\":1,\"sub-total\":5000}]      ', '105000'),
(43, 'alif', 'depok', '081266667898', '          [{\"product\":\"Burger 4\",\"qty\":1,\"sub-total\":65000},{\"product\":\"Burger 5\",\"qty\":1,\"sub-total\":45000},{\"product\":\"Fanta\",\"qty\":1,\"sub-total\":5000}]      ', '115000'),
(44, 'alif', 'jjoijoijiojoi', '909', '          [{\"product\":\"Burger 4\",\"qty\":1,\"sub-total\":65000}]      ', '65000'),
(45, 'Danilo Fernandes', 'Jalan Nusantara NO. 69', '0214455786', '          [{\"product\":\"Burger 4\",\"qty\":1,\"sub-total\":65000},{\"product\":\"Kebab\",\"qty\":1,\"sub-total\":35000},{\"product\":\"Fanta\",\"qty\":1,\"sub-total\":5000}]      ', '105000'),
(46, 'abu', 'depok', '109821032830', '          [{\"product\":\"Burger 4\",\"qty\":1,\"sub-total\":65000},{\"product\":\"Kebab\",\"qty\":3,\"sub-total\":105000}]      ', '170000'),
(47, 'asdasd', 'asdasd`19', '008090', '          [{\"product_id\":\"23\",\"product\":\"Burger 4\",\"qty\":2,\"sub-total\":130000},{\"product_id\":\"30\",\"product\":\"Fanta\",\"qty\":3,\"sub-total\":15000}]      ', '145000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
(23, 'Burger 4', 3, 65000, 6, 'enaaak', 'bangeet', 'produck 2.jfif'),
(24, 'Burger 5', 3, 45000, 5, 'ijaaaah', 'yuuumy', 'produck 3.png'),
(28, 'Kebab', 1, 35000, 5, 'Sangat Nikmat', 'nikmat', 'kebab.jfif'),
(30, 'Fanta', 4, 5000, 3, 'Minuman Bersoda', 'Segar', 'SGN0316.jpg'),
(31, 'Burger 2', 3, 35000, 5, 'sangat enak', 'enak', 'produck 2.jfif'),
(32, 'Burger 3', 3, 45000, 2, 'Sangat lezat', 'lezat', 'produck 3.png');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(50) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(31, 'slide 1', 'slide 3.jpg'),
(41, 'slide 2', 'slides 2.jpg'),
(43, 'slide 3', 'slide 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'alif', 'alif@gmail.com', '123'),
(6, 'mhdalifmsdr', 'alifmuhammad30@gmail.com', '671998');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
