<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice =  Invoice::whereDate('created_at', '=', date('Y-m-d'))->get();
        $qty = Invoice::whereDate('created_at', '=', date('Y-m-d'))->sum('qty_item');
        $total = Invoice::whereDate('created_at', '=', date('Y-m-d'))->get();
        $tanggal = date('Y-m-d');
        $bersih = DB::select("SELECT sum(subtotal-buyingprice) as keuntungan FROM `invoice_detail` where date(created_at) = '$tanggal'");
        $mytotal = 0;
        for($i = 0 ; $i< count($total);$i++){
            $subtotal = $total[$i]['total'];
            if($total[$i]['transaction_shipment_delivery'] == "true")
            {
                $subtotal -= $total[$i]['transaction_shipment_delivery_cost'];
            }
            $mytotal += $subtotal;
        }
        $bersih[0]->keuntungan = number_format($bersih[0]->keuntungan);
        $mytotal = number_format($mytotal);
        return view('index', compact('invoice', 'qty', 'mytotal', 'bersih'));
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
