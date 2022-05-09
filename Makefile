start:
	docker compose up --build -d

stop:
	docker compose down

shell:
	docker compose run php sh
