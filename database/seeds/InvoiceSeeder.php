<?php

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $invoices = $invoice;
        DB::table('invoice')->delete();
        foreach($invoices as $i){
            Invoice::create($i);
        }
    }
}
