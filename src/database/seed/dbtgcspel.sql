-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 nov 2023 om 14:24
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
(2, 'Blauw', '00e1ff');

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
(13, 'jaaaaaaasper@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$SHdmWWNzTnF4MDJzbVM3UA$5rjdR6zjIplOrjLY0eDIVeSrbq3ofkTn2dG0iluSWR0', 'xander'),
(14, 'casper.nauwelaerts@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dmo5SC9PWFJYMEo5NE0vUg$evppIN5pcsDsbVM/JYx/NnxBVjRK+QgRSXwZ+HzpiMo', 'casper');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruiker_profile`
--

CREATE TABLE `tblgebruiker_profile` (
  `id` int(11) NOT NULL,
  `userid` int(20) NOT NULL,
  `theme` text NOT NULL,
  `profielfoto` text NOT NULL,
  `admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruiker_profile`
--

INSERT INTO `tblgebruiker_profile` (`id`, `userid`, `theme`, `profielfoto`, `admin`) VALUES
(9, 12, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(10, 13, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0),
(11, 14, 'dark', 'https://avatars.githubusercontent.com/u/64209400?v=4', 1);

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
(12, '1A', 'Blauw', 2346, 'a', 1, 'b', 2, 'download.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
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
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `kaart_categorieen`
--
ALTER TABLE `kaart_categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  MODIFY `gebruikerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `tblkaart`
--
ALTER TABLE `tblkaart`
  MODIFY `kaartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
