<?php

namespace App\Http\Controllers;
use App\Models\TransactionReturn;
use App\Models\SupplierProduct;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use DataTables;
use DateTime;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('retur',compact('supplier'));
    }
    public function cancelretur(Request $request){
        $myid = $request->myreturid;
        $transactionretur = TransactionReturn::find($myid);
        $transactionretur->status = "Cancelled";
        $transactionretur->save();
    }
    public function confirmretur(Request $request){
        $myconfirmid = $request->myconfirmid;
        $myproduct = $request->myproductid;
        $mytanggal = $request->mytanggal;
        $date = date_create($mytanggal);
        $confirmdate = date_format($date, 'Y-m-d');
        $mysolutions = $request->mysolutions;
        $mymoneys = $request->mymoneys;
        $mythings = $request->mythings;
        $transactionretur = TransactionReturn::find($myconfirmid);
        $transactionretur->confirmationdate = $confirmdate;
        $transactionretur->returnitemqty = $mythings;
        $transactionretur->returnitemmoney = $mymoneys;
        $transactionretur->solution = $mysolutions;
        $transactionretur->status = "Finish";
        $transactionretur->save();
        $Product = Product::find($myproduct);
        $Product->decrement('stok', $mythings);
        $Product->save();
    }
    public function editretur(Request $request){
        $myeditid = $request->myidedit;
        $mytanggal = $request->mytanggal;
        $date = date_create($mytanggal);
        $returdate = date_format($date, 'Y-m-d');
        $mysupplier = $request->mysupplier;
        $myproduct  = $request->myproduct;
        $myqty = $request->myqty;
        $myinfo = $request->myinfo;
        $transactionretur = TransactionReturn::find($myeditid);
        $transactionretur->idproduct = $myproduct;
        $transactionretur->idsupplier = $mysupplier;
        $transactionretur->returndate = $returdate;
        $transactionretur->qty = $myqty;
        $transactionretur->info = $myinfo;
        $transactionretur->save();
        return $transactionretur;
        
    }
    public function addretur(Request $request){
        $mytanggal = $request->mytanggal;
        $date = date_create($mytanggal);
        $returdate = date_format($date, 'Y-m-d');
        $mysupplier = $request->mysupplier;
        $myproduct  = $request->myproduct;
        $myqty = $request->myqty;
        $myinfo = $request->myinfo;
        $transactionretur = new TransactionReturn;
        $transactionretur->idproduct = $myproduct;
        $transactionretur->idsupplier = $mysupplier;
        $transactionretur->returndate = $returdate;
        $transactionretur->qty = $myqty;
        $transactionretur->info = $myinfo;
        $transactionretur->status = "Process";
        $transactionretur->save();
    }
    public function getdatainprogress(){
        $dataretur = TransactionReturn::join('product','product.id','=','transaction_return.idproduct')
                                      ->join('supplier','supplier.id','=','transaction_return.idsupplier')
                                      ->where('transaction_return.status','!=','Finish')
                                      ->select("transaction_return.*", "product.name as productname", 'supplier.name as suppliername', 'transaction_return.info as infoketerangan')
                                      ->get();

        return DataTables::of($dataretur)
        ->editColumn('returndate', function($query) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $query->created_at);
            $mydate = $date->format('d-m-Y  H:i');
            return '<label id = "returndate_'.$query->id.'">'.$mydate.'</label>';
        })
        ->editColumn('supplier.name', function($query) {
            return '<label id = "suppliername_'.$query->id.'">'.$query->suppliername.'</label>'."<input type = 'hidden' id = 'idsupplier_".$query->id."' value = '".$query->idsupplier."'>";
        })
        ->editColumn('product.name', function($query) {
            return '<label id = "product_'.$query->id.'">'.$query->productname.'</label>'."<input type = 'hidden' id = 'idproduct_".$query->id."' value = '".$query->idproduct."'>";
        })
        ->editColumn('qty', function($query) {
            return '<label id = "qty_'.$query->id.'">'.$query->qty.'</label>';
        })
        ->editColumn('info', function($query) {
            return '<label id = "info_'.$query->id.'">'.$query->infoketerangan.'</label>';
        })
        ->editColumn('status', function($query) {
            $mystatus = "";
            if($query->status == "Process")
            {
                $mystatus = '<span class="badge badge-pill badge-warning text-white ml-auto">Dalam Proses</span>';
            }
            else
            {
                $mystatus = '<span class="badge badge-pill badge-danger text-white ml-auto">Dibatalkan</span>';
            }
            return $mystatus;
        })
        ->addColumn('action', 
               function ($query) {
                   $mystring = "";
                if($query->status == "Process")
                {
                    $mystring = ' <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-layout-media-overlay pl-2 pr-1"></i> Pilih
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id = "'.$query->id.'" onclick = "openmodalkonfirmasi(this)" href="javascript:void(0)" data-target="#konfirmasi" data-toggle="modal">Konfirmasi</a>
                        <a class="dropdown-item" id = "'.$query->id.'" onclick = "openmodaledit(this)" href="javascript:void(0)" data-target="#edit" data-toggle="modal">Ubah</a>
                        <a class="dropdown-item" id = "'.$query->id.'" onclick = "canceldata(this)" href="javascript:void(0)">Batal</a>
                    </div>
                </div>
     ';
                }
                return $mystring;})
              
               ->rawColumns(['action', 'returndate', 'supplier.name', 'product.name', 'qty', 'info', 'status'])
               ->make(true);
    }
    public function getdatafinish(){
        $dataretur = TransactionReturn::join('product','product.id','=','transaction_return.idproduct')
                                      ->join('supplier','supplier.id','=','transaction_return.idsupplier')
                                      ->where('transaction_return.status','=','Finish')
                                      ->select("transaction_return.*", "product.name as productname", 'supplier.name as suppliername', 'transaction_return.info as infoketerangan')
                                      ->get();

        return DataTables::of($dataretur)
        ->editColumn('returndate', function($query) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $query->created_at);
            $mydate = $date->format('d-m-Y  H:i');
            return '<label id = "returndate_'.$query->id.'">'.$mydate.'</label>';
        })
        ->editColumn('supplier.name', function($query) {
            return '<label id = "suppliername_'.$query->id.'">'.$query->suppliername.'</label>';
        })
        ->editColumn('product.name', function($query) {
            return '<label id = "product_'.$query->id.'">'.$query->productname.'</label>';
        })
        ->editColumn('qty', function($query) {
            return '<label id = "qty_'.$query->id.'">'.$query->qty.'</label>';
        })
        ->editColumn('info', function($query) {
            return '<label id = "info_'.$query->id.'">'.$query->infoketerangan.'</label>';
        })
        ->editColumn('confirmationdate', function($query) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $query->updated_at);
            $mydate = $date->format('d-m-Y  H:i');
            return '<label id = "confirmationdate_'.$query->id.'">'.$mydate.'</label>';
        })
        ->editColumn('retur', function($query) {
            return '<label id = "confirmationdate_'.$query->id.'">Retur('.$query->returnitemqty.')<br>Refund('.$query->returnitemmoney.')'.'</label>';
        })
        ->editColumn('status', function($query) {
            return '<span class="badge badge-pill badge-success text-white ml-auto">Selesai</span>';
        })
              
               ->rawColumns(['action', 'returndate', 'supplier.name', 'product.name', 'qty','info','confirmationdate', 'retur','status'])
               ->make(true);
    }
    public function getdatafinished(){

    }
    public function getitem(Request $request){
        $idsupplier = $request->idsupplier;
        $supplierproduct = SupplierProduct::join("product",'product.id','=','supplier_product.idproduct')
                         ->where("idsupplier",'=',$idsupplier)
                         ->select('product.id','product.name')
                          ->get();
        $mystring = "";
        for($i = 0 ; $i < count($supplierproduct); $i++){
            $mystring.= "<option value = '".$supplierproduct[$i]->id."'>".$supplierproduct[$i]->name."</option>";
        }
        return $mystring;
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
        //
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
