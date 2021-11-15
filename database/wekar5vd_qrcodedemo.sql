-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2021 at 05:52 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wekar5vd_qrcodedemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_password` text NOT NULL,
  `admin_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`, `admin_email`) VALUES
(1, 'admin', '3ckz6e27', 'suman.g@wekart.co.in'),
(2, 'kitchen', '12345678', 'kitchen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(120) NOT NULL,
  `category_name` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `category_name`, `description`, `status`) VALUES
(31, 'ROLL', '  ', '1'),
(32, 'MOMO', ' ', '1'),
(33, 'FINGER FOODS', '  ', '1'),
(34, 'CHINESE', ' Good', '1'),
(35, 'SIDES', ' ', '1'),
(36, 'COMBOS', '  ', '1'),
(37, 'SANDWICH', '  ', '1'),
(39, 'DRINKS', 'ANY TYPE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(120) NOT NULL,
  `fcid` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `price` text NOT NULL,
  `photo` text NOT NULL,
  `status` text NOT NULL,
  `available` text NOT NULL,
  `extras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `fcid`, `title`, `description`, `type`, `price`, `photo`, `status`, `available`, `extras`) VALUES
(20, '31', 'Aloo Kati Roll', 'Paratha is dough that is kneaded into a rope, then coiled into a round patty.', 'veg', '30', 'Aloo Kathi Roll.jpg', '1', '1', 777),
(21, '31', 'Double Aloo Kati Roll', 'ROLL', 'veg', '35', 'Double Aloo Kathi Roll.jpg', '1', '1', 777),
(22, '31', 'Aloo Egg Kati Roll', 'ROLL', 'veg', '40', 'Aloo Egg Kathi Roll.jpg', '1', '0', 777),
(23, '31', 'Double Aloo Egg Kati Roll', 'ROLL', 'nonveg', '40', 'Double Egg Aloo Kathi Roll.jpg', '1', '1', 777),
(24, '31', 'Egg Roll', 'ROLL', 'nonveg', '30', 'Egg Roll.jpg', '1', '1', 777),
(25, '31', 'Double Egg Roll', 'ROLL', 'nonveg', '35', 'Double Egg Roll.jpg', '1', '1', 777),
(26, '31', 'Onion Cheese Roll', 'ROLL', 'veg', '35', 'Onion Cheese Roll.jpg', '1', '1', 777),
(27, '31', 'Paneer Roll', 'ROLL', 'veg', '60', 'Paneer Roll.jpg', '1', '1', 777),
(28, '31', 'Paneer Cheese Roll', 'ROLL', 'veg', '70', 'Paneer Cheese Roll.png', '1', '1', 777),
(29, '31', 'Chicken Kati Roll', 'ROLL', 'nonveg', '60', 'Chicken Kathi Roll.jpg', '1', '1', 777),
(30, '31', 'Egg Chicken Kati Roll', 'ROLL', 'nonveg', '70', 'Egg Chicken Kathi Roll.jpg', '1', '1', 777),
(31, '31', 'Egg Chicken Cheese Kati Roll', ' ', 'nonveg', '80', 'Double Egg Chicken Cheese Roll.jpg', '1', '1', 777),
(32, '31', 'Double Egg Chicken Kati Roll', 'ROLL', 'nonveg', '75', 'Double Egg Chicken Kathi Roll.jpg', '1', '1', 777),
(33, '31', 'Chilli Chicken Roll', 'ROLL', 'nonveg', '65', 'Chilli Chicken Roll.jpg', '1', '1', 777),
(34, '31', 'Mutton Kati Roll', 'ROLL', 'nonveg', '80', 'Mutton Kathi Roll.jpg', '1', '1', 777),
(35, '31', 'Egg Mutton Kati Roll', 'ROLL', 'nonveg', '85', 'Egg Mutton Kathi Roll.jpg', '1', '1', 777),
(36, '32', 'Veg Momo (Steamed)', ' ', 'veg', '45', 'Veg Momo.jpeg', '1', '1', 777),
(37, '32', 'Veg Momo (Fried)', ' ', 'veg', '50', 'Fried Momo.jpg', '1', '1', 777),
(38, '32', 'Veg Momo (Pan Fried)', ' ', 'veg', '55', 'Pan Fried Momo.jpg', '1', '1', 777),
(39, '32', 'Veg & Cheese (Steamed)', ' ', 'veg', '50', 'Veg Cheese Momo.jpg', '1', '1', 777),
(40, '32', 'Veg & Cheese (Fried)', ' ', 'veg', '55', 'Veg Fried Momo.jpeg', '1', '1', 777),
(41, '32', 'Veg & Cheese (Pan Fried)', ' ', 'veg', '60', 'Veg Pan Fried.jpg', '1', '1', 777),
(42, '32', 'Chicken Momo (Steamed)', '  ', 'nonveg', '60', 'Chicken Momo.jpg', '1', '1', 777),
(43, '32', 'Chicken Momo (Fried)', '  ', 'nonveg', '65', 'Pan Fried Momo.jpg', '1', '1', 777),
(44, '32', 'Chicken Momo (Pan Fried)', '  ', 'nonveg', '70', 'Chicken Pan Fried.jpg', '1', '1', 777),
(45, '32', 'Chicken & Cheese Momo (Steamed)', '  ', 'nonveg', '65', 'Chicken Cheese Momos.jpg', '1', '1', 777),
(46, '32', 'Chicken & Cheese Momo (Fried)', '  ', 'nonveg', '70', 'Chicken Cheese Momos.jpg', '1', '1', 777),
(47, '32', 'Chicken & Cheese Momo (Pan Fried)', '  ', 'nonveg', '75', 'Chicken Pan Fried.jpg', '1', '1', 777),
(48, '32', 'Mutton Keema Momo (Steamed)', '  ', 'nonveg', '70', 'Chicken Momo.jpg', '1', '1', 777),
(49, '32', 'Mutton Keema Momo (Fried)', '  ', 'nonveg', '75', 'Mutton Keema Roll.jpg', '1', '1', 777),
(50, '32', 'Mutton Keema Momo (Pan Fried)', '  ', 'nonveg', '80', 'Pan Fried Momo.jpg', '1', '1', 777),
(51, '32', 'Chicken Mo-Thuk (Steamed)', '  ', 'nonveg', '90', 'Muttton Mo-Thuk.jpg', '1', '1', 777),
(52, '32', 'Mutton Mo-Thuk (Steamed)', '  ', 'nonveg', '110', 'Chicken Mo-Thuk.jpg', '1', '1', 777),
(53, '33', 'French Fries', '   ', 'veg', '55', 'French Fries.jpg', '1', '1', 777),
(54, '33', 'Potato Wedges', '   ', 'veg', '60', 'Potato Wedges.jpg', '1', '1', 777),
(55, '33', 'Crispy Chilli Babycorn', '  ', 'veg', '75', 'Crispy Chilly Babycorn.jpg', '1', '1', 777),
(56, '33', 'Egg Mughlai Paratha', '  ', 'nonveg', '60', '', '1', '1', 777),
(57, '33', 'Double Egg Mughlai Paratha', '  ', 'nonveg', '65', 'Double Egg Mughlai Paratha.jpg', '1', '1', 777),
(58, '33', 'Chicken Mughlai Paratha', '  ', 'nonveg', '80', 'Chicken Mughlai Paratha.jpg', '1', '1', 777),
(59, '33', 'Egg Chicken Mughlai Paratha', '  ', 'nonveg', '85', 'Egg Chicken Mughlai Paratha.jpeg', '1', '1', 777),
(60, '33', 'Chicken Spring Roll (2 Pcs)', '  ', 'nonveg', '75', 'Fish Spring Roll.jpg', '1', '1', 777),
(61, '33', 'Fish Spring Roll ', '  ', 'nonveg', '90', 'Fish Spring Roll.jpg', '1', '1', 777),
(62, '33', 'Chicken Finger', '  ', 'nonveg', '80', 'Chicken Finger.jpg', '1', '1', 777),
(63, '33', 'Fish Finger', '  ', 'nonveg', '100', 'Fish Finger.jpg', '1', '1', 777),
(64, '33', 'Kolkata Styl Bhetki Fry (2 Pcs)', '  ', 'nonveg', '140', 'Kolkata Style Fish Fry.jpg', '1', '1', 777),
(65, '34', 'Veg Fried Rice', '  ', 'veg', '60', 'Vegetable Fried Rice.jpg', '1', '1', 777),
(66, '34', 'Egg Fried Rice', '  ', 'nonveg', '65', 'Egg Fried Rice.jpg', '1', '1', 777),
(67, '34', 'Chicken Fried Rice', '  ', 'nonveg', '65', 'Chicken Fried Rice.jpg', '1', '1', 777),
(68, '34', 'Egg Chicken Fried Rice', '  ', 'nonveg', '85', 'Chicken Egg Fried Rice.jpg', '1', '1', 777),
(69, '34', 'Schezwan Chicken Hakka Rice', '  ', 'nonveg', '95', 'Schezwan Chicken Hakka Rice.jpg', '1', '1', 777),
(70, '34', 'Burnt Garlic Chicken Hakka Rice', '  ', 'nonveg', '95', 'Burnt Garlic Chicken Hakka Rice.jpg', '1', '1', 777),
(71, '34', 'Veg Hakka Noodles', '  ', 'veg', '60', 'Veg Hakka Noodles.jpg', '1', '1', 777),
(72, '34', 'Egg Hakka Noodles', '  ', 'nonveg', '65', 'Egg Hakka Noodles.jpg', '1', '1', 777),
(73, '35', 'Pan Tossed Veggies', '  ', 'veg', '90', 'Pan Tossed Veggies.jpg', '1', '1', 777),
(74, '35', 'Chilli Paneer (Full)', ' ', 'veg', '130', 'Chili Paneer.jpg', '1', '1', 777),
(75, '35', 'Chilli Paneer (Half)', ' ', 'veg', '85', 'Chili Paneer.jpg', '1', '1', 777),
(76, '35', 'Veg Manchurian (Full)', '  ', 'veg', '120', 'Veg Manchurian.jpg', '1', '1', 777),
(77, '35', 'Veg Manchurian (Half)', '  ', 'veg', '75', 'Veg Manchurian.jpg', '1', '1', 777),
(78, '35', 'Chilli Chicken (Full)', '  ', 'nonveg', '150', 'Chili Chicken Gravy.jpg', '1', '1', 777),
(79, '35', 'Chilli Chicken (Half)', '  ', 'nonveg', '85', 'Chili Chicken Gravy.jpg', '1', '1', 777),
(80, '35', 'Schezwan  Chicken (Full)', '  ', 'nonveg', '160', 'Schezwan Chicken.jpg', '1', '1', 777),
(81, '35', 'Schezwan  Chicken (Half)', ' ', 'nonveg', '85', 'Schezwan Chicken.jpg', '1', '1', 777),
(82, '35', 'Chicken Manchurian (Full)', '  ', 'nonveg', '150', 'Chicken Manchurian.jpg', '1', '1', 777),
(83, '35', 'Chicken Manchurian (Half)', '  ', 'nonveg', '85', 'Chicken Manchurian.jpg', '1', '1', 777),
(84, '36', 'Veg Fried Rice/Noodles With Veg Manchurian', ' ', 'veg', '100', 'Veg Fried Rice Noodles.jpg', '1', '1', 777),
(85, '36', 'Veg Fried Rice/Noodles With Chilli Paneer', '  ', 'veg', '110', 'Chicken Fried Rice Noodles.jpg', '1', '1', 777),
(86, '36', 'Veg Fried Rice/Noodles With Chilli Chicken', '  ', 'nonveg', '125', 'Veg Fried Rice Noodles.jpg', '1', '1', 777),
(87, '36', 'Chicken Fried Rice/Noodles With Chilli Chicken', '  ', 'nonveg', '145', 'Chicken Fried Rice Noodles.jpg', '1', '1', 777),
(88, '36', 'Crispy Chilli Babycorn + Veg Fried Rice/Noodles With Veg Manchurian', '  ', 'veg', '150', 'Crispy Chicken Rice Noodles Combo.jpg', '1', '1', 777),
(89, '36', 'Fried Chicken Wings + Chicken Fried Rice/Noodles With Chilli Chicken', '  ', 'nonveg', '220', 'Crispy Chicken Rice Noodles Combo.jpg', '1', '1', 777),
(90, '37', 'Veg Grilled Sandwich ', '  ', 'veg', '60', 'Veg Grilled Sandwich.jpg', '1', '1', 777),
(91, '37', 'Paneer Tikka Sandwich', '  ', 'veg', '75', 'Paneer Tikka Sandwich.jpg', '1', '1', 777),
(92, '37', 'Cheese Corn Sandwich', '  ', 'veg', '70', 'Cheese Corn Sandwich.jpg', '1', '1', 777),
(93, '37', 'Boiled Egg Sandwich', '  ', 'nonveg', '75', 'Boiled Egg Sandwich.jpg', '1', '1', 777),
(94, '37', 'Fried Egg Sandwich', '  ', 'nonveg', '80', 'Fried Egg Sandwich.jpg', '1', '1', 777),
(95, '37', 'Club Sandwich', '  ', 'nonveg', '75', 'Club Sandwich.jpeg', '1', '1', 777),
(96, '37', 'Chicken Sandwich', '  ', 'nonveg', '75', 'Chicken Sandwich.jpg', '1', '1', 777),
(97, '37', 'Grilled Cheese Chicken Sandwich', '  ', 'nonveg', '85', 'Grilled Cheese Chicken Sandwich.jpg', '1', '1', 777),
(98, '37', 'Grilled Chicken Egg Sandwich', 'SANDWICH', 'veg', '85', 'Grilled Chicken Egg Sandwich.jpg', '1', '1', 777),
(99, '37', 'Grilled Chicken Salami Sandwich', 'SANDWICH', 'nonveg', '95', 'Grilled Chicken Salami Sandwich Cheese.jpg', '1', '1', 777),
(100, '37', 'Grilled Chicken Egg Salami Sandwich', 'SANDWICH', 'nonveg', '105', 'Grilled Chicken Egg Salami Sandwich Cheese.jpg', '1', '1', 777),
(101, '39', 'COLD DRINKS', 'TEST', 'veg', '100', '', '1', '1', 777);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(120) NOT NULL,
  `name` text NOT NULL,
  `tagline` text NOT NULL,
  `address` text NOT NULL,
  `working_hours` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `photo` text NOT NULL,
  `base_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name`, `tagline`, `address`, `working_hours`, `email`, `phone`, `photo`, `base_url`) VALUES
