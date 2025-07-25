FROM wordpress:6.7.2-php8.3-apache AS wordpress
RUN apt-get -qq update; \
        apt-get -y install unzip curl sudo subversion mariadb-client less; \
        apt-get autoclean;
COPY docker/php/php.extra.ini /usr/local/etc/php/conf.d/

FROM wordpress AS development
ENV APP_ENV=development

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV WP_CLI_ALLOW_ROOT=1
ARG UID=1337
ARG GID=1337

ENV UID=${UID}
ENV GID=${GID}

RUN groupadd --force -g ${GID} developer; \
        useradd -g developer --system --no-user-group --shell /bin/sh -u ${UID} developer;

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
        php wp-cli.phar --info; \
        chmod +x wp-cli.phar; \
        mv wp-cli.phar /usr/local/bin/wp;

RUN cp -n /usr/local/etc/php/php.ini-${APP_ENV} /usr/local/etc/php/php.ini

RUN chown -R developer:developer /var/www

USER developer
WORKDIR /var/www/html
ENV PATH="${PATH}:/root/.composer/vendor/bin"

FROM wordpress AS production
ENV APP_ENV=production

COPY --chown=www-data:www-data ./plugins /var/www/html/wp-content/plugins
COPY --chown=www-data:www-data ./themes /var/www/html/wp-content/themes

RUN cp -n /usr/local/etc/php/php.ini-${APP_ENV} /usr/local/etc/php/php.ini

RUN chown -R www-data:www-data /var/www
USER www-data