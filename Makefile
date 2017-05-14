.PHONY: deploy


deploy:
	git pull -p
	git clean -xdf temp/
	composer install --no-dev
