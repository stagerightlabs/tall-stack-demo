# Swatchr

Sophisticated color palette genration using the latest in AI powered blockchain technology.  Unleash the power of swatches on demand. (Just kidding...)

## Tall Stack Demo

This repo is demonstration of a [TALL Stack](https://tallstack.dev/) application:

- [Tailwind CSS](https://tailwindcss.com/) A CSS framework emphasizing design composition with utility classes rather than traditional cascading inheritance.
- [Alpine.js](https://github.com/alpinejs/alpine) A lightweight javascript framework with a declarative syntax and a robust API; ideal for UI work.
- [Laravel](https://laravel.com/) A 'batteries included' framework for building PHP applications. An excellent way to work efficiently with PHP and get things done.
- [Livewire](https://laravel-livewire.com/) A tool for creating rich interactive application components without writing custom javascript. Similar to Phoenix LiveView.

## Decks

You can view the presentation slides here:

- [Livewire in Action](https://github.com/stagerightlabs/tall-stack-demo/blob/main/resources/views/decks/livewire.blade.php)

## Asset Pipeline

This project does not make use Laravel Mix to manage the front end assets.  [Read more about this configuraton with esbuild and postcss](https://stagerightlabs.com/blog/you-might-not-need-laravel-mix).

## Local Development

You can run this project locally with [Laravel Sail](https://laravel.com/docs/8.x/sail), which is built on top of docker and docker-compose.

Clone the repo to your local machine, then install the dependencies:

```
$ WWWUSER=${WWWUSER:-$UID} docker-compose run --rm laravel.test composer install
$ WWWUSER=${WWWUSER:-$UID} docker-compose run --rm laravel.test npm install
$ WWWUSER=${WWWUSER:-$UID} docker-compose run --rm laravel.test npm run build
```

Spin up the service with Sail:

```
$ ./vendor/bin/sail up -d
```

You should now be able to view the service in your browser: [http://localhost/demo](http://localhost/demo)

If you are comfortable with Docker you can also use docker compose directly.
