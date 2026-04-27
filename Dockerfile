FROM php:8.2-cli-bookworm

RUN docker-php-ext-install mysqli > /dev/null

WORKDIR /app
COPY . .

RUN mkdir -p uploads/profiles uploads/documents \
    && chmod -R 775 uploads

ENV PORT=8080
EXPOSE 8080

CMD ["sh", "-c", "exec php -S 0.0.0.0:${PORT} -t /app"]
