<?php

use Illuminate\Database\Seeder;

class mysql_kift_laravel_StatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status')->delete();
        
        \DB::table('status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2021-12-02 18:54:09',
                'updated_at' => '2021-12-02 18:54:09',
                'deleted_at' => NULL,
                'user_id' => 1,
                'current' => 0,
                'statusable_id' => '1',
                'statusable_type' => 'App\\Models\\Order',
                'state_name' => 'payment',
                'state_value' => 'unpay',
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2021-12-02 18:54:09',
                'updated_at' => '2021-12-02 18:54:09',
                'deleted_at' => '2021-12-02 18:54:09',
                'user_id' => 1,
                'current' => 1,
                'statusable_id' => '1',
                'statusable_type' => 'App\\Models\\Order',
                'state_name' => 'payment',
                'state_value' => 'paing',
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2021-12-02 18:54:09',
                'updated_at' => '2021-12-02 18:54:09',
                'deleted_at' => NULL,
                'user_id' => 2,
                'current' => 1,
                'statusable_id' => '2',
                'statusable_type' => 'App\\Models\\Order',
                'state_name' => 'payment',
                'state_value' => 'paied',
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2021-12-02 18:56:58',
                'updated_at' => '2021-12-02 18:56:58',
                'deleted_at' => NULL,
                'user_id' => 1,
                'current' => 0,
                'statusable_id' => '1',
                'statusable_type' => 'abc',
                'state_name' => 'payment',
                'state_value' => 'unpay',
            ),
            4 => 
            array (
                'id' => 5,
                'created_at' => '2021-12-02 18:56:58',
                'updated_at' => '2021-12-02 18:56:58',
                'deleted_at' => NULL,
                'user_id' => 2,
                'current' => 1,
                'statusable_id' => '1',
                'statusable_type' => 'App\\Models\\Order',
                'state_name' => 'payment',
                'state_value' => 'paing',
            ),
            5 => 
            array (
                'id' => 6,
                'created_at' => '2021-12-02 18:56:58',
                'updated_at' => '2021-12-02 18:56:58',
                'deleted_at' => NULL,
                'user_id' => 3,
                'current' => 0,
                'statusable_id' => '1',
                'statusable_type' => 'abc',
                'state_name' => 'payment',
                'state_value' => 'paied',
            ),
        ));
        
        
    }
}