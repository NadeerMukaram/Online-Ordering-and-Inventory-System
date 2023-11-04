-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2021 at 11:05 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i7685129_wp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(11) NOT NULL,
  `aname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `company` varchar(40) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `aname`, `surname`, `company`, `position`, `branch_id`, `address`, `contact_no`, `email`, `password`) VALUES
(7, 'Sample', 'surname', 'samplecompany', 'sampleposition', 1, 'Recodo', '09557653775', 'sample@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `bname`, `location`) VALUES
(1, 'ExampleStore', 'Example city'),
(2, 'Mini-mart', 'Tungawan '),
(3, 'todelete', 'recodo zc');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `prod_id`, `qty`, `total`, `status`) VALUES
(694, '67', 68, 1, 250, 'cart'),
(695, '67', 63, 1, 51, 'cart'),
(696, '67', 60, 1, 250, 'cart'),
(716, '71', 57, 1, 151, 'cart'),
(753, '144', 60, 2, 500, 'cart'),
(755, '75', 59, 1, 85, 'cart'),
(756, '75', 63, 1, 51, 'cart'),
(765, '79', 100, 1, 100, 'cart'),
(766, '79', 60, 1, 250, 'cart'),
(767, '90', 60, 2, 250, 'cart'),
(773, '92', 62, 1, 179, 'cart'),
(774, '92', 57, 2, 301, 'cart'),
(775, '92', 75, 1, 500, 'cart'),
(776, '92', 72, 1, 150, 'cart'),
(777, '92', 65, 9, 80, 'cart'),
(780, '136', 127, 1, 500, 'cart'),
(781, '142', 74, 3, 299, 'cart'),
(782, '150', 63, 4, 203, 'cart'),
(783, '131', 59, 1, 85, 'cart'),
(793, '128', 64, 4, 150, 'cart'),
(794, '128', 60, 13, 3250, 'cart'),
(795, '128', 59, 10, 85, 'cart'),
(797, '205', 57, 1, 151, 'cart'),
(800, '161', 60, 1, 250, 'cart');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cartview`
-- (See below for the actual view)
--
CREATE TABLE `cartview` (
`user_id` int(11)
,`photo` longtext
,`name` varchar(50)
,`prod_id` int(11)
,`qty` int(11)
,`price` float
,`total` int(11)
,`cart_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cartviewnoid`
-- (See below for the actual view)
--
CREATE TABLE `cartviewnoid` (
`user_id` int(11)
,`photo` longtext
,`name` varchar(50)
,`prod_id` int(11)
,`qty` int(11)
,`price` float
,`total` int(11)
,`cart_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `categoryname`) VALUES
(1, 'Food'),
(2, 'Clothing'),
(3, 'Cosmetics'),
(4, 'Beverages');

-- --------------------------------------------------------

--
-- Stand-in structure for view `completeview`
-- (See below for the actual view)
--
CREATE TABLE `completeview` (
`invoice_no` int(11)
,`uname` varchar(40)
,`surname` varchar(50)
,`dateprocess` date
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_record`
--

CREATE TABLE `invoice_record` (
  `invoice_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `dateprocess` date NOT NULL,
  `total` int(11) NOT NULL,
  `amount_rendered` int(11) NOT NULL,
  `amount_change` int(11) NOT NULL,
  `uniquecode` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_record`
--

INSERT INTO `invoice_record` (`invoice_no`, `user_id`, `branch_id`, `dateprocess`, `total`, `amount_rendered`, `amount_change`, `uniquecode`) VALUES
(165, 71, 1, '2021-05-05', 815, 1000, 185, NULL),
(166, 70, 1, '2021-05-06', 50, 100, 50, NULL),
(167, 100, 1, '2021-05-25', 1930, 2000, 70, NULL),
(168, 126, 1, '2021-06-04', 5075, 5075, 0, 'qcy3l4');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `section` varchar(50) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL,
  `datelog` date DEFAULT NULL,
  `datetimelog` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `type`, `section`, `qty`, `details`, `datelog`, `datetimelog`) VALUES
(4, 'updating stocks', 'stocks', 100, 'updating stocks where product-code = hantech-1234 ', '2021-06-06', '2021-06-06 06:48:31'),
(6, 'Updating Units', 'unit', NULL, 'Updated products or units : hantech-104109-Namaste', '2021-06-06', '2021-06-06 07:54:11'),
(7, 'Updating promocode', 'pcode', NULL, 'Promocode Updated , discount amount : 25 ', '2021-06-06', '2021-06-06 07:57:27'),
(8, 'updating category', 'category', NULL, 'category updated id : 9 ', '2021-06-06', '2021-06-06 07:58:48'),
(9, 'Updating Account', 'account', NULL, 'updated account id : 123', '2021-06-06', '2021-06-06 08:00:22'),
(10, 'Deleted accounts', 'account', NULL, 'Deleted account id : 128 ', '2021-06-06', '2021-06-06 18:25:03'),
(11, 'Deleted accounts', 'account', NULL, 'Deleted account id : 128 ', '2021-06-06', '2021-06-06 18:25:30'),
(12, 'Deleted accounts', 'account', NULL, 'Deleted account id : 128 ', '2021-06-06', '2021-06-06 18:25:33'),
(13, 'Deleted accounts', 'account', NULL, 'Deleted account id : 128 ', '2021-06-06', '2021-06-06 18:25:38'),
(14, 'Deleted accounts', 'account', NULL, 'Deleted account id : 130 ', '2021-06-06', '2021-06-06 18:25:53'),
(16, 'Added New Stocks', 'stocks', 20, 'NewlyAdded stocks for  hantech-104109 ', '2021-06-07', '2021-06-07 00:09:02'),
(17, 'Stocking out', 'stocks', 49, 'Reason :  broken ', '2021-06-07', '2021-06-07 00:46:38'),
(18, 'Updating Units', 'unit', NULL, 'Updated products or units : hantech-305175-Sample ', '2021-06-07', '2021-06-07 00:58:50'),
(19, 'Adding new Units', 'unit', NULL, 'adding new products or units in the system ', '2021-06-07', '2021-06-07 01:00:50'),
(20, 'Updating Units', 'unit', NULL, 'Updated products or units : hantech-127615-Beauty ', '2021-06-07', '2021-06-07 15:07:09'),
(21, 'updating stocks', 'stocks', 100, 'Updated stocks product-code = hantech-127615 ', '2021-06-07', '2021-06-07 15:08:07'),
(22, 'updating stocks', 'stocks', 80, 'Updated stocks product-code = hantech-308955 ', '2021-06-07', '2021-06-07 15:09:57'),
(23, 'updating stocks', 'stocks', 80, 'Updated stocks product-code = hantech-311296 ', '2021-06-07', '2021-06-07 15:10:25'),
(24, 'Deleted', 'stocks', NULL, 'Deleted Stock', '2021-06-07', '2021-06-07 15:11:00'),
(25, 'Deleted', 'stocks', NULL, 'Deleted Stock', '2021-06-07', '2021-06-07 15:24:09'),
(26, 'Added New Stocks', 'stocks', 5, 'NewlyAdded stocks for  hantech-104109 ', '2021-06-07', '2021-06-07 15:24:23'),
(27, 'Added New Stocks', 'stocks', 10, 'NewlyAdded stocks for  hantech-104109 ', '2021-06-07', '2021-06-07 15:24:35'),
(28, 'Deleted category', 'category', NULL, 'Deleted category id : 9', '2021-07-14', '2021-07-14 18:22:48'),
(29, 'Adding new Units', 'unit', NULL, 'adding new products or units in the system ', '2021-07-24', '2021-07-24 14:43:14'),
(30, 'Deleting new Units', 'unit', NULL, 'Deleting new products, product id : 130 ', '2021-07-24', '2021-07-24 14:45:29');

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderview`
-- (See below for the actual view)
--
CREATE TABLE `orderview` (
`status` varchar(50)
,`track_id` int(11)
,`user_id` int(11)
,`photo` longtext
,`name` varchar(50)
,`description` varchar(100)
,`price` float
,`total` int(11)
,`dateandtime` datetime
,`datecompleted` date
,`target_date` datetime
,`quantity` int(11)
,`transaction_type` varchar(50)
,`addr` varchar(50)
,`cancelationreason` varchar(50)
,`city` varchar(50)
,`zipcode` varchar(50)
,`invoice_no` int(11)
,`promo_id` int(11)
,`paymentstatus` varchar(50)
,`forcod` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pickup`
-- (See below for the actual view)
--
CREATE TABLE `pickup` (
`user_id` int(11)
,`prod_id` int(11)
,`invoice_no` int(11)
,`track_id` int(11)
,`dateandtime` datetime
,`uname` varchar(40)
,`surname` varchar(50)
,`branch_id` int(11)
,`bname` varchar(50)
,`name` varchar(50)
,`photo` longtext
,`description` varchar(100)
,`price` float
,`quantity` int(11)
,`total` int(11)
,`transaction_type` varchar(50)
,`target_date` datetime
,`Order_accepted` datetime
,`stat_checkout` varchar(50)
,`datecompleted` date
,`status` varchar(50)
,`paymentstatus` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `product_code` varchar(40) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `modified` date NOT NULL,
  `availabitility` varchar(50) NOT NULL,
  `photo` longtext NOT NULL,
  `cat_id` int(11) NOT NULL,
  `standard_or_size` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `brand` varchar(40) DEFAULT NULL,
  `made` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `product_code`, `branch_id`, `name`, `price`, `description`, `modified`, `availabitility`, `photo`, `cat_id`, `standard_or_size`, `weight`, `brand`, `made`) VALUES
(57, 'hantech-47700', 1, 'Beer', 150.5, 'A', '2021-04-16', 'available', '8064-beer.jfif', 4, '-- ', '', '', ''),
(59, 'hantech-350488', 1, 'Tuba', 85, 'Refreshing', '2021-04-15', 'available', '7233-tuba.jfif', 4, NULL, NULL, NULL, NULL),
(60, 'hantech-127615', 1, 'Beauty Blender', 250, 'beautify blenderrer', '2021-04-15', 'available', '8963-s2031565-main-zoom.jpg', 1, '-- ', '', 'Oishi', 'China'),
(61, 'hantech-308955', 1, 'Hotdog', 85.75, 'chicken hot dogs aw', '2021-04-15', 'available', '1734-hotdog.jfif', 1, NULL, NULL, NULL, NULL),
(62, 'hantech-47552', 1, 'emperador w/lime', 179, 'Fundador lite', '2021-04-15', 'available', '7559-mp.jfif', 4, NULL, NULL, NULL, NULL),
(63, 'hantech-33241', 1, 'Tuna flakes', 50.75, 'Good for lumpia and etc', '2021-04-15', 'available', '3567-tuna.jfif', 1, NULL, NULL, NULL, NULL),
(64, 'hantech-378549', 1, 'eyeshader', 150, 'good', '2021-04-15', 'available', '2561-eye.jfif', 3, NULL, NULL, NULL, NULL),
(65, 'hantech-311296', 1, 'Lemonade', 80, 'Fresh refresh', '2021-04-15', 'available', '4736-lemonade.jfif', 4, NULL, NULL, NULL, NULL),
(66, 'hantech-41145', 1, 'Red Kabalyo', 160, 'pulang', '2021-04-15', 'available', '3437-rh.jfif', 1, '-- ', '', '', ''),
(67, 'hantech-361528', 1, 'Wine', 400, 'Store in a cool and dry place', '2021-04-15', 'available', '6610-wine.jfif', 4, NULL, NULL, NULL, NULL),
(68, 'hantech-202482', 1, 'Foundation', 250, 'Good for ugly faces', '2021-04-15', 'available', '8712-foundation.jfif', 3, NULL, NULL, NULL, NULL),
(70, 'hantech-282823', 1, 'Tanduay', 98.75, 'ice', '2021-04-15', 'available', '1707-tanduay ice.jfif', 1, '-- ', '', '', ''),
(71, 'hantech-59637', 1, 'Gummy Bears', 89, 'happy bears', '2021-04-15', 'available', '9799-gb.jfif', 1, NULL, NULL, NULL, NULL),
(72, 'hantech-172059', 1, 'Lotion', 150, 'Make you go burn', '2021-04-15', 'available', '2500-lotion.jfif', 3, NULL, NULL, NULL, NULL),
(73, 'hantech-301696', 1, 'Tang juice', 25.75, 'tanga lng ang naiiwan', '2021-04-15', 'available', '6822-tng.jfif', 4, NULL, NULL, NULL, NULL),
(74, 'hantech-245268', 1, 'smiley', 299, 'yellow', '2021-04-15', 'available', '1235-1.jpg', 1, '--Medium', '', '', ''),
(75, 'hantech-308907', 1, 'S.H.I.E.L.D', 500, 'smile', '2021-04-15', 'available', '4125-2.jfif', 2, '-- ', '', '', ''),
(76, 'hantech-61697', 1, 'Plain', 495, 'blackplain', '2021-04-15', 'available', '5049-men10.jfif', 1, '-- ', '', '', ''),
(77, 'hantech-104109', 1, 'Namaste', 450, 'namnam', '2021-04-15', 'available', '7534-7.jfif', 1, '-- ', '', '', ''),
(78, 'hantech-323111', 1, 'Shorts', 160, 'for men', '2021-04-15', 'available', '7198-88.jfif', 2, NULL, NULL, NULL, NULL),
(79, 'hantech-188849', 1, 'Tiktok shorts', 150, 'for everyone', '2021-04-15', 'available', '7345-55.jfif', 2, NULL, NULL, NULL, NULL),
(80, 'hantech-329910', 1, 'Green short', 450, 'green', '2021-04-15', 'available', '9821-11.jfif', 2, NULL, NULL, NULL, NULL),
(81, 'hantech-335968', 1, 'Tipsy', 499, 'Tipdsy D pepsi', '2021-04-15', 'available', '6217-8.jfif', 2, NULL, NULL, NULL, NULL),
(92, 'hantech-164509', 1, 'Pepe', 450, 'pepe', '2021-04-15', 'available', '8869-men8.jfif', 1, '-- ', '', '', ''),
(98, 'hantech-246286', 1, 'Lipstick', 250.5, 'lip with stick', '2021-04-18', 'available', '6549-lipstc.jfif', 3, NULL, NULL, NULL, NULL),
(99, 'hantech-358214', 1, 'chicharon', 65, 'Mang', '2021-05-09', 'available', '6492-ch.jfif', 1, '-- ', '', '', ''),
(100, 'hantech-305175', 1, 'Sample', 100, 'Sample', '2021-05-25', 'available', '6002-c0f307dd8faa9e460a9cad69b68b261b.jpg', 1, '-- ', '', '', ''),
(116, 'hantech-164535', 1, 'Coca', 25.75, 'Coke', '2021-05-26', 'available', '9743-coke.jfif', 1, '-- ', '', '', ''),
(127, 'hantech-2326161', 1, 'Biko', 500, 'no image', '2021-05-28', 'available', 'th.jfif', 1, '-- ', '', '', ''),
(128, 'hantech-1234', 1, 'New testproduct', 50, 'Producttst', '2021-06-04', 'available', 'th.jfif', 2, '-- ', '', '', ''),
(129, 'hantech-12309444', 1, 'sample', 1000, 'sample', '2021-07-14', 'available', '5077-ee.png', 4, '-- ', '', '', ''),
(130, 'hantech-213211123121', 1, 'Sammy D', 500, 'kaizoku', '2021-08-19', 'available', '3520-ss_logo_icon_001 (2).jpg', 1, '-- ', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `products`
-- (See below for the actual view)
--
CREATE TABLE `products` (
`prod_id` int(11)
,`name` varchar(50)
,`price` float
,`description` varchar(100)
,`stock` int(11)
,`modified` date
,`expiration` date
,`photo` longtext
,`categoryname` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `productstock`
--

CREATE TABLE `productstock` (
  `stock_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `modified` date NOT NULL,
  `expiration` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productstock`
--

INSERT INTO `productstock` (`stock_id`, `prod_id`, `stock`, `modified`, `expiration`) VALUES
(59, 59, 54, '2021-04-15', '2021-04-30'),
(60, 60, 54, '2021-04-15', '0000-00-00'),
(61, 61, 75, '2021-04-15', '2023-06-07'),
(62, 62, 70, '2021-04-15', '2024-12-02'),
(63, 63, 50, '2021-04-15', '2025-02-15'),
(64, 64, 62, '2021-04-15', '2023-10-15'),
(65, 65, 52, '2021-04-15', '2024-10-07'),
(66, 66, 98, '2021-04-15', '2024-11-15'),
(67, 67, 91, '2021-04-15', '2026-06-15'),
(68, 68, 49, '2021-04-15', '0000-00-00'),
(70, 70, 89, '2021-04-15', '2025-05-15'),
(71, 71, 100, '2021-04-15', '2024-05-15'),
(72, 72, 99, '2021-04-15', '2024-10-15'),
(73, 73, 100, '2021-04-15', '2024-06-15'),
(74, 74, 55, '2021-04-15', '0000-00-00'),
(75, 75, 100, '2021-04-15', '0000-00-00'),
(76, 76, 85, '2021-04-15', '0000-00-00'),
(78, 78, -285, '2021-04-15', '0000-00-00'),
(80, 80, 93, '2021-04-15', '0000-00-00'),
(81, 81, 100, '2021-04-15', '0000-00-00'),
(102, 98, 100, '2021-04-18', '2024-06-18'),
(103, 57, 34, '2021-05-03', '0000-00-00'),
(104, 99, 100, '2021-05-09', '2023-06-09'),
(105, 100, 79, '2021-05-25', '2021-05-25'),
(107, 99, 100, '2021-05-25', '2022-07-25'),
(123, 116, 100, '2021-05-26', '2021-09-30'),
(134, 127, 79, '2021-05-28', '0000-00-00'),
(137, 92, 50, '2021-05-28', '0000-00-00'),
(141, 79, -26, '2021-05-28', '0000-00-00'),
(142, 128, 90, '2021-06-04', '0000-00-00'),
(143, 127, 50, '2021-06-06', '0000-00-00'),
(145, 77, -1, '2021-06-07', '2024-10-07'),
(146, 77, 10, '2021-06-07', '2024-10-07'),
(147, 129, 50, '2021-07-14', '2021-07-30'),
(148, 130, 500, '2021-08-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `promo_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL,
  `validity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`promo_id`, `code`, `discount`, `validity`) VALUES
(35, 'H7U0fX', 25, '2021-06-30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `receipt`
-- (See below for the actual view)
--
CREATE TABLE `receipt` (
`user_id` int(11)
,`invoice_no` int(11)
,`stat_checkout` varchar(50)
,`status` varchar(50)
,`name` varchar(50)
,`description` varchar(100)
,`price` float
,`quantity` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `sales_discount`
--

CREATE TABLE `sales_discount` (
  `sal_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_discount`
--

INSERT INTO `sales_discount` (`sal_id`, `amount`) VALUES
(1, '400'),
(2, '5000');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `tempid` int(11) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `datep` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`tempid`, `ipaddress`, `datep`) VALUES
(79, '2001:4455:5c7:8300:780b:2ef5:a674:fcf4', '2021-06-07 14:36:44'),
(78, '110.54.251.14', '2021-06-07 12:40:51'),
(77, '49.146.1.36', '2021-06-07 11:23:04'),
(76, '40.77.188.69', '2021-06-07 10:24:18'),
(75, '2001:4455:302:3d00:d018:87a4:9aac:d092', '2021-06-07 09:59:32'),
(74, '2001:4455:302:3d00:d0ae:d9bb:955a:d54b', '2021-06-07 01:03:50'),
(73, '210.185.171.184', '2021-06-06 21:48:53'),
(69, '66.249.64.174', '2021-06-06 17:09:17'),
(70, '180.191.121.210', '2021-06-06 19:12:43'),
(71, '2001:4455:5c7:8300:ddad:8acf:1f:4004', '2021-06-06 19:22:52'),
(89, '2001:4455:36c:e400:1000:36d1:6246:d725', '2021-06-08 18:05:34'),
(88, '210.185.171.194', '2021-06-08 04:59:13'),
(87, '66.249.64.112', '2021-06-08 02:00:47'),
(86, '66.249.64.178', '2021-06-07 19:46:53'),
(85, '2001:4455:69c:6e00:39b2:86c1:7c30:6efd', '2021-06-07 15:57:06'),
(84, '2a03:2880:20ff:11::face:b00c', '2021-06-07 15:56:51'),
(83, '2a03:2880:20ff:8::face:b00c', '2021-06-07 15:56:49'),
(82, '2a03:2880:20ff:17::face:b00c', '2021-06-07 15:08:55'),
(81, '110.54.218.199', '2021-06-07 14:54:48'),
(80, '180.191.121.23', '2021-06-07 14:49:38'),
(72, '2001:4455:302:3d00:b514:9831:7e11:ebb2', '2021-06-06 20:41:42'),
(68, '40.77.167.101', '2021-06-06 14:23:26'),
(66, '2001:4455:5c7:8300:cce9:47bd:4e2c:29e3', '2021-06-06 14:04:52'),
(67, '2001:4455:302:3d00:9c0d:ed87:e793:758f', '2021-06-06 14:06:01'),
(90, '2001:4455:302:3d00:4402:8f5c:255f:8851', '2021-06-08 19:30:26'),
(91, '202.90.152.68', '2021-06-08 19:30:29'),
(92, '2001:4455:5c7:8300:3d9e:9d32:2154:40c2', '2021-06-08 22:24:25'),
(93, '2001:4455:302:3d00:554:dadc:7c1:f292', '2021-06-09 11:21:56'),
(94, '66.249.66.58', '2021-06-09 22:15:09'),
(95, '51.77.129.165', '2021-06-09 23:51:55'),
(96, '66.249.66.60', '2021-06-10 00:05:15'),
(97, '34.71.20.225', '2021-06-10 05:00:12'),
(98, '40.77.189.193', '2021-06-10 12:40:29'),
(99, '2001:4455:302:3d00:f83c:1548:c74f:ff6f', '2021-06-10 16:18:44'),
(100, '66.249.73.118', '2021-06-10 17:05:06'),
(101, '2001:4455:550:7e00:85ac:7d40:740a:1c7a', '2021-06-11 12:03:23'),
(102, '66.249.73.120', '2021-06-12 00:59:24'),
(103, '66.249.73.3', '2021-06-12 04:10:41'),
(104, '2001:4455:550:7e00:d568:156b:b6c9:cbbc', '2021-06-13 22:04:45'),
(105, '175.176.84.120', '2021-06-13 22:04:48'),
(106, '2001:4455:39a:bb00:607c:6b6f:9388:3b55', '2021-06-14 15:20:50'),
(107, '2001:4455:39a:bb00:34ba:c894:126b:3609', '2021-06-15 18:48:36'),
(108, '66.249.73.29', '2021-06-16 04:20:13'),
(109, '66.249.73.31', '2021-06-16 06:10:28'),
(110, '66.249.73.126', '2021-06-16 07:50:46'),
(111, '2001:4455:39a:bb00:9d6b:2b2a:a5de:95a2', '2021-06-16 17:58:32'),
(112, '40.77.190.199', '2021-06-16 21:22:31'),
(113, '66.249.79.10', '2021-06-16 21:45:37'),
(114, '66.249.79.116', '2021-06-17 04:04:41'),
(115, '66.249.79.118', '2021-06-17 08:49:48'),
(116, '2001:4455:568:9700:3419:6f5:7749:53d0', '2021-06-17 22:35:53'),
(117, '49.149.66.103', '2021-06-18 10:49:37'),
(118, '66.249.73.30', '2021-06-18 23:00:20'),
(119, '66.249.73.98', '2021-06-19 04:02:39'),
(120, '111.7.100.21', '2021-06-19 13:08:37'),
(121, '2001:4455:325:b200:50a3:1784:df88:b391', '2021-06-19 20:09:19'),
(122, '169.47.47.166', '2021-06-19 20:11:09'),
(123, '40.77.189.29', '2021-06-20 04:09:41'),
(124, '2a03:2880:10ff:10::face:b00c', '2021-06-20 14:44:49'),
(125, '157.55.39.96', '2021-06-20 16:58:57'),
(126, '66.249.66.74', '2021-06-20 21:38:35'),
(127, '66.249.66.73', '2021-06-21 07:10:20'),
(128, '111.7.100.23', '2021-06-21 11:37:21'),
(129, '111.7.100.24', '2021-06-21 11:38:08'),
(130, '66.249.66.86', '2021-06-21 18:15:40'),
(131, '2001:4455:325:b200:d9b7:eabb:52ae:4bbd', '2021-06-21 20:12:20'),
(132, '171.13.14.83', '2021-06-22 03:40:12'),
(133, '171.13.14.10', '2021-06-22 03:40:43'),
(134, '2a03:2880:10ff:1b::face:b00c', '2021-06-22 20:38:53'),
(135, '66.249.64.29', '2021-06-22 22:38:57'),
(136, '2001:4455:509:1f00:b861:209e:653d:9ad9', '2021-06-23 11:21:18'),
(137, '66.249.64.7', '2021-06-23 14:47:03'),
(138, '66.249.65.152', '2021-06-23 20:17:00'),
(139, '66.249.65.142', '2021-06-23 23:48:01'),
(140, '66.249.65.151', '2021-06-24 11:26:54'),
(141, '66.249.65.133', '2021-06-24 12:07:04'),
(142, '2001:4455:509:1f00:acaa:ffcf:90f7:50f1', '2021-06-24 14:03:11'),
(143, '66.249.65.154', '2021-06-24 22:39:00'),
(144, '175.176.80.227', '2021-06-25 16:20:20'),
(145, '2001:4455:509:1f00:28b9:b56a:2aeb:fee3', '2021-06-25 16:20:54'),
(146, '2a03:2880:13ff:9::face:b00c', '2021-06-25 16:41:37'),
(147, '66.249.65.139', '2021-06-25 22:03:29'),
(148, '66.249.65.145', '2021-06-26 03:40:58'),
(149, '66.249.65.136', '2021-06-26 14:21:14'),
(150, '2001:4455:509:1f00:9db9:1465:561d:7912', '2021-06-26 17:55:52'),
(151, '66.249.72.208', '2021-06-26 21:02:42'),
(152, '66.249.69.40', '2021-06-26 22:03:07'),
(153, '66.249.69.37', '2021-06-27 00:22:56'),
(154, '2001:4455:509:1f00:c071:8ad7:55f3:1e89', '2021-06-27 13:20:19'),
(155, '66.249.69.52', '2021-06-27 15:47:45'),
(156, '66.249.72.212', '2021-06-27 17:37:49'),
(157, '66.249.79.98', '2021-06-27 22:19:21'),
(158, '66.249.79.14', '2021-06-28 05:33:36'),
(159, '66.249.79.122', '2021-06-28 13:44:49'),
(160, '180.191.84.152', '2021-06-28 14:39:20'),
(161, '104.247.136.248', '2021-06-28 17:10:24'),
(162, '154.16.35.2', '2021-06-28 17:39:15'),
(163, '66.249.64.44', '2021-06-28 21:58:53'),
(164, '2001:4455:18d:2500:b458:e418:58de:4d91', '2021-06-29 14:39:28'),
(165, '66.249.65.148', '2021-06-30 01:07:42'),
(166, '66.249.65.156', '2021-06-30 11:11:34'),
(167, '2001:4455:3de:bd00:f470:baee:aecc:4fc5', '2021-06-30 15:57:15'),
(168, '2001:4455:5b7:4000:a0e7:facb:998:59fa', '2021-07-01 14:21:43'),
(169, '2001:4455:5b7:4000:445e:2c37:f48:ab96', '2021-07-02 10:38:50'),
(170, '2001:4455:18d:2500:61d6:1770:fa49:91af', '2021-07-02 12:16:53'),
(171, '54.224.197.209', '2021-07-02 13:06:18'),
(172, '40.77.189.229', '2021-07-02 13:38:46'),
(173, '49.146.13.202', '2021-07-03 17:31:52'),
(174, '171.13.14.52', '2021-07-05 15:50:24'),
(175, '171.13.14.76', '2021-07-05 15:50:31'),
(176, '40.77.188.70', '2021-07-05 20:36:51'),
(177, '2001:4455:5b7:4000:54c4:6703:d4e9:751f', '2021-07-06 22:49:28'),
(178, '40.77.167.61', '2021-07-07 15:08:23'),
(179, '147.78.141.185', '2021-07-07 17:19:30'),
(180, '175.176.83.235', '2021-07-08 14:58:44'),
(181, '51.77.246.201', '2021-07-10 00:40:19'),
(182, '35.232.57.238', '2021-07-10 07:38:42'),
(183, '40.77.189.129', '2021-07-12 10:57:11'),
(184, '2001:4455:315:7200:1897:c9ef:63c1:5bf', '2021-07-14 14:17:02'),
(185, '2001:4455:5aa:d600:c85a:93f5:f7cf:cc3', '2021-07-14 14:17:12'),
(186, '2a03:2880:30ff:1::face:b00c', '2021-07-14 15:19:08'),
(187, '110.54.205.79', '2021-07-14 16:48:37'),
(188, '66.249.66.85', '2021-07-15 16:22:19'),
(189, '111.224.7.224', '2021-07-16 23:15:14'),
(190, '66.249.65.158', '2021-07-17 14:53:05'),
(191, '66.249.72.210', '2021-07-18 00:45:30'),
(192, '40.77.167.71', '2021-07-18 09:52:43'),
(193, '66.249.69.56', '2021-07-20 14:04:56'),
(194, '66.249.64.30', '2021-07-22 02:18:19'),
(195, '66.249.64.28', '2021-07-22 12:43:21'),
(196, '66.249.64.5', '2021-07-22 22:20:02'),
(197, '66.249.64.42', '2021-07-23 05:14:32'),
(198, '66.249.64.50', '2021-07-23 14:52:38'),
(199, '175.176.80.36', '2021-07-23 18:59:58'),
(200, '66.249.64.9', '2021-07-23 20:53:40'),
(201, '2001:4455:3ac:2500:852b:a98c:70fc:b895', '2021-07-24 13:32:49'),
(202, '119.93.23.221', '2021-07-24 14:19:25'),
(203, '2001:4455:3ac:2500:f452:d17d:18d7:cb4c', '2021-07-24 14:43:39'),
(204, '202.69.185.71', '2021-07-24 14:43:40'),
(205, '175.176.80.249', '2021-07-25 03:01:41'),
(206, '40.77.188.197', '2021-07-25 10:56:31'),
(207, '66.249.64.46', '2021-07-25 11:14:11'),
(208, '66.249.66.54', '2021-07-27 15:32:40'),
(209, '175.176.82.35', '2021-07-30 19:29:41'),
(210, '2001:4455:5b7:4000:e581:b0cf:fd67:793b', '2021-08-01 11:51:24'),
(211, '66.249.72.180', '2021-08-03 04:48:13'),
(212, '66.249.69.84', '2021-08-03 10:27:20'),
(213, '157.55.39.71', '2021-08-04 16:47:14'),
(214, '66.249.64.48', '2021-08-05 04:37:23'),
(215, '40.77.189.210', '2021-08-05 13:27:54'),
(216, '175.44.42.236', '2021-08-07 10:20:47'),
(217, '175.44.42.121', '2021-08-07 13:23:00'),
(218, '40.77.188.219', '2021-08-08 21:03:36'),
(219, '69.160.160.61', '2021-08-09 05:43:58'),
(220, '51.91.218.49', '2021-08-10 01:14:37'),
(221, '66.249.66.56', '2021-08-10 06:12:17'),
(222, '40.77.188.30', '2021-08-11 22:06:00'),
(223, '2001:4455:5f6:3000:3cbc:bbfa:e329:9', '2021-08-12 23:17:36'),
(224, '49.149.65.199', '2021-08-13 10:46:01'),
(225, '34.71.210.147', '2021-08-13 11:27:51'),
(226, '66.249.69.50', '2021-08-14 02:24:06'),
(227, '157.55.39.72', '2021-08-14 09:52:19'),
(228, '3.248.226.185', '2021-08-14 10:45:45'),
(229, '40.77.188.235', '2021-08-15 05:49:13'),
(230, '2001:4455:5ba:3100:d89c:d940:dd5e:ac48', '2021-08-15 10:55:47'),
(231, '175.176.84.234', '2021-08-15 11:01:50'),
(232, '2001:4455:5ba:3100:c1c3:9b5e:acb5:7ed5', '2021-08-15 14:56:25'),
(233, '175.176.84.58', '2021-08-15 15:33:56'),
(234, '66.249.64.3', '2021-08-15 22:00:34'),
(235, '66.249.64.1', '2021-08-16 09:16:09'),
(236, '40.77.139.76', '2021-08-17 05:19:44'),
(237, '2001:4455:3d7:1e00:5095:9a9d:185d:3f82', '2021-08-18 00:45:03'),
(238, '66.249.74.80', '2021-08-18 14:24:32'),
(239, '2001:4455:3d7:1e00:d1bf:938a:25c2:6898', '2021-08-19 01:05:35'),
(240, '66.249.73.237', '2021-08-19 02:26:07'),
(241, '66.249.74.82', '2021-08-19 02:29:35'),
(242, '66.249.74.78', '2021-08-19 23:14:04'),
(243, '180.194.57.113', '2021-08-20 14:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `trans_record`
--

CREATE TABLE `trans_record` (
  `track_id` int(11) NOT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tempuserid` int(11) DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `Order_accepted` datetime NOT NULL,
  `target_date` datetime NOT NULL,
  `stat_checkout` varchar(50) NOT NULL,
  `datecompleted` date DEFAULT NULL,
  `promo_id` int(11) NOT NULL,
  `forcod` varchar(50) DEFAULT NULL,
  `paymentstatus` varchar(50) DEFAULT NULL,
  `cancelationreason` varchar(50) DEFAULT NULL,
  `addr` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_record`
--

INSERT INTO `trans_record` (`track_id`, `invoice_no`, `user_id`, `tempuserid`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`, `Order_accepted`, `target_date`, `stat_checkout`, `datecompleted`, `promo_id`, `forcod`, `paymentstatus`, `cancelationreason`, `addr`, `city`, `zipcode`, `status`) VALUES
(262, NULL, 128, NULL, 57, 1, 150, '2021-05-27 07:30:50', 'pickup', '0000-00-00 00:00:00', '2021-05-11 07:30:00', 'false', '2021-05-29', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(263, NULL, 128, NULL, 59, 1, 85, '2021-05-27 07:30:50', 'pickup', '0000-00-00 00:00:00', '2021-05-11 07:30:00', 'false', '2021-05-29', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(264, NULL, 128, NULL, 61, 1, 85, '2021-05-27 07:30:50', 'pickup', '0000-00-00 00:00:00', '2021-05-11 07:30:00', 'false', '2021-05-31', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(266, NULL, 128, NULL, 68, 1, 250, '2021-05-27 07:30:50', 'pickup', '0000-00-00 00:00:00', '2021-05-11 07:30:00', 'false', '2021-05-31', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(267, NULL, 128, NULL, 70, 1, 98, '2021-05-27 07:30:50', 'pickup', '0000-00-00 00:00:00', '2021-05-11 07:30:00', 'false', '2021-05-31', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(272, NULL, 128, NULL, 77, 1, 450, '2021-05-27 07:30:50', 'cod', '2021-05-29 00:00:00', '2021-05-11 07:30:00', 'false', '2021-05-29', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(274, NULL, 126, NULL, 70, 1, 98, '2021-05-30 10:56:31', 'pickup', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', '2021-05-31', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(275, NULL, 126, NULL, 65, 5, 400, '2021-05-31 12:56:39', 'pickup', '0000-00-00 00:00:00', '2021-05-31 12:56:00', 'false', '2021-05-31', 33, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(276, NULL, 135, NULL, 74, 2, 598, '2021-05-31 01:14:41', 'pickup', '0000-00-00 00:00:00', '2021-06-02 13:14:00', 'false', '2021-05-31', 33, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(277, NULL, 138, NULL, 61, 1, 86, '2021-06-01 12:21:14', 'pickup', '0000-00-00 00:00:00', '2021-06-02 12:21:00', 'false', '2021-05-31', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(278, NULL, 138, NULL, 60, 1, 250, '2021-06-01 12:24:17', 'cod', '2021-06-01 00:00:00', '0000-00-00 00:00:00', 'false', '2021-05-31', 0, 'completed', NULL, NULL, 'Recodo', 'zamboanga city', '7000', 'completed'),
(279, NULL, 126, NULL, 57, 1, 150, '2021-06-01 01:15:29', 'pickup', '0000-00-00 00:00:00', '2021-06-02 13:15:00', 'false', '2021-06-01', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(281, NULL, 138, NULL, 60, 1, 250, '2021-06-01 01:25:05', 'pickup', '0000-00-00 00:00:00', '2021-06-02 13:25:00', 'false', '2021-06-01', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(282, NULL, 138, NULL, 59, 1, 85, '2021-06-01 01:31:24', 'cod', '2021-06-01 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-01', 0, 'completed', NULL, NULL, 'Recodo', 'zamboanga city', '7000', 'completed'),
(283, NULL, 138, NULL, 57, 1, 151, '2021-06-01 01:31:24', 'cod', '2021-06-01 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-01', 0, 'completed', NULL, NULL, 'Recodo', 'zamboanga city', '7000', 'completed'),
(284, NULL, 138, NULL, 64, 1, 150, '2021-06-01 01:31:44', 'pickup', '0000-00-00 00:00:00', '2021-06-02 13:31:00', 'false', '2021-06-01', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(285, NULL, 138, NULL, 63, 1, 51, '2021-06-01 01:31:44', 'pickup', '0000-00-00 00:00:00', '2021-06-02 13:31:00', 'false', '2021-06-01', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(295, NULL, 131, NULL, 62, 20, 3580, '2021-06-02 02:04:27', 'pickup', '0000-00-00 00:00:00', '2021-06-03 03:30:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'cancelled'),
(296, NULL, 144, NULL, 57, 100, 15050, '2021-06-02 02:56:07', 'pickup', '0000-00-00 00:00:00', '2021-06-02 15:55:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'cancelled'),
(297, NULL, 126, NULL, 57, 101, 15201, '2021-06-02 03:22:40', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Recodo', 'zamboanga city', '7000', 'cancelled'),
(314, NULL, 144, NULL, 59, 1, 85, '2021-06-04 01:22:30', 'pickup', '0000-00-00 00:00:00', '2021-06-04 13:25:00', 'false', '2021-06-04', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(316, NULL, 148, NULL, 65, 3, 240, '2021-06-04 01:29:45', 'pickup', '0000-00-00 00:00:00', '2021-06-04 15:30:00', 'false', '2021-06-04', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(317, NULL, 148, NULL, 64, 1, 150, '2021-06-04 01:29:45', 'pickup', '0000-00-00 00:00:00', '2021-06-04 15:30:00', 'false', '2021-06-04', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(318, NULL, 148, NULL, 62, 2, 358, '2021-06-04 01:29:45', 'pickup', '0000-00-00 00:00:00', '2021-06-04 15:30:00', 'false', '2021-06-04', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(319, NULL, 148, NULL, 63, 1, 51, '2021-06-04 01:29:45', 'pickup', '0000-00-00 00:00:00', '2021-06-04 15:30:00', 'false', '2021-06-04', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(320, NULL, 148, NULL, 60, 1, 250, '2021-06-04 01:29:45', 'pickup', '0000-00-00 00:00:00', '2021-06-04 15:30:00', 'false', '2021-06-04', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(321, NULL, 149, NULL, 65, 2, 160, '2021-06-04 01:33:17', 'cod', '2021-06-04 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-04', 0, 'completed', NULL, NULL, ' gnv', 'vbnvbn', '7000', 'completed'),
(324, 168, 126, NULL, 63, 100, 5075, '2021-06-04 01:56:36', 'pickup', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-04', 0, 'pickup', 'paid', NULL, NULL, NULL, NULL, 'completed'),
(325, NULL, 148, NULL, 68, 100, 25000, '2021-06-04 02:00:43', 'cod', '2021-06-04 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-04', 0, 'completed', NULL, NULL, 'qwerty', 'zamboanga city', '7000', 'completed'),
(343, NULL, 126, NULL, 60, 1, 250, '2021-06-05 09:45:55', 'cod', '2021-06-05 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-05', 0, 'completed', NULL, NULL, 'Recodo', 'zamboanga city', '7000', 'completed'),
(344, NULL, 128, NULL, 60, 9, 2250, '2021-06-06 01:32:46', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, ';', 'dsadasd', 'asdasd', '2131', 'cancelled'),
(345, NULL, 128, NULL, 61, 6, 515, '2021-06-06 01:33:42', 'pickup', '0000-00-00 00:00:00', '2021-07-01 13:33:00', 'false', '2021-06-06', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(348, NULL, 128, NULL, 60, 6, 1500, '2021-06-06 01:57:46', 'cod', '2021-06-06 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-06', 0, 'completed', NULL, NULL, 'wqe', 'wqe', '213', 'completed'),
(349, NULL, 155, NULL, 63, 15, 761, '2021-06-06 02:06:44', 'pickup', '0000-00-00 00:00:00', '2021-06-17 14:06:00', 'false', '2021-06-07', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(350, NULL, 128, NULL, 63, 13, 660, '2021-06-06 03:57:48', 'cod', '2021-06-06 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-06', 0, 'completed', NULL, NULL, 'ada', 'sdasdas', '5675', 'completed'),
(351, NULL, 128, NULL, 60, 1, 250, '2021-06-06 03:58:54', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, 'l.ju', 'punk hazard', 'enies lobby', '6000', 'cancelled'),
(354, NULL, 130, NULL, 76, 10, 4950, '2021-06-06 06:05:55', 'pickup', '0000-00-00 00:00:00', '2021-07-01 18:05:00', 'false', '2021-06-07', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(355, NULL, 128, NULL, 128, 10, 500, '2021-06-06 06:19:19', 'pickup', '0000-00-00 00:00:00', '2021-06-30 18:19:00', 'false', '2021-06-06', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(356, NULL, 128, NULL, 70, 9, 889, '2021-06-06 06:20:52', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, 'eeeee', 'qw', 'ew', '213', 'cancelled'),
(357, NULL, 156, NULL, 65, 1, 80, '2021-06-06 06:50:34', 'cod', '2021-06-06 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-06', 0, 'completed', NULL, NULL, '123', '231', '3121', 'completed'),
(358, NULL, 156, NULL, 100, 10, 100, '2021-06-06 06:50:34', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, '123', '231', '3121', 'cancelled'),
(359, NULL, 156, NULL, 60, 1, 250, '2021-06-06 06:53:07', 'pickup', '0000-00-00 00:00:00', '2021-06-30 18:53:00', 'false', '2021-06-06', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(360, NULL, 156, NULL, 70, 1, 99, '2021-06-06 06:55:36', 'cod', '2021-06-06 00:00:00', '0000-00-00 00:00:00', 'false', '2021-06-06', 0, 'completed', NULL, NULL, '5', '4', '4', 'completed'),
(361, NULL, 156, NULL, 72, 1, 150, '2021-06-06 06:56:35', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, 'x', '4', '4', '4', 'cancelled'),
(362, NULL, 156, NULL, 61, 1, 86, '2021-06-06 06:58:07', 'pickup', '0000-00-00 00:00:00', '2021-07-01 18:58:00', 'false', '2021-06-07', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(363, NULL, 128, NULL, 59, 1, 85, '2021-06-06 07:01:25', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, 'x', '55', '55', '55', 'cancelled'),
(365, NULL, 156, NULL, 60, 1, 250, '2021-06-06 07:11:23', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, 'x', '8', '8', '8', 'cancelled'),
(366, NULL, 156, NULL, 61, 1, 86, '2021-06-06 07:11:58', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'cancelled', NULL, 'x', '3', '3', '3', 'cancelled'),
(367, NULL, 144, NULL, 57, 2, 301, '2021-06-06 07:14:26', 'pickup', '0000-00-00 00:00:00', '2021-06-06 19:20:00', 'false', '2021-06-07', 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'completed'),
(368, NULL, 128, NULL, 60, 6, 1500, '2021-06-07 10:10:51', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, '8', '8', '8', 'pending'),
(369, NULL, 128, NULL, 127, 1, 500, '2021-06-07 10:11:43', 'pickup', '0000-00-00 00:00:00', '2021-06-30 10:11:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(370, NULL, 128, NULL, 100, 1, 100, '2021-06-07 10:12:16', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, '0', '0', '0', 'pending'),
(371, NULL, 144, NULL, 57, 1, 151, '2021-06-07 02:58:29', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:00:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(372, NULL, 144, NULL, 59, 1, 85, '2021-06-07 02:58:29', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:00:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(373, NULL, 144, NULL, 60, 1, 250, '2021-06-07 02:58:29', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:00:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(374, NULL, 144, NULL, 61, 1, 86, '2021-06-07 02:58:29', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:00:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(375, NULL, 159, NULL, 57, 1, 151, '2021-06-07 03:16:45', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:21:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'approved'),
(376, NULL, 159, NULL, 59, 1, 85, '2021-06-07 03:16:45', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:21:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(377, NULL, 159, NULL, 60, 1, 250, '2021-06-07 03:16:45', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:21:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'approved'),
(378, NULL, 159, NULL, 61, 1, 86, '2021-06-07 03:16:45', 'pickup', '0000-00-00 00:00:00', '2021-06-07 15:21:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'pending'),
(379, NULL, 159, NULL, 57, 1, 151, '2021-06-07 03:19:48', 'cod', '2021-06-07 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, 'luyahan', 'za,boanga', '7000', 'toreceive'),
(380, NULL, 159, NULL, 59, 1, 85, '2021-06-07 03:19:48', 'cod', '2021-06-07 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, 'luyahan', 'za,boanga', '7000', 'toreceive'),
(381, NULL, 126, NULL, 77, 6, 2700, '2021-06-07 03:28:11', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Recodo', 'zamboanga city', '7000', 'pending'),
(382, NULL, 128, NULL, 65, 4, 320, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'pending'),
(383, NULL, 128, NULL, 60, 5, 1250, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'pending'),
(384, NULL, 128, NULL, 79, 18, 2700, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'pending'),
(385, NULL, 128, NULL, 78, 55, 8800, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'pending'),
(386, NULL, 128, NULL, 80, 1, 450, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'toship'),
(387, NULL, 128, NULL, 60, 1, 250, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'toship'),
(388, NULL, 128, NULL, 57, 1, 151, '2021-07-14 05:54:19', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Rio Hondo, Zamboanga City, Philippines', 'Zamboanga City', '7000', 'pending'),
(389, NULL, 128, NULL, 61, 1, 86, '2021-07-14 05:55:17', 'pickup', '0000-00-00 00:00:00', '2021-07-17 17:55:00', 'false', NULL, 0, NULL, 'unpaid', NULL, NULL, NULL, NULL, 'approved'),
(390, NULL, 161, NULL, 59, 2, 170, '2021-07-24 02:37:34', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, 'CAMPO ISLAM', 'ZAMBOANGA CITY', '7000', 'toship'),
(391, NULL, 161, NULL, 59, 2, 170, '2021-07-30 07:34:59', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, NULL, NULL, NULL, 'Campo Islam', 'Zamboanga', '7000', 'pending'),
(392, NULL, 161, NULL, 57, 1, 151, '2021-07-30 07:34:59', 'cod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false', NULL, 0, 'codgood', NULL, NULL, 'Campo Islam', 'Zamboanga', '7000', 'toship');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `datejoined` date DEFAULT NULL,
  `vcode` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `logintype` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `uname`, `surname`, `address`, `contact_no`, `datejoined`, `vcode`, `status`, `logintype`, `email`, `password`) VALUES
(123, 'reenjie', 'caimor', 'Recodo', '09638304913', '2021-05-26', ' ', 1, 'personal', 'reenjie17@gmail.com', 'reenjay17'),
(126, 'reenjay', 'caimor', '', '09557653775', '2021-05-26', ' ', 1, 'gmail', 'reenjie17@gmail.com', NULL),
(127, 'Jelay', 'Cabeltes', 'ayala', '09558408652', '2021-05-26', NULL, 0, 'personal', 'jellyanncabeltes051715@gmail.com', 'Reenjay17'),
(128, 'Nadeer', 'Mukaram', '', '09366763481', '2021-05-26', ' ', 1, 'gmail', 'nadeermukaram@gmail.com', NULL),
(129, 'Gutsy', 'Guts', '', '12323123123', '2021-05-27', ' ', 1, 'gmail', 'gutsyguts09@gmail.com', NULL),
(130, 'NADEER', 'MUKARAM', '', '093727161', '2021-05-27', ' ', 1, 'gmail', 'sl201500873@wmsu.edu.ph', NULL),
(131, 'warren josiah', 'de guzman', 'diplahan zamboanga sibugay', '09350486864', '2021-05-29', 'U8yW4G', 0, 'gmail', 'frostneva@gmail.com', NULL),
(135, 'test', 'pcode', 'Recodo', '09638304913', '2021-05-31', 'erFUKf', 0, 'personal', 'reenjay51715@gmail.com', 'Reenjay17'),
(136, 'Dj', 'Caimor', '', '09557653775', '2021-05-31', ' ', 1, 'gmail', 'reenjay51715@gmail.com', NULL),
(137, 'REENJAY MAGAAN.', 'CAIMOR', '', '09557653775', '2021-05-31', ' ', 1, 'gmail', 'sm201600747@wmsu.edu.ph', NULL),
(138, 'reenjay', 'caimor', 'recodo', '09758041838', '2021-06-01', ' ', 1, 'personal', 'jelay@gmail.com', 'Reenjay17'),
(139, 'qwe', 'eqwqwe', 'eqw', '132312', '2021-06-01', NULL, 0, 'personal', 'gdfkgsdfk@gmail.com', 'Alltimelow99'),
(140, 'ryan', 'camonias', 'luyahan pasonanba zc', '09773151041', '2021-06-01', 'yRe6Ac', 0, 'personal', 'ryan@gmail.com', 'Ab123456789'),
(141, 'tfds', 'sdfdfs', 'dsfdsf', '34341', '2021-06-01', NULL, 0, 'personal', 'qweqwewqew@yahoo.com', 'Alltimelow99'),
(142, 'Roronoa', 'Zoro', 'All Blue', '06666666666', '2021-06-01', NULL, 0, 'personal', 'zoro123@gmail.com', 'Zoro123@gmail.com'),
(143, 'ryan', 'camonias', 'luyahan pasonanba zc', '09773151042', '2021-06-02', NULL, 0, 'personal', 'ryan01@gmail.com', 'Ab123456789'),
(144, 'ryan', 'camonias', NULL, NULL, '2021-06-02', NULL, 0, 'gmail', 'camoniasryan@gmail.com', NULL),
(145, 'test', 'test', 'diplahan zamboanga sibugay', '09350486864', '2021-06-02', NULL, 0, 'personal', 'mobile.legend.xoxo@gmail.com', '@Fernandez_1997!'),
(146, 'D', 'Rose', 'Windy City', '09746546', '2021-06-02', ' ', 1, 'personal', '889@gmail.com', 'Alltimelow99'),
(147, 'sample', 'sample123', 'qweqweqw', '21312312', '2021-06-03', 'i7p7IC', 0, 'personal', 'samplesample@gmail.com', 'Alltimelow99'),
(148, 'JP', 'Arip', 'Calarian', '09756714532', '2021-06-04', ' ', 1, 'personal', 'cyberformula69@gmail.com', 'Qwerty1234'),
(149, 'Pauleen Jean', 'Gregana', '', '09457741969', '2021-06-04', ' ', 1, 'gmail', 'pauleen.gregana@wmsu.edu.ph', NULL),
(150, 'Emmanuel John', 'Lumata', NULL, NULL, '2021-06-04', NULL, 0, 'gmail', 'dev.19ej96@gmail.com', NULL),
(151, 'Tes User', 'Testing', 'Test', '09080706050', '2021-06-04', NULL, 0, 'personal', 'test@test.com', 'T@est123'),
(152, 'guts', 'king', '', '123123', '2021-06-04', ' ', 1, 'gmail', 'sampleuser12345678900000000@gmail.com', NULL),
(153, 'nnnnnnnnnn', 'nnnnnnnnn', 'nnnnnnnnnnn', '000000000', '2021-06-04', NULL, 0, 'personal', 'll@gmail.com', 'Alltimelow99'),
(154, 'ab', 'ab', 'b', '3', '2021-06-04', ' ', 1, 'personal', 'd@gmail.com', 'Alltimelow99'),
(155, 'nzroo', 'nzroo', 'punk hazard', '09888888888', '2021-06-06', ' ', 1, 'personal', 'nzroo@gmail.com', 'Alltimelow99'),
(156, 'klklkl', 'klklklk', 'lklklkl@gmai.com', '123321', '2021-06-06', ' ', 1, 'personal', 'eqweqwqewqw@gmail.com', 'Alltimelow99'),
(157, 'Mobile', 'Legend', NULL, NULL, '2021-06-06', NULL, 0, 'gmail', 'mobile.legend.xoxo@gmail.com', NULL),
(158, 'qwe', 'eqw', 'wqe', '213123', '2021-06-07', NULL, 0, 'personal', 'ewqqeweqw@gmail.com', 'Alltimelow99'),
(159, 'ryan', 'camonias', 'luyahan pasonanba zc', '09656499005', '2021-06-07', ' ', 1, 'personal', 'camonias_@gmail.com', 'Ab123456'),
(160, 'Ahmad', 'Salasain', NULL, NULL, '2021-07-08', NULL, 0, 'gmail', 'samcena.902604@gmail.com', NULL),
(161, 'Absar', 'Mohammad', '', '091614447', '2021-07-24', ' ', 1, 'gmail', 'abshates97@gmail.com', NULL),
(162, 'Jiezel', 'Camlian ', 'Zamboanga ', '09363327219', '2021-08-15', NULL, 0, 'personal', 'camlianjiezel@gmail.com', 'Camlian14');

-- --------------------------------------------------------

--
-- Structure for view `cartview`
--
DROP TABLE IF EXISTS `cartview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `cartview`  AS  select `user_account`.`user_id` AS `user_id`,`product`.`photo` AS `photo`,`product`.`name` AS `name`,`product`.`prod_id` AS `prod_id`,`cart`.`qty` AS `qty`,`product`.`price` AS `price`,`cart`.`total` AS `total`,`cart`.`cart_id` AS `cart_id` from ((`user_account` join `product`) join `cart` on(((`user_account`.`user_id` = `cart`.`user_id`) and (`cart`.`prod_id` = `product`.`prod_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `cartviewnoid`
--
DROP TABLE IF EXISTS `cartviewnoid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `cartviewnoid`  AS  select `temp`.`tempid` AS `user_id`,`product`.`photo` AS `photo`,`product`.`name` AS `name`,`product`.`prod_id` AS `prod_id`,`cart`.`qty` AS `qty`,`product`.`price` AS `price`,`cart`.`total` AS `total`,`cart`.`cart_id` AS `cart_id` from ((`temp` join `product`) join `cart` on(((`temp`.`tempid` = `cart`.`user_id`) and (`cart`.`prod_id` = `product`.`prod_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `completeview`
--
DROP TABLE IF EXISTS `completeview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `completeview`  AS  select `invoice_record`.`invoice_no` AS `invoice_no`,`user_account`.`uname` AS `uname`,`user_account`.`surname` AS `surname`,`invoice_record`.`dateprocess` AS `dateprocess`,`invoice_record`.`total` AS `total` from (`invoice_record` join `user_account` on((`invoice_record`.`user_id` = `user_account`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `orderview`
--
DROP TABLE IF EXISTS `orderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `orderview`  AS  select `trans_record`.`status` AS `status`,`trans_record`.`track_id` AS `track_id`,`trans_record`.`user_id` AS `user_id`,`product`.`photo` AS `photo`,`product`.`name` AS `name`,`product`.`description` AS `description`,`product`.`price` AS `price`,`trans_record`.`total` AS `total`,`trans_record`.`dateandtime` AS `dateandtime`,`trans_record`.`datecompleted` AS `datecompleted`,`trans_record`.`target_date` AS `target_date`,`trans_record`.`quantity` AS `quantity`,`trans_record`.`transaction_type` AS `transaction_type`,`trans_record`.`addr` AS `addr`,`trans_record`.`cancelationreason` AS `cancelationreason`,`trans_record`.`city` AS `city`,`trans_record`.`zipcode` AS `zipcode`,`trans_record`.`invoice_no` AS `invoice_no`,`trans_record`.`promo_id` AS `promo_id`,`trans_record`.`paymentstatus` AS `paymentstatus`,`trans_record`.`forcod` AS `forcod` from (`trans_record` join `product` on((`trans_record`.`prod_id` = `product`.`prod_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `pickup`
--
DROP TABLE IF EXISTS `pickup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `pickup`  AS  select `user_account`.`user_id` AS `user_id`,`trans_record`.`prod_id` AS `prod_id`,`trans_record`.`invoice_no` AS `invoice_no`,`trans_record`.`track_id` AS `track_id`,`trans_record`.`dateandtime` AS `dateandtime`,`user_account`.`uname` AS `uname`,`user_account`.`surname` AS `surname`,`branches`.`branch_id` AS `branch_id`,`branches`.`bname` AS `bname`,`product`.`name` AS `name`,`product`.`photo` AS `photo`,`product`.`description` AS `description`,`product`.`price` AS `price`,`trans_record`.`quantity` AS `quantity`,`trans_record`.`total` AS `total`,`trans_record`.`transaction_type` AS `transaction_type`,`trans_record`.`target_date` AS `target_date`,`trans_record`.`Order_accepted` AS `Order_accepted`,`trans_record`.`stat_checkout` AS `stat_checkout`,`trans_record`.`datecompleted` AS `datecompleted`,`trans_record`.`status` AS `status`,`trans_record`.`paymentstatus` AS `paymentstatus` from (((`trans_record` join `product`) join `branches`) join `user_account` on(((`trans_record`.`prod_id` = `product`.`prod_id`) and (`product`.`branch_id` = `branches`.`branch_id`) and (`user_account`.`user_id` = `trans_record`.`user_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `products`
--
DROP TABLE IF EXISTS `products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `products`  AS  select `product`.`prod_id` AS `prod_id`,`product`.`name` AS `name`,`product`.`price` AS `price`,`product`.`description` AS `description`,`productstock`.`stock` AS `stock`,`productstock`.`modified` AS `modified`,`productstock`.`expiration` AS `expiration`,`product`.`photo` AS `photo`,`category`.`categoryname` AS `categoryname` from ((`product` join `productstock` on((`product`.`prod_id` = `productstock`.`prod_id`))) join `category` on((`product`.`cat_id` = `category`.`cat_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `receipt`
--
DROP TABLE IF EXISTS `receipt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ja59dvmjcj5e`@`localhost` SQL SECURITY DEFINER VIEW `receipt`  AS  select `user_account`.`user_id` AS `user_id`,`invoice_record`.`invoice_no` AS `invoice_no`,`trans_record`.`stat_checkout` AS `stat_checkout`,`trans_record`.`status` AS `status`,`product`.`name` AS `name`,`product`.`description` AS `description`,`product`.`price` AS `price`,`trans_record`.`quantity` AS `quantity`,`trans_record`.`total` AS `total` from (((`trans_record` join `invoice_record`) join `product`) join `user_account` on(((`trans_record`.`invoice_no` = `invoice_record`.`invoice_no`) and (`product`.`prod_id` = `trans_record`.`prod_id`) and (`trans_record`.`user_id` = `user_account`.`user_id`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `invoice_record`
--
ALTER TABLE `invoice_record`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `productstock`
--
ALTER TABLE `productstock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `sales_discount`
--
ALTER TABLE `sales_discount`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`tempid`);

--
-- Indexes for table `trans_record`
--
ALTER TABLE `trans_record`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=802;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_record`
--
ALTER TABLE `invoice_record`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `productstock`
--
ALTER TABLE `productstock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sales_discount`
--
ALTER TABLE `sales_discount`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `tempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `trans_record`
--
ALTER TABLE `trans_record`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productstock`
--
ALTER TABLE `productstock`
  ADD CONSTRAINT `productstock_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trans_record`
--
ALTER TABLE `trans_record`
  ADD CONSTRAINT `trans_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trans_record_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
