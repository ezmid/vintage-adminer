FROM alpine:3.8

MAINTAINER "Filip Cieker <filip.cieker@ezdmi.com>"
LABEL maintainers="Filip Cieker <filip.cieker@ezmid.com>"

################################################################################
# Variables, 82 is usually www-data
ENV PGID=82
ENV PUID=82
ENV ADMINER_VERSION=4.6.3

################################################################################
# Layer 1 - PHP 7
RUN apk --no-cache update && \
    apk --no-cache add \
    shadow \
    wget \
    php7 \
    php7-fpm \
    php7-session \
    php7-mysqli

################################################################################
# Layer 2 - Copy confiuration and Adminer login override
COPY ./docker /

################################################################################
# Layer 3 - Download Adminer
RUN wget https://github.com/vrana/adminer/releases/download/v${ADMINER_VERSION}/adminer-${ADMINER_VERSION}-mysql-en.php -O /var/www/app/adminer.php


################################################################################
# Layer 4 - Defalt non root user for runtime
RUN addgroup -g ${PGID} www-data && \
    adduser -D -u ${PUID} -G www-data www-data && \
    usermod -a -G root www-data

################################################################################
# Layer 5 - Clean up the mess
RUN apk del \
    wget \
    shadow

# Prepare the env for runtime
USER www-data
WORKDIR /var/www/app
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm7", "-F", "--fpm-config", "/etc/php7/php-fpm.conf"]
