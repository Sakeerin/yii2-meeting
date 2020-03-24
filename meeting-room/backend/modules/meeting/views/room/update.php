<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Room */

$this->title = 'Update: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'meeting room', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'update';
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-home"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>