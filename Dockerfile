FROM wordpress:6.7.2-php8.3-apache as wordpress
ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
php wp-cli.phar --info; \
chmod +x wp-cli.phar; \
mv wp-cli.phar /usr/local/bin/wp;

COPY docker/php/php.extra.ini /usr/local/etc/php/conf.d/

RUN apt-get -qq update ; apt-get -y install unzip curl sudo subversion mariadb-client \
        && apt-get autoclean \
        && chsh -s /bin/bash www-data

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN useradd -g www-data --system --no-create-home --shell /bin/sh -u ${UID} developer

USER developer
WORKDIR /var/www/html

ENV PATH="${PATH}:/root/.composer/vendor/bin"
ENV WP_CLI_ALLOW_ROOT=1