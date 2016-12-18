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

p/s: Scaffold / Resourceful views require reusable components, hence you need to publish the `artisan-extended-views`.

## Important Notes

On production, only `php artisan clear:cache` available for use, other than that if your application running on `local` or `staging`, all the Artisan Extended commands available for you on artisan console.

## Available Commands

### Create a New Scaffold

You may create single or multiple Model at one time.

```
php artisan make:scaffold Post
```

OR 

```
php artisan make:scaffold Post Like Video Photo Reaction
```

p/s: Please take note that, for now you still need to update the model `$fillable` property, `ModelFactory.php` and model's migration scripts.

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
4. `-r` - Create a new resourceful controller

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

### Create a new View

Generate a view extending default layout, `app`.

```
php artisan make:view welcome
```

Generate a new `admin`'s `dashboard` with layouts of `admin`.

```
php artisan make:view admin.dashboard -p admin
```

Generate a resourceful view, by passing a `-r` option and ommit the specific blade files.

```
php artisan make:view users -r
```

This command will create a directory named `users` in `resources/views`. There will be: 

1. `index.blade.php`, 
2. `show.blade.php` and 
3. `form.blade.php`. 

You may want to create a resourceful controller by running `php artisan make:resourceful UserController`.

### Create Event & Listener

```
php artisan make:eventlistener Post
```

### Secure your Cookies

This command only for the new project only, as this command will change the default value of the `cookie` name to random string and set `encrypt` to true. It's recommended to change your application's cookie name and encrypt it.

```
php artisan secure:cookie
```

