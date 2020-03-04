<?php
use miloschuman\highcharts\Highcharts;
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = 'สรุปการจองห้องประชุมแบ่งตามห้อง';
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-bar-chart"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= Highcharts::widget([
   'options' => [
      'title' => ['text' => 'สรุปการจองห้องประชุมแบ่งตามห้อง'],
      'xAxis' => [
         'categories' => ['จำนวน (ครั้ง)']
      ],
      'yAxis' => [
         'title' => ['text' => 'จำนวน (ครั้ง)']
      ],
      'series' => $graph,
   ]
])?>
    </div>
</div>

<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa- bar-chart"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'name',
            'label' => 'ห้องประุชม'
        ],
        [
            'attribute' => 'mid',
            'label' => 'จำนวน (ครั้ง)'
        ]
    ]
    
])?>
    </div>
</div>