# Phone Notes
This is a simple **Phone Note** manager.

## Framework
<p><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

- Version: `5.8.*`

## Installation

To start this application, you need to do following steps:

- Run these commands from the **root of the project**:
```
docker-compose up -d
composer install
touch .env
```

- Run `php artisan vendor:publish` and Select `0` from the list

- Edit `.env` file with these variables: 
```
APP_NAME="Phone Notes"
APP_ENV=local
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=phone_notes
DB_USERNAME=homestead
DB_PASSWORD=secret
```

- Then Run

```
php artisan key:generate
php artisan migrate --seed
```

- Then open http://localhost/ in you browser.

## Tests

To run project's tests run the following command:

- Run this command in the root of the project to run all unit and functional tests:
```
phpunit
```

## Test Coverage

- Run the following command to generate test coverage:

```
docker exec -w "/var/www/" app vendor/bin/phpunit --coverage-html /var/www/public/test-coverage
```

- Go to http://localhost/test-coverage/index.html to see the test coverage.
