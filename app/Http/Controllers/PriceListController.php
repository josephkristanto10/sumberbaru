<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierProductLog;
use DB;
use DateTime;
use DataTables;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pricelist_supplier');
    }
    public function indexpricelist($id){
        $mysup = Supplier::where('id','=',$id)->get();
        return view('kelola_harga', compact('mysup')); 
    }
    public function getdatatablesupplier(){

     

        $supplier = DB::select("SELECT supplier.id, supplier.name, supplier.phone, supplier.address, count(supplier_product.id) as jumlahbarang FROM supplier_product right join supplier on supplier.id = supplier_product.idsupplier group by supplier.id");
        return DataTables::of($supplier)
        ->editColumn('name', function($query) {
            return '<label id = "name'.$query->id.'"> '.$query->name.'</label>';
        })
        ->editColumn('address', function($query) {
            return '<label id = "address'.$query->id.'"> '.$query->address.'</label>';
        })
        
        ->editColumn('list', function($query) {
  
            return 

            '<a ><button type="button" class="btn waves-effect waves-light btn-sm btn-info pl-2 pr-2" ><i class="fas fa-server pr-2"></i>'.$query->jumlahbarang.' Barang</button></a>
            ';
        })
        ->addColumn('action', 
               function ($query) {
                $myurls = url("/pricelist/indexpricelist")."/".$query->id;
                return ' <a href = "'.$myurls.'"><button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2"><i class="fas fa-server pr-2"></i>Kelola</button></a>
 ';})
              
               ->rawColumns(['action', 'name', 'phone', 'address', 'status', 'list'])
               ->make(true);
    }

    public function getdatatablepersupplier($id){
        // $supplierproduct = SupplierProduct::join('product','product.id','=',"supplier_product.idproduct")
        // ->join('supplier_product_log', 'supplier_product_log.idsupplierproduct','=','supplier_product.id')
        // ->where("idsupplier",'=',$id)->select("product.id as idproduct", "product.name", "product.kode")->get();
     
        $supplierproduct = DB::select("select extable.idsupplierproduct, extable.tanggalterbaru, extable.price as hargasupplier, product.name, product.kode, product.id as idproduct
        from
        (select idsupplierproduct, max(price) as price, id ,max(created_at) as tanggalterbaru from supplier_product_log group by idsupplierproduct) extable,  supplier_product_log inner join supplier_product on supplier_product.id = supplier_product_log.idsupplierproduct inner join product on product.id = supplier_product.idproduct
        where extable.id = supplier_product_log.id and supplier_product.idsupplier = '$id' group by supplier_product_log.idsupplierproduct");

        return DataTables::of($supplierproduct)
        ->editColumn('code', function($query) {
        return '<label id = "code'.$query->idproduct.'"> '.$query->kode.'</label>';
        })
        ->editColumn('name', function($query) {
        return '<label id = "name'.$query->idproduct.'"> '.$query->name.'</label>';
        })
        ->editColumn('price', function($query) {
            return '<label id = "price'.$query->idproduct.'"> '.number_format($query->hargasupplier).'</label>';
            })
        ->editColumn('updatedat', function($query) {
            // $format = 'jS F Y  H:i:s"';
            // $mytanggalku = "2020-09-21 08:00:00";
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $query->tanggalterbaru);
            $mydate = $date->format('jS F Y  H:i:s');
            return '<label id = "tanggal'.$query->idproduct.'"> '.$mydate.' </label>';
        })
        ->addColumn('action', 
        function ($query) {
        return '
        <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#modal" id = "'.$query->idproduct.'|'.$query->name.'" onclick="perbaharui(this)"><i class="fas fa-edit pr-2"></i>Perbaharui</button>
        <button type="button" class="btn waves-effect waves-light btn-sm btn-info pr-2" data-toggle="modal" data-target="#riwayat" onclick = "gethistoryproduct('.$query->idproduct.')"><i class="far fa-file pr-2"></i>Riwayat</button>
        ';})

        ->rawColumns(['action', 'name', 'code','updatedat','price'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idproduct = $request->myid;
        $idsupplier = $request->mysupplier;
        $price = $request->myprice;
        $findsupplierproduct = SupplierProduct::where('idproduct','=',$idproduct)
                                               ->where('idsupplier','=',$idsupplier)->first();
          $findsupplierproduct->update(['price' => $price]);
         
       $idsup = $findsupplierproduct->id;
       $mysuplog =  new SupplierProductLog;
       $mysuplog->idsupplierproduct = $idsup;
       $mysuplog->price = $price;
       $mysuplog->save();  
    }
    public function gethistoryproduct(Request $request)
    {
        $idsupplier = $request->idsupplier;
        $idproduct = $request->idproduct;
        $supplierlog = SupplierProductLog::join("supplier_product",'supplier_product.id','=','supplier_product_log.idsupplierproduct')
                                          ->where("supplier_product.idsupplier",'=',$idsupplier)
                                          ->where("supplier_product.idproduct",'=',$idproduct)
                                          ->select("supplier_product_log.price", 'supplier_product_log.created_at')
                                          ->orderBy("supplier_product_log.created_at", "desc")
                                          ->get();
        $myhistory = "";
        for($i = 0; $i<count($supplierlog); $i++)
        {
            $myprice = $supplierlog[$i]['price'];
            $mydate = date_format($supplierlog[$i]['created_at'], 'jS F Y  H:i:s');
            
            $myhistory .= "<tr><td width='7%'>$mydate</td><td width='10%'>$myprice</td></tr>";
        }
        return $myhistory;

    }
    public function editpricelist(Request $request){
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
