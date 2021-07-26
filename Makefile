install:
	composer install

php-algo:
	./bin/php-algo

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
	composer exec --verbose phpstan -- --level=8 analyse src tests

test:
	composer exec --verbose phpunit tests
