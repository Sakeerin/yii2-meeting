<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = $model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="text-center">
        <?= Html::img('uploads/person/'.$model->photo,['class' => 'thumbnail','width' => 150]) ?>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username',
            'user.email',
            'firstname',
            'lastname',
            'photo',
            'address:ntext',
            'tel',
            'department.department',
        ],
    ]) ?>
    </div>
</div>
