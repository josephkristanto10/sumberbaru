<?php

use App\Models\PublicHealthCenterDoctor;
use Illuminate\Database\Seeder;

class public_health_center_doctor_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/public_health_office.php';
        $public_health_center_doctors = $public_health_center_doctor;
        DB::table('public_health_center_doctor')->delete();
        foreach($public_health_center_doctors as $phcd){
            PublicHealthCenterDoctor::create($phcd);
        }
    }
}
