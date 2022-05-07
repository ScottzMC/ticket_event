-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2022 at 11:38 AM
-- Server version: 10.3.34-MariaDB-log-cll-lve
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
-- Database: `scottjpq_ticket_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `category`, `image`) VALUES
(1, 'Ads 1', 'Music', 'sidebar-banner4.jpg'),
(2, 'Ads Home', 'Home', 'sidebar-banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `currency_type` varchar(10) NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `category_id`, `title`, `image`, `type`, `currency_type`, `url`) VALUES
(58, 1, 'Ludo Competition', 'Company_1-min.jpg', 'Home', 'gbp', '#'),
(69, 1, 'LUDO GAMES', 'Fish_1-min.jpg', 'Home', 'gbp', '#'),
(68, 1, 'LUDO GAMES', 'DJ_2-min.jpg', 'Home', 'gbp', '#'),
(71, 1, 'LUDO GAMES', 'Rice_3-min.jpg', 'Home', 'gbp', '#'),
(73, 1, 'Ludo', 'Company_1-min.jpg', 'Home', 'gbp', '#'),
(75, 5, 'Performers', 'usifu2.png', 'Home', 'gbp', '#'),
(76, 5, 'Performers', 'liveperformer1.png', 'Home', 'gbp', '#'),
(77, 5, 'Performers', 'liveperformer3.png', 'Home', 'gbp', '#'),
(78, 5, 'Performers', 'liveperformer2.png', 'Home', 'gbp', '#'),
(79, 6, 'JoPearl', 'jopearl_host-min.png', 'Home', 'gbp', '#'),
(80, 6, 'JoPearl', 'jopearl1.png', 'Home', 'gbp', '#'),
(81, 6, 'Lokdon', 'lokdon-min.png', 'Home', 'gbp', '#'),
(82, 5, 'DA REAL JUNIOUR', 'da_real_juniour-min.png', 'Home', 'gbp', '#'),
(83, 5, 'USIFU JALLOH', 'usifu_jalloh-min.png', 'Home', 'gbp', '#');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `business_id` int(10) NOT NULL,
  `venue_id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `company` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `video` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `business_id`, `venue_id`, `code`, `company`, `title`, `body`, `type`, `category`, `video`, `image`, `event_date`, `created_date`) VALUES
