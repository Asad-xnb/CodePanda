<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


## About CodePanda

CodePanda is a Laravel-based web application that replicates the functionality of FoodPanda, a popular food delivery service. CodePanda allows users to browse restaurants, view menus, place orders, and track deliveries in real-time.

## Features

- User authentication and profile management
- Restaurant management for adding and updating menus
- Order placement and tracking
- Real-time notifications for order status updates
- Payment gateway integration

## Installation

To get started with CodePanda, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/asad-xnb/codepanda.git
    ```
2. Navigate to the project directory:
    ```bash
    cd codepanda
    ```
3. Install the dependencies:
    ```bash
    composer install
    ```
4. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```
5. Generate the application key:
    ```bash
    php artisan key:generate
    ```
6. Run the database migrations:
    ```bash
    php artisan migrate
    ```
7. Seed the database with initial data:
    ```bash
    php artisan db:seed
    ```
8. Start the development server:
    ```bash
    php artisan serve
    ```

## Contributing

Remaining work is in progress. If you would like to contribute, please fork the repository and submit a pull request.

- More settings in Dashboard.
- User profile settings.
- Payment gateway integration.

## License

CodePanda is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).