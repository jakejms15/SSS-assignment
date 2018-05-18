-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2018 at 04:20 PM
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
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`locationId`, `location`) VALUES
(1, 'Birgu'),
(5, 'Rabat'),
(12, 'Attard'),
(13, 'Balzan'),
(14, 'Birkirkara'),
(15, 'Birzebbuga'),
(17, 'Fgura'),
(18, 'Furjana'),
(21, 'Hal Gharghur'),
(22, 'Hal Ghaxaq'),
(31, 'Marsaxlokk'),
(42, 'Bormla'),
(43, 'Mdina'),
(44, 'Qormi'),
(46, 'Siggiewi'),
(47, 'Valletta'),
(48, 'Zabbar'),
(49, 'Zebbug'),
(50, 'Zejtun'),
(51, 'Isla'),
(56, 'Had-Dingli'),
(59, 'Gudja'),
(63, 'Hamrun'),
(64, 'Iklin'),
(65, 'Kalkara'),
(66, 'Hal Kirkop'),
(67, 'Hal Lija'),
(68, 'Hal Luqa'),
(69, 'Marsa'),
(70, 'Marsaskala'),
(71, 'Marsaxlokk'),
(72, 'Mellieha'),
(73, 'Imgarr'),
(74, 'Mosta'),
(75, 'Imqabba'),
(76, 'Imsida'),
(77, 'Naxxar'),
(78, 'Rahal Gdid'),
(79, 'Pembroke'),
(80, 'Pieta'),
(81, 'Qrendi'),
(82, 'Hal Safi'),
(83, 'San Gijan'),
(84, 'San Gwann'),
(85, 'San Pawl il-Bahar'),
(86, 'Santa Lucija'),
(87, 'Santa Venera'),
(88, 'Sliema'),
(89, 'Ta Xbiex'),
(90, 'Hal Tarxien'),
(91, 'Zghajra'),
(92, 'Imtarfa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `propertyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `pricePerNight` double NOT NULL,
  `locationId` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`propertyId`, `userId`, `title`, `capacity`, `pricePerNight`, `locationId`, `image`) VALUES
(15, 4, '1', 8, 15, 90, 'images/Malta Country Holiday Villa - www.holiday-malta.com (1).jpg'),
(16, 4, '2', 8, 23, 90, 'images/download.jpg'),
(17, 4, '3', 8, 12, 1, 'images/84641095.jpg'),
(18, 4, '4', 7, 42, 90, 'images/3842-004-C238EDD3.jpg'),
(21, 4, 'asd', 1, 23, 1, 'images/31786655_1903924156305192_678456712230862848_n.jpg'),
(22, 5, '123', 1, 123, 1, 'images/Hearthstone Screenshot 04-19-18 00.37.53.png'),
(23, 5, 'teesstt', 2, 3333333, 42, 'image/30712385_1694066727325414_3520333990995165184_n.jpg'),
(24, 5, '123', 1, 123, 1, 'image/Hearthstone Screenshot 04-19-18 00.14.38.png'),
(25, 5, '123', 1, 123, 1, 'image/Hearthstone Screenshot 04-19-18 00.37.53.png'),
(26, 5, 'Assignment', 1, 1111, 1, 'image/dsadsada.jpg'),
(27, 5, '123', 1, 32, 50, 'image/Hearthstone Screenshot 04-27-18 15.27.20.png'),
(28, 5, 'jake', 2, 123, 12, 'image/shark2.jpg'),
(29, 5, '123', 2, 123, 12, 'image/shark2.jpg'),
(30, 5, 'TestProperty', 2, 66, 14, 'image/shree_chaaya_apartment_sanpada-mumbai-shree_developers.jpg'),
(31, 5, '123', 2, 213, 12, 'image/shree_chaaya_apartment_sanpada-mumbai-shree_developers.jpg'),
(32, 10, 'propert 13', 2, 123, 1, 'images/3d1697a37f10b136adb7f73979dcae44.jpg'),
(33, 10, '123', 2, 23, 5, 'images/2ad30a19903db499b8f246aa2ab1f7ef_400x1000.jpg');

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
(8, 16, '2018-05-01', '2018-05-09', 368, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `name`, `surname`, `email`, `password`) VALUES
(3, 'admin', 'admin', 'admin@admin.com', '$2y$10$dfnKqp9QDUyMXfx4VkOaYezHd78hcCsbz0XUi4gq/A6ieMdXm7KGG'),
(4, 'Nathaniel', 'Mizzi', 'nathanielmizzi2@gmail.com', '$2y$10$oPQSjhi8rG1AF14ChgGR5uhuEowVccyHgrIDnZqqWBKwo8g4BuxGC'),
(5, '123', '123', '123@123.com', '123'),
(6, 'TestAccount', 'Test', 'test@test.com', '123'),
(7, '123', '123', '123@123.com3', '123'),
(8, '123', '321', 'jakebestboy@hotmail.com3', '123'),
(9, '123', '123', '321@323232.32', '123'),
(10, 'jake', 'salerno', 'jake.salerno@test.com', '123');

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
  ADD UNIQUE KEY `propertyId` (`propertyId`),
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
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `propertyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
