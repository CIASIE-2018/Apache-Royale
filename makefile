MAKEFLAGS += --silent

.PHONY: install

install: ## Install dependencies
	docker-compose up -d
	docker exec -it 7.1.x-webserver composer install
	docker exec -i 5.7-mysql mysql -ptiger < data.sql