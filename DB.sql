-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 08:47 PM
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
(2025, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `ID` int(11) NOT NULL,
  `eng` varchar(100) NOT NULL,
  `tamil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`ID`, `eng`, `tamil`) VALUES
(2025, '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`) VALUES
('mafrid029@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
