@extends('layouts.guest')

@section('slider')
    @include('temp.slider')    
@endsection

@section('extra-css')
    <style></style>
@endsection

@section('content')
  

    <!--about us start-->
    
    <section>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="section-title">
              <h2 class="title">about Our <span>Company</span></h2>
              <p class="mb-0">{{config('app.name')}} Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="row">
              <div class="col-md-6 pe-2">
                <div class="about-img mb-3">
                  <img class="img-fluid" src="{{ asset('temp/assets/images/about/02.jpg') }}" alt="">
                </div>
                <div class="about-img">
                  <img class="img-fluid" src="{{ asset('temp/assets/images/about/01.jpg') }}" alt="">
                </div>
              </div>
              <div class="col-md-6 mt-4 ps-2">
                <div class="about-img mb-3">
                  <img class="img-fluid" src="{{ asset('temp/assets/images/about/03.jpg') }}" alt="">
                </div>
                <div class="about-img">
                  <img class="img-fluid" src="{{ asset('temp/assets/images/about/04.jpg') }}" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 box-shadow white-bg p-md-4 p-3 mt-5 mt-lg-0">
            <h5>What We Do</h5>
            <p class="line-h-3">{{config('app.name')}} have facility to produce adipisicing elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi vero minima impedit aliquam id. consectetur adipisicing elit. impedit aliquam id. consectetur adipisicing elit. technologicaly changes and industrial systems.</p>
            <div class="row text-black mt-4">
              <div class="col-sm-6">
                <ul class="list-unstyled">
                <li class="mb-2">- Certified Engineers</li>
                <li class="mb-2">- Design in Quality</li>
                <li>- Best Branding</li>
                </ul>
              </div>
              <div class="col-sm-6 mt-3 mt-sm-0">
                <ul class="list-unstyled">
                <li class="mb-2">- Expert Engineers</li>
                <li class="mb-2">- Integrity</li>
                <li>- Certified Engineers</li>
              </ul>
              </div>
            </div>
            <div class="row mt-2">
          <div class="col-md-12">
            <div class="ht-progress-bar style-2">
              <h4>Contracting</h4>
              <div class="progress" data-value="90">
                <div class="progress-bar">
                  <div class="progress-parcent"><span>90</span>%</div>
                </div>
              </div>
            </div>
            <div class="ht-progress-bar style-2">
              <h4>Plumbing</h4>
              <div class="progress" data-value="65">
                <div class="progress-bar">
                  <div class="progress-parcent"><span>65</span>%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--about us end-->
    
    
    <!--service start-->
    
    <section class="dark-bg text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="section-title">
              <h2 class="title">Our <span> Services</span></h2>
              <p class="mb-0 text-white">{{config('app.name')}} Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel" data-items="3" data-md-items="2" data-sm-items="1" data-xs-items="1" data-margin="30">
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="images/service/01.jpg" alt="">
                    <div class="service-icon"> <i class="flaticon-industrial-robot"></i>
                    </div>
                  </div>
                  <div class="service-description">
                    <h4>Chemical Research</h4>
                    <p>Modern society consumes, consectetur adipisicing elit. Id quae quos cum consequuntur maiores possimus fugiat repellat totam.</p> <a href="chemical-research.html">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="images/service/02.jpg" alt="">
                    <div class="service-icon"> <i class="flaticon-maintenance"></i>
                    </div>
                  </div>
                  <div class="service-description">
                    <h4>Energy & Power Engineering</h4>
                    <p>Modern society consumes, consectetur adipisicing elit. Id quae quos cum consequuntur maiores possimus fugiat repellat totam.</p> <a href="energy-%26-power-engineering.html">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="images/service/03.jpg" alt="">
                    <div class="service-icon"> <i class="flaticon-fuel-station"></i>
                    </div>
                  </div>
                  <div class="service-description">
                    <h4>Petroleum and Gas</h4>
                    <p>Modern society consumes, consectetur adipisicing elit. Id quae quos cum consequuntur maiores possimus fugiat repellat totam.</p> <a href="petroleum-and-gas.html">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="images/service/04.jpg" alt="">
                    <div class="service-icon"> <i class="flaticon-growth"></i>
                    </div>
                  </div>
                  <div class="service-description">
                    <h4>Agriculture Engineering</h4>
                    <p>Modern society consumes, consectetur adipisicing elit. Id quae quos cum consequuntur maiores possimus fugiat repellat totam.</p> <a href="agriculture-engineering.html">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="images/service/05.jpg" alt="">
                    <div class="service-icon"> <i class="flaticon-settings"></i>
                    </div>
                  </div>
                  <div class="service-description">
                    <h4>Mechanical Engineering</h4>
                    <p>Modern society consumes, consectetur adipisicing elit. Id quae quos cum consequuntur maiores possimus fugiat repellat totam.</p> <a href="mechanical-engineering.html">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="images/service/06.jpg" alt="">
                    <div class="service-icon"> <i class="flaticon-worker"></i>
                    </div>
                  </div>
                  <div class="service-description">
                    <h4>Civil Engineering</h4>
                    <p>Modern society consumes, consectetur adipisicing elit. Id quae quos cum consequuntur maiores possimus fugiat repellat totam.</p> <a href="civil-engineering.html">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--service end-->
    
    
    <!--feauture start-->
    
    <section class="grey-bg pattern feuture-bottom white-overlay" data-bg-img="images/pattern/01.png" data-overlay="3">
      <div class="container">
        <div class="row g-0 align-items-center">
          <div class="col-lg-6 col-md-6 pe-lg-5 md-px-2 text-center">
            <div class="section-title mb-md-0">
              <h2 class="title">Why <span> Choose Us</span></h2>
              <p class="mb-0">{{config('app.name')}} have facility to produce adipisicing elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit, Excepturi vero minima impedit aliquam.</p>          
            </div>
          </div>
          <div class="col-md-6">
            <div class="featured-item bottom-icon">
              <div class="featured-title text-uppercase">
                <h5>Latest Technology</h5>
              </div>
              <div class="featured-desc">
                <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing elit. Donec nec eros eget pellentesque et non erat. Maecenas nibh dolor, males uada et bibendu ma</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-innovation"></i>
              </div> <span><i class="flaticon-innovation"></i></span>
            </div>
          </div>
        </div>
        <div class="row g-0">
          <div class="col-lg-3 col-md-6">
            <div class="featured-item bottom-icon">
              <div class="featured-title text-uppercase">
                <h5>Always Connected</h5>
              </div>
              <div class="featured-desc">
                <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing elit. Donec nec eros eget pellentesque et non erat. Maecenas nibh dolor, males uada et bibendu ma</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-chat-bubble"></i>
              </div> <span><i class="flaticon-chat-bubble"></i></span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="featured-item bottom-icon">
              <div class="featured-title text-uppercase">
                <h5>Expert Team</h5>
              </div>
              <div class="featured-desc">
                <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing elit. Donec nec eros eget pellentesque et non erat. Maecenas nibh dolor, males uada et bibendu ma</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-employee"></i>
              </div> <span><i class="flaticon-employee"></i></span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="featured-item bottom-icon">
              <div class="featured-title text-uppercase">
                <h5>Easy And Fast</h5>
              </div>
              <div class="featured-desc">
                <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing elit. Donec nec eros eget pellentesque et non erat. Maecenas nibh dolor, males uada et bibendu ma</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-innovation-1"></i>
              </div> <span><i class="flaticon-innovation-1"></i></span>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="featured-item bottom-icon">
              <div class="featured-title text-uppercase">
                <h5>Delivery Time</h5>
              </div>
              <div class="featured-desc">
                <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing elit. Donec nec eros eget pellentesque et non erat. Maecenas nibh dolor, males uada et bibendu ma</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-alarm-clock"></i>
              </div> <span><i class="flaticon-alarm-clock"></i></span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--feauture end-->
    
    
    <!--project start-->
    
    <section class="overflow-hidden">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="section-title">
              <h2 class="title">Latest <span> Projects</span></h2>
              <p class="mb-0">{{config('app.name')}} Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <div class="portfolio-filter">
              <button data-filter="" class="is-checked">All</button>
              <button data-filter=".cat1">Mechanical</button>
              <button data-filter=".cat2">Plumbing</button>
              <button data-filter=".cat3">Welding</button>
              <button data-filter=".cat4">Chemical</button>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="masonry row columns-4 g-0 popup-gallery">
              <div class="grid-sizer"></div>
              <div class="masonry-brick cat3">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/01.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/01.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat3">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/03.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/03.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat4">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/02.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/02.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat2">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/04.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/04.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat1">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/07.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/07.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat1">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/08.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/08.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat3">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/06.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/06.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat4">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/05.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/05.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat4">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/09.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/09.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="masonry-brick cat1">
                <div class="portfolio-item">
                  <img src="images/portfolio/masonry/10.jpg" alt="">
                  <div class="portfolio-hover">
                    <div class="portfolio-title"> <span>Welding, Chemical</span>
                      <h4>Project Title</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="images/portfolio/large/10.jpg"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="project-details.html"> <i class="flaticon-broken-link-1"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--project end-->
    
    
    <!--pricing start-->
    
    <section class="pt-0">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="section-title">
              <h2 class="title">Choose Best <span> Asset</span></h2>
              <p class="mb-0">{{config('app.name')}} Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="price-table">
              <div class="price-header">
                <h4 class="price-title">Starter</h4>
                <div class="price-value">
                  <h2>
                  <span class="price-dollar">$</span>99
                </h2>
                </div> <span class="price-month">/Month</span>
              </div>
              <div class="price-list text-center">
                <ul class="list-unstyled">
                  <li>Free Consultation</li>
                  <li>Unlimited Site licenses</li>
                  <li>1 Database</li>
                  <li>50gb Web Storage</li>
                  <li>Html + Css</li>
                  <li>24/7 Customer Support</li>
                </ul>
              </div>
              <a class="btn btn-border btn-circle mt-4" href="#"> <span>Buy Now</span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
            <div class="price-table">
              <div class="price-header">
                <h4 class="price-title">Personal</h4>
                <div class="price-value">
                  <h2>
                  <span class="price-dollar">$</span>199
                </h2>
                </div> <span class="price-month">/Month</span>
              </div>
              <div class="price-list text-center">
                <ul class="list-unstyled">
                  <li>Free Consultation</li>
                  <li>Unlimited Site licenses</li>
                  <li>2 Database</li>
                  <li>70gb Web Storage</li>
                  <li>Html + Css</li>
                  <li>24/7 Customer Support</li>
                </ul>
              </div>
              <a class="btn btn-border btn-circle mt-4" href="#"> <span>Buy Now</span>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
            <div class="price-table">
              <div class="price-header">
                <h4 class="price-title">Professional</h4>
                <div class="price-value">
                  <h2>
                  <span class="price-dollar">$</span>299
                </h2>
                </div> <span class="price-month">/Month</span>
              </div>
              <div class="price-list text-center">
                <ul class="list-unstyled">
                  <li>Free Consultation</li>
                  <li>Unlimited Site licenses</li>
                  <li>3 Database</li>
                  <li>90gb Web Storage</li>
                  <li>Html + Css</li>
                  <li>24/7 Customer Support</li>
                </ul>
              </div>
              <a class="btn btn-border btn-circle mt-4" href="#"> <span>Buy Now</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--pricing end-->
    
    
    <!--counter start-->
    
    <section class="grey-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="counter"> <i class="flaticon-innovation"></i>
              <span class="count-number" data-to="150" data-speed="10000">150</span>
              <label>Projects</label>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="counter"> <i class="flaticon-pencil"></i>
              <span class="count-number" data-to="175" data-speed="10000">175</span>
              <label>Success Project</label>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="counter mt-3 mt-lg-0"> <i class="flaticon-coffee-cup"></i>
              <span class="count-number" data-to="344" data-speed="10000">344</span>
              <label>Coffee Cup</label>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="counter mt-3 mt-lg-0"> <i class="flaticon-employee"></i>
              <span class="count-number" data-to="125" data-speed="10000">125</span>
              <label>Happy Clients</label>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--counter end-->
    
    
    <!--multi section start-->
    
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="owl-carousel no-pb" data-dots="false" data-items="3" data-margin="30" data-autoplay="true">
              <div class="item">
                <img class="img-fluid" src="images/client/03.png" alt="">
              </div>
              <div class="item">
                <img class="img-fluid" src="images/client/04.png" alt="">
              </div>
              <div class="item">
                <img class="img-fluid" src="images/client/03.png" alt="">
              </div>
              <div class="item">
                <img class="img-fluid" src="images/client/04.png" alt="">
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-sm-12">
                <div class="tab">
                  <!-- Nav tabs -->
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tab1-1" type="button" role="tab" aria-controls="tab1-1" aria-selected="true">Our Mission</button>
                      <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tab2-1" type="button" role="tab" aria-controls="tab2-1" aria-selected="false">Our Vission</button>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tab1-1" role="tabpanel" aria-labelledby="tab-1">
                      <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                      <div class="row text-black mt-4">
                        <div class="col-sm-6">
                          <ul class="list-unstyled">
                            <li class="mb-2">- Certified Engineers</li>
                            <li class="mb-2">- Design in Quality</li>
                            <li>- Best Branding</li>
                          </ul>
                        </div>
                        <div class="col-sm-6 mt-3 mt-sm-0">
                          <ul class="list-unstyled">
                            <li class="mb-2">- Expert Engineers</li>
                            <li class="mb-2">- Integrity</li>
                            <li>- Certified Engineers</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab2-1" role="tabpanel" aria-labelledby="tab-2">
                      <p class="mb-0 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                      <div class="row text-black mt-4">
                        <div class="col-sm-6">
                          <ul class="list-unstyled">
                            <li class="mb-2">- Certified Engineers</li>
                            <li class="mb-2">- Design in Quality</li>
                            <li>- Best Branding</li>
                          </ul>
                        </div>
                        <div class="col-sm-6 mt-3 mt-sm-0">
                          <ul class="list-unstyled">
                            <li class="mb-2">- Expert Engineers</li>
                            <li class="mb-2">- Integrity</li>
                            <li>- Certified Engineers</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 mt-5 mt-lg-0">
            <div class="accordion" id="accordion">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            consectetur adipisicing elit, sed ?
          </button>
        </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                  <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Duis aute dolor in reprehenderit.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            temporo incididunt ut labore et dolore ?
          </button>
        </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                  <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Duis aute dolor in reprehenderit.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            quis nostrd exercitation ullamco laboris ?
          </button>
        </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                  <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Duis aute dolor in reprehenderit.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--multi section end-->
    
    
    <!--testimonial start-->
    
    <section class="dark-bg parallaxie" data-bg-img="images/bg/02.jpg" data-overlay="9">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-8 mx-auto">
            <div class="section-title">
              <h2 class="title">Our <span> Testimonial</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="owl-carousel" data-items="1" data-autoplay="true">
              <div class="item">
                <div class="row justify-content-center">
                  <div class="col-lg-10">
                    <div class="testimonial position-relative">
                      <div class="d-md-flex align-items-center">
                        <div class="flex-shrink-0">
                          <div class="testimonial-avatar">
                            <div class="testimonial-img">
                              <img class="img-fluid" src="images/thumbnail/01.png" alt="">
                            </div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-md-5 mt-5 mt-md-0">
                          <div class="testimonial-content"> <span><i class="fas fa-quote-left"></i></span>
                            <p>consectetur adipisicing elit. Totam mollitia incidunt vero cupiditate obcaecati iusto tempora unde! Numquam officiis, quae adipisci quam laudantium nulla modi. adipisci quam laudantium nulla modi. Totam mollitia incidunt vero cupiditate obcaecati</p>
                            <div class="testimonial-caption">
                              <h6>John Doe -</h6>
                              <label>Architect</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row justify-content-center">
                  <div class="col-lg-10">
                    <div class="testimonial position-relative">
                      <div class="d-md-flex align-items-center">
                        <div class="flex-shrink-0">
                          <div class="testimonial-avatar">
                            <div class="testimonial-img">
                              <img class="img-fluid" src="images/thumbnail/02.png" alt="">
                            </div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-md-5 mt-5 mt-md-0">
                          <div class="testimonial-content"> <span><i class="fas fa-quote-left"></i></span>
                            <p>consectetur adipisicing elit. Totam mollitia incidunt vero cupiditate obcaecati iusto tempora unde! Numquam officiis, quae adipisci quam laudantium nulla modi. adipisci quam laudantium nulla modi. Totam mollitia incidunt vero cupiditate obcaecati</p>
                            <div class="testimonial-caption">
                              <h6>Kelly Rain -</h6>
                              <label>Engineers</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row justify-content-center">
                  <div class="col-lg-10">
                    <div class="testimonial position-relative">
                      <div class="d-md-flex align-items-center">
                        <div class="flex-shrink-0">
                          <div class="testimonial-avatar">
                            <div class="testimonial-img">
                              <img class="img-fluid" src="images/thumbnail/03.png" alt="">
                            </div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-md-5 mt-5 mt-md-0">
                          <div class="testimonial-content"> <span><i class="fas fa-quote-left"></i></span>
                            <p>consectetur adipisicing elit. Totam mollitia incidunt vero cupiditate obcaecati iusto tempora unde! Numquam officiis, quae adipisci quam laudantium nulla modi. adipisci quam laudantium nulla modi. Totam mollitia incidunt vero cupiditate obcaecati</p>
                            <div class="testimonial-caption">
                              <h6>Jamy Lynn -</h6>
                              <label>Manager</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--testimonial end-->
    
    
    <!--team start-->
    
    <section>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="section-title">
              <h2 class="title">Meet With <span> Engineers</span></h2>
              <p class="mb-0">{{config('app.name')}} Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="team-member text-center">
              <div class="team-images">
                <img class="img-fluid" src="images/team/01.jpg" alt="">
                <div class="team-social-icon">
                  <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-description">
                <h5><a href="team-single.html">John Maxwell</a></h5>
                <span>Architect</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
            <div class="team-member text-center">
              <div class="team-images">
                <img class="img-fluid" src="images/team/02.jpg" alt="">
                <div class="team-social-icon">
                  <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-description">
                <h5><a href="team-single.html">Matthew Doe</a></h5>
                <span>Mechanical</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
            <div class="team-member text-center">
              <div class="team-images">
                <img class="img-fluid" src="images/team/03.jpg" alt="">
                <div class="team-social-icon">
                  <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-description">
                <h5><a href="team-single.html">Romi Keely</a></h5>
                <span>Manager</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--team end-->
    
    
    <!--subscribe start-->
    
    <section class="grey-bg py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8 col-sm-12">
            <h3 class="text-black">Are You Looking Great Solution <span class="text-theme font-weight-bold"> For Your Company?</span></h3>
          </div>
          <div class="col-md-4 col-sm-12 text-md-end mt-3 mt-md-0"> <a href="#" class="btn btn-theme"><span>Contact Us</span></a>
          </div>
        </div>
      </div>
    </section>
    
    <!--subscribe end-->
    
    
    <!--blog start-->
    
    <section>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="section-title">
              <h2 class="title">Latest <span> News</span></h2>
              <p class="mb-0">Latest News For Our Solution Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="post">
              <div class="post-image">
                <img src="images/blog/01.jpg" alt="">
                <div class="post-date">23 April, 2019</div>
              </div>
              <div class="post-desc">
                <div class="post-title">
                  <h5><a href="blog-details-right-sidebar.html">The engineer of industrial</a></h5>
                </div>
                <p>Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</p>
              </div>
              <div class="post-bottom">
                <div class="post-meta">
                  <ul class="list-inline">
                    <li>Like</li>
                    <li>Comment</li>
                  </ul>
                </div> <a class="post-btn" href="blog-details-right-sidebar.html">Read More<i class="ms-2 fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
            <div class="post">
              <div class="post-image">
                <img src="images/blog/02.jpg" alt="">
                <div class="post-date">23 April, 2019</div>
              </div>
              <div class="post-desc">
                <div class="post-title">
                  <h5><a href="blog-details-right-sidebar.html">Management of workflows</a></h5>
                </div>
                <p>Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</p>
              </div>
              <div class="post-bottom">
                <div class="post-meta">
                  <ul class="list-inline">
                    <li>Like</li>
                    <li>Comment</li>
                  </ul>
                </div> <a class="post-btn" href="blog-details-right-sidebar.html">Read More<i class="ms-2 fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 mt-5 mt-lg-0">
            <div class="post">
              <div class="post-image">
                <img src="images/blog/03.jpg" alt="">
                <div class="post-date">23 April, 2019</div>
              </div>
              <div class="post-desc">
                <div class="post-title">
                  <h5><a href="blog-details-right-sidebar.html">industrial profits grow</a></h5>
                </div>
                <p>Cras ultricies ligula sed magna dictum porta, Sed ut perspiciatis unde omnis iste natus error sit voluptat</p>
              </div>
              <div class="post-bottom">
                <div class="post-meta">
                  <ul class="list-inline">
                    <li>Like</li>
                    <li>Comment</li>
                  </ul>
                </div> <a class="post-btn" href="blog-details-right-sidebar.html">Read More<i class="ms-2 fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--blog end-->
    
            
@endsection