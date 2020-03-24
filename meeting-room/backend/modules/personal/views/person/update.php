<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = 'update: ' . $model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'personnel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstname.' '.$model->lastname, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'update';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

    </div>

</div>