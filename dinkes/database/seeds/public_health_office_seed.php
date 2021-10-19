<?php

use App\Models\PublicHealthOffice;
use Illuminate\Database\Seeder;

class public_health_office_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/public_health_office.php';
        $public_health_offices = $public_health_office;
        DB::table('public_health_office')->delete();
        foreach($public_health_offices as $pho){
            PublicHealthOffice::create($pho);
        }
    }
}