(4, 'Wekart Hotel Demo', 'Responsible Luxury', 'P 183 CIT Scheme VII(M) Kolkata 700054', '07:00 am - 11:00 pm', 'info@wekart.co.in', '8961035849 / 9874642338', 'cculr-exterior-3849-hor-clsc.jpg', 'https://wekartlab.in/ADDONS/HOTELDEMO/');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `roomno` text COLLATE utf8_unicode_ci NOT NULL,
  `customaername` text COLLATE utf8_unicode_ci NOT NULL,
  `phnumber` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` text COLLATE utf8_unicode_ci NOT NULL,
  `total` text COLLATE utf8_unicode_ci NOT NULL,
  `oid` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `roomno`, `customaername`, `phnumber`, `datetime`, `total`, `oid`) VALUES
(25, '112', 'nandinisaha077@gmail.com', '665', '10-11-2021 17:27', '180', '50,'),
(26, '440', 'arkajyoti banerjee', '9062569295', '10-11-2021 20:55', '1385', '35,37,39,45,48,49,52,'),
(27, '440', 'Arpan Mukherjee', '', '11-11-2021 10:40', '150', '53,'),
(28, '500', 'suman', 'kolkata', '09-11-2021 15:19', '1737', '25,26,'),
(29, '508', 'arpan da', 'kolkata', '03-11-2021 12:07', '200', '7,'),
(30, '708', 'Test ', 'sdfdsfdsfdsfdsfdsfdsf', '03-11-2021 13:14', '420', '8,9,'),
(31, '440', 'sfdasef', 'ewfw', '11-11-2021 18:00', '500', '55,56,57,'),
(32, '101', 'Pratik', 'Barrackpore', '12-11-2021 11:26', '1265', '58,59,60,61,62,63,64,65,66,69,70,'),
(33, '440', 'Misti', 'Dumdum', '14-11-2021 16:45', '935', '74,75,');

-- --------------------------------------------------------

--
-- Table structure for table `order_content`
--

CREATE TABLE `order_content` (
  `id` int(11) NOT NULL,
  `oid` text NOT NULL,
  `food` text NOT NULL,
  `price` text NOT NULL,
  `unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_content`
--

INSERT INTO `order_content` (`id`, `oid`, `food`, `price`, `unit`) VALUES
(1, '1', 'Momo', '120', '3'),
(2, '1', 'FrenchFries', '120', '3'),
(3, '2', 'Biriyani', '452', '4'),
(5, '4', 'Momo', '120', '1'),
(6, '5', 'Biriyani', '452', '1'),
(7, '6', 'Biriyani', '452', '1'),
(8, '7', 'Chicken ', '200', '1'),
(9, '8', 'Turtle Brownie Ice Cream Dessert', '210', '1'),
(10, '9', 'Turtle Brownie Ice Cream Dessert', '210', '1'),
(11, '10', 'drinks', '456', '1'),
(12, '11', 'Biriyani', '452', '1'),
(13, '12', 'Turtle Brownie Ice Cream Dessert', '210', '1'),
(14, '13', 'Biriyani', '452', '2'),
(15, '14', 'Cantonis Chaw', '500', '2'),
(16, '16', 'Chicken ', '200', '1'),
(17, '16', 'Momo', '120', '1'),
(18, '17', 'Food Name', '123', '1'),
(19, '18', 'Cantonis Chaw', '500', '1'),
(20, '19', 'drinks', '456', '1'),
(21, '20', 'Chicken ', '200', '2'),
(22, '20', 'Momo', '120', '2'),
(23, '20', 'FrenchFries', '120', '2'),
(24, '21', 'Chicken ', '200', '1'),
(25, '21', 'Momo', '120', '1'),
(26, '21', 'FrenchFries', '120', '1'),
(27, '22', 'Chicken ', '200', '1'),
(28, '23', 'Chicken ', '200', '1'),
(29, '23', 'FrenchFries', '120', '1'),
(30, '24', 'Momo', '120', '2'),
(31, '25', 'Food Name', '123', '1'),
(32, '25', 'drinks', '456', '2'),
(33, '25', 'sdfdf', '123', '2'),
(34, '26', 'drinks', '456', '1'),
(35, '27', 'sdfdf', '123', '1'),
(36, '27', 'Food Name', '123', '1'),
(37, '28', 'Cantonis Chaw', '500', '1'),
(38, '29', 'Cantonis Chaw', '500', '3'),
(105, '33', 'Double Aloo Kathi Roll', '35', '1'),
(106, '33', 'Aloo Egg Kathi Roll', '40', '1'),
(107, '33', 'Double Aloo Egg Kathi Roll', '40', '1'),
(108, '34', 'Aloo Kathi Roll', '30', '1'),
(109, '34', 'Double Aloo Kathi Roll', '35', '1'),
(110, '34', 'Aloo Egg Kathi Roll', '40', '1'),
(111, '34', 'Double Aloo Egg Kathi Roll', '40', '1'),
(112, '34', 'Egg Roll', '30', '1'),
(113, '34', 'Double Egg Roll', '35', '1'),
(114, '35', 'Veg Fried Rice/Noodles With Veg Manchurian', '100', '1'),
(115, '35', 'Veg Fried Rice/Noodles With Chilli Paneer', '110', '1'),
(116, '36', 'Veg Momo (Steamed)', '45', '1'),
(117, '36', 'Veg Momo (Fried)', '50', '1'),
(118, '37', 'Schezwan  Chicken (Half)', '85', '1'),
(119, '37', 'Chicken Manchurian (Full)', '150', '1'),
(120, '38', 'Fried Chicken Wings + Chicken Fried Rice/Noodles With Chilli Chicken', '220', '2'),
(121, '39', 'Egg Hakka Noodles', '65', '2'),
(122, '40', 'French Fries', '55', '1'),
(123, '41', 'Aloo Kathi Roll', '30', '1'),
(124, '43', 'Chicken Fried Rice/Noodles With Chilli Chicken', '145', '1'),
(125, '44', 'Aloo Kati Roll', '30', '1'),
(126, '44', 'Egg Mutton Kati Roll', '85', '1'),
(127, '45', 'Aloo Kati Roll', '30', '4'),
(128, '46', 'French Fries', '55', '3'),
(129, '47', 'Fish Finger', '100', '1'),
(130, '48', 'Burnt Garlic Chicken Hakka Rice', '95', '2'),
(131, '49', 'Schezwan Chicken Hakka Rice', '95', '1'),
(132, '50', 'Fish Spring Roll ', '90', '2'),
(133, '51', 'Aloo Kati Roll', '30', '1'),
(134, '52', 'Onion Cheese Roll', '35', '1'),
(135, '52', 'Chicken Kati Roll', '60', '1'),
(136, '52', 'Egg Chicken Cheese Kati Roll', '80', '2'),
(137, '52', 'Double Egg Chicken Kati Roll', '75', '2'),
(138, '53', 'Chicken Manchurian (Full)', '150', '1'),
(139, '54', 'Aloo Kati Roll', '30', '1'),
(140, '55', 'Aloo Kati Roll', '30', '3'),
(141, '56', 'French Fries', '55', '1'),
(142, '56', 'Crispy Chilli Babycorn', '75', '1'),
(143, '57', 'Double Aloo Egg Kati Roll', '40', '7'),
(144, '58', 'Aloo Kati Roll', '30', '1'),
(145, '59', 'Aloo Kati Roll', '30', '2'),
(146, '60', 'Double Aloo Kati Roll', '35', '6'),
(147, '61', 'Egg Chicken Kati Roll', '70', '2'),
(148, '62', 'Paneer Roll', '60', '6'),
(149, '63', 'Paneer Roll', '60', '1'),
(150, '64', 'Double Egg Roll', '35', '3'),
(151, '65', 'Egg Roll', '30', '1'),
(152, '66', 'Paneer Roll', '60', '1'),
(153, '67', 'Onion Cheese Roll', '35', '1'),
(154, '68', 'Double Egg Roll', '35', '3'),
(155, '69', 'Double Egg Roll', '35', '4'),
(156, '70', 'Onion Cheese Roll', '35', '2'),
(157, '71', 'Aloo Kati Roll', '30', '1'),
(158, '72', 'Veg Momo (Steamed)', '45', '1'),
(159, '72', 'Veg Momo (Fried)', '50', '1'),
(160, '72', 'Veg Momo (Pan Fried)', '55', '2'),
(161, '73', 'French Fries', '55', '1'),
(162, '73', 'Crispy Chilli Babycorn', '75', '1'),
(163, '74', 'Veg Momo (Steamed)', '45', '1'),
(164, '74', 'Veg Momo (Fried)', '50', '1'),
(165, '74', 'Veg & Cheese (Fried)', '55', '1'),
(166, '74', 'Veg & Cheese (Steamed)', '50', '1'),
(167, '74', 'Veg Momo (Pan Fried)', '55', '1'),
(168, '75', 'Schezwan Chicken Hakka Rice', '95', '4'),
(169, '75', 'Chilli Chicken (Full)', '150', '2'),
(170, '76', 'Paneer Cheese Roll', '70', '1'),
(171, '77', 'Aloo Kati Roll', '30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(120) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL,
  `roomno` text NOT NULL,
  `total` text NOT NULL,
  `status` text NOT NULL,
  `order_status` text NOT NULL,
  `mark` text NOT NULL,
  `timeoforder` text NOT NULL,
  `timeofapprove` text NOT NULL,
  `timeofdelivery` text NOT NULL,
  `paid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `name`, `phone`, `message`, `roomno`, `total`, `status`, `order_status`, `mark`, `timeoforder`, `timeofapprove`, `timeofdelivery`, `paid`) VALUES
