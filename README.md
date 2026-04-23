# Book Library (Laravel)

A book library web application built with [Laravel](https://laravel.com/) (PHP 8.3+).

## Requirements

- PHP `^8.3` with required extensions (see the [Laravel server requirements](https://laravel.com/docs/deployment#server-requirements))
- [Composer](https://getcomposer.org/)
- A supported database MySQL

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
5. **Optional — seed demo data:** `DatabaseSeeder` creates a test user (`test@example.com`) and calls `BookSeeder`, which inserts 25 sample books via the factory:
   ```bash
   php artisan db:seed
   ```
   To run only the book seeder:
   ```bash
   php artisan db:seed --class=BookSeeder
   ```
6. **Production:** build front-end assets if you add a Vite/JS stack:
   ```bash
   npm install && npm run build
   ```
   Point the web server’s document root to the `public/` directory.

## API documentation (Swagger UI)

- UI path: `/docs/swagger` (full URL: `{APP_URL}/docs/swagger`, e.g. `http://127.0.0.1:8000/docs/swagger` with `php artisan serve`).
- Generate or refresh the OpenAPI JSON before opening the UI (after annotation changes):
  ```bash
  php artisan l5-swagger:generate
  ```

## Development

- Local development server: `php artisan serve`
- Code style: `vendor/bin/pint` (Laravel Pint is included as a dev dependency)
- Tests: `php artisan test` or `vendor/bin/phpunit`
