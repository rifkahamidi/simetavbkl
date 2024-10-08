<?php

use app\Models\Survei;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\SurveiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'SURVEI';
?>

<div class="survei-index">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Buat Survei', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Lihat MBS', ['mbs/index'], ['class' => 'btn btn-primary ml-3']) ?>
    </p>

    <div class="survei-search d-flex justify-content-center">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['index'],
            'options' => ['class' => 'form-inline'],
        ]); ?>

        <div class="input-group mb-3" style="max-width: 600px;">
            <?= $form->field($searchModel, 'globalSearch', [
                'options' => ['class' => 'form-group mb-0'],
            ])->textInput([
                'placeholder' => 'Cari survei...',
                'class' => 'form-control',
                'style' => 'width: 100%;',
            ])->label(false) ?>

            <div class="input-group-append">
                <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'nmsurvei',
                'header' => 'Nama Survei',
                'headerOptions' => ['style' => 'text-align: center;'],
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(
                        Html::encode($model->nmsurvei),
                        Url::to(['mbs/index', 'id' => $model->kdsurvei]),
                        ['style' => 'color: black; text-decoration: none;']
                    );
                },
            ],
            [
                'attribute' => 'status',
                'header' => 'Status Survei',
                'headerOptions' => ['style' => 'text-align: center;'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Survei $model) {
                    return Url::toRoute([$action, 'kdsurvei' => $model->kdsurvei]);
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
