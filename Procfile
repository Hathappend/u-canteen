composer: /layers/paketo-buildpacks_php/composer/vendor/bin/composer install
web: /workspace/vendor/bin/heroku-php-apache2 public/ && php artisan migrate --force && php artisan optimize:clear && php artisan storage:link
