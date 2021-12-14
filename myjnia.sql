-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Gru 2021, 17:18
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `myjnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `ID_K` int(11) NOT NULL,
  `Imie` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Pojazd` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nr_tel` varchar(9) COLLATE utf8_polish_ci NOT NULL,
  `Czarna_Lista` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`ID_K`, `Imie`, `Nazwisko`, `Pojazd`, `nr_tel`, `Czarna_Lista`) VALUES
(1, 'Rozalia', 'Małolepsza', 'Fiat 125p', '111111111', 0),
(2, 'Olgierd', 'Łukaszewicz', 'Volkswagen Golf 4', '222222222', 0),
(3, 'Iza', 'Nowak', 'Opel Astra G', '333333333', 0),
(4, 'Łukasz', 'Olejniczak', 'Fiat 500e', '444444444', 0),
(5, 'Elżbieta', 'Jawor', 'Syrena 105', '555555555', 0),
(6, 'Andrzej', 'Drożdż', 'Toyota Aygo', '666666666', 1),
(7, 'Adam', 'Adamski', 'Mercedes W124', '777777777', 0),
(8, 'Iza', 'Januszewska', 'Ford Focus', '888888888', 0),
(9, 'Jan', 'Krynicki', 'Ford T', '999998997', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `ID_R` int(11) NOT NULL,
  `Klient` int(11) NOT NULL,
  `Data_Rez` date NOT NULL,
  `Godzina_Rez` time NOT NULL,
  `Usluga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`ID_R`, `Klient`, `Data_Rez`, `Godzina_Rez`, `Usluga`) VALUES
(1, 1, '2021-12-16', '15:30:00', 1),
(2, 9, '2021-12-16', '15:00:00', 1),
(3, 3, '2021-12-16', '12:00:00', 5),
(4, 1, '2021-12-31', '14:00:00', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uslugi`
--

CREATE TABLE `uslugi` (
  `ID_U` int(11) NOT NULL,
  `Nazwa` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `Cena` decimal(5,2) NOT NULL,
  `Opis` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uslugi`
--

INSERT INTO `uslugi` (`ID_U`, `Nazwa`, `Cena`, `Opis`) VALUES
(1, 'Standard', '80.00', 'Usuwanie zanieczyszczeń z karoserii i szyb samochodu.'),
(2, 'Standard+', '100.00', 'Usuwanie zanieczyszczeń z karoserii i szyb samochodu oraz jego woskowanie'),
(3, 'Premium', '120.00', 'Usuwanie zanieczyszczeń z karoserii i szyb samochodu, jego woskowanie oraz odkurzanie wnętrza'),
(4, 'Premium+', '150.00', 'Usuwanie zanieczyszczeń z karoserii i szyb samochodu, jego woskowanie, odkurzanie wnętrza oraz mycie szyb oraz wnętrza'),
(5, 'Perwoll', '200.00', 'Usuwanie zanieczyszczeń z karoserii i szyb samochodu, jego woskowanie, odkurzanie wnętrza oraz mycie szyb, wnętrza oraz pranie tapicerek');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`ID_K`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`ID_R`);

--
-- Indeksy dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`ID_U`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `ID_K` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
