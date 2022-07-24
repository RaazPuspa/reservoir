# Reservoir

Resources management application, as part of an assignment submitted by _Pusparaj Bhattarai_.

### Table of Content

1. [Tech Stack](#tech-stack)
2. [Development Environment](#development-environment)
    1. [With Docker](#with-docker)
    2. [Without Docker](#without-docker)
    3. [Building Assets](#building-assets)
    4. [Access URL](#access-url)
3. [Code Standard](#code-standard)
4. [Static Analysis](#static-analysis)
5. [CLI Helpers](#cli-helpers)
    1. [PHPStan](#phpstan)
    2. [IDE Helpers](#ide-helpers)
6. [Supporting Links](#supporting-links)

### Tech Stack

For the _Reservoir_, we are using the following tech stacks with mentioned version:

- **PHP** (v8.1)
- **Laravel** (v9)
- **Postgres** (v14)

### Development Environment

#### With Docker

Docker containers have been prepared for the local development purpose which includes all the required development
environment dependencies. To start working on the service, you must have [Docker](https://docker.com) installed in your
local machine.

[Laravel Sail](https://laravel.com/docs/9.x/sail) is used as command-line interface to interact with default Docker
development environment. Sail has been installed and configured for the service. When working with fresh clone of the
service, use the following command to install Sail along with other composer dependencies. Once Sail is installed, you
can follow the Sail documentation to start your Docker containers for the _Reservoir_.

```shell
docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html raazpuspa/larasail:8.1 composer install
```

To start the server from docker containers, use the Sail command:

```shell
./vendor/bin/sail up
```

#### Without Docker

If you haven't installed Docker within your system, you can manually prepare your machine to run the service and to
start contributing. Following are the requirements that your system must possess to run _Reservoir_ without Docker
containers:

- **PHP**: v8.1 or latest
- **Postgres**: v14
- **Composer**: v2
- **Yarn**: v1.22 or latest

Beside mentioned executables, Laravel
requires [following PHP extensions](https://laravel.com/docs/9.x/deployment#server-requirements):

- BCMath PHP Extension
- Ctype PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension (postgres)
- Tokenizer PHP Extension
- XML PHP Extension

_**Note**: [XDebug](https://xdebug.org/) is required to generate test coverage._

To start the project server you can either configure Nginx or Apache web servers or can directly use the Laravel serve:

```shell
php artisan serve [--host=0.0.0.0] [--port=4040]
```

#### Building assets

_Reservoir_ uses Laravel Vite plugin to compile and build front-end assets. Build process can be done via use of Yarn.

```shell
yarn install && yarn run build
```

#### Access URL

Once you start the project, you can access the Swagger API Documentation at following path:

http://localhost:4040

_**Note**: The URL will be as defined in `php artisan serve` or in `.env`._

### Code Standard

We follow the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard and the
[PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard.

### Static Analysis

Compiled languages need to know about the type of every variable, return type of every method etc. before the program
runs. This is why the compiler needs to make sure that the program is “correct” and will happily point out to you these
kinds of mistakes in the source code, like calling an undefined method or passing a wrong number of arguments to a
function. The compiler acts as a first line of defense before you are able to deploy the application into production.

On the other hand, PHP is nothing like that. If you make a mistake, the program will crash when the line of code with
the mistake is executed. When testing a PHP application, whether manually or automatically, developers spend a lot of
their time discovering mistakes that would not even compile in other languages, leaving less time for testing actual
business logic. [source](https://phpstan.org/blog/find-bugs-in-your-code-without-writing-tests)

To make sure we do not leave any broken code that could have been caught by any compiler in supported language, we have
configured [PHPStan](https://phpstan.org/). PHPStan focuses on finding errors in your code without actually running it.
It catches whole classes of bugs even before you write tests for the code. It moves PHP closer to compiled languages in
the sense that the correctness of each line of the code can be checked before you run the actual line.

On top of the PHPStan, _Reservoir_ uses [Larastan](https://github.com/nunomaduro/larastan) which extends PHPStan to
support APIs provided by the Laravel framework by adding static typing to Laravel.

### CLI Helpers

During the development phase of _Reservoir_, you need to make sure all of your changes meet defined standards and
static analysis is not reporting any issues. To see the reporting result within your local development environment,
following commands might come handy:

#### PHPStan

- Run static analysis

```shell
./vendor/bin/phpstan
```

#### Pint

- Run laravel pint

```shell
./vendor/bin/pint
```

#### IDE Helpers

- Automatic PHPDoc generation for Laravel Facades

```shell
php artisan ide-helper:generate
```

- Automatic PHPDocs for models

```shell
php artisan ide-helper:models -M
```

- PhpStorm Meta for Container instances

```shell
php artisan ide-helper:meta
```

#### Laravel Sail usage

If your development environment is configured with Laravel Sail, replace `php artisan` with `./vendor/bin/sail artisan`.

### Supporting Links

- [Laravel](https://laravel.com)
- [Laravel Docs](https://laravel.com/docs/9.x)
- [Laravel Sail Docs](https://laravel.com/docs/9.x/sail)
- [Docker](https://docker.com)
- [PSR-12](https://www.php-fig.org/psr/psr-12/)
- [PHPStan](https://phpstan.org/)
- [Laravel Pint](https://github.com/laravel/pint)
- [Laravel Telescope](https://github.com/laravel/telescope)
- [Larastan](https://github.com/nunomaduro/larastan)
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Laravel Log Viewer](https://github.com/rap2hpoutre/laravel-log-viewer)
