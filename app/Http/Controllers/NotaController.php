<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nota');
    }
    public function getmydata(Request $request){
        $mytanggal = $request->tanggalku;
        // $spliiter = explode(" - ", $mytanggal);
        // $startdate = date_create($spliiter[0]);
        // $enddate = date_create($spliiter[1]);
        // $formatstart = date_format($startdate,"Y-m-d");
        // $formatend = date_format($enddate,"Y-m-d");
        $spliiter = explode(" - ", $mytanggal);
        $startdate = $spliiter[0];
        $splitterstartdate = explode('/',$startdate);
        $formatstart =  $splitterstartdate[2]."-".$splitterstartdate[0]."-".$splitterstartdate[1];

        $enddate = $spliiter[1];
        $splitterenddate = explode('/',$enddate);
        $formatend = $splitterenddate[2]."-".$splitterenddate[0]."-".$splitterenddate[1];
        $myinv = Invoice::where('transaction_date','>=',$formatstart)->where('transaction_date','<=',$formatend)->get();
        return DataTables::of($myinv)
        ->editColumn('testdate', function($query) {
            $mytransactiondate = $query->created_at;
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $mytransactiondate);
            $mydate = $date->format('d-m-Y  H:i');
            return '<label id = "createdat_'.$query->id.'"> '.$mydate.'</label>';
        })
        ->editColumn('transactionno', function($query) {
            return '<label id = "transactionno_'.$query->id.'"> '.$query->transaction_no.'</label>';
        })
        ->editColumn('customer', function($query) {
            return '<label id = "customer_'.$query->id.'"> '.$query->transaction_customer.'</label>';
        })
        ->editColumn('quantity', function($query) {
            return '<label id = "quantity_'.$query->id.'"> '.$query->qty_item.'</label>';
        })
        ->editColumn('total', function($query) {
            return '<label id = "total_'.$query->id.'"> '.number_format($query->total).'</label>';
        })
        ->editColumn('method', function($query) {
            return '<label id = "method_'.$query->id.'"> '.$query->transaction_method.'</label>';
        })
     
        ->addColumn('action',
               function ($query) {
                   $mydelivery = "";
                   if($query->transaction_shipment_delivery == "true"){
                            $mydelivery = '<a href = "#detail" id = "'.$query->id.'" onclick = "openmodaldetailinvoice(this)" data-toggle = "modal"><button type="button" class="btn waves-effect waves-light btn-sm btn-success pr-2"><i class="fas fa-server pr-2"></i>Kelola</button></a>';
                   }
                   else
                   {
                    $mydelivery = '<a href = "#detail" id = "'.$query->id.'" onclick = "openmodaldetailinvoice(this)" data-toggle = "modal"><button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2"><i class="fas fa-server pr-2"></i>Kelola</button></a>';
                   }
                // $myurls = url("/pricelist/indexpricelist")."/".$query->id;
                return $mydelivery;
})
              
               ->rawColumns(['action', 'testdate', 'transactionno', 'customer', 'quantity', 'total','method'])
               ->make(true);
    }
    public function getmydetaildata($id){
        $getdatadetail = Invoicedetail::join("product", "product.id", '=', 'invoice_detail.idproduct')
                         ->join("invoice", "invoice.id", '=', 'invoice_detail.idtransaction')
                         ->where('idtransaction','=',$id)
                         ->select("invoice_detail.*", 'product.name as productname','product.kode as productcode', 'invoice.transaction_shipment_delivery_cost as delivery_cost', "invoice.total", "invoice.transaction_no", "invoice.transaction_customer", "invoice.transaction_note", "invoice.created_at as tanggaldibuat")
                         ->get();
        $mystring = "";
        $mycountnumber = count($getdatadetail);
        $mydate = $getdatadetail[0]['tanggaldibuat'];
        $mydateconvert = date_create($mydate);
        $mydateconvertfix = date_format($mydateconvert, 'j F Y -  H:i');
        $total = $getdatadetail[0]['total'];
        $deliverycost = $getdatadetail[0]['delivery_cost'];
        $customer = $getdatadetail[0]['transaction_customer'];
        $note = $getdatadetail[0]['transaction_note'];
        $transactionno = $getdatadetail[0]['transaction_no'];
        for($i = 0 ; $i < count($getdatadetail); $i++){
            $mystring .= "<tr><td>".$getdatadetail[$i]['productcode']."</td><td>".$getdatadetail[$i]['productname']."</td><td>".$getdatadetail[$i]['qty']."</td><td>".number_format($getdatadetail[$i]['selling_price'])."</td><td>".number_format($getdatadetail[$i]['subtotal'])."</td></tr>";
        }
        return response()->json([
            'notransaction' => $transactionno,
            'transactiondate' => $mydateconvertfix,
            'counts' => $mycountnumber,
            'customer' => $customer,
            'note' => $note,
            'total' => $total,
            'delivery_cost' => $deliverycost,
            'mytable' => $mystring
          ]);
      
    }
    public function getdateinvoice(Request $request){
        $mydate = $request->datevalue;
        $spliiter = explode(" - ", $mydate);
        $startdate = $spliiter[0];
        $splitterstartdate = explode('/',$startdate);
        $formatstart =  $splitterstartdate[2]."-".$splitterstartdate[0]."-".$splitterstartdate[1];

        $enddate = $spliiter[1];
        $splitterenddate = explode('/',$enddate);
        $formatend = $splitterenddate[2]."-".$splitterenddate[0]."-".$splitterenddate[1];

        // $enddate = date_create($spliiter[1]);
        // // $formatstart = date_format($startdate,"Y-m-d");
        // $formatstartfix = date_format($formatstart,"Y-m-d");
        // $formatendfix = date_format($formatend,"Y-m-d");


        $invoice =  Invoice::where('transaction_date','>=',$formatstart)->where('transaction_date','<=',$formatend)->get();
        $qty = Invoice::where('transaction_date','>=',$formatstart)->where('transaction_date','<=',$formatend)->sum('qty_item');
        $total = Invoice::where('transaction_date','>=',$formatstart)->where('transaction_date','<=',$formatend)->get();
        $tanggal = date('Y-m-d');
        $bersih = DB::select("SELECT sum(subtotal-buyingprice) as keuntungan FROM `invoice_detail` where date(created_at) >= '$formatstart' and date(created_at) <= '$formatend' ");
        $mytotal = 0;
        for($i = 0 ; $i< count($total);$i++){
            $subtotal = $total[$i]['total'];
            if($total[$i]['transaction_shipment_delivery'] == "true")
            {
                $subtotal -= $total[$i]['transaction_shipment_delivery_cost'];
            }
            $mytotal += $subtotal;
        }
       $jumlahinvoice =  $invoice->count();
       $keuntungan = $bersih[0]->keuntungan;
       if(is_null($bersih[0]->keuntungan))
       {
            $keuntungan = 0;
       }

        return response()->json([
            'invoice' => $jumlahinvoice,
            'qty' => $qty,
            'pendapatan' => $mytotal,
            'keuntungan' => $keuntungan,
            'start' => $formatstart,
            'end' => $formatend
                 ]);

        // return $formatstart. "  ==  ".$formatend;
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
