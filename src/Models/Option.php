<?php namespace DSampaolo\Blog\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Option extends Eloquent {
    protected $table = 'dsampaolo_blog_options';
    protected $fillable = ['name', 'value'];

    static public function get($name) {
        $option = self::whereName($name)->first();
        if (isset($option->value)) {
            return $option->value;
        }

        // default values
        if ($name == "rss_number") {
            return 10;
        }

        return null;
    }
}
