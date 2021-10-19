@include("layout.header")
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Beranda</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-doc"></i></h3>
                                    <p class="text-muted">NOTA TRANSAKSI</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary">{{$invoice->count()}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">BARANG TERJUAL</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan">{{$qty}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="ti-money"></i></h3>
                               
                                    <p class="text-muted">IDR{{$mytotal}}<br>PENDAPATAN</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple"></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="ti-face-smile"></i></h3>
                                    <p class="text-muted">KEUNTUNGAN</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-info">IDR 500.000</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- column -->
                    <div class="col-md-6">
                        <a href="{{url('/cashier')}}" class="text-muted">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">KASIR</h4>
                                    <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                        <span class="display-5 text-purple ml-auto mr-3"><i class="ti-money"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- column -->
                    <div class="col-md-6">
                        <a href="{{url('/stok')}}" class="text-muted">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">STOK BARANG</h4>
                                    <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                        <span class="display-5 text-info ml-auto mr-3"><i class="ti-layers"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- column -->
                    <div class="col-md-6">
                        <a href="{{url('/transactionreturn')}}" class="text-muted">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">RETUR BARANG</h4>
                                    <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                        <span class="display-5 text-primary ml-auto mr-3"><i class="ti-back-left"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- column -->
                    <div class="col-md-6">
                        <a href="{{url('/invoice')}}" class="text-muted">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">NOTA</h4>
                                    <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                        <span class="display-5 text-success ml-auto mr-3"><i class="ti-agenda"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- column -->


                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->

@include("layout.footer")