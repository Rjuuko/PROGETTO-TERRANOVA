-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 11:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terranova`
--

-- --------------------------------------------------------

--
-- Table structure for table `anagrafiche`
--

CREATE TABLE `anagrafiche` (
  `IDAnagrafica` int(2) NOT NULL,
  `Cognome` varchar(9) DEFAULT NULL,
  `Nome` varchar(10) DEFAULT NULL,
  `RagSoc` varchar(18) DEFAULT NULL,
  `PIVA` varchar(10) DEFAULT NULL,
  `CFisc` varchar(16) DEFAULT NULL,
  `Indirizzo` varchar(16) DEFAULT NULL,
  `Civico` int(2) DEFAULT NULL,
  `CAP` int(5) DEFAULT NULL,
  `Localita` varchar(11) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `Nazione` varchar(2) DEFAULT NULL,
  `NumeroTelefonico` varchar(10) DEFAULT NULL,
  `Email` varchar(29) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `anagrafiche`
--

INSERT INTO `anagrafiche` (`IDAnagrafica`, `Cognome`, `Nome`, `RagSoc`, `PIVA`, `CFisc`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`, `NumeroTelefonico`, `Email`) VALUES
(1, 'NADINI', 'ROBERTA', 'NADINI ROBERTA', '', 'NDNRRT68L29H193E', 'VIA ETNA', 12, 16134, 'GENOVA', 'GE', 'IT', '', 'rnadini@google.com'),
(2, 'CARUFFI', 'CARLO', 'CARUFFI CARLO', '', 'CRFCRL64R25D969X', 'VIA ROMA', 78, 16132, 'GENOVA', 'GE', 'IT', '3471234309', 'ccaruffi@icloud.com'),
(3, 'CERVISIO', 'GAETANO', 'CERVISIO GAETANO', '', 'CRVGTN61L14F939Y', 'VIA CATANIA', 9, 45011, 'ADRIA', 'RO', 'IT', '3426907124', 'gaetano.cervisio@gmail.com'),
(4, 'CASSATURO', 'ANDREA', 'CASSATURO ANDREA', '', 'CSSNDR64E09F809K', 'PIAZZA SIMONI', 62, 80122, 'NAPOLI', 'NA', 'IT', '3358468334', 'cassaturoandrea@libero.it'),
(5, 'BEGHINI', 'ALESSANDRA', 'BEGHINI ALESSANDRA', '', 'BGNLSN83D14C528F', 'VIA RIMINI', 28, 25033, 'COLOGNE', 'BS', 'IT', '', 'beghini.alessandra@hotmail.it'),
(6, 'MOSETTI', 'GABRIELE', 'MOSETTI GABRIELE', '', 'MSTGRL75B29Z123K', 'VIA S. FRANCESCO', 71, 25035, 'OSPITALETTO', 'BS', 'IT', '3355234506', 'gab_mos@yahoo.com'),
(7, '', '', 'JOLLY FITNESS CLUB', '5801231208', '', 'VIA MARCONI', 72, 80128, 'NAPOLI', 'NA', 'IT', '3404321089', 'jollyfitnessclub@iol.it'),
(8, '', '', 'BAR CARPE DIEM', '6044751606', 'SCNLCN86B03E839G', 'VIA MOROSELLI', 15, 80127, 'NAPOLI', 'NA', 'IT', '3335754225', 'carpediem@hotmail.it'),
(9, '', '', 'PANIFICIO PEROTTI', '4019077958', 'PRTRPZ71A44F125K', 'VIA DIAZ', 52, 75100, 'MATERA', 'MT', 'IT', '3208362856', 'info@panificioperotti.com'),
(10, '', '', 'VILLA DOMENICI', '7065650630', 'DMZNCL80H28A225V', 'VICOLO FRIULI', 31, 70022, 'ALTAMURA', 'BA', 'IT', '3481112514', 'info@villadomenici.it');

-- --------------------------------------------------------

--
-- Table structure for table `contatti`
--

CREATE TABLE `contatti` (
  `IDAnagrafica` int(1) NOT NULL,
  `Cognome` varchar(7) NOT NULL,
  `Nome` varchar(9) NOT NULL,
  `RagSoc` varchar(14) DEFAULT NULL,
  `PIVA` varchar(10) DEFAULT NULL,
  `CFisc` varchar(16) DEFAULT NULL,
  `Indirizzo` varchar(14) DEFAULT NULL,
  `Civico` int(2) DEFAULT NULL,
  `CAP` int(5) DEFAULT NULL,
  `Localita` varchar(6) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `Nazione` varchar(2) DEFAULT NULL,
  `NumeroTelefonico` varchar(10) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contatti`
--

INSERT INTO `contatti` (`IDAnagrafica`, `Cognome`, `Nome`, `RagSoc`, `PIVA`, `CFisc`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`, `NumeroTelefonico`, `Email`) VALUES
(1, 'NADINI', 'ANTONIO', 'NADINI ANTONIO', '', 'NDNNTN68I54D456D', 'VIA POLONIA', 25, 16134, 'GENOVA', 'GE', 'IT', '', 'antonio.nadini@google.com'),
(7, 'BELLONI', 'ARTURO', 'BELLONI ARTURO', '', 'BLNRTR12L28E486J', 'VIA POLI', 12, 80128, 'NAPOLI', 'NA', 'IT', '3408921895', 'a.belloni@studiopoli.com'),
(9, 'PEROTTI', 'NICOLETTA', '', '', 'PRTNCL61C65F487L', 'VIA BARTOLOMEI', 63, 75100, 'MATERA', 'MT', 'IT', '3208362856', 'perotti.nicoletta@iol.com');

