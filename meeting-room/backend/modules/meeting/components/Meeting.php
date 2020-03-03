<?php
namespace backend\modules\meeting\components;

use yii\base\component;

class Meeting extends component
{
    public function getMeetingStatus($status = null)
    {
        if ($status == 0) {
            $r = '<span class="label label-warning">รออนุมัติ</span>';
        }elseif ($status == 1) {
            $r = '<span class="label label-success">อนุมัติ</span>';
        }elseif ($status == 2) {
            $r = '<span class="label label-danger">ยกเลิก</span>';
        }
        return $r;
    }
}