FROM php:7.4-apache

LABEL maintainer="Cedric <creed1120@mail.com>" \
version="8.2"

RUN apt-get update \
  && apt-get upgrade -y \
  && apt-get install -y gnupg curl apt-transport-https lsb-release unzip \
  && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
  && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
  && curl -fsSL https://deb.nodesource.com/setup_18.x | http_proxy='' bash - \
  && http_proxy='' apt-get install -y nodejs yarn \
  && apt-get autoremove -y \
  && rm -rf /var/lib/apt/lists/* \
  git \
  bash \
  curl \
  # htop
  # Similar to the performance monitor in Mac
  # might be used under the hood by Coder
  htop \
  # man
  # documentation for things
  # e.g. man curl -> explains how curl works
  man \
  vim \
  ssh \
  # surprised you have to install this
  sudo \
  # operating system info
  lsb-release \
  # allows Coder to talk securely with image over TLS
  ca-certificates \
  # Language support
  locales \
  gnupg \
  jq

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
ADD ./app /var/www/html
COPY ./app/php-project.conf /etc/apache2/sites-available/php-project.conf
# RUN echo 'SetEnv MYSQL_DB_CONNECTION ${MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_DB_NAME ${MYSQL_DB_NAME}' >> /etc/apache2/conf-enabled/environment.conf
# RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv MYSQL_ROOT_PASSWORD ${MYSQL_ROOT_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
  a2enmod rewrite &&\
  a2enmod headers &&\
  a2enmod rewrite &&\
  a2dissite 000-default &&\
  a2ensite php-project &&\
  service apache2 restart
EXPOSE 9001
# EXPOSE 443