@extends('layouts.guest')
@section('extra-css')
   
@endsection
@section('slider')
    @include('temp.breadcrumb')
@endsection
@section('content')
<div class="rs-gallery style1 pt-100 md-pt-80">
    <div class="container">
        <div class="row pb-100 md-pb-80">
            @foreach ($galleries as $item)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="gallery-grid">
                    <div class="gallery-img-box">
                        <img src="{{ asset('uploads/gallery/'.$item->images->path)}}" alt="Gallery Image">
                        <a class="image-popup view-btn" href="{{ asset('uploads/gallery/'.$item->images->path)}}">
                            <i class="flaticon-add-circular-button"></i>
                        </a>
                    </div>                    
                </div>
            </div>
            @endforeach
            <div class="col-12 pb-5">{{ $galleries->links() }}</div>
        </div>
            
        
        <!-- Subscribe Section Start -->
       @include('temp.subscribe_section')
        <!-- Subscribe Section End -->
    </div>
</div>
@endsection