-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 08:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `player_shopca1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Attackers'),
(2, 'Midfielders'),
(3, 'Defenders'),
(4, 'Goalkeepers');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `playerID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `categoryID`, `name`, `DateOfBirth`, `position`, `price`, `image`) VALUES
(14, 4, 'Manuel Peter Neuer', '1986-03-27', 'Sweeper Keeper', '70.00', '907338.jpg'),
(34, 1, 'Lionel Andrés Messi', '1987-06-24', 'Right Winger', '100.00', '176418.jpg'),
(35, 1, 'Cristiano Ronaldo', '1985-06-05', 'Striker', '100.00', '703126.jpg'),
(38, 1, 'Olivier Jonathan Giroud', '1986-09-30', 'Centre Forward', '5.00', '771225.jpg'),
(39, 1, 'Sadio Mané', '1992-04-10', 'Left Winger', '90.00', '383216.jpg'),
(40, 2, 'Paul Labile Pogb', '1993-03-15', 'Centre Midfielder', '85.00', '511122.jpg'),
(41, 2, 'James Maddison', '1996-09-23', 'Attacking Midfielder', '55.00', '891005.jpg'),
(42, 2, 'Joshua Kimmich', '1995-02-08', 'Defensive Midfielder', '75.00', '949709.jpg'),
(43, 2, 'Thomas Teye Partey', '1993-06-13', 'Defensive Midfielder', '60.00', '478353.jpg'),
(45, 2, 'Toni Kroos', '1990-01-04', 'Centre Midfielder', '55.00', '87300.jpg'),
(46, 3, 'Alphonso Boyle Davies', '2000-09-02', 'Left Back', '65.00', '859011.jpg'),
(47, 3, 'João Pedro  Cancelo', '1994-05-27', 'Right Back', '70.00', '947871.jpg'),
(48, 3, 'Joseph Dave Gomez', '1997-05-23', 'Centre Back', '45.00', '364156.jpg'),
(49, 3, 'Raphaël Xavier Varane', '1993-04-25', 'Centre Back', '90.00', '459403.jpg'),
(50, 3, 'Presnel Kimpembe', '1995-08-13', 'Centre Back', '80.00', '228339.jpg'),
(51, 4, 'Rui Pedro Patrício', '1988-02-15', 'Traditional Keeper', '45.00', '867559.jpg'),
(52, 4, 'Ederson Moraes', '1993-08-17', 'Sweeper Keeper', '78.00', '410358.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`playerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
