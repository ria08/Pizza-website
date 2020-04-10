-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 05:45 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `EmailId` char(255) NOT NULL,
  `NAME` char(255) DEFAULT NULL,
  `Password` char(255) DEFAULT NULL,
  `Username` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`EmailId`, `NAME`, `Password`, `Username`) VALUES
('admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `crusts`
--

CREATE TABLE `crusts` (
  `Crust Name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crusts`
--

INSERT INTO `crusts` (`Crust Name`, `Price`) VALUES
('New Hand Tossed', '90'),
('New Hand Tossed', '90'),
('Wheat Thin Crust', '30'),
('Fresh Pan Pizza', '20'),
('Classic Hand Tossed', '30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Name`, `Password`, `ID`) VALUES
('Rohit', '123456', 'PL1235');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`Name`, `Email`, `Message`) VALUES
('akansha', 'akansha@gmail.com', 'A cool Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `Item Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`Item Name`, `Type`, `Price`, `Image`) VALUES
('BBQ Chicken', 'Non-veg', '12', 'customise-pizza-barbeque.png'),
('Capsicum', 'Veg', '5', 'customise-pizza-capsicum.png'),
('Chicken Sausage', 'Non-veg', '15', 'customize-chicken-sausage.png'),
('Chicken Tikka', 'Non-veg', '20', 'customize-chicken-tikka.png'),
('Corn', 'Veg', '6', 'customise-pizza-goldenCorn.png'),
('GreenOlives', 'Veg', '7', 'customise-pizza-greenOlives.png'),
('Mushroom', 'Veg', '8', 'customise-pizza-mushroom.png'),
('Onion', 'Veg', '9', 'customise-pizza-onion.png'),
('Panner', 'Veg', '10', 'customise-pizza-paneer.png'),
('Pizza Paparika', 'Veg', '10', 'customise-pizza-paparika.png'),
('Tomatoes', 'Veg', '4', 'customise-pizza-tomato.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemName` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `Pizza` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemName`, `Price`, `Type`, `link`, `Pizza`) VALUES
('AFRICAN PERI PERI CHICKEN', '230', 'Non-veg', 'demo.jpg', 'Pizza'),
('AUSSIE BARBECUE VEG', '245', 'Veg', 'AussieBarbequeVeg.jpg', 'Pizza'),
('BURGER PIZZA - CLASSIC VEG', '49', 'Veg', 'BurgerPizzaClassicVeg.jpg', 'Non-Pizza'),
('CHICKEN SAUSAGE', '255', 'Non-veg', '266X265pix_Chicken_Sausage.png', 'Pizza'),
('DOUBLE CHEESE MARGHERITA', '152', 'Veg', 'double_cheese_margherita.jpg', 'Pizza'),
('Garlic Bread', '99', 'Veg', 'Garlic_bread.png', 'Non-Pizza'),
('INDI TANDOORI PANEER', '235', 'Veg', 'IndianTandooriPaneer.jpg', 'Pizza'),
('MEXICAN GREEN WAVE', '225', 'Veg', 'mexgreen.png', 'Pizza'),
('PANEER MAKHANI', '215', 'Veg', 'PaneerMakhni.jpg', 'Pizza'),
('Pasta', '90', 'Veg', 'pasta.jpg', 'Non-Pizza'),
('PEPPER BARBECUE CHICKEN', '255', 'Non-veg', 'PepperBarbecueChicken.jpg', 'Pizza'),
('PEPSI', '60', 'Veg', 'pepsi_new_20190312.png', 'Non-Pizza'),
('ROASTED CHICKEN WINGS PERI-PERI', '245', 'Non-veg', 'Roasted-chicken.png', 'Non-Pizza'),
('Spicy Chicken Pizza', '250', 'Non-veg', 'demo.jpg', 'Pizza'),
('STUFFED GARLIC BREADSTICKS', '145', 'Veg', 'Stuffed_garlic_Bread.png', 'Non-Pizza'),
('WHITE PASTA ITALIANO', '135', 'Veg', 'White-Pasta_Veg.png', 'Non-Pizza'),
('WHITE PASTA ITALIANO NON-VEG', '245', 'Non-veg', 'White-Pasta_Veg.png', 'Non-Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(2555) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Item Name` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `SID` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'No',
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `MasterOrder` varchar(255) NOT NULL,
  `Time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order ID`, `Name`, `Email`, `Address`, `Item Name`, `Amount`, `Ingredients`, `SID`, `Status`, `Quantity`, `MasterOrder`, `Time`) VALUES
(3, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'AFRICAN PERI PERI CHICKEN', '248', 'GreenOlives,Corn,Capsicum', NULL, 'Delivered', 1, '1', '2019-08-15 07:50:38'),
(5, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'AFRICAN PERI PERI CHICKEN', '248', 'GreenOlives,Corn,Capsicum', NULL, 'Delivered', 1, '1', '2019-08-15 07:50:38'),
(6, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'DOUBLE CHEESE MARGHERITA', '244', 'Capsicum,GreenOlives,Panner,Onion,BBQ Chicken', 'b6hip3gqt0ct5up34rsjsvlgsh', 'Delivered', 2, '2', '2019-08-15 07:50:38'),
(10, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'BURGER PIZZA - PREMIUM VEG', '34', '', 'b6hip3gqt0ct5up34rsjsvlgsh', 'Delivered', 4, '2', '2019-08-15 07:50:38'),
(11, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'BURGER PIZZA - PREMIUM VEG', '34', '', 'b6hip3gqt0ct5up34rsjsvlgsh', 'Delivered', 4, '2', '2019-08-15 07:50:38'),
(27, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'DOUBLE CHEESE MARGHERITA', '178', 'BBQ Chicken27,Chicken Sausage27', 'bh14aofaq2i05028v5vogbli31', 'Pending', 3, '1004', '2019-08-17 10:44:08'),
(28, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'DOUBLE CHEESE MARGHERITA', '250', 'Corn', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-17 10:45:07'),
(33, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'DOUBLE CHEESE MARGHERITA', '250', 'BBQ Chicken', 'bh14aofaq2i05028v5vogbli31', 'Pending', 2, '1004', '2019-08-17 11:10:03'),
(34, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'DOUBLE CHEESE MARGHERITA', '250', 'Capsicum', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-17 11:15:51'),
(37, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'Pasta', '90', '', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-17 16:25:18'),
(52, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'Pasta', '90', '', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 04:20:11'),
(55, 'Akansha', 'Akansha@gmail.com', 'Lovely Professional University Jalandhar', 'DOUBLE CHEESE MARGHERITA', '165', 'Corn,GreenOlives', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 05:20:46'),
(59, 'Swetha', 'Swetha@gmail.com', 'Punjab', 'Pasta', '90', '', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 09:31:04'),
(60, 'Akansha', 'Akansha@gmail.com', 'Punjab', 'AUSSIE BARBECUE VEG', '293', 'Capsicum,Corn,GreenOlives,Pizza Paparika', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 12:23:55'),
(61, 'Akansha', 'Akansha@gmail.com', 'Punjab', 'AUSSIE BARBECUE VEG', '304', 'Capsicum,Chicken Sausage,GreenOlives,Mushroom,Tomatoes', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 12:24:36'),
(62, 'Akansha', 'Akansha@gmail.com', 'Punjab', 'CHICKEN SAUSAGE', '293', 'Capsicum,Corn,GreenOlives', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 12:25:24'),
(70, 'Akansha', 'Akansha@gmail.com', 'Punjab', 'PEPSI', '60', '', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 12:57:10'),
(71, 'Akansha', 'Akansha@gmail.com', 'Punjab', 'CHICKEN SAUSAGE', '286', 'Capsicum,Corn', 'bh14aofaq2i05028v5vogbli31', 'Pending', 1, '1004', '2019-08-18 12:57:28'),
(72, 'Akansha', 'Akansha@gmail.com', 'Punjab', 'PEPSI', '60', '', 'bh14aofaq2i05028v5vogbli31', 'No', 5, '', '2019-08-18 13:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`Name`, `Email`) VALUES
('akansha', 'akansha@gmail.com'),
('akanshaa', 'akanshaaa@gmail.com'),
('Swetha', 'Swetha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`EmailId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`Item Name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemName`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
