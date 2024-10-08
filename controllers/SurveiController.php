<?php

namespace app\controllers;

use app\Models\Survei;
use app\models\SurveiSearch;
use app\models\SurveiSearchMitra;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveiController implements the CRUD actions for Survei model.
 */
class SurveiController extends Controller
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
     * Lists all Survei models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $role = \Yii::$app->user->identity->role;

        if ($role == 2) {
            // Jika mitra, gunakan pencarian yang hanya menampilkan survei "berlangsung"
            $searchModel = new SurveiSearchMitra();
        } else {
            // Jika admin, tampilkan semua survei
            $searchModel = new SurveiSearch();
        }
        
            $dataProvider = $searchModel->search($this->request->queryParams);
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionEntriData()
    {
            $searchModelMitra = new SurveiSearchMitra();
            $dataProvider = $searchModelMitra->search($this->request->queryParams);
    
        return $this->render('entri-data', [
            'searchModelMitra' => $searchModelMitra,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Survei model.
     * @param int $kdsurvei Kdsurvei
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kdsurvei)
    {
        return $this->render('view', [
            'model' => $this->findModel($kdsurvei),
        ]);
    }

    /**
     * Creates a new Survei model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Survei();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'kdsurvei' => $model->kdsurvei]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Survei model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $kdsurvei Kdsurvei
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kdsurvei)
    {
        $model = $this->findModel($kdsurvei);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdsurvei' => $model->kdsurvei]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Survei model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $kdsurvei Kdsurvei
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kdsurvei)
    {
        $this->findModel($kdsurvei)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Survei model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $kdsurvei Kdsurvei
     * @return Survei the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kdsurvei)
    {
        if (($model = Survei::findOne(['kdsurvei' => $kdsurvei])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
