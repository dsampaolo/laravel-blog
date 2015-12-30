<?php

Route::group(['prefix' => 'admin'], function()
{
    Route::get('blog', 'DSampaolo\Blog\AdminController@index');
    Route::get('post/create', 'DSampaolo\Blog\AdminController@createPost');
    Route::get('post/{id}/edit', 'DSampaolo\Blog\AdminController@editPost');

    Route::post('post/{id}/image', 'DSampaolo\Blog\AdminController@addImage');
    Route::get('post/{id}/image', 'DSampaolo\Blog\AdminController@formAddImage');

    Route::post('blog/save_post', 'DSampaolo\Blog\AdminController@ajax_post_save');
    Route::post('blog/load_post', 'DSampaolo\Blog\AdminController@ajax_post_load');
    Route::post('blog/publish_post', 'DSampaolo\Blog\AdminController@ajax_post_publish');

    Route::post('blog/create_category', 'DSampaolo\Blog\AdminController@ajax_category_create');

    Route::post('blog/save_options', 'DSampaolo\Blog\AdminController@ajax_options_save');

//    Route::resource('post', 'DSampaolo\Blog\BlogPostController');
});

Route::get('feed' , 'DSampaolo\Blog\BlogController@rss');

Route::get('blog' , 'DSampaolo\Blog\BlogController@index');
Route::get('blog/c-{slug}', 'DSampaolo\Blog\BlogController@showCategory');
Route::get('blog/{slug}', 'DSampaolo\Blog\BlogController@showPost');
