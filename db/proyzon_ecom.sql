-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 11:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyzon_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `sid` int(11) NOT NULL,
  `Address_ID` varchar(32) NOT NULL,
  `Customer_ID` varchar(32) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Address_1` varchar(300) NOT NULL,
  `Address_2` varchar(300) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `Zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`sid`, `Address_ID`, `Customer_ID`, `Name`, `Phone_No`, `Address_1`, `Address_2`, `Country`, `city`, `Zip`) VALUES
(1, 'ADD865715', '', 'Sumi Akter', '01621432427', 'Mirpur-12', '', 'Bangladesh', 'Dhaka', 1207),
(2, 'ADD273331', 'noman', 'Abul kalam Azad', '3453245324', 'Feni', '', 'Bangladesh', 'Feni', 3900),
(3, 'ADD372139', 'noman', '', '', '', '', '', '', 0),
(4, 'ADD5310', 'azad', 'Noman', '6534563456', 'Mohammadpur', '', 'Bangladesh', 'Dhaka', 1207),
(5, 'ADD459323', 'rony11', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_icon` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_icon`) VALUES
(3, 'T-Shart', 'fal fa-tshirt'),
(4, 'Mobile', 'fas fa-mobile-alt'),
(5, 'Leptop', 'fas fa-laptop');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sid` int(11) NOT NULL,
  `order_id` varchar(55) NOT NULL,
  `customer_id` varchar(55) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `address_id` varchar(55) NOT NULL,
  `discount` float NOT NULL,
  `payment` float NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sid`, `order_id`, `customer_id`, `order_date`, `delivery_date`, `address_id`, `discount`, `payment`, `status`) VALUES
(1, 'TUE03112166', 'noman', '2021-11-16', '0000-00-00', 'dhaka', 0, 0, 1),
(2, 'TUE00112149', 'noman', '2021-11-16', '0000-00-00', 'dhaka', 0, 0, 0),
(3, 'TUE44112117', 'noman', '2021-11-16', '0000-00-00', 'dhaka', 0, 0, 0),
(4, 'TUE411121758', 'noman', '2021-11-16', '0000-00-00', 'dhaka', 0, 0, 3),
(5, 'FRI161121385', 'noman', '2021-11-19', '0000-00-00', 'dhaka', 0, 0, 1),
(6, 'SAT381121489', 'azad', '2021-11-20', '0000-00-00', 'gdfgsfdg', 0, 0, 4),
(7, 'TUE051121458', 'sumi1122', '2021-11-23', '0000-00-00', 'Dhaka', 0, 0, 2),
(8, 'WED401221413', 'rony11', '2021-12-01', '0000-00-00', 'dhaka', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `sid` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`sid`, `order_id`, `product_id`, `unit_price`, `quantity`) VALUES
(1, 'TUE03112166', '4', 200, 1),
(2, 'TUE03112166', '6', 2000, 1),
(3, 'TUE00112149', '3', 215, 1),
(4, 'TUE44112117', '6', 2000, 1),
(5, 'TUE411121758', '3', 215, 1),
(6, 'FRI161121385', '3', 215, 1),
(7, 'SAT381121489', '9', 2200, 1),
(8, 'TUE051121458', '5', 5000, 1),
(9, 'WED401221413', '9', 2200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `Product_Code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_stock` varchar(55) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `p_current_price` varchar(55) NOT NULL,
  `p_previous_price` varchar(55) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `Product_Code`, `product_name`, `product_category`, `product_stock`, `product_description`, `product_image`, `p_current_price`, `p_previous_price`, `tags`, `brand`) VALUES
(3, '', 'Cotton Full Sleeve', '3', '5', '<p>Cotton Full Sleeve</p>', '1.jpg', '215', '240', 'Cotton', 'Proyzon'),
(4, '', 'Sleeve T-Shirt', '3', '5', '<p>Full Sleeve T-Shirt</p>', 'mens-knit-full-sleeve-t-shirt-500x500.png', '200', '235', 'T-Shirt', 'proyzon'),
(5, '', 'Z93 Mobile Phone', '4', '3', '<p>Lava Z93 Mobile Phone</p>', 'eyesImg.png', '5000', '5500', 'Mobile', 'proyzon'),
(6, '', 'Mobile', '4', '4', '<p>Nokia Mobile</p>', 'Nokia-6310-Dark-Green-300x300.jpg', '2000', '2300', 'Mobile', 'proyzon'),
(9, 'PR2021607834', 'Winter Jacket', '3', '1', '<p>Winter Jacket for Man</p>', 'e2b3603ac6180a2b7e899f02d2177003.jpg', '2200', '2500', 'T-Shirt', 'proyzon');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `refer_id` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `username`, `phone`, `email`, `refer_id`, `address`, `password`, `profile_image`) VALUES
(5, 'boss', '45645634', 'boss@gmail.com', '4321', 'Dhaka', '827ccb0eea8a706c4c34a16891f84e7b', 'logo1.PNG'),
(7, 'noman123', '6456436345', 'noman@gmail.com', '655456', 'dhaka', '912ec803b2ce49e4a541068d495ab570', '250190276_10114027736889621_5091613826737603263_n.jpg'),
(8, 'boss1', '01621432427', 'boss@gmail.com', '1234567', 'Dhaka , Mirpur', 'e10adc3949ba59abbe56e057f20f883e', 'ow7OmE-happy-person-cut-out-pic.png'),
(9, 'tanvir', '01729789114', 'tanvir@gmail.com', 'numan123', 'dhaka', 'e10adc3949ba59abbe56e057f20f883e', 'profile.png'),
(10, 'azad', '01729789114', 'ddddr@gmail.com', 'numan123', 'gdfgsfdg', '202cb962ac59075b964b07152d234b70', 'profile.png'),
(11, 'noman', '01858788346', 'noman@gmail.com', 'noman', 'dhaka', '202cb962ac59075b964b07152d234b70', 'ttsdgfsd.jpg'),
(12, 'sumi', '574645674576', 'sumi@gmail.com', '34534', 'Mirpur-12', '81dc9bdb52d04dc20036dbd8313ed055', 'noman.jpg'),
(13, 'azad', '5674564756', 'azad@gmail.com', '1234', 'Mirpur', '202cb962ac59075b964b07152d234b70', 'WhatsApp Image 2021-11-19 at 11.54.09 PM.jpeg'),
(14, 'noman12345', '57645764567', 'boss@gmail.com', '567456', 'feni', 'f8043d05bf92e75ed07977cecc73485b', 'egenerationit-icn.png'),
(15, 'sumi1122', '64564356', 'h@gmail.com', 'hgdfh', 'Dhaka', 'd5fb8d381bd175b2014d29152e4cdfe0', 'egenerationit-icn.png'),
(16, 'rony11', '67856785678', 'sda@gmail.com', 'noman', 'dhaka', '839894fbffd15221196190eceafd49d2', '136384139_230675511948938_8155022996066112280_n.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
