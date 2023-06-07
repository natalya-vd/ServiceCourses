# ServiceCourses backend

## Установка

-   Склонировать репозиторий `git@github.com:natalya-vd/ServiceCourses.git`
-   В корне проекта создать файл `.env` (согласно примеру `.env.example`). Заполнить своими данными.

### Установка через docker:

-   Поднять докер `docker-compose up -d`
-   Установить папку vendor `docker exec -it service-courses-backend-app composer install`
-   Опустить докер `docker-compose down`
-   Поднять докер `./vendor/bin/sail up -d`
-   Сгенерировать APP_KEY: `./vendor/bin/sail artisan key:generate`
-   Создать символическую ссылку `./vendor/bin/sail artisan storage:link`

### Команды при работе через docker:

-   Поднять докер `./vendor/bin/sail up -d`
-   Остановить докер `./vendor/bin/sail down`
-   Сбросить БД и запустить сидеры: `./vendor/bin/sail artisan migrate:fresh --seed`
-   Запустить миграции БД `./vendor/bin/sail artisan migrate`
