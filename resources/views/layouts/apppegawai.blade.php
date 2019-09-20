@if(Auth::user()->status == "HR")
    <script type="text/javascript">location.href = "{{route('home')}}";</script>
@endif
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
      <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">
    
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
    
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container" style="background-color: #fff;">
        <!-- sidebar menu area start -->
        @if(empty(Auth::user()->status) && empty(Auth::user()->nama))
            <script type="text/javascript">location.href="{{ route("login") }}";</script>
        @else
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
                            <li class="sidebar-items1 {{Route::is('home') ? 'active' : null}}"><a class="waves-effect" anim="ripple" href="{{ route('home') }}"><i class="ti-map-alt"></i> <span>Dashboard</span></a></li>
                                @if(Auth::user()->status == "Pegawai" )
                                <li class="sidebar-items2 {{Route::is('pegawai.profil') ? 'active' : null}}">
                                    <a class="waves-effect" anim="ripple" href="{{route('pegawai.profil',Auth::user()->id)}}"><i class="ti-user"></i> <span>Profil</span></a>
                                </li>
                                <li class="sidebar-items2 {{Route::is('absen.index') ? 'active' : null}}">
                                    <a class="waves-effect" anim="ripple" href="{{ route('absen.index') }}"><i class="ti-calendar"></i> <span>Absensi</span></a>
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

                               <li class="sidebar-items2 {{Route::is('akunpegawai.indexpegawai') ? 'active' : null}}">
                                
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-harddrive"></i>
                                    <span>Manajemen Akun</span></a>
                                <ul class="collapse {{Route::is('akunpegawai.indexpegawai') ? 'in' : null}}">
                                    <li class="{{Route::is('akunpegawai.indexpegawai') ? 'active' : null}}"><a href="{{ route('akunpegawai.indexpegawai') }}">Pegawai</a></li>
                                </ul>
                             </li> 
                                @endif
                    

                        @if(Auth::user()->status == "HR" )
                          <li class="sidebar-items3">
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Data Master</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('jabatan.index') }}">Jabatan</a></li>
                                </ul>
                            </li> 
             
                            <li class="sidebar-items3 @if(Route::is('pegawai.index') == 1 || Route::is('absen.index') == 1 || Route::is('gaji.create') == 1 || Route::is('pegawai.detail') == 1) active @endif"> 
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-user"></i>
                                    <span>Pegawai</span></a>
                                <ul class="collapse @if(Route::is('pegawai.index') == 1 || Route::is('absen.index') == 1) in @endif">
                                    <li class="@if(Route::is('pegawai.index') == 1 || Route::is('pegawai.detail') == 1) active @endif"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
                                    <li class="{{Route::is('absen.index') ? 'active' : null}}"><a href="{{ route('absen.index') }}">Absensi</a></li>
                                    <li class="{{Route::is('gaji.create') ? 'active' : null}}"><a href="{{ route('gaji.create') }}">Gaji</a></li>
                                </ul>
                            </li>                             
                            <li class="sidebar-items4 {{Route::is('sp.create') ? 'active' : null}}"><a class="waves-effect" anim="ripple" href="{{ route('sp.create') }}"><i class="ti-email"></i> <span>Surat Peringatan</span></a></li>
                            <li class="sidebar-items5 {{Route::is('perjalanan.create') ? 'active' : null}}"><a class="waves-effect" anim="ripple" href="{{ route('perjalanan.create') }}"><i class="ti-email"></i> <span>Surat Perjalanan</span></a></li>
                            

                            <li class="sidebar-items6 @if(Route::is('sp.index') == 1 || Route::is('perjalanan.index') == 1) active @endif">
                                <a class="waves-effect" anim="ripple" href="javascript:void(0)" aria-expanded="true"><i class="menu-icon ti-printer"></i>
                                    <span>Report</span></a>
                                <ul class="collapse @if(Route::is('sp.index') == 1 || Route::is('perjalanan.index') == 1) in @endif">
                                    <li class="{{Route::is('sp.index') ? 'active' : null}}"><a href="{{ route('sp.index') }}">Surat SP</a></li>
                                    <li class="{{Route::is('perjalanan.index') ? 'active' : null}}"><a href="{{ route('perjalanan.index') }}">Surat Perjalanan</a></li>
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

        <div class="header">
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
                                    {{ Auth::user()->nama }} &nbsp;<span class="caret"><small class="fa fa-angle-down"></small></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->status == "Admin" || Auth::user()->status == "Pegawai")
                                    <a class="dropdown-item" href="{{route('pegawai.profil',Auth::user()->id)}}"><i class="menu-icon ti-user"></i> Profile
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
            @yield('content')


        <!-- footer area end-->
        <footer>
            <div class="footer-area" style="background-color: #fff;">
                <p style="color: #585858;">&copy;2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        @endif
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

    <script src="{{ asset('vendors/jquery/dist/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery/jquery-input-mask-phone-number.js') }}"></script>

    <!-- all line chart activation -->
    <script src="{{ asset('js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('js/pie-chart.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('select2/dist/js/select2.full.min.js') }}"></script>
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
        $('.select2').select2();
      });
    </script>
    <script src="{{ asset('js/waves-effect.js') }}"></script>
      <script>
         $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN':
          $('meta[name="csrf-token"]').attr('content')
        }
      });
      </script>
    @section('js')

    @show

</body>

</html>
