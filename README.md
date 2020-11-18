## Setup

This project is using Laravel 8.x in a docker container with PHP 7.4. To setup the project, run the following commands:

- docker-compose build
- docker-compose up
- docker-compose exec app composer install
- docker-compose exec app npm install
- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan migrate

With the above completed, you should be able to browse to http://127.0.0.1 and see the Laravel Welcome page

Once done, you will need to update your .env file to add the key REDSKY_URI

Also note that initially there will be no pricing information available in the local NoSql store. If you would like to
seed the local NoSql store with dummy information for the example product ids that were provided with this case study,
use the following  command:

- docker-compose exec app php artisan db:seed

## Available Routes

- GET /api/products/{product_id} *Returns json resource for the product if available*
- PUT /api/products/{product_id} *Updates pricing information for specified product if available*

## Runing Tests

You can run the tests included in this project with the following command:

- docker-compose exec app php artisan test
