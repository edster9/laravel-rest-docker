# [laravel-rest-docker](https://documenter.getpostman.com/view/762427/maverick/7TGjEcp#intro) &middot; [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)]

## Introduction

## Instalation

### Repo Install
```
git clone https://github.com/edster9/laravel-rest-docker.git
cd laravel-rest-docker
```

### Docker Setup
```
docker run --rm -v $(pwd)/rest-app:/app composer install
docker-compose up
```

### Database Migrations
```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan passport:install --force
docker-compose exec app php artisan db:seed
```

## Usage
https://documenter.getpostman.com/view/762427/maverick/7TGjEcp#intro

## Postman
https://www.getpostman.com/collections/3da2db8a25d1885dae24

