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
                'order' => 24,
                'title' => '桌面',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 25,
                'title' => '设置',
                'icon' => 'fa-tasks',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 26,
                'title' => 'Users',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 27,
                'title' => 'Roles',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 28,
                'title' => 'Permission',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 29,
                'title' => 'Menu',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 30,
                'title' => 'Operation log',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-08-05 15:16:55',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 0,
                'order' => 39,
                'title' => '流程管理',
                'icon' => 'fa-cloud-upload',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-01-27 03:07:12',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 8,
                'order' => 45,
                'title' => '流程项管理',
                'icon' => 'fa-bars',
                'uri' => 'workflows/bpmn',
                'permission' => NULL,
                'created_at' => '2021-01-27 03:07:26',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 8,
                'order' => 46,
                'title' => '任务管理',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-01-27 03:07:38',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            10 => 
            array (
                'id' => 11,
                'parent_id' => 10,
                'order' => 47,
                'title' => '模型审核',
                'icon' => 'fa-bars',
                'uri' => 'tasks',
                'permission' => NULL,
                'created_at' => '2021-01-28 19:51:12',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            11 => 
            array (
                'id' => 12,
                'parent_id' => 10,
                'order' => 48,
                'title' => '用例添加',
                'icon' => 'fa-bars',
                'uri' => 'tasks/caseadd',
                'permission' => NULL,
                'created_at' => '2021-01-28 19:51:34',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            12 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 49,
                'title' => '决策管理',
                'icon' => 'fa-table',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-01-29 19:10:29',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            13 => 
            array (
                'id' => 15,
                'parent_id' => 14,
                'order' => 50,
                'title' => '决策项管理',
                'icon' => 'fa-bars',
                'uri' => 'workflows/dmn',
                'permission' => NULL,
                'created_at' => '2021-01-29 19:10:42',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            14 => 
            array (
                'id' => 16,
                'parent_id' => 30,
                'order' => 42,
                'title' => 'Camunda 仪表盘',
                'icon' => 'fa-bars',
                'uri' => 'http://161.189.43.94:60004/camunda/app/cockpit/default/#/dashboard',
                'permission' => NULL,
                'created_at' => '2021-02-03 20:54:16',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            15 => 
            array (
                'id' => 17,
                'parent_id' => 30,
                'order' => 43,
                'title' => 'Camunda 任务列表',
                'icon' => 'fa-bars',
                'uri' => 'http://161.189.43.94:60004/camunda/app/tasklist/default/',
                'permission' => NULL,
                'created_at' => '2021-02-03 20:55:50',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            16 => 
            array (
                'id' => 18,
                'parent_id' => 30,
                'order' => 44,
                'title' => 'Camunda 后台',
                'icon' => 'fa-bars',
                'uri' => 'http://161.189.43.94:60004/camunda/app/admin/default/#/',
                'permission' => NULL,
                'created_at' => '2021-02-03 20:57:31',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            17 => 
            array (
                'id' => 19,
                'parent_id' => 30,
                'order' => 41,
                'title' => '站点管理',
                'icon' => 'fa-cloud',
                'uri' => 'station',
                'permission' => NULL,
                'created_at' => '2021-02-24 19:31:13',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            18 => 
            array (
                'id' => 20,
                'parent_id' => 28,
                'order' => 35,
                'title' => '实体管理',
                'icon' => 'fa-bars',
                'uri' => 'entity',
                'permission' => NULL,
                'created_at' => '2021-02-24 19:34:04',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            19 => 
            array (
                'id' => 21,
                'parent_id' => 29,
                'order' => 37,
                'title' => '表单类型',
                'icon' => 'fa-bars',
                'uri' => 'form-admin/form-def',
                'permission' => NULL,
                'created_at' => '2021-03-08 01:05:44',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            20 => 
            array (
                'id' => 22,
                'parent_id' => 29,
                'order' => 38,
                'title' => '表单设计',
                'icon' => 'fa-wpforms',
                'uri' => 'form-admin/form',
                'permission' => NULL,
                'created_at' => '2021-03-08 01:06:01',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            21 => 
            array (
                'id' => 23,
                'parent_id' => 27,
                'order' => 33,
                'title' => '租户设置',
                'icon' => 'fa-android',
                'uri' => 'auth/tenants',
                'permission' => '*',
                'created_at' => '2021-03-12 01:13:49',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            22 => 
            array (
                'id' => 27,
                'parent_id' => 0,
                'order' => 32,
                'title' => '租户管理',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-06-17 16:22:21',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            23 => 
            array (
                'id' => 28,
                'parent_id' => 0,
                'order' => 34,
                'title' => '知识库',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-06-17 16:24:14',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            24 => 
            array (
                'id' => 29,
                'parent_id' => 0,
                'order' => 36,
                'title' => '表单管理',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-06-17 16:25:53',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            25 => 
            array (
                'id' => 30,
                'parent_id' => 8,
                'order' => 40,
                'title' => '流程引擎',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-06-17 16:26:36',
                'updated_at' => '2021-08-05 15:16:56',
            ),
            26 => 
            array (
                'id' => 31,
                'parent_id' => 2,
                'order' => 31,
                'title' => '日志查询',
                'icon' => 'fa-align-left',
                'uri' => '/workflow-log',
                'permission' => NULL,
                'created_at' => '2021-07-01 15:25:22',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            27 => 
            array (
                'id' => 32,
                'parent_id' => 0,
                'order' => 1,
                'title' => '协作管理系统',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-26 15:42:41',
                'updated_at' => '2021-07-28 15:34:07',
            ),
            28 => 
            array (
                'id' => 33,
                'parent_id' => 56,
                'order' => 10,
                'title' => '用户管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/userNo',
                'permission' => NULL,
                'created_at' => '2021-07-26 15:43:00',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            29 => 
            array (
                'id' => 34,
                'parent_id' => 56,
                'order' => 11,
                'title' => '雇员管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/employeeNo',
                'permission' => NULL,
                'created_at' => '2021-07-26 15:43:26',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            30 => 
            array (
                'id' => 35,
                'parent_id' => 56,
                'order' => 13,
                'title' => '空席管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/roomNo',
                'permission' => NULL,
                'created_at' => '2021-07-26 15:43:42',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            31 => 
            array (
                'id' => 36,
                'parent_id' => 56,
                'order' => 12,
                'title' => '坐席管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/deskNo',
                'permission' => NULL,
                'created_at' => '2021-07-26 15:44:00',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            32 => 
            array (
                'id' => 41,
                'parent_id' => 53,
                'order' => 15,
                'title' => '工单管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/deskId',
                'permission' => NULL,
                'created_at' => '2021-07-27 15:29:21',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            33 => 
            array (
                'id' => 42,
                'parent_id' => 53,
                'order' => 17,
                'title' => '协作数据',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/groupId',
                'permission' => NULL,
                'created_at' => '2021-07-27 15:29:35',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            34 => 
            array (
                'id' => 43,
                'parent_id' => 53,
                'order' => 16,
                'title' => '当前呼叫',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/callId',
                'permission' => NULL,
                'created_at' => '2021-07-27 15:29:47',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            35 => 
            array (
                'id' => 44,
                'parent_id' => 55,
                'order' => 6,
                'title' => '模板管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/tplNo',
                'permission' => NULL,
                'created_at' => '2021-07-27 19:04:55',
                'updated_at' => '2021-08-06 09:23:32',
            ),
            36 => 
            array (
                'id' => 45,
                'parent_id' => 55,
                'order' => 5,
                'title' => '工具类型',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/unitType',
                'permission' => NULL,
                'created_at' => '2021-07-27 19:05:13',
                'updated_at' => '2021-08-06 09:23:32',
            ),
            37 => 
            array (
                'id' => 46,
                'parent_id' => 55,
                'order' => 7,
                'title' => '工具管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/unitNo',
                'permission' => NULL,
                'created_at' => '2021-07-27 19:05:27',
                'updated_at' => '2021-08-06 09:23:32',
            ),
            38 => 
            array (
                'id' => 47,
                'parent_id' => 55,
                'order' => 3,
                'title' => '协作类型',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/roomType',
                'permission' => NULL,
                'created_at' => '2021-07-28 09:45:04',
                'updated_at' => '2021-08-06 11:14:54',
            ),
            39 => 
            array (
                'id' => 48,
                'parent_id' => 55,
                'order' => 4,
                'title' => '活动类型',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/activityType',
                'permission' => NULL,
                'created_at' => '2021-07-28 15:31:26',
                'updated_at' => '2021-08-06 09:23:32',
            ),
            40 => 
            array (
                'id' => 49,
                'parent_id' => 54,
                'order' => 20,
                'title' => '会议管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/meetNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 15:32:04',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            41 => 
            array (
                'id' => 50,
                'parent_id' => 54,
                'order' => 21,
                'title' => '展业管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/saleNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 15:32:30',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            42 => 
            array (
                'id' => 51,
                'parent_id' => 54,
                'order' => 22,
                'title' => '直播管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/liveNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 15:32:43',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            43 => 
            array (
                'id' => 52,
                'parent_id' => 54,
                'order' => 23,
                'title' => '培训管理',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/trainNo',
                'permission' => NULL,
                'created_at' => '2021-07-28 15:34:45',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            44 => 
            array (
                'id' => 53,
                'parent_id' => 32,
                'order' => 14,
                'title' => '客服协作',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-28 16:51:59',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            45 => 
            array (
                'id' => 54,
                'parent_id' => 32,
                'order' => 19,
                'title' => '活动协作',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-28 16:52:07',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            46 => 
            array (
                'id' => 55,
                'parent_id' => 32,
                'order' => 2,
                'title' => '协作配置',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-28 16:55:54',
                'updated_at' => '2021-07-28 16:58:05',
            ),
            47 => 
            array (
                'id' => 56,
                'parent_id' => 32,
                'order' => 8,
                'title' => '租户配置',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-28 16:56:23',
                'updated_at' => '2021-08-06 09:23:32',
            ),
            48 => 
            array (
                'id' => 57,
                'parent_id' => 53,
                'order' => 18,
                'title' => '呼叫历史',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2021-07-28 17:13:45',
                'updated_at' => '2021-08-05 15:16:55',
            ),
            49 => 
            array (
                'id' => 58,
                'parent_id' => 56,
                'order' => 9,
                'title' => '协作应用',
                'icon' => 'fa-bars',
                'uri' => '/collaboration-manage/tenantApp',
                'permission' => NULL,
                'created_at' => '2021-08-05 15:16:45',
                'updated_at' => '2021-08-06 09:23:32',
            ),
        ));
        
        
    }
}