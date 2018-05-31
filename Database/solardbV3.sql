-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2018 alle 08:07
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solardb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dati`
--

CREATE TABLE `dati` (
  `IdDato` int(11) NOT NULL,
  `IdUtente` int(11) NOT NULL,
  `PrivA1` int(10) NOT NULL,
  `PrivA2` int(10) NOT NULL,
  `PrivA3` int(10) NOT NULL,
  `Priv-A1` int(10) NOT NULL,
  `Priv-A2` int(10) NOT NULL,
  `Priv-A3` int(10) NOT NULL,
  `GseA1` int(10) NOT NULL,
  `GseA2` int(10) NOT NULL,
  `GseA3` int(10) NOT NULL,
  `Gse-A1` int(10) NOT NULL,
  `Gse-A2` int(10) NOT NULL,
  `Gse-A3` int(10) NOT NULL,
  `Data` date NOT NULL,
  `Commento` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dati`
--

INSERT INTO `dati` (`IdDato`, `IdUtente`, `PrivA1`, `PrivA2`, `PrivA3`, `Priv-A1`, `Priv-A2`, `Priv-A3`, `GseA1`, `GseA2`, `GseA3`, `Gse-A1`, `Gse-A2`, `Gse-A3`, `Data`, `Commento`) VALUES
(7, 1, 35, 89, 68, 83, 14, 3, 0, 0, 0, 133, 25, 11, '2015-10-01', NULL),
(9, 1, 115, 213, 187, 203, 30, 26, 0, 0, 0, 335, 58, 63, '2015-11-01', NULL),
(10, 1, 235, 375, 394, 282, 37, 48, 0, 0, 0, 491, 79, 117, '2015-12-01', NULL),
(11, 1, 325, 516, 569, 363, 47, 65, 0, 0, 0, 651, 112, 163, '2016-01-01', NULL),
(12, 1, 415, 638, 701, 468, 59, 74, 0, 0, 0, 831, 145, 182, '2016-02-01', NULL),
(13, 1, 485, 759, 820, 648, 91, 96, 0, 0, 0, 1131, 209, 234, '2016-03-01', NULL),
(14, 1, 522, 859, 900, 855, 129, 148, 1, 0, 0, 1148, 283, 324, '2016-04-01', NULL),
(15, 1, 552, 947, 991, 1106, 165, 191, 1, 0, 0, 1816, 362, 394, '2016-05-01', NULL),
(16, 1, 571, 1017, 1062, 1403, 197, 260, 1, 0, 0, 2225, 432, 490, '2016-06-01', NULL),
(17, 1, 591, 1086, 1121, 1676, 256, 337, 1, 1, 0, 2601, 541, 594, '2016-07-01', NULL),
(18, 1, 605, 1147, 1175, 1983, 311, 425, 1, 1, 1, 3005, 627, 700, '2016-08-01', NULL),
(19, 1, 629, 1228, 1244, 2241, 351, 467, 1, 1, 1, 3358, 686, 764, '2016-09-01', NULL),
(20, 1, 706, 1349, 1351, 2351, 374, 494, 1, 1, 1, 3545, 740, 817, '2016-10-01', NULL),
(21, 1, 824, 1487, 1480, 2409, 388, 505, 1, 1, 1, 3760, 781, 877, '2016-11-01', NULL),
(22, 1, 942, 1670, 1656, 2486, 400, 523, 1, 1, 1, 3811, 809, 899, '2016-12-01', NULL),
(23, 1, 1077, 1833, 1823, 2549, 410, 541, 2, 2, 1, 3947, 841, 948, '2017-01-01', NULL),
(24, 1, 1172, 1950, 1952, 2630, 429, 556, 2, 2, 1, 4105, 883, 983, '2017-02-01', NULL),
(25, 1, 1229, 2065, 2056, 2855, 455, 582, 2, 2, 1, 4460, 936, 1041, '2017-03-01', NULL),
(26, 1, 1260, 2165, 2161, 3054, 507, 673, 2, 2, 1, 4780, 1037, 1169, '2017-04-01', NULL),
(27, 1, 1294, 2253, 2243, 3319, 565, 741, 2, 2, 1, 5193, 1120, 1274, '2017-05-01', NULL),
(28, 1, 1316, 2319, 2303, 3612, 622, 813, 2, 2, 1, 5594, 1226, 1374, '2017-06-01', NULL),
(29, 1, 1330, 2387, 2373, 3932, 682, 887, 2, 3, 1, 6014, 1333, 1474, '2017-07-01', NULL),
(30, 1, 1351, 2450, 2436, 4217, 734, 966, 2, 3, 1, 6401, 1426, 1573, '2017-08-01', NULL),
(31, 1, 1374, 2546, 2504, 4458, 770, 1013, 2, 3, 1, 6735, 1484, 1642, '2017-09-01', NULL),
(32, 1, 1428, 2669, 2597, 4625, 793, 1043, 2, 3, 1, 6991, 1524, 1703, '2017-10-01', NULL),
(33, 1, 1526, 2971, 2723, 4710, 805, 1065, 2, 3, 1, 7140, 1552, 1750, '2017-11-01', NULL),
(34, 1, 1644, 2958, 2955, 4750, 820, 1088, 2, 3, 1, 7314, 1607, 1814, '2017-12-01', NULL),
(35, 1, 1772, 3082, 3122, 4831, 830, 1109, 3, 3, 1, 7376, 1618, 1838, '2018-01-01', NULL),
(36, 1, 1875, 3203, 3241, 4907, 843, 1120, 3, 3, 1, 7515, 1645, 1867, '2018-02-01', NULL),
(37, 1, 1945, 3337, 3382, 5098, 862, 1128, 3, 4, 2, 7809, 1684, 1887, '2018-03-01', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IdUtente` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Data_Registrazione` date NOT NULL,
  `Indirizzo` varchar(50) DEFAULT NULL,
  `Citta` varchar(30) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `CAP` varchar(6) DEFAULT NULL,
  `EmailConfermata` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IdUtente`, `Email`, `Password`, `Nome`, `Cognome`, `Data_Registrazione`, `Indirizzo`, `Citta`, `Provincia`, `CAP`, `EmailConfermata`) VALUES
(1, 'm.peirone.9953@vallauri.edu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Matteo', 'Peirone', '2018-04-27', 'Strada Orià 3', 'Carrù', 'CN', '12061', b'0'),
(2, 'boo@boo.it', 'pass', 'Boo', 'OOB', '2018-05-11', 'f', 'g', 'g', 'g', b'1');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dati`
--
ALTER TABLE `dati`
  ADD PRIMARY KEY (`IdDato`),
  ADD KEY `Utente` (`IdUtente`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IdUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dati`
--
ALTER TABLE `dati`
  MODIFY `IdDato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IdUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dati`
--
ALTER TABLE `dati`
  ADD CONSTRAINT `Utente` FOREIGN KEY (`IdUtente`) REFERENCES `utenti` (`IdUtente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
