<?php

use app\Models\Survei;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\SurveiSearchMitra $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'SURVEI';
?>

<div class="survei-index">

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'nmsurvei',
                'header' => 'Nama Survei', // Judul kolom baru
                'headerOptions' => ['style' => 'text-align: center;'],
            ],
            
            [
                'attribute' => 'status',
                'header' => 'Status Survei', // Judul kolom baru
                'headerOptions' => ['style' => 'text-align: center;'],
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{create-survey}', 
                'buttons' => [
                    'create-survey' => function ($url, $model, $key) {
                        return Html::a('Isi Survei', ['mbs/create'], [
                            'class' => 'btn btn-success',
                            'title' => 'Buat Survei Baru',
                            'data-pjax' => '0', 
                        ]);
                    },
                ],
                'header' => 'Aksi', 
                'headerOptions' => ['style' => 'text-align: center;'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
