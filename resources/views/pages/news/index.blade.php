@extends('layouts.guest')
@section('slider')
    @include('temp.breadcrumb')
@endsection

@section('content')
    <!-- Blog Section Start -->
    <div class="rs-blog modify pt-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="pb-100 md-pb-74">
                <div class="row">
                    <div class="col-lg-9 md-mb-50 order-last">
                        <div class="row">
                            @if ($posts??'')
                                @if (!$posts->isEmpty())
                                    @foreach ($posts as $post)
                                    <div class="col-lg-6 mb-30">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <div class="image-wrap">
                                                    <a href="{{ route('news.show',$post->slug) }}"><img src="{{ asset('uploads/blog_img/'.@$post->images->path??'') }}" alt=""></a>
                                                </div>
                                                <div class="all-meta">
                                                    <div class="meta meta-date">
                                                        <span class="month-day">{{ $post->created_at->format('d') }}</span>
                                                        <span class="month-name">{{ $post->created_at->format('M') }}</span>
                                                    </div>
                                                    <div class="meta meta-author">
                                                        <i class="flaticon-user-1"></i>
                                                        <span class="author">admin</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blog-content">
                                                <h4 class="blog-title">
                                                    <a href="{{ route('news.show',$post->slug) }}">{{ Str::title(Str::limit($post->title, 35, $end='...')) }}</a>
                                                </h4>
                                                <div class="blog-desc">{{ Str::limit($post->body, 150, $end='...') }}</div>
                                                <div class="read-button">
                                                    <a href="{{ route('news.show',$post->slug) }}">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                        
                                    @endforeach
                                @else
                                    <div class="breadcrumb text-center">No post Available</div>
                                @endif
                            @endif
                            
                        </div>
                        <div class="page-nav text-center mt-60 md-mt-30">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">Next »</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 pr-40 md-pr-15">
                        @include('pages.news.leftside-bar')
                    </div>
                </div>
            </div>

              <!-- Subscribe Section Start -->
              @include('temp.subscribe_section')
              <!-- Subscribe Section End -->
        </div>
    </div>
    <!-- Blog Section End -->
@endsection