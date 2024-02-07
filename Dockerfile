FROM bitnami/laravel:10
# Your ENV vars are automatically injected here as ARGS
# ie. ARG NODE_ENV="production"
# etc

WORKDIR /app

RUN sudo apt-get update -qq && \
    sudo apt-get install -y git python build-essential

COPY . /app
RUN sudo chown -R bitnami:bitnami .
RUN composer install
RUN php artisan migrate --force
RUN php artisan optimize:clear
RUN php artisan storage:link
