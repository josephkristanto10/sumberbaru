<?php

use App\Models\TransactionReturn;
use Illuminate\Database\Seeder;

class transactionreturnseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $transaction_returns = $transaction_return;
        DB::table('transaction_return')->delete();
        foreach($transaction_returns as $tr){
            TransactionReturn::create($tr);
        }
    }
}
