-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2018 at 10:36 PM
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
(1, 'Attard'),
(2, 'Bormla'),
(3, 'Birkirkara'),
(4, 'Dingli'),
(5, 'Pieta'),
(6, 'Mosta'),
(7, 'Zabbar'),
(8, 'Hamrun'),
(9, 'Mdina'),
(10, 'Msida');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `propertyId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `pricePerNight` double NOT NULL,
  `locationId` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`propertyId`, `title`, `capacity`, `pricePerNight`, `locationId`, `image`, `userId`) VALUES
(1, 'maisonette', 6, 100, 2, '', 1),
(2, 'maisonette2', 3, 123, 9, '', 3),
(3, 'ttt', 2, 33, 2, '', 2),
(4, 'ddd', 3, 123, 3, 'jms15.jpg', 2),
(5, 'qowen', 3, 123, 8, 'jms15.jpg', 3),
(6, '432', 2, 423, 2, 'images/', 3),
(7, '432', 2, 423, 2, 'images/', 4),
(8, '321', 3, 321, 5, 'images/', 5),
(9, 'qowen', 1, 698, 3, 'images/', 1),
(10, '123', 0, 123, 1, 'images/', 4),
(11, '123', 2, 123, 3, 'images/', 5),
(12, 'lol', 3, 3, 2, 'buq', 1),
(13, '123', 2, 123, 2, 'images/', 1),
(14, '123', 2, 123, 3, 'images/apartment1.jpg', 1),
(15, '123', 2, 123, 3, 'images/apartment1.jpg', 1),
(16, '123', 2, 123, 2, 'images/Hearthstone Screenshot 04-27-18 15.27.25.png', 1),
(17, 'abc', 3, 123, 1, 'images/Hearthstone Screenshot 04-19-18 00.14.38.png', 1),
(18, '123', 1, 123, 1, 'images/Hearthstone Screenshot 04-19-18 00.37.53.png', 1),
(19, '123', 1, 123, 1, 'images/Hearthstone Screenshot 04-19-18 00.37.53.png', 1),
(20, '123', 1, 123, 1, 'images/Hearthstone Screenshot 04-19-18 00.37.53.png', 1),
(21, '123', 2, 123, 2, 'images/Hearthstone Screenshot 04-27-18 15.27.20.png', 1),
(22, '123', 2, 123, 1, 'images/apartment1.jpg', 1),
(23, '123', 2, 123, 3, 'images/Hearthstone Screenshot 04-19-18 00.14.38.png', 1),
(24, '231', 1, 231, 2, 'images/jms15.jpg', 1),
(25, '231', 1, 231, 2, 'images/jms15.jpg', 1),
(26, '123', 2, 123, 1, 'images/Hearthstone Screenshot 04-27-18 15.27.20.png', 5),
(27, '123', 2, 123, 1, 'image/Hearthstone Screenshot 04-27-18 15.27.20.png', 5),
(28, 'Assignment', 1, 123, 2, 'image/Hearthstone Screenshot 04-27-18 15.09.07.png', 1),
(29, '123', 1, 123, 2, 'images/Hearthstone Screenshot 04-27-18 15.09.07.png', 1),
(30, '123', 1, 123, 2, 'image/58499bdfe9678476f6134575 (1).png', 1),
(31, 'aaa', 2, 123, 2, 'image/apartment.jpg', 1),
(32, 'jakakakakaka123', 2, 123, 2, 'image/3d1697a37f10b136adb7f73979dcae44.jpg', 1),
(33, 'Assignment', 2, 222, 2, 'image/28783197_1654615541270533_4815439009251590144_n.png', 1);

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
(1, 1, '2018-05-01', '2018-05-02', 123, 1),
(2, 3, '2018-05-01', '2018-05-04', 123, 2),
(3, 2, '2018-05-17', '2018-05-18', 123, 2),
(4, 9, '2018-05-01', '2018-05-05', 123, 9),
(5, 11, '2018-05-01', '2018-05-06', 111, 3),
(6, 11, '2018-05-15', '2018-05-19', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(59) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Jake', 'Salerno', 'test@test.com', '123'),
(2, 'Jake', 'asd', '123@123.123', '123'),
(3, '123', '123', '321@13.com', '123'),
(4, '321', '3231', '222@22.com', '123'),
(5, '321', '3231', '22112@22.com', '123456'),
(6, 'jklkj', 'kjkjl', 'tes8t@test.com', '123'),
(7, '321', '3321', '321321@123.123', '321'),
(8, '321', '321', '321@13.com2', '321'),
(9, '321', '321', '321@13.com22', '321'),
(10, '123', '123', '321@13.com21', '123'),
(11, '123', '123', '123@123.1231', '123'),
(12, '321', '321', '321@13.com222', '321');

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
  ADD KEY `locationId` (`locationId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `property_id` (`propertyId`),
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
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `propertyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `tbl_property` (`propertyId`),
  ADD CONSTRAINT `tbl_reservation_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
