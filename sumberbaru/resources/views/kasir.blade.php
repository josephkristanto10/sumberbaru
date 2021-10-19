@include("layout.header")
<style >
    #myproduct_filter{
        display:none;
    }
    #mycart_filter{
        display:none;
    }
    #mycart_length{
        display: none;
    }
    #mycart_wrapper{
        padding:0px;
    }
    #mycart_info, #mycart_paginate{
        display:none;
    }
</style>
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
                <h4 class="text-themecolor">Sistem Kasir Penjualan</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Kasir</li>
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
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-text">Cari Barang</span>
                            <input type="text" id = "mysearchdatatable" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="mt-3 mb-4">
                        <table id="myproduct" class="display table table-hover table-striped table-bordered" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="2%">Kode</th>
                                    <th width="30%">Nama Barang</th>
                                    <th width="13%">Harga 1</th>
                                    <th width="13%">Harga 2</th>
                                    <th width="13%">Harga 3</th>
                                    <th width="1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                  
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- Column -->
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <button type="button" onclick = "reset()" class="btn waves-effect waves-light btn-outline-danger float-right"><i class="fas fa-shopping-cart pr-2"></i>Reset Keranjang</button>
                        <h4 class="card-title">Keranjang Nota</h4>
                        <h6 class="card-subtitle">No 17082021001 </h6>

                        <hr>
                        <div class="table mt-40" style="clear: both;">
                            <table id = "mycart" class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th class="text-right">Jml</th>
                                        <th class="text-right">Subtotal</th>
                                        <th class="text-right">Ubah</th>
                                    </tr>
                                </thead>
                                <tbody >
                                        
                                        {!!$mystring!!}
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-left m-t-30 text-left" style="background-color:#FFF5E5;">
                            <hr>
                            <div class="row ml-2 mr-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pelanggan</label>
                                        <input type="text" id = "customer_name" class="form-control" placeholder="Masukan Nama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input type="text" id = "invoicenote" class="form-control" placeholder="Masukan Note">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <div class="form-check mr-sm-2">
                                                <input type="checkbox" class="form-check-input mt-1" onclick = "checkstatus(this);" id="checkboxkirim" value="check">
                                                <label class="form-check-label" for="checkbox00">Kirim</label>
                                            </div>
                                        </div>
                                        <input type="number" id = "deliverycost" class="form-control" aria-label="Text input with checkbox" placeholder="Masukan Ongkir" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="pull-right m-t-30 text-right">
                            <p>Jumlah Product : <label id = "qtyitemtotal"> {{$myitemcount}}  <label> </p>
                            <hr>
                            <h3><b>Total :</b> <label id = "allitemtotal"> {{$mytotal}} </label></h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <select class="custom-select col-6 float-left" id="inlineFormCustomSelect">
                                <option value ="0" selected>Pilih Metode Pembayaran</option>
                                <option value="Tunai">Tunai</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                            <button class="btn btn-info" onclick = "createinvoice()" type="button"><i class="fa fa-print pr-2"></i> Proses Pembayaran </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
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
                <h4 class="modal-title" id="vcenter" ><label id = 'titleinputinterface'>Piring A Warna A</label></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th>Kuantitas</th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id = "qtyinputinterface" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">&nbsp; pcs</i></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>
                                    <input type="text" id = "priceinputinterface" class="form-control mb-2">
                                    <button class="btn btn-sm btn-outline-info waves-effect waves-light" id = "buttonbantuanharga1">-</button>
                                    <button class="btn btn-sm btn-outline-info waves-effect waves-light" id = "buttonbantuanharga2">-</button>
                                    <button class="btn btn-sm btn-outline-info waves-effect waves-light" id = "buttonbantuanharga3">-</button>
                                </td>
                            </tr>
                            <tr>
                                <th>Subtotal</th>
                                <td>Rp. <label id = "subtotalinputinterface">60.000</label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "tutupmodaltambah">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-4"  onclick = "addcart(this)">Simpan</button>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- End Modal  -->
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vcenter" ><label id = 'titleinputinterfaceedit'>-</label></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <p>Pastikan Anda memasukan informasi yang benar</p>
                    <table class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th>Kuantitas</th>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id = "qtyinputinterfaceedit" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">&nbsp; pcs</i></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>
                                    <input type="text" id = "priceinputinterfaceedit" class="form-control mb-2">
                                    <button class="btn btn-sm btn-outline-info waves-effect waves-light" id = "buttonbantuanharga1edit">-</button>
                                    <button class="btn btn-sm btn-outline-info waves-effect waves-light" id = "buttonbantuanharga2edit">-</button>
                                    <button class="btn btn-sm btn-outline-info waves-effect waves-light" id = "buttonbantuanharga3edit">-</button>
                                </td>
                            </tr>
                            <tr>
                                <th>Subtotal</th>
                                <td>Rp. <label id = "subtotalinputinterfaceedit">60.000</label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal" id = "tutupmodaledit">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-4"  onclick = "editcart()">Simpan</button>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- ============================================================== -->
