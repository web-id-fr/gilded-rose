FROM php:8.1-cli

# Update and install git
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy this file containing folder inside the container
COPY . /usr/src/gilded-rose

# Install this project dependencies using composer
RUN cd /usr/src/gilded-rose && composer install

# Set the working directory of the container
WORKDIR /usr/src/gilded-rose

# Run tests
CMD [ "make", "tests" ]
