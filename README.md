# A Simple Events And Listener Microservice
An application with 2 microservices that communicate via message bus (Events and Listeners).

## Built With Symfony!
The leading PHP framework to create websites and web applications. Built on top of the Symfony Components.
[official site](https://symfony.com/).

This repository holds a composer-installable app.

## Installation Guide

Install Git on your machine (Skip if already installed)

You can go to [git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) to see guide.

Install PHP on your machine (Skip if already installed)

You can go to this [Article](https://medium.com/@rodolfovmartins/how-to-install-php-on-mac-6795ce469802) to see guide.

Install Composer on your machine

You can go to [Composer](https://getcomposer.org/download/) to see guide.

Clone the Repository to your local Machine

`git clone https://github.com/Soliudeen999/next_basket_assessment_symfony.git` 

Navigate into the folder on your machine

`cd next_basket_assessment_symfony`

Install Vendor Packages

`composer install`

Run Test

`php bin/phpunit`

## Setup

Configure your `.env` and tailor it for your app, specifically the baseURL and any database settings.

Run migration

`php bin/console doctrine:migrations:migrate`

Start the App Server

`symfony server:start`


## Server Requirements

**PHP version 8.2 or higher is required, with the following extensions installed:**

**Composer ^2.6 or latest**
