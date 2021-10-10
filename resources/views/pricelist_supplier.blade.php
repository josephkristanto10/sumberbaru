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
                <h4 class="text-themecolor">Daftar Pricelist Supplier</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Pricelist Supplier</li>
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
                        <h4 class="card-title">Daftar Pricelist Supplier</h4>
                        <h6 class="card-subtitle">Data harga barang pada supplier yang telah terdaftar. </h6>
                        <table  class="display table table-hover table-striped table-bordered" cellspacing="0" id = "mytable">
                            <thead>
                                <tr>
                                    <th width="20%">Nama Supplier</th>
                                    <th width="20%">Alamat Supplier</th>
                                    <th width="6%">Daftar</th>
                                    <th width="6%">Action</th>
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
                <h4 class="modal-title" id="vcenter"><b>Form Supplier Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="35%"> <b>Nama Supplier</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Nama">
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Nomor Telepon</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Telepon">
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Alamat</b> </td>
                            <td>
                                <textarea class="form-control" placeholder="Masukan keterangan"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-6" data-dismiss="modal" alt="alert" class="img-fluid model_img" id="sa-success">Simpan</button>
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

<script>
     $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('getdatatablesupplierpricelist')}}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            // { data: 'status', name: 'status' },
            { data: 'list', name: 'list', searchable:false},
            { data: 'action', name: 'action' }
        ]
    });
    function success() {
      $('#mytable').DataTable().ajax.reload(null, false);
   };
   function filldatachange(elements){
       var myid = elements.id;
       var name = $("#name" + myid).text();
       var phone = $("#phone" + myid).text();
       var address = $("#address" + myid).text();

        $("#idchange").val(myid);

       $("#nameedit").val(name);
       $("#phoneedit").val(phone);
       $("#addressedit").val(address);
   }
   function changesupplier() {
    //    alert("tes");
            var myid = $("#idchange").val();
            var name = $("#nameedit").val();
            var phone = $("#phoneedit").val();
            var address = $("#addressedit").val();
            // alert(name + phone + address);
            if(name == ""||phone == ""||address == "")
            {
                Swal.fire({
                            type: 'error',
                            title: 'Empty Field',
                            text: 'Please Entry the requirement data',
                            confirmButtonColor: '#e00d0d',
                        });
            }
            else{
                
            var myurl =  '{{ url("supplier/") }}' + "/"+ myid;
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
                    myphone : phone,
                    myaddress : address
                    
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
    function addsupplier() {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            if(name == ""||phone == ""||address == "")
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
                url: "{{ route('supplier.store') }}",
                method: 'POST',
                data: {
                    mytipe : "addsupplier",
                    myname : name,
                    myphone : phone,
                    myaddress : address
                    
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
                            text: 'Duplicate Entry For This Supplier Name',
                            confirmButtonColor: '#e00d0d',
                        });
                    }
                  
                  
                }
            });
            }
          
        };
</script>
