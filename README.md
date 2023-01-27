## About Launch/Run

- clone this on your local
- run `composer install` : this will install the dependecies for your project
- make .env file from .env.example
- run `php artisan key:generate` : this will generate app key in your .env file
- add DB credential, username, database name, password if any
- run `php artisan migrate` : this will create db
- run `php artisan db:seed` : this will create a default user with admin role
- run `php artisan serve` : to run the project
