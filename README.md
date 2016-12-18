# Laravel Artisan Extended

## Installation

```
composer require cleaniquecoders/artisan-extended
```

## Register Service Provider

Open up `config/app.php` and register `CleaniqueCoders\ArtisanExtended\ArtisanExtendedServiceProvider::class,` in `providers` key.

## Publishing Reusable Components and Layouts

Run following command to publish reusable components:

```
php artisan vendor:publish --tag=artisan-extended-views
```

## Important Notes

On production, only `php artisan clear:cache` available for use, other than that if your application running on `local` or `staging`, all the Artisan Extended commands available for you on artisan console.

## Available Commands

### Clear All Caches

```
php artisan clear:cache
```

### Clear All Caches and Serve the Application

```
php artisan clear:serve
```

**In case you need to run at different port:**

```
php artisan clear:serve --port=9000
```

### Create a New Route

```
php artisan make:route RouteName
```

Options available:

1. `-a` - Create a new route for API
2. `-p` - Set prefix for the route
3. `-m` - Set middleware for the route. Each middleware separated by comma(,)

#### Create an API Route

```
php artisan make:route -a Post
```

#### Create an API Route with Version

```
php artisan make:route -a -p v1 Post
```

#### Create an API Route with Version and Middlewares

```
php artisan make:route -a -p v1 -m auth:auth,jwt Post
```

### Create Event & Listener

```
php artisan make:eventlistener Post
```

### Create a new Model, Migration, Resourceful Controller, Route, Request, Seeder, Event & Listener

You may create single or multiple Model at one time.

```
php artisan make:common Post
```

OR 

```
php artisan make:common Post Like Video Photo Reaction
```

### Secure your Cookies

This command only for the new project only, as this command will change the default value of the `cookie` name to random string and set `encrypt` to true. It's recommended to change your application's cookie name and encrypt it.

```
php artisan secure:cookie
```

