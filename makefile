MAKEFLAGS += --silent

.PHONY: install

install: ## Install dependencies
	docker-compose up -d
	docker exec -it 7.1.x-webserver composer install