<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Department;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'password_hash')->textInput() ?>

    <?= $form->field($user, 'email')->textInput() ?>

    <?php $auth = \Yii::$app->authManager;?>
    <?php if (!$model->isNewRecord) { ?>

    <?php if($auth->getRole('admin') && Yii::$app->user->identity->person->user_id == 1) {?>

    <?= $form->field($user, 'status')->dropDownList(['10' => 'เปิดใช้งาน','9' => 'ปิดใช้งาน'],['prompt' => 'กรุณาเลือกสถานะของผู้ใช้']) ?>

    <?php }?>

    <?php }else{ ?>

    <?php }?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'person_img')->fileInput() ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(Department::find()->all(),'id','department')) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>