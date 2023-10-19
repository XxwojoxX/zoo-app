-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 03, 2023 at 08:41 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `animals`
--

CREATE TABLE `animals` (
  `animalId` int(11) NOT NULL,
  `animalSpecies` varchar(25) DEFAULT NULL,
  `animalDescription` varchar(999) DEFAULT NULL,
  `animalName` varchar(25) DEFAULT NULL,
  `animalDiet` varchar(25) DEFAULT NULL,
  `animalFeeding` varchar(255) DEFAULT NULL,
  `animalImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animalId`, `animalSpecies`, `animalDescription`, `animalName`, `animalDiet`, `animalFeeding`, `animalImage`) VALUES
(1, 'LEW AFRYKAŃSKI', 'opis', 'lef', 'mienso', 'codziennie o 14:00', 'http://localhost/cos/img/lew.png'),
(2, 'TYGRYS BENGALSKI', 'opis', 'Tygrys', 'mienso', 'codziennie o 15:00', 'http://localhost/cos/img/tygrys.png'),
(3, 'SŁOŃ AFRYKAŃSKI', 'opis', 'Slon', 'rosliny', 'codziennie o 10:00', 'http://localhost/cos/img/slon.png'),
(4, 'Pingwin Cesarski', 'opis', 'Pingwin', 'ryby', 'codziennie o 11:00', 'http://localhost/cos/img/pingwin.png'),
(5, 'Żyrafa Siatkowana', 'opis', 'Zyrafa', 'roslina', 'codziennie o 9:00', 'http://localhost/cos/img/zyrafa.png'),
(6, 'Gepard', 'opis', 'Gepard', 'mienso', 'codziennie o 9:30', 'http://localhost/cos/img/gepard.png'),
(7, 'Krokodyl Nilowy', 'opis', 'Krokodyl', 'mienso', 'codziennie o 10:30', 'http://localhost/cos/img/krokodyl.png'),
(8, 'Flaming Różowy', 'opis', 'Flaming', 'skorupiaki', 'codziennie o 11:30', 'http://localhost/cos/img/flaming.png'),
(9, 'Panda Wielka', 'opis', 'Panda', 'roslina', 'codziennie o 12:30', 'http://localhost/cos/img/panda.png'),
(10, 'Wilk Szary', 'opis', 'Wilk', 'mienso', 'codziennie o 15:00', 'http://localhost/cos/img/wilk.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE `authors` (
  `authorId` int(11) NOT NULL,
  `authorName` varchar(50) DEFAULT NULL,
  `authorSurname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `cartQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `contactName` varchar(50) DEFAULT NULL,
  `contactEmail` varchar(50) DEFAULT NULL,
  `contactMessage` varchar(999) DEFAULT NULL,
  `contactDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `contactName`, `contactEmail`, `contactMessage`, `contactDate`) VALUES
(1, 'aaa', 'aaa@aaa', '', '2023-09-15 11:23:40'),
(3, 'aaa', 'aaa@aaa', '', '2023-09-15 11:23:48'),
(4, 'aaa', 'aaa@aaa', '', '2023-09-15 11:23:48'),
(7, 'aaa', 'admin@gmail.com', 'a', '2023-09-15 11:43:18'),
(8, 'aaa', 'aaa@aaa', 'aaaaaaaa', '2023-09-15 11:53:51'),
(9, 'bbb', 'bbb@bbb', 'bbb', '2023-09-15 12:03:28'),
(10, 'bbbb', 'bbb@bbb', 'bbbb', '2023-09-15 12:04:42'),
(11, 'aaa', 'admin@admin.pl', 'aaa', '2023-09-15 12:08:09'),
(12, 'ccc', 'ccc@ccc', 'ccc', '2023-09-15 12:11:09'),
(13, 'bbb', 'admin@admin.pl', 'a', '2023-09-16 12:48:33'),
(14, 'bbb', 'admin@gmail.com', 'a', '2023-09-16 12:50:42'),
(15, 'bbb', 'admin@admin.pl', 'a', '2023-09-16 12:55:37'),
(16, 'proba', 'proba@proba.pl', 'proba', '2023-09-16 13:04:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `ID_wydarzenia` int(11) NOT NULL,
  `eventName` varchar(50) DEFAULT NULL,
  `eventDate` datetime DEFAULT NULL,
  `eventDescription` varchar(999) DEFAULT NULL,
  `eventImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(25) DEFAULT NULL,
  `newsContents` varchar(999) DEFAULT NULL,
  `newsDate` date DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL,
  `newsImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `Data_zamówienia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productDescription` varchar(999) DEFAULT NULL,
  `productPrice` float(10,2) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productCategory` varchar(15) DEFAULT NULL,
  `productRating` float(10,2) DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productDescription`, `productPrice`, `productQuantity`, `productCategory`, `productRating`, `productImage`) VALUES
(1, 'a', 'a', 1.00, 1, 'a', 1.00, 'a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(25) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userEmail`) VALUES
(1, 'admin', '$2y$10$aPf3xY/QyazBA8BMKXwlBOZartiLyytonGt5OXGDy5gCNIMk8/Y1.', 'admin@admin.pl'),
(2, 'user1', '$2y$10$a/w53mMFFmAlz2nWRRhl.eSDr7OIDd9OWzvSLPRv/L4IuA5akhewe', 'user1@user1.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalId`);

--
-- Indeksy dla tabeli `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorId`);

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Indeksy dla tabeli `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indeksy dla tabeli `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID_wydarzenia`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`),
  ADD KEY `authorId` (`authorId`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID_wydarzenia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`authorId`) REFERENCES `authors` (`authorId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
