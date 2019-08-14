################################################################################
# Stage 1: Download Adminer
################################################################################
FROM alpine:3.10 AS download
LABEL maintainer="Filip Cieker <filip.cieker@ezmid.com>"
ENV ADMINER_VERSION=4.7.2
ENV ADMINER_DOWNLOAD_LINK=https://github.com/vrana/adminer/releases/download/v${ADMINER_VERSION}/adminer-${ADMINER_VERSION}-mysql-en.php
RUN wget ${ADMINER_DOWNLOAD_LINK} -O /tmp/adminer.php

################################################################################
# Stage 2: Update Caddy to serve our Adminer with autologin features
################################################################################
FROM abiosoft/caddy:php-no-stats
WORKDIR /var/www/app
COPY ./docker /
COPY --from=download /tmp/adminer.php adminer.php
