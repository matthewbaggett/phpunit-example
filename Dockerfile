FROM hub.segurasystems.com/segura/phpbasedockertemplate:latest
MAINTAINER Segura Systems <systems@segura.co.uk>

# Copy application code into /app
ADD . /app

# Let composer do an install in /app, which may not be necessary.
RUN composer install
RUN composer dumpautoload -o
