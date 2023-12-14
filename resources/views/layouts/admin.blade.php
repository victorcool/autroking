
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>{{config('app.name')}}-{{$title??null}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="The most credible credit scoring platform" name="description" />
<meta content="Nakroteck" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
<link rel="shortcut icon" href="{{asset('temp/admin/assets/images/favicon.ico')}}">
        <!-- plugins -->
<link href="{{asset('temp/admin/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/libs/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 
<link href="{{asset('temp/admin/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
<link href="{{asset('temp/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/theme.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('temp/admin/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('temp/admin/assets/plugins/Font-Awesome-master/css/all.min.css?v=1') }}">
<link rel="stylesheet" href="{{asset('temp/admin/assets/plugins/Font-Awesome-master/css/fontawesome.min.css?v=1') }}">
@yield('styles')
</head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('temp.admin.topbar')
            <!-- end Topbar -->
            

            <!-- ========== Left Sidebar Start ========== -->
            @include('temp.admin.left-side-bar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    @include('inc.messages')
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">{{ucwords($title?? 'Dashboard')}}</h4>
                            </div>
                        </div>

                        <!-- content -->
                             @yield('content')

                         <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                {{date('Y')}} &copy; {{config('app.name')}}. All Rights Reserved
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
       @yield('right-side-bar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        
    <script src="{{asset('temp/admin/assets/js/vendor.min.js')}}"></script>
        <!-- optional plugins -->
    <script src="{{asset('temp/admin/assets/libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <!-- page js -->
    <script src="{{asset('temp/admin/assets/js/pages/dashboard.init.js')}}"></script>
        <!-- App js -->
    <script src="{{asset('temp/admin/assets/js/app.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/js/main.js')}}"></script>
    <script src="{{asset('temp/admin/assets/js/custom.js?v='.now().'')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- datatable js -->
    <script src="{{asset('temp/admin/assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    
    <script src="{{asset('temp/admin/assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/buttons.print.min.js')}}"></script>

    <script src="{{asset('temp/admin/assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('temp/admin/assets/libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{asset('plugins/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Datatables init -->
    <script src="{{asset('temp/admin/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{asset('plugins/Loading-Spinner-Sprite-Animation-jQuery-Preloaders/jquery.preloaders.min.js')}}"></script>
@yield('scripts')
<script>
function myFunction() {
    confirm("Are you sure about this ?");
  }
  </script>

<script>
    $(document).ready(function(){
        setTimeout(() => {
            $(".myalert").fadeTo(2000, 500).slideUp(500, function() {
            $(".myalert").slideUp(1000);
            });
        }, 1000)
        });
</script>
<script>
    $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>


<script type="text/javascript">
    $(function () {
        $('.myDatePicker').datetimepicker({
            "format": "YYYY-MM-DD HH:mm:ss",
        });
    });
    
 </script>



@php
    $action = '';   
    if(Auth::guard('admin')->check()){
        $action = route('admin.logout');
    }    
    if(Auth::guard('web')->check()){
        $action = route('logout');
    }    
@endphp

<form id="logout-form" action="{{$action}}" method="POST" class="d-none">
    @csrf
</form>

    </body>
</html>
