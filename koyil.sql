-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2026 at 11:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koyil`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `ID` int(11) NOT NULL,
  `tamJan` varchar(100) NOT NULL,
  `tamFeb` varchar(100) NOT NULL,
  `tamMar` varchar(100) NOT NULL,
  `tamApr` varchar(100) NOT NULL,
  `tamMay` varchar(100) NOT NULL,
  `tamJun` varchar(100) NOT NULL,
  `tamJul` varchar(100) NOT NULL,
  `tamAug` varchar(100) NOT NULL,
  `tamSep` varchar(100) NOT NULL,
  `tamOct` varchar(100) NOT NULL,
  `tamNov` varchar(100) NOT NULL,
  `tamDec` varchar(100) NOT NULL,
  `tamEvent` varchar(100) NOT NULL,
  `engJan` varchar(100) NOT NULL,
  `engFeb` varchar(100) NOT NULL,
  `engMar` varchar(100) NOT NULL,
  `engApr` varchar(100) NOT NULL,
  `engMay` varchar(100) NOT NULL,
  `engJun` varchar(100) NOT NULL,
  `engJul` varchar(100) NOT NULL,
  `engAug` varchar(100) NOT NULL,
  `engSep` varchar(100) NOT NULL,
  `engOct` varchar(100) NOT NULL,
  `engNov` varchar(100) NOT NULL,
  `engDec` varchar(100) NOT NULL,
  `engEvent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`ID`, `tamJan`, `tamFeb`, `tamMar`, `tamApr`, `tamMay`, `tamJun`, `tamJul`, `tamAug`, `tamSep`, `tamOct`, `tamNov`, `tamDec`, `tamEvent`, `engJan`, `engFeb`, `engMar`, `engApr`, `engMay`, `engJun`, `engJul`, `engAug`, `engSep`, `engOct`, `engNov`, `engDec`, `engEvent`) VALUES
(2025, 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/January(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/February(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/March(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/April(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/May(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/June(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/July(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/August(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/September(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/October(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/November(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/December(T).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/Tamil Summary.jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/January(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/February(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/March(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/April(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/May(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/June(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/July(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/August(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/September(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/October(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/November(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/December(E).jpg', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Calendar/English Summary.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` varchar(20) NOT NULL,
  `event` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `uploadedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `event`, `image`, `uploadedDate`) VALUES
('album1516', 'tes37', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Album/album1516 tes3/album1516_1778360730_4389.jpg', '2026-05-09 22:11:44'),
('album1516', 'tes37', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Album/album1516 tes3/album1516_1778360730_4429.jpg', '2026-05-09 22:11:44'),
('album1516', 'tes37', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Album/album1516 tes3/album1516_1778360730_7449.jpg', '2026-05-09 22:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `lang` varchar(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `lang`, `createdAt`, `image`) VALUES
(23, 'tamil', 't', '2026-05-09 22:13:20', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Notice/1778364800tam.jpg'),
(24, 'eng', 'e', '2026-05-09 22:14:02', 'D:/Freelancing/katpakaVinayakar - Copy/Public/Notice/1778364842eng.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `ID` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`ID`, `title`, `description`, `date`, `time`) VALUES
('event0935', 'Test', 'Yest', '2026-05-01', '23:22:00'),
('event1616', 'test', 'tes', '2026-05-26', '23:23:00'),
('event2829', 'Test 33 ', 'test descr 2333', '2026-05-13', '13:25:00'),
('event3181', 'test 44444', '444444', '2026-05-24', '02:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `isAdmin`, `isActive`, `id`) VALUES
('mafrid029@gmail.com', '$2y$10$ax2i0bKcyMy1dtFznREsE.KOjJi8c50KY0eUfs/CIAEbm2euduBnC', 1, 1, 1),
('afrid2023@gmail.com', '$2y$10$TEqG5.4jsVIbwr0/v4bAJuFXkzl.PBiyEHSjeXfyBN2R5RVbBht7u', 0, 1, 2),
('lll@jhhh.nnn', '$2y$10$giR/epzEmxJRZeup8ecI2OWVf9y7oh/SKf1g..3sOUoAQD3Vq/6m6', 0, 1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`,`event`,`image`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
