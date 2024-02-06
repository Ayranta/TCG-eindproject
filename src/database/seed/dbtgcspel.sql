-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 feb 2024 om 12:22
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

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
-- Tabelstructuur voor tabel `kaart_categorieen`
--

CREATE TABLE `kaart_categorieen` (
  `id` int(11) NOT NULL,
  `naam` text NOT NULL,
  `kleur hex` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `kaart_categorieen`
--

INSERT INTO `kaart_categorieen` (`id`, `naam`, `kleur hex`) VALUES
(1, 'Rood', '850000'),
(2, 'Blauw', '00e1ff'),
(4, 'ice', '3dc5ff'),
(5, 'grass', '549d0b'),
(6, 'fire', 'e64c0a'),
(7, 'water', 'c2c3c7'),
(8, 'dragon', '7b80cc');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `levelgroups`
--

CREATE TABLE `levelgroups` (
  `GroupID` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `levelgroups`
--

INSERT INTO `levelgroups` (`GroupID`, `GroupName`, `foto`) VALUES
(1, 'Beginner', 'bronze-badge.png'),
(2, 'Intermediate', 'silver-badge.png'),
(3, 'Advanced', 'gold-badge.png'),
(4, 'Master', 'platinum-badge.png'),
(5, 'Grandmaster', 'diamond-badge.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `playerlevels`
--

CREATE TABLE `playerlevels` (
  `LevelID` int(11) NOT NULL,
  `LevelName` varchar(50) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `ExpirienceRequired` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `playerlevels`
--

INSERT INTO `playerlevels` (`LevelID`, `LevelName`, `GroupID`, `ExpirienceRequired`) VALUES
(1, 'level 1', 1, 10),
(2, 'level 2', 1, 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblfriend_request`
--

CREATE TABLE `tblfriend_request` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblfriend_request`
--

INSERT INTO `tblfriend_request` (`id`, `senderid`, `receiverid`) VALUES
(33, 12, 14),
(37, 12, 20);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruikers`
--

CREATE TABLE `tblgebruikers` (
  `gebruikerid` int(11) NOT NULL,
  `email` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `gebruikernaam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruikers`
--

INSERT INTO `tblgebruikers` (`gebruikerid`, `email`, `wachtwoord`, `gebruikernaam`) VALUES
(12, 'bobdejef@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UzJhYjByRnBQLlZlcTcyRA$AtAMrnpax5kLsESYTKkkLtxXLPFXURrbMgCtmD7KFfA', 'xandanman'),
(14, 'casper.nauwelaerts@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dmo5SC9PWFJYMEo5NE0vUg$evppIN5pcsDsbVM/JYx/NnxBVjRK+QgRSXwZ+HzpiMo', 'casper'),
(19, 'moris@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TXRwY29UNlRxR3NZQzhyNA$3Eiy1IbBf6fK8gjFAamm4JJIhqPqbSCfm+mcaAYy4hw', 'password'),
(20, 'jaaaaaaasper@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZEY4MllQakZlOGtsb2xLeQ$6zVRVX8aKRLxA1dHMQP/VCnH9E0VgYgBsQrKGFFTzK4', 'xander'),
(21, 'cedric@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NU1OZkJDWTBDdmplVjZ6Vg$WhXMzAwg3ROAbcx7JYRjqnaajRoSSuy0vVIo7zvFB/o', 'cedric');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruiker_profile`
--

CREATE TABLE `tblgebruiker_profile` (
  `id` int(11) NOT NULL,
  `userid` int(20) NOT NULL,
  `theme` text NOT NULL,
  `profielfoto` text NOT NULL,
  `admin` int(20) NOT NULL,
  `Level` int(11) NOT NULL DEFAULT 1,
  `Expirience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruiker_profile`
--

INSERT INTO `tblgebruiker_profile` (`id`, `userid`, `theme`, `profielfoto`, `admin`, `Level`, `Expirience`) VALUES
(9, 12, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 1, 1, 0),
(11, 14, 'dark', 'https://avatars.githubusercontent.com/u/64209400?v=4', 1, 1, 0),
(14, 19, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0, 1, 0),
(15, 20, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0, 1, 0),
(16, 21, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblkaart`
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
-- Gegevens worden geëxporteerd voor tabel `tblkaart`
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
-- Tabelstructuur voor tabel `tblpackcards`
--

CREATE TABLE `tblpackcards` (
  `packID` int(11) NOT NULL,
  `kaartID` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblpackcards`
--

INSERT INTO `tblpackcards` (`packID`, `kaartID`, `id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblpacks`
--

CREATE TABLE `tblpacks` (
  `packId` int(11) NOT NULL,
  `packNaam` text NOT NULL,
  `packImg` text NOT NULL,
  `releaseDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblpacks`
--

INSERT INTO `tblpacks` (`packId`, `packNaam`, `packImg`, `releaseDate`) VALUES
(2, 'Scarlet & Violet', 'pokemon packs.png', '2024-02-05 16:05:44');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblvrienden`
--

CREATE TABLE `tblvrienden` (
  `id` int(11) NOT NULL,
  `gebruikerId` int(11) NOT NULL,
  `vriendenmetId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblvrienden`
--

INSERT INTO `tblvrienden` (`id`, `gebruikerId`, `vriendenmetId`) VALUES
(6, 21, 14),
(10, 21, 12);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `levelgroups`
--
ALTER TABLE `levelgroups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexen voor tabel `playerlevels`
--
ALTER TABLE `playerlevels`
  ADD PRIMARY KEY (`LevelID`);

--
-- Indexen voor tabel `tblfriend_request`
--
ALTER TABLE `tblfriend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  ADD PRIMARY KEY (`gebruikerid`);

--
-- Indexen voor tabel `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tblkaart`
--
ALTER TABLE `tblkaart`
  ADD PRIMARY KEY (`kaartID`);

--
-- Indexen voor tabel `tblpackcards`
--
ALTER TABLE `tblpackcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tblpacks`
--
ALTER TABLE `tblpacks`
  ADD PRIMARY KEY (`packId`);

--
-- Indexen voor tabel `tblvrienden`
--
ALTER TABLE `tblvrienden`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `levelgroups`
--
ALTER TABLE `levelgroups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `playerlevels`
--
ALTER TABLE `playerlevels`
  MODIFY `LevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tblfriend_request`
--
ALTER TABLE `tblfriend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT voor een tabel `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  MODIFY `gebruikerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `tblkaart`
--
ALTER TABLE `tblkaart`
  MODIFY `kaartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `tblpackcards`
--
ALTER TABLE `tblpackcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `tblpacks`
--
ALTER TABLE `tblpacks`
  MODIFY `packId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tblvrienden`
--
ALTER TABLE `tblvrienden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
