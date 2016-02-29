# PiRemote

A simple [Lumen](https://lumen.laravel.com) based web interface to control a power plug daemon running on a Raspberry Pi.

Under development.

## Installation

via Composer: `composer install`

copy and set your environment variables: `cp .env.example .env`


## Deployment

Requires a passwordless SHH connection.

Create a build.properties file in project root with the following content:


    production.user=
    production.host=
    production.dir=

Run `phing deploy`
