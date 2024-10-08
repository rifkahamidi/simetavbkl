<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Models\EntriData $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="entri-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kabkot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'labelbs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idbs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_bs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
