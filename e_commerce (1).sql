-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 08:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(101) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `mail` varchar(101) NOT NULL,
  `password` varchar(101) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `mobile`, `mail`, `password`, `type`, `status`) VALUES
(1, 'Tushar Pandita', '9650086655', 'tpdesk1@gmail.com', '1233', 'Operator', '1'),
(17, 'Sid', '9788856435', 'sid@admin.com', '1234', 'Operator', '1'),
(37, 'admin', '9898998898', 'admin@admin.com', '1234', 'Operator', '1');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(101) NOT NULL,
  `cat_id` varchar(101) NOT NULL,
  `picture` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`, `cat_id`, `picture`) VALUES
(15, 'Acer', '8', 'Acer.png'),
(16, 'Indian Terrain', '9', 'Indian Terrain.jpg'),
(17, 'Nike', '9', 'Nike.jpg'),
(18, 'Flying Machine', '9', 'Flying Machine.jpg'),
(19, 'Apple', '8', 'Apple.jpg'),
(20, 'HP', '8', 'HP.jpg'),
(21, 'Dell', '8', 'Dell.jpg'),
(22, 'Nike', '10', 'Nike.jpg'),
(23, 'Puma', '10', 'Puma.png'),
(24, 'Clarks', '10', 'Clarks.jpg'),
(25, 'Vans', '10', 'Vans.jpg'),
(26, 'Superdry', '9', 'Superdry.png'),
(27, 'Sony', '8', 'Sony.png'),
(28, 'Boat', '8', 'Boat.jpg'),
(29, 'OnePlus', '8', 'OnePlus.png'),
(32, 'tets', '14', 'tets.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `user_id` varchar(101) NOT NULL,
  `product_id` varchar(101) NOT NULL,
  `product_qty` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `user_id`, `product_id`, `product_qty`) VALUES
(117, '4', '21', '2'),
(118, '4', '19', '2'),
(137, '3', '15', '2'),
(139, '3', '20', '1'),
(140, '3', '25', '1'),
(141, '3', '24', '1'),
(142, '3', '23', '1'),
(143, '3', '22', '1'),
(144, '3', '23', '1'),
(145, '', '23', '1'),
(146, '', '23', '1'),
(147, '', '24', '1'),
(148, '', '24', '1'),
(149, '', '25', '1'),
(150, '4', '22', '1'),
(151, '4', '24', '1'),
(152, '4', '23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(51) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `status`) VALUES
(8, 'Electronics', 1),
(9, 'Clothing', 1),
(10, 'Footwear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_order`
--

CREATE TABLE `master_order` (
  `master_oid` int(11) NOT NULL,
  `u_id` varchar(101) NOT NULL,
  `total_cost` varchar(101) NOT NULL,
  `address` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_order`
--

INSERT INTO `master_order` (`master_oid`, `u_id`, `total_cost`, `address`) VALUES
(46, '3', '3000', '1'),
(48, '3', '800', '3'),
(49, '4', '800', '4'),
(50, '4', '39000', '4'),
(51, '4', '3000', '4'),
(52, '4', '7500', '4'),
(53, '4', '170000', '4'),
(54, '4', '10000', '4'),
(55, '4', '10000', '4'),
(56, '4', '10000', '4'),
(57, '4', '10000', '4'),
(58, '4', '10000', '4'),
(59, '4', '10000', '4'),
(60, '4', '10000', '4'),
(61, '4', '10000', '4'),
(62, '4', '170550', '4'),
(63, '4', '10550', '4'),
(64, '4', '172050', '4'),
(65, '4', '800', '4');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `master_id` varchar(101) NOT NULL,
  `pid` varchar(101) NOT NULL,
  `p_qty` varchar(101) NOT NULL,
  `uid` varchar(101) NOT NULL,
  `transaction_id` varchar(101) NOT NULL,
  `o_cost` varchar(101) NOT NULL,
  `order_status` varchar(101) NOT NULL,
  `o_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `master_id`, `pid`, `p_qty`, `uid`, `transaction_id`, `o_cost`, `order_status`, `o_date`) VALUES
