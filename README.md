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
}```

Publish the configuration of the package :

```php artisan vendor:publish --provider="DSampaolo\Blog\BlogServiceProvider"
```

