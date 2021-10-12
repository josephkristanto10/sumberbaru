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
                <h4 class="text-themecolor">Nota Transaksi</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Nota Transaksi</li>
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group col-12 float-right">
                            <input type="text" class="form-control shawCalRanges" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="ti-calendar"></span>
                                </span>
                                <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2"><i class="ti-layout-media-overlay pr-2"></i>Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <h2 class="counter text-primary">23</h2>
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
                                    <h2 class="counter text-cyan">169</h2>
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
                                    <p class="text-muted">PENDAPATAN</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple">IDR 1.587.000</h2>
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
        <div class="row">
            <!-- Column -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Nota Transaksi</h4>
                        <h6 class="card-subtitle">Informasi Transaksi Dalam Waktu Tertentu</h6>
                        <table class="display table table-hover table-striped table-bordered" cellspacing="0" id="mydatatable" >
                            <thead>
                                <tr>
                                    <th width="5%">Tanggal</th>
                                    <th width="5%">No. Trasaksi</th>
                                    <th width="5%">Pelanggan</th>
                                    <th width="10%">Jml Barang</th>
                                    <th width="10%">Total</th>
                                    <th width="3%">Metode</th>
                                    <th width="7%">Detail Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
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
<!-- sample modal content -->
<div id="detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Informasi Barang Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div class="col-12">
                    <h5 class="float-right"><b>Total <label id = "qty_barang_detail">25</label> Barang - Rp. <label id = "totalall">1.300.000</label></b></h5>
                    <h5>No Transaksi TS004 - 01 Juli 2021 - 13.30</h5>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">Kode</th>
                                <th width="10%">Nama Barang</th>
                                <th width="5%">Jumlah</th>
                                <th width="10%">Harga Satuan</th>
                                <th width="10%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id = "detailtable">
                         
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <input type="text" class="form-control" id = "transaction_customer" placeholder="Pelanggan B" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" id = "transaction_note"  placeholder="Isi Note" disabled>
                            </div>
                        </div>
                        <div class="col-lg-3">
                           
                        </div>
                        <button type="button" class="btn btn-info waves-effect col-3" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- End Modal  -->

<!-- ============================================================== -->

<!-- sample modal content -->
<div id="detail_kirim" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Informasi Barang Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div class="col-12">
                    <h5 class="float-right"><b>Total 5 Barang - Rp. 150.000</b></h5>
                    <h5>No Transaksi KR003 - 01 Juli 2021 - 12.31</h5>
                    <table  class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">Kode</th>
                                <th width="10%">Nama Barang</th>
                                <th width="5%">Jumlah</th>
                                <th width="10%">Harga Satuan</th>
                                <th width="10%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody >
                       

                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <input type="text" class="form-control" placeholder="Pelanggan B" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" placeholder="Isi Note" disabled>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <label class="form-check-label" for="checkbox00">Ongkir</label>
                                </div>
                                <input type="number" class="form-control" aria-label="Text input with checkbox" placeholder="Rp. 10.000" disabled>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info waves-effect col-3" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- End Modal  -->

<!-- ============================================================== -->
@include("layout.footer")
<script>
    loadInvoice();
    function loadInvoice(){
        
        $('#mydatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('gettableinvoice')}}",
        columns: [
            { data: 'testdate', name: 'created_at' },
            { data: 'transaction_no', name: 'transaction_no' },
            { data: 'customer', name: 'transaction_customer' },
            { data: 'quantity', name: 'qty_item'},
            { data: 'total', name: 'total' },
            { data: 'method', name: 'transaction_method' },
            { data: 'action', name: 'action' }
        ]
    });
    };
    function success() {
      $('#mydatatable').DataTable().ajax.reload(null, false);
   };
   function openmodaldetailinvoice(element){
    var idinvoice = element.id;
    var myurl =  '{{ url("invoice/detail/") }}' + "/"+ idinvoice;
      
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                url: myurl,
                method: 'get',
                data: {
                    myid : idinvoice
                    
                },
                success: function (result) {
                console.log(result);
                 $("#qty_barang_detail").text(result['counts']);
                 $("#totalall").text(result['total']);
                 $("#transaction_customer").val(result['customer']);
                 $("#transaction_note").val(result['note']);
                    $('#detailtable').html("");
                    $('#detailtable').html(result['mytable']);
                }
            });
   }
</script>



