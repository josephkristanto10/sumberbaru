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
                        <li class="nav-item" id = "tabprocess"> <a class="nav-link active" data-toggle="tab" href="#belum" role="tab">Dalam Proses</a> </li>
                        <li class="nav-item"  id = "tabfinish"> <a class="nav-link" data-toggle="tab" href="#sudah" role="tab">Telah Selesai</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="belum" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ml-2 mt-2">
                                        <div class="card">
                                            <h4 class="card-title">Daftar Retur Dalam Proses</h4>
                                            <h6 class="card-subtitle">Informasi daftar retur barang yang dikembalikan ke supplier</h6>
                                            <table id="datareturprocess" class="display table table-hover table-striped table-bordered" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">Tanggal</th>
                                                        <th width="10%">Supplier</th>
                                                        <th width="10%">Nama Barang</th>
                                                        <th width="3%">Jumlah</th>
                                                        <th width="10%">Keterangan</th>
                                                        <th width="10%">Status</th>
                                                        <th width="5%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  

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
                                            <table id="datareturfinish" class="display table table-hover table-striped table-bordered" cellspacing="0">
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
                                <input type="date" id = "tanggalretur" class="form-control" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td>
                                <select id="modalselect3" class="form-control select2 custom-select" style="width: 100%;">
                                <option value = "no">Please Select Supplier</option>   
                                  @foreach($supplier as $s)
                                        <option value = '{{$s->id}}'>{{$s->name}}</option>
                                   @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">Nama Barang</td>
                            <td>
                                <select id="modalselect2" class="form-control select2 custom-select" style="width: 100%;">
                                   
                                </select>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Jumlah</td>
                            <td>
                                <input type="number" id ="qtyretur" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="20%">Keterangan</td>
                            <td>
                                <textarea class="form-control" id = "keterangan" placeholder="Masukan keterangan"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "tutuptambahretur">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-3" onclick = "adddata()"  class="img-fluid model_img" >Catat Retur Barang</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->
<div id="edit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter"><b>Form Edit Retur Barang</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="20%">Tanggal Pencatatan</td>
                            <td>
                                <input type="date" id = "tanggalreturedit" class="form-control" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td>
                                <select id="modalselect3edit" class="form-control select2 custom-select" style="width: 100%;">
                                <option value = "no">Please Select Supplier</option>   
                                  @foreach($supplier as $s)
                                  
                                        <option value = "{{$s->id}}">{{$s->name}}</option>
                                   @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">Nama Barang</td>
                            <td>
                                <select id="modalselect2edit" class="form-control select2 custom-select" style="width: 100%;">
                                   
                                </select>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Jumlah</td>
                            <td>
                                <input type="number" id ="qtyreturedit" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tr>
                            <td width="20%">Keterangan</td>
                            <td>
                                <textarea class="form-control" id = "keteranganedit" placeholder="Masukan keterangan"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "tutupeditretur">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-3" onclick = "editdata()"  class="img-fluid model_img" >Catat Retur Barang</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
                                    <label id = "konfirmasisupplier">PT. Kaca Piring</label>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%"><b>Nama Barang</b> </td>
                                <td>
                                <label id = "konfirmasibarang">Piring A</label> 
                                </td>
                            </tr>
                            <tr>
                                <td width="40%"><b>Jumlah</b> </td>
                                <td>
                                <label id = "konfirmasijumlah">12</label> 
                                    
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
                                    <input type="date" id = "tanggalkonfirmasi" class="form-control" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Penyelesaian</td>
                                <td><span id  = "radiopenyelesaian">
                                    <button type="button" class="btn waves-effect waves-light btn-outline-info mr-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" value = "Retur">
                                            <label class="form-check-label" for="customRadio1">Retur Barang</label>
                                        </div>
                                    </button>

                                    <button type="button" class="btn waves-effect waves-light btn-outline-info mr-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input" value = "Refund">
                                            <label class="form-check-label" for="customRadio2">Refund Uang</label>
                                        </div>
                                    </button>

                                    <button type="button" class="btn waves-effect waves-light btn-outline-info mr-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="customRadio" class="form-check-input" value = "ReturAndRefund">
                                            <label class="form-check-label" for="customRadio3">Retur dan Refund</label>
                                        </div>
                                    </button>
</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah yang <br> di Retur <small>(Barang)</small></td>
                                <td>
                                    <input type="number" id ="numberreturbarang" class="form-control" placeholder="Masukan Jumlah Barang">
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah yang <br> di Refund <small>(Uang)</small> </td>
                                <td>
                                    <input type="number" id ="numberreturuang" class="form-control" placeholder="Masukan Jumlah Uang">
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "tutupkonfirmasi">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-3" onclick = "confirmdata()"  class="img-fluid model_img" >Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal  -->
<!-- ============================================================== -->

