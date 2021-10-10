<?php

use Illuminate\Database\Seeder;
use App\Models\SupplierProduct;

class supplierproductseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $mysupplierproduct = $supplier_product;
        DB::table('supplier_product')->delete();
        foreach($mysupplierproduct as $msp){
            SupplierProduct::create($msp);
        }
    }
}
