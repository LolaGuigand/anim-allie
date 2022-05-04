start:
	docker compose up --build

stop:
	docker compose down

shell:
	docker compose run php sh
