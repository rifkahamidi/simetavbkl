<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EntriDataSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="entri-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kabkot') ?>

    <?= $form->field($model, 'kec') ?>

    <?= $form->field($model, 'kel') ?>

    <?= $form->field($model, 'labelbs') ?>

    <?php // echo $form->field($model, 'idbs') ?>

    <?php // echo $form->field($model, 'jenis_bs') ?>

    <?php // echo $form->field($model, 'body') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
