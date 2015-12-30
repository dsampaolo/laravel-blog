<?php namespace DSampaolo\Blog;

use App\Http\Controllers\Controller;
use DSampaolo\Blog\Models\Post;
use DSampaolo\Blog\Models\Category;
use DSampaolo\Blog\Models\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
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
            ->withPosts($posts)
            ->withCategories(Category::all())
            ->withOptionRssName(Option::get('rss_name'))
            ->withOptionRssNumber(Option::get('rss_number'));
    }

    public function createPost() {
        $categories = Category::lists('name', 'id');

        return view('blog::admin.editor')
            ->withCategories($categories)
            ->withPostId('');
    }

    public function editPost($id) {
        $categories = Category::lists('name', 'id');
        $post= Post::find($id);

        return view('blog::admin.editor')
            ->withCategories($categories)
            ->withPost($post)
            ->withPostId($id);
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

    public function formAddImage($post_id) {
        $post = Post::find($post_id);

        return view('blog::admin.image')
            ->withPost($post);
    }

    public function addImage($post_id) {
        @mkdir(public_path().'/img/');
        @mkdir(public_path().'/img/posts/');
        @mkdir(public_path().'/img/posts/thumbs');

        $post = Post::find($post_id);

        $file = Input::file('image');
        $img = \Image::make($file)->fit(1000, 500);

        $filename = '/img/posts/'.$file->getClientOriginalName();
        $img->save( public_path().$filename );

        $post->image = $file->getClientOriginalName();
        $post->save();

        return redirect('/admin/blog/');
    }

    public function ajax_post_save() {

        $fields = array_except(\Input::all(), ['_token', 'post_id' ]);

        if (strlen($fields['slug']) === 0) {
            $fields['slug'] = Str::slug($fields['title']);
        } else {
            $fields['slug'] = Str::slug($fields['slug']);
        }

        if (\Input::get('post_id') > 0) {
            $post = Post::find(Input::get('post_id'));
            $post->update($fields);
        } else {
            $post = Post::create($fields);
        }

        return response()->json($post);
    }


    public function ajax_post_load() {
        $post_id = Input::get('post_id');


        $post = Post::find($post_id);
        return response()->json($post);
    }

    public function ajax_post_publish() {
        $post_id = Input::get('post_id');


        $post = Post::find($post_id);
        if ($post->published_at === '0000-00-00 00:00:00') {
            $post->published_at = DB::raw('now()');
            $post->save();
        }

        return response()->json($post);
    }

    public function ajax_options_save() {
        $options = array_except(Input::all(), '_token' );

        foreach ($options as $key=>$val) {
            $option = Option::firstOrCreate( ['name' => $key]);
            $option->value = $val;
            $option->save();

            $ret[] = $option;
        }

        return response()->json($ret);
    }

    public function ajax_category_create() {
        $category_name = Input::get('category_name');

        if (strlen($category_name) == 0) {
            return response()->json(['status' => 'error', 'error' => 'Categories cannot have empty names.']);
        }

        $category = Category::whereName($category_name)->first();
        if ($category) {
            return response()->json(['status' => 'error', 'error' => 'This category already exists.']);
        }

        $category = Category::create(['name' => $category_name, 'slug' => Str::slug($category_name)]);
        return response()->json(['status' => 'success', 'object' => $category]);
    }
}