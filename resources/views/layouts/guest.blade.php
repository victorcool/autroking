<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<!-- Mirrored from rstheme.com/products/html/khelo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 14:31:06 GMT -->
<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <meta name="description" content="Health care delivery, educational books suplies to school and providing and rendering of Environmental service" />
    
    <meta name="keywords" content="Healthcare, Factory, Industrial, building, business, chemicals, multipurpose, Books, Enviroment, suppies, material, waste products" />
    <meta name="author" content="www.allforteck.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <title>{{ config('app.name') }} | {{ $title }}</title>
    
    @include('inc.cssLinks')
    @yield('extra-css')
</head>
    <body>
        <!-- page wrapper start -->
        <div class="page-wrapper">
        <!-- preloader start -->
            <div id="ht-preloader" style="background: black;">
                <div class="loader clear-loader"><img class="heartbeat" src="{{ asset('temp/assets/images/favicon.png') }}" style="width: 100px;" alt=""></div>
            </div>
            
            <!-- preloader end -->

            <!--Full width header Start-->
            @include('temp.header')
            <!--Full width header End-->

            <!-- Slider Section Start -->
            @yield('slider')
            <!-- Slider Section End -->

            <!--body content start-->
            <div class="page-content">
                @yield('content')
            </div>
            @include('temp.footer')
        </div>
        
        <!-- modernizr js -->
        
        <a class="contact-btn">
            <div class="contact-bg">Get a Quote</div>
        </a>

        <div class="contact-form text-black"> <a class="close-btn text-capitalize text-end"><i class="flaticon-cancel"></i></a>
            <h2 class="title mb-5">Request A <span> Quote </span></h2>
            <form id="queto-form" method="post" action="https://themeht.com/template/misto/html/ltr/php/contact.php">
            <div class="messages"></div>
            <div class="form-group">
                <input id="form_name1" type="text" name="name" class="form-control" placeholder="Your Name" required="required" data-error="Name is required.">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input id="form_email1" type="email" name="email" class="form-control" placeholder="Your Email" required="required" data-error="Valid email is required.">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input id="form_project1" type="text" name="name" class="form-control" placeholder="Project Name" required="required">
            </div>
            <div class="form-group">
                <textarea id="form_message1" name="message" class="form-control" placeholder="Your Message" rows="3" required="required" data-error="Please,leave us a message."></textarea>
                <div class="help-block with-errors"></div>
            </div>
            <button class="btn btn-border btn-radius"><span>Submit</span>
            </button>
            </form>
        </div>
        
        <!-- get a quote end -->
        
        
        <!--back-to-top start-->
        
        <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="fas fa-chevron-up"></i></a></div>
        
        <!--back-to-top end-->
        @include('inc.jsLinks')

        @yield('extra-js')        
    </body>

<!-- Mirrored from rstheme.com/products/html/khelo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 14:33:25 GMT -->
</html>