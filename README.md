# PR: PHPIIP01909 : Assignment from ChainTech Network

## User Account Management Application
This Laravel application is allow users to Registration and manage their account. It includes basic functionalities such as user registration, login, and a user profile page where users can view and edit their account information.

# Features
- User Registration: Users can registration as a new account by providing necessary details.
-  User Login: Existing users can log in securely using their credentials.
-  Account Management: Users have access to a profile page where they can view and edit their account information.

# Technologies Used
- Laravel v10+
- Bootstrap (latest version)

# Getting started

## Installation

Clone the repository

    git clone https://github.com/w3reza/V10.git

Switch to the repo folder

    cd V10

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations 

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Acknowledgments
Laravel Documentation: https://laravel.com/docs
 Bootstrap Documentation: https://getbootstrap.com/docs
