<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\assignment\models\AuthAssignment */

$this->title = 'Update Role Assignment: ' . $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>