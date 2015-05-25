<?php namespace DSampaolo\Blog;

use App\Http\Controllers\Controller;
use DSampaolo\Blog\Models\Category;
use DSampaolo\Blog\Models\Option;
use DSampaolo\Blog\Models\Post;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::isPublished()->paginate(10);
        return view('blog::index')
            ->withPosts($posts)
            ->withTitle('Magazine : on décrypte les tendances');
    }

    public function show($slug) {
        $post = Post::isPublished()->whereSlug($slug)->first();

        return view('blog::post.show')
            ->withPost($post)
            ->withTitle($post->title.' - Magazine');
    }

    public function showPost($slug) {
        $post = Post::isPublished()->whereSlug($slug)->first();

        return view('blog::post.show')->withPost($post);
    }

    public function rss() {
        $posts = Post::isPublished()->orderBy('created_at', 'desc')->take(10)->get();
        $last_build_date = \DateTime::createFromFormat('Y-m-d H:i:s', Post::max('created_at'))->format('D, d M Y H:i:s O');

        $content = view('blog::rss')
            ->withPosts($posts)
            ->withLastBuildDate($last_build_date)
            ->withSiteName(Option::get('site_name'));

        return \Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}