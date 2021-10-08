<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <title>POS - Sumber Baru</title>
    <!-- This page CSS -->
    <link href="{{ asset('assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/tab-page.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/file-upload.css')}}" rel="stylesheet">
    <!-- Dashboard 31 Page CSS -->
    <link href="{{ asset('dist/css/pages/dashboard3.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- Footable CSS -->
    <link href="{{ asset('assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
    <!-- Page CSS -->
    <link href="{{ asset('dist/css/pages/contact-app-page.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/footable-page.css')}}" rel="stylesheet"> <!-- chartist CSS -->
    <!-- Vector CSS -->
    <link href="{{ asset('assets/node_modules/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!--alerts CSS -->
    <link href="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ asset('dist/css/pages/easy-pie-chart.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/summernote/dist/summernote-bs4.css')}}">
    <link href="{{ asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="{{ asset('assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <title>POS - Sumber Baru</title>
    <!-- This page CSS -->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <center>
                <p class="loader__label">Sumber Baru</p>
            </center>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b>
                            <img src="{{ asset('assets/images/eliteadmin-logo.png')}}" alt="homepage" class="light-logo" width="40px" height="40px" />
                        </b>
                        <span>
                            <img src="{{ asset('assets/images/eliteadmin-small-text.png')}}" class="light-logo" alt="homepage" width="140px" height="25.2px" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic text-white" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hidden-md-down pl-1 pr-2">SuperAdmin &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <a href="../index.html" class="dropdown-item"><i class="fa fa-power-off"></i> Keluar</a>
                            <!-- text-->
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End User Profile -->
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('/')}}" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Beranda</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('/cashier')}}" aria-expanded="false"><i class="ti-money"></i><span class="hide-menu">Kasir</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('/stok')}}" aria-expanded="false"><i class="ti-layers"></i><span class="hide-menu">Stok Barang</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('/retur')}}" aria-expanded="false"><i class="ti-back-left"></i><span class="hide-menu">Retur Barang</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('/invoice')}}" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">Nota Transaksi</span></a>
                        </li>

                        <li class="nav-small-cap ml-3">ADMIN DATABASE</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-folder""></i><span class=" hide-menu">Kelola Data</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/product')}}">Daftar Barang</a></li>
                                <li><a href="{{url('/supplier')}}">Daftar Supplier</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{url('/pricelist')}}" aria-expanded="false"><i class="ti-server"></i><span class="hide-menu">Pricelist Supplier</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->