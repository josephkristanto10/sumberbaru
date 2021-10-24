<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(productseeder::class);
        $this->call(supplierseeder::class);
        $this->call(supplierproductseeder::class);
        $this->call(supplierproductlogseeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(InvoiceDetailSeeder::class);
        $this->call(transactionreturnseed::class);
        $this->call(cartseed::class);
    }
}
