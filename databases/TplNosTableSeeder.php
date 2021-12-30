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
                'created_at' => '2021-07-28 09:06:37',
                'updated_at' => '2021-07-28 12:19:18',
                'deleted_at' => NULL,
                'tpl_no' => '11111111',
                'title' => '模板1',
                'param' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-07-28 13:37:45',
                'updated_at' => '2021-07-28 13:37:45',
                'deleted_at' => NULL,
                'tpl_no' => 'aaaaa123',
                'title' => '测试',
                'param' => NULL,
            ),
        ));
        
        
    }
}