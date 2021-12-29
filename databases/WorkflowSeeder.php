<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Encore\Workflow\Models\Workflow;
use Encore\Workflow\Models\WorkflowModel;
use Encore\Workflow\Models\AdminTask;
use Encore\Workflow\Models\FlowCase;
use Encore\Workflow\Models\WorkflowDeploy;
use Tianxin\LaravelStatus\Models\Status;

/**
 * 命令行执行
 * php artisan db:seed --class=WorkflowSeeder
 */
class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fillWorkflow();
        $this->fillWorkflowModel();
        $this->fillAdminTask();
        $this->fillStatus();
        $this->fillCase();
        // $this->fillDeploy(); // json有问题
    }

    private function fillWorkflow()
    {
        $items = [
            ['id'=>1, 'title'=>'事件测试', 'last_version'=>0, 'model_type'=>'bpmn'],
            ['id'=>2, 'title'=>'决策表测试', 'last_version'=>0, 'model_type'=>'bpmn'],
            ['id'=>3, 'title'=>'根据输出判断输出', 'last_version'=>0, 'model_type'=>'dmn'],
            ['id'=>4, 'title'=>'Task任务测试', 'last_version'=>0, 'model_type'=>'bpmn'],
            ['id'=>5, 'title'=>'网关任务测试', 'last_version'=>0, 'model_type'=>'bpmn'],
        ];

        foreach ($items as $item) {
            Workflow::updateOrCreate($item);
        }
    }

    private function fillWorkflowModel()
    {
        $items = [
            ['1', '1', '2021-02-07 06:43:51', '2021-02-07 06:43:51', '1_1', 'bpmn_test_blankevent.bpmn', 'BPMN Test BlankEvent', 'D:\\work\\php\\tianxin\\app_admin_dev\\storage\\app/workflow_model/bpmn/20210207\\9ab707d53be702b2ac0a04292866b11f.bpmn', 'bpmn', '1', 'DRAFT'],
            ['2', '1', '2021-02-07 06:46:46', '2021-02-07 06:46:46', '1_2', 'bpmn_test_blankevent.bpmn', 'BPMN Test BlankEvent', 'D:\\work\\php\\tianxin\\app_admin_dev\\storage\\app/workflow_model/bpmn/20210207\\cf99fa10c75075d7451ebbe9c06bec3f.bpmn', 'bpmn', '2', 'DRAFT'],
            ['3', '1', '2021-02-07 06:47:33', '2021-02-07 06:48:48', '1_3', 'bpmn_test_blankevent.bpmn', 'BPMN Test BlankEvent', 'D:\\work\\php\\tianxin\\app_admin_dev\\storage\\app/workflow_model/bpmn/20210207\\02c7f1d55ec1b684e9bfac97d63ab191.bpmn', 'bpmn', '3', 'DRAFT'],
            ['4', '1', '2021-02-07 06:50:15', '2021-02-07 06:51:27', '1_4', 'bpmn_test_blankevent.bpmn', 'BPMN Test BlankEvent', 'D:\\work\\php\\tianxin\\app_admin_dev\\storage\\app/workflow_model/bpmn/20210207\\0b9932da82b83fe8eeec0f253040bb2b.bpmn', 'bpmn', '4', 'DRAFT']
        ];

        foreach ($items as $item) {
            WorkflowModel::updateOrCreate([
                'id'=>$item[0],
                'workflow_id'=>$item[1],
                'created_at'=>$item[2],
                'updated_at'=>$item[3],
                'workflowModelID'=>$item[4],
                'filename'=>$item[5],
                'title'=>$item[6],
                'realname'=>$item[7],
                'filetype'=>$item[8],
                'version'=>$item[9],
                'state'=>$item[10]
                ]);
        }
    }


    private function fillAdminTask()
    {
        $items = [
            ['1', '2', '0', '2021-02-07 06:47:03', '2021-02-07 06:47:03', 'REVIEW_WORKFLOW_MODEL', '事件测试(2)模型等待审核', '{"entity": "WorkflowModel", "processInstanceId": "494713db-6910-11eb-8210-5aa023279eee"}', 'WAITING'],
            ['2', '3', '0', '2021-02-07 06:48:25', '2021-02-07 06:48:32', 'REVIEW_WORKFLOW_MODEL', '事件测试(3)模型等待审核', '{"entity": "WorkflowModel", "processInstanceId": "79670571-6910-11eb-8210-5aa023279eee"}', 'APPROVE'],
            ['3', '4', '0', '2021-02-07 06:51:02', '2021-02-07 06:51:11', 'REVIEW_WORKFLOW_MODEL', '事件测试(4)模型等待审核', '{"entity": "WorkflowModel", "processInstanceId": "d7f2aa45-6910-11eb-8210-5aa023279eee"}', 'APPROVE']
        ];

        foreach ($items as $item) {
            AdminTask::updateOrCreate([
                'id'=>$item[0],
                'workflow_model_id'=>$item[1],
                'admin_user_id'=>$item[2],
                'created_at'=>$item[3],
                'updated_at'=>$item[4],
                'task_type'=>$item[5],
                'title'=>$item[6],
                'param'=>$item[7],
                'state'=>$item[8],
            ]);
        }
    }

    private function fillStatus()
    {
        $items = [
            ['1', '{"phase": {"draft": "DRAFT", "verify": {"case": {"count": 3, "items": {"2": {"expect": ["StartEvent", "IntermediateThrowEvent", "EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "开始流程，继续后续任务。"}, "3": {"expect": ["IntermediateThrowEvent", "EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "中间空白事件，继续后续任务。"}, "4": {"expect": ["EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "结束流程，不做额外事情。"}}}}}, "state": "DRAFT"}', 'Tianxin\\LaravelStatus\\Models\\WorkflowModel', '1', '2021-02-07 06:43:51', '2021-02-07 06:45:50'],
            ['2', '{"phase": {"draft": "DRAFT", "review": "WAITING"}, "state": "DRAFT"}', 'Tianxin\\LaravelStatus\\Models\\WorkflowModel', '2', '2021-02-07 06:46:46', '2021-02-07 06:47:04'],
            ['3', '{"phase": {"draft": "DRAFT", "deploy": {"items": [], "total": 0, "current": -1}, "review": "APPROVE", "verify": {"case": {"count": 3, "items": {"5": {"expect": ["StartEvent", "IntermediateThrowEvent", "EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "开始流程，继续后续任务。"}, "6": {"expect": ["IntermediateThrowEvent", "EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "中间空白事件，继续后续任务。"}, "7": {"expect": ["EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "结束流程，不做额外事情。"}}}, "state": "PASS"}}, "state": "DRAFT"}', 'Tianxin\\LaravelStatus\\Models\\WorkflowModel', '3', '2021-02-07 06:47:33', '2021-02-07 06:48:49'],
            ['4', '{"phase": {"draft": "DRAFT", "deploy": {"items": [{"id": 3, "api": "http://localhost:8080/engine-rest", "env": "product", "host": null, "port": 0, "title": "本地生产环境的工作流引擎", "result": "{\\"id\\": \\"ea7c73fa-6910-11eb-8210-5aa023279eee\\", \\"name\\": \\"BPMN Test BlankEvent\\", \\"links\\": [{\\"rel\\": \\"self\\", \\"href\\": \\"http://localhost:8080/engine-rest/deployment/ea7c73fa-6910-11eb-8210-5aa023279eee\\", \\"method\\": \\"GET\\"}], \\"source\\": \\"API\\", \\"tenantId\\": \\"\\", \\"deploymentTime\\": \\"2021-02-07T14:51:33.935+0800\\", \\"deployedCaseDefinitions\\": null, \\"deployedProcessDefinitions\\": {\\"bpmn_test_blankevent:92:ea7d5e5c-6910-11eb-8210-5aa023279eee\\": {\\"id\\": \\"bpmn_test_blankevent:92:ea7d5e5c-6910-11eb-8210-5aa023279eee\\", \\"key\\": \\"bpmn_test_blankevent\\", \\"name\\": \\"BPMN Test BlankEvent\\", \\"diagram\\": null, \\"version\\": 92, \\"category\\": \\"http://bpmn.io/schema/bpmn\\", \\"resource\\": \\"D:\\\\\\\\\\\\\\\\work\\\\\\\\\\\\\\\\php\\\\\\\\\\\\\\\\tianxin\\\\\\\\\\\\\\\\app_admin_dev\\\\\\\\\\\\\\\\storage\\\\\\\\\\\\\\\\app/workflow_model/bpmn/20210207\\\\\\\\\\\\\\\\0b9932da82b83fe8eeec0f253040bb2b.bpmn\\", \\"tenantId\\": \\"\\", \\"suspended\\": false, \\"versionTag\\": null, \\"description\\": null, \\"deploymentId\\": \\"ea7c73fa-6910-11eb-8210-5aa023279eee\\", \\"historyTimeToLive\\": null, \\"startableInTasklist\\": true}}, \\"deployedDecisionDefinitions\\": null, \\"deployedDecisionRequirementsDefinitions\\": null}", "deployID": "ea7c73fa-6910-11eb-8210-5aa023279eee", "engine_id": 3, "created_at": "2021-02-07T06:51:33.000000Z", "updated_at": "2021-02-07T06:51:33.000000Z", "deployed_time": "2021-02-07 14:51:33", "workflow_model_id": 4, "deployedProcessDefinitionID": "bpmn_test_blankevent:92:ea7d5e5c-6910-11eb-8210-5aa023279eee"}, {"id": 4, "api": "http://localhost:8080/engine-rest", "env": "product", "host": null, "port": 0, "title": "线上生产环境的工作流引擎", "result": "{\\"id\\": \\"ea97c42d-6910-11eb-8210-5aa023279eee\\", \\"name\\": \\"BPMN Test BlankEvent\\", \\"links\\": [{\\"rel\\": \\"self\\", \\"href\\": \\"http://localhost:8080/engine-rest/deployment/ea97c42d-6910-11eb-8210-5aa023279eee\\", \\"method\\": \\"GET\\"}], \\"source\\": \\"API\\", \\"tenantId\\": \\"\\", \\"deploymentTime\\": \\"2021-02-07T14:51:34.114+0800\\", \\"deployedCaseDefinitions\\": null, \\"deployedProcessDefinitions\\": {\\"bpmn_test_blankevent:93:ea98877f-6910-11eb-8210-5aa023279eee\\": {\\"id\\": \\"bpmn_test_blankevent:93:ea98877f-6910-11eb-8210-5aa023279eee\\", \\"key\\": \\"bpmn_test_blankevent\\", \\"name\\": \\"BPMN Test BlankEvent\\", \\"diagram\\": null, \\"version\\": 93, \\"category\\": \\"http://bpmn.io/schema/bpmn\\", \\"resource\\": \\"D:\\\\\\\\\\\\\\\\work\\\\\\\\\\\\\\\\php\\\\\\\\\\\\\\\\tianxin\\\\\\\\\\\\\\\\app_admin_dev\\\\\\\\\\\\\\\\storage\\\\\\\\\\\\\\\\app/workflow_model/bpmn/20210207\\\\\\\\\\\\\\\\0b9932da82b83fe8eeec0f253040bb2b.bpmn\\", \\"tenantId\\": \\"\\", \\"suspended\\": false, \\"versionTag\\": null, \\"description\\": null, \\"deploymentId\\": \\"ea97c42d-6910-11eb-8210-5aa023279eee\\", \\"historyTimeToLive\\": null, \\"startableInTasklist\\": true}}, \\"deployedDecisionDefinitions\\": null, \\"deployedDecisionRequirementsDefinitions\\": null}", "deployID": "ea97c42d-6910-11eb-8210-5aa023279eee", "engine_id": 4, "created_at": "2021-02-07T06:51:34.000000Z", "updated_at": "2021-02-07T06:51:34.000000Z", "deployed_time": "2021-02-07 14:51:34", "workflow_model_id": 4, "deployedProcessDefinitionID": "bpmn_test_blankevent:93:ea98877f-6910-11eb-8210-5aa023279eee"}, {"id": 5, "api": "http://localhost:8080/engine-rest", "env": "product", "host": null, "port": 0, "title": "线上生产环境的工作流引擎", "result": "{\\"id\\": \\"eaadbd30-6910-11eb-8210-5aa023279eee\\", \\"name\\": \\"BPMN Test BlankEvent\\", \\"links\\": [{\\"rel\\": \\"self\\", \\"href\\": \\"http://localhost:8080/engine-rest/deployment/eaadbd30-6910-11eb-8210-5aa023279eee\\", \\"method\\": \\"GET\\"}], \\"source\\": \\"API\\", \\"tenantId\\": \\"\\", \\"deploymentTime\\": \\"2021-02-07T14:51:34.258+0800\\", \\"deployedCaseDefinitions\\": null, \\"deployedProcessDefinitions\\": {\\"bpmn_test_blankevent:94:eaae8082-6910-11eb-8210-5aa023279eee\\": {\\"id\\": \\"bpmn_test_blankevent:94:eaae8082-6910-11eb-8210-5aa023279eee\\", \\"key\\": \\"bpmn_test_blankevent\\", \\"name\\": \\"BPMN Test BlankEvent\\", \\"diagram\\": null, \\"version\\": 94, \\"category\\": \\"http://bpmn.io/schema/bpmn\\", \\"resource\\": \\"D:\\\\\\\\\\\\\\\\work\\\\\\\\\\\\\\\\php\\\\\\\\\\\\\\\\tianxin\\\\\\\\\\\\\\\\app_admin_dev\\\\\\\\\\\\\\\\storage\\\\\\\\\\\\\\\\app/workflow_model/bpmn/20210207\\\\\\\\\\\\\\\\0b9932da82b83fe8eeec0f253040bb2b.bpmn\\", \\"tenantId\\": \\"\\", \\"suspended\\": false, \\"versionTag\\": null, \\"description\\": null, \\"deploymentId\\": \\"eaadbd30-6910-11eb-8210-5aa023279eee\\", \\"historyTimeToLive\\": null, \\"startableInTasklist\\": true}}, \\"deployedDecisionDefinitions\\": null, \\"deployedDecisionRequirementsDefinitions\\": null}", "deployID": "eaadbd30-6910-11eb-8210-5aa023279eee", "engine_id": 5, "created_at": "2021-02-07T06:51:34.000000Z", "updated_at": "2021-02-07T06:51:34.000000Z", "deployed_time": "2021-02-07 14:51:34", "workflow_model_id": 4, "deployedProcessDefinitionID": "bpmn_test_blankevent:94:eaae8082-6910-11eb-8210-5aa023279eee"}], "total": 3, "current": 2}, "review": "APPROVE", "verify": {"case": {"count": 3, "items": {"8": {"expect": ["StartEvent", "IntermediateThrowEvent", "EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "开始流程，继续后续任务。"}, "9": {"expect": ["IntermediateThrowEvent", "EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "中间空白事件，继续后续任务。"}, "10": {"expect": ["EndEvent"], "case_json": "{\\"variables\\":[]}", "description": "结束流程，不做额外事情。"}}}, "state": "PASS"}}, "state": "DRAFT"}', 'Tianxin\\LaravelStatus\\Models\\WorkflowModel', '4', '2021-02-07 06:50:16', '2021-02-07 06:51:34']
        ];

        foreach ($items as $item) {
            Status::updateOrCreate([
                'id'=>$item[0],
                'status'=>$item[1],
                'statable_type'=>$item[2],
                'statable_id'=>$item[3],
                'created_at'=>$item[4],
                'updated_at'=>$item[5]
            ]);
        }
    }

    private function fillCase()
    {
        $items = [
            ['2', '1', '2021-02-07 06:45:49', '2021-02-07 06:45:49', '开始流程，继续后续任务。', '["StartEvent","IntermediateThrowEvent","EndEvent"]', '{"variables":[]}'],
            ['3', '1', '2021-02-07 06:45:49', '2021-02-07 06:45:49', '中间空白事件，继续后续任务。', '["IntermediateThrowEvent","EndEvent"]', '{"variables":[]}'],
            ['4', '1', '2021-02-07 06:45:49', '2021-02-07 06:45:49', '结束流程，不做额外事情。', '["EndEvent"]', '{"variables":[]}'],
            ['5', '3', '2021-02-07 06:48:12', '2021-02-07 06:48:12', '开始流程，继续后续任务。', '["StartEvent","IntermediateThrowEvent","EndEvent"]', '{"variables":[]}'],
            ['6', '3', '2021-02-07 06:48:12', '2021-02-07 06:48:12', '中间空白事件，继续后续任务。', '["IntermediateThrowEvent","EndEvent"]', '{"variables":[]}'],
            ['7', '3', '2021-02-07 06:48:12', '2021-02-07 06:48:12', '结束流程，不做额外事情。', '["EndEvent"]', '{"variables":[]}'],
            ['8', '4', '2021-02-07 06:50:53', '2021-02-07 06:50:53', '开始流程，继续后续任务。', '["StartEvent","IntermediateThrowEvent","EndEvent"]', '{"variables":[]}'],
            ['9', '4', '2021-02-07 06:50:53', '2021-02-07 06:50:53', '中间空白事件，继续后续任务。', '["IntermediateThrowEvent","EndEvent"]', '{"variables":[]}'],
            ['10', '4', '2021-02-07 06:50:53', '2021-02-07 06:50:53', '结束流程，不做额外事情。', '["EndEvent"]', '{"variables":[]}']
        ];

        foreach ($items as $item) {
            FlowCase::updateOrCreate([
                'id'=>$item[0],
                'flow_file_id'=>$item[1],
                'created_at'=>$item[2],
                'updated_at'=>$item[3],
                'description'=>$item[4],
                'expect'=>$item[5],
                'case_json'=>$item[6]
            ]);
        }
    }

    private function fillDeploy()
    {
        $items = [
            ['3', '4', '2021-02-07 06:51:33', '2021-02-07 06:51:33', '2021-02-07 14:51:33', '', '0', 'bpmn_test_blankevent:92:ea7d5e5c-6910-11eb-8210-5aa023279eee', 'ea7c73fa-6910-11eb-8210-5aa023279eee', '{"id": "ea7c73fa-6910-11eb-8210-5aa023279eee", "name": "BPMN Test BlankEvent", "links": [{"rel": "self", "href": "http://localhost:8080/engine-rest/deployment/ea7c73fa-6910-11eb-8210-5aa023279eee", "method": "GET"}], "source": "API", "tenantId": "", "deploymentTime": "2021-02-07T14:51:33.935+0800", "deployedCaseDefinitions": null, "deployedProcessDefinitions": {"bpmn_test_blankevent:92:ea7d5e5c-6910-11eb-8210-5aa023279eee": {"id": "bpmn_test_blankevent:92:ea7d5e5c-6910-11eb-8210-5aa023279eee", "key": "bpmn_test_blankevent", "name": "BPMN Test BlankEvent", "diagram": null, "version": 92, "category": "http://bpmn.io/schema/bpmn", "resource": "D:\\\\\\\\work\\\\\\\\php\\\\\\\\tianxin\\\\\\\\app_admin_dev\\\\\\\\storage\\\\\\\\app/workflow_model/bpmn/20210207\\\\\\\\0b9932da82b83fe8eeec0f253040bb2b.bpmn", "tenantId": "", "suspended": false, "versionTag": null, "description": null, "deploymentId": "ea7c73fa-6910-11eb-8210-5aa023279eee", "historyTimeToLive": null, "startableInTasklist": true}}, "deployedDecisionDefinitions": null, "deployedDecisionRequirementsDefinitions": null}', '3', '本地生产环境的工作流引擎', 'http://localhost:8080/engine-rest', 'product'],
            ['4', '4', '2021-02-07 06:51:34', '2021-02-07 06:51:34', '2021-02-07 14:51:34', '', '0', 'bpmn_test_blankevent:93:ea98877f-6910-11eb-8210-5aa023279eee', 'ea97c42d-6910-11eb-8210-5aa023279eee', '{"id": "ea97c42d-6910-11eb-8210-5aa023279eee", "name": "BPMN Test BlankEvent", "links": [{"rel": "self", "href": "http://localhost:8080/engine-rest/deployment/ea97c42d-6910-11eb-8210-5aa023279eee", "method": "GET"}], "source": "API", "tenantId": "", "deploymentTime": "2021-02-07T14:51:34.114+0800", "deployedCaseDefinitions": null, "deployedProcessDefinitions": {"bpmn_test_blankevent:93:ea98877f-6910-11eb-8210-5aa023279eee": {"id": "bpmn_test_blankevent:93:ea98877f-6910-11eb-8210-5aa023279eee", "key": "bpmn_test_blankevent", "name": "BPMN Test BlankEvent", "diagram": null, "version": 93, "category": "http://bpmn.io/schema/bpmn", "resource": "D:\\\\\\\\work\\\\\\\\php\\\\\\\\tianxin\\\\\\\\app_admin_dev\\\\\\\\storage\\\\\\\\app/workflow_model/bpmn/20210207\\\\\\\\0b9932da82b83fe8eeec0f253040bb2b.bpmn", "tenantId": "", "suspended": false, "versionTag": null, "description": null, "deploymentId": "ea97c42d-6910-11eb-8210-5aa023279eee", "historyTimeToLive": null, "startableInTasklist": true}}, "deployedDecisionDefinitions": null, "deployedDecisionRequirementsDefinitions": null}', '4', '线上生产环境的工作流引擎', 'http://localhost:8080/engine-rest', 'product'],
            ['5', '4', '2021-02-07 06:51:34', '2021-02-07 06:51:34', '2021-02-07 14:51:34', '', '0', 'bpmn_test_blankevent:94:eaae8082-6910-11eb-8210-5aa023279eee', 'eaadbd30-6910-11eb-8210-5aa023279eee', '{"id": "eaadbd30-6910-11eb-8210-5aa023279eee", "name": "BPMN Test BlankEvent", "links": [{"rel": "self", "href": "http://localhost:8080/engine-rest/deployment/eaadbd30-6910-11eb-8210-5aa023279eee", "method": "GET"}], "source": "API", "tenantId": "", "deploymentTime": "2021-02-07T14:51:34.258+0800", "deployedCaseDefinitions": null, "deployedProcessDefinitions": {"bpmn_test_blankevent:94:eaae8082-6910-11eb-8210-5aa023279eee": {"id": "bpmn_test_blankevent:94:eaae8082-6910-11eb-8210-5aa023279eee", "key": "bpmn_test_blankevent", "name": "BPMN Test BlankEvent", "diagram": null, "version": 94, "category": "http://bpmn.io/schema/bpmn", "resource": "D:\\\\\\\\work\\\\\\\\php\\\\\\\\tianxin\\\\\\\\app_admin_dev\\\\\\\\storage\\\\\\\\app/workflow_model/bpmn/20210207\\\\\\\\0b9932da82b83fe8eeec0f253040bb2b.bpmn", "tenantId": "", "suspended": false, "versionTag": null, "description": null, "deploymentId": "eaadbd30-6910-11eb-8210-5aa023279eee", "historyTimeToLive": null, "startableInTasklist": true}}, "deployedDecisionDefinitions": null, "deployedDecisionRequirementsDefinitions": null}', '5', '线上生产环境的工作流引擎', 'http://localhost:8080/engine-rest', 'product'],
        ];

        foreach ($items as $item) {
            WorkflowDeploy::updateOrCreate([
                'id'=>$item[0],
                'workflow_model_id'=>$item[1],
                'created_at'=>$item[2],
                'updated_at'=>$item[3],
                'deployed_time'=>$item[4],
                'host'=>$item[5],
                'port'=>$item[6],
                'deployedProcessDefinitionID'=>$item[7],
                'deployID'=>$item[8],
                'result'=>$item[9],
                'engine_id'=>$item[10],
                'title'=>$item[11],
                'api'=>$item[12],
                'env'=>$item[13],
            ]);
        }
    }
}
