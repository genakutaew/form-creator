build:
	docker-compose build

up:
	docker-compose up -d --remove-orphans

down:
	docker-compose down

restart: down up

php:
	docker-compose exec -u www-data php bash

composer:
	docker-compose exec -u www-data php composer install

copy_env:
	cp .env.example .env

migrate:
	docker-compose exec -u www-data php php artisan migrate

first_run: up copy_env composer migrate
