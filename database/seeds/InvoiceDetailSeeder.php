<?php

use Illuminate\Database\Seeder;
use App\Models\InvoiceDetail;

class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //invoice_detail
        include base_path().'/database/seeds/sumberbaru.php';
        $invoices_detail = $invoice_detail;
        DB::table('invoice_detail')->delete();
        foreach($invoices_detail as $id){
            InvoiceDetail::create($id);
        }
    }
}
