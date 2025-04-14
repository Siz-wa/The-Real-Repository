-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `pfPicture` mediumblob NOT NULL,
  `salesrepEmployeeNum` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fname`, `lname`, `phoneNo`, `address`, `city`, `province`, `pfPicture`, `salesrepEmployeeNum`, `password`, `email`) VALUES
(1, 'John', 'Doe', 2147483647, '123 Main St', 'New York', 'NY', '', 1, '$2y$10$eImiTXuWVxfM37uY4JANjQ==', 'johndoe@example.com'),
(2, 'Jane', 'Smith', 2147483647, '456 Elm St', 'Los Angeles', 'CA', '', 2, '$2y$10$KbQvFqM6QkdOX2U7wG2dZ.', 'janesmith@example.com'),
(3, 'Alice', 'Johnson', 2147483647, '789 Oak St', 'Chicago', 'IL', '', 3, '$2y$10$7v/S9OuY2KM7rfzp10Lk6O', 'alicejohnson@example.com'),
(4, 'Bob', 'Brown', 2147483647, '101 Pine St', 'Houston', 'TX', '', 4, '$2y$10$8NwUNzS79F8M2n3Rcd.n4u', 'bobbrown@example.com'),
(5, 'Charlie', 'White', 2147483647, '202 Birch St', 'Phoenix', 'AZ', '', 5, '$2y$10$p0dtW0hLQ1FJeqz5b47KLu', 'charliewhite@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `officeCode` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `profile` mediumblob NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `officeCode`, `fname`, `lname`, `email`, `jobtitle`, `profile`, `password`, `city`, `province`, `address`) VALUES
(1, 1, 'Michael', 'Scott', 'mscott@dundermifflin.com', 'Regional Manager', '', '$2y$10$eImiTXuWVxfM37uY4JANjQ==', 'Scranton', 'PA', '1725 Slough Ave'),
(2, 1, 'Pam', 'Beesly', 'pbeesly@dundermifflin.com', 'Receptionist', '', '$2y$10$KbQvFqM6QkdOX2U7wG2dZ.', 'Scranton', 'PA', '1725 Slough Ave'),
(3, 3, 'Jim', 'Halpert', 'jhalpert@dundermifflin.com', 'Sales Representative', '', '$2y$10$7v/S9OuY2KM7rfzp10Lk6O', 'Scranton', 'PA', '1725 Slough Ave'),
(4, 1, 'Dwight', 'Schrute', 'dschrute@dundermifflin.com', 'Assistant to the Regional Manager', '', '$2y$10$8NwUNzS79F8M2n3Rcd.n4u', 'Scranton', 'PA', '1725 Slough Ave'),
(5, 4, 'Stanley', 'Hudson', 'shudson@dundermifflin.com', 'Sales Representative', '', '$2y$10$p0dtW0hLQ1FJeqz5b47KLu', 'Scranton', 'PA', '1725 Slough Ave');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `officeID` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`officeID`, `city`, `province`, `address`) VALUES
(1, 'New York', 'NY', '123 Manhattan Ave'),
(2, 'Los Angeles', 'CA', '456 Hollywood Blvd'),
(3, 'Chicago', 'IL', '789 Michigan Ave'),
(4, 'Houston', 'TX', '101 Main St'),
(5, 'Phoenix', 'AZ', '202 Desert Rd');

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `requiredDate` date NOT NULL,
  `shippedDate` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`orderID`, `customerID`, `orderDate`, `requiredDate`, `shippedDate`, `status`) VALUES
(1, 1, '2025-03-01', '2025-03-05', '2025-03-04', 'Shipped'),
(2, 2, '2025-03-02', '2025-03-07', '2025-03-06', 'Shipped'),
(3, 3, '2025-03-03', '2025-03-10', '0000-00-00', 'Processing'),
(4, 4, '2025-03-04', '2025-03-12', '0000-00-00', 'Pending'),
(5, 5, '2025-03-05', '2025-03-14', '2025-03-13', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_Product` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `priceEach` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_Product`, `order_ID`, `productID`, `qty`, `priceEach`) VALUES
(1, 1, 1, 2, 19.99),
(2, 1, 2, 1, 49.99),
(3, 2, 3, 5, 9.99),
(4, 3, 4, 3, 29.99),
(5, 4, 5, 1, 99.99),
(6, 5, 6, 2, 14.99);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `Amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `customerID`, `PaymentDate`, `Amount`) VALUES
(1, 1, '2025-03-01', 150.75),
(2, 2, '2025-03-02', 299.99),
(3, 3, '2025-03-03', 75.50),
(4, 4, '2025-03-04', 450.00),
(5, 5, '2025-03-05', 120.25);

-- --------------------------------------------------------

--
-- Table structure for table `prodline`
--

CREATE TABLE `prodline` (
  `prodlineID` int(11) NOT NULL,
  `descInHTML` varchar(255) NOT NULL,
  `Image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodline`
--

INSERT INTO `prodline` (`prodlineID`, `descInHTML`, `Image`) VALUES
(1, 'Flaky, buttery pastries perfect for breakfast or snacks.', ''),
(2, 'Sweet and soft pastries available in various flavors.', ''),
(3, 'Delicate choux pastries filled with creamy custard.', ''),
(4, 'Colorful almond meringue cookies with a soft filling.', ''),
(5, 'Soft and gooey rolls swirled with cinnamon and icing.', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productlineID` int(11) NOT NULL,
  `productName` int(11) NOT NULL,
  `qtyStock` int(11) NOT NULL,
  `buyPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productlineID`, `productName`, `qtyStock`, `buyPrice`) VALUES
(1, 1, 0, 50, 3),
(2, 1, 0, 40, 3),
(3, 2, 0, 60, 2),
(4, 2, 0, 45, 2),
(5, 3, 0, 30, 4),
(6, 3, 0, 35, 4),
(7, 4, 0, 25, 3),
(8, 4, 0, 20, 3),
(9, 5, 0, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subsID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `subscriptionPeriod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subsID`, `userID`, `subscriptionPeriod`) VALUES
(1, 1, '2024-03-01'),
(2, 2, '2024-02-15'),
(3, 3, '2024-04-01'),
(4, 5, '2024-01-10'),
(5, 4, '2024-05-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `salesrepEmployeeNum` (`salesrepEmployeeNum`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `employeeID` (`employeeID`,`officeCode`),
  ADD KEY `officeCode` (`officeCode`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`officeID`),
  ADD KEY `officeID` (`officeID`,`city`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_Product`),
  ADD KEY `order_Product` (`order_Product`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `prodline`
--
ALTER TABLE `prodline`
  ADD PRIMARY KEY (`prodlineID`),
  ADD KEY `prodlineID` (`prodlineID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `productlineID` (`productlineID`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subsID`),
  ADD KEY `subsID` (`subsID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `officeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_Product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodline`
--
ALTER TABLE `prodline`
  MODIFY `prodlineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`salesrepEmployeeNum`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`officeCode`) REFERENCES `office` (`officeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderr`
--
ALTER TABLE `orderr`
  ADD CONSTRAINT `orderr_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orderr` (`orderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productlineID`) REFERENCES `prodline` (`prodlineID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
