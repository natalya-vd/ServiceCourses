# ServiceCourses backend

## Установка

-   Склонировать репозиторий `git@github.com:natalya-vd/ServiceCourses.git`
-   В корне проекта создать файл `.env` (согласно примеру `.env.example`). Заполнить своими данными.

### Установка через docker:

-   Установить папку vendor (`https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects`)
    ```shell
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    ```
-   Поднять докер
    ```shell
    ./vendor/bin/sail up -d
    ```
-   Сгенерировать APP_KEY:

    ```shell
    ./vendor/bin/sail artisan key:generate
    ```

-   Создать символическую ссылку
    ```shell
    ./vendor/bin/sail artisan storage:link
    ```

### Команды при работе через docker:

-   Поднять докер
    ```shell
    ./vendor/bin/sail up -d
    ```
-   Остановить докер
    ```shell
    ./vendor/bin/sail down
    ```
-   Сбросить БД и запустить сидеры:
    ```shell
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```
-   Запустить миграции БД
    ```shell
    ./vendor/bin/sail artisan migrate
    ```
