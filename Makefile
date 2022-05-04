start:
	UID=${UID} GID=${GID} docker compose up

stop:
	docker compose down

shell:
	docker compose run php sh
