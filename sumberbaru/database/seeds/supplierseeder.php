<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class supplierseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $mysupplier = $supplier;
        DB::table('supplier')->delete();
        foreach($mysupplier as $ms){
            Supplier::create($ms);
        }
    }
}
