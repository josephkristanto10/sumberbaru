<?php

use Illuminate\Database\Seeder;
use App\Models\SupplierProductLog;

class supplierproductlogseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $supplier_product_logs = $supplier_product_log;
        DB::table('supplier_product_log')->delete();
        foreach($supplier_product_logs as $spl){
            SupplierProductLog::create($spl);
        }
    }
}