<!-- ============================================================== -->


<script>
    var subtotalawal = 0;
  
   var checkedshipment = false;
//    $("#deliverycost").val(0);
   
    var idproductchoose = "";
    $(document).ready(function() {
    
     
      
    });
   
  
    function createinvoice(){
        var paymentmethod = $("#inlineFormCustomSelect").val();
        var mygrandtotal = $("#allitemtotal").text();
        if(paymentmethod == "0")
        {
            Swal.fire({
                            type: 'info',
                            title: 'Payment method',
                            text: 'Please choose payment method first !! ',
                            confirmButtonColor: '#e00d0d',
                        });
        }
        else{
            var customername = $("#customer_name").val();
            var invoicenote = $("#invoicenote").val();
            var myqtyitemtotal = $("#qtyitemtotal").text();
            // var checkedchekbox = $("#checkboxkirim").checked;
            var cost = 0;
            if(checkedshipment)
            {
                cost = $("#deliverycost").val();
            }
            if(myqtyitemtotal == "")
            {
                Swal.fire({
                            type: 'info',
                            title: 'Item Zero on cart',
                            text: 'Please select product first !! ',
                            confirmButtonColor: '#e00d0d',
                        });
            }
            else
            {
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{route('createinvoice')}}",
                    method: 'POST',
                    data: {
                        mycustomername : customername,
                        myinvoicenote : invoicenote,
                        mychecked : checkedshipment,
                        mymethod : paymentmethod,
                        myqty : myqtyitemtotal,
                        mygrandtotals : mygrandtotal,
                        mycost : cost
                    },
                    success: function (result) {
                        // alert(result);
                        firstsummary();
                        successcart();
                        if(result == "noitem")
                        {
                            Swal.fire({
                                type: 'info',
                                title: 'Zero item',
                                text: 'Please enter items / product first !! ',
                                confirmButtonColor: '#e00d0d',
                            });
                        }
                        else{
                            $("#allitemtotal").text("0");
                            $("#qtyitemtotal").text("0");
                            $("#customer_name").val("");
                            $("#invoicenote").val("");
                            $("#deliverycost").val(0);
                            $("#tabelkeranjang").html("");
                            subtotalawal = 0;
                            Swal.fire({
                                title: 'Invoice Created',
                                text: 'Invoice Created Successfully',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                            });
                        }
                    }
                });
            }
        
        }
        
    }
    
    function checkstatus(element)
    {
        subtotalawal = $("#allitemtotal").text();
    // alert(element.cheked);
       if(element.checked)
       {    
           var ongkos = 0;
         
            ongkos = $("#deliverycost").val();
            if(ongkos == ""){
                ongkos = 0;
            }
        //    alert(subtotalawal);
             $("#deliverycost").prop('disabled', false);
             checkedshipment = true;
             $('#deliverycost').keyup(function(event){
                 
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault(); //stop character from entering input
            }
            else
            {
            
                var qty = $("#qtyinputinterface").val();
                var price =  $("#priceinputinterface").val();
                if(qty == null || qty == 0 )
                {
                    qty = 1;
                    $("#qtyinputinterface").val(1);
                }
                if(price == ""){
                    price = 1;
                
                }
                ongkos = $("#deliverycost").val();
                var subtotal = $("#allitemtotal").text();
                // alert(subtotal);
                
                var calculate = parseInt(subtotalawal) + parseInt(ongkos);

                $("#allitemtotal").text(calculate);
                if( $("#deliverycost").val() == ""){
                    $("#allitemtotal").text(subtotalawal);
                }
        
                // $("#allitemtotal").text(resultsubtotal);
            }
            });
            var resultsubtotal = parseInt(subtotalawal)+parseInt(ongkos);
            $("#allitemtotal").text(resultsubtotal);
         
       }
       else{
        var ongkos = 0;
        ongkos = $("#deliverycost").val();
             $("#deliverycost").prop('disabled', true);
             checkedshipment = false;
         
             $('#deliverycost').keyup(function(event){
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault(); //stop character from entering input
            }
            else
            {
            
                var qty = $("#qtyinputinterface").val();
                var price =  $("#priceinputinterface").val();
                if(qty == null || qty == 0 )
                {
                    qty = 1;
                    $("#qtyinputinterface").val(1);
                }
                if(price == ""){
                    price = 1;
                
                }
                 ongkos = $("#deliverycost").val();
                var subtotal = $("#allitemtotal").text();
                // alert(subtotal);
                var calculate = parseInt(subtotalawal) ;

                $("#allitemtotal").text(calculate);
                if( $("#deliverycost").val() == ""){
                    $("#allitemtotal").text(subtotalawal);
                }
             
            
            }
            });
          
            var resultsubtotal = parseInt(subtotalawal)-parseInt(ongkos);
            $("#allitemtotal").text(resultsubtotal);
              
       }
    }
  
    function addcart(element){
      
        var subtotal =  $("#subtotalinputinterface").text();
        if(subtotal == "0"){
                    Swal.fire({
                            type: 'info',
                            title: 'Zero quantity or price',
                            text: 'Please enter qty with price first!!',
                            confirmButtonColor: '#e00d0d',
                        });
        }
        else{
            var idproduct = idproductchoose;
            var price =  $("#priceinputinterface").val();
            var quantity = $("#qtyinputinterface").val();

            var hargaakhir = parseInt(price) * parseInt(quantity);

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('addcart')}}",
                method: 'POST',
                data: {
                    myidproduct : idproduct,
                    mypriceproduct : price,
                    myquantity : quantity,
                    mylastprice : hargaakhir

                },
                success: function (myresult) {
                    if(myresult == "exist")
                    {
                        Swal.fire({
                            title: 'Data Exists',
                            text: 'Cannot add product, duplicated product on cart',
                            type: 'info',
                        });
                    }
                    else{
                        successcart();
                        // console.log(result);
                        Swal.fire({
                                title: 'Data Added',
                                text: 'Data Added Successfully',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                                // $("#myformedit").trigger("reset");
                                // $("#canceledit").click();
                                $("#tutupmodaltambah").click();
                                $("#allitemtotal").text(myresult.myproductgrantotal);
                                $("#qtyitemtotal").text(myresult.myproductqty);
                                    if(checkedshipment)
                                    {
                                        var subtotal = $("#allitemtotal").text();
                                        var ongkos = $("#deliverycost").val();
                                        var resultcalculate = parseInt(subtotal) + parseInt(ongkos);
                                        $("#allitemtotal").text(resultcalculate);
                                        subtotalawal = parseInt(resultcalculate);
                                    }
                            });
                    }
                    // var obj = result;
                        // var mystring = jsonparse[0][mystring];
                        // var spliiter = result.split("~~~");
                        // var mydatatable = spliiter[0];
                        // var myalltaotal = spliiter[1];
                        // $("#tutupmodal").click();
                        // $("#tabelkeranjang").html("");
                        // $("#tabelkeranjang").html(obj.mystring);
                     
                        // Swal.fire({
                        //     title: 'Data Changed',
                        //     text: 'Data Changed Successfully',
                        //     type: 'success',
                        //     confirmButtonColor: '#53d408',
                        // });

                }
            });
        }
       
    };
    function reset(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        allowOutsideClick: false,
        confirmButtonText: 'Yes, empty my cart!'
        }).then((result) => {
        var myresult =  result['value'];
        if (myresult) {
          

            subtotalawal = 0;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('clearcart')}}",
                method: 'POST',
                data: {
                    mydata: "mystring"

                },
                success: function (result) {
                    // $("#qtyitemtotal").html("0");
                    // $("#allitemtotal").html("0");
                    // $("#tabelkeranjang").html("");
                     Swal.fire({
                            type: 'success',
                            title: 'Empty Cart Success Confirmation ',
                            text: 'Your cart is now empty!!',
                            confirmButtonColor: '#1fa00c',
                            allowOutsideClick: false,
                            }).then((result) => {
                                firstsummary();
                                successcart();
                            });
                }
            });
                
           
        }
        })
    }

    function inputinterface(element){
      
        var myid = element.id;
   
        var splitter = myid.split("_");
        var idperproduct = splitter[1];
        idproductchoose = idperproduct;
        var kodeproduct = $("#kode_" + idperproduct).text();
        var namaproduct =  $("#name_" + idperproduct).text();
        var harga1 = $("#hargapertama_"+idperproduct).text();
        var harga2 = $("#hargakedua_"+idperproduct).text();
        var harga3 = $("#hargaketiga_"+idperproduct).text();
        var spliiterharga1 = harga1.split(". ");
        var spliiterharga2 = harga2.split(". ");
        var spliiterharga3 = harga3.split(". ");
        // var qty = $("#qtyinputinterface").val();
        var price =  $("#priceinputinterface").val();
        
        if(price  == 0 )
        {
            $("#subtotalinputinterface").text("0");
        }
        
       
          
        $('#priceinputinterface').keyup(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
        else
        {
            var qty = $("#qtyinputinterface").val();
            var price =  $("#priceinputinterface").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
                $("#qtyinputinterface").val(1);
            }
            if(price == ""){
                price = 1;
              
            }
            var calculate = parseInt(qty) * parseInt(price);
            $("#subtotalinputinterface").text(calculate);
        }
        });
        $('#qtyinputinterface').keyup(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
        else
        {
            var qty = $("#qtyinputinterface").val();
            var price =  $("#priceinputinterface").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
             
            }
            if(price == ""){
                price = 1;
              
            }
            var calculate = parseInt(qty) * parseInt(price);
            $("#subtotalinputinterface").text(calculate);
        }
        });

        $("#qtyinputinterface").val(1);
        $("#priceinputinterface").val(harga3);
             var calculate = parseInt($("#qtyinputinterface").val()) * parseInt($("#priceinputinterface").val());
           
            $("#subtotalinputinterface").text(calculate);

        
        // -- 
        $("#titleinputinterface").text(namaproduct);
        $("#buttonbantuanharga1").text(harga1);
        $("#buttonbantuanharga2").text(harga2);
        $("#buttonbantuanharga3").text(harga3);


        //listener
        $("#buttonbantuanharga1").on("click", function(){
            var qty = $("#qtyinputinterface").val();
         
            $("#priceinputinterface").val(spliiterharga1[1]);
            var price =  $("#priceinputinterface").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
                $("#qtyinputinterface").val(1);
            }
            var calculate = parseInt(qty) * parseInt(price);
        
            $("#subtotalinputinterface").text(calculate);
        });
        $("#buttonbantuanharga2").on("click", function(){
            var qty = $("#qtyinputinterface").val();
            $("#priceinputinterface").val(spliiterharga2[1]);
            var price =  $("#priceinputinterface").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
                $("#qtyinputinterface").val(1);
            }
            var calculate = parseInt(qty) * parseInt(price);
          
            $("#subtotalinputinterface").text(calculate);
        });
        $("#buttonbantuanharga3").on("click", function(){
            var qty = $("#qtyinputinterface").val();
            $("#priceinputinterface").val(spliiterharga3[1]);
            var price =  $("#priceinputinterface").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
                $("#qtyinputinterface").val(1);
            }
            var calculate = parseInt(qty) * parseInt(price);
          
            $("#subtotalinputinterface").text(calculate);
        });
    };
