validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src

test:
	composer exec --verbose phpunit tests
