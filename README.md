# Phone Notes
This is a simple **Phone Note** manager.

## Framework
<p><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

- Version: `5.8.*`

## Installation

To start this application, you need to do following steps:

- Run these commands from the root of the project:
```
docker-compose up -d
composer install
php artisan key:generate
php artisan vendor:publish
```

- Create a `.env` file in the root of the project with these variables: 
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

- Run 

```
php artisan migrate --seed
```

- Then open http://localhost/ in you browser.

## Tests

To run project's tests run the following command:

```
php 
```
