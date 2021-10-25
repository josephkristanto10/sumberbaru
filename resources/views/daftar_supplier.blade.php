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
                <h4 class="text-themecolor">Daftar Supplier</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Supplier</li>
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
                        <button type="button" class="waves-effect btn btn-info d-none d-lg-block m-l-15 float-right col-3" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle mr-1"></i> Daftarkan Supplier Baru</button>
                        <h4 class="card-title">Daftar Supplier</h4>
                        <h6 class="card-subtitle">Data supplier yang telah terdaftar. </h6>
                        <table  class="display table table-hover table-striped table-bordered" cellspacing="0" id = "mytable">
                            <thead>
                                <tr>
                                    <th width="15%">Nama Supplier</th>
                                    <th width="8%">Nomor Telepon</th>
                                    <th width="13%">Alamat</th>
                                    <th width="4%">Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>PT. Kaca Piring</td>
                                    <td>081331334523</td>
                                    <td>Jl. Pasar Turi no.0 Surabaya</td>
                                    <td>
                                        <a href="{{url('/supplier/productsupplier')}}"><button type="button" class="btn waves-effect waves-light btn-sm btn-info pl-2 pr-2"><i class="fas fa-server pr-2"></i>4 Barang</button></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#modal"><i class="fas fa-edit pr-2"></i>Ubah</button>
                                        <button type="button" class="btn waves-effect waves-light btn-sm btn-danger pl-2 pr-2" alt="alert" class="img-fluid model_img" id="sa-confirm"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr> -->
                               
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
                <h4 class="modal-title" id="vcenter"><b>Form Supplier Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id = "myformadd">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="35%"> <b>Nama Supplier</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Nama" id ="name">
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Nomor Telepon</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Telepon" id ="phone">
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Alamat</b> </td>
                            <td>
                                <textarea class="form-control" placeholder="Masukan keterangan" id ="address"></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "canceladd">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-6" data-dismiss="modal" alt="alert" class="img-fluid model_img"  onclick = "addsupplier()" >Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->

<!-- Start Modal  -->
<!-- sample modal content -->
<div id="modaledit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Form Edit Supplier Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <input type = "hidden" id = "idchange">
                            <td width="35%"> <b>Nama Supplier</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Nama" id ="nameedit">
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Nomor Telepon</b> </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Masukan Telepon" id ="phoneedit">
                            </td>
                        </tr>
                        <tr>
                            <td> <b>Alamat</b> </td>
                            <td>
                                <textarea class="form-control" placeholder="Masukan keterangan" id ="addressedit"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "canceledit">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-6"  alt="alert" class="img-fluid model_img"  onclick = "changesupplier()" >Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- ============================================================== -->


@include("layout.footer")
<script>
     $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('getdatatableproductsupplier')}}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            // { data: 'status', name: 'status' },
            { data: 'list', name: 'list', searchable:false}
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
