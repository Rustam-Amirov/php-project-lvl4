start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	npm ci

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

deploy:
	git push heroku

lint:
	composer run-script phpcs  -- --standard=PSR12 app config routes tests

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 app config routes tests

install:
	composer install 

test-coverage:
	composer phpunit tests -- --coverage-clover build/logs/clover.xml