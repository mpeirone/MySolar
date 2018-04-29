-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 29, 2018 alle 11:56
-- Versione del server: 10.1.29-MariaDB
-- Versione PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IdUtente` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Data_Registrazione` date NOT NULL,
  `Indirizzo` varchar(50) DEFAULT NULL,
  `Città` varchar(30) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `CAP` varchar(6) DEFAULT NULL,
  `EmailConfermata` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IdUtente`, `Email`, `Password`, `Nome`, `Cognome`, `Data_Registrazione`, `Indirizzo`, `Città`, `Provincia`, `CAP`, `EmailConfermata`) VALUES
(1, 'm.peirone.9953@vallauri.edu', 'password', 'Matteo', 'Peirone', '2018-04-27', 'Strada Orià 3', 'Carrù', 'CN', '12061', b'0');

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
  MODIFY `IdDato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IdUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dati`
--
ALTER TABLE `dati`
  ADD CONSTRAINT `Utente` FOREIGN KEY (`IdUtente`) REFERENCES `utenti` (`IdUtente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
