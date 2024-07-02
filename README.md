# Symfony Docker

## Aby uruchomić środowisko należy: 
* Zainstaluj dockera, zainstaluj docker-compose *
* git clone to repozytorium *
* Uruchom aplikacje docker-compose up --pull -d *
* Przejdź do adresu localhost *

  ## Tworzenie migracji
* docker ps *
*  docker exec -it nazwa_kontenera(symfony-php_1) bash *
*  bin/console make:migration *
*  Sprawdz czy baza jest aktywna localhost:8080 *
*  System: PostgreSQL, Server: database, Username: postgres, Password: postgres, Database: postgres *
*  Wykonanie migracji bin/console doctrine:migrations:migrate *

  ## Uruchomienie komendy 
*  docker exec -it nazwa_kontenera(symfony-php_1) bash *
*  bin/console app:create-user *
*  Wpisz username -> enter -> wpisz hasło -> enter *


