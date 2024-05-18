-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 18, 2024 at 12:13 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupy`
--

CREATE TABLE `grupy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grupy`
--

INSERT INTO `grupy` (`id`, `nazwa`) VALUES
(2, 'Grupa Biologów'),
(1, 'Klasa 1A');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupy_przypisania`
--

CREATE TABLE `grupy_przypisania` (
  `id_grupy` int(11) DEFAULT NULL,
  `id_osoby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id`, `nazwa`) VALUES
(18, 'Algebra'),
(20, 'Botanika'),
(25, 'Geometria'),
(26, 'Granice'),
(19, 'Średniowiecze'),
(24, 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `id` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL,
  `tresc` varchar(250) NOT NULL,
  `poprawnosc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`id`, `id_pytania`, `tresc`, `poprawnosc`) VALUES
(19, 29, 'test', 0),
(20, 29, 'test', 1),
(21, 29, 'test', 0),
(22, 36, '2*pi*r', 1),
(23, 36, 'a^2', 0),
(24, 36, 'a*b', 0),
(25, 37, '5', 0),
(26, 37, '3', 0),
(27, 37, '7', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi_podane`
--

CREATE TABLE `odpowiedzi_podane` (
  `id_testu` int(11) NOT NULL,
  `id_osoby` int(11) DEFAULT NULL,
  `kod_osoby` varchar(255) DEFAULT NULL,
  `id_odpowiedz` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `poziom`
--

CREATE TABLE `poziom` (
  `id` int(11) NOT NULL,
  `trudnosc_nazwa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poziom`
--

INSERT INTO `poziom` (`id`, `trudnosc_nazwa`) VALUES
(2, 'Średni'),
(3, 'Trudny'),
(1, 'Łatwy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `przedmioty`
--

INSERT INTO `przedmioty` (`id`, `nazwa`) VALUES
(22, 'Biologia'),
(24, 'Geografia'),
(21, 'Historia'),
(20, 'Matematyka'),
(23, 'Test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przypisania`
--

CREATE TABLE `przypisania` (
  `id_testu` int(11) NOT NULL,
  `id_osoby` int(11) DEFAULT NULL,
  `id_grupy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id` int(11) NOT NULL,
  `tresc` varchar(1000) NOT NULL,
  `przedmiot_id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `poziom_id` int(11) NOT NULL,
  `zdjecie` varchar(50) DEFAULT NULL,
  `autor` int(11) NOT NULL,
  `prywatnosc` tinyint(1) NOT NULL,
  `typ_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pytania`
--

INSERT INTO `pytania` (`id`, `tresc`, `przedmiot_id`, `kategoria_id`, `poziom_id`, `zdjecie`, `autor`, `prywatnosc`, `typ_pytania`) VALUES
(29, 'Test', 23, 24, 1, '', 1, 1, 4),
(36, 'Jakie jest wzór na pole koła?', 20, 25, 1, '', 1, 1, 4),
(37, 'Ilu sąsiadów ma Polska', 24, 26, 1, '', 1, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_przeprowadzane`
--

CREATE TABLE `testy_przeprowadzane` (
  `id` int(11) NOT NULL,
  `id_testu` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `od` date DEFAULT NULL,
  `do` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_pytania`
--

CREATE TABLE `testy_pytania` (
  `id_testu` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_pytania_pytania`
--

CREATE TABLE `testy_pytania_pytania` (
  `Testy_pytania_id_pytania` int(11) NOT NULL,
  `Pytania_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_stworzone`
--

CREATE TABLE `testy_stworzone` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `przedmiot` int(11) NOT NULL,
  `prywatnosc` tinyint(1) NOT NULL,
  `tytuł` varchar(50) DEFAULT NULL,
  `data_stworzenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testy_stworzone`
--

INSERT INTO `testy_stworzone` (`id`, `autor`, `przedmiot`, `prywatnosc`, `tytuł`, `data_stworzenia`) VALUES
(1, 1, 1, 0, 'Test z matematyki', '2024-05-01'),
(2, 2, 2, 0, 'Historia Polski', '2024-04-28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ_pytania`
--

CREATE TABLE `typ_pytania` (
  `id` int(11) NOT NULL,
  `nazwa_typu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typ_pytania`
--

INSERT INTO `typ_pytania` (`id`, `nazwa_typu`) VALUES
(2, 'Otwarte'),
(1, 'Test'),
(3, 'Wielokrotnego w'),
(4, 'Zamkniete');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `typ_konta` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `typ_konta`) VALUES
(1, 'Jan', 'Kowalski', 1),
(2, 'Anna', 'Nowak', 0),
(3, 'Piotr', 'Zieliński', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `grupy`
--
ALTER TABLE `grupy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pytania` (`id_pytania`);

--
-- Indeksy dla tabeli `poziom`
--
ALTER TABLE `poziom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trudnosc_nazwa` (`trudnosc_nazwa`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `przedmiot_id` (`przedmiot_id`),
  ADD KEY `kategoria_id` (`kategoria_id`),
  ADD KEY `poziom_id` (`poziom_id`),
  ADD KEY `autor` (`autor`);

--
-- Indeksy dla tabeli `testy_przeprowadzane`
--
ALTER TABLE `testy_przeprowadzane`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `testy_pytania_pytania`
--
ALTER TABLE `testy_pytania_pytania`
  ADD PRIMARY KEY (`Testy_pytania_id_pytania`,`Pytania_id`);

--
-- Indeksy dla tabeli `testy_stworzone`
--
ALTER TABLE `testy_stworzone`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `typ_pytania`
--
ALTER TABLE `typ_pytania`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa_typu` (`nazwa_typu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grupy`
--
ALTER TABLE `grupy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `testy_przeprowadzane`
--
ALTER TABLE `testy_przeprowadzane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testy_stworzone`
--
ALTER TABLE `testy_stworzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typ_pytania`
--
ALTER TABLE `typ_pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD CONSTRAINT `odpowiedzi_ibfk_1` FOREIGN KEY (`id_pytania`) REFERENCES `pytania` (`id`);

--
-- Constraints for table `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_1` FOREIGN KEY (`przedmiot_id`) REFERENCES `przedmioty` (`id`),
  ADD CONSTRAINT `pytania_ibfk_2` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `pytania_ibfk_3` FOREIGN KEY (`poziom_id`) REFERENCES `poziom` (`id`),
  ADD CONSTRAINT `pytania_ibfk_4` FOREIGN KEY (`autor`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
