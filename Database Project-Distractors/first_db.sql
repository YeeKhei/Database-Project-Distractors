-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 08:44 AM
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
-- Database: `first_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(10) NOT NULL,
  `Category_Name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(1, 'Cat Food'),
(2, 'Chicken Food'),
(3, 'Duck Food'),
(4, 'rabbit food');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Product_ID` varchar(10) NOT NULL,
  `Product_Name` varchar(80) NOT NULL,
  `Category_ID` varchar(10) NOT NULL,
  `Product_Price` varchar(80) NOT NULL,
  `Product_Supplier` varchar(80) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Product_ID`, `Product_Name`, `Category_ID`, `Product_Price`, `Product_Supplier`, `Stock`, `Status`) VALUES
('CA0001', 'Meow Mix 30LB', '1', 'RM15.00', 'CA01', 20, 'Active'),
('CH0002', 'Chicky Feed 10LB', '2', 'RM14.00', 'CH02', 25, 'Active'),
('DU0003', 'Ducky Francis', '3', 'RM30.00', 'DU03', 34, 'Active'),
('RA0004', 'Rabbit Frank 18LB', '4', 'RM16.00', 'RA04', 40, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `Date` date NOT NULL,
  `Invoice_No` varchar(10) NOT NULL,
  `Product_ID` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Supplier_ID` varchar(80) NOT NULL,
  `Product_Price` varchar(80) NOT NULL,
  `Total_Price` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`Date`, `Invoice_No`, `Product_ID`, `quantity`, `Supplier_ID`, `Product_Price`, `Total_Price`) VALUES
('2018-04-12', 'IN001', 'CA0001', 30, 'CA01', 'RM13.00', 'RM390.00'),
('2018-04-12', 'IN002', 'CA0003', 40, 'CA01', 'RM10.00', 'RM400.00'),
('2018-04-14', 'IN003', 'CA0001', 20, 'CA01', 'RM13.00', 'RM260.00'),
('2018-04-04', 'IN004', 'CA0001', 45, 'CA01', 'RM15.00', 'RM400.00'),
('2018-04-16', 'IN005', 'CA0001', 30, 'CA01', 'RM10.00', 'RM300.00'),
('2018-04-16', 'IN006', 'CA0001', 12, 'CA01', 'RM10.00', 'RM120.00');

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

CREATE TABLE `salesreport` (
  `Date` date NOT NULL,
  `Receipt_No` varchar(10) NOT NULL,
  `Product_ID` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Product_Price` varchar(80) NOT NULL,
  `Total` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`Date`, `Receipt_No`, `Product_ID`, `Quantity`, `Product_Price`, `Total`) VALUES
('2018-04-12', 'R001', 'CA0001', 3, 'RM15.00', 'RM45.00'),
('2018-04-16', 'R002', 'CA0001', 2, 'RM15.00', 'RM30.00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` varchar(11) NOT NULL,
  `Supplier_Name` varchar(80) NOT NULL,
  `Category` int(11) NOT NULL,
  `Status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Supplier_Name`, `Category`, `Status`) VALUES
('CA01', 'Meow Mix', 1, 'Active'),
('CH02', 'Omlet', 2, 'Active'),
('DU03', 'Kaytee', 3, 'Active'),
('RA04', 'Purina', 4, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`Invoice_No`);

--
-- Indexes for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD PRIMARY KEY (`Receipt_No`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
