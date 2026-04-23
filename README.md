# Book Library (Laravel)

A book library web application built with [Laravel](https://laravel.com/) (PHP 8.3+).

## Requirements

- PHP `^8.3` with required extensions (see the [Laravel server requirements](https://laravel.com/docs/deployment#server-requirements))
- [Composer](https://getcomposer.org/)
- A supported database (MySQL, MariaDB, PostgreSQL, or SQLite) if you use database features

## Setup

1. Install PHP dependencies:
   ```bash
   composer install
   ```
2. Environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure `DB_*` and `APP_URL` in `.env` for your environment.
4. Run migrations (after the database is created and configured):
   ```bash
   php artisan migrate
   ```
5. **Production:** build front-end assets if you add a Vite/JS stack:
   ```bash
   npm install && npm run build
   ```
   Point the web server’s document root to the `public/` directory.

## Development

- Local development server: `php artisan serve`
- Code style: `vendor/bin/pint` (Laravel Pint is included as a dev dependency)
- Tests: `php artisan test` or `vendor/bin/phpunit`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). Application-specific code follows the same license unless stated otherwise in this repository.
