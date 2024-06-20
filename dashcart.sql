-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 08:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `a_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL COMMENT 'foreign key(admin column id)',
  `img` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`a_id`, `m_id`, `img`, `name`, `country`, `state`, `phone_number`) VALUES
(1, 1, '', 'Aniket', 84, 12, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `pass` varchar(1000) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `pass`, `created_time`) VALUES
(1, 'aniketadak148@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-08-19 16:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `publish` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `img`, `title`, `content`, `publish`) VALUES
(2, '1662828014b38b9220-1ac9-11ec-afb3-600f58584473.webp', 'US authorities recover $30 million', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!', '2022-09-10 22:10:15'),
(3, '166282809770335340-1ad9-11ec-bbd6-16a028aa88b2.webp', 'Apple iPad mini is $100 off', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!', '2022-09-10 22:11:37'),
(4, '1662866978chemical-finishing-on-fabrics.jpg', 'Different Types Of Chemical Finishing Process', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque libero repellat praesentium soluta quia porro. Tenetur corrupti iure nobis repellat architecto sapiente corporis? Vitae animi quos, ea est quaerat nihil.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!', '2022-09-11 08:59:38'),
(5, '1662867097image-0-0.jpg', 'The Booker Prize shortlist revealed', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque libero repellat praesentium soluta quia porro. Tenetur corrupti iure nobis repellat architecto sapiente corporis? Vitae animi quos, ea est quaerat nihil.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!', '2022-09-11 09:01:37'),
(6, '1662873696image-0-0_1.jpg', 'Our picks for the best biographies', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque libero repellat praesentium soluta quia porro. Tenetur corrupti iure nobis repellat architecto sapiente corporis? Vitae animi quos, ea est quaerat nihil.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo dicta consectetur, a autem ipsa atque repellendus sint temporibus voluptatem quasi ducimus repudiandae itaque et molestias neque maiores, necessitatibus delectus non!', '2022-09-11 09:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_img` text NOT NULL,
  `categories` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `tags` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_img`, `categories`, `parent_id`, `tags`, `status`, `created_time`) VALUES
(1, '', 'Clothing', 0, 'Menswear,Ladieswear,Kidswear', 1, '2022-08-20 22:16:05'),
(2, '', 'Books', 0, 'Novels,Journals', 1, '2022-08-20 22:16:05'),
(3, '', 'Bags', 0, 'School bag, Luggage etc', 1, '2022-08-20 22:16:05'),
(4, '', 'Gadgets & Devices', 0, 'Mobiles, Laptop, Computers', 1, '2022-08-20 22:16:05'),
(5, '', 'Accessories', 0, 'Bottle, Shades, tables etc', 1, '2022-08-20 22:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `c_id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`c_id`, `country`) VALUES
(1, 'Albania'),
(2, 'Algeria'),
(3, 'Andorra'),
(4, 'Angola'),
(5, 'Anguilla'),
(6, 'Antarctica'),
(7, 'Antigua'),
(8, 'Antilles'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Aruba'),
(12, 'Australia'),
(13, 'Austria'),
(14, 'Azerbaijan'),
(15, 'Bahamas'),
(16, 'Bangladesh'),
(17, 'Barbados'),
(18, 'Belarus'),
(19, 'Belgium'),
(20, 'Belize'),
(21, 'Benin'),
(22, 'Bermuda'),
(23, 'Bhutan'),
(24, 'Bolivia'),
(25, 'Bosnia'),
(26, 'Botswana'),
(27, 'Brazil'),
(28, 'Brunei'),
(29, 'Bulgaria'),
(30, 'Burkina Faso'),
(31, 'Burundi'),
(32, 'Cambodia'),
(33, 'Cameroon'),
(34, 'Canada'),
(35, 'Cape Verde'),
(36, 'Cayman Islands'),
(37, 'Central Africa'),
(38, 'Chad'),
(39, 'Chile'),
(40, 'China'),
(41, 'Colombia'),
(42, 'Comoros'),
(43, 'Congo'),
(44, 'Cook Islands'),
(45, 'Costa Rica'),
(46, 'Cote D\'Ivoire'),
(47, 'Croatia'),
(48, 'Cuba'),
(49, 'Cyprus'),
(50, 'Czech Republic'),
(51, 'Denmark'),
(52, 'Djibouti'),
(53, 'Dominica'),
(54, 'Dominican Rep.'),
(55, 'Ecuador'),
(56, 'Egypt'),
(57, 'El Salvador'),
(58, 'Eritrea'),
(59, 'Estonia'),
(60, 'Ethiopia'),
(61, 'Fiji'),
(62, 'Finland'),
(63, 'Falkland Islands'),
(64, 'France'),
(65, 'Gabon'),
(66, 'Gambia'),
(67, 'Georgia'),
(68, 'Germany'),
(69, 'Ghana'),
(70, 'Gibraltar'),
(71, 'Greece'),
(72, 'Greenland'),
(73, 'Grenada'),
(74, 'Guam'),
(75, 'Guatemala'),
(76, 'Guiana'),
(77, 'Guinea'),
(78, 'Guyana'),
(79, 'Haiti'),
(80, 'Hondoras'),
(81, 'Hong Kong'),
(82, 'Hungary'),
(83, 'Iceland'),
(84, 'India'),
(85, 'Indonesia'),
(86, 'Iran'),
(87, 'Iraq'),
(88, 'Ireland'),
(89, 'Israel'),
(90, 'Italy'),
(91, 'Jamaica'),
(92, 'Japan'),
(93, 'Jordan'),
(94, 'Kazakhstan'),
(95, 'Kenya'),
(96, 'Kiribati'),
(97, 'Korea'),
(98, 'Kyrgyzstan'),
(99, 'Lao'),
(100, 'Latvia'),
(101, 'Lesotho'),
(102, 'Liberia'),
(103, 'Liechtenstein'),
(104, 'Lithuania'),
(105, 'Luxembourg'),
(106, 'Macau'),
(107, 'Macedonia'),
(108, 'Madagascar'),
(109, 'Malawi'),
(110, 'Malaysia'),
(111, 'Maldives'),
(112, 'Mali'),
(113, 'Malta'),
(114, 'Marshal Islands'),
(115, 'Martinique'),
(116, 'Mauritania'),
(117, 'Mauritius'),
(118, 'Mayotte'),
(119, 'Mexico'),
(120, 'Micronesia'),
(121, 'Moldova'),
(122, 'Monaco'),
(123, 'Mongolia'),
(124, 'Montserrat'),
(125, 'Morocco'),
(126, 'Mozambique'),
(127, 'Myanmar'),
(128, 'Namibia'),
(129, 'Nauru'),
(130, 'Nepal'),
(131, 'Netherlands'),
(132, 'New Caledonia'),
(133, 'New Guinea'),
(134, 'New Zealand'),
(135, 'Nicaragua'),
(136, 'Nigeria'),
(137, 'Niue'),
(138, 'Norfolk Island'),
(139, 'Norway'),
(140, 'Palau'),
(141, 'Panama'),
(142, 'Paraguay'),
(143, 'Peru'),
(144, 'Puerto'),
(145, 'Philippines'),
(146, 'Poland'),
(147, 'Polynesia'),
(148, 'Portugal'),
(149, 'Romania'),
(150, 'Russia'),
(151, 'Rwanda'),
(152, 'Saint Lucia'),
(153, 'Samoa'),
(154, 'San Marino'),
(155, 'Senegal'),
(156, 'Seychelles'),
(157, 'Sierra Leone'),
(158, 'Singapore'),
(159, 'Slovakia'),
(160, 'Slovenia'),
(161, 'Somalia'),
(162, 'South Africa'),
(163, 'Spain'),
(164, 'Sri Lanka'),
(165, 'St. Helena'),
(166, 'Sudan'),
(167, 'Suriname'),
(168, 'Swaziland'),
(169, 'Sweden'),
(170, 'Switzerland'),
(171, 'Taiwan'),
(172, 'Tajikistan'),
(173, 'Tanzania'),
(174, 'Thailand'),
(175, 'Togo'),
(176, 'Tokelau'),
(177, 'Tonga'),
(178, 'Trinidad'),
(179, 'Tunisia'),
(180, 'Turkey'),
(181, 'Uganda'),
(182, 'Ukraine'),
(183, 'United Kingdom'),
(184, 'United States'),
(185, 'Uruguay'),
(186, 'Uzbekistan'),
(187, 'Vanuatu'),
(188, 'Venezuela'),
(189, 'Vietnam'),
(190, 'Virgin Islands'),
(191, 'Yugoslavia'),
(192, 'Zaire'),
(193, 'Zambia'),
(194, 'Zimbabwe'),
(195, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `c_img` varchar(500) NOT NULL,
  `coupon_code` varchar(500) NOT NULL,
  `percent` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `c_img`, `coupon_code`, `percent`, `created_time`) VALUES
(1, '166334811550-coupon-promotion-sale-website-260nw-2039676860.webp', 'PRO-coupon-2ede5b', 50, '2022-09-16 22:38:35'),
(2, '1663348448coupon.jpg', 'PRO-coupon-30da48', 10, '2022-09-16 22:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `gst_components`
--

CREATE TABLE `gst_components` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst_components`
--

INSERT INTO `gst_components` (`id`, `title`, `percent`) VALUES
(1, 'igst', 5),
(2, 'cgst', 2.5),
(3, 'sgst', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_group_code` text NOT NULL,
  `net_total` float NOT NULL,
  `is_coupon` int(11) DEFAULT NULL,
  `coupon_id` varchar(11) DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `user_id`, `order_group_code`, `net_total`, `is_coupon`, `coupon_id`, `created_time`) VALUES
(5, 4, 'PRO-GROUP-ORDERd425f491cba', 90750, 0, '0', '2022-10-09 16:51:00'),
(6, 6, 'PRO-GROUP-ORDER2e06130f350', 210100, 0, '0', '2022-06-09 17:02:32'),
(7, 4, 'PRO-GROUP-ORDER9d69af379c2', 29700, 0, '0', '2022-10-09 17:19:25'),
(8, 5, 'PRO-GROUP-ORDER24e2a02d8a2', 135000, 1, '2', '2022-10-13 17:27:19'),
(9, 4, 'PRO-GROUP-ORDER3b033a2a3a7', 17400, 1, '1', '2022-10-09 17:37:06'),
(10, 4, 'PRO-GROUP-ORDER1500545cc1f', 1210, 0, '0', '2022-10-13 22:38:53'),
(11, 5, 'PRO-GROUP-ORDERe78506804d3', 27900, 1, '1', '2022-04-12 22:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `po_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL COMMENT 'foreign key for order from orders table',
  `product_name` varchar(500) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`po_id`, `o_id`, `product_name`, `product_img`, `product_quantity`, `product_price`, `create_time`) VALUES
(12, 5, 'Raavan', '1662295932download_4.jpg', 10, 900, '2022-10-09 16:51:00'),
(13, 5, 'Office bag', '1662296004download_7.jpg', 5, 1200, '2022-10-09 16:51:00'),
(14, 5, 'Exclusive water proof headphone', '1662296524images_5.jpg', 15, 900, '2022-10-09 16:51:00'),
(15, 5, 'One plus 9 ', '1662296731download_s2.jpg', 2, 27000, '2022-10-09 16:51:00'),
(16, 6, 'Kalamkari', '1662296233pexels-photo-2933636.jpeg', 4, 1500, '2022-06-09 17:02:32'),
(17, 6, 'Luggage', '1662296035download_8.jpg', 20, 850, '2022-06-09 17:02:32'),
(18, 6, 'Office bag', '1662296004download_7.jpg', 50, 1200, '2022-06-09 17:02:32'),
(19, 6, 'One plus 9 ', '1662296731download_s2.jpg', 4, 27000, '2022-06-09 17:02:32'),
(20, 7, 'Office bag', '1662296004download_7.jpg', 5, 1200, '2022-10-09 17:19:25'),
(21, 7, 'Call center headphone', '1662296558download_12.jpg', 15, 1400, '2022-10-09 17:19:25'),
(22, 8, 'Meluha', '1662295909download_3.jpg', 20, 500, '2022-10-09 17:27:19'),
(23, 8, 'Call center headphone', '1662296558download_12.jpg', 5, 1400, '2022-10-09 17:27:19'),
(24, 8, 'Samsung F13', '1662296658download_s1.jpg', 10, 1900, '2022-10-09 17:27:19'),
(25, 8, 'Raymond', '1662296268pexels-photo-5503173.jpeg', 20, 4500, '2022-10-09 17:27:19'),
(26, 8, 'Exclusive water proof headphone', '1662296524images_5.jpg', 10, 900, '2022-10-09 17:27:19'),
(27, 9, 'One plus 9 ', '1662296731download_s2.jpg', 1, 27000, '2022-10-09 17:37:06'),
(28, 9, 'Digital print', '1662296198pexels-photo-2828584.jpeg', 1, 600, '2022-10-09 17:37:06'),
(29, 9, 'Suheldev', '1662295958download_2.jpg', 1, 1400, '2022-10-09 17:37:06'),
(30, 0, 'Nagas', '1662275097download_5.jpg', 1, 1100, '2022-10-13 22:28:30'),
(31, 0, 'Nagas', '1662275097download_5.jpg', 1, 1100, '2022-10-13 22:31:17'),
(32, 0, 'Nagas', '1662275097download_5.jpg', 1, 1100, '2022-10-13 22:31:19'),
(33, 10, 'Nagas', '1662275097download_5.jpg', 1, 1100, '2022-10-13 22:38:53'),
(34, 11, 'American tourister', '1661962399download_6.jpg', 15, 1600, '2022-10-13 22:41:59'),
(35, 11, 'Raavan', '1662295932download_4.jpg', 5, 900, '2022-10-13 22:42:00'),
(36, 11, 'Kalamkari', '1662296233pexels-photo-2933636.jpeg', 12, 1500, '2022-10-13 22:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_img` text DEFAULT NULL,
  `product` varchar(500) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `cat_id` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL DEFAULT 100,
  `estimated_time` varchar(500) NOT NULL,
  `product_code` varchar(500) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_img`, `product`, `product_desc`, `price`, `cat_id`, `in_stock`, `estimated_time`, `product_code`, `created_time`) VALUES
(7, '1662275097download_5.jpg', 'Nagas', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1100, 2, 99, 'Estimated 7-10 days', 'PRO-000c0c7c', '2022-08-31 21:26:51'),
(9, '1661962399download_6.jpg', 'American tourister', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1600, 3, 85, 'Estimated 15-20 days', 'PRO-000c51ce', '2022-08-31 21:43:19'),
(10, '1662295887download.jpg', 'Sita', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 700, 2, 100, 'Estimated 10-15 days', 'PRO-000a5bfc', '2022-09-04 18:21:27'),
(11, '1662295909download_3.jpg', 'Meluha', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 500, 2, 100, 'Estimated 20-25 days', 'PRO-000fe9fc', '2022-09-04 18:21:49'),
(12, '1662295932download_4.jpg', 'Raavan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 900, 2, 95, 'Estimated 7-15 days', 'PRO-0006512b', '2022-09-04 18:22:12'),
(13, '1662295958download_2.jpg', 'Suheldev', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1400, 2, 100, 'Estimated 7-10 days', 'PRO-0004e732', '2022-09-04 18:22:38'),
(14, '1662296004download_7.jpg', 'Office bag', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1200, 3, 100, 'Estimated 10-20 days', 'PRO-000b53b3', '2022-09-04 18:23:24'),
(15, '1662296035download_8.jpg', 'Luggage', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 850, 3, 100, 'Estimated 15-20 days', 'PRO-000812b4', '2022-09-04 18:23:55'),
(17, '1662296072images.jpg', 'Hand bag', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 900, 3, 100, 'Estimated 10-20 days', 'PRO-00028380', '2022-09-04 18:24:32'),
(18, '1662296104images_1.jpg', 'School bag', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 800, 3, 100, 'Estimated 20-25 days', 'PRO-000ed3d2', '2022-09-04 18:25:04'),
(19, '1662296133pexels-photo-2096624.jpeg', 'Bandhani', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1700, 1, 100, 'Estimated 7-10 days', 'PRO-000b53b3', '2022-09-04 18:25:33'),
(20, '1662296157pexels-photo-2381469.jpeg', 'Saree', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 800, 1, 100, 'Estimated 1-10 days', 'PRO-000a1d0c', '2022-09-04 18:25:57'),
(21, '1662296198pexels-photo-2828584.jpeg', 'Digital print', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 600, 1, 100, 'Estimated 20-25 days', 'PRO-00019ca1', '2022-09-04 18:26:38'),
(22, '1662296233pexels-photo-2933636.jpeg', 'Kalamkari', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1500, 1, 88, 'Estimated 7-15 days', 'PRO-00035f4a', '2022-09-04 18:27:13'),
(23, '1662296268pexels-photo-5503173.jpeg', 'Raymond', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 4500, 1, 100, 'Estimated 10-15 days', 'PRO-00098f13', '2022-09-04 18:27:48'),
(24, '1662296492download_9.jpg', 'Wireless headphones', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 800, 4, 100, 'Estimated 10-20 days', 'PRO-0003c014', '2022-09-04 18:31:32'),
(26, '1662296524images_5.jpg', 'Exclusive water proof headphone', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 900, 4, 100, 'Estimated 15-20 days', 'PRO-000d1262', '2022-09-04 18:32:04'),
(27, '1662296558download_12.jpg', 'Call center headphone', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1400, 4, 100, 'Estimated 7-15 days', 'PRO-0009802a', '2022-09-04 18:32:38'),
(28, '1662296658download_s1.jpg', 'Samsung F13', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 1900, 4, 100, 'Estimated 7-10 days', 'PRO-00067e15', '2022-09-04 18:34:18'),
(29, '1662296731download_s2.jpg', 'One plus 9 ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque fugiat praesentium error nemo dolores, esse rem. Accusamus molestiae, doloremque illum odio neque quae rerum dignissimos. Perspiciatis porro at eos minus?', 27000, 4, 100, 'Estimated 10-15 days', 'PRO-000eea9b', '2022-09-04 18:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_inquiry`
--

CREATE TABLE `product_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_inquiry`
--

INSERT INTO `product_inquiry` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'nathan', 'aniketadak148@gmail.com', 8780552358, 'I am interested in this product - One plus 9  (PRO-000eea9b). Please let me know when it is available.');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_price`
--

CREATE TABLE `shipping_price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_price`
--

INSERT INTO `shipping_price` (`id`, `price`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL COMMENT 'country foreign key',
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`s_id`, `c_id`, `state`) VALUES
(1, 84, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 84, 'ANDHRA PRADESH'),
(3, 84, 'ARUNACHAL PRADESH'),
(4, 84, 'ASSAM'),
(5, 84, 'BIHAR'),
(6, 84, 'CHATTISGARH'),
(7, 84, 'CHANDIGARH'),
(8, 84, 'DAMAN AND DIU'),
(9, 84, 'DELHI'),
(10, 84, 'DADRA AND NAGAR HAVELI'),
(11, 84, 'GOA'),
(12, 84, 'GUJARAT'),
(13, 84, 'HIMACHAL PRADESH'),
(14, 84, 'HARYANA'),
(15, 84, 'JAMMU AND KASHMIR'),
(16, 84, 'JHARKHAND'),
(17, 84, 'KERALA'),
(18, 84, 'KARNATAKA'),
(19, 84, 'LAKSHADWEEP'),
(20, 84, 'MEGHALAYA'),
(21, 84, 'MAHARASHTRA'),
(22, 84, 'MANIPUR'),
(23, 84, 'MADHYA PRADESH'),
(24, 84, 'MIZORAM'),
(25, 84, 'NAGALAND'),
(26, 84, 'ORISSA'),
(27, 84, 'PUNJAB'),
(28, 84, 'PONDICHERRY'),
(29, 84, 'RAJASTHAN'),
(30, 84, 'SIKKIM'),
(31, 84, 'TAMIL NADU'),
(32, 84, 'TRIPURA'),
(33, 84, 'UTTARAKHAND'),
(34, 84, 'UTTAR PRADESH'),
(35, 84, 'WEST BENGAL'),
(36, 84, 'TELANGANA'),
(37, 195, 'Azad Kashmir'),
(38, 195, 'Balochistan'),
(39, 195, 'Gilgit-Baltistan'),
(40, 195, 'Khyber Pakhtunkhwa'),
(41, 195, 'Punjab'),
(42, 195, 'Sindh'),
(43, 34, 'Alberta'),
(44, 34, 'British Columbia'),
(45, 34, 'Manitoba'),
(46, 34, 'New Brunswick'),
(47, 34, 'Newfoundland and Labrador'),
(48, 34, 'Northwest Territories'),
(49, 34, 'Nova Scotia'),
(50, 34, 'Nunavut'),
(51, 34, 'Ontario'),
(52, 34, 'Prince Edward Island'),
(53, 34, 'Quebec'),
(54, 34, 'Saskatchewan'),
(55, 34, 'Yukon'),
(56, 164, 'Ampara'),
(57, 164, 'Anuradhapura'),
(58, 164, 'Badulla'),
(59, 164, 'Batticaloa'),
(60, 164, 'Colombo'),
(61, 164, 'Galle'),
(62, 164, 'Gampaha'),
(63, 164, 'Hambantota'),
(64, 164, 'Jaffna'),
(65, 164, 'Kalutara'),
(66, 164, 'Kandy'),
(67, 164, 'Kegalle'),
(68, 164, 'Kilinochchi'),
(69, 164, 'Kurunegala'),
(70, 164, 'Mannar'),
(71, 164, 'Matale'),
(72, 164, 'Matara'),
(73, 164, 'Monaragala'),
(74, 164, 'Mullaitivu'),
(75, 164, 'Nuwara Eliya'),
(76, 164, 'Polonnaruwa'),
(77, 164, 'Puttalam'),
(78, 164, 'Ratnapura'),
(79, 164, 'Trincomalee'),
(80, 164, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(11) NOT NULL,
  `m_id` int(11) NOT NULL COMMENT 'foreign key for user from user_login table ',
  `name` varchar(500) NOT NULL,
  `customer_code` varchar(500) NOT NULL,
  `phone` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `pin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `m_id`, `name`, `customer_code`, `phone`, `country`, `state`, `pin`) VALUES
(4, 4, 'nathan', 'PRO-CUST-0004', 2147483647, 84, 14, '121212'),
(5, 5, 'paul', 'PRO-CUST-0005', 2147483647, 34, 51, '444'),
(6, 6, 'nando', 'PRO-CUST-0006', 2147483647, 195, 38, '753491');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email`, `pass`, `created_time`) VALUES
(4, 'nathan@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2022-10-09 08:21:05'),
(5, 'paul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-10-09 14:16:55'),
(6, 'nando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-10-09 16:52:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_components`
--
ALTER TABLE `gst_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `product_inquiry`
--
ALTER TABLE `product_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_price`
--
ALTER TABLE `shipping_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gst_components`
--
ALTER TABLE `gst_components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_inquiry`
--
ALTER TABLE `product_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_price`
--
ALTER TABLE `shipping_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD CONSTRAINT `admin_details_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `admin_login` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `countries` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
