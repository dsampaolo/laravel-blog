@extends('app')

@section('content')

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Blog</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <div class="col-md-9 col-sm-9">

                    @foreach($posts as $post)
                        @include('blog::post.listView')

                    @endforeach

                    {{ $posts->render() }}
                </div>

                <!-- END CONTENT -->
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-3">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        @foreach($categories as $category)
                            <li class="list-group-item clearfix"><a href="{{ $category->slug }}"><i class="fa fa-angle-right"></i> {{ $category->name }} ({{ $category->posts_num }})</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

@endsection