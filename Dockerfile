FROM php:8.2-cli

# Set the working directory
WORKDIR /app

# System dependencies required to run composer
RUN apt update && apt install -y unzip git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the current working directory into /app within the image
COPY . /app

# Validate our composer config and run the install
RUN composer validate --working-dir /app --no-check-all --no-check-publish \
 && composer install --working-dir /app