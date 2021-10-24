<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class admin_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $admins = $admin;
        DB::table('admin')->delete();
        foreach($admins as $a){
            Admin::create($a);
        }
    }
}
