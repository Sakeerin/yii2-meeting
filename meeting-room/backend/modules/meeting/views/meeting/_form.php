<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\meeting\models\Room;
use yii\helpers\ArrayHelper;
use dosamigos\datetimepicker\DateTimePicker;
use backend\modules\meeting\models\Uses;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Meeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
        'language' => 'th',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd HH:ii:00', // if inline = false
            'todayBtn' => true,
            'startDate' => date("Y-m-d H:i:s"),
            'todayHighlight' => true,
            'minuteStep' => 5,
        ]
    ]) ?>

    <?= $form->field($model, 'date_end')->widget(DateTimePicker::className(), [
        'language' => 'th',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd HH:ii:00', // if inline = false
            'todayBtn' => true,
            'startDate' => date("Y-m-d H:i:s"),
            'todayHighlight' => true,
            'minuteStep' => 5,
        ]
    ]) ?>

    <?php $auth = \Yii::$app->authManager;?>
    <?php if (!$model->isNewRecord) { ?>
    <?php if($auth->getRole('admin') && Yii::$app->user->identity->person->user_id == 1) {?>
    <?= $form->field($model, 'status')->dropDownList(['0' => 'รออนุมัติ','1' => 'อนุมัติ','2' => 'ยกเลิก'],['prompt' => 'กรุณาเลือกสถานะการจองให้กับผู้จอง']) ?>
    <?php }?>
    <?php }else{ ?>

    <?php }?>

    <?= $form->field($model, 'room_id')->dropDownList(ArrayHelper::map(Room::find()->all(),'id','name')) ?>

    <h4>รายการอุปกรณ์ที่จะใช้</h4>

    <?php foreach($equipments as $e) {
        if (!$model->isNewRecord) {
            $u = Uses::findOne(['equipment_id' => $e->id, 'meeting_id' => $model->id]);
            if (!empty($u['equipment_id'])) {
                $seleted = 'checked="cheked"';
            }else{
                $seleted = '';
            }
        }else{
            $seleted = '';
        }
        
        
    ?>
    <label class="checkbox-inline">
        <input name="Equip[]" type="checkbox" value="<?= $e->id?>" id="inlineCheckbox<?= $e->id?>" <?= $seleted?>>
        <?= $e->equipment?>
    </label>
    <?php }?>
    <div class="text-right">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>