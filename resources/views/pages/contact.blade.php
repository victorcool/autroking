@extends('layouts.guest')
@section('slider')
    @include('temp.breadcrumb')
@endsection
@section('content')
<div class="rs-contact">
    <!-- Contact Icon Start -->
    <div class="rs-contact-icon pt-100 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-phone"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Call Us</h3>
                            <a class="icon-info" href="tel:+123456789">0439 718 058 (Naomi Dalwood)</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Mail Us</h3>
                            <a class="icon-info" href="mailto:secretary@salisburyunited.com.au">secretary@salisburyunited.com.au</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-phone"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Call Us</h3>
                            <a class="icon-info" href="tel:+123456789">0419 815 543 (Tony Dalwood)</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Mail Us</h3>
                            <a class="icon-info" href="mailto:treasurer@salisburyunited.com.au">treasurer@salisburyunited.com.au</a>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 xs-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-send"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Fax</h3>
                            <span>+3301-341-0476</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="icon-text after-none">
                            <h3 class="icon-title">Address</h3>
                            <span>khelo, USA, 103</span>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- Contact Icon End -->

    <!-- Contact Form And Map Start -->
    <div class="contact-part sec-bg pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 md-mb-30">
                    <div class="g-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.565374645371!2d138.6060924169144!3d-34.74134822510205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0b1042e3fba9b%3A0x1dfe541bbb7aa421!2s400%20Waterloo%20Corner%20Rd%2C%20Burton%20SA%205110%2C%20Australia!5e0!3m2!1sen!2sus!4v1690912885502!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 pl-50 md-pl-15">
                    <div class="contact-area">
                        <div class="title-style mb-50">
                            <h2 class="margin-0 uppercase">Get in Touch</h2>
                            <span class="line-bg left-line pt-10 y-b"></span>
                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-form" class="contact-form" method="post" action="https://rstheme.com/products/html/khelo/mailer.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="name" type="text" placeholder="Name" id="name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="email" type="email" placeholder="E-Mail" id="email" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="number" type="text" placeholder="Phone Number" id="phone_number" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="subject" type="text" placeholder="Subject" id="subject" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="from-control">
                                <textarea name="message" placeholder="Your Message Here" id="message" required="required"></textarea>
                            </div>
                            <div class="submit-btn">
                                <button class="readon" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form And Map End -->

    <div class="sec-bg md-pb-80">
        <div class="container">
            <!-- Subscribe Section Start -->
            <div class="rs-subscribe bg7 md-margin-0">
                <form class="subscribe-form">
                    <div class="row rs-vertical-middle">
                        <div class="col-lg-6 col-md-12 md-mb-30">
                            <div class="title-part">
                                <h2 class="title white-color"> Subscribe Our Newsletter</h2>
                                <p class="desc margin-0 white-color"> Subscribe to our newsletter for getting regular updates.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="subscribe-form-fields">
                                <input type="submit" class="news-submit" value="Subscribe">
                                <input type="email" class="news-email" name="EMAIL" placeholder="EMAIL ADDRESS" required="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Subscribe Section End -->
        </div>
    </div>
</div>
@endsection