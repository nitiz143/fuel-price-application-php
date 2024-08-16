-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 10:56 PM
-- Server version: 10.6.13-MariaDB
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softproitsolutions_com_`
--

-- --------------------------------------------------------

--
-- Table structure for table `005_fuelprices_prices`
--

CREATE TABLE `005_fuelprices_prices` (
  `id` int(11) NOT NULL,
  `dateofprice` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phonenumber` text DEFAULT NULL,
  `before6amprice` text DEFAULT NULL,
  `after6amprice` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `005_fuelprices_prices`
--

INSERT INTO `005_fuelprices_prices` (`id`, `dateofprice`, `name`, `address`, `phonenumber`, `before6amprice`, `after6amprice`, `latitude`, `longitude`) VALUES
(1, '2024-04-03', 'sdasdasd', '12345 40 Street Southeast, Calgary, AB, Canada', '46365235435542', '465', '565', '50.9378012', '-113.9732088'),
(2, '2024-04-03', 'adsdada', 'Sydney NSW, Australia', '5133681666', '6', '6', '-33.8688197', '151.2092955'),
(3, '2024-04-03', 'Gentle Dental Hervey Bay', 'Shop 2/13 Medical Pl, Urraween QLD 4655, Australia', '2342432', '376', '342', '-25.3004051', '152.8262822'),
(4, '2024-04-03', '4Cyte Pathology', '10 Medical Pl, Urraween QLD 4655, Australia', '436356536356', '567', '343', '-25.2997542', '152.8258711'),
(5, '2024-04-03', 'Easts Rugby Union', '31 Halifax St, Norman Park QLD 4170, Australia', '65456242', '99999123', '134', '-27.4841989', '153.0605456'),
(6, '2024-04-03', 'Red Galanga Asian Cuisine', '3/112 Bennetts Rd, Norman Park QLD 4170, Australia', '35456', '4534', '334', '-27.4865484', '153.0632642'),
(7, '2024-04-03', 'Bamiyan Restaurant', '3/82 Bennetts Rd, Camp Hill QLD 4151, Australia', '3423423', '123', '234', '-27.4881306', '153.0637861'),
(8, '2024-04-03', 'HealthSave Norman Park Chemist', '154 Bennetts Rd, Norman Park QLD 4170, Australia', '3453434', '3434', '99999232', '-27.4845188', '153.0633056'),
(9, '2024-04-03', 'Mortgage Choice Norman Park- Mark Waugh', '69 Mcilwraith Ave, Norman Park QLD 4170, Australia', '234234234234', '123', '445', '-27.484762', '153.0674254');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `005_fuelprices_prices`
--
ALTER TABLE `005_fuelprices_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `005_fuelprices_prices`
--
ALTER TABLE `005_fuelprices_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
