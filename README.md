# laravel-blog

Update your composer.json :

```
"repositories": [
    {
        "url": "https://github.com/dsampaolo/laravel-blog.git",
        "type": "git"
    }
],
"require": {
    "dsampaolo/laravel-blog": "dev-master"
}
```


Publish the configuration of the package :

```
php artisan vendor:publish --provider="DSampaolo\Blog\BlogServiceProvider"
```

Run the migrations to create tables for posts, options and categories :
```
php artisan migrate
```

Register the provider in your config/app.php file :

```'
providers' => [
    'DSampaolo\Blog\BlogServiceProvider',
]
```
