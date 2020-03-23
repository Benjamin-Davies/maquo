FROM php:5.5-apache
WORKDIR /var/www/html
RUN docker-php-ext-install mysql mysqli pdo pdo_mysql
#RUN apt-get update
#RUN apt-get install -y php5-mysql
#RUN echo extension=pdo.so >> /etc/php.ini
#RUN echo extension=pdo_mysql.so >> /etc/php.ini
COPY . .
