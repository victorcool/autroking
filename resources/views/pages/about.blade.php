@extends('layouts.guest')
@section('slider')
    @include('temp.breadcrumb')
@endsection

@section('content')
     

    @if ($type =='history' || $type =='about')
        <!-- About Section Start -->        
        <div class="rs-about pt-100 pb-100 md-pt-80 md-pb-73">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 md-mb-30">
                        <div class="about-img">
                            <img src="{{ asset('temp/assets/images/about/about-inner.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 pl-40 col-padding-md">
                        <div class="title-style mb-50 md-mb-30">
                            <h2 class="margin-0 uppercase">{{ ucwords(@$contents->aboutContent[0]->title) }}</h2>
                            <span class="line-bg y-b left-line pt-10"></span>
                        </div>
                        <div class="about-wrap">
                            <p class="title-color">{!! @$contents->aboutContent[0]->body !!}</p>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <!-- About Section End -->
    @else        
    <!-- Board Managment Section Start -->
    <div class="rs-board-staff pt-100 md-pt-80">
        <div class="container">
            <div class="staf-wrap pb-100 md-pb-80">
                <ul class="staf-area">
                    @if (!@$contents->aboutContent->isEmpty()??'')
                        @foreach ($contents->aboutContent as $content)                            
                            <li class="staff-item">
                                <div class="item-wrap">
                                    <div class="staff-img">
                                        @if (@$content->images->path == '')
                                        <img src="{{ asset('uploads/about/1.jpg') }}" alt="">
                                        @else
                                        <img src="{{ asset('uploads/about/'.@$content->images->path??'') }}" alt="">
                                        @endif
                                        
                                    </div>
                                    <div class="staff-desc">
                                        <div class="inner-desc">
                                            <h3 class="staff-title">{{ $content->name }}</h3>
                                            <h4 class="staff-sub">{{ $content->about->name }}</h4>
                                            <span class="sub1"><i>Position</i>: {{ $content->officePosition->name }}</span>
                                            <span class="sub2"><i>Member Since </i>: {{ $content->created_at->format('M d, Y') }}</span>
                                            {{-- <span class="sub3"><i>Joined Club</i>: {{ $content->date_joined_club->format('M d, Y') }}</span> --}}
                                            <p class="margin-0">{!! $content->body !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="alert alert-info text-center"><b>Nothing Found!</b></div>
                    
                    @endif
                </ul>
            </div>

            <!-- Subscribe Section Start -->
           @include('temp.subscribe_section')
            <!-- Subscribe Section End -->
        </div>
    </div>
    <!-- Board Managment Section End -->
    @endif
@endsection