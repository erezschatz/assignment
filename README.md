## Before installation

This project assumes you have php and mysql running and configured.
You will need to create a MySql database and a user with full access and privileges on that database.

## How to run application

Once you pulled the repository, perform a ```php composer.phar install``` action from within the project's folder.
Change the following values in .env appropriately to those you set in the previous section:

```DB_CONNECTION=mysql
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD```

Once all is set, run ```php artisan migrate```

if all works without an issue, run ``` php artisan serve ```. The project will run by default on (http://127.0.0.1:8000).

To run all tests do 