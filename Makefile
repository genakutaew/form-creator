DOCKER_COMPOSE = docker-compose

build:
	${DOCKER_COMPOSE} build

up:
	${DOCKER_COMPOSE} up -d --remove-orphans

down:
	${DOCKER_COMPOSE} down

restart: down up


php:
	${DOCKER_COMPOSE} exec -u www-data php bash

composer:
	${DOCKER_COMPOSE} exec -u www-data php composer install