(144, '49', '23', '2', '4', 'test_trans12', '800', 'Accepted', '2023-05-24'),
(145, '50', '17', '3', '4', 'test__\"', '39000', 'Accepted', '2023-05-24'),
(146, '51', '25', '1', '4', 'test22t', '3000', 'Delivered', '2023-05-24'),
(147, '52', '24', '5', '4', 'test_12e12', '7500', 'Accepted', '2023-05-25'),
(148, '53', '21', '2', '4', 'tests_12312', '10000', 'Accepted', '2023-05-25'),
(149, '53', '19', '2', '4', 'tests_12312', '160000', 'Accepted', '2023-05-25'),
(150, '54', '21', '2', '4', 'tetst_+2312', '10000', 'Accepted', '2023-05-25'),
(151, '55', '21', '2', '4', 'test_127635127', '10000', 'Accepted', '2023-05-25'),
(152, '56', '21', '2', '4', 'test_cascas', '10000', 'Accepted', '2023-05-25'),
(153, '57', '21', '2', '4', 'test2121', '10000', 'Accepted', '2023-05-25'),
(154, '58', '21', '2', '4', 'dwedqwd__test', '10000', 'Accepted', '2023-05-25'),
(155, '59', '21', '2', '4', 'scdcsdcsdc_testst', '10000', 'Accepted', '2023-05-25'),
(156, '60', '21', '2', '4', 'tetststas_+\"312312', '10000', 'Accepted', '2023-05-25'),
(157, '61', '21', '2', '4', 'anotjhretzes', '10000', 'Accepted', '2023-05-25'),
(158, '62', '21', '2', '4', '12312310897', '10000', 'Accepted', '2023-05-25'),
(159, '62', '19', '2', '4', '12312310897', '160000', 'Accepted', '2023-05-25'),
(160, '62', '22', '1', '4', '12312310897', '550', 'Accepted', '2023-05-25'),
(161, '63', '21', '2', '4', 'test', '10000', 'Shipped', '2023-05-25'),
(162, '63', '19', '2', '4', 'test', '160000', 'Cancelled', '2023-05-25'),
(163, '63', '22', '1', '4', 'test', '550', 'In Progress', '2023-05-25'),
(164, '64', '21', '2', '4', 'test123', '10000', 'Accepted', '2023-05-26'),
(165, '64', '19', '2', '4', 'test123', '160000', 'Accepted', '2023-05-26'),
(166, '64', '22', '1', '4', 'test123', '550', 'Accepted', '2023-05-26'),
(167, '64', '24', '1', '4', 'test123', '1500', 'Accepted', '2023-05-26'),
(168, '65', '23', '2', '4', 'ssewx', '800', 'In Progress', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `o_id` varchar(101) NOT NULL,
  `u_id` varchar(101) NOT NULL,
  `payment_status` varchar(101) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `o_id`, `u_id`, `payment_status`, `payment_date`) VALUES
