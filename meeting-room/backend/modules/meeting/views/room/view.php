<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Room */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ห้องประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-home"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('ลบ ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </p>
        <div class="text-center">
            <?= Html::img('uploads/room/'.$model->photo,['class' => 'thumbnail img-responsive','width' => 250]) ?>
        </div>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'name',
            'description:ntext',
            //'photo',
            [
                'attribute' => 'color',
                'format' => 'html',
                'value' => '<span style="color:'.$model->color.';">'.$model->color.'</span>',
            ]
        ],
    ]) ?>
    </div>
</div>