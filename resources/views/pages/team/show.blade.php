@extends('layouts.guest')

@section('slider')
    @include('temp.breadcrumb')
@endsection

@section('content')
   
  <!-- Single Club Section Start -->
  <div class="rs-single-team sec-bg pt-100 md-pt-80 md-pb-80">
    <div class="container">
        <div class="row pb-100 md-pb-80">
            <div class="col-lg-4 md-mb-50">
                <div class="player-image">
                    <img src="{{ asset('uploads/team_images/'.@$player->images->path??'') }}" alt="">
                    <div class="name-box">
                        <h3 class="player-name">Jores Leperto</h3>
                        <span class="player-position">Defender</span>
                        <span class="club">Real Madrid</span>
                        <ul class="social-icon">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                        <div class="squad-no"> 11</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pl-35 md-pl-15">
                <div class="player-detail mb-50">
                    <h3 class="title">Player Profile</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Date of Birth</td>
                                <td>January 5th, 1992</td>
                            </tr>
                            <tr>
                                <td>Place of Birth</td>
                                <td>Railze, Red Island</td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td>183cm</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>69kg</td>
                            </tr>
                            <tr>
                                <td>Citizenship</td>
                                <td>Red Island</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="player-detail">
                    <h3 class="title">Career Information</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Matches</td>
                                <td>65 matches</td>
                            </tr>
                            <tr>
                                <td>Goals</td>
                                <td>30 goals</td>
                            </tr>
                            <tr>
                                <td>Discipline</td>
                                <td>5 fouls against</td>
                            </tr>
                            <tr>
                                <td>Spot Kick</td>
                                <td>18 Free Kick</td>
                            </tr>
                            <tr>
                                <td>Club Debut</td>
                                <td>January 21, 2010</td>
                            </tr>
                            <tr>
                                <td>Previous Club</td>
                                <td>Chelsea</td>
                            </tr>
                            <tr>
                                <td>Present Club</td>
                                <td>Real Madrid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="rs-tab pb-100 md-pb-80">
            <div class="single-team-data">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#team-overview">Player Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#player-gallery">Player Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#player-videos">Player Videos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="team-overview">
                        <p>{!! @$player->description??'' !!}</p>
                    </div>
                    <div class="tab-pane fade" id="player-gallery">
                        <div class="team-gallery">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/1.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/1.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/2.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/2.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/3.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/3.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/4.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/4.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 lg-mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/5.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/5.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 lg-mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/6.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/6.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 sm-mb-30">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/7.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/7.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="gallery-wrap">
                                        <img src="images/gallery/tab/8.jpg" alt="">
                                        <a class="image-popup" href="images/gallery/tab/8.jpg">
                                            <i class="flaticon-add-circular-button"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="player-videos">
                        <div class="club-videos">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-30">
                                    <div class="video-wrap">
                                        <a class="popup-videos" href="https://www.youtube.com/watch?v=pH_G1f6KzfI">
                                            <img src="images/video-thumb/1.jpg" alt="">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-30">
                                    <div class="video-wrap">
                                        <a class="popup-videos" href="https://www.youtube.com/watch?v=1vNmYNH8d4I">
                                            <img src="images/video-thumb/2.jpg" alt="">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-30">
                                    <div class="video-wrap">
                                        <a class="popup-videos" href="https://www.youtube.com/watch?v=jvrayw6wANg">
                                            <img src="images/video-thumb/3.jpg" alt="">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 md-mb-30">
                                    <div class="video-wrap">
                                        <a class="popup-videos" href="https://www.youtube.com/watch?v=1vNmYNH8d4I">
                                            <img src="images/video-thumb/2.jpg" alt="">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 sm-mb-30">
                                    <div class="video-wrap">
                                        <a class="popup-videos" href="https://www.youtube.com/watch?v=jvrayw6wANg">
                                            <img src="images/video-thumb/3.jpg" alt="">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="video-wrap">
                                        <a class="popup-videos" href="https://www.youtube.com/watch?v=pH_G1f6KzfI">
                                            <img src="images/video-thumb/1.jpg" alt="">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribe Section Start -->
        @include('temp.subscribe_section')
        <!-- Subscribe Section End -->
    </div>
</div>
<!-- Single Club Section End -->
@endsection