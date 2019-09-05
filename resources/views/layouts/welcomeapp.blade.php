<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HR-App</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logohrapk.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style type="text/css">
        #email:focus {
            border-color: #0f5b94;
        }
        #password:focus {
            border-color: #0f5b94;
        }
    </style>
</head>

<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('{{asset('images/1.jpg')}}');
background-repeat: repeat,no-repeat;
background-size: cover;
background-position: center;
opacity: 0.8;">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
        <!-- sidebar menu area end -->
        <!-- main content area start -->

                            @if(! @guest)
                             <script type="text/javascript">
                                 location.href="{{ route("home") }}";
                             </script>
                            @endguest
        <!-- main content area end -->
        <!-- footer area start-->
            @yield('content')

        <!-- footer area end--> 
        <footer>
            <div class="footer-area fixed-bottom" style="background-color: transparent;">
                <p style="color: #fff;">&copy; Gamma Solution</p>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js') }}"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js') }}"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js') }}"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('js/plugins.js') }}"></script>

    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="{{ asset('js/waves-effect.js') }}"></script>

    @section('js')

    @show

</body>

</html>