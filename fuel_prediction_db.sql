-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 04:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel_prediction_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientinformation`
--

CREATE TABLE `clientinformation` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientinformation`
--

INSERT INTO `clientinformation` (`id`, `userid`, `name`, `address1`, `address2`, `city`, `state`, `zip`) VALUES
(1, 12, 'Test user', '20200-TTp', '20220-Zein', 'Texas', '01', '20200'),
(2, 26, 'John Doe', '20200-Nash', '10000-New', 'Kansas', '03', '20200');

-- --------------------------------------------------------

--
-- Table structure for table `fuelquote`
--

CREATE TABLE `fuelquote` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gallons_requested` int(11) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `suggested_price` double NOT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuelquote`
--

INSERT INTO `fuelquote` (`id`, `userid`, `gallons_requested`, `delivery_address`, `delivery_date`, `suggested_price`, `total_amount`) VALUES
(1, 12, 100, '20200-TTp', '2022-04-30', 1.725, 172.5),
(2, 12, 130, '20200-TTp', '2022-05-06', 1.71, 222.29999999999998),
(3, 26, 300, '20200-Nash', '2022-05-06', 1.755, 526.5),
(4, 26, 299, '20200-Nash', '2022-05-04', 1.74, 520.26);

-- --------------------------------------------------------

--
-- Table structure for table `usercredentials`
--

CREATE TABLE `usercredentials` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercredentials`
--

INSERT INTO `usercredentials` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$78pOq8/Hq/ep1DbZUIAVC.RNY/ZlvZcQlThPmH2CE9Yj.WaWTBsKK'),
(12, 'New User', '$2y$10$2vnlDotoBjh9VgaLzuSTgOqw2ysPfjKzeeZxXDE8FSSPxRfUj8VtO'),
(13, '1651240558', '$2y$10$d1fPm0WxLGCpcG/3GesCBeH/oe.RSNn1/LwEoFJzZTRSPzB1Hd2kK'),
(14, '1651241219', '$2y$10$4z93cp.uvys.xz6euHuKVuz1Onj1j/8ke1qmfqeW5burVMROeKRPO'),
(15, '1651241278', '$2y$10$48044ctGbgBpiN/UiZR/K.BAF16wP5i4PP54jEMC.V3J6dvZ1/bSm'),
(16, '1651241336', '$2y$10$EboVNTHzhS1w8fpFjf/CaODQwghsVauVRJE34wKp/WDrYAop2vyHq'),
(17, '1651241385', '$2y$10$FgJbmABRhcKybHj8vkRRne45ySq/tKl82TX/sDkLopclowcBsk0vC'),
(18, '1651241426', '$2y$10$DmN31JfKTiATXG3mMDwt7u5y4ioKEFXBGG11f6CyPL3cjHAIxhYgq'),
(19, '1651241649', '$2y$10$vg5nFyWLG2rPZagVaBOLtuuz.1NAjynMyggvk9Ju5QligMJhSUAme'),
(20, '1651241865', '$2y$10$lQ27Xbs4x.xb/ZYOJA4NFeECTfXuq/ogqA9OzPzdxUSk1V6vuek1e'),
(21, '1651241885', '$2y$10$bxCbfSLLCdj7CPewfOvAheB4hg6e18nJJ9s90TckoYMXTB5RKSNfe'),
(22, '1651241985', '$2y$10$SeSygUYBZ0h/rYv6Bg.1HuWVlOmI/ufQDaX0295zoRXDpSRQ/d7nO'),
(23, '1651242025', '$2y$10$YA051goOT2dpK6YP//YsvuemRryJLNh4QQMBs.NaqOXlge8esa.Xe'),
(24, '1651242114', '$2y$10$bcPjzSozi2VuHFhWMnDG/erwT4EnvdxLm/R9KheeJmV1SF9ljy.gy'),
(25, '1651242142', '$2y$10$60taA4i7Vh0zq53nbUdV8u4Ak4WN9FqHtTQQLihb7kV2iE8Sf1hay'),
(26, 'johndoe', '$2y$10$/DLzVY0H8wIZwgzXDmUmIu5LuFrHw6VTYVhC1w8DpeoeM2hhxJU1m'),
(27, '1651242287', '$2y$10$wmzi2Ae/sOBElBrxlwpqQ.8ZXAnAscpeoWTzCp/E3mSn61JE1gNuG'),
(28, '1651242326', '$2y$10$/eOsZ.VIoRZN3QfoDcv0kOHOI/.FidTjOdczGrSo52w8yi3O5Di4W'),
(29, '1651242795', '$2y$10$sKhi2zZPsWKPKORkFLFkuOJvvQr88t/Vwlb2wfxoQO91LHP.vYKO2'),
(30, '1651242797', '$2y$10$fHsDHGy1K05GrtvIwLYwreBSmzohaufMSGUyFA13kthDUL3k8nKxK'),
(31, '1651242800', '$2y$10$rIhyIxMlBKRZWvjXoPDauuQAONy7I2bsh4vYE/66LgQmfcUApkyMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientinformation`
--
ALTER TABLE `clientinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuelquote`
--
ALTER TABLE `fuelquote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercredentials`
--
ALTER TABLE `usercredentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientinformation`
--
ALTER TABLE `clientinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuelquote`
--
ALTER TABLE `fuelquote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usercredentials`
--
ALTER TABLE `usercredentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
