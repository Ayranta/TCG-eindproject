-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 mrt 2024 om 19:02
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
(7, 'water', '1caaf0'),
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
(2, 'level 2', 1, 12),
(3, 'level 3', 1, 18),
(4, 'level 4', 1, 27),
(5, 'level 5', 1, 41),
(6, 'level 6', 1, 61),
(7, 'level 7', 1, 91),
(8, 'level 8', 1, 137),
(9, 'level 9', 1, 205),
(10, 'level 10', 1, 308),
(11, 'level 11', 2, 461),
(12, 'level 12', 2, 691),
(13, 'level 13', 2, 1037),
(14, 'level 14', 2, 1245),
(15, 'level 15', 2, 1854),
(16, 'level 16', 2, 2802),
(17, 'level 17', 2, 4203),
(18, 'level 18', 2, 5033),
(19, 'level 19', 2, 7566),
(20, 'level 20', 2, 11350),
(21, 'level 21', 3, 13620),
(22, 'level 22', 3, 16520),
(23, 'level 23', 3, 19619),
(24, 'level 24', 3, 25535),
(25, 'level 25', 3, 28242),
(26, 'level 26', 3, 33891),
(27, 'level 27', 3, 40669),
(28, 'level 28', 3, 48803),
(29, 'level 29', 3, 58564),
(30, 'level 30', 3, 70277),
(31, 'level 31', 4, 84333),
(32, 'level 32', 4, 92766),
(33, 'level 33', 4, 102042),
(34, 'level 34', 4, 112247),
(35, 'level 35', 4, 123743),
(36, 'level 36', 4, 135981),
(37, 'level 37', 4, 149401),
(38, 'level 38', 4, 164341),
(39, 'level 39', 4, 180775),
(40, 'level 40', 4, 198852),
(41, 'level 41', 5, 218738),
(42, 'level 42', 5, 240611),
(43, 'level 43', 5, 264350),
(44, 'level 44', 5, 291456),
(45, 'level 45', 5, 320542),
(46, 'level 46', 5, 352297),
(47, 'level 47', 5, 387507),
(48, 'level 48', 5, 450000),
(49, 'level 49', 5, 500000),
(50, 'level 50', 5, 1000000);

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
-- Tabelstructuur voor tabel `tblgebruikerkaart`
--

