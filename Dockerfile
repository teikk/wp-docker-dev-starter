FROM nginx:1.29-alpine AS nginx
COPY docker/nginx /etc/nginx/templates
WORKDIR /opt/app/public

FROM php:8.4-fpm-alpine3.22 AS php_base
ARG UID=1337
ARG GID=1337

ENV UID=${UID}
ENV GID=${GID}

RUN addgroup -g ${GID} -S developer && \
    adduser -S -D -H -u ${UID} -G developer developer

RUN mkdir -p /opt/app/public && \
    chown -R developer:developer /opt/app/public

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
    php wp-cli.phar --info; \
    chmod +x wp-cli.phar; \
    mv wp-cli.phar /usr/local/bin/wp;

USER developer
WORKDIR /opt/app/public