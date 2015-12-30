<div class="row">
    <div class="col-md-3">
        <a href="{{$post->url}}"><img style="width:100%" src="{{ $post->image }}" alt="" class="img-responsive"></a>
    </div>
    <div class="col-md-9">
        <h2><a href="{{$post->url}}">{{ $post->title }}</a></h2>
        <p>{!! $post->chapo !!}</p>
    </div>
</div>

<hr />
