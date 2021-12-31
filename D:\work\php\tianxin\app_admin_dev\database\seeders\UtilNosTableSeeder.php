<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UtilNosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('util_nos')->delete();
        
        \DB::table('util_nos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-08-05 13:54:24',
                'updated_at' => '2021-08-05 13:54:24',
                'deleted_at' => NULL,
                'util_type_id' => 1,
                'util_no' => 'util0001',
                'title' => '工具1',
                'tenant_id' => 'tenant01',
                'param' => '{}',
            ),
        ));
        
        
    }
}