(1, 'Suman Ghorai', '8910518989', 'Hello ????', '108', '720', '1', '4', '0', '02-11-2021 15:37', '02-11-2021 17:42', '02-11-2021 17:41', '1'),
(2, 'Suman Ghorai', '8910518989', 'Hello ????', '108', '1808', '1', '3', '0', '02-11-2021 15:50', '02-11-2021 17:30', '02-11-2021 17:31', '1'),
(4, 'Nandini S.', '09830269431', 'Asap', '-2', '120', '1', '1', '0', '03-11-2021 11:06', '', '', '1'),
(5, 'Nandini S.', '09830269431', '', '105', '452', '1', '2', '0', '03-11-2021 12:03', '09-11-2021 15:30', '', '1'),
(6, 'Nandini S.', '09830269431', 'Asap', '105', '452', '1', '4', '0', '03-11-2021 12:05', '', '09-11-2021 15:30', '1'),
(7, 'Nandini S.', '09830269431', '', '508', '200', '1', '2', '0', '03-11-2021 12:07', '09-11-2021 15:32', '', '1'),
(8, 'Nandini S.', '09830269431', 'Asap', '708', '210', '1', '4', '0', '03-11-2021 13:13', '', '09-11-2021 17:35', '1'),
(9, 'Nandini S.', '09830269431', 'Asap', '708', '210', '1', '4', '0', '03-11-2021 13:14', '09-11-2021 17:35', '09-11-2021 17:35', '1'),
(10, 'Nandini S.', '09830269431', '', '208', '456', '1', '2', '0', '03-11-2021 13:48', '09-11-2021 17:35', '', '1'),
(11, 'Nandini S.', '09830269431', '', '208', '452', '1', '2', '0', '03-11-2021 13:49', '03-11-2021 14:03', '', '1'),
(12, 'Nandini S.', '09830269431', 'Asdghj', '108', '210', '1', '3', '0', '03-11-2021 14:00', '', '03-11-2021 14:02', '1'),
(13, 'Suman Ghorai', '89101518989', 'As soon as possible', '101', '904', '1', '3', '0', '08-11-2021 10:46', '08-11-2021 10:48', '08-11-2021 10:48', '1'),
(14, 'PRATIK PATHAK', '09874539046', 'as soon as possible', '1203', '1000', '1', '3', '0', '09-11-2021 12:51', '09-11-2021 12:53', '09-11-2021 12:54', '1'),
(16, 'Rahul ', '9874642338', '', '101', '320', '1', '0', '0', '09-11-2021 13:11', '', '', '1'),
(17, 'Nandini S.', '09830269431', '', '207', '123', '1', '4', '0', '09-11-2021 14:59', '', '09-11-2021 17:35', '1'),
(18, 'Nandini S.', '09830269431', '', '207', '500', '1', '2', '0', '09-11-2021 15:01', '09-11-2021 17:38', '09-11-2021 17:38', '1'),
(19, 'Nandini S.', '09830269431', '', '207', '456', '1', '2', '0', '09-11-2021 15:01', '09-11-2021 17:38', '', '1'),
(20, 'Nandini S.', '09830269431', '', '207', '880', '1', '1', '0', '09-11-2021 15:02', '09-11-2021 17:38', '', '1'),
(21, 'Nandini S.', '09830269431', '', '207', '440', '1', '4', '0', '09-11-2021 15:03', '', '09-11-2021 17:38', '1'),
(22, 'Nandini S.', '09830269431', '', '207', '200', '1', '4', '0', '09-11-2021 15:03', '', '09-11-2021 17:38', '1'),
(23, 'Nandini S.', '09830269431', '', '207', '320', '1', '2', '0', '09-11-2021 15:03', '09-11-2021 17:38', '', '1'),
(24, 'Nandini S.', '09830269431', '', '207', '240', '1', '2', '0', '09-11-2021 15:05', '09-11-2021 15:18', '', '1'),
(25, 'Soumen', '', '', '500', '1281', '1', '4', '0', '09-11-2021 15:19', '', '09-11-2021 17:38', '1'),
(26, 'Nandini S.', '09830269431', '', '500', '456', '1', '2', '0', '09-11-2021 15:19', '09-11-2021 17:46', '', '1'),
(27, 'Nandini S.', '09830269431', '', '101', '246', '1', '2', '0', '09-11-2021 15:25', '10-11-2021 10:53', '10-11-2021 10:52', '1'),
(28, 'Tom cruise', '9146078289', 'Na', '101', '500', '1', '3', '0', '09-11-2021 15:25', '10-11-2021 10:51', '10-11-2021 10:51', '1'),
(29, '...', '', '', '101', '1500', '1', '2', '0', '09-11-2021 15:25', '09-11-2021 15:26', '', '1'),
(33, 'Suman Ghorai', '8910518989', 'As soon as possible ????', '101', '115', '1', '4', '0', '10-11-2021 09:43', '10-11-2021 09:49', '', '1'),
(34, 'Test', '8910518989', 'Send Successfully', '207', '210', '1', '4', '0', '10-11-2021 10:38', '12-11-2021 15:33', '', '1'),
(35, 'HOTEL', '1234567890', 'no spice', '440', '210', '1', '2', '0', '10-11-2021 11:19', '10-11-2021 11:58', '', '1'),
(36, 'ISHANI SAHA', '9830269431', 'Asap', '101', '95', '1', '4', '0', '10-11-2021 11:34', '', '10-11-2021 16:43', '1'),
(37, 'Arpan', '6633558523', 'test', '440', '235', '1', '2', '0', '10-11-2021 12:25', '10-11-2021 16:44', '', '1'),
(38, 'Arpan Mukherjee', '9477072432', '', '440', '440', '1', '4', '0', '10-11-2021 15:05', '10-11-2021 17:19', '', '1'),
(39, 'Arpan Mukherjee', '9555565808', '', '440', '130', '1', '2', '0', '10-11-2021 15:08', '10-11-2021 16:50', '', '1'),
(40, 'Himani saha', '9830269431', 'Study', '101', '55', '1', '2', '0', '10-11-2021 15:09', '10-11-2021 16:50', '', '1'),
(41, 'A', '2669', 'Ha h do', '101', '30', '1', '2', '0', '10-11-2021 15:11', '10-11-2021 16:50', '', '1'),
(42, 'A', '2669', 'Ha h do', '101', '0', '1', '2', '0', '10-11-2021 15:11', '10-11-2021 16:50', '', '1'),
(43, 'Ei gg', '9', 'Class', '101', '145', '1', '3', '0', '10-11-2021 15:11', '', '10-11-2021 16:24', '1'),
(44, 'ISHANI SAHA', '9865325588', 'Jsggs', '101', '115', '1', '2', '0', '10-11-2021 16:39', '10-11-2021 16:49', '', '1'),
(45, 'Arpan Mukherjee', '944', '', '440', '120', '1', '4', '0', '10-11-2021 16:40', '', '10-11-2021 16:48', '1'),
(46, 'Arpan Mukherjee', '', '', '440', '165', '1', '4', '0', '10-11-2021 17:06', '10-11-2021 17:13', '', '1'),
(47, 'Aarshi Bandyopadhyay', '565565566', 'DJ j DH h', '101', '100', '1', '2', '0', '10-11-2021 17:12', '10-11-2021 17:13', '', '1'),
(48, 'Arpan Mukherjee', '', '', '440', '190', '1', '0', '0', '10-11-2021 17:26', '', '', '1'),
(49, 'Arpan Mukherjee', '', '', '440', '95', '1', '1', '0', '10-11-2021 17:26', '', '', '1'),
(50, 'nandinisaha077@gmail.com', '665', 'Ch Ch g do', '112', '180', '1', '2', '0', '10-11-2021 17:27', '11-11-2021 17:15', '', '1'),
(51, '...', '', '', '101', '30', '1', '4', '0', '10-11-2021 17:40', '11-11-2021 17:14', '11-11-2021 17:14', '1'),
(52, 'arkajyoti banerjee', '9062569295', 'Complementary kore de bhai eta', '440', '405', '1', '3', '0', '10-11-2021 20:55', '10-11-2021 20:56', '10-11-2021 20:57', '1'),
(53, 'Arpan Mukherjee', '', '', '440', '150', '1', '2', '0', '11-11-2021 10:40', '11-11-2021 17:14', '', '1'),
(54, 'arnab sarkar', '', '', '440', '30', '1', '1', '0', '11-11-2021 15:57', '', '', '1'),
(55, 'RG Royal Hotel', '', '', '440', '90', '1', '0', '0', '11-11-2021 17:44', '', '', '1'),
(56, 'XYZ', '9874563210', 'mnhgmhgfhj', '440', '130', '1', '2', '0', '11-11-2021 17:56', '11-11-2021 17:58', '', '1'),
(57, 'FIXLINE TRANSPORT SERVICES PVT LTD', '6456456546', '4234234322234', '440', '280', '1', '0', '0', '11-11-2021 18:00', '', '', '1'),
(58, 'Arpan Mukherjee', '', '', '101', '30', '1', '3', '0', '12-11-2021 10:40', '12-11-2021 10:44', '12-11-2021 10:45', '1'),
(59, 'Suman Ghorai', '8910518989', 'Bzbzhjz', '101', '60', '1', '0', '0', '12-11-2021 10:53', '', '', '1'),
(60, 'Sjjsjs', '8919494997', 'Bababba', '101', '210', '1', '0', '0', '12-11-2021 10:55', '', '', '1'),
(61, 'Arpan Mukherjee', '', '', '101', '140', '1', '2', '0', '12-11-2021 10:58', '12-11-2021 11:17', '', '1'),
(62, 'Suman Ghorai', '', '', '101', '360', '1', '3', '0', '12-11-2021 11:11', '12-11-2021 15:17', '12-11-2021 15:17', '1'),
(63, 'Suman Ghorai', '', '', '101', '60', '1', '3', '0', '12-11-2021 11:11', '12-11-2021 15:17', '12-11-2021 15:17', '1'),
(64, 'Suman Ghorai', '', '', '101', '105', '1', '3', '0', '12-11-2021 11:12', '12-11-2021 15:16', '12-11-2021 15:17', '1'),
(65, 'Suman Ghorai', '', '', '101', '30', '1', '3', '0', '12-11-2021 11:19', '12-11-2021 15:15', '12-11-2021 15:16', '1'),
(66, 'Suman Ghorai', '', '', '101', '60', '1', '3', '0', '12-11-2021 11:20', '12-11-2021 15:15', '12-11-2021 15:15', '1'),
(67, 'Suman Ghorai', '', '', '101', '35', '1', '4', '0', '12-11-2021 11:20', '12-11-2021 14:07', '', '1'),
(68, 'Suman Ghorai', '', '', '101', '105', '1', '4', '0', '12-11-2021 11:22', '12-11-2021 14:07', '', '1'),
(69, 'Suman Ghorai', '', '', '101', '140', '1', '2', '0', '12-11-2021 11:25', '12-11-2021 14:07', '', '1'),
(70, 'Suman Ghorai', '', '', '101', '70', '1', '3', '0', '12-11-2021 11:26', '12-11-2021 11:33', '12-11-2021 15:33', '1'),
(71, 'Aarshi Bandyopadhyay', '', '', '101', '30', '1', '3', '0', '12-11-2021 15:39', '12-11-2021 23:04', '15-11-2021 10:28', '0'),
(72, 'PRATIK PATHAK', '9874539046', 'Test', '101', '205', '1', '2', '0', '12-11-2021 20:17', '12-11-2021 20:25', '', '1'),
(73, 'Nandini  Saha', '9830269431', 'ASAP', '108', '130', '1', '0', '0', '13-11-2021 00:24', '', '', '0'),
(74, 'Srayashi Shome', '9775080732', 'Spicy', '440', '255', '1', '0', '0', '14-11-2021 16:43', '', '', '1'),
(75, 'Ishika Banerjee', '', 'make it non spicy', '440', '680', '1', '3', '0', '14-11-2021 16:45', '14-11-2021 16:49', '14-11-2021 16:50', '1'),
(76, 'Nandini  Saha', '9830269431', 'ASAP', '107', '70', '1', '3', '0', '15-11-2021 09:25', '', '15-11-2021 10:26', '0'),
(77, 'P.P', '9874539046', 'No thanks', '101', '30', '1', '3', '0', '15-11-2021 10:52', '15-11-2021 10:52', '15-11-2021 10:53', '0');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `status` text NOT NULL,
  `room` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `url`, `status`, `room`) VALUES
