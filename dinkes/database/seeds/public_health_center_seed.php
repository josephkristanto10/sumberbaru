<?php

use App\Models\PublicHealthCenter;
use Illuminate\Database\Seeder;

class public_health_center_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/public_health_office.php';
        $public_health_centers = $public_health_center;
        DB::table('public_health_center')->delete();
        foreach($public_health_centers as $phc){
            PublicHealthCenter::create($phc);
        }
    }
}
