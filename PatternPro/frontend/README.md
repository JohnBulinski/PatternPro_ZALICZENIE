# PatternPro - Dokumentacja Frontendu

Ten katalog zawiera pliki składające się na interfejs użytkownika aplikacji PatternPro - interaktywnej platformy prezentującej formacje cenowe używane w analizie technicznej.


## Technologie

- HTML5
- CSS3
- JavaScript
- PHP

## Główne pliki

- index.php
- more-patterns.php
- kontakt.php
- regulamin.php
- styles.css
- script.js

## Modyfikacja strony

### Dodawanie nowych formacji

Formacje są pobierane dynamicznie z bazy danych. Aby dodać nową formację:
1. Dodaj obrazek formacji do katalogu `images/`
2. Dodaj rekord do tabeli `patterns` w bazie danych:
   - Nazwa formacji
   - Typ (bullish lub bearish)
   - Opis
   - Ścieżka do obrazu

### Modyfikacja stylów

Wszystkie style znajdują się w pliku `styles.css`.

### Rozbudowa funkcjonalności JavaScript

JavaScript znajduje się w pliku `script.js`. Zachowaj spójność stylu kodowania przy dodawaniu nowych funkcji.



