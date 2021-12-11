-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 06:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fairhomepro`
--
CREATE DATABASE IF NOT EXISTS `fairhomepro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fairhomepro`;

-- --------------------------------------------------------

--
-- Table structure for table `bid_request`
--

CREATE TABLE IF NOT EXISTS `bid_request` (
  `request_ID` int(11) NOT NULL,
  `zip` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `bid_date` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `HO_email` varchar(100) DEFAULT NULL,
  `SP_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`request_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `complaint_ID` int(11) NOT NULL,
  `contract_ID` int(11) DEFAULT NULL,
  `contract_date` varchar(100) DEFAULT NULL,
  `complaint_date` varchar(255) DEFAULT NULL,
  `complaint_text` varchar(255) DEFAULT NULL,
  `SP_email` varchar(100) DEFAULT NULL,
  `HO_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`complaint_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_ID`, `contract_ID`, `contract_date`, `complaint_date`, `complaint_text`, `SP_email`, `HO_email`) VALUES
(1, 1, '2021/12/09', '2021/12/09', 'no like', 'bluecross@gmail.com', 'jmharris7755@gmail.com'),
(2, 3, '2021/12/09', '2021/12/09', 'Not Satisfactory', 'bluecross@gmail.com', 'wecamp@gmail.com'),
(3, 4, '2021/12/09', '2021/12/09', 'Rude employees', 'bluecross@gmail.com', 'wecamp@gmail.com'),
(4, 7, '2021/12/09', '2021/12/09', 'Unsatisfactory Work', 'GGardening@duckduckgo.com', 'fgerry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contract_ID` int(11) NOT NULL,
  `contract_date` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `SP_email` varchar(100) DEFAULT NULL,
  `HO_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_ID`, `contract_date`, `service_type`, `price`, `SP_email`, `HO_email`) VALUES
