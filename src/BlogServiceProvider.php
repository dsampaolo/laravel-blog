<?php namespace DSampaolo\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->loadViewsFrom(__DIR__.'/Views',       'blog');

        $this->publishes([
            __DIR__.'/views'        => base_path('resources/views/dsampaolo/laravel-blog'),
            __DIR__.'/migrations'   => $this->app->databasePath().'/migrations',
        ]);
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        include __DIR__.'/routes.php';
        $this->app->make('DSampaolo\Blog\BlogController');
        $this->app->make('DSampaolo\Blog\BlogAdminController');
	}

}
