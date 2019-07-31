
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
        .custom-select {
            padding-right: 20px;
        }
        #navbarDropdown {
            color: #fff;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header" style="background: #0f5b94; border: none; padding-bottom: 10px;">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logohr.png') }}" alt="logo" width="50" height="50"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="sidebar-items1"><a class="waves-effect" anim="ripple" href="{{ route('home') }}"><i class="ti-map-alt"></i> <span>Dashboard</span></a></li>

                                @if(Auth::user()->status == "Pegawai" )
                                <li class="sidebar-items2">
                                    <a class="waves-effect" anim="ripple" href=""><i class=""></i> <span>Profil</span></a>
                                </li>

                                @endif
                                @if(Auth::user()->status == "Admin" )
                               <li class="sidebar-items2">
                                
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-harddrive"></i>
                                    <span>Manajemen Akun</span></a>
                                <ul class="collapse">

                                    
                                    <li><a href="{{ route('akun.index') }}">HR</a></li>
                                    
                                </ul>
                             </li> 
                                @endif

                                @if(Auth::user()->status == "HR" )

                               <li class="sidebar-items2">
                                
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-harddrive"></i>
                                    <span>Manajemen Akun</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('akunpegawai.indexpegawai') }}">Pegawai</a></li>
                                </ul>
                             </li> 
                                @endif
                        @if(Auth::user()->status == "Admin" )
                            <li class="sidebar-items3">
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Data Master</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
                                </ul>
                            </li> 
                        @endif

                        @if(Auth::user()->status == "HR" )
             
                            <li class="sidebar-items3"> 
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-user"></i>
                                    <span>Pegawai</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
                                    <li><a href="{{ route('absen.index') }}">Absensi</a></li>
                                    <li><a href="">Gaji</a></li>
                                </ul>
                            </li>                             
                            <li class="sidebar-items4"><a class="waves-effect" anim="ripple" href="{{ route('sp.create') }}"><i class="ti-email"></i> <span>Surat Peringatan</span></a></li>
                            <li class="sidebar-items5"><a class="waves-effect" anim="ripple" href="{{ route('perjalanan.create') }}"><i class="ti-email"></i> <span>Surat Perjalanan</span></a></li>
                            

                            <li class="sidebar-items6">
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-printer"></i>
                                    <span>Report</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('sp.index') }}">Surat SP</a></li>
                                    <li><a href="{{ route('perjalanan.index') }}">Surat Perjalanan</a></li>
                                </ul>
                            </li> 
                    @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->

        <div class="header" style="border:none;-webkit-box-shadow: -7px 10px 5px 0px rgba(0,0,0,0.5);
-moz-box-shadow: -7px 10px 5px 0px rgba(0,0,0,0.5);
box-shadow: -7px 10px 5px 0px rgba(0,0,0,0.5);">
           <!-- header area start -->
            <div class="header-area" style="background-color: #0f5b94;border:none;">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            

                             <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle waves-effect" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre anim="ripple"> Hai,
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->status == "Admin" || Auth::user()->status == "Pegawai")
                                    <a class="dropdown-item" href="#"><i class="menu-icon ti-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="menu-icon ti-shift-left"></i>
                                         {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="menu-icon ti-shift-left"></i>
                                         {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->

        </div>
        <!-- main content area end -->
        <!-- footer area start-->
         <div class="card-body">
            @yield('content')

        </div>

        <!-- footer area end-->
    </div>

        <footer>
            <div class="footer-area">
                <p style="color: #585858;">Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
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

    <script src="{{ asset('vendors/jquery/dist/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery/jquery-input-mask-phone-number.js') }}"></script>

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

    <script>
      $(function () {
        $('#data-id').DataTable();
      })
    </script>
    <script>
      $(function () {
        $('#data-tbl').DataTable();
      })
    </script>

    <script>
      $(document).ready(function () {
        $('#cc').inputmask("9999-9999-9999");
      });
    </script>
    <script src="{{ asset('js/waves-effect.js') }}"></script>

</body>

</html>
