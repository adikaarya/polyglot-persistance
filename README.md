# Polyglot Persistance
## Architecture

![arsitektur](https://github.com/adikaarya/polyglot-persistance/blob/main/assets/arsitektur.png)

## Prerequisites

-   PHP 8.x
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/en/)

## Installation

1. Clone this repository

    git clone `https://github.com/adikaarya/polyglot-persistance`

2. Install the dependencies

    `cd polyglot-persistance`
    
    `npm install`
    
    `composer install`

3. Setup the environment variables

    `cp .env.example .env`

    Edit the `.env` file to set this value
    
    `DB_CONNECTION` -> `mysql`
    
    `DB_HOST` -> ip of mysql database
    
    `DB_PORT` -> port of mysql database. default is `3306`
    
    `DB_DATABASE` -> database name
    
    `DB_USERNAME` -> database user name
    
    `DB_PASSWORD` -> database password
    
    add a new value to the `.env`
    `API_URL` to `https://tbdmovie.vercel.app/`
4. run migration
    `php artisan migrate:fresh --seed`
    
5. Start the development server. you need 2 terminals for this

    The first terminal run:
    `php artisan serve`
    
    The second terminal run:
    `npm run dev`
6. Open the link from `php artisan serve` command
7. You are up & running!
