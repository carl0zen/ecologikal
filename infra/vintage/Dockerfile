FROM php:7.4-apache

RUN docker-php-ext-install mysqli \
  && a2enmod rewrite headers \
  && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Prepend mysql_* polyfill for vintage code.
RUN echo 'auto_prepend_file=/var/www/html/infra/vintage/mysql_polyfill.php' \
  > /usr/local/etc/php/conf.d/eco-vintage.ini

COPY docker-entrypoint.sh /usr/local/bin/eco-vintage-entrypoint.sh
RUN chmod +x /usr/local/bin/eco-vintage-entrypoint.sh

WORKDIR /var/www/html
ENTRYPOINT ["/usr/local/bin/eco-vintage-entrypoint.sh"]
CMD ["apache2-foreground"]
