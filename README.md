# G-Tools Laravel Project

This is my first Laravel Project, which provides online tools to users.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About G-Tools

G-Tools is a web application that provides various online tools to users. Built with Laravel, it aims to offer a seamless and user-friendly experience for accessing different utilities online.

## Features

- User authentication (Login and Register)
- A collection of online tools (e.g., calculators, converters, etc.)
- Responsive design
- Easy navigation

## Getting Started

To get started with the G-Tools Laravel project, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/g-tools-laravel.git
    ```
2. Navigate to the project directory:
    ```bash
    cd g-tools-laravel
    ```
3. Install the dependencies:
    ```bash
    composer install
    npm install
    ```
4. Set up the environment file:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
5. Configure your database settings in the `.env` file.
6. Run the migrations:
    ```bash
    php artisan migrate
    ```
7. Serve the application:
    ```bash
    php artisan serve
    ```

## Contributing

Thank you for considering contributing to the G-Tools Laravel project! Please follow the contribution guidelines in the [Laravel documentation](https://laravel.com/docs/contributions).