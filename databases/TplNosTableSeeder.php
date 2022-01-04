<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TplNosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tpl_nos')->delete();
        
        \DB::table('tpl_nos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-07-28 10:18:47',
                'updated_at' => '2021-07-28 10:18:47',
                'deleted_at' => NULL,
                'tpl_no' => '1',
                'title' => '模板1',
                'param' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-07-28 11:00:54',
                'updated_at' => '2021-07-28 11:00:54',
                'deleted_at' => NULL,
                'tpl_no' => '22222222',
                'title' => '模板2',
                'param' => NULL,
            ),
        ));
        
        
    }
}