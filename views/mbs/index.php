<?php

use app\Models\Mbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\MbsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Muatan Blok Sensus';
// $this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('Export to CSV', ['export-csv'], ['class' => 'btn btn-primary mr-2']) ?>

<div class="mbs-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'idbs',
            'tipe',
            'kdprov',
            'kdkab',
            'kdkec',
            'kddes',
            'kdbs',
            'j_keluarga',
            'bstt',
            'bsbtt',
            'bstt_k',
            'bskeko',
            'dominan',
            'tingkat',
            // 'nm_gedung',
            // 'j_ruta_biasa',
            // 'j_ruta_khusus',
            // 'j_art_l',
            // 'j_art_p',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mbs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idbs' => $model->idbs]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
