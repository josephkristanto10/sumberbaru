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
                <h4 class="text-themecolor">Kelola Harga Barang</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="pricelist_supplier.php">Pricelist Supplier</a></li>
                        <li class="breadcrumb-item active">Kelola Harga Barang</li>
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
                        <h4 class="card-title">Kelola Harga Barang {{$mysup[0]->name}}</h4>
                        <input type = "hidden" id = "idsupplier" value = "{{$mysup[0]->id}}">
                        <input type = "hidden" id = "idchange" >
                        <h6 class="card-subtitle">Data harga barang pada supplier yang telah terdaftar. </h6>
                        <table  class="display table table-hover table-striped table-bordered" cellspacing="0" id = "mytable">
                            <thead>
                                <tr>
                                    <th width="2%">Kode</th>
                                    <th width="30%">Nama Barang</th>
                                    <th width="13%">Harga</th>
                                    <th width="13%">Terakhir Diperbaharui</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                          
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
<div id="modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Kelola Harga Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td> <b>Nama Barang</b> </td>
                            <td>
                                <p id = "namabarang">-</p>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga</b> </td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" value="0" id = "priceproduct">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "cancelchange">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-6" data-dismiss="modal" alt="alert" class="img-fluid model_img"  onclick = "changedata()">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- sample modal content -->
<div id="riwayat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter">Riwayat Harga Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <table id="mytablehistory" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">Tanggal</th>
                                <th width="7%">Harga</th>
                            </tr>
                        </thead>
                        <tbody id = "dynamichistory">


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


@include("layout.footer")
<script>
    var idsup = $("#idsupplier").val();
    var myurl = '{{url("/getdatatablepersupplier/")}}' + "/"+ idsup;
//   alert(idsup);
     $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: myurl,
        columns: [
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'updatedat', name: 'updatedat' },
            { data: 'action', name: 'action', searchable:false }
        ]
    });
    function success() {
      $('#mytable').DataTable().ajax.reload(null, false);
   };
   
   function gethistoryproduct(idproducts){
            var mysupplier = $("#idsupplier").val();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                url: "{{route('gethistoryproduct')}}",
                method: 'GET',
                data: {
                    idsupplier : mysupplier,
                    idproduct : idproducts
                    
                },
                success: function (result) {
                    $("#dynamichistory").html(result);
                    // if(result == "")
                    // {
                    //     success();
                    //     Swal.fire({
                    //             title: 'Data Changed',
                    //             text: 'Data Changed Successfully',
                    //             type: 'success',
                    //             confirmButtonColor: '#53d408',
                    //             allowOutsideClick: false,
                    //         }).then((result) => {
                    //             $("#myformedit").trigger("reset");
                    //             $("#canceledit").click();
                    //         });
                    // }
                    // else{
                    //     Swal.fire({
                    //         type: 'error',
                    //         title: 'Data Exists',
                    //         text: 'Duplicate Entry For This Product Name',
                    //         confirmButtonColor: '#e00d0d',
                    //     });
                    // }
                  
                  
                }
            });
           
   }
  

   function perbaharui(element)
   {
       var splitter = (element.id).split("|");
       var myid = splitter[0];
       var myname = splitter[1];
       $("#namabarang").text(myname);
       $("#idchange").val(myid);
       var myprice =  $("#price"+myid).text();
    //    alert(myprice);
       $("#priceproduct").val(parseInt(myprice));
   }
   function changedata(){
            var myid = $("#idchange").val();
            var mysupplier = $("#idsupplier").val();
            var price = $('#priceproduct').val();
            // alert(myid);
            if(price == "")
            {
                Swal.fire({
                            type: 'error',
                            title: 'Empty Field',
                            text: "Please Fill The Supplier's Price",
                            confirmButtonColor: '#e00d0d',
                        });
            }
            else{
                var myurl =  '{{ url("pricelist/") }}' + "/"+ myid;
            // alert(myurl);
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                url: myurl,
                method: 'PUT',
                data: {
                    tipe : "changepricelist",
                    myid : myid,
                    mysupplier : mysupplier,
                    myprice : price
                    
                },
                success: function (result) {
                    // alert(result);
                    if(result == "")
                    {
                        success();
                        Swal.fire({
                                title: 'Data Changed',
                                text: 'Data Changed Successfully',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                                $("#myformedit").trigger("reset");
                                $("#canceledit").click();
                            });
                    }
                    else{
                        Swal.fire({
                            type: 'error',
                            title: 'Data Exists',
                            text: 'Duplicate Entry For This Product Name',
                            confirmButtonColor: '#e00d0d',
                        });
                    }
                  
                  
                }
            });
            }
          
   }
</script>