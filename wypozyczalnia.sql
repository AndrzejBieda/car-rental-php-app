-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Cze 2019, 10:28
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klient` int(10) NOT NULL,
  `imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `nr_tel` int(9) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nr_karty` bigint(16) UNSIGNED NOT NULL,
  `data_waz` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `cvv` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klient`, `imie`, `nazwisko`, `nr_tel`, `email`, `haslo`, `nr_karty`, `data_waz`, `cvv`) VALUES
(1, 'Jan', 'Kowalski', 645678756, 'jankowalski@wp.pl', 'qwerty', 9684568045761254, '08/21', 546),
(2, 'Rafał', 'Twardy', 657564567, 'abc@123.pl', 'qwerty', 4564563455645634, '20/12', 123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsce`
--

CREATE TABLE `miejsce` (
  `id_miejsce` int(10) NOT NULL,
  `miasto` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `numer` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `kod` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(9) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `miejsce`
--

INSERT INTO `miejsce` (`id_miejsce`, `miasto`, `ulica`, `numer`, `kod`, `telefon`) VALUES
(1, 'Rzeszów', 'Kopisto', '2A', '36-100', 787787878),
(2, 'Kraków', 'Popiełuszki', '46', '24-243', 435875644),
(3, 'Katowice', 'Kwiatowa', '15C', '43-653', 654654765);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownik` int(10) NOT NULL,
  `imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nr_tel` int(9) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownik`, `imie`, `nazwisko`, `email`, `haslo`, `nr_tel`) VALUES
(1, 'Krzysztof', 'Panek', '123@abc.pl', 'qwerty', 987987876),
(2, 'Władysław', 'Buk', '321@cba.pl', 'qwerty', 355465745);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id_rezerwacja` int(10) NOT NULL,
  `id_klient` int(10) NOT NULL,
  `id_samochod` int(10) NOT NULL,
  `id_miejsce_odb` int(10) NOT NULL,
  `id_miejsce_zwr` int(10) NOT NULL,
  `data_odb` date NOT NULL,
  `data_zwr` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_rezerwacja`, `id_klient`, `id_samochod`, `id_miejsce_odb`, `id_miejsce_zwr`, `data_odb`, `data_zwr`) VALUES
(4, 1, 2, 1, 1, '2019-06-04', '2019-06-04'),
(5, 1, 4, 1, 1, '2019-06-04', '2019-06-04'),
(8, 1, 6, 1, 1, '2019-06-04', '2019-06-06'),
(9, 1, 7, 1, 3, '2019-06-04', '2019-06-06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `id_samochod` int(10) NOT NULL,
  `marka` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `data_prod` date NOT NULL,
  `kolor` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `poj_silnika` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `przebieg` int(7) UNSIGNED NOT NULL,
  `nr_rej` varchar(7) COLLATE utf8_polish_ci NOT NULL,
  `miejsca` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `pakownosc` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `drzwi` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `skrzynia` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `klima` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `paliwo` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `cena` int(4) UNSIGNED NOT NULL,
  `kaucja` int(4) UNSIGNED NOT NULL,
  `zdjecie` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`id_samochod`, `marka`, `model`, `data_prod`, `kolor`, `poj_silnika`, `przebieg`, `nr_rej`, `miejsca`, `pakownosc`, `drzwi`, `skrzynia`, `klima`, `paliwo`, `cena`, `kaucja`, `zdjecie`) VALUES
(1, 'Fiat', '500', '2019-01-01', 'Biały', '1.5', 1000, 'RZ-1000', '4 Miejsca', '1 Torba', '2 Drzwi', 'Manualna skrzynia biegów', 'Klimatyzacja', 'Benzyna', 100, 400, '1'),
(2, 'Toyota', 'Yaris', '2019-01-01', 'Biały', '1.5', 4353, 'RZ-1001', '5 Miejsc', '2 Torby', '4 Drzwi', 'Manualna skrzynia biegów', 'Klimatyzacja', 'Benzyna', 120, 450, '2'),
(3, 'Volkswagen', 'Golf', '2019-01-01', 'Biały', '1.5', 42134, 'RZ-1002', '5 Miejsc', '2 Torby', '4 Drzwi', 'Manualna skrzynia biegów', 'Klimatyzacja', 'Benzyna', 130, 500, '3'),
(4, 'Seat', 'Leon', '2019-01-01', 'Biały', '1.5', 4234, 'RZ-1003', '5 Miejsc', '2 Torby', '4 Drzwi', 'Automatyczna skrzynia biegów', 'Klimatyzacja', 'Diesel', 140, 600, '4'),
(5, 'Mercedes-Benz', 'A-Class', '2019-01-01', 'Biały', '1.5', 43534, 'RZ-1004', '5 Miejsc', '2 Torby', '4 Drzwi', 'Automatyczna skrzynia biegów', 'Klimatyzacja', 'Benzyna', 150, 700, '5'),
(6, 'Opel', 'Insignia', '2019-01-01', 'Biały', '1.5', 13245, 'RZ-1005', '5 Miejsc', '3 Torby', '4 Drzwi', 'Manualna skrzynia biegów', 'Klimatyzacja', 'Benzyna', 160, 800, '6'),
(7, 'Volkswagen', 'Passat', '2019-01-01', 'Biały', '1.5', 53576, 'RZ-1006', '5 Miejsc', '3 Torby', '4 Drzwi', 'Automatyczna skrzynia biegów', 'Klimatyzacja', 'Diesel', 150, 800, '7'),
(8, 'Toyota', 'Avensis', '2019-01-01', 'Biały', '1.5', 2134, 'RZ-1007', '5 Miejsc', '3 Torby', '4 Drzwi', 'Manualna skrzynia biegów', 'Klimatyzacja', 'Diesel', 160, 800, '8'),
(9, 'Renault', 'Traffic', '2019-01-01', 'Biały', '1.5', 34245, 'RZ-1008', '9 Miejsc', '4 Torby', '3 Drzwi', 'Automatyczna skrzynia biegów', 'Klimatyzacja', 'Benzyna', 190, 900, '9');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klient`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  ADD PRIMARY KEY (`id_miejsce`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownik`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id_rezerwacja`),
  ADD KEY `id_klient` (`id_klient`),
  ADD KEY `id_samochod` (`id_samochod`),
  ADD KEY `id_miejsce_odb` (`id_miejsce_odb`),
  ADD KEY `id_miejsce_zwr` (`id_miejsce_zwr`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`id_samochod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  MODIFY `id_miejsce` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id_rezerwacja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `samochody`
--
ALTER TABLE `samochody`
  MODIFY `id_samochod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD CONSTRAINT `rezerwacje_ibfk_1` FOREIGN KEY (`id_klient`) REFERENCES `klienci` (`id_klient`),
  ADD CONSTRAINT `rezerwacje_ibfk_2` FOREIGN KEY (`id_miejsce_odb`) REFERENCES `miejsce` (`id_miejsce`),
  ADD CONSTRAINT `rezerwacje_ibfk_3` FOREIGN KEY (`id_miejsce_zwr`) REFERENCES `miejsce` (`id_miejsce`),
  ADD CONSTRAINT `rezerwacje_ibfk_4` FOREIGN KEY (`id_samochod`) REFERENCES `samochody` (`id_samochod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
