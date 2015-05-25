<?php namespace DSampaolo\Blog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Option extends Eloquent {
    protected $table = 'dsampaolo_blog_options';

    static public function get($name) {
        return self::whereName($name)->first()->value;
    }

//    static public function set($name, $value) {
//
//    }

}
