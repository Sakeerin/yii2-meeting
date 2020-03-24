<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\modules\assignment\models\AuthAssignment */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('Update', ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </p>
        <?php $user = User::findOne(['id' => $model->user_id]) ?>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'user_id',
            [
                'attribute' => 'user_id',
                'value' => $user->username,
            ],
            'item_name',
            //'created_at',
        ],
    ]) ?>
    </div>
</div>