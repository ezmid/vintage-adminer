# Vintage Docker Adminer

[![Build Status](https://travis-ci.org/ezmid/vintage-adminer.svg?branch=master)](https://travis-ci.org/ezmid/vintage-adminer) ![Docker Hub Status](https://img.shields.io/docker/build/ezmid/vintage-adminer.svg) ![Image Pulls](https://img.shields.io/docker/pulls/ezmid/vintage-adminer.svg) ![Image Stars](https://img.shields.io/docker/stars/ezmid/vintage-adminer.svg)

This is a simple Adminer container build on Alpine Linux.

## Installation

**Requirements**
- [GIT](https://git-scm.com/) >= 2.15
- [Docker CE](https://www.docker.com/) >= 17.12.0
- [Goss](https://github.com/aelsabbahy/goss) >= 0.3
- [Make](https://www.gnu.org/software/make/) >= 4.2

**Currently Goss is not available for Windows. Build everything else works on all platforms.*

## Development
```sh
# Build the image, TAG=latest is the default value
[user@dev ~]$ make build
# Build the image with a specific tag
[user@dev ~]$ make build TAG=1.1.0
# Test the latest image
[user@dev ~]$ make test
# Test a specific tag
[user@dev ~]$ make test TAG=1.1.0
# Push the latest tag to the registry
[user@dev ~]$ make push
# Push a specific tag
[user@dev ~]$ make push TAG=1.1.0
```
