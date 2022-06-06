-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 07:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edenbookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `description` varchar(800) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `price`, `qty`, `category_id`, `description`, `image`, `date_time`) VALUES
(4, 'Fire & Blood', 'George R. R. Martin', 'Kindle Edition', 124, 250, 5, 'Centuries before the events of A Game of Thrones, House Targaryen—the only family of dragonlords to survive the Doom of Valyria—took up residence on Dragonstone. Fire & Blood begins their tale with the legendary Aegon the Conqueror, creator of the Iron Throne, and goes on to recount the generations of Targaryens who fought to hold that iconic seat, all the way up to the civil war that nearly tore their dynasty apart.\r\n', 'gameofthrones.jpg', '2022-05-23'),
(5, 'A Dragon\'s Chains', 'Robert Vane', 'Amazon', 98, 540, 9, 'Using stolen magic, the human Kingdom of Rolm has risen to power on the backs of the world\'s most formidable predator, but that is about to change. Bayloo is the first of the free dragons. Born into slavery, his shackled mind has awoken to find a human giving him orders and his race enthralled to an evil king. The world shall now face the rage of dragons.\r\n', 'dragon.jpg', '2022-05-23'),
(6, 'The Elf Tangent', 'Lindsay Buroker', 'Amazon', 15, 100, 2, 'Studying mathematics and writing papers on economic theory in an effort to fix her people’s financial woes? Her father has forbidden it. With war on the horizon, they must focus on the immediate threat.\r\n\r\nReluctantly, Aldari agrees to marry a prince in a neighboring kingdom to secure an alliance her people desperately need. All is going to plan until the handsome elven mercenary captain hired to guard her marriage caravan turns into her kidnapper. His people are in trouble, and he believes she has the knowledge to help.', 'elf.jpg', '2022-05-23'),
(7, 'The Kingfall Histories ', 'David Estes', 'Amazon', 20, 54, 1, 'Be bright but do not burn. Embrace the darkness but do not live in the shadows. The powerful godblades were believed to be lost nearly half a millennia ago, when the Godswar ended. Now, however, one has been found by the unlikeliest of wielders: Sampson Gaard, a sheltered prince who\'s been told he\'ll never rule Teravainen. As his power grows, the only question is whether he controls the blade or the blade him. With an insidious evil lurking in the shadows, the answer may very well determine the fate of all Kingfall.\r\n', 'king.jpg', '2022-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Crime'),
(5, 'Mystery'),
(8, 'Drama'),
(9, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(800) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_emails`
--

CREATE TABLE `newsletter_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter_emails`
--

INSERT INTO `newsletter_emails` (`id`, `email`, `date_time`) VALUES
(1, 'shamal@gmail.com', '2022-05-17'),
(2, 'shamal98@gmail.com', '2022-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_books` varchar(500) NOT NULL,
  `total_price` int(20) NOT NULL,
  `placed_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `payment_method`, `address`, `total_books`, `total_price`, `placed_date`, `order_status`) VALUES
(5, 5, 'Shamal Chathuranga', '0773308505', 'shamalchathuranga2@gmail.com', 'Bank Deposit', '34/G, Wathurugama road, Buthpitiya., Gampaha, Western, australia, 11720', ', From Crook to Cook (3)', 10000, '2022-05-21', 'pending'),
(6, 4, 'Shamal Chathuranga', '0773308505', 'shamalchathuranga2@gmail.com', 'Bank Deposit', '34/G, Wathurugama road, Buthpitiya., Gampaha, Western, australia, 11720', ', From Crook to Cook (1)', 5000, '2022-05-21', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user',
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipCode` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `firstName`, `lastName`, `email`, `phone`, `address`, `city`, `state`, `zipCode`, `country`, `password`, `date_time`) VALUES
(4, 'admin', 'Shamal', 'Chathuranga', 'shamalchathuranga2@gmail.com', '0773308505', '34/G, Wathurugama road, Buthpitiya.', 'Gampaha', 'Western', '11720', 'australia', '202cb962ac59075b964b07152d234b70', '2022-05-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ED_Category` (`category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ED_Checkout` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `ED_Category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `ED_Checkout` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
