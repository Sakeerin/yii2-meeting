<?php
use miloschuman\highcharts\Highcharts;
use yii\grid\GridView;
use yii\helpers\Html;
$this->title= 'รายงานสรุปการจองห้องประชุมแบ่งตามเดือน';
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa- bar-chart"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?= Highcharts::widget([
    'options' => [
        'title' => ['text' => 'รายงานสรุปการจองห้องประชุมแบ่งตามเดือน'],
        'xAxis' => [
            'categories' =>[
                'ม.ค.',
                'ก.พ.',
                'มี.ค.',
                'เม.ย.',
                'พ.ค.',
                'มิ.ย.',
                'ก.ค.',
                'ส.ค.',
                'ก.ย.',
                'ต.ค.',
                'พ.ย.',
                'ธ.ค.',
            ]
        ],
        'yAxis' => [
            'title' =>['text' => 'จำนวน (ครั้ง)']
        ],
        'series' => $graph
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
    'columns' =>[
        [
            'attribute' => 'name',
            'label' => 'ห้องประชุม'
        ],
        [
            'attribute' => 'm1',
            'label' => 'ม.ค.'
        ],
        [
            'attribute' => 'm2',
            'label' => 'ก.พ.'
        ],
        [
            'attribute' => 'm3',
            'label' => 'มิ.ย.'
        ],
        [
            'attribute' => 'm4',
            'label' => 'เม.ย.'
        ],
        [
            'attribute' => 'm5',
            'label' => 'พ.ค.'
        ],
        [
            'attribute' => 'm6',
            'label' => 'มิ.ย.'
        ],
        [
            'attribute' => 'm7',
            'label' => 'ก.ค.'
        ],
        [
            'attribute' => 'm8',
            'label' => 'ส.ค.'
        ],
        [
            'attribute' => 'm9',
            'label' => 'ก.ย.'
        ],
        [
            'attribute' => 'm10',
            'label' => 'ต.ค.'
        ],
        [
            'attribute' => 'm11',
            'label' => 'พ.ย.'
        ],
        [
            'attribute' => 'm12',
            'label' => 'ธ.ค.'
        ],
    ]
])?>
    </div>
</div>