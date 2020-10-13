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

## Testing and quality