(1, '2021/12/09', 'Lawn Mowing', 3, 'bluecross@gmail.com', 'jmharris7755@gmail.com'),
(2, '2021/12/09', 'Lawn Mowing', 3, 'bluecross@gmail.com', 'jmharris7755@gmail.com'),
(3, '2021/12/09', 'Lawn Mowing', 3, 'bluecross@gmail.com', 'wecamp@gmail.com'),
(4, '2021/12/09', 'Lawn Mowing', 3, 'bluecross@gmail.com', 'wecamp@gmail.com'),
(5, '2021/12/09', 'Lawn Mowing', 3, 'bluecross@gmail.com', 'bwheats@gmail.com'),
(6, '2021/12/09', 'Lawn Mowing', 3, 'bluecross@gmail.com', 'jmharris7755@gmail.com'),
(7, '2021/12/09', 'Hedge Trimming', 5, 'GGardening@duckduckgo.com', 'fgerry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `has_plant`
--

CREATE TABLE IF NOT EXISTS `has_plant` (
  `home_ID` int(11) NOT NULL,
  `plant_ID` int(11) NOT NULL,
  KEY `home_ID` (`home_ID`),
  KEY `plant_ID` (`plant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_plant`
--

INSERT INTO `has_plant` (`home_ID`, `plant_ID`) VALUES
(1, 6),
(2, 3),
(1, 2),
(2, 6),
(1, 4),
(2, 5),
(3, 5),
(3, 2),
(4, 3),
(5, 2),
(6, 4),
(7, 6),
(8, 3),
(9, 3),
(10, 3),
(9, 2),
(10, 5),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `homeowners`
--

CREATE TABLE IF NOT EXISTS `homeowners` (
  `HO_name` varchar(45) NOT NULL,
  `HO_email` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `HO_phone` int(11) NOT NULL,
  `HO_creditcard` bigint(20) UNSIGNED DEFAULT NULL,
  `HO_bankaccount` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`HO_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homeowners`
--

INSERT INTO `homeowners` (`HO_name`, `HO_email`, `password`, `HO_phone`, `HO_creditcard`, `HO_bankaccount`) VALUES
('anotherTest', 'anotherTest@test.com', '123', 123, 123, 123),
('Billy Blanks', 'bblanks@gmail.com', 'gobilly123', 2147483647, 6201359985762258, 6201359985762258),
('Berry Wheats', 'bwheats@gmail.com', '123', 2086761350, 12345689, 123456789),
('Fred Gerry', 'fgerry@gmail.com', 'qwerty', 1111111111, 10235698541023654, 10231254785698520),
('Justin Haris', 'jmharris7755@gmail.com', '123', 2088184087, 123, 123),
('Sarah', 'scamper@gmail.com', 'Hello123', 2147483647, 456312897564231, 23156875642315),
('Winter Campbell', 'wecamp@gmail.com', '123', 2085555555, 123, 123);

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE IF NOT EXISTS `homes` (
  `home_ID` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(21) NOT NULL,
  `zip` bigint(20) UNSIGNED NOT NULL,
  `constr_type` varchar(45) NOT NULL,
  `floors` varchar(45) NOT NULL,
  `h_sq_ft` bigint(20) UNSIGNED NOT NULL,
  `y_sq_ft` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`home_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`home_ID`, `street`, `city`, `state`, `zip`, `constr_type`, `floors`, `h_sq_ft`, `y_sq_ft`) VALUES
(1, '789 Test Street', 'Spokane', 'NULL', 99602, 'Timber Frame', 'Laminate', 1024, 100),
(2, '123 Test Street', 'Post Falls', 'CA', 88888, '55+', 'Laminate', 123, 123),
(3, '1001 Happy Ave', 'Lucky Town', 'CO', 88523, 'Custome Home', 'Laminate', 123, 123),
(4, '603 Gerund Blvd', 'New York', 'NY', 88750, 'Concrete Building', 'Laminate', 123, 123),
(5, '666 Testing', 'Testing', 'AZ', 88888, 'Wood Frame', 'Ceramic', 44444, 555555),
(6, '444 Reston Court', 'CDA', 'ID', 83814, 'Concrete Building', 'Laminate', 852, 96),
(7, '888 Northwest Blvd', 'Anchorage', 'AK', 85630, 'Log Home', 'Hardwood', 650, 800),
(8, '10258 Pasture Drive', 'Albany', 'OK', 43660, 'Production Home', 'Porcelain', 500, 600),
(9, '808025 School House Drive', 'Coeur D Alene', 'ID', 83815, 'Multifamily', 'Hardwood', 1025, 400),
(10, '789 testers street', 'Post Falls', 'CA', 83854, '55+', 'Hardwood', 1000, 300);

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE IF NOT EXISTS `licenses` (
  `SP_email` varchar(100) DEFAULT NULL,
  `licenses` varchar(100) DEFAULT NULL,
  KEY `SP_email` (`SP_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE IF NOT EXISTS `owns` (
  `home_ID` int(11) NOT NULL,
  `HO_email` varchar(45) NOT NULL,
  KEY `home_ID` (`home_ID`),
  KEY `HO_email` (`HO_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`home_ID`, `HO_email`) VALUES
(1, 'wecamp@gmail.com'),
(2, 'wecamp@gmail.com'),
(3, 'jmharris7755@gmail.com'),
(4, 'wecamp@gmail.com'),
(5, 'anotherTest@test.com'),
(6, 'bwheats@gmail.com'),
(7, 'scamper@gmail.com'),
(8, 'bblanks@gmail.com'),
(9, 'fgerry@gmail.com'),
(10, 'fgerry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `plant_types`
--

CREATE TABLE IF NOT EXISTS `plant_types` (
  `plant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `plant_type` varchar(100) NOT NULL,
  PRIMARY KEY (`plant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plant_types`
--

INSERT INTO `plant_types` (`plant_ID`, `plant_type`) VALUES
(1, 'Begonias'),
(2, 'Fuchsia'),
(3, 'Geraniums'),
(4, 'Abutilon'),
(5, 'Caladium'),
(6, 'Rose Bushes'),
(7, 'Boxwood and Myrtle');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `SP_email` varchar(100) DEFAULT NULL,
  `s_type` varchar(100) NOT NULL,
  `s_price` bigint(20) UNSIGNED NOT NULL,
  KEY `SP_email` (`SP_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`SP_email`, `s_type`, `s_price`) VALUES
('bluecross@gmail.com', 'Lawn Mowing', 3),
('jwindows@hotmail.com', 'Window Cleaning', 100),
('winxpress@outlook.com', 'Window Cleaning', 50),
('moemower@moemowers.com', 'Lawn Mowing', 18),
('GGardening@duckduckgo.com', 'Hedge Trimming', 5),
('GGardening@duckduckgo.com', 'Garden upkeeping', 10),
('ARHI@allround.com', 'Lawn Mowing', 15),
('ARHI@allround.com', 'Window Cleaning', 25),
('ARHI@allround.com', 'Hedge Trimming', 75),
('ARHI@allround.com', 'Garden upkeeping', 90),
('gconstruction@hotmail.com', 'Hedge Trimming', 50),
('gconstruction@hotmail.com', 'Lawn Mowing', 10),
('gconstruction@hotmail.com', 'Window Cleaning', 2),
('gconstruction@hotmail.com', 'Garden upkeeping', 17),
('HHS@outlook.com', 'Lawn Mowing', 20);

-- --------------------------------------------------------

--
-- Table structure for table `service_pros`
--

CREATE TABLE IF NOT EXISTS `service_pros` (
  `Business_Name` varchar(45) NOT NULL,
  `SP_email` varchar(100) NOT NULL,
  `SP_password` varchar(16) NOT NULL,
  `SP_phone` bigint(20) UNSIGNED DEFAULT NULL,
  `SP_creditcard` bigint(20) UNSIGNED DEFAULT NULL,
  `SP_bankaccount` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`SP_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_pros`
--

INSERT INTO `service_pros` (`Business_Name`, `SP_email`, `SP_password`, `SP_phone`, `SP_creditcard`, `SP_bankaccount`) VALUES
('All Around Home Improvements', 'ARHI@allround.com', 'round123', 2032569874, 2136598632562447, 123550232500244887),
('Blue Cross Blue Shield', 'bluecross@gmail.com', '123', 123, 123, 123),
('Generals construction', 'gconstruction@hotmail.com', '123456789', 9098886578, 123456798995213655, 20236998564471020),
('Gerrys Gradening', 'GGardening@duckduckgo.com', '123', 2088185555, 4078965412358945, 8745563214789965),
('Harrys Hanman Service', 'HHS@outlook.com', '1234', 2087556699, 1234567894561230, 9876543218521695),
('Jim\'s Windows Cleaning', 'jwindows@hotmail.com', 'HappyJim', 5556982360, 1023658965412365, 6452369856478521),
('Lawn Service Guys', 'lsgw@gmail.com', '123456', 5559865201, 123456789, 123456789),
('Moes Mowers', 'moemower@moemowers.com', 'Moemower', 4256985233, 4568713256981200, 1002365887456932),
('Windows Xpress', 'winxpress@outlook.com', 'Winexpress', 8062365489, 6201589645893256, 6201589645893256);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE IF NOT EXISTS `service_types` (
  `service_ID` int(11) NOT NULL,
  `service` varchar(45) NOT NULL,
  PRIMARY KEY (`service_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`service_ID`, `service`) VALUES
(1, 'Lawn Mowing'),
(2, 'Window Cleaning'),
(3, 'Hedge Trimming'),
(4, 'Garden upkeeping');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE IF NOT EXISTS `specialties` (
  `SP_email` varchar(100) DEFAULT NULL,
  `service_ID` int(11) DEFAULT NULL,
  `specialty_ID` int(11) NOT NULL,
  PRIMARY KEY (`specialty_ID`),
  KEY `SP_email` (`SP_email`),
  KEY `service_ID` (`service_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`SP_email`, `service_ID`, `specialty_ID`) VALUES
('bluecross@gmail.com', 1, 1),
('jwindows@hotmail.com', 2, 2),
('winxpress@outlook.com', 2, 3),
('moemower@moemowers.com', 1, 4),
('GGardening@duckduckgo.com', 4, 5),
('ARHI@allround.com', 4, 6),
('gconstruction@hotmail.com', 3, 7),
('HHS@outlook.com', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_ID` int(11) NOT NULL,
  `HO_email` varchar(100) DEFAULT NULL,
  `SP_email` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `contract_ID` varchar(100) DEFAULT NULL,
  `transaction_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`transaction_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `HO_email`, `SP_email`, `service_type`, `price`, `contract_ID`, `transaction_date`) VALUES
(1, 'jmharris7755@gmail.com', 'bluecross@gmail.com', 'Lawn Mowing', 3, '1', '2021/12/09'),
(2, 'jmharris7755@gmail.com', 'bluecross@gmail.com', 'Lawn Mowing', 3, '2', '2021/12/09'),
(3, 'wecamp@gmail.com', 'bluecross@gmail.com', 'Lawn Mowing', 3, '3', '2021/12/09'),
(4, 'wecamp@gmail.com', 'bluecross@gmail.com', 'Lawn Mowing', 3, '4', '2021/12/09'),
(5, 'bwheats@gmail.com', 'bluecross@gmail.com', 'Lawn Mowing', 3, '5', '2021/12/09'),
(6, 'jmharris7755@gmail.com', 'bluecross@gmail.com', 'Lawn Mowing', 3, '6', '2021/12/09'),
(7, 'fgerry@gmail.com', 'GGardening@duckduckgo.com', 'Hedge Trimming', 5, '7', '2021/12/09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `has_plant`
--
ALTER TABLE `has_plant`
  ADD CONSTRAINT `has_plant_ibfk_1` FOREIGN KEY (`home_ID`) REFERENCES `homes` (`home_ID`),
  ADD CONSTRAINT `has_plant_ibfk_2` FOREIGN KEY (`plant_ID`) REFERENCES `plant_types` (`plant_ID`);

--
-- Constraints for table `licenses`
--
ALTER TABLE `licenses`
  ADD CONSTRAINT `licenses_ibfk_1` FOREIGN KEY (`SP_email`) REFERENCES `service_pros` (`SP_email`);

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`home_ID`) REFERENCES `homes` (`home_ID`),
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`HO_email`) REFERENCES `homeowners` (`HO_email`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`SP_email`) REFERENCES `service_pros` (`SP_email`);

--
-- Constraints for table `specialties`
--
ALTER TABLE `specialties`
  ADD CONSTRAINT `specialties_ibfk_1` FOREIGN KEY (`SP_email`) REFERENCES `service_pros` (`SP_email`),
  ADD CONSTRAINT `specialties_ibfk_2` FOREIGN KEY (`service_ID`) REFERENCES `service_types` (`service_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
