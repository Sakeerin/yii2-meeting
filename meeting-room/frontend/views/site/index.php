<?php
use yii\helpers\Url;

$this->title = 'ระบบจองห้องประชุมออนไลน์';
//Yii::$app->db->open();
?>

<?= yii2fullcalendar\yii2fullcalendar::widget([
    'header' => [
        'left' => 'prev,next today',
        'center' => 'title',
        'right' => 'month,agendaWeek,agendaDay'
    ],
    'clientOptions' => [
        'lang' => 'th',
        'lazyFecthing' => true,
        'timeFormat' => 'H:mm',
        'forceEventDuration' => true,
        'ignoreTimezone' => true,
    ],
    'events' => Url::to(['/meeting/default/jsoncalendar'])
    ]);
?>