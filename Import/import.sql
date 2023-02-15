-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 feb 2023 om 10:28
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s168308_project`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `naam` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `bericht` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderitems`
--

CREATE TABLE `orderitems` (
  `orderItemID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticketType` varchar(255) DEFAULT NULL,
  `ticketName` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`id`, `ticketType`, `ticketName`, `Location`, `price`, `duration`, `description`, `datum`, `poster`) VALUES
(1, 'FILM', 'Minions: the rise of Gru', 'VUE ALKMAAR', 15, '88 minuten', 'Deze zomer gaat ’s werelds grootste animatiefranchise terug naar het begin. We zien hoe de grootste superschurk ter wereld zijn iconische Minions ontmoet en met hen de meest verschrikkelijke crew uit de filmgeschiedenis vormt. Samen nemen ze het op tegen een team van de meest onverschrokken criminelen in Minions: The Rise of Gru. Lang voordat hij een superschurk wordt, is Gru (de voor een Oscar® genomineerde Steve Carell) een 12-jarig jongetje in een buitenwijk in 1970 die vanuit zijn kelder plannen smeedt om de wereld te veroveren. Maar dat gaat nog niet zo goed. Als de Minions, onder wie Kevin, Stuart, Bob en Otto (een nieuwe Minion met een beugel die het heel graag goed wil doen), op Gru’s pad komen bundelen de onwaarschijnlijke vrienden hun krachten. Samen bouwen ze hun eerste schurkenhol, ontwerpen ze hun eerste wapens en bereiden ze hun eerste missies voor. Als de beruchte groep superschurken de Vicious 6 hun leider lozen - de legendarische vechtsporter Wild Knuckles - gaat Gru, hun grootste fan, solliciteren om lid te worden. De Vicious 6 is helaas niet onder de indruk van de kleine wannabe. Maar ze worden woest als Gru ze te slim af is en dan wordt hij ineens de aartsvijand van het criminele topteam. Als Gru op de vlucht slaat, proberen de Minions kungfu te leren om hem te redden. Gru zelf komt tot de ontdekking dat zelfs slechteriken weleens hulp nodig hebben van vrienden', '2023-06-23', 'MinionsPoster.jpg'),
(2, 'FILM', 'Star Wars: The phantom menace', 'VUE ALKMAAR', 25, '69 minuten', 'Star Wars: Episode I: The Phantom Menace is een Amerikaanse film van George Lucas uit 1999. De film vormt het eerste deel uit de Star Wars-saga, hoewel deze film pas als vierde gemaakt werd. Net zoals de drie vorige, werd het scenario van deze film geschreven door George Lucas en net als Star Wars: Episode IV: A New Hope regisseerde George Lucas zelf.', '2023-07-12', 'phantomMenace.jpg'),
(3, 'FILM', 'Iron Man', 'VUE UTRECHT', 25, '126 minuten', 'Iron Man is een fictieve superheld uit de comics van Marvel Comics. Hij werd bedacht door Stan Lee, Larry Lieber, Don Heck en Jack Kirby en verscheen voor het eerst in Tales of Suspense #39 (Maart 1963). De acteur die Iron Man vertolkte in het Marvel Cinematic Universe is Robert Downey jr.', '2023-09-11', 'ironMan.jpg'),
(4, 'FILM', 'Kingsman: The Golden Circle', 'PATÉ UTRECHT', 18, '15 minuten', 'Kingsman: The Golden Circle is een Brits-Amerikaanse actiefilm uit 2017 geregisseerd door Matthew Vaughn, die het samen met Jane Goldman ook geschreven heeft. De spionagekomedie is een vervolg op Kingsman: The Secret Service.', '2023-05-04', 'kingsman.jpg'),
(5, 'FILM', 'Neon Genesis Evangelion', 'PATÉ UTRECHT', 18, '169 minuten', 'Neon Genesis Evangelion (新世紀エヴァンゲリオン[?], \"Shin Seiki Evangerion\", lit. New Century Evangelion), commonly referred to as Evangelion, is a Japanese anime series, created by Gainax, that began in October 1995. The anime was written and directed by Hideaki Anno, and co-produced by TV Tokyo and Nihon Ad Systems (NAS). It gained international renown and won several animation awards, and was the start of the Neon Genesis Evangelion series.', '2023-01-01', 'evangelion.jpg'),
(6, 'EVENT', 'COMIC CON', 'UTRECHT', 50, '2 DAGEN', 'Op 24 & 25 juni 2023 organiseren wij de eerste Heroes Dutch Comic Con Summer Edition! Altijd al wereldberoemde acteurs en Comic Artists willen ontmoeten of ben je fan van series, films, esports of cosplay? Heroes Dutch Comic Con heeft het allemaal, én meer! Bereid je voor op een geweldig weekend vol vermaak, bijzondere ontmoetingen, deel jouw passies met andere of maak nieuwe vrienden!', '2023-08-19', 'comicConPoster.jpg'),
(7, 'MUSICAL', 'Soldaat van Oranje', 'De TheaterHangaar, Katwijk', 37, '154 minuten', 'Verdoening van je geld, je kan dit maar beter gewoon niet kopen', '2023-04-03', 'soldaatPoster.jpg'),
(8, 'CONCERT', 'Snoop dogg', 'Ziggo Dome, Amsterdam', 69, '5 uur', 'Een Concert gegeven door de one and only Snoop Dogg', '2023-05-27', 'snoopDoggPoster.jpg'),
(9, 'CONCERT', 'K3 on tour', 'Ziggodome', 13, '75', 'Een concert met de geweldige meiden van k3', '2023-06-04', 'k3.jpg'),
(10, 'CONCERT', 'K3 on tour', 'Ziggodome', 13, '75', 'Een concert gegeven door de geweldige meiden van K3', '2023-11-05', 'k3.jpg'),
(11, 'CONCERT', 'Marshmello', 'Ziggodome', 52, '320', 'Een prachtig concert dat wordt gegeven in de ziggodome door Marshmello', '2023-03-31', 'Marshmellow.jpg'),
(12, 'CONCERT', 'Maroon5', 'Ziggodome', 45, '180', 'Een concert gegeven in de ziggodome door de band maroon5', '2023-04-13', 'maroon5Change.jpg'),
(13, 'MUSICAL', 'Wizard of Oz', 'De vest - Alkmaar', 15, '136', 'Muscical van Wizard of Os', '2023-04-21', 'wizard.jpg'),
(14, 'MUSICAL', 'The lion king', 'De vest - Alkmaar', 45, '154', 'Musical over The lion King', '2023-02-28', 'lionking.jpg'),
(15, 'MUSICAL', 'Aladdin', 'De vest - Alkmaar', 34, '140', 'Musical gebasseerd op de film Aladdin door Disney', '2023-02-16', 'aladdin.jpg'),
(16, 'EVENT', 'Twitch con', 'jaarbeurs - Utrecht', 50, '2 dagen', 'Hier kan je veel van je favoriete twitch streamers ontmoeten', '2023-02-26', 'twitchcon.jpg'),
(17, 'EVENT', 'L.A.R.P', 'Een bos ergens in limburg ofzo', 50, '1 dag', 'Live Action Role Play', '2023-04-21', 'larp.jpg'),
(18, 'EVENT', 'Anime Expo', 'jaarbeurs - Utrecht', 50, '2 Dagen', 'Anime expo is een plek waar veel anime fanaten bij elkaar komen. Je kan veel manga en anime kopen en natuurlijk lopen er veel mensen in cosplay rond', '2023-02-07', 'animeExpo.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `isAdmin` bit(1) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userID`, `username`, `wachtwoord`, `isAdmin`, `emailAddress`) VALUES
(1, 'Henk', 'HenkIsDeBeste', b'0', 'henk@gmail.com'),
(2, 'Hugo', 'HugoDeAdmin', b'2', 'hugo.admin@gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderItemID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `orderItemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