(225, '129', '3', '1', '2023-05-15'),
(226, '130', '3', '1', '2023-05-15'),
(227, '131', '3', '1', '2023-05-15'),
(228, '132', '3', '1', '2023-05-15'),
(229, '133', '3', '1', '2023-05-15'),
(230, '134', '3', '1', '2023-05-15'),
(231, '135', '3', '1', '2023-05-15'),
(232, '136', '3', '1', '2023-05-15'),
(233, '137', '3', '1', '2023-05-15'),
(234, '138', '3', '1', '2023-05-16'),
(235, '139', '3', '1', '2023-05-16'),
(236, '140', '3', '1', '2023-05-16'),
(237, '141', '3', '1', '2023-05-16'),
(238, '142', '3', '1', '2023-05-16'),
(239, '143', '3', '1', '2023-05-16'),
(240, '144', '4', '1', '2023-05-24'),
(241, '145', '4', '1', '2023-05-24'),
(242, '146', '4', '1', '2023-05-24'),
(243, '147', '4', '1', '2023-05-25'),
(244, '148', '4', '1', '2023-05-25'),
(245, '149', '4', '1', '2023-05-25'),
(246, '150', '4', '1', '2023-05-25'),
(247, '151', '4', '1', '2023-05-25'),
(248, '152', '4', '1', '2023-05-25'),
(249, '153', '4', '1', '2023-05-25'),
(250, '154', '4', '1', '2023-05-25'),
(251, '155', '4', '1', '2023-05-25'),
(252, '156', '4', '1', '2023-05-25'),
(253, '157', '4', '1', '2023-05-25'),
(254, '158', '4', '1', '2023-05-25'),
(255, '159', '4', '1', '2023-05-25'),
(256, '160', '4', '1', '2023-05-25'),
(257, '161', '4', '1', '2023-05-25'),
(258, '162', '4', '1', '2023-05-25'),
(259, '163', '4', '1', '2023-05-25'),
(260, '164', '4', '1', '2023-05-26'),
(261, '165', '4', '1', '2023-05-26'),
(262, '166', '4', '1', '2023-05-26'),
(263, '167', '4', '1', '2023-05-26'),
(264, '168', '4', '1', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `pid` int(11) NOT NULL,
  `p_name` varchar(101) NOT NULL,
  `product_brand` varchar(101) NOT NULL,
  `detail` varchar(201) NOT NULL,
  `product_category` varchar(101) NOT NULL,
  `product_sub_category` varchar(101) NOT NULL,
  `code` varchar(101) NOT NULL,
  `cost` varchar(101) NOT NULL,
  `p_status` varchar(2) NOT NULL,
  `pic1` varchar(101) NOT NULL,
  `pic2` varchar(101) NOT NULL,
  `pic3` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`pid`, `p_name`, `product_brand`, `detail`, `product_category`, `product_sub_category`, `code`, `cost`, `p_status`, `pic1`, `pic2`, `pic3`) VALUES
