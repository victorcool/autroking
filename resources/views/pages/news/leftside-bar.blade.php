<div class="cl-sidebar">
    <div class="cl-search">
        <form class="h-search">
            <input type="text" placeholder="Search...">
            <span>
              <button type="submit"><i class="flaticon-search"></i></button> 
            </span>
        </form>
    </div>

    <div class="cl-recentpost mb-30">
        <h4 class="cl-widget-title">Recent Posts</h4>
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('news.show',$post->slug) }}">{{ Str::title(Str::limit($post->title, 40, $end='...')) }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- <div class="cl-recent-comments mb-30">
        <h4 class="cl-widget-title">Recent Comments</h4>
        <ul>
            <li><a href="#">A WordPress Commenter</a> on <a href="#">City Tops Chelsea in Community Shield</a></li>
        </ul>
    </div> --}}

    <div class="cl-archives mb-30">
        <h4 class="cl-widget-title">Archives</h4>
        <ul>
            @foreach ($archives as $archive)
                <li><a href="#">{{ Carbon\Carbon::parse($archive->created_at)->format('M Y') }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="cl-categories mb-30 md-mb-0">
        <h4 class="cl-widget-title">Categories</h4>
        <ul>
            @foreach ($categories as $category)
                <li><a href="#">{{ $category->name}}</a></li>
            @endforeach
        </ul>
    </div>                          
</div>