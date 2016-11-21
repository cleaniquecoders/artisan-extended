# Laravel Artisan Extended

## Installation

```
composer require cleaniquecoders/artisan-extended
```

## Register Service Provider

Open up `config/app.php` and register `CleaniqueCoders\Providers\ArtisanExtendedProvider::class,` in `providers` key.

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

```
php artisan make:common ModelA ModelB ModelC
```