(9, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=eHUydTBUZk1Ta3dTdkhkUzVtYWFrdz09', '1', '101'),
(10, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=RHJsZ29oaVJOWHJDSURhd1JiSjVOUT09', '0', '401'),
(11, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=S2xTcDJUczl6K2NPUVZoUk91MXI4Zz09', '0', '440'),
(12, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=OVd5ZWxhWGFQMXk2SzZQSjdEKzU2dz09', '0', '2'),
(13, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=Ly9wSzhvWHUzTDZPQWxudEVKVE1Idz09', '1', '201'),
(14, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=djNqTjNMTUd2UllicXhiSXBjekZLUT09', '0', '801'),
(15, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=dUErOEhXQmRLUnYwSWtwd1kzNndQZz09', '0', '102'),
(16, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=MlppTjJRVUt3dEU1bjdhUWU0dWo1Zz09', '1', '656'),
(17, 'SMART QR CODE SERVICES?room_no=b0VSRnFKVkJnNFRwTlpnWDZQYVJsQT09', '1', '502'),
(18, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=amgyT0JBUUxxVVV5TlU3RVBUNVdQdz09', '1', '108'),
(20, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=ZDAwZ0dFVWU2WGQ4WXFtSGpNbkdVZz09', '1', '208'),
(23, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=OGViUkVKaUlEY1l4U1NiSVNXQStXdz09', '1', '105'),
(24, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=U3M5c0tKWk1JR3hURGlSeC9RazBpUT09', '1', '508'),
(25, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=QUdQOU9DK0R3dFNhVkpTaDQ4RU9nQT09', '1', '708'),
(26, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=R1FqUUFvUnN2MDgxLzE5WDY3SC9ZZz09', '1', '1203'),
(27, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=eFVYcWR1dE43bmRBRlkzZElMR1RsUT09', '1', '7899'),
(28, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=WG9rd2p4aks3S1ZYZmZFb2RsWUNEQT09', '1', '207'),
(29, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=YXV6OHVvWEhML2xucGpaQktHbUl3QT09', '0', '500'),
(30, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=OHRFK3ZhNE00Y29kM25VRjIxNHo3QT09', '1', '107'),
(31, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=Z2dqNnFPU1ZEeE1yQUhKYWZKWVJ3Zz09', '1', '112'),
(32, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=WjA2eHMzWFZCR1FCc3ZKZnJwM1FOUT09', '1', '507'),
(33, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=YU9iQlBZVVYvS0prL2pORFo3ekdldz09', '1', '501'),
(34, 'SMART QR CODE SERVICES?room_no=bkdxY29NUER4QWhiamNKN2MzWWVZZz09', '1', '789'),
(35, 'SMART QR CODE SERVICES?room_no=Q2s2N29ZV1dJNVhFclNjeEVnRkJidz09', '1', '258'),
(36, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=ZEZlKy9RNWsxNWhqSlBoNDFYL0ErQT09', '1', '4561'),
(37, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=d3Y1NFpVODN2R1dMKzJsclVwMEhGdz09', '1', '13131'),
(38, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=Yy81dHZSOFkwa1VMYndMR0Jybmd2dz09', '1', '9877'),
(39, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=U015YitCOWNHdjlNSVY1bkFjWmk1UT09', '1', '6788'),
(40, 'https://wekartlab.in/ADDONS/HOTELDEMO/?room_no=QlI4QWpaQlNrWFNlb1BDN3lUTitpQT09', '1', '2336');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(120) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `checkin` text COLLATE utf8_unicode_ci NOT NULL,
  `checkout` text COLLATE utf8_unicode_ci NOT NULL,
  `roomno` text COLLATE utf8_unicode_ci NOT NULL,
  `roomtype` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `phone`, `address`, `price`, `checkin`, `checkout`, `roomno`, `roomtype`) VALUES
(1, 'name', 'mobile', 'address', 'cost', 'checkin', 'checkout', 'room', ''),
(2, 'Suman Ghorai', '8910518989', 'kolkata', '7894', '2021-11-10', '2021-11-10', '702', ''),
(3, 'Pratik Pathak', '9874539046', 'BKP', '2000', '2021-11-10', '2021-11-11', '101', ''),
(4, 'Nandini S.', '09830269431', 'Flat no. T3, Balaji Classic 2,', '999', '2021-11-09', '2021-11-10', '107', ''),
(7, 'PRATIK PATHAK', '09874539046', 'BARASAT ROAD', '5000', '2021-11-10', '2021-11-12', '502', ''),
(8, 'Nandini S.', '09830269431', 'Flat no. T3, Balaji Classic 2,', '2999', '2021-11-08', '2021-11-11', '507', ''),
(9, 'PRATIK PATHAK', '09874539046', 'BARASAT ROAD', '5000', '2021-11-01', '2021-11-02', '101', ''),
(10, 'admin', '08900000000', 'asassa asdasasdasd', '2000', '2021-11-16', '2021-11-16', '101', 'Double Room');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_content`
--
ALTER TABLE `order_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_content`
--
ALTER TABLE `order_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
