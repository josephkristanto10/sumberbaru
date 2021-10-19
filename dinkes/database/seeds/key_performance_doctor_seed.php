<?php

use App\models\KeyPerformanceDoctor;
use Illuminate\Database\Seeder;

class key_performance_doctor_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/public_health_office.php';
        $key_performance_doctors = $key_performance_doctor;
        DB::table('key_performance_doctor')->delete();
        foreach($key_performance_doctors as $kpd){
            KeyPerformanceDoctor::create($kpd);
        }
    }
}
