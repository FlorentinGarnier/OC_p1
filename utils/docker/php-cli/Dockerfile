FROM php:cli

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libmcrypt-dev \
        libpng12-dev \
        ssmtp \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo pdo_mysql mbstring mysqli


RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

CMD ["wp", "--info"]