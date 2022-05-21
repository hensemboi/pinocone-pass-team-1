## Configuration
To run this project, you will need to have [PHP](https://www.php.net/downloads), [Composer](https://getcomposer.org/download/) and [Node.js](https://nodejs.org/en/download/) installed in your system. composer and npm will be required to install the dependencies. First, run these commands:

composer install
--OR--
composer install --ignore-platform-reqs

npm install && run dev
--OR--
npm install
npm run dev

Next, rename the .env.example to .env and make sure that there is a database named 'laravel' on your side. Then run these commands:

After renaming the .env file, make sure to ahve this configuration inside it:

DB_CONNECTION=mysql
DB_HOST=remotemysql.com
DB_PORT=3306
DB_DATABASE=EtuOvYCjIe
DB_USERNAME=EtuOvYCjIe
DB_PASSWORD=kdFZp1DC5a

This was to make sure you are able to use the remote databse.

--OR--

If you are going to use local one, in your cli use this command:
run php artisan migrate --seed

After the database setup is done, run this:

php artisan key:generate
php artisan serve

Laravel will use PDO_mysql so make sure you have that extension enabled. If not, you may enable it by going to your php.ini and uncomment it.