</script>

@include("layout.footer")
<script>
       firstsummary();
     function firstsummary(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('getsummary')}}",
                method: 'GET',
                success: function (result) {
                        // console.log(result);
                        $("#allitemtotal").text(result.myproductgrantotal);
                                $("#qtyitemtotal").text(result.myproductqty);
                }
            });
    };
 
        $('#qtyinputinterfaceedit').keyup(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
        else
        {
            var qty = $("#qtyinputinterfaceedit").val();
            var price =  $("#priceinputinterfaceedit").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
             
            }
            if(price == ""){
                price = 1;
              
            }
            var calculate = parseInt(qty) * parseInt(price);
            $("#subtotalinputinterfaceedit").text(calculate);
        }
        });

        $('#priceinputinterfaceedit').keyup(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
        else
        {
            var qty = $("#qtyinputinterfaceedit").val();
            var price =  $("#priceinputinterfaceedit").val();
            if(qty == null || qty == 0 )
            {
                qty = 1;
                $("#qtyinputinterfaceedit").val(1);
            }
            if(price == ""){
                price = 1;
              
            }
            var calculate = parseInt(qty) * parseInt(price);
            $("#subtotalinputinterfaceedit").text(calculate);
        }
        });
        function successproduct() {
      $('#myproduct').DataTable().ajax.reload(null, false);
   };
     
       function successcart() {
      $('#mycart').DataTable().ajax.reload(null, false);
   };
   loaddatacart();
   function loaddataproduct(){
   var producttable =  $('#myproduct').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('gettableproduct')}}",
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'name', name: 'name' },
            { data: 'harga1', name: 'harga1' },
            { data: 'harga2', name: 'harga2' },
            { data: 'harga3', name: 'harga3' },
            { data: 'action', name: 'action' }
        ]
           });
           $('#mysearchdatatable').on( 'keyup', function () {
            producttable.search( this.value ).draw();
            } );
   }
   function loaddatacart(){
    $('#mycart').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('getcart')}}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'qty', name: 'qty' },
            { data: 'subtotal', name: 'subtotal' },
            { data: 'action', name: 'action' }
        ],
        initComplete: function(settings, json){
            loaddataproduct();
        }
        });
   }

   
   

    
        var globalidcart = "";
        function openmodaleditcustom(element){
            var myid = element.id;
            globalidcart = myid;
            var name = $("#name_"+myid).text();
            var qty = $("#qty_"+myid).text();
            var subtotal = $("#subtotal_"+myid).text();
            var selliingprice = $("#seliingprice_"+myid).val();
            $("#titleinputinterfaceedit").text(name);
            $("#qtyinputinterfaceedit").val(qty);
            $("#priceinputinterfaceedit").val(selliingprice);
            $("#subtotalinputinterfaceedit").text(subtotal);
            
        }
        function editcart(){
            var myid = globalidcart;
            var qty = $("#qtyinputinterfaceedit").val();
            var price = $("#priceinputinterfaceedit").val();
            var subtotal = parseInt(qty) * parseInt(price);
            // var selliingprice = $("#seliingprice_"+myid).val(); 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('editcart')}}",
                method: 'POST',
                data: {
                    myid: globalidcart,
                    myqty: qty,
                    myprice : price,
                    mysubtotal : subtotal

                },
                success: function (myresult) {
                  
                    Swal.fire({
                                title: 'Data Changed',
                                text: 'Data Changed Successfully',
                                type: 'success',
                                confirmButtonColor: '#53d408',
                                allowOutsideClick: false,
                            }).then((result) => {
                                successcart();
                                $("#myformedit").trigger("reset");
                                $("#tutupmodaledit").click();
                                $("#allitemtotal").text(myresult.myproductgrantotal);
                                $("#qtyitemtotal").text(myresult.myproductqty);
                            });
                   
                }
            });
        }
</script>

