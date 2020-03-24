<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Equipment */

$this->title = 'Add equipment';
$this->params['breadcrumbs'][] = ['label' => 'equipment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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