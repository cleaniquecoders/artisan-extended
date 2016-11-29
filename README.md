# Laravel Artisan Extended

## Installation

```
composer require cleaniquecoders/artisan-extended
```

## Register Service Provider

Open up `config/app.php` and register `CleaniqueCoders\ArtisanExtended\ArtisanExtendedServiceProvider::class,` in `providers` key.

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

**You can create route for API too**

```
php artisan make:route RouteName --api
```

### Create a new Model, Migration, Resourceful Controller, Route and Request

You may create single or multiple Model at one time.

```
php artisan make:common Post
```

OR 

```
php artisan make:common Post Like Video Photo Reaction
```

## Secure your Cookies

This command only for the new project only, as this command will change the default value of the `cookie` name to random string and set `encrypt` to true. It's recommended to change your application's cookie name and encrypt it.

```
php artisan secure:cookie
```

