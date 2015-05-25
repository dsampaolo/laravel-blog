@extends('blog::admin.layout')

@section('content')

    <hr />
    <h2>Options</h2>


    <h3>RSS Options</h3>

    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="option_rss_name">Site name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="option_rss_name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="option_rss_number">Number of posts</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="option_rss_number">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="option_fullposts">Full post or Excerpt ?</label>
            <div class="col-sm-10">
                <select type="text" class="form-control" id="option_fullposts">
                    <option value="excerpt">Excerpts only</option>
                    <option value="full">Full posts</option>
                </select>
            </div>
        </div>

        <button id="btn_save_options" type="submit" class="col-md-offset-2 btn btn-primary">Save options</button>
    </form>


    <hr />
    <h2>Posts</h2>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Published on</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->published_at }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <a href="{{ action('\DSampaolo\Blog\BlogPostController@edit', $post->id) }}" class="btn btn-primary">Edit</a>
                @if (!$post->is_published() )
                    <button data-id="{{$post->id}}" class="btn btn-publish btn-success">Publish</button>
                @endif
                {{--<button class="btn btn-danger">Delete</button>--}}
            </td>
        </tr>

    @endforeach
    </table>
    <a href="{{ action('\DSampaolo\Blog\BlogPostController@create') }}" class="btn btn-success">Create post</a>

@endsection


@section('footer-scripts')
    <script>
    $().ready(function() {
        $('.btn-publish').click(function(e) {
            e.preventDefault();
            $(this).addClass('disabled');

            var post_id = $(this).data('id');
            var btn = $(this);

            $.post('/admin/blog/publish_post', {

                _token: "{{ csrf_token() }}",
                post_id: post_id

            }, function(data) {
                $(btn).removeClass('disabled');
            }, 'json');
        });

        // publishing
        $('#btn_publish_post').click(function(e) {
            e.preventDefault();

            $(this).addClass('disabled');

            $.post('/admin/blog/publish_post', {
                _token: "{{ csrf_token() }}",

                post_id: $('#post_id').val()
            }, function(data) {

                $('#btn_publish_post').removeClass('disabled');

            }, 'json');
        });

    });
    </script>

@endsection