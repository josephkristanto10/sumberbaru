<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\StokLog;
use App\Models\SupplierProduct;
use App\Models\SupplierProductLog;
use DB;
use DataTables;
use DateTime;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stok');
    }
    public function getdatatableproductlog(){
      
        $stock = DB::select("select *, p.id as idproduct from product p left join stok_log sl on sl.idproduct = p.id group by p.id");


        return DataTables::of($stock)
        ->editColumn('kode', function($query) {
        return '<label id = "code'.$query->idproduct.'"> '.$query->kode.'</label>';
        })
        ->editColumn('name', function($query) {
        return '<label id = "name'.$query->idproduct.'"> '.$query->name.'</label>';
        })
        ->editColumn('stok', function($query) {
            return '<label id = "price'.$query->idproduct.'"> '.$query->stok.' Pcs</label>';
            })
        ->editColumn('tanggal', function($query) {
            // $format = 'jS F Y  H:i:s"';
            // $mytanggalku = "2020-09-21 08:00:00";
            $mylog = DB::select("SELECT idproduct, max(created_at) as tanggalterbaru FROM `stok_log` group by idproduct");
            // return 
            $cocok = "tidak";
            for($i = 0 ; $i < count($mylog); $i++)
            {
                if($mylog[$i]->idproduct == $query->idproduct)
                {
                    $cocok = "ya";
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $mylog[$i]->tanggalterbaru);
                    $mydate = $date->format('jS F Y  H:i:s');
                    return '<label id = "tanggal'.$query->idproduct.'"> '.$mydate.' </label>';
                }
            }
            if($cocok == "tidak")
            {
         
                    return '<label id = "tanggal'.$query->idproduct.'">No Record</label>';
            }

          
         
        })
        ->addColumn('action', 
        function ($query) {
        return '
        <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#tambah" id ='.$query->idproduct.' onclick=opentambahmodul(this)><i class="fas fa-plus pr-2"></i>Tambah</button>
        <button type="button" class="btn waves-effect waves-light btn-sm btn-info pr-2" data-toggle="modal" data-target="#riwayat" onclick = gethistorystock('.$query->idproduct.')><i class="far fa-file pr-2"></i>Riwayat</button>
        ';})

        ->rawColumns(['action', 'name', 'kode','tanggal','stok'])
        ->make(true);


        //  Supplier        
        // SELECT s.id, s.name from supplier_product sp 
        // inner join product p on p.id = sp.idproduct
        // inner join supplier s on s.id = sp.idsupplier
        // where sp.idproduct = 1
    }
    function gethistory(Request $request ){
        $idproduct = $request->idproduct;
        $gethistory = StokLog::where("idproduct",'=',$idproduct)
                               ->join("supplier",'supplier.id','=','stok_log.idsupplier')
                               ->orderBy("stok_log.id", 'desc')
                               ->select("stok_log.*", "supplier.name")
                               ->get();
        $mystring = "";
        for($i = 0 ; $i < count($gethistory); $i++)
        {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $gethistory[$i]->created_at);
            $mydate = $date->format('jS F Y');
            $mystring .= "<tr><td>".$gethistory[$i]->created_at."</td><td>".$gethistory[$i]->qty." Pcs</td><td>".$gethistory[$i]->name."</td>/tr>";
        }
        return $mystring;
    }
    function getsupplieraddstocklog(Request $request){
        $myid = $request->id;
        $getsupplier = SupplierProduct::join("product", "product.id", '=','supplier_product.idproduct')
                                      ->join("supplier", "supplier.id", '=','supplier_product.idsupplier')
                                      ->where('supplier_product.idproduct','=',$myid)
                                      ->select("supplier.id", "supplier.name")
                                      ->get();
        $mystring = "";
        for($i= 0; $i<count($getsupplier);$i++)
        {
            $mystring .= "<option value = '".$getsupplier[$i]->id."'>".$getsupplier[$i]->name."</option>";
        }
        return $mystring;
    }
    public function addstocklog(Request $request){
        $idproduct = $request->idproducts;
        $idsupplier = $request->idsuppliers;
        $stok = $request->qty;
        $addstocklog = new StokLog;
        $addstocklog->idproduct = $idproduct;
        $addstocklog->idsupplier = $idsupplier;
        $addstocklog->qty = $stok;
        $addstocklog->save();

        $product = Product::find($idproduct)
                            ->increment('stok',$stok);;
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
