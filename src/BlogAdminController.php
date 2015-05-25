<?php namespace DSampaolo\Blog;

use App\Http\Controllers\Controller;
use DSampaolo\Blog\Models\Post;
use DSampaolo\Blog\Models\Category;

class BlogAdminController extends Controller {

    function __construct() {

        include_once('Models/Category.php');
        include_once('Models/Option.php');
        include_once('Models/Post.php');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('blog::admin.index')
            ->withPosts($posts);
    }

    public function show($slug) {
        $post = Post::whereSlug($slug)->first();

        return view('blog::post.show')
            ->withPost($post);
    }

    public function showPost($slug) {
        $post = Post::whereSlug($slug)->first();

        return view('blog::post.show')
            ->withPost($post);
    }

    public function rss() {
        $posts = Post::orderBy('created_at', 'desc')->take(10)->get();
        $last_build_date = \DateTime::createFromFormat('Y-m-d H:i:s', Post::max('created_at'))->format('D, d M Y H:i:s O');

        $content = view('blog::rss')
            ->withPosts($posts)
            ->withLastBuildDate($last_build_date);

        return \Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

}