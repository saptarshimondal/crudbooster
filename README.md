# :rocket: CRUDBOOSTER - Laravel CRUD Generator
<a href="https://scrutinizer-ci.com/g/crocodic-studio/crudbooster"><img src="https://img.shields.io/scrutinizer/g/crocodic-studio/crudbooster.svg?style=flat-square" alt="Quality Score"></img></a>
[![Latest Stable Version](https://poser.pugx.org/crocodicstudio/crudbooster/v/stable)](https://packagist.org/packages/crocodicstudio/crudbooster)
[![Total Downloads](https://poser.pugx.org/crocodicstudio/crudbooster/downloads)](https://packagist.org/packages/crocodicstudio/crudbooster)
[![License](https://poser.pugx.org/crocodicstudio/crudbooster/license)](https://packagist.org/packages/crocodicstudio/crudbooster)

> Laravel CRUD Generator, Make a Web Application Just In Minutes, Even With Less Code and fewer Steps !

> **Full Documentation** Link - [**Here**](https://saptarshimondal.github.io/crudbooster/#/)

# Installation
## System Requirements
These bellow are CRUDBooster system requirements 

* PHP version 7.3 or above
* Laravel 7 or 8 (Recommended)
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
Laravel version must meet the requirement version (7 or 8). You need to install laravel first. [Click here to see the tutorial](https://laravel.com/docs/8.x/installation)
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
