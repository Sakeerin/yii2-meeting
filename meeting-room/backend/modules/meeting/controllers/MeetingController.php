<?php

namespace backend\modules\meeting\controllers;

use Yii;
use backend\modules\meeting\models\Meeting;
use backend\modules\meeting\models\MeetingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\meeting\models\Equipment;
use yii\data\ArrayDataProvider;
use backend\modules\meeting\models\Uses;
use yii\filters\AccessControl; 

/**
 * MeetingController implements the CRUD actions for Meeting model.
 */
class MeetingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule,$action){
                            $module = Yii::$app->controller->module->id;
                            $controller = Yii::$app->controller->id;
                            $action = Yii::$app->controller->action->id;

                            $route = "$module/$controller/$action";
                            if (Yii::$app->user->can($route)) {
                                return true;
                            }else{
                                Yii::$app->session->setFlash('warning', 'You do not have permission to use this page.');
                            }
                        }
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Meeting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MeetingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meeting model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' =>new ArrayDataProvider(['allModels' => $model->uses]),
        ]);
    }

    /**
     * Creates a new Meeting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Meeting();

        if ($model->load(Yii::$app->request->post())) {
            // ตรวจสอบการจองซ้ำ
            $meets = Meeting::find()
                    ->where(['room_id' => $model->room_id])
                    ->andWhere(['betWeen','date_start',$model->date_start,$model->date_end])
                    ->orWhere(['betWeen','date_end',$model->date_start,$model->date_end])
                    ->one();
            if (empty($meets)) { //จองไม่ซ้ำ
                $model->user_id = Yii::$app->user->getId();
                if ($model->save()) {
                    $last_id = $model->id;

                    $equip = $_POST['Equip'];
                    for ($i=0; $i < count($equip); $i++) { 
                        Yii::$app->db->createCommand(
                            "INSERT INTO uses(meeting_id,equipment_id) VALUES(:meeting_id,:equipment_id) ",
                            [':meeting_id' => $last_id, ':equipment_id' => $equip[$i]]
                        )->execute();
                    }
                }
                Yii::$app->getSession()->setFlash('success','ห้องประชุมเรียบร้อยแล้ว');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{ // จองซ้ำ
                Yii::$app->getSession()->setFlash('danger','ห้องประชุมถูกจองแล้วหัวข้อประชุมเรื่อง  '.$meets->title);
                return $this->redirect(['create']);
            }
        }else {
            $equipments = Equipment::find()->all();
            return $this->render('create', [
                'model' => $model,
                'equipments' => $equipments,
            ]);
        }

       
    }

    /**
     * Updates an existing Meeting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $last_id = $model->id;
            $equip = $_POST['Equip'];
            Uses::deleteAll(['meeting_id' => $id]);
            for ($i=0; $i < count($equip) ; $i++) { 
                Yii::$app->db->createCommand(
                    "INSERT INTO uses(meeting_id,equipment_id) VALUES(:meeting_id,:equipment_id) ",
                    [':meeting_id' => $last_id, ':equipment_id' => $equip[$i]]
                )->execute();
            }
            Yii::$app->getSession()->setFlash('success','แก้ไขข้อมูลการจองห้องประชุมเรียบร้อยแล้ว');
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            $equipments = Equipment::find()->all();
            return $this->render('update', [
                'model' => $model,
                'equipments' => $equipments,
            ]);
        }

        
    }

    /**
     * Deletes an existing Meeting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Meeting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Meeting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Meeting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findUserModel($id)
    {
        if (($model = Meeting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}