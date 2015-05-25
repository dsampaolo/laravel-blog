<?php namespace DSampaolo\Blog;

use App\Http\Controllers\Controller;
use DSampaolo\Blog\Models\Category;
use DSampaolo\Blog\Models\Option;
use DSampaolo\Blog\Models\Post;

class BlogPostController extends Controller {

    function __construct() {

        include_once('Models/Category.php');
        include_once('Models/Option.php');
        include_once('Models/Post.php');

        parent::__construct();
    }

    public function create() {
        return view('blog::admin.post.create')
            ->withPostId('');
    }

    public function edit($id) {
        return view('blog::admin.post.create')
            ->withPostId($id);
    }

    public function ajax_save() {

        $fields = array_except(\Input::all(), ['_token', 'post_id' ]);

        if (strlen($fields['slug']) === 0) {
            $fields['slug'] = \Str::slug($fields['title']);
        } else {
            $fields['slug'] = \Str::slug($fields['slug']);
        }

        if (\Input::get('post_id') > 0) {
            $post = Post::find(\Input::get('post_id'));
            $post->update($fields);
        } else {
            $post = Post::create($fields);
        }

        return response()->json($post);
    }

    public function ajax_load() {
        $post_id = \Input::get('post_id');

        $post = Post::find($post_id);
        return response()->json($post);
    }

    public function ajax_publish() {
        $post_id = \Input::get('post_id');

        $post = Post::find($post_id);
        if ($post->published_at === '0000-00-00 00:00:00') {
            $post->published_at = \DB::raw('now()');
            $post->save();
        }

        return response()->json($post);
    }
}