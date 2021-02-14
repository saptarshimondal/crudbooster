# Installation
## System Requirements
These bellow are CRUDBooster system requirements 

* PHP version 7.2 or above
* Laravel 5.7 or above (Laravel 8 Supported)
* Composer
* OPCache PHP Extension (Very Recommended!)
* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Mod Rewrite Enable for Apache

## Composer
If you don't have a composer, please install it first. [Click here to see the tutorial](https://getcomposer.org/download/)

## Laravel
Laravel version must meet the requirement version. You need to install laravel first. [Click here to see the tutorial](https://laravel.com/docs/8.x/installation)
```bash
composer create-project laravel/laravel crudbooster
```

## CRUDBooster
Point the directory at laravel root directory, and run the bellow command: 
```bash
composer require saptarshimondal/crudbooster=dev-master
```

Create a new empty Database, and setting the .env file like bellow 
```config
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

After installation has been finish, CRUDBooster needs to extract the asset, run the bellow command and follow the instruction: 
```bash
php artisan crudbooster:install
```