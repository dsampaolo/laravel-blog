<?php

Route::group(['prefix' => 'admin'], function()
{
    Route::get('blog', 'DSampaolo\Blog\BlogAdminController@index');
    Route::post('blog/save_post', 'DSampaolo\Blog\BlogPostController@ajax_save');
    Route::post('blog/load_post', 'DSampaolo\Blog\BlogPostController@ajax_load');

    Route::resource('post', 'DSampaolo\Blog\BlogPostController');
});

Route::get('feed' , 'DSampaolo\Blog\BlogController@rss');

Route::get('blog' , 'DSampaolo\Blog\BlogController@index');
Route::get('blog/{slug}', 'DSampaolo\Blog\BlogController@showPost');
