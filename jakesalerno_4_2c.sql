-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2018 at 11:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jakesalerno_4.2c`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `locationId` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`locationId`, `location`) VALUES
(1, 'Pieta'),
(2, 'Bormla'),
(3, 'Msida'),
(4, 'Marsa'),
(5, 'Mdina'),
(6, 'Birkirkara'),
(7, 'Valletta'),
(8, 'Tarxien'),
(9, 'Zabbar'),
(10, 'Hamrun'),
(11, 'Mellieha'),
(12, 'Burmarrad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `propertyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `pricePerNight` double NOT NULL,
  `locationId` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`propertyId`, `userId`, `title`, `capacity`, `pricePerNight`, `locationId`, `image`) VALUES
(22, 7, 'Property 1', 2, 50, 1, 'images/497buying_italian-_property.jpg'),
(23, 7, 'Property 2', 3, 100, 5, 'images/39836545.jpg'),
(24, 7, 'property 3', 2, 22, 1, 'images/shree_chaaya_apartment_sanpada-mumbai-shree_developers.jpg'),
(25, 10, 'Joe', 2, 33, 1, 'images/Appartment-2.png'),
(27, 10, 'Property111', 3, 32, 1, 'images/app2.jpg'),
(29, 11, 'charlesProp', 1, 11, 1, 'images/39836545.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `reservationId` int(11) NOT NULL,
  `propertyId` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `amountPaid` double NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`reservationId`, `propertyId`, `date_from`, `date_to`, `amountPaid`, `userId`) VALUES
(39, 22, '2018-05-26', '2018-05-26', 50, 8),
(40, 23, '2018-05-26', '2018-05-26', 100, 10),
(41, 27, '2018-04-26', '2018-04-30', 32, 11),
(42, 25, '2018-04-26', '2018-05-26', 66, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `name`, `surname`, `email`, `password`) VALUES
(5, 'Admin', 'Admin', 'admin@admin.com', '123456'),
(7, 'Jake', 'Salerno', '123@123.com', '123123'),
(8, 'testName', 'testSurname', 'test@test.com', '123123'),
(9, 'Jake', 'Salerno', 'jake@salerno.com', '123456'),
(10, 'Joe', 'Borg', 'joeborg@gmail.com', '321321'),
(11, 'Charlie', 'Fenech', 'charles@gmail.com', '123213');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`propertyId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `locationId` (`locationId`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `propertyId` (`propertyId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `propertyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD CONSTRAINT `tbl_property_ibfk_1` FOREIGN KEY (`locationId`) REFERENCES `tbl_location` (`locationId`),
  ADD CONSTRAINT `tbl_property_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userId`);

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_reservation_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `tbl_property` (`propertyId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
