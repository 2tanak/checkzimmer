## Checkzimmer web app

A codebase for check-zimmer.de project

## Front-end specifics

The project uses Vue on dashboard and on public pages.

Dashboard is completely built on Vue

Public pages are hybrids, partially built with blade templates and partially with Vue

Dashboard uses [StarAdmin template](https://www.bootstrapdash.com/product/star-admin-vue/) as a view framework

## Multi domain set up

The app is a multi domain project with a single codebase. One base domain is a main domain. And other domains are subdomains of the base one.

For example:
- `check-zimmer.de` (main domain)
- `leipzig.check-zimmer.de` (city-related subdomain)
- etc

The base domain is specified in `.env` file, `APP_URL` constant

Subdomains are set up via the dashboard. So there will be no subdomains for a fresh launch. And currently they require configuration from web server app.

So, in order to properly run the project, web server should be configured to work with several domain names pointing to single drectory.

####NB: In order to run, subdomain should be created and be active on the dashboard side and enabled in web server config

## Deploy

1. `composer install`
2. `php artisan migrate --seed`
3. `php artisan jwt:secret` (optionally)
4. `npm install`
5. `npm run dev` (dev) or `npm rn prod` (prod)

## Start a development session

1. `git pull`
2. `composer install`
3. `php artisan migrate`
4. `npm run watch`

## Deploy with docker

1. `docker-compose up --build`
2. `docker-compose exec app composer install`
3. other commands as in preceding sections with `docker-compose exec app` prefix

The project is configured to run at [http://localhost:8000](http://localhost:8000) with an automatic subdomain support (no server-side setup required)

## ENV constants

- `JWT_SECRET` - secret key for authentication
- `GOOGLE_MAPS_API` - API key for Google maps
- `GOOGLE_MAPS_GEOCODING_API_KEY` - API key for Google geocoder
- `GOOGLE_RECAPTHCA3` - Google reCAPTCHA3 key
- `GOOGLE_RECAPTHCA3_SECRET` - Google reCAPTCHA3 secret key
- `MAIL_NOTIFICATION_ADDRESS` - Recipient e-mail for notifications