CREATE TABLE `tblgebruikerkaart` (
  `Gebkaartid` int(11) NOT NULL,
  `KaartID` int(11) NOT NULL,
  `GebruikerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruikerkaart`
--

INSERT INTO `tblgebruikerkaart` (`Gebkaartid`, `KaartID`, `GebruikerID`) VALUES
(23, 13, 12),
(24, 17, 12),
(25, 16, 12),
(26, 27, 12),
(27, 26, 12),
(28, 28, 12),
(29, 22, 12),
(30, 31, 12),
(31, 31, 23),
(32, 28, 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruikers`
--

CREATE TABLE `tblgebruikers` (
  `gebruikerid` int(11) NOT NULL,
  `email` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `gebruikernaam` text NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruikers`
--

INSERT INTO `tblgebruikers` (`gebruikerid`, `email`, `wachtwoord`, `gebruikernaam`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(12, 'bobdejef@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UzJhYjByRnBQLlZlcTcyRA$AtAMrnpax5kLsESYTKkkLtxXLPFXURrbMgCtmD7KFfA', 'xandanman', NULL, NULL),
(14, 'casper.nauwelaerts@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dmo5SC9PWFJYMEo5NE0vUg$evppIN5pcsDsbVM/JYx/NnxBVjRK+QgRSXwZ+HzpiMo', 'casper', NULL, NULL),
(19, 'moris@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TXRwY29UNlRxR3NZQzhyNA$3Eiy1IbBf6fK8gjFAamm4JJIhqPqbSCfm+mcaAYy4hw', 'password', NULL, NULL),
(20, 'jaaaaaaasper@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZEY4MllQakZlOGtsb2xLeQ$6zVRVX8aKRLxA1dHMQP/VCnH9E0VgYgBsQrKGFFTzK4', 'xander', NULL, NULL),
(21, 'cedric@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NU1OZkJDWTBDdmplVjZ6Vg$WhXMzAwg3ROAbcx7JYRjqnaajRoSSuy0vVIo7zvFB/o', 'cedric', NULL, NULL),
(23, 'casper.nauwelaerts@bazandpoort.be', '$2y$10$Q0T7Cz1VhvGwzSy4nNtIy.IkWGnqnXnXImmQNOqX9/DLPk/l7.rHO', 'casperr', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruiker_packsbought`
--

CREATE TABLE `tblgebruiker_packsbought` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `packid` int(11) NOT NULL,
  `purchasedate` datetime NOT NULL DEFAULT current_timestamp(),
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruiker_packsbought`
--

INSERT INTO `tblgebruiker_packsbought` (`id`, `userid`, `packid`, `purchasedate`, `price`) VALUES
(11, 12, 10, '2024-02-27 18:12:08', 0),
(12, 12, 10, '2024-02-27 18:25:16', 2345),
(13, 12, 5, '2024-02-27 18:25:31', 0),
(14, 12, 3, '2024-02-28 08:38:08', 0),
(15, 12, 2, '2024-02-28 08:39:13', 0),
(16, 12, 7, '2024-02-29 11:41:33', 0),
(17, 12, 2, '2024-02-29 11:42:07', 0),
(18, 12, 2, '2024-02-29 11:48:58', 0),
(19, 12, 2, '2024-02-29 11:55:04', 0),
(20, 12, 2, '2024-02-29 14:03:38', 0),
(21, 12, 2, '2024-03-01 14:07:52', 0),
(22, 12, 2, '2024-03-01 14:29:19', 0),
(23, 12, 2, '2024-03-01 14:29:49', 0),
(24, 12, 3, '2024-03-01 14:42:48', 0),
(25, 12, 2, '2024-03-01 14:42:51', 0),
(26, 12, 2, '2024-03-01 14:44:09', 0),
(27, 12, 2, '2024-03-01 15:57:22', 0),
(28, 12, 2, '2024-03-01 15:57:57', 0),
(29, 12, 2, '2024-03-01 15:59:40', 0),
(30, 12, 2, '2024-03-02 13:27:45', 0),
(31, 12, 2, '2024-03-02 14:33:37', 0),
(32, 12, 2, '2024-03-02 14:42:27', 0),
(33, 12, 2, '2024-03-02 15:07:49', 0),
(34, 12, 2, '2024-03-03 14:05:07', 0),
(35, 12, 10, '2024-03-03 14:08:36', 2345),
(36, 12, 2, '2024-03-03 14:12:41', 0),
(37, 12, 2, '2024-03-04 09:47:57', 0),
(38, 12, 3, '2024-03-04 09:48:05', 0),
(39, 12, 10, '2024-03-04 09:48:11', 2345),
(40, 12, 2, '2024-03-04 10:01:44', 0),
(41, 12, 2, '2024-03-04 14:57:59', 300),
(42, 12, 2, '2024-03-04 14:58:40', 300),
(43, 12, 2, '2024-03-04 14:59:22', 300),
(44, 12, 2, '2024-03-04 14:59:28', 300),
(45, 12, 2, '2024-03-04 15:00:19', 300),
(46, 12, 2, '2024-03-04 15:00:24', 300),
(47, 12, 2, '2024-03-04 15:00:37', 300),
(48, 12, 10, '2024-03-04 15:03:43', 2345),
(49, 12, 2, '2024-03-04 15:03:57', 300),
(50, 12, 13, '2024-03-04 15:10:54', 200),
(51, 12, 13, '2024-03-04 15:11:08', 200),
(52, 12, 13, '2024-03-04 15:17:14', 200),
(53, 12, 2, '2024-03-04 15:29:17', 300),
(54, 12, 2, '2024-03-04 15:29:56', 300),
(55, 12, 13, '2024-03-04 15:36:59', 200),
(56, 12, 13, '2024-03-04 15:52:53', 200),
(57, 12, 3, '2024-03-04 15:57:57', 0),
(58, 12, 13, '2024-03-04 16:13:52', 200),
(59, 12, 2, '2024-03-04 16:22:17', 300),
(60, 12, 13, '2024-03-04 17:42:34', 200),
(61, 12, 2, '2024-03-04 18:12:28', 300);

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
  `Expirience` int(11) NOT NULL,
  `coins` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblgebruiker_profile`
--

INSERT INTO `tblgebruiker_profile` (`id`, `userid`, `theme`, `profielfoto`, `admin`, `Level`, `Expirience`, `coins`) VALUES
(9, 12, 'light', '65e651e4ce0f05.58493749.jpg', 1, 1, 0, 5106),
(11, 14, 'dark', 'https://avatars.githubusercontent.com/u/64209400?v=4', 1, 1, 0, 0),
(14, 19, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0, 1, 0, 0),
(15, 20, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0, 1, 0, 0),
(16, 21, 'light', 'https://avatars.githubusercontent.com/u/64209400?v=4', 0, 1, 0, 0),
(18, 23, 'dark', '65e75cb4189232.86496291.jfif', 1, 1, 0, 0);

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
(28, 'yamaha r7', 'ice', 266, 'he', 123, 'vuut', 222, '6569d9321c9699.56519162.jpeg'),
(31, 'Bobber', 'water', 800, 'cuteness overload', 200, 'ta mere', 68, '65e5d5a2327a54.37009224.png');

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
(2, 26, 2),
(2, 28, 3),
(2, 27, 4),
(13, 22, 14),
(13, 26, 15),
(13, 27, 16),
(13, 28, 17),
(13, 31, 18);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblpacks`
--

CREATE TABLE `tblpacks` (
  `packId` int(11) NOT NULL,
  `packNaam` text NOT NULL,
  `packImg` text NOT NULL,
  `releaseDate` datetime NOT NULL DEFAULT current_timestamp(),
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblpacks`
--

INSERT INTO `tblpacks` (`packId`, `packNaam`, `packImg`, `releaseDate`, `price`) VALUES
(2, 'Scarlet & Violet', 'pokemon packs.png', '2024-02-05 16:05:44', 300),
(3, 'test', 'pokemon packs.png', '2024-02-08 11:00:48', 0),
(4, 'test', 'pokemon packs.png', '2024-02-08 11:02:50', 0),
(5, 'test4', 'pokemon packs.png', '2024-02-08 11:02:58', 0),
(6, 'test3', 'pokemon packs.png', '2024-02-08 11:03:22', 0),
(7, 'test5', 'pokemon packs.png', '2024-02-08 11:03:40', 0),
(8, 'test6', 'pokemon packs.png', '2024-02-08 11:03:58', 0),
(10, 'capser', '65db0533464850.76514361.jpg', '2024-02-25 10:15:31', 2345),
(13, 'Bobber Kurwa', '65e5d6601dbea6.09178215.jpg', '2024-03-04 15:10:40', 200);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbltitels`
--

CREATE TABLE `tbltitels` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbltitels`
--

INSERT INTO `tbltitels` (`id`, `name`, `description`) VALUES
(1, 'test', 'this is a test created by xander to see if i made titles correctly'),
(2, 'capser', 'dfjihgbnqjksbdgfnfsekoj bdsmfjdklnv bdposefjgb fjz'),
(3, 'Bobber', 'sdfn sqzkrfegdn ');

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
-- Indexen voor tabel `tblgebruikerkaart`
--
ALTER TABLE `tblgebruikerkaart`
  ADD PRIMARY KEY (`Gebkaartid`);

--
-- Indexen voor tabel `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  ADD PRIMARY KEY (`gebruikerid`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD UNIQUE KEY `reset_token_hash_2` (`reset_token_hash`);

--
-- Indexen voor tabel `tblgebruiker_packsbought`
--
ALTER TABLE `tblgebruiker_packsbought`
  ADD PRIMARY KEY (`id`);

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
-- Indexen voor tabel `tbltitels`
--
ALTER TABLE `tbltitels`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `LevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `tblfriend_request`
--
ALTER TABLE `tblfriend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT voor een tabel `tblgebruikerkaart`
--
ALTER TABLE `tblgebruikerkaart`
  MODIFY `Gebkaartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT voor een tabel `tblgebruikers`
--
ALTER TABLE `tblgebruikers`
  MODIFY `gebruikerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `tblgebruiker_packsbought`
--
ALTER TABLE `tblgebruiker_packsbought`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT voor een tabel `tblgebruiker_profile`
--
ALTER TABLE `tblgebruiker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `tblkaart`
--
ALTER TABLE `tblkaart`
  MODIFY `kaartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `tblpackcards`
--
ALTER TABLE `tblpackcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `tblpacks`
--
ALTER TABLE `tblpacks`
  MODIFY `packId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `tbltitels`
--
ALTER TABLE `tbltitels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `tblvrienden`
--
ALTER TABLE `tblvrienden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
