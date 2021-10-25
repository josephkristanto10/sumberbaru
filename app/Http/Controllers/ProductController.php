<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return view('daftar_barang');
    }
    public function getjsons(Request $request)
    {
        return DataTables::of(Product::query())
        ->editColumn('kode', function($query) {
            return '<label id = "kode'.$query->id.'"> '.$query->kode.'</label>';
        })
        ->editColumn('name', function($query) {
            return '<label id = "name'.$query->id.'"> '.$query->name.'</label>';
        })
        ->editColumn('harga1', function($query) {
            return '<label id = "hargapertama'.$query->id.'"> '.number_format($query->harga1).'</label>';
        })
        ->editColumn('harga2', function($query) {
            return '<label id = "hargakedua'.$query->id.'"> '.number_format($query->harga2).'</label>';
        })
        ->editColumn('harga3', function($query) {
            return '<label id = "hargaketiga'.$query->id.'"> '.number_format($query->harga3).'</label>';
        })
        ->editColumn('status', function($query) {
            $mystatus = "";
            if($query->status == "Active"){
                $mystatus = '<b><label id = "status'.$query->id.'" class = "text-success"> '.$query->status.'</label></b>';
            }
            else
            {
                $mystatus = '<b><label id = "status'.$query->id.'" class = "text-danger"> '.$query->status.'</label></b';
            }
            return $mystatus;
        })
               ->addColumn('intro', 
               function ($query) {
                $mystatus = "";
                if($query->status == "Active"){
                    $mystring = "inActive";
                    $mystatus = '<button type="button" style = "margin-top:10px;" style = "margin-top:10px;" onclick="setstatusproduct(\''.$mystring.'\',\''.$query->id.'\')" class="btn waves-effect waves-light btn-sm btn-danger pr-2"  id = "'.$query->id.'" ><i class="fas fa-edit pr-2"></i>Set Inactive</button>';
                }
                else{
                    $mystring = "Active";
                    $mystatus = '<button type="button" style = "margin-top:10px;" style = "margin-top:10px;" onclick="setstatusproduct(\''.$mystring.'\',\''.$query->id.'\')"  class="btn waves-effect waves-light btn-sm btn-success pr-2"  id = "'.$query->id.'" ><i class="fas fa-edit pr-2"></i>Set Active</button>';
                }
                return '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary pr-2" data-toggle="modal" data-target="#modaledit" id = "'.$query->id.'" onclick = "filldatachange(this)"><i class="fas fa-edit pr-2"></i>Ubah</button> '.$mystatus.'
 ';})
              
               ->rawColumns(['intro', 'kode', 'status', 'name', 'harga1', 'harga2', 'harga3'])
               ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setstatusproduct(Request $request){
      
            $stats = $request->stats;
            $ids = $request->ids;
           
            $findproduct = Product::find($ids);
            $findproduct->status = $stats;
            $findproduct->save();
            
            return $findproduct;
        
    


    }
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                 try{
                    $products = new Product;
                    $products->name = $request->myname;
                    $products->kode = $request->mycode;
                    $products->harga1 = $request->myprice1;
                    $products->harga2 = $request->myprice2;
                    $products->harga3 = $request->myprice3;
                    $products->save(); // returns false
                 }
                 catch(\Exception $e){
                    return $e->getMessage();
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
        // echo $id;
      
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
            $product = Product::find($id);
            $product->kode = $request->mycode;
            $product->name = $request->myname;
            $product->harga1 = $request->myprice1;
            $product->harga2 = $request->myprice2;
            $product->harga3 = $request->myprice3;
            $product->save(); // returns false
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
