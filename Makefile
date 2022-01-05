ROOT_DIR:=$(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))
UID := $(shell id -u)
CONTAINER:=testing_twig_extensions

all: start deps tests stop

start:
	@docker run -it --rm -d --name $(CONTAINER) -v $(ROOT_DIR)/app:/app -w /app php:7.4-cli

stop:
	@docker stop $(CONTAINER)

bash:
	@docker exec -it $(CONTAINER) bash

deps:
	@-docker exec $(CONTAINER) useradd worker >/dev/null 2>&1
	@-docker exec $(CONTAINER) usermod -u $(UID) worker >/dev/null 2>&1
	@docker exec $(CONTAINER) curl https://getcomposer.org/download/latest-2.2.x/composer.phar -so /bin/composer
	@docker exec $(CONTAINER) chmod +x /bin/composer
	@docker exec $(CONTAINER) apt-get update
	@docker exec $(CONTAINER) apt-get install -y libzip-dev git zip
	@docker exec $(CONTAINER) composer install

tests:
	@docker exec -u $(UID) $(CONTAINER) vendor/bin/phpunit --colors=always --bootstrap vendor/autoload.php tests
