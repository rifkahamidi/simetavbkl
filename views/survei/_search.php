<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SurveiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="survei-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'kdsurvei') ?>

    <?= $form->field($model, 'id_survei') ?>

    <?= $form->field($model, 'nmsurvei') ?>

    <?= $form->field($model, 'tipe') ?>

    <?= $form->field($model, 'unit_stat') ?>

    <?php // echo $form->field($model, 'ker_wil') ?>

    <?php // echo $form->field($model, 'jenis') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
