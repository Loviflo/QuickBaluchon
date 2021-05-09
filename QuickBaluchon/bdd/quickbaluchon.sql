-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2021 at 04:28 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickbaluchon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `bill_date` datetime DEFAULT NULL,
  `amount` decimal(7,2) DEFAULT NULL,
  `file_bill` varchar(255) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `paid` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `bill_date`, `amount`, `file_bill`, `id_client`, `paid`) VALUES
(22, '2021-05-09 17:38:52', '15.70', 'Bill-4-1620574732.pdf', 4, NULL),
(29, '2021-05-09 18:17:52', '15.70', 'Bill-4-1620577072.pdf', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `cli_pwd` varchar(128) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `siret_nb` int(30) NOT NULL,
  `motives` text NOT NULL,
  `comf_cli` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `company_name`, `cli_pwd`, `mail`, `billing_address`, `siret_nb`, `motives`, `comf_cli`) VALUES
(1, 'Test', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7', 'Test@test.fr', NULL, 123456789, 'motivations', 1),
(2, 'Test1', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7', 'Test@test', 'fsqfs', 132, 'dsfdsqfdsq', 1),
(3, 'Test2', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7', 'fdsqfd', 'qsdsqdsq', 332242, 'fdsfs', 1),
(4, 'Test3', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7', 'kicass8@gmail.com', 'qsdsqdsq', 332242, 'fdsfs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `id_deliveryman` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `del_email` varchar(255) NOT NULL,
  `delivery_range` float DEFAULT NULL,
  `nb_km` float DEFAULT NULL,
  `nb_pck` int(11) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `cv` varchar(255) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `vehicle_brand` varchar(50) DEFAULT NULL,
  `vehicle_capacity` int(11) DEFAULT NULL,
  `comf_del` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`id_deliveryman`, `username`, `password`, `del_email`, `delivery_range`, `nb_km`, `nb_pck`, `iban`, `cv`, `vehicle_type`, `vehicle_brand`, `vehicle_capacity`, `comf_del`) VALUES
(1, 'Pierre', 'Test1234', 'test@test.com', NULL, NULL, NULL, NULL, 'uploads/CVPierre.txt', NULL, NULL, NULL, NULL),
(2, 'Test', 'Test1234', 'test@test.com', NULL, NULL, NULL, NULL, 'uploads/profile1616496975.png', NULL, NULL, NULL, NULL),
(3, 'Test3', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7', 'test@test.fr', NULL, NULL, NULL, NULL, 'uploads/CVTest3.pdf', NULL, NULL, NULL, 1),
(4, 'Test6', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7', 'test@test.com', 15, NULL, NULL, '3216808', '../uploads/CVTest6.pdf', 'big_car', 'nissan', 154, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `id_depot` int(11) NOT NULL,
  `address_depot` varchar(255) DEFAULT NULL,
  `depot_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`id_depot`, `address_depot`, `depot_capacity`) VALUES
(1, 'Une adresse', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id_package` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `destination` varchar(220) DEFAULT NULL,
  `tracking_id` varchar(255) DEFAULT NULL,
  `additional_info` text,
  `delivery_type` enum('EXPRESS','STANDARD') NOT NULL DEFAULT 'STANDARD',
  `delivery_status` enum('TO_DELIVER','IN_PROGRESS','DELIVERED','NOT_FOUND') NOT NULL DEFAULT 'TO_DELIVER',
  `id_client` int(11) NOT NULL,
  `id_deliveryman` int(11) DEFAULT NULL,
  `id_depot` int(11) NOT NULL,
  `id_bill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id_package`, `weight`, `destination`, `tracking_id`, `additional_info`, `delivery_type`, `delivery_status`, `id_client`, `id_deliveryman`, `id_depot`, `id_bill`) VALUES
(5, 15, 'sffsw', '24157432', 'no', 'STANDARD', 'TO_DELIVER', 4, NULL, 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `paysheet`
--

CREATE TABLE `paysheet` (
  `id_sheet` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `file_pay` varchar(255) DEFAULT NULL,
  `id_deliveryman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `password`) VALUES
('Test', 'b43f1d28a3dbf30070bf1ae7c88ee2784047fc86d7be8620c8510debbd8555b3ef0b96376a4dd494ae0561580274bcf7a3069f5c0beceff63d1237a13d4d72b7');

-- --------------------------------------------------------

--
-- Table structure for table `tariff_grid`
--

CREATE TABLE `tariff_grid` (
  `max_weight` decimal(3,1) DEFAULT NULL,
  `delivery_type` enum('EXPRESS','STANDARD') NOT NULL DEFAULT 'STANDARD',
  `price` decimal(5,2) DEFAULT NULL,
  `slice_weight` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tariff_grid`
--

INSERT INTO `tariff_grid` (`max_weight`, `delivery_type`, `price`, `slice_weight`) VALUES
('0.5', 'STANDARD', '4.55', NULL),
('0.5', 'EXPRESS', '5.91', NULL),
('1.0', 'STANDARD', '5.35', NULL),
('1.0', 'EXPRESS', '6.95', NULL),
('2.0', 'STANDARD', '6.05', NULL),
('2.0', 'EXPRESS', '7.86', NULL),
('3.0', 'STANDARD', '6.95', NULL),
('3.0', 'EXPRESS', '9.03', NULL),
('5.0', 'STANDARD', '8.15', NULL),
('5.0', 'EXPRESS', '10.59', NULL),
('7.0', 'STANDARD', '10.75', NULL),
('7.0', 'EXPRESS', '13.97', NULL),
('10.0', 'STANDARD', '13.00', NULL),
('10.0', 'EXPRESS', '16.90', NULL),
('15.0', 'STANDARD', '15.70', NULL),
('15.0', 'EXPRESS', '20.41', NULL),
('30.0', 'STANDARD', '19.70', NULL),
('30.0', 'EXPRESS', '25.61', NULL),
(NULL, 'STANDARD', '23.15', '20.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `FK_Client_Bill` (`id_client`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`id_deliveryman`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`id_depot`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_package`),
  ADD KEY `FK_Client_Package` (`id_client`),
  ADD KEY `FK_Deliveryman_Package` (`id_deliveryman`),
  ADD KEY `FK_Depot_Package` (`id_depot`),
  ADD KEY `FK_Billl_Package` (`id_bill`);

--
-- Indexes for table `paysheet`
--
ALTER TABLE `paysheet`
  ADD PRIMARY KEY (`id_sheet`),
  ADD KEY `FK_Deliveryman_Paysheet` (`id_deliveryman`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `id_deliveryman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `id_depot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paysheet`
--
ALTER TABLE `paysheet`
  MODIFY `id_sheet` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_Client_Bill` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `FK_Billl_Package` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Client_Package` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Deliveryman_Package` FOREIGN KEY (`id_deliveryman`) REFERENCES `deliveryman` (`id_deliveryman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Depot_Package` FOREIGN KEY (`id_depot`) REFERENCES `depot` (`id_depot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paysheet`
--
ALTER TABLE `paysheet`
  ADD CONSTRAINT `FK_Deliveryman_Paysheet` FOREIGN KEY (`id_deliveryman`) REFERENCES `deliveryman` (`id_deliveryman`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
