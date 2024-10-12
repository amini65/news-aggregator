# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone https://github.com/amini65/news-aggregator.git

### Install

Install all the dependencies using composer

    composer install

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate


Run the database seeders

    php artisan db:seed

install sail for create containers (mysql and redis)

    php artisan sail:install

Start the containers

    ./vendor/bin/sail up

**Generate articles automatically**

you must create  a cronjob file to execute schedule and needs to install supervisor app for keep running containers

**Generate articles manually**

    php artisan news:aggregate


#### API Specification

This application adheres to the api specifications set by the [Thinkster](https://github.com/gothinkster) team. This helps mix and match any backend with any other frontend without conflicts.

> [Full API Spec](https://github.com/gothinkster/realworld/tree/master/api)

More information regarding the project can be found here https://github.com/gothinkster/realworld

---

#### Code overview

#### Dependencies

- [laravel-sanctum](https://github.com/laravel/sanctum) - For authentication using JSON Web Tokens


---

#### Testing API

Run the laravel development server

     php artisan test --testsuite=NewsAggregator

     php artisan test --testsuite=Api





