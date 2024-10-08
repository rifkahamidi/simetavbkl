<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mbs".
 *
 * @property string $idbs
 * @property string $tipe
 * @property int $kdprov
 * @property int $kdkab
 * @property int $kdkec
 * @property int $kddes
 * @property string $kdbs
 * @property string $labelbs
 * @property string $jenisbs
 * @property int $j_keluarga
 * @property int $bstt
 * @property int $bsbtt
 * @property int $bstt_k
 * @property string $bskeko
 * @property string $dominan
 * @property string $tingkat
 * @property string $nm_gedung
 * @property int $j_ruta_biasa
 * @property int $j_ruta_khusus
 * @property int $j_art_l
 * @property int $j_art_p
 * @property string $status
 * @property string $khusus
 */
class Mbs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mbs';
    }

    // public function actionGetIdbs()
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $out = [];
    //     if (isset($_GET['q'])) {
    //         $out = Mbs::find()
    //             ->select(['idbs AS id', 'idbs AS text'])
    //             ->where(['like', 'idbs', $_GET['q']])
    //             ->asArray()
    //             ->all();
    //     }
    //     return ['results' => $out];
    // }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbs', 'tipe', 'kdprov', 'kdkab', 'kdkec', 'kddes', 'kdbs', 'j_keluarga', 'bstt', 'bsbtt', 'bstt_k', 'bskeko', 'dominan', 'tingkat', 'nm_gedung', 'j_ruta_biasa', 'j_ruta_khusus', 'j_art_l', 'j_art_p', 'status', 'khusus'], 'required'],
            [['status', 'idbs', 'kdprov', 'kdkab', 'kdkec', 'kddes', 'kdbs', 'khusus', 'tingkat', 'nm_gedung', 'j_keluarga', 'bstt', 'bsbtt', 'bstt_k', 'bskeko', 'j_ruta_biasa', 'j_ruta_khusus', 'j_art_l', 'j_art_p', 'dominan', 'jenisbs'], 'safe'],
            [['kdprov', 'kdkab', 'kdkec', 'kddes', 'j_keluarga', 'bstt', 'bsbtt', 'bstt_k', 'j_ruta_biasa', 'j_ruta_khusus', 'j_art_l', 'j_art_p'], 'integer'],
            [['idbs'], 'string', 'max' => 50],
            [['tipe', 'kdbs', 'bskeko', 'dominan', 'tingkat', 'nm_gedung','status','khusus'], 'string', 'max' => 255],
            [['idbs'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbs' => 'Idbs',
            'tipe' => 'Tipe',
            'kdprov' => 'Kdprov',
            'kdkab' => 'Kdkab',
            'kdkec' => 'Kdkec',
            'kddes' => 'Kddes',
            'kdbs' => 'Kdbs',
            'j_keluarga' => 'J_Keluarga',
            'bstt' => 'Bstt',
            'bsbtt' => 'Bsbtt',
            'bstt_k' => 'Bstt K',
            'bskeko' => 'Bskeko',
            'dominan' => 'Dominan',
            'tingkat' => 'Tingkat',
            'nm_gedung' => 'Nm Gedung',
            'j_ruta_biasa' => 'J Ruta Biasa',
            'j_ruta_khusus' => 'J Ruta Khusus',
            'j_art_l' => 'J Art L',
            'j_art_p' => 'J Art P',
            'status' => 'Status',
            'khusus' => 'Khusus',
        ];
    }

    public static function findModel($idbs)
    {
        if (($model = self::findOne(['idbs' => $idbs])) !== null) {
            return $model;
        }

        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

//     public function actionGetDetails($idbs)
// {
//     $model = Mbs::findOne($idbs);

//     if ($model !== null) {
//         return $this->asJson([
//             'kdprov' => $model->kdprov,
//             'kdkab' => $model->kdkab,
//             'kdkec' => $model->kdkec,
//             'kddes' => $model->kddes,
//             'kdbs' => $model->kdbs,
//             'khusus' => $model->khusus,
//             'tingkat' => $model->tingkat,
//             'nm_gedung' => $model->nm_gedung,
//             'j_keluarga' => $model->j_keluarga,
//             'bstt' => $model->bstt,
//             'bsbtt' => $model->bsbtt,
//             'bstt_k' => $model->bstt_k,
//             'bskeko' => $model->bskeko,
//             'j_ruta_biasa' => $model->j_ruta_biasa,
//             'j_ruta_khusus' => $model->j_ruta_khusus,
//             'j_art_l' => $model->j_art_l,
//             'j_art_p' => $model->j_art_p,
//             'dominan' => $model->dominan,
//             'jenisbs' => $model->jenisbs,
//         ]);
//     } else {
//         return $this->asJson(['error' => 'Data tidak ditemukan']);
//     }
// }
public function actionGetDetails($idbs)
{
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
    $model = Mbs::findOne(['idbs' => $idbs]);

    if ($model) {
        return [
            'kdprov' => substr($model->idbs, 0, 2),
            'kdkab' => substr($model->idbs, 2, 4),
            'kdkec' => substr($model->idbs, 4, 7),
            'kddes' => substr($model->idbs, 7, 10),
            'kdbs' => substr($model->idbs, 10, 14),
        ];
    }

    return ['error' => 'Data not found'];
}



    
}
