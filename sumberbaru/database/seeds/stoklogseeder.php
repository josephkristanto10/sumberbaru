<?php

use Illuminate\Database\Seeder;
use App\Models\StokLog;

class stoklogseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include base_path().'/database/seeds/sumberbaru.php';
        $stok_logs = $stok_log;
        DB::table('stok_log')->delete();
        foreach($stok_logs as $sl){
            StokLog::create($sl);
        }
        
    }
}
