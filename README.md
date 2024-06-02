link do backloga:
https://github.com/users/MikolaJanczaq/projects/1

# Noodle

## Opis

Noodle to aplikacja webowa stworzona do tworzenia oraz przeprowadzania testów.

## Wymagania systemowe

Aby uruchomić Noodle, komputer musi spełniać następujące wymagania systemowe:

### XAMPP
- System operacyjny: Windows 2008, 2012, Vista, 7, 8 (ważne: XP ani 2003 nie są wspierane)
- [Minimalne wymagania dla XAMPP](https://www.apachefriends.org/index.html)

### Przeglądarka internetowa (np. Google Chrome)
- System operacyjny: Windows 10 lub nowszy albo Windows Server 2016 lub nowszy
- Procesor: Intel Pentium 4 lub nowszy, obsługujący SSE3
- [Minimalne wymagania dla Google Chrome](https://support.google.com/chrome/a/answer/7100626?hl=pl)

## Instrukcja obsługi

Aby uruchomić projekt Noodle na swoim komputerze, postępuj zgodnie z poniższymi krokami:

### Krok 1: Pobierz i zainstaluj XAMPP
1. Pobierz XAMPP ze strony [Apache Friends](https://www.apachefriends.org/index.html).
2. Zainstaluj XAMPP na swoim komputerze, postępując zgodnie z instrukcjami instalatora.

### Krok 2: Uruchom XAMPP i wystartuj Apache oraz MySQL
1. Otwórz XAMPP Control Panel.
2. Kliknij "Start" przy Apache oraz MySQL.

### Krok 3: Skonfiguruj bazę danych
1. W XAMPP Control Panel, kliknij "Admin" przy MySQL, aby otworzyć phpMyAdmin.
2. W phpMyAdmin utwórz nową bazę danych o nazwie `baza`.
3. Zaimportuj wybraną bazę danych z pliku projektowego z katalogu `Baza`:
    - Jeśli chcesz użyć pustej bazy danych, wybierz plik `czysta_baza.sql`. <-- W tym przypadku należy pamiętać o wprowadzeniu rekordów w odpowiednich tablicach do bazy danych przed rozpoczęciem pracy aplikacji
    - Jeśli chcesz użyć bazy danych z przykładowymi rekordami, wybierz plik `testowa_baza.sql`.

### Krok 4: Skopiuj pliki projektu
1. Skopiuj folder `Strona` z paczki projektu.
2. Wklej folder `Strona` do folderu `htdocs` w katalogu instalacyjnym XAMPP (zazwyczaj `C:\xampp\htdocs`).

### Krok 5: Uruchom aplikację w przeglądarce
1. Otwórz przeglądarkę internetową (np. Google Chrome).
2. W pasku adresu wpisz `http://localhost/Strona` i naciśnij Enter.

Aplikacja powinna się uruchomić, umożliwiając korzystanie z funkcji Noodle.

---
