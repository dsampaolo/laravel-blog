@extends('layout')

@section('content')

    <div class="title-wrapper">
        <div class="container"><div class="container-inner">
                @if(isset($h1))
                    <h1>{!! $h1 !!}</h1>
                @else
                    <h1>Lunettes de soleil : <span>Le Magazine</span></h1>
                @endif

            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Magazine</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-9">
                    <h1>Le Magazine</h1>
                    <div class="content-page">
                        {{--<p><img src="../../assets/frontend/pages/img/img1.jpg" alt="About us" class="img-responsive"></p>--}}

                        @foreach($posts as $post)
                            @include('blog::post.listView')
                        @endforeach

                        {{ $posts->render() }}
                    </div>
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN SIDEBAR -->
                {{--<div class="sidebar col-md-3 col-sm-3">--}}
                    {{--<ul class="list-group margin-bottom-25 sidebar-menu">--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Login/Register</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Restore Password</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> My account</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Address book</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Wish list</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Returns</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Newsletter</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

@endsection