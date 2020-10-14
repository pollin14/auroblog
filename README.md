A blog example to Auronix

## Requirements

* npm
* composer (See required extensions in composer.json)

## Install

Copy `.env.example` to `.env` (The default are ok to this example)

Generate the app key

```bash
php artisan key:generate
```

Install dependencies

```bash
composer install && npm install
```

Run migration with test data

```bash
php artisan migrate --seed
```

Build assets

```bash
npm run dev
```

Install dusk

```bash
php artisan dusk:install
```

Run the server

```bash
php artisan serve
```

Now you can see the site in `127.0.0.1:8000`

## Testing and quality

Run all the tests (except Dusk)

```bash
composer tests
```

Run Dusk tests

```bash
php artisan dusk
```

You can see the screenshots in `tests/Browser/screenshots`.
