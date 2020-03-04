<?php

namespace backend\modules\meeting\controllers;

use Yii;
use yii\data\ArrayDataProvider;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport1()
    {
        $sql = "SELECT COUNT(m.id) AS mid, r.name
                FROM meeting m
                LEFT JOIN room r ON r.id = m.room_id
                GROUP BY m.room_id";
        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $graph = [];
        foreach($data as $d){
            $graph[] = [
                'type' => 'column',
                'name' => $d['name'],
                'data' => [intval($d['mid'])]
            ];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => ['mid','name'],
            ]
        ]);
        return $this->render('report1',[
            'graph' => $graph,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport2()
    {
        $y = date("Y",time());
        $sql = "
            SELECT r.name,
            COUNT(IF(MONTH(m.date_start)=1,m.id,NULL)) AS m1,
            COUNT(IF(MONTH(m.date_start)=2,m.id,NULL)) AS m2,
            COUNT(IF(MONTH(m.date_start)=3,m.id,NULL)) AS m3,
            COUNT(IF(MONTH(m.date_start)=4,m.id,NULL)) AS m4,
            COUNT(IF(MONTH(m.date_start)=5,m.id,NULL)) AS m5,
            COUNT(IF(MONTH(m.date_start)=6,m.id,NULL)) AS m6,
            COUNT(IF(MONTH(m.date_start)=7,m.id,NULL)) AS m7,
            COUNT(IF(MONTH(m.date_start)=8,m.id,NULL)) AS m8,
            COUNT(IF(MONTH(m.date_start)=9,m.id,NULL)) AS m9,
            COUNT(IF(MONTH(m.date_start)=10,m.id,NULL)) AS m10,
            COUNT(IF(MONTH(m.date_start)=11,m.id,NULL)) AS m11,
            COUNT(IF(MONTH(m.date_start)=12,m.id,NULL)) AS m12
            FROM meeting m
            LEFT JOIN room r ON r.id = m.room_id
            WHERE YEAR(m.date_start) = '".$y."'
            GROUP BY r.id
            ";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $graph = [];
        foreach($data as $d){
            $graph[] = [
                'name' => $d['name'],
                'data' => [
                    intval($d['m1']),
                    intval($d['m2']),
                    intval($d['m3']),
                    intval($d['m4']),
                    intval($d['m5']),
                    intval($d['m6']),
                    intval($d['m7']),
                    intval($d['m8']),
                    intval($d['m9']),
                    intval($d['m10']),
                    intval($d['m11']),
                    intval($d['m12']),
                ]
            ];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => ['name','m1','m2','m3','m4','m5','m6','m7','m8','m9','m10','m11','m12',]
            ]
        ]);
        return $this->render('report2',[
            'graph' => $graph,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport3()
    {
        return $this->render('report3');
    }

    public function actionReport4()
    {
        return $this->render('report4');
    }

}