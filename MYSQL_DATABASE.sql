-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Erstellungszeit: 29. Apr 2022 um 10:33
-- Server-Version: 8.0.28
-- PHP-Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `MYSQL_DATABASE`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addresse`
--

CREATE TABLE `addresse` (
  `id` int UNSIGNED NOT NULL,
  `number` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `contact_id` int UNSIGNED DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `addresse`
--

INSERT INTO `addresse` (`id`, `number`, `street`, `city`, `zip`, `country`, `contact_id`, `created`) VALUES
(1, '45', 'barbes', 'monpelier', '52001', 'France', 1, '2022-04-29 09:26:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `id` int UNSIGNED NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `birthday` varchar(30) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`id`, `firstName`, `lastName`, `email`, `phone`, `birthday`, `created`) VALUES
(1, 'Benard', 'mark', 'mark@gmail.com', '017686776531', '1983-02-08', '2022-04-29 09:26:05');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `addresse`
--
ALTER TABLE `addresse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresse_ibfk_1` (`contact_id`);

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `addresse`
--
ALTER TABLE `addresse`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `addresse`
--
ALTER TABLE `addresse`
  ADD CONSTRAINT `addresse_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
