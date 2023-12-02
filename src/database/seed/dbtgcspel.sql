-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2023 at 04:05 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtgcspel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kaart_categorieen`
--

CREATE TABLE `kaart_categorieen` (
  `id` int(11) NOT NULL,
  `naam` text NOT NULL,
  `kleur hex` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kaart_categorieen`
--

INSERT INTO `kaart_categorieen` (`id`, `naam`, `kleur hex`) VALUES
(1, 'Rood', '850000'),
(2, 'Blauw', '00e1ff'),
(4, 'ice', '3dc5ff'),
(5, 'grass', '549d0b'),
(6, 'fire', 'e64c0a'),
(7, 'water', '0846d9'),
(8, 'dragon', '141b85');

-- --------------------------------------------------------

--
-- Table structure for table `tblfriend_request`
--

CREATE TABLE `tblfriend_request` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblgebruikers`
--

CREATE TABLE `tblgebruikers` (
  `gebruikerid` int(11) NOT NULL,
  `email` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `gebruikernaam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblgebruikers`
--

INSERT INTO `tblgebruikers` (`gebruikerid`, `email`, `wachtwoord`, `gebruikernaam`) VALUES
(12, 'bobdejef@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UzJhYjByRnBQLlZlcTcyRA$AtAMrnpax5kLsESYTKkkLtxXLPFXURrbMgCtmD7KFfA', 'xandanman'),
(14, 'casper.nauwelaerts@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dmo5SC9PWFJYMEo5NE0vUg$evppIN5pcsDsbVM/JYx/NnxBVjRK+QgRSXwZ+HzpiMo', 'casper'),
(19, 'moris@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TXRwY29UNlRxR3NZQzhyNA$3Eiy1IbBf6fK8gjFAamm4JJIhqPqbSCfm+mcaAYy4hw', 'password'),
(20, 'jaaaaaaasper@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZEY4MllQakZlOGtsb2xLeQ$6zVRVX8aKRLxA1dHMQP/VCnH9E0VgYgBsQrKGFFTzK4', 'xander'),
(21, 'cedric@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NU1OZkJDWTBDdmplVjZ6Vg$WhXMzAwg3ROAbcx7JYRjqnaajRoSSuy0vVIo7zvFB/o', 'cedric');

-- --------------------------------------------------------

--
-- Table structure for table `tblgebruiker_profile`
--

CREATE TABLE `tblgebruiker_profile` (
  `id` int(11) NOT NULL,
  `userid` int(20) NOT NULL,
  `theme` text NOT NULL,
  `profielfoto` text NOT NULL,
  `admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblgebruiker_profile`
--

INSERT INTO `tblgebruiker_profile` (`id`, `userid`, `theme`, `profielfoto`, `admin`) VALUES
(9, 12, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(11, 14, 'dark', 'https://avatars.githubusercontent.com/u/64209400?v=4', 1),
(14, 19, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(15, 20, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(16, 21, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblkaart`
--

CREATE TABLE `tblkaart` (
  `kaartID` int(11) NOT NULL,
  `naam` text NOT NULL,
  `categorie` text NOT NULL,
  `levens` int(11) NOT NULL,
  `aanval1` text NOT NULL,
  `damage1` int(11) NOT NULL,
  `aanval2` text NOT NULL,
  `damage2` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblkaart`
--

INSERT INTO `tblkaart` (`kaartID`, `naam`, `categorie`, `levens`, `aanval1`, `damage1`, `aanval2`, `damage2`, `foto`) VALUES
(13, '1B', 'Rood', 200, 'a', 10, 'a', 20, '6563766e154a53.81904227.png'),
(16, 'Bert', 'Blauw', 30, 'Dive', 4, 'WaterBurst', 12, '656392dc399087.35426615.jpg'),
(17, 'aa', 'Blauw', 12, 'a', 1, 'a', 1, '656393038e04f5.29686428.png'),
(19, 'a', 'Rood', 1, 'a', 1, 'a', 1, '6563a4a5b1c069.89643839.png'),
(22, 'bumba', 'Rood', 500, 'body slam', 222, 'slap', 35, '65699a168f99a3.19701218.png'),
(26, 'dragon', 'dragon', 8000, 'breath', 3000, 'fire ball', 5000, '65699c636b1e52.59233588.jpg'),
(27, 'ass', 'grass', 1, '1', 2, '3', 4, '6569d4c4c39616.11415296.jpeg'),
(28, 'yamaha r7', 'ice', 266, 'he', 123, 'vuut', 222, '6569d9321c9699.56519162.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblvrienden`
--

CREATE TABLE `tblvrienden` (
  `id` int(11) NOT NULL,
  `gebruikerId` int(11) NOT NULL,
  `vriendenmetId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvrienden`
--

INSERT INTO `tblvrienden` (`id`, `gebruikerId`, `vriendenmetId`) VALUES
(2, 12, 14),
(5, 12, 12),
(6, 21, 14),
(7, 22, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfriend_request`
--
ALTER TABLE `tblfriend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  ADD PRIMARY KEY (`gebruikerid`);

--
-- Indexes for table `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkaart`
--
ALTER TABLE `tblkaart`
  ADD PRIMARY KEY (`kaartID`);

--
-- Indexes for table `tblvrienden`
--
ALTER TABLE `tblvrienden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblfriend_request`
--
ALTER TABLE `tblfriend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  MODIFY `gebruikerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblkaart`
--
ALTER TABLE `tblkaart`
  MODIFY `kaartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblvrienden`
--
ALTER TABLE `tblvrienden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
