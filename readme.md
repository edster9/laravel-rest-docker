# [laravel-rest-docker](https://documenter.getpostman.com/view/762427/maverick/7TGjEcp#intro) &middot; [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)]

## Introduction
This project demonstrates a self contained docker environment for a sample Laravel REST api with passport authentication.

### API Overview 
The API is a Project/Tasks/Users hierarchy design with a MySQL database to store all the object data.

All data access API's are projected so a valid user must be loggedin (stock DB account or create your own using /api/register)
```
POST localhost:8080/api/login
email: name1@maverick.com
password: name1
```

Or a new user can be created
```
POST localhost:8080/api/register 
```

Refer to [REST API Definitions](https://documenter.getpostman.com/view/762427/maverick/7TGjEcp#intro) for help on API usage.

### Full List of API
```
[ Auth API ]
POST localhost:8080/api/login
POST localhost:8080/api/get-details
POST localhost:8080/api/register

[ Projects CRUD ]
GET localhost:8080/api/projects
GET localhost:8080/api/project/[id]
POST localhost:8080/api/project
PUT localhost:8080/api/project
DEL localhost:8080/api/project/[id]

[ Tasks CRUD ]
GET localhost:8080/api/tasks
GET localhost:8080/api/tasks/[id]
DEL localhost:8080/api/task
POST localhost:8080/api/task
PUT localhost:8080/api/task

[ Tasks Query ]
GET localhost:8080/api/tasks/byuserid/[user_id]
GET localhost:8080/api/tasks/byprojectid/[project_id]
GET localhost:8080/api/tasks/bypriority/[priority]
GET localhost:8080/api/tasks/byduedate/[duedate]

[ Tasks / User Opersations ]
PUT localhost:8080/api/task/adduser/[task_id]/[user_id]
DEL localhost:8080/api/task/removeuser/[task_id]/[user_id]
```

### Tech Stack
This test project is 100% self contained Docker stack and its only requirement is to have Docker engine installed on your machine.

* **PHP/Laravel:** This is the application layer running a REST engine using PHP/Laravel 5.5
* **NGINX:** A basic web proxy layer is sitting in front of the PHP layer using NGINX web server
* **MySQL:** For the Database, MySQL 5.6 is used

## Instalation

### Requirements
- Any PC or MAC with Docker 17.x installed. 
- Git command line tool
- There are no needs for local web servers or databases

### Repo Install
The project can be cloned from GitHub for free with the following command
```
git clone https://github.com/edster9/laravel-rest-docker.git
```

### Docker Setup
After the project has been cloned from Git Repo it must be prepared for all 3rd party PHP/laravel libraries. This can be done using a temporary docker composer image that will self distruct after the setup.

- Make sure you switch into the project directory first
```
cd laravel-rest-docker
```

- Run the Docker command to setup PHP/Laravel 3rd party libraries
```
docker run --rm -v $(pwd)/rest-app:/app composer install
```

- Bring up the stack using docker-compose. This will run all three containers you stack is now running
```
docker-compose up
```

- Test the stack by navigating to http://localhost:8080 and you should see the basic Laravel home page

### Database Migrations
Now that the Docker stack is up and running a few database migration tasks must be executed so the MySQL database has some stock data to work with. In order to test the API with some pre-populated data, these migration steps take care of filling in some seed data for Projects, Tasks and a User that can be logged in.

- Make sure you switch into the project directory first
```
cd laravel-rest-docker
```

- Run the three command below from inside the project directory
```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan passport:install --force
docker-compose exec app php artisan db:seed
```

### Docker Compose Control
The Docker Compose stack can be controled using the following

- Make sure you switch into the project directory first
```
cd laravel-rest-docker
```

- To bring up the stack the first time
```
docker-compose up 
```
- To stop up the stack the without destroying it
```
docker-compose stop
```
- To start up the stack after it has been stopped
```
docker-compose start
```
- To destory the stack
```
docker-compose down
```



## Online API Definitions
This is an online API map and example usage using a command line [curl] tool
[REST API Definitions](https://documenter.getpostman.com/view/762427/maverick/7TGjEcp#intro)


## Postman
If you want to test the API using a REST test tool like Postman then you can use the following link to import the project into your Postman project
https://www.getpostman.com/collections/3da2db8a25d1885dae24

