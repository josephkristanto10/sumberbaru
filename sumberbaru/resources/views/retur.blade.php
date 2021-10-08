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
                <h4 class="text-themecolor">Retur Barang</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Retur Barang</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="waves-effect btn btn-info d-none d-lg-block m-l-15 float-right col-2" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle mr-2"></i>Buat Retur Barang Baru</button>
                        <h4 class="card-title">Buat Retur Barang Baru</h4>
                        <h6 class="card-subtitle">Silahkan tekan tombol untuk membuat catatan retur barang. </h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#belum" role="tab">Dalam Proses</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sudah" role="tab">Telah Selesai</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="belum" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ml-2 mt-2">
                                        <div class="card">
                                            <h4 class="card-title">Daftar Retur Dalam Proses</h4>
                                            <h6 class="card-subtitle">Informasi daftar retur barang yang dikembalikan ke supplier</h6>
                                            <table id="example22" class="display table table-hover table-striped table-bordered" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">Tanggal</th>
                                                        <th width="10%">Supplier</th>
                                                        <th width="10%">Nama Barang</th>
                                                        <th width="3%">Jumlah</th>
                                                        <th width="10%">Keterangan</th>
                                                        <th width="3%">Status</th>
                                                        <th width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>21 Agustus 2021</td>
                                                        <td>PT. Kaca Piring</td>
                                                        <td>Piring A</td>
                                                        <td>12</td>
                                                        <td>Retak pasca Pengiriman</td>
                                                        <td><span class="badge badge-pill badge-warning text-white ml-auto">Dalam Proses</span></span></a> </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ti-layout-media-overlay pl-2 pr-1"></i> Pilih
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:void(0)" data-target="#konfirmasi" data-toggle="modal">Konfirmasi</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" data-target="#tambah" data-toggle="modal">Ubah</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">Batal</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="sudah" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ml-2 mt-2">
                                        <div class="card">
                                            <h4 class="card-title">Daftar Retur Yang Telah Selesai</h4>
                                            <h6 class="card-subtitle">Informasi daftar retur barang yang telah selesai dikembalikan oleh supplier </h6>
                                            <table id="example24" class="display table table-hover table-striped table-bordered" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">Tanggal</th>
                                                        <th width="15%">Supplier</th>
                                                        <th width="15%">Barang</th>
                                                        <th width="1%">Jumlah</th>
                                                        <th width="15%">Keterangan</th>
                                                        <th width="5%">Tgl Selesai</th>
                                                        <th width="3%">Penyelesaian</th>
                                                        <th width="3%">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>21 Agustus 2021</td>
                                                        <td>PT. Kaca Piring</td>
                                                        <td>Piring A</td>
                                                        <td>12</td>
                                                        <td>Retak pasca Pengiriman</td>
                                                        <td>29 Agustus 2021</td>
                                                        <td>Retur (12)</td>
                                                        <td><span class="badge badge-pill badge-success text-white ml-auto">Selesai</span></span></a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>20 Agustus 2021</td>
                                                        <td>PT. Kaca Piring</td>
                                                        <td>Piring B</td>
                                                        <td>10</td>
                                                        <td>Retak pasca Pengiriman</td>
                                                        <td>29 Agustus 2021</td>
                                                        <td>Refund (Rp.300.000)</td>
                                                        <td><span class="badge badge-pill badge-success text-white ml-auto">Selesai</span></span></a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>20 Agustus 2021</td>
                                                        <td>PT. Kaca Piring</td>
                                                        <td>Piring C</td>
                                                        <td>10</td>
                                                        <td>Retak pasca Pengiriman</td>
                                                        <td>29 Agustus 2021</td>
                                                        <td>Retur (5) </br> Refund (Rp.200.000) </td>
                                                        <td><span class="badge badge-pill badge-success text-white ml-auto">Selesai</span></span></a> </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
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

<!-- Start Modal  -->
<!-- sample modal content -->
<div id="tambah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Form Tambah Retur Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="20%">Tanggal Pencatatan</td>
                            <td>
                                <input type="date" class="form-control" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">Nama Barang</td>
                            <td>
                                <select id="modalselect2" class="form-control select2 custom-select" style="width: 100%;">
                                    <option>Pilih Barang</option>
                                    <option value="AZ">A101 - Piring A </option>
                                    <option value="CO">A102 - Piring B</option>
                                    <option value="ID">A103 - Piring C</option>
                                    <option value="ID">A201 - Gelas Tipe 1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td>
                                <select id="modalselect3" class="form-control select2 custom-select" style="width: 100%;">
                                    <option>Pilih Supplier</option>
                                    <option value="AZ">PT. Kaca Piring</option>
                                    <option value="CO">PT. Beling Sejati</option>
                                    <option value="ID">PT. Supp C</option>
                                    <option value="ID">PT. Supp D</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>
                                <input type="number" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="20%">Keterangan</td>
                            <td>
                                <textarea class="form-control" placeholder="Masukan keterangan"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-3" data-dismiss="modal" alt="alert" class="img-fluid model_img" id="sa-success">Catat Retur Barang</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->
<!-- ============================================================== -->

<!-- Start Modal  -->
<!-- sample modal content -->
<div id="konfirmasi" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Konfirmasi Retur Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="rows">
                        <table class="display table table-hover table-striped table-bordered col-6">
                            <tr>
                                <td width="40%"><b>Supplier</b> </td>
                                <td>
                                    PT. Kaca Piring
                                </td>
                            </tr>
                            <tr>
                                <td width="40%"><b>Nama Barang</b> </td>
                                <td>
                                    Piring A
                                </td>
                            </tr>
                            <tr>
                                <td width="40%"><b>Jumlah</b> </td>
                                <td>
                                    12
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="rows">
                        <p>Pastikan Anda memasukan informasi yang benar</p>
                        <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <tr>
                                <td width="20%">Tanggal Konfirmasi</td>
                                <td>
                                    <input type="date" class="form-control" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Penyelesaian</td>
                                <td>
                                    <button type="button" class="btn waves-effect waves-light btn-outline-info mr-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio1">Retur Barang</label>
                                        </div>
                                    </button>

                                    <button type="button" class="btn waves-effect waves-light btn-outline-info mr-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio2">Refund Uang</label>
                                        </div>
                                    </button>

                                    <button type="button" class="btn waves-effect waves-light btn-outline-info mr-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="customRadio" class="form-check-input">
                                            <label class="form-check-label" for="customRadio3">Retur dan Refund</label>
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah yang <br> di Retur <small>(Barang)</small></td>
                                <td>
                                    <input type="number" class="form-control" placeholder="Masukan Jumlah Barang">
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah yang <br> di Refund <small>(Uang)</small> </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="Masukan Jumlah Uang">
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-3" data-dismiss="modal" alt="alert" class="img-fluid model_img" id="sa-success">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->
<!-- ============================================================== -->

@include("layout.footer")