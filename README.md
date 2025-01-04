
# Webyn Test

  ## Installation

Requirement:

 - Node.js
 - PHP 8.2+
 - Composer
 - Symfony CLI
 - A MySQL server

### API


    cd ./api/

    composer install
    
Edit DATABASE_URL in .env

    php bin/console doctrine:database:create

    php bin/console make:migration

    php bin/console doctrine:migrations:migrate

	php bin/console doctrine:fixtures:load

Enable https to allow CORS:

    symfony server:ca:install

Start the dev server

    symfony server:start

#### For testing

Edit DATABASE_URL in .env.test

    php bin/console --env=test doctrine:database:create

    php bin/console --env=test doctrine:schema:create

    php bin/console --env=test doctrine:fixtures:load
  
Run the tests

    php bin/phpunit

### Client

    cd ./client/
    
	npm install -g @angular/cli
	
    npm install

    npm start

http://localhost:4200/