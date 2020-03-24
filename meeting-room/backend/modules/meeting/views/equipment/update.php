<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Equipment */

$this->title = 'Update: ' . $model->equipment;
$this->params['breadcrumbs'][] = ['label' => 'equipment', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipment, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'update';
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-cogs"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>