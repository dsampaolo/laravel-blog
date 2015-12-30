<div class="sidebar col-md-3 col-sm-3">
    <ul class="list-group margin-bottom-25 sidebar-menu">
        @foreach($categories as $category)
            @if (isset($active_category) && $active_category == $category->id )
                <li class="active list-group-item clearfix"><a href="{{ $category->url }}"><i class="fa fa-angle-right"></i> {{ $category->name }}</a></li>
            @else
                <li class="list-group-item clearfix"><a href="{{ $category->url }}"><i class="fa fa-angle-right"></i> {{ $category->name }}</a></li>
            @endif

        @endforeach
    </ul>
</div>