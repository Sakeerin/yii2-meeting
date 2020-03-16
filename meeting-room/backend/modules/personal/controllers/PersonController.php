<?php

namespace backend\modules\personal\controllers;

use Yii;
use common\models\Person;
use backend\modules\personal\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\web\UploadedFile;
use yii\filters\AccessControl; 
use yii\web\ForbiddenHttpException;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller
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
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Person();
        $user = new User();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            $user->auth_key = Yii::$app->security->generateRandomString();
            if($user->save()){
                $file = UploadedFile::getInstance($model,'person_img');
                if ($file->size != 0) {
                    $model->photo = $user->id.'.'.$file->extension;
                    $file->saveAs('uploads/person/'.$user->id.'.'.$file->extension);
                }
                $model->user_id = $user->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;
        $oldPass = $user->password_hash; 
        $oldAvatar = $model->photo;
        
        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if ($oldPass != $user->password_hash) { //เปลี่ยนรหัสผ่าย
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            }
            if ($user->save()) {
                $file = UploadedFile::getInstance($model,'person_img');
                if (isset($file->size) && $file->size !==0) { //มีการเปลี่ยนรูป
                    $model->photo = $user->id.'.'.$file->extension;
                    $file->saveAs('uploads/person/'.$user->id.'.'.$file->extension);
                    if ($oldAvatar != 0) {
                        @unlink('uploads/person/'.$oldAvatar);
                    }
                }
                $model->save();
            }

            // echo $oldAvatar;
            // echo $model->photo;
            // die();
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Person model.
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
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findUserModel($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}