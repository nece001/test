<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$hZ7rnYJen22Kwu0Vbd0R3Ohm23S0SrdjlESjg1TwfBXF1hwnEYLtm',
                'name' => 'Administrator',
                'avatar' => NULL,
                'remember_token' => '4zapZAYbBdgVtJNs01qk79gDguZmIaxC2Nfu7tDlJCR7gJM5LfLA8ecKUAyQ',
                'created_at' => '2021-01-25 06:03:44',
                'updated_at' => '2021-01-25 06:03:44',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'tom',
                'password' => '$2y$10$fJFd6tOWAdhd0Ja2IAbEHu3843o19iNoeFWr7c4Ip1DjbqujkCRl2',
                'name' => 'tom Jackson',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-03-24 09:08:42',
                'updated_at' => '2021-03-24 09:08:42',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'applicant',
                'password' => '$2y$10$BsM6izNr8FTGYjTu/g7Z5uRKVCM4A/vQ0okfxmwW2PxJeff1Nf.Ba',
                'name' => '申请人',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-03-24 18:27:00',
                'updated_at' => '2021-03-24 18:27:00',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'ttt',
                'password' => '$2y$10$5OiCJZRvALbJSi2rnbmJtuYuN0TSUxUlSw2kk21Qkg4ejvT.u3Ca2',
                'name' => 'ttt',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-06-30 13:44:44',
                'updated_at' => '2021-06-30 13:44:44',
            ),
            4 => 
            array (
                'id' => 5,
                'username' => 'aaa',
                'password' => '$2y$10$nAxepWUZLpndzHtgtkJfjuKQTZAQj4KI9dXm8QFv3BguKfkNl4H22',
                'name' => 'aaa',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-07-01 16:11:19',
                'updated_at' => '2021-07-01 16:11:19',
            ),
        ));
        
        
    }
}