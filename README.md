# Election Core

2015 Election API Website, User panel and Authentication.

## Requirements

- PHP >=5.5.9 (http://php.net/)
- OpenSSL PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- MongoDB PHP Extension
- MongoDB
- Composer (https://getcomposer.org/)
- NodeJS (https://nodejs.org/)
- NPM (https://www.npmjs.com/)
- Gulp (http://gulpjs.com/)

## Installation

```
$ git clone git@github.com:MyanmarAPI/election-website.git
$ cd election-website

// For PHP Dependencies
$ composer install 
// For Node JS Dependencies
$ npm install

// Run gulp for assets published
$ gulp

// currently: customize .env file
cp .env.example .env
nano .env

$ php artisan app:install
$ php artisan key:generate
```

## Run Seed User Data

```
php artisan db:seed
```
