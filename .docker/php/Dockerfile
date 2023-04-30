FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    wget \
    curl \
    libicu-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libfreetype6-dev libjpeg62-turbo-dev \
    libmagickwand-dev --no-install-recommends \
    libzip-dev \
    libxrender1 \
    fontconfig \
    libxtst6 \
    xfonts-75dpi \
    xfonts-base \
    xz-utils \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extension
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath opcache soap gd zip intl mysqli

RUN printf "\n" | pecl install xdebug \
  && docker-php-ext-enable xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set timezone
ENV TZ=Asia/Tehran
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Set working directory
WORKDIR /var/www
        
USER $user

EXPOSE 9001