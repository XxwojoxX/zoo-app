-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:22 PM
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
(1, 'LEW AFRYKAŃSKI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'lew', 'mieso', 'codziennie o 14:00', 'http://localhost/cos/img/no_photo.jpg'),
(2, 'TYGRYS BENGALSKI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Tygrys', 'mieso', 'codziennie o 15:00', 'http://localhost/cos/img/no_photo.jpg'),
(3, 'SŁOŃ AFRYKAŃSKI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Slon', 'rosliny', 'codziennie o 10:00', 'http://localhost/cos/img/no_photo.jpg'),
(4, 'Pingwin Cesarski', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Pingwin', 'ryby', 'codziennie o 11:00', 'http://localhost/cos/img/no_photo.jpg'),
(5, 'Żyrafa Siatkowana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Zyrafa', 'roslina', 'codziennie o 9:00', 'http://localhost/cos/img/no_photo.jpg'),
(6, 'Gepard', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Gepard', 'mieso', 'codziennie o 9:30', 'http://localhost/cos/img/no_photo.jpg'),
(7, 'Krokodyl Nilowy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Krokodyl', 'mieso', 'codziennie o 10:30', 'http://localhost/cos/img/no_photo.jpg'),
(8, 'Flaming Różowy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Flaming', 'skorupiaki', 'codziennie o 11:30', 'http://localhost/cos/img/no_photo.jpg'),
(9, 'Panda Wielka', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Panda', 'roslina', 'codziennie o 12:30', 'http://localhost/cos/img/no_photo.jpg'),
(10, 'Wilk Szary', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'Wilk', 'mieso', 'codziennie o 15:00', 'http://localhost/cos/img/no_photo.jpg');

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
(1, 'aaa', 'aaa@aaa', '', '2023-09-15 09:23:40'),
(3, 'aaa', 'aaa@aaa', '', '2023-09-15 09:23:48'),
(4, 'aaa', 'aaa@aaa', '', '2023-09-15 09:23:48'),
(7, 'aaa', 'admin@gmail.com', 'a', '2023-09-15 09:43:18'),
(8, 'aaa', 'aaa@aaa', 'aaaaaaaa', '2023-09-15 09:53:51'),
(9, 'bbb', 'bbb@bbb', 'bbb', '2023-09-15 10:03:28'),
(10, 'bbbb', 'bbb@bbb', 'bbbb', '2023-09-15 10:04:42'),
(11, 'aaa', 'admin@admin.pl', 'aaa', '2023-09-15 10:08:09'),
(12, 'ccc', 'ccc@ccc', 'ccc', '2023-09-15 10:11:09'),
(13, 'bbb', 'admin@admin.pl', 'a', '2023-09-16 10:48:33'),
(14, 'bbb', 'admin@gmail.com', 'a', '2023-09-16 10:50:42'),
(15, 'bbb', 'admin@admin.pl', 'a', '2023-09-16 10:55:37'),
(16, 'proba', 'proba@proba.pl', 'proba', '2023-09-16 11:04:54'),
(17, 'ddd', 'ddd@ddd.pl', 'ddddddddddddddddd', '2023-10-04 16:25:28'),
(18, 'aaa', 'aaa@aaa', 'aaa', '2023-10-04 16:45:02'),
(19, 'aaa', 'aaa@aaa', 'abc', '2023-10-05 09:30:32'),
(20, 'a', 'a@a', 'a', '2023-10-05 09:50:17'),
(21, 'a', 'aaa@aaa', 'aa', '2023-10-05 09:53:55'),
(22, 'bbb', 'aaa@aaa', 'aaa', '2023-10-05 09:55:27'),
(23, 'bbb', 'aaa@aaa', 'a', '2023-10-05 09:56:43'),
(24, 'aaa', 'admin@admin.pl', 'a', '2023-10-05 09:56:57'),
(25, 'a', 'aaa@aaa', 'a', '2023-10-05 10:04:40'),
(26, 'aaa', 'aaa@aaa', 'a', '2023-10-05 10:05:39');

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID_wydarzenia`, `eventName`, `eventDate`, `eventDescription`, `eventImage`) VALUES
(1, 'wydarzenie 1', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(2, 'wydarzenie 2', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(3, 'wydarzenie 3', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(4, 'wydarzenie 4', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(5, 'wydarzenie 5', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(6, 'wydarzenie 6', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(7, 'wydarzenie 7', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(8, 'wydarzenie 8', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(9, 'wydarzenie 9', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(10, 'wydarzenie 10', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg'),
(11, 'wydarzenie 11', '0000-00-00 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet urna vitae volutpat. Proin iaculis, leo quis tristique fringilla, quam odio congue odio, nec rhoncus ex velit eget felis.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla facilisi. Nulla ultrices neque et elit facilisis, a bibendum libero volutpat.\r\n\r\nSed in convallis tortor. Cras varius massa eget bibendum. Sed gravida metus eget ligula varius, nec interdum tortor tristique.\r\n\r\nFusce eget augue eu quam dignissim faucibus eget id dolor. Nulla faci', 'http://localhost/cos/img/no_photo.jpg');

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
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `user_id`, `token`, `expires_at`) VALUES
(26, 2, '207af7c47a64b0d2163e71fcb3e3652cbb82c9d02663095ee76b83a83e1b9004', '2023-11-23 13:47:04');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productDescription` varchar(9999) DEFAULT NULL,
  `productPrice` float(10,2) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productCategory` varchar(15) DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productDescription`, `productPrice`, `productQuantity`, `productCategory`, `productImage`) VALUES
(2, 'T-shirt 1', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opopis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opopis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opopis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opisopis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis ', 40.00, 100, 't-shirt', 'http://localhost/cos/img/no_photo.png'),
(3, 'T-shirt 2', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 50.00, 100, 't-shirt', 'http://localhost/cos/img/no_photo.png'),
(4, 'T-shirt 3', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 30.00, 100, 't-shirt', 'http://localhost/cos/img/no_photo.png'),
(5, 'T-shirt 4', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 60.00, 100, 't-shirt', 'http://localhost/cos/img/no_photo.png'),
(6, 'Bluza 1', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 100.00, 100, 'hoodie', 'http://localhost/cos/img/no_photo.png'),
(7, 'Bluza 2', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 120.00, 100, 'hoodie', 'http://localhost/cos/img/no_photo.png'),
(8, 'Bluza 3', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 200.00, 100, 'hoodie', 'http://localhost/cos/img/no_photo.png'),
(9, 'Bluza 4', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 160.00, 100, 'hoodie', 'http://localhost/cos/img/no_photo.png'),
(10, 'Maskotka 1', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 40.00, 100, 'mascot', 'http://localhost/cos/img/no_photo.png'),
(11, 'Maskotka 2', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 50.00, 100, 'mascot', 'http://localhost/cos/img/no_photo.png'),
(12, 'Maskotka 3', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 45.00, 100, 'mascot', 'http://localhost/cos/img/no_photo.png'),
(13, 'Maskotka 4', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 55.00, 100, 'mascot', 'http://localhost/cos/img/no_photo.png'),
(14, 'Bilet ulgowy', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 20.00, 0, 'ticket', 'http://localhost/cos/img/no_photo.png'),
(15, 'Bilet normalny', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 30.00, 0, 'ticket', 'http://localhost/cos/img/no_photo.png'),
(16, 'Bilet rodzinny', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 80.00, 0, 'ticket', 'http://localhost/cos/img/no_photo.png'),
(17, 'Bilet grupowy', 'opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis opis', 18.00, 0, 'ticket', 'http://localhost/cos/img/no_photo.png');

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
(2, 'user1', '$2y$10$5RLd8/3I2IDtKqUlg/gGW.v.n7KvKoyJr08KU8EMYqDJhORIeopuq', 'cos.test.inz@gmail.com'),
(3, 'user2', '$2y$10$gCm4qNjJwnx63.msKxfgYOoPM.2kyeDTeXv93/.dtY.L8vnSceK7i', 'cos2.test.inz@gmail.com');

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
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID_wydarzenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

--
-- Constraints for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD CONSTRAINT `password_reset_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
