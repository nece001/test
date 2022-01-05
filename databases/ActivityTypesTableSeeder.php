<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActivityTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activity_types')->delete();
        
        \DB::table('activity_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-07-28 14:24:10',
                'updated_at' => '2021-07-28 14:24:10',
                'deleted_at' => NULL,
                'name' => 'MEETING',
                'title' => '会议',
                'short_desc' => '会议',
            ),
        ));
        
        
    }
}