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
                <h4 class="text-themecolor">Daftar Barang Supplier</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="daftar_supplier.php">Daftar Supplier</a></li>
                        <li class="breadcrumb-item active">Daftar Barang Supplier</li>
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
                        <h4 class="card-title">{{$mysup[0]->name}}</h4>
                        <input type = "hidden" id = "idsupplier" value = "{{$mysup[0]->id}}">
                        <h6 class="card-subtitle">Tambahkan daftar barang supplier. </h6>
                        <select class="form-control select2 custom-select col-6" style="width: 73%;" id = "myproduct"> 
                            <option value = "none">Pilih Barang</option>
                            @foreach($product as $p)
                            <option value="{{$p->id}}">{{$p->kode}} - {{$p->name}} </option>
                            @endforeach
                            
                        </select>
                        <button type="button" onclick = "addsupplierproduct()" class="waves-effect btn btn-info d-none d-lg-block m-l-15 float-right col-3"><i class="fa fa-plus-circle mr-1"></i> Daftarkan Barang</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                    <table  class="display table table-hover table-striped table-bordered" cellspacing="0" id = "mytable">
                            <thead>
                                <tr>
                                    <th width="2%">Kode</th>
                                    <th width="15%">Nama Barang</th>
                                    <th width="6%">Aksi</th>
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

<!-- ============================================================== -->
<!-- ============================================================== -->


@include("layout.footer")
<script>
    var idsup = $("#idsupplier").val();
    var myurl = '{{url("/getdatatableproductpersupplier/")}}' + "/"+ idsup;
  
     $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: myurl,
        columns: [
            { data: 'code', name: 'name' },
            { data: 'name', name: 'phone' },
            { data: 'action', name: 'action', searchable:false }
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
    function addsupplierproduct() {
            var product = $('#myproduct').val();
            var supplier = $('#idsupplier').val();
            if(product == "none")
            {
                Swal.fire({
                            type: 'error',
                            title: 'Product Not Selected',
                            text: 'Please select product first !',
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
                    mytipe : "addsupplierproduct",
                    myproduct : product,
                    mysupplier : supplier
                    
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
                            text: 'Duplicate entry product on this supplier',
                            confirmButtonColor: '#e00d0d',
                        });
                    }
                  
                  
                }
            });
            }
          
        };
</script>
