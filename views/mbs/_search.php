<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MbsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mbs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idbs') ?>

    <?= $form->field($model, 'tipe') ?>

    <?= $form->field($model, 'kdprov') ?>

    <?= $form->field($model, 'kdkab') ?>

    <?= $form->field($model, 'kdkec') ?>

    <?php // echo $form->field($model, 'kddes') ?>

    <?php // echo $form->field($model, 'kdbs') ?>

    <?php // echo $form->field($model, 'j_keluarga') ?>

    <?php // echo $form->field($model, 'bstt') ?>

    <?php // echo $form->field($model, 'bsbtt') ?>

    <?php // echo $form->field($model, 'bstt_k') ?>

    <?php // echo $form->field($model, 'bskeko') ?>

    <?php // echo $form->field($model, 'dominan') ?>

    <?php // echo $form->field($model, 'tingkat') ?>

    <?php // echo $form->field($model, 'nm_gedung') ?>

    <?php // echo $form->field($model, 'j_ruta_biasa') ?>

    <?php // echo $form->field($model, 'j_ruta_khusus') ?>

    <?php // echo $form->field($model, 'j_art_l') ?>

    <?php // echo $form->field($model, 'j_art_p') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
