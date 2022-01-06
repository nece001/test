<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 36,
                'title' => 'Dashboard',
                'icon' => 'fa-bar-chart',
                'uri' => 'http://localhost:8080/camunda/app/welcome/default/#!/welcome',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 37,
                'title' => 'Admin',
                'icon' => 'fa-tasks',
                'uri' => '',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 39,
                'title' => 'Users',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 40,
                'title' => 'Roles',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 41,
                'title' => 'Permission',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 42,
                'title' => 'Menu',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 43,
                'title' => 'Operation log',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-07-28 07:30:22',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 0,
                'order' => 21,
                'title' => '流程管理',
                'icon' => 'fa-cloud-upload',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-01-27 03:07:12',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 8,
                'order' => 26,
                'title' => '流程项管理',
                'icon' => 'fa-bars',
                'uri' => 'workflows/bpmn',
                'permission' => NULL,
                'created_at' => '2021-01-27 03:07:26',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 8,
                'order' => 27,
                'title' => '任务管理',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-01-27 03:07:38',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 10,
                'order' => 28,
                'title' => '模型审核',
                'icon' => 'fa-bars',
                'uri' => 'tasks',
                'permission' => NULL,
                'created_at' => '2021-01-28 19:51:12',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 10,
                'order' => 29,
                'title' => '用例添加',
                'icon' => 'fa-bars',
                'uri' => 'tasks/caseadd',
                'permission' => NULL,
                'created_at' => '2021-01-28 19:51:34',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            12 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 34,
                'title' => '决策管理',
                'icon' => 'fa-table',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-01-29 19:10:29',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            13 => 
            array (
                'id' => 15,
                'parent_id' => 14,
                'order' => 35,
                'title' => '决策项管理',
                'icon' => 'fa-bars',
                'uri' => 'workflows/dmn',
                'permission' => NULL,
                'created_at' => '2021-01-29 19:10:42',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            14 => 
            array (
                'id' => 16,
                'parent_id' => 8,
                'order' => 31,
                'title' => 'Cockpit',
                'icon' => 'fa-bars',
                'uri' => 'http://localhost:8080/camunda/app/cockpit/default/#/dashboard',
                'permission' => NULL,
                'created_at' => '2021-02-03 20:54:16',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            15 => 
            array (
                'id' => 17,
                'parent_id' => 8,
                'order' => 32,
                'title' => 'TaskList',
                'icon' => 'fa-bars',
                'uri' => 'http://localhost:8080/camunda/app/tasklist/default/#/?searchQuery=%5B%5D&filter=c80cd55a-432f-11eb-879e-5aa023279eee&sorting=%5B%7B%22sortBy%22:%22created%22,%22sortOrder%22:%22desc%22%7D%5D',
                'permission' => NULL,
                'created_at' => '2021-02-03 20:55:50',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            16 => 
            array (
                'id' => 18,
                'parent_id' => 8,
                'order' => 33,
                'title' => 'Camunda Admin',
                'icon' => 'fa-bars',
                'uri' => 'http://localhost:8080/camunda/app/admin/default/#/',
                'permission' => NULL,
                'created_at' => '2021-02-03 20:57:31',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            17 => 
            array (
                'id' => 19,
                'parent_id' => 8,
                'order' => 22,
                'title' => '站点管理',
                'icon' => 'fa-cloud',
                'uri' => 'station',
                'permission' => NULL,
                'created_at' => '2021-02-24 19:31:13',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            18 => 
            array (
                'id' => 20,
                'parent_id' => 8,
                'order' => 23,
                'title' => '实体管理',
                'icon' => 'fa-bars',
                'uri' => 'entity',
                'permission' => NULL,
                'created_at' => '2021-02-24 19:34:04',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            19 => 
            array (
                'id' => 21,
                'parent_id' => 8,
                'order' => 24,
                'title' => '表单类型',
                'icon' => 'fa-bars',
                'uri' => 'form-admin/form-def',
                'permission' => NULL,
                'created_at' => '2021-03-08 01:05:44',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            20 => 
            array (
                'id' => 22,
                'parent_id' => 8,
                'order' => 25,
                'title' => '表单设计',
                'icon' => 'fa-wpforms',
                'uri' => 'form-admin/form',
                'permission' => NULL,
                'created_at' => '2021-03-08 01:06:01',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            21 => 
            array (
                'id' => 23,
                'parent_id' => 2,
                'order' => 38,
                'title' => 'tenants',
                'icon' => 'fa-android',
                'uri' => 'auth/tenants',
                'permission' => '*',
                'created_at' => '2021-03-12 01:13:49',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            22 => 
            array (
                'id' => 24,
                'parent_id' => 0,
                'order' => 18,
                'title' => '任务查看',
                'icon' => 'fa-group',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-03-23 10:13:58',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            23 => 
            array (
                'id' => 25,
                'parent_id' => 24,
                'order' => 19,
                'title' => '角色任务',
                'icon' => 'fa-bars',
                'uri' => 'role-tasks/roles',
                'permission' => NULL,
                'created_at' => '2021-03-26 10:34:03',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            24 => 
            array (
                'id' => 26,
                'parent_id' => 24,
                'order' => 20,
                'title' => '用户任务',
                'icon' => 'fa-bars',
                'uri' => 'role-tasks/users',
                'permission' => NULL,
                'created_at' => '2021-03-26 10:34:44',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            25 => 
            array (
                'id' => 27,
                'parent_id' => 8,
                'order' => 30,
                'title' => '操作日志',
                'icon' => 'fa-bars',
                'uri' => '/workflow-log',
                'permission' => NULL,
                'created_at' => '2021-07-06 09:10:02',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            26 => 
            array (
                'id' => 28,
                'parent_id' => 0,
                'order' => 1,
                'title' => '协作管理系统',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-27 01:04:07',
                'updated_at' => '2021-07-27 03:24:03',
            ),
            27 => 
            array (
                'id' => 29,
                'parent_id' => 28,
                'order' => 6,
                'title' => '用户管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/userNo',
                'permission' => NULL,
                'created_at' => '2021-07-27 01:04:33',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            28 => 
            array (
                'id' => 30,
                'parent_id' => 28,
                'order' => 7,
                'title' => '雇员管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/employeeNo',
                'permission' => NULL,
                'created_at' => '2021-07-27 01:04:58',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            29 => 
            array (
                'id' => 31,
                'parent_id' => 28,
                'order' => 9,
                'title' => '空席管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/roomNo',
                'permission' => NULL,
                'created_at' => '2021-07-27 01:05:19',
                'updated_at' => '2021-08-03 10:22:18',
            ),
            30 => 
            array (
                'id' => 32,
                'parent_id' => 28,
                'order' => 8,
                'title' => '坐席管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/deskNo',
                'permission' => NULL,
                'created_at' => '2021-07-27 01:05:47',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            31 => 
            array (
                'id' => 33,
                'parent_id' => 28,
                'order' => 10,
                'title' => '工单管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/deskId',
                'permission' => NULL,
                'created_at' => '2021-07-27 03:23:43',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            32 => 
            array (
                'id' => 34,
                'parent_id' => 28,
                'order' => 11,
                'title' => '协作数据',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/groupId',
                'permission' => NULL,
                'created_at' => '2021-07-27 07:03:24',
                'updated_at' => '2021-08-03 03:47:47',
            ),
            33 => 
            array (
                'id' => 35,
                'parent_id' => 28,
                'order' => 12,
                'title' => '呼叫管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/callId',
                'permission' => NULL,
                'created_at' => '2021-07-27 07:03:49',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            34 => 
            array (
                'id' => 36,
                'parent_id' => 28,
                'order' => 5,
                'title' => '模板管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/tplNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 02:05:54',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            35 => 
            array (
                'id' => 37,
                'parent_id' => 28,
                'order' => 2,
                'title' => '工具类型',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/utilType',
                'permission' => NULL,
                'created_at' => '2021-07-28 02:06:31',
                'updated_at' => '2021-08-05 05:32:04',
            ),
            36 => 
            array (
                'id' => 38,
                'parent_id' => 28,
                'order' => 3,
                'title' => '工具管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/utilNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 02:06:51',
                'updated_at' => '2021-08-05 05:33:24',
            ),
            37 => 
            array (
                'id' => 39,
                'parent_id' => 28,
                'order' => 4,
                'title' => '协作类型',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/roomType',
                'permission' => NULL,
                'created_at' => '2021-07-28 02:07:41',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            38 => 
            array (
                'id' => 40,
                'parent_id' => 28,
                'order' => 13,
                'title' => '活动类型',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/activityType',
                'permission' => NULL,
                'created_at' => '2021-07-28 07:27:48',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            39 => 
            array (
                'id' => 41,
                'parent_id' => 28,
                'order' => 14,
                'title' => '会议管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/meetNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 07:28:22',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            40 => 
            array (
                'id' => 42,
                'parent_id' => 28,
                'order' => 15,
                'title' => '展业管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/saleNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 07:28:57',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            41 => 
            array (
                'id' => 43,
                'parent_id' => 28,
                'order' => 16,
                'title' => '直播管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/liveNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 07:29:21',
                'updated_at' => '2021-07-28 07:30:22',
            ),
            42 => 
            array (
                'id' => 44,
                'parent_id' => 28,
                'order' => 17,
                'title' => '培训管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/trainNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 07:29:47',
                'updated_at' => '2021-07-28 07:30:22',
            ),
        ));
        
        
    }
}