<?php

namespace backend\modules\assignment\controllers;

use yii\web\Controller;
use backend\modules\assignment\models\AuthAssignment;
use backend\modules\assignment\models\AuthAssignmentSearch;
use Yii;

/**
 * Default controller for the `assignment` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new AuthAssignment();
        $searchModel = new AuthAssignmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($item_name, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($item_name, $user_id),
        ]);
    }

    public function actionCreate()
    {
        $model = new AuthAssignment();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            if ($model->save()) {
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($item_name, $user_id)
    {
        $model = $this->findModel($item_name, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($item_name, $user_id)
    {
        $this->findModel($item_name, $user_id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}