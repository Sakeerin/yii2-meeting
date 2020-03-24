<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Equipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'equipment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'equip_img')->fileInput() ?>

    <?php if (!$model->isNewRecord) { ?>
    <?= Html::img('uploads/equipment/'.$model->photo,['class' => 'thumbnail', 'width' => 200])?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>