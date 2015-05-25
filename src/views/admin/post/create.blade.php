@extends('blog_admin::layout')

@section('content')

    @if ($post_id > 0)
        <h1 class="col-md-offset-2">Edit a Post</h1>
    @else
        <h1 class="col-md-offset-2">Create a Post</h1>
    @endif

    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="title">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" value="{{ Input::old('title') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="slug">Slug</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="published_at">Publish date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="published_at">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="chapo">Excerpt</label>
            <div class="col-sm-10">
                <textarea id="chapo" name="chapo" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="content">Content</label>
            <div class="col-sm-10">
                <textarea id="content" name="content" class="form-control"></textarea>
            </div>
        </div>

        <input type="hidden" id="post_id" value="{{ $post_id }}" />

        <button id="btn_save_post" type="submit" class="col-md-offset-2 btn btn-primary">Save post</button>

    </form>

@endsection

@section('footer-scripts')

<script>
    $().ready(function() {

        // loading
        var post_id = $('#post_id').val();
        if (post_id > 0) {
            $.post('/admin/blog/load_post', {
                _token: "{{ csrf_token() }}",
                id: post_id
            }, function(data) {
                console.log('appel ajax ok, loaded data');

                $('#title').val(data.title);
                $('#slug').val(data.slug);
                $('#chapo').val(data.chapo);
                $('#content').val(data.content);
                $('#published_at').val(data.published_at);

            }, 'json');
        }

        // saving
        $('#btn_save_post').click(function(e) {
            e.preventDefault();

            $(this).addClass('disabled');

            $.post('/admin/blog/save_post', {
                _token: "{{ csrf_token() }}",

                title: $('#title').val(),
                slug: $('#slug').val(),
                chapo: $('#chapo').val(),
                content: $('#content').val(),
                published_at: $('#published_at').val(),

                post_id: $('#post_id').val()
            }, function(data) {

                $('#btn_save_post').removeClass('disabled');
                $('#post_id').val(data.id);
            }, 'json');
        });
    });
</script>
@endsection