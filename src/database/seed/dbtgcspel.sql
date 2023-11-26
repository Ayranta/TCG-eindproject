-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2023 at 09:46 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kaart_categorieen`
--

INSERT INTO `kaart_categorieen` (`id`, `naam`, `kleur hex`) VALUES
(2, 'ice', 'ADD8E6'),
(3, 'water', '0039FF'),
(16, 'grass', '7CFC00'),
(18, 'fire', 'FF0707');

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
(12, 'xnauwelaerts@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UzJhYjByRnBQLlZlcTcyRA$AtAMrnpax5kLsESYTKkkLtxXLPFXURrbMgCtmD7KFfA', 'xandanman'),
(13, 'jaaaaaaasper@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$SHdmWWNzTnF4MDJzbVM3UA$5rjdR6zjIplOrjLY0eDIVeSrbq3ofkTn2dG0iluSWR0', 'xander'),
(14, 'aaa@hotmail', '$argon2id$v=19$m=65536,t=4,p=1$ckliWjcvLzhXVEtzZmRzUA$CX5nuYBc4iXJul5V3otLOH7H3BtfntYQ7Q7ZqpsEjDU', 'test2');

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
(9, 12, 'dark', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(10, 13, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(11, 14, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  MODIFY `gebruikerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
