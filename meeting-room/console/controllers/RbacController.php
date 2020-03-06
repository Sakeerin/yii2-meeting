<?php 
namespace console\controllers;

use yii\console\Controller;
use Yii;

class RbacController extends Controller
{
    public function actionHello()
    {
        
    }
    public function actionCreatePermission()
    {
        $auth = Yii::$app->authManager;

        //person จัดการบุคคล
        $person_default_index = $auth->createPermission('personal/default/index');
        $person_default_index->description = 'หน้าหลักโมดูลบุคคล';
        $auth->add($person_default_index);


        $person_person_index = $auth->createPermission('personal/person/index');
        $person_person_index->description = 'รายการบุคคล';
        $auth->add($person_person_index);

        $person_person_create = $auth->createPermission('personal/person/create');
        $person_person_create->description = 'เพิ่มบุคคล';
        $auth->add($person_person_create);

        $person_person_update = $auth->createPermission('personal/person/update');
        $person_person_update->description = 'แก้ไขบุคคล';
        $auth->add($person_person_update);

        $person_person_delete = $auth->createPermission('personal/person/delete');
        $person_person_delete->description = 'ลบบุคคล';
        $auth->add($person_person_delete);

        $person_person_view = $auth->createPermission('personal/person/view');
        $person_person_view->description = 'ดูบุคคล';
        $auth->add($person_person_view);


        //calendar ปฎิทิน
        // $meeting_default_index = $auth->createPermission('meeting/default/index');
        // $meeting_default_index->description = 'ปฎิทิน';
        // $auth->add($meeting_default_index);


        //equipment จัดการอุปกรณ์
        $meeting_equipment_index = $auth->createPermission('meeting/equipment/index');
        $meeting_equipment_index->description = 'รายการอุปกรณ์';
        $auth->add($meeting_equipment_index);

        $meeting_equipment_create = $auth->createPermission('meeting/equipment/create');
        $meeting_equipment_create->description = 'เพิ่มอุปกรณ์';
        $auth->add($meeting_equipment_create);

        $meeting_equipment_update = $auth->createPermission('meeting/equipment/update');
        $meeting_equipment_update->description = 'แก้ไขอุปกรณ์';
        $auth->add($meeting_equipment_update);

        $meeting_equipment_delete = $auth->createPermission('meeting/equipment/delete');
        $meeting_equipment_delete->description = 'ลบอุปกรณ์';
        $auth->add($meeting_equipment_delete);

        $meeting_equipment_view = $auth->createPermission('meeting/equipment/view');
        $meeting_equipment_view->description = 'ดูอุปกรณ์';
        $auth->add($meeting_equipment_view);


        //meeting จัดการจองห้องประชุม
        $meeting_meeting_index = $auth->createPermission('meeting/meeting/index');
        $meeting_meeting_index->description = 'รายการจองห้องประชุม';
        $auth->add($meeting_meeting_index);

        $meeting_meeting_create = $auth->createPermission('meeting/meeting/create');
        $meeting_meeting_create->description = 'การจองห้องประชุม';
        $auth->add($meeting_meeting_create);

        $meeting_meeting_update = $auth->createPermission('meeting/meeting/update');
        $meeting_meeting_update->description = 'แก้ไขการจองห้องประชุม';
        $auth->add($meeting_meeting_update);

        $meeting_meeting_delete = $auth->createPermission('meeting/meeting/delete');
        $meeting_meeting_delete->description = 'ลบการจองห้องประชุม';
        $auth->add($meeting_meeting_delete);

        $meeting_meeting_view = $auth->createPermission('meeting/meeting/view');
        $meeting_meeting_view->description = 'ดูการจองห้องประชุม';
        $auth->add($meeting_meeting_view);



        //room ห้อง
        $meeting_room_index = $auth->createPermission('meeting/room/index');
        $meeting_room_index->description = 'รายการห้อง';
        $auth->add($meeting_room_index);

        $meeting_room_create = $auth->createPermission('meeting/room/create');
        $meeting_room_create->description = 'เพิ่มห้อง';
        $auth->add($meeting_room_create);

        $meeting_room_update = $auth->createPermission('meeting/room/update');
        $meeting_room_update->description = 'แก้ไขห้อง';
        $auth->add($meeting_room_update);

        $meeting_room_delete = $auth->createPermission('meeting/room/delete');
        $meeting_room_delete->description = 'ลบห้อง';
        $auth->add($meeting_room_delete);

        $meeting_room_view = $auth->createPermission('meeting/room/view');
        $meeting_room_view->description = 'ดูห้อง';
        $auth->add($meeting_room_view);


        //report รายงาน
        $meeting_report_report1 = $auth->createPermission('meeting/report/report1');
        $meeting_report_report1->description = 'รายงาน1';
        $auth->add($meeting_report_report1);

        $meeting_report_report2 = $auth->createPermission('meeting/report/report2');
        $meeting_report_report2->description = 'รายงาน2';
        $auth->add($meeting_report_report2);

        $meeting_report_report3 = $auth->createPermission('meeting/report/report3');
        $meeting_report_report3->description = 'รายงาน3';
        $auth->add($meeting_report_report3);

        echo 'Create Permission success';

    }

    public function actionCreateRole()
    {
        $auth = Yii::$app->authManager;
        //person จัดการบุคคล
        $person_default_index = $auth->createPermission('personal/default/index');
        $person_person_index = $auth->createPermission('personal/person/index');
        $person_person_create = $auth->createPermission('personal/person/create');
        $person_person_update = $auth->createPermission('personal/person/update');
        $person_person_delete = $auth->createPermission('personal/person/delete');
        $person_person_view = $auth->createPermission('personal/person/view');

        //calendar ปฎิทิน
        // $meeting_default_index = $auth->createPermission('meeting/default/index');

        //equipment จัดการอุปกรณ์
        $meeting_equipment_index = $auth->createPermission('meeting/equipment/index');
        $meeting_equipment_create = $auth->createPermission('meeting/equipment/create');
        $meeting_equipment_update = $auth->createPermission('meeting/equipment/update');
        $meeting_equipment_delete = $auth->createPermission('meeting/equipment/delete');
        $meeting_equipment_view = $auth->createPermission('meeting/equipment/view');

        //meeting จัดการห้องประชุม
        $meeting_meeting_index = $auth->createPermission('meeting/meeting/index');
        $meeting_meeting_create = $auth->createPermission('meeting/meeting/create');
        $meeting_meeting_update = $auth->createPermission('meeting/meeting/update');
        $meeting_meeting_delete = $auth->createPermission('meeting/meeting/delete');
        $meeting_meeting_view = $auth->createPermission('meeting/meeting/view');

        //room ห้อง
        $meeting_room_index = $auth->createPermission('meeting/room/index');
        $meeting_room_create = $auth->createPermission('meeting/room/create');
        $meeting_room_update = $auth->createPermission('meeting/room/update');
        $meeting_room_delete = $auth->createPermission('meeting/room/delete');
        $meeting_room_view = $auth->createPermission('meeting/room/view');

        //report รายงาน
        $meeting_report_report1 = $auth->createPermission('meeting/report/report1');
        $meeting_report_report2 = $auth->createPermission('meeting/report/report2');
        $meeting_report_report3 = $auth->createPermission('meeting/report/report3');


        //assign role
        $user = $auth->createRole('user');

        $admin = $auth->createRole('admin');

        echo 'Create Role success!';
    }

    public function actionCreateAssignment()
    {
        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $admin = $auth->createRole('admin');

        echo 'Create Assignment success!';
    }

    public function actionCreateRule()
    {
        # code...
    }
}
?>