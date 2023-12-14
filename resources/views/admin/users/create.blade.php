<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('paper-bootstrap-wizard-master/assets/img/favicon.png')}}" />
	<link rel="icon" type="image/png" href="{{asset('paper-bootstrap-wizard-master/assets/img/favicon.png')}}" />
	<title>{{config('app.name')}}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Canonical SEO -->
    <link rel="canonical" href="{{config('app.url')}}"/>

	<!-- CSS Files -->
    <link href="{{asset('paper-bootstrap-wizard-master/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('paper-bootstrap-wizard-master/assets/css/paper-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('paper-bootstrap-wizard-master/assets/css/demo.css')}}" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('paper-bootstrap-wizard-master/assets/css/themify-icons.css')}}" rel="stylesheet">
	{{-- plugin --}}
	<link rel="stylesheet" href="{{asset('plugins/intl-tel-input-master/build/css/intlTelInput.css')}}">
  	<link rel="stylesheet" href="{{asset('plugins/intl-tel-input-master/build/css/demo.css')}}">
    <link href="{{asset('plugins/countryPicker/niceCountryInput.css')}}" rel="stylesheet">
    
	</head>

	<body>
		<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="image-container set-full-height" style="background-image: url('{{asset('assets/images/bg/mitech-slider-cybersecurity-global-image.png')}}')">
	    <!--   Creative Tim Branding   -->
	    <a href="{{route('kp-admin')}}">
	         <div class="logo-container">
	            <div class="logo">
					<img src="{{asset('temp/assets/images/logo/dark-logo.png')}}" width="100" class="img-fluid" alt="">
	            </div>
	            <div class="brand">
	                {{config('app.name')}}
	            </div>
	        </div>
	    </a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
				<div class="wizard-container mt-0 pt-0">
					
                    @include('inc.messages')
            
                    <div class="card wizard-card" data-color="site-color" id="wizardProfile">
                    <form action="{{route('admin.account.store')}}" method="post" enctype="multipart/form-data">
                    <!--You can switch" data-color="orange" with one of the next bright colors: "blue", "green", "orange", "red", "site-color", "azure"          -->
                        @csrf
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title">Generate Client Bank Account</h3>
                            </div>

                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-user"></i>
                                        </div>
                                        General
                                    </a>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-settings"></i>
                                        </div>
                                        Contact
                                    </a>
                                </li>
                                <li>
                                    <a href="#address" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-map"></i>
                                        </div>
                                        Security
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{asset('paper-bootstrap-wizard-master/assets/img/default-avatar.jpg')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                <input type="file" id="wizard-picture" name="images[]" required>
                                            </div>
                                            <h6>Choose Picture</h6>
                                        </div>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <small>(required)</small></label>
                                        <input name="first_name" type="text" class="form-control" value="{{old('first_name')}}" placeholder="First name">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name <small>(required)</small></label>
                                            <input name="last_name" type="text" class="form-control" value="{{old('last_name')}}" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender <small>(required)</small></label>
                                                    <select name="gender" id="" class="form-control">
                                                        <option value="male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date OF Birth <small>(required)</small></label>
                                                    <input name="dob" id="Dob" value="{{old('dob')}}" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>												
                                    </div>
                                </div>
                            </div>
                           
                            <div class="tab-pane" id="address">								
                                
                                <div class="row">                                  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Account type</label>
                                            <select name="account_type" id="" class="form-control" required>
                                                @foreach ($account_types as $account_type)
                                                    <option value="{{$account_type->id}}">{{$account_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <h5 class="info-text"> Make sure to remember your pawword </h5>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password <small>(required)</small></label>
                                            <input name="password" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>confirm-assword <small>(required)</small></label>
                                            <input name="password_confirmation" type="password" class="form-control" required >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="account">		                                
                              
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <small>(required)</small></label>
                                            <input name="email" type="text" value="{{old('email')}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <small>(required)</small></label>
                                            <input name="phone" value="{{old('phone')}}" type="text" class="form-control" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Occupation <small>(required)</small></label>
                                            <input name="occupation" value="{{old('occupation')}}" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address <small>(required)</small></label>
                                            <input name="address" value="{{old('address')}}" type="text" class="form-control" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State <small>(required)</small></label>
                                            <input name="state" value="{{old('state')}}" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" class="form-control" id="">
                                                @foreach ($countries as $country)
                                                    <option value="{{old('country',$country->id)}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-blue btn-wd' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	            Made with <i class="fa fa-heart heart"></i> by <a href="#">{{config('app.name')}}</a>
	        </div>
	    </div>
		
	</div>

</body>
<script src="{{asset('plugins/intl-tel-input-master/build/js/intlTelInput.js')}}"></script>
<script>
  var input = document.querySelector("#phone");
  window.intlTelInput(input, {
	// allowDropdown: false,
	// autoHideDialCode: false,
	// autoPlaceholder: "off",
	// dropdownContainer: document.body,
	// excludeCountries: ["us"],
	// formatOnDisplay: false,
	geoIpLookup: function(callback) {
	  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
		var countryCode = (resp && resp.country) ? resp.country : "";
		callback(countryCode);
	  });
	},
	hiddenInput: "full_number",
	// initialCountry: "auto",
	// localizedCountries: { 'de': 'Deutschland' },
	// nationalMode: false,
	// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
	// placeholderNumberType: "MOBILE",
	// preferredCountries: ['cn', 'jp'],
	separateDialCode: true,
	utilsScript: "{{asset('plugins/intl-tel-input-master/build/js/utils.js')}}",
  });
</script>

	<!--   Core JS Files   -->
	<script src="{{asset('paper-bootstrap-wizard-master/assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('paper-bootstrap-wizard-master/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('paper-bootstrap-wizard-master/assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	{{-- <script src="assets/js/demo.js" type="text/javascript"></script> --}}
	<script src="{{asset('paper-bootstrap-wizard-master/assets/js/paper-bootstrap-wizard.js')}}" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="{{asset('paper-bootstrap-wizard-master/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/countryPicker/niceCountryInput.js')}}"></script>
    <script type="text/javascript">
		new NiceCountryInput($(".example")).init();
	</script>
	<script type="text/javascript">
		function onChangeCallback(ctr){
				// alert(ctr)
		   $('.country').attr('value',ctr);

		}
	</script>
</html>
