SHELL=/usr/bin/env bash

SUPPORTED_COMMANDS := symfony
SUPPORTS_MAKE_ARGS := $(findstring $(firstword $(MAKECMDGOALS)), $(SUPPORTED_COMMANDS))
ifneq "$(SUPPORTS_MAKE_ARGS)" ""
  COMMAND_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  $(eval $(COMMAND_ARGS):;@:)
endif

install: ## Launch project installation.
	@docker-compose run --rm composer install --dev
	@docker-compose run --rm symfony assets:install public
	@docker-compose run --rm symfony cache:clear
	@docker-compose run --rm npm install

start: ## Start all containers!
	@docker-compose up -d
	@docker-compose run --rm npm run watch

db: ## Init database, and run migrations.
	@docker-compose run --rm symfony doctrine:database:create --env dev --if-not-exists
	@docker-compose run --rm symfony doctrine:migration:migrate

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'
