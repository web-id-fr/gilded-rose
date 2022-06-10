tests:
	./vendor/squizlabs/php_codesniffer/bin/phpcs --standard=PSR12 src/
	./vendor/kahlan/kahlan/bin/kahlan

dockerizedTests:
	cd dockerized-tests
	docker build -t gilded-rose-tests . -f dockerized-tests/Dockerfile
	docker run -it --rm --name my-tests gilded-rose-tests
