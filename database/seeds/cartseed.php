<?php

use App\Models\Cart;
use Illuminate\Database\Seeder;

class cartseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $carts = $cart;
        DB::table('cart')->delete();
        foreach($carts as $c){
            Cart::create($c);
        }
    }
}