-- --------------------------------------------------------

--
-- Table structure for table `contratti`
--

CREATE TABLE `contratti` (
  `IDRigaContratto` int(2) NOT NULL,
  `IDSede` int(2) DEFAULT NULL,
  `DataRichiestaServizio` varchar(23) DEFAULT NULL,
  `DataInizioValidita` varchar(23) DEFAULT NULL,
  `DataFineValidita` varchar(23) DEFAULT NULL,
  `DescrizioneOfferta` varchar(11) DEFAULT NULL,
  `Utility` varchar(6) DEFAULT NULL,
  `StatoContratto` varchar(14) DEFAULT NULL,
  `TipoPagamento` varchar(16) DEFAULT NULL,
  `PotenzaImp` varchar(4) DEFAULT NULL,
  `PotDisp` varchar(4) DEFAULT NULL,
  `EnergiaAnno` varchar(5) DEFAULT NULL,
  `GasAnno` varchar(4) DEFAULT NULL,
  `UsoCotturaCibi` varchar(1) DEFAULT NULL,
  `ProduzioneAcquaCaldaSanitaria` varchar(1) DEFAULT NULL,
  `RiscaldamentoIndividuale` varchar(1) DEFAULT NULL,
  `UsoCommerciale` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contratti`
--

INSERT INTO `contratti` (`IDRigaContratto`, `IDSede`, `DataRichiestaServizio`, `DataInizioValidita`, `DataFineValidita`, `DescrizioneOfferta`, `Utility`, `StatoContratto`, `TipoPagamento`, `PotenzaImp`, `PotDisp`, `EnergiaAnno`, `GasAnno`, `UsoCotturaCibi`, `ProduzioneAcquaCaldaSanitaria`, `RiscaldamentoIndividuale`, `UsoCommerciale`) VALUES
(1, 1, '2010-12-21 00:00:00.000', '2011-02-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Easy Energy', 'EE', 'Attivo', 'Bonifico', '3.30', '3.00', '5408', '', '', '', '', ''),
(2, 2, '2012-09-24 00:00:00.000', '2012-10-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Easy Energy', 'EE', 'Attivo', 'Carta di credito', '3.30', '3.00', '4862', '', '', '', '', ''),
(3, 3, '2012-09-24 00:00:00.000', '2015-04-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Easy Energy', 'EE/GAS', 'Attivo', 'Bonifico', '3.30', '3.00', '4596', '1073', '1', '1', '1', '0'),
(4, 4, '2010-12-14 00:00:00.000', '2011-02-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Family', 'GAS', 'Attivo', 'Bonifico', '', '', '', '1045', '1', '1', '1', '0'),
(5, 5, '2012-01-31 00:00:00.000', '2012-02-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Family', 'GAS', 'Attivo', 'Bonifico', '', '', '', '879', '1', '1', '1', '0'),
(6, 6, '2022-10-23 00:00:00.000', '2022-12-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Family', 'EE', 'In lavorazione', 'Bollettino', '3.30', '3.00', '2085', '', '', '', '', ''),
(7, 7, '2012-08-28 00:00:00.000', '2012-09-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Family', 'EE', 'Attivo', 'Bollettino', '3.30', '3.00', '6023', '', '', '', '', ''),
(8, 8, '2012-08-28 00:00:00.000', '2015-04-01 00:00:00.000', '2050-12-31 00:00:00.000', 'Full Power', 'EE', 'Attivo', 'Bonifico', '16.5', '15.0', '45581', '', '', '', '', ''),
(9, 9, '2015-05-01 00:00:00.000', '2015-05-01 00:00:00.000', '2015-05-31 23:59:59.000', 'Full Power', 'EE', 'Attivo', 'Bonifico', '16.5', '15.0', '62484', '', '', '', '', ''),
(10, 10, '2015-05-01 00:00:00.000', '2015-05-01 00:00:00.000', '2015-05-31 23:59:59.000', 'Full Power', 'EE', 'Attivo', 'Bonifico', '11.0', '10.0', '50024', '', '', '', '', ''),
(11, 11, '2010-12-21 00:00:00.000', '2011-02-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Super Power', 'EE', 'Attivo', 'Bonifico', '60.0', '60.0', '59235', '', '', '', '', ''),
(12, 12, '2012-08-31 00:00:00.000', '2012-09-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Super Power', 'EE', 'Attivo', 'Bonifico', '60.0', '60.0', '74024', '', '', '', '', ''),
(13, 13, '2012-08-31 00:00:00.000', '2015-04-01 00:00:00.000', '2050-12-31 00:00:00.000', 'Super Power', 'GAS', 'Attivo', 'Bonifico', '', '', '', '8460', '1', '1', '1', '1'),
(14, 14, '2010-12-10 00:00:00.000', '2011-02-01 00:00:00.000', '2050-12-31 23:59:59.000', 'Super Power', 'GAS', 'Attivo', 'Bonifico', '', '', '', '6126', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idAnagrafica` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sedi`
--

CREATE TABLE `sedi` (
  `IDSede` int(2) NOT NULL,
  `IDAnagrafica` int(2) DEFAULT NULL,
  `Descrizione` varchar(25) DEFAULT NULL,
  `Indirizzo` varchar(16) DEFAULT NULL,
  `Civico` int(2) DEFAULT NULL,
  `CAP` int(5) DEFAULT NULL,
  `Localita` varchar(11) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `Nazione` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sedi`
--

INSERT INTO `sedi` (`IDSede`, `IDAnagrafica`, `Descrizione`, `Indirizzo`, `Civico`, `CAP`, `Localita`, `Provincia`, `Nazione`) VALUES
(1, 1, 'NADINI ROBERTA', 'VIA ETNA', 12, 16134, 'GENOVA', 'GE', 'IT'),
(2, 2, 'CARUFFI CARLO', 'VIA ROMA', 78, 16132, 'GENOVA', 'GE', 'IT'),
(3, 3, 'CERVISIO GAETANO', 'VIA CATANIA', 9, 45011, 'ADRIA', 'RO', 'IT'),
(4, 4, 'CASSATURO ANDREA', 'PIAZZA SIMONI', 62, 80122, 'NAPOLI', 'NA', 'IT'),
(5, 5, 'BEGHINI ALESSANDRA', 'VIA RIMINI', 28, 25033, 'COLOGNE', 'BS', 'IT'),
(6, 5, 'BEGHINI ALESSANDRA', 'VIA RIMINI', 30, 25033, 'COLOGNE', 'BS', 'IT'),
(7, 6, 'MOSETTI GABRIELE', 'VIA S. FRANCESCO', 71, 25035, 'OSPITALETTO', 'BS', 'IT'),
(8, 7, 'JOLLY FITNESS CLUB', 'VIA MARCONI', 72, 80128, 'NAPOLI', 'NA', 'IT'),
(9, 8, 'BAR CARPE DIEM', 'VIA MOROSELLI', 15, 80127, 'NAPOLI', 'NA', 'IT'),
(10, 8, 'SICENI LUCIANO', 'VIA NITTI', 15, 80127, 'NAPOLI', 'NA', 'IT'),
(11, 9, 'PANIFICIO PEROTTI', 'VIA DIAZ', 52, 75100, 'MATERA', 'MT', 'IT'),
(12, 9, 'PANIFICIO PEROTTI', 'VIA S. CATERINA', 16, 75100, 'MATERA', 'MT', 'IT'),
(13, 10, 'VILLA DOMENICI', 'VICOLO FRIULI', 31, 70022, 'ALTAMURA', 'BA', 'IT'),
(14, 10, 'RISTORANTE VILLA DOMENICI', 'VICOLO FRIULI', 33, 70022, 'ALTAMURA', 'BA', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anagrafiche`
--
ALTER TABLE `anagrafiche`
  ADD PRIMARY KEY (`IDAnagrafica`);

--
-- Indexes for table `contatti`
--
ALTER TABLE `contatti`
  ADD PRIMARY KEY (`IDAnagrafica`,`Cognome`,`Nome`);

--
-- Indexes for table `contratti`
--
ALTER TABLE `contratti`
  ADD PRIMARY KEY (`IDRigaContratto`),
  ADD KEY `SediFK` (`IDSede`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LoginAnagraficheFK` (`idAnagrafica`);

--
-- Indexes for table `sedi`
--
ALTER TABLE `sedi`
  ADD PRIMARY KEY (`IDSede`),
  ADD KEY `AnagraficheFK` (`IDAnagrafica`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anagrafiche`
--
ALTER TABLE `anagrafiche`
  MODIFY `IDAnagrafica` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contratti`
--
ALTER TABLE `contratti`
  MODIFY `IDRigaContratto` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sedi`
--
ALTER TABLE `sedi`
  MODIFY `IDSede` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contatti`
--
ALTER TABLE `contatti`
  ADD CONSTRAINT `ContattiAnagraficaFK` FOREIGN KEY (`IDAnagrafica`) REFERENCES `anagrafiche` (`IDAnagrafica`) ON UPDATE CASCADE;

--
-- Constraints for table `contratti`
--
ALTER TABLE `contratti`
  ADD CONSTRAINT `SediFK` FOREIGN KEY (`IDSede`) REFERENCES `sedi` (`IDSede`) ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `LoginAnagraficheFK` FOREIGN KEY (`idAnagrafica`) REFERENCES `anagrafiche` (`IDAnagrafica`);

--
-- Constraints for table `sedi`
--
ALTER TABLE `sedi`
  ADD CONSTRAINT `AnagraficheFK` FOREIGN KEY (`IDAnagrafica`) REFERENCES `anagrafiche` (`IDAnagrafica`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
