-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 09, 2021 at 07:54 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `id_depot` int(11) NOT NULL,
  `address_depot` varchar(255) DEFAULT NULL,
  `depot_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `id_deliveryman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `id_depot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT;

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
