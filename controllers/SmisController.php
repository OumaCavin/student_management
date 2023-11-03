<?php

namespace app\controllers;

use app\models\SmNextOfKin;
use app\models\SmNextOfKinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SmisController implements the CRUD actions for SmNextOfKin model.
 */
class SmisController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SmNextOfKin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SmNextOfKinSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SmNextOfKin model.
     * @param int $next_of_kin_id Next Of Kin ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($next_of_kin_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($next_of_kin_id),
        ]);
    }

    /**
     * Creates a new SmNextOfKin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SmNextOfKin();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'next_of_kin_id' => $model->next_of_kin_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SmNextOfKin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $next_of_kin_id Next Of Kin ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($next_of_kin_id)
    {
        $model = $this->findModel($next_of_kin_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'next_of_kin_id' => $model->next_of_kin_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SmNextOfKin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $next_of_kin_id Next Of Kin ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($next_of_kin_id)
    {
        $this->findModel($next_of_kin_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SmNextOfKin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $next_of_kin_id Next Of Kin ID
     * @return SmNextOfKin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($next_of_kin_id)
    {
        if (($model = SmNextOfKin::findOne(['next_of_kin_id' => $next_of_kin_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
