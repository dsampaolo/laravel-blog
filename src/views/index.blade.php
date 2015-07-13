@extends('app')

@section('content')

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Blog</li>
            </ul>

            <div class="row margin-bottom-40">
                <div class="col-md-9 col-sm-9">

                    @foreach($posts as $post)
                        @include('blog::post.listView')

                    @endforeach

                    {{ $posts->render() }}
                </div>

                @include('blog::sidebar')

            </div>
        </div>
    </div>

@endsection