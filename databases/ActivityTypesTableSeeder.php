<?php

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
                'created_at' => '2021-07-28 16:13:25',
                'updated_at' => '2021-07-28 16:13:25',
                'deleted_at' => NULL,
                'name' => 'MEETING',
                'title' => '会议',
                'short_desc' => '会议',
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-07-28 16:16:36',
                'updated_at' => '2021-07-28 16:16:36',
                'deleted_at' => NULL,
                'name' => 'SALE',
                'title' => '展业',
                'short_desc' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2021-07-28 16:16:53',
                'updated_at' => '2021-07-28 16:16:53',
                'deleted_at' => NULL,
                'name' => 'LIVETV',
                'title' => '直播',
                'short_desc' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2021-07-28 16:17:07',
                'updated_at' => '2021-07-28 16:17:07',
                'deleted_at' => NULL,
                'name' => 'TRAIN',
                'title' => '培训',
                'short_desc' => NULL,
            ),
        ));
        
        
    }
}