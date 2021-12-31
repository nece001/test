<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CallIdsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('call_ids')->delete();
        
        
        
    }
}