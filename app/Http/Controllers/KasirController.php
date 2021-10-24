<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\Cart;
use App\Models\InvoiceDetail;
use DataTables;
use DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myitemcount = 0;
        $mycart = session()->get('cart');
        $myexplode = explode(",",$mycart);
        $mystring = "";
        $alltotal = 0;
        if(count($myexplode) > 1){
          
            for($i = 0 ; $i < count($myexplode); $i++)
            {
                $mybutton = '
                <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>';
              
                $explodeperitem = explode("||",$myexplode[$i]);
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>".$mybutton."<td></tr>";
                $alltotal += $subtotal;
                $myitemcount += $qtyitem;
            }
           
        }
        else if(count($myexplode) == 1)
        {
            $mybutton = '
            <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>';
          
            $explodeperitem = explode("||",$myexplode[0]);
            if(isset($explodeperitem[1]))
            {
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>".$mybutton."<td></tr>";
                $alltotal += $subtotal;
                $myitemcount += $qtyitem;
            }
          
       
        }
        $mystring = $mystring;
        $mytotal = $alltotal;
        session()->put('totalqty',$myitemcount);
        session()->put('subtotalcart',$mytotal);
        // dd($myexplode);
        

        $myproduct = Product::orderBy('kode','asc')->get();
        return view('kasir', compact("myproduct", "mystring", "mytotal" , "myitemcount"));
    }
    public function editcart(Request $request){
        $myid =  $request->myid;
        $myqty =  $request->myqty;
        $myprice = $request->myprice;
        $mysubtotal = $request->mysubtotal;
        $cart = Cart::find($myid);
        $cart->qty = $myqty;
        $cart->selling_price = $myprice;
        $cart->subtotal = $mysubtotal;
        $cart->save();
        $mydata = db::select("select count(id) as producttype, sum(qty) as  productqty, sum(subtotal) as grandtotal from cart");
   
        return response()->json([
     'myproducttype' => $mydata[0]->producttype,
     'myproductqty' => $mydata[0]->productqty,
     'myproductgrantotal' => $mydata[0]->grandtotal
   ]);
        
    }
    public function gettableproduct(){
      
        $mycart = DB::select("select * from product inner join supplier_product on supplier_product.idproduct = product.id where product.stok > 0 and product.status = 'Active' group by product.id");
        // Product::join("supplier_product",'supplier_product.idproduct','=','product.id')->where('product.stok', '>','0')->get();
        return DataTables::of($mycart)
        ->editColumn('kode', function($query) {
            return '<label id = "kode_'.$query->id.'"> '.$query->kode.'</label>';
        })
        ->editColumn('name', function($query) {
            return '<label id = "name_'.$query->id.'"> '.$query->name.'</label>';
        })
        ->editColumn('harga1', function($query) {
            return '<label id = "hargapertama_'.$query->id.'"> '.$query->harga1.'</label>';
        })
        ->editColumn('harga2', function($query) {
            return '<label id = "hargakedua_'.$query->id.'"> '.$query->harga2.'</label>';
        })
        ->editColumn('harga3', function($query) {
            return '<label id = "hargaketiga_'.$query->id.'"> '.$query->harga3.'</label>';
        })
        
        ->editColumn('action', function($query) {
            $mybutton = '<button type="button" id = "add_'.$query->id.'" onclick = "inputinterface(this)" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus pl-2 pr-2"></i></button>';
          
            return $mybutton;
        })
//         ->addColumn('action', 
//                function ($query) {
//                 $myurls = url("/pricelist/indexpricelist")."/".$query->id;
//                 return ' <a href = "'.$myurls.'"><button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2"><i class="fas fa-server pr-2"></i>Kelola</button></a>
//  ';})
              
               ->rawColumns(['action', 'kode', 'name', 'harga1', 'harga2', 'harga3'])
               ->make(true);
    }
    public function getsummary(){
        $mydata = db::select("select count(id) as producttype, sum(qty) as  productqty, sum(subtotal) as grandtotal from cart");
   
        return response()->json([
     'myproducttype' => $mydata[0]->producttype,
     'myproductqty' => $mydata[0]->productqty,
     'myproductgrantotal' => $mydata[0]->grandtotal
   ]);

    }
    public function getcart(){
      
        $mycart = Cart::join("product", 'product.id','=','cart.idproduct')->select("cart.*",'product.name')->get();
        return DataTables::of($mycart)
        ->editColumn('name', function($query) {
            return '<label id = "name_'.$query->id.'"> '.$query->name.'</label>';
        })
        ->editColumn('qty', function($query) {
            return '<label id = "qty_'.$query->id.'"> '.$query->qty.'</label>'.'<input type = "hidden" value = "'.$query->selling_price.'" id = "seliingprice_'.$query->id.'">';
        })
        ->editColumn('subtotal', function($query) {
            return '<label id = "subtotal_'.$query->id.'"> '.number_format($query->subtotal).'</label>';
        })
        
        ->editColumn('action', function($query) {
            $mybutton = '
            <button type="button" id = "'.$query->id.'" onclick = "openmodaleditcustom(this)" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>';
          
            return $mybutton;
        })
//         ->addColumn('action', 
//                function ($query) {
//                 $myurls = url("/pricelist/indexpricelist")."/".$query->id;
//                 return ' <a href = "'.$myurls.'"><button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2"><i class="fas fa-server pr-2"></i>Kelola</button></a>
//  ';})
              
               ->rawColumns(['action', 'name', 'qty', 'subtotal'])
               ->make(true);
    }
    public function createinvoice(Request $request){
        date_default_timezone_set('Asia/Jakarta');
       $mydate = date("Y-m-d");
       $custname = $request->mycustomername;
       $invoicenote = $request->myinvoicenote;
       $checked = $request->mychecked;
       $cost = $request->mycost;
       $myqty = $request->myqty;
       $paymentmethod = $request->mymethod;
       $mygrandtotal = $request->mygrandtotals;
       
       //invoice
       $invoice = new Invoice;
        $invoice->transaction_no = "txx";
        $invoice->transaction_date = $mydate;
        $invoice->transaction_method = $paymentmethod;
        $invoice->transaction_shipment_delivery = $checked;
        $invoice->transaction_shipment_delivery_cost = $cost;
        $invoice->transaction_customer = $custname;
        $invoice->transaction_note = $invoicenote;
        $invoice->qty_item = $myqty;
        $invoice->total = $mygrandtotal;
        $invoice->save(); 
        $myinvoiceid = $invoice->id;

        // Cart
        $mycart = Cart::all();

        // Invoice Detail
        for($i = 0 ; $i < count($mycart) ; $i++)
        {
            $buyingprice = DB::select("SELECT avg(price) as rata FROM `supplier_product` where idproduct = '".$mycart[$i]['idproduct']."'");
            $buyingpricefix = $buyingprice[0]->rata;
            $invoice_detail = new InvoiceDetail;
            $invoice_detail->idproduct = $mycart[$i]['idproduct'];
            $invoice_detail->idtransaction = $myinvoiceid;
            $invoice_detail->qty = $mycart[$i]['qty'];
            $invoice_detail->selling_price = $mycart[$i]['selling_price'];
            $invoice_detail->subtotal = $mycart[$i]['subtotal'];
            $invoice_detail->buyingprice = $buyingpricefix * $mycart[$i]['qty'];
            $invoice_detail->save();
        }
        Cart::truncate();
       
            // return $myqty;
   

    //    if (session()->has('cart')) 
    //    {

           
    //         $mycart = session()->get('cart');
        
 
    //         $invoice = new Invoice;
    //         $invoice->transaction_no = "txx";
    //         $invoice->transaction_date = $mydate;
    //         $invoice->transaction_method = $paymentmethod;
    //         $invoice->transaction_shipment_delivery = $checked;
    //         $invoice->transaction_shipment_delivery_cost = $cost;
    //         $invoice->transaction_customer = $custname;
    //         $invoice->transaction_note = $invoicenote;
    //         $invoice->qty_item = session()->get('totalqty');
    //         $invoice->total = session()->get('subtotalcart');
    //         $invoice->save(); 
    //         $myinvoiceid = $invoice->id;
    //         $myexplode = explode(",",$mycart);
    //         for($i = 0 ; $i < count($myexplode); $i++)
    //         {
    //             $explodeperitem = explode("||",$myexplode[$i]);
    //             $iditem = $explodeperitem[0];
    //             $namaitem = $explodeperitem[1];
    //             $qtyitem = $explodeperitem[2];
    //             $subtotal = $explodeperitem[3];
    //             $invoice_detail = new InvoiceDetail;
    //             $invoice_detail->idproduct = $iditem;
    //             $invoice_detail->idtransaction = $myinvoiceid;
    //             $invoice_detail->qty = $qtyitem;
    //             $invoice_detail->selling_price = ($subtotal/$qtyitem);
    //             $invoice_detail->subtotal = $subtotal;
    //             $invoice_detail->save();
    //         }

    //         Session::forget('cart');
    //         Session::forget('subtotalcart');
    //         Session::forget('totalqty');
    //    }
    //    else{
    //        return "noitem";
    //    }
    }
    public function addcart(Request $request){
        $myidproduct = $request->myidproduct;
        $mypriceproduct = $request->mypriceproduct;
        $myquantity = $request->myquantity;
        $mylastprice = $request->mylastprice;
        $cart = Cart::where('idproduct','=',$myidproduct)->first();
        // return $cart;
        // $countdata = $cart->count();
        // return $countdata;
        if($cart === null){
            $mycart = new Cart;
            $mycart->idproduct = $myidproduct;
            $mycart->qty = $myquantity;
            $mycart->selling_price = $mypriceproduct;
            $mycart->subtotal = $mylastprice;
            $mycart->save();

            $mydata = db::select("select count(id) as producttype, sum(qty) as  productqty, sum(subtotal) as grandtotal from cart");
   
            return response()->json([
         'myproducttype' => $mydata[0]->producttype,
         'myproductqty' => $mydata[0]->productqty,
         'myproductgrantotal' => $mydata[0]->grandtotal
              ]);
        }
        else{
            // $priceproduct = $cart[0]['selling_price'];
            // // $lastprice = parseInt($cart[0]['qty']) * $priceproduct;
            // $cart->increment('qty', $myquantity);
           
            // $cart->subtotal = $mylastprice;
            // $cart->save();
            return "exist";
        }
        // $myitemcount = 0;
        // $mydatacart = $request->mydata;
        // $mystring  = "";
        // $alltotal = 0;
        // if (session()->has('cart')) {
        //     $mycart = session()->get('cart');
        //     $myvaluesession = $mycart.",".$mydatacart;
            
        //     $myexplode = explode(",",$myvaluesession);
        //     $mystring = "";
          
        //     for($i = 0 ; $i < count($myexplode); $i++)
        //     {
        //         $mybutton = '
        //         <button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>';
              
        //         $explodeperitem = explode("||",$myexplode[$i]);
        //         $namaitem = $explodeperitem[1];
        //         $qtyitem = $explodeperitem[2];
        //         $subtotal = $explodeperitem[3];
        //         $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>".$mybutton."<td></tr>";
        //         $alltotal += $subtotal;
        //         $myitemcount += $qtyitem;
        //     }
        //     session()->put('cart', $myvaluesession);
        //     session()->put('subtotalcart',$alltotal);
        //     session()->put('totalqty',$myitemcount);
        // }
        // else{
        //         $mysession = session()->put('cart', $mydatacart);
        //         $mycart = session()->get('cart');
        //         $explodeperitem = explode("||",$mycart);
        //         $namaitem = $explodeperitem[1];
        //         $qtyitem = $explodeperitem[2];
        //         $subtotal = $explodeperitem[3];
        //         session()->put('subtotalcart',$subtotal);
        //         $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>".$mybutton."<td></tr>";
        //         $alltotal = $subtotal;
        //         $myitemcount += $qtyitem;
        //         session()->put('totalqty',$myitemcount);
        // }
        // return response()->json([
        //     'mystring' => $mystring,
        //     'mytotalqty' => $myitemcount,
        //     'alltotal' => $alltotal
        //   ]);
        // return $mystring."~~~".$alltotal;
       
    }
    public function clearcart(){
        // Session::forget('cart');
        // Session::forget('subtotalcart');
        // Session::forget('totalqty');
        // $mystring = "";
        // return $mystring;
        Cart::truncate();
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
