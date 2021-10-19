<?php

use App\models\KeyPerformanceOfficer;
use Illuminate\Database\Seeder;

class key_performance_office_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/public_health_office.php';
        $key_performance_officers = $key_performance_officer;
        DB::table('key_performance_officer')->delete();
        foreach($key_performance_officers as $kpo){
            KeyPerformanceOfficer::create($kpo);
        }
    }
}
