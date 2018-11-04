MAKEFLAGS += --silent

.PHONY: install stop

install: ## Install dependencies
	docker-compose up -d
	docker exec -i 7.1.x-webserver composer install
	docker exec -i 5.7-mysql mysql -ptiger < data.sql

stop: ## Stop docker container
	docker-compose stop