(15, 'Bravia', '27', 'New SONY Bravia OLED TV', '8 ', '10', '1', '25000', '1', 'Bravia.jpg', 'Bravia2.jpg', 'Bravia3.jpg'),
(17, 'Air Pods Pro', '19', 'Brand new Apple Air Pods Pro', '8 ', '12', '2', '13000', '1', 'Air Pods Pro.jpg', 'Air Pods Pro2.png', 'Air Pods Pro3.jpg'),
(18, 'Air Force1', '22', 'New NIKE AIR Force 1s', '10 ', '14', '3', '6500', '1', 'Air Force1.jpg', 'Air Force12.jpg', 'Air Force13.jpg'),
(19, 'IPhone 14 ', '19', 'Apple Iphone 14 with new Features', '8 ', '11', '4', '80000', '1', 'IPhone 14 .jpg', 'IPhone 14 2.jpg', 'IPhone 14 3.jpg'),
(20, 'Boat Headset 131', '28', 'New surround system head phones', '8 ', '17', '5', '2000', '1', 'Boat Headset 131.jpg', 'Boat Headset 1312.jpg', 'Boat Headset 1313.jpg'),
(21, 'Loafers -10', '24', 'Comfortable Loafers for men , For casual and formal use', '10 ', '13', '5', '5000', '1', 'Loafers -10.jpg', 'Loafers -102.jpg', 'Loafers -103.jpg'),
(22, 'BOAT g-6', '28', 'All New BOAT g-6 with inbuilt mic', '8 ', '12', '7', '550', '1', 'BOAT g-6.jpg', 'BOAT g-62.jpg', 'BOAT g-63.jpg'),
(23, 'Mona lisa t-shirt', '18', 'Mona lisa t-shirt with sticker resistance', '9 ', '7', '8', '400', '1', 'Mona lisa t-shirt.jpg', 'Mona lisa t-shirt2.jpg', 'Mona lisa t-shirt3.webp'),
(24, 'Apple Earphones', '19', 'Apple Earphoneswith 3.5mm jack', '8 ', '12', '9', '1500', '1', 'Apple Earphones.jpg', 'Apple Earphones2.jpg', 'Apple Earphones3.jpg'),
(25, 'Nord 4 Charger', '29', 'OnePlus Nord 4 Charger ', '8 ', '18', '10', '3000', '1', 'Nord 4 Charger.jpg', 'Nord 4 Charger2.jpg', 'Nord 4 Charger3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_orders`
--

CREATE TABLE `rejected_orders` (
  `rid` int(11) NOT NULL,
  `r_oid` varchar(101) NOT NULL,
  `action` varchar(50) NOT NULL,
  `reason` varchar(101) NOT NULL,
  `approval` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejected_orders`
--

INSERT INTO `rejected_orders` (`rid`, `r_oid`, `action`, `reason`, `approval`) VALUES
(7, '129', 'Cancel', 'I dont need TV now that i bought iphone\r\n', 'Approved'),
(8, '130', 'Cancel', 'Dont need anymore', 'Approved'),
(9, '131', 'Cancel', 'vsdvsdvwsvs', 'Approved'),
(10, '132', 'Cancel', 'csdc', 'Approved'),
(11, '133', 'Cancel', ' wd we', 'Approved'),
(12, '134', 'Cancel', 'cvcwcwe', 'Approved'),
(13, '135', 'Cancel', 'cwecec', 'Approved'),
(14, '136', 'Cancel', 'e12e12e', 'Approved'),
(15, '137', 'Cancel', 'vsdvsdv', 'Approved'),
(16, '138', 'Cancel', 'fwefwe', 'Approved'),
(17, '139', 'Cancel', 'dont need any', 'Approved'),
(18, '140', 'Cancel', 'i dont want the product\r\n', 'Denied'),
(19, '141', 'Cancel', 'just for testing\r\n', 'Denied'),
(20, '142', 'Cancel', 'testing', 'Approved'),
(21, '163', 'Cancel', 'i dont want the product anymore\r\n', 'Denied'),
(22, '162', 'Cancel', 'dont want it\r\n', 'Approved'),
(23, '144', 'Cancel', 'svdvsv', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stock_purchase`
--

CREATE TABLE `stock_purchase` (
  `sid` int(11) NOT NULL,
  `pid` varchar(101) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `mrp` varchar(101) NOT NULL,
  `cost` varchar(101) NOT NULL,
  `product_qty` varchar(101) NOT NULL,
  `total_cost` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_purchase`
--

INSERT INTO `stock_purchase` (`sid`, `pid`, `date_of_purchase`, `mrp`, `cost`, `product_qty`, `total_cost`) VALUES
(9, '23', '2023-05-23', '15000', '13000', '18', '286000'),
(10, '21', '2023-05-23', '15000', '13000', '18', '286000'),
(11, '20', '2023-05-23', '15000', '2000', '18', '46000'),
(12, '18', '2023-05-26', '15000', '6500', '18', '299000'),
(13, '19', '2023-05-23', '15000', '80000', '18', '2400000'),
(20, '23', '2023-05-25', '600', '400', '18', '8000'),
(21, '23', '2023-05-25', '600', '400', '18', '8000'),
(22, '24', '2023-05-25', '15000', '13000', '18', '325000');

-- --------------------------------------------------------

--
-- Table structure for table `stock_receipts`
--

CREATE TABLE `stock_receipts` (
  `sr_id` int(11) NOT NULL,
  `sid` int(101) NOT NULL,
  `pid` int(101) NOT NULL,
  `p_qty` int(101) NOT NULL,
  `t_cost` int(101) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_receipts`
--

INSERT INTO `stock_receipts` (`sr_id`, `sid`, `pid`, `p_qty`, `t_cost`, `date`) VALUES
(1, 8, 17, 25, 325000, '2023-05-24'),
(7, 8, 17, 9, 117000, '2023-05-25'),
(9, 11, 20, 3, 6000, '2023-05-25'),
(10, 13, 19, 8, 640000, '2023-05-25'),
(11, 20, 23, 20, 8000, '2023-05-25'),
(12, 22, 24, 25, 325000, '2023-05-25'),
(13, 8, 17, 20, 260000, '2023-05-23'),
(14, 12, 18, 20, 130000, '2023-05-23'),
(15, 12, 18, 6, 39000, '2023-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sc_id` int(11) NOT NULL,
  `s_name` varchar(101) NOT NULL,
  `s_status` varchar(2) NOT NULL,
  `cat_id` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sc_id`, `s_name`, `s_status`, `cat_id`) VALUES
(7, 'T-Shirts', '1', 9),
(9, 'jeans', '1', 9),
(10, 'Television', '1', 8),
(11, 'Mobile Phones', '1', 8),
(12, 'Earphones', '1', 8),
(13, 'Loafers', '1', 10),
(14, 'Sneakers', '1', 10),
(15, 'Basketball Shoes', '1', 10),
(16, 'Shirts', '1', 9),
(17, 'Headphones', '1', 8),
(18, 'Charger', '1', 8),
(19, 'puma', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `u_name` varchar(101) NOT NULL,
  `u_country` varchar(101) NOT NULL,
  `u_address` varchar(101) NOT NULL,
  `u_mobile` varchar(13) NOT NULL,
  `u_mail` varchar(101) NOT NULL,
  `u_password` varchar(101) NOT NULL,
  `u_status` int(2) NOT NULL,
  `dp` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `u_name`, `u_country`, `u_address`, `u_mobile`, `u_mail`, `u_password`, `u_status`, `dp`) VALUES
(3, 'Tushar', 'india', 'new delhi', '9876543211', 'test@t.com', '1233', 1, 'wallpaperflare.com_wallpaper (5).jpg'),
(4, 'teri', '', '', '1223122312', 'teri@test.com', '121223', 1, 'acewp.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_address_book`
--

CREATE TABLE `user_address_book` (
  `u_aid` int(11) NOT NULL,
  `u_id` varchar(101) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `address` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address_book`
--

INSERT INTO `user_address_book` (`u_aid`, `u_id`, `city`, `state`, `address`) VALUES
(1, '3', 'Delhi', 'Delhi', 'rohini sec 10 , abc vihar , lane 4'),
(2, '3', 'Roshanpura ', 'Delhi', 'abc village, xyz ,  lane 5 ,  house no 203'),
(3, '3', 'Najafgarh', 'Delhi', 'Deenpur , Najafgarh, NewDelhi'),
(4, '4', 'Rohini', 'Delhi', 'test address , lane x , abcxyz'),
(5, '4', 'Rohilapur', 'Delhi', 'abx cascasc\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `master_order`
--
ALTER TABLE `master_order`
  ADD PRIMARY KEY (`master_oid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `rejected_orders`
--
ALTER TABLE `rejected_orders`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `stock_purchase`
--
ALTER TABLE `stock_purchase`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `stock_receipts`
--
ALTER TABLE `stock_receipts`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_address_book`
--
ALTER TABLE `user_address_book`
  ADD PRIMARY KEY (`u_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_order`
--
ALTER TABLE `master_order`
  MODIFY `master_oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rejected_orders`
--
ALTER TABLE `rejected_orders`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stock_purchase`
--
ALTER TABLE `stock_purchase`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stock_receipts`
--
ALTER TABLE `stock_receipts`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_address_book`
--
ALTER TABLE `user_address_book`
  MODIFY `u_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
