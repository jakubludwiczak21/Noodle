-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 27, 2024 at 12:25 AM
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

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id`, `nazwa`) VALUES
(28, 'Algebra'),
(31, 'Botanika'),
(29, 'Mechanika'),
(30, 'Organiczna'),
(32, 'Programowanie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria_przedmiot`
--

CREATE TABLE `kategoria_przedmiot` (
  `id_kategorii` int(11) NOT NULL,
  `id_przedmiotu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoria_przedmiot`
--

INSERT INTO `kategoria_przedmiot` (`id_kategorii`, `id_przedmiotu`) VALUES
(28, 26),
(29, 27),
(30, 28),
(31, 29),
(32, 30);

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
(239, 111, 'Algebra to dział matematyki.', 1),
(240, 111, 'Algebra to rodzaj muzyki.', 0),
(241, 112, 'Mechanika klasyczna zajmuje się ruchem ciał.', 1),
(242, 112, 'Mechanika klasyczna to styl tańca.', 0),
(243, 113, 'Wzór na wodę to H2O.', 1),
(244, 113, 'Wzór na wodę to CO2.', 0),
(245, 114, 'Główne części rośliny to korzeń, łodyga, liście.', 1),
(246, 114, 'Główne części rośliny to korzeń, gałęzie, kwiaty.', 0),
(247, 115, 'Programowanie obiektowe to modelowanie problemów za pomocą obiektów.', 1),
(248, 115, 'Programowanie obiektowe to pisanie programów bez komputera.', 0),
(249, 116, 'Równanie ma jedno rozwiązanie: x = 2.', 1),
(250, 116, 'Równanie ma dwa rozwiązania: x = 2, x = -2.', 0),
(251, 117, 'Zasada zachowania pędu mówi, że całkowity pęd układu jest stały.', 1),
(252, 117, 'Zasada zachowania pędu mówi, że pęd ciała jest zawsze zmienny.', 0),
(253, 118, 'Kwas organiczny ma grupę karboksylową.', 1),
(254, 118, 'Kwas organiczny ma grupę aminową.', 0),
(255, 119, 'Liście uczestniczą w fotosyntezie.', 1),
(256, 119, 'Liście chronią roślinę przed zimnem.', 0),
(257, 120, 'Podstawowe typy zmiennych w Javie to int, double, char.', 1),
(258, 120, 'Podstawowe typy zmiennych w Javie to string, array, list.', 0);

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
(29, 'Biologia'),
(28, 'Chemia'),
(27, 'Fizyka'),
(30, 'Informatyka'),
(26, 'Matematyka');

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
(111, 'Co to jest algebra?', 26, 28, 1, NULL, 1, 0, 1),
(112, 'Wyjaśnij pojęcie mechaniki klasycznej.', 27, 29, 2, NULL, 2, 0, 2),
(113, 'Podaj wzór na reakcję chemiczną H2O.', 28, 30, 1, NULL, 1, 0, 1),
(114, 'Jakie są główne części rośliny?', 29, 31, 1, NULL, 3, 0, 1),
(115, 'Co to jest programowanie obiektowe?', 30, 32, 3, NULL, 2, 0, 2),
(116, 'Rozwiąż równanie kwadratowe x^2 - 4x + 4 = 0.', 26, 28, 2, NULL, 1, 0, 1),
(117, 'Wyjaśnij zasadę zachowania pędu.', 27, 29, 3, NULL, 2, 0, 2),
(118, 'Podaj właściwości kwasów organicznych.', 28, 30, 2, NULL, 3, 0, 1),
(119, 'Wymień funkcje liści w roślinach.', 29, 31, 1, NULL, 2, 0, 2),
(120, 'Jakie są podstawowe typy zmiennych w Javie?', 30, 32, 1, NULL, 1, 0, 1);

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

--
-- Dumping data for table `testy_przeprowadzane`
--

INSERT INTO `testy_przeprowadzane` (`id`, `id_testu`, `autor`, `od`, `do`) VALUES
(1, 10, 1, '2024-06-01', '2024-05-25'),
(2, 11, 2, '2024-06-05', '2024-05-26'),
(3, 12, 3, '2024-06-10', '2024-05-27'),
(4, 13, 1, '2024-06-15', '2024-06-25'),
(5, 14, 2, '2024-06-20', '2024-06-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_pytania`
--

CREATE TABLE `testy_pytania` (
  `id_testu` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testy_pytania`
--

INSERT INTO `testy_pytania` (`id_testu`, `id_pytania`) VALUES
(10, 111),
(10, 116),
(11, 112),
(11, 117),
(12, 113),
(12, 118),
(13, 114),
(13, 119),
(14, 115),
(14, 120),
(15, 116),
(15, 117),
(15, 111);

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
(10, 1, 26, 0, 'Test z algebry', '2024-05-27'),
(11, 2, 27, 0, 'Test z fizyki', '2024-05-27'),
(12, 3, 28, 0, 'Test z chemii', '2024-05-27'),
(13, 1, 29, 0, 'Test z biologii', '2024-05-27'),
(14, 2, 30, 0, 'Test z informatyki', '2024-05-27'),
(15, 7, 28, 0, 'Testujemy test', '2024-05-27');

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
(3, 'Piotr', 'Zieliński', 1),
(4, 'Karolina', 'Nowicka', 0),
(5, 'Tomasz', 'Wiśniewski', 1),
(6, 'Magdalena', 'Wójcik', 0),
(7, 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_hasla`
--

CREATE TABLE `uzytkownicy_hasla` (
  `id_uzytkownika` int(11) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy_hasla`
--

INSERT INTO `uzytkownicy_hasla` (`id_uzytkownika`, `haslo`) VALUES
(4, 'knowicka'),
(5, 'twisniewski'),
(6, 'mwojcik'),
(7, 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_loginy`
--

CREATE TABLE `uzytkownicy_loginy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy_loginy`
--

INSERT INTO `uzytkownicy_loginy` (`id_uzytkownika`, `login`) VALUES
(4, 'karolina.nowicka'),
(6, 'magdalena.wojcik'),
(7, 'test'),
(5, 'tomasz.wisniewski');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `testy_przeprowadzane`
--
ALTER TABLE `testy_przeprowadzane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testy_stworzone`
--
ALTER TABLE `testy_stworzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `typ_pytania`
--
ALTER TABLE `typ_pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
