# TITLE [TBD]

## Setup and run project for first time

```
git checkout [TBD]
cd laravel-rest-docer
docker run --rm -v $(pwd)/rest-app:/app composer install
docker-compose up
```

## Run Database Migrations
```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan passport:install --force
docker-compose exec app php artisan db:seed
```


// https://documenter.getpostman.com/view/762427/maverick/7TGjEcp#intro
// https://www.getpostman.com/collections/3da2db8a25d1885dae24
