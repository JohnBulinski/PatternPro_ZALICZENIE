# PatternPro - Dokumentacja Backendu

Ten katalog zawiera pliki backendu aplikacji PatternPro, odpowiedzialne za łączność z bazą danych, przetwarzanie danych i obsługę formularzy.

## Struktura katalogów


## Technologie

- PHP 7.4+
- MySQL
- SQL

## Główne pliki i ich funkcje

- config/db.php
- process/contact.php
- setup/setup.php

## Modyfikacja backendu


### Dodawanie nowych formacji

1. Dodaj obraz formacji do katalogu `frontend/images/`
2. Dodaj rekord do tabeli `patterns` przez phpMyAdmin lub SQL:


### Rozszerzenie funkcjonalności

Aby dodać nowe funkcje do backendu:

1. Utwórz nowy plik PHP w odpowiednim podkatalogu
2. Dołącz plik konfiguracyjny bazy danych:



