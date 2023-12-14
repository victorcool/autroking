@extends('layouts.guest')
@section('slider')
    @include('temp.breadcrumb')
@endsection

@section('content')
<div class="rs-blog modify sec-bg pt-100 md-pt-80 md-pb-80">
    <div class="container">
        <div class="pb-100 md-pb-74">
            <div class="row">
                <div class="col-lg-9 order-last md-mb-50">
                    <div class="single-blog-wrap">
                        <div class="bs-img">
                            <img src="{{ asset('uploads/blog_img/'.@$post_to_read->images->path) }}" alt="">
                        </div>
                        <div class="single-content-full white-bg">
                            <div class="bs-desc">
                                {!! $post_to_read->body !!}
                                
                                <div class="single-page-info">
                                    <div class="author meta">
                                        <i class="flaticon-user-1"></i> admin
                                    </div>
                                    <div class="meta meta-date">
                                        <span class="month-day">
                                            <i class="flaticon-clock"></i>{{ @$post_to_read->created_at->format('M d, Y') }}                                         </span>
                                    </div>
                                    <div class="meta">
                                        <div class="category-name">
                                            <i class="flaticon-folder"></i>
                                            <a href="#.">Latest News</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="ps-navigation">
                            <ul>
                                <li class="next">
                                    <a href="#">
                                        <span class="next-link">Next <i class="flaticon-next"></i></span>
                                        <span class="link-text">Everything In Soccer Starts The Premier League</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div> --}}
                        <div class="comments-area">
                            <h3 class="comment-title">Leave a Reply</h3>
                            <form class="comment-form">
                                <p class="comment-notes">Your email address will not be published. Required fields are marked *</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-control">
                                            <label>Name <span class="required">*</span></label>
                                            <input name="author" type="text" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-control">
                                            <label>Email <span class="required">*</span></label>
                                            <input name="email" type="email" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="from-control">
                                    <label>Comment</label>
                                    <textarea name="comment" required="required"></textarea>
                                </div>
                                <div class="submit-comment">
                                    <button class="readon" type="submit">Post Comment</button>
                                </div>
                            </form>
                        </div>
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
@endsection