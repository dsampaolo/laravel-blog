# dsampaolo/laravel-blog


## Description

A Laravel 5 package to add a simple blog to an existing Laravel 5 site.


## Installation

Update your composer.json 

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
"autoload": {
    "psr-4": {
        "DSampaolo\\Blog\\": "vendor/dsampaolo/laravel-blog/src"
    }
}
```

Then refresh autoload paths by running  
``` 
composer dump-autoload
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

Customize your views in 
``` 
resources/views/vendor/blog
``` 

You can add/edit posts :
```
/admin/blog/
```

