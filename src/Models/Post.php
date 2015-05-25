<?php namespace DSampaolo\Blog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent {
    protected $table = 'dsampaolo_blog_posts';
    protected $fillable = ['title', 'slug', 'chapo', 'content', 'published_at'];

    function getUrlAttribute($value) {
//        return \Url::to('/blog/'.$this->slug).'/';
        return '/blog/'.$this->slug.'/';
    }

    function getPubDateAttribute($value) {
        return $this->created_at->format('D, d M Y H:i:s O');
    }

    function scopeIsPublished($query) {
        return $query->where('published_at', '>', \DB::raw('now()'));
    }

}
