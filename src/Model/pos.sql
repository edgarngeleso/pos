-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 03:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(255) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productBuyingPrice` float(100,0) NOT NULL,
  `productSellingPrice` float(100,0) NOT NULL,
  `productQuantity` int(255) NOT NULL,
  `supllierID` int(255) NOT NULL,
  `productImage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productBuyingPrice`, `productSellingPrice`, `productQuantity`, `supllierID`, `productImage`) VALUES
(1, 'Monitor', 6700, 7500, 20, 1, 'product_images/monitor.png'),
(2, 'Keyboard', 900, 1349, 300, 1, 'product_images/keyboard.png'),
(4, 'Motorbike', 120000, 125000, 10, 1, 'product_images/1668726026-Screenshot (49).png'),
(5, 'vehicle', 2200000, 2400000, 20, 1, 'product_images/1668728019-FB_IMG_16445167305173121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchaseID` int(255) NOT NULL,
  `purchaseItems` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchaseID`, `purchaseItems`) VALUES
(1, '[{id:1,qty:2}]');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleID` int(255) NOT NULL,
  `saleInvoiceNumber` varchar(100) NOT NULL,
  `saleCashier` varchar(100) NOT NULL,
  `saleDate` varchar(100) NOT NULL,
  `saleType` varchar(100) NOT NULL,
  `saleAmount` varchar(100) NOT NULL,
  `saleProfit` varchar(100) NOT NULL,
  `balance` float(100,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `saleInvoiceNumber`, `saleCashier`, `saleDate`, `saleType`, `saleAmount`, `saleProfit`, `balance`) VALUES
(1, 'INV42594RCP3193', 'Eddy', '11-10-2022', 'Normal', '7500', '800', 0),
(2, 'INV87752RCP3598', 'Eddy', '11-17-2022', 'Normal', '5396', '1796', 0),
(3, 'INV46814RCP3750', 'Eddy', '11-18-2022', 'Normal', '12000', '12000', 0),
(4, 'INV65072RCP3925', 'Eddy', '11-18-2022', 'Normal', '2698', '898', 0),
(5, 'INV68117RCP3814', 'Eddy', '11-18-2022', 'Normal', '4800000', '400000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `salesOrderID` int(255) NOT NULL,
  `salesOrderInvoice` varchar(100) NOT NULL,
  `salesOrderProductID` int(255) NOT NULL,
  `salesOrderQuantity` int(255) NOT NULL,
  `salesOrderAmount` float(200,0) NOT NULL,
  `salesOrderProfit` float(200,0) NOT NULL,
  `salesOrderName` varchar(100) NOT NULL,
  `salesOrderPrice` float(200,0) NOT NULL,
  `salesOrderType` varchar(100) NOT NULL,
  `salesOrderDiscount` float(200,0) NOT NULL,
  `salesOrderDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`salesOrderID`, `salesOrderInvoice`, `salesOrderProductID`, `salesOrderQuantity`, `salesOrderAmount`, `salesOrderProfit`, `salesOrderName`, `salesOrderPrice`, `salesOrderType`, `salesOrderDiscount`, `salesOrderDate`) VALUES
(1, 'INV42594RCP3193', 1, 1, 7500, 800, 'Eddy', 7500, 'product', 0, '11-18-2022'),
(2, 'INV87752RCP3598', 2, 4, 5396, 1796, 'Eddy', 1349, 'product', 0, '11-18-2022'),
(3, 'INV46814RCP3750', 1, 1, 12000, 12000, 'Eddy', 12000, 'service', 0, '11-18-2022'),
(4, 'INV65072RCP3925', 2, 2, 2698, 898, 'Eddy', 1349, 'product', 0, '11-18-2022'),
(5, 'INV68117RCP3814', 5, 2, 4800000, 400000, 'Eddy', 2400000, 'product', 0, '11-18-2022');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(255) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `serviceImage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `serviceImage`) VALUES
(1, 'Mobile app development', 'product_images/1668698194_Screenshot (9).png');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supllierID` int(255) NOT NULL,
  `supplierName` varchar(200) NOT NULL,
  `supplierProductName` varchar(100) NOT NULL,
  `supplierProductQuantity` int(255) NOT NULL,
  `supplierSellingPrice` float(100,0) NOT NULL,
  `supplierContact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPassword`, `isAdmin`) VALUES
(1, 'Eddy', '$2y$10$zHHigDiOxe1vnJb/MTe9juIfiUFPvolfTYNdUqYnPhhtutC/MCuJa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`salesOrderID`),
  ADD KEY `salesOrderProductID` (`salesOrderProductID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supllierID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchaseID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `salesOrderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supllierID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD CONSTRAINT `salesorder_ibfk_1` FOREIGN KEY (`salesOrderProductID`) REFERENCES `products` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
