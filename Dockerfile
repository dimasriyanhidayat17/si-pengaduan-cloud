FROM php:8.2-cli

# Install driver MySQL supaya Railway bisa konek database
RUN docker-php-ext-install pdo pdo_mysql mysqli

WORKDIR /app

COPY . .

CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
