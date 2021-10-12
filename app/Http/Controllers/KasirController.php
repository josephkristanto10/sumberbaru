<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

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
                $explodeperitem = explode("||",$myexplode[$i]);
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>#<td></tr>";
                $alltotal += $subtotal;
                $myitemcount += $qtyitem;
            }
           
        }
        else if(count($myexplode) == 1)
        {
            $explodeperitem = explode("||",$myexplode[0]);
            if(isset($explodeperitem[1]))
            {
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>#<td></tr>";
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
    public function createinvoice(Request $request){
       $custname = $request->mycustomername;
       $invoicenote = $request->myinvoicenote;
       $checked = $request->mychecked;
       $cost = $request->mycost;
       $paymentmethod = $request->mymethod;

       if (session()->has('cart')) 
       {

           
            $mycart = session()->get('cart');
        
            date_default_timezone_set('Asia/Jakarta');
            $mydate = date("Y-m-d");
            $invoice = new Invoice;
            $invoice->transaction_no = "txx";
            $invoice->transaction_date = $mydate;
            $invoice->transaction_method = $paymentmethod;
            $invoice->transaction_shipment_delivery = $checked;
            $invoice->transaction_shipment_delivery_cost = $cost;
            $invoice->transaction_customer = $custname;
            $invoice->transaction_note = $invoicenote;
            $invoice->qty_item = session()->get('totalqty');
            $invoice->total = session()->get('subtotalcart');
            $invoice->save(); 
            $myinvoiceid = $invoice->id;
            $myexplode = explode(",",$mycart);
            for($i = 0 ; $i < count($myexplode); $i++)
            {
                $explodeperitem = explode("||",$myexplode[$i]);
                $iditem = $explodeperitem[0];
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                $invoice_detail = new InvoiceDetail;
                $invoice_detail->idproduct = $iditem;
                $invoice_detail->idtransaction = $myinvoiceid;
                $invoice_detail->qty = $qtyitem;
                $invoice_detail->selling_price = ($subtotal/$qtyitem);
                $invoice_detail->subtotal = $subtotal;
                $invoice_detail->save();
            }

            Session::forget('cart');
            Session::forget('subtotalcart');
            Session::forget('totalqty');
       }
       else{
           return "noitem";
       }
    }
    public function addcart(Request $request){
        $myitemcount = 0;
        $mydatacart = $request->mydata;
        $mystring  = "";
        $alltotal = 0;
        if (session()->has('cart')) {
            $mycart = session()->get('cart');
            $myvaluesession = $mycart.",".$mydatacart;
            
            $myexplode = explode(",",$myvaluesession);
            $mystring = "";
          
            for($i = 0 ; $i < count($myexplode); $i++)
            {
                $explodeperitem = explode("||",$myexplode[$i]);
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>#<td></tr>";
                $alltotal += $subtotal;
                $myitemcount += $qtyitem;
            }
            session()->put('cart', $myvaluesession);
            session()->put('subtotalcart',$alltotal);
            session()->put('totalqty',$myitemcount);
        }
        else{
                $mysession = session()->put('cart', $mydatacart);
                $mycart = session()->get('cart');
                $explodeperitem = explode("||",$mycart);
                $namaitem = $explodeperitem[1];
                $qtyitem = $explodeperitem[2];
                $subtotal = $explodeperitem[3];
                session()->put('subtotalcart',$subtotal);
                $mystring .= "<tr><td>$namaitem</td><td>$qtyitem</td><td>$subtotal</td><td>#<td></tr>";
                $alltotal = $subtotal;
                $myitemcount += $qtyitem;
                session()->put('totalqty',$myitemcount);
        }
        return response()->json([
            'mystring' => $mystring,
            'mytotalqty' => $myitemcount,
            'alltotal' => $alltotal
          ]);
        // return $mystring."~~~".$alltotal;
       
    }
    public function clearcart(){
        Session::forget('cart');
        Session::forget('subtotalcart');
        Session::forget('totalqty');
        $mystring = "";
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
