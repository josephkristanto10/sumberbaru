<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $myproduct = $product;
        DB::table('product')->delete();
        foreach($product as $p){
            Product::create($p);
        }
    }
}
