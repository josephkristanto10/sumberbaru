<?php

use App\Models\ActionDoctor;
use Illuminate\Database\Seeder;

class action_doctor_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/public_health_office.php';
        $action_doctors = $action_doctor;
        DB::table('action_doctor')->delete();
        foreach($action_doctors as $ad){
            ActionDoctor::create($ad);
        }
    }
}
