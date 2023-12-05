-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 06:06 PM
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
-- Database: `web_gallery`
--
CREATE DATABASE IF NOT EXISTS `web_gallery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_gallery`;

-- --------------------------------------------------------

--
-- Table structure for table `photographers`
--

CREATE TABLE `photographers` (
  `photographerID` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photographers`
--

INSERT INTO `photographers` (`photographerID`, `firstName`, `lastName`, `birthDate`, `email`) VALUES
(1, 'Joseph', 'Smith', '2013-11-06', 'joSmith@gmail.com'),
(2, 'Deorwine', 'Stoyko  ', '1941-02-04', NULL),
(3, 'Elita', 'Roma', '1994-03-18', 'RomaE@aol.com'),
(4, 'Amalie', 'Adah', '2006-10-19', 'AdahAmmy@gmail.com'),
(5, 'Ghassan', 'Caiside', '1986-10-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photoID` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `camera` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `imgPath` varchar(100) NOT NULL,
  `creationDate` date NOT NULL,
  `photographerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photoID`, `size`, `camera`, `title`, `description`, `imgPath`, `creationDate`, `photographerID`) VALUES
(1, '3630 pixels x 3746 p', 'Canon EOS R3', 'Night Sky', 'Taken in the beautiful countryside, this photo invokes feelings of calm and tranquility to any fan of nature.', '.\\www\\img\\Night_Sky.jpeg', '2015-08-19', 1),
(2, ' 3776 pixels by 5664', 'Canon EOS R3', 'Forest Pond', 'Taken during a mid-day picnic, this photo deeply reminds the viewer of the throes of childhood in Vienna.', '.\\www\\img\\Forest_Pond.jpeg', '2006-07-24', 3),
(3, '5461 pixels by 6512 ', 'Nikon D850', 'Village Of Light', 'The photographer behind this photo experienced every part of their life in this town. Birth, marriage, retirement. When asked about the town itself, Ghassan responded with \"The town? It\'s home to me.\"', '.\\www\\img\\Village.jpeg', '1996-06-17', 5),
(4, '16000px x 16000px', 'iPhone 3', 'Italian Seaside', 'Immerse yourself in the timeless allure of this Italian city. Cobblestone streets lead to historic wonders, while aromatic cafes beckon with the promise of authentic flavors. Each corner tells a story of art, history, and the undeniable charm that defines this captivating destination.\r\n\r\n\r\n\r\n\r\n\r\n', '.\\www\\img\\Italian_Seaside.jpeg', '2023-11-02', 2),
(5, '500px x 500px', 'iPhone 17', 'Wheat Fields', 'Golden waves of wheat stretch as far as the eye can see, a vast sea of amber under the open sky. The gentle rustle of the wind whispers through the fields, creating a serene symphony of nature. In this expansive landscape, the beauty of simplicity unfolds in every swaying stalk.', '.\\www\\img\\Wheat_Plains.jpeg', '2023-11-02', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photographers`
--
ALTER TABLE `photographers`
  ADD PRIMARY KEY (`photographerID`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `photographer` (`photographerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `photographerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photographer` FOREIGN KEY (`photographerID`) REFERENCES `photographers` (`photographerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
