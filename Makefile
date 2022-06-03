build:
	docker compose build

init: build
	docker compose run --rm php chown -R $$(id -u):$$(id -g) .
	docker compose run --rm php chmod -R 777 /srv/app/public/uploads

start:
	docker compose up -d

stop:
	docker compose down --remove-orphans

shell:
	docker compose run php sh
