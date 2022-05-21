## Configuration
To run this project, you will need to have [PHP](https://www.php.net/downloads), [Composer](https://getcomposer.org/download/) and [Node.js](https://nodejs.org/en/download/) installed in your system. composer and npm will be required to install the dependencies. First, run these commands:

composer install
--OR--
composer install --ignore-platform-reqs

npm install

Next, rename the .env.example to .env and make sure that there is a database named 'laravel' on your side. Then run these commands:

php artisan key:generate
php artisan serve

Laravel will use PDO_mysql so make sure you have that extension enabled. If not, you may enable it by going to your php.ini and uncomment it.