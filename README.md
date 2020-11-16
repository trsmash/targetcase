## Setup

This project is using Laravel 8.x in a docker container with PHP 7.4. To setup the project, run the following commands:

- docker-compose build
- docker-compose up
- docker-compose exec app composer install
- docker-compose exec app npm install
- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan migrate

With the above completed, you should be able to browse to http://127.0.0.1 and see the Laravel Welcome page

Once done, you will need to update your .env file to add a new key REDSKY_URI

## Available Routes

- GET /api/products/{product_id} *Returns json resource for the product if available*
- PUT /api/products/{product_id} *Updates pricing information for specified product if available*
