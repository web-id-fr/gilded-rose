tests:
	./vendor/kahlan/kahlan/bin/kahlan

dockerizedTests:
	cd dockerized-tests
	docker build -t gilded-rose-tests . -f dockerized-tests/Dockerfile
	docker run -it --rm --name my-tests gilded-rose-tests
