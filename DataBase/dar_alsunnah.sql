-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 06:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dar_alsunnah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admins_id` int(10) NOT NULL,
  `Admins_email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admins_id`, `Admins_email`, `password`) VALUES
(1, 'dar.alsunnah2023@gmail.com', 'Do224466');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--



-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fav_id` int(11) NOT NULL,
  `fav_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gates`
--

CREATE TABLE `gates` (
  `Door_id` int(10) NOT NULL,
  `Photo` varchar(100) NOT NULL DEFAULT 'photo/Door',
  `Name` varchar(100) NOT NULL,
  `Basic_information` varchar(100) NOT NULL,
  `Location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gates`
--

INSERT INTO `gates` (`Door_id`, `Photo`, `Name`, `Basic_information`, `Location`) VALUES
(1, 'photo\\Door\\Bab al-Nisa.jpg\r\n', 'Bab al-Nisa', 'Number 39', 'https://maps.app.goo.gl/CvRWrquW8qvYVAWv9?g_st=ic'),
(2, 'photo\\Door\\Al Baqia Gate.jpg', 'Al Baqia Gate', 'Number 41\r\n', 'https://maps.app.goo.gl/hEuatGFykvTXKtfx8?g_st=ic '),
(3, 'photo\\Door\\Bilal Gate.jpg', 'Bilal Gate', 'Number 38', 'https://maps.app.goo.gl/KvKiE7ayw82KtccF7?g_st=ic '),
(4, 'photo\\Door\\Makkah Gate.jpg\r\n', 'Makkah Gate', 'Number 37\r\n', 'https://maps.app.goo.gl/nXswV2KzKwsS9zVi6?g_st=ic'),
(5, 'photo\\Door\\King Abdul Aziz Gate.jpg\r\n', 'King Abdul Aziz Gate', 'Number 34\r\nFor Men', 'https://maps.app.goo.gl/xAKCVNEmxEztoheu7?g_st=ic'),
(6, 'photo\\Door\\Usman Bin Affan Gate.jpg', 'Usman Bin Affan Gate', 'Number 25\r\nFor Women', 'https://maps.app.goo.gl/p19k1FvBoP9He2iR7?g_st=ic'),
(7, 'photo\\Door\\Ohud Gate.jpg', 'Ohud Gate', 'Number 23', 'https://maps.app.goo.gl/8eTzAuE4cc2YiLz17?g_st=ic'),
(8, 'photo\\Door\\King Fahd Gate.jpg', 'King Fahd Gate', 'Number 20\r\nFor Men', 'https://maps.app.goo.gl/9euk3PF931Ck67Z39?g_st=ic'),
(9, 'photo\\Door\\Badr Gate.jpg', 'Badr Gate', 'Number 19', 'https://maps.app.goo.gl/P7Y9YBxEfMVXHHfz5?g_st=ic'),
(10, 'photo\\Door\\Omar Bin Khattab Gate.jpg', 'Omar Bin Khattab Gate', 'Number 18\r\nFor Women', 'https://maps.app.goo.gl/u7apou1cBHayrGBR6?g_st=ic'),
(11, 'photo\\Door\\Quba Gate.jpg', 'Quba Gate', 'Number 5', 'https://maps.app.goo.gl/CSXPkQAnhKgR16kT7?g_st=ic'),
(12, 'photo\\Door\\Al Hijrah Gate.jpg', 'Al Hijrah Gate', 'Number 4\r\n', 'https://maps.app.goo.gl/b6haiM9qgcwpaShk9?g_st=ic'),
(13, 'photo\\Door\\Al Rahma Gate.jpg', 'Al Rahma Gate\r\n', 'Number 3\r\n', 'https://maps.app.goo.gl/RicuiPiGKtYAqai88?g_st=ic'),
(14, 'photo\\Door\\Essalam Gate.jpg', 'Essalam Gate\r\n', 'Number 1\r\n', 'https://maps.app.goo.gl/SkiLBK2D3pD9jWt58?g_st=ic'),
(15, 'photo\\Door\\Jebril Gate.jpg\r\n', 'Jebril Gate\r\nNumber 40', 'Number 40', 'https://maps.app.goo.gl/N1es7NpYSHFR3Q8n7?g_st=ic'),
(16, 'photo\\Door\\King Saud Gate.jpg\r\n', 'King Saud Gate\r\n', 'Number 7\r\nFor Men', 'https://maps.app.goo.gl/QngN1yAULBSSEtmA8?g_st=ic'),
(17, 'photo\\Door\\Abu Bakr Siddiq Gate.jpg\r\n', 'Abu Bakr Siddiq Gate\r\n', 'Number 2', 'https://maps.app.goo.gl/eMEJHYPQVPpux6Jy6?g_st=ic');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `Hotel_id` int(10) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Photo` varchar(100) NOT NULL DEFAULT 'photo\\Hotels',
  `Location` varchar(50) NOT NULL,
  `Price` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`Hotel_id`, `Name`, `Photo`, `Location`, `Price`) VALUES
(1, 'Rua Al Al Hijrah Hotel', 'photo\\Hotels\\Rua Al Al Hijrah Hotel.jpg', 'https://maps.app.goo.gl/EBqDrYSJ3hMhKiMJ7?g_st=ic ', '600 SAR - 700 SAR'),
(2, 'Mysk Touch Al Balad Rawaf Hotel', 'photo\\Hotels\\Mysk Touch Al Balad Rawafed Hotel.jpg', 'https://maps.app.goo.gl/J2mcxj7jUvWvm66HA?g_st=ic ', '550 SAR - 600 SAR'),
(3, 'Taiba Madinah Hotel', 'photo\\Hotels\\Taiba Madinah Hotel.jpg', 'https://maps.app.goo.gl/6NrcNjyqiZfZuQLb9?g_st=ic', '840 SAR - 1050 SAR'),
(4, 'Dar Al Iman InterContinen Hotel', 'photo\\Hotels\\Dar Al Iman InterContinental.jpg', 'https://maps.app.goo.gl/9ek2AHoY3wrK5K217?g_st=ic', '989 SAR - 1194 SAR'),
(5, 'Anwar Al Madinah Mövenpic Hotel', 'photo\\Hotels\\Anwar Al Madinah Mo_êvenpick Hotel.jpg', 'https://maps.app.goo.gl/2e97Ay4tHohAWZPS6?g_st=ic', '896 SAR - 990 SAR'),
(6, 'Crowne Plaza Hotel', 'photo\\Hotels\\Crowne Plaza Hotel.jpg', 'https://maps.app.goo.gl/Uy24fdN1GL9oh75Z7?g_st=ic', '661 SAR - 990 SAR'),
(7, 'Elaf Al Taqwa Hotel', 'photo\\Hotels\\Elaf Al Taqwa Hotel.jpg', 'https://maps.app.goo.gl/G1w54nnwrMpKkwM4A?g_st=ic', '455 SAR - 536 SAR'),
(8, 'Emaar Royal Hotel', 'photo\\Hotels\\Emaar Royal Hotel.jpg', 'https://maps.app.goo.gl/ZyeXuGxcp4EuhBts9?g_st=ic', '495 SAR - 550 SAR'),
(9, 'Madinah Hilton Hotel', 'photo\\Hotels\\Madinah Hilton Hotel.jpg', 'https://maps.app.goo.gl/t43bb2dg4WNUK6Sm7?g_st=ic', '1236 SAR - 1554 SAR'),
(10, 'MADEN Hotel', 'photo\\Hotels\\MADEN Hotel.jpg', 'https://maps.app.goo.gl/wbvazscT6oMKVs1f6?g_st=ic', '940 SAR - 1000 SAR'),
(11, 'Pullman Zamzam Madina Hotel', 'photo\\Hotels\\Pullman Zamzam Madina Hotel.jpg', 'https://maps.app.goo.gl/zLSkGTT4HYnu17Cb7?g_st=ic', '605 SAR - 800 SAR'),
(12, 'Nusk Almadinah Hotel', 'photo\\Hotels\\Nusk Almadinah Hotel.jpg', 'https://maps.app.goo.gl/g16HqBrZL5k8rgFJ8?g_st=ic', '572 SAR - 700 SAR'),
(13, 'Golden Tulip Al Shakreen Hotel', 'photo\\Hotels\\Golden Tulip Al Shakreen Hotel.jpg', 'https://maps.app.goo.gl/sSfV7jutq9keYk2K9?g_st=ic', '365 SAR - 550 SAR'),
(14, 'Al-Eiman Al-Qibla Hotel', 'photo\\Hotels\\Al-Eiman Al-Qibla Hotel.jpg', 'https://maps.app.goo.gl/kdNcBRfGHArVuRFq6?g_st=ic', '1000 SAR - 1479 SAR'),
(15, 'Oberoi Madina Hotel', 'photo\\Hotels\\Oberoi Madina Hotel.jpg', 'https://maps.app.goo.gl/8H4qzjGznNgvTS8D6?g_st=ic', '990 SAR - 1564 SAR');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_id` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Price` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_id`, `Name`, `Photo`, `Location`, `Price`) VALUES
(1, 'Zaitoon Restaurant', 'photo\\Restaurants\\Zaitoon Restaurant.jpg', 'https://maps.app.goo.gl/gxupiSShADs3yqc57?g_st=ic', '2 - 180 SAR'),
(2, 'Sea Spice Restaurant', 'photo\\Restaurants\\Sea Spice Restaurant.jpg', 'https://maps.app.goo.gl/CsH4riRRzQHzeAt37?g_st=ic', '15 - 125 SAR'),
(3, 'KFC', 'photo\\Restaurants\\KFC.jpg', 'https://maps.app.goo.gl/XWogP5tXJ3PvEyjG9?g_st=ic', '10 - 79 SAR'),
(4, 'Karak Express', 'photo\\Restaurants\\Karak Express.jpg', 'https://maps.app.goo.gl/6QqKtkPakLZBY3VRA?g_st=ic', '2 - 30 SAR'),
(5, 'Fatoum Shawarma alharam', 'photo\\Restaurants\\Fatoum Shawarma alharam.jpg', 'https://maps.app.goo.gl/eS2HTzZdccT3RKLH8?g_st=ic', '3 - 46 SAR'),
(6, 'Chicken Hat', 'photo\\Restaurants\\Chicken Hat.jpg', 'https://maps.app.goo.gl/Ujdem55x7KMhadnw8?g_st=ic', '2 - 30 SAR'),
(7, 'Ekla', 'photo\\Restaurants\\Ekla.jpg', 'https://maps.app.goo.gl/Boe1PZXKYngVq6md8?g_st=ic', '10 - 50 SAR'),
(8, 'Arabesque Restaurant', 'photo\\Restaurants\\Arabesque Restaurant.jpg', 'https://maps.app.goo.gl/sPVe1Ba4zk31jWdFA?g_st=ic', '100 - 200 SAR'),
(9, 'Chicking', 'photo\\Restaurants\\Chicking.jpg', 'https://maps.app.goo.gl/r2KD1LwELWQFdZ2h8?g_st=ic', '6 - 21 SAR'),
(10, 'Okal', 'photo\\Restaurants\\Okal.jpg', 'https://maps.app.goo.gl/2v21ZEVdfLqN3LG56?g_st=ic', '1 - 20 SAR'),
(11, 'Zayton & Teen', 'photo\\Restaurants\\Zayton & Teen.jpg', 'https://maps.app.goo.gl/ftMj4KR1XHfdsp5s9?g_st=ic', '1 - 20 SAR'),
(12, 'Herfy', 'photo\\Restaurants\\Herfy.jpg', 'https://maps.app.goo.gl/neMcd1XTcMoLmoCT6?g_st=ic', '20 - 40 SAR'),
(13, 'Amasina', 'photo\\Restaurants\\Amasina.jpg', 'https://maps.app.goo.gl/N5Ne9evovJ6N5PxW9?g_st=ic', '20 - 40 SAR'),
(14, 'McDonald\'s', 'photo\\Restaurants\\McDonald\'s.jpg', 'https://maps.app.goo.gl/2wTd6sB3QwSRetAMA?g_st=ic', '20 - 40 SAR'),
(15, 'ALBAIK', 'photo\\Restaurants\\ALBAIK.jpg', 'https://maps.app.goo.gl/AwFnaFVaLr8VbqG27?g_st=ic', '1 - 20 SAR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admins_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gates`
--
ALTER TABLE `gates`
  ADD PRIMARY KEY (`Door_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`Hotel_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gates`
--
ALTER TABLE `gates`
  MODIFY `Door_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `Hotel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restaurant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
