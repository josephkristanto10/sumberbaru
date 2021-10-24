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
                <h4 class="text-themecolor">Daftar Barang</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Barang</li>
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
                        <button type="button" class="waves-effect btn btn-info d-none d-lg-block m-l-15 float-right col-3" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle mr-1"></i> Daftarkan Barang Baru</button>
                        <h4 class="card-title">Daftar Barang</h4>
                        <h6 class="card-subtitle">Data barang yang telah terdaftar. </h6>
                        <table  class="display table table-hover table-striped table-bordered" cellspacing="0" id = "mytable">
                            <thead>
                                <tr>
                                    <th width="2%">Kode</th>
                                    <th width="30%">Nama Barang</th>
                                    <th width="13%">Harga 1</th>
                                    <th width="10%">Harga 2</th>
                                    <th width="10%">Harga 3</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Aksi</th>
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
<div id="modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Form Data Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method = "POST" id = "myformadd" >
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%" >
                        <tr>
                            <td width="35%"> <b>Nama Barang</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Nama" id = "productname" required>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Kode Barang</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Kode" id = "productcode" required>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga 1</b> <br> <small>(low)</small></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id = "productprice1" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga 2</b> <br> <small>(normal)</small></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control"  id = "productprice2" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga 3</b> <br> <small>(high)</small></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control"  id = "productprice3" required>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "canceladd">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-6" class="img-fluid model_img"  onclick = "addproduct()">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- Start Modal Edit -->
<!-- sample modal content -->
<div id="modaledit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Edit Data Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method = "POST" id = "myformedit" >
                    <input type = 'hidden' id ="idchange">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%" >
                        <tr>
                            <td width="35%"> <b>Nama Barang</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Nama" id = "productnameedit" required>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Kode Barang</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Kode" id = "productcodeedit" required>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga 1</b> <br> <small>(low)</small></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id = "productprice1edit" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga 2</b> <br> <small>(normal)</small></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control"  id = "productprice2edit" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Harga 3</b> <br> <small>(high)</small></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control"  id = "productprice3edit" required>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "canceledit">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-6" class="img-fluid model_img"  onclick = "changedata()">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- ============================================================== -->


@include("layout.footer")
<script type="text/javascript">

    $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/getdatatable',
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'name', name: 'name' },
            { data: 'harga1', name: 'harga1' },
            { data: 'harga2', name: 'harga2' },
            { data: 'harga3', name: 'harga3' },
            { data: 'status', name: 'status' },
            { data: 'intro', name: 'harga3' }
        ]
    });

    function addproduct() {
            var name = $('#productname').val();
            var code = $('#productcode').val();
            var price1 = $('#productprice1').val();
            var price2 = $('#productprice2').val();
            var price3 = $('#productprice3').val();
            if(name == ""||code == ""||price1 == ""||price2 == ""||price3 == "")
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
                url: "{{ route('product.store') }}",
                method: 'POST',
                data: {
                    myname : name,
                    mycode : code,
                    myprice1 : price1,
                    myprice2 : price2,
                    myprice3: price3
                    
                },
                success: function (result) {
                    if(result == "")
                    {
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
          
        };

   // Reload table
   function success() {
      $('#mytable').DataTable().ajax.reload(null, false);
   };
   function filldatachange(elements){
       var myid = elements.id;
       var kode = $("#kode" + myid).text();
       var nama = $("#name" + myid).text();
       var harga1 = $("#hargapertama" + myid).text();
       var harga2 = $("#hargakedua" + myid).text();
       var harga3 = $("#hargaketiga" + myid).text();

        $("#idchange").val(myid);

       $("#productcodeedit").val(kode);
       $("#productnameedit").val(nama);
       $("#productprice1edit").val(parseInt(harga1));
       $("#productprice2edit").val(parseInt(harga2));
       $("#productprice3edit").val(parseInt(harga3));
   }

   function changedata() {
            var myid = $("#idchange").val();
            var name = $('#productnameedit').val();
            var code = $('#productcodeedit').val();
            var price1 = $('#productprice1edit').val();
            var price2 = $('#productprice2edit').val();
            var price3 = $('#productprice3edit').val();
            if(name == ""||code == ""||price1 == ""||price2 == ""||price3 == "")
            {
                Swal.fire({
                            type: 'error',
                            title: 'Empty Field',
                            text: 'Please Entry the requirement data',
                            confirmButtonColor: '#e00d0d',
                        });
            }
            else{
            var myurl =  '{{ url("product/") }}' + "/"+ myid;
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
                    myname : name,
                    mycode : code,
                    myprice1 : price1,
                    myprice2 : price2,
                    myprice3: price3
                    
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
          
        };

        function setstatusproduct(mystat, id){
         
            // alert(id);
                    $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                    });
                    $.ajax({
                        url: "{{route('setstatusproduct')}}",
                        method: 'post',
                        data: {
                            stats : mystat,
                            ids : id
                            
                        },
                        success: function (result) {
                         
                            Swal.fire({
                                title: 'Status Changed',
                                text: 'Status Changed Successfully',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                                success();
                            });
                           
                         }

                     });
        };
</script>