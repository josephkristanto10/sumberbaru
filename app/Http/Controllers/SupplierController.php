<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\SupplierProduct;
use App\Models\SupplierProductLog;
use DataTables;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('daftar_supplier');
    }
    public function getdatatableproductsupplier(){

        $supplier = DB::select("SELECT supplier.id, supplier.name, supplier.phone, supplier.address, count(supplier_product.id) as jumlahbarang FROM supplier_product right join supplier on supplier.id = supplier_product.idsupplier group by supplier.id");
        return DataTables::of($supplier)
        ->editColumn('name', function($query) {
            return '<label id = "name'.$query->id.'"> '.$query->name.'</label>';
        })
        ->editColumn('phone', function($query) {
            return '<label id = "phone'.$query->id.'"> '.$query->phone.'</label>';
        })
        ->editColumn('address', function($query) {
            return '<label id = "address'.$query->id.'"> '.$query->address.'</label>';
        })
        // ->editColumn('status', function($query) {
        //     return '<label id = "status'.$query->id.'"> '.$query->status.'</label>';
        // })
        ->editColumn('list', function($query) {
            $myurl = url('/supplier/productsupplier').'/'.$query->id;
            return 

            '<a href = "'.$myurl.'"><button type="button" class="btn waves-effect waves-light btn-sm btn-info pl-2 pr-2" ><i class="fas fa-server pr-2"></i>'.$query->jumlahbarang.' Barang</button></a>
            ';
        })
        ->addColumn('action', 
               function ($query) {
                return '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#modaledit" id = "'.$query->id.'" onclick = "filldatachange(this)"><i class="fas fa-edit pr-2"></i>Ubah</button>
              
 ';})
              
               ->rawColumns(['action', 'name', 'phone', 'address', 'status', 'list'])
               ->make(true);
    }
    public function getdatatableproductpersupplier($id){
    
        $supplierproduct = SupplierProduct::join('product','product.id','=',"supplier_product.idproduct")
                                            ->where("idsupplier",'=',$id)->select("product.id as idproduct", "product.name", "product.kode", 'supplier_product.idsupplier')->get();
        return DataTables::of($supplierproduct)
        ->editColumn('code', function($query) {
            return '<label id = "name'.$query->idproduct.'"> '.$query->kode.'</label>';
        })
        ->editColumn('name', function($query) {
            return '<label id = "name'.$query->idproduct.'"> '.$query->name.'</label>';
        })
        ->addColumn('action', 
               function ($query) {
              
                return '
                <button type="button" class="btn waves-effect waves-light btn-sm btn-danger pl-2 pr-2" onclick="deleteproductonsupplier(\''.$query->idproduct.'\',\''.$query->idsupplier.'\')" class="img-fluid model_img" ><i class="fas fa-trash"></i></button>
 ';})
              
               ->rawColumns(['action', 'name', 'code','status'])
               ->make(true);
    }
    public function deleteitemonsupplier(Request $request){

            $myidproduct = $request->myproduct;
            $myidsupplier = $request->mysupplier;
            $delete = SupplierProduct::where("idsupplier",'=',$myidsupplier)->where("idproduct",'=',$myidproduct)->get();
            $supplierproductdeleteid = $delete[0]->id;
            $deletelog = SupplierProductLog::where("idsupplierproduct",'=',$supplierproductdeleteid)->delete();
            $deleteitem = SupplierProduct::where("idsupplier",'=',$myidsupplier)->where("idproduct",'=',$myidproduct)->delete();

    }
    public function indexproductsupplier($id){
        
        $mysup = Supplier::where('id','=',$id)->get();
        $product = Product::all();
        return view('barang_supplier', compact('mysup','product'));
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
        if($request->mytipe == "addsupplier")
        {
            try{
                $mysup =  new Supplier;
                $mysup->name = $request->myname;
                $mysup->phone = $request->myphone;
                $mysup->address = $request->myaddress;
                $mysup->save(); 
             }
             catch(\Exception $e){
                return $e->getMessage();
             }
        }
        else if($request->mytipe == "addsupplierproduct"){
            try{
                $mysup =  new SupplierProduct;
                $mysup->idsupplier = $request->mysupplier;
                $mysup->idproduct = $request->myproduct;
                $mysup->price = "0";
                $mysup->status = "Active";
                $mysup->save(); 

                $idsup = $mysup->id;

                $mysuplog =  new SupplierProductLog;
                $mysuplog->idsupplierproduct = $idsup;
                $mysuplog->price = "0";
                $mysuplog->save(); 
             }
             catch(\Exception $e){
                return $e->getMessage();
             }
        }
       


      
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
        try{
            $supplier = Supplier::find($id);
            $supplier->name = $request->myname;
            $supplier->phone = $request->myphone;
            $supplier->address = $request->myaddress;
            $supplier->save(); // returns false
         }
         catch(\Exception $e){
            return $e->getMessage();
         }
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
