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
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="mt-3 mb-4">
                        <table id="example26" class="display table table-hover table-striped table-bordered" cellspacing="0">
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
                            @foreach($myproduct as $mp)
                                <tr>
                                   
                                    <td id = 'kode{{$mp->id}}'>{{$mp->kode}}</td>
                                    <td id = 'name{{$mp->id}}'>{{$mp->name}}</td>
                                    <td id = 'hargapertama{{$mp->id}}'>Rp. {{$mp->harga1}}</td>
                                    <td id = 'hargakedua{{$mp->id}}'>Rp. {{$mp->harga2}}</td>
                                    <td id = 'hargaketiga{{$mp->id}}'>Rp. {{$mp->harga3}}</td>
                                    <td>
                                        <button type="button" id = "b-{{$mp->id}}" onclick = "inputinterface(this)" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus pl-2 pr-2"></i></button>
                                    </td>
                                  
                                </tr>
                             @endforeach 
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- Column -->
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn waves-effect waves-light btn-outline-danger float-right"><i class="fas fa-shopping-cart pr-2"></i>Reset Keranjang</button>
                        <h4 class="card-title">Keranjang Nota</h4>
                        <h6 class="card-subtitle">No 17082021001 </h6>

                        <hr>
                        <div class="table m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th class="text-right">Jml</th>
                                        <th class="text-right">Subtotal</th>
                                        <th class="text-right">Ubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Barang A, Varian A </td>
                                        <td class="text-right">2</td>
                                        <td class="text-right"> Rp. 100.000 </td>
                                        <td class="text-right"> <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#tambah"><i class="fas fa-edit"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>Barang A, Varian B</td>
                                        <td class="text-right">3</td>
                                        <td class="text-right"> Rp. 120.000 </td>
                                        <td class="text-right"> <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#tambah"><i class="fas fa-edit"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-left m-t-30 text-left" style="background-color:#FFF5E5;">
                            <hr>
                            <div class="row ml-2 mr-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pelanggan</label>
                                        <input type="text" class="form-control" placeholder="Masukan Nama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input type="text" class="form-control" placeholder="Masukan Note">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <div class="form-check mr-sm-2">
                                                <input type="checkbox" class="form-check-input mt-1" id="checkbox00" value="check">
                                                <label class="form-check-label" for="checkbox00">Kirim</label>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Text input with checkbox" placeholder="Masukan Ongkir">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="pull-right m-t-30 text-right">
                            <p>Jumlah : 5</p>
                            <hr>
                            <h3><b>Total :</b> 220.000</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <select class="custom-select col-6 float-left" id="inlineFormCustomSelect">
                                <option selected>Pilih Metode Pembayaran</option>
                                <option value="1">Tunai</option>
                                <option value="2">Transfer</option>
                            </select>
                            <button class="btn btn-info" type="submit"><i class="fa fa-print pr-2"></i> Proses Pembayaran </button>
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
                <button type="button" class="btn btn-outline waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-info waves-effect col-4" data-dismiss="modal">Simpan</button>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- End Modal  -->
<!-- ============================================================== -->
<!-- ============================================================== -->


<script>
      $(document).ready(function() {
     
      

               
                $("#buttonbantuanharga2").text(harga2);
                $("#buttonbantuanharga3").text(harga3);
        });
    function inputinterface(element){

        var myid = element.id;
        var mysplit = myid.split("-");
        var idperproduct  =  mysplit[1];
        var kodeproduct = $("#kode" + idperproduct).text();
        var namaproduct =  $("#name" + idperproduct).text();
        var harga1 = $("#hargapertama"+idperproduct).text();
        var harga2 = $("#hargakedua"+idperproduct).text();
        var harga3 = $("#hargaketiga"+idperproduct).text();
        var spliiterharga1 = harga1.split(". ");
        var spliiterharga2 = harga2.split(". ");
        var spliiterharga3 = harga3.split(". ");

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
        
        $("#priceinputinterface").val(spliiterharga3[1]);
        
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