@include("layout.footer")
<script>
    var statussolusi = "Retur";
    var editproduct = "";
    var idglobal = "";
    var onclicktab = "process";
    var statusfirstprocess = "yes";
    var statusfirstfinished = "no";
    $("#customRadio1").prop("checked", true);
    $("#numberreturuang").prop("disabled", true);
    $('input[type=radio][name="customRadio"]').change(function() {
        var myvalue = $(this).val();
        if(myvalue == "Retur")
        {
            $("#numberreturbarang").prop("disabled", false);
            $("#numberreturuang").prop("disabled", true);
            statussolusi = "Retur";
        }
        else if(myvalue =="Refund")
        {
         
            $("#numberreturbarang").prop("disabled", true);
            $("#numberreturuang").prop("disabled", false);
            statussolusi = "Refund";
           
        }
        else
        {
            $("#numberreturuang").prop("disabled", false);
            $("#numberreturbarang").prop("disabled", false);
            statussolusi = "ReturAndRefund";
        }
    });

    function openmodalkonfirmasi(element){
        var myid = element.id;
         idglobal = myid;
        // alert(myid);
        
        var idsupplier = $("#idsupplier_"+myid).val();
        var namesupplier = $("#suppliername_"+myid).text();
        var nameproduct = $("#product_"+myid).text();
        var idproduct = $("#idproduct_"+myid).val();
        var jumlah = $("#qty_"+myid).text();
        var info = $("#info_"+myid).text();
        var mydate = $("#returndate_"+myid).text();
        editproduct = idproduct;
     
        $("#konfirmasisupplier").text(namesupplier);
        $("#konfirmasibarang").text(nameproduct);
        $("#konfirmasijumlah").text(jumlah);
    //     $('#modalselect3edit').find('option[value='+idsupplier+']').prop('selected', true).change();
    //    $("#qtyreturedit").val(jumlah);
    //    $("#keteranganedit").val(info);
    //    $("#tanggalreturedit").val(mydate);
     
         }
    function openmodaledit(element){
        var myid = element.id;
         idglobal = myid;
        // alert(myid);
        
        var idsupplier = $("#idsupplier_"+myid).val();
        var idproduct = $("#idproduct_"+myid).val();
        var jumlah = $("#qty_"+myid).text();
        var info = $("#info_"+myid).text();
        var mydate = $("#returndate_"+myid).text();
        editproduct = idproduct;
        $('#modalselect3edit').find('option[value='+idsupplier+']').prop('selected', true).change();
       $("#qtyreturedit").val(jumlah);
       $("#keteranganedit").val(info);
       $("#tanggalreturedit").val(mydate);
     
         }
     $(document).ready(function() {
        loaddataprocess();
        // loaddatafinish();
        
        $("#modalselect3").trigger("change");
        $("#tabfinish").on("click", function(){
            // alert("test");
            if( statusfirstfinished == "no" )
            {
                loaddatafinish();
                statusfirstfinished = "yes";
            }
            else {
                successdatafinish();
            }
           
        });
        $("#tabprocess").on("click", function(){
            if( statusfirstprocess == "no" )
            {
                loaddataprocess()
                    statusfirstprocess = "yes";
            }
            else {
                successdataprocess();
            }
           
        });
  
      
    });
    function loaddatafinish(){
   
       $('#datareturfinish').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{route('gettablereturfinish')}}",
           columns: [
               { data: 'returndate', name: 'returndate' },
               { data: 'supplier.name', name: 'supplier.name' },
               { data: 'product.name', name: 'product.name' },
               { data: 'qty', name: 'qty' },
               { data: 'info', name: 'info' },
               { data: 'confirmationdate', name: 'confirmationdate' },
               { data: 'retur', name: 'retur' },
               { data: 'status', name: 'status' }
           ]
        });
   }
    function loaddataprocess(){
       
        $('#datareturprocess').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('gettablereturprocess')}}",
            columns: [
                { data: 'returndate', name: 'returndate' },
                { data: 'supplier.name', name: 'supplier.name' },
                { data: 'product.name', name: 'product.name' },
                { data: 'qty', name: 'qty' },
                { data: 'info', name: 'info' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ]
         });
    }
  
    function successdataprocess() {
      $('#datareturprocess').DataTable().ajax.reload(null, false);
   };
   function successdatafinish() {
      $('#datareturfinish').DataTable().ajax.reload(null, false);
   };
    $("#modalselect3").on("change", function(){

            var myid = this.value;
            if(myid =="no")
            {
                $("#modalselect2").html("");
                $("#modalselect2").html("<option value = 'no'>Please Select Product</option>");
            }
            else
            {
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{route('getitem')}}",
                    method: 'get',
                    data: {
                        idsupplier : myid
                        
                    },
                    success: function (result) {
                        $("#modalselect2").html("");
                        $("#modalselect2").html(result);
                       
                    }
                });
            }
            

    });
    $("#modalselect3edit").on("change", function(){

var myid = this.value;
if(myid =="no")
{
    $("#modalselect2edit").html("");
    $("#modalselect2edit").html("<option value = 'no'>Please Select Product</option>");
}
else
{
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
        url: "{{route('getitem')}}",
        method: 'get',
        data: {
            idsupplier : myid
            
        },
        success: function (result) {
            $("#modalselect2edit").html("");
            $("#modalselect2edit").html(result).promise().done(function () {
                $('#modalselect2edit').find('option[value='+editproduct+']').prop('selected', true).change();
            });
         
        }
    });
}


});

    function editdata(){
        var idedit = editproduct;
        var tanggalretur = $("#tanggalreturedit").val();
        var supplier = $("#modalselect3edit").val();
        var product = $("#modalselect2edit").val();
        var qty = $("#qtyreturedit").val();
        var info = $("#keteranganedit").val();
         //adddata
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: "{{route('editretur')}}",
            method: 'post',
            data: {
                myidedit : idglobal,
                mytanggal : tanggalretur,
                mysupplier : supplier,
                myproduct : product,
                myqty : qty,
                myinfo : info
                
            },
            success: function (result) {
                console.log(result);
                Swal.fire({
                                title: 'Berhasil',
                                text: 'Data retur berhasil diganti',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                               $("#tanggalreturedit").val("");
                               $("#qtyreturedit").val("");
                               $("#keteranganedit").val("");
                                    $("#tutupeditretur").click();
                                    successdataprocess();
                            });
                
            }
        });
    }
    function canceldata(element)
    {
        var myid = element.id;
       
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        allowOutsideClick: false,
        confirmButtonText: 'Yes, delete this retur data!'
        }).then((result) => {
                var myresult =  result['value'];
                if(myresult)
                {
                                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            });
                            $.ajax({
                                url: "{{route('cancelretur')}}",
                                method: 'post',
                                data: {
                                    myreturid : myid
                                    
                                },
                                success: function (result) {
                                    Swal.fire({
                                                    title: 'Berhasil',
                                                    text: 'Data retur berhasil dibatalkan',
                                                    type: 'success',
                                                    confirmButtonColor: '#53d408',
                                                    allowOutsideClick: false,
                                                }).then((result) => {
                                             
                                                        successdataprocess();
                                                });
                                    
                                }
                            });
                  }
        });
      
    }
    function confirmdata(){
        var statuscheckedreturn = $('#konfirmasi input[name=customRadio]:checked').val();
        // alert(statuscheckedreturn);
        // alert(statuscheckedreturn);
        var productid = editproduct;
        var confirmationdate = $("#tanggalkonfirmasi").val();
        var myconfirmid = idglobal;
        var mysolution = statussolusi;
        var mymoney = $("#numberreturuang").val();
        var mything = $("#numberreturbarang").val();
        if(mymoney == "")
        {
            mymoney = "0";
        }
        if(mything == ""  )
        {
            mything = "0";
        }
        if(statuscheckedreturn == "Retur")
        {
            mymoney = "0";
         
        }
        else if(statuscheckedreturn == "Refund")
        {
            mything = "0";
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: "{{route('confirmretur')}}",
            method: 'post',
            data: {
                myproductid : productid,
                myconfirmid : myconfirmid,
                mytanggal : confirmationdate,
                mysolutions : mysolution,
                mymoneys : mymoney,
                mythings : mything
                
            },
            success: function (result) {
                Swal.fire({
                                title: 'Berhasil',
                                text: 'Data retur berhasil dikonfirmasi',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                               $("#tanggalkonfirmasi").val("");
                               $("#numberreturuang").val("");
                               $("#numberreturbarang").val("");
                                    $("#tutupkonfirmasi").click();
                                    successdataprocess();
                            });
                
            }
        });
        // alert(mymoney +"--" +mything);
    }
    function adddata(){

        //declare
        var tanggalretur = $("#tanggalretur").val();
        var supplier = $("#modalselect3").val();
        var product = $("#modalselect2").val();
        var qty = $("#qtyretur").val();
        var info = $("#keterangan").val();

        //adddata
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: "{{route('addretur')}}",
            method: 'post',
            data: {
                mytanggal : tanggalretur,
                mysupplier : supplier,
                myproduct : product,
                myqty : qty,
                myinfo : info
                
            },
            success: function (result) {
                Swal.fire({
                                title: 'Berhasil',
                                text: 'Data retur berhasil diinput',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                               $("#tanggalretur").val("");
                               $("#qtyretur").val("");
                               $("#keterangan").val("");
                                    $("#tutuptambahretur").click();
                                    successdataprocess();
                            });
                
            }
        });
            
    }
   
</script>