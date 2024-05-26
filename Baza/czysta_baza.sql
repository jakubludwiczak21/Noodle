-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 27, 2024 at 12:09 AM
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria_przedmiot`
--

CREATE TABLE `kategoria_przedmiot` (
  `id_kategorii` int(11) NOT NULL,
  `id_przedmiotu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_hasla`
--

CREATE TABLE `uzytkownicy_hasla` (
  `id_uzytkownika` int(11) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_loginy`
--

CREATE TABLE `uzytkownicy_loginy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indeksy dla tabeli `kategoria_przedmiot`
--
ALTER TABLE `kategoria_przedmiot`
  ADD PRIMARY KEY (`id_kategorii`,`id_przedmiotu`),
  ADD KEY `id_przedmiotu` (`id_przedmiotu`);

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
-- Indeksy dla tabeli `uzytkownicy_hasla`
--
ALTER TABLE `uzytkownicy_hasla`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy_loginy`
--
ALTER TABLE `uzytkownicy_loginy`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD UNIQUE KEY `login` (`login`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `testy_przeprowadzane`
--
ALTER TABLE `testy_przeprowadzane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testy_stworzone`
--
ALTER TABLE `testy_stworzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `kategoria_przedmiot`
--
ALTER TABLE `kategoria_przedmiot`
  ADD CONSTRAINT `kategoria_przedmiot_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoria_przedmiot_ibfk_2` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `uzytkownicy_hasla`
--
ALTER TABLE `uzytkownicy_hasla`
  ADD CONSTRAINT `uzytkownicy_hasla_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `uzytkownicy_loginy`
--
ALTER TABLE `uzytkownicy_loginy`
  ADD CONSTRAINT `uzytkownicy_loginy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
