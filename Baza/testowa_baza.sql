-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Cze 2024, 19:03
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupy`
--

CREATE TABLE `grupy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `grupy`
--

INSERT INTO `grupy` (`id`, `nazwa`) VALUES
(3, 'grupa1'),
(5, 'grupa2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupy_przypisania`
--

CREATE TABLE `grupy_przypisania` (
  `id_grupy` int(11) DEFAULT NULL,
  `id_osoby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `grupy_przypisania`
--

INSERT INTO `grupy_przypisania` (`id_grupy`, `id_osoby`) VALUES
(3, 2),
(3, 4),
(5, 2),
(5, 6),
(3, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id`, `nazwa`) VALUES
(28, 'Algebra'),
(31, 'Botanika'),
(36, 'Chleb'),
(37, 'Gramatyka'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategoria_przedmiot`
--

INSERT INTO `kategoria_przedmiot` (`id_kategorii`, `id_przedmiotu`) VALUES
(28, 26),
(29, 27),
(30, 28),
(31, 29),
(32, 30),
(36, 33),
(37, 34);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `id` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL,
  `tresc` varchar(250) NOT NULL,
  `poprawnosc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`id`, `id_pytania`, `tresc`, `poprawnosc`) VALUES
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
(258, 120, 'Podstawowe typy zmiennych w Javie to string, array, list.', 0),
(265, 124, 'Oktawian August', 0),
(266, 124, 'Max Weber', 0),
(267, 124, 'Adam Mickiewicz', 0),
(268, 124, 'Mikołaj Kopernik', 1),
(269, 125, '1835 roku', 0),
(270, 125, '1892 roku', 0),
(271, 125, '1912 roku', 1),
(272, 125, '1948 roku', 0),
(273, 126, '39,9 kg chleba', 0),
(274, 126, '45,3 kg kg chleba', 1),
(275, 126, '89,5 kg chleba', 0),
(276, 126, '110,2 kg chleba', 0),
(277, 127, '50–100 °C', 0),
(278, 127, '100–150 °C', 0),
(279, 127, '200–250 °C', 1),
(280, 127, '250–300 °C', 0),
(281, 128, 'warka', 0),
(282, 128, 'paja', 0),
(283, 128, 'skibka', 1),
(284, 128, 'pajola', 0),
(285, 129, 'w Jaworze', 1),
(286, 129, 'w Grójcu', 0),
(287, 129, 'w Gdańsku', 0),
(288, 129, 'w Elblągu', 0),
(289, 130, '50 piekarni', 0),
(290, 130, '100 piekarni', 0),
(291, 130, '150 piekarni', 0),
(292, 130, '300 piekarni', 0),
(302, 134, 'Yoda', 0),
(303, 134, 'z niego', 1),
(304, 135, 'P= 1/2*d*d', 1),
(305, 135, 'P= a*b+h', 0),
(306, 135, 'P= a*a*a', 0),
(307, 136, 'Zwykłym', 0),
(308, 136, 'Dziesiętnym', 1),
(309, 137, 'Kto, jak, ile?', 0),
(310, 137, 'Jaki, jaka, jakie?', 0),
(311, 137, 'Który, ile?', 1),
(312, 138, 'Przyimki, przysłówki, spójniki', 0),
(313, 138, 'Czasowniki, przysłówki', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi_podane`
--

CREATE TABLE `odpowiedzi_podane` (
  `id_testu` int(11) NOT NULL,
  `id_osoby` int(11) DEFAULT NULL,
  `kod_osoby` varchar(255) DEFAULT NULL,
  `id_odpowiedz` int(11) DEFAULT NULL,
  `tresc_odpowiedzi` varchar(500) DEFAULT NULL,
  `id_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `poziom`
--

CREATE TABLE `poziom` (
  `id` int(11) NOT NULL,
  `trudnosc_nazwa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `poziom`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id`, `nazwa`) VALUES
(35, '0'),
(29, 'Biologia'),
(28, 'Chemia'),
(27, 'Fizyka'),
(30, 'Informatyka'),
(34, 'Język Polski'),
(26, 'Matematyka'),
(33, 'Piekarstwo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przypisania`
--

CREATE TABLE `przypisania` (
  `id_testu` int(11) NOT NULL,
  `id_osoby` int(11) DEFAULT NULL,
  `id_grupy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przypisania`
--

INSERT INTO `przypisania` (`id_testu`, `id_osoby`, `id_grupy`) VALUES
(14, NULL, 3),
(15, NULL, 3),
(15, NULL, 5),
(16, NULL, 3),
(16, 8, NULL),
(17, NULL, 3),
(17, 6, NULL),
(19, NULL, 3),
(19, 6, NULL),
(20, NULL, 3),
(20, 6, NULL),
(20, 8, NULL),
(21, NULL, 5),
(22, NULL, 5),
(22, 8, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id`, `tresc`, `przedmiot_id`, `kategoria_id`, `poziom_id`, `zdjecie`, `autor`, `prywatnosc`, `typ_pytania`) VALUES
(115, 'Co to jest programowanie obiektowe?', 30, 32, 3, NULL, 2, 0, 2),
(116, 'Rozwiąż równanie kwadratowe x^2 - 4x + 4 = 0.', 26, 28, 2, NULL, 1, 0, 4),
(117, 'Wyjaśnij zasadę zachowania pędu.', 27, 29, 3, NULL, 2, 0, 2),
(118, 'Podaj właściwości kwasów organicznych.', 28, 30, 2, NULL, 3, 0, 4),
(119, 'Wymień funkcje liści w roślinach.', 29, 31, 1, NULL, 2, 0, 2),
(120, 'Jakie są podstawowe typy zmiennych w Javie?', 30, 32, 1, NULL, 1, 0, 4),
(124, 'Kto stworzył dzieło pt. \"Obrachunek wypieku chleba\"?', 33, 36, 1, NULL, 9, 1, 4),
(125, 'Maszynę do krojenia chleba wynaleziono już w:', 33, 36, 1, NULL, 9, 1, 4),
(126, 'W 2015 r. przeciętny Polak zjadł ok.:', 33, 36, 1, NULL, 9, 1, 4),
(127, 'Chleb wypieka się w piecu piekarskim w temperaturze:', 33, 36, 1, NULL, 9, 1, 4),
(128, 'W Poznaniu na kawałek chleba mówi się:', 33, 36, 1, NULL, 9, 1, 4),
(129, 'W jakim mieście organizuje się coroczne Międzynarodowe Targi Chleba?', 33, 36, 1, NULL, 9, 1, 4),
(130, 'Za czasów Oktawiana Augusta w starożytnym Rzymie istniało:', 33, 36, 1, NULL, 9, 1, 4),
(134, 'zdjecie', 28, 30, 1, NULL, 9, 1, 4),
(135, 'Jak obliczamy pole rombu?', 26, 28, 1, NULL, 9, 1, 4),
(136, 'Ułamek 28,3128 jest ułamkiem:', 26, 28, 1, NULL, 9, 1, 4),
(137, 'Na jakie pytania odpowiada liczebnik?', 34, 37, 1, NULL, 9, 1, 4),
(138, 'Nieodmienne części mowy to:', 34, 37, 1, NULL, 9, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_przeprowadzane`
--

CREATE TABLE `testy_przeprowadzane` (
  `id` int(11) NOT NULL,
  `id_testu` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `od` datetime DEFAULT NULL,
  `do` datetime DEFAULT NULL,
  `kod_testu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `testy_przeprowadzane`
--

INSERT INTO `testy_przeprowadzane` (`id`, `id_testu`, `autor`, `od`, `do`, `kod_testu`) VALUES
(6, 16, 9, '2024-06-10 04:20:00', '2024-06-24 17:44:00', 'Aktywujemy16'),
(8, 16, 9, '2024-06-20 17:50:00', '2024-07-17 20:50:00', 'Aktywujemy8'),
(9, 17, 9, '2024-06-09 06:27:00', '2024-06-18 19:27:00', 'Wiedzaochl9'),
(10, 18, 9, '2024-06-09 18:33:00', '2024-06-12 21:33:00', 'Liderekpie10'),
(11, 15, 9, '2024-05-14 05:39:00', '2024-05-28 18:39:00', 'Testujemyt11'),
(12, 19, 9, '2024-06-08 03:52:00', '2024-07-03 18:52:00', 'Szstoklasi12'),
(13, 17, 7, '2024-06-13 16:09:00', '2024-06-26 21:09:00', 'Wiedzaochl13'),
(14, 17, 7, '2024-06-13 20:01:00', '2024-06-22 21:01:00', 'Wiedzaochl14'),
(15, 19, 7, '2024-06-13 20:18:00', '2024-06-19 22:18:00', 'Szstoklasi15'),
(16, 19, 7, '2024-06-13 21:17:00', '2024-06-26 22:17:00', 'Szstoklasi16'),
(22, 17, 7, '2024-06-13 20:45:00', '2024-07-01 22:45:00', 'Wiedzaochl22');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy_pytania`
--

CREATE TABLE `testy_pytania` (
  `id_testu` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `testy_pytania`
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
(15, 111),
(16, 117),
(16, 118),
(16, 119),
(16, 120),
(17, 124),
(17, 125),
(17, 126),
(17, 127),
(17, 128),
(17, 129),
(17, 130),
(18, 131),
(19, 135),
(19, 136),
(19, 137),
(19, 138),
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
(15, 111),
(16, 117),
(16, 118),
(16, 119),
(16, 120),
(17, 124),
(17, 125),
(17, 126),
(17, 127),
(17, 128),
(17, 129),
(17, 130),
(18, 131),
(19, 135),
(19, 136),
(19, 137),
(19, 138),
(20, 117),
(20, 138),
(21, 119),
(22, 118),
(23, 124),
(24, 120);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `testy_stworzone`
--

INSERT INTO `testy_stworzone` (`id`, `autor`, `przedmiot`, `prywatnosc`, `tytuł`, `data_stworzenia`) VALUES
(17, 9, 33, 0, 'Wiedza o chlebie', '2024-06-09'),
(19, 9, 26, 1, 'Szóstoklasisty sprawdzian', '2024-06-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ_pytania`
--

CREATE TABLE `typ_pytania` (
  `id` int(11) NOT NULL,
  `nazwa_typu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `typ_pytania`
--

INSERT INTO `typ_pytania` (`id`, `nazwa_typu`) VALUES
(2, 'Otwarte'),
(6, 'Wielokrotnego'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `typ_konta`) VALUES
(1, 'Jan', 'Kowalski', 1),
(2, 'Anna', 'Nowak', 0),
(3, 'Piotr', 'Zieliński', 1),
(4, 'Karolina', 'Nowicka', 0),
(5, 'Tomasz', 'Wiśniewski', 1),
(6, 'Magdalena', 'Wójcik', 0),
(7, 'test', 'test', 1),
(8, 'uczen', 'testowy', 0),
(9, 'nauczyciel', 'testowy', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_hasla`
--

CREATE TABLE `uzytkownicy_hasla` (
  `id_uzytkownika` int(11) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy_hasla`
--

INSERT INTO `uzytkownicy_hasla` (`id_uzytkownika`, `haslo`) VALUES
(2, 'anowak'),
(4, 'knowicka'),
(5, 'twisniewski'),
(6, 'mwojcik'),
(7, 'test'),
(8, 'test'),
(9, 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_loginy`
--

CREATE TABLE `uzytkownicy_loginy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy_loginy`
--

INSERT INTO `uzytkownicy_loginy` (`id_uzytkownika`, `login`) VALUES
(2, 'anna.nowak'),
(4, 'karolina.nowicka'),
(6, 'magdalena.wojcik'),
(9, 'nauczyciel'),
(7, 'test'),
(5, 'tomasz.wisniewski'),
(8, 'uczen');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kod_testu` (`kod_testu`);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `grupy`
--
ALTER TABLE `grupy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT dla tabeli `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT dla tabeli `testy_przeprowadzane`
--
ALTER TABLE `testy_przeprowadzane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `testy_stworzone`
--
ALTER TABLE `testy_stworzone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `typ_pytania`
--
ALTER TABLE `typ_pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kategoria_przedmiot`
--
ALTER TABLE `kategoria_przedmiot`
  ADD CONSTRAINT `kategoria_przedmiot_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoria_przedmiot_ibfk_2` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD CONSTRAINT `odpowiedzi_ibfk_1` FOREIGN KEY (`id_pytania`) REFERENCES `pytania` (`id`);

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_1` FOREIGN KEY (`przedmiot_id`) REFERENCES `przedmioty` (`id`),
  ADD CONSTRAINT `pytania_ibfk_2` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `pytania_ibfk_3` FOREIGN KEY (`poziom_id`) REFERENCES `poziom` (`id`),
  ADD CONSTRAINT `pytania_ibfk_4` FOREIGN KEY (`autor`) REFERENCES `uzytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `uzytkownicy_hasla`
--
ALTER TABLE `uzytkownicy_hasla`
  ADD CONSTRAINT `uzytkownicy_hasla_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `uzytkownicy_loginy`
--
ALTER TABLE `uzytkownicy_loginy`
  ADD CONSTRAINT `uzytkownicy_loginy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
