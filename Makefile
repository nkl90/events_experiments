#!make
include .env
ENV=.env
ifneq (,$(wildcard ./.env.local))
    include .env.local
    ENV=.env.local
    export
endif
DC=docker-compose
DCR_1=${DC} run --rm -v ${PWD}/service1:${S1_DOCKER_APP_PATH} -v ${PWD}/service1:${S1_DOCKER_APP_PATH} -w ${S1_DOCKER_APP_PATH} --no-deps
DCR_2=${DC} run --rm -v ${PWD}/service2:${S2_DOCKER_APP_PATH} -v ${PWD}/service2:${S2_DOCKER_APP_PATH} -w ${S2_DOCKER_APP_PATH} --no-deps

run-php-s1:
	${DCR_1} php bash

run-php-s2:
	${DCR_2} php bash

ps:
	${DC} ps

init:
	${DCR_1} php composer install
	${DCR_2} php composer install

npm-install:
	${DCR} node npm install

composer-install:
	${DCR} php composer install

up:
	${DC} --env-file ${ENV} up -d
	${DC} ps
down:
	${DC} down

down-clear:
	${DC} down -v --remove-orphans

composer:
	${DCR} php composer

fix-cs:
	${DCR} php vendor/bin/php-cs-fixer fix ./adegara/goods-management/src
	${DCR} php vendor/bin/php-cs-fixer fix ./adegara/goods-management/tests
	${DCR} php vendor/bin/php-cs-fixer fix ./adegara/goods-management-bundle/src
	${DCR} php vendor/bin/php-cs-fixer fix ./adegara/goods-management-bundle/tests
	${DCR} php vendor/bin/php-cs-fixer fix ./src
	${DCR} php vendor/bin/php-cs-fixer fix ./tests