(15, 0, 1, 'GFXACXDVVBCYZEU468', '', 'Salone In The City', '<p>WE GEE DEM brings you</p><p><span style=\"font-size: 14px;\"><br></span></p><p><span style=\"font-size: 14px;\">IN THE CITY</span></p><p>The place to be after work on Friday 6th May. Hosted by The LokDon &amp; JOPEARL for the launch of this historic and Iconic event!</p><p><br></p><p>For the first time ever, Sierra Leonean music will be played in the Party Central of London, Shoreditch!!</p><p><br></p><p>Come along for a relaxing, stylish, fun and sophisticated evening of games, laughter and live music. And that’s just the start.&nbsp;</p><p><br></p><p>Join in live Ludo competitions, or play the Giant Connect 4 or another iconic game.</p><p><br></p><p>A delicious cuisine of Sierra Leonean &amp; Congolese food, will be freshly prepared by the Official London Bus Official canteen @Afriquedelick&nbsp;</p><p><br></p><p>The best DJs will warm you up as the entertainment kicks off to bring you an unforgettable party experience.&nbsp;</p><p>DJ’s On the Night&nbsp;</p><p>Nito, Hopie, Razak, Dollar&nbsp;</p><p><br></p><p>Live Performance by&nbsp;</p><p><br></p><p>Silvastone&nbsp;</p><p><br></p><p>JOOEL</p><p><br></p><p>&nbsp;</p><p><br></p><p>Take part in games, competitions, &amp; win prizes.&nbsp;</p><p><br></p><p>&nbsp;</p><p><br></p><p>Attractions on the night include</p><p><br></p><p>&nbsp;</p><p><br></p><p>&nbsp;Live DJs</p><p><br></p><p>&nbsp;Live Performances</p><p><br></p><p>Games</p><p><br></p><p>Sierra Leonean &amp; Congolese Cuisine</p><p><br></p><p>VIP Lounge</p><p><br></p><p>+ Much More</p><p><br></p><p>Club Shoreditch, 256 - 260 Old Street, EC1V 9DD</p><p><br></p><p>Doors open 5pm, Free entry before 6:30PM. LAST ENTRY at 12 Midnight</p><p>Please note; This is a recorded show &amp; purchasing a ticket gives consent to being filmed, with the content used for the sole purpose of WeGEEDEM promotions.</p><p><br></p><p>Dresscode; Stylish &amp; Comfortable - No Tracksuits, No Hoodies, No Caps or Hats&nbsp;&nbsp;</p><p><br></p><p>Essential: No ID, No Entry</p><p><br></p><p>Limited Free Tickets for Ladies</p><p><br></p><p>Birthday or Reserve Table booking available.&nbsp;</p><p><br></p><p>Contact on 07835 959 628&nbsp; IG:WeGeeDem email: don@thelokdon.com&nbsp;&nbsp;</p><p><br></p><p>IG,Snapchat,Tiktok, Twitter [] WeGeeDem&nbsp;</p><p><br></p><p>www.wegeedem.com coming soon</p>', 'gbp', 'Music', '', 'LokDon_1-min-min.png', '2022-06-03 04:00:00', '2022-05-01 23:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `events_age`
--

CREATE TABLE `events_age` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_age`
--

INSERT INTO `events_age` (`id`, `event_id`, `topic`, `image`) VALUES
(1, 14, '16', ''),
(2, 14, '17', ''),
(3, 14, '18+', '');

-- --------------------------------------------------------

--
-- Table structure for table `events_banner`
--

CREATE TABLE `events_banner` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_banner`
--

INSERT INTO `events_banner` (`id`, `event_id`, `topic`, `image`) VALUES
(2, 15, 'Concert 1', 'pexels-vishnu-r-nair-1105666.jpg'),
(3, 15, 'Concert 2', 'concert-image.jpg'),
(4, 15, 'Concert 3', 'pexels-vishnu-r-nair-1105666.jpg'),
(5, 15, 'Concert 4', 'concert-image.jpg'),
(6, 15, 'Concert 5', 'pexels-vishnu-r-nair-1105666.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events_dress_code`
--

CREATE TABLE `events_dress_code` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_dress_code`
--

INSERT INTO `events_dress_code` (`id`, `event_id`, `topic`, `image`) VALUES
(1, 14, 'Formal', ''),
(2, 14, 'Casual', ''),
(3, 14, 'Semi-formal', '');

-- --------------------------------------------------------

--
-- Table structure for table `events_last_entry`
--

CREATE TABLE `events_last_entry` (
  `id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_last_entry`
--

INSERT INTO `events_last_entry` (`id`, `event_id`, `topic`, `image`) VALUES
(1, 14, '6pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `sold` int(10) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `code`, `title`, `price`, `type`, `category`, `image1`, `sold`, `created_time`, `created_date`) VALUES
(54, 'UYFVADCECZVXXGB232', 'Ludo-Board-Cup-Cake', 4, 'All', 'Dessert', '', 0, 1651042738, '2022-04-27 06:58:58'),
(3, 'DUXBYAVC762', 'Puff-Puff', 3, 'All', 'Side', 'puffpuff-min.jpg', 0, 1628276954, '2021-07-02 21:20:16'),
(55, 'UVCGBDEFXCZAVYX985', 'Quarter-Chicken-&-Jollof-Rice', 12, 'Select', 'Meals', 'batch_6U4A8720-min.jpg', 0, 1651445045, '2022-05-01 22:44:05'),
(53, 'UXAZCYBEFGXCVVD306', 'Independence-Day-Cup-Cake', 4, 'All', 'Dessert', '', 0, 1651042712, '2022-04-27 06:58:32'),
(32, 'SKMFK090F', 'Salad', 4, 'All', 'Side', 'batch_6U4A8675.jpg', 0, 1638202132, '2021-11-29 16:08:52'),
(45, 'AFGBDYVCCZUXXVE730', 'Black-BEANS-&-Rice-with-Plantain-and-Salad', 12, 'Select', 'Vegan', 'blackbeans_rice_plantain_salad-min.jpg', 0, 1649930243, '2022-04-14 09:57:23'),
(44, 'EDVYXCCUAXBVZGF966', 'Okra-&-Rice', 12, 'Select', 'Vegan', 'okra_rice_meal_min.JPG', 0, 1649930060, '2022-04-14 09:54:20'),
(46, 'XGVUZBXCEACYDFV163', 'Jollof-Rice-&-Beef-Stew', 12, 'Select', 'Meals', 'oxtail_jollofrice1.jpg', 0, 1649930325, '2022-04-14 09:58:45'),
(47, 'CYZEVDXAVCBUFGX155', 'Quarter-Chicken', 6, 'Select', 'Side', 'Qaurter_chicken2-min.jpg', 0, 1649934950, '2022-04-14 11:15:50'),
(48, 'EXGUYCAVXCDZVBF300', 'Chicken-Wings', 6, 'Select', 'Side', 'chicken_wings-min.jpg', 0, 1649935002, '2022-04-14 11:16:42'),
(49, 'VXUGZCVBCEYAXDF135', 'Malangwa-&-Kwanga', 12, 'Select', 'Meals', 'malangwa-min.jpg', 0, 1649935065, '2022-04-14 11:17:45'),
(50, 'CCDFVXBEXUGZVAY832', 'Plantain', 2.5, 'Select', 'Side', 'plantain1-min.jpg', 0, 1649935400, '2022-04-14 11:23:20'),
(52, 'BUCXFDVXYZEVACG502', 'Jollof-Rice', 6, 'Select', 'Side', 'jollofrice4-min.JPG', 0, 1649935517, '2022-04-14 11:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `body`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `rank` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category`, `rank`) VALUES
(2, 'Vegan', 2),
(3, 'Side', 3),
(4, 'Dessert', 4),
(11, 'Meals', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `category`) VALUES
(1, 'Arts'),
(2, 'Music');

-- --------------------------------------------------------

--
-- Table structure for table `menu_seating`
--

CREATE TABLE `menu_seating` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_seating`
--

INSERT INTO `menu_seating` (`id`, `category`) VALUES
(1, 'Executive seat');

-- --------------------------------------------------------

--
-- Table structure for table `menu_status`
--

CREATE TABLE `menu_status` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `currency_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_status`
--

INSERT INTO `menu_status` (`id`, `category`, `currency_type`) VALUES
(1, 'Ludo Not Just A Game', 'gbp'),
(5, 'Performers', 'gbp'),
(6, 'Hosts', 'gbp');

-- --------------------------------------------------------

--
-- Table structure for table `menu_subcategory`
--

CREATE TABLE `menu_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `category` text NOT NULL,
  `subcategory` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_subcategory`
--

INSERT INTO `menu_subcategory` (`id`, `category_id`, `category`, `subcategory`) VALUES
(1, 1, 'Alternative-and-indie', ''),
(2, 1, 'Festivals', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `staff_code` varchar(30) NOT NULL,
  `company` varchar(70) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `town` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `staff_code`, `company`, `firstname`, `lastname`, `telephone`, `address`, `postcode`, `town`) VALUES
(120, 'YXUBAEHTDGCFV-85711', '', 'none', 'Michael', 'Scott', '07448457194', '93 Wilmington Gardens', 'RM13 8NL', 'Barking'),
(121, 'DEVUYGBFHAC-XT13964', '', 'none', 'Michael', 'Scott', '07448457194', '93 Wilmington Gardens', 'RM13 8NL', 'Barking'),
(120, 'YXUBAEHTDGCFV-85711', '', 'none', 'Michael', 'Scott', '07448457194', '93 Wilmington Gardens', 'RM13 8NL', 'Barking'),
(121, 'DEVUYGBFHAC-XT13964', '', 'none', 'Michael', 'Scott', '07448457194', '93 Wilmington Gardens', 'RM13 8NL', 'Barking');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `charge_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `seating` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `order_notes` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `charge_id`, `firstname`, `lastname`, `email`, `title`, `price`, `quantity`, `seating`, `image`, `order_notes`, `status`, `active`, `created_time`, `created_date`) VALUES
(232, '-BEFYTGAVCXUHD61863', 'ch_3KLteOENqkbmUYd11zdqbXfP', 'FirstName', 'LastName', 'kingphenix24@gmail.com', 'Black-Eye-Beans-Stew', 8, 2, '', 'batch_6U4A8868.jpg', 'none', 'Delivering', 0, 1643134861, '2022-01-25 18:21:01'),
(229, 'XBVT-DCYHUFAGE69502', 'ch_3KLnldENqkbmUYd10t7Fayma', 'salma', 'porter', 'salmaporter55@gmail.com', 'Puff-Puff', 3, 1, '', 'puff-puff-pepper.png', 'none', 'Cancelled', 0, 1643112272, '2022-01-25 12:04:32'),
(233, '-BEFYTGAVCXUHD61863', 'ch_3KLteOENqkbmUYd11zdqbXfP', 'FirstName', 'LastName', 'kingphenix24@gmail.com', 'Jollof-Stew', 7, 2, '', 'batch_6U4A8785.jpg', 'none', 'Pending', 0, 1643134861, '2022-01-25 18:21:01'),
(223, 'CYDFHTBEUX-AVG82763', 'ch_3KLZvmENqkbmUYd10MCenH2p', 'FirstName', 'LastName', 'kingphenix24@gmail.com', 'Okra-Stew', 8, 5, '', 'batch_6U4A8739.jpg', 'none', 'Delivered', 1, 1643059032, '2022-01-24 21:17:12'),
(231, '-BEFYTGAVCXUHD61863', 'ch_3KLteOENqkbmUYd11zdqbXfP', 'FirstName', 'LastName', 'kingphenix24@gmail.com', 'Okra-Stew', 8, 1, '', 'batch_6U4A8739.jpg', 'none', 'Pending', 0, 1643134861, '2022-01-25 18:21:01'),
(230, 'XBVT-DCYHUFAGE69502', 'ch_3KLnldENqkbmUYd10t7Fayma', 'salma', 'porter', 'salmaporter55@gmail.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Cancelled', 0, 1643112272, '2022-01-25 12:04:32'),
(225, 'CYDFHTBEUX-AVG82763', 'ch_3KLZvmENqkbmUYd10MCenH2p', 'FirstName', 'LastName', 'kingphenix24@gmail.com', 'Jollof-Stew', 7, 2, '', 'batch_6U4A8785.jpg', 'none', 'Cancelled', 1, 1643059032, '2022-01-24 21:17:12'),
(224, 'CYDFHTBEUX-AVG82763', 'ch_3KLZvmENqkbmUYd10MCenH2p', 'FirstName', 'LastName', 'kingphenix24@gmail.com', 'Black-Eye-Beans-Stew', 8, 3, '', 'batch_6U4A8868.jpg', 'none', 'Cancelled', 1, 1643059032, '2022-01-24 21:17:12'),
(234, 'VHGT-DEBAFCYXU58342', 'ch_3KM6z6ENqkbmUYd11FG6Qe8o', 'salma', 'porter', 'salmaporter55@gmail.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Pending', 0, 1643186131, '2022-01-26 08:35:31'),
(235, 'VHGT-DEBAFCYXU58342', 'ch_3KM6z6ENqkbmUYd11FG6Qe8o', 'salma', 'porter', 'salmaporter55@gmail.com', 'Jollof-Stew', 7, 1, '', 'batch_6U4A8785.jpg', 'none', 'Cancelled', 0, 1643186131, '2022-01-26 08:35:31'),
(236, '-CAVTDYXUBHEFG3169', 'ch_3KMA2SENqkbmUYd10SUOTqJW', 'mus', 'Zoton', 'muszoton4@outlook.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Cancelled', 0, 1643197856, '2022-01-26 11:50:56'),
(237, '-CAVTDYXUBHEFG3169', 'ch_3KMA2SENqkbmUYd10SUOTqJW', 'mus', 'Zoton', 'muszoton4@outlook.com', 'Okra-Stew', 8, 1, '', 'batch_6U4A8739.jpg', 'none', 'Delivered', 0, 1643197856, '2022-01-26 11:50:56'),
(238, 'FX-AGYBEVCHTDU37622', 'ch_3KNuM5ENqkbmUYd11HcoVAZX', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Delivered', 0, 1643614252, '2022-01-31 07:30:52'),
(239, 'FX-AGYBEVCHTDU37622', 'ch_3KNuM5ENqkbmUYd11HcoVAZX', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Cancelled', 0, 1643614252, '2022-01-31 07:30:52'),
(251, 'BCVFD-HXGATUYE38795', 'ch_3KSMNOENqkbmUYd10hKZ823B', 'King', 'George', 'kingphenix24@gmail.com', 'Plaintain', 3, 1, '', 'batch_6U4A8781.jpg', 'none', 'Refunded', 0, 1644675283, '2022-02-12 14:14:43'),
(240, 'EFUCVBDYG-XHAT49836', 'ch_3KQskoENqkbmUYd10OZwel1u', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Jollof-Stew', 7, 1, '', 'batch_6U4A8785.jpg', 'none', 'Cancelled', 0, 1644323082, '2022-02-08 12:24:42'),
(241, 'ADVTE-HXCBUYFG24392', 'ch_3KRBixENqkbmUYd10J1OVxcH', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Okra-Stew', 8, 1, '', 'batch_6U4A8739.jpg', 'none', 'Cancelled', 0, 1644395998, '2022-02-09 08:39:58'),
(242, 'ADVTE-HXCBUYFG24392', 'ch_3KRBixENqkbmUYd10J1OVxcH', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Jollof-Rice', 6, 2, '', 'rice.jpg', 'none', 'Delivering', 0, 1644395998, '2022-02-09 08:39:58'),
(252, 'BCVFD-HXGATUYE38795', 'ch_3KSMNOENqkbmUYd10hKZ823B', 'King', 'George', 'kingphenix24@gmail.com', 'Fried-Wings', 5, 1, '', 'batch_6U4A8634-2.jpg', 'none', 'Refunded', 0, 1644675283, '2022-02-12 14:14:43'),
(245, 'FXBUYCAEHTG-VD32086', 'ch_3KRBtHENqkbmUYd10yIP0xwL', 'Salma', 'George', 'salmaporter55@gmail.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Delivered', 0, 1644396636, '2022-02-09 08:50:36'),
(246, 'FXBUYCAEHTG-VD32086', 'ch_3KRBtHENqkbmUYd10yIP0xwL', 'Salma', 'George', 'salmaporter55@gmail.com', 'Jollof-Stew', 7, 1, '', 'batch_6U4A8785.jpg', 'none', 'Delivered', 0, 1644396636, '2022-02-09 08:50:36'),
(247, 'HBFU-XVGECDATY28864', 'ch_3KS0NnENqkbmUYd11Qs7O82W', 'King', 'George', 'kingphenix24@gmail.com', 'Okra-Stew', 8, 1, '', 'batch_6U4A8739.jpg', 'none', 'Delivered', 0, 1644590735, '2022-02-11 14:45:35'),
(248, 'HBFU-XVGECDATY28864', 'ch_3KS0NnENqkbmUYd11Qs7O82W', 'King', 'George', 'kingphenix24@gmail.com', 'Jollof-Stew', 7, 1, '', 'batch_6U4A8785.jpg', 'none', 'Cancelled', 0, 1644590735, '2022-02-11 14:45:35'),
(249, 'HBFU-XVGECDATY28864', 'ch_3KS0NnENqkbmUYd11Qs7O82W', 'King', 'George', 'kingphenix24@gmail.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Cancelled', 0, 1644590735, '2022-02-11 14:45:35'),
(250, 'HBFU-XVGECDATY28864', 'ch_3KS0NnENqkbmUYd11Qs7O82W', 'King', 'George', 'kingphenix24@gmail.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Delivered', 0, 1644590735, '2022-02-11 14:45:35'),
(253, 'BCVFD-HXGATUYE38795', 'ch_3KSMNOENqkbmUYd10hKZ823B', 'King', 'George', 'kingphenix24@gmail.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Refunded', 0, 1644675283, '2022-02-12 14:14:43'),
(254, 'DFAVB-XUEGTCYH42847', 'ch_3KUZtQENqkbmUYd11edXWWE5', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Delivered', 0, 1645203888, '2022-02-18 17:04:48'),
(255, 'DFAVB-XUEGTCYH42847', 'ch_3KUZtQENqkbmUYd11edXWWE5', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Delivered', 0, 1645203888, '2022-02-18 17:04:48'),
(256, 'VHDUTFX-EBCAYG5668', 'ch_3KWGgYENqkbmUYd10GPumtNs', 'Salma', 'George', 'salmaporter55@gmail.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Delivered', 0, 1645606704, '2022-02-23 08:58:24'),
(257, 'ECXVBYGFTU-DAH75033', 'ch_3Kbji0ENqkbmUYd11hqlgolu', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Delivered', 0, 1646909908, '2022-03-10 10:58:28'),
(258, 'ECXVBYGFTU-DAH75033', 'ch_3Kbji0ENqkbmUYd11hqlgolu', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Pending', 0, 1646909908, '2022-03-10 10:58:28'),
(259, 'ECXVBYGFTU-DAH75033', 'ch_3Kbji0ENqkbmUYd11hqlgolu', 'Mariam', 'Baker', 'mariambaker90@outlook.com', 'Plaintain', 3, 3, '', 'batch_6U4A8781.jpg', 'none', 'Pending', 0, 1646909908, '2022-03-10 10:58:28'),
(260, 'XEDFY-AHCVGTUB21493', 'ch_3Kc2rRENqkbmUYd10ayPzwNc', 'Salma', 'George', 'salmaporter55@gmail.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Pending', 0, 1646983540, '2022-03-11 07:25:40'),
(261, 'XEDFY-AHCVGTUB21493', 'ch_3Kc2rRENqkbmUYd10ayPzwNc', 'Salma', 'George', 'salmaporter55@gmail.com', 'Jollof-Stew', 7, 1, '', 'batch_6U4A8785.jpg', 'none', 'Pending', 0, 1646983540, '2022-03-11 07:25:40'),
(262, 'XEDFY-AHCVGTUB21493', 'ch_3Kc2rRENqkbmUYd10ayPzwNc', 'Salma', 'George', 'salmaporter55@gmail.com', 'Puff-Puff', 3, 1, '', 'puff-puff-pepper.png', 'none', 'Pending', 1, 1646983540, '2022-03-11 07:25:40'),
(263, 'TDVXGF-YEABCUH21722', 'ch_3KlJkEENqkbmUYd1199rdIVt', 'Terry', 'Tigion', 'tigerphenix24@gmail.com', 'SALAD', 2, 2, '', 'tomato_salad6.jpg', 'none', 'Pending', 0, 1649193391, '2022-04-05 21:16:31'),
(264, 'TDVXGF-YEABCUH21722', 'ch_3KlJkEENqkbmUYd1199rdIVt', 'Terry', 'Tigion', 'tigerphenix24@gmail.com', 'Okra-Stew', 8, 2, '', 'batch_6U4A8739.jpg', 'none', 'Pending', 0, 1649193391, '2022-04-05 21:16:31'),
(265, 'TDVXGF-YEABCUH21722', 'ch_3KlJkEENqkbmUYd1199rdIVt', 'Terry', 'Tigion', 'tigerphenix24@gmail.com', 'Black-Eye-Beans-Stew', 8, 2, '', 'batch_6U4A8868.jpg', 'none', 'Pending', 0, 1649193391, '2022-04-05 21:16:31'),
(266, 'GBFXE-YUACDTHV5800', 'ch_3KlzxEENqkbmUYd10cwVStiM', 'Scott', 'Mike', 'scottphenix24@gmail.com', 'SALAD', 2, 2, '', 'tomato_salad6.jpg', 'none', 'Cancelled', 0, 1649355654, '2022-04-07 18:20:54'),
(267, 'GBFXE-YUACDTHV5800', 'ch_3KlzxEENqkbmUYd10cwVStiM', 'Scott', 'Mike', 'scottphenix24@gmail.com', 'Okra-Stew', 8, 2, '', 'batch_6U4A8739.jpg', 'none', 'Delivered', 0, 1649355654, '2022-04-07 18:20:54'),
(268, 'FV-YEXUGTBDCHA26991', 'ch_3KmHFhENqkbmUYd11SQ9Mv5W', 'mariam', 'baker', 'mariambaker90@outlook.com', 'Okra-Stew', 8, 1, '', 'batch_6U4A8739.jpg', 'none', 'Pending', 0, 1649422133, '2022-04-08 12:48:53'),
(269, 'FV-YEXUGTBDCHA26991', 'ch_3KmHFhENqkbmUYd11SQ9Mv5W', 'mariam', 'baker', 'mariambaker90@outlook.com', 'Black-Eye-Beans-Stew', 8, 1, '', 'batch_6U4A8868.jpg', 'none', 'Pending', 0, 1649422133, '2022-04-08 12:48:53'),
(270, 'THXVDBUGFA-CEY59949', 'ch_3KnpRRENqkbmUYd10eQzdLjr', 'salma', 'porter', 'salmaporter55@gmail.com', 'SALAD', 2, 4, '', 'tomato_salad6.jpg', 'none', 'Pending', 0, 1649791892, '2022-04-12 19:31:32'),
(271, 'THXVDBUGFA-CEY59949', 'ch_3KnpRRENqkbmUYd10eQzdLjr', 'salma', 'porter', 'salmaporter55@gmail.com', 'Jollof-Rice', 6, 1, '', 'rice.jpg', 'none', 'Cancelled', 0, 1649791892, '2022-04-12 19:31:32'),
(272, '-CFGUXEYTDAHVB51909', '', 'FirstName', 'LastName', 'admin@ticket.com', 'Jollof-Rice', 4.5, 1, '', 'jollofrice4-min.JPG', 'none', 'Delivered', 0, 1650838675, '2022-04-24 22:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `payout_request`
--

CREATE TABLE `payout_request` (
  `id` int(11) NOT NULL,
  `payment_id` int(5) NOT NULL,
  `company_id` int(5) NOT NULL,
  `company` varchar(200) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payout_request`
--

INSERT INTO `payout_request` (`id`, `payment_id`, `company_id`, `company`, `company_email`, `amount`, `status`, `notes`, `start_date`, `end_date`, `created_date`) VALUES
(2, 1, 21, 'Rising Phoenix', 'scott.nnaghor@toucantech.com', 18, 'Pending', '', '2022-05-01', '2022-05-07', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `category` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `type`, `category`, `image`) VALUES
(1, 'Fresh Organic Meals', '', 'restaurant', 'batch_6U4A8562-2.jpg'),
(2, 'Chicken Delicacies', '', 'restaurant', 'batch_6U4A8623.jpg'),
(15, 'DJ RAZAK', 'gbp', 'Home', 'dJRazak-min.png'),
(6, 'Wegeedem', 'gbp', 'Home', 'WeGeeDemInTheCityCover-min.jpg'),
(12, 'DR ROACH', 'gbp', 'Home', 'DrRoach-min.png'),
(46, 'DJ PEEKAY', 'gbp', 'Home', 'DJPeekay-min.png'),
(45, 'DJ HOPIE', 'gbp', 'Home', 'DJHopie2-min.png');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `business_id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `event_code` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `usd` int(10) NOT NULL,
  `shilling` int(10) NOT NULL,
  `leone` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `business_id`, `code`, `event_code`, `title`, `category`, `price`, `usd`, `shilling`, `leone`, `quantity`, `image`, `created_date`) VALUES
(2, 21, 'YDVXBGCZUXVCAEF440', 'GFXACXDVVBCYZEU468', 'Standing-seats', 'Arts', 10, 7, 2000, 2500, 98, 'pexels-vishnu-r-nair-1105666.jpg', '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_basket`
--

CREATE TABLE `ticket_basket` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `business_id` int(10) NOT NULL,
  `code` varchar(20) NOT NULL,
  `event_code` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `usd` int(10) NOT NULL,
  `shilling` int(10) NOT NULL,
  `leone` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_order`
--

CREATE TABLE `ticket_order` (
  `id` int(11) NOT NULL,
  `charge_id` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `business_id` int(10) NOT NULL,
  `ticket_code` varchar(100) NOT NULL,
  `ticket_id` int(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` int(5) NOT NULL,
  `usd` int(10) NOT NULL,
  `shilling` int(10) NOT NULL,
  `leone` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `total_usd` int(10) NOT NULL,
  `total_shilling` int(10) NOT NULL,
  `total_leone` int(10) NOT NULL,
  `events` varchar(200) NOT NULL,
  `active` int(5) NOT NULL,
  `status` varchar(100) NOT NULL,
  `checked` varchar(200) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_order`
--

INSERT INTO `ticket_order` (`id`, `charge_id`, `code`, `business_id`, `ticket_code`, `ticket_id`, `type`, `fullname`, `customer_email`, `title`, `price`, `usd`, `shilling`, `leone`, `quantity`, `total`, `total_usd`, `total_shilling`, `total_leone`, `events`, `active`, `status`, `checked`, `created_date`) VALUES
(42, 'ch_3KuP56ENqkbmUYd10sk1g0pY', 'GFXACXDVVBCYZEU468', 0, 'KCFTGXEVID16', 2, 'gbp', 'Scott Nnaghor', 'tigerphenix24@gmail.com', 'Standing-seat', 15, 0, 0, 0, 1, 15, 0, 0, 0, 'Salone In The City', 0, 'Purchased', 'Checked In', '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `town` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `company`, `telephone`, `address`, `postcode`, `town`, `status`, `created_time`, `created_date`) VALUES
(6, 'FirstName', 'LastName', 'scottphenix24@gmail.com', '$2a$08$nfSNn5ryhaeoWOz7ZFPQke/imczYh.L2d092rdp.tFuk6FnJ5TCaS', 'Admin', '', '', '', '', '', '', 1635167542, '2021-10-25 13:12:22'),
(15, 'Scott', 'Nnaghor', 'tigerphenix24@gmail.com', '$2a$08$lEvXiAXF6eO5S9D6oVkGVeQlQC13cUF7ro.crzMLQj9tOZy.Xp2la', 'User', '', '07368660611', '93 Wilmington Gardens', 'IG11 9TR', 'London', '', 1641835665, '2022-01-10 17:27:45'),
(10, 'Mike', 'Mikaela', 'mike275@gmail.com', '$2a$08$V5MgwMvx3P7CURzKKYs5ru7Fw6a4UoWey8qqy7ziTVfcXXPMTvtQS', 'Kitchen', '', '', '', '', '', '', 1637097262, '2021-11-16 21:14:22'),
(19, 'FirstName', 'LastName', 'admin@ticket.com', '$2a$08$.GKa0I4j.HSbTS5i0H6ljeROpGkAVfLNmPh4ph8/la3GNBxiY.7W2', 'Admin', '', '', '', '', '', '', 1649343839, '2022-04-07 15:03:59'),
(21, 'Mike', 'Scott', 'scott.nnaghor@toucantech.com', '$2a$08$YDxVh5JlpsNHmniNkuWN0OUOv1ETBeQXLvH0UGEoqg9um20llWx5.', 'Business', 'Rising Phoenix', '02045382385', '83 Winning Town', 'SE10 8RT', 'London', '', 1649356121, '2022-04-07 18:28:41'),
(22, 'FirstName', 'LastName', 'mariambaker90@outlook.com', '$2a$08$xJm5TD9wrCbhnCFThS95ZunAgMifOSb2fjl26DNBMZnmDhCgtP1cO', 'User', '', '', '', '', '', '', 1649421870, '2022-04-08 12:44:30'),
(23, 'FirstName', 'LastName', 'salmaporter55@gmail.com', '$2a$08$LpPIXQPyzyr/TZdIUN3i/eG1StyKdebHq4oLm.1dxU8v9aydFa432', 'User', '', '', '', '', '', '', 1649791650, '2022-04-12 19:27:30'),
(24, 'FirstName', 'LastName', 'kitchen@weegeedem.com', '$2a$08$wcCpqUO69mKX2JHyLgAF8uDNkZQWL9aT1hbc.alay0rsaXhelbkdS', 'Kitchen', '', '', '', '', '', '', 1651444145, '2022-05-01 22:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `sort_code` int(10) NOT NULL,
  `account_number` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`id`, `user_id`, `bank`, `sort_code`, `account_number`) VALUES
(1, 21, 'HSBC', 444506, 45495900);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `business_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image1` varchar(100) NOT NULL,
  `maps` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `business_id`, `title`, `body`, `image1`, `maps`, `created_date`) VALUES
(1, 0, 'Club Shoreditch', '<div style=\"color: rgb(0, 0, 0); font-family: arimo, sans-serif; font-size: 14px;\"><p style=\"color: rgb(33, 37, 41); font-family: Lato, sans-serif;\">Tudor Rose is black owned venue and proud to be known as the home of black entertainment. Having been established for over 30 years, Tudor Rose has welcomed every community and hosted a range of events, and community projects.  Based in Southall, West London, Tudor Rose has always been popular amongst the African, Caribbean, Asian and Irish communities who have  hosted a range of events from weddings, birthday parties, exhibitions, classes in the venue.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato, sans-serif;\">The venue boasts three floors, and has two separate event space located in the same building but with separate entrances. Tudor Rose has a full capacity of 1000. Rose Bud, which is located inside the Tudor Rose building but is a more luxurious private club space has a full capacity of 250 people.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato, sans-serif;\">EventsthroneVIP are official partners of Tudor Rose Venue. The venue is very proud to be selected to host the very first live recorded entertainment night for The Jollof N Laugh Show</p><p style=\"color: rgb(33, 37, 41); font-family: Lato, sans-serif;\"></p></div>', 'TudorRoseVenue_Side-min.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.3028672125447!2d-0.08764668422935186!3d51.52600457963824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ca5820d067f%3A0xac470bbbad1c8eea!2sClub%20aquarium!5e0!3m2!1sen!2suk!4v1651065673187!5m2!1sen!2suk', '2022-04-27 13:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `playlist` text NOT NULL,
  `currency_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `type`, `url`, `playlist`, `currency_type`) VALUES
(7, 'WeGeeDem Is Here', 'Home', 'https://youtube.com/embed/LQqv4lYKpDs', 'PLTs2A4ZoBzFiX2KQ90y8nph6Bp-XzvEKE', 'gbp'),
(6, 'WeGeeDem ROAR', 'Home', 'https://youtube.com/embed/IVdnqBhGDNA', 'PLTs2A4ZoBzFiX2KQ90y8nph6Bp-XzvEKE', 'gbp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_age`
--
ALTER TABLE `events_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_banner`
--
ALTER TABLE `events_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_dress_code`
--
ALTER TABLE `events_dress_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_last_entry`
--
ALTER TABLE `events_last_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_seating`
--
ALTER TABLE `menu_seating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_status`
--
ALTER TABLE `menu_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_subcategory`
--
ALTER TABLE `menu_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_request`
--
ALTER TABLE `payout_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_basket`
--
ALTER TABLE `ticket_basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events_age`
--
ALTER TABLE `events_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events_banner`
--
ALTER TABLE `events_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events_dress_code`
--
ALTER TABLE `events_dress_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events_last_entry`
--
ALTER TABLE `events_last_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_seating`
--
ALTER TABLE `menu_seating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_status`
--
ALTER TABLE `menu_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_subcategory`
--
ALTER TABLE `menu_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `payout_request`
--
ALTER TABLE `payout_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_basket`
--
ALTER TABLE `ticket_basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ticket_order`
--
ALTER TABLE `ticket_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
