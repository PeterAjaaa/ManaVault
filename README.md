# ManaVault

ManaVault is a web-based Magic: The Gathering collection manager. Made for STMIK LIKMI PBWL Course 2024. Peter - 2022130038

MANAVAULT IS STILL IN DEVELOPMENT. RUN AT YOUR OWN RISK. NOT FOR PRODUCTION.

## How To Install

Do a clone of this project.

`git clone https://github.com/PeterAjaaa/ManaVault`

Run these commands:

```bash
composer install
cp .env.example .env
npm install
npm run build
php artisan key:generate
php artisan serve
```

And ManaVault is served at 127.0.0.1:8000
