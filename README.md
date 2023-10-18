# TecnoGestión

En este documento está presente todo lo necesario para la puesta a prueba de nuestro proyecto **TecnoGestión**.


## Contenido del archivo *.env*

```
MYSQL_DATABASE=tickets
MYSQL_USER=user
MYSQL_USER_PASSWORD=G52023
MYSQL_ROOT_PASSWORD=G52023G52023G52023
MYSQL_SERVER=db
MYSQL_SERVER_PORT=3306
MAIL_HOST=smtp.gmail.com
MAIL_USER=practicasprofesionalizantestwo@gmail.com
MAIL_PASS=fhqbackrhmagwpky
MAIL_PORT=587
PHP_PORT=8181
PHP_MYADMIN_PORT=8081
```

## Contenido del archivo *docker-compose.yml*

```yml
version: '3.3'

services:

  

db:

image: 'mysql:5.7'

volumes:

- ./dump/:/var/lib/mysql

environment:

MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}

MYSQL_USER: ${MYSQL_USER}

MYSQL_PASSWORD: ${MYSQL_USER_PASSWORD}

MYSQL_DATABASE: ${MYSQL_DATABASE}

# networks:

# red_interna:

# ipv4_address: 192.168.91.2

container_name: mysql

  

phpmyadmin:

image: phpmyadmin/phpmyadmin:latest

#restart: always

environment:

PMA_HOST: db

PMA_USER: root

PMA_PASSWORD: ${MYSQL_ROOT_PASSWORD}

ports:

- ${PHP_MYADMIN_PORT}:80

depends_on:

- db

  

php-apache:

build: php-apache/

env_file:

- .env

links:

- db:${MYSQL_SERVER}

volumes:

- ./TrackerService/:/var/www/html

ports:

- ${PHP_PORT}:80

depends_on:

- db

# networks:

# red_interna:

# ipv4_address: 192.168.91.3

container_name: App

# networks:

# red_interna:

# ipam:

# config:

# - subnet: 192.168.91.1/29
```

## Contenido del archivo *Dockerfile*

```
# Puedo elegir la version de php que voy a instalar

FROM  php:8.2.7-apache

RUN  mv  "$PHP_INI_DIR/php.ini-production"  "$PHP_INI_DIR/php.ini"

WORKDIR  /var/www/html

  

RUN  apt-get  update  &&  \

apt-get  install  -y  \

git  \

unzip  \

libzip-dev

  

RUN  curl  -sS  https://getcomposer.org/installer  |  php  --  --install-dir=/usr/local/bin  --filename=composer

  

# Puedo elegir la las librerias

RUN  docker-php-ext-install  pdo  pdo_mysql  zip

  

RUN  echo  "date.timezone  =  America/Argentina/Buenos_Aires"  >  /usr/local/etc/php/php.ini

RUN  echo  "session.cookie_lifetime=999"  >>  /usr/local/etc/php/php.ini

RUN  echo  "session.gc_maxlifetime=999"  >>  /usr/local/etc/php/php.ini

  

RUN  a2enmod  rewrite

RUN  a2enmod  headers

RUN  a2enmod  expires

  

RUN  service  apache2  restart

  

RUN  apt-get  clean  &&  rm  -rf  /var/lib/apt/lists/*
```