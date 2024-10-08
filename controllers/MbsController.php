<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url; 
use app\Models\Mbs;
use app\models\MbsSearch;
use app\models\Datakab;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MbsController implements the CRUD actions for Mbs model.
 */
class MbsController extends Controller
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
     * Lists all Mbs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MbsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mbs model.
     * @param string $idbs Idbs
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idbs)
    {
        return $this->render('view', [
            'model' => $this->findModel($idbs),
        ]);
    }

    /**
     * Creates a new Mbs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    
     public function actionCreate()
{
    $model = new Mbs();

    if ($postData = Yii::$app->request->post('Mbs')) {
        if (isset($postData['idbs']) && $postData['idbs']) {
            $existingModel = Mbs::findOne($postData['idbs']);

            if ($existingModel) {
                // Update model dengan data dari POST
                $existingModel->attributes = $postData;

                // Validasi dan simpan model
                if ($existingModel->validate() && $existingModel->save()) {
                    Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
                    return $this->redirect(['view', 'idbs' => $existingModel->idbs]);
                }

                // Tampilkan pesan kesalahan untuk atribut yang tidak valid
                // $errors = $existingModel->errors;
                // $errorMessages = [];
                // foreach ($errors as $attribute => $error) {
                //     $errorMessages[] = ucfirst($attribute) . ' tidak boleh kosong.';
                // }
                // Yii::$app->session->setFlash('error', implode(' ', $errorMessages));
            }
        }
    }

    // Handle jika ID tidak valid atau data POST tidak valid
    // Yii::$app->session->setFlash('error', 'Isian belum lengkap');
        
     
         return $this->render('create', [
             'model' => $model,
         ]);
     }

    /**
     * Updates an existing Mbs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idbs Idbs
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionUpdate($idbs)
    // {
    //     $model = $this->findModel($idbs);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         Yii::$app->session->setFlash('success', 'Data updated successfully.');
    //         return $this->redirect(['view', 'idbs' => $model->idbs]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionUpdate($idbs = null)
    {
        $model = $idbs ? Mbs::findOne($idbs) : new Mbs();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->idbs]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Mbs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idbs Idbs
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idbs)
    {
        $this->findModel($idbs)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mbs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idbs Idbs
     * @return Mbs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idbs)
    {
        if (($model = Mbs::findOne(['idbs' => $idbs])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function actionGetData($id)
    // {
    //     $data = Mbs::find()->where(['idbs' => $id])->one();
    //     if ($data) {
    //         return $this->asJson($data);
    //     }
    //     return $this->asJson(['error' => 'Data not found']);
    // }

    public function actionGetDetails()
{
    $idbs = Yii::$app->request->get('idbs');
    $model = Mbs::findOne($idbs);

    if ($model) {
        return json_encode([
            'kdprov' => $model->kdprov,
            'kdkab' => $model->kdkab,
            'kdkec' => $model->kdkec,
            'kddes' => $model->kddes,
            'kdbs' => $model->kdbs,
            'khusus' => $model->khusus,
            'tingkat' => $model->tingkat,
            'nm_gedung' => $model->nm_gedung,
            'j_keluarga' => $model->j_keluarga,
            'bstt' => $model->bstt,
            'bsbtt' => $model->bsbtt,
            'bstt_k' => $model->bstt_k,
            'bskeko' => $model->bskeko,
            'j_ruta_biasa' => $model->j_ruta_biasa,
            'j_ruta_khusus' => $model->j_ruta_khusus,
            'j_art_l' => $model->j_art_l,
            'j_art_p' => $model->j_art_p,
            'dominan' => $model->dominan,
            'jenisbs' => $model->jenisbs,
        ]);
    } else {
        return json_encode(['error' => 'Data not found']);
    }
}
public function actionExportCsv()
{
    // Mendapatkan data dari DataProvider
    $searchModel = new MbsSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    // Memulai output CSV
    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    Yii::$app->response->headers->add('Content-Type', 'application/csv');
    Yii::$app->response->headers->add('Content-Disposition', 'attachment; filename="mbs_export.csv"');

    // Mengambil data dari DataProvider
    $models = $dataProvider->getModels();
    
    $output = fopen('php://output', 'w');
    
    // Menulis header CSV
    fputcsv($output, [
        'ID BS',
        'Tipe',
        'Kode Provinsi',
        'Kode Kabupaten',
        'Kode Kecamatan',
        'Kode Desa',
        'Kode BS',
        'Jumlah Keluarga',
        'BSTT',
        'BSBTT',
        'BSTT K',
        'BSKEKO',
        'Dominan',
        'Tingkat',
        'Nama Gedung',
        'J Ruta Biasa',
        'J Ruta Khusus',
        'J Art L',
        'J Art P'
    ]);

    // Menulis data CSV
    foreach ($models as $model) {
        fputcsv($output, [
            $model->idbs,
            $model->tipe,
            $model->kdprov,
            $model->kdkab,
            $model->kdkec,
            $model->kddes,
            $model->kdbs,
            $model->j_keluarga,
            $model->bstt,
            $model->bsbtt,
            $model->bstt_k,
            $model->bskeko,
            $model->dominan,
            $model->tingkat,
            $model->nm_gedung,
            $model->j_ruta_biasa,
            $model->j_ruta_khusus,
            $model->j_art_l,
            $model->j_art_p
        ]);
    }

    fclose($output);
    return Yii::$app->response;
}





}