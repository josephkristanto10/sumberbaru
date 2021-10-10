@include("layout.header")

<head>
    <style>
       .modal-dialog{
    overflow-y: initial !important
}
#bodyinformasi{
    height: 80vh;
    overflow-y: auto;
}
    </style>
</head>

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
                <h4 class="text-themecolor">Stok Barang</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Stok Barang</li>
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
                        <h4 class="card-title">Informasi Stok Barang</h4>
                        <h6 class="card-subtitle">Informasi Stok barang terakhir diperbaharui 21 Agustus 2021 </h6>
                        <table id="mytable" class="display table table-hover table-striped table-bordered" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="7%">Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th width="15%">Terakhir Diperbaharui</th>
                                    <th width="20%">Aksi</th>
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
<!-- Start Modal  -->
<!-- sample modal content -->
<div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Tambah / Perbaharui Stok</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <form id = "myformadd">
                    <table id="example22" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td><b>Nama</b></td>
                                <td id = "namaproductadd">Piring A Warna A</td>
                            </tr>
                            <td><b>Jumlah</b></td>
                            <td>
                                <input type="number" class="form-control" id = "jumlahtambah">
                            </td>
                            </tr>
                            <tr>
                                <td><b>Supplier</b></td>
                                <td>
                                    <select class="custom-select" id="supplieraddform">
                                      
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline waves-effect" id = "canceladd" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-info waves-effect col-4"  alt="alert" class="img-fluid model_img" onclick="adddata()">Simpan</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- End Modal  -->

<!-- sample modal content -->
<div id="riwayat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Riwayat Informasi Stok</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id = "bodyinformasi">
                <div class="col-12">
                    <table id="tablehistory" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">Tanggal</th>
                                <th width="5%">Jumlah</th>
                                <th width="7%">Supplier</th>
                            </tr>
                        </thead>
                        <tbody id = "tablehistorystok">
                        
                        </tbody>
                    </table>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect col-4" data-dismiss="modal">Tutup</button>
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
<!-- ============================================================== -->


@include("layout.footer")
<script type="text/javascript">

var globalidproductopen = "";
    // $("#tablehistory").DataTable();

    $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("getdatatableproductlog")}}',
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'name', name: 'name' },
            { data: 'stok', name: 'stok' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'action', name: 'action' }
        ]
    });
    function success() {
      $('#mytable').DataTable().ajax.reload(null, false);
   };

   function opentambahmodul(element){
       var myid = element.id;
       globalidproductopen = myid;
       var myproductname = $("#name"+myid).text();
       $("#namaproductadd").text(myproductname);

    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('getsupplieraddstocklog') }}",
                method: 'GET',
                data: {
                    id : myid
                    
                },
                success: function (result) {
                    $("#supplieraddform").html(result);
                  
                  
                }
            });


   }

   function adddata(){
        var qtyjumlah = $("#jumlahtambah").val();
        var supplier = $("#supplieraddform").val();
        if(qtyjumlah == "" || supplier == null)
        {
                        Swal.fire({
                            type: 'error',
                            title: 'Empty Field',
                            text: 'Please Entry the requirement data',
                            confirmButtonColor: '#e00d0d',
                        });
        }
        else{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('addstocklog') }}",
                        method: 'POST',
                        data: {
                            idproducts : globalidproductopen,
                            idsuppliers : supplier,
                            qty : qtyjumlah
                            
                        },
                        success: function (result) {
                            success();
                            Swal.fire({
                                    title: 'Data Saved',
                                    text: 'Data Inputted Successfully',
                                    type: 'success',
                                    confirmButtonColor: '#53d408',
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    $("#myformadd").trigger("reset");
                                    $("#canceladd").click();
                                });
                        
                        }
                    });
        }
   }

   function gethistorystock(idproducts){
                   $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('gethistory') }}",
                        method: 'POST',
                        data: {
                            idproduct : idproducts
                            
                        },
                        success: function (result) {
                            $("#tablehistorystok").html(result);
                            // $('#tablehistory').DataTable();
                        }
                    });
   }

  
</script>