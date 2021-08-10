SHELL=/usr/bin/env bash

install:
	@docker-compose run --rm composer install --dev
	@docker-compose run --rm symfony assets:install public
	@docker-compose run --rm symfony cache:clear

start:
	@docker-compose run --rm symfony cache:clear