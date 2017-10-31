FROM php:cli

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar

CMD ["php", "wp-cli.phar", "--info"]