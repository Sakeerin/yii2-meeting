<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\meeting\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'meeting room';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-home"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('Add meeting room', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function($model){
                    return Html::img('uploads/room/'.$model->photo,['class' => 'img-responsive thumbnail', 'width' => 150, 'alt' => $model->name]);
                }
            ],
            'name',
            //'description:ntext',
            [
                'attribute' => 'color',
                'format' => 'html',
                'value' => function($model){
                    return '<span style="color:'.$model->color.'">'.$model->color.'</span>';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>

</div>