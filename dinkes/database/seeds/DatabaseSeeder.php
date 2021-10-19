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
           $this->call(public_health_office_seed::class);
           $this->call(public_health_center_seed::class);
           $this->call(public_health_center_doctor_seed::class);
           $this->call(key_performance_doctor_seed::class);
           $this->call(key_performance_office_seed::class);
           $this->call(action_doctor_seed::class);
